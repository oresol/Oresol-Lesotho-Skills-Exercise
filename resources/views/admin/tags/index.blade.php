@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Manage Tags</h1>
        <a href="{{ route('tags.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Create New Tag</a>

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border">Name</th>
                    <th class="border">Description</th>
                    <th class="border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td class="border p-2">{{ $tag->name }}</td>
                        <td class="border p-2">{{ $tag->description }}</td>
                        <td class="border p-2">
                            <a href="{{ route('tags.edit', $tag->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <!-- Display pagination links -->
         <div class="my-4">
            {{ $tags->links() }}
        </div>
    </div>
@endsection
