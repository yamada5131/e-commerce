@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Product Name</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $product->name }}" required>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" id="price" name="price" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $product->price }}" required>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700">Category</label>
            <select id="category" name="category" class="w-full p-2 border border-gray-300 rounded-lg">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">Update</button>
    </form>
@endsection
