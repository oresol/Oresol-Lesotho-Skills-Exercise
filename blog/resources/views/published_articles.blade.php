@extends('layouts.author_dashboard')

@section('content')

<div class="container text-center">
    <h1>Articles Published by Author</h1>
</div>

<div class="container" style="margin-left: 20%;">
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
                    <a href="{{ route('author_articles', ['id' => $article->id]) }}" class="btn btn-success">Read More</a>
                    <a href="{{ route('edit_article',$article->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$article->id }}">Edit</a>
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


@foreach ($author_articles as $article)
    <div class="modal" id="exampleModal{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Article Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="container mt-4">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                </div>
                <div class="card-body">
                <form  i method="post" action="{{ route('update_article',$article->id) }}">
                {{csrf_field()}}  
                {{method_field('PUT')}}                                                  
                    <div class="form-group">
                    <label for="transactionFee">Author Name</label>
                    <input type="text" id="article_title" name="author_name"  value="{{$article->author_name}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="transactionFee">Article Title</label>
                    <input type="text" id="article_title" name="article_title"  value="{{$article->article_title}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="articleBody">Article Story</label>
                        <textarea class="form-control" id="articleBody" name="article_body" rows="10" required>{{$article->article_body}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Update Article Details</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endforeach

 
     
<!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
