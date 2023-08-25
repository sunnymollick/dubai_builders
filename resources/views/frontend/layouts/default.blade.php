<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/builderrin/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 18:40:16 GMT -->

<head>
    @include('frontend.includes.head')
</head>

<body class="dark-theme">
    <!--PreLoader-->
    <div id="preloader" class="loader_show">
        <div class="hide-loader">Hide Preloader</div>
        <div class="loader-wrap">
            <div class="loader">
                <div class="loader-inner"></div>
            </div>
        </div>
    </div>
    <!--PreLoader Ends-->



    <!-- Header 1 -->

    <header class="header">
        @include('frontend.includes.top_bar')

        @include('frontend.includes.menu')
    </header>

    <div class="main_wrapper">


        @yield('content')


        <!-- Footer 1 -->
        <footer class="footer">
            @include('frontend.includes.footer')
        </footer>
        <div class="slide_navi">
            <div class="side_footer_social">
                <ul class="bottom_social">
                    <li class="facebook"><a href="#"><i class="ion-social-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li class="dribbble"><a href="#"><i class="ion-social-dribbble-outline"></i></a>
                    </li>
                    <li class="instagram"><a href="#"><i class="ion-social-instagram-outline"></i></a>
                    </li>
                    <li class="linkedin"><a href="#"><i class="ion-social-linkedin-outline"></i></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>


    @include('frontend.includes.scripts')
    @yield('scripts')

</body>

<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/builderrin/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 18:40:45 GMT -->

</html>
