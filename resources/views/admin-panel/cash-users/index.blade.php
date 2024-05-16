@extends('admin-panel.layouts.master')

@section('content')
    <div class="side-app">
        <ol class="breadcrumb1">
            <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i class="fe fe-home me-2"
                                                                                                 aria-hidden="true"></i>{{trans('admin/dashboard.dashboard')}}
                </a></li>
            <li class="breadcrumb-item1 active"> {{trans('admin/dashboard.menus.cash_users')}}</li>
        </ol>


        <div class="row">

            <div class="col-12">
                <div class="card datable-custom ">
                    <div class="table-responsive">
                        <livewire:admin.cash-user-table/>
                    </div>
                </div>
            </div>
        </div>
    </div>


 @endsection

@push('scripts')

    <script>
        // Open modal in AJAX callback
        // $('.modal-info').click(function (event) {
        //      $('#model-body').html('test')
        //
        //
        // });
        $(document).ready(function () {
            $('.modal-body').on('show.bs.modal', function (e) {
                var _button = $(e.relatedTarget);
                var result = "";
                var $row = $(_button).closest("tr"); // Find the row
                var $tds = $row.find("td");
                $.each($tds, function () {
                    var t = $(this).attr('data-title');
                    var v = $(this).text();
                    result += '<div>' + t + ' : ' + v + '</div>';
                });
                $(this).find("#container").html(result);
            });
        });
    </script>
@endpush
