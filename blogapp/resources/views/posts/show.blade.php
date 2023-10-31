@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="card-body">
                    <h5 class="card-title fs-1 fw-bold text-center">{{ $article->title }}</h5>
                    <p class="card-text badge bg-success  fs-6">{{ $article->category->category_name }}</p>
                    <p class="card-text">
                        {{ $article->content }}</p>
                    @if (Auth::user())
                     <div class="d-flex gap-3">
                        <a href="/articles/{{ $article->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/articles/{{ $article->id }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>   
                    @endif       
                </div>
            </div>
        </div>
    </div>
@endsection
