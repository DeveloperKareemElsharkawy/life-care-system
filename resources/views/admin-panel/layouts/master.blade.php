<!DOCTYPE html>
<html lang="en" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">

<head>
    <!-- Title -->
    <title>سيتم حياه كير </title>


    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Code It – Laravel Admin & Dashboard Template" name="description">
    <meta content="code-it™" name="author">

    @include('admin-panel.layouts.head')
</head>

@php
    $settings = '';
        foreach (settings()->group('admin')->all() as $key => $value) {
             $settings .=  $value . ' ';
        }
@endphp

<body
    class="app sidebar-mini  {{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}  {{$settings}}">

{{--@include('admin-panel.layouts.switcher')--}}

<!---Global-loader-->
{{--<div id="global-loader">--}}
{{--    <div class="dimmer active">--}}
{{--        <div class="sk-circle">--}}
{{--            <div class="sk-circle1 sk-child"></div>--}}
{{--            <div class="sk-circle2 sk-child"></div>--}}
{{--            <div class="sk-circle3 sk-child"></div>--}}
{{--            <div class="sk-circle4 sk-child"></div>--}}
{{--            <div class="sk-circle5 sk-child"></div>--}}
{{--            <div class="sk-circle6 sk-child"></div>--}}
{{--            <div class="sk-circle7 sk-child"></div>--}}
{{--            <div class="sk-circle8 sk-child"></div>--}}
{{--            <div class="sk-circle9 sk-child"></div>--}}
{{--            <div class="sk-circle10 sk-child"></div>--}}
{{--            <div class="sk-circle11 sk-child"></div>--}}
{{--            <div class="sk-circle12 sk-child"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}{{--    <img src="{{ URL::asset('admin_asset/images/svgs/loader.svg') }}" alt="loader">--}}
{{--</div>--}}
<!--- End Global-loader-->

<!-- PAGE -->
<div class="page">
    <div class="page-main">
        <div class="app-content main-content">
            @include('admin-panel.layouts.aside')
            @include('admin-panel.layouts.header')
            @yield('content')
        </div>
    </div>
    @include('admin-panel.layouts.footer')
</div>

@include('admin-panel.layouts.scripts')
</body>

</html>
