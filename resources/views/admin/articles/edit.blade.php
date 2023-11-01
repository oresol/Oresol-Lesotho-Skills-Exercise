@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Edit Article</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title" class="block font-semibold">Title:</label>
            <input type="text" name="title" id="title" class="w-full border p-2 mb-4" value="{{ $article->title }}" required>

            <label for="full_text" class="block font-semibold">Full Text:</label>
            <textarea name="full_text" id="full_text" rows="4" class="w-full border p-2 mb-4" required>{{ $article->full_text }}</textarea>

            <label for="image" class="block font-semibold">Image:</label>
            <input type="file" name="image" id="image" class="w-full border p-2 mb-4" accept="image/*">
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="mb-4 rounded-lg">

            <label for="tags" class="block font-semibold">Tags:</label>
            <input type="text" name="tags" id="tags" class="w-full border p-2 mb-4" value="{{ $article->tags->pluck('name')->implode(', ') }}">

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Article</button>
        </form>
    </div>
@endsection
