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
                {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/1.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s4.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>COMMERTIAL DESIGN</h4>
                                    <p>Builderrine is the safe, reliable & cost
                                        effective construction company.</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/2.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s6.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>REAL ESTATE</h4>
                                    <p>Builderrine Construction Company Receives
                                        Industry Recognition</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/3.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s7.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>DEMOLITION</h4>
                                    <p>Extraordinary projects demand a strategic
                                        and intelligent approach, finely</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/4.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s5.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>HIGHRISE BUILDING</h4>
                                    <p>Builderrine is proud to join other
                                        companies and organizations</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/5.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s8.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>ARCHITECTURE</h4>
                                    <p>Builderrine Construction Company Receives
                                        Industry Recognition</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/6.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s9.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>INDUSTRIAL PLANT</h4>
                                    <p>Builderrine is the safe, reliable & cost
                                        effective construction company.</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/7.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s10.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>RENEWABLE ENERGY</h4>
                                    <p>Builderrine Construction Company Receives
                                        Industry Recognition.</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/8.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s11.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>CIVIL ENGINEERING</h4>
                                    <p>Extraordinary projects demand a strategic
                                        and intelligent approach, finely</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service_inner_block">
                                <img
                                    src="{{ asset('frontend/') }}/images/services/Service_Hover_images/9.jpg"
                                    alt>
                                <div class="icon_img">
                                    <img src="{{ asset('frontend/') }}/images/services/s12.png" alt>
                                </div>
                                <div class="service_content">
                                    <h4>BLUEPRINT DESIGN</h4>
                                    <p>Builderrine is proud to join other
                                        companies and organizations</p>
                                    <a href="{{ route('frontend.services.details') }}">READ MORE <i
                                            class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div> --}}
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
