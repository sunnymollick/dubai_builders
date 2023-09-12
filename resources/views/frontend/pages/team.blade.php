@extends('frontend.layouts.defaults')
@section('title')
Our Team
@endsection
@section('page_header')
<!-- Page Header -->
<div class="page_header">
    <div class="page_header_content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Our Team</li>
            </ul>
            <h2 class="heading">Our Team</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="section team">
    <div class="container">
        <div class="row">
            @foreach($teams as $team)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="team_construction">
                    <figure class="team_construction_inner">
                        <a data-toggle="modal" data-target="#exampleModalCenter">
                            <img src="{{asset($team->image)}}" alt="{{$team->name}}" loading="lazy">
                        </a>
                        <div class="team-box__info">
                            <a href="https://wpthemebooster.com/team" class="name h5">{{$team->name}}</a>
                            <p class="position">{{$team->designation}}</p>
                        </div>
                    </figure>
                    <div class="team_hover_content">
                        <ul class="speakers-social-lists-simple">
                            <li>
                                <a href="{{$team->fb_link}}" class="fa fa-facebook-square"></a>
                            </li>
                            <li>
                                <a href="{{$team->x_link}}" class="fa fa-twitter"></a>
                            </li>
                            <li>
                                <a href="{{$team->linkedin_link}}" class="fa fa-linkedin"></a>
                            </li>
                            <li>
                        </ul>
                        <h2 class="speaker-title-simple">
                            <a class="show_team_details" style="color: var(--second-color);" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#UserDetailsModal" data-name="{{ $team->first_name }}" data-designation="{{ $team->designation }}" data-email="{{ $team->email }}" data-phone="{{ $team->phone }}" data-image="{{ $team->image }}" data-fb_link="{{ $team->fb_link }}" data-x_link="{{ $team->x_link }}" data-linkedin_link="{{ $team->linkedin_link }}" data-description="{{ $team->description }}">{{$team->name}}</a>
                        </h2>
                        <p>{{$team->designation}}</p>
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

<div class="modal fade" id="UserDetailsModal" tabindex="-1" aria-labelledby="UserDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UserDetailsModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color: red;"><strong>Name: </strong><span class="name"></span></p>
                <p><strong>Designation: </strong><span class="designation"></span></p>
                <p><strong>Phone: </strong><span class="phone"></span></p>
                <p><strong>Email: </strong><span class="email"></span></p>
                <!-- <p><strong>Country: </strong><span class="country"></span></p>
                                    <p><strong>State: </strong><span class="state"></span></p>
                                    <p><strong>City: </strong><span class="city"></span></p> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(document).on('click', '.show_team_details', function(e) {
        let name = $(this).data('name');
        let designation = $(this).data('designation');
        let phone = $(this).data('phone');
        let email = $(this).data('email');
        let image = $(this).data('image');
        let fb_link = $(this).data('fb_link');
        let description = $(this).data('description');
        let x_link = $(this).data('x_link');
        let linkedin_link = $(this).data('linkedin_link');

        console.log(designation);
        $('.name').text(name);
        $('.designation').text(designation);
        $('.phone').text(phone);
        $('.email').text(email);
        $('.image').text(country);
        $('.x_link').text(x_link);
        $('.linkedin_link').text(linkedin_link);
        $('.fb_link').text(fb_link);
        $('.description').text(description);
    });
</script>


@endsection