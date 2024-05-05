<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Multi Auth</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md bg-white shadow-lg bsb-navbar bsb-navbar-hover bsb-navbar-caret">
    <div class="container">
        <a class="navbar-brand" href="#">
            <strong>Laravel 11 Multi Auth</strong>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{Auth::user()->name}}</a>
                        <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('account.logout')}}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-header bg-light">
            <h3 class="h5 pt-2">Dashboard</h3>
        </div>
        <div class="card-body">
            You are logged in !!
        </div>
    </div>
</div>

<!-- Bootstrap JS (includes Popper) -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
