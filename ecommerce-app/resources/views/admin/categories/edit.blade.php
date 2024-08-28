@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Category</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Category Name</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $category->name }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-lg" rows="4">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Update</button>
    </form>
@endsection
