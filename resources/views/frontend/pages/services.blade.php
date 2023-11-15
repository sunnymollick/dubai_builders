@extends('frontend.layouts.defaults')
@section('title')
    Services
@endsection
@section('page_header')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Services</li>
                </ul>
                <h2 class="heading">Services</h2>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="section service services_inner_page">
        <div class="container">
            <div class="row">
                @foreach ($all as $a)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="service_inner_block">
                            <img src="{{ asset($a->thumbnail_image) }}" alt>
                            <div class="icon_img">
                                <img src="{{ $a->logo }}" alt>
                            </div>
                            <div class="service_content">
                                <h4>{{ $a->service_title }}</h4>
                                <p>{{ $a->slogan }}</p>
                                <a href="{{ route('frontend.services.details', ['id' => $a->id]) }}">READ MORE <i
                                        class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination-div">
                    <ul class="pagination">
                        <li><a href="#"><i class="ion-chevron-left"></i></a></li>
                        <li><a class="page-number current" href="#">1</a></li>
                        <li><a class="page-number" href="#">2</a></li>
                        <li><a class="page-number" href="#">3</a></li>
                        <li><a href="#"><i class="ion-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
