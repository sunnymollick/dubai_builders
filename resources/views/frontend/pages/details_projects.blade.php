@extends('frontend.layouts.defaults')
@section('title')
Project Details
@endsection
@section('page_header')
<!-- Page Header -->
<div class="page_header">
    <div class="page_header_content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Project Details</li>
            </ul>
            <h2 class="heading">Project Details</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
            <div class="container">
                <div class="project_details section">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="project_details_inner">
                                <div class="post_img">
                                    <img src="{{asset($details->hero_image)}}" alt="blog">
                                </div>
                                <div class="post_content">
                                    <div class="post_header">
                                        <h3 class="post_title">{{$details->project_title}}</h3>
                                    </div>
                                    <div class="fulltext">
                                        <p>{{$details->project_description}}
                                        </p>
                                        <div class="post_gallery">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <img src="{{asset($details->image_1)}}"
                                                        alt="img">
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <img src="{{asset($details->image_2)}}"
                                                        alt="img">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="share_tag">
                                            <div class="post_footer">
                                                <div class="post_share">
                                                    <ul
                                                        class="share_list new_share">
                                                        <li>Share:</li>
                                                        <li class="facebook"><a
                                                                href="#"><i
                                                                    class="fa fa-facebook"></i></a></li>
                                                        <li class="twitter"><a
                                                                href="#"><i
                                                                    class="fa fa-twitter"></i></a></li>
                                                        <li class="pinterest"><a
                                                                href="#"><i
                                                                    class="fa fa-pinterest"></i></a></li>
                                                        <li class="instagram"><a
                                                                href="#"><i
                                                                    class="fa fa-dribbble"></i></a></li>
                                                        <li class="linkedin"><a
                                                                href="#"><i
                                                                    class="fa fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="sidebar">
                                <div class="project_info">
                                    <div class="project_info_bg">
                                        <div class="project_info_header">
                                            <h4>Project Information</h4>
                                        </div>
                                        <div class="project_info_details_bg">
                                            <div class="project_info_details">
                                                <h5>Client Name</h5>
                                                <p>{{$details->client->name}}</p>
                                            </div>
                                            <div class="project_info_details">
                                                <h5>Location</h5>
                                                <p>{{$details->project_location}}</p>
                                            </div>
                                            <div class="project_info_details">
                                                <h5>Solving Time</h5>
                                                <p>{{$details->handover_time}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('scripts')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection