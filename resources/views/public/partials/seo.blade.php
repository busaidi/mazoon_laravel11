    <title>{{ __('navbar.title') }} | @yield('title')</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    @foreach(config('app.available_locales') as $langCode => $langName)
    <link rel="alternate" hreflang="{{ $langCode }}" href="{{ generateLocalizedUrl($langCode) }}" />
    @endforeach
    <link rel="canonical" href="{{ url()->current() }}" />

