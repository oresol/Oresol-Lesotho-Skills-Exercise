@extends('layouts.public_navbar')

@section('content')
<div class="container text-center">
    <h1>Explore Published Articles</h1>
</div>
<div class="container">
    <div class="card-deck row">
    @foreach ( $published_articles as $article )
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card">
                    <div class="view overlay">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $article->article_title }}</h4>
                        <p>Author: {{ $article->author_name }}</p>
                        <p class="card-text">{{ $article->article_body }}</p>
                        <a href="" class="btn btn-primary btn-md">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection