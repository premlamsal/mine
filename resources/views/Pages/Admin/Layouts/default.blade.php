<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} | @yield('PageTitle')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link href="{{ URL::asset('admin/assets/custom.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ URL::asset('img/favicon.ico') }}" rel="icon">

</head>

<body>
    <div class="container-scroller">
        @include('Pages.Admin.Layouts.Partials.LeftNav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            @include('Pages.Admin.Layouts.Partials.TopNav')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('adminContent')
                </div>
                <!-- content-wrapper ends -->
                @include('Pages.Admin.Layouts.Partials.Footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ URL::asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ URL::asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ URL::asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/settings.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ URL::asset('admin/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
</body>

</html>
