@extends('layouts.sidebar')
@section('title','Users')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#user_table').DataTable();
        });
    </script>
@endsection

@section('content')
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('users.update')}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-body row g-3">
                        <input type="hidden" name="idEdit" id="idEdit">
                        <div class="col-md-6">
                            <label for="fnameEdit" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fnameEdit" name="fnameEdit">
                            <span class="text-danger fst-italic d-none">Please enter valid first name</span>
                        </div>
                        <div class="col-md-6">
                            <label for="lnameEdit" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lnameEdit" name="lnameEdit">
                            <span class="text-danger fst-italic d-none">Please enter valid last name</span>
                        </div>
                        <div class="col-md-6">
                            <label for="emailEdit" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailEdit" name="emailEdit">
                            <span class="text-danger fst-italic d-none">Please enter valid email</span>
                        </div>
                        <div class="col-md-6">
                            <label for="phoneEdit" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phoneEdit" name="phoneEdit">
                            <span class="text-danger fst-italic d-none">Please enter valid phone</span>
                        </div>
                        <div class="col-12">
                            <label for="addressEdit" class="form-label">Street Address</label>
                            <input type="text" class="form-control" id="addressEdit" name="addressEdit">
                            <span class="text-danger fst-italic d-none">Please enter your street address</span>
                        </div>
                        <div class="col-md-6">
                            <label for="cityEdit" class="form-label">City</label>
                            <input type="text" class="form-control" id="cityEdit" name="cityEdit">
                            <span class="text-danger fst-italic d-none">Please enter your city</span>
                        </div>
                        <div class="col-md-6">
                            <label for="provinceEdit" class="form-label">Province</label>
                            <select id="provinceEdit" class="form-select" name="provinceEdit">
                                <option>Alberta</option>
                                <option>British Columbia</option>
                                <option>Manitoba</option>
                                <option>New Brunswick</option>
                                <option>New Foundland and Labrador</option>
                                <option>Northwest Territories</option>
                                <option>Nova Scotia</option>
                                <option>Nunavut</option>
                                <option>Ontario</option>
                                <option>Prince Edward Island</option>
                                <option>Quebec</option>
                                <option>Saskatchewan</option>
                                <option>Yukon Territory</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="postalcodeEdit" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postalcodeEdit" name="postalcodeEdit">
                            <span class="text-danger fst-italic d-none">Please enter valid postal code</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="update-btn" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="content" class="container-fluid">
        @if (session('status') === 'user-profile-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>User Profile has been successfully updated
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('status') === 'user-profile-deleted')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>User Profile has been deleted successfully 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container-fluid d-flex align-items-center">
            <button type="button" id="sideBarCollapse" class="btn btn-secondary me-3"><i class="fa-solid fa-bars"></i></button>
            <h1 class="fw-bold">Users</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <p class="mb-0 text-danger">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="container table-responsive mb-3">
            <table class="table overflow-auto nowrap table-striped" id="user_table">
                <thead>
                    <tr>
                        <th scope="col">S. No.</th>
                        <th scope="col" class="d-none">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Province</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0?>
                    @foreach($users as $u)
                        @if($u->is_admin!=1)
                            <tr>
                                <?php $i++?>
                                <th scope="row">{{$i}}</th>
                                <td class="d-none">{{$user->id}}</td>
                                <td>{{$u->fname}}</td>
                                <td>{{$u->lname}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->phone}}</td>
                                <td>{{$u->street}}</td>
                                <td>{{$u->city}}</td>
                                <td>{{$u->province}}</td>
                                <td>{{$u->postal_code}}</td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-primary edit me-2" title="Edit">Edit</button>
                                    <form action="{{route('users.destroy')}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" id="id" value="{{$user->id}}"> 
                                        <button type="submit" class="btn btn-danger" title="Delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="{{asset('/js/validation.js')}}"></script>
    <script src="{{asset('/js/users.js')}}"></script>
@endsection