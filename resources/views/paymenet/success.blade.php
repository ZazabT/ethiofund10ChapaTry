@extends('layout')

@section('content')
    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xls overflow-hidden transform transition-all duration-500 hover:scale-105">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-lime-500 to-lime-600 p-8 text-center">
                    <h2 class="text-4xl font-bold text-white mb-4 animate-pulse">Thank You for Your Generosity!</h2>
                    <p class="text-lg text-lime-100 opacity-90">Your donation is making a difference.</p>
                </div>

                <!-- Content Section -->
                <div class="p-8">
                    <div class="text-center mb-6">
                        <svg class="mx-auto h-20 w-20 text-lime-600 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <h3 class="text-2xl font-semibold text-gray-800 mt-4">Donation Successful</h3>
                        <p class="text-gray-600 mt-2">Your donation to <strong class="text-lime-600">{{ $payment->campaign->title }}</strong> has been processed successfully.</p>
                    </div>

                    <!-- Donation Details Card -->
                    <div class=" p-6 rounded-lg border border-lime-100 shadow-sm">
                        <div class="text-lg font-semibold text-gray-700 mb-4">Donation Details</div>
                        <div class="space-y-4 text-gray-600">
                            <div class="flex justify-between">
                                <span>Amount:</span>
                                <span class="font-semibold">${{ number_format($payment->amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Message:</span>
                                <span class="font-semibold">{{ $payment->message ?? 'No personal message provided' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Campaign:</span>
                                <span class="font-semibold">{{ $payment->campaign->title }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Status:</span>
                                <span class="font-semibold text-lime-600 border bg-lime-50 border-lime-600 px-4 rounded-3xl">Successful</span>
                            </div>
                        </div>
                    </div>

                    <!-- Call-to-Action Buttons -->
                    <div class="mt-8 flex justify-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-lime-600 to-lime-700 hover:from-lime-700 hover:to-lime-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-all duration-300 transform hover:scale-105">
                            Go Back to Homepage
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection