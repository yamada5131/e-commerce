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
    @include('layouts.navigation')
    
    <!-- Main Content -->
    <div class="flex-grow">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <a href="{{ route('products.show', ['product' => $product->id]) }}">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                        </a>
                        <h3 class="mt-4 text-lg font-semibold">
                            <a href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-gray-500">{{ $product->description }}</p>
                        <p class="text-gray-600 mt-2">Category: {{ $product->category?->name }}</p>
                        <p class="text-gray-800 font-bold mt-2">${{ number_format($product->price, 2) }}</p>
                        <div class="mt-2 flex items-center">
                            <!-- Display stars for the product -->
                            @for ($i = 0; $i < floor($product->user_reviews_avg_rating); $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801"
                                    class="text-yellow-400 fill-current">
                                    <path
                                        d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z" />
                                </svg>
                            @endfor
                            @for ($i = $product->user_reviews_avg_rating; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801"
                                    class="text-gray-300 fill-current">
                                    <path
                                        d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z" />
                                </svg>
                            @endfor
                            <span class="ml-2 text-gray-600">{{ $product->user_reviews_avg_rating ? number_format($product->user_reviews_avg_rating, 1) : 0 }}</span>
                            <span class="ml-2 text-gray-600">({{ $product->user_reviews_count }} reviews)</span>
                        </div>
                    </div>
                @endforeach
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
