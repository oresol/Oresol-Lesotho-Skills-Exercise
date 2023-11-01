@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name" class="block font-semibold">Name:</label>
            <input type="text" name="name" id="name" class="w-full border p-2 mb-4" value="{{ $category->name }}" required>

            <label for="description" class="block font-semibold">Description:</label>
            <textarea name="description" id="description" rows="4" class="w-full border p-2 mb-4" required>{{ $category->description }}</textarea>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Category</button>
        </form>
    </div>
@endsection
