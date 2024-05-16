@extends('admin-panel.layouts.master')


@push('style-bottom')
    <link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.css') }}"
          rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/css/jquery.imagesloader.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/plugins/date-picker/date-picker.css') }}" rel="stylesheet"/>

@endpush

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
                    <li class="breadcrumb-item1"><a href="{{route('admin.vehicles.index')}}" class="">
                            @lang('admin/dashboard.menus.vehicles')</a>
                    </li>
                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_vehicle')
                    </li>
                </ol>

            </div>

        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary fs-25">@lang('admin/datatable.buttons.c_vehicle')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off" action="{{route('admin.trailers.store')}}"
              enctype="multipart/form-data"
              class="repeater">
            @csrf
            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6 col-md-6"> {{-- Name--}}
                                    <div class="form-group">
                                        <label for="name" class="form-label">@lang('admin/datatable.name') <span
                                                class="text-red">*</span></label>
                                        <input type="text" name="name"
                                               class="form-control mb-3 input_field"
                                               placeholder="name"
                                               id="name"
                                               value="{{ old('name') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6"> {{-- Vehicles Type--}}
                                    <div class="form-group">
                                        <label class="form-label">@lang('admin/datatable.vehicles_type') <span
                                                class="text-red">*</span></label>
                                        <select name="vehicle_type_id" id="vehicle_type_id"
                                                class="form-control SlectBox ">
                                            <option value="0">--Select--</option>
                                            @foreach($vehiclesTypes as $vehiclesType)
                                                <option value="{{$vehiclesType->id}}">{{$vehiclesType->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6"> {{-- Model--}}
                                    <div class="form-group">
                                        <label for="model" class="form-label">@lang('admin/datatable.model') <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="model"
                                               class="form-control mb-3 input_field"
                                               placeholder="model"
                                               autocomplete="off"
                                               id="model"
                                               value="{{ old('model') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6"> {{-- Release Date--}}
                                    <div class="form-group">
                                        <label for="release_date"
                                               class="form-label">@lang('admin/datatable.release_date') <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="release_date"
                                               class="form-control mb-3 input_field"
                                               placeholder="release_date"
                                               autocomplete="off"
                                               id="release_date"
                                               value="{{ old('release_date') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6"> {{-- Gas Type--}}
                                    <div class="form-group">
                                        <label for="gas_type" class="form-label">@lang('admin/datatable.gas_type')
                                            <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="gas_type"
                                               class="form-control mb-3 input_field"
                                               placeholder=" gas_type"
                                               id="gas_type"
                                               value="{{ old('gas_type') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6"> {{-- Horse Power--}}
                                    <div class="form-group">
                                        <label for="horse_power"
                                               class="form-label">@lang('admin/datatable.horse_power') <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="horse_power"
                                               class="form-control mb-3 input_field"
                                               placeholder=" horse_power"
                                               id="horse_power"
                                               name="horse_power"
                                               value="{{ old('horse_power') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">  {{-- Serial Number--}}
                                    <div class="form-group">
                                        <label for="serial_number"
                                               class="form-label">@lang('admin/datatable.serial_number') <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="serial_number"
                                               class="form-control mb-3 input_field"
                                               placeholder=" serial_number"
                                               id="serial_number"
                                               name="serial_number"
                                               value="{{ old('serial_number') }}">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6"> {{-- Chassis No--}}
                                    <div class="form-group">
                                        <label for="chassis_no"
                                               class="form-label">@lang('admin/datatable.chassis_no') <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="chassis_no"
                                               class="form-control mb-3 input_field"
                                               placeholder=" chassis_no"
                                               id="chassis_no"
                                               value="{{ old('chassis_no') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">   {{-- Car Capital --}}
                                    <div class="form-group">
                                        <label for="car_capital"
                                               class="form-label">@lang('admin/datatable.car_capital') <span
                                                class="text-red">*</span> </label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">$</span>
                                            <input type="text" name="car_capital" class="form-control input_field"
                                                   id="car_capital" placeholder="car_capital"
                                                   value="{{ old('car_capital') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">  {{-- Plate Number --}}
                                    <div class="form-group">
                                        <label for="plate_number"
                                               class="form-label">@lang('admin/datatable.plate_number') <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="plate_number"
                                               class="form-control mb-3 input_field"
                                               placeholder=" plate_number"
                                               id="plate_number"
                                               value="{{ old('plate_number') }}">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6"> {{-- license Start Date --}}
                                    <div class="form-group">
                                        <label class="form-label">@lang('admin/datatable.license_start_date')</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18"
                                                         viewBox="0 0 24 24" width="18">
                                                        <path d="M0 0h24v24H0V0z" fill="none"/>
                                                        <path
                                                            d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"/>
                                                        <path d="M4 5.01h16V8H4z" opacity=".3"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <input name="license_start_date" class="form-control fc-datepicker"
                                                   placeholder="MM/DD/YYYY"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">  {{-- license End Date --}}
                                    <div class="form-group">
                                        <label class="form-label">@lang('admin/datatable.license_end_date')</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18"
                                                         viewBox="0 0 24 24" width="18">
                                                        <path d="M0 0h24v24H0V0z" fill="none"/>
                                                        <path
                                                            d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"/>
                                                        <path d="M4 5.01h16V8H4z" opacity=".3"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <input name="license_end_date" class="form-control fc-datepicker"
                                                   placeholder="MM/DD/YYYY"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="owners-group mb-3"> {{-- Owners Group --}}

                                    <div class="row owners owner-item-0">
                                        <div class="col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="owner"
                                                       class="form-label">@lang('admin/datatable.owner') <span
                                                        class="text-red">*</span> </label>
                                                <select name="owners[0][owner_id]" id="owner_ids"
                                                        class="form-control SlectBox owner_id_input">
                                                    <option value="0">-- تحديد المالك --</option>
                                                    @foreach($owners as $owner)
                                                        <option value="{{$owner->id}}">{{$owner->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="percentage"
                                                       class="form-label">@lang('admin/datatable.percentage') <span
                                                        class="text-red">*</span> </label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend2">%</span>
                                                    <input type="text" class="form-control percent_input"
                                                           name="owners[0][percentage]" id="percent_input"
                                                           aria-describedby="inputGroupPrepend2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 col-md-1 d-none delete-owner-button">
                                            <button type="button" id="delete-owner-0"
                                                    class="delete-owner btn btn-icon btn-md mt-6 btn-danger"><i
                                                    class="fe fe-trash "></i></button>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-1 col-md-1 mb-4">
                                    <button type="button" id="add-owner" class="btn btn-primary"><i
                                            class="fe fe-plus me-2"></i>@lang('admin/datatable.add_owner')</button>
                                    </button>
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
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="row" data-type="imagesloader"
                                         data-errorformat="Accepted file formats" data-errorsize="Maximum size accepted"
                                         data-errorduplicate="File already loaded"
                                         data-errormaxfiles="Maximum number of images you can upload"
                                         data-errorminfiles="Minimum number of images to upload"
                                         data-modifyimagetext="Modify immage">

                                        <!-- Progress bar -->
                                        <div class="col-12 order-1 mt-2">
                                            <div data-type="progress" class="progress"
                                                 style="height: 25px; display:none;">
                                                <div data-type="progressBar"
                                                     class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                     role="progressbar" style="width: 100%;">Load in progress...
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Model -->
                                        <div data-type="image-model" class="col-4 pl-2 pr-2 pt-2"
                                             style="max-width:250px; display:none;">

                                            <div class="ratio-box text-center" data-type="image-ratio-box">
                                                <img data-type="noimage"
                                                     class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded multi-image-default-bg"
                                                     src="{{ asset('admin_asset/images/svgs/photo-camera-gray.svg') }}"
                                                     style="cursor:pointer;">
                                                <div data-type="loading" class="img-loading"
                                                     style="color:#218838; display:none;">
                                                    <span class="fa fa-2x fa-spin fa-spinner"></span>
                                                </div>
                                                <img data-type="preview"
                                                     class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded"
                                                     src="" style="display: none; cursor: default;">
                                                <span class="badge badge-pill badge-success p-2 w-50 main-tag"
                                                      style="display:none;">Main</span>
                                            </div>

                                            <!-- Buttons -->
                                            <div data-type="image-buttons" class="row justify-content-center mt-2">
                                                <button data-type="add"
                                                        class="btn btn-outline-success outline-success multi-image-add-button"
                                                        type="button"><span
                                                        class="fa fa-camera mr-2 upload-icon me-2"></span>Add
                                                </button>
                                                <button data-type="btn-modify" type="button"
                                                        class="btn btn-outline-success m-0 outline-success-mod multi-image-modify-button"
                                                        data-toggle="popover" data-placement="right"
                                                        style="display:none;">
                                                    <span class="fa fa-edit mr-2 upload-icon me-2"></span>Modify
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Popover operations -->
                                        <div data-type="popover-model" style="display:none">
                                            <div data-type="popover" class="ml-3 mr-3" style="min-width:150px;">
                                                <div class="row">
                                                    <div class="col p-0">
                                                        <button data-operation="main"
                                                                class="btn btn-block btn-success btn-sm rounded-pill  main-image-btn btn-succ main-btn"
                                                                type="button"><span
                                                                class="fa fa-angle-double-up mr-2"></span>Main
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-6 p-0 pr-1">
                                                        <button data-operation="left"
                                                                class="btn btn-block btn-outline-success btn-sm rounded-pill option-image-btn"
                                                                type="button"><span
                                                                class="fa fa-angle-left mr-2"></span>Left
                                                        </button>
                                                    </div>
                                                    <div class="col-6 p-0 pl-1">
                                                        <button data-operation="right"
                                                                class="btn btn-block btn-outline-success btn-sm rounded-pill option-image-btn"
                                                                type="button">Right<span
                                                                class="fa fa-angle-right ml-2"></span></button>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-6 p-0 pr-1">
                                                        <button data-operation="rotateanticlockwise"
                                                                class="btn btn-block btn-outline-success btn-sm rounded-pill option-image-btn"
                                                                type="button"><span class="fas fa-undo-alt mr-2"></span>Rotate
                                                        </button>
                                                    </div>
                                                    <div class="col-6 p-0 pl-1">
                                                        <button data-operation="rotateclockwise"
                                                                class="btn btn-block btn-outline-success btn-sm rounded-pill option-image-btn"
                                                                type="button">Rotate<span
                                                                class="fas fa-redo-alt ml-2"></span></button>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <button data-operation="remove"
                                                            class="btn btn-outline-danger btn-sm btn-block del-btn"
                                                            type="button"><span class="fa fa-times mr-2"></span>Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="input-group">
                                            <!--Hidden file input for images-->
                                            <input id="files" type="file" name="gallery[]" data-button="" multiple=""
                                                   style="display:none;">
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
                            <a href="{{ route('admin.vehicles.index') }}" class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span></a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header ">
                            <div class="card-title">@lang('admin/datatable.image')</div>
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
            <script src="{{ URL::asset('admin_asset/js/jquery.imagesloader.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/imagesloader.js') }}"></script>

            <script src="{{ URL::asset('admin_asset/plugins/date-picker/date-picker.js')}}"></script>
            <script src="{{ URL::asset('admin_asset/plugins/date-picker/jquery-ui.js')}}"></script>
            <script src="{{ URL::asset('admin_asset/plugins/input-mask/jquery.maskedinput.js')}}"></script>

            <script src="{{ URL::asset('admin_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>


            <script src="{{ URL::asset('admin_asset/js/formelementadvnced.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/form-elements.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/jquery.repeater.js') }}"></script>

            <!--Date Range Picker-->
            <script src="{{ URL::asset('admin_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

            <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
            <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.1.57/js/jquery.inputmask.js"></script>
            <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.1.57/js/jquery.inputmask.js"></script>
            <script src="{{ URL::asset('admin_asset/js/repeater-owners.js') }}"></script>



    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/Vehicles/CreateVehicleRequest'])


    @endpush
