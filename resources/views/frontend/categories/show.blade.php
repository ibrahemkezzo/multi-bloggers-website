@extends('layouts.frontend')

@section('body')
    <x-frontend.masthead subheading="Category: {{ $category->name }}" heading="Explore Related Blogs"
        link="{{ route('categories.index') }}" link-text="Back to All services" />

    <section class="page-section bg-light" id="category-blogs">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ $category->name }}</h2>
                @if (Auth::check() && Auth::user()->is_admin)
                    <div class="mb-5 mt-3">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-new btn-sm me-2">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </div>
                @endif
                <h3 class="section-subheading text-muted">{{ $category->description }}</h3>
            </div>
            <div class="row g-4">
                @forelse ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <article class="blog-card">
                            @if ($blog->featured_image)
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                                    class="blog-card-img img-fluid">
                            @else
                                <img src="https://via.placeholder.com/400x250" alt="{{ $blog->title }}"
                                    class="blog-card-img img-fluid">
                            @endif
                            <div class="blog-card-body">
                                <h4 class="blog-card-title"><a href="{{ route('blogs.show', $blog->id) }}"
                                        class="text-primary">{{ $blog->title }}</a></h4>
                                <p class="blog-card-excerpt text-muted">{{ Str::limit($blog->excerpt, 100) }}</p>
                                <p class="blog-card-meta text-muted">By {{ $blog->user->name }} |
                                    {{ $blog->published_at->format('M d, Y') }}</p>
                            </div>
                        </article>
                    </div>
                @empty
                    <p class="text-center">No blogs available in this category.</p>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        #category-blogs .blog-card {
            border: 1px solid #b99950;
            border-radius: 8px;
            overflow: hidden;
            height: 28rem;
            background-color: #0000001c;
            transition: box-shadow 0.3s ease;
        }

        #category-blogs .blog-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #category-blogs .blog-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        #category-blogs .blog-card-body {
            padding: 15px;

        }

        #category-blogs .blog-card-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        #category-blogs .blog-card-title a {
            color: #007bff;
            text-decoration: none;
        }

        #category-blogs .blog-card-title a:hover {
            text-decoration: underline;
        }

        #category-blogs .blog-card-excerpt {
            font-family: 'Roboto Slab', serif;
            font-size: 1rem;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        #category-blogs .blog-card-meta {
            font-size: 0.875rem;
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            #category-blogs .blog-card-img {
                height: 150px;
            }

            #category-blogs .blog-card-title {
                font-size: 1.1rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        /*!
         * Start Bootstrap - Agency v7.0.12[](https://startbootstrap.com/theme/agency)
         * Copyright 2013-2023 Start Bootstrap
         * Licensed under MIT[](https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
         */

        window.addEventListener('DOMContentLoaded', event => {
            // Navbar shrink function
            const navbarShrink = () => {
                const navbarCollapsible = document.body.querySelector('#mainNav');
                if (!navbarCollapsible) {
                    return;
                }
                // Check if the page has scrolled or is not at the top
                if (window.scrollY > 0 || document.documentElement.scrollTop > 0) {
                    navbarCollapsible.classList.add('navbar-shrink');
                } else {
                    navbarCollapsible.classList.remove('navbar-shrink');
                }
            };

            // Run navbar shrink on initial load
            navbarShrink();

            // Add scroll event listener
            document.addEventListener('scroll', navbarShrink);

            // Activate Bootstrap scrollspy on the main nav element
            const mainNav = document.body.querySelector('#mainNav');
            if (mainNav) {
                new bootstrap.ScrollSpy(document.body, {
                    target: '#mainNav',
                    rootMargin: '0px 0px -40%',
                });
            }

            // Collapse responsive navbar when toggler is visible
            const navbarToggler = document.body.querySelector('.navbar-toggler');
            const responsiveNavItems = [].slice.call(
                document.querySelectorAll('#navbarResponsive .nav-link')
            );
            responsiveNavItems.forEach(responsiveNavItem => {
                responsiveNavItem.addEventListener('click', () => {
                    if (window.getComputedStyle(navbarToggler).display !== 'none') {
                        navbarToggler.click();
                    }
                });
            });
        });
    </script>
@endpush
