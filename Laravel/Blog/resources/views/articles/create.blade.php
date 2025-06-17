@extends('layout')

@section('title', 'Create Article')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center fw-bold text-primary">Create New Article</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Errors!</strong> Please fix the following errors:
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Article Title</label>
                <input type="text" name="title" class="form-control" id="title"   value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug (URL-friendly)</label>
                <input type="text" name="slug" class="form-control" id="slug"   value="{{ old('slug') }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="url" name="image" class="form-control" id="image"   value="{{ old('image', 'https://placehold.co/600x400') }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Article Content</label>
                <textarea name="content" class="form-control" id="content" rows="6"  >{{ old('content') }}</textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success px-4">Create</button>
                <a href="/articles" class="btn btn-secondary ms-2">Cancel</a>
            </div>
        </form>
    </div>
@endsection
