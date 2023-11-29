@extends('frontend.layouts.defaults')
@section('title')
    Services
@endsection
@section('page_header')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Services</li>
                </ul>
                <h2 class="heading">Services</h2>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="section service services_inner_page">
        <div class="container">
            <div class="row">
                @foreach ($all as $a)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="service_inner_block">
                            <img src="{{ asset($a->thumbnail_image) }}" alt>
                            <div class="icon_img">
                                <img src="{{ $a->logo }}" alt>
                            </div>
                            <div class="service_content">
                                <h4>{{ $a->service_title }}</h4>
                                <p>{{ $a->slogan }}</p>
                                <a href="{{ route('frontend.services.details', ['id' => $a->id]) }}">READ MORE <i
                                        class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination-div">
                    <ul class="pagination">

                        @if ($all->onFirstPage())
                            <li class="disabled"><span>&laquo;</span></li>
                        @else
                            <li><a href="{{ $all->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                        @endif

                        @for ($i = 1; $i <= $all->lastPage(); $i++)
                            @if ($i == $all->currentPage())
                                <li><span class="page-number current">{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $all->url($i) }}" class="page-number">{{ $i }}</a></li>
                            @endif
                        @endfor

                        @if ($all->hasMorePages())
                            <li><a href="{{ $all->nextPageUrl() }}" rel="next">&raquo;</a></li>
                        @else
                            <li class="disabled"><span>&raquo;</span></li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .service_content p {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical
    }
</style>
