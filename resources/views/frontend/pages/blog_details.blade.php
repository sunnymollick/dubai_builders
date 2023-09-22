@extends('frontend.layouts.defaults')
@section('title')
Blog Details
@endsection
@section('page_header')
<!-- Page Header -->
<div class="page_header">
    <div class="page_header_content">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('frontend.blogs') }}">Blog</a></li>
                <li class="active">Blog Details</li>
            </ul>
            <h2 class="heading">{{ $blog->blog_title }}</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="blog_details">
        <?php
            // Convert the timestamp string to a DateTime object
            $timestamp_obj = new DateTime($blog->created_at);
            // Extract the month and day
            $month = $timestamp_obj->format("F");  // Full month name
            $day = $timestamp_obj->format("j");
        ?>
        <div class="post_img">
            <img src="{{ asset($blog->hero_image) }}" alt="blog">
            <div class="calendar">
                <a href="#"><span class="date">{{ $day }}</span><br> {{ $month }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 pe-4">
                <div class="blog_details_inner">
                    <div class="post_content">
                        <div class="post_header">
                            <div class="categ"><a href="about.html">CONSTRUCTION</a></div>
                            <h3 class="post_title">{{ $blog->blog_title }}</h3>
                        </div>
                        <div class="fulltext">

                            <div class="post_gallery">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="anim_box" data-aos="overlay-right">
                                            <img src="{{ asset($blog->image_1) }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="anim_box" data-aos="overlay-right">
                                            <img class="sm-margin-bottom" src="{{ asset($blog->image_2) }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p>
                                {{ $blog->blog_description }}
                            </p>

                            <div class="video_post">
                                <div class="ytube_video">
                                    <iframe id="ytvideo" src="{{ asset($blog->youtube_video_link) }}" allow="autoplay;" allowfullscreen></iframe>
                                    <div class="post_content">
                                        <div class="ytplay_btn"><i class="ion-ios-play"></i></div>
                                        <img src="{{ asset('frontend') }}/images/blog/video_bg.png" alt="blog">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post_footer">
                            <div class="post_share">
                                <ul class="share_list">
                                    <li>Share:</li>
                                    <li class="facebook"><a href="{{ asset($blog->author_fb) }}">Facebook</a></li>
                                    <li class="twitter"><a href="{{ asset($blog->author_twitter) }}">Twitter</a></li>
                                    <li class="pinterest"><a href="{{ asset($blog->author_pinterest) }}">Pinterest</a></li>
                                    <li class="instagram"><a href="{{ asset($blog->author_instagram) }}">Instagram</a></li>
                                    <li class="linkedin"><a href="{{ asset($blog->author_linkedin) }}">Linkedin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="border_line"></div>

                    <div class="author_div">
                        <div class="author">
                            <img alt="img" src="{{ asset($blog->author_image) }}" class="avatar">
                        </div>
                        <div class="author-block">
                            <h5 class="author_name">{{ $blog->author }}</h5>
                            <p class="author_intro">{{ $blog->author_slug }}</p>
                            <div class="social_media">
                                <ul class="social_list">
                                    <li><a href="{{ asset($blog->author_fb) }}"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="{{ asset($blog->author_twitter) }}"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="{{ asset($blog->author_instagram) }}"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="border_line"></div>

                    {{-- <div class="comment_sec">
                        <h4 class="widget_title">
                            Comments
                            <span class="title_line"></span>
                        </h4>
                        <ul class="comment_area">
                            <li class="blog_comment_user">
                                <div class="commenter_div">
                                    <div class="commenter">
                                        <img alt="img" src="{{ asset('frontend') }}/images/blog/commenter1.png" class="avatar">
                                    </div>
                                    <div class="comment_block">
                                        <h4 class="commenter_name">Patric Doe <span class="reply"><a href="#" class="reply" >Reply</a></span></h4>
                                        <p class="commenter_review">As the world continues to fight COVID-19 some are for way they can improve the security of their buildings.</p>
                                        <h6 class="comment_date">17 Apr 2020</h6>
                                    </div>
                                </div>

                                <ul class="children">
                                    <li class="blog_comment_user">
                                        <div class="commenter_div">
                                            <div class="commenter">
                                                <img alt="img" src="{{ asset('frontend') }}/images/blog/commenter2.png" class="avatar">
                                            </div>
                                            <div class="comment_block">
                                                <h4 class="commenter_name">Jelian Macardo <span class="reply"><a href="#" class="reply" >Reply</a></span></h4>
                                                <p class="commenter_review">Lorem ipsum dolor sit amet. Ut enim ad minima veniam
                                                    quis nostrum exercitationem mosequatu autem.</p>
                                                <h6 class="comment_date">17 Apr 2020</h6>
                                            </div>
                                        </div>
                                    </li><!-- #comment-## -->
                                </ul><!-- .children -->
                            </li><!-- #comment-## -->
                            <li class="blog_comment_user">
                                <div class="commenter_div">
                                    <div class="commenter">
                                        <img alt="img" src="{{ asset('frontend') }}/images/blog/commenter1.png" class="avatar">
                                    </div>
                                    <div class="comment_block">
                                        <h4 class="commenter_name">Patric Doe <span class="reply"><a href="#" class="reply" >Reply</a></span></h4>
                                        <p class="commenter_review">Lorem dolor sit amet. Ut enim ad minima veniam
                                            quis exercitationem mosequatu autem.</p>
                                        <h6 class="comment_date">17 Apr 2020</h6>
                                    </div>
                                </div>
                            </li><!-- #comment-## -->
                        </ul>
                        <div class="comments-pagination">
                            <a class="page-numbers" href="#">1</a>
                            <span aria-current="page" class="page-numbers current">2</span>
                        </div>
                    </div> --}}

                    {{-- <div class="makeacomment">
                        <h4 class="widget_title">
                            Make a comment
                            <span class="title_line"></span>
                        </h4>
                        <form class="contact_form" action="https://wpthemebooster.com/demo/themeforest/html/builderrin/dark/register.php" method="post">
                            <p class="comment-notes">Your email address will not be published. Required fields are marked *</p>
                            <div class="form-container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Name*" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="E-mail*" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Your Comment Here*" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input class="button" type="submit" value="Submit" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="sidebar">
                    {{-- <div id="search" class="widget widget_search">
                        <div class="sidebar_search">
                            <form class="search_form" action="https://wpthemebooster.com/demo/themeforest/html/builderrin/dark/search.php">
                                <input type="text" name="search" class="keyword form-control" placeholder="Search Products...">
                                <button type="submit" class="form-control-submit"><i class="ion-ios-search"></i></button>
                            </form>
                        </div>
                    </div> --}}

                    <div id="custom_1" class="widget widget_custom">
                        <h4 class="widget_title">
                            About author
                            <span class="title_line"></span>
                        </h4>
                        <div class="sidebar_author">
                            <img src="{{ asset($blog->author_image) }}" alt="img">
                            <p class="intro">Sed ut perspiciatis unde omnis iste natus err or sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt</p>
                            <div class="author_social">
                                <ul>
                                    <li><a href="{{ asset($blog->author_fb) }}"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="{{ asset($blog->author_twitter) }}"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="{{ asset($blog->author_pinterest) }}"><i class="ion-social-pinterest-outline"></i></a></li>
                                    <li><a href="{{ asset($blog->author_instagram) }}"><i class="ion-social-instagram-outline"></i></a></li>
                                    <li><a href="{{ asset($blog->author_linkedin) }}"><i class="ion-social-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                        $blogs = DB::table('blogs')->where('is_publish',1)->orderby('id','desc')->limit(3)->get();
                    ?>

                    <div id="recent-posts-1" class="widget widget_recent_posts">
                        <h4 class="widget_title">
                            Recent Posts
                            <span class="title_line"></span>
                        </h4>
                        <div class="sidebar_recent_posts">
                            <ul class="recent_post_list">
                                @foreach ($blogs as $blog)
                                <?php
                                    // Convert the timestamp string to a DateTime object
                                    $timestamp_obj = new DateTime($blog->created_at);
                                    // Extract the month and day
                                    $year = $timestamp_obj->format("Y");
                                    $month = $timestamp_obj->format("F");  // Full month name
                                    $day = $timestamp_obj->format("j");
                                    $result = "$day $month $year";
                                ?>
                                <li class="recent_post_item">
                                    <div class="recent_post_image">
                                        <img class="primary_img" src="{{ asset($blog->thumbnail_image) }}" alt="">
                                    </div>
                                    <div class="recent_post_content">
                                        <h5><a href="{{ url('blog-details/'.$blog->id) }}">{{ $blog->blog_title }}</a></h5>
                                        <h6>{{ $result }}</h6>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- <div id="categories-1" class="widget widget_categories">
                        <h4 class="widget_title">
                            Categories
                            <span class="title_line"></span>
                        </h4>
                        <div class="sidebar_categories">
                            <ul class="category_list">
                                <li class="active"><a href="project.html">Construction</a> (5)</li>
                                <li><a href="project-2.html">Highrise</a> (7)</li>
                                <li><a href="project-2.html">Technology</a> (4)</li>
                                <li><a href="project.html">Structure</a> (2)</li>
                                <li><a href="project-2.html">Accessorries</a> (4)</li>
                            </ul>
                        </div>
                    </div>

                    <div id="tags-1" class="widget widget_tag_cloud">
                        <h4 class="widget_title">
                            Tag Cloud
                            <span class="title_line"></span>
                        </h4>
                        <div class="sidebar_tags">
                            <ul class="tag_list">
                                <li><a href="about.html">Builder</a></li>
                                <li><a href="services.html">Construction</a></li>
                                <li><a href="services-2.html">Trendy</a></li>
                                <li><a href="project.html">Tees</a></li>
                                <li><a href="project-2.html">Highrise</a></li>
                                <li><a href="project-details.html">Technology</a></li>
                                <li><a href="service-details.html">Runway</a></li>
                                <li><a href="about.html">Manpower</a></li>
                                <li><a href="blog-details.html">Property</a></li>
                            </ul>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
