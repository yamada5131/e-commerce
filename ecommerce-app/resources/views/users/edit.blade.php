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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("User edit") }}
                </div>
            </div>
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mt-4">
                    <x-input-label for="first_name" :value="__('First name')"/>
                    <x-text-input id="name" class="block mt-1 w-full"
                        type="text"
                        name="first_name"
                        value="{{ $user->first_name }}"
                        required autocomplete="given-name" />
                </div>
                <div class="mt-4">
                    <x-input-label for="last_name" :value="__('Last name')" />
                    <x-text-input id="name" class="block mt-1 w-full"
                        type="text"
                        name="last_name"
                        value="{{ $user->last_name }}"
                        required autocomplete="family-name" />
                </div>
                <div class="mt-4">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full"
                        type="text"
                        name="username"
                        value="{{ $user->username }}"
                        required autocomplete="username" />
                </div>
                <div class="mt-4">
                    <x-input-label for="telephone" :value="__('Telephone')" />
                    <x-text-input id="telephone" class="block mt-1 w-full"
                        type="tel"
                        name="telephone"
                        value="{{ $user->telephone }}"
                        required autocomplete="tel" />
                </div>
                <x-primary-button class="mt-4">
                    {{ __('Edit') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</body>
</html>
