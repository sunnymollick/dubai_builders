@extends('frontend.layouts.defaults')
@section('title')
    Service Details
@endsection
@section('page_header')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Service Details</li>
                </ul>
                <h2 class="heading">{{ $details->service_title }}</h2>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="project_details section">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="project_details_inner">
                        <div class="post_img">
                            <img src="{{ asset($details->hero_image) }}" alt="blog">
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">Comertial
                                    Construction</h3>
                            </div>
                            <div class="fulltext">
                                <p>
                                    {!! $details->service_details !!}
                                </p>


                                <div class="post_gallery">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="anim_box" data-aos="overlay-right">
                                                <img src="{{ asset($details->image_1) }}" alt="img">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="anim_box" data-aos="overlay-right">
                                                <img class="sm-margin-bottom" src="{{ asset($details->image_2) }}"
                                                    alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="video_post">
                                    <div class="ytube_video">
                                        <iframe id="ytvideo" src="{{ $details->video_link }}" allow="autoplay;"
                                            allowfullscreen></iframe>
                                        <div class="post_content">
                                            <div class="ytplay_btn"><i class="ion-ios-play"></i></div>
                                            <img src="{{ asset('frontend/') }}/images/services/video_bg.png" alt="blog">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@endsection
