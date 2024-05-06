<div class="container-fluid bg-dark text-danger">
    <div class="container d-flex justify-content-between py-1">
        <div>
            <!-- Phone -->
            <a href="tel:0096891711170" target="_blank" class="text-white me-3 text-decoration-none" style="font-size: 0.9rem;">
                <i class="fas fa-phone-alt"></i>
            </a>

            <!-- Email -->
            <a href="mailto:busaidi.nexus@gmail.com" target="_blank" class="text-white me-3 text-decoration-none" style="font-size: 0.9rem;">
                <i class="fas fa-envelope"></i>
            </a>

            <!-- WhatsApp -->
            <a href="https://wa.me/+96891711170" target="_blank" class="text-white me-3 text-decoration-none" style="font-size: 0.9rem;">
                <i class="fab fa-whatsapp"></i>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/mazoon_aluminum/" target="_blank" class="text-white me-3 text-decoration-none" style="font-size: 0.9rem;">
                <i class="fab fa-instagram"></i>
            </a>

            <!-- LinkedIn -->
            <a href="https://om.linkedin.com/company/mazoon-aluminum" target="_blank" class="text-white text-decoration-none" style="font-size: 0.9rem;">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>

        <div>
            <!-- Language Switcher -->
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white text-decoration-none" href="#" id="languageDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.9rem;">
                    {{--{{ strtoupper(app()->getLocale()) }}--}} {{ LaravelLocalization::getCurrentLocale() }}
                    <i class="fas fa-globe"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                    {{--<li><a class="dropdown-item" href="--}}{{--{{ route('language.switch', ['lang' => 'en', 'redirect' => request()->path()]) }}--}}{{--">English</a></li>
                    <li><a class="dropdown-item" href="--}}{{--{{ route('language.switch', ['lang' => 'ar', 'redirect' => request()->path()]) }}--}}{{--">Arabic</a></li>--}}
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
