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
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top font-weight-normal">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">DARK SOULS</a>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('players')}}">Players</a>
                    <a class="nav-link" href="{{route('games')}}">Games</a>
                </div>
                <div class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
          </div>
        </div>
    </nav>

    @yield('content')
    <!-- footer -->
    <!-- scripts -->
</body>
</html>