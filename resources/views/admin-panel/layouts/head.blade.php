@powerGridStyles

<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>

<!--Favicon -->
<link rel="icon" href="{{ URL::asset('admin_asset/images/brand/favicon.ico') }}" type="image/x-icon"/>

<!--Bootstrap css -->
<link href="{{ URL::asset('admin_asset/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Style css -->
<link href="{{ URL::asset('admin_asset/css/style.css') }}" rel="stylesheet"/>
<link href="{{ URL::asset('admin_asset/css/skin-modes.css') }}" rel="stylesheet"/>
<link href="{{ URL::asset('admin_asset/css/dark.css') }}" rel="stylesheet"/>

<!-- Animate css -->
<link href="{{ URL::asset('admin_asset/css/animated.css') }}" rel="stylesheet"/>

<!--Sidemenu css -->
<link href="{{ URL::asset('admin_asset/css/sidemenu.css" rel="stylesheet') }}">

<!-- P-scroll bar css-->
<link href="{{ URL::asset('admin_asset/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet"/>

<!---Icons css-->
<link href="{{ URL::asset('admin_asset/plugins/icons/icons.css') }}" rel="stylesheet"/>

<link href="{{ URL::asset('admin_asset/plugins/sweet-alert/jquery.sweet-modal.min.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('admin_asset/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />

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
<link href="{{ URL::asset('admin_asset/plugins/notify/css/jquery.growl.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('admin_asset/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
<!-- INTERNAL Switcher css -->
<link href="{{ URL::asset('admin_asset/switcher/css/switcher.css') }}" rel="stylesheet"/>
<link href="{{ URL::asset('admin_asset/switcher/demo.css') }}" rel="stylesheet"/>


<!-- Style css -->
<link id="theme" href="{{ URL::asset('admin_asset/colors/color1.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin_asset/css/custom.css?v=').time() }}" rel="stylesheet"/>

<@stack('styles')
<x-livewiremodal-base />

@livewireStyles

@stack('style-bottom')
