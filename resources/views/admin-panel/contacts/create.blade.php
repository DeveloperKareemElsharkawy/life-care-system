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
                    <li class="breadcrumb-item1"><a href="{{route('admin.categories.index')}}" class="">
                            @lang('admin/dashboard.menus.categories')</a>
                    </li>
                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_category')
                    </li>
                </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.c_category')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off" action="{{route('admin.categories.store')}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card datable-custom ">
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

                                <div class="form-group m-0">
                                    <label class="form-label">@lang('admin/datatable.color')</label>
                                    <div class="row g-xs">
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="azure" class="colorinput-input"
                                                       checked="">
                                                <span class="colorinput-color bg-azure"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="indigo"
                                                       class="colorinput-input">
                                                <span class="colorinput-color bg-indigo"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="purple"
                                                       class="colorinput-input">
                                                <span class="colorinput-color bg-purple"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="pink" class="colorinput-input">
                                                <span class="colorinput-color bg-pink"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="red" class="colorinput-input">
                                                <span class="colorinput-color bg-red"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="orange"
                                                       class="colorinput-input">
                                                <span class="colorinput-color bg-orange"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="yellow"
                                                       class="colorinput-input">
                                                <span class="colorinput-color bg-yellow"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="lime" class="colorinput-input">
                                                <span class="colorinput-color bg-lime"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="green" class="colorinput-input">
                                                <span class="colorinput-color bg-green"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="teal" class="colorinput-input">
                                                <span class="colorinput-color bg-teal"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="black" class="colorinput-input">
                                                <span class="colorinput-color bg-black"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="white" class="colorinput-input">
                                                <span class="colorinput-color bg-white color-br"></span>
                                            </label>
                                        </div>
                                        <input type="hidden" id="color">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 mt-5">
                                    <div class="form-group">
                                        <label class="form-label mb-5">{{trans('admin/datatable.status')}} <span
                                                class="text-red">*</span></label>
                                        <div class="material-switch">
                                            <input id="status" name="status"
                                                   type="checkbox"  >
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
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button"
                                    class="btn btn-success me-2"><span
                                    class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span></a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header ">
                            <div class="card-title">{{trans('admin/datatable.image')}}</div>
                        </div>
                        <div class="form-group p-2">
                            <input type="file" name="image" class="dropify input_field p-5"
                                   data-default-file="{{ old('image') }}"
                                   data-height="180"/>
                            <input type="hidden" id="image">

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
