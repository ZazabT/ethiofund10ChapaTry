@extends('layout')

@section('content')
    <div class="flex justify-center items-center ">
        <div class="max-w-2xl w-full mx-4 sm:mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-xl overflow-hidden transform transition-all duration-500 hover:scale-105">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-red-500 to-red-600 p-8 text-center">
                    <h2 class="text-3xl font-bold text-white mb-4 ">Oops! Something Went Wrong</h2>
                    <p class="text-sm text-red-100 opacity-90">We were unable to process your donation. Please check your payment details and try again.</p>
                </div>

                <!-- Content Section -->
                <div class="p-8 bg-white">
                    <div class="text-center mb-6">
                        <svg class="mx-auto h-20 w-20 text-red-600 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-2xl font-semibold text-gray-800 mt-4">Donation Failed</h3>
                        <p class="text-gray-600 mt-2">Your donation for <strong class="text-red-600">{{ $payment->campaign->title }}</strong> could not be processed.</p>
                    </div>

                    <!-- Donation Details Card -->
                    <div class="p-6 rounded-lg border border-gray-200 ">
                        <div class="text-lg font-semibold text-gray-700 mb-4">Donation Details</div>
                        <div class="space-y-4 text-gray-600">
                            <div class="flex justify-between">
                                <span>Amount:</span>
                                <span class="font-semibold">${{ number_format($payment->amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Message:</span>
                                <span class="font-semibold">{{ $payment->message ?? 'No message provided' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Campaign:</span>
                                <span class="font-semibold">{{ $payment->campaign->title }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Status:</span>
                                <span class="font-semibold text-red-600 border bg-red-50 border-red-600 px-4 rounded-3xl">Failed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Call-to-Action Buttons -->
                    <div class="mt-8 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300 transform hover:scale-105">
                            Go Back Home
                        </a>
                        <a href="" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 transform hover:scale-105">
                            Try Again
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection