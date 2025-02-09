<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'EthioFund' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

    <!-- Nav bar -->
    <header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md py-4 z-50  rounded-2xl">
        <div class="container mx-auto flex justify-between items-center px-8">
            
            <!-- Left: Logo & Navbar -->
            <div class="flex items-center space-x-6">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-3xl font-extrabold tracking-wide hover:scale-110 transition duration-500">
                    <span class="text-lime-500 font-serif">Ethio</span>
                    <span class="text-gray-800 font-sans">Fund</span>
                </a>

                <!-- Vertical Line -->
                <div class="h-6 w-px bg-gray-300"></div>

                <!-- Navigation Links -->
                <nav class="flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-800 hover:text-lime-500 font-semibold text-md transition duration-300">Home</a>
                    <a href="#" class="text-gray-800 hover:text-lime-500 font-semibold text-md transition duration-300">How It Works</a>
                    <a href="#" class="text-gray-800 hover:text-lime-500 font-semibold text-md transition duration-300">About Us</a>
                </nav>
            </div>

            <!-- Right: Authentication Links -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('show.login') }}" class="text-gray-700 hover:text-lime-500 font-medium text-md transition duration-300">Login</a>
                <a href="{{ route('show.register') }}" class="px-5 py-2 bg-lime-500 bg-opacity-70 text-gray-900 font-bold text-md rounded-lg shadow-md transition duration-300 hover:bg-opacity-50">
                    Register
                </a>
            </div>

        </div>
    </header>




    <!-- Page Content -->
    <main class="container mx-auto px-6 mt-10 pt-14">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6 mt-10">
        <p>&copy; {{ date('Y') }} EthioFund. All rights reserved.</p>
    </footer>

</body>
</html>
