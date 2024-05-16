@extends('admin-panel.layouts.master')
@section('content')
    <!--app-content open-->


    <div class="side-app">
        <div class="text-center mb-3">
            <h1 class="page-title mb-0 text-primary fs-30">حضور الجلسات</h1>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header mb-5">

                    <div class="card-title" style=" font-size: 17px; font-weight: 500; ">
                        حضور الجلسات (التقرير الشهرى)
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الشهر</th>
                        {{--                        <th>إجمالي مديونية شركات التعاقد</th>--}}
                        <th>عدد مرات الحضور</th>
                        <th>الملف التفصيلي</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($attendanceByMonth as $attendanceByDay)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$attendanceByDay->year}}-{{$attendanceByDay->month}}</td>
                            <td>{{$attendanceByDay->count}}</td>
                            {{--                            <td>{{$payment['contract_payments']}} جنيه</td>--}}
                            <td>
                                <button type="button" class="btn btn-teal"
                                        onclick="ExportMonthlyExcel('{{$attendanceByDay->year}}-{{$attendanceByDay->month}}')">
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
                        حضور الجلسات (التقرير اليومي)
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اليوم</th>
                        {{--                        <th>إجمالي مديونية شركات التعاقد</th>--}}
                        <th>عدد مرات الحضور</th>
                        <th>الملف التفصيلي</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($attendancesByDay as $attendanceByDay)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$attendanceByDay->date->format('Y-m-d')}}</td>
                            <td>{{$attendanceByDay->count}}</td>
                            {{--                            <td>{{$payment['contract_payments']}} جنيه</td>--}}
                            <td>
                                <button type="button" class="btn btn-teal"
                                        onclick="ExportExcel('{{ $attendanceByDay->date }}')">
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
        function ExportMonthlyExcel(month) {
            // Constructing the URL with month and doctorId parameters
            var url = `{{ route('admin.sheet.download-monthly-attendees-list') }}?month=${month}`;

            // Opening the URL in a new window
            window.open(url);
        }
        function ExportExcel(day) {
            // Constructing the URL with month and doctorId parameters
            var url = `{{ route('admin.sheet.download-attendees-list') }}?day=${day}`;

            // Opening the URL in a new window
            window.open(url);
        }
    </script>

@endpush
