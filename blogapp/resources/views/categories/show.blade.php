@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card col-6 offset-3">
            <h5 class="card-header">{{ $category->category_name }}</h5>
        </div>
    </div>
@endsection
