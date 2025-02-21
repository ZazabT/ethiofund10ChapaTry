<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen p-4 ">

    <!-- Flex container for image and form -->
    <div class="flex w-full rounded-2xl overflow-hidden">

        <!-- Leftside Image -->
        <div class="w-1/3 bg-cover bg-center hidden md:block" style="background-image: url('https://images.pexels.com/photos/3334646/pexels-photo-3334646.jpeg?auto=compress&cs=tinysrgb&w=600');">
        </div>

        <!-- Rightside Form -->
        <div class="w-full md:w-2/3 h-full flex justify-center items-center bg-white p-6">

            <!-- Form Container -->
            <div class="w-full max-w-md p-8">

                <!-- Website Name on Top -->
                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="text-xl font-semibold text-lime-500 hover:text-lime-600 hover:scale-105 transform transition duration-300 ease-in-out">
                        Ethio <span class="text-xl text-gray-700 hover:text-gray-600">Fund</span>
                    </a>
                </div>



                <!-- Welcome header -->
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Access to EthioFund</h2>
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

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-lime-500 focus:border-lime-500 transition duration-200" required value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                        <input type="password" id="password" name="password" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-lime-500 focus:border-lime-500 transition duration-200" required>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Display Flash Error Message if Login Failed -->
                    @if(session('error'))
                        <div class="text-red-500 text-sm mt-2">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Login Button -->
                    <button type="submit" class="w-full item-center flex justify-center bg-lime-500 text-white py-2 rounded-full font-semibold hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-lime-500 transition duration-200">
                        Login
                    </button>
                </form>

                <!-- Line Break -->
                <hr class="my-6 border-gray-300">

                <!-- Register Link -->
                <p class="mt-6 text-center text-sm text-gray-600">
                    New to EthioFund?
                    <a href="{{ route('show.register') }}" class="text-lime-500 hover:underline">Register</a>
                </p>

            </div>
        </div>

    </div>

</body>
</html>
