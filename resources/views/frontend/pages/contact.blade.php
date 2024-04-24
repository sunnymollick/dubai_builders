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
                <li><a href="{{ url('/') }}">Home</a></li>
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
                            <h6>{{ $app_settings->phone_1 ?? ''}}</h6>
                            <h6>{{ $app_settings->phone_2 ?? ''}}</h6>
                        </div>
                    </div>
                    <div class="communication" data-aos="fade-up" data-aos-duration="1000">
                        <div class="communication_icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="info_body">
                            <h5>Email Address</h5>
                            <h6>{{ $app_settings->email ?? ''}}</h6>
                            <h6>{{ $app_settings->email_secondary ?? '' }}</h6>
                        </div>
                    </div>
                    <div class="communication" data-aos="fade-up" data-aos-duration="1300">
                        <div class="communication_icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="info_body">
                            <h5>Office Address</h5>
                            {{-- <h6>Gr. Benjamin Street 609<br /> Florida, USA</h6> --}}
                            <h6>{{ $app_settings->address ?? '' }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 offset-lg-1">
                <div class="contact_us_1">
                    <div class="section_header" data-aos="fade-left" data-aos-duration="700">
                        <h6 class="section_sub_title">Contact Us</h6>
                        <h1 class="section_title">Want to Ask anything?<br />
                    </div>
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    <form id="create" class="contact_form" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-container">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name*" required>
                                        <span id="error_title" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address*" required>
                                        <span id="error_title" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone No" required>
                                        <span id="error_title" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                                        <span id="error_title" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea id="message" name="message" class="form-control" placeholder="Message Here*" required></textarea>
                                        <span id="error_title" class="has-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button class="btn btn-warning button-submit" type="submit">Send</button>
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
                        <span>{{ $app_settings->phone_1 ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.button-submit').click(function() {
        $('#create').validate({
            submitHandler: function(form) {
                var myData = new FormData($("#create")[0]);
                myData.append('_token', CSRF_TOKEN);
                swal({
                    title: "Are you sure to send?",
                    text: "Send Message",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Send!"
                }, function() {
                    // console.log('hi');
                    $.ajax({
                        url: '/contact/store',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data.type === 'success') {
                                $('#myModal').modal('hide');
                                swal("Thanks!", "We've received your message",
                                    "success");
                                    $("#name").val('') && $("#email").val('') && $("#phone").val('')
                                    && $("#subject").val('') && $("#message").val('');
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
<script src="{{ asset('frontend') }}/js/map.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCUiaBC-cJ0wcEtqCUtoXF3I91o9wS42gQ"></script>
@endsection