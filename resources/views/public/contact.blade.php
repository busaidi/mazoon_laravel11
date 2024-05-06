@extends('public.layouts.app')
@section('title', __('navbar.contact'))
@section('content')
    <br>
    <div class="container bg-white rounded-2 ">
        <h2 class="border-bottom">{{ __('contact.h1_1') }}</h2>

        <div class="row mt-4">
            <div class="col-md-6">
                <!-- Contact Information -->
                <div class="border p-4 mb-4">
                    <h4 class="border-bottom pb-3">{{ __('contact.location_h') }}</h4>
                    <p>{{ __('contact.location') }}</p>
                </div>
                <div class="border p-4 mb-4">
                    <h4 class="border-bottom pb-3">{{ __('contact.email_h') }}</h4>
                    <p>{{ __('contact.email') }}</p>
                </div>
                <div class="border p-4 mb-4">
                    <h4 class="border-bottom pb-3">{{ __('contact.phone_h') }}</h4>
                    <p>{{ __('contact.phone') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Contact Form -->
                <div class="border p-4 mb-4">
                    <h4 class="border-bottom pb-3">{{ __('contact.form_h') }}</h4>
                    <form action="{{--{{ route('contact.submit') }}--}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('contact.form_name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('contact.form_email') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">{{ __('contact.form_message') }}</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('contact.form_submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
