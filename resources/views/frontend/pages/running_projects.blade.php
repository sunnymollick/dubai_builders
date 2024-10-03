@extends('frontend.layouts.defaults')
@section('title')
Running Projects
@endsection
@section('page_header')
<!-- Page Header -->
<div class="page_header">
    <div class="page_header_content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Running Projects</li>
            </ul>
            <h2 class="heading">Running Projects</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="section project_iso project_iso1" style="padding-left: 20px;">
    <div class="container-fluid g-0">
        <div class="row g-0">
            <div class="col">

                <div class="grid grid-5">
                    @foreach ($all_project as $all)
                    <div class="element-item highrise">
                        <div class="teambox">
                            <img src="{{ asset($all->thumbnail_image) }}" alt="">
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
                                        <h6>{{ $all->project_location }}</h6>
                                        <h5><a href="{{route('frontend.projects.details', $all->id)}}">{{ $all->project_title }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            <div class="pagination-div">
                <ul class="pagination">

                    @if ($all_project->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                    @else
                    <li><a href="{{ $all_project->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    @for ($i = 1; $i <= $all_project->lastPage(); $i++)
                        @if ($i == $all_project->currentPage())
                        <li><span class="page-number current">{{ $i }}</span></li>
                        @else
                        <li><a href="{{ $all_project->url($i) }}" class="page-number">{{ $i }}</a></li>
                        @endif
                        @endfor

                        @if ($all_project->hasMorePages())
                        <li><a href="{{ $all_project->nextPageUrl() }}" rel="next">&raquo;</a></li>
                        @else
                        <li class="disabled"><span>&raquo;</span></li>
                        @endif


 
                </ul>
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