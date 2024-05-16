<!-- sessions.blade.php -->
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


                                <div class="col-4">
                                    <x-admin.number-input :is-required="true" name="payment"></x-admin.number-input>
                                </div>

                                <div class="col-4">
                                    <x-admin.date-picker-input value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="payment_date_{{$session->id}}" :is-required="true"
                                                               name="date"></x-admin.date-picker-input>
                                </div>

                                <div class="col-4">
                                    <x-admin.drop-down-input selected="Deposit" :is-required="true" name="type" :options="['Deposit' => __('admin/datatable.Deposit'),
                                        'Withdrawal' => __('admin/datatable.Withdrawal')]"></x-admin.drop-down-input>
                                </div>

                                <div class="col-6">
                                    <x-admin.drop-down-input selected="client" :is-required="true" name="transaction_from" :options="[
                                    'client' =>'عميل','company' => 'شركة التأمين',]"></x-admin.drop-down-input>
                                </div>

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
                </div>

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
                                <th>جهة الدفع</th>
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
                                    <td>{{$transaction->transaction_from == 'company' ? 'شركة التأمين' : 'العميل'}}</td>
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

<div class="card">
    <div class="card-body">
        <div class="card-title" style=" font-size: 17px; font-weight: 500; text-align:center">
            بيانات الجلسات
        </div>
    </div>
<div class="table-responsive" style="min-height: auto;">
    <!-- Separate Table for Summary -->
    <table class="user-table">
        <tr>
            <td colspan="5" class="font-weight-semibold"> إجمالى سعر الجلسات المتفق عليها </td>
            <td>{{ $session->contract_price_before_discount }} جنيه</td>
        </tr>
        <tr>
            <td colspan="5" class="font-weight-semibold text-success">مديونية الشركة </td>
            <td class="text-success">{{ $session->discount_value }} %</td>
        </tr>
        <tr>
            <td colspan="5" class="font-weight-semibold text-success">مديونية العميل </td>
            <td>{{ $session->contract_final_total }} جنيه</td>
        </tr>
        <tr>
            <td colspan="5" class="font-weight-semibold text-success">المبلغ المدفوع من العميل</td>
            <td class="text-success">{{ array_sum($session->transactions->where('type','Deposit')->pluck('payment')->toArray()) }}
                جنيه
            </td>
        </tr>
        <tr>
            <td colspan="5" class="font-weight-semibold text-danger">المبلغ المتبقى للجلسات القادمة</td>
            <td class="text-danger">{{ $session->contract_final_total - array_sum($session->transactions->where('type','Deposit')->pluck('payment')->toArray()) . ' جنيه ' }}</td>
        </tr>

        <tr>
            <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">
                <a id="modal-open" class="modal-effect modal-open-btn btn btn-success mb-3"
                   data-bs-effect="effect-scale"
                   data-bs-toggle="modal" data-session-id="{{$session->id}}"
                   href="#modalpayhistory{{$session->id}}">
                    <i class="fa fa-history me-2"></i> سجل المعاملات الماديه
                </a>
            </td>
        </tr>
        @if ($session->status == 'onProgress')
            <tr>
                <td colspan="6" class="font-weight-semibold text-center text-warning fs-18">
                    <a id="modal-open" class="modal-effect modal-open-btn btn btn-primary d-grid mb-3"
                       data-bs-effect="effect-scale"
                       data-bs-toggle="modal" data-session-id="{{$session->id}}"
                       href="#modalpay{{$session->id}}">أضف معامله جديده
                    </a>
                </td>
            </tr>
        @endif

    </table>
</div>
</div>
