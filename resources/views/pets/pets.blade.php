@extends('layouts.sidebar')
@section('title','Pets')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
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
                        <input type="hidden" name="idEdit" id="idEdit">
                        <div class="col-md-12">
                            <label for="petnameEdit" class="form-label">Pet Name</label>
                            <input type="text" class="form-control" id="petnameEdit" name="petnameEdit">
                            <span class="text-danger fst-italic d-none">Please enter valid pet name</span>
                        </div>
                        <div class="col-md-12">
                            <label for="ageEdit" class="form-label">Age</label>
                            <select id="ageEdit" class="form-select" name="ageEdit">
                                @foreach($ages as $age)
                                    <option value="{{$age}}">{{$age}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <p class="form-label">Gender</p>
                            @foreach($genders as $gender)
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="{{$gender}}" name="genderEdit" value="{{$gender}}">
                                    <label for="{{$gender}}" class="form-check-label">{{$gender}}</label><br>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <p class="form-label">Characteristic</p>
                            @foreach($characteristics as $characteristic)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="{{$characteristic}}" name="characteristic[]" value="{{$characteristic}}">
                                    <label class="form-check-label" for="{{$characteristic}}">{{$characteristic}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <label for="animalTypeEdit" class="form-label">Animal Type</label>
                            <select id="animalTypeEdit" class="form-select" name="animalTypeEdit">
                                @foreach($animal_types as $animal)
                                <option value="{{$animal}}">{{$animal}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="coatEdit" class="form-label">Coat Length</label>
                            <select id="coatEdit" class="form-select" name="coatEdit">
                                @foreach($coat_lengths as $coat)
                                    <option value="{{$coat}}">{{$coat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="colorEdit" class="form-label">Color</label>
                            <input type="text" class="form-control" id="colorEdit" name="colorEdit">
                            <span class="text-danger fst-italic d-none">Please enter valid color</span>
                        </div>
                        <div class="col-md-12">
                            <p class="form-label">Status</p>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="adopted" name="statusEdit" value="1">
                                <label for="adopted" class="form-check-label">Adopted</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="not_adopted" name="statusEdit" value="0">
                                <label for="not_adopted" class="form-check-label">Not Adopted</label><br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="descriptionEdit" class="form-label">Description</label>
                            <textarea class="form-control" style="resize: none;" name="descriptionEdit" placeholder="Leave a description here" id="descriptionEdit" col="10" rows="3"></textarea>
                            <span class="text-danger fst-italic d-none">Please enter valid description</span>
                        </div>
                        
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
        @if (session('status') === 'pet-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Pet record has been successfully updated
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('status') === 'pet-deleted')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Pet record has been deleted successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container-fluid d-flex align-items-center">
            <button type="button" id="sideBarCollapse" class="btn btn-secondary me-3"><i class="fa-solid fa-bars"></i></button>
            <h1 class="fw-bold">Pets</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <p class="mb-0 text-danger">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="container table-responsive">
            <table class="table overflow-auto nowrap table-striped" id="pets_table">
                <thead>
                    <tr>
                        <th scope="col">S. No.</th>
                        <th scope="col" class="d-none">Id</th>
                        <th scope="col">Pet Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Animal Type</th>
                        <th scope="col">Coat Length</th>
                        <th scope="col">Color</th>
                        <th scope="col">Characteristic</th>
                        <th scope="col" class="d-none">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pets as $key=>$pet)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td class="d-none">{{$pet->id}}</td>
                                <td>{{$pet->pet_name}}</td>
                                <td>{{$pet->age}}</td>
                                <td>{{$pet->gender}}</td>
                                <td>{{$pet->animal_type}}</td>
                                <td>{{$pet->coat_length}}</td>
                                <td>{{$pet->color}}</td>
                                <td>
                                    @foreach($pet->characteristics as $key=>$c)
                                        @if($key!=(count($pet->characteristics)-1))
                                            {{$c->characteristic}},
                                        @endif
                                        @if($key==(count($pet->characteristics)-1))
                                            {{$c->characteristic}}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="d-none">{{$pet->description}}</td>
                                <td>
                                    @if($pet->is_adopted=='0')
                                        Not Adopted
                                    @elseif($pet->is_adopted=='1')
                                        Adopted
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-primary edit me-2" title="Edit">Edit</button>
                                    <form action="{{ route('pets.destroy') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="pet_id" value="{{$pet->id}}">
                                        <button type="submit" class="btn btn-danger" title="Delete">Delete</button>
                                    </form>
                                </td>
                            </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('/js/validation.js')}}"></script>
    <script src="{{asset('/js/pets.js')}}"></script>
@endsection