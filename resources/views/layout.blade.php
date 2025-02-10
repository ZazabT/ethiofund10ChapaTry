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
            @auth
                <!-- Display user's name and email if logged in -->
                <span class="text-gray-700 font-medium text-md">
                    Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </span>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-600 font-medium text-md transition duration-300">
                        Logout
                    </button>
                </form>
            @else
                <!-- If not authenticated, show Login and Register links -->
                <a href="{{ route('show.login') }}" class="text-gray-700 hover:text-lime-500 font-medium text-md transition duration-300">Login</a>
                <a href="{{ route('show.register') }}" class="px-5 py-2 bg-lime-500 bg-opacity-70 text-gray-900 font-bold text-md rounded-lg shadow-md transition duration-300 hover:bg-opacity-50">
                    Register
                </a>
            @endauth
        </div>


        </div>
    </header>




    <!-- Page Content -->
    <main class="container mx-auto px-6 mt-10 pt-14">
        @yield('content')
    </main>

    <!-- Footer -->
<footer class="bg-gray-900 text-white py-12 mt-40 rounded-2xl mx-10">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-4 gap-2">
        
        <!-- Logo & Tagline -->
        <div class="md:col-span-2">
            <a href="{{ route('home') }}" class="text-4xl font-extrabold tracking-wide hover:scale-105 transition duration-300 inline-block">
                <span class="text-lime-500 font-serif">Ethio</span>
                <span class="text-white font-sans">Fund</span>
            </a>
            <p class="text-gray-400 mt-4 text-sm leading-relaxed">
                Empowering change, one donation at a time. Join us in making a difference for communities in need.
            </p>
            <div class="mt-6 flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-lime-500 transition duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-lime-500 transition duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-lime-500 transition duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-lime-500 transition duration-300">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-semibold text-lime-400 mb-4">Quick Links</h3>
            <ul class="space-y-3">
                <li><a href="#" class="text-gray-400 hover:text-lime-300 transition duration-300">Home</a></li>
                <li><a href="#" class="text-gray-400 hover:text-lime-300 transition duration-300">Campaigns</a></li>
                <li><a href="#" class="text-gray-400 hover:text-lime-300 transition duration-300">Sign Up</a></li>
                <li><a href="#" class="text-gray-400 hover:text-lime-300 transition duration-300">Login</a></li>
            </ul>
        </div>

        <!-- Contact Information -->
        <div>
            <h3 class="text-lg font-semibold text-lime-400 mb-4">Contact Us</h3>
            <ul class="space-y-3">
                <li class="text-gray-400">Email: <a href="mailto:support@ethiofund.com" class="hover:text-lime-300 transition duration-300">support@ethiofund.com</a></li>
                <li class="text-gray-400">Phone: <a href="tel:+1234567890" class="hover:text-lime-300 transition duration-300">+123 456 7890</a></li>
                <li class="text-gray-400">Address: Addis Ababa, Ethiopia</li>
            </ul>
        </div>

        <!-- Newsletter Subscription -->
        <div>
            <h3 class="text-lg font-semibold text-lime-400 mb-4">Subscribe to Our Newsletter</h3>
            <form class="flex flex-col space-y-3">
                <input type="email" placeholder="Your email address" class="p-2 rounded-lg bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-lime-500">
                <button type="submit" class="bg-lime-500 text-white py-2 px-4 rounded-lg hover:bg-lime-600 transition duration-300">Subscribe</button>
            </form>
        </div>
    </div>

    <!-- Copyright -->
    <div class="border-t border-gray-800 mt-10 pt-8 text-center">
        <p class="text-gray-400 text-sm">
            &copy; 2023 EthioFund. All rights reserved.
        </p>
    </div>
</footer>

<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>


</body>
</html>
