@extends('layout')

@section('title', 'Edit Category')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center text-primary">Edit Category</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops! There were some problems:</strong>
                        <ul class="mt-2 mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control" required>{{ old('description', $category->description) }}</textarea>
                    </div>
                                        <div class="mb-3">
                        <label for="image" class="form-label">Change Image (optional)</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($category->image)
                            <small class="d-block mt-2">Current Image:</small>
                            <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="img-thumbnail mt-2" style="max-height: 150px;">
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Update</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
