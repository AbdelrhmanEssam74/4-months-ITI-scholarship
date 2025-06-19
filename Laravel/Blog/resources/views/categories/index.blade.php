@extends('layout')

@section('title', 'Categories')

@section('content')
    <div class="container-fluid bg-light py-5">
        <!-- Hero Section -->
        <div class="container mb-5">
            @if (session('success'))
                <div class="container mb-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold text-dark mb-3">Explore Our Categories</h1>
                    <p class="lead text-muted mb-4">Discover content organized by topics that matter to you</p>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-primary px-4 rounded-pill">
                            <i class="fa-light fa-stars me-2"></i>Popular
                        </button>
                        <button class="btn btn-outline-secondary px-4 rounded-pill">
                            <i class="fa-regular fa-arrow-down-arrow-up me-2"></i>Sort
                        </button>
                        <a href="/categories/create" class="btn  btn-primary px-4 rounded-pill shadow-sm">
                            <i class="fa-light fa-circle-plus me-2"></i> Add New Category
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Grid -->
        <div class="container">
            @if($categories->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 text-center py-5">
                        <div class="bg-white p-5 rounded-4 shadow-sm">
                            <i class="bi bi-folder-x display-1 text-muted mb-4"></i>
                            <h3 class="h4 fw-bold mb-3">No Categories Found</h3>
                            <p class="text-muted mb-4">We'll be adding new categories soon. Please check back later!</p>
                            <button class="btn btn-outline-primary rounded-pill">
                                <i class="fa-regular fa-bells me-2"></i>Notify Me
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="row g-4">
                    @foreach ($categories as $category)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                                <div class="card-img-top overflow-hidden rounded-top" style="height: 200px; background-color: #f8f9fa;">
                                    @if($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                             alt="{{ $category->name }}"
                                             class="w-100 h-100 object-fit-cover"
                                             style="object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <i class="bi bi-image fs-1"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h3 class="h5 card-title fw-bold mb-2">{{ $category->name }}</h3>
                                    <p class="card-text text-muted small mb-3">
                                        {{ $category->description ?? 'Explore articles in this category' }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                {{ $category->articles_count ?? 0 }} Articles
                            </span>
                                        <a href="{{ route('categories.show', $category->id) }}"
                                           class="btn btn-outline-orange btn-sm mt-2">View Details</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Call to Action -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white p-5 rounded-4 shadow-sm border border-light">
                        <div class="row align-items-center">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <h3 class="h4 fw-bold mb-2">Have a category suggestion?</h3>
                                <p class="text-muted mb-0">We're always looking to expand our content to match your
                                    interests.</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <button class="btn btn-primary px-4 rounded-pill">
                                    <i class="bi bi-envelope me-2"></i>Contact Us
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-shadow {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #6c63ff 0%, #4a3aff 100%);
        }
    </style>
@endsection
