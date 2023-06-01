<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./images/favicon-32x32.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./css/authentication.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <div class="login-container d-md-flex">
        <div class="login-image login"></div>
        <div class="authentication-container">
            <h1 class="title">Sign In</h1>
            <p class="mb-4">Please enter your credentials.</p>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}" class="pt-4">
            @csrf
                            <!-- Email Address -->
                            <div class="form-floating">
                <x-text-input id="floatingEmail" class="form-control"  type="email" name="email" :value="old('email')" autofocus />
                    <label for="floatingEmail">Email Address</label>
                    <span class="text-danger fst-italic d-none" id="emailSpan">Please enter valid email</span>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <div class="form-floating">
                    <span class="password-show-toggle toggle-btn"><span class="uil"></span></span>
                    <x-text-input id="password" class="form-control floatingPassword"
                                type="password"
                                name="password"
                                autocomplete="current-password" />
                    <label for="floatingPassword">Password</label>
                    <span class="text-danger fst-italic d-none" id="passwordSpan">Please add a valid password</span>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label for="remember" class="form-check-label">Keep me logged in</label>
                    </div>
                    <div><a href="forgot-password">Forgot password?</a></div>
                </div>

                <div class="d-grid mb-4">
                    <x-primary-button id="loginBtn" type="submit" class="btn btn-primary">{{ __('Log in') }}</x-primary-button>
                </div>

                <div class="mb-2">Don't have an account? <a href="./register">Register</a></div>
                <div class="mb-2">Return without login <a href="index.php">Home</a></div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/togglePasswordVisibility.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <script src="js/validation.js"></script>
    <script src="js/login.js"></script>

</body>

</html>
