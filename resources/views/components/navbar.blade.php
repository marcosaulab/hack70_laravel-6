<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid justify-content-between">
        <a class="navbar-brand" href="{{ route('home') }}">H70</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'home') active @endif" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a>
                </li>
                @if(Auth::user() != null)
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'comic.create') active @endif" aria-current="page" href="{{ route('comic.create') }}">
                        Crea Comic
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'comic.index') active @endif" aria-current="page" href="{{ route('comic.index') }}">
                        Lista Comic
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav mb-2 mb-lg-0">
            @if(Auth::user() != null)
                    <li class="nav-item ">
                        <a href="#" class="nav-link text-white">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('profile') }}" class="nav-link text-white">I miei comics</a>
                    </li>
                    <li class="nav-item">
                       <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-info">Logout</button>
                       </form>
                    </li>
            @else
                    <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == 'register') active @endif" aria-current="page"
                                href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() == 'register') active @endif" aria-current="page"
                                href="{{ route('login') }}">Login</a>
                    </li>
            @endif
        </ul>

    </div>
</nav>