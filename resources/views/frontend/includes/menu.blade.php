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
                <div class="mainnav">
                    <ul class="main_menu" style="padding-right: 0px;">
                        <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
                            <a style="padding: 25px 5px 25px 0px;" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('frontend.services') ? 'active' : '' }}">
                            <a style="padding: 25px 5px 25px 0px;" href="{{ route('frontend.services') }}">Services</a>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->is('projects*') ? 'active' : '' }}">
                            <a href="#">Projects</a>
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->routeIs('frontend.completed.projects') ? 'active' : '' }}">
                                    <a href="{{ route('frontend.completed.projects') }}">Completed Projects</a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('frontend.running.projects') ? 'active' : '' }}">
                                    <a href="{{ route('frontend.running.projects') }}">Ongoing Projects</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item {{ request()->routeIs('frontend.team') ? 'active' : '' }}">
                            <a style="padding: 25px 5px 25px 0px;" href="{{ route('frontend.team') }}">Team</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('frontend.contact') ? 'active' : '' }}">
                            <a style="padding: 25px 5px 25px 0px;" href="{{ route('frontend.contact') }}">Contact</a>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->is('more*') ? 'active' : '' }}">
                            <a href="#">More</a>
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->routeIs('frontend.about') ? 'active' : '' }}">
                                    <a href="{{ route('frontend.about') }}">About</a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('frontend.careers') ? 'active' : '' }}">
                                    <a href="{{ route('frontend.careers') }}">Career</a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('frontend.blogs') ? 'active' : '' }}">
                                    <a href="{{ route('frontend.blogs') }}">Blog</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Rest of your HTML -->
            </div>

        </div>
    </div>
</div>
