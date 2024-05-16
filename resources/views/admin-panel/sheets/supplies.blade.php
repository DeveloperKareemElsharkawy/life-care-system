@extends('admin-panel.layouts.master')
@section('content')
    <!--app-content open-->


    <div class="side-app">
        <div class="text-center mb-3">
            <h1 class="page-title mb-0 text-primary fs-30">التوريدات</h1>
        </div>


        <div class="row mt-5">

            <div class="col-xl-6 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col">
                                <div><span class="bar-colours-2" style="display: none;">5,3,2,-1,-3,-2,2,3,5,2</span>
                                    <svg class="peity" height="100" width="100">
                                        <rect fill="#38cb89" x="1" y="0" width="8" height="62.5"></rect>
                                        <rect fill="#38cb89" x="11.000000000000002" y="25" width="7.999999999999998"
                                              height="37.5"></rect>
                                        <rect fill="#38cb89" x="21" y="37.5" width="8" height="25"></rect>
                                        <rect fill="#aeeacf" x="31" y="62.5" width="8" height="12.5"></rect>
                                        <rect fill="#aeeacf" x="40.99999999999999" y="62.5" width="8.000000000000014"
                                              height="37.5"></rect>
                                        <rect fill="#aeeacf" x="50.99999999999999" y="62.5" width="8.000000000000007"
                                              height="25"></rect>
                                        <rect fill="#38cb89" x="61" y="37.5" width="8" height="25"></rect>
                                        <rect fill="#38cb89" x="71" y="25" width="8" height="37.5"></rect>
                                        <rect fill="#38cb89" x="81" y="0" width="8" height="62.5"></rect>
                                        <rect fill="#38cb89" x="91" y="37.5" width="8" height="25"></rect>
                                    </svg>
                                </div>
                            </div>
                            <div class="col col-auto">
                                <div class="mb-2 fs-18"> مدفوعات اليوم <span
                                        style="font-size: 14px;"></span></div>

                                @php
                                    $todayPayments = \App\Models\Transaction::query()->has('session.user')->where('date',today())->get()->pluck('payment')->flatten()->sum();
                                    $monthlyPayments = \App\Models\Transaction::query()->has('session.user')->whereMonth('date', today())->get()->pluck('payment')->flatten()->sum();

                                @endphp

                                <h3 class="font-weight-bold mb-1">  {{$todayPayments . ' جنيه '}}  </h3>
                                {{--                                <span class="text-success"><i class="fa fa-arrow-up me-1"></i> -2.4%</span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col">
                                <div><span class="bar-colours-3"
                                           style="display: none;">0,-3,-6,-4,-5,-4,-7,-3,-5,-2</span>
                                    <svg class="peity" height="100" width="100">
                                        <rect fill="#ffab00" x="1" y="0" width="8" height="1"></rect>
                                        <rect fill="#ffdd99" x="11.000000000000002" y="0" width="7.999999999999998"
                                              height="42.85714285714286"></rect>
                                        <rect fill="#ffab00" x="21" y="0" width="8" height="85.71428571428572"></rect>
                                        <rect fill="#ffdd99" x="31" y="0" width="8" height="57.142857142857146"></rect>
                                        <rect fill="#ffab00" x="40.99999999999999" y="0" width="8.000000000000014"
                                              height="71.42857142857143"></rect>
                                        <rect fill="#ffdd99" x="50.99999999999999" y="0" width="8.000000000000007"
                                              height="57.142857142857146"></rect>
                                        <rect fill="#ffab00" x="61" y="0" width="8" height="100"></rect>
                                        <rect fill="#ffdd99" x="71" y="0" width="8" height="42.85714285714286"></rect>
                                        <rect fill="#ffab00" x="81" y="0" width="8" height="71.42857142857143"></rect>
                                        <rect fill="#ffdd99" x="91" y="0" width="8" height="28.57142857142857"></rect>
                                    </svg>
                                </div>
                            </div>
                            <div class="col col-auto">
                                <div class="mb-2 fs-18"> مدفوعات هذا الشهر <span
                                        style="font-size: 14px;"></span></div>
                                <h3 class="font-weight-bold mb-1">  {{$monthlyPayments . ' جنيه '}}  </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header mb-5">

                    <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                        نسبه الربح من الجلسات (التقرير الشهرى)
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الشهر</th>
                        <th>إجمالي مدفوعات جلسات التعاقد</th>
                        <th>إجمالي مدفوعات جلسات النقدي</th>
                        <th>إجمالي مدفوعات الجلسات</th>

                        <th>إجمالي مدفوعات كشوفات التعاقد</th>
                        <th>إجمالي مدفوعات كشوفات النقدي</th>
                        <th>إجمالي مدفوعات الكشوفات</th>

                        <th>الملف التفصيلي</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($monthlyIncomes as $month => $payment)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$month}}</td>
                            <td>{{data_get($payment, 'contract.sessions_payments')}} جنيه</td>
                            <td>{{data_get($payment, 'cash.sessions_payments')}} جنيه</td>
                            <td>{{data_get($payment, 'sessions_payments')}} جنيه</td>

                            <td>{{data_get($payment, 'contract.examination_payments')}} جنيه</td>
                            <td>{{data_get($payment, 'cash.examination_payments')}} جنيه</td>
                            <td>{{data_get($payment, 'examination_payments')}} جنيه</td>


                            <td>
                                <button type="button" class="btn btn-teal"
                                        onclick="ExportMonthlyExcel('{{ $month }}','cash')">
                                    <i class="fa fa-file-excel-o me-2"></i>نقدي
                                </button>
                                <br>

                                <button type="button" class="btn btn-teal mt-5"
                                        onclick="ExportMonthlyExcel('{{ $month }}','contract')">
                                    <i class="fa fa-file-excel-o me-2"></i>تعاقد
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>


        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header mb-5">

                    <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                        نسبه الربح من الجلسات (التقرير اليومي)
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اليوم</th>
                        <th>إجمالي مدفوعات جلسات التعاقد</th>
                        <th>إجمالي مدفوعات جلسات النقدي</th>
                        <th>إجمالي مدفوعات الجلسات</th>

                        <th>إجمالي مدفوعات كشوفات التعاقد</th>
                        <th>إجمالي مدفوعات كشوفات النقدي</th>
                        <th>إجمالي مدفوعات الكشوفات</th>

                        <th>الملف التفصيلي</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($dailyIncomes as $day => $payment)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$day}}</td>
                            <td>{{data_get($payment, 'contract.sessions_payments')}} جنيه</td>
                            <td>{{data_get($payment, 'cash.sessions_payments')}} جنيه</td>
                            <td>{{data_get($payment, 'sessions_payments')}} جنيه</td>

                            <td>{{data_get($payment, 'contract.examination_payments')}} جنيه</td>
                            <td>{{data_get($payment, 'cash.examination_payments')}} جنيه</td>
                            <td>{{data_get($payment, 'examination_payments')}} جنيه</td>


                            <td>
                                <button type="button" class="btn btn-teal"
                                        onclick="ExportExcel('{{ $day }}','cash')">
                                    <i class="fa fa-file-excel-o me-2"></i>نقدي
                                </button>
                                <button type="button" class="btn btn-teal mt-5"
                                        onclick="ExportExcel('{{ $day }}','contract')">
                                    <i class="fa fa-file-excel-o me-2"></i>تعاقد
                                </button>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>
        <!--End Row-->


    </div>

@endsection

@push('scripts')

    <script>
        function ExportExcel(day, type) {
            // Constructing the URL with month and doctorId parameters
            var url = `{{ route('admin.sheet.download-supplies') }}?day=${day}&type=${type}`;
            // Opening the URL in a new window
            window.open(url);
        }

        function ExportMonthlyExcel(month, type) {
            // Constructing the URL with month and doctorId parameters
            var url = `{{ route('admin.sheet.download-monthly-supplies') }}?month=${month}&type=${type}`;
            // Opening the URL in a new window
            window.open(url);
        }
    </script>

@endpush
