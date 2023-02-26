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