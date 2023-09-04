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

                                        <h4 class="widget_title">
                                            Project Features
                                            <span class="title_line"></span>
                                        </h4>
                                        <p class="margin_o_para">{{$details->project_features}}</p>

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

                                        <p>
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
                                        </p>

                                        <h4 class="widget_title">
                                            Service Steps
                                            <span class="title_line"></span>
                                        </h4>
                                        <p>
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
                                        </p>
                                        <div class="accordion"
                                            data-aos="fade-up">
                                            <div class="item active">
                                                <div class="accordion_tab">
                                                    <h2 class="accordion_title">Floor
                                                        Plan Descriptions</h2>
                                                    <span
                                                        class="accordion_tab_icon">
                                                        <i
                                                            class="open_icon ion-ios-arrow-down"></i>
                                                        <i
                                                            class="close_icon ion-ios-arrow-up"></i>
                                                    </span>
                                                </div>
                                                <div class="accordion_info">
                                                    Nemo enim ipsam voluptatem
                                                    quia voluptas sit aspernatur
                                                    odit aut fugit, sed magni
                                                    dolore squi ratione
                                                    voluptatem sequi nesciunt.
                                                    Neque porro quisquam qui
                                                    dolorem ipsum quia dolor sit
                                                    amet, consecteturadipisci
                                                    velit options can also be
                                                    used in conjunction with
                                                    controlling the access.
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="accordion_tab">
                                                    <h2 class="accordion_title">Construction
                                                        Technology Used</h2>
                                                    <span
                                                        class="accordion_tab_icon">
                                                        <i
                                                            class="open_icon ion-ios-arrow-down"></i>
                                                        <i
                                                            class="close_icon ion-ios-arrow-up"></i>
                                                    </span>
                                                </div>
                                                <div class="accordion_info">
                                                    Aenean massa cum sociis
                                                    natoque penatibus et magnis
                                                    dis parturient montes
                                                    nascetur ridiculus mus.
                                                    Donec quam felis ultricies
                                                    pellentesque eu, pretium
                                                    quis sem. Nulla consequat
                                                    massa quis enim. Donec pede
                                                    justo, fringilla vel aliquet
                                                    nec vulputate eget. In enim
                                                    justo rhoncus ut imperdiet
                                                    venenatis vitae justo.
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="accordion_tab">
                                                    <h2 class="accordion_title">Thoughts
                                                        Behind the projects</h2>
                                                    <span
                                                        class="accordion_tab_icon">
                                                        <i
                                                            class="open_icon ion-ios-arrow-down"></i>
                                                        <i
                                                            class="close_icon ion-ios-arrow-up"></i>
                                                    </span>
                                                </div>
                                                <div class="accordion_info">
                                                    Aenean massa cum sociis
                                                    natoque penatibus et magnis
                                                    dis parturient montes
                                                    nascetur ridiculus mus.
                                                    Donec quam felis ultricies
                                                    pellentesque eu, pretium
                                                    quis sem. Nulla consequat
                                                    massa quis enim. Donec pede
                                                    justo, fringilla vel aliquet
                                                    nec vulputate eget. In enim
                                                    justo rhoncus ut imperdiet
                                                    venenatis vitae justo.
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="accordion_tab">
                                                    <h2 class="accordion_title">Construction
                                                        Technology Used</h2>
                                                    <span
                                                        class="accordion_tab_icon">
                                                        <i
                                                            class="open_icon ion-ios-arrow-down"></i>
                                                        <i
                                                            class="close_icon ion-ios-arrow-up"></i>
                                                    </span>
                                                </div>
                                                <div class="accordion_info">
                                                    Aenean massa cum sociis
                                                    natoque penatibus et magnis
                                                    dis parturient montes
                                                    nascetur ridiculus mus.
                                                    Donec quam felis ultricies
                                                    pellentesque eu, pretium
                                                    quis sem. Nulla consequat
                                                    massa quis enim. Donec pede
                                                    justo, fringilla vel aliquet
                                                    nec vulputate eget. In enim
                                                    justo rhoncus ut imperdiet
                                                    venenatis vitae justo.
                                                </div>
                                            </div>
                                        </div>

                                        <p>
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
                                        </p>

                                        <h4 class="widget_title">
                                            Clients Testimonial
                                            <span class="title_line"></span>
                                        </h4>

                                        <div class="testibox1">
                                            <div class="testibox_inner">
                                                <div class="testi-content">
                                                    <ul>
                                                        <li class="text">Rating:</li>
                                                        <li><i
                                                                class="fa fa-star"></i></li>
                                                        <li><i
                                                                class="fa fa-star"></i></li>
                                                        <li><i
                                                                class="fa fa-star"></i></li>
                                                        <li><i
                                                                class="fa fa-star"></i></li>
                                                        <li><i
                                                                class="fa fa-star-o"></i></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit
                                                        ametadipiscing elit sed
                                                        eiusmod tempor
                                                        incididunt ut labore et
                                                        dolore magna.adipiscing
                                                        sed do eiusmod tempor
                                                        incididunt ut labore et
                                                        dolore magna. adipiscing
                                                        elit sed</p>
                                                </div>
                                                <div class="testi-top">
                                                    <div class="testi-img">
                                                        <img
                                                            src="{{asset('frontend/')}}/images/reviewer1.png"
                                                            alt>
                                                    </div>
                                                    <div class="testi-info">
                                                        <h4>Johnathon Doe</h4>
                                                        <h6>New York</h6>
                                                    </div>
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
                                            <div id="tags-1"
                                                class="widget widget_tag_cloud">
                                                <div class="sidebar_tags">
                                                    <ul class="tag_list">
                                                        <li><a href="about.html">Builder</a></li>
                                                        <li><a
                                                                href="services.html">Trendy</a></li>
                                                        <li><a
                                                                href="project.html">Tees</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner_posts">
                                            <div class="inner-post prev_post">
                                                <img src="{{asset('frontend/')}}/images/blog/p1.png"
                                                    alt="img">
                                                <div class="post_block">
                                                    <a class="link_to"
                                                        href="blog-1.html">Previous
                                                        Post</a>
                                                    <h4><a href="#">NewYork
                                                            Apertment</a></h4>
                                                </div>
                                            </div>
                                            <div class="inner-post prev_post">
                                                <img src="{{asset('frontend/')}}/images/blog/p2.png"
                                                    alt="img">
                                                <div class="post_block">
                                                    <a class="link_to"
                                                        href="blog-2.html">Next
                                                        Post</a>
                                                    <h4><a href="#">Under
                                                            Construction</a></h4>
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
                                                <h5>Problem</h5>
                                                <p>{{$details->project_problem}}</p>
                                            </div>
                                            <div class="project_info_details">
                                                <h5>Solving Time</h5>
                                                <p>{{$details->handover_time}}</p>
                                            </div>
                                            <div class="project_info_details">
                                                <h5>Client Rating</h5>
                                                <ul><li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
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