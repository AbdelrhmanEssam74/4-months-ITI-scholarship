@extends('layout')

@section('title', 'Articles')

@section('content')
    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2 class="text-center mb-5 text-dark fw-bold display-6">Latest Articles</h2>
        <a href="/articles/create" class="btn btn-primary mb-4">Add New Article</a>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary fw-semibold">{{ $article->title }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit($article->content, 100) }}</p>
                            <a href="{{ url('/articles/' . $article->id) }}" class="btn btn-outline-primary mt-3 w-100 rounded-pill">Read More →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
