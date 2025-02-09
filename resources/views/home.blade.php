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
    <h2 class="text-4xl  text-gray-900 mb-3">
        Fund, <span class="text-lime-500">Fast As Flash</span>
    </h2>
    <p class="text-lg text-gray-600 ">
        Get started in just a few clicks! Create campaigns, share them across social media, 
        and receive funds instantly. Our secure and transparent system ensures fast transactions, 
        
    </p>
</div>

<!-- Cards Section -->
<section class="mt-12">
    <div class="grid md:grid-cols-3 gap-8">
        
        <!-- Card 1 -->
        <div class="p-8 bg-gray-50 shadow-lg rounded-2xl border border-gray-200 hover:shadow-xl transition duration-300">
            <h3 class="text-xl font-bold text-gray-800">Instant Campaign Setup</h3>
            <p class="mt-3 text-gray-600">Create a fundraising campaign in minutes and start receiving support instantly.</p>
        </div>

        <!-- Card 2 -->
        <div class="p-8 bg-gray-50 shadow-lg rounded-2xl border border-gray-200 hover:shadow-xl transition duration-300">
            <h3 class="text-xl font-bold text-gray-800">Secure & Fast Transactions</h3>
            <p class="mt-3 text-gray-600">We ensure safe and rapid payments so you can access funds without delays.</p>
        </div>

        <!-- Card 3 -->
        <div class="p-8 bg-gray-50 shadow-lg rounded-2xl border border-gray-200 hover:shadow-xl transition duration-300">
            <h3 class="text-xl font-bold text-gray-800">Global Reach</h3>
            <p class="mt-3 text-gray-600">Connect with donors and supporters from all over the world.</p>
        </div>

    </div>
</section>



<!-- Campain card sections Section -->


@endsection
