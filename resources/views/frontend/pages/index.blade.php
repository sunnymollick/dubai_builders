@extends('frontend.layouts.defaults')
@section('title')
    Home
@endsection
@section('sliders')
    <div class="theme_slider_1">
        <div class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slide_content">
                            <h5 class="sub_heading" data-aos="fade-up" data-aos-duration="1000">CALL US ANYTIME<span> +99
                                    (1234) 56 789</span></h5>
                            <h2 class="heading" data-aos="fade-up" data-aos-duration="1500">Where You Find Best Builders</h2>
                            <p class="desc" data-aos="fade-up" data-aos-duration="2000">Safe, Reliable and Cost Effective
                                Construction company. We offer best construction Services.</p>
                            <div class="slider_button" data-aos="fade-right" data-aos-duration="2500">
                                <a href="about.html" class="button">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex align-items-end" data-aos="fade-left" data-aos-duration="2500">
                        <div class="layer_object">
                            <img src="{{ asset('frontend') }}/images/slider/layer_2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    {{-- <div class="service">
        <div class="container-fluid g-0">
            <div class="row g-0">
                @foreach ($services as $s)
                    <div class="col-lg-4 col-md-4">
                        <div class="service_inner service_inner2 bg_3">
                            <div class="service_content d-flex align-self-center">
                                <div class="icon_img">
                                    <img src="{{ asset($s->logo) }}" alt="">
                                </div>
                                <div class="services_content_flex_cenrer">
                                    <h4><a href="services.html">{{ $s->service_title }}</a></h4>
                                    <a href="service-details.html">Get Service <i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="main_img" data-aos="fade-up" data-aos-duration="3000">
                                <img src="{{ asset('frontend') }}/images/services/sbg3.png" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="team service">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="owl_team owl-carousel owl-theme">
                        
                @foreach ($services as $s)
                        <div class="item">
                            <div class="team_construction">
                                    <div class="service_inner service_inner2 bg_3">
                                        <div class="service_content d-flex align-self-center">
                                            <div class="icon_img">
                                                <img src="{{ asset($s->logo) }}" alt="">
                                            </div>
                                            <div class="services_content_flex_cenrer">
                                                <h4><a href="services.html">{{ $s->service_title }}</a></h4>
                                                <a href="service-details.html">Get Service </a>
                                            </div>
                                        </div>
                                        <div class="main_img" data-aos="fade-up" data-aos-duration="3000">
                                            <img src="{{ asset($s->home_image) }}" alt="">
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

    <div class="experience section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="group_image_holder type_1">
                        <div class="expe_box">
                            <div class="expe_box_inner">
                                <h1>35</h1>
                                Years of Experience
                            </div>
                        </div>
                        <div class="image_object">
                            <img src="{{ asset('frontend') }}/images/about/1.png" alt="">
                            <div class="object">
                                <img src="{{ asset('frontend') }}/images/about/3.png" alt="About">
                                <img src="{{ asset('frontend') }}/images/about/3.png" alt="About">
                                <img src="{{ asset('frontend') }}/images/about/3.png" alt="About">
                                <img src="{{ asset('frontend') }}/images/about/s1.png" alt="About" data-aos="fade-down"
                                    data-aos-duration="3000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="experience_content">
                        <div class="section_header">
                            <div class="shadow_icon"><img src="{{ asset('frontend') }}/images/about/shadow_icon1.png"
                                    alt=""></div>
                            <h6 class="section_sub_title">ABOUT BUILDERRINE CONSTRUCTION</h6>
                            <h1 class="section_title">Building A New Era in world of Construction</h1>
                            <p class="section_desc">Builderrine is the safe, reliable and cost effective construction
                                company. We offer best construction Services. We have more than 35 years of experience in
                                the field of building & construction. If you want to build any highrise or housing projects,
                                you are in the best palce right now</p>
                            <div class="about_below">
                                <div class="about_below_content">
                                    <i class="ion ion-ios-checkmark-outline" aria-hidden="true"></i>
                                    <div class="about_below_content_text">
                                        <h5>Most Reliable</h5>
                                        <p>More than 200 Company trusted us</p>
                                    </div>
                                </div>
                                <div class="about_below_content">
                                    <i class="ion ion-ios-checkmark-outline" aria-hidden="true"></i>
                                    <div class="about_below_content_text">
                                        <h5>Cost Effective</h5>
                                        <p>Builderrine is famous for its cost effectiveness</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="button" href="about.html">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="funfacts" class="funfacts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section_header">
                        <h6 class="section_sub_title">FUNFACTS OF BUILDERRINE CONSTRUCTION</h6>
                        <h1 class="section_title">Our Fact Speaks about the result of our Effort</h1>
                    </div>
                    <div class="fun_bottom">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="funbox1">
                                    <div class="fun_img">
                                        <img src="{{ asset('frontend') }}/images/funfact/p1.png" alt="icon">
                                    </div>
                                    <div class="fun_content">
                                        <h1><span class="fun-number">33</span></h1>
                                        <p>Years of Experience</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="funbox1">
                                    <div class="fun_img">
                                        <img src="{{ asset('frontend') }}/images/funfact/p2.png" alt="icon">
                                    </div>
                                    <div class="fun_content">
                                        <h1><span class="fun-number">100</span><span class="fun-suffix">+</span></h1>
                                        <p>Projects Completed</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="funbox1">
                                    <div class="fun_img">
                                        <img src="{{ asset('frontend') }}/images/funfact/p3.png" alt="icon">
                                    </div>
                                    <div class="fun_content">
                                        <h1><span class="fun-number">300</span><span class="fun-suffix">+</span></h1>
                                        <p>Expert Builders</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="funbox1">
                                    <div class="fun_img">
                                        <img src="{{ asset('frontend') }}/images/funfact/p4.png" alt="icon">
                                    </div>
                                    <div class="fun_content">
                                        <h1><span class="fun-number">36</span></h1>
                                        <p>Ongoing Project</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="man_img" data-aos="fade-left" data-aos-duration="3000">
                        <img src="{{ asset('frontend') }}/images/funfact/img_fun.png" alt="icon">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section project_iso project_iso1">
        <div class="container-fluid g-0">
            <div class="section_header text-center">
                <div class="shadow_icon"><img src="{{ asset('frontend') }}/images/about/shadow_icon1.png"
                        alt=""></div>
                <h6 class="section_sub_title">ABOUT BUILDERRINE CONSTRUCTION</h6>
                <h1 class="section_title">Our Most Popular Projects</h1>
            </div>
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
                        <!-- @foreach ($all as $a)
    <div class="element-item all" id="tab-content-1">
                                <div class="teambox">
                                    <img src="{{ asset($a->thumbnail_image) }}" alt="">
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
                                                <h6>{{ $a->project_location }}</h6>
                                                <h5><a href="project-details.html">{{ $a->project_title }}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    @endforeach -->
                        @foreach ($highrise as $hg)
                            <div class="element-item highrise" id="tab-content-2">
                                <div class="teambox">
                                    <img src="{{ asset($hg->thumbnail_image) }}" alt="">
                                    <div class="teambox_inner">
                                        <div class="team_social">
                                            <div class="share"><i class="ion-android-share-alt"></i></div>
                                            <ul>
                                                <li class="facebook"><a href="#"><i
                                                            class="ion-social-facebook"></i></a></li>
                                                <li class="twitter"><a href="#"><i
                                                            class="ion-social-twitter"></i></a></li>
                                                <li class="instagram"><a href="#"><i
                                                            class="ion-social-instagram-outline"></i></a></li>
                                                <li class="linkedin"><a href="#"><i
                                                            class="ion-social-linkedin-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="teambox_intro">
                                            <div class="team_flex">
                                                <h6>{{ $hg->project_location }}</h6>
                                                <h5><a href="project-details.html">{{ $hg->project_title }}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($business as $bs)
                            <div class="element-item business" id="tab-content-3">
                                <div class="teambox">
                                    <img src="{{ asset($bs->thumbnail_image) }}" alt="">
                                    <div class="teambox_inner">
                                        <div class="team_social">
                                            <div class="share"><i class="ion-android-share-alt"></i></div>
                                            <ul>
                                                <li class="facebook"><a href="#"><i
                                                            class="ion-social-facebook"></i></a></li>
                                                <li class="twitter"><a href="#"><i
                                                            class="ion-social-twitter"></i></a></li>
                                                <li class="instagram"><a href="#"><i
                                                            class="ion-social-instagram-outline"></i></a></li>
                                                <li class="linkedin"><a href="#"><i
                                                            class="ion-social-linkedin-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="teambox_intro">
                                            <div class="team_flex">
                                                <h6>{{ $bs->project_location }}</h6>
                                                <h5><a href="project-details.html">{{ $bs->project_title }}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($residential as $rs)
                            <div class="element-item residential" id="tab-content-4">
                                <div class="teambox">
                                    <img src="{{ asset($rs->thumbnail_image) }}" alt="">
                                    <div class="teambox_inner">
                                        <div class="team_social">
                                            <div class="share"><i class="ion-android-share-alt"></i></div>
                                            <ul>
                                                <li class="facebook"><a href="#"><i
                                                            class="ion-social-facebook"></i></a></li>
                                                <li class="twitter"><a href="#"><i
                                                            class="ion-social-twitter"></i></a></li>
                                                <li class="instagram"><a href="#"><i
                                                            class="ion-social-instagram-outline"></i></a></li>
                                                <li class="linkedin"><a href="#"><i
                                                            class="ion-social-linkedin-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="teambox_intro">
                                            <div class="team_flex">
                                                <h6>{{ $rs->project_location }}</h6>
                                                <h5><a href="project-details.html">{{ $rs->project_title }}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($commercial as $cm)
                            <div class="element-item commercial" id="tab-content-5">
                                <div class="teambox">
                                    <img src="{{ asset($cm->thumbnail_image) }}" alt="">
                                    <div class="teambox_inner">
                                        <div class="team_social">
                                            <div class="share"><i class="ion-android-share-alt"></i></div>
                                            <ul>
                                                <li class="facebook"><a href="#"><i
                                                            class="ion-social-facebook"></i></a></li>
                                                <li class="twitter"><a href="#"><i
                                                            class="ion-social-twitter"></i></a></li>
                                                <li class="instagram"><a href="#"><i
                                                            class="ion-social-instagram-outline"></i></a></li>
                                                <li class="linkedin"><a href="#"><i
                                                            class="ion-social-linkedin-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="teambox_intro">
                                            <div class="team_flex">
                                                <h6>{{ $cm->project_location }}</h6>
                                                <h5><a href="project-details.html">{{ $cm->project_title }}</a></h5>
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

    <div class="banner type_3">
        <div class="container">
            <div class="banner_content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="banner_text">
                            <img src="{{ asset('frontend') }}/images/phone3.png" alt="">
                            <h1>{{ $app_settings->app_name }} is proud to serve you 24/7. Just Call Us when you need</h1>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="banner_phone">
                            <h4>Call Us Anytime</h4>
                            <span>{{ $app_settings->phone_1 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial pd_btom_80">
        <div class="container">
            <div class="section_header text-center">
                <div class="shadow_icon"><img src="{{ asset('frontend') }}/images/shadow_icon3.png" alt="">
                </div>
                <h6 class="section_sub_title">Clients testimonial</h6>
                <h1 class="section_title">What our clients say about us</h1>
                <p class="section_desc">Builderrine is the best construction company. It has best team who are provideing
                    best service possible.</p>
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
                                        <p>“Builderrine Construction provides us amazing serives. The have designed and
                                            build our Miami grand Hotel project. They have exceeded our expectation and did
                                            such an amazing job. We are very happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend') }}/images/reviewer1.png" alt="">
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
                                        <p>“Builderrine Construction provides us nice serives. The have designed and build
                                            our NY Pent House project. They have exceeded our expectation and did such an
                                            amazing job. We are very happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend') }}/images/reviewer4.png" alt="">
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
                                        <p>“Builderrine Construction provides us nice serives. The have designed and build
                                            our Utah Shopping Mall project. They have exceeded our expectation and did such
                                            an amazing job. We are very happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend') }}/images/reviewer3.png" alt="">
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
                                        <p>Builderrine Construction provides us nice serives. The have designed and build
                                            our NY Pent House project. They have exceeded our expectation and did such an
                                            amazing job. We are very happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend') }}/images/reviewer1.png" alt="">
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
                                        <p>Builderrine Construction provides us nice serives. The have designed and build
                                            our NY Pent House project. They have exceeded our expectation and did such an
                                            amazing job. We are very happy with their work”</p>
                                    </div>
                                    <div class="testi-top">
                                        <div class="testi-img">
                                            <img src="{{ asset('frontend') }}/images/reviewer1.png" alt="">
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

    <div class="blog section">
        <div class="container">
            <div class="blog_grid">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="section_header text-left">
                            <h6 class="section_sub_title">Latest News</h6>
                            <h1 class="section_title">Our Latest News</h1>
                            <p class="section_desc">Builderrine is the best construction company. It has best team who are
                                provideing best service possible.</p>
                        </div>
                        <div class="read_more read_all">
                            <a class="button" href="blog-1.html">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <article class="blog_post">
                            <div class="post_img">
                                <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/b6.png"
                                        alt="img"></a>
                                <div class="calendar">
                                    <a href="#"><span class="date">30</span><br>May</a>
                                </div>
                            </div>
                            <div class="post_content">
                                <div class="post_header">
                                    <h3 class="post_title">
                                        <a href="blog-2.html">Diversity in Building Celebrated by Builderrine</a>
                                    </h3>
                                </div>
                                <div class="post_intro">
                                    <p>Builderrine will connect with 10000 people from 90 companies who work on its’
                                        projects each day...</p>
                                </div>
                                <div class="post_footer">
                                    <div class="read_more">
                                        <a href="blog-details.html"><span>Read Article</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <article class="blog_post">
                            <div class="post_img">
                                <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/b7.png"
                                        alt="img"></a>
                                <div class="calendar">
                                    <a href="#"><span class="date">30</span><br>May</a>
                                </div>
                            </div>
                            <div class="post_content">
                                <div class="post_header">
                                    <h3 class="post_title">
                                        <a href="blog-1.html">Company Receives Recognition for Excellence</a>
                                    </h3>
                                </div>
                                <div class="post_intro">
                                    <p>The construction industry has the capacity to absorb more people into the
                                        workforce...</p>
                                </div>
                                <div class="post_footer">
                                    <div class="read_more">
                                        <a href="blog-details.html"><span>Read Article</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="patner">
        <div class="patner_image">
            <img src="{{ asset('frontend') }}/images/patner/new_patner/1.png" alt="">
        </div>
        <div class="patner_image">
            <img src="{{ asset('frontend') }}/images/patner/new_patner/2.png" alt="">
        </div>
        <div class="patner_image">
            <img src="{{ asset('frontend') }}/images/patner/new_patner/3.png" alt="">
        </div>
        <div class="patner_image">
            <img src="{{ asset('frontend') }}/images/patner/new_patner/4.png" alt="">
        </div>
        <div class="patner_image">
            <img src="{{ asset('frontend') }}/images/patner/new_patner/5.png" alt="">
        </div>
        <div class="patner_image">
            <img src="{{ asset('frontend') }}/images/patner/new_patner/6.png" alt="">
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
@endsection
@section('scripts')
    <script src="{{ asset('frontend/') }}/js/funfacts.js"></script>
    <!-- <script>
        const buttons = document.querySelectorAll('.button');
        const contentElements = document.querySelectorAll('.element-item');

        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                // Hide all content elements
                contentElements.forEach((element) => {
                    element.style.display = 'none';
                });

                // Show the clicked tab's content
                contentElements[index].style.display = 'block';
            });
        });
    </script> -->
@endsection
