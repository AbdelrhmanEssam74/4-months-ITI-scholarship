@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', 'Create Article')

@section('content')
    <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Articles</a></li>
                    <li class="breadcrumb-item active current">Create Article</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Create a New Blog Article</h1>
            <p>Share your knowledge and insights with the world.</p>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"
                      class="minimal-form">
                    @csrf

                    <!-- Title -->
                    <div class="mb-5">
                        <input type="text" name="title" id="title" class="minimal-input"
                               placeholder="Article Title" value="{{ old('title') }}" required>
                        @error('title')
                        <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Slug -->
                    <div class="mb-5">
                        <input type="text" name="slug" id="slug" class="minimal-input"
                               placeholder="URL-friendly Slug" value="{{ old('slug') }}" readonly>
                        @error('slug')
                        <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Category Selection -->
                    <div class="mb-5">
                        <select name="category_id" id="category_id" class="minimal-input">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>
                    <!-- Tags -->
                    <div class="mb-5">
                        <label for="tag-input" class="form-label">Tags (max 3):</label>
                        <input type="text" id="tag-input" class="minimal-input"
                               placeholder="Type a tag and press Enter">
                        <div id="tags-container" class="d-flex flex-wrap mt-2 gap-2"></div>
                        <input type="hidden" name="tags" id="tags-hidden">
                        @error('tags')
                        <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-5">
                        <div class="file-input-wrapper">
                            <input type="file" name="image" id="image" class="file-input">
                            <label for="image" class="file-input-label">
                                <span class="file-input-button">Choose Featured Image</span>
                                <span class="file-input-text">No file chosen</span>
                            </label>
                        </div>
                        @error('image')
                        <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Content -->
                    <div class="mb-5">
                        <textarea name="content" id="content" class="minimal-input"
                                  placeholder="Write your article content here..."
                                  rows="10">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="minimal-error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="text-end">
                        <a href="{{ route('articles.index') }}" class="btn-cancel me-2">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn-submit">
                            <i class="bi bi-plus-circle me-1"></i> Publish Article
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
    /* Reuse the styles from category design */
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

    select.minimal-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2364748b' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.5rem center;
        background-size: 16px 12px;
        padding-right: 2rem;
    }

    .btn-submit {
        border: none;
        background: #000;
        color: white;
        padding: 0.8rem 2rem;
        border-radius: 0;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: #333;
    }

    .btn-cancel {
        border: 1px solid #e2e8f0;
        background: transparent;
        color: #64748b;
        padding: 0.8rem 1.5rem;
        border-radius: 0;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        background: #f8fafc;
    }

    .minimal-error {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    /* File Input Styles */
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
    #tags-container .badge {
        background-color: #ef4444;
        font-size: 0.875rem;
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // File input handling
        const fileInput = document.getElementById('image');
        if (fileInput) {
            const fileInputLabel = fileInput.nextElementSibling;
            const fileInputText = fileInputLabel.querySelector('.file-input-text');

            fileInput.addEventListener('change', function (e) {
                if (this.files.length) {
                    fileInputText.textContent = this.files[0].name;
                    fileInputText.style.color = '#000';
                } else {
                    fileInputText.textContent = 'No file chosen';
                    fileInputText.style.color = '#64748b';
                }
            });
        }

        // Auto-generate slug from title
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        if (titleInput && slugInput) {
            titleInput.addEventListener('input', function () {
                if (!slugInput._changed) {
                    slugInput.value = generateSlug(this.value);
                }
            });

            slugInput.addEventListener('change', function () {
                this._changed = true;
            });
        }

        function generateSlug(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')              // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }

        // Tag input handling
        const tagInput = document.getElementById('tag-input');
        const tagsContainer = document.getElementById('tags-container');
        const hiddenInput = document.getElementById('tags-hidden');
        let tags = [];

        tagInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && this.value.trim() !== '') {
                e.preventDefault();
                if (tags.length < 3) {
                    const tag = this.value.trim();
                    if (!tags.includes(tag)) {
                        tags.push(tag);
                        updateTagsDisplay();
                    }
                    this.value = '';
                } else {
                    alert('Maximum 3 tags allowed');
                }
            }
        });

        function updateTagsDisplay() {
            tagsContainer.innerHTML = '';
            tags.forEach((tag, index) => {
                const tagElement = document.createElement('span');
                tagElement.className = 'badge  text-white px-3 py-1 rounded-pill position-relative';
                tagElement.innerHTML = `${tag} <span style="cursor:pointer;" class="ms-2" data-index="${index}">&times;</span>`;
                tagsContainer.appendChild(tagElement);
            });
            hiddenInput.value = tags.join(',');
        }

        tagsContainer.addEventListener('click', function (e) {
            if (e.target.dataset.index !== undefined) {
                tags.splice(e.target.dataset.index, 1);
                updateTagsDisplay();
            }
        });
    });
</script>
