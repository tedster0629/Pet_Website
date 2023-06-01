@extends('layouts.master')
@section('title', 'Little Paws')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
@endsection

@section('content')
    <!-- Slider main container -->
    <main class="image-slider">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="./images/slider_1.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="./images/slider_2.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="./images/slider_3.jpg">
                </div>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </main>

    <section class="d-flex align-items-center justify-content-center pet-options container">
        <div>
            <h1 class="fw-bold text-center">Find your new best friend</h1>
        </div>
        <div class="d-flex card-container flex-wrap">
            <div class="card">
                <a class="nav-link" href="filter-pets?type=dog"><img src="./images/dog.png" alt="dog">
                    <p class="text-center">Dogs</p>
                </a>
            </div>
            <div class="card">
                <a class="nav-link" href="filter-pets?type=cat"><img src="./images/cat.png" alt="cat">
                    <p class="text-center">Cats</p>
                </a>
            </div>
            <div class="card">
                <a class="nav-link" href="filter-pets?type=barnyard"><img src="./images/paw.png" alt="other animals">
                    <p class="text-center">Other Animals</p>
                </a>
            </div>
        </div>
    </section>


    <!-- Featured Pets -->
    <section class="container-fluid bg-white">
        <div class="d-flex flex-column align-items-center container">
            <div>
                <h1 class="heading fw-bold m-0 p-3">Featured Pets</h1>
            </div>
            <div class="d-flex featured-pet justify-content-evenly container flex-wrap p-0 pb-3">
                <div class="featured-pet-card">
                    <a href="{{ route('duke') }}" class="nav-link">
                        <div class="featured-pet-image">
                            <img src="./images/featured_1.jpg" width="230px" alt="">
                            <i id="3" class="fa-regular fa-heart favourite-icon"></i>
                        </div>
                        <div class="featured-pet-content">
                            <h3 class="fw-bold text-center">Duke</h3>
                            <p class="m-0 text-center">Male</p>
                            <p class="m-0 text-center">Toronto</p>
                        </div>
                    </a>
                </div>
                <div class="featured-pet-card">
                    <a href="{{ route('milo') }}" class="nav-link">
                        <div class="featured-pet-image">
                            <img src="./images/featured_2.jpg" width="230px" alt="">
                            <i id="3" class="fa-regular fa-heart favourite-icon"></i>
                        </div>
                        <div class="featured-pet-content">
                            <h3 class="fw-bold text-center">Milo</h3>
                            <p class="m-0 text-center">Female</p>
                            <p class="m-0 text-center">Etobicoke</p>
                        </div>
                    </a>
                </div>
                <div class="featured-pet-card">
                    <a href="{{ route('rex') }}" class="nav-link">
                        <div class="featured-pet-image">
                            <img src="./images/featured_3.jpg" width="230px" alt="">
                            <i id="3" class="fa-regular fa-heart favourite-icon"></i>
                        </div>
                        <div class="featured-pet-content">
                            <h3 class="fw-bold text-center">Rex</h3>
                            <p class="m-0 text-center">Male</p>
                            <p class="m-0 text-center">North York</p>
                        </div>
                    </a>
                </div>
                <div class="featured-pet-card">
                    <a href="{{ route('dollar') }}" class="nav-link">
                        <div class="featured-pet-image">
                            <img src="./images/featured_4.jpg" alt="">
                            <i id="3" class="fa-regular fa-heart favourite-icon"></i>
                        </div>
                        <div class="featured-pet-content">
                            <h3 class="fw-bold text-center">Dollar</h3>
                            <p class="m-0 text-center">Male</p>
                            <p class="m-0 text-center">Mississauga</p>
                        </div>
                    </a>
                </div>
                <div class="featured-pet-card">
                    <a href="{{ route('leo') }}" class="nav-link">
                        <div class="featured-pet-image">
                            <img src="./images/featured_5.jpg" alt="">
                            <i id="3" class="fa-regular fa-heart favourite-icon"></i>
                        </div>
                        <div class="featured-pet-content">
                            <h3 class="fw-bold text-center">Leo</h3>
                            <p class="m-0 text-center">Male</p>
                            <p class="m-0 text-center">Toronto</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Promoted products -->
    <section class="container-fluid bg-white">
        <div class="d-flex flex-column align-items-center container">
            <div>
                <h1 class="heading fw-bold m-0 p-3">Promoted Products</h1>
            </div>
            <div class="d-flex featured-pet justify-content-evenly container flex-wrap p-0 pb-3">
                @foreach ($promotedProducts as $pproduct)
                    <x-product-card
                    :product="$pproduct"
                    :favourite_ids="$favourite_ids"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Highlighted products -->
    <section class="container-fluid bg-white">
        <div class="d-flex flex-column align-items-center container">
            <div>
                <h1 class="heading fw-bold m-0 p-3">Highlights</h1>
            </div>
            <div class="d-flex featured-pet justify-content-evenly container flex-wrap p-0 pb-3">
                @foreach ($highlightedProducts as $pproduct)
                    <x-product-card
                    :product="$pproduct"
                    :favourite_ids="$favourite_ids" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Adoption Process -->
    <section class="container-fluid d-flex align-items-center justify-content-center flex-column adoption-process">
        <div>
            <h1 class="heading fw-bold m-0 p-3 text-center">Pet Adoption Process</h1>
        </div>
        <div class="d-flex justify-content-evenly w-100 flex-wrap pb-3">
            <div class="adopt-pet-card d-flex align-items-center flex-column bg-white">
                <img src="./images/adopt_process_1.jpg" alt="">
                <h3 class="fw-bold">Find your pet</h3>
            </div>
            <div class="adopt-pet-card d-flex align-items-center flex-column bg-white">
                <img src="./images/adopt_process_2.jpg" alt="">
                <h3 class="fw-bold">Know your pet</h3>
            </div>
            <div class="adopt-pet-card d-flex align-items-center flex-column bg-white">
                <img src="./images/adopt_process_3.jpg" alt="">
                <h3 class="fw-bold">Take your pet home</h3>
            </div>
        </div>
    </section>


    <!-- Achievement Section -->
    <section class="achievements bg-white">
        <div class="achievement-container container">
            <div>
                <h1 class="fw-bold heading m-0 p-3 text-center">Our Achievements</h1>
            </div>
            <div class="d-flex justify-content-evenly container flex-wrap pb-3">
                <div class="achievement-card p-4">
                    <img class="me-3 p-2" src="./images/achieve_1.png" alt="">
                    <div>
                        <h1 class="fw-bold fs-2 m-0" style="color: #fabe2c;">1,245</h1>
                        <h1 class="fs-5 m-0">Members</h1>
                    </div>
                </div>
                <div class="achievement-card p-4">
                    <img class="me-3 p-2" src="./images/achieve_2.png" alt="">
                    <div>
                        <h1 class="fw-bold fs-2 m-0" style="color:#458377;">349</h1>
                        <h1 class="fs-5 m-0">Happy Pets</h1>
                    </div>
                </div>
                <div class="achievement-card p-4">
                    <img class="me-3 p-2" src="./images/achieve_3.png" alt="">
                    <div>
                        <h1 class="fw-bold fs-2 m-0" style="color:#e86581;">930</h1>
                        <h1 class="fs-5 m-0">Customers</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            spaceBetween: 30,
            slidesPerView: 1,
            centeredSlides: true,
            loop: true,
            keyboard: {
                enabled: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            }
        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/home.js') }}"></script>
@endsection
