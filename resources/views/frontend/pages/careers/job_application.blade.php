@extends('frontend.layouts.defaults')
@section('title')
    Career Details
@endsection
@section('page_header')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Career Details</li>
                </ul>
                <h2 class="heading">Job Application</h2>
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
                        {{-- <div class="post_img">
                            <img src="{{ asset($job_app->poster) }}" alt="blog">
                        </div> --}}
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">Post: {{ $job_app->job_title ?? 'Job Title' }}</h3>
                            </div>
                            <div class="fulltext">
                                <div class="job">
                                    <div class="job-detail">
                                        <div class="job-header">
                                            <ul>
                                                <li><span>Vacancy: </span>{{ $job_app->no_of_vacancy }}</li>
                                                <li><span>Salary: </span>Tk. {{ $job_app->salary }}</li>
                                                <li><span>Job Location: </span>{{ $job_app->job_location }}</li>
                                                <li><span>Deadline: </span>{{ $job_app->deadline }}</li>
                                                <li><span>Experience: </span>{{ $job_app->experience }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">Job Description</h3>
                            </div>
                            <div class="fulltext">
                                <div class="job">
                                    <div class="job-detail">
                                        <div class="job-header">
                                            {!! $job_app->job_description ?? 'N/A' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">Employement Status</h3>
                            </div>
                            <div class="fulltext">
                                <div class="job">
                                    <div class="job-detail">
                                        <div class="job-header">
                                            <span class="job_type">{{ $job_app->job_type ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">Educational Requirement</h3>
                            </div>
                            <div class="fulltext">
                                <div class="job">
                                    <div class="job-detail">
                                        <div class="job-header">
                                            {!! $job_app->educational_requirement ?? 'N/A' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">Experience Requirement</h3>
                            </div>
                            <div class="fulltext">
                                <div class="job">
                                    <div class="job-detail">
                                        <div class="job-header">
                                            {!! $job_app->experience_requirement ?? 'N/A' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">Additional Requirement</h3>
                            </div>
                            <div class="fulltext">
                                <div class="job">
                                    <div class="job-detail">
                                        <div class="job-header">
                                            {!! $job_app->additional_requirement ?? 'N/A' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">Compensation & Other Benefits</h3>
                            </div>
                            <div class="fulltext">
                                <div class="job">
                                    <div class="job-detail">
                                        <div class="job-header">
                                            {!! $job_app->compensations ?? 'N/A' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="container card-0 justify-content-center ">
                                        <form id='create' action="" enctype="multipart/form-data" method="post"
                                            accept-charset="utf-8" class="needs-validation" novalidate>
                                            <div class="card-body px-sm-4 px-0">
                                                <div class="row justify-content-center mb-5">
                                                    <div class="col-md-10 col">
                                                        <h3
                                                            class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left">
                                                            Apply For The Job </h3>
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
                                                                            <input type="text" class="form-control"
                                                                                id="name" name="name"
                                                                                placeholder="Enter your Name" required>
                                                                            @error('name')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Mobile-Number">Mobile Number <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                id="mobile" name="mobile"
                                                                                placeholder="Enter Phone Number" required>
                                                                            @error('name')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="phone">Email <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="email" class="form-control"
                                                                                id="email" name="email"
                                                                                placeholder="Enter Email" required>
                                                                            @error('email')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="last-name">Location <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                id="location" name="location"
                                                                                placeholder="Enter Location" required>
                                                                            @error('location')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-md-12 col-lg-10 col-12">
                                                                        <div class="form-group files">
                                                                            <label class="my-auto">Upload Your CV
                                                                            </label>
                                                                            <input id="file" type="file"
                                                                                class="form-control" />
                                                                            @error('file')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-md-12 col-lg-10 col-12">
                                                                        <div class="mb-2 mt-4">
                                                                            <div class="text-right">
                                                                                <button type="submit"
                                                                                    class="button button-submit"><small
                                                                                        class="font-weight-bold">Apply
                                                                                        Now</small></button>
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

                </div>

            </div>
        </div>
    </div>

    <style>
        .section {
            padding-top: 10px;
        }

        .post_title {
            font-weight: 800 !important;
            font-size: 1.17em !important;
        }

        .job_type {
            text-transform: capitalize;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@endsection


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
                        url: '/',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data.type === 'success') {
                                $('#myModal').modal('hide');
                                swal("Done!", "It was succesfully done!",
                                    "success");
                                reload_table();
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
