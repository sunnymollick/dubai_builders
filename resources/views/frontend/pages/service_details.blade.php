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

                                {{-- <h4 class="widget_title">
                                Service Steps
                                <span class="title_line"></span>
                            </h4>
                            <p class="margin_o_para">The following
                                problems may arise withe house key
                                duplication -</p>
                            <ul class="point_order">
                                <li>As the world continues to fight
                                    COVID-19 some property owners</li>
                                <li>improve the security of their
                                    buildings whilst decreasing the
                                    spread</li>
                                <li>following 3 hygienic security
                                    solutions are suitable for use
                                    within</li>
                                <li>esidential and commercial
                                    buildings improve the security</li>
                            </ul> --}}

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

                                {{-- <p>
                                Burglars prefer to work in the cover
                                of dark. By setting up lighting
                                around your garage can aid in
                                keeping burglars at bay. Install a
                                sensor light to turn on as you enter
                                the driveway and approach
                                the garage. Not only will it prove a
                                burglar deterrent it will also
                                assist you with seeing better to
                                come home late.
                            </p> --}}

                                <div class="video_post">
                                    <div class="ytube_video">
                                        <iframe id="ytvideo" src="{{$details->video_link}}"
                                            allow="autoplay;" allowfullscreen></iframe>
                                        <div class="post_content">
                                            <div class="ytplay_btn"><i class="ion-ios-play"></i></div>
                                            <img src="{{ asset('frontend/') }}/images/services/video_bg.png" alt="blog">
                                        </div>
                                    </div>
                                </div>

                                {{-- <p>
                                By automating your doors this
                                removes the need for people touching
                                handles or surfaces. Both of
                                the above options can also be used
                                in conjunction with controlling the
                                access of your automatic
                                doors. For example, a touch-less
                                sensor can be installed to control
                                the opening of the door.
                            </p>

                            <p>
                                Automatic doors can be programmed to
                                be activate during certain times and
                                remain locked at a
                                others. Door openers/closer can also
                                be automated for use in some high
                                traffic areas.
                            </p> --}}
                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="col-lg-4 col-md-12">
                <div class="sidebar">
                    <div id="widgetnav" class="widget widget_menu">
                        <div class="sidenav">
                            <ul class="side_menu">
                                <li class="menu-item active">
                                    <a href="{{route('frontend.services.details')}}">
                                        <img src="{{asset('frontend/')}}/images/services/cone_1.png" alt>
                                        <img src="{{asset('frontend/')}}/images/services/2-white.png" alt>
                                        Architectural Design
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="services-2.html">
                                        <img src="{{asset('frontend/')}}/images/services/9-blue.png" alt>
                                        <img src="{{asset('frontend/')}}/images/services/cone_2.png" alt>
                                        Comertial Construction
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('frontend.services.details')}}">
                                        <img src="{{asset('frontend/')}}/images/services/cone_3.png" alt>
                                        <img src="{{asset('frontend/')}}/images/services/5-blue.png" alt>
                                        Real Estate & Housing
                                        Construction
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="services-2.html">
                                        <img src="{{asset('frontend/')}}/images/services/cone_4.png" alt>
                                        <img src="{{asset('frontend/')}}/images/services/1-white.png" alt>
                                        Renewable energy plant
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('frontend.services.details')}}">
                                        <img src="{{asset('frontend/')}}/images/services/cone_5.png" alt>
                                        <img src="{{asset('frontend/')}}/images/services/11-white.png" alt>
                                        Commertial Powerplant
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="services-2.html">
                                        <img src="{{asset('frontend/')}}/images/services/cone_6.png" alt>
                                        <img src="{{asset('frontend/')}}/images/services/10-white.png" alt>
                                        Commercial Blueprint
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('frontend.services.details')}}">
                                        <img src="{{asset('frontend/')}}/images/services/cone_7.png" alt>
                                        <img src="{{asset('frontend/')}}/images/services/7-white.png" alt>
                                        Civil Engineering
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="custom_2" class="widget widget_side_contact">
                        <div class="side_contact">
                            <div class="side_contact_top">
                                <div class="side_contact_inner">
                                    <p>Need Construction Service?</p>
                                    <h4>Make An Appointment</h4>
                                </div>
                            </div>
                            <div class="side_phone_inner">
                                <div>(+123)987.654.32</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}
            </div>
        </div>
    </div>

    <div class="testimonial pd_btom_80 pd_top_80">
        <div class="container">
            <div class="section_header text-center">
                <div class="shadow_icon"><img src="{{ asset('frontend/') }}/images/shadow_icon3.png" alt></div>
                <h6 class="section_sub_title">Clients testimonial</h6>
                <h1 class="section_title">What our clients say about us</h1>
                <p class="section_desc">Builderrine is the best
                    constructioncompany. It has best team who are
                    provideing best service possible.</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl_testimonial1 owl-carousel owl-theme">
                        <div class="item">
                            <div class="testibox1">
                                <div class="testibox_inner">
                                    <div class="testi-content">
                                        <ul>
                                            <li class="text">Rating:</li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <p>“Builderrine Construction
                                            provides us amazing serives.
                                            The have designed and build
                                            our Miami grand Hotel
                                            project. They have exceeded
                                            our expectation and did such
                                            an amazing job. We are very
                                            happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend/') }}/images/reviewer1.png" alt>
                                        </div>
                                        <div class="testi-info">
                                            <h4>Johnathon Doe</h4>
                                            <h6>MIAMI</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testibox1">
                                <div class="testibox_inner">
                                    <div class="testi-content">
                                        <ul>
                                            <li class="text">Rating:</li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <p>“Builderrine Construction
                                            provides us nice serives.
                                            The have designed and build
                                            our NY Pent House project.
                                            They have exceeded our
                                            expectation and did such an
                                            amazing job. We are very
                                            happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend/') }}/images/reviewer4.png" alt>
                                        </div>
                                        <div class="testi-info">
                                            <h4>Marina Samuel</h4>
                                            <h6>New York</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testibox1">
                                <div class="testibox_inner">
                                    <div class="testi-content">
                                        <ul>
                                            <li class="text">Rating:</li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <p>“Builderrine Construction
                                            provides us nice serives.
                                            The have designed and build
                                            our Utah Shopping Mall
                                            project. They have exceeded
                                            our expectation and did such
                                            an amazing job. We are very
                                            happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend/') }}/images/reviewer3.png" alt>
                                        </div>
                                        <div class="testi-info">
                                            <h4>Oakland Gardner</h4>
                                            <h6>UTAH</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testibox1">
                                <div class="testibox_inner">
                                    <div class="testi-content">
                                        <ul>
                                            <li class="text">Rating:</li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <p>Builderrine Construction
                                            provides us nice serives.
                                            The have designed and build
                                            our NY Pent House project.
                                            They have exceeded our
                                            expectation and did such an
                                            amazing job. We are very
                                            happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend/') }}/images/reviewer1.png" alt>
                                        </div>
                                        <div class="testi-info">
                                            <h4>Johnathon Doe</h4>
                                            <h6>New York</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testibox1">
                                <div class="testibox_inner">
                                    <div class="testi-content">
                                        <ul>
                                            <li class="text">Rating:</li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <p>Builderrine Construction
                                            provides us nice serives.
                                            The have designed and build
                                            our NY Pent House project.
                                            They have exceeded our
                                            expectation and did such an
                                            amazing job. We are very
                                            happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend/') }}/images/reviewer1.png" alt>
                                        </div>
                                        <div class="testi-info">
                                            <h4>Johnathon Doe</h4>
                                            <h6>New York</h6>
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
