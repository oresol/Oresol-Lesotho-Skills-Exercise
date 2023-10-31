@extends('layouts.author_dashboard')

@section('content')
<div class="container" style="margin-left:20%; margin-top: 5%;">
    <h1>{{ $article->article_title }}</h1>
    <p>Author: {{ $article->author_name }}</p>
    <p>{{ $article->article_body }}</p>
    <p>Date Published: {{ $article->created_at }}</p>
</div>
@endsection