<nav class="navbar navbar-expand-lg navbar-light bg-light dotted" data-bs-theme="light">
    <div class="container ">
        <a class="navbar-brand" href="/home">
            <img src="{{ asset('images/logo.png') }}" alt="Mazoon Aluminum Logo" height="44">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#globalNavbar" aria-controls="globalNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="globalNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('about')}}">{{ __('navbar.about') }}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('navbar.products') }}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <li><a class="dropdown-item" href="{{route('mazoon45')}}">{{ __('navbar.mazoon45') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('news')}}">{{ __('navbar.news') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('blog')}}">{{ __('navbar.blog') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('downloads')}}">{{ __('navbar.downloads') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">{{ __('navbar.contact') }}</a></li>
            </ul>

                {{--<form class="d-flex my-2 my-lg-0 order-lg-2" action="https://themes.getbootstrap.com/shop/">
                    <input class="form-control me-2" name="s" type="search" placeholder="Search" aria-label="Search">
                </form>--}}
            @guest
                <ul class="navbar-nav ms-lg-2 order-lg-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('account.login') }}">{{__('home.sign_in')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('account.register') }}">{{__('home.sign_up')}}</a></li>
                </ul>
            @endguest
            @auth
                <ul class="navbar-nav ms-lg-2 order-lg-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            {{--<li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('account.dashboard') }}">Dashboard</a></li>--}}
                            <li><a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
<div class="nav-scroller py-0 mb-3 border-bottom">
    {{--<nav class="nav nav-underline justify-content-between">
        <a class="nav-item nav-link link-body-emphasis" href="#">Mazoon Aluminum</a>
        <a class="nav-item nav-link link-body-emphasis " href="#">Mazoon System</a>
        <a class="nav-item nav-link link-body-emphasis active" href="#">Aluminum</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Glass</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Fabricator</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Design</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Construction</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Business</a>

    </nav>--}}
</div>



