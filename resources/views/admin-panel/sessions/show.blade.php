@extends('admin-panel.layouts.master')
@push('styles')
    <link href="{{ URL::asset('admin_asset/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="side-app">


        <ol class="breadcrumb1">
            <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i
                        class="fe fe-home me-2"
                        aria-hidden="true"></i>
                    @lang('admin/dashboard.dashboard')</a>
            </li>

            <li class="breadcrumb-item1"><a href="{{route('admin.sessions.index')}}" class="">
                    @lang('admin/dashboard.menus.sessions')</a>
            </li>

            <li class="breadcrumb-item1 ">
                <a href="{{route('admin.sessions.index')}}" class="">
                    {{$user->name}}</a>

            </li>

            <li class="breadcrumb-item1 active">
                #{{rand(100,90000)}}
            </li>
        </ol>


        <!--End Page header-->
        <!-- Row -->
        <div class="row">

            <div class="col-xl-6 col-lg-5 col-md-6">
                <div class="card">
                    <div class="card-header"><h1 class="fs-18">بيانات العميل</h1></div>
                    <div class="card-body">
                        <div class="table-responsive" style=" min-height: auto; ">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                <tr>
                                    <td><span class="font-weight-semibold w-20">الاسم </span></td>
                                    <td id="user_referral_doctor">{{ $user->name ?? '---' }}</td>
                                </tr>

                                <tr>
                                    <td><span class="font-weight-semibold w-50">رقم الموبايل 1</span>
                                    </td>
                                    <td id="user_referral_doctor">{{ $user->phone ?? '---' }}</td>
                                </tr>

                                <tr>
                                    <td><span class="font-weight-semibold w-50">رقم الموبايل 2</span>
                                    </td>
                                    <td id="user_referral_doctor">{{ $user->phone_2 ?? '---' }}</td>
                                </tr>

                                <tr>
                                    <td><span class="font-weight-semibold w-50">العمر</span>
                                    </td>
                                    <td id="user_referral_doctor">{{ $user->age ?? '---' }}</td>
                                </tr>


                                <tr>
                                    <td><span class="font-weight-semibold w-50">نوع العميل</span>
                                    </td>
                                    <td id="user_referral_doctor">{{ $user->contract_type == 'cash' ?  'كاش' :'تعاقد' }}</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-lg-5 col-md-6">
                <div class="card">
                    <div class="card-header"><h1 class="fs-18">بيانات الكشف</h1></div>
                    <div class="card-body">
                        <div class="table-responsive" style=" min-height: auto; ">
                            <table class="table table-bordered mb-0">
                                <tbody>

                                <tr>
                                    <td><span
                                            class="font-weight-semibold w-50">سعر الكشف  </span>
                                    </td>
                                    <td id="user_referral_doctor">{{ $user->examination_price ?? '---' }}</td>
                                </tr>

                                <tr>
                                    <td><span
                                            class="font-weight-semibold w-50"> رقم الإيصال  </span>
                                    </td>
                                    <td id="user_referral_doctor">{{ $user->receipt_number ?? '---' }}</td>
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

                                {{--                                <tr>--}}
                                {{--                                    <td><span--}}
                                {{--                                            class="font-weight-semibold w-50"> الشركة </span>--}}
                                {{--                                    </td>--}}
                                {{--                                    <td id="user_company">{{ $company->name ?? '---' }}</td>--}}
                                {{--                                </tr>--}}

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

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header"><h1 class="fs-18">الجلسات</h1></div>

                    <div class="card-body p-0">
                        <div class="table-responsive" style=" min-height: auto; ">
                            <table class="table table-striped card-table table-vcenter text-nowrap">
                                <thead class="text-center">
                                <tr>
                                    <th>القسم الرئيسي</th>
                                    <th>القسم الفرعى</th>
                                    <th> عدد الجلسات</th>
                                    <th>سعر الجلسة</th>
                                    @if($session?->user?->contract_type && $session?->user?->contract_type == 'contract')
                                        <th>نسبة التحمل</th>
                                    @else
                                        <th>نسبة الخصم</th>
                                    @endif
                                    <th>سعر الجلسة للعميل</th>
                                    @if($session?->user?->contract_type && $session?->user?->contract_type == 'contract')

                                    <th>سعر الجلسة للشركة</th>
                                    @endif
                                    <th>الملاحظات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($session->records as $record)
                                    <tr>
                                        <td>{{$record->category->name}}</td>
                                        <td>{{$record->subCategory->name}}</td>
                                        <td>
                                            <!-- Nested Table for Number of Sessions -->
                                            <table class="table table-bordered">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td> عدد الجلسات</td>
                                                    <td>{{$record->sessions_count}}</td>
                                                </tr>
                                                <tr>
                                                    <td>عدد الجلسات المنتهية (الحضور)</td>
                                                    <td>{{  $session->attendances->where('session_record_id',$record->id)->where('status','Attended')->count() }}</td>
                                                </tr>
                                                <tr>
                                                    <td>عدد الجلسات المتبقية</td>
                                                    <td>{{
                                       (int)$record->sessions_count - $session->attendances->where('session_record_id',$record->id)->whereIn('status',['Canceled','Attended'])->count()
                                        }}</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                            <!-- End of Nested Table for Number of Sessions -->
                                        </td>
                                        <td>{{$record->session_price}} جنيه</td>
                                        <td>{{$record->discount_percentage_value}} %</td>

                                        <td>
                                            <table class="table table-bordered">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td> سعر الجلسة الواحدة</td>
                                                    <td>{{$record->sessions_debt_for_client}} جنية</td>
                                                </tr>
                                                <tr>
                                                    <td> الإجمالي</td>
                                                    <td>{{$record->sessions_debt_for_client * $session->attendances->where('session_record_id',$record->id)->where('status','Attended')->count() }}
                                                        جنية
                                                    </td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </td>

                                        @if($session?->user?->contract_type && $session?->user?->contract_type == 'contract')
                                            <td>
                                                <table class="table table-bordered">
                                                    <thead>

                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td> سعر الجلسة الواحدة</td>
                                                        <td>{{$record->sessions_debt_for_company}} جنية</td>
                                                    </tr>
                                                    <tr>
                                                        <td> الإجمالي</td>
                                                        <td>{{$record->sessions_debt_for_company * $session->attendances->where('session_record_id',$record->id)->where('status','Attended')->count() }}
                                                            جنية
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </td>
                                        @endif
                                        <td>{{$record->notes ?? 'لا يوجد'}} </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header"><h1 class="fs-18"> المعاملات المالية</h1></div>

                    <div class="card-body p-0">

                        <div class="card-body p-0">
                            <div class="table-responsive" style=" min-height: auto; ">
                                <!-- Separate Table for Summary -->
                                <table class="table table-bordered text-start">

                                    @if($session?->user?->contract_type && $session?->user?->contract_type == 'contract')
                                        <tr>
                                            <td colspan="5" class="font-weight-semibold"> مديونية الشركة</td>
                                            <td>{{$sessionPayments['total_company_debt']}} جنيه</td>

                                        </tr>
                                    @endif


                                    <tr>
                                        <td colspan="5" class="font-weight-semibold"> مديونية العميل</td>
                                        <td>{{$sessionPayments['client_debt']}} جنيه</td>

                                    </tr>
                                    <tr>
                                        <td colspan="5" class="font-weight-semibold text-success"> المبلغ المدفوع من
                                            العميل

                                        </td>
                                        <td>{{$sessionPayments['paid_amount']}} جنيه</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="font-weight-semibold text-success">المبلغ المتبقى للجلسات
                                            القادمة

                                        </td>
                                        <td>{{$sessionPayments['remaining_for_client']}} جنيه</td>
                                    </tr>

                                </table>
                                <!-- End of Separate Table for Summary -->
                            </div><!-- bd -->
                        </div><!-- bd -->

                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header"><h1 class="fs-18">إجمالى حضور الجلسات</h1></div>

                    <div class="card-body p-0">

                        <div class="card-body p-0">
                            <div class="table-responsive" style=" min-height: auto; ">
                                <!-- Separate Table for Summary -->
                                <table class="table table-bordered text-start">
                                    <tr>
                                        <td class="font-weight-semibold">إجمالى عدد الجلسات</td>
                                        <td>{{array_sum($session->records->pluck('sessions_count')->toArray())}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-semibold">إجمالى عدد الجلسات المنتهية</td>
                                        @php
                                            // Assuming $session is an instance of your Session model
 $attendances = $session->attendances()->whereHas('sessionRecord.subCategory')->where('status','Attended')->get();

 // Then you can count the attendances
 $attendanceCount = $attendances->count();
                                        @endphp

                                        <td>{{   $attendanceCount}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-semibold">إجمالى عدد الجلسات المتبقية</td>
                                        <td>{{
                                       array_sum($session->records->pluck('sessions_count')->toArray()) - $attendanceCount
                                        }}

                                        </td>
                                    </tr>

                                    {{--                                    <tr>--}}
                                    {{--                                        <td class="font-weight-semibold">إجمالى عدد الجلسات الملغاه</td>--}}
                                    {{--                                        <td>{{  $session->attendances->where('status','Canceled')->count()}}</td>--}}
                                    {{--                                    </tr>--}}

                                </table>
                                <!-- End of Separate Table for Summary -->
                            </div><!-- bd -->
                        </div><!-- bd -->

                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header"><h1 class="fs-18">تاريخ المعاملات الماديه</h1></div>

                    <div class="card-body p-0">
                        <div class="table-responsive" style=" min-height: auto; ">
                            <table class="table table-striped card-table table-vcenter text-nowrap">
                                <thead>
                                <tr>
                                    <th>الدفعة</th>
                                    <th>حاله الدفع</th>
                                    <th>الموظف</th>
                                    <th>التاريخ</th>
                                    <th>رقم الإيصال</th>
                                    <th>الملاحظات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($session->transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->payment}} جنيه</td>

                                        @if($transaction->type == 'Deposit')

                                            <td>
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <span>ايداع</span>
                                                </button>
                                            </td>

                                        @else

                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <span>سحب</span>
                                                </button>
                                            </td>
                                        @endif
                                        <td>{{ $transaction?->admin?->name}}</td>

                                        <td>{{$transaction->date}}</td>
                                        <td>{{$transaction->receipt_number}}</td>
                                        <td>{{$transaction->notes ?? 'لا يوجد'}} </td>


                                        @endforeach
                                    </tr>

                                    {{--                                <tr>--}}
                                    {{--                                    <td>2024-01-05</td>--}}
                                    {{--                                    <td>900</td>--}}
                                    {{--                                    <td>لا يوجد</td>--}}
                                    {{--                                    <td>--}}
                                    {{--                                        <button type="button" class="btn btn-warning btn-sm">--}}
                                    {{--                                            <span>سحب</span>--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </td>--}}
                                    {{--                                </tr>--}}
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div><!-- bd -->
                    </div><!-- bd -->


                </div>

                <div class="card">
                    <div class="card-header"><h1 class="fs-18">أضف معامله جديد</h1></div>

                    <div class="card-body p-0">
                        <form class="form-control mt-4" method="post"
                              action="{{ route('admin.sessions.save-transaction',['session_id' => $session->id]) }}">
                            @csrf
                            <div class="row">


                                <div class="col-6">
                                    <x-admin.number-input :is-required="true" name="payment"></x-admin.number-input>
                                </div>

                                <div class="col-6">
                                    <x-admin.date-picker-input :is-required="true" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                                               name="date"></x-admin.date-picker-input>
                                </div>

                                <div class="col-6">
                                    <x-admin.drop-down-input :is-required="true" name="type" :options="['Deposit' => __('admin/datatable.Deposit'),
                                        'Withdrawal' => __('admin/datatable.Withdrawal')]"></x-admin.drop-down-input>
                                </div>
                                <input type="hidden" name="transaction_from" value="client">


                                {{--                                <div class="col-6">--}}
                                {{--                                    <x-admin.drop-down-input selected="client" :is-required="true"--}}
                                {{--                                                             name="transaction_from" :options="[--}}
                                {{--                                    'client' =>'عميل','company' => 'شركة التأمين',]"></x-admin.drop-down-input>--}}
                                {{--                                </div>--}}

                                <div class="col-6">
                                    <x-admin.number-input :is-required="true"
                                                          name="receipt_number"></x-admin.number-input>
                                </div>

                                <div class="col-12">
                                    <x-admin.text-area-input name="notes"></x-admin.text-area-input>
                                </div>

                                <div class="col-12">

                                    <button type="submit" id="submit_button" value="apply" name="action"
                                            class="btn btn-success me-2"><span
                                            class="fs-15"><i class="fe fe-save me-1"></i>حفظ</span>
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                    <br>
                </div>

            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header"><h1 class="fs-18">تاريخ حضرو الجلسات </h1></div>

                    <div class="card-body p-0">
                        <div class="table-responsive" style=" min-height: auto; ">
                            <table class="table table-striped card-table table-vcenter text-nowrap">
                                <thead>
                                <tr>
                                    <th>الجلسة</th>
                                    <th>التاريخ</th>
                                    <th>الموظف</th>
                                    <th>الحالة</th>
                                    <th>الملاحظات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($session->attendances as $attendance)
                                    @if( $attendance?->sessionRecord?->subCategory->name && $attendance?->sessionRecord?->category->name)
                                        <tr>
                                            <td>{{ $attendance?->sessionRecord?->subCategory->name . ' / ' . $attendance?->sessionRecord?->category->name }}</td>
                                            <td>{{ $attendance->date->format('Y-m-d')}}</td>
                                            <td>{{ $attendance?->admin?->name}}</td>


                                            @if($attendance->status == 'Attended')

                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        <span>تم الحضور</span>
                                                    </button>
                                                </td>

                                            @elseif($attendance->status == 'Absent')

                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm">
                                                        <span>لم يتم الحضور</span>
                                                    </button>
                                                </td>
                                            @elseif($attendance->status == 'Canceled')

                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <span>جلسة ملغية</span>
                                                    </button>
                                                </td>

                                            @endif


                                            <td>{{$transaction->notes ?? 'لا يوجد'}} </td>
                                        </tr>
                                    @endif
                                @endforeach


                                <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>

                <div class="card">
                    <div class="card-header"><h1 class="fs-18">أضف حضور جلسة</h1></div>

                    <div class="card-body p-0">
                        <form class="form-control mt-4" method="post"
                              action="{{ route('admin.sessions.save-attendance',['session_id' => $session->id]) }}">
                            @csrf
                            <div class="row">


                                <div class="col-6">
                                    <x-admin.drop-down-input :is-required="true" name="session_record_id"
                                                             :options="$currentSessions"></x-admin.drop-down-input>
                                </div>

                                <div class="col-6">
                                    <x-admin.date-picker-input date-time-format="fr-datepicker" :is-required="true" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                                               name="date"></x-admin.date-picker-input>
                                </div>

                                <input type="hidden" name="status" value="Attended">

                                {{--                                <div class="col-4">--}}
                                {{--                                    <x-admin.drop-down-input :is-required="true" name="status" :options="[--}}
                                {{--    'Attended' => __('admin/datatable.Attended'),--}}
                                {{--                                        'Absent' => __('admin/datatable.Absent'),--}}
                                {{--                                        'Canceled' => __('admin/datatable.Canceled'),--}}
                                {{--                                        ]"></x-admin.drop-down-input>--}}
                                {{--                                </div>--}}


                                <div class="col-12">
                                    <x-admin.text-area-input name="notes"></x-admin.text-area-input>
                                </div>

                                <div class="col-12">

                                    <button type="submit" id="submit_button" value="apply" name="action"
                                            class="btn btn-success me-2"><span
                                            class="fs-15"><i class="fe fe-save me-1"></i>حفظ</span>
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                    <br>

                </div>

            </div>
            {{--            <div class="col-xl-12 col-lg-12">--}}
            {{--                <div class="card datable-custom ">--}}
            {{--                    <div class="card-header">--}}
            {{--                        <div class="card-title" style=" font-size: 17px; font-weight: 500; ">--}}
            {{--                            سعر الجلسات--}}

            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="card-body">--}}
            {{--                        <form class="form-control mt-4" method="post"--}}
            {{--                              action="{{ route('admin.sessions.save-status',['session_id' => $session->id]) }}">--}}
            {{--                            @csrf--}}
            {{--                            <div class="row">--}}

            {{--                                <div class="col-sm-12 col-md-12 ">--}}
            {{--                                    <x-admin.number-input value="0" name="remaining_amount_for_client"--}}
            {{--                                                          :value="$session->remaining_amount_for_client"></x-admin.number-input>--}}
            {{--                                </div>--}}

            {{--                                <div class="col-sm-12 col-md-12 ">--}}
            {{--                                    <x-admin.drop-down-input name="status" selected="pending"--}}
            {{--                                                             :selected="$session->status" :options="[--}}
            {{--                                        'pending' => 'قيد المراجعه',--}}
            {{--                                        'onProgress' => 'مستمره',--}}
            {{--                                        'finished' => 'منتهية',--}}
            {{--                                        ]"></x-admin.drop-down-input>--}}
            {{--                                </div>--}}

            {{--                                <div class="col-sm-12 col-md-12">--}}
            {{--                                    <x-admin.text-area-input name="notes"--}}
            {{--                                                             :value="$session->notes"></x-admin.text-area-input>--}}
            {{--                                </div>--}}


            {{--                                <div class="col-12">--}}

            {{--                                    <button type="submit" id="submit_button" value="apply" name="action"--}}
            {{--                                            class="btn btn-success me-2"><span--}}
            {{--                                            class="fs-15"><i class="fe fe-save me-1"></i>حفظ</span>--}}
            {{--                                    </button>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}


        </div>


    </div>

@endsection

@push('scripts')
    <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/js/jquery.imagesloader.js') }}"></script>


    <script src="{{ URL::asset('admin_asset/plugins/date-picker/date-picker.js')}}"></script>
    <script src="{{ URL::asset('admin_asset/plugins/date-picker/jquery-ui.js')}}"></script>
    <script src="{{ URL::asset('admin_asset/plugins/input-mask/jquery.maskedinput.js')}}"></script>

    <script src="{{ URL::asset('admin_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    <script src="{{ URL::asset('admin_asset/js/formelementadvnced.js') }}"></script>
    <script src="{{ URL::asset('admin_asset/js/form-elements.js') }}"></script>

    <script src="{{ URL::asset('admin_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    <script src="{{ URL::asset('admin_asset/js/js-repeater.js') }}"></script>

    <script src="{{ URL::asset('admin_asset/js/workers-custom.js') }}"></script>


    <script src="{{ URL::asset('admin_asset/js/file-upload.js') }}"></script>

@endpush
