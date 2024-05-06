<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('public.partials.seo', [
        'title' => __('navbar.title') . ' | ' .  __('title'),
        'description' => $description,
        'keywords' => $keywords
    ])
    @if(app()->getLocale() == 'ar')
        @vite(['resources/css/app.rtl.css', 'resources/js/app.js'])
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-primary">
{{--@include('public.partials.topbar')
@include('public.partials.navbar')
<header>
--}}{{--    @include('public.partials.header')--}}{{--
    @yield('hero')
</header>--}}
{{--    @include('public.partials.carousel')--}}
    @yield('content')
{{--<footer>
    @include('public.partials.footer')
</footer>--}}


</body>
</html>
