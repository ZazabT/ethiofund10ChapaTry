<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 text-center">Login</h2>

        <form method="POST" action="" class="mt-6">
            @csrf

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

            <!-- Login Button -->
            <button type="submit" class="w-full bg-lime-500 text-white py-2 rounded-md font-semibold hover:bg-lime-600 transition">
                Login
            </button>
        </form>

        <!-- Register Link -->
        <p class="mt-4 text-gray-600 text-center">
            Don't have an account?
            <a href="{{ route('show.register') }}" class="text-lime-500 hover:underline">Register</a>
        </p>
    </div>

</body>
</html>
