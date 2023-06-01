@extends('layouts.sidebar')
@section('title','Favourites')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/favourites.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endsection

@section('content')
    <div id="content" class="container-fluid">
        <div class="container-fluid d-flex align-items-center">
            <button type="button" id="sideBarCollapse" class="btn btn-secondary me-3"><i class="fa-solid fa-bars"></i></button>
            <h1 class="fw-bold">Favourites</h1>
        </div>
        <div class="d-flex flex-column align-items-center container">
            <div>
                <h1 class="heading fw-bold m-0 p-3">Highlights</h1>
            </div>
            <div class="d-flex featured-pet justify-content-evenly container flex-wrap p-0 pb-3">
                @foreach ($products as $pproduct)
                    <x-product-card
                    :product="$product"
                    :favourite_ids="$favourite_ids" />
                @endforeach
            </div>
        <h1 class="fw-bold">Pets</h1>
        <div class="container d-flex">
            @foreach ($pets as $pet)
                <div class="favourite-pet-card">
                    <a href="" class="nav-link">
                        <div class="favourite-pet-image">
                            <img src="{{asset('uploads/'.$pet->pet_image)}}" width="230px" alt="">
                            <i id="{{$pet->id}}" class="fa-solid fa-heart favourite-icon"></i>
                        </div>
                        <div class="favourite-pet-content">
                            <h3 class="text-center fw-bold">{{$pet->pet_name}}</h3>
                            <p class="text-center m-0">{{$pet->gender}}</p>
                            <p class="text-center m-0">{{$pet->city}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('/js/favourites.js')}}"></script>
    <script>
        const favourites=document.getElementsByClassName('favourite-icon');
        Array.from(favourites).forEach((element) => {
            element.addEventListener('click',(e)=>{
                console.log(e.srcElement.id)
                fetch('addFav',{
                    body:
                    {
                        pet_id:e.srcElement.id,
                        user_id:
                    }
                    method:'POST'
                }).then((data)=>{

                }).catch((err)=>{
                    console.log(err)
                })
            })
        })
    </script>
@endsection