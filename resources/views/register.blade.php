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
                            <h4 class="mt-4">Register Here</h4>
                        </div>
                        <form action="{{ route('account.processRegister') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com">
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
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary btn-lg" type="submit">Register Now</button>
                            </div>
                        </form>
                        <hr class="my-4 border-secondary-subtle">
                        <div class="text-center">
                            <p class="mb-2">Already have an account?</p>
                            <a href="{{ route('account.login') }}" class="btn btn-outline-secondary btn-lg">Click here to login</a>
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
