@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Manage Articles</h1>
        <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Create New Article</a>

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border">Title</th>
                    <th class="border">Tags</th>
                    <th class="border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td class="border p-2">{{ $article->title }}</td>
                        <td class="border p-2">{{ $article->tags->pluck('name')->implode(', ') }}</td>
                        <td class="border p-2">
                            <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-4">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
