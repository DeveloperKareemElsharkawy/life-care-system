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
            <li class="breadcrumb-item1"><a href="{{route('admin.contract-users.index')}}" class="">
                    @lang('admin/dashboard.menus.contract_users')</a>
            </li>
            <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_user')
            </li>
        </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25">@lang('admin/datatable.buttons.u_user')</h1>
        </div>
        <form method="post" autocomplete="off" id="myform" action="{{route('admin.contract-users.store')}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-header ">
                                    <div class="card-title" style=" font-size: 17px; font-weight: 500; "> المعلومات
                                        الأساسية
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.text-input name="name"></x-admin.text-input>
                                </div>


                                <div class="col-sm-6 col-md-6 mt-5">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">{{trans('admin/datatable.phone')}} <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="phone"
                                               class="form-control mb-3 input_field"
                                               placeholder="{{trans('admin/datatable.phone')}}"
                                               id="phone"
                                               value="{{ old('phone') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">{{trans('admin/datatable.phone_2')}}
                                            <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="phone_2"
                                               class="form-control mb-3 input_field"
                                               placeholder="{{trans('admin/datatable.phone_2')}}"
                                               id="phone"
                                               value="{{ old('phone_2') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 ">
                                    <x-admin.number-input name="age"
                                    ></x-admin.number-input>
                                </div>

                                <div class="col-sm-6 col-md-6 ">
                                    <x-admin.drop-down-input name="gender" :options="['male' => __('admin/datatable.male'),
                                        'female' => __('admin/datatable.female')]"></x-admin.drop-down-input>
                                </div>


                                <div class="col-sm-6 col-md-6 ">
                                    <x-admin.drop-down-input name="referral"
                                                             :options="[
                                            'old_client' => __('admin/datatable.old_client'),
                                            'friends' => __('admin/datatable.friends'),
                                            'physician' => __('admin/datatable.physician'),
                                            'google' => __('admin/datatable.google'),
                                            'facebook' => __('admin/datatable.facebook'),
                                            'other' => __('admin/datatable.other'),
                                            ]"></x-admin.drop-down-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-input name="referral_desc"></x-admin.text-input>
                                </div>

                                <div class="card-header ">
                                    <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                                        معلومالت الكشف
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-4 mt-5">
                                    <x-admin.drop-down-input label="insurance_company_id" name="insurance_company_id"
                                                             :options="$insuranceCompanies" key-of-option="id"
                                                             key-of-value="name"></x-admin.drop-down-input>
                                </div>

                                <div class="col-sm-2 col-md-2 mt-5">
                                    <x-admin.number-input name="examination_price_before_discount"

                                    ></x-admin.number-input>
                                </div>

                                <div class="col-sm-2 col-md-2 mt-5">
                                    <x-admin.number-input name="examination_price_discount"
                                                           value="0"
                                    ></x-admin.number-input>
                                </div>

                                <div class="col-sm-2 col-md-2 mt-5">
                                    <x-admin.number-input   name="examination_price"
                                    ></x-admin.number-input>
                                </div>


                                <div class="col-sm-2 col-md-2 mt-5">
                                    <x-admin.drop-down-input label="payment_type" name="payment_type" :options="[
                                                             'visa' => 'فيزا / ماستر كارد',
                                                             'post_paid' => 'الدفع الآجل',
                                                             'cash' => __('admin/datatable.cash'),
                                                             ]"/>
                                </div>

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.date-picker-input name="examination_date"
                                                               value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>
                                </div>

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.drop-down-input name="doctor_id" label="doctor_id"
                                                             key-of-value="name" key-of-option="id"
                                                             :options="$doctors"></x-admin.drop-down-input>
                                </div>

{{--                                <div class="col-sm-12 col-md-12">--}}
{{--                                    <x-admin.drop-down-input class="id"--}}
{{--                                                             label="category"--}}
{{--                                                             name="category_id"--}}
{{--                                                             :options="$categories"--}}
{{--                                                             key-of-value="name"--}}
{{--                                                             key-of-option="id"></x-admin.drop-down-input>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6 col-md-6">--}}
{{--                                    <x-admin.number-input name="doctor_examination_percentage"--}}
{{--                                    ></x-admin.number-input>--}}
{{--                                </div>--}}

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.text-area-input name="consultant_name"></x-admin.text-area-input>
                                </div>


                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.text-area-input name="examination_notes"></x-admin.text-area-input>
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
                            <a href="{{ route('admin.contract-users.index') }}" class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span></a>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header ">
                            <div class="card-title">{{trans('admin/datatable.image')}}</div>
                        </div>
                        <div class="form-group p-2">
                            <input type="file" name="image" class="dropify input_field p-5"
                                   data-height="180"/>
                            <input type="hidden" id="image">
                        </div>
                    </div>
                </div>


            </div>

        </form>


        @endsection

        @push('scripts')
            <script src="{{ URL::asset('admin_asset/plugins/date-picker/date-picker.js')}}"></script>
            <script src="{{ URL::asset('admin_asset/plugins/date-picker/jquery-ui.js')}}"></script>
            <script src="{{ URL::asset('admin_asset/plugins/input-mask/jquery.maskedinput.js')}}"></script>

            <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>

            @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
        'request'=>'App/Http/Requests/Admin/User/CreateUserRequest','on_start'=>false])



            <script>
                $(document).on('keyup input', '#examination_price_discount', function () {
                    updateExaminationPrice()
                });
                $(document).on('keyup input', '#examination_price_before_discount', function () {
                    updateExaminationPrice()
                });

                $(document).on('change', '#examination_price_before_discount', function () {
                    console.log('updateExaminationPrice')
                    updateExaminationPrice()
                });

                const beforeDiscountInput = document.getElementById('examination_price_before_discount');
                const discountInput = document.getElementById('examination_price_discount');
                const examinationPriceInput = document.getElementById('examination_price');

                beforeDiscountInput.addEventListener('input', updateExaminationPrice);

                function updateExaminationPrice() {
                    const beforeDiscountValue = parseFloat(beforeDiscountInput.value);
                    const discountValue = parseFloat(discountInput.value);

                    console.log(beforeDiscountValue)
                    console.log(discountValue)

                    if (!isNaN(beforeDiscountValue) && !isNaN(discountValue)) {
                        const discountedPrice = beforeDiscountValue * (1 - discountValue / 100);
                        examinationPriceInput.value = discountedPrice.toFixed(2); // Round to 2 decimal places
                    } else {
                        examinationPriceInput.value = ''; // Clear the price if invalid input
                    }
                }

                $('#referral_desc').closest('.col-sm-12').css('display', 'none');

                $('#referral').on("change", function () {
                    var selectedValue = $(this).val(); // Get the selected value

                    if (selectedValue === 'other') {
                        console.log('Selected value is "other"');
                        $('#referral_desc').closest('.col-sm-12').css('display', 'block');
                    } else {
                        $('#referral_desc').closest('.col-sm-12').css('display', 'none');
                    }
                });


                $("#insurance_company_id").change(function () {
                    var insurance_company_id = this.value;

                    $.ajax({
                        url: '{{ route("admin.insurance-companies.get-price") }}', // Replace 'your_insurance_company_id' with the actual value
                        type: 'GET',
                        data: {insurance_company_id: insurance_company_id},
                        success: function (data) {
                            console.log(data);
                            $("#examination_price_before_discount").val(data);
                            updateExaminationPrice()

                        },
                    });
                });

                $(document).on('change', '#category_id, #doctor_id', function () {
                    var doctorId = $('#doctor_id').val();
                    var categoryId = $('#category_id').val();
                    console.log(doctorId)
                    console.log(categoryId)

                    // AJAX request
                    $.ajax({
                        url: '{{ route("admin.contract-users.get-doctor-examination-percentage") }}', // Replace 'your_insurance_company_id' with the actual value
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            doctor_id: doctorId,
                            category_id: categoryId
                        },
                        success: function (response) {
                            // Handle success response
                            console.log(response);
                            $("#doctor_examination_percentage").val(response);

                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
                });
            </script>

    @endpush
