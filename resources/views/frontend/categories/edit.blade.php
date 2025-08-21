@extends('layouts.frontend')

@section('body')
    {{-- <x-frontend.masthead
        subheading="Edit Category"
        heading="Update Your Category"
        link="{{ route('categories.show', $category->id) }}"
        link-text="Back to Category"
    /> --}}

    <section class="page-section" id="edit-category">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Edit Category</h2>
                <h3 class="section-subheading text-muted">Modify the category details.</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Category Image</label>
                            @if ($category->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid rounded" style="max-height: 200px;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            <small class="text-muted">Leave blank to keep the current image.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-new btn-xl text-uppercase">Update Category</button>

                        <a href="{{route('categories.show',$category->id)}}" class="btn btn-delete btn-xl text-uppercase me-2"> Back to category</a>
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
        #edit-category{
            margin-top: 100px;
            }
        #edit-category .form-label {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;

            color: #212529;
        }
        #edit-category .form-control {
            border-radius: 5px;
            border-color: #ced4da;
            font-family: 'Roboto Slab', serif;
        }
        #edit-category .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        #edit-category .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        #edit-category .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #edit-category .shadow-sm {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        #edit-category .bg-light {
            background-color: #f8f9fa;
        }
        @media (max-width: 768px) {
            #edit-category .col-lg-6 {
                padding: 0 15px;
            }
            #edit-category .btn-xl {
                width: 100%;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.getElementById('description').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    </script>
@endpush
