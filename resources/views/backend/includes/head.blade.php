    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('backend')}}/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{asset('backend')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('backend')}}/css/pace.min.css" rel="stylesheet" />
    <script src="{{asset('backend')}}/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('backend')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('backend')}}/css/app.css" rel="stylesheet">
    <link href="{{asset('backend')}}/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/css/dark-theme.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/semi-dark.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/header-colors.css" />
    <link rel="stylesheet" href="{{asset('backend/assets/css/custom_style.css')}}">
    <title> @yield('title') | Dubai Builders</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>
