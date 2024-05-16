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
                    <li class="breadcrumb-item1"><a href="{{route('admin.insurance-companies.index')}}" class="">
                            @lang('admin/dashboard.menus.insurance_company')</a>
                    </li>
                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.u_insurance_company')
                    </li>
                </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.u_insurance_company')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.insurance-companies.update',['insurance_company_id'=>$insuranceCompany->id])}}"
              enctype="multipart/form-data"
              class="">
            @csrf

            <input type="hidden" name="category_id" value="{{$insuranceCompany->id}}">

            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card datable-custom ">
                        <div class="card-body">
                            <div class="row">


                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-input :value="$insuranceCompany->name" name="name"></x-admin.text-input>
                                </div>


                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-input :value="$insuranceCompany->email" name="email"></x-admin.text-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-input :value="$insuranceCompany->mobile" name="mobile"></x-admin.text-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-area-input  :value="$insuranceCompany->description"  name="description"></x-admin.text-area-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-area-input :value="$insuranceCompany->address" name="address"></x-admin.text-area-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.number-input :value="$insuranceCompany->examination_price" name="examination_price"></x-admin.number-input>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Row-->
                <div class="col-xl-3 col-lg-3">

                    <div class="card overflow-hidden">
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button" value="apply" name="action"
                                    class="btn btn-success me-2"><span
                                    class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                            </button>
                            <a href="{{ route('admin.insurance-companies.index') }}" class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span></a>
                        </div>
                    </div>

                    <x-admin.image-input name="image" :default-value="$insuranceCompany->imageUrl"></x-admin.image-input>

                </div>


            </div>

        </form>


        @endsection

        @push('scripts')

            <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>

    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/System/Admin/UpdateSystemUserRequest'])


    @endpush
