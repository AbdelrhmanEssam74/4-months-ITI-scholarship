@extends('layout')
@section('header')
    @include('partials.header')
@endsection
@section('title', 'Profile')
@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Category</a></li>
                    <li class="breadcrumb-item active current">Author Profile</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Author Profile</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis,
                pulvinar dapibus leo.</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Author Profile Section -->
    <section id="author-profile" class="author-profile section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="author-profile-1">

                <div class="row">
                    <!-- Author Info -->
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="author-card" data-aos="fade-up">
                            <div class="author-image">
                                <img src="{{asset('storage') . '/' . $user->profile_image}}" alt="Author" class="img-fluid rounded">
                            </div>

                            <div class="author-info">
                                <h2>{{$user->name}}</h2>
                                <p class="designation">{{$user->role}}</p>

                                <div class="author-bio">
                                    @if($user->bio)
                                        <p>{{$user->bio}}</p>
                                    @else
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                    @endif
                                </div>

                                <div class="author-stats d-flex justify-content-between text-center my-4">
                                    <div class="stat-item">
                                        <h4 data-purecounter-start="0" data-purecounter-end="147"
                                            data-purecounter-duration="1" class="purecounter"></h4>
                                        <p>Articles</p>
                                    </div>
                                    <div class="stat-item">
                                        <h4 data-purecounter-start="0" data-purecounter-end="13"
                                            data-purecounter-duration="1" class="purecounter"></h4>
                                        <p>Awards</p>
                                    </div>
                                    <div class="stat-item">
                                        <h4 data-purecounter-start="0" data-purecounter-end="25"
                                            data-purecounter-duration="1" class="purecounter">K</h4>
                                        <p>Followers</p>
                                    </div>
                                </div>

                                <div class="social-links">
                                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Author Content -->
                    <div class="col-lg-8">
                        <div class="author-content" data-aos="fade-up" data-aos-delay="200">
                            <div class="content-header">
                                <h3>About Me</h3>
                            </div>
                            <div class="content-body">
                                <p>
                                    @if($user->about_me)
                                        {{$user->about_me}}
                                    @else
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                        luctus nec ullamcorper mattis, pulvinar dapibus leo. Sed ut perspiciatis
                                        unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                        architecto beatae vitae dicta sunt explicabo.
                                    @endif
                                </p>

{{--                                <div class="expertise-areas">--}}
{{--                                    <h4>Areas of Expertise</h4>--}}
{{--                                    <div class="tags">--}}
{{--                                        <span>Artificial Intelligence</span>--}}
{{--                                        <span>Cybersecurity</span>--}}
{{--                                        <span>Smart Home Technology</span>--}}
{{--                                        <span>Digital Privacy</span>--}}
{{--                                        <span>Consumer Electronics</span>--}}
{{--                                        <span>Future Tech Trends</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="featured-articles mt-5">--}}
{{--                                    <h4>Featured Articles</h4>--}}
{{--                                    <div class="row g-4">--}}
{{--                                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">--}}
{{--                                            <article class="article-card">--}}
{{--                                                <div class="article-img">--}}
{{--                                                    <img src="assets/img/blog/blog-post-10.webp" alt="Article"--}}
{{--                                                         class="img-fluid">--}}
{{--                                                </div>--}}
{{--                                                <div class="article-details">--}}
{{--                                                    <div class="post-category">Technology</div>--}}
{{--                                                    <h5><a href="#">The Future of AI in Everyday Computing</a></h5>--}}
{{--                                                    <div class="post-meta">--}}
{{--                                                        <span><i class="bi bi-clock"></i> Jan 15, 2024</span>--}}
{{--                                                        <span><i class="bi bi-chat-dots"></i> 24 Comments</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </article>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">--}}
{{--                                            <article class="article-card">--}}
{{--                                                <div class="article-img">--}}
{{--                                                    <img src="assets/img/blog/blog-post-6.webp" alt="Article"--}}
{{--                                                         class="img-fluid">--}}
{{--                                                </div>--}}
{{--                                                <div class="article-details">--}}
{{--                                                    <div class="post-category">Privacy</div>--}}
{{--                                                    <h5><a href="#">Understanding Digital Privacy in 2024</a></h5>--}}
{{--                                                    <div class="post-meta">--}}
{{--                                                        <span><i class="bi bi-clock"></i> Feb 3, 2024</span>--}}
{{--                                                        <span><i class="bi bi-chat-dots"></i> 18 Comments</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </article>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Author Profile Section -->
@endsection
@section('footer')
    @include('partials.footer')
@endsection
