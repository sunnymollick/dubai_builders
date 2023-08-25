<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.includes.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('backend.includes.spinner')
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('backend.includes.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('backend.includes.nav')
            <!-- Navbar End -->

            @yield('content')

            <!-- Footer Start -->
            @include('backend.includes.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('backend.includes.scripts')
    @yield('scripts')
</body>

</html>
