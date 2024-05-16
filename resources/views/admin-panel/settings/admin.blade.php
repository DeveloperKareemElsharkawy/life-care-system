@extends('admin-panel.layouts.master')
<link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>

@section('content')
    <div class="side-app">


        <ol class="breadcrumb1">
            <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i
                        class="fe fe-home me-2"
                        aria-hidden="true"></i>
                    @lang('admin/dashboard.dashboard')</a>
            </li>

            <li class="breadcrumb-item1 active">  @lang('admin/datatable.admin_settings')
            </li>
        </ol>


        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25">@lang('admin/datatable.admin_settings')</h1>
        </div>
        <form method="post" autocomplete="off" id="myform" action="{{route('admin.settings.save-admin-settings')}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header bg-success ">
                            <h3 class="card-title fs-19 text-white">  @lang('admin/datatable.admin_settings_list.theme') </h3>
                        </div>
                        <div class="card-body" style="padding: 5px;">
                            <table class="table table-bordered mb-1">
                                <tbody>
                                <tr>
                                    <td class="">
                                        <span class="me-auto">Light Theme</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio"
                                                                           name="theme"
                                                                           id="myonoffswitch1"
                                                                           class="onoffswitch2-checkbox"
                                                                           value="light-mode"
                                                    @checked(settings('theme')=='light-mode')
                                                >
                                                <label for="myonoffswitch1"
                                                       class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="me-auto">Dark Theme</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio"
                                                                           name="theme"
                                                                           id="myonoffswitch2"
                                                                           value="dark-mode"
                                                                           @checked(settings('theme')=='dark-mode')

                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch2"
                                                       class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header bg-success ">
                            <h3 class="card-title fs-19 text-white">  @lang('admin/datatable.admin_settings_list.aside_menu') </h3>
                        </div>
                        <div class="card-body" style="padding: 5px;">
                            <table class="table table-bordered mb-1">

                                <tbody>
                                <tr>
                                    <td class="">
                                        <span class="me-auto">Light Menu</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio"
                                                                           name="aside_menu"
                                                                           value="light-menu"
                                                                           @checked(settings('aside_menu')=='light-menu')
                                                                           id="myonoffswitch3"
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch3"
                                                       class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="me-auto">Color Menu</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio"
                                                                           name="aside_menu"
                                                                           value="color-menu"
                                                                           @checked(settings('aside_menu')=='color-menu')
                                                                           id="myonoffswitch4"
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch4"
                                                       class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="me-auto">Dark Menu</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio"
                                                                           name="aside_menu"
                                                                           value="dark-menu"
                                                                           @checked(settings('aside_menu') =='dark-menu')
                                                                           id="myonoffswitch5"
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch5"
                                                       class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="me-auto">Gradient Menu</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio"
                                                                           name="aside_menu"
                                                                           value="gradient-menu"
                                                                           @checked(settings('aside_menu')=='gradient-menu')
                                                                           id="myonoffswitch25"
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch25"
                                                       class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header bg-success ">
                            <h3 class="card-title fs-19 text-white">  @lang('admin/datatable.admin_settings_list.header_menu') </h3>
                        </div>
                        <div class="card-body" style="padding: 5px;">
                            <table class="table table-bordered mb-1">
                                <tbody>
                                <tr>
                                    <td class="">
                                        <span class="me-auto">Light Header</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio" name="header_menu"
                                                                           id="myonoffswitch6"
                                                                           value="light-header"
                                                                           @checked(settings('header_menu')=='light-header')
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch6" class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="me-auto">Color Header</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio" name="header_menu"
                                                                           id="myonoffswitch7"
                                                                           value="color-header"
                                                                           @checked(settings('header_menu')=='color-header')
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch7" class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="me-auto">Dark Header</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio" name="header_menu"
                                                                           id="myonoffswitch8"
                                                                           value="dark-header"
                                                                           @checked(settings('header_menu')=='dark-header')
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch8" class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="me-auto">Gradient Header</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio" name="header_menu"
                                                                           id="myonoffswitch26"
                                                                           value="gradient-header"
                                                                           @checked(settings('header_menu')=='gradient-header')
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch26" class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header bg-success ">
                            <h3 class="card-title fs-19 text-white">  @lang('admin/datatable.admin_settings_list.aside_menu_style') </h3>
                        </div>
                        <div class="card-body" style="padding: 5px;">
                            <table class="table table-bordered mb-1">
                                <tbody>
                                <tr>
                                    <td class="">
                                        <span class="me-auto">Default Menu</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2">
                                                <input type="radio" name="aside_menu_style" id="myonoffswitch13"
                                                       value="default-menu"
                                                       @checked(settings('aside_menu_style')=='default-menu')
                                                       class="onoffswitch2-checkbox default-menu" checked>
                                                <label for="myonoffswitch13" class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="me-auto">Closed Menu</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio" name="aside_menu_style"
                                                                           value="closed-menu sidenav-toggled"
                                                                           id="myonoffswitch30"
                                                                           @checked(settings('aside_menu_style')=='closed-menu sidenav-toggled')
                                                                           class="onoffswitch2-checkbox default-menu">
                                                <label for="myonoffswitch30" class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="me-auto">Icon with Text</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio" name="aside_menu_style"
                                                                           id="myonoffswitch14"
                                                                           value="icontext-menu sidenav-toggled"
                                                                           @checked(settings('aside_menu_style')=='icontext-menu sidenav-toggled')
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch14" class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="me-auto">Icon Overlay</span>
                                    </td>

                                    <td class="">
                                        <div class="switch-toggle d-flex mt-2">
                                            <a class="onoffswitch2"><input type="radio" name="aside_menu_style"
                                                                           id="myonoffswitch15"
                                                                           value="sideicon-menu sidenav-toggled"
                                                                           @checked(settings('aside_menu_style')=='sideicon-menu sidenav-toggled')
                                                                           class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch15" class="onoffswitch2-label"></label>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-xl-12 col-lg-12">

                    <div class="  overflow-hidden">
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button"
                                    class="btn btn-success me-2 fs-17"><span
                                    class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                            </button>


                        </div>
                    </div>

                </div>

            </div>

        </form>


        @endsection

        @push('scripts')

            <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>



    @endpush
