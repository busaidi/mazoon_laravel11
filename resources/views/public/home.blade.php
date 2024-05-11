@extends('layouts.app')

@section('title', __('navbar.home'))

{{--@section('hero')
    <div class="hero-section position-relative">
        <img src="{{ asset('images/hero/hero_home.png') }}" class="img-fluid w-100" alt="Hero Mazoon Aluminum">
        <div class="hero-text position-absolute top-50 start-0 translate-middle-y ms-5">
            <h1 class="text-white display-4">{{ __('home.title') }}</h1>
            <p class="text-white">{{ __('home.body') }}</p>
            <a href="#" class="btn btn-outline-light btn-lg">Learn More</a>
        </div>
    </div>
@endsection--}}

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="container text-center">
            <img src="{{ asset('images/hero/hero-gray.jpg') }}" class="img-fluid" alt="Hero Mazoon Aluminum">
        </div>
    </div>


    <div class="px-4 py-5 text-center bg-white">
        <h1 class="display-4 fw-bold text-body-emphasis">{{ __('hero.title') }}</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">{{ __('hero.body') }}</p>
            <a href="{{ url(app()->getLocale() . '/about') }}"
               class="btn btn-primary btn-lg px-4">{{ __('hero.link') }}</a>
        </div>
    </div>



    <div class="container text-center p-0 bg-white">
        <p class="desc lead">{{ __('home.h1_lead') }} <a target="_blank" class="link-dark"
                                                         href="https://www.napcooman.com/">{{ __('home.h1_lead_link') }}</a>
        </p>
    </div>
    <div class="container-fluid bg-light py-5 ">
        <div class="container bg-white">
            <h2 class="pb-2 border-bottom">{{ __('home.h1') }}</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4 py-3">
                <!-- Feature 1 -->
                <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-temperature-low fa-2x"></i> <!-- Thermal Efficiency -->
                            <h4 class="card-title mt-2">{{ __('home.f1') }}</h4>
                            <p class="card-text">{{ __('home.f1p') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-volume-mute fa-2x"></i> <!-- Sound Barrier -->
                            <h4 class="card-title mt-2">{{ __('home.f2') }}</h4>
                            <p class="card-text">{{ __('home.f2p') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-cloud-rain fa-2x"></i> <!-- Rain Guard -->
                            <h4 class="card-title mt-2">{{ __('home.f3') }}</h4>
                            <p class="card-text">{{ __('home.f3p') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 4 -->
                <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-tools fa-2x"></i> <!-- Low Maintenance -->
                            <h4 class="card-title mt-2">{{ __('home.f4') }}</h4>
                            <p class="card-text">{{ __('home.f4p') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container bg-white mb-5">
            <div class="row g-4">
                <!-- Additional Feature 5 -->
                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-leaf fa-2x"></i> <!-- Eco Choice -->
                            <h4 class="card-title mt-2">{{ __('home.f5') }}</h4>
                            <p class="card-text">{{ __('home.f5p') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Additional Feature 6 -->
                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-shield-alt fa-2x"></i> <!-- Built Strong -->
                            <h4 class="card-title mt-2">{{ __('home.f6') }}</h4>
                            <p class="card-text">{{ __('home.f6p') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Additional Feature 7 -->
                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-ruler-combined fa-2x"></i> <!-- Design Flexibility -->
                            <h4 class="card-title mt-2">{{ __('home.f7') }}</h4>
                            <p class="card-text">{{ __('home.f7p') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Additional Feature 8 -->
                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-wrench fa-2x"></i> <!-- Easy Install -->
                            <h4 class="card-title mt-2">{{ __('home.f8') }}</h4>
                            <p class="card-text">{{ __('home.f8p') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white">
        <div class="container py-3">
            <h1 class="border-bottom">{{ __('navbar.products') }}</h1>
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="{{ asset('images/products/mazoon45/mazoon_product_1.png') }}" class="img-fluid rounded"
                         alt="Product Image">
                </div>
                <div class="col-md-6">
                    <h1>{{ __('mazoon45.title') }}</h1>
                    <p class="lead">{{ __('mazoon45.lead') }}</p>
                    <p>{{ __('mazoon45.description') }} <a
                                href="{{ url(app()->getLocale() . '/mazoon45') }}">{{ __('home.h1_lead_link') }}</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
