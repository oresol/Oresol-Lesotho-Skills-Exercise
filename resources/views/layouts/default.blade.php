<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand"  href="{{url('/list-articles')}}">Articles </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav bg-green-500">
              <a class="nav-item nav-link active" href="{{route('getcreate')}}">Create</a>
              <a class="nav-item nav-link active" href="{{url('/manage-props')}}">Manage(Tags & Categories)</a>
              <a class="nav-item nav-link active" href="{{url('/about-us')}}">About</a>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-light" type="submit">Logout</button>
        </form>
        
    </nav>
    
    <div class="px-4">
        @yield('content')
    </div>

    
    {{-- @yield('script') --}}
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>