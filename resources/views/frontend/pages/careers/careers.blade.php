@extends('frontend.layouts.defaults')
@section('title')
    Career
@endsection
@section('page_header')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Career</li>
                </ul>
                <h2 class="heading">Career</h2>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <style>
        .all-job {
            box-sizing: border-box;
        }

        .job {
            background: #1A406D;
            text-align: left;
            padding: 40px;
            margin: 30px 0;
            border-radius: 20px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .job-detail {
            width: 75%;
        }

        .job-title {
            font-weight: 800;
            font-size: 34px;
            line-height: 45px;
        }

        .all-job .job .job-detail .job-header ul {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .all-job .job .job-detail .job-header ul li {
            flex-basis: calc(50% - 20px);
            margin-bottom: 8px;
            font-size: 18px !important;
        }

        .all-job .job .job-detail .job-header ul li span {
            display: inline-block;
            font-weight: bold;
            margin-right: 10px;
        }

        .all-job .job .action {
            width: 25%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .all-job .job .action a {
            display: block;
            width: 100%;
            text-align: center;
        }

        .job-title {
            color: white;
        }

        .job-header span {
            color: white;
        }
    </style>
    <div class="container">

        <div class="all-job">
            @foreach ($careers as $c)
                <div class="job">
                    <div class="job-detail">
                        <h1 class="job-title">
                            {{ $c->job_title }}
                        </h1>
                        <div class="job-header">
                            <ul>
                                <li><span>Vacancy: </span>{{ $c->no_of_vacancy }}</li>
                                <li><span>Salary: </span>Tk. {{ $c->salary }}</li>
                                <li><span>Job Location: </span>{{ $c->job_location }}</li>
                                <li><span>Deadline: </span>{{ $c->deadline }}</li>
                                <li><span>Experience: </span>{{ $c->experience }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="action">
                        <a href="{{ route('frontend.careers.details', ['id' => $c->id]) }}" class="button">Apply Now</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination-div">
            <ul class="pagination">

                @if ($careers->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                @else
                    <li><a href="{{ $careers->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif

                @for ($i = 1; $i <= $careers->lastPage(); $i++)
                    @if ($i == $careers->currentPage())
                        <li><span class="page-number current">{{ $i }}</span></li>
                    @else
                        <li><a href="{{ $careers->url($i) }}" class="page-number">{{ $i }}</a></li>
                    @endif
                @endfor

                @if ($careers->hasMorePages())
                    <li><a href="{{ $careers->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                    <li class="disabled"><span>&raquo;</span></li>
                @endif

            </ul>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('frontend') }}/js/funfacts.js"></script>
@endsection
