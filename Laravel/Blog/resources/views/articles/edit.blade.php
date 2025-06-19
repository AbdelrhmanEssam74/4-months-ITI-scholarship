@extends('layout')

@section('title', 'Edit Article')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-primary">Edit Article</h2>

        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $article->slug) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image URL</label>
                <input type="url" name="image" class="form-control" value="{{ old('image', $article->image) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required>{{ old('content', $article->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Article</button>
        </form>
    </div>
@endsection
