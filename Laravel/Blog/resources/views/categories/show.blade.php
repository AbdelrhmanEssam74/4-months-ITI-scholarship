@extends('layout')

@section('title', $category->name)

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Category Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                        </ol>
                    </nav>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="bi bi-arrow-left me-1"></i> Back to Categories
                    </a>
                </div>

                <!-- Category Card -->
                <div class="card border-0  overflow-hidden">
                    @if($category->image)
                        <div class="category-header-img" style="height: 300px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class=" w-100 "
                            style="
                            object-fit: cover;
                            "
                            >

                            class="img-fluid w-100 h-100 object-fit-cover"
                                 alt="{{ $category->name }}">
                            <div class="img-overlay"></div>
                            <div class="category-badge">
                        <span class="badge bg-primary bg-opacity-75 px-3 py-2 rounded-pill fs-6">
                            {{ $category->number_of_articles }} Articles
                        </span>
                            </div>
                        </div>
                    @endif

                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h1 class="card-title display-5 fw-bold text-dark mb-0">{{ $category->name }}</h1>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary"
                                        type="button"
                                        data-bs-toggle="dropdown">
                                    <i class="fa-regular fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">
                                            <i class="bi bi-pencil me-2"></i>Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger" type="submit">
                                                <i class="bi bi-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-share me-2"></i>Share
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <div class="d-flex align-items-center text-muted mb-4">
                            <small class="me-3">
                                <i class="bi bi-calendar me-1"></i>
                                Created {{ $category->created_at->format('M d, Y') }}
                            </small>
                            <small>
                                <i class="bi bi-arrow-repeat me-1"></i>
                                Updated {{ $category->updated_at->format('M d, Y') }}
                            </small>
                        </div>

                        <div class="card-text lead text-muted mb-4">
                            {{ $category->description }}
                        </div>

                        <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3">
                            <i class="bi bi-bookmarks me-1"></i> Category
                        </span>
                            <span class="badge bg-success bg-opacity-10 text-success py-2 px-3">
                            <i class="bi bi-collection me-1"></i> Collection
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .category-header-img {
            position: relative;
        }
        .img-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
        }
        .category-badge {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
        .hover-lift {
            transition: all 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.1);
        }
        .object-fit-cover {
            object-fit: cover;
        }
    </style>
@endsection
