<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/builderrin/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 18:40:16 GMT -->
<head>
    @include('frontend.includes.head')
</head>

<body class="dark-theme">

		<!--PreLoader-->
		@include('frontend.includes.pre_loader')
		<!--PreLoader Ends-->



		<!-- Header 1 -->
		<header class="header">

			@include('frontend.includes.topbar')
            @include('frontend.includes.menu')

		</header>

        @yield('page_header')

		<div class="main_wrapper">
            @yield('sliders')

            @yield('content')



		<!-- Footer 1 -->
			@include('frontend.includes.footer')

		</div>


        @include('frontend.includes.scripts')
        @yield('scripts')
	</body>

<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/builderrin/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 18:40:45 GMT -->
</html>
