@extends('public.layouts.app')

@section('title', __('navbar.about'))

    @section('content')
        <div class="container py-5">
            <!-- Title Section -->
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4">{{ __('about.title_1') }}</h1>
                    <p class="lead mt-3">{{ __('about.lead') }}</p>
                </div>
            </div>

            <!-- Journey Timeline Section -->
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h3 class="mb-4 text-center">{{ __('about.title_2') }}</h3>
                    <div class="timeline">
                        <!-- Timeline Items -->
                        @for($i = 1; $i <= 6; $i++)
                            @php
                                $stageKey = 'stage_' . $i;
                                $stageText = __('about.' . $stageKey);
                            @endphp
                            @if(!empty($stageText))
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i class="fas fa-history"></i> <!-- Default icon, can be changed -->
                                    </div>
                                    <div class="timeline-content">
                                        <h5>{{ $stageText }}</h5>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Mazoon Aluminum Section -->
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="mb-3 text-center">{{ __('about.title_3') }}</h2>
                    <p class="text-center">{{ __('about.lead_2') }}</p>
                </div>
            </div>
        </div>
    @endsection


@push('css')
    <style>
        /* Timeline CSS */
        .timeline {
            border-left: 3px solid #007bff;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            background: rgba(0,123,255,0.07);
            margin: 20px auto;
            letter-spacing: 0.5px;
            position: relative;
            line-height: 1.4em;
            padding: 50px;
            list-style: none;
            text-align: left;
            max-width: 1000px;
        }

        .timeline-item {
            padding-bottom: 15px;
            position: relative;
        }

        .timeline-icon {
            background: #007bff;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            font-size: 18px;
            float: left;
            margin-right: 10px;
            position: absolute;
        }

        .timeline-content {
            padding-left: 60px;
        }

        .timeline-icon i {
            position: relative;
            top: 2px;
        }

        @media (max-width: 767px) {
            .timeline {
                left: 20px !important;
            }

            .timeline-content {
                padding-left: 30px;
            }

            .timeline-icon {
                left: 0;
            }
        }

    </style>
@endpush
