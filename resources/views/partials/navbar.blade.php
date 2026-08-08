<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 sticky-top">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
        <img src="{{ asset('image/musiklogo.png') }}" width="60">
        <span>Eskul Musik</span>
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="{{ url('/profil') }}">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('artikel') ? 'active' : '' }}" href="{{ url('/artikel') }}">Artikel</a>
            </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                @if (auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.artikel*') ? 'active' : '' }}" href="{{ route('admin.artikel') }}">Admin Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}" href="{{ route('admin.galeri') }}">Admin Galeri</a>
                    </li>
                @endif

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
