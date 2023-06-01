@extends('layouts.sidebar')
@section('title','Settings')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #toggleConfirmEye,
        #toggleCurrentEye {
            position: absolute;
            top: 43px;
            right: 23px;
        }
    </style>
@endsection

@section('content')
<div id="content" class="container-fluid">
        @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Password has been successfully updated
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <!-- Password Container -->
            <div class="container">
                <h3 class="fw-bold">Password</h3>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            <form class="row g-3 flex-column" action="{{ route('settings.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-6 position-relative" id="current-password-container">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" readonly class="form-control" id="current_password" name="current_password" autocomplete="current-password">
                    <i class="fa-solid fa-eye-slash" id="toggleCurrentEye"></i>
                    <span class="text-danger fst-italic d-none">Please enter your current password</span>
                </div>
                <div class="col-md-6 position-relative" id="new-password-container">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" readonly class="form-control" id="password" name="password" autocomplete="new-password">
                    <span class="text-danger fst-italic d-none">Password should have
                        <ul>
                            <li>a minimum of 8 characters</li>
                            <li>at least one lowercase character</li>
                            <li>at least one uppercase character</li>
                            <li>at least one special character</li>
                            <li>at least one number(digit)</li>
                        </ul>
                    </span>
                </div>
                <div class="col-md-6 position-relative" id="confirm-password-container">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" readonly class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                    <i class="fa-solid fa-eye-slash" id="toggleConfirmEye"></i>
                    <span class="text-danger fst-italic d-none">Password does not match</span>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" id="passEditBtn">Edit</button>
                    <button class="btn btn-primary" id="passCancelBtn" name="cancelButton">Cancel</button>
                    <button type="submit" class="btn btn-success" id="passUpdateBtn">Update</button>
                </div>
            </form>
        </div>

        <!-- Delete Account Container -->
        <div class="container mt-4">
            <h3 class="fw-bold">Delete Account</h3>
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            <p class="col-md-6">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#dangerModal">
                Delete Account
            </button>
        </div>
    </div>

    {{-- Danger Modal --}}
    <div class="modal fade" id="dangerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header border-bottom-0 d-flex flex-column align-items-start pb-0">
            <h5 class="fw-bold">Are you sure your want to delete your account?</h5>
            <p class="mb-0">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
            </div>
            <form action="{{ route('settings.destroy') }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="del_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="del_password">
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Delete Account</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="{{asset('/js/validation.js')}}"></script>
    <script src="{{asset('/js/settings.js')}}"></script>
@endsection