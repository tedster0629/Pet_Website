@extends('layouts.master')
@section('title','How it Works')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/how-it-works.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@endsection

@section('content')
<section class="container">
    <div>
        <h1 class="heading fw-bold m-0 p-3">FAQ</h1>
    </div>
    <div class="container d-flex flex-column justify-content-center mb-4">
        <div class="faq">
            <div class="question d-flex justify-content-between align-center">
                <h3 class="fw-bold">What should I look for when adopting a dog?</h3>
                <i class="fa fa-angle-down fs-4"></i>
            </div>
            <div class="answer">
                <p class="pt-3 text-justify">Always make sure that the dog you're adopting is the right fit for you and your family. That includes their personality, health, age and attitude toward other pets and children. If you have a household with multiple pets or small kids, you need to make sure the dog you're adopting can be socialized.</p>
            </div>
        </div>
        <div class="faq">
            <div class="question d-flex justify-content-between align-center">
                <h3 class="fw-bold">Will There Be An Adoption Fee?</h3>
                <i class="fa fa-angle-down fs-4"></i>
            </div>
            <div class="answer">
                <p class="pt-3 text-justify">We doesn't dictate adoption group policy, including adoption requirements and fees. If you're interested in a specific pet, please contact the owner that created the pet listing through the Pet Profile page</p>
            </div>
        </div>
        <div class="faq">
            <div class="question d-flex justify-content-between align-center">
                <h3 class="fw-bold">How Do I Meet a Pet I See?</h3>
                <i class="fa fa-angle-down fs-4"></i>
            </div>
            <div class="answer">
                <p class="pt-3 text-justify">Once you find a pet you're interested in adopting, you'll probably want to meet him or her. Go to the Pet Profile page by clicking on the pet's picture or name on a search results page. This takes you to the pet's detail page. Click “Contact” to directly contact the owner to inquire further.</p>
            </div>
        </div>
        <div class="faq">
            <div class="question d-flex justify-content-between align-center">
                <h3 class="fw-bold">Can I be Notified When New Pets Are Available?</h3>
                <i class="fa fa-angle-down fs-4"></i>
            </div>
            <div class="answer">
                <p class="pt-3 text-justify">To get latest updates on pet adoption or pet care, you can subscribe for our newsletter and you will be notified by email</p>
            </div>
        </div>
    </div>

</section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        // FAQ
        const faqs = document.querySelectorAll(".faq");

        faqs.forEach(faq => {
            faq.addEventListener("click", () => {
                faq.classList.toggle("active");
            })
        })
    </script>
@endsection