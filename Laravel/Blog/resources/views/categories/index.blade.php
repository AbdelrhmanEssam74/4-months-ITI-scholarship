@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', 'Categories')

@section('content')
    <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Category</a></li>
                    <li class="breadcrumb-item active current">Category</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Blog Category</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis,
                pulvinar dapibus leo.</p>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8">
                <!-- Category Postst Section -->
                <section id="category-postst" class="category-postst section">
                    <div class="container" data-aos="fade-up" data-aos-delay="100">
                        <div class="row gy-4">
                            @foreach($categories as $category )
                                <div class="col-lg-6">
                                    <article>
                                        <div class="post-img">
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                 alt="{{$category->name}}" class="w-100 h-100 object-fit-cover">
                                        </div>

                                        <p class="post-category">{{$category->name}}</p>

                                        <h2 class="title">
                                            <a href="{{ route('categories.show', $category->id) }}">
                                                {{str_split($category->description, 30)[0]}}...
                                            </a>
                                        </h2>
                                        <div class="d-flex align-items-center text-left">
                                            <img src="{{asset('storage') .'/'. $category->user->profile_image}}" alt=""
                                                 class="img-fluid post-author-img flex-shrink-0">
                                            <div class="post-meta">
                                                @if($category->user)
                                                    <p class=" small ">{{ $category->user->name }} <span
                                                            style="font-size: 0.8rem; color: #6c757d;"
                                                        >({{ $category->user->role  }})</span></p>
                                                @else
                                                    <p class="post-author text-muted">Author not found</p>
                                                @endif

                                                <p class="post-date">
                                                    <time datetime="2022-01-01">
                                                        {{ date('M d, Y', strtotime($category->created_at)) }}
                                                    </time>
                                                </p>
                                            </div>
                                        </div>

                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </section>
                <!-- /Category Postst Section -->
                <!-- Pagination 2 Section -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $categories->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
                <!-- /Pagination 2 Section -->
            </div>

            <div class="col-lg-4 sidebar">

                <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">
                    @auth
                        {{-- Add Category--}}
                        {{-- if the role of user auth user--}}
                        @if(auth()->user()->role === 'author' || auth()->user()->role === 'admin')
                            <div class=" d-flex justify-content-center widget-item">
                                <a href="{{route('categories.create')}}" class="add-category">Add Category</a>
                            </div>
                        @endif
                    @endauth
                    <!-- Search Widget -->
                    <div class="search-widget widget-item">
                        <h3 class="widget-title">Search</h3>
                        <form action="">
                            <input type="text">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    <!--/Search Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <h3 class="widget-title">Categories</h3>
                        <ul class="mt-3">
                            @foreach($categories as $category)
                                <li><a href="{{ route('categories.show', $category->id) }}">{{$category->name}} <span>({{$category->number_of_articles}})</span></a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <!-- Categories Widget -->

                    <!-- Recent Posts Widget -->
                    {{--                    <div class="recent-posts-widget widget-item">--}}

                    {{--                        <h3 class="widget-title">Recent Posts</h3>--}}
                    {{--                        @foreach($articles as $article)--}}
                    {{--                            <div class="post-item">--}}
                    {{--                                <img src="{{ asset('storage/' . $article->image) }}" alt="" class="flex-shrink-0">--}}
                    {{--                                <div>--}}
                    {{--                                    <h4><a href="{{ url('/articles/' . $article->id) }}">{{$article->title}}</a></h4>--}}
                    {{--                                    <time datetime="2020-01-01">--}}
                    {{--                                        {{ date('M d, Y', strtotime($article->created_at)) }}--}}
                    {{--                                    </time>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        @endforeach--}}
                    <!-- End recent post item-->


                </div>
                <!--/Recent Posts Widget -->

                <!-- Tags Widget -->
                <div class="tags-widget widget-item">

                    <h3 class="widget-title">Tags</h3>
                    <ul>
                        @foreach($tags as $tag)
                            <li><a href="#">
                                    {{ $tag }}
                                </a></li>
                        @endforeach
                    </ul>

                </div><!--/Tags Widget -->

            </div>

        </div>

    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
