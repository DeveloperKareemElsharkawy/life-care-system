<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-4">

                <table class="user-table" style="width: 100%;">
                    <tr>
                        <th>الإسم</th>
                        <td>{{$session->user->name}}</td>
                    </tr>
                    <tr>
                        <th>نوع العميل</th>
                        <td>  {{trans('admin/datatable.' . $session->user->contract_type)}}</td>
                    </tr>
                    <tr>
                        <th>الموبايل</th>
                        <td>{{$session->user->phone}}</td>
                    </tr>

                    @if($session->user->phone_2)
                        <tr>
                            <th>الموبايل البديل</th>
                            <td>{{$session->user->phone_2}}</td>
                        </tr>

                    @endif

                    <tr>
                        <th>مديونية العميل</th>
                        <td>{{$sessionPayments['client_debt']}} جنيه </td>
                    </tr>

                    <tr>
                        <th> المبلغ المدفوع من العميل</th>
                        <td>{{$sessionPayments['paid_amount']}} جنيه </td>
                    </tr>

                    <tr>
                        <th>المبلغ المتبقى للجلسات القادمة</th>
                        <td>{{$sessionPayments['remaining_for_client']}} جنيه </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="font-weight-semibold text-center text-warning fs-18">
                            <a id="modal-open" class="modal-effect modal-open-btn btn btn-success mb-3"
                               data-bs-effect="effect-scale"
                               data-bs-toggle="modal" data-session-id="{{$session->id}}"
                               href="#modalpayhistory{{$session->id}}">
                                <i class="fa fa-history me-2"></i> سجل المعاملات الماديه
                            </a>
                        </td>
                        <td colspan="1" class="font-weight-semibold text-center text-warning fs-18">
                            <a id="modal-open" class="modal-effect modal-open-btn btn btn-success mb-3"
                               data-bs-effect="effect-scale"
                               data-bs-toggle="modal" data-session-id="{{$session->id}}"
                               href="#modalpay{{$session->id}}">
                                <i class="fa fa-plus"></i>
                                أضف معامله جديده
                            </a>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-7" style="margin-right: 40px">

                <table class="user-table">
                    <thead class="thead-light">
                    <tr>
                        <th>الجلسة</th>
                        <th>سعر الجلسة</th>
                        {{--                    <th>الكل</th>--}}
                        <th>الحضور</th>
                        <th>الإجمالى</th>
                        {{--                    <th>المتبقية</th>--}}
                        {{--                        <th>أخر حضور</th>--}}
                        <th>الدكتور</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($session->records as $record)
                        <tr>
                            <td style="padding-left: 1.5rem; padding-right: 1.5rem;"> {{ $record->category->name }}
                                / {{ $record->subCategory->name }} </td>
                            <td style="padding-left: 1.5rem; padding-right: 1.5rem;"> {{ $record->sessions_debt_for_client }}
                                جنيه
                            </td>

                            {{--                        <td>{{ $record->sessions_count }}</td>--}}
                            <td>{{ $session->attendances->where('session_record_id', $record->id)->where('status', 'Attended')->count() }}</td>
                            <td>{{ $session->attendances->where('session_record_id', $record->id)->where('status', 'Attended')->count() * $record->sessions_debt_for_client }}
                                جنيه
                            </td>
                            {{--                        <td>{{ (int)$record->sessions_count - $session->attendances->where('session_record_id', $record->id)->whereIn('status', ['Canceled', 'Attended'])->count() }}</td>--}}
                            {{--                            <td>--}}
                            {{--                                @php--}}
                            {{--                                    $lastSession = $session->attendances--}}
                            {{--                                        ->where('session_record_id', $record->id)--}}
                            {{--                                        ->where('status', 'Attended')--}}
                            {{--                                        ->sortByDesc('created_at')--}}
                            {{--                                        ->first();--}}
                            {{--                                @endphp--}}
                            {{--                                @if ($lastSession)--}}
                            {{--                                    {{ $lastSession->date->diffForHumans() }}--}}
                            {{--                                @else--}}
                            {{--                                    {{ __('لا يوجد') }}--}}
                            {{--                                @endif--}}
                            {{--                            </td>--}}
                            <td>{{$record->doctor?->name  }}</td>
                        </tr>
                    @endforeach
                    {{--                            <tr>--}}
                    {{--                                <td colspan="3" class="font-weight-semibold text-center text-primary fs-18">--}}
                    {{--                                    إجمالى سعر الجلسات المتفق عليها--}}
                    {{--                                    <br>--}}
                    {{--                                    500 حنيه--}}
                    {{--                                </td>--}}
                    {{--                                <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">--}}
                    {{--                                    مديونية الشركة--}}
                    {{--                                    <br>--}}
                    {{--                                    500 حنيه--}}
                    {{--                                </td>--}}
                    {{--                            </tr>--}}


                    <tr>
                        <td colspan="2" class="font-weight-semibold text-center text-warning fs-18">
                            <a id="modal-open" class="modal-effect modal-open-btn btn btn-success mb-3"
                               data-bs-effect="effect-scale" data-bs-toggle="modal" data-session-id="{{$session->id}}"
                               href="#modalattendeshistory{{$session->id}}">
                                <i class="fa fa-history me-2"></i> سجل الحضور
                            </a>
                        </td>
                        <td colspan="3" class="font-weight-semibold text-center text-warning fs-18">
                            <a id="modal-open" class="modal-effect modal-open-btn btn btn btn-success   mb-3"
                               data-bs-effect="effect-scale" data-bs-toggle="modal" data-session-id="{{$session->id}}"
                               href="#modaldemo{{$session->id}}">
                                <i class="fa fa-plus"></i>
                                إضافه حضور جلسة</a>
                        </td>
                    </tr>

                    @if ($session->status == 'pending')
                        <tr>
                            <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">
                                <button type="button" class="btn btn-secondary btn-sm">
                                    <span class="fs-16">قيد المراجعه</span>
                                </button>
                            </td>
                        </tr>
                    @elseif ($session->status == 'onProgress')

                        <tr>
                            <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">
                                <button type="button" class="btn btn-success btn-sm">
                                    <span class="fs-16">مستمره</span>
                                </button>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">
                                <button type="button" class="btn-primary btn-sm">
                                    <span class="fs-16">منتهية</span>
                                </button>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<hr>

<!-- sessions.blade.php -->
<div class="modal fade" id="modaldemo{{$session->id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">أضف حضور جلسة </h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body p-0">
                        <form id="attendanceForm" class="attendanceForm form-control mt-4" method="post"
                              action="{{ route('admin.sessions.fast-save-attendance',['session_id' => $session->id]) }}">

                            @csrf
                            <div class="row">

                                @php
                                    $currentSessions = [];
                                     foreach ($session->records as $record) {
                                         $currentSessions[$record->id] = $record->category->name . ' / ' . $record->subCategory->name;
                                     }
                                @endphp
                                <div class="col-6">
                                    <x-admin.drop-down-input :is-required="true" name="session_record_id"
                                                             :options="$currentSessions"></x-admin.drop-down-input>
                                </div>

                                <div class="col-6">
                                    <x-admin.date-picker-input date-time-format="a" :is-required="true"
                                                               value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                                               name="date"
                                                               class="attends_date_{{$session->id}}"></x-admin.date-picker-input>
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
                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalattendeshistory{{$session->id}}" style="min-width: 700px">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo" style="min-width: 700px">
            <div class="modal-header">
                <h6 class="modal-title"> تاريخ حضور الجلسات </h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <div class="table-responsive" style=" min-height: auto; ">
                        <table class="table table-striped card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th>الجلسة</th>
                                <th>الدكتور</th>
                                <th>التاريخ</th>
                                <th>الموظف</th>
                                <th>الحالة</th>
                                <th>الملاحظات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($session->attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance?->sessionRecord?->subCategory->name . ' / ' . $attendance?->sessionRecord?->category->name }}</td>
                                    <td>{{ $attendance?->sessionRecord?->doctor?->name  }}</td>
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


                                    <td>{{$attendance->notes ?? 'لا يوجد'}} </td>
                                </tr>
                            @endforeach


                            <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modalpayhistory{{$session->id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo" style=" min-width: 700px; ">
            <div class="modal-header">
                <h6 class="modal-title"> تاريخ المعاملات المادية </h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <div class="table-responsive" style=" min-height: auto; ">
                        <table class="table table-striped card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th>الدفعة</th>
                                <th>التاريخ</th>
                                {{--                                <th>جهة الدفع</th>--}}
                                <th>نوع الدفع</th>
                                <th>الجلسة</th>
                                <th>الموظف</th>
                                <th>رقم الإيصال</th>
                                <th>الملاحظات</th>
                                <th>النوع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($session->transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->payment}} جنيه</td>
                                    <td>{{$transaction->date}}</td>
                                    <td>{{$transaction->transaction_type}}</td>
                                    <td>{{$transaction->sessionRecord?->subCategory->name . ' / ' . $transaction?->sessionRecord?->category->name}}</td>
                                    {{--                                    <td>{{$transaction->transaction_from == 'company' ? 'شركة التأمين' : 'العميل'}}</td>--}}
                                    <td>{{ $transaction?->admin?->name}}</td>
                                    <td>{{$transaction->receipt_number}}</td>
                                    <td>{{$transaction->notes ?? 'لا يوجد'}} </td>

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

        </div>
    </div>
</div>
<div class="modal fade" id="modalpay{{$session->id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">أضف معامله جديده </h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body p-0">
                        <form class="form-control mt-4 transactionsForm" method="post"
                              action="{{ route('admin.sessions.save-transaction',['session_id' => $session->id]) }}">
                            @csrf
                            <div class="row">


                                <div class="col-6">
                                    <x-admin.number-input :is-required="true" name="payment"></x-admin.number-input>
                                </div>

                                <div class="col-6">
                                    <x-admin.date-picker-input value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                                               class="payment_date_{{$session->id}}" :is-required="true"
                                                               name="date"></x-admin.date-picker-input>
                                </div>

                                <div class="col-6">
                                    <x-admin.drop-down-input selected="cash" :is-required="true" name="transaction_type"
                                        :options="[
                                        'visa' => 'visa',
                                        'cash' => 'كاش'
                                        ]"></x-admin.drop-down-input>
                                </div>


                                <input type="hidden" name="transaction_from" value="client">

                                {{--                                <div class="col-6">--}}
                                {{--                                    <x-admin.drop-down-input selected="client" :is-required="true" name="transaction_from" :options="[--}}
                                {{--                                    'client' =>'عميل','company' => 'شركة التأمين',]"></x-admin.drop-down-input>--}}
                                {{--                                </div>--}}

                                <div class="col-6">
                                    <x-admin.number-input :is-required="true"
                                                          name="receipt_number"></x-admin.number-input>
                                </div>

                                @php
                                    $currentSessions = [];
                                     foreach ($session->records as $record) {
                                         $currentSessions[$record->id] = $record->category->name . ' / ' . $record->subCategory->name;
                                     }
                                @endphp

                                <div class="col-12">
                                    <x-admin.drop-down-input selected="session_record_id" :is-required="true" name="session_record_id"
                                                             :options="$currentSessions"></x-admin.drop-down-input>
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
                </div>

            </div>

        </div>
    </div>
</div>

{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <div class="card-title" style=" font-size: 17px; font-weight: 500; text-align:center">--}}
{{--            بيانات الجلسات--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div class="table-responsive">--}}
{{--            <table class="user-table">--}}
{{--                <thead class="thead-light">--}}
{{--                <tr>--}}
{{--                    <th>الجلسة</th>--}}
{{--                    --}}{{--                    <th>الكل</th>--}}
{{--                    <th>الحضور</th>--}}
{{--                    --}}{{--                    <th>المتبقية</th>--}}
{{--                    <th>أخر حضور</th>--}}
{{--                    <th>الدكتور</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach ($session->records as $record)--}}
{{--                    <tr>--}}
{{--                        <td style="padding-left: 1.5rem; padding-right: 1.5rem;"> {{ $record->category->name }}--}}
{{--                            / {{ $record->subCategory->name }} </td>--}}
{{--                        --}}{{--                        <td>{{ $record->sessions_count }}</td>--}}
{{--                        <td>{{ $session->attendances->where('session_record_id', $record->id)->where('status', 'Attended')->count() }}</td>--}}
{{--                        --}}{{--                        <td>{{ (int)$record->sessions_count - $session->attendances->where('session_record_id', $record->id)->whereIn('status', ['Canceled', 'Attended'])->count() }}</td>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $lastSession = $session->attendances--}}
{{--                                    ->where('session_record_id', $record->id)--}}
{{--                                    ->where('status', 'Attended')--}}
{{--                                    ->sortByDesc('created_at')--}}
{{--                                    ->first();--}}
{{--                            @endphp--}}
{{--                            @if ($lastSession)--}}
{{--                                {{ $lastSession->date->diffForHumans() }}--}}
{{--                            @else--}}
{{--                                {{ __('لا يوجد') }}--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                        <td>{{$record->doctor?->name  }}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                <tr>--}}
{{--                    <td colspan="3" class="font-weight-semibold text-center text-primary fs-18">--}}
{{--                        إجمالى سعر الجلسات المتفق عليها--}}
{{--                        <br>--}}
{{--                        500 حنيه--}}
{{--                    </td>--}}
{{--                    <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">--}}
{{--                        مديونية الشركة--}}
{{--                        <br>--}}
{{--                        500 حنيه--}}
{{--                    </td>--}}
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <td colspan="3" class="font-weight-semibold text-center text-warning fs-18">--}}
{{--                        <a id="modal-open" class="modal-effect modal-open-btn btn btn-success mb-3"--}}
{{--                           data-bs-effect="effect-scale" data-bs-toggle="modal" data-session-id="{{$session->id}}"--}}
{{--                           href="#modalattendeshistory{{$session->id}}">--}}
{{--                            <i class="fa fa-history me-2"></i> سجل الحضور--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                    <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">--}}
{{--                        <a id="modal-open" class="modal-effect modal-open-btn btn btn btn-success   mb-3"--}}
{{--                           data-bs-effect="effect-scale" data-bs-toggle="modal" data-session-id="{{$session->id}}"--}}
{{--                           href="#modaldemo{{$session->id}}">--}}
{{--                            <i class="fa fa-plus"></i>--}}
{{--                            إضافه حضور جلسة</a>--}}
{{--                    </td>--}}
{{--                </tr>--}}

{{--                @if ($session->status == 'pending')--}}
{{--                    <tr>--}}
{{--                        <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">--}}
{{--                            <button type="button" class="btn btn-secondary btn-sm">--}}
{{--                                <span class="fs-16">قيد المراجعه</span>--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @elseif ($session->status == 'onProgress')--}}

{{--                    <tr>--}}
{{--                        <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">--}}
{{--                            <button type="button" class="btn btn-success btn-sm">--}}
{{--                                <span class="fs-16">مستمره</span>--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @else--}}
{{--                    <tr>--}}
{{--                        <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">--}}
{{--                            <button type="button" class="btn-primary btn-sm">--}}
{{--                                <span class="fs-16">منتهية</span>--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endif--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




