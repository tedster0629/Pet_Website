<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="./images/favicon-32x32.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('/css/nav.css')}}">
    <link rel="stylesheet" href="{{asset('/css/footer.css')}}">
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
    {{-- Header --}}
    <header class="bg-white">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo d-flex align-items-center">
                <a href="/" class="nav-link d-flex align-items-center">
                    <img src="./images/logo.png" class="img-fluid" alt="">
                    <h1 class="fs-3">Little Paws</h1>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <div class="login-btn">
                    @if (Auth::check())
                    <a href="./favourites"><i class="fa-solid fa-heart" title="Favourites"></i></a>
                    <a href="./logout">Logout</a>
                    @else
                    <a href="./register">SignUp</a>
                    <a href="./login">Login</a>
                    @endif
                </div>
                @if (Auth::check())
                <div class="profile circular-image" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hello, {{auth()->user()->fname}}" >
                    <a class="navbar-brand" href="./profile">
                        <img src="{{asset('uploads/'.auth()->user()->image)}}" alt="">
                    </a>
                </div>
                @endif
            </div>
        </div>
    </header>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid justify-content-end">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Find a Pet
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('filter-pets?type=dog') }}">Dog</a></li>
                            <li><a class="dropdown-item" href="{{ url('filter-pets?type=cat') }}">Cat</a></li>
                            <li><a class="dropdown-item" href="{{ url('filter-pets?type=barnyard') }}">Other Animals</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="how-it-works">How it works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    <footer class="text-center text-lg-start">
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 d-flex align-items-center">
                    <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
                        <img src="./images/dog-footer.png" height="130" alt="" loading="lazy" />
                    </div>
                    </ul>

                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-4 text-white">Help & Support</h5>
                    <ul class="list-unstyled footer-list">
                        <li class="mb-2">
                            <a href="how-it-works" class="nav-link"><i class="fas fa-paw pe-3"></i>FAQ</a>
                        </li>
                        <li class="mb-2">
                            <a href="about-us" class="nav-link"><i class="fas fa-paw pe-3"></i>About Us</a>
                        </li>
                        <li class="mb-2">
                            <a href="contact" class="nav-link"><i class="fas fa-paw pe-3"></i>Contact Us</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="nav-link"><i class="fas fa-paw pe-3"></i>Terms of Service</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="nav-link"><i class="fas fa-paw pe-3"></i>Privacy Policy</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-4 text-white">Pet Adoption</h5>

                    <ul class="list-unstyled footer-list">
                        <li class="mb-2">
                            <a href="{{ url('filter-pets?type=dog') }}" class="nav-link"><i class="fas fa-paw pe-3"></i>Dog Adoption</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ url('filter-pets?type=cat') }}" class="nav-link"><i class="fas fa-paw pe-3"></i>Cat Adoption</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ url('filter-pets?type=barnyard') }}" class="nav-link"><i class="fas fa-paw pe-3"></i>Other Pet Adoption</a>
                        </li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <ul class="list-unstyled footer-list">
                        <p class="text-center text-white">To get the latest on pet adoption and pet care, sign up to hear from us</p>
                        <button class="footer-btn mb-3">SIGN UP</button>
                        <ul class="list-unstyled d-flex flex-row justify-content-center">
                            <li>
                                <a class="text-white px-2" target="_blank" href="https://www.facebook.com/">
                                    <i class="fa-brands fs-4 fa-square-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="text-white px-2" target="_blank" href="https://www.instagram.com/accounts/login/">
                                    <i class="fa-brands fs-4 fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a class="text-white px-2" target="_blank" href="https://twitter.com/i/flow/login">
                                    <i class="fa-brands fs-4 fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="text-white px-2" target="_blank" href="https://www.youtube.com/">
                                    <i class="fa-brands fs-4 fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a class="text-white px-2" target="_blank" href="https://www.linkedin.com/login">
                                    <i class="fa-brands fs-4 fa-linkedin text-white"></i>
                                </a>
                            </li>
                        </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            <p class="text-white m-0">Copyright &copy; Little Paws 2022 | All Rights Reserved </p>
        </div>
    </footer>

    {{-- JavaScript --}}
    @yield('js')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>
</html>
