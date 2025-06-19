@extends('layout')

@section('title', 'Create Article')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center fw-bold text-primary">Create New Article</h2>
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Article Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " id="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug (URL-friendly)</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror "
                    id="slug" value="{{ old('slug') }}">
                @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Article Content</label>
                <textarea name="content" class="form-control  @error('content') is-invalid @enderror" id="content" rows="6">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success px-4">Create</button>
                <a href="/articles" class="btn btn-secondary ms-2">Cancel</a>
            </div>
        </form>
    </div>
@endsection
