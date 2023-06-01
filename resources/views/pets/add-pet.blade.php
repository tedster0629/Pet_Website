@extends('layouts.sidebar')
@section('title', 'Add Pet')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/add-pet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div id="content" class="container-fluid">
        @if (session('status') == 'pet-added')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Pet has been added successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container-fluid d-flex align-items-center">
            <button type="button" id="sideBarCollapse" class="btn btn-secondary me-3"><i
                    class="fa-solid fa-bars"></i></button>
            <h1 class="fw-bold">Add a Pet</h1>
        </div>
        <div>
            {{-- @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0 text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif --}}
            <div class="container mb-3">
                <form class="row g-3" action="{{ route('add-pet.store') }}" enctype="multipart/form-data" method="POST">
                    <!-- Add a pet Content -->
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}" />
                    <div class="text-center d-flex flex-column align-items-center" id="profile-img">
                        <div id="image" class="circular mb-2">
                            <img src="./uploads/pet_default.jpg"alt="">
                        </div>
                        <div class="file btn btn-primary position-relative overflow-hidden" id="upload-img">
                            <label for="image-input">Choose Image</label>
                            <input type="file" name="pet_image" id="image-input"
                                accept="image/x-png,image/gif,image/jpeg" />
                        </div>
                        @error('pet_image')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="pet_name" class="form-label">Pet Name</label>
                        <input type="text" class="form-control" id="pet_name" name="pet_name"
                            value="{{ old('pet_name') }}">
                        @error('pet_name')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="age" class="form-label">Age</label>
                        <select id="age" class="form-select" name="age">
                            @foreach ($age as $a)
                                <option {{ old('age') == $a ? 'selected' : '' }}>{{ $a }}</option>
                            @endforeach
                        </select>
                        @error('age')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <p class="form-label">Gender</p>
                        @foreach ($gender as $g)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="{{ $g }}" name="gender"
                                    value="{{ $g }}" {{ old('gender') == $g ? 'checked' : '' }}>
                                <label for="{{ $g }}" class="form-check-label">{{ $g }}</label><br>
                            </div>
                        @endforeach
                        <br>
                        @error('gender')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <p class="form-label">Characteristic</p>
                        @foreach ($characteristics as $c)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="{{ $c }}"
                                    name="characteristic[]" value="{{ $c }}"
                                    {{ is_array(old('characteristic')) && in_array($c, old('characteristic')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ $c }}">{{ $c }}</label>
                            </div>
                        @endforeach
                        @error('characteristic')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="animalType" class="form-label">Animal Type</label>
                        <select id="animalType" class="form-select" name="animalType">
                            @foreach ($animal_type as $animal)
                                <option {{ old('animalType') == $animal ? 'selected' : '' }}>{{ $animal }}</option>
                            @endforeach
                        </select>
                        @error('animalType')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="coat" class="form-label">Coat Length</label>
                        <select id="coat" class="form-select" name="coat">
                            @foreach ($coat as $c)
                                <option {{ old('coat') == $c ? 'selected' : '' }}>{{ $c }}</option>
                            @endforeach
                        </select>
                        @error('coat')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.001" class="form-control" id="price" name="price"
                            value="{{ old('price') }}">
                        @error('price')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="discountable" class="form-label">Pet is discountable?</label>
                        <select id="discountable" class="form-select" name="discountable">
                            <option value="No" {{ old('discountable') == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Yes" {{ old('discountable') == 'Yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('discountable')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="discount_percent" class="form-label">Discount Percent (%)</label>
                        <input type="number" step="0.001" class="form-control" id="discount_percent"
                            name="discount_percent" value="{{ old('discount_percent') }}">
                        @error('discount_percent')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color"
                            value="{{ old('color') }}">
                        @error('color')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" placeholder="Leave a description here" name="description" id="description"
                            maxlength="330" col="10" rows="4">{{ Request::old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" id="add-pet">Add pet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="{{ asset('/js/validation.js') }}"></script>
    <script src="{{ asset('/js/add-pet.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#sideBarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
            });
        });
    </script>
@endsection
