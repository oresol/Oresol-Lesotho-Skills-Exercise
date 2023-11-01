@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Create New Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <label for="name" class="block font-semibold">Name:</label>
            <input type="text" name="name" id="name" class="w-full border p-2 mb-4" required>

            <label for="description" class="block font-semibold">Description:</label>
            <textarea name="description" id="description" rows="4" class="w-full border p-2 mb-4" required></textarea>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Category</button>
        </form>
    </div>
@endsection
