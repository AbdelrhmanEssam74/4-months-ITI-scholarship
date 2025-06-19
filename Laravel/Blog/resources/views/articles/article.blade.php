@extends('layout')

@section('title', $article->title)

@section('content')
    <div class="container-fluid px-0">
        <!-- Article Hero Header -->
        <div class="article-hero position-relative" style="background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="/articles" class="btn btn-outline-secondary rounded-pill">
                            <i class="fa-light fa-arrow-left"></i>  Back to Articles
                            </a>
                            <div class="d-flex gap-2">
                                <a href="/articles/edit/{{ $article->id }}" class="btn btn-sm btn-outline-primary rounded-pill" title="Edit">
                                    <i class="fa-light fa-square-pen me-1"></i> Edit
                                </a>
                                <a href="/articles/delete/{{ $article->id }}" class="btn btn-sm btn-outline-danger rounded-pill"
                                    onclick="return confirm('Are you sure you want to delete this article?')" title="Delete">
                                    <i class="fa-light fa-trash-can-clock me-1"></i> Delete
                                </a>
                            </div>
                        </div>

                        <div class="text-center py-4">
                            <span class="badge bg-primary rounded-pill mb-3">Featured Article</span>
                            <h1 class="display-5 fw-bold text-dark mb-3">{{ $article->title }}</h1>
                            <div class="d-flex justify-content-center align-items-center gap-3 text-muted">
                                <span><i class="bi bi-calendar me-1"></i> {{ $article->created_at->format('F j, Y') }}</span>
                                <span><i class="bi bi-clock me-1"></i> 5 min read</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Article Content -->
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <!-- Featured Image -->
                    <div class="article-image mb-5 rounded-4 overflow-hidden shadow-lg">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid w-100">
                    </div>

                    <!-- Article Content -->
                    <article class="article-content">
                        <div class="lead text-dark mb-4" style="font-size: 1.25rem; line-height: 1.7;">
                            {{ $article->content }}
                        </div>

                        <!-- Tags & Social Sharing -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-top border-bottom py-4 my-5">
                            <div class="mb-3 mb-sm-0">
                                <span class="text-muted me-2"><i class="bi bi-tags"></i></span>
                                <a href="#" class="badge bg-light text-dark rounded-pill me-2">Technology</a>
                                <a href="#" class="badge bg-light text-dark rounded-pill me-2">Design</a>
                                <a href="#" class="badge bg-light text-dark rounded-pill">Trends</a>
                            </div>
                            <div class="social-sharing">
                                <span class="text-muted me-2">Share:</span>
                                <a href="#" class="text-dark me-2"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-dark me-2"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="text-dark me-2"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-dark"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </article>

                    <!-- Author Bio -->
                    <div class="author-card bg-light rounded-4 p-4 mb-5">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Author" class="rounded-circle me-3" width="80">
                            <div>
                                <h5 class="mb-1">John Doe</h5>
                                <p class="text-muted mb-2">Content Writer & Editor</p>
                                <p class="small text-muted mb-0">Published 50+ articles on technology and design trends.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Back to Top Button -->
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-outline-secondary rounded-pill" id="backToTop">
                            <i class="fa-light fa-arrow-up"></i> Back to Top
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .article-hero {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
        .article-image {
            max-height: 500px;
            overflow: hidden;
        }
        .article-image img {
            object-fit: cover;
            object-position: center;
            transition: transform 0.5s ease;
        }
        .article-image:hover img {
            transform: scale(1.03);
        }
        .article-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        .article-content p {
            margin-bottom: 1.5rem;
        }
        .social-sharing a {
            transition: color 0.2s ease;
        }
        .social-sharing a:hover {
            color: #4a6cf7 !important;
        }
        .author-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .author-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>

    <script>
        // Back to top button
        document.getElementById('backToTop').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({top: 0, behavior: 'smooth'});
        });
    </script>
@endsection
