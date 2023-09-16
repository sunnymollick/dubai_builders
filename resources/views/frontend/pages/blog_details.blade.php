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
            <h2 class="heading">Use of modern Technology in Road constructio</h2>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="blog_details">
        <div class="post_img">
            <img src="{{ asset('frontend') }}/images/blog/3.png" alt="blog">
            <div class="calendar">
                <a href="#"><span class="date">30</span><br>May</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 pe-4">
                <div class="blog_details_inner">
                    <div class="post_content">
                        <div class="post_header">
                            <div class="categ"><a href="about.html">CONSTRUCTION</a></div>
                            <h3 class="post_title">Use of modern Technology in Road construction</h3>
                        </div>
                        <div class="fulltext">
                            <p>
                                construction site means an area upon which one or more land disturbing construction activities occur, including areas that are part of a larger common plan of development or sale where multiple separate and distinct land disturbing construction activities may be taking place at different times on
                            </p>

                            <p class="highlight">Over the last 35 Years we made an impact that is strong and we have long
                                way to go. Excepteur sint occaecat.</p>
                            <p>

                            <p>
                                As the world continues to fight COVID-19 some property owners are searching for way they can
                                improve the security of their buildings whilst decreasing the spread of germs and bacteria. The
                                following 3 hygienic security solutions are suitable for use within high traffic areas across both
                                residential and commercial buildings.
                            </p>

                            <h4 class="widget_title">
                                Technological Advantage
                                <span class="title_line"></span>
                            </h4>
                            <p>The following problems may arise withe house key duplication -</p>
                            <ul class="point_order">
                                <li>As the world continues to fight COVID-19 some property owners</li>
                                <li>improve the security of their buildings whilst decreasing the spread</li>
                                <li>following 3 hygienic security solutions are suitable for use within</li>
                            </ul>

                            <div class="post_gallery">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="anim_box" data-aos="overlay-right">
                                            <img src="{{ asset('frontend') }}/images/blog/g1.png" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="anim_box" data-aos="overlay-right">
                                            <img class="sm-margin-bottom" src="{{ asset('frontend') }}/images/blog/g2.png" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p>
                                Burglars prefer to work in the cover of dark. By setting up lighting around your garage can aid in
                                keeping burglars at bay. Install a sensor light to turn on as you enter the driveway and approach
                                the garage. Not only will it prove a burglar deterrent it will also assist you with seeing better to
                                come home late.
                            </p>
                            <p>
                                As the world continues to fight COVID-19 some property owners are searching for way they can
                                improve the security of their buildings whilst decreasing the spread of germs and bacteria. The
                                following 3 hygienic security solutions are suitable for use within high traffic areas across both
                                residential and commercial buildings.
                            </p>

                            <div class="video_post">
                                <div class="ytube_video">
                                    <iframe id="ytvideo" src="https://www.youtube.com/embed/fEErySYqItI" allow="autoplay;" allowfullscreen></iframe>
                                    <div class="post_content">
                                        <div class="ytplay_btn"><i class="ion-ios-play"></i></div>
                                        <img src="{{ asset('frontend') }}/images/blog/video_bg.png" alt="blog">
                                    </div>
                                </div>
                            </div>

                            <p>
                                By automating your doors this removes the need for people touching handles or surfaces. Both of
                                the above options can also be used in conjunction with controlling the access of your automatic
                                doors. For example, a touch-less sensor can be installed to control the opening of the door.
                            </p>

                            <p>
                                Automatic doors can be programmed to be activate during certain times and remain locked at a
                                others. Door openers/closer can also be automated for use in some high traffic areas.
                            </p>
                        </div>

                        <div class="post_footer">
                            <div class="post_share">
                                <ul class="share_list">
                                    <li>Share:</li>
                                    <li class="facebook"><a href="#">Facebook</a></li>
                                    <li class="twitter"><a href="#">Twitter</a></li>
                                    <li class="pinterest"><a href="#">Pinterest</a></li>
                                    <li class="instagram"><a href="#">Instagram</a></li>
                                    <li class="linkedin"><a href="#">Linkedin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="border_line"></div>

                    <div class="author_div">
                        <div class="author">
                            <img alt="img" src="{{ asset('frontend') }}/images/blog/author_sm.png" class="avatar">
                        </div>
                        <div class="author-block">
                            <h5 class="author_name">Jonathon Hall</h5>
                            <p class="author_intro">Install a sensor light to turn on as you enter the driveway and approach the garage. Not only will it prove a burglar deterrent it will also assist.</p>
                            <div class="social_media">
                                <ul class="social_list">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
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
                    <div id="search" class="widget widget_search">
                        <div class="sidebar_search">
                            <form class="search_form" action="https://wpthemebooster.com/demo/themeforest/html/builderrin/dark/search.php">
                                <input type="text" name="search" class="keyword form-control" placeholder="Search Products...">
                                <button type="submit" class="form-control-submit"><i class="ion-ios-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div id="custom_1" class="widget widget_custom">
                        <h4 class="widget_title">
                            About author
                            <span class="title_line"></span>
                        </h4>
                        <div class="sidebar_author">
                            <img src="{{ asset('frontend') }}/images/blog/author.png" alt="img">
                            <p class="intro">Sed ut perspiciatis unde omnis iste natus err or sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt</p>
                            <div class="author_social">
                                <ul>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="recent-posts-1" class="widget widget_recent_posts">
                        <h4 class="widget_title">
                            Recent Posts
                            <span class="title_line"></span>
                        </h4>
                        <div class="sidebar_recent_posts">
                            <ul class="recent_post_list">
                                <li class="recent_post_item">
                                    <div class="recent_post_image">
                                        <img class="primary_img" src="{{ asset('frontend') }}/images/blog/thumbnail1.png" alt="">
                                    </div>
                                    <div class="recent_post_content">
                                        <h5><a href="blog-1.html">History Creating Highrise Designs Ever</a></h5>
                                        <h6>09 April 2020</h6>
                                    </div>
                                </li>
                                <li class="recent_post_item">
                                    <div class="recent_post_image">
                                        <img class="primary_img" src="{{ asset('frontend') }}/images/blog/thumbnail2.png" alt="">
                                    </div>
                                    <div class="recent_post_content">
                                        <h5><a href="blog-2.html">Do's & Don'ts in Lock opening</a></h5>
                                        <h6>06 April 2020</h6>
                                    </div>
                                </li>
                                <li class="recent_post_item">
                                    <div class="recent_post_image">
                                        <img class="primary_img" src="{{ asset('frontend') }}/images/blog/thumbnail3.png" alt="">
                                    </div>
                                    <div class="recent_post_content">
                                        <h5><a href="blog-1.html">Locksmith cost Estimation</a></h5>
                                        <h6>02 April 2020</h6>
                                    </div>
                                </li>
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
