<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fe fe-chevron-up"></i></a>


<!-- Jquery js-->
<script src="{{ URL::asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap5 js-->
<script src="{{ URL::asset('admin_asset/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!--Othercharts js-->
<script src="{{ URL::asset('admin_asset/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

<!-- Jquery-rating js-->
<script src="{{ URL::asset('admin_asset/plugins/rating/jquery.rating-stars.js') }}"></script>

<!--Sidemenu js-->
<script src="{{ URL::asset('admin_asset/plugins/sidemenu/sidemenu.js') }}"></script>


<script src="{{ URL::asset('admin_asset/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/p-scrollbar/p-scroll1.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/p-scrollbar/p-scroll.js') }}"></script>

<!--INTERNAL Flot Charts js-->
<script src="{{ URL::asset('admin_asset/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ URL::asset('admin_asset/js/dashboard.sampledata.js') }}"></script>
<script src="{{ URL::asset('admin_asset/js/chart.flot.sampledata.js') }}"></script>

<!-- INTERNAL Chart js -->
<script src="{{ URL::asset('admin_asset/plugins/chart/chart.bundle.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/chart/utils.js') }}"></script>

<!-- INTERNAL Apexchart js -->
<script src="{{ URL::asset('admin_asset/js/apexcharts.js') }}"></script>

<!--INTERNAL Moment js-->
<script src="{{ URL::asset('admin_asset/plugins/moment/moment.js') }}"></script>
<script src="{{ URL::asset('admin_asset/js/index1.js') }}"></script>


<script src="{{ URL::asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('admin_asset/js/select2.js') }}"></script>

<!-- Simplebar JS -->

<!-- Rounded bar chart js-->
<script src="{{ URL::asset('admin_asset/js/rounded-barchart.js') }}"></script>

<script src="{{ URL::asset('admin_asset/plugins/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ URL::asset('admin_asset/js/sweet-alert.js')}}"></script>


<!-- Jquery-rating js-->
<script src="{{ URL::asset('admin_asset/plugins/rating/jquery.rating-stars.js')}}"></script>

<!--Sidemenu js-->
<!-- Circle-progress js-->
<script src="{{ URL::asset('admin_asset/plugins/circle-progress/circle-progress.min.js')}}"></script>

<!-- INTERNAL Gallery js -->
<script src="{{ URL::asset('admin_asset/plugins/gallery/picturefill.js')}}"></script>
<script src="{{ URL::asset('admin_asset/plugins/gallery/lightgallery.js')}}"></script>
<script src="{{ URL::asset('admin_asset/plugins/gallery/lg-pager.js')}}"></script>
<script src="{{ URL::asset('admin_asset/plugins/gallery/lg-autoplay.js')}}"></script>
<script src="{{ URL::asset('admin_asset/plugins/gallery/lg-fullscreen.js')}}"></script>
<script src="{{ URL::asset('admin_asset/plugins/gallery/lg-zoom.js')}}"></script>
<script src="{{ URL::asset('admin_asset/plugins/gallery/lg-hash.js')}}"></script>
<script src="{{ URL::asset('admin_asset/plugins/gallery/lg-share.js')}}"></script>
<script src="{{ URL::asset('admin_asset/js/gallery.js')}}"></script>

<!-- Custom js-->
{{--<script src="{{ URL::asset('admin_asset/js/custom.js') }}"></script>--}}

<script src="{{ URL::asset('admin_asset/plugins/notify/js/rainbow.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/notify/js/sample.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/notify/js/jquery.growl.js') }}"></script>
<script src="{{ URL::asset('admin_asset/plugins/notify/js/notifIt.js') }}"></script>

<script src="{{ URL::asset('admin_asset/js/home.js') }}"></script>


<!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
      crossorigin="anonymous">

<!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
<!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" -->

<!-- the fileinput plugin styling CSS file -->
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/css/fileinput.min.css" media="all"
      rel="stylesheet" type="text/css"/>

<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->

<!-- the jQuery Library -->

<!-- buffer.min.js and filetype.min.js are necessary in the order listed for advanced mime type parsing and more correct
     preview. This is a feature available since v5.5.0 and is needed if you want to ensure file mime type is parsed
     correctly even if the local file's extension is named incorrectly. This will ensure more correct preview of the
     selected file (note: this will involve a small processing overhead in scanning of file contents locally). If you
     do not load these scripts then the mime type parsing will largely be derived using the extension in the filename
     and some basic file content parsing signatures. -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/plugins/buffer.min.js"
        type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/plugins/filetype.min.js"
        type="text/javascript"></script>



<!-- the main fileinput plugin script JS file -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/fileinput.min.js"></script>

<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
<!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/themes/fas/theme.min.js"></script -->

<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/locales/LANG.js"></script>
<script>


    // Get the video element by its class name
    var videoElement = document.querySelector('.kv-preview-data');

    // Check if the video element exists
    if (videoElement) {
        // Update the style attribute with the new values
        videoElement.style.cssText = 'width: 95% !important; height: 100% !important;';
    }


</script>

<script>

    @if (session('successful_message'))
    notif({
        type: "success",
        msg: @json(session('successful_message')),
        timeout: 5000
    });
    @endif

    @if(session('successful_message'))
    notif({
        type: "success",
        msg: @json(session('successful_message')),
        timeout: 5000,
        width: 300
    });
    @endif
</script>


<!-- Switcher js -->
@livewireScripts
@powerGridScripts
@livewire('livewire-ui-modal')
@stack('scripts')
@stack('scripts_bottom')
