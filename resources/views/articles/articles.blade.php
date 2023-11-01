@extends('layouts.app')

@section('content')


    <div class="text-center my-4 text-gray-500">
        <h1 class="text-3xl font-semibold">Latest Articles</h1>
    </div>

    <div class="flex flex-wrap">

            @foreach($articles as $article)
            <div class="w-full sm:w-1/2 lg:w-1/2 xl:w-1/2 p-4">
                <div class="ax-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                    <div class="md:flex">
                        <div class="md:shrink-0 h-48 w-48 ">
                            <img class=" w-full object-cover md:h-full md:w-48" src="{{ asset('storage/' . $article->image) }}" alt="Article Image">
                        </div>
                        <div class="p-8">

                            <a href="{{ route('viewArticle', $article->id) }}" class="uppercase tracking-wide text-sm text-indigo-500 font-semibold hover:underline">{{ $article->title }}</a>
                            <div class="mt-1">
                                <div class="text-slate-1" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 20em;">
                                    {{ $article->full_text }}
                                </div>

                            </div>
                            <a href="{{ route('viewArticle', $article->id) }}" class="block mt-1 text-blue-500 font-medium cursor-pointer">
                                View More
                            </a>

                            <div class="block mt-1 text-sm leading-tight font-medium text-grey text-right">
                                Posted by: {{ App\Models\User::find($article->user_id)->name }}
                            </div>
                            <div class="block mt-1 text-sm leading-tight font-medium text-grey text-right">
                                On: {{ $article->created_at }}
                            </div>
                            <div class="block  text-sm mt-5 text-red-500 leading-tight font-medium text-grey text-right">
                               Tags :  {{ $article->tags->pluck('name')->implode(', ') }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            @endforeach
            <!-- Display pagination links -->
            <div class="my-4">
                {{ $articles->links() }}
            </div>
    </div>



@endsection
