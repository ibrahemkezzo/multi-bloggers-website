@extends('layouts.frontend')

@section('body')
    <!-- Blog Content -->
    <section class="page-section" id="blog-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <article class="blog-detail bg-light p-4 rounded shadow-sm">
                        <div class="image-container">
                            @if ($blog->featured_image)
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid mb-4 rounded" style="max-height: 40vh; width: auto;">
                            @else
                                <img src="https://via.placeholder.com/800x400" alt="{{ $blog->title }}" class="img-fluid mb-4 rounded" style="max-height: 40vh; width: auto;">
                            @endif
                        </div>
                        <h2 class="blog-title text-uppercase text-center">{{ $blog->title }}</h2>
                        <p class="blog-meta text-muted text-center">By {{ $blog->user->name }} | {{ $blog->category->name }} | {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft' }}</p>
                        <div class="blog-content mb-3 text-center">{!! nl2br(e($blog->excerpt)) !!}</div>
                        <div class="blog-content text-center">{!! nl2br(e($blog->content)) !!}</div>
                        @if (auth()->check() && auth()->id() === $blog->user_id)
                            <div class="mt-4 text-center">
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-new btn-sm me-2">Edit</a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
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

        #blog-content {
            margin-top: 5rem;
        }
        #blog-content .blog-detail {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
        }
        #blog-content .blog-title {
            font-family: 'Montserrat', 'Noto Sans Arabic', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            color: #212529;
            margin-bottom: 15px;
            text-align: center;
        }
        #blog-content .blog-meta {
            font-family: 'Roboto Slab', 'Noto Sans Arabic', serif;
            font-size: 0.9rem;
            margin-bottom: 20px;
            text-align: center;
        }
        #blog-content .blog-content {
            font-family: 'Roboto Slab', 'Noto Sans Arabic', serif;
            font-size: 1.1rem;
            line-height: 1.6;
            color: #495057;
            text-align: center;
        }
        #blog-content .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin: 0 5px;
        }
        #blog-content .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #blog-content .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            margin: 0 5px;
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
        /* دعم اللغة العربية والإنجليزية */
        .text-center {
            direction: ltr; /* افتراضي للإنجليزية */
        }
        .arabic-content {
            direction: rtl;
            text-align: center;
        }
        /* مركزة الصورة أفقيًا وعموديًا */
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
        }
        .image-container img {
            max-height: 40vh;
            width: auto;
            object-fit: contain; /* لضمان ظهور الصورة كاملة دون قص */
        }
    </style>
@endpush

@push('scripts')
    <script>
        // إضافة ديناميكية لتغيير الاتجاه بناءً على اللغة
        document.addEventListener('DOMContentLoaded', function() {
            const content = document.querySelector('.blog-content').textContent;
            if (/[\u0600-\u06FF]/.test(content)) { // تحقق من وجود حروف عربية
                document.querySelectorAll('.blog-content, .blog-title, .blog-meta').forEach(el => {
                    el.classList.add('arabic-content');
                });
            }
        });
    </script>
@endpush
