@extends('layout')

@section('title', 'Articles')

@section('content')
    <div class="container-fluid px-0">
        <!-- Hero Header -->
        <div class="hero-bg position-relative" style="background: linear-gradient(135deg, #6e8efb 0%, #4a6cf7 100%);">
            <div class="container py-5">
                <div class="row py-5">
                    <div class="col-lg-8 mx-auto text-center">
                        <h1 class="display-4 fw-bold text-white mb-3">Discover Our Articles</h1>
                        <p class="lead text-white-50 mb-4">Explore the latest insights and stories from our community</p>
                        <a href="/articles/create" class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm">
                            <i class="bi bi-plus-circle me-2"></i>Add New Article
                        </a>
                    </div>
                </div>
            </div>
            <div class="custom-shape-divider-bottom-1688379550">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container py-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- Articles Grid -->
            <div class="row g-4">
                @foreach ($articles as $article)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-hover rounded-4 overflow-hidden transition-all">
                            <div class="card-img-top position-relative overflow-hidden" style="height: 220px;">
                                <img src="{{ asset('storage/' . $article->image) }}" class="w-100 h-100 object-fit-cover transition-all"
                                    alt="{{ $article->title }}">
                                <div class="card-img-overlay d-flex flex-column justify-content-end bg-gradient-dark">
                                    <span class="badge bg-primary rounded-pill align-self-start mb-2">Featured</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <small class="text-muted"><i class="bi bi-calendar me-1"></i>
                                        {{ $article->created_at->format('M d, Y') }}</small>
                                    <small class="text-muted ms-3"><i class="bi bi-eye me-1"></i> 1.2k</small>
                                </div>
                                <h5 class="card-title fw-bold text-dark">{{ $article->title }}</h5>
                                <p class="card-text text-secondary flex-grow-1">{{ Str::limit($article->content, 120) }}</p>
                                <div class="d-flex align-items-center mt-3">
                                    <a href="{{ url('/articles/' . $article->id) }}"
                                        class="btn btn-link text-decoration-none px-0">
                                        Read More <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                    <div class="ms-auto">
                                        <button class="btn btn-sm btn-outline-secondary ">
                                            <i class="fa-light fa-bookmark"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary  ms-1">
                                            <i class="fa-light fa-share"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $articles->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <style>
        .hero-bg {
            padding-top: 6rem;
            padding-bottom: 8rem;
        }

        .custom-shape-divider-bottom-1688379550 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1688379550 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 100px;
        }

        .custom-shape-divider-bottom-1688379550 .shape-fill {
            fill: #FFFFFF;
        }

        .shadow-hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .shadow-hover:hover {
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        .bg-gradient-dark {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 100%);
        }

        .object-fit-cover {
            object-fit: cover;
        }
    </style>
@endsection
