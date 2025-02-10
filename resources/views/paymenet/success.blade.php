
@extends('layout')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                <h2 class="text-3xl font-bold text-lime-600 mb-6">Thank You for Your Generosity!</h2>

                <div class="text-lg mb-6">
                    <p>Your donation to the <strong>{{ $payment->campaign->title }}</strong> campaign has been successfully processed.</p>
                    <p class="text-gray-600 mt-4">Here are the details of your donation:</p>
                </div>

                <div class="bg-lime-50 p-6 rounded-lg shadow-lg">
                    <div class="text-lg font-semibold">Donation Details</div>
                    <div class="mt-4">
                        <p><strong>Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
                        <p><strong>Message:</strong> {{ $payment->message ?? 'No personal message provided' }}</p>
                        <p><strong>Campaign:</strong> {{ $payment->campaign->title }}</p>
                        <p><strong>Status:</strong> <span class="text-green-600">Successful</span></p>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 text-white bg-lime-600 rounded-full hover:bg-lime-700">
                            Go Back to Homepage
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
