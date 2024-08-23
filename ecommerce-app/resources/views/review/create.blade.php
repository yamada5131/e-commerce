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
    @include('layouts.adminNavigation')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Create new user") }}
                </div>
            </div>
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                @method('POST')
                <div class="mt-4">
                    <x-input-label for="first_name" :value="__('First name')" />
                    <x-text-input id="first_name" class="block mt-1 w-full"
                        type="text"
                        name="first_name"
                        required autocomplete="name" />
                    <x-input-label for="last_name" :value="__('Last name')" />
                    <x-text-input id="last_name" class="block mt-1 w-full"
                        type="text"
                        name="last_name"
                        required autocomplete="name" />
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full"
                        type="text"
                        name="username"
                        required autocomplete="username" />
                    <x-input-label for="email" :value="__('E-mail')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                        type="text"
                        name="email"
                        required autocomplete="email" />
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="password" />
                    <x-input-label for="telephone" :value="__('Telephone')" />
                    <x-text-input id="telephone" class="block mt-1 w-full"
                        type="tel"
                        name="telephone"
                        required autocomplete="tel" />
                </div>
                <x-primary-button class="mt-4">
                    {{ __('Create') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</body>
</html>
