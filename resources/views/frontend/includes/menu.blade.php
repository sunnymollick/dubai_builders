@php
    $app_settings = DB::table('settings')->where('id',1)->first();
@endphp
<div class="middle_bar">
    <div class="container">
        <div class="middle_bar_inner">
            <div class="logo">
                <a href="index.html" class="light_mode_logo"><img src="{{ asset('frontend') }}/images/logo.svg" alt="logo"></a>
                <a href="{{ url('/') }}" class="dark_mode_logo"><img src="{{ asset($app_settings->app_logo) ?? '' }}" alt="logo"></a>
            </div>

            <div class="header_right_part">
                <div  class="mainnav">
                    <ul class="main_menu" style="padding-right: 0px;">
                        <li class="menu-item active"><a style="  padding: 25px 5px 25px 0px;" href="{{ url('/') }}">Home</a>
                            <!-- {{-- <ul class="sub-menu">
                                <li class="menu-item active"><a href="index.html">Home One</a></li>
                                <li class="menu-item"><a href="index-2.html">Home Two</a></li>
                            </ul> --}} -->
                        </li>
                        <li class="menu-item"><a style="  padding: 25px 5px 25px 0px;" href="{{route('frontend.services')}}">Services</a>
                            <!-- <ul class="sub-menu" >
                                <li style="padding-right: 50px;" class="menu-item"><a href="{{route('frontend.services')}}">Service</a></li>
                                <li class="menu-item"><a href="services-2.html">Service Two</a></li>
                                <li class="menu-item"><a href="service-details.html">Service Details</a></li>
                            </ul> -->
                        </li>
                        <li class="menu-item menu-item-has-children"><a href="#">Projects</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="{{ route('frontend.completed.projects') }}">Completed Projects</a></li>
                                <li class="menu-item"><a href="{{ route('frontend.running.projects') }}">Ongoing Projects</a></li>
                            </ul>
                        </li>
                                <li class="menu-item"><a style="  padding: 25px 5px 25px 0px;" href="{{ route('frontend.team') }}">Team</a></li>
                        <li class="menu-item"><a style="  padding: 25px 5px 25px 0px;" href="{{ route('frontend.contact') }}">Contact</a></li>

                        <li class="menu-item menu-item-has-children"><a href="#">More</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="{{ route('frontend.about') }}">About</a></li>
                                <li class="menu-item"><a href="">Career</a></li>
                                <li class="menu-item"><a href="{{ route('frontend.blogs') }}">Blog</a></li>
                            </ul>
                        </li>
                                {{-- <li class="menu-item"><a style="  padding: 25px 5px 25px 0px;" href="{{ route('frontend.about') }}">About</a></li> --}}

                        <!-- <li class="menu-item menu-item-has-children"><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="{{ route('frontend.about') }}">About</a></li>
                                <li class="menu-item"><a href="{{ route('frontend.team') }}">Team</a></li>
                                <li class="menu-item"><a href="faq.html">FAQ</a></li>
                                <li class="menu-item menu-item-has-children"><a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="shop-1.html">Shop One</a></li>
                                        <li class="menu-item"><a href="shop-2.html">Shop Two</a></li>
                                        <li class="menu-item"><a href="shop-3.html">Shop Three</a></li>
                                        <li class="menu-item"><a href="shop-4.html">Shop Four</a></li>
                                        <li class="menu-item"><a href="product.html">Product Details</a></li>
                                        <li class="menu-item"><a href="cart.html">Cart</a></li>
                                        <li class="menu-item"><a href="checkout.html">Checkout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        <!-- {{-- <li class="menu-item menu-item-has-children"><a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="blog-1.html">Blog One</a></li>
                                <li class="menu-item"><a href="blog-2.html">Blog Two</a></li>
                                <li class="menu-item"><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> --}} -->

                    </ul>
                </div>
                <div class="phone">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <div><span>Call Us Anytime</span><br><span class="phn_number">
                        {{ $app_settings->phone_1 ?? '' }}</span></div>
                </div>
                <div class="header_search">
                    <button type="submit" class="form-control-submit"><i class="ion-ios-search"></i></button>
                </div>
                <div class="open_search">
                    <form class="search_form" action="https://wpthemebooster.com/demo/themeforest/html/builderrin/dark/search.php">
                        <input type="text" name="search" class="keyword form-control" placeholder="Search..." />
                        <button type="submit" class="form-control-submit"><i class="ion-ios-search"></i></button>
                    </form>
                </div>
                <button class="ma5menu__toggle" type="button">
                    <i class="ion-android-menu"></i>
                </button>
            </div>
        </div>
    </div>
</div>
