@extends('layouts.admin')

@section('content')
<h1>Create new category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <!-- Các trường form -->
    <input type="text" name="name" placeholder="Name">
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Create</button>
</form>
@endsection
