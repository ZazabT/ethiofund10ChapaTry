
@extends('layout')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                <h2 class="text-3xl font-bold text-red-600 mb-6">Oops! Something Went Wrong</h2>

                <div class="text-lg mb-6">
                    <p>We were unable to process your donation for the <strong>{{ $payment->campaign->title }}</strong> campaign.</p>
                    <p class="text-gray-600 mt-4">Please check your payment details and try again.</p>
                </div>

                <div class="bg-red-50 p-6 rounded-lg shadow-lg">
                    <div class="text-lg font-semibold">Donation Details</div>
                    <div class="mt-4">
                        <p><strong>Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
                        <p><strong>Message:</strong> {{ $payment->message ?? 'No personal message provided' }}</p>
                        <p><strong>Campaign:</strong> {{ $payment->campaign->title }}</p>
                        <p><strong>Status:</strong> <span class="text-red-600">Failed</span></p>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('donate', ['campaign_id' => $payment->campaign->id]) }}" class="inline-flex items-center px-6 py-3 text-white bg-red-600 rounded-full hover:bg-red-700">
                            Try Again
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
