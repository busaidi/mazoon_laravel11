{{--
<div class="container-fluid bg-light border-top">
    <footer class="py-3 my-4 text-center text-body-secondary">
        <p> </p>
        <i>Version: {{ env('MAZOON_APP_VERSION', 'en') }} Beta</i>
    </footer>

--}}
<div class="bg-dark">
<ul class="nav justify-content-center border-bottom pb-3 mb-3 ">
    <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-white">{{ __('navbar.home') }}</a></li>
    <li class="nav-item"><a href="/about" class="nav-link px-2 text-white">{{ __('navbar.about') }}</a></li>
    <li class="nav-item"><a href="/mazoon45" class="nav-link px-2 text-white">{{ __('navbar.mazoon45') }}</a></li>
    <li class="nav-item"><a href="/mazoon45" class="nav-link px-2 text-white">{{ __('navbar.news') }}</a></li>
    <li class="nav-item"><a href="/mazoon45" class="nav-link px-2 text-white">{{ __('navbar.blog') }}</a></li>
    <li class="nav-item"><a href="/contact" class="nav-link px-2 text-white">{{ __('navbar.contact') }}</a></li>
</ul>
</div>
<p class="text-center text-body-secondary">{{ __('footer.footer') }} &copy; {{ date('Y') }}<br><i>Version: {{ env('MAZOON_APP_VERSION', 'en') }} Beta</i></p>
