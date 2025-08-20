@extends('layouts.frontend')

@section('body')
    <x-frontend.masthead
        subheading="Your Profile"
        heading="Manage Account Settings"
        link="{{ route('home') }}"
        link-text="Back to Home"
    />

    <!-- Profile Section -->
    <section class="page-section" id="profile">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Profile</h2>
                <h3 class="section-subheading text-muted">Update your personal information, password, or manage your account.</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Update Profile Information -->
                    <div class="profile-card mb-5">
                        <h4 class="card-heading text-uppercase">Update Profile Information</h4>
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-xl text-uppercase">Save</button>
                        </form>
                    </div>

                    <!-- Update Password -->
                    <div class="profile-card mb-5">
                        <h4 class="card-heading text-uppercase">Update Password</h4>
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" autocomplete="current-password">
                                @error('current_password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
                                @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-xl text-uppercase">Save</button>
                        </form>
                    </div>

                    <!-- Delete Account -->
                    <div class="profile-card">
                        <h4 class="card-heading text-uppercase">Delete Account</h4>
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <p class="text-muted mb-4">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="current-password">
                                @error('password', 'destroy')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-danger btn-xl text-uppercase" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        #profile .profile-card {
            background-color: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        #profile .profile-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        #profile .card-heading {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #fed136; /* Gold color */
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        #profile .form-label {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #212529;
        }

        #profile .form-control {
            border-radius: 5px;
            border-color: #ced4da;
            font-family: 'Roboto Slab', serif;
            font-size: 1rem;
        }

        #profile .form-control:focus {
            border-color: #fed136; /* Gold focus */
            box-shadow: 0 0 5px rgba(254, 209, 54, 0.5);
        }

        #profile .btn-primary {
            background-color: #fed136; /* Gold primary */
            border-color: #fed136;
            color: #212529;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        #profile .btn-primary:hover {
            background-color: #e0a800; /* Darker gold hover */
            border-color: #e0a800;
        }

        #profile .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        #profile .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        #profile .text-muted {
            font-family: 'Roboto Slab', serif;
            color: #6c757d;
        }

        #profile .text-danger {
            font-family: 'Roboto Slab', serif;
            font-size: 0.875rem;
        }

        @media (max-width: 768px) {
            #profile .card-heading {
                font-size: 1.25rem;
            }

            #profile .btn-xl {
                width: 100%;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            const navbarShrink = () => {
                const navbarCollapsible = document.body.querySelector('#mainNav');
                if (!navbarCollapsible) {
                    return;
                }
                if (window.scrollY > 0 || document.documentElement.scrollTop > 0) {
                    navbarCollapsible.classList.add('navbar-shrink');
                } else {
                    navbarCollapsible.classList.remove('navbar-shrink');
                }
            };

            navbarShrink();
            document.addEventListener('scroll', navbarShrink);

            const mainNav = document.body.querySelector('#mainNav');
            if (mainNav) {
                new bootstrap.ScrollSpy(document.body, {
                    target: '#mainNav',
                    rootMargin: '0px 0px -40%',
                });
            }

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
