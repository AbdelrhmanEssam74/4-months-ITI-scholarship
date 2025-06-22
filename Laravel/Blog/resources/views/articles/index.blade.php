@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', 'Articles')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Discover Engaging Content</h1>
            <p>Explore our collection of insightful articles on various topics</p>
            <div class="hero-search w-100">
                <form action="" method="GET" class="d-flex justify-content-center w-100">
                    <input type="text" class="w-100" name="query" placeholder="Search articles...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
        @auth
        <div class="d-flex justify-content-center">
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Create New Article</a>
        @endauth
        {{-- Add Article--}}
    </section>

    <!-- Breadcrumbs -->
    <div class="page-title position-relative">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('articles.index')}}">Articles</a></li>
                    <li class="breadcrumb-item active current">All Articles</li>
                </ol>
            </nav>
        </div>
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
    </div>

    <!-- Main Layout Container -->
    <div class="layout-container container py-5">
        <!-- Category Slider -->
        <aside class="category-slider">
            <h3>Categories</h3>
            <div class="category-list">
                <a href="{{ route('articles.index') }}"
                   class="category-item {{ request()->routeIs('articles.index') ? 'active' : '' }}">All Articles</a>
                @foreach($categories as $category)
                    <a href="{{ route('categories.show', $category->id) }}"
                       class="category-item {{ request()->is('categories/'.$category->id) ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="content-area">
            <!-- Search Bar -->
            {{--            <div class="content-search mb-4">--}}
            {{--                <form action="" method="GET">--}}
            {{--                    <input type="text" name="query" placeholder="Search within articles...">--}}
            {{--                    <button type="submit">--}}
            {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
            {{--                             viewBox="0 0 16 16">--}}
            {{--                            <path--}}
            {{--                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>--}}
            {{--                        </svg>--}}
            {{--                    </button>--}}
            {{--                </form>--}}
            {{--            </div>--}}

            <!-- Articles Grid -->
            <div class="articles-grid">
                @foreach($articles as $article)
                    <article class="article-card">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                             class="article-image">
                        <div class="article-content">
                            <span class="article-category">{{ $article->category->name }}</span>
                            <h3 class="article-title">{{ Str::limit($article->title, 50) }}</h3>
                            <p class="article-excerpt">{{ Str::limit(strip_tags($article->description), 120) }}</p>

                            <!-- Tags Section -->
                            <div class="article-tags mt-2">
                                @foreach(explode(',' , $article->tags) as $tag)
                                    <span class="badge text-bg-secondary">{{ $tag }}</span>
                                @endforeach
                            </div>

                            <div class="article-meta">
                                <span class="article-date">{{ $article->created_at->format('M d, Y') }}</span>
                                <span class="article-read-time">{{ $article->reading_time }} min read</span>
                            </div>

                            <a href="{{ route('articles.show', $article->slug) }}" class="stretched-link"></a>
                        </div>
                    </article>

                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $articles->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
            <!-- Tags -->
            <div class="tags-section">
                <h3>Popular Tags</h3>
                <div class="tags-container">
                    @foreach($tags as $tag)
                        <a href="{{ route('articles.index', ['tag' => $tag]) }}" class="tag">{{ $tag }}</a>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

@endsection

<style>
    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 4rem 2rem;
        text-align: center;
        border-radius: 0 0 12px 12px;
        margin-bottom: 2rem;
    }

    .hero-content h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #2d3748;
    }

    .hero-content p {
        font-size: 1.2rem;
        color: #4a5568;
        margin-bottom: 2rem;
    }

    .hero-search {
        max-width: 600px;
        margin: 0 auto;
        display: flex;
    }

    .hero-search input {
        flex: 1;
        padding: 0.8rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px 0 0 8px;
        font-size: 1rem;
    }

    .hero-search button {
        padding: 0 1.5rem;
        background-color: #4299e1;
        color: white;
        border: none;
        border-radius: 0 8px 8px 0;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .hero-search button:hover {
        background-color: #3182ce;
    }

    /* Layout Container */
    .layout-container {
        display: flex;
        max-width: 1200px;
        margin: 0 auto;
        gap: 2rem;
    }

    .category-slider {
        width: 250px;
        position: sticky;
        top: 20px;
        height: fit-content;
    }

    .category-slider h3 {
        font-size: 1.2rem;
        color: #2d3748;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .category-list {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .category-item {
        padding: 0.7rem 1rem;
        color: #4a5568;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .category-item:hover {
        background-color: #edf2f7;
        color: #2d3748;
    }

    .category-item.active {
        background-color: #ebf8ff;
        color: #3182ce;
        font-weight: 500;
    }

    .content-area {
        flex: 1;
    }

    /* Content Search */
    .content-search {
        max-width: 400px;
        margin-bottom: 2rem;
        position: relative;
    }

    .content-search input {
        width: 100%;
        padding: 0.7rem 1rem 0.7rem 2.5rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.95rem;
        background-color: #f8fafc;
    }

    .content-search button {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: #a0aec0;
    }

    /* Articles Grid */
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        padding: 1rem 0;
    }

    .article-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: transform 0.3s ease;
        position: relative;
    }

    .article-card:hover {
        transform: translateY(-5px);
    }

    .article-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .article-content {
        padding: 1.5rem;
        position: relative;
    }

    .article-category {
        display: inline-block;
        font-size: 0.8rem;
        color: #4299e1;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .article-title {
        font-size: 1.2rem;
        color: #2d3748;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .article-excerpt {
        color: #4a5568;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .article-meta {
        display: flex;
        justify-content: space-between;
        font-size: 0.85rem;
        color: #718096;
    }

    /* Recent Articles */
    .recent-articles {
        margin-top: 3rem;
        padding: 2rem 0;
        border-top: 1px solid #e2e8f0;
    }

    .recent-articles h2 {
        font-size: 1.5rem;
        color: #2d3748;
        margin-bottom: 1.5rem;
    }

    .recent-articles-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .recent-article-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: transform 0.3s ease;
        position: relative;
    }

    .recent-article-card:hover {
        transform: translateY(-3px);
    }

    .recent-article-image {
        width: 100%;
        height: 120px;
        object-fit: cover;
    }

    .recent-article-content {
        padding: 1rem;
    }

    .recent-article-title {
        font-size: 1rem;
        color: #2d3748;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .recent-article-date {
        font-size: 0.8rem;
        color: #718096;
    }

    /* Tags Section */
    .tags-section {
        margin-top: 3rem;
        padding: 2rem 0;
        border-top: 1px solid #e2e8f0;
    }

    .tags-section h3 {
        font-size: 1.2rem;
        color: #2d3748;
        margin-bottom: 1rem;
    }

    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .tag {
        display: inline-block;
        padding: 0.4rem 0.8rem;
        background-color: #f7fafc;
        color: #4a5568;
        border-radius: 20px;
        font-size: 0.85rem;
        text-decoration: none;
        border: 1px solid #e2e8f0;
        transition: all 0.2s;
    }

    .tag:hover {
        background-color: #ebf8ff;
        color: #3182ce;
        border-color: #bee3f8;
    }

    /* Breadcrumbs */
    .page-title {
        margin-bottom: 2rem;
        padding: 0 2rem;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
    }

    .breadcrumb-item a {
        color: #4a5568;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #2d3748;
    }

    /* Pagination */
    .pagination {
        margin-top: 2rem;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .layout-container {
            flex-direction: column;
        }

        .category-slider {
            width: 100%;
            position: static;
            margin-bottom: 2rem;
        }
    }

    @media (max-width: 576px) {
        .hero-content h1 {
            font-size: 2rem;
        }

        .articles-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('footer')
    @include('partials.footer')
@endsection
