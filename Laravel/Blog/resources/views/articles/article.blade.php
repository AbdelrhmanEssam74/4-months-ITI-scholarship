@extends('layout')

@section('title', $article->title)

@section('content')
    <div class="container py-5">
        <!-- Title & Actions -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <h1 class="h2 text-dark mb-0">{{ $article->title }}</h1>
            <div class="d-flex gap-3">
                <a href="/articles/edit/{{ $article->id }}" class="text-primary" title="Edit">
                    <i class="fas fa-pen-to-square fa-lg"></i>
                </a>
                <a href="/articles/delete/{{ $article->id }}"
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure you want to delete this article?')"
                   title="Delete">
                    <i class="fa-regular fa-trash-xmark"></i>
                </a>
            </div>
        </div>

        <!-- Image & Content -->
        <div class="row g-4 d-flex align-items-center">
            <div class="col-md-6">
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-md-6">
                <p class="lead text-muted">
                    {{ $article->content }}
                </p>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-5">
            <a href="/articles" class="btn btn-outline-primary rounded-pill">
                ← Back to Articles
            </a>
        </div>
    </div>
@endsection
