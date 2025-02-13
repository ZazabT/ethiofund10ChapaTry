<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 
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
        $validate = $request->validate([
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:1000',
            'campaign_id' => 'required|exists:campaigns,id',
        ], [
            'amount.required' => 'The donation amount is required.',
            'amount.numeric' => 'The donation amount must be a number.',
            'amount.min' => 'The donation amount must be at least 1 ETB.',
            'campaign_id.required' => 'Please select a campaign to donate to.',
            'campaign_id.exists' => 'The selected campaign does not exist.',
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
            'callback_url' => 'https://dirty-donuts-fry.loca.lt/payment/callback/' . $this->reference,// URL for the callback afterpayment
            'return_url' => route('payment.redirect', ['transactionId' => $this->reference]),
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
        
            if ($paymentInit['status'] !== 'success') {
                Log::error('Chapa payment initialization failed', [
                    'response' => $paymentInit
                ]);
                return redirect()->back()->with('error', 'Payment initialization failed. Please try again.');
            }
        
            // Create payment record
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'campaign_id' => $campaign->id,
                'amount' => $request->amount,
                'message' => $request->message,
                'transaction_id' => $this->reference,
                'status' => 'pending',
            ]);
        
            Log::info('Chapa payment initialized successfully', [
                'checkout_url' => $paymentInit['data']['checkout_url']
            ]);
        
            return redirect($paymentInit['data']['checkout_url']);
        
        } catch (\Exception $e) {
            Log::error('Error during Chapa payment initialization', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'An error occurred while processing your payment. Please try again.');
        }
    }

   

    /**
     * Callback function for payment verification.
     */
    public function callback($transactionId)
    {
        Log::info('Payment callback received', ['transaction_id' => $transactionId]);

        try {
            $paymentData = Chapa::verifyTransaction($transactionId);
            Log::info('Chapa payment verification response', $paymentData);
            dd($paymentData);

            // Ensure the response contains the 'status' key
            if (!isset($paymentData['status'])) {
                throw new \Exception('Invalid payment verification response.');
            }

            $payment = Payment::where('transaction_id', $transactionId)->firstOrFail();

            if ($paymentData['status'] === 'success') {
                $payment->status = 'successful';
                $payment->save();

                Log::info('Payment verified and marked as successful', [
                    'payment_id' => $payment->id,
                    'transaction_id' => $payment->transaction_id,
                ]);

                // Update campaign raised amount
                $campaign = Campaign::find($payment->campaign_id);
                if ($campaign) {
                    $campaign->raised_amount += $payment->amount;
                    $campaign->save();

                    Log::info('Campaign raised amount updated', [
                        'campaign_id' => $campaign->id,
                        'raised_amount' => $campaign->raised_amount,
                    ]);
                }
            } else {
                $payment->status = 'failed';
                $payment->save();

                Log::warning('Payment verification failed', [
                    'payment_id' => $payment->id,
                    'transaction_id' => $payment->transaction_id,
                ]);
            }

            return response()->json(['message' => 'Payment processed successfully'], 200);

        } catch (\Exception $e) {
            Log::error('Error during Chapa payment verification', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['error' => 'Error verifying payment'], 500);
        }
    }



    public function redirect(Request $request)
    {
        $transactionId = $request->query('transactionId');

        // Find the payment record
        $payment = Payment::where('transaction_id', $transactionId)->first();

        if (!$payment) {
            return redirect()->route('home')->with('error', 'Payment not found.');
        }

        // Redirect to success or failed page
        if ($payment->status === 'successful') {
            return view('paymenet.success', compact('payment'));
        } else {
            return view('paymenet.failed', compact('payment'));
        }
    }

    
}
