<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Home</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navigation Bar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('home') }}" class="flex-shrink-0 text-xl font-bold text-gray-800">My Shop</a>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-medium">Home</a>
                        <a href="#" class="text-gray-500 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium">Shop</a>
                        <a href="#" class="text-gray-500 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div class="flex items-center">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="ml-4 text-gray-500 hover:text-gray-700">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700">Login</a>
                        <a href="{{ route('register') }}" class="ml-4 text-gray-500 hover:text-gray-700">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="flex">

                <!-- Filter Sidebar -->
                <aside class="w-1/4 pr-6">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-bold mb-4">Filters</h2>
                        <ul>
                            <li><a href="#" class="text-gray-700 hover:text-gray-900">Recently Visited</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-gray-900">Hotest</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-gray-900">Sort by Alphabet</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-gray-900">Sort by Rating</a></li>
                        </ul>
                    </div>
                </aside>

                <!-- Products Section -->
                <main class="w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach ($products as $id => $product)
                        <div class="bg-white p-4 rounded-lg shadow">
                            <a href="{{ route('product.show', ['id' => $id]) }}">
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover rounded">
                            </a>
                            <h3 class="mt-4 text-lg font-semibold"><a href="{{ route('product.show', ['id' => $id]) }}">{{ $product['name'] }}</a></h3>
                            <p class="text-gray-500">{{ $product['description'] }}</p>
                            <div class="mt-2 flex items-center">
                                <!-- Display stars for the product -->
                                @for ($i = 0; $i < $product['rating']; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801" class="text-yellow-400 fill-current">
                                        <path d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z"/>
                                    </svg>
                                @endfor
                                @for ($i = $product['rating']; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801" class="text-gray-300 fill-current">
                                        <path d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z"/>
                                    </svg>
                                @endfor
                                <!-- Number of ratings -->
                                <span class="ml-2 text-gray-600">({{ $product['ratings_count'] }} reviews)</span>
                            </div>
                        </div>
                    @endforeach

                </main>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-8 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">My Shop</h3>
                    <p class="mt-2">Your one-stop shop for all things cool and trendy.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">Quick Links</h4>
                    <ul class="mt-2 space-y-2">
                        <li><a href="#" class="hover:text-white">Home</a></li>
                        <li><a href="#" class="hover:text-white">Shop</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">Contact Us</h4>
                    <ul class="mt-2 space-y-2">
                        <li>Email: support@myshop.com</li>
                        <li>Phone: +123 456 7890</li>
                        <li>Address: 123 Main Street, Anytown</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
