@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 mt-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Create a New Campaign</h2>

    @if (session('error'))
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Campaign Title</label>
            <input type="text" name="title" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-lime-500 focus:border-lime-500" placeholder="Enter campaign title" value="{{ old('title') }}">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-lime-500 focus:border-lime-500" placeholder="Describe your campaign...">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Goal Amount -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Goal Amount (Birr)</label>
            <input type="number" name="goal_amount" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-lime-500 focus:border-lime-500" placeholder="Enter goal amount" value="{{ old('goal_amount') }}">
            @error('goal_amount') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

           <!-- Deadline -->
           <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Deadline</label>
            <input type="date" name="deadline" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-lime-500 focus:border-lime-500" placeholder="Enter goal amount" value="{{ old('goal_amount') }}">
            @error('deadline') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-lime-500 text-white py-3 rounded-lg font-bold hover:bg-lime-600 transition duration-300">
                Create Campaign
            </button>
        </div>
    </form>
</div>
@endsection
