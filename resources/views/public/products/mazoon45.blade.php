@extends('layouts.app')
@section('title', __('navbar.products'))

@section('content')
    <div class="container-fluid px-0">

        <!-- Hero Section with Parallax Effect -->
        <div class="hero bg-primary text-white text-center py-5"
             style="background-image: url('{{asset('/images/products/mazoon45/8.jpg')}}'); background-attachment: fixed; background-position: bottom; background-repeat: no-repeat">
            <h1>{{ __('mazoon45.title') }}</h1>
            <p class="lead">
                {{--Catchy tagline or sentence about the product.--}}
                {{ __('mazoon45.lead') }}
            </p>
            {{--<a href="#purchase" class="btn btn-light">Purchase Now</a>--}}
        </div>

        <div class="container mt-5">

            <!-- Testimonials Carousel -->
            {{--<div id="testimonialsCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <blockquote class="blockquote">
                            <p>"This product is amazing!"</p>
                            <footer class="blockquote-footer">John Doe</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p>"I've never seen anything like this!"</p>
                            <footer class="blockquote-footer">Hamed Busaidi</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p>"Truly remarkable craftsmanship!"</p>
                            <footer class="blockquote-footer">John Doe</footer>
                        </blockquote>
                    </div>
                    <!-- Add more testimonials as carousel items... -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>--}}

            <!-- Product Description -->
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="{{ asset('images/products/mazoon45/mazoon_product_1.png') }}" class="img-fluid rounded"
                         alt="Product Image">
                </div>
                <div class="col-md-6">
                    <h3>{{ __('mazoon45.title') }}</h3>
                    <p>{{ __('mazoon45.description') }}</p>
                </div>
            </div>

            <!-- Product Features -->
            <div class="row">
                <h3 class="border-bottom p-3">{{ __('mazoon45.features') }}</h3>
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('images/products/mazoon45/f2.png') }}" class="img-fluid mb-2" alt="Feature 1">
                    <h5>{{ __('mazoon45.f1') }}</h5>
                    <p>{{ __('mazoon45.f1description') }}</p>
                </div>


                <div class="col-md-3 mb-4">
                    <video controls autoplay loop class="img-fluid mb-2">
                        <source src="{{ asset('images/products/mazoon45/corner.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>{{ __('mazoon45.f2') }}</h5>
                    <p>{{ __('mazoon45.f2description') }}</p>
                </div>


                <div class="col-md-3 mb-4">
                    <img src="{{ asset('images/products/mazoon45/mullion.png') }}" class="img-fluid mb-2"
                         alt="Feature 3">
                    <h5>{{ __('mazoon45.f3') }}</h5>
                    <p>{{ __('mazoon45.f3description') }}</p>
                </div>
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('images/products/mazoon45/adptive.png') }}" class="img-fluid mb-2"
                         alt="Feature 4">
                    <h5>{{ __('mazoon45.f4') }}</h5>
                    <p>{{ __('mazoon45.f4description') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

