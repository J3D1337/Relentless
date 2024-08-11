<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route ('dashboard')}}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width = "30" height = "30"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#0091ff" d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288l111.5 0L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7l-111.5 0L349.4 44.6z"/></svg>
      RELENTLESS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('dashboard') ? 'text-dark bg-primary rounded' : '' }}"
               aria-current="page"
               href="{{ route('dashboard') }}">
                Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('feed') ? 'text-dark bg-primary rounded' : '' }}"
               aria-current="page"
               href="{{ route('feed') }}">
                Following
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('terms') ? 'text-dark bg-primary rounded' : ''}}"
            aria-current="page"
            href="{{route ('terms')}}">
            Terms
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
        <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle" href="/profile" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
                <li><a class="dropdown-item" href="#"></a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="{{ route('users.show', Auth::user()->id) }}" method="GET">
                    @csrf
                    <li><a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">Profile</a></li>
                </form>
                @if(Auth::user()->is_admin)
                <form action="{{ route('users.show', Auth::user()->id) }}" method="GET">
                    @csrf
                    <li><a class="dropdown-item" href="{{ route('admin.dashboard', Auth::user()->id) }}">Admin Profile</a></li>
                </form>
                @endif
            </ul>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        @endauth
    </ul>
        </li>
    </ul>
</div>
    </div>
  </nav>
