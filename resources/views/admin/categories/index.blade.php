@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Manage Categories</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Create New Category</a>

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border">Name</th>
                    <th class="border">Description</th>
                    <th class="border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="border p-2">{{ $category->name }}</td>
                        <td class="border p-2">{{ $category->description }}</td>
                        <td class="border p-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
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
            {{ $categories->links() }}
        </div>
    </div>
@endsection
