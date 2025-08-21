@extends('layouts.frontend')

<?php
 if(Auth::check() && Auth::user()->is_admin){
    $link_text = 'Create New Category';
    $link = route('categories.create');
}
else{
    $link_text = 'Show all Blogs';
    $link = route('blogs.index');
}

?>
{{-- @dd(Auth::user()->is_admin) --}}
@section('body')
    <x-frontend.masthead
        subheading="Welcome to Our Home Page!"
        heading="Glad You're Here"
        link="{{$link}}"
        link-text="{{$link_text}}"
    />

    <!-- Categories Section -->
    <section class="page-section" id="categories">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Categories</h2>
                <h3 class="section-subheading text-muted">Explore our diverse blog topics.</h3>
            </div>
            <div class="row text-center">
                @forelse ($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="category-card">
                            <div class="card-ee bg-light p-3 rounded shadow-sm">
                                <span class="fa-stack fa-4x">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
                                    @else
                                        <img src="https://via.placeholder.com/100" alt="{{ $category->name }}" class="category-image">
                                    @endif
                                </span>
                                <h4 class="my-3">{{ $category->name }}</h4>
                                <p class="text-muted">{{ Str::limit($category->description, 100) }}</p>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-view btn-sm text-uppercase">View Blogs</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No categories available yet.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        #categories .category-card {
            transition: box-shadow 0.3s ease;
            height: 100%;
        }
        #categories .category-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        #categories .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        #categories .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #categories h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #212529;
        }
        #categories .text-muted {
            font-family: 'Roboto Slab', serif;
            font-size: 0.95rem;
        }
        @media (max-width: 768px) {
            #categories .col-md-4 {
                margin-bottom: 20px;
            }
            #categories h4 {
                font-size: 1.2rem;
            }
        }

        /* .category-card  {
            position: relative;
            display: inline-block;
            transition: transform 0.3s ease, filter 0.3s ease;
        } */

        .category-card:hover .card-ee {
            transform: scale(1.01);
            box-shadow: 0 2px 4px rgba(46, 46, 46, 0.1);
            /* filter: brightness(1.2); */
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


    </style>
@endpush

@push('scripts')
    <script>
        // Add any future interactivity if needed
    </script>
@endpush
