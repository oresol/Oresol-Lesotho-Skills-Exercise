@extends('layouts.public_navbar')

@section('content')
<div class="container">
    <h1>{{ $article->article_title }}</h1>
    <p>Author: {{ $article->author_name }}</p>
    <p>{{ $article->article_body }}</p>
</div>
@endsection