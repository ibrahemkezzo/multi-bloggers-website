@extends('layouts.frontend')

@section('body')
    {{-- <x-frontend.masthead
        subheading="Create a New Category"
        heading="Organize Your Content"
        link="{{ route('categories.index') }}"
        link-text="Back to Categories"
    /> --}}

    <section class="page-section mt-5" id="create-category">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Add a Category</h2>
                <h3 class="section-subheading text-muted">Define a new topic for your blogs.</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Category Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-new btn-xl text-uppercase">Create Category</button>
                        <a href="{{route('categories.index')}}" class="btn btn-delete btn-xl text-uppercase me-2"> Back to Categories</a>
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
        #create-category .form-label {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #212529;
        }
        #create-category .form-control {
            border-radius: 5px;
            border-color: #ced4da;
            font-family: 'Roboto Slab', serif;
        }
        #create-category .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        #create-category .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        #create-category .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #create-category .shadow-sm {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        #create-category .bg-light {
            background-color: #f8f9fa;
        }
        @media (max-width: 768px) {
            #create-category .col-lg-6 {
                padding: 0 15px;
            }
            #create-category .btn-xl {
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
