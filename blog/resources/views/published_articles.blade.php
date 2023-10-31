@extends('layouts.author_dashboard')

@section('content')

<div class="container text-center">
    <h1>Articles Published by Author</h1>
</div>
@if(session('message'))
            <div class="alert alert-danger">
              {{ session('message') }}
            </div>
          @endif

          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
<div class="container" style="margin-left: 20%;">
    <div class="row">
    @foreach ( $author_articles as $article )
        <div class="col-12 col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->article_title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Author: {{ $article->author_name }}</h6>
                    <p class="card-text">  {{ substr($article->article_body, 0, 200) }}{{ strlen($article->article_body) > 200 ? '...' : '' }}
                        <span class="article-content" style="display: none;">{{ substr($article->article_body, 200) }}</span>
                    </p>
                    <a href="{{ route('author_articles', ['id' => $article->id]) }}" class="card-link">Read More</a>
                    <a href="#" class="card-link">Update</a>
                    <a href="#" class="btn btn-danger" data-action="{{ route('delete_article', $article->id) }}" data-toggle="modal" data-target="#deleteModal{{$article->id }}" data-article-id="{{ $article->id }}">Delete</a>

                </div>
            </div>
        </div>
    @endforeach


    @foreach ($author_articles as $article)
    <div class="modal" id="deleteModal{{$article->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('delete_article',$article->id) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Article Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete Article details of {{$article->article_title}}?</p>
                    </div>
                    <div class="modal-footer">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <input class="btn btn-danger" type="submit" value="Delete" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
 
     
<!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
