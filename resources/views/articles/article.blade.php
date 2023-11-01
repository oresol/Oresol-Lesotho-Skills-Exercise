@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex flex-wrap mt-10">
            <div class="w-full md:w-1/2 mb-4 md:mb-0">
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-1/2 md:w-3/4 h-auto rounded-lg">
            </div>

            <div class="w-full md:w-1/2">
                <div>
                    <h1 class="text-3xl font-semibold mb-4">{{ $article->title }}</h1>
                    <p class="text-gray-600">{{ $article->full_text }}</p>
                </div>
                <div class="mt-4">
                    <p class="text-gray-400">Tags: {{ $article->tags->pluck('name')->implode(', ') }}</p>
                    <p class="text-gray-400">Category: {{ $article->category->name }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
