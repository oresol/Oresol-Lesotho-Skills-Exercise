<html>
    <head>
        <title>Personal Blog</title>
        <!-- Bootstrap Css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <!-- JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Custom CSS -->
        <!-- <link href="" rel="stylesheet"> -->
        
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" style="padding-left: 80px;" href="/"> Personal Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" >
        <a class="nav-link active" style="margin-left: 40px" aria-current="page" href="/">Home</a>
        <a class="nav-link" style="padding-right: 600px;" href="/about">About</a>
        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </div>
            </div>
        </div>
    </nav>
        <div>
            @yield('content')
        </div>
      
        <!-- Remove the container if you want to extend the Footer to full width. -->
<div >
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #3f51b5">
    <!-- Grid container -->
    <div class="container">
      <!-- Section: Links -->
      <section class="mt-5">
        <!-- Grid row-->
       
          <!-- Grid column -->

          
      </section>
      <!-- Section: Links -->

      <hr class="my-5" />

      <!-- Section: Text -->
      <section class="mb-5">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <p>
            Fostering a community of informed and inspired readers, our mission is to simplify the complex, demystify emerging trends, and provide valuable, in-depth perspectives to help you make informed decisions in the digital age. Join us as we explore the forefront of tech and harness its potential for a brighter future.
            </p>
          </div>
        </div>
      </section>
      <!-- Section: Text -->

      
      </section>
      <!-- Section: Social -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2023 Copyright:
      <a class="text-white" href="#"
         >Tefo Lesoetsa</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</div>
<!-- End of .container -->
       
    </body>
</html>