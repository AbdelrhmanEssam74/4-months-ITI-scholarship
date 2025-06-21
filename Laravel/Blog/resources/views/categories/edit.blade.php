@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', 'Edit Category')

@section('content')
    <div class="edit-category-container">
        <!-- Header with back button -->
        <div class="edit-header">
            <a href="{{ route('categories.index') }}" class="back-button">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h1>Edit Category</h1>
        </div>

        <!-- Main form container -->
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

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data"
                  class="category-form">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                           placeholder="Enter category name" required>
                </div>

                <!-- Description Field -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4"
                              placeholder="Describe this category"
                              required>{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Image Upload -->
                <div class="form-group">
                    <label>Category Image</label>
                    <div class="image-upload-container">
                        <div class="image-preview">
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Current category image"
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
                                @if ($category->image)
                                    Current: {{ basename($category->image) }}
                                @else
                                    No image selected
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="submit-button">
                        <i class="bi bi-check-circle"></i> Update Category
                    </button>
                    <a href="{{ route('categories.index') }}" class="cancel-button">
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
    /* Main Container */
    .edit-category-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 1.5rem;
    }

    /* Header Styles */
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

    /* Form Container */
    .form-container {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    /* Error Alert */
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

    /* Form Groups */
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

    /* Image Upload */
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

    /* Form Actions */
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

    /* Responsive Adjustments */
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
        // Image preview functionality
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const fileInfo = document.getElementById('file-info');
        const placeholderIcon = document.querySelector('.placeholder-icon');

        if (imageInput) {
            imageInput.addEventListener('change', function (e) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        if (!imagePreview) {
                            // Create new image element if it doesn't exist
                            const newPreview = document.createElement('img');
                            newPreview.id = 'image-preview';
                            newPreview.src = e.target.result;
                            newPreview.alt = 'Image preview';
                            document.querySelector('.image-preview').prepend(newPreview);

                            // Hide placeholder icon
                            if (placeholderIcon) {
                                placeholderIcon.style.display = 'none';
                            }
                        } else {
                            // Update existing preview
                            imagePreview.src = e.target.result;
                        }

                        // Update file info
                        fileInfo.textContent = this.files[0].name;
                    };

                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
    });
</script>

