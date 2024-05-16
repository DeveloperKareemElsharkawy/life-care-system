@extends('admin-panel.layouts.master')

@section('content')
    <div class="side-app">

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">

                <ol class="breadcrumb1">
                    <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i
                                class="fe fe-home me-2"
                                aria-hidden="true"></i>
                            @lang('admin/dashboard.dashboard')</a>
                    </li>

                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.send_notifications')
                    </li>
                </ol>

            </div>

        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25">@lang('admin/datatable.send_notifications')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off" action="{{route('admin.dashboard.send_notification')}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{trans('admin/datatable.title')}} <span
                                                class="text-red">*</span></label>
                                        <input type="text" name="title"
                                               class="form-control mb-3 input_field"
                                               placeholder="title"
                                               id="title">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.text-area-input name="details"></x-admin.text-area-input>
                                </div>


                                <div class="col-sm-12 col-md-12">
                                    <x-admin.multi-select-input name="clients" :options="$clients"
                                                                key-of-value="name"
                                                                key-of-option="id"></x-admin.multi-select-input>
                                </div>

                                <x-admin.checkbox-input name="all_users" ></x-admin.checkbox-input>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Row-->
                <div class="col-xl-3 col-lg-3">

                    <div class="card overflow-hidden">
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button"
                                    class="btn btn-success me-2"><span
                                    class="fs-15"><i class="fe fe-message-circle me-1"></i>@lang('admin/datatable.buttons.general.send')</span>
                            </button>

                        </div>
                    </div>


                </div>


            </div>

        </form>


        @endsection

        @push('scripts')

            <script src="{{ URL::asset('admin_asset/plugins/fileupload/js/dropify.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/filupload.js') }}"></script>

    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/System/Admin/CreateSystemUserRequest','on_start'=>false])


    @endpush
