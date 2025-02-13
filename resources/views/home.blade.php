@extends('layout')

@section('content')

<!-- Hero Section -->
<section class="relative bg-cover bg-center bg-no-repeat text-white text-center rounded-2xl min-h-[calc(100vh-150px)] flex items-center justify-center overflow-hidden"
    style="background-image: url('https://images.pexels.com/photos/8078358/pexels-photo-8078358.jpeg?auto=compress&cs=tinysrgb&w=600');">
    
    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-10 rounded-2xl"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-3xl mx-auto text-center px-6">
        <h1 class="text-6xl font-extrabold tracking-wide font-sans leading-tight">
            Support & Fundraise for a Cause
        </h1>
        <p class="mt-4 text-lg font-light text-white max-w-2xl mx-auto leading-relaxed">
            Join a vibrant community of changemakers, philanthropists, and visionaries working together 
            to drive real impact.
        </p>
    </div>

    <!-- CTA Button Positioned Bottom Right -->
    <a href="{{ route('campaign.create') }}" class="absolute bottom-10 right-4 px-6 py-3 bg-lime-500 bg-opacity-70 hover:scale-95 text-gray-900 font-bold rounded-2xl shadow-md hover:bg-lime-600 hover:bg-opacity-50 transition duration-300">
        Start Campaign
    </a>
</section>

<!-- Heading Section -->
<div class="mt-20">
    <h2 class="text-4xl text-gray-900 mb-3">
        Fund, <span class="text-lime-500">Fast As Flash</span>
    </h2>
    <p class="text-lg text-gray-600">
        Get started in just a few clicks! Create campaigns, share them across social media, 
        and receive funds instantly. Our secure and transparent system ensures fast transactions
    </p>
</div>

<!-- Cards Section -->
<section class="mt-12">
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="group relative p-8 bg-white shadow-2xl shadow-[0_4px_6px_rgba(50,205,50,0.3)] rounded-2xl border-l-4 border-lime-400 hover:border-lime-500 transition-all duration-300 hover:-translate-y-2">
            <div class="absolute top-6 -left-4 w-8 h-8 bg-lime-400 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Instant Campaign Setup</h3>
            <p class="text-gray-600 leading-relaxed">Create a fundraising campaign in minutes and start receiving support instantly.</p>
            <div class="mt-6 w-full h-1 bg-gray-200 rounded-full overflow-hidden">
                <div class="w-1/3 h-full bg-lime-400 transition-all duration-500 group-hover:w-full"></div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="group relative p-8 bg-white shadow-2xl shadow-[0_4px_6px_rgba(70,130,180,0.3)] rounded-2xl border-l-4 border-blue-400 hover:border-blue-500 transition-all duration-300 hover:-translate-y-2">
            <div class="absolute top-6 -left-4 w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Secure & Fast Transactions</h3>
            <p class="text-gray-600 leading-relaxed">We ensure safe and rapid payments so you can access funds without delays.</p>
            <div class="mt-6 w-full h-1 bg-gray-200 rounded-full overflow-hidden">
                <div class="w-1/3 h-full bg-blue-400 transition-all duration-500 group-hover:w-full"></div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="group relative p-8 bg-white shadow-2xl shadow-[0_4px_6px_rgba(138,43,226,0.3)] rounded-2xl border-l-4 border-purple-400 hover:border-purple-500 transition-all duration-300 hover:-translate-y-2">
            <div class="absolute top-6 -left-4 w-8 h-8 bg-purple-400 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Global Reach</h3>
            <p class="text-gray-600 leading-relaxed">Connect with donors and supporters from all over the world.</p>
            <div class="mt-6 w-full h-1 bg-gray-200 rounded-full overflow-hidden">
                <div class="w-1/3 h-full bg-purple-400 transition-all duration-500 group-hover:w-full"></div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Campaigns Section -->
<section class="mt-20">
    <div class="mb-12">
        <h2 class="text-4xl font-bold text-gray-900">
            Featured <span class="text-lime-500">Campaigns</span>
        </h2>
        <p class="mt-2 text-lg text-gray-600">
            Explore some of the most impactful campaigns on our platform.
        </p>
    </div>

    @if ($campaigns->isEmpty())
    <div class="flex justify-center items-center py-12 ">
        <p class="text-xl text-gray-600">No campaigns available</p>
    </div>
    @endif
    <div class="grid md:grid-cols-3 gap-8">

        @foreach($campaigns as $campaign)
        <div class="group relative bg-white border border-lime-100 shadow-md overflow-hidden hover:shadow-3xl transition-all duration-500 hover:-translate-y-2">
            {{-- <!-- Image Container -->
            <div class="h-48 bg-gray-200 overflow-hidden relative">
                <img src="https://source.unsplash.com/random/800x600?sig={{ $loop->index }}" 
                     alt="Campaign image" 
                     class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60"></div>
            </div> --}}



              <!-- Hover Badge -->
              @if ($campaign->status == 'active')
              <div class="absolute bottom-0 right-0 bg-lime-500 text-white px-5 py-1 rounded-full text-sm transform -translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                  Active
              </div>
              @elseif ($campaign->status == 'completed')
              <div class="absolute bottom-0 right-0  bg-gray-500 text-white px-3 py-1 rounded-full text-sm transform -translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                  Completed 
              </div>
              @elseif ($campaign->status == 'expired')
                  <div class="absolute bottom-0 right-0  bg-red-500 text-white px-3 py-1 rounded-full text-sm transform -translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                      Expired 
                  </div>
              @endif

            <!-- Content -->
            <div class="p-6">
                <!-- Progress Bar -->
                <div class="mb-4">
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-lime-500 font-semibold">Raised ${{ number_format($campaign->raised_amount, 0) }}</span>
                        <span class="text-gray-500">Goal ${{ number_format($campaign->goal_amount, 0) }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-lime-500 h-2 rounded-full" 
                             style="width: {{ ($campaign->raised_amount / $campaign->goal_amount) * 100 }}%"></div>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $campaign->title }}</h3>
                <p class="text-gray-600 line-clamp-3 mb-4">{{ $campaign->description }}</p>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('campaign.show', $campaign->id) }}" 
                       class="flex items-center text-lime-600 font-semibold hover:text-lime-700 transition-colors">
                        Read More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <span class="text-sm text-gray-500">{{ $campaign->created_at->diffForHumans() }}</span>
                </div>
            </div>

          

        </div>
        @endforeach
    </div>
</section>

@endsection