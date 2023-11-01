@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Create New Article</h1>
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title" class="block font-semibold">Title:</label>
            <input type="text" name="title" id="title" class="w-full border p-2 mb-4" required>

            <label for="full_text" class="block font-semibold">Full Text:</label>
            <textarea name="full_text" id="full_text" rows="4" class="w-full border p-2 mb-4" required></textarea>

            <label for="image" class="block font-semibold">Image:</label>
            <input type="file" name="image" id="image" class="w-full border p-2 mb-4" accept="image/*">

            <label for="category" class="block font-semibold">Category:</label>
            <select name="category" id="category" class="w-full border p-2 mb-4" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="tags" class="block font-semibold">Tags:</label>
            <input type="text" name="tags" id="tags" class="w-full border p-2 mb-4" placeholder="Tag1, Tag2, Tag3">

            <!-- <label for="tags" class="block font-semibold">Tags:</label>
            <select name="tags[]" id="tags" class="w-full border p-2 mb-4" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select> -->

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Article</button>
        </form>
    </div>

    <!-- Initialize Select2 for the tags field
    <script>
        $(document).ready(function() {
            $('#tags').select2({
                tags: true,
                tokenSeparators: [',', ' '], // Allow comma or space to separate tags
            });
        });
    </script> -->
@endsection

