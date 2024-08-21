<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('dashboard') }}" class="flex-shrink-0 text-xl font-bold text-gray-800">My Shop</a>
                </div>
                <div class="flex items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="ml-4 text-gray-500 hover:text-gray-700">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="mb-4 flex space-x-4">
                <button id="show-users" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Users</button>
                <button id="show-products" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Products</button>
                <button id="show-categories" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Categories</button>
            </div>

            <!-- Users Table -->
            <div id="users-table" class="hidden">
                <h2 class="text-2xl font-bold mb-4">Users</h2>
                <button class="mb-4 px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Create User</button>
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">Name</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center py-2">{{ $user['id'] }}</td>
                                <td class="text-center py-2">{{ $user['name'] }}</td>
                                <td class="text-center py-2">{{ $user['email'] }}</td>
                                <td class="text-center py-2">
                                    <button class="px-3 py-1 bg-black text-white rounded-lg hover:bg-gray-700">Edit</button>
                                    <button class="px-3 py-1 bg-black text-white rounded-lg hover:bg-gray-700">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Products Table -->
            <div id="products-table" class="hidden">
                <h2 class="text-2xl font-bold mb-4">Products</h2>
                <button class="mb-4 px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Create Product</button>
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">Name</th>
                            <th class="py-2">Price</th>
                            <th class="py-2">Category</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-center py-2">{{ $product['id'] }}</td>
                                <td class="text-center py-2">{{ $product['name'] }}</td>
                                <td class="text-center py-2">{{ $product['price'] }}</td>
                                <td class="text-center py-2">{{ $categories[$product['category_id']]['name'] }}</td>
                                <td class="text-center py-2">
                                    <button class="px-3 py-1 bg-black text-white rounded-lg hover:bg-gray-700">Edit</button>
                                    <button class="px-3 py-1 bg-black text-white rounded-lg hover:bg-gray-700">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Categories Table -->
            <div id="categories-table" class="hidden">
                <h2 class="text-2xl font-bold mb-4">Categories</h2>
                <button class="mb-4 px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Create Category</button>
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">Name</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center py-2">{{ $category['id'] }}</td>
                                <td class="text-center py-2">{{ $category['name'] }}</td>
                                <td class="text-center py-2">
                                    <button class="px-3 py-1 bg-black text-white rounded-lg hover:bg-gray-700">Edit</button>
                                    <button class="px-3 py-1 bg-black text-white rounded-lg hover:bg-gray-700">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript to toggle between tables -->
    <script>
        document.getElementById('show-users').addEventListener('click', function() {
            document.getElementById('users-table').style.display = 'block';
            document.getElementById('products-table').style.display = 'none';
            document.getElementById('categories-table').style.display = 'none';
        });

        document.getElementById('show-products').addEventListener('click', function() {
            document.getElementById('users-table').style.display = 'none';
            document.getElementById('products-table').style.display = 'block';
            document.getElementById('categories-table').style.display = 'none';
        });

        document.getElementById('show-categories').addEventListener('click', function() {
            document.getElementById('users-table').style.display = 'none';
            document.getElementById('products-table').style.display = 'none';
            document.getElementById('categories-table').style.display = 'block';
        });

        // Show the products table by default
        document.getElementById('products-table').style.display = 'block';
    </script>
</body>
</html>
