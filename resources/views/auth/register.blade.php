@extends('layout')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-8">
        <h2 class="text-3xl font-bold text-gray-800 text-center">Create an Account</h2>
        <!-- Registration Form -->
        <form method="POST" action="" class="mt-6">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Full Name</label>
                <input type="text" id="name" name="name" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                <input type="email" id="email" name="email" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
            </div>

            <!-- Register Button -->
            <button type="submit" class="w-full bg-lime-500 text-white py-2 rounded-md font-semibold hover:bg-lime-600 transition">
                Register
            </button>
        </form>
        <!-- Login Link -->
        <p class="mt-4 text-gray-600 text-center">
            Already have an account?
            <a href="{{route('show.login')}}" class="text-lime-500 hover:underline">Log in</a>
        </p>

    </div>
</div>
@endsection
