@extends('layouts.default')

@section('content')

@if(Session::has('success'))
    @include('propmessage')
@endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-2">
                    <div class="card-body">
                        <h1 class="card-title fw-bold py-4 text-center">Articles</h1>
                        @if (count($articles) == 0)
                            <h3 class="card-title fw-bold py-4 text-center">No Articles</h3>
                        @endif
                        <div style="height: 31rem; overflow-x:auto " >
                            <table class="table" >
                                <thead>
                                    <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Full Message</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                    <tr class="">
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->fullText }}</td>
                                        <td>{{ $article->category }}</td>
                                        <td>
                                            @foreach ($article->tags as $tag)
                                                <p class="my-0" >{{$tag}}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            <form class="d-inline-block me-2" method="GET" action="{{ route ('geteditarticle', $article->id)}}">
                                                @csrf
                                                <button style="width: 4.5rem;" type="submit" class="btn btn-info my-2">Edit</button>
                                            </form>
                                            <form class="d-inline-block" onclick="myfunction()" method="POST" action="{{ route ('deletearticle', $article->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="width: 4.5rem;" type="submit" class="btn btn-danger my-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection