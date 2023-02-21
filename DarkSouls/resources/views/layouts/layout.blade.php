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