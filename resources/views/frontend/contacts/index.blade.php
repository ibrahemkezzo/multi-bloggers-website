@extends('layouts.frontend')

@section('body')
    @if (Auth::check() && Auth::user()->is_admin)
        <x-frontend.masthead
            subheading="Admin Panel"
            heading="Manage Contact Messages"
            link="{{ route('home') }}"
            link-text="Back to Home"
        />

        <section class="page-section" id="contacts">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Messages</h2>
                    <h3 class="section-subheading text-muted">View and manage all submitted messages.</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        @if (session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif
                        @forelse ($contacts as $contact)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $contact->name }}</h5>
                                    <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
                                    <p class="card-text"><strong>Phone:</strong> {{ $contact->phone }}</p>
                                    <p class="card-text"><strong>Message:</strong> {{ $contact->message }}</p>
                                    <p class="card-text"><small class="text-muted">Submitted on: {{ $contact->created_at->format('Y-m-d H:i') }}</small></p>
                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">No contact messages yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container mt-5">
            <div class="text-center">
                <h2 class="text-danger">Access Denied</h2>
                <p class="text-muted">You do not have permission to view this page.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    @endif
@endsection

@push('styles')
    <style>
        #contacts .card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: box-shadow 0.3s ease;
        }

        #contacts .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #contacts .card-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #212529;
        }

        #contacts .card-text {
            font-family: 'Roboto Slab', serif;
            color: #6c757d;
        }

        #contacts .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        #contacts .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
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
