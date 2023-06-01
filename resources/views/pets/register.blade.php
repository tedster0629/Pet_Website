@extends('layouts.main')
@section('title','Register')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
@endsection

@section('content')
<div class="login-container d-md-flex">
    <div class="login-image register"></div>
    <div class="authentication-container pt-2 pb-2">
        <h1 class="title">Register</h1>
        <p class="mb-4">Please enter your basic information.</p>

        <form action="#" class="pt-4">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingFirstName" placeholder="Please enter your first name"   min="2" max="4">
                <label for="floatingFirstName">First Name</label>
                <span class="text-danger fst-italic d-none" id="floatingFirstNameSpan">Please enter valid first name</span>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingLastName" placeholder="Please enter your last name" >
                <label for="floatingLastName">Last Name</label>
                <span class="text-danger fst-italic d-none" id="floatingLastNameSpan">Please enter a valid last name</span>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" placeholder="Please enter your email" >
                <label for="floatingEmail">Email Address</label>
                <span class="text-danger fst-italic d-none" id="emailSpan">Please enter valid email</span>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control floatingPassword" id="floatingPassword" placeholder="Please enter your password" >
                <label for="floatingPassword">Password</label>
                <span class="text-danger fst-italic d-none" id="passwordSpan">Must be minimum eight characters and a number </span>
            </div>

            <div class="form-floating">
                <span class="password-show-toggle toggle-btn"><span class="uil"></span></span>
                <input type="password" class="form-control floatingPassword" id="floatingConfirmPassword" placeholder="Please repeat your password" >
                <label for="floatingConfirmPassword">Confirm Password</label>
                <span class="text-danger fst-italic d-none" id="floatingConfirmPasswordSpan">Passwords must match </span>
            </div>

            <div class="d-flex justify-content-between">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label for="remember" class="form-check-label">I accept the <a href="#">Terms and Conditions</a></label>
                </div>
            </div>

            <div class="d-grid mb-4">
                <button type="submit" class="btn btn-primary" id="signUpBtn">Sign Up</button>
            </div>

            <div class="mb-2">Already have an account? <a href="/login">Sign in</a></div>
            <div class="mb-2">Return without register <a href="/">Home</a></div>

        </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/togglePasswordVisibility.js"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<script src="{{asset('/js/validation.js')}}"></script>
<script src="{{asset('/js/register.js')}}"></script>
@endsection