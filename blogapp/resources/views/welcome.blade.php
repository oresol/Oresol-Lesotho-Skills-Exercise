@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            @if (!empty($articles) && $articles->count())
                @foreach ($articles as $article)
                    <div class="col-sm-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="fs-2 fw-bold text-center">{{ $article->title }}</h5>
                                <p class="card-text badge bg-success fs-6">{{ $article->category->category_name }}</p>
                                <p class="card-text text-truncate overflow-hidden" style="max-height: 6.6rem;">
                                    {{ $article->content }}
                                </p>
                                <a href="/articles/{{ $article->id }}" class="btn btn-primary">Read Article</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-2 fw-bold text-center">No Articles</h5>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
        </div>
        {!! $articles->links()!!}
       </div>
        @endsection
