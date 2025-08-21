@extends('layouts.frontend')

@section('body')
    {{-- <x-frontend.masthead
        subheading="Create a New Blog!"
        heading="Share Your Story"
        link="{{ route('blogs.index') }}"
        link-text="Back to Blogs"
    /> --}}

    <!-- Create Blog Form -->
    <section class="page-section" id="create-blog">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Write a Blog Post</h2>
                <h3 class="section-subheading text-muted">Fill in the details to publish your article.</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="3" required>{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="6" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Featured Image</label>
                            <input type="file" name="featured_image" id="featured_image" class="form-control @error('featured_image') is-invalid @enderror">
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input value="1" type="checkbox" name="is_published" id="is_published" class="form-check-input @error('is_published') is-invalid @enderror" {{ old('is_published') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Publish Immediately</label>
                            @error('is_published')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-new btn-xl text-uppercase">Publish Blog</button>
                        <a href="{{route('blogs.index')}}" class="btn btn-delete btn-xl text-uppercase me-2"> Back to Blogs</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        #mainNav {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            border: none;
            background-color: #212529;
            transition: padding-top 0.3s ease-in-out, padding-bottom 0.3s ease-in-out;
            }
        #create-blog{
            margin-top: 5rem;
        }
        #create-blog .form-label {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #212529;
        }
        #create-blog .form-control {
            border-radius: 5px;
            border-color: #ced4da;
            font-family: 'Roboto Slab', serif;
        }
        #create-blog .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        #create-blog .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        #create-blog .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #create-blog .shadow-sm {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        #create-blog .bg-light {
            background-color: #f8f9fa;
        }
        @media (max-width: 768px) {
            #create-blog .col-lg-8 {
                padding: 0 15px;
            }
            #create-blog .btn-xl {
                width: 100%;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Add form validation enhancement or tooltips if needed
        document.getElementById('content').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    </script>
@endpush
