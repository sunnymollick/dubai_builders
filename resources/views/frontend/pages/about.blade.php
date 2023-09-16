@extends('frontend.layouts.defaults')
@section('title')
About
@endsection
@section('page_header')
<!-- Page Header -->
<div class="page_header">
    <div class="page_header_content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">About Us</li>
            </ul>
            <h2 class="heading">About Us</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="top_feature">
    <div class="container">
        <div class="full_image_holder" data-aos="overlay-right">
            <img src="{{ asset($about->hero_image) ?? '' }}" alt>
        </div>
        <div class="logo_image_holder">
            <img src="{{asset("frontend")}}/images/about/badge1.png" alt>
            <img src="{{asset("frontend")}}/images/about/badge2.png" alt>
            <img src="{{asset("frontend")}}/images/about/badge3.png" alt>
        </div>
        <div class="content_inner">
            <h1>{{ $about->slug ?? ''}}</h1>
        </div>
    </div>
</div>

<div class="experience">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="group_image_holder type_1">
                    <div class="expe_box">
                        <div class="expe_box_inner">
                            <h1>{{ $about->experience_year ?? '' }}</h1>
                            Years of Experience
                        </div>
                    </div>
                    <img src="{{ asset($about->about_image) ?? '' }}" alt>
                    <div class="object">
                        <img src="{{asset("frontend")}}/images/about/3.png" alt="About">
                        <img src="{{asset("frontend")}}/images/about/3.png" alt="About">
                        <img src="{{asset("frontend")}}/images/about/3.png" alt="About">
                        <img src="{{asset("frontend")}}/images/about/s1.png" alt="About" data-aos="fade-down" data-aos-duration="3000">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="experience_content about">
                    <div class="section_header">
                        <h6 class="section_sub_title">ABOUT
                            {{ $app_settings->app_name ?? '' }} CONSTRUCTION</h6>
                        <h1 class="section_title">{{ $about->title ?? '' }}</h1>
                        <p class="section_desc">{{ $about->description ?? '' }}</p>
                        <div class="about_below">
                            <div class="about_below_content">
                                <img src="{{asset("frontend")}}/images/about/t1.png" alt>
                                <div class="about_below_content_text">
                                    <h5>Our Mission</h5>
                                    <p>{{ $about->our_mission ?? '' }}</p>
                                </div>
                            </div>
                            <div class="about_below_content">
                                <img src="{{asset("frontend")}}/images/about/t2.png" alt>
                                <div class="about_below_content_text">
                                    <h5>Our Vision</h5>
                                    <p>{{ $about->our_vision ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <a class="button" href="{{ route('frontend.about') }}">Learn More</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div id="funfacts" class="funfacts2 section">
    <div class="funfacts3_bg_img">
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="funfacts3_bg">
                        <div class="funbox2">
                            <div class="fun_img">
                                <img src="{{asset("frontend")}}/images/funfact/p5.png" alt="icon">
                            </div>
                            <div class="fun_content">
                                <h1><span class="fun-number">33</span><span class="fun-suffix">+</span></h1>
                                <p>Under Construction</p>
                            </div>
                        </div>
                        <div class="funbox2">
                            <div class="fun_img">
                                <img src="{{asset("frontend")}}/images/funfact/p6.png" alt="icon">
                            </div>
                            <div class="fun_content">
                                <h1><span class="fun-number">{{ $about->our_builders ?? '' }}</span><span class="fun-suffix">+</span></h1>
                                <p>Expert Builders</p>
                            </div>
                        </div>
                        <div class="funbox2">
                            <div class="fun_img">
                                <img src="{{asset("frontend")}}/images/funfact/p7.png" alt="icon">
                            </div>
                            <div class="fun_content">
                                <h1><span class="fun-number">300</span><span class="fun-suffix">+</span></h1>
                                <p>Projects Handover</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="team pd_btom_110">
    <div class="container">
        <div class="section_header text-center">
            <div class="shadow_icon"><img src="{{asset("frontend")}}/images/shadow_icon5.png" alt></div>
            <h6 class="section_sub_title">OUR TEAM MEMBERS</h6>
            <h1 class="section_title">Meet Our Amazing Team</h1>
            <p class="section_desc">Builderrine is the best
                constructioncompany. It has best team who are
                provideing best service possible.</p>
        </div>
        <div class="row">
            <div class="col">
                <div class="owl_team owl-carousel owl-theme">
                    <div class="item">
                        <div class="team_construction">
                            <figure class="team_construction_inner">
                                <a href="team.html">
                                    <img src="{{asset("frontend")}}/images/team/6.png" alt="Oscar Holland" loading="lazy">
                                </a>
                                <div class="team-box__info">
                                    <a href="https://wpthemebooster.com/team" class="name h5">Oscar
                                        Holland</a>
                                    <p class="position">CEO</p>
                                </div>
                            </figure>
                            <div class="team_hover_content">
                                <ul class="speakers-social-lists-simple">
                                    <li>
                                        <a href="https://www.facebook.com/" class="fa fa-facebook-square"></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                </ul>
                                <h2 class="speaker-title-simple">
                                    <a href="team.html">Oscar
                                        Holland</a>
                                </h2>
                                <p>CEO</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team_construction">
                            <figure class="team_construction_inner">
                                <a href="team.html">
                                    <img src="{{asset("frontend")}}/images/team/7.png" alt="Oscar Holland" loading="lazy">
                                </a>
                                <div class="team-box__info">
                                    <a href="https://wpthemebooster.com/team" class="name h5">Christpher
                                        Neel</a>
                                    <p class="position">Constructor</p>
                                </div>
                            </figure>
                            <div class="team_hover_content">
                                <ul class="speakers-social-lists-simple">
                                    <li>
                                        <a href="https://www.facebook.com/" class="fa fa-facebook-square"></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                </ul>
                                <h2 class="speaker-title-simple">
                                    <a href="team.html">Christpher
                                        Neel</a>
                                </h2>
                                <p>Constructor</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team_construction">
                            <figure class="team_construction_inner">
                                <a href="team.html">
                                    <img src="{{asset("frontend")}}/images/team/8.png" alt="Kiara Nordstorm" loading="lazy">
                                </a>
                                <div class="team-box__info">
                                    <a href="https://wpthemebooster.com/team" class="name h5">Kiara
                                        Nordstorm</a>
                                    <p class="position">Constructor</p>
                                </div>
                            </figure>
                            <div class="team_hover_content">
                                <ul class="speakers-social-lists-simple">
                                    <li>
                                        <a href="https://www.facebook.com/" class="fa fa-facebook-square"></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                </ul>
                                <h2 class="speaker-title-simple">
                                    <a href="team.html">Kiara
                                        Nordstorm</a>
                                </h2>
                                <p>Constructor</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team_construction">
                            <figure class="team_construction_inner">
                                <a href="team.html">
                                    <img src="{{asset("frontend")}}/images/team/8.png" alt="Oscar Holland" loading="lazy">
                                </a>
                                <div class="team-box__info">
                                    <a href="https://wpthemebooster.com/team" class="name h5">Oscar
                                        Holland</a>
                                    <p class="position">CEO</p>
                                </div>
                            </figure>
                            <div class="team_hover_content">
                                <ul class="speakers-social-lists-simple">
                                    <li>
                                        <a href="https://www.facebook.com/" class="fa fa-facebook-square"></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/" class="fa fa-linkedin"></a>
                                    </li>
                                </ul>
                                <h2 class="speaker-title-simple">
                                    <a href="team.html">Oscar
                                        Holland</a>
                                </h2>
                                <p>CEO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner type_3">
    <div class="container">
        <div class="banner_content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="banner_text">
                        <img src="{{asset("frontend")}}/images/phone3.png" alt>
                        <h1>{{ $app_settings->app_name ?? '' }} is proud to serve you 24/7. Just Call Us when you need</h1>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner_phone">
                        <h4>Call Us Anytime</h4>
                        <span>{{ $app_settings->phone_1 ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="testimonial pd_btom_110">
    <div class="container">
        <div class="section_header text-center">
            <div class="shadow_icon"><img src="{{asset("frontend")}}/images/shadow_icon3.png" alt></div>
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
                                        <img src="{{asset("frontend")}}/images/reviewer1.png" alt>
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
                                        <img src="{{asset("frontend")}}/images/reviewer4.png" alt>
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
                                        <img src="{{asset("frontend")}}/images/reviewer3.png" alt>
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
                                        <img src="{{asset("frontend")}}/images/reviewer1.png" alt>
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
                                        <img src="{{asset("frontend")}}/images/reviewer1.png" alt>
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

<div class="patner_2 pd_btom_110 pd_tp_110">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="patner_flex">
                    <div class="patner_2">
                        <img src="{{asset("frontend")}}/images/patner/1.png" alt>
                    </div>
                    <div class="patner_2">
                        <img src="{{asset("frontend")}}/images/patner/2.png" alt>
                    </div>
                    <div class="patner_2">
                        <img src="{{asset("frontend")}}/images/patner/3.png" alt>
                    </div>
                    <div class="patner_2">
                        <img src="{{asset("frontend")}}/images/patner/4.png" alt>
                    </div>
                    <div class="patner_2">
                        <img src="{{asset("frontend")}}/images/patner/5.png" alt>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset("frontend")}}/js/funfacts.js"></script>
@endsection
