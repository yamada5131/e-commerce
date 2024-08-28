@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create Category</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Category Name</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-lg" rows="4"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Create</button>
    </form>
@endsection
