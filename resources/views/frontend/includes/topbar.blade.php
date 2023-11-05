<div class="top_bar">
    @php
        $app_settings = DB::table('settings')->where('id',1)->first();
    @endphp
    <div class="container">
        <div class="top_bar_inner">
            <div class="header_social">
                <h6>Follow Us</h6>
                <ul class="top_social">
                    <li class="facebook"><a href="{{ $app_settings->fb_link ?? ''}}"><i class="ion-social-facebook"></i></a></li>
                    <li class="twitter"><a href="{{ $app_settings->twitter_link ?? ''}}"><i class="ion-social-twitter"></i></a></li>
                    <li class="dribbble"><a href="{{ $app_settings->dribble_link ?? ''}}"><i class="ion-social-dribbble-outline"></i></a></li>
                    <li class="instagram"><a href="{{ $app_settings->instragram_link ?? ''}}"><i class="ion-social-instagram-outline"></i></a>
                    </li>
                    <li class="linkedin"><a href="{{ $app_settings->linkedin_link ?? ''}}"><i class="ion-social-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="header_info">
                <div class="schedule">
                    <div class="hide_icon d-md-none" data-text="Monday - Friday (9.00am - 9.00pm)"> <span><i
                                class="fa fa-clock-o"></i></span></div>
                    <div class="d-none d-md-block"><span><i class="fa fa-clock-o"></i></span>
                        <strong>{{ $app_settings->opening_time ?? '' }}</strong>
                    </div>
                </div>
                <div class="schedule">
                    <div class="hide_icon d-md-none" data-text="builderrine@gmail.com"> <span><i
                                class="fa fa-envelope"></i></span></div>
                    <div class="d-none d-md-block"><span><i class="fa fa-envelope"></i></span>
                        {{ $app_settings->email ?? '' }}</div>
                </div>
                <div class="free_contact">
                    <a href="#quotation" class="btn">Request Free Quote</a>
                </div>
            </div>
        </div>
    </div>
</div>
