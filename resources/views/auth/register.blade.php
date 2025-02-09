<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 text-center">Create an Account</h2>

        <!-- Success/Errors -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-500 text-white p-3 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" class="mt-6">
            @csrf

            <div class="flex gap-5">
                <!-- first_name -->
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 font-medium">Firstname</label>
                    <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                    @error('first_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- last_name -->
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 font-medium">Lastname</label>
                    <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                    @error('last_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                <input type="email" id="email" name="email" value="{{old('emil')}}"  class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" value="{{old('password')}}"  class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"  value="{{old('password_confirmation')}}" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
            </div>

            <!-- Register Button -->
            <button type="submit" class="w-full bg-lime-500 text-white py-2 rounded-md font-semibold hover:bg-lime-600 transition">
                Register
            </button>
        </form>

        <!-- Login Link -->
        <p class="mt-4 text-gray-600 text-center">
            Already have an account?
            <a href="{{ route('show.login') }}" class="text-lime-500 hover:underline">Log in</a>
        </p>

    </div>

</body>
</html>
