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
            <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.u_session')
            </li>
        </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.u_session')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.sessions.update',['session_id'=>$session->id])}}"
              enctype="multipart/form-data"
              class="">
            @csrf

            <input type="hidden" name="user_id" value="{{$session->user_id}}">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card datable-custom ">
                        <div class="card-header">
                            <div class="card-title"><h1 class="fs-18">بيانات العميل</h1></div>

                        </div>
                        <div class="card-body">
                            <div class="row">

{{--                                <div class="col-sm-12 col-md-12">--}}
{{--                                    <x-admin.drop-down-input label="user_id" name="user_id"--}}
{{--                                                             :options="$users" key-of-option="id"--}}
{{--                                                             :selected="$session->user_id"--}}
{{--                                                             :readonly="true"--}}
{{--                                                             key-of-value="name"></x-admin.drop-down-input>--}}
{{--                                </div>--}}


{{--                                <div class="col-sm-12 col-md-12">--}}
{{--                                    <x-admin.select2 label="user_id"--}}
{{--                                                     :selected="$session->user_id"--}}
{{--                                                     name="user_id"--}}
{{--                                                     :options="$users"--}}
{{--                                                     keyOfValue="name"--}}
{{--                                                     keyOfOption="id"--}}
{{--                                                     class="select2-show-search select2-hidden-accessible"--}}
{{--                                                     :readonly="false" />--}}
{{--                                </div>--}}

                                <div class="col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                    <tr>
                                                        <td><span class="font-weight-semibold w-20">الاسم </span></td>
                                                        <td id="user_referral_doctor">{{ $user->name ?? '---' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="font-weight-semibold w-50">رقم الموبايل </span>
                                                        </td>
                                                        <td id="user_referral_doctor">{{ $user->phone ?? '---' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="font-weight-semibold w-50">الطبيب المتابع للحالة</span>
                                                        </td>
                                                        <td id="user_referral_doctor">{{ $doctor->name ?? '---' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span
                                                                class="font-weight-semibold w-50">الطبيب المحول للحالة</span>
                                                        </td>
                                                        <td id="user_referral_doctor">{{ $referral_doctor->name ?? '---' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span
                                                                class="font-weight-semibold w-50"> الشركة </span>
                                                        </td>
                                                        <td id="user_company">{{ $company->name ?? '---' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="font-weight-semibold w-50">الملاحظات </span>
                                                        </td>
                                                        <td id="user_notes">{{ $user->notes ?? '---' }}</td>
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
                                        @foreach($session->records as $record)
                                            <div class="row clients destination-item-{{$loop->index}} mb-5">

                                                @php
                                                    $subCategories = \App\Models\Category::query()->where('parent_id',$record->main_category_id)->get();
                                                @endphp
                                                <div class="col-sm-4 col-md-4">
                                                    <x-admin.drop-down-input label="main_category_id"
                                                                             name="sessions[0][main_category_id]"
                                                                             class="main_category_id"
                                                                             :selected="$record->main_category_id"
                                                                             :options="$categories" key-of-option="id"
                                                                             key-of-value="name"></x-admin.drop-down-input>
                                                </div>


                                                <div class="col-sm-4 col-md-4">
                                                    <x-admin.drop-down-input label="category_id"
                                                                             name="sessions[0][category_id]"
                                                                             class="category_id"
                                                                             :selected="$record->category_id"
                                                                             :options="$subCategories"
                                                                             key-of-option="id"
                                                                             key-of-value="name"></x-admin.drop-down-input>
                                                </div>



                                                <div class="col-sm-4 col-md-4">
                                                    <x-admin.drop-down-input name="sessions[0][doctor_id]" :selected="$record->doctor_id" label="doctor_id" class="doctor_id"
                                                                             key-of-value="name" key-of-option="id"
                                                                             :options="$doctors"></x-admin.drop-down-input>
                                                </div>

                                                @if($session->contract_type == 'contract')
                                                    <div class="col-sm-4 col-md-4">
                                                        <x-admin.number-input label="session_price"
                                                                              name="sessions[0][session_price]"
                                                                              :value="$record->session_price"
                                                                              class="session_price"></x-admin.number-input>
                                                    </div>
                                                @else
                                                    <div class="col-sm-4 col-md-4">
                                                        <x-admin.number-input label="session_price"
                                                                              name="sessions[0][session_price]"
                                                                              :value="$record->session_price"
                                                                              class="session_price"></x-admin.number-input>
                                                    </div>
                                                @endif


                                                <div class="col-sm-3 col-md-3">
                                                    <x-admin.number-input label="sessions_count" class="sessions_count"
                                                                          :value="$record->sessions_count"
                                                                          name="sessions[0][sessions_count]"/>
                                                </div>

                                                @if($session->contract_type == 'contract')
                                                    <div class="col-sm-3 col-md-3">
                                                        <x-admin.number-input label="total" class="total"
                                                                              :value="$record->total"
                                                                              name="sessions[0][total]"/>
                                                    </div>
                                                @else
                                                    <div class="col-sm-3 col-md-3">
                                                        <x-admin.number-input label="total" class="total"
                                                                              :value="$record->total"
                                                                              name="sessions[0][total]"/>
                                                    </div>
                                                @endif

                                                @if($session->contract_type == 'contract')
                                                    <div class="col-sm-3 col-md-3">

                                                        <div class="col-sm-12 col-md-12">
                                                            <x-admin.number-input label="discount_percentage_value"
                                                                                  :value="$record->discount_percentage_value"
                                                                                  name="sessions[0][discount_percentage_value]"
                                                                                  class="discount_percentage_value"></x-admin.number-input>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12">
                                                            <x-admin.number-input label="receipt_count"
                                                                                  class="receipt_count"
                                                                                  :value="$record->receipt_count"
                                                                                  name="sessions[0][receipt_count]"></x-admin.number-input>
                                                        </div>

                                                    </div>
                                                @endif

                                                <div class="col-sm-6 col-md-6">
                                                    <x-admin.text-area-input rows="2" label="notes" class="notes"
                                                                             :value="$record->notes"
                                                                             name="sessions[0][notes]"/>
                                                </div>
                                                <div class="col-sm-1 col-md-1 d-none delete-destination-button">
                                                    <button type="button" id="delete-destination-0"
                                                            class="delete-destination btn btn-icon btn-md mt-6 btn-danger">
                                                        <i
                                                            class="fe fe-trash "></i></button>
                                                </div>

                                                <div class="card-header" style=" min-height: 5px; "></div>
                                            </div>

                                        @endforeach

                                    </div>

                                    <div class="col-sm-1 col-md-1 mb-4">
                                        <button type="button" id="add-destination" class="btn btn-primary"><i
                                                class="fe fe-plus me-2"></i>أضف جلسة جديد
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 ">
                                    <x-admin.text-area-input :value="$session->additional_services" name="additional_services"></x-admin.text-area-input>
                                </div>

                                <div class="col-12 ">
                                    <x-admin.number-input  :value="$session->additional_services_price" name="additional_services_price"></x-admin.number-input>
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
                                @if($session->contract_type == 'contract')
                                    <div class="col-sm-4 col-md-4">
                                        <x-admin.number-input name="contract_price_before_discount"
                                                              :value="$session->contract_price_before_discount"
                                        ></x-admin.number-input>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <x-admin.number-input value="0" name="discount_value" label="discount_value_contract"
                                                              :value="$session->discount_value"></x-admin.number-input>
                                    </div>
                                @else
                                    <div class="col-sm-4 col-md-4">
                                        <x-admin.number-input name="contract_price_before_discount"
                                                              :value="$session->contract_price_before_discount"
                                        ></x-admin.number-input>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <x-admin.number-input value="0" name="discount_value" label="discount_value_cash"
                                                              :value="$session->discount_value"></x-admin.number-input>
                                    </div>
                                @endif




                                @if($session->contract_type == 'contract')
                                    <div class="col-sm-4 col-md-4">
                                        <x-admin.number-input name="contract_final_total"
                                                              :value="$session->contract_final_total"
                                        ></x-admin.number-input>
                                    </div>

                                @else
                                    <div class="col-sm-4 col-md-4">
                                        <x-admin.number-input name="contract_final_total"
                                                              :value="$session->contract_final_total"
                                        ></x-admin.number-input>
                                    </div>
                                @endif


                                    <div class="col-sm-12 col-md-12 ">
                                        <x-admin.drop-down-input name="status" selected="pending" :selected="$session->status" :options="[
                                        'pending' => 'قيد المراجعه',
                                        'onProgress' => 'مستمره',
                                        'finished' => 'منتهية',
                                        ]"></x-admin.drop-down-input>
                                    </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-area-input name="notes"
                                                             :value="$session->notes"></x-admin.text-area-input>
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

                    $.ajax({
                        url: '{{ route("admin.sessions.get-category-price") }}',
                        type: 'GET',
                        data: {category_id: category_id, user_id: {{$session->user_id}}},
                        success: function (data) {
                            var parentElement = $(this).closest('.row.clients');
                            var sessionPriceInput = parentElement.find('.session_price');
                            var discountPriceInput = parentElement.find('.discount_percentage_value');

                            if (data.data.price) {
                                sessionPriceInput.val(data.data.price);
                            }

                            if (data.data.discount_price_value) {
                                sessionPriceInput.val(data.data.discount_price_value);
                                discountPriceInput.val(data.data.discount_percentage_value);
                            }
                            sessionPriceInput.trigger('change');

                        }.bind(this), // To retain the correct context of 'this'
                    });
                });


                // Handling change event
                $(document).on('change', '.sessions_count', function () {
                    updateTotal($(this));
                });

                // Handling keyup and input events for live updates while typing
                $(document).on('keyup input', '.sessions_count', function () {
                    updateTotal($(this));
                });

                $(document).on('keyup input', '#discount_value', function () {
                    updateTotal($(this));
                });

                $(document).on('keyup input', '#additional_services_price', function () {
                    updateTotal($(this));
                });

                // Function to update the total based on session price and count
                function updateTotal(inputElement) {
                    var parentElement = inputElement.closest('.row.clients');
                    var sessionPriceInput = parentElement.find('.session_price');
                    var sessionCountInput = parentElement.find('.sessions_count');
                    var totalInput = parentElement.find('.total');

                    var sessionPrice = parseFloat(sessionPriceInput.val()) || 0;
                    var sessionCount = parseFloat(sessionCountInput.val()) || 0;
                    var discountValue = $('#discount_value').val();
                    console.log("Discount Value:", discountValue);
                    var total = sessionPrice * sessionCount;

                    totalInput.val(total);


                    totalInput.trigger('change');

                    var sum = 0;
                    $('.total').each(function () {
                        var val = parseFloat($(this).val());
                        if (!isNaN(val)) {
                            sum += val;
                        }
                    });

                    var additionalServicesPriceInput = document.getElementById("additional_services_price");

                    var additionalServicesPrice = parseFloat(additionalServicesPriceInput.value);

                    var sumAfterdiscountValue = (discountValue / 100) * sum;

                    console.log(sum);
                    $('#contract_final_total').val((sum + additionalServicesPrice) - sumAfterdiscountValue);
                    $('#contract_price_before_discount').val(sum);
                }

                $(document).on('change', '.session_price', function () {
                    var parentElement = $(this).closest('.row.clients');
                    var sessionPriceInput = parentElement.find('.session_price');
                    var sessionCountInput = parentElement.find('.sessions_count');
                    var discountValue = $('#discount_value').val();
                    console.log("Discount Value:", discountValue);
                    var totalInput = parentElement.find('.total');


                    totalInput.val(sessionPriceInput.val() * sessionCountInput.val());

                    totalInput.trigger('change');

                    var sum = 0;
                    $('.total').each(function () {
                        var val = parseFloat($(this).val());
                        if (!isNaN(val)) {
                            sum += val;
                        }
                    });

                    console.log(sum)

                    $('#contract_final_total').val(sum - discountValue)
                    $('#contract_price_before_discount').val(sum)

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
                        $('#insurance_company_id').closest('.form-group').show();
                    } else {
                        // Show elements when contract type is not selected
                        $('#receipt_number').closest('.form-group').show();
                        $('#insurance_company_id').closest('.form-group').hide();
                        $('#discount_percentage_value').closest('.form-group').hide();
                        $('#receipt_count').closest('.form-group').hide();
                    }
                });

                @if(!$session->insurance_company_id)
                $('#insurance_company_id').closest('.form-group').hide();
                @endif

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
                            $("#user_email").text(data.data.email);
                            $("#user_mobile").text(data.data.phone);
                            $("#user_age").text(data.data.age);
                            $("#user_referral_doctor").text(data.data.referralFrom);
                            $("#user_notes").text(data.data.examination_notes);

                            var discountLabel = document.getElementById('discount_value_label');

                            if (data.data.contract_type === 'contract') {
                                $('#insurance_company_id').closest('.form-group').show();
                                document.getElementById("contract_final_total").readonly = false;
                                document.getElementById("contract_price_before_discount").readonly = false;

                                if (element) {
                                    element.innerHTML = "";
                                    element.insertAdjacentHTML('beforeend', data.html);

                                }

                                discountLabel.innerText = 'نسبة التحمل للتعاقد';

                            } else if (data.data.contract_type === 'cash') {
                                $('#insurance_company_id').closest('.form-group').hide();
                                document.getElementById("contract_final_total").readonly = true;
                                document.getElementById("contract_price_before_discount").readonly = true;
                                document.getElementById("insurance_company_id").value = "0";
                                if (element) {
                                    element.innerHTML = "";
                                    element.insertAdjacentHTML('beforeend', data.html);
                                }

                                discountLabel.innerText = 'قيمة الخصم';

                            }
                        },
                    });
                });



            </script>


            <!-- Your JavaScript code -->
            <script>
                $(document).ready(function() {
                    $('#user_id').select2({width: 'resolve'});

                });
            </script>

    @endpush
