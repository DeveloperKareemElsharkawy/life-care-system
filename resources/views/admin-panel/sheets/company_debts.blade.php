@extends('admin-panel.layouts.master')
@section('content')
    <!--app-content open-->


    <div class="side-app">
        <div class="text-center mb-3">
            <h1 class="page-title mb-0 text-primary fs-30">مديونية الشركات </h1>
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
                                <div class="mb-2 fs-18"> مديونات هذا الشهر <span
                                        style="font-size: 14px;"></span></div>


                                <h3 class="font-weight-bold mb-1">  {{$currentMonthStates['total_sessions_debt'] . ' جنيه '}}  </h3>
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
                                <div class="mb-2 fs-18"> مديونات الشهر الماضى <span
                                        style="font-size: 14px;"></span></div>
                                <h3 class="font-weight-bold mb-1">  {{$lastMonthStates['total_sessions_debt'] . ' جنيه '}} </h3>
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
                        مديونات الشركات (التقرير الشهرى)
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الشهر</th>
                        <th>عدد الشركات</th>
                        <th> إجمالي عدد الجلسات</th>
                        <th>إجمالي المديونات</th>
                        <th>الملف التفصيلي</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($monthlyStats as $yearMonth => $payment)
                        @php
                            $monthYearObj = explode('-', $yearMonth);
               $year = $monthYearObj[0];
               $month = $monthYearObj[1];
                               $examinationDebts = \App\Models\User::query()->whereNotNull('insurance_company_id')->whereHas('insurance_company')
                                   ->whereMonth('examination_date', $month)->whereYear('examination_date', $year)->sum('examination_price');
                        @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$yearMonth}}</td>
                            <td>{{$payment['companies_count']}} </td>
                            <td>{{$payment['attendees_count']}} </td>
                            <td>{{$payment['total_sessions_debt'] + $examinationDebts}} جنيه</td>
                            <td>
                                <button type="button" class="btn btn-teal"
                                        onclick="ExportExcel('{{ $yearMonth }}')">
                                    <i class="fa fa-file-excel-o me-2"></i>Export
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
                        مديونات الشركات (التقرير اليومي)
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اليوم</th>
                        <th>عدد الشركات</th>
                        <th> إجمالي عدد الجلسات</th>
                        <th>إجمالي المديونات</th>
                        <th>الملف التفصيلي</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($dailyStats as $day => $payment)
                        @php
                     $examinationDebts = \App\Models\User::query()->whereNotNull('insurance_company_id')->whereHas('insurance_company')
                         ->whereDate('examination_date' , $day)->sum('examination_price');
                        @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$day}}</td>
                            <td>{{$payment['companies_count']}} </td>
                            <td>{{$payment['attendees_count']}} </td>
                            <td>{{$payment['total_sessions_debt'] + $examinationDebts}} جنيه</td>
                            <td>
                                <button type="button" class="btn btn-teal"
                                        onclick="ExportDailyExcel('{{ $day }}')">
                                    <i class="fa fa-file-excel-o me-2"></i>Export
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
        function ExportExcel(month) {
            // Constructing the URL with month and doctorId parameters
            var url = `{{ route('admin.sheet.download-companies-debts') }}?month=${month}`;

            // Opening the URL in a new window
            window.open(url);
        }

        function ExportDailyExcel(day) {
            // Constructing the URL with month and doctorId parameters
            var url = `{{ route('admin.sheet.download-companies-daily-debts') }}?day=${day}`;

            // Opening the URL in a new window
            window.open(url);
        }
    </script>

@endpush
