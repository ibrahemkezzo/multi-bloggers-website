        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" style="width: 250px; padding:0px; margin:0px;" href="#page-top">
                    <img style="width: 250px; height:75px; padding:0px; margin:0px;"
                        src="{{ asset('frontend/assets/img/navbar-logo.png') }}" alt="..." />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blogs.index') }}">Blogs</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li> --}}
                        @auth
                            <li class="nav-item"><a class="nav-link" href="{{ route('blogs.user') }}">Your Blogs</a></li>
                        @endauth
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                    @guest
                        <a class="navbar-brand ms-5 log-in" href="{{ route('login') }}">Log in</a>
                    @endguest
                    @auth
                        <div class="dropdown ms-5">
                            <a class="navbar-brand dropdown-toggle" href="#" role="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                @if (Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('contact.index') }}">Emails</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('blogs.user') }}">My Blogs</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>

            </div>
        </nav>
