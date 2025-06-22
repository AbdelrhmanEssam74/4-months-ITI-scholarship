@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', $category->name)

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Breadcrumb Navigation -->
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}" class="text-muted">Categories</a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">{{ $category->name }}</li>
                        </ol>
                    </nav>
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-link text-muted p-0">
                        <i class="bi bi-arrow-left me-1"></i> Back to Categories
                    </a>
                </div>

                <!-- Category Card -->
                <div class="card border-0 bg-transparent">
                    @if($category->image)
                        <div class="category-image-container">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
                            <div class="category-badge">
                                <span class="badge bg-dark bg-opacity-75 px-3 py-2">
                                    {{ $category->number_of_articles }} Articles
                                </span>
                            </div>
                        </div>
                    @endif

                    <div class="card-body px-0 pt-4">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h1 class="display-6 fw-normal mb-2">{{ $category->name }}</h1>
                                <div class="text-muted small mb-3">
                                    <span class="me-3">
                                        <i class="bi bi-calendar me-1"></i>
                                        Created {{ $category->created_at->format('M d, Y') }}
                                    </span>
                                    <span>
                                        <i class="bi bi-arrow-repeat me-1"></i>
                                        Updated {{ $category->updated_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                            @auth
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">
                                                <i class="bi bi-pencil me-2"></i>Edit
                                            </a>
                                        </li>
                                        @if(auth()->user()->role === 'admin')
                                            <li>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item text-danger" type="submit">
                                                        <i class="bi bi-trash me-2"></i>Delete
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endauth
                        </div>

                        <p class="lead text-muted mb-4">
                            {{ $category->description }}
                        </p>

                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-dark bg-opacity-5 text-light py-2 px-3 border-0">
                                <i class="bi bi-bookmarks me-1"></i> {{ $category->name }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Related Articles -->
                @if($relatedArticles->count())
                    <div class="mt-5">
                        <h3 class="mb-4">Related Articles</h3>
                        <div class="row">
                            @foreach($relatedArticles as $article)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        @if($article->image)
                                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $article->title }}</h5>
                                            <p class="card-text text-muted">{{ Str::limit($article->description, 80) }}</p>
                                            <a href="{{ route('articles.show', $article->id) }}" class="stretched-link">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <style>
        .category-image-container {
            position: relative;
            height: 300px;
            overflow: hidden;
            margin-bottom: 2rem;
            border-radius: 0;
        }

        .category-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-badge {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .dropdown-menu {
            min-width: 180px;
            padding: 0.5rem 0;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .badge {
            font-weight: normal;
            letter-spacing: 0.5px;
        }
    </style>

    @if(isset($editForm))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const fileInput = document.getElementById('image');
                if (fileInput) {
                    const fileInputLabel = fileInput.nextElementSibling;
                    const fileInputText = fileInputLabel.querySelector('.file-input-text');

                    fileInput.addEventListener('change', function (e) {
                        if (this.files.length) {
                            fileInputText.textContent = this.files[0].name;
                            fileInputText.style.color = '#212529';
                        } else {
                            fileInputText.textContent = 'No file chosen';
                            fileInputText.style.color = '#6c757d';
                        }
                    });
                }
            });
        </script>
    @endif
@endsection

@section('footer')
    @include('partials.footer')
@endsection
