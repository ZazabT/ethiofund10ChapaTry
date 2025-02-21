<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex max-h-screen p-4">

    <!-- Flex container for image and form -->
    <div class="flex w-full rounded-2xl overflow-hidden">

         <!-- Rightside Image -->
        <div class="w-1/3 bg-cover bg-center hidden md:block" style="background-image: url('https://images.pexels.com/photos/3334646/pexels-photo-3334646.jpeg?auto=compress&cs=tinysrgb&w=600');">
        </div>
        <!-- Leftside Form -->
        <div class="w-full md:w-2/3 h-full flex justify-center items-center p-6">

            <!-- Form Container -->
            <div class="w-full max-w-md p-8">

                <!-- Website Name on Top -->
                <div class="text-center mb-8 hover:scale-95 transform transition duration-500 ease-in-out">
                    <a href="{{ route('home') }}" class="text-lg  text-lime-500 hover:text-lime-600 hover:scale-105 transform transition duration-500 ease-in-out">
                        Ethio <span class="text-lg text-gray-700 hover:text-gray-600">Fund</span>
                    </a>
                </div>



                <!-- Welcome header -->
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Create an Account</h2>
                </div>

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
                        <div class="mb-4 w-1/2">
                            <label for="first_name" class="block text-gray-700 font-medium">Firstname</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                            @error('first_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <!-- last_name -->
                        <div class="mb-4 w-1/2">
                            <label for="last_name" class="block text-gray-700 font-medium">Lastname</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
                            @error('last_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 w-full px-4 py-2 border rounded-md focus:ring focus:ring-lime-500 focus:border-lime-500" required>
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
                    <button type="submit" class="w-full bg-lime-500 text-white py-2 rounded-full font-semibold hover:bg-lime-600 transition">
                        Register
                    </button>
                </form>

                <!-- Login Link -->
                <p class="mt-4 text-gray-600 text-center">
                    Already have an account?
                    <a href="{{ route('show.login') }}" class="text-lime-500 hover:underline">Log in</a>
                </p>

            </div>
        </div>

       
    </div>

</body>
</html>
