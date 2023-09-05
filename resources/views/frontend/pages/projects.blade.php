@extends('frontend.layouts.defaults')
@section('title')
Completed Projects
@endsection
@section('page_header')
<!-- Page Header -->
<div class="page_header">
    <div class="page_header_content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Completed Projects</li>
            </ul>
            <h2 class="heading">Completed Projects</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="project_iso project_iso1 pd_tp_110 pb-0">
    <div class="container-fluid g-0">
        <div class="row g-0">
            <div class="col">
                <div class="button-group filters-button-group">
                    <button class="button is-checked" data-filter="*">All</button>
                    <button class="button" data-filter=".commercial">Commercial</button>
                    <button class="button" data-filter=".highrise">Highrise</button>
                    <button class="button" data-filter=".residential">Residential</button>
                    <button class="button" data-filter=".business">Business</button>
                </div>

                <div class="grid grid-5">
                    @foreach($projects as $project)
                    <div class="element-item highrise">
                        <div class="teambox">
                            <img src="{{asset($project->thumbnail_image)}}" alt>
                            <div class="teambox_inner">
                                <div class="team_social">
                                    <div class="share"><i class="ion-android-share-alt"></i></div>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="ion-social-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="ion-social-twitter"></i></a></li>
                                        <li class="instagram"><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
                                    </ul>
                                </div>
                                <div class="teambox_intro">
                                    <div class="team_flex">
                                        <h6>{{$project->project_location}}</h6>
                                        <h5><a href="{{ route('frontend.projects.details', $project->id) }}">{{$project->project_title}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</div>
<div class="banner banner_bg_color">
    <div class="container">
        <div class="banner_content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="banner_text">
                        <img src="{{asset('frontend/images/phone3.png')}}" alt>
                        <h1>Is Your House Secured Enough? Call Us to
                            install Security Devices</h1>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner_phone">
                        <h4>Call Us Anytime</h4>
                        <span>(+123)987.654.32</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection