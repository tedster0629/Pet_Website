@extends('layouts.sidebar')
@section('title','Profile')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/profile.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<section id="content" class="container-fluid">
    @if (session('status') === 'profile-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Profile has been successfully updated
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    @if (session('status') === 'pet-deleted')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Pet Record has been deleted successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    @if (session('status') === 'pet-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Pet Record has been updated successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    <div id="profile">
        <div class="container-fluid d-flex align-items-center">
            <button type="button" id="sideBarCollapse" class="btn btn-secondary me-3"><i class="fa-solid fa-bars"></i></button>
            <h1 class="fw-bold">Profile</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <p class="mb-0 text-danger">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Pet Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="editModalLabel">Edit Pet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('profile.pet-update') }}" method="POST">
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
                                <label for="colorEdit" class="form-label">Color</label>
                                <input type="text" class="form-control" id="colorEdit" name="colorEdit">
                                <span class="text-danger fst-italic d-none">Please enter valid color</span>
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
                                <textarea class="form-control" style="resize: none;" maxlength="330" name="descriptionEdit" placeholder="Leave a description here" id="descriptionEdit" col="10" rows="3"></textarea>
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

        <div class="container mb-3">
            <form class="row g-3" action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('patch')

                <div class="text-center d-flex flex-column align-items-center" id="profile-img">
                    <div id="image" class="circular mb-2">
                        <img src="{{asset('uploads/'.$user->image)}}" alt="">
                    </div>
                    <div class="file btn btn-primary position-relative overflow-hidden" id="upload-img">
                        <label for="image-input">Choose Image</label>
                        <input type="file" name="image" id="image-input" accept="image/x-png,image/gif,image/jpeg" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" readonly class="form-control" id="fname" name="fname" value="{{$user->fname}}" min="2" max="4">
                    <span class="text-danger fst-italic d-none">Please enter valid first name</span>
                </div>
                <div class="col-md-6">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" readonly class="form-control" id="lname" name="lname" value="{{$user->lname}}">
                    <span class="text-danger fst-italic d-none">Please enter valid last name</span>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <p class="form-control mb-0">{{$user->email}}</p>
                    <span class="text-danger fst-italic d-none">Please enter valid email</span>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" readonly class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                    <span class="text-danger fst-italic d-none">Please enter valid phone number</span>
                </div>
                <div class="col-12">
                    <label for="streetAddress" class="form-label">Street Address</label>
                    <input type="text" readonly class="form-control" id="streetAddress" name="streetAddress" value="{{$user->street}}">
                    <span class="text-danger fst-italic d-none">Please enter your street address</span>
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" readonly class="form-control" id="city" name="city" value="{{$user->city}}">
                    <span class="text-danger fst-italic d-none">Please enter your city name</span>
                </div>
                <div class="col-md-6">
                    <label for="province" class="form-label">Province</label>
                    <select id="province" disabled class="form-select" name="province">
                        @foreach($provinces as $province)
                            @if($province==$user->province)
                            <option selected>{{$province}}</option>
                            @else
                            <option>{{$province}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="postal-code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal-code" name="postal_code" readonly value="{{$user->postal_code}}">
                    <span class="text-danger fst-italic d-none">Please enter valid postal code</span>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" id="editBtn">Edit</button>
                    <button class="btn btn-primary" id="cancelBtn">Cancel</button>
                    <button type="submit" class="btn btn-success" id="saveBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Current Pets -->
    <div id="current-pets">
        <div class="container-fluid d-flex align-items-center mt-4">
            <h1 class="fw-bold fs-3">Current Pets</h1>
        </div>
        <div class="container d-flex justify-content-between flex-wrap">
            @if($pets->isEmpty())
            <div class="mb-3 text-center w-100">
                <h3>You have not added any pets for adoption</h3>
                <a href="/add-pet">
                    <button class="btn btn-primary">Add a Pet</button>
                </a>
            </div>
            @endif
            @foreach($pets as $pet)
                <div class="card mb-3 mt-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('uploads/'.$pet->pet_image)}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                {{-- Edit Icon --}}
                                <i class="fa-solid fa-pen-to-square edit" id="edit-icon"></i>
                                {{-- Delete icon --}}
                                <form action="{{ route('profile.pet-delete') }}" method="POST" id=del-icon>
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="pet_id" value="{{$pet->id}}">
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fa-solid fa-trash text-danger"></i>
                                    </button>
                                </form>

                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title fw-bold d-inline">{{$pet->pet_name}}</h5>
                                    <input type="hidden" value="{{$pet->id}}">
                                    @if($pet->is_adopted==1)
                                        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2" style="margin-right: 58px">Adopted</small>
                                    @elseif($pet->is_adopted==0)
                                        <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger bg-danger bg-opacity-10 border border-danger border-opacity-10 rounded-2"style="margin-right: 58px">Not Adopted</small>
                                    @endif
                                </div>
                                <p class="card-text text-justify" style="height: 185px">{{\Illuminate\Support\Str::limit($pet->description, 330)}}</p>
                                <div class="d-flex justify-content-between">
                                    <small class=" text-muted">{{$pet->gender}}</small>
                                    <small class=" text-muted">{{$pet->color}}</small>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">{{$pet->age}}</small>
                                    <small class="text-muted">{{$pet->coat_length}} Coat</small>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <small class="text-muted me-2">{{$user->city}}</small>
                                    <small class="text-muted text-end">
                                        @foreach($pet->characteristics as $key=>$c)
                                            @if($key!=(count($pet->characteristics)-1))
                                                {{$c->characteristic}},
                                            @endif
                                            @if($key==(count($pet->characteristics)-1))
                                                {{$c->characteristic}}
                                            @endif
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="{{asset('/js/validation.js')}}"></script>
    <script src="{{asset('/js/profile.js')}}"></script>
@endsection
