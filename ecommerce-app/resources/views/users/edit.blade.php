<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("User edit") }}
                </div>
            </div>
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mt-4">
                    <x-input-label for="first_name" :value="__('First name')" />
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
</x-app-layout>

