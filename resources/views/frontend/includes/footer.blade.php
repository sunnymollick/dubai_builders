@php
    $app_settings = DB::table('settings')->where('id',1)->first();
@endphp
<footer class="footer">
    <div class="footer_above">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer_widget footer_widget_padding">
                        <h4 class="widget_title">
                            About {{ $app_settings->app_name }}
                        </h4>
                        <p>Who are looking for Extraordinary projects need vision & precision to be exceptional. They need Builderrine Construction Services.</p>
                        <div class="subscribe">
                            <form class="form-inline">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <button type="submit" class="btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer_widget footer_links">
                        <h4 class="widget_title">
                            Our Services
                        </h4>
                        <div class="footer_nav">
                            <ul class="footer_menu">
                                <li class="menu-item"><a href="project.html">Web Design</a></li>
                                <li class="menu-item"><a href="project-2.html">Construction</a></li>
                                <li class="menu-item"><a href="project-details.html">Economics</a></li>
                                <li class="menu-item"><a href="project-2.html">Photography</a></li>
                                <li class="menu-item"><a href="project.html">Digital Marketing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer_widget footer_links">
                        <h4 class="widget_title">
                            Useful Links
                        </h4>
                        <div class="footer_nav">
                            <ul class="footer_menu">
                                <li class="menu-item"><a href="about.html">About Us</a></li>
                                <li class="menu-item"><a href="blog-details.html">Courses</a></li>
                                <li class="menu-item"><a href="project-details.html">Enrollment</a></li>
                                <li class="menu-item"><a href="service-details.html">Be an Instructor</a></li>
                                <li class="menu-item"><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">
                            Address
                        </h4>
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{ $app_settings->address }}</span></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><span>{{ $app_settings->email }}</span></li>
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i><span>{{ $app_settings->opening_time }}</span></li>
                        </ul>
                        <div class="side_footer_social">
                            <ul class="bottom_social">
                                <li class="facebook"><a href="{{ $app_settings->fb_link }}"><i class="ion-social-facebook"></i></a></li>
                                <li class="twitter"><a href="{{ $app_settings->twitter_link }}"><i class="ion-social-twitter"></i></a></li>
                                <li class="dribbble"><a href="{{ $app_settings->dribble_link }}"><i class="ion-social-dribbble-outline"></i></a></li>
                                <li class="instagram"><a href="{{ $app_settings->instragram_link }}"><i class="ion-social-instagram-outline"></i></a></li>
                                <li class="linkedin"><a href="{{ $app_settings->linkedin_link }}"><i class="ion-social-linkedin-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="footer_bottom_inner">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('frontend') }}/images/logo_foot.svg" alt="Logo"></a>
                </div>
                <div class="copyright">
                    <p>{{ $app_settings->footer_text }}</p>
                </div>
                <div class="footer_nav_bottom">
                    <ul>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="totop">
                    <a href="#"><i class="ion-ios-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="slide_navi">
    <div class="side_footer_social">
        <ul class="bottom_social">
            <li class="facebook"><a href="{{ $app_settings->fb_link }}"><i class="ion-social-facebook"></i></a></li>
            <li class="twitter"><a href="{{ $app_settings->twitter_link }}"><i class="ion-social-twitter"></i></a></li>
            <li class="dribbble"><a href="{{ $app_settings->dribble_link }}"><i class="ion-social-dribbble-outline"></i></a></li>
            <li class="instagram"><a href="{{ $app_settings->instragram_link }}"><i class="ion-social-instagram-outline"></i></a></li>
            <li class="linkedin"><a href="{{ $app_settings->linkedin_link }}"><i class="ion-social-linkedin-outline"></i></a></li>
        </ul>
    </div>
</div>
