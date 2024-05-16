@extends('admin-panel.layouts.master')
<link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>

@section('content')
    <div class="side-app">


        <!--Page header-->


                <ol class="breadcrumb1">
                    <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i
                                class="fe fe-home me-2"
                                aria-hidden="true"></i>
                            @lang('admin/dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item1"><a href="{{route('admin.system.users.index')}}" class="">
                            @lang('admin/dashboard.menus.system_users')</a>
                    </li>
                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_admin')
                    </li>
                </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25">@lang('admin/datatable.buttons.c_admin')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off" action="{{route('admin.system.users.store')}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{trans('admin/datatable.name')}} <span
                                                class="text-red">*</span></label>
                                        <input type="text" name="name"
                                               class="form-control mb-3 input_field"
                                               placeholder="name"
                                               id="name"
                                               value="{{ old('name') }}">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label">{{trans('admin/datatable.email')}} <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="email"
                                               class="form-control mb-3 input_field"
                                               placeholder="email"
                                               autocomplete="off"
                                               id="email"
                                               value="{{ old('email') }}">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="mobile" class="form-label">{{trans('admin/datatable.mobile')}} <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="mobile"
                                               class="form-control mb-3 input_field"
                                               placeholder=" mobile"
                                               id="mobile"
                                               value="{{ old('mobile') }}">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="password" class="form-label">{{trans('admin/datatable.password')}}
                                            <span
                                                class="text-red">*</span> </label>
                                        <input type="password" name="password"
                                               class="form-control mb-3 input_field"
                                               placeholder="password"
                                               id="password"
                                               autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.multi-select-input name="roles" :options="$roles"
                                                                key-of-value="display_name"
                                                                key-of-option="id"></x-admin.multi-select-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label mb-5">{{trans('admin/datatable.status')}} <span
                                                class="text-red">*</span></label>
                                        <div class="material-switch">
                                            <input id="status" name="status"
                                                   type="checkbox" @checked(old('status') ?? 'checked') >
                                            <label for="status" class="label-success"></label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Row-->
                <div class="col-xl-3 col-lg-3">

                    <div class="card overflow-hidden">
                        {{--                        <div class="card-header ">--}}
                        {{--                            <div class="card-title">{{trans('admin/datatable.buttons.publish')}}</div>--}}
                        {{--                        </div>--}}
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button" value="apply" name="action"
                                    class="btn btn-success me-2"><span
                                    class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span></a>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header ">
                            <div class="card-title">{{trans('admin/datatable.image')}}</div>
                        </div>
                        <div class="form-group p-2">
                            <input type="file" id="image" name="image" class="dropify input_field p-5"
                                   data-default-file="{{ old('image') }}"
                                   data-height="180"/>
                        </div>
                    </div>
                </div>


            </div>

        </form>


        @endsection

        @push('scripts')

            <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>

    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/System/Admin/CreateSystemUserRequest','on_start'=>false])


    @endpush
