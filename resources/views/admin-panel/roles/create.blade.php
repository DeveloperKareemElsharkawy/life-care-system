@extends('admin-panel.layouts.master')
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
                    <li class="breadcrumb-item1"><a href="{{route('admin.roles.index')}}" class="">
                            @lang('admin/dashboard.menus.roles')</a>
                    </li>
                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_role')
                    </li>
                </ol>

            </div>

        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25">@lang('admin/datatable.buttons.c_role')</h1>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">
                    <form method="post" id="myform" action="{{route('admin.roles.store')}}"
                          class="card">
                        @csrf
                        <div class="card-body">
                            <div class="row">

{{--                                <div class="col-sm-6 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label"> <span--}}
{{--                                                class="text-red">*</span> {{trans('admin/datatable.display_name')}}--}}
{{--                                        </label>--}}
{{--                                        <input type="text" name="display_name"--}}
{{--                                               class="form-control mb-3 input_field"--}}
{{--                                               placeholder="Display Name"--}}
{{--                                               id="display_name"--}}
{{--                                               value="{{ old('display_name') }}">--}}

{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"> <span
                                                class="text-red">*</span> {{trans('admin/datatable.name')}}</label>
                                        <input type="text" name="name"
                                               class="form-control mb-3 input_field"
                                               placeholder="Name"
                                               id="name"
                                               value="{{ old('name') }}">

                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">

                                        <label class="form-label">{{trans('admin/datatable.description')}} <span
                                                class="text-red">*</span></label>
                                        <grammarly-extension data-grammarly-shadow-root="true"
                                                             style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                                             class="cGcvT"></grammarly-extension>
                                        <grammarly-extension data-grammarly-shadow-root="true"
                                                             style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                                             class="cGcvT"></grammarly-extension>
                                        <textarea name="description"
                                                  class="form-control mb-3 input_field"
                                                  placeholder="Textarea"
                                                  rows="3"
                                                  id="description"
                                                  spellcheck="false">{{ old('description') }}</textarea>
                                    </div>
                                </div>

{{--                                <div class="col-sm-6 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label mb-5">{{trans('admin/datatable.status')}} <span--}}
{{--                                                class="text-red">*</span></label>--}}
{{--                                        <div class="material-switch">--}}
{{--                                            <input id="status" name="status"--}}
{{--                                                   type="checkbox" @checked(old('status')) >--}}
{{--                                            <label for="status" class="label-success"></label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="col-lg-12 col-md-12">

                                    <div class="card-header">
                                        <label class="form-label">الصلاحيات <span class="text-red">*</span></label>
                                    </div>
                                    <div class=" card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-12 mb-5">
                                                     <label class="custom-control custom-checkbox form-group">
                                                        <input id="permissions" type="checkbox"
                                                               class="custom-control-input permissions-select"
                                                        >
                                                        <span
                                                            class="custom-control-label">تحديد الكل</span>
                                                    </label>
                                             </div>

                                            @foreach($permissions as $model => $permissionsList)
                                                <div class="col-md-6 col-lg-3 mb-5">
                                                    <div class="form-group m-0">
                                                        <div class="form-label"><span
                                                                class="fs-16">@lang('admin/permissions.groups.'.$model)</span>
                                                        </div>
                                                        <div class="custom-controls-stacked">

                                                            @foreach($permissionsList as $permission)
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox"
                                                                           class="custom-control-input  permission"
                                                                           @checked( in_array($permission->id,is_array(old('permissions')) ? old('permissions') : []))
                                                                           name="permissions[]"
                                                                           value="{{$permission->id}}"
                                                                    >
                                                                    <span
                                                                        class="custom-control-label fs-15">@lang('admin/permissions.permissions.'.$permission->name)</span>
                                                                </label>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" value="save" id="a" name="action" class="btn   btn-success"> <span
                                        class="fs-15">@lang('admin/datatable.buttons.general.save')</span>
                                </button>

                                {{--                                <button type="submit" value="apply" name="action" class="btn   btn-primary"><span--}}
                                {{--                                        class="fs-15">Save & Edit</span>--}}
                                {{--                                </button>--}}

                                <a href="{{ route('admin.roles.index') }}" class="btn btn-danger"><span
                                        class="fs-15"><i class="fe fe-log-out me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span>
                                </a>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- End Row-->


        </div>
        @endsection

        @push('scripts')
            <script>
                // Listen for click on toggle checkbox
                $('.permissions-select').click(function (event) {
                    if (this.checked) {
                        // Iterate each checkbox
                        $('.permission:checkbox').each(function () {
                            this.checked = true;
                        });
                    } else {
                        $('.permission:checkbox').each(function () {
                            this.checked = false;
                        });
                    }
                });
            </script>


            <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>

    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/Role/CreateRoleRequest','array_list'=>['permissions']])


    @endpush
