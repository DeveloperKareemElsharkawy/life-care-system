@extends('admin-panel.layouts.master')
<link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>

@section('content')
    <div class="side-app">


        <ol class="breadcrumb1">
            <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i
                        class="fe fe-home me-2"
                        aria-hidden="true"></i>
                    {{trans('admin/dashboard.dashboard')}}</a>

            </li>
            <li class="breadcrumb-item1"><a href="{{route('admin.cash-users.index')}}" class="">
                    {{trans('admin/dashboard.menus.cash_users')}}</a>
            </li>

            <li class="breadcrumb-item1 active">{{trans('admin/datatable.buttons.u_user')}}</li>
        </ol>


        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25">{{trans('admin/datatable.buttons.u_user')}}</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.cash-users.update',['user_id'=>$user->id])}}"
              enctype="multipart/form-data"
              class="">
            @csrf

            <input type="hidden" name="user_id" value="{{$user->id}}">

            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card datable-custom ">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-header ">
                                    <div class="card-title" style=" font-size: 17px; font-weight: 500; "> المعلومات
                                        الأساسية
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{trans('admin/datatable.name')}} <span
                                                class="text-red">*</span></label>
                                        <input type="text" name="name"
                                               class="form-control mb-3 input_field"
                                               placeholder="name"
                                               id="name"
                                               value="{{  $user->name }}">
                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-6 mt-5">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">{{trans('admin/datatable.phone')}} <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="phone" value="{{  $user->phone }}"
                                               class="form-control mb-3 input_field"
                                               placeholder=" {{trans('admin/datatable.phone')}}"
                                               id="phone"
                                        >

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="phone_2" class="form-label">{{trans('admin/datatable.phone_2')}}
                                            <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="phone_2" value="{{  $user->phone_2 }}"
                                               class="form-control mb-3 input_field"
                                               placeholder="{{trans('admin/datatable.phone_2')}}"
                                               id="phone_2"
                                        >

                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-6 ">
                                    <x-admin.number-input :value="$user->age" name="age"
                                    ></x-admin.number-input>
                                </div>

                                <div class="col-sm-6 col-md-6 ">
                                    <x-admin.drop-down-input :selected="$user->gender" name="gender" :options="['male' => __('admin/datatable.male'),
                                        'female' => __('admin/datatable.female')]"></x-admin.drop-down-input>
                                </div>

                                <div class="col-sm-6 col-md-6 ">
                                    <x-admin.drop-down-input :selected="$user->referral" name="referral"
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
                                    <x-admin.text-input :value="$user->referral_desc"
                                                        name="referral_desc"></x-admin.text-input>
                                </div>

                                <div class="card-header ">
                                    <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                                        معلومالت الكشف
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 mt-5">
                                    <x-admin.drop-down-input class="id"
                                                             :selected="$user->category_id"
                                                             label="category"
                                                             name="category_id"
                                                             :options="$categories"
                                                             key-of-value="name"
                                                             key-of-option="id"></x-admin.drop-down-input>
                                </div>

                                <div class="col-sm-3 col-md-3 mt-5">
                                    <x-admin.number-input name="receipt_number" :value="$user->receipt_number"
                                    ></x-admin.number-input>
                                </div>


                                <div class="col-sm-2 col-md-2 mt-5">
                                    <x-admin.number-input name="examination_price_before_discount"
                                                          :value="$user->examination_price_before_discount"
                                    ></x-admin.number-input>
                                </div>
                                <div class="col-sm-2 col-md-2 mt-5">
                                    <x-admin.number-input name="examination_price_discount"
                                                          :value="$user->examination_price_before_discount"
                                    ></x-admin.number-input>
                                </div>

                                <div class="col-sm-2 col-md-2 mt-5">
                                    <x-admin.number-input name="examination_price" :value="$user->examination_price"
                                    ></x-admin.number-input>
                                </div>


                                <div class="col-sm-2 col-md-2 mt-5">
                                    <x-admin.drop-down-input :selected="$user->payment_type" label="payment_type"
                                                             name="payment_type" :options="[
                                                             'visa' => 'فيزا / ماستر كارد',
                                                             'cash' => __('admin/datatable.cash'),
                                                             ]"/>
                                </div>

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.date-picker-input name="examination_date"
                                                               value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                                               :value="$user->examination_date"/>
                                </div>

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.drop-down-input :selected="$user->doctor_id" name="doctor_id"
                                                             label="doctor_id"
                                                             key-of-value="name" key-of-option="id"
                                                             :options="$doctors"></x-admin.drop-down-input>
                                </div>


{{--                                <div class="col-sm-6 col-md-6">--}}
{{--                                    <x-admin.number-input :value="$user->doctor_examination_percentage" name="doctor_examination_percentage"--}}
{{--                                    ></x-admin.number-input>--}}
{{--                                </div>--}}

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.text-area-input name="consultant_name"
                                                             :value="$user->consultant_name"></x-admin.text-area-input>
                                </div>

                                <div class="col-sm-6 col-md-6 mt-5">
                                    <x-admin.text-area-input :value="$user->examination_notes"
                                                             name="examination_notes"></x-admin.text-area-input>
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
                                    class="fs-15"><i class="fe fe-save me-1"></i>حفظ</span>
                            </button>
                            <a href="{{ route('admin.cash-users.index') }}" class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>إلغاء</span></a>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header ">
                            <div class="card-title">{{trans('admin/datatable.image')}}</div>
                        </div>
                        <div class="form-group p-2">
                            <input type="file" id="image" name="image" class="dropify input_field p-5"
                                   data-default-file="{{  $user->imageUrl }}"
                                   data-height="180"/>
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
        'request'=>'App/Http/Requests/Admin/Driver/UpdateDriverRequest'])

            <script>

                @if($user->referral != 'other')
                $('#referral_desc').closest('.col-sm-12').css('display', 'none');
                @endif

                $('#referral').on("change", function () {
                    const selectedValue = $(this).val(); // Get the selected value

                    if (selectedValue === 'other') {
                        console.log('Selected value is "other"');
                        $('#referral_desc').closest('.col-sm-12').css('display', 'block');
                    } else {
                        $('#referral_desc').closest('.col-sm-12').css('display', 'none');
                    }
                });
            </script>


            <script>
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

                $(document).on('keyup input', '#examination_price_before_discount', function () {
                    console.log('pressed')
                    updateExaminationPrice()
                });


                $(document).on('keyup input', '#examination_price_discount', function () {
                    updateExaminationPrice()
                });

                $(document).on('keyup input', '#examination_price', function () {
                    updateExaminationPrice()
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
                        success: function(response) {
                            // Handle success response
                            console.log(response);
                            $("#doctor_examination_percentage").val(response);

                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });

                    $.ajax({
                        url: '{{ route("admin.contract-users.get-category-price") }}', // Replace 'your_insurance_company_id' with the actual value
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            doctor_id: doctorId,
                            category_id: categoryId
                        },
                        success: function(response) {
                            // Handle success response
                            console.log(response);
                            $("#examination_price_before_discount").val(response);
                            $("#examination_price_discount").val(0);
                            updateExaminationPrice()

                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
                });

            </script>
    @endpush
