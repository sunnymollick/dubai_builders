@extends('frontend.layouts.defaults')
@section('title')
Blogs
@endsection
@section('page_header')
<div class="page_header">
    <div class="page_header_content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Blogs</li>
            </ul>
            <h2 class="heading">Blogs</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="blog section">
    <div class="container">
        <div class="blog_grid">
            <div class="row">
                @foreach ($blogs as $blog)
                <?php
                // Convert the timestamp string to a DateTime object
                $timestamp_obj = new DateTime($blog->created_at);
                // Extract the month and day
                $month = $timestamp_obj->format("F");  // Full month name
                $day = $timestamp_obj->format("j");
                ?>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="{{ url('blog-details/'.$blog->id) }}"><img src="{{ asset($blog->thumbnail_image) }}" alt="img"></a>
                            <div class="calendar">
                                <a href="{{ url('blog-details/'.$blog->id) }}"><span class="date">{{ $day }}</span><br>{{ $month }}</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">{{ $blog->title }}</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>{{ Str::limit($blog->blog_description, 100) }}</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="{{ url('blog-details/'.$blog->id) }}"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach

                <div class="pagination-div">
                    <ul class="pagination">

                        @if ($blogs->onFirstPage())
                            <li class="disabled"><span>&laquo;</span></li>
                        @else
                            <li><a href="{{ $blogs->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                        @endif

                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                            @if ($i == $blogs->currentPage())
                                <li><span class="page-number current">{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $blogs->url($i) }}" class="page-number">{{ $i }}</a></li>
                            @endif
                        @endfor

                        @if ($blogs->hasMorePages())
                            <li><a href="{{ $blogs->nextPageUrl() }}" rel="next">&raquo;</a></li>
                        @else
                            <li class="disabled"><span>&raquo;</span></li>
                        @endif

                    </ul>
                </div>




            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
