<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">


    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @endif

    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.snow.css" rel="stylesheet" />

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
    @include('layouts.partials.topbar')
    @include('layouts.partials.navbar')
</header>






{{--    @include('public.partials.header')--}}
@yield('hero')

{{--    @include('public.partials.carousel')--}}

@yield('content')
<footer>
    @include('layouts.partials.footer')
</footer>

@stack('scripts') {{-- This is where scripts pushed from child views will be placed --}}
<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

{{--<script>
    document.addEventListener('DOMContentLoaded', function () {
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    });
</script>--}}

</body>
</html>
