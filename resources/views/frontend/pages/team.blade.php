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
                    <li><a href="{{ url('/') }}">Home</a></li>
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
                @foreach ($teams as $team)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="team_construction">
                            <figure class="team_construction_inner">
                                <a data-toggle="modal" data-target="#exampleModalCenter">
                                    <img class="team_image" src="{{ asset($team->image) }}" alt="{{ $team->name }}"
                                        loading="lazy">
                                </a>
                                <div class="team-box__info">
                                    <a href="https://wpthemebooster.com/team" class="name h5">{{ $team->name }}</a>
                                    <p class="position">{{ $team->designation }}</p>
                                </div>
                            </figure>
                            <div class="team_hover_content">
                                <ul class="speakers-social-lists-simple">
                                    <li>
                                        <a href="{{ $team->fb_link }}" class="fa fa-facebook-square"></a>
                                    </li>
                                    <li>
                                        <a href="{{ $team->x_link }}" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="{{ $team->linkedin_link }}" class="fa fa-linkedin"></a>
                                    </li>
                                    <li>
                                </ul>
                                <h2 class="speaker-title-simple">
                                    <button type="button" value="{{ $team->id }}"
                                        class="btn btn-primary py-3 px-4 modData" id="modalView" data-toggle="modal"
                                        data-target="#exampleModalCenter" data-img="{{ $team->image }} "
                                        data-name="{{ $team->name }}" data-designation="{{ $team->designation }}"
                                        data-email="{{ $team->email }}" data-phone="{{ $team->phone }}"
                                        data-fb="{{ $team->fb_link }}" data-xlink="{{ $team->x_link }}"
                                        data-linkedin="{{ $team->linkedin_link }}"
                                        data-description="{{ $team->description }}">
                                        {{ $team->name }}
                                    </button>
                                </h2>
                                <p>{{ $team->designation }}</p>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Team Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="avatar">

                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPfO37MK81JIyR1ptwqr_vYO3w4VR-iC2wqQ&usqp=CAU"
                            alt="">
                    </div>

                    <h3 class="name">Name</h3>
                    <p class="designation">Designation</p>
                    <div class="social">
                        <ul class="social-address-list">
                            <li class="fb-link social-item"><a href=""><span class="fa fa-facebook-square"> Facebook
                                        Profile</span></a></li>
                            <li class="x-link social-item"><a href=""><span class="fa fa-twitter"> X
                                        Profile</span></a></li>
                            <li class="linkedin-link social-item"><a href=""><span class="fa fa-linkedin"> LinkedIn
                                        Profile</span></a></li>
                        </ul>
                        <ul class="contact-address-list">
                            <li class="social-item"><a href=""><span class="fa fa-phone con-phone"> Mobile</span></a></li>
                            <li class="social-item"><a href=""><span class="fa fa-envelope con-email"> Email</span></a></li>
                        </ul>
                    </div>

                </div>
                {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
            </div>
        </div>
    </div>
@endsection


<style>
    .modal-header{

        background-color: #00234b;
    }
    .modal-body{
        background-color: #002a5c;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }
    .modal-body .avatar {
        height: 150px;
        width: 150px;
        overflow-y: clip;
        overflow-x: clip;
        border-radius: 50%;
        border: 4px solid #ffa903;
        box-shadow: 0px 0px 6px rgba(0, 0, 0, 2.2);

    }

    .modal-body .avatar img {
        width: 150px;
        height: auto;
        object-fit: cover;
    }

    .modal-body .social {
        display: flex;
    }

    .modal-body .social ul {
        list-style: none;
    }

    .modal-body .social-item span {
        padding: 0 8px
    }
    .contact-address-list a{
        pointer-events: none;
    }
</style>

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.modData').click(function(e) {
                e.preventDefault();
                // console.log($(this).data('img'));return;
                // $('.modal-body img').attr('src', $(this).data('img'));
                $('.modal-body .avatar img').attr('src', $(this).data('img'));
                $('.modal-body .name').html($(this).data('name'));
                $('.modal-body .designation').html($(this).data('designation'));
                $('.modal-body .fb-link a').attr('href',$(this).data('fb'));
                $('.modal-body .x-link a').attr('href',$(this).data('xlink'));
                $('.modal-body .linkedin-link a').attr('href',$(this).data('linkedin'));
                $('.modal-body .con-phone').html(' '+$(this).data('phone'))
                $('.modal-body .con-email').html(' '+$(this).data('email'))

                // $('.modal-body .avatar').css({'background-image':'url("'+$(this).data('img')+'")'})
            });
        });
    </script>
@endsection
