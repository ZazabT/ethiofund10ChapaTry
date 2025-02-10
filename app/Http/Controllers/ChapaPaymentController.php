<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Importing the Log facade
use Chapa\Chapa\Facades\Chapa as Chapa;

class ChapaPaymentController extends Controller
{
    // Declare protected reference property
    protected $reference;

    /**
     * Constructor to initialize payment reference.
     */
    public function __construct()
    {
        // Generate a unique payment reference on instantiation
        $this->reference = Chapa::generateReference();
        Log::info('Payment reference generated: ' . $this->reference); // Log reference generation
    }

    /**
     * Handle the donation form submission.
     */
    public function donate(Request $request)
    {
        // Validate the incoming request data
      $validate=$request->validate([
            'amount' => 'required|numeric|min:1', // Ensure a positive donation amount
            'message' => 'nullable|string|max:1000', // Optional message, max length
            'campaign_id' => 'required|exists:campaigns,id',
        ]);


        // Find the campaign using the provided campaign ID
        $campaign = Campaign::findOrFail($request->campaign_id);

    
        // Generate the dynamic description
        $description = "You are donating {$request->amount} ETB to support {$campaign->title}";
         
        // Prepare data for Chapa payment initialization
        $chapaData = [
            'amount' => $request->amount,
            'email' => Auth::user()->email,
            'tx_ref' => $this->reference, // Use the payment's transaction ID
            'currency' => 'ETB', // Set currency to ETB (Ethiopian Birr)
            'callback_url' => route('payment.callback', [$this->reference]), // URL for the callback after payment
            'first_name' => Auth::user()->first_name,
            'last_name' => Auth::user()->last_name,
            'customization' => [
                'title' => $campaign->title, // Campaign title as the payment title
                'description' => $description,
            ]
        ];
        
        // Log the data being sent to Chapa
        Log::info('Chapa payment data prepared', $chapaData);

        // Initialize the payment via Chapa gateway
        try {
            $paymentInit = Chapa::initializePayment($chapaData);

            // Check if the payment initialization was successful
            if ($paymentInit['status'] !== 'success') {
                Log::error('Chapa payment initialization failed', [
                    'response' => $paymentInit
                ]);

                // Create a new payment record with 'pending' status and the generated reference
                $payment = Payment::create([
                    'user_id' => Auth::id(), // Assuming the user is authenticated
                    'campaign_id' => $campaign->id,
                    'amount' => $request->amount,
                    'message' => $request->message,
                    'transaction_id' => $this->reference, // Use the protected reference
                    'status' => 'pending', // Initially set status as pending
                ]);
                return redirect()->back()->with('error', 'Something went wrong, please try again.');
            }

            // Log successful payment initialization
            Log::info('Chapa payment initialized successfully', [
                'checkout_url' => $paymentInit['data']['checkout_url']
            ]);

            // Redirect the user to Chapa's payment page
            return redirect($paymentInit['data']['checkout_url']);

        } catch (\Exception $e) {
            Log::error('Error during Chapa payment initialization', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }

   

    /**
     * Callback function for payment verification.
     */
    public function callback($transactionId)
    {
        Log::info('Payment callback received', ['transaction_id' => $transactionId]);

        // Verify the payment with Chapa using the transaction ID
        try {
            $paymentData = Chapa::verifyTransaction($transactionId);
            Log::info('Chapa payment verification response', $paymentData);

            // Find the corresponding payment record by the transaction ID
            $payment = Payment::where('transaction_id', $transactionId)->firstOrFail();

            // If payment verification is successful
            if ($paymentData['status'] === 'success') {
                // Update the payment status to 'successful'
                $payment->status = 'successful';
                $payment->save();

                // Log successful payment verification
                Log::info('Payment verified and marked as successful', [
                    'payment_id' => $payment->id,
                    'transaction_id' => $payment->transaction_id,
                ]);

                // Return the success view, passing the payment data
                return view('payment.success', compact('payment'));
            } else {
                // If the payment failed, update the status to 'failed'
                $payment->status = 'failed';
                $payment->save();

                // Log payment failure
                Log::warning('Payment verification failed', [
                    'payment_id' => $payment->id,
                    'transaction_id' => $payment->transaction_id,
                ]);

                // Return the failure view, passing the payment data
                return view('payment.failed', compact('payment'));
            }
        } catch (\Exception $e) {
            Log::error('Error during Chapa payment verification', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('home')->with('error', 'Error verifying payment');
        }
    }
}
