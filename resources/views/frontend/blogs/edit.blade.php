@extends('layouts.frontend')

@section('body')
    <x-frontend.masthead
        subheading="Edit Your Blog"
        heading="Update Your Story"
        link="{{ route('blogs.show', $blog->id) }}"
        link-text="Back to Article"
    />

    <!-- Edit Blog Form -->
    <section class="page-section" id="edit-blog">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Update Blog Post</h2>
                <h3 class="section-subheading text-muted">Modify the details of your article.</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $blog->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="3" required>{{ old('excerpt', $blog->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="6" required>{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Featured Image</label>
                            @if ($blog->featured_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid rounded" style="max-height: 200px;">
                                </div>
                            @endif
                            <input type="file" name="featured_image" id="featured_image" class="form-control @error('featured_image') is-invalid @enderror">
                            <small class="text-muted">Leave blank to keep the current image.</small>
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input value="1" type="checkbox" name="is_published" id="is_published" class="form-check-input @error('is_published') is-invalid @enderror" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Publish Immediately</label>
                            @error('is_published')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-new btn-xl text-uppercase">Update Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        #edit-blog .form-label {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #212529;
        }
        #edit-blog .form-control {
            border-radius: 5px;
            border-color: #ced4da;
            font-family: 'Roboto Slab', serif;
        }
        #edit-blog .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        #edit-blog .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        #edit-blog .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #edit-blog .shadow-sm {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        #edit-blog .bg-light {
            background-color: #f8f9fa;
        }
        @media (max-width: 768px) {
            #edit-blog .col-lg-8 {
                padding: 0 15px;
            }
            #edit-blog .btn-xl {
                width: 100%;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.getElementById('content').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    </script>
@endpush
