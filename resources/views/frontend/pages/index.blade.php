@extends('frontend.layouts.defaults')
@section('title')
    Home
@endsection
@section('sliders')
   
    <div class="video_slider">
        @foreach ($slider as $s)
            <video src="{{ asset(($s->video==null||$s->video=='')?'backend/uploads/videos/slider/default_slider/pexels_videos_3925 (1080p).mp4':$s->video )}}" muted autoplay loop></video>
        @endforeach
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
                                                <h4><a
                                                        href="{{ route('frontend.services.details', ['id' => $s->id]) }}">{{ $s->service_title }}</a>
                                                </h4>
                                                <a href="{{ route('frontend.services.details', ['id' => $s->id]) }}">Get
                                                    Service </a>
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
                                <h1>{{ $about->experience_year ?? '' }}</h1>
                                Years of Experience
                            </div>
                        </div>
                        <div class="image_object">
                            <img src="{{ asset($about->about_image) ?? '' }}" alt="">
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
                            <h6 class="section_sub_title">ABOUT {{ $app_settings->app_name ?? '' }} CONSTRUCTION</h6>
                            <h1 class="section_title">Building A New Era in world of Construction</h1>
                            <p class="section_desc">{{ $about->short_description ?? '' }}</p>
                            <div class="about_below">
                                <div class="about_below_content">
                                    <i class="ion ion-ios-checkmark-outline" aria-hidden="true"></i>
                                    <div class="about_below_content_text">
                                        <h5>Most Reliable</h5>
                                        <p>Many Company all over the world trusted us</p>
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
                        <a class="button" href="{{ route('frontend.about') }}">Learn More</a>
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
                        <h6 class="section_sub_title">FUNFACTS OF {{ $app_settings->app_name ?? '' }} CONSTRUCTION</h6>
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
                                        <h1><span class="fun-number">{{ $about->experience_year ?? '' }}</span></h1>
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
                                        <h1><span class="fun-number">{{ $completed_project ?? '' }}</span><span
                                                class="fun-suffix">+</span></h1>
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
                                        <h1><span class="fun-number">{{ $about->our_builders ?? '' }}</span><span
                                                class="fun-suffix">+</span></h1>
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
                                        <h1><span class="fun-number">{{ $running }}</span></h1>
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
            <div class="shadow_icon"><img src="{{ asset('frontend') }}/images/about/shadow_icon1.png" alt=""></div>
            <h6 class="section_sub_title">ABOUT BUILDERRINE CONSTRUCTION</h6>
            <h1 class="section_title">Our Most Popular Projects</h1>
        </div>
        <div class="row g-0">
            <div class="col">
                <div class="button-group filters-button-group">
                    <button class="button is-checked" data-filter=".commercial">Commercial</button>
                    <button class="button" data-filter=".highrise">Highrise</button>
                    <button class="button" data-filter=".residential">Residential</button>
                    <button class="button" data-filter=".business">Business</button>
                </div>

                <div class="grid grid-5">
                    @foreach ($highrise as $hg)
                    <div class="element-item highrise" >
                        <div class="teambox">
                            <img src="{{ asset($hg->thumbnail_image) }}" alt="">
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
                                        <h6>{{ $hg->project_location }}</h6>
                                        <h5><a href="{{route('frontend.projects.details', $hg->id)}}">{{ $hg->project_title }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($business as $bs)
                    <div class="element-item business">
                        <div class="teambox">
                            <img src="{{ asset($bs->thumbnail_image) }}" alt="">
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
                                        <h6>{{ $bs->project_location }}</h6>
                                        <h5><a href="{{route('frontend.projects.details', $bs->id)}}">{{ $bs->project_title }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($residential as $rs)
                    <div class="element-item residential">
                        <div class="teambox">
                            <img src="{{ asset($rs->thumbnail_image) }}" alt="">
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
                                        <h6>{{ $rs->project_location }}</h6>
                                        <h5><a href="{{route('frontend.projects.details', $rs->id)}}">{{ $rs->project_title }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($commercial as $cm)
                    <div class="element-item commercial">
                        <div class="teambox">
                            <img src="{{ asset($cm->thumbnail_image) }}" alt="">
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
                                        <h6>{{ $cm->project_location }}</h6>
                                        <h5><a href="{{route('frontend.projects.details', $cm->id)}}">{{ $cm->project_title }}</a></h5>
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
                            <h1>{{ $app_settings->app_name ?? '' }} is proud to serve you 24/7. Just Call Us when you need
                            </h1>
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

    <div class="testimonial pd_btom_80" id="quotation">
        <div class="container">
            <div class="section_header text-center">
                <div class="shadow_icon"><img src="{{ asset('frontend') }}/images/shadow_icon3.png" alt="">
                </div>
                <h6 class="section_sub_title">Clients Requirement</h6>
                <h1 class="section_title">Request For Quotation</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="container card-0 justify-content-center ">
                        <form id='create' action="" enctype="multipart/form-data" method="post"
                            accept-charset="utf-8" class="needs-validation" novalidate>
                            <div class="card-body px-sm-4 px-0">
                                <div class="row justify-content-center mb-5">
                                    <div class="col-md-10 col">
                                        <h3 class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left"> Request a
                                            Quote </h3>
                                        <p class="mt-md-4 ml-md-0 ml-2 text-center text-sm-left">
                                            {{ $app_settings->app_name ?? '' }} is the best construction company. It has
                                            best team who are provideing best service possible.</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center round">
                                    <div class="col-lg-10 col-md-12 ">
                                        <div class="card shadow-lg card-1">
                                            <div class="card-body inner-card">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="first-name">Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Enter your Name" required>
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Mobile-Number">Mobile Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="mobile"
                                                                name="mobile" placeholder="Enter Phone Number" required>
                                                            @error('mobile')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail4">Project Type <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control" name="project_type"
                                                                id="project_type" required>
                                                                <option value="" selected disabled>Select Project
                                                                    Type</option>
                                                                <option value="1">Commercial</option>
                                                                <option value="2">Highrise</option>
                                                                <option value="0">Residential</option>
                                                                <option value="3">Business</option>
                                                            </select>
                                                            @error('project_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="time">Maximum time for the project</label>
                                                            <input type="text" class="form-control" id="project_time"
                                                                name="project_time" placeholder="Enter Project Time">
                                                            @error('project_time')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="phone">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" placeholder="Enter Email" required>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last-name">Location <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="location"
                                                                name="location" placeholder="Enter Location" required>
                                                            @error('location')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Evaluate Budget">Evaluate Budget</label>
                                                            <input type="text" class="form-control"
                                                                id="evaluate_budget" name="evaluate_budget"
                                                                placeholder="Enter your evaluate budget">
                                                            @error('evaluate_budget')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Company-Name">Company Name</label>
                                                            <input type="text" class="form-control" id="company_name"
                                                                name="company_name" placeholder="Enter Company Name">
                                                            @error('company_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 col-lg-10 col-12">
                                                        <div class="form-group files">
                                                            <label class="my-auto">Upload Your File </label>
                                                            <input id="file" type="file" name="file" class="form-control" />
                                                            @error('file')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 col-lg-10 col-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea2">Message <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea class="form-control rounded-0" id="message" name="message" rows="5" required></textarea>
                                                            @error('message')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2 mt-4">
                                                            <div class="text-right">
                                                                <button type="submit" class="button button-submit"><small
                                                                        class="font-weight-bold">Request a
                                                                        Quote</small></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                            <p class="section_desc">{{ $app_settings->app_name }} is the best construction company. It has
                                best team who are provideing best service possible.</p>
                        </div>
                        <div class="read_more read_all">
                            <a class="button" href="{{ url('blogs') }}">Learn More</a>
                        </div>
                    </div>
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <article class="blog_post">
                                <div class="post_img">
                                    <a href="{{ url('blog-details/' . $blog->id) }}"><img
                                            src="{{ asset($blog->thumbnail_image) }}" alt="img"></a>
                                    <div class="calendar">
                                        <?php
                                        // Convert the timestamp string to a DateTime object
                                        $timestamp_obj = new DateTime($blog->created_at);
                                        // Extract the month and day
                                        $month = $timestamp_obj->format('F'); // Full month name
                                        $day = $timestamp_obj->format('j');
                                        ?>
                                        <a href="#"><span
                                                class="date">{{ $day }}</span><br>{{ $month }}</a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <div class="post_header">
                                        <h3 class="post_title">
                                            <a href="{{ url('blog-details/' . $blog->id) }}">{{ $blog->blog_title }}</a>
                                        </h3>
                                    </div>
                                    <div class="post_intro">
                                        <p>{{ Str::limit($blog->blog_description, 100) }}</p>
                                    </div>
                                    <div class="post_footer">
                                        <div class="read_more">
                                            <a href="{{ url('blog-details/' . $blog->id) }}"><span>Read Article</span></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
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
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@endsection
@section('scripts')
    <script>
        $('.button-submit').click(function() {
            $('#create').validate({
                submitHandler: function(form) {
                    var myData = new FormData($("#create")[0]);
                    myData.append('_token', CSRF_TOKEN);
                    swal({
                        title: "Are you sure to submit?",
                        text: "Submit Form",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, Submit!"
                    }, function() {
                        // console.log('hi');
                        $.ajax({
                            url: '/storeQuotationRequest',
                            type: 'POST',
                            data: myData,
                            dataType: 'json',
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                if (data.type === 'success') {
                                    $('#myModal').modal('hide');
                                    swal("Thanks!", "We have received your request.",
                                        "success");
                                    $("#name").val('') && $("#email").val('') && $("#mobile").val('')
                                    && $("#location").val('') && $("#project_type").val('') && $("#evaluate_budget").val('')
                                    && $("#project_time").val('') && $("#company_name").val('') && $("#file").val('') && $("#message").val('');
                                } else if (data.type === 'error') {
                                    if (data.errors) {
                                        $.each(data.errors, function(key, val) {
                                            $('#error_' + key).html(val);
                                        });
                                    }
                                    $("#status").html(data.message);
                                    swal("Error sending!", "Please fix the errors",
                                        "error");
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>
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
    <style>
        body {
            background-color: #eee
        }

        .card-0 {
            min-height: 110vh;
            background: linear-gradient(-20deg, rgb(255, 255, 255) 50%, #00326F 50%);
            color: white;
            border: 0px
        }

        p {
            font-size: 15px;
            line-height: 25px !important;
            font-weight: 500
        }

        .container {
            border-radius: 20px
        }

        .btn {
            letter-spacing: 1px
        }

        select:active {
            box-shadow: none !important;
            outline-width: 0 !important
        }

        select:after {
            box-shadow: none !important;
            outline-width: 0 !important
        }

        input,
        textarea {
            padding: 10px 12px 10px 12px;
            border: 1px solid lightgrey;
            border-radius: 0px !important;
            margin-bottom: 5px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px;
            resize: none
        }

        select:focus,
        input:focus {
            box-shadow: none !important;
            border: 1px solid #00326F !important;
            outline-width: 0 !important;
            font-weight: 400
        }

        label {
            margin-bottom: 2px;
            font-weight: bolder;
            font-size: 14px
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00326F;
            outline-width: 0
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        .form-control {
            height: calc(2em + .75rem + 3px)
        }

        .inner-card {
            margin: 79px 0px 70px 0px
        }

        .card-1 {
            border-radius: 17px;
            color: black;
            box-shadow: 2px 4px 15px 0px rgb(0, 0, 0, 0.5) !important
        }

        #file {
            border: 2px dashed #92b0b3 !important
        }

        .color input {
            background-color: #f1f1f1
        }

        .files:before {
            position: absolute;
            bottom: 60px;
            left: 0;
            width: 100%;
            content: attr(data-before);
            color: #000;
            font-size: 12px;
            font-weight: 600;
            text-align: center
        }

        #file {
            display: inline-block;
            width: 100%;
            padding: 95px 0 0 100%;
            background: url('frontend/images/upload_logo.png') top center no-repeat #fff;
            background-size: 55px 55px
        }
    </style>
@endsection
