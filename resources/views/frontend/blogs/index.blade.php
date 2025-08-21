@extends('layouts.frontend')

@section('body')

<x-frontend.masthead
subheading="Welcome to Our Blogs!"
heading="Explore Latest Insights"
link="{{ route('blogs.create') }}"
link-text="Create New Blog"
/>

{{-- @dd($blogs) --}}
    <!-- Blogs Grid-->
    <section class="page-section color-section" id="blogs">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Blogs</h2>
                <h3 class="section-subheading">Discover our latest articles.</h3>
            </div>
            <div class="row g-4">
                @forelse ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                        <a class="a-article" href="{{route('blogs.show',$blog->id)}}">
                            <article class="blog-card">
                                @if ($blog->featured_image)
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="blog-card-img img-fluid">
                                @else
                                    <img src="https://via.placeholder.com/400x250" alt="{{ $blog->title }}" class="blog-card-img img-fluid">
                                @endif
                                <div class="blog-card-body">
                                    <h4 class="blog-card-title"><a href="{{ route('blogs.show', $blog->id) }}" class="text-primary">{{ $blog->title }}</a></h4>
                                    <p class="blog-card-excerpt text-muted">{{ Str::limit($blog->excerpt, 100) }}</p>
                                    <p class="blog-card-meta text-muted">By {{ $blog->user->name }} | {{ $blog->category->name }} | {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft' }}</p>
                                </div>
                            </article>
                        </a>
                    </div>
                @empty
                    <p class="text-center">No blogs available yet.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .color-section{

        }
        .blog-card {
            border: 1px solid #b99950;
            border-radius: 8px;
            overflow: hidden;
            height: 28rem;
            background-color: #0000001c;
            transition: box-shadow 0.3s ease;
        }
        .blog-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .blog-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .blog-card-body {
            padding: 15px;
        }
        .blog-card-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .blog-card-title a {
            color: #007bff;
            text-decoration: none;
        }
        .blog-card-title a:hover {
            text-decoration: underline;
        }
        /* .blog-card-excerpt {
            font-family: 'Roboto Slab', serif;
            font-size: 1.25rem;
            margin-bottom: 15px;
            line-height: 1.5rem;
        }
        .blog-card-meta {
            font-size: 0.875rem;
            margin-bottom: 0;
        } */
        @media (max-width: 768px) {

              #category-blogs .blog-card {
            border: 1px solid #b99950;
            border-radius: 8px;
            overflow: hidden;
            margin: 1% 8%;
            height: 24rem;
            width: 27rem;
            display: center;
            background-color: #0000001c;
            transition: box-shadow 0.3s ease;
        }
            #category-blogs .blog-card-img {
                height: 200px;
                width: 100%;
            }
            .blog-card-title {
                font-size: 1.1rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Add smooth scrolling or any future interactivity if needed
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endpush
