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
                            <button type="button" value="{{$team->id}}" class="btn btn-primary py-3 px-4" id="modalView" data-toggle="modal" data-target="#exampleModalCenter">
                                {{$team->name}}
                            </button>
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


@endsection


@section('scripts')
<script>
    $(document).ready(function() {

        $('#modalView').click(function(e) {
            e.preventDefault();
            var idType = $('#modalView').val();
            // $.ajax({
            //     url: "{{url('frontend/team/fetch-team-details')}}",
            //     type: "POST",
            //     data: {
            //         type_id: idType,
            //         _token: '{{csrf_token()}}'
            //     },
            //     dataType: 'json',
            //     success: function(result) {
            //         $('#designation-id').html('<option disabled selected>Select Designation</option>');
            //         $.each(result.designations, function(key, value) {
            //             $("#designation-id").append('<option value="' + value
            //                 .id + '">' + value.title + '</option>');
            //         });

            //         // console.log(result.designations)
            //     }
            // });
            alert($(this).attr("value"));
        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/

    });
</script>


@endsection