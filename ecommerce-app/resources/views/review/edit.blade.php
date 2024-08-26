<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Review') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Edit Review") }}
                </div>
            </div>

            <form action="{{ route('review.update', ['id' => $review->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                    <select id="rating" name="rating"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-input-label for="comment" :value="__('Comment')" />
                    <x-text-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                        value="{{ $review->comment }}" requied autocomplete="comment" />
                </div>

                <x-primary-button class="mt-4">
                    {{ __("Edit") }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>




