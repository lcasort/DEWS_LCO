<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- favicon -->
    <!-- styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/app.css">
</head>
<body>
    <!-- header -->
    <div class="container-fluid fixed-top p-4">
      <div class="col-12">
          <div class="d-flex justify-content-end">
              @if (Route::has('login'))
                  <div class="">
                      @auth
                          <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                      @else
                          <a href="{{ route('login') }}" class="text-muted">Log in</a>

                          @if (Route::has('register'))
                              <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                          @endif
                      @endif
                  </div>
              @endif
          </div>
      </div>
    </div>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">DARK SOULS</a>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="{{route('players')}}">Players</a>
              <a class="nav-link" href="{{route('games')}}">Games</a>
            </div>
          </div>
        </div>
    </nav>

    @yield('content')
    <!-- footer -->
    <!-- scripts -->
</body>
</html>