@extends('frontend.layouts.defaults')
@section('title')
Contact
@endsection
@section('page_header')
<!-- Page Header -->
<div class="page_header">
    <div class="page_header_content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
            <h2 class="heading">Contact Us</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="section">
    <div class="container">
        {{-- <div class="gmapbox" data-aos="zoom-in">
            <div id="googleMap" class="map"></div>
        </div> --}}

        {!! $app_settings->maps !!}
    </div>
</div>
<div class="contact_inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="keepintouch_3">
                    <div class="communication">
                        <div class="communication_icon">
                            <i class="ion-ios-telephone-outline"></i>
                        </div>
                        <div class="info_body">
                            <h5>Phone No</h5>
                            <h6>+33 987 654 321</h6>
                            <h6>+33 123 456 789</h6>
                        </div>
                    </div>
                    <div class="communication" data-aos="fade-up" data-aos-duration="1000">
                        <div class="communication_icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="info_body">
                            <h5>Email Address</h5>
                            <h6>builderrine@gmail.com</h6>
                            <h6>care@builderrine.com</h6>
                        </div>
                    </div>
                    <div class="communication" data-aos="fade-up" data-aos-duration="1300">
                        <div class="communication_icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="info_body">
                            <h5>Office Address</h5>
                            <h6>Gr. Benjamin Street 609<br /> Florida, USA</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 offset-lg-1">
                <div class="contact_us_1">
                    <div class="section_header" data-aos="fade-left" data-aos-duration="700">
                        <h6 class="section_sub_title">Contact Us</h6>
                        <h1 class="section_title">Want to Ask anything?<br />
                            Send Us a Mail Anytime</h1>
                    </div>
                    <form class="contact_form" action="https://wpthemebooster.com/demo/themeforest/html/builderrin/dark/contact.php" method="post" data-aos="fade-left" data-aos-duration="1000">
                        <div class="form-container">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name*" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email Address*" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone No">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Message Here*" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <input class="button" type="submit" value="Send Mail" name="submit">
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
<div class="banner banner_bg_color">
    <div class="container">
        <div class="banner_content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="banner_text">
                        <img src="{{ asset('frontend') }}/images/phone3.png" alt="">
                        <h1>Is Your House Secured Enough? Call Us to install Security Devices</h1>
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

@section('scripts')
<script src="{{ asset('frontend') }}/js/map.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCUiaBC-cJ0wcEtqCUtoXF3I91o9wS42gQ"></script>
@endsection