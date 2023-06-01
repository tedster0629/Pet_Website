@extends('layouts.sidebar')
@section('title', 'Products')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#pets_table').DataTable();
        });
    </script>
@endsection

@section('content')
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editModalLabel">Edit Pet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pets.update') }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body row g-3">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="update-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- PageContent -->
    <div id="content" class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container-fluid d-flex align-items-center">
            <button type="button" id="sideBarCollapse" class="btn btn-secondary me-3"><i
                    class="fa-solid fa-bars"></i></button>
            <div class="d-flex justify-content-between align-content-center" style="flex-grow: 1">
                <h1 class="fw-bold">Products</h1>
                <a href="{{ route('dashboard.products.create') }}" type="button" id=""
                    class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add Products</a>
            </div>
        </div>
        <div class="table-responsive container mt-3">
            <table class="nowrap table-striped table overflow-auto" id="pets_table">
                <thead>
                    <tr>
                        <th scope="col">S. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                <img width="50" src="{{ $product->image_url }}" alt="">
                                {{ $product->name }}
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <div class="d-flex">

                                    <a href="{{ route('dashboard.products.edit', ['product' => $product->id]) }}"
                                        class="btn btn-primary edit me-2" title="Edit">Edit</a>
                                    <form action="{{ route('dashboard.products.destroy', ['product' => $product->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-danger" title="Delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('/js/validation.js') }}"></script>
    <script src="{{ asset('/js/pets.js') }}"></script>
@endsection
