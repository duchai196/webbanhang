<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{!!asset('backend_assets/')!!}/">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{!!asset('backend_assets/')!!}/images/favicon.png">
    <title>Quản trị website</title>
    <!-- Bootstrap Core CSS -->
    <link href="{!!asset('backend_assets/')!!}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- alert --}}
    <link href="{!!asset('backend_assets/')!!}/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    
    {{-- css your page --}}
    @yield('css')

    <!-- Custom CSS -->
    <link href="{!!asset('backend_assets/')!!}/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{!!asset('backend_assets/')!!}/css/colors/default-dark.css" id="theme" rel="stylesheet">

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            @include('admin.elements.header')

            <!-- ============================================================== -->
            @include('admin.elements.sidebar')

            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    @include('admin.elements.page-titles')
                    <!-- ============================================================== -->
                    @yield('content')
                    <!-- End PAge Content -->
                </div>

                <!-- ============================================================== -->
                <footer class="footer">
                    © {{date('Y')}} Monster Admin by wrappixel.com
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>

        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{!!asset('backend_assets/')!!}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{!!asset('backend_assets/')!!}/plugins/bootstrap/js/tether.min.js"></script>
        <script src="{!!asset('backend_assets/')!!}/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{!!asset('backend_assets/')!!}/js/jquery.slimscroll.js"></script>
        <!--Wave Effects -->
        <script src="{!!asset('backend_assets/')!!}/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="{!!asset('backend_assets/')!!}/js/sidebarmenu.js"></script>
        <!--stickey kit -->
        <script src="{!!asset('backend_assets/')!!}/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <!--Custom JavaScript -->
        <script src="{!!asset('backend_assets/')!!}/js/custom.min.js"></script>
        <!-- ============================================================== -->
        <!-- Style switcher -->
        <script src="{!!asset('backend_assets/')!!}/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="{!!asset('backend_assets/')!!}/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
        <!-- ============================================================== -->
        @yield('script')

    </body>
    <script>

        $(document).ready(function(){
            @if(Session::has('message'))
             swal("Good job!", "{{Session::get('message')}}", "{{Session::get('level')}}");
            @endif
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
     });


</script>

</html>
