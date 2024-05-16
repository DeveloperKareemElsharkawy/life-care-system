@extends('admin-panel.layouts.master')
<link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>

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
                    <li class="breadcrumb-item1"><a href="{{route('admin.payment-methods.index')}}" class="">
                            @lang('admin/dashboard.menus.payment_methods')</a>
                    </li>
                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.u_payment_method')
                    </li>
                </ol>

            </div>

        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.u_payment_method')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.payment-methods.update',['payment_method_id'=>$paymentMethod->id])}}"
              enctype="multipart/form-data"
              class="">
            @csrf

            <input type="hidden" name="paymentMethod_id" value="{{$paymentMethod->id}}">

            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card datable-custom ">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6 col-md-6">
                                    <x-admin.text-input name="name_ar" :value="$paymentMethod->name_ar"></x-admin.text-input>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <x-admin.text-input name="name_en" :value="$paymentMethod->name_en"></x-admin.text-input>
                                </div>

                                <x-admin.checkbox-input name="status" :value="$paymentMethod->status"> </x-admin.checkbox-input>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Row-->
                <div class="col-xl-3 col-lg-3">

                    <div class="card overflow-hidden">
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button" value="apply" name="action"
                                    class="btn btn-success me-2"><span
                                    class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                            </button>
                            <a href="{{ route('admin.payment-methods.index') }}" class="btn btn-danger "> <span
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

    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/System/Admin/UpdateSystemUserRequest'])


    @endpush
