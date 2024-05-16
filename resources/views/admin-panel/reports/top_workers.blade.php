@extends('admin-panel.layouts.master')
@section('content')
    <!--app-content open-->

    <div class="side-app">
        <div class="row">
            <div class="col-12">
                <div class="card datable-custom ">
                    <div class="card-header">
                        <h3 class="fs-16 font-weight-normal text-center">@lang('admin/datatable.top_workers_report') </h3>
                    </div>
{{--                    <div class="card-body">--}}

                        {{--                        <form action="{{route('admin.reports.reports.clients')}}" method="get">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-4">--}}
                        {{--                                    <x-admin.date-picker-input name="start_date" value="{{$startDate}}"/>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-4">--}}
                        {{--                                    <x-admin.date-picker-input name="end_date" value="{{$endDate}}"/>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-4">--}}
                        {{--                                    <x-admin.drop-down-input name="state"--}}
                        {{--                                                             :selected="$state"--}}
                        {{--                                                             :options="$states" key-of-value="name"--}}
                        {{--                                                             key-of-option="id"></x-admin.drop-down-input>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="card-footer text-center card-form-footer">--}}
                        {{--                                <button type="submit" id="submit_button" class="btn btn-success me-2 fs-17"><span--}}
                        {{--                                        class="fs-15"><i--}}
                        {{--                                            class="fe fe-search me-1"></i>@lang('admin/datatable.search')</span>--}}
                        {{--                                </button>--}}


                        {{--                            </div>--}}
                        {{--                        </form>--}}

{{--                    </div>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <livewire:admin.worker-table :startDate="$startDate" :endDate="$endDate" :state="$state"
                                                       :isTopWorker="true"/>
                        </div>
                    </div>
                </div>
            </div>
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
