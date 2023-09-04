<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor5">

<head>
    @include('backend.includes.head')
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            @include('backend.includes.sidebar')
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            @include('backend.includes.header')
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            @include('backend.includes.footer')
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    @include('backend.includes.theme_customizer')
    <!--end switcher-->
    @include('backend.includes.scripts')
    @include('backend.includes.modal')
    @include('backend.includes.modal_sm')
    @include('backend.includes.datatable')
    @yield('scripts')
</body>

</html>
