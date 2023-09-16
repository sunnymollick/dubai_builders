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
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/b6.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">Diversity in Building Celebrated by Builderrine</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>Builderrine will connect with 10000 people from 90 companies who work on its’ projects each day..</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/b7.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">Company Receives Recognition for Excellence</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>The construction industry has the capacity to absorb more people into the workforce...</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/b8.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">Our firm is built to tackle projects like these</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>We offer construction service to industrial, commercial, reside ntial & automotive...</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/bg-4.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">Completes Work on Two Projects in Georgia</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>The construction industry has the capacity to absorb more people into the workforce...</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/bg-3.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">Action to maintain a safe work environment
                                    </a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>The construction industry has the capacity to absorb more people into the workforce...</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/bg-5.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">History Creating Highrise Designs Ever</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>The construction industry has the capacity to absorb more people into the workforce...</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/bg-7.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">Contribution of Men as workers</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>The construction industry has the capacity to absorb more people into the workforce...</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/bg-6.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">Use of modern Technology in Road construction</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>The construction industry has the capacity to absorb more people into the workforce...</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="blog_post">
                        <div class="post_img">
                            <a href="blog-1.html"><img src="{{ asset('frontend') }}/images/blog/bg-8.png" alt="img"></a>
                            <div class="calendar">
                                <a href="#"><span class="date">30</span><br>May</a>
                            </div>
                        </div>
                        <div class="post_content">
                            <div class="post_header">
                                <h3 class="post_title">
                                    <a href="blog-details.html">Contribution of women as Builders</a>
                                </h3>
                            </div>
                            <div class="post_intro">
                                <p>The construction industry has the capacity to absorb more people into the workforce...</p>
                            </div>
                            <div class="post_footer">
                                <div class="read_more">
                                    <a href="blog-details.html"><span>Read Article</span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
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
</div>
@endsection
@section('scripts')

@endsection
