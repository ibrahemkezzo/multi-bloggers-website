@extends('layouts.frontend')

<?php
 if(Auth::check() && Auth::user()->is_admin){
    $link_text = 'Create New Category';
    $link = route('categories.create');
}
else{
    $link_text = 'Show all Category';
    $link = route('categories.index');
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
                        <div class="category-card bg-light p-3 rounded shadow-sm">
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid mb-3 rounded-circle" style="max-width: 100px; max-height: 100px;">
                            @else
                                <img src="https://via.placeholder.com/100" alt="{{ $category->name }}" class="img-fluid mb-3 rounded-circle" style="max-width: 100px; max-height: 100px;">
                            @endif
                            <h4 class="my-3">{{ $category->name }}</h4>
                            <p class="text-muted">{{ Str::limit($category->description, 100) }}</p>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-view btn-sm text-uppercase">View Blogs</a>
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
    </style>
@endpush

@push('scripts')
    <script>
        // Add any future interactivity if needed
    </script>
@endpush
