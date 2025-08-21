@extends('layouts.frontend')

@section('body')
    <x-frontend.masthead
        subheading="Your Blogs"
        heading="Explore Your Posts"
        link="{{ route('blogs.create') }}"
        link-text="Create New Blog"
    />

    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Your Blogs</h2>
                <h3 class="section-subheading text-muted">A timeline of your published posts.</h3>
            </div>
            <ul class="timeline">
                @foreach ($blogs as $index => $blog)
                    <li class=" @if ($index % 2 == 1) timeline-inverted @endif  timeline-link">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="
                            @if (isset($blog->featured_image))
                            {{asset('storage/'.$blog->featured_image)}}
                            @else
                            {{asset('frontend/assets/img/about/1.jpg')}}
                            @endif
                            "
                            alt="..." style="width: 100%; height: 100%;" />
                        </div>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="timeline-panel">
                            <div class="timeline-heading">
                                <h4  class="blog-date">{{ $blog->created_at->format('Y F d') }}</h4>
                                <h4 class="subheading blog-title">{{ $blog->title }}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">{{ $blog->excerpt }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach

                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            This All
                            <br />
                            Your
                            <br />
                            Blogs
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection

@push('styles')
   <style>
        .timeline-link {
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s ease;
        }

        .timeline-link:hover {
            transform: scale(1.05);
        }

        .timeline-link:hover ~ .timeline-image {
            transform: scale(1.1);
        }

        .timeline-image {
            transition: transform 0.3s ease;
        }

        .timeline-heading .blog-date {
            color: #000;
        }

        .timeline-heading .blog-title {
            color: #fed136;
        }
        .timeline-link .timeline-panel{
            text-decoration: none;
            color: inherit;
        }
        .timeline-link:hover .timeline-panel .blog-title{
            text-decoration: none;
            color: #fed136;
        }
    </style>
@endpush
