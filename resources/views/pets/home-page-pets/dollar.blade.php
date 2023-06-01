@extends('layouts.master')
@section('title','Pet Profile')

@section('head')
<link rel="stylesheet" href="{{asset('/css/pet-profile.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>
  .hr {
    display: block;
    border: 0;
    border-bottom: 1px solid #d2d1d3;
    margin-bottom: 20px;
  }
</style>
@endsection
@section('content')
<div class="container mt-5 mb-5 d-flex">
  <div class="card rounded" style="width: 100%">
    <div class=" d-flex justify-content-center">
        <img src="../images/featured_4.jpg" class="rounded" width="" height="400" />
        <div class="area2 px-3">
          <h4 class=" name mt-3 text-center">Dollar</h4>
          <div class="hr"></div>
          <div class="d-flex">
            <p style="margin-right: 1.5rem;"><span class="back">Age: </span> Young</p>
            <p style="margin-right: 1.5rem;"><span class="back">Gender: </span> Male</p>
            <p style="margin-right: 1.5rem;"><span class="back">Size: </span> Small</p>
            <p style="margin-right: 1.5rem;"><span class="back">Status: </span> adoptable</p>
          </div>
          <div class="hr"></div>
          <div class="d-flex">
            <p style="margin-right: 1.5rem;"><span class="back">City: </span> Mississauga</p>
            <p style="margin-right: 1.5rem;"><span class="back">State: </span> Ontario</p>
            <p style="margin-right: 1.5rem;"><span class="back">Country: </span> Canada</p>
          </div>
          <div class="hr"></div>
          <p class="information mt-3 text-justify">Please contact JoEllen (sagdinfo@aol.com) for more information about this pet. Please apply online at
          http://texasgreatdane.org/adoption-application/ ** This dog is in...</p>
          <div class="d-flex justify-content-center mt-5">
            <div class="back"> </br> Return home? <a href="/" style="color:#6504b4">Home</a></div>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="card rounded">
      <div class=" d-block justify-content-center">
        <div class="area1 p-3 py-5"> </div>
        <div class="area2 p- text-center px-3">
          <div class="image mr-3"> <img src="./images/featured_1.jpg" class="rounded-circle" width="100" />
            <h4 class=" name mt-3 ">Duke</h4>
            <p class="information mt-3 text-justify">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. </p>
            <div class="d-flex justify-content-center mt-5">
              <div class="back"> </br> Return home? <a href="index.php" style="color:#6504b4">Home</a></div>
            </div>
          </div>
          <div> </div>
        </div>
      </div>
    </div> --}}
  </div>
@endsection
@section('js')
@endsection