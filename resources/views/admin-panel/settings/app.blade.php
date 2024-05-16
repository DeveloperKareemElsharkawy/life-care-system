@extends('admin-panel.layouts.master')
<link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>

@section('content')
    <div class="side-app">


        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">

                <ol class="breadcrumb1">
                    <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i
                                class="fe fe-home me-2"
                                aria-hidden="true"></i>
                            @lang('admin/dashboard.dashboard')</a>
                    </li>

                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.app_settings')
                    </li>
                </ol>

            </div>

        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25">@lang('admin/datatable.app_settings')</h1>
        </div>
        <form method="post" autocomplete="off" id="myform" action="{{route('admin.settings.save-app-settings')}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header bg-primary ">
                         </div>
                        <div class="card-body" style="padding: 5px;">
                            <table class="table table-bordered mb-1">
                                <tbody>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.company')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="company"
                                                   class="form-control"
                                                   placeholder="@lang('admin/datatable.company')" value="{{$settings['company']}}" type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.email')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="email"
                                                   class="form-control"
                                                   value="{{$settings['email']}}"
                                                   placeholder="@lang('admin/datatable.email')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.mobile')
                                        </div>

                                    </td>
                                    <td class="">
                                        <div class="input-group">
                                            <input name="mobile"
                                                   class="form-control"
                                                   value="{{$settings['mobile']}}"
                                                   placeholder="@lang('admin/datatable.mobile')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.address')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="address"
                                                   class="form-control"
                                                   value="{{$settings['address']}}"
                                                   placeholder="@lang('admin/datatable.address')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.latitude')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="latitude"
                                                   class="form-control"
                                                   value="{{$settings['latitude']}}"

                                                   placeholder="@lang('admin/datatable.latitude')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.longitude')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="longitude"
                                                   value="{{$settings['longitude']}}"
                                                   class="form-control"
                                                   placeholder="@lang('admin/datatable.longitude')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.facebook_link')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="facebook_link"
                                                   value="{{$settings['facebook_link']}}"
                                                   class="form-control"
                                                   placeholder="@lang('admin/datatable.facebook_link')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.twitter_link')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="twitter_link"
                                                   value="{{$settings['twitter_link']}}"
                                                   class="form-control"
                                                   placeholder="@lang('admin/datatable.twitter_link')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.instagram_link')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="instagram_link"
                                                   value="{{$settings['instagram_link']}}"
                                                   class="form-control"
                                                   placeholder="@lang('admin/datatable.instagram_link')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="mt-2">
                                            @lang('admin/datatable.linkedin_link')
                                        </div>

                                    </td>

                                    <td class="">
                                        <div class="input-group">
                                            <input name="linkedin_link"
                                                   value="{{$settings['linkedin_link']}}"
                                                   class="form-control"
                                                   placeholder="@lang('admin/datatable.linkedin_link')"   type="text">
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                </div>


                <div class="col-xl-12 col-lg-12">

                    <div class="  overflow-hidden">
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button"
                                    class="btn btn-primary me-2 fs-17"><span
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
