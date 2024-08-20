<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ecommerce App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 h-screen flex items-center justify-center">
    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Logo">
    <h1 class="text-center font-bold text-4xl">Hello, 世界</h1>
</body>

</html>
