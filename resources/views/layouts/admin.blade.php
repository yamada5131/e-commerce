<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title')</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    @include('layouts.adminNavigation')

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow">
            @yield('content')
        </div>
    </div>

    <script>
        // JavaScript to toggle between tables
        yield('scripts')
    </script>
</body>
</html>
