@extends('layouts.frontend')

@section('body')
    <x-frontend.masthead
        subheading="Discover Our World of Knowledge"
        heading="Glad You're Here to Explore"
        link="{{ route('blogs.index') }}"
        link-text="Start Exploring"
    />

    <!-- Categories Section -->
    <section class="page-section" id="categories">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Top Categories</h2>
                <h3 class="section-subheading text-muted">Our most popular categories with the highest number of blogs.</h3>
            </div>
            <div class="row text-center">
                @foreach ($topCategories as $category)
                    <div class="col-md-4">
                        <a href="{{ route('categories.show', $category->id) }}">
                            <div class="a-service">
                                <span class="fa-stack fa-4x">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
                                    @else
                                        <img src="https://via.placeholder.com/100" alt="{{ $category->name }}" class="category-image">
                                    @endif
                                </span>
                                <h4 class="my-3">{{ $category->name }}</h4>
                                <p class="text-muted">{{ $category->description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-xl text-uppercase">Show More Categories</a>
            </div>
        </div>
    </section>

    <!-- Latest Blogs Section -->
    <section class="page-section bg-light" id="latest-blogs">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Latest Blogs</h2>
                <h3 class="section-subheading text-muted">Check out our most recent articles.</h3>
            </div>
            <div class="row g-4">
                @foreach ($latestBlogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <article class="blog-card">
                            @if ($blog->featured_image)
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="blog-card-img img-fluid">
                            @else
                                <img src="https://via.placeholder.com/400x250" alt="{{ $blog->title }}" class="blog-card-img img-fluid">
                            @endif
                            <div class="blog-card-body">
                                <h4 class="blog-card-title"><a href="{{ route('blogs.show', $blog->id) }}" class="text-primary">{{ $blog->title }}</a></h4>
                                <p class="blog-card-excerpt text-muted">{{ Str::limit($blog->excerpt, 100) }}</p>
                                <p class="blog-card-meta text-muted">By {{ $blog->user->name }} | {{ $blog->published_at->format('M d, Y') }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-xl text-uppercase">Show More Blogs</a>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required />
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required />
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="Your Phone *" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" id="message" name="message" placeholder="Your Message *" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .a-service {
            position: relative;
            display: inline-block;
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .a-service:hover {
            transform: scale(1.05);
            filter: brightness(1.2);
        }

        .fa-4x {
            font-size: 3.5em;
        }

        .fa-stack {
            position: relative;
            width: 100%;
            height: 100px;
            line-height: 100px;
            margin-bottom: 15px;
        }

        .fa-circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #007bff;
            z-index: 1;
        }

        .category-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            object-fit: cover;
            /* border-radius: 50%; */
            z-index: 2;
        }

        @media (max-width: 768px) {
            .category-image {
                width: 60px;
                height: 60px;
            }
            .fa-stack {
                height: 80px;
                line-height: 80px;
            }
        }

        #latest-blogs .blog-card {
            border: 1px solid #b99950;
            border-radius: 8px;
            overflow: hidden;
            height: 28rem;
            background-color: #0000001c;
            transition: box-shadow 0.3s ease;
        }

        #latest-blogs .blog-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #latest-blogs .blog-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        #latest-blogs .blog-card-body {
            padding: 15px;
        }

        #latest-blogs .blog-card-title a {
            color: #007bff;
            text-decoration: none;
        }

        #latest-blogs .blog-card-title a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            #latest-blogs .blog-card-img {
                height: 150px;
            }
        }
    </style>
@endpush
