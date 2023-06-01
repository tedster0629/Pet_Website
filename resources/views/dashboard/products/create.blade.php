@extends('layouts.sidebar')
@section('title', 'Add Product')

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
        @if (session('status') == 'product-added')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Saved!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container-fluid d-flex align-items-center">
            <button type="button" id="sideBarCollapse" class="btn btn-secondary me-3"><i
                    class="fa-solid fa-bars"></i></button>
            <h1 class="fw-bold">Add a product</h1>
        </div>
        <div>

            <div class="container mb-3">
                <form class="row g-3" action="{{ route('dashboard.products.store') }}" enctype="multipart/form-data" method="POST">
                    <!-- Add a pet Content -->
                    @csrf
                    <div class="text-center d-flex flex-column align-items-center" id="profile-img">
                        <div id="image" class="circular mb-2">
                            <img width="100" src="/uploads/pet_default.jpg"alt="">
                        </div>
                        <div class="file btn btn-primary position-relative overflow-hidden" id="upload-img">
                            <label for="image-input">Choose Image</label>
                            <input type="file" name="image" id="image-input"
                                accept="image/x-png,image/gif,image/jpeg" />
                        </div>
                        @error('image')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}">
                        @error('name')
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
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" step="" class="form-control" id="quantity" name="quantity"
                            value="{{ old('quantity') }}">
                        @error('quantity')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="discountable" class="form-label">Make product discountable?</label>
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
                    <div class="col-md-4">
                        <label for="downloadable" class="form-label">Make product downloadable?</label>
                        <select id="downloadable" class="form-select" name="downloadable">
                            <option value="No" {{ old('downloadable') == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Yes" {{ old('downloadable') == 'Yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('downloadable')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center col-md-4" id="profile-img">
                       <label for="image-input" class="form-label">Choose File</label>
                            <input type="file" name="file" id="image-input"  class="form-control"
                               />
                        @error('image')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="promoted" class="form-label">Promote product?</label>
                        <select id="promoted" class="form-select" name="promoted">
                            <option value="No" {{ old('promoted') == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Yes" {{ old('promoted') == 'Yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('promoted')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="sale" class="form-label">Is sale?</label>
                        <select id="sale" class="form-select" name="sale">
                            <option value="No" {{ old('sale') == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Yes" {{ old('sale') == 'Yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('sale')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="start_sale" class="form-label">Start Sale</label>
                        <input type="datetime-local" class="form-control" id="start_sale" name="start_sale"
                            value="{{ old('start_sale') }}">
                        @error('start_sale')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="end_sale" class="form-label">End Sale</label>
                        <input type="datetime-local" class="form-control" id="end_sale" name="end_sale"
                            value="{{ old('end_sale') }}">
                        @error('end_sale')
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
                        <button type="submit" class="btn btn-primary" id="add-pet">Add Product</button>
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
