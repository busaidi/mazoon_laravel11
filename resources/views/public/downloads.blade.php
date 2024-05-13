@extends('layouts.app')

@section('title', __('navbar.downloads'))

@section('content')
    <br>
    <div class="container bg-white rounded-2">
        <h2 class="border-bottom">{{ __('downloads.title') }}</h2>

        <div class="row mt-4">
            <div class="col-12">
                <div class="p-4">
                    <h4 class="border-bottom pb-3">{{ __('downloads.subtitle') }}</h4>
                    <p>{{ __('downloads.description') }}</p>

                    <!-- Catalog Downloads -->
                    <div class="mt-4">
                            <div class="mb-3 border p-3 rounded">
                                <h5>{{--{{ $catalog->name }}--}}</h5>
                                <p>{{--{{ $catalog->description }}--}}</p>
                                <a href="#" download class="btn btn-primary">
                                    {{ __('downloads.download_button') }}
                                </a>
                            </div>


                        <div class="mb-3 border p-3 rounded">
                            <h5>{{--{{ $catalog->name }}--}}</h5>
                            <p>{{--{{ $catalog->description }}--}}</p>
                            <a href="#" download class="btn btn-primary">
                                {{ __('downloads.download_button') }}
                            </a>
                        </div>



                        <div class="mb-3 border p-3 rounded">
                            <h5>{{--{{ $catalog->name }}--}}</h5>
                            <p>{{--{{ $catalog->description }}--}}</p>
                            <a href="#" download class="btn btn-primary">
                                {{ __('downloads.download_button') }}
                            </a>
                        </div>



                        <div class="mb-3 border p-3 rounded">
                            <h5>{{--{{ $catalog->name }}--}}</h5>
                            <p>{{--{{ $catalog->description }}--}}</p>
                            <a href="#" download class="btn btn-primary">
                                {{ __('downloads.download_button') }}
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
