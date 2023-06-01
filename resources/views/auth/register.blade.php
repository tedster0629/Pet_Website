<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" href="./images/favicon-32x32.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./css/authentication.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <div class="login-container d-md-flex">
        <div class="login-image register"></div>
        <div class="authentication-container pt-2 pb-2">
            <h1 class="title">Register</h1>
            <p class="mb-4">Please enter your basic information.</p>

            {{-- Validation errors --}}
            {{-- <auth-validation-errors class="mb-4" :errors="$errors"/> --}}

            <form method="POST" action="{{ route('register') }}" class="pt-4">
            @csrf
                <div class="form-floating">
                    <!-- <input type="text" class="form-control" id="floatingFirstName" placeholder="Please enter your first name"   min="2" max="4"> -->
                    <x-text-input id="fname" class="form-control" type="text" name="fname" :value="old('fname')" required autofocus />
                    <label for="fname">First Name</label>
                    <span class="text-danger fst-italic d-none" id="floatingFirstNameSpan">Please enter valid first name</span>
                    <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                </div>

                <div class="form-floating">
                    <!-- <input type="text" class="form-control" id="floatingFirstName" placeholder="Please enter your first name"   min="2" max="4"> -->
                    <x-text-input id="lname" class="form-control" type="text" name="lname" :value="old('lname')" required autofocus />
                    <label for="lname">Last Name</label>
                    <span class="text-danger fst-italic d-none" id="floatingLastNameSpan">Please enter valid last name</span>
                    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                </div>

                <div class="form-floating">
                    <!-- <input type="email" class="form-control" id="floatingEmail" placeholder="Please enter your email" > -->
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                    <label for="floatingEmail">Email</label>
                    <span class="text-danger fst-italic d-none" id="emailSpan">Please enter valid email</span>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-floating">
                    <!-- <input type="password" class="form-control floatingPassword" id="floatingPassword" placeholder="Please enter your password" > -->
                    <x-text-input id="password" class="form-control floatingPassword"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                    <label for="floatingPassword">Password</label>
                    <span class="text-danger fst-italic d-none" id="passwordSpan">Password should have
                        <ul>
                            <li>a minimum of 8 characters</li>
                            <li>at least one lowercase character</li>
                            <li>at least one uppercase character</li>
                            <li>at least one special character</li>
                            <li>at least one number(digit)</li>
                        </ul>
                    </span>
                    {{-- <span class="text-danger fst-italic d-none" id="passwordSpan">Password must be minimum eight characters and a number</span> --}}
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="form-floating">
                    <span class="password-show-toggle toggle-btn"><span class="uil"></span></span>
                    <!-- <input type="password" class="form-control floatingPassword" id="floatingConfirmPassword" placeholder="Please repeat your password" > -->
                    <x-text-input id="password_confirmation" class="form-control floatingPassword"
                                type="password"
                                name="password_confirmation" required />
                    <label for="floatingConfirmPassword">Confirm Password</label>
                    <span class="text-danger fst-italic d-none" id="floatingConfirmPasswordSpan">Passwords must match</span>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label for="remember" class="form-check-label d-block">I accept the <a href="conditions">Terms and Conditions</a></label>
                        <span class="text-danger fst-italic d-none" id="conditionsSpan">You must read and accept the terms and conditions </span>
                    </div>
                </div>

                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary" id="signUpBtn">Sign Up</button>
                </div>

                <div class="mb-2">Already have an account? <a href="login">Sign in</a></div>
                <div class="mb-2">Return without register <a href="index.php">Home</a></div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/togglePasswordVisibility.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <script src="js/validation.js"></script>
    <script src="js/register.js"></script>

</body>

</html>
