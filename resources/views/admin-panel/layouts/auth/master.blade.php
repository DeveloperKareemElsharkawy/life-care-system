<html lang="en" dir="ltr" class="is-expanded">
<head>
    <title>Admitro - Admin Panel HTML template</title>

    <!--Favicon -->
    <link rel="icon" href="{{ URL::asset
('admin_asset/images/brand/favicon.ico') }}" type="image/x-icon"/>

    <!--Bootstrap css -->
    <link href="{{ URL::asset('admin_asset/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ URL::asset('admin_asset/css/style.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/css/dark.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/css/skin-modes.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ URL::asset('admin_asset/plugins/jQuerytransfer/jquery.transfer.css')}}">

    <!-- Animate css -->
    <link href="{{ URL::asset('admin_asset/css/animated.css') }}" rel="stylesheet"/>

    <!--Sidemenu css -->
    <link href="{{ URL::asset('admin_asset/css/sidemenu.css" rel="stylesheet') }}">

    <!-- P-scroll bar css-->
    <link href="{{ URL::asset('admin_asset/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet"/>

    <!---Icons css-->
    <link href="{{ URL::asset('admin_asset/plugins/icons/icons.css') }}" rel="stylesheet"/>


    <!-- Simplebar css -->
    <link rel="stylesheet" href="{{ URL::asset('admin_asset/plugins/simplebar/css/simplebar.css') }}">

    <!-- INTERNAL Morris Charts css -->
    <link href="{{ URL::asset('admin_asset/plugins/morris/morris.css') }}" rel="stylesheet"/>

    <!-- INTERNAL Select2 css -->
    <link href="{{ URL::asset('admin_asset/plugins/select2/select2.min.css') }}" rel="stylesheet"/>

    <!-- Data table css -->
    <link href="{{ URL::asset('admin_asset/plugins/datatables/DataTables/css/dataTables.bootstrap5.css') }}"
          rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css') }}"
          rel="stylesheet">
    <link href="{{ URL::asset('admin_asset/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css') }}"
          rel="stylesheet"/>


    <!-- Color Skin css -->
    <link id="theme" href="{{ URL::asset('admin_asset/colors/color1.css') }}" rel="stylesheet" type="text/css"/>

    <!-- INTERNAL Switcher css -->
    <link href="{{ URL::asset('admin_asset/switcher/css/switcher.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/switcher/demo.css') }}" rel="stylesheet"/>
</head>


<body class="register-2" data-new-gr-c-s-check-loaded="14.1007.0" data-gr-ext-installed="">


@yield('content')

<!-- Jquery js-->
<script src="{{url('admin_asset/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap5 js-->
<script src="{{url('admin_asset/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{url('admin_asset/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!--Othercharts js-->
<script src="{{url('admin_asset/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

<!-- Circle-progress js-->
<script src="{{url('admin_asset/plugins/circle-progress/circle-progress.min.js')}}"></script>

<!-- Jquery-rating js-->
<script src="{{url('admin_asset/plugins/rating/jquery.rating-stars.js')}}"></script>

<!-- Show Password -->
<script src="{{url('admin_asset/plugins/bootstrap-show-password/bootstrap-show-password.min.js')}}"></script>


<!-- Custom js-->
<script src="{{url('admin_asset/js/custom.js')}}"></script>
<script src="{{url('admin_asset/js/form-vallidations.js')}}"></script>
</body>
</html>
