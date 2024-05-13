
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('auth.multi_auth') }}</title>

    <!-- Bootstrap CSS -->
    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @endif
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
                            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="{{ __('auth.logo_alt') }}" height="50"></a>
                            @if(Session::has('success'))
                                <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger mt-3">{{ Session::get('error') }}</div>
                            @endif
                            <h4 class="mt-4">{{ __('auth.login_here') }}</h4>
                        </div>
                        <form action="{{ route('account.authenticate') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('auth.email') }}</label>
                                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="{{ __('auth.email_placeholder') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('auth.password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="{{ __('auth.password_placeholder') }}">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary btn-lg" type="submit">{{ __('auth.log_in_now') }}</button>
                            </div>
                        </form>
                        <!-- Google login button -->
                        <div class="mt-3">
                            <a href="{{ route('login.google') }}" class="btn btn-google btn-lg">{{ __('auth.login_with_google') }}</a>
                        </div>
                        <hr class="my-4 border-secondary-subtle">
                        <div class="text-center">
                            <p class="mb-2">{{ __('auth.no_account') }}</p>
                            <a href="{{ route('account.register') }}" class="btn btn-outline-secondary btn-lg">{{ __('auth.create_account') }}</a>
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
