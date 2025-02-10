@extends('layout')

@section('content')

<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Navigation -->
        <div class="mb-8">
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-lime-600 hover:text-lime-700 font-medium transition duration-300">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Campaigns
            </a>
        </div>

        <!-- Campaign Header -->
        <div class=" overflow-hidden">
            <!-- Image Section -->
            <div class="relative h-64 bg-cover bg-center" style="background-image: url('{{ $campaign->image_url }}');">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <h1 class="text-5xl font-bold text-white text-center">{{ $campaign->title }}</h1>
                </div>
            </div>

            <!-- Title Section -->
            <div class="px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">
                            Created on {{ $campaign->created_at->format('M d, Y') }}
                        </p>
                    </div>
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-lime-100 text-lime-700">
                        Active Campaign
                    </span>
                </div>
            </div>
        </div>

        <!-- Progress Section -->
        <div class="mt-8 p-8 ">
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-between mb-3">
                    <span class="text-base font-medium text-lime-600">Raised</span>
                    <span class="text-base font-medium text-gray-500">Goal</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-lime-500 rounded-full h-4 transition-all duration-500" 
                         style="width: {{ ($campaign->raised_amount / $campaign->goal_amount) * 100 }}%">
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <span class="text-2xl font-bold text-lime-600">${{ number_format($campaign->raised_amount, 2) }}</span>
                    <span class="text-2xl font-bold text-gray-900">${{ number_format($campaign->goal_amount, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="mt-8 grid gap-8 md:grid-cols-3">
            <!-- Main Content -->
            <div class="md:col-span-2">
                <div class="p-8 ">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">About the Campaign</h2>
                    <div class="prose max-w-none text-gray-600">
                        <p class="text-lg leading-relaxed">{{ $campaign->description }}</p>
                        
                        <h3 class="text-xl font-semibold mt-8 text-gray-900">Why Your Support Matters</h3>
                        <p class="mt-4 text-gray-600">Our initiative focuses on creating sustainable change through community-driven solutions. Your contribution directly impacts:</p>
                        <ul class="mt-4 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-lime-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Education and vocational training programs
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-lime-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Healthcare access for underserved communities
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-lime-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Sustainable infrastructure development
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Donation Card -->
            <div class=" p-8 h-fit sticky top-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Make a Difference</h3>
                <form action="{{ route('donate') }}" method="POST">
                    @csrf

                    <!-- Hidden field for Campaign ID -->
                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Amount</label>
                        <div class="grid grid-cols-3 gap-3">
                            <input type="number" name="amount" class="col-span-3 mt-2 p-2 border rounded-lg focus:ring-lime-500 focus:border-lime-500" placeholder="Custom amount">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Personal Message</label>
                        <textarea name="message" rows="4" id="message" class="w-full p-3 border rounded-lg focus:ring-lime-500 focus:border-lime-500" placeholder="Share words of encouragement..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 px-6 bg-lime-600 hover:bg-lime-700 text-white font-semibold rounded-lg transition-all">
                        Donate Now
                    </button>
                </form>
            </div>
        </div>

        <!-- Impact Section -->
        <div class="mt-12 p-8 ">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Your Impact in Numbers</h2>
                <div class="grid md:grid-cols-3 gap-8 mt-6">
                    <div class="p-4 rounded-lg shadow-sm">
                        <div class="text-4xl font-bold text-lime-600">1,200+</div>
                        <div class="mt-2 text-gray-600">Lives Impacted</div>
                    </div>
                    <div class="p-4 rounded-lg shadow-sm">
                        <div class="text-4xl font-bold text-lime-600">85%</div>
                        <div class="mt-2 text-gray-600">Program Efficiency</div>
                    </div>
                    <div class="p-4  rounded-lg shadow-sm">
                        <div class="text-4xl font-bold text-lime-600">24/7</div>
                        <div class="mt-2 text-gray-600">Support Coverage</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection