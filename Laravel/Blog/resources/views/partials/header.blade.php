@if (Route::has('login'))
    @section('header')
        <div class="container-fluid container-xl position-relative">

            <div class="top-row d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo d-flex align-items-end">
                    <h1 class="sitename">Blogy</h1><span>.</span>
                </a>

                <div class="d-flex align-items-center">
                    <div class="social-links">
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>

                    <form class="search-form ms-4">
                        <input type="text" placeholder="Search..." class="form-control">
                        <button type="submit" class="btn"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>

        </div>
        <div class="nav-wrap">
            <div class="container d-flex justify-content-center align-items-center gap-3 position-relative">
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('home') }}" class="">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="{{ route('categories.index') }}">Category</a></li>
                        <li><a href="{{ route('articles.index') }}">Articles</a></li>
                        <li><a href="contact.html">Contact</a></li>

                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle submit-btn" href="#" id="userDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    @php
                                        $role = Auth::user()->role ?? null;
                                    @endphp

                                    @if ($role === 'admin')
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        </li>
                                    @elseif ($role === 'writer' || $role === 'author')
                                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                    @endif

                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout</a></li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>

                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endguest

            </div>
        </div>
    @endsection
@endif
