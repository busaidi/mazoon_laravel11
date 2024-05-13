<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Multi Auth</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        /* Custom styles for this template */
        .bg-light-subtle {
            background-color: #f8f9fa !important;
        }
        .border-light-subtle {
            border-color: #e2e6ea !important;
        }
        .border-secondary-subtle {
            border-color: #ced4da !important;
        }
        .btn-google {
            background-color: #db4437;
            color: white;
        }
        .btn-google:hover {
            background-color: #a8342f;
            color: white;
        }
    </style>
</head>
<body class="bg-light">

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border border-light-subtle rounded-4">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Mazoon Aluminum Logo" height="50"></a>
                            @if(Session::has('success'))
                                <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger mt-3">{{ Session::get('error') }}</div>
                            @endif
                            <h4 class="mt-4">Login Here</h4>
                        </div>
                        <form action="{{ route('account.authenticate') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary btn-lg" type="submit">Log in now</button>
                            </div>
                        </form>
                        <!-- Google login button -->
                        <div class="mt-3">
                            <a href="{{ route('login.google') }}" class="btn btn-google btn-lg">Login with Google</a>
                        </div>
                        <hr class="my-4 border-secondary-subtle">
                        <div class="text-center">
                            <p class="mb-2">Don't have an account?</p>
                            <a href="{{ route('account.register') }}" class="btn btn-outline-secondary btn-lg">Create new account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS (includes Popper) -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
