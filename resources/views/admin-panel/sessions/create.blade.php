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
            <li class="breadcrumb-item1"><a href="{{route('admin.sessions.index')}}" class="">
                    @lang('admin/dashboard.menus.sessions')</a>
            </li>
            <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_session')
            </li>
        </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.c_session')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.sessions.store')}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card datable-custom ">
                        <div class="card-header">
                            <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                                المعلومات الاساسية
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                {{--                                <div class="col-sm-12 col-md-12">--}}
                                {{--                                    <x-admin.drop-down-input label="user_id" name="user_id"--}}
                                {{--                                                             :options="$users" key-of-option="id"--}}
                                {{--                                                             key-of-value="name"></x-admin.drop-down-input>--}}
                                {{--                                </div>--}}
                                <div class="col-sm-12 col-md-12">
                                    <x-admin.select2 label="user_id"
                                                     name="user_id"
                                                     :options="$users"
                                                     keyOfValue="name"
                                                     keyOfOption="id"
                                                     class="select2-show-search select2-hidden-accessible"
                                                     :readonly="false"/>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header"><h1 class="fs-18">بيانات العميل</h1></div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                    <tr>
                                                        <td><span class="font-weight-semibold w-20">الاسم </span></td>
                                                        <td id="user_name">---</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="font-weight-semibold w-50">رقم الموبايل </span>
                                                        </td>
                                                        <td id="user_mobile">---</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="font-weight-semibold w-50">الطبيب المتابع للحالة</span>
                                                        </td>
                                                        <td id="user_doctor">---</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span
                                                                class="font-weight-semibold w-50">الطبيب المحول للحالة</span>
                                                        </td>
                                                        <td id="user_referral_doctor">---</td>
                                                    </tr>

                                                    <tr id="company">
                                                        <td><span
                                                                class="font-weight-semibold w-50"> الشركة </span>
                                                        </td>
                                                        <td id="user_company">---</td>
                                                    </tr>

                                                    <tr id="company">
                                                        <td><span
                                                                class="font-weight-semibold w-50"> سعر الكشف </span>
                                                        </td>
                                                        <td id="examination_price">---</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="font-weight-semibold w-50">الملاحظات </span>
                                                        </td>
                                                        <td id="user_notes">---</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card datable-custom ">
                        <div class="card-header">
                            <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                                الجلسات
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12 ">

                                    <div class="destinations-group mb-3 "
                                         id="dropdown-container"> {{-- Owners Group --}}

                                        @include('admin-panel.sessions.partials.cash-session',['doctors' => $doctors])

                                    </div>

                                    <div class="col-sm-1 col-md-1 mb-4">
                                        <button type="button" id="add-destination" class="btn btn-primary"><i
                                                class="fe fe-plus me-2"></i>أضف جلسة جديد
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card datable-custom ">
                        <div class="card-header">
                            <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                                سعر الجلسات
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6 col-md-6">
                                    <x-admin.number-input symbol="جنيه" name="total_sessions_debt_for_client"
                                    ></x-admin.number-input>
                                </div>


                                <div class="col-sm-6 col-md-6">
                                    <x-admin.number-input symbol="جنيه" name="total_sessions_debt_for_company"
                                    ></x-admin.number-input>
                                </div>


                                <div class="col-sm-12 col-md-12 ">
                                    <x-admin.drop-down-input name="status" selected="pending" :options="[
                                        'pending' => 'قيد المراجعه',
                                        'onProgress' => 'مستمره',
                                        'finished' => 'منتهية',
                                        ]"></x-admin.drop-down-input>
                                </div>


                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-area-input name="notes"></x-admin.text-area-input>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Row-->


                <div class="col-xl-12 col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button"
                                    class="btn btn-success me-2"><span
                                    class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                            </button>
                            <a href="{{route('admin.sessions.index')}}"
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

            <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
            <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.1.57/js/jquery.inputmask.js"></script>
            <script src="{{ URL::asset('admin_asset/js/sessions-repeater.js') }}"></script>


            @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
        'request'=>'App/Http/Requests/Admin/System/Admin/CreateSystemUserRequest','on_start'=>false])

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    document.getElementById("category_id").disabled = true;

                    // Get the parent div of the element by its ID
                    var parentDiv = document.querySelector("#receipt_number").closest('.form-group');
                    parentDiv.style.display = "none";
                });

                $('#total_sessions_debt_for_company').closest('.form-group').hide();

                $(document).on('change', '.row.clients .main_category_id', function () {
                    var main_category_id = this.value;

                    var categorySelect = $(this).closest('.row.clients').find('.category_id');

                    $.ajax({
                        url: '{{ route("admin.insurance-company-categories.get-sub-category") }}',
                        type: 'POST',
                        data: {main_category_id: main_category_id},
                        success: function (data) {
                            categorySelect.empty();

                            data.data.forEach(function (option) {
                                categorySelect.append($('<option>', {
                                    value: option.id,
                                    text: option.name
                                }));
                            });

                            categorySelect.prop('disabled', false);

                            categorySelect.trigger('change');

                        },
                    });
                });


                {{--$("#main_category_id").change(function () {--}}

                {{--    var main_category_id = this.value;--}}

                {{--    $.ajax({--}}
                {{--        url: '{{ route("admin.insurance-company-categories.get-sub-category") }}', // Replace 'your_insurance_company_id' with the actual value--}}
                {{--        type: 'POST',--}}
                {{--        data: {main_category_id: main_category_id},--}}
                {{--        success: function (data) {--}}
                {{--            // Assuming data is an object with a 'data' property containing an array of options--}}
                {{--            var categorySelect = document.getElementById("category_id");--}}

                {{--            // Clear existing options--}}
                {{--            categorySelect.innerHTML = "";--}}

                {{--            // Append new options--}}
                {{--            data.data.forEach(function (option) {--}}
                {{--                var optionElement = document.createElement("option");--}}
                {{--                optionElement.value = option.id;--}}
                {{--                optionElement.text = option.name;--}}
                {{--                categorySelect.appendChild(optionElement);--}}
                {{--            });--}}

                {{--            // Enable the select element--}}
                {{--            categorySelect.disabled = false;--}}
                {{--            $("#category_id").trigger("change");--}}

                {{--        },--}}
                {{--    });--}}


                {{--});--}}

                $(document).on('change', '.category_id', function () {
                    var category_id = $(this).val();
                    var user_id = $('#user_id').val();

                    $.ajax({
                        url: '{{ route("admin.sessions.get-category-price") }}',
                        type: 'GET',
                        data: {category_id: category_id, user_id: user_id},
                        success: function (data) {
                            var parentElement = $(this).closest('.row.clients');
                            var sessionPriceInput = parentElement.find('.session_price');
                            var discountPriceInput = parentElement.find('.discount_percentage_value');
                            var old_priceInput = parentElement.find('.old_price');

                            if (data.data.price) {
                                console.log('cash')
                                sessionPriceInput.val(data.data.price);
                            }

                            if (data.data.discount_price_value) {
                                console.log('contact')
                                sessionPriceInput.val(data.data.discount_price_value);
                                // discountPriceInput.val(data.percentage);
                                // old_priceInput.text(' السعر قبل خصم نسبه التحمل ' + data.category_price + ' جنيه ');
                            }
                            sessionPriceInput.trigger('change');

                        }.bind(this), // To retain the correct context of 'this'
                    });
                });


                $(document).on('keyup input', '.discount_percentage_value', function () {
                    if (contractType === 'cash') {
                        updateCashTotal($(this));
                    } else {
                        updateTotal($(this));
                    }

                });


                // Handling change event
                $(document).on('change', '.sessions_count', function () {
                    if (contractType === 'cash') {
                        updateCashTotal($(this));
                    } else {
                        updateTotal($(this));
                    }
                });

                // Handling keyup and input events for live updates while typing
                $(document).on('keyup input', '.sessions_count', function () {
                    if (contractType === 'cash') {
                        updateCashTotal($(this));
                    } else {
                        updateTotal($(this));
                    }
                });

                $(document).on('keyup input', '#discount_value', function () {
                    if (contractType === 'cash') {
                        updateCashTotal($(this));
                    } else {
                        updateTotal($(this));
                    }
                });

                $(document).on('keyup input', '#additional_services_price', function () {
                    if (contractType === 'cash') {
                        updateCashTotal($(this));
                    } else {
                        updateTotal($(this));
                    }
                });

                let contractType;

                // Function to update the total based on session price and count
                function updateTotal(inputElement) {
                    console.log('Contract Type:', contractType);

                    var parentElement = $(inputElement).closest('.row.clients');
                    var sessionPriceInput = parentElement.find('.session_price');
                    var sessionCountInput = parentElement.find('.sessions_count');

                    var sessionClientDebtInput = parentElement.find('.sessions_debt_for_client');
                    var sessionCompanyDebtInput = parentElement.find('.sessions_debt_for_company');

                    var totalInput = parentElement.find('.total_sessions_debt_for_client_session');
                    var totalCompanyInput = parentElement.find('.total_sessions_debt_for_company_session');

                    var totalClient = 0;
                    var totalCompany = 0;

                    var sessionPrice = parseFloat(sessionPriceInput.val()) || 0;
                    var sessionCount = parseFloat(sessionCountInput.val()) || 0;
                    var discountValue = parseFloat($('#discount_value').val()) || 0; // Parsing the discount value as a float


                    var discountPriceInput = parentElement.find('.discount_percentage_value');

                    var discountPercentage = parseFloat(discountPriceInput.val());


                    if (discountPercentage === 0) {
                        discountPercentage = 100;
                    }

                    if (!isNaN(sessionPrice) && !isNaN(discountPercentage)) {
                        totalClient = Math.max(0, ((sessionPrice * discountPercentage) / 100) * sessionCount);
                        totalCompany = Math.max(0, ((sessionPrice * sessionCount) - ((sessionPrice * discountPercentage) / 100) * sessionCount));
                    }

                    var clientDebt = Math.max(0, ((sessionPrice * discountPercentage) / 100));
                    var companyDebt = ((sessionPrice) - ((sessionPrice * discountPercentage) / 100));

                    sessionClientDebtInput.val(parseFloat(clientDebt));
                    sessionCompanyDebtInput.val(parseFloat(companyDebt));

                    totalCompanyInput.val(parseFloat(totalCompany));
                    totalInput.val(parseFloat(totalClient));


                    var total_sessions_debt_for_client_session_sum = 0;
                    $('.total_sessions_debt_for_client_session').each(function () {
                        var val = parseFloat($(this).val());
                        if (!isNaN(val)) {
                            total_sessions_debt_for_client_session_sum += val;
                        }
                    });

                    var total_sessions_debt_for_company_session_sum = 0;
                    $('.total_sessions_debt_for_company_session').each(function () {
                        var val = parseFloat($(this).val());
                        if (!isNaN(val)) {
                            total_sessions_debt_for_company_session_sum += val;
                        }
                    });


                    $('#total_sessions_debt_for_client').val(total_sessions_debt_for_client_session_sum)
                    $('#total_sessions_debt_for_company').val(total_sessions_debt_for_company_session_sum)
                }

                function updateCashTotal(inputElement) {
                    console.log('Contract Type:', contractType);

                    var parentElement = $(inputElement).closest('.row.clients');
                    var sessionPriceInput = parentElement.find('.session_price');
                    var sessionCountInput = parentElement.find('.sessions_count');

                    var sessionClientDebtInput = parentElement.find('.sessions_debt_for_client');
                    var sessionCompanyDebtInput = parentElement.find('.sessions_debt_for_company');

                    var totalInput = parentElement.find('.total_sessions_debt_for_client_session');
                    var totalCompanyInput = parentElement.find('.total_sessions_debt_for_company_session');

                    var totalClient = 0;
                    var totalCompany = 0;

                    var sessionPrice = parseFloat(sessionPriceInput.val()) || 0;
                    var sessionCount = parseFloat(sessionCountInput.val()) || 0;
                    var discountValue = parseFloat($('#discount_value').val()) || 0; // Parsing the discount value as a float


                    var discountPriceInput = parentElement.find('.discount_percentage_value');

                    var discountPercentage = parseFloat(discountPriceInput.val());


                    if (discountPercentage === 0) {
                        discountPercentage = 100;
                    }

                    if (discountPercentage === 100) {
                        var clientDebt = sessionPrice;

                    }else{
                        var clientDebt = sessionPrice - ((sessionPrice * discountPercentage) / 100);
                    }


                    console.log(clientDebt)

                    if (!isNaN(sessionPrice) && !isNaN(discountPercentage)) {
                        totalClient = clientDebt * sessionCount;
                    }


                    sessionClientDebtInput.val(parseFloat(clientDebt));

                    totalInput.val(parseFloat(totalClient));


                    var total_sessions_debt_for_client_session_sum = 0;
                    $('.total_sessions_debt_for_client_session').each(function () {
                        var val = parseFloat($(this).val());
                        if (!isNaN(val)) {
                            total_sessions_debt_for_client_session_sum += val;
                        }
                    });

                    var total_sessions_debt_for_company_session_sum = 0;
                    $('.total_sessions_debt_for_company_session').each(function () {
                        var val = parseFloat($(this).val());
                        if (!isNaN(val)) {
                            total_sessions_debt_for_company_session_sum += val;
                        }
                    });


                    $('#total_sessions_debt_for_client').val(total_sessions_debt_for_client_session_sum)
                    $('#total_sessions_debt_for_company').val(total_sessions_debt_for_company_session_sum)
                }


                $(document).on('change', '.session_price', function () {
                    var parentElement = $(this).closest('.row.clients');
                    var sessionPriceInput = parentElement.find('.session_price');
                    var sessionCountInput = parentElement.find('.sessions_count');
                    var discountValue = $('#discount_value').val();

                    var totalInput = parentElement.find('.total_sessions_debt_for_client_session');


                    totalInput.val(sessionPriceInput.val() * sessionCountInput.val());

                    var total_sessions_debt_for_client_session_sum = 0;
                    $('.total_sessions_debt_for_client_session').each(function () {
                        var val = parseFloat($(this).val());
                        if (!isNaN(val)) {
                            total_sessions_debt_for_client_session_sum += val;
                        }
                    });

                    var total_sessions_debt_for_company_session_sum = 0;
                    $('.total_sessions_debt_for_company_session').each(function () {
                        var val = parseFloat($(this).val());
                        if (!isNaN(val)) {
                            total_sessions_debt_for_company_session_sum += val;
                        }
                    });


                    $('#total_sessions_debt_for_client').val(total_sessions_debt_for_client_session_sum)
                    $('#total_sessions_debt_for_company').val(total_sessions_debt_for_company_session_sum)

                });

                $("#doctor_id").change(function () {

                    var doctor_id = this.value;

                    $.ajax({
                        url: '{{ route("admin.sessions.get-doctor-profit-percentage") }}', // Replace 'your_insurance_company_id' with the actual value
                        type: 'GET',
                        data: {doctor_id: doctor_id},
                        success: function (data) {
                            // Assuming data is an object with a 'data' property containing an array of options
                            $("#profit_percentage").val(data.data);

                        },
                    });
                });


                $("#contract_type").change(function () {
                    var contractType = this.value;

                    if (contractType === 'contract') {
                        // Show elements when contract type is selected
                        $('#receipt_number').closest('.form-group').hide();
                        $('#discount_percentage_value').closest('.form-group').show();
                        $('#receipt_count').closest('.form-group').show();
                    } else {
                        // Show elements when contract type is not selected
                        $('#receipt_number').closest('.form-group').show();
                        $('#discount_percentage_value').closest('.form-group').hide();
                        $('#receipt_count').closest('.form-group').hide();
                    }
                });


                $("#user_id").change(function () {

                    var userId = this.value;
                    var element = document.getElementById("dropdown-container");

                    $.ajax({
                        url: '{{ route("admin.sessions.get-user") }}', // Replace 'your_insurance_company_id' with the actual value
                        type: 'GET',
                        data: {user_id: userId},
                        success: function (data) {
                            // Assuming data is an object with a 'data' property containing an array of options
                            $("#user_name").text(data.data.name);
                            $("#user_mobile").text(data.data.phone);
                            $("#user_age").text(data.data.age);
                            $("#user_doctor").text(data.doctor_name);

                            if (data.data.examination_price) {
                                $("#examination_price").text(data.data.examination_price + ' جنيه ');

                            } else {
                                $("#examination_price").text('لم يتم إضافه سعر الكشف');
                            }


                            if (data.doctor_name) {
                                $("#user_doctor").text(data.doctor_name);

                            } else {
                                $("#user_doctor").text('لم يتم تعيينه بعد');
                            }

                            if (data.company_name) {
                                $('#company').show();
                                $("#user_company").text(data.company_name);

                            } else {
                                $('#company').hide();
                            }

                            if (data.referral_doctor_name) {
                                $("#user_referral_doctor").text(data.referral_doctor_name);

                            } else {
                                $("#user_referral_doctor").text('لا يوجد');
                            }

                            if (data.data.examination_notes) {
                                $("#user_notes").text(data.data.examination_notes);

                            } else {
                                $("#user_notes").text('لا توجد');
                            }

                            var discountLabel = document.getElementById('discount_value_label');

                            if (data.data.contract_type === 'contract') {
                                // $('#insurance_company_id').closest('.form-group').show();
                                // document.getElementById("contract_final_total").removeAttribute("readonly");
                                // document.getElementById("contract_price_before_discount").removeAttribute("readonly");

                                if (element) {
                                    element.innerHTML = "";
                                    element.insertAdjacentHTML('beforeend', data.html);

                                }

                                $('#total_sessions_debt_for_company').closest('.form-group').show();

                                if (discountLabel) {
                                    discountLabel.innerText = 'نسبة التحمل للتعاقد';
                                }

                                contractType = 'contract';


                            } else if (data.data.contract_type === 'cash') {
                                // $('#insurance_company_id').closest('.form-group').hide();
                                // document.getElementById("contract_final_total").setAttribute("readonly", true);
                                // document.getElementById("contract_price_before_discount").setAttribute("readonly", true);

                                $('#total_sessions_debt_for_company').closest('.form-group').hide();

                                // document.getElementById("insurance_company_id").value = "0";
                                if (element) {
                                    element.innerHTML = "";
                                    element.insertAdjacentHTML('beforeend', data.html);
                                }

                                if (discountLabel) {
                                    discountLabel.innerText = 'قيمة الخصم';
                                }

                                contractType = 'cash';
                            }
                        },
                    });
                });

            </script>

    @endpush
