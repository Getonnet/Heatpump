<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>@yield('title', 'Admin') - Heat Pump</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">-->
    <link rel="stylesheet" href="{{asset('assets/css/fonts.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{asset('assets/vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">

    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/argon.min.css')}}?v=1.2.0" type="text/css">

    <link rel="stylesheet" href="{{asset('css/admin.css')}}" type="text/css">

    @yield('style')
</head>
<body>

<!-- Sidenav -->
@include('include.admin.sidenav')
<!-- /Sidenav -->

<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    @include('include.admin.topnav')
    <!-- /Topnav -->
    <!-- Header -->
    @include('include.admin.header')
    <!-- /Header -->
    <!-- Page content -->
    <div class="container-fluid mt--6">

        <!-- Main Content-->
        @yield('content')
       <!-- /Main Content-->

        <!-- Modal/Popup-->
        <div class="row">
            <div class="col">@yield('box')</div>
        </div>
        <!-- /Modal/Popup-->

        <!-- Footer -->
        @include('include.admin.footer')
        <!-- /Footer -->
    </div>
    <!-- /Page content -->
</div>
<!-- /Main content -->



<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('assets/js/argon.min.js')}}?v=1.2.0"></script>
<script src="{{asset('js/admin.js')}}"></script>
<!-- Notification Area -->
@include('include.admin.notify')
<!-- Custom JS -->
@yield('script')
</body>

</html>