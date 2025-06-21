@section('header')
    <div class="container-fluid container-xl position-relative">

        <div class="top-row d-flex align-items-center justify-content-between">
            <a href="{{route('home')}}" class="logo d-flex align-items-end">
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
        <div class="container d-flex justify-content-center position-relative">
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{route('home')}}" class="active">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="{{route('categories.index')}}">Category</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                    <li><a href="author-profile.html">Author Profile</a></li>
                    <li class="dropdown"><a href="#"><span>Pages</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="about.html">About</a></li>
                            <li><a href="category.html">Category</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                            <li><a href="author-profile.html">Author Profile</a></li>
                            <li><a href="search-results.html">Search Results</a></li>
                            <li><a href="404.html">404 Not Found Page</a></li>

                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span>
                                    <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
@endsection
