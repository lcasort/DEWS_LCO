<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- favicon -->
    <!-- styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
                    @if (Route::has('login'))
                        @auth
                        <a class="nav-link" href="{{route('player.create')}}">Create player</a>
                        <a class="nav-link" href="{{route('game.create')}}">Create game</a>
                        @endauth
                    @endif
                </div>
                <div class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                        <div class="dropdown">
                            <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                          
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <a class="dropdown-item" href="{{route('logout')}}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">Log out</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                            
                        {{-- <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
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
    <div>
        <h1 class="text-center display-4 mt-4">@yield('header')</h1>
        <hr class="hr-blurry mx-auto">
    </div>

    @yield('content')
    <!-- footer -->
    <!-- scripts -->
</body>
</html>