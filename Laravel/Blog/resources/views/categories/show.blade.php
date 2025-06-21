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
                <div class="d-flex justify-content-between al   ign-items-center mb-5">
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
                            <img src="{{ asset('storage/' . $category->image) }}"
                                 alt="{{ $category->name }}"
                                 class="category-image">
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

                            <div class="dropdown">
                                <button class="btn btn-sm btn-link text-muted p-0"
                                        type="button"
                                        data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
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
                                </ul>
                            </div>
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
            </div>
        </div>
    </div>

    <style>
        /* Minimalist Image Container */
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

        /* Custom Dropdown Styles */
        .dropdown-menu {
            min-width: 180px;
            padding: 0.5rem 0;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        /* Minimalist Badges */
        .badge {
            font-weight: normal;
            letter-spacing: 0.5px;
        }

    </style>

    @if(isset($editForm))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fileInput = document.getElementById('image');
                if(fileInput) {
                    const fileInputLabel = fileInput.nextElementSibling;
                    const fileInputText = fileInputLabel.querySelector('.file-input-text');

                    fileInput.addEventListener('change', function(e) {
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
