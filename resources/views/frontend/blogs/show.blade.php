@extends('layouts.frontend')

@section('body')
    {{-- <x-frontend.masthead
        subheading="Read the Full Article"
        heading="{{ $blog->title }}"
        link="{{ route('blogs.index') }}"
        link-text="Back to Blogs"
    /> --}}

    <!-- Blog Content -->
    <section class="page-section" id="blog-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <article class="blog-detail bg-light p-4 rounded shadow-sm">
                        @if ($blog->featured_image)
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid mb-4 rounded">
                        @else
                            <img src="https://via.placeholder.com/800x400" alt="{{ $blog->title }}" class="img-fluid mb-4 rounded">
                        @endif
                        <h2 class="blog-title text-uppercase">{{ $blog->title }}</h2>
                        <p class="blog-meta text-muted">By {{ $blog->user->name }} | {{ $blog->category->name }} | {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft' }}</p>
                        <div class="blog-content">{!! nl2br(e($blog->content)) !!}</div>
                        @if (auth()->check() && auth()->id() === $blog->user_id)
                            <div class="mt-4">
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-new btn-sm me-2">Edit</a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm"  onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                </form>
                            </div>
                        @endif
                    </article>
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

        #blog-content{
            margin-top: 5rem;
        }
        #blog-content .blog-detail {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
        }
        #blog-content .blog-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            color: #212529;
            margin-bottom: 15px;
        }
        #blog-content .blog-meta {
            font-family: 'Roboto Slab', serif;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        #blog-content .blog-content {
            font-family: 'Roboto Slab', serif;
            font-size: 1.1rem;
            line-height: 1.6;
            color: #495057;
        }
        #blog-content .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        #blog-content .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #blog-content .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        #blog-content .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        @media (max-width: 768px) {
            #blog-content .blog-title {
                font-size: 1.5rem;
            }
            #blog-content .blog-content {
                font-size: 1rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Add any future interactivity if needed
    </script>
@endpush
