@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Product Name</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" id="price" name="price" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700">Category</label>
            <select id="category" name="category" class="w-full p-2 border border-gray-300 rounded-lg">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Create</button>
    </form>
@endsection
