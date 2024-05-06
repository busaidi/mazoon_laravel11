<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mazoon </title>
    {{--@include('public.partials.seo', [
        'title' => __('navbar.title') . ' | ' .  __('title'),
        'description' => $description,
        'keywords' => $keywords
    ])--}}
    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .dotted {
            background-color: #f8f9fa;
            background-image: radial-gradient(circle, #e7e7e7 0.1px, transparent 1px);
            background-size: 4px 4px;
        }
    </style>

</head>
<body class="bg-light">
<header>
@include('public.partials.topbar')
@include('public.partials.navbar')
</header>
    {{--    @include('public.partials.header')--}}
    @yield('hero')

{{--    @include('public.partials.carousel')--}}

@yield('content')
<footer>
    @include('public.partials.footer')
</footer>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
