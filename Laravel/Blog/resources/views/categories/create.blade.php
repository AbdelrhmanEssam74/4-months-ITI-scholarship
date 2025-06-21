@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', 'Create Category')

@section('content')
    <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
                    <li class="breadcrumb-item active current">Create Category</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Create a New Blog Category</h1>
            <p>Use the form below to add a new category to your blog.</p>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="minimal-form">
                    @csrf

                    <!-- Name -->
                    <div class="mb-5">
                        <input type="text" name="name" id="name" class="minimal-input"
                               placeholder="Category Name" value="{{ old('name') }}"  >
                        @error('name') <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-5">
                        <textarea name="description" id="description" class="minimal-input"
                                  placeholder="Description" rows="4"  >{{ old('description') }}</textarea>
                        @error('description') <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Author -->
                    <div class="mb-5">
                        <input type="text" name="category_author" id="category_author" class="minimal-input"
                               placeholder="Category Author" value="{{ old('category_author') }}"  >
                        @error('category_author') <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-5">
                        <div class="file-input-wrapper">
                            <input type="file" name="image" id="image" class="file-input">
                            <label for="image" class="file-input-label">
                                <span class="file-input-button">Choose Image</span>
                                <span class="file-input-text">No file chosen</span>
                            </label>
                        </div>
                        @error('image') <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit -->
                    <div class="text-end">
                        <button type="submit" class="btn-submit">
                            <i class="bi bi-plus-circle me-1"></i> Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

<style>
    .minimal-form {
        width: 100%;
    }

    .minimal-input {
        width: 100%;
        border: none;
        border-bottom: 1px solid #e2e8f0;
        padding: 0.8rem 0;
        font-size: 1rem;
        background: transparent;
        transition: all 0.3s ease;
    }

    .minimal-input:focus {
        border-bottom-color: #000;
        outline: none;
    }

    .minimal-input::placeholder {
        color: #64748b;
        opacity: 1;
    }

    .minimal-button {
        border: none;
        background: #000;
        color: white;
        padding: 0.8rem 2rem;
        border-radius: 0;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .minimal-button:hover {
        background: #333;
    }

    .minimal-error {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    /* Custom File Input Styles */
    .file-input-wrapper {
        position: relative;
        margin-top: 1rem;
    }

    .file-input {
        position: absolute;
        left: -9999px;
        opacity: 0;
    }

    .file-input-label {
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-input-button {
        padding: 0.7rem 1.5rem;
        background: #f1f5f9;
        color: #334155;
        border-radius: 4px;
        margin-right: 1rem;
        transition: all 0.2s ease;
        border: 1px solid #e2e8f0;
    }

    .file-input-button:hover {
        background: #e2e8f0;
    }

    .file-input-text {
        color: #64748b;
        font-size: 0.9rem;
    }

    /* Show filename when file is selected */
    .file-input:focus + .file-input-label,
    .file-input-label:hover {
        outline: none;
    }

    .file-input:valid + .file-input-label .file-input-text:after {
        content: attr(data-text);
        display: inline-block;
        margin-left: 0.5rem;
        color: #000;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('image');
        const fileInputLabel = fileInput.nextElementSibling;
        const fileInputText = fileInputLabel.querySelector('.file-input-text');

        fileInput.addEventListener('change', function(e) {
            if (this.files.length) {
                fileInputText.textContent = this.files[0].name;
                fileInputText.style.color = '#000';
            } else {
                fileInputText.textContent = 'No file chosen';
                fileInputText.style.color = '#64748b';
            }
        });
    });
</script>
