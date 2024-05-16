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
            <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_insurance_company_category')
            </li>
        </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.c_insurance_company_category')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.insurance-company-categories.store',['insurance_company_id' =>$insuranceCompanyId])}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card datable-custom ">
                        <div class="card-body">
                            <div class="row">


                                <div class="col-sm-6 col-md-6">
                                    <x-admin.drop-down-input label="main_category_id" name="main_category_id"
                                                             :options="$categories" key-of-option="id"
                                                             key-of-value="name"></x-admin.drop-down-input>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <x-admin.drop-down-input label="category_id" name="category_id"
                                                             :options="$categories" key-of-option="id"
                                                             key-of-value="name"></x-admin.drop-down-input>
                                </div>


                                <div class="col-sm-12 col-md-12">
                                    <x-admin.number-input name="discount_price_value"></x-admin.number-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.number-input  name="discount_percentage_value"></x-admin.number-input>
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
                            <a href="{{route('admin.insurance-company-categories.index',['insurance_company_id' =>$insuranceCompanyId])}}"
                               class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span></a>
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

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    document.getElementById("category_id").disabled = true;
                });


                $("#main_category_id").change(function () {

                    var main_category_id = this.value;


                    $.ajax({
                        url: '{{ route("admin.insurance-company-categories.get-sub-category") }}', // Replace 'your_insurance_company_id' with the actual value
                        type: 'POST',
                        data: {main_category_id: main_category_id},
                        success: function (data) {
                            // Assuming data is an object with a 'data' property containing an array of options
                            var categorySelect = document.getElementById("category_id");

                            // Clear existing options
                            categorySelect.innerHTML = "";

                            // Append new options
                            data.data.forEach(function (option) {
                                var optionElement = document.createElement("option");
                                optionElement.value = option.id;
                                optionElement.text = option.name;
                                categorySelect.appendChild(optionElement);
                            });

                            // Enable the select element
                            categorySelect.disabled = false;
                        },
                    });
                });

            </script>

    @endpush
