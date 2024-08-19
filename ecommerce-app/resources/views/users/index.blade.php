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
                    {{ __("User list") }}
                </div>
            </div>
            <a href="{{ route('users.create') }}">
                <x-primary-button class="mt-4">
                    {{ __('Create new user') }}
                </x-primary-button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">#</th>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">Name</th>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">Username</th>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">Telephone</th>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <th class="text-gray-900 dark:text-gray-100 text-center" scope="row">{{ $index + 1 }}</th>
                            <td class="text-gray-900 dark:text-gray-100 text-center">
                                <a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->fullname }}</a>
                            </td>
                            <td class="text-gray-900 dark:text-gray-100 text-center">{{ $user->username }}</td>
                            <td class="text-gray-900 dark:text-gray-100 text-center">{{ $user->telephone }}</td>                           </td>
                            <td class="text-gray-900 dark:text-gray-100 justify-center gap-2 flex">
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                    <x-primary-button class="mt-4">
                                        {{ __('Edit') }}
                                    </x-primary-button>
                                </a>
                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button class="mt-4" type="submit">
                                        {{ __('Delete') }}
                                    </x-primary-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

