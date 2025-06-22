@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', 'Edit Article')

@section('content')
    <div class="edit-category-container">
        <div class="edit-header">
            <a href="{{ route('articles.index') }}" class="back-button">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h1>Edit Article</h1>
        </div>

        <div class="form-container">
            @if ($errors->any())
                <div class="error-alert">
                    <div class="alert-icon">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                    <div>
                        <h4>There were some issues</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data"
                  class="category-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Article Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                           placeholder="Enter article title">
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $article->slug) }}"
                           placeholder="Enter article slug" readonly>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="6"
                              placeholder="Write the article content">{{ old('content', $article->content) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tag-input">Tags</label>
                    <div id="tags-container" class="mb-2 d-flex flex-wrap gap-2">

                    </div>
                    <input type="text" id="tag-input" placeholder="Type and press enter (max 3 tags)">
                    <input type="hidden" name="tags" id="tags-hidden" value="{{ old('tags', $article->tags) }}">
                    <small class="form-text text-muted">Press Enter to add tags (max 3).</small>
                </div>


                <div class="form-group">
                    <label>Article Image</label>
                    <div class="image-upload-container">
                        <div class="image-preview">
                            @if ($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="Current article image"
                                     id="image-preview">
                            @else
                                <div class="placeholder-icon">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </div>
                        <div class="upload-controls">
                            <input type="file" name="image" id="image" class="file-input" accept="image/*">
                            <label for="image" class="upload-button">
                                <i class="bi bi-upload"></i> Change Image
                            </label>
                            <div class="file-info" id="file-info">
                                @if ($article->image)
                                    Current: {{ basename($article->image) }}
                                @else
                                    No image selected
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-button">
                        <i class="bi bi-check-circle"></i> Update Article
                    </button>
                    <a href="{{ route('articles.index') }}" class="cancel-button">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

<style>
    #tags-container span {
        background-color: #6366f1;
        font-size: 0.875rem;
    }

    #tag-input {
        width: 100%;
        padding: 0.6rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 1rem;
        outline: none;
    }

    #tag-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }


    .edit-category-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 1.5rem;
    }

    .edit-header {
        display: flex;
        align-items: center;
        margin-bottom: 2.5rem;
        position: relative;
    }

    .edit-header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        margin: 0 auto;
    }

    .back-button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f3f4f6;
        color: #4b5563;
        transition: all 0.2s ease;
    }

    .back-button:hover {
        background: #e5e7eb;
        transform: translateX(-2px);
    }

    .form-container {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .error-alert {
        display: flex;
        background: #fff5f5;
        border-left: 4px solid #f56565;
        padding: 1rem;
        margin-bottom: 2rem;
        border-radius: 4px;
    }

    .alert-icon {
        color: #f56565;
        margin-right: 1rem;
        font-size: 1.5rem;
    }

    .error-alert h4 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        color: #c53030;
    }

    .error-alert ul {
        margin: 0;
        padding-left: 1.25rem;
        color: #718096;
    }

    .form-group {
        margin-bottom: 1.75rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #4a5568;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 1rem;
        transition: all 0.2s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-group textarea {
        min-height: 120px;
        resize: vertical;
    }

    .image-upload-container {
        display: flex;
        gap: 1.5rem;
        margin-top: 0.5rem;
    }

    .image-preview {
        width: 120px;
        height: 120px;
        border-radius: 8px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 1px dashed #cbd5e0;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .placeholder-icon {
        color: #cbd5e0;
        font-size: 2.5rem;
    }

    .upload-controls {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .file-input {
        display: none;
    }

    .upload-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.625rem 1.25rem;
        background: #edf2f7;
        color: #4a5568;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-bottom: 0.75rem;
        width: fit-content;
    }

    .upload-button:hover {
        background: #e2e8f0;
    }

    .upload-button i {
        margin-right: 0.5rem;
    }

    .file-info {
        font-size: 0.875rem;
        color: #718096;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #edf2f7;
    }

    .submit-button {
        padding: 0.75rem 1.5rem;
        background: #4f46e5;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
    }

    .submit-button:hover {
        background: #4338ca;
        transform: translateY(-1px);
    }

    .submit-button i {
        margin-right: 0.5rem;
    }

    .cancel-button {
        padding: 0.75rem 1.5rem;
        background: white;
        color: #4b5563;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .cancel-button:hover {
        background: #f9fafb;
        border-color: #d1d5db;
    }

    @media (max-width: 640px) {
        .image-upload-container {
            flex-direction: column;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .submit-button,
        .cancel-button {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const fileInfo = document.getElementById('file-info');
        const placeholderIcon = document.querySelector('.placeholder-icon');

        if (imageInput) {
            imageInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        if (!imagePreview) {
                            const newPreview = document.createElement('img');
                            newPreview.id = 'image-preview';
                            newPreview.src = e.target.result;
                            newPreview.alt = 'Image preview';
                            document.querySelector('.image-preview').prepend(newPreview);
                            if (placeholderIcon) {
                                placeholderIcon.style.display = 'none';
                            }
                        } else {
                            imagePreview.src = e.target.result;
                        }
                        fileInfo.textContent = imageInput.files[0].name;
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
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
        // === Tag input handling ===
        const tagInput = document.getElementById('tag-input');
        const tagsContainer = document.getElementById('tags-container');
        const hiddenInput = document.getElementById('tags-hidden');

        // Load existing tags from hidden input (e.g., when editing)
        let tags = hiddenInput.value
            ? hiddenInput.value.split(',').map(tag => tag.trim()).filter(Boolean)
            : [];

        updateTagsDisplay();

        tagInput.addEventListener('keydown', function (e) {
            if ((e.key === 'Enter' || e.key === ',') && this.value.trim() !== '') {
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
                tagElement.className = 'badge text-white px-3 py-1 rounded-pill position-relative';
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
