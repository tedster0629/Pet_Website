@extends('layouts.master')
@section('title','About Us')

@section('head')
    <link rel="stylesheet" href="{{asset('/css/about_us.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/home.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
@endsection
@section('content')
<div class="about-us-container">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-md-6">
                <div class="about-us-img">
                    <img src="images/featured_2.jpg" alt="" class="w-50 img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-content">
                    <div class="about-sub-heading">

                    </div>
                    <h1>About Us</h1>
                    <p>This website is designed to support Canada residents to adopt or offer a pet in adoption. Its important that the person adopting knows that it needs to be with the animal the rest of its life. Also, the person that puts a dog in adoption is responsible for providing as accurate as possible information about the animal.</p>
                </div>
                <h5 class="mb-5">What you can do using Little Paws: </h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-sub">
                            <h6><i class="fa fa-check "></i><span class="ms-2">Put in adoption a pet</span></h6>
                            <h6><i class="fa fa-check"></i><span class="ms-2">Contact the two parts</span></h6>
                            <h6><i class="fa fa-check"></i><span class="ms-2">See hundreds of animals</span></h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-sub">
                            <h6><i class="fa fa-check"></i><span class="ms-2">Promote difficult cases</span></h6>
                            <h6><i class="fa fa-check"></i><span class="ms-2">Meet the pet before adoption</span></h6>
                            <h6><i class="fa fa-check"></i><span class="ms-2">Adopt a pet</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="team">
            <div class="container py-5">
               <div class="row text-center">
                <div class="col-lg-8 mx-auto col-md-12 col-sm-12 col-12">
                    <h2>Meet The Team </h2>
                    <p class="p-more-info">Please feel free to contact any of the people on the team for any questions or opportunities</p>
                </div>
               </div>
               <div class="row pt-4">
                   @foreach ($team as $person)
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 pt-5">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6 col-6">
                            <img src="{{asset('uploads/'.$person->image)}}"  class="w-100 team-member-img" alt="Toto">
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-6 col-6 pt-3">
                            <h5 class="fw-bold d-inline-block">{{$person->fname}} {{$person->lname}}</h5>
                            <span><a href={{$person->linkedin}}  target="_blank"><i class="fab fa-linkedin"></i></a></span>
                            <small class="role d-block">{{$person->role}}</small>
                            <p class="dev-description">{{$person->description}}</p>
                            <a class="nav-link d-inline pe-2 text-muted" id="emailIcon" href="mailto:{{$person->email}}"><i class="fa-solid fa-envelope"></i></a><small class="text-muted">{{$person->email}}</small><br>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-6"></div>
               </div>
        </div></section>
    </div>
</div>
@endsection
@section('js')
@endsection
