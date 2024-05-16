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
            <li class="breadcrumb-item1"><a href="{{route('admin.doctors.index')}}" class="">
                    @lang('admin/dashboard.menus.doctors')</a>
            </li>
            <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_doctor')
            </li>
        </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.c_doctor')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off" action="{{route('admin.doctors.store')}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card datable-custom ">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-input name="name"></x-admin.text-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-input name="email"></x-admin.text-input>
                                </div>


                                <div class="col-sm-12 col-md-12">
                                    <x-admin.number-input name="mobile"></x-admin.number-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-area-input name="notes"></x-admin.text-area-input>
                                </div>


                                <div class="col-12 ">

                                    <div class="card-header mb-5">
                                        <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                                            نسبه الربح من الجلسات
                                        </div>
                                    </div>


                                    <div class="destinations-group mb-3 "
                                         id="dropdown-container"> {{-- Owners Group --}}

                                        <div class="row clients destination-item-0">

                                            <div class="col-sm-6 col-md-6">
                                                <x-admin.drop-down-input class="id" label="category"
                                                                         name="categories[0][id]" :options="$categories"
                                                                         key-of-value="name"
                                                                         key-of-option="id"></x-admin.drop-down-input>
                                            </div>


                                            <div class="col-sm-2 col-md-2">
                                                <x-admin.number-input  label="session_percentage" class="profit_percentage"
                                                                      name="categories[0][profit_percentage]"/>
                                            </div>

                                            <div class="col-sm-3 col-md-3">
                                                <x-admin.number-input label="examination_profit_percentage"
                                                                      class="examination_profit_percentage"
                                                                      name="categories[0][examination_profit_percentage]"/>
                                            </div>

                                            <div class="col-sm-1 col-md-1 d-none delete-destination-button">
                                                <button type="button" id="delete-destination-0"
                                                        class="delete-destination btn btn-icon btn-md mt-6 btn-danger">
                                                    <i
                                                        class="fe fe-trash "></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1 col-md-1 mb-4">
                                        <button type="button" id="add-destination" class="btn btn-primary"><i
                                                class="fe fe-plus me-2"></i>أضف نسبة جديدة
                                        </button>
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
                            <a href="{{ route('admin.doctors.index') }}" class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span></a>
                        </div>
                    </div>

                    <x-admin.image-input name="image"></x-admin.image-input>

                </div>


            </div>

        </form>


        @endsection

        @push('scripts')

            <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>

            <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
            <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.1.57/js/jquery.inputmask.js"></script>
            <script src="{{ URL::asset('admin_asset/js/repeater-clients.js') }}"></script>


    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/System/Admin/CreateSystemUserRequest','on_start'=>false])

    @endpush
