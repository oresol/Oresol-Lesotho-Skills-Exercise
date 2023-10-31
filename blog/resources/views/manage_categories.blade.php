@extends('layouts.author_dashboard');


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>


        <div class="container" style="margin-top: 6%; margin-left: 20%;"> 
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
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID </th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                        <a href="{{ route('edit_categories',$category->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$category->id }}">Edit</a>
                        <a href="{{ route('delete_categories', $category->id) }}" class="btn btn-danger" data-action="" data-toggle="modal" data-target="#deleteModal{{$category->id }}">Delete</a>    
                        </td>
                    </tr> 
                @endforeach 
                </tbody> 
            </table>
            <div class="d-flex">
            </div> 
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


@foreach ($categories as $category)
    <div class="modal" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form   method="post" action="{{ route('update_categories',$category->id) }}">
                {{csrf_field()}}  
                {{method_field('PUT')}}                                                  
                    <div class="form-group">
                    <label for="transactionFee">Author Name</label>
                    <input type="text" id="article_title" name="category_name"  value="{{$category->category_name}}" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update Category</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endforeach



@foreach ($categories as $category)
    <div class="modal" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('delete_categories',$category->id) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Article Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete  {{$category->category_name}}?</p>
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

@endsection