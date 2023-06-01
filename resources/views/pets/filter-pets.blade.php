@extends('layouts.master')
@section('title','Find a Pet')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Filter_pet.css')}}">
@endsection
@section('content')
<div class="filter-container sticky-top row g-0 p-3 ">
    <div class="col-md ps-2 pe-2">
      <div class="form-floating">
        <select class="form-select" id="type" aria-label="Floating label select example">
          <option value="dog">Dog</option>
          <option value="cat">Cat</option>
          <option value="rabbit">Rabbit</option>
          <option value="bird">Bird</option>
          <option value="horse">Horse</option>
          <option value="barnyard">Barnyard</option>
        </select>
        <label for="floatingSelectGrid">Pet</label>
      </div>
    </div>
    <div class="col-md ps-2 pe-2">
      <div class="form-floating">
        <select class="form-select" id="gender" aria-label="Floating label select example">
          <option name="gender" value="any" selected>Any</option>
          <option name="gender" value="male">Male</option>
          <option name="gender" value="female">Female</option>
        </select>
        <label for="floatingSelectGrid">Gender</label>
      </div>
    </div>
    <div class="col-md ps-2 pe-2">
      <div class="form-floating">
        <select class="form-select" id="age" aria-label="Floating label select example">
          <option selected value="any">Any</option>
          <option name="age" value="baby">Baby</option>
          <option name="age" value="young">Young</option>
          <option name="age" value="adult">Adult</option>
          <option name="age" value="senior">Senior</option>
        </select>
        <label for="floatingSelectGrid">Age</label>
      </div>
    </div>
    <div class="col-md ps-2 pe-2">
      <div class="form-floating">
        <select class="form-select" id="breed" aria-label="Floating label select example">
          <option selected value="any">Any</option>
          @foreach ($breeds as $breed)
          <option value="{{$breed["name"]}}"">{{$breed["name"]}}</option>
          @endforeach
        </select>
        <label for="floatingSelectGrid">Breed</label>
      </div>
    </div>
    <div class="col-md ps-2 pe-2">
      <div class="form-floating">
        <select class="form-select" id="coat" aria-label="Floating label select example">
          <option selected value="any">Any</option>
          <option value="short">Short</option>
          <option value="medium">Medium</option>
          <option value="long">Long</option>
          <option value="wire">Wire</option>
          <option value="hairless">Hairless</option>
          <option value="curly">Curly</option>
        </select>
        <label for="floatingSelectGrid">Hair Length</label>
      </div>
    </div>
    <div class="col-md ps-2 pe-2">
      <div class="form-floating">
        <select class="form-select" id="city" aria-label="Floating label select example">
          <option selected value="any">Any</option>
          <option value="Chicago,+Illinois">Chicago, Illinois</option>
          <option value="Charleston,+South Carolina">Charleston, South Carolina</option>
          <option value="Las+Vegas,+Nevada">Las Vegas, Nevada</option>
          <option value="Seattle,+Washington">Seattle, Washington</option>
          <option value="Seattle,+Washington">Seattle, Washington</option>
          <option value="San+Francisco,+California"> San Francisco, California</option>
          <option value="New+Orleans,+Louisiana">New Orleans, Louisiana</option>
          <option value="Palm+Springs,+California">Palm Springs, California</option>
          <option value="Sedona,+Arizona">Sedona, Arizona</option>
        </select>
        <label for="floatingSelectGrid">Near City</label>
      </div>
    </div>
  </div>

  <div class="container mt-3 d-flex flex-column align-items-center justify-content-center ">

  @foreach ($pets as $pet)
  @if(empty($pet["description"]) || empty($pet["primary_photo_cropped"]) )
    @continue
  @endif
  <div class="card mb-3 mt-3">
      <div class="row no-gutters">
        <div class="col-md-3">
        <!-- <img src="./images/featured_1.jpg" class="card-img" alt="..."> -->
        <img src={{$pet["primary_photo_cropped"]["full"]}} class="card-img" alt="...">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h5 class="card-title">{{$pet["name"]}}</h5>
            <p class="card-text">{{$pet["description"]}} </p>
            <div class="d-flex justify-content-between">
              <small class=" text-muted">{{$pet["gender"]}}</small>
              <small class=" text-muted">{{$pet["breeds"]["primary"]}}</small>
            </div>

            <div class="d-flex justify-content-between">
              <small class="text-muted">{{$pet["age"]}}</small>
              <small class="text-muted">{{$pet["coat"]}}</small>
            </div>

            <div lass="card-text">
              <small class="text-muted">{{$pet["contact"]["address"]["city"]}}</small>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center justify-content-center ">
          <button type="button" onClick="location.href='{{ route('pet-profile', [$pet['id'], 'profile']) }}'" class="btn btn-primary mb-4 col-sm-9 ">Profile</button>
          <button type="button" onClick="location.href='{{ route('pet-profile', [$pet['id'], 'contact']) }}'" class="btn btn-primary col-sm-9 mb-2">Contact</button>
        </div>
      </div>
    </div>
    @endforeach



  </div>

  <script src="js/filter-pet.js"></script>


@endsection
