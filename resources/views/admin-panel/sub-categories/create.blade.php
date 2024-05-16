@extends('admin-panel.layouts.master')
<link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>

@section('content')
    <div class="side-app">


        <ol class="breadcrumb1">
            <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i
                        class="fe fe-home me-2"
                        aria-hidden="true"></i>
                    @lang('admin/dashboard.dashboard')</a>
            </li>
            <li class="breadcrumb-item1"><a
                    href="{{route('admin.sub-categories.index',[ 'category_id' => $categoryId])}}" class="">
                    @lang('admin/dashboard.menus.sub_categories')</a>
            </li>
            <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.c_sub_category')
            </li>
        </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.c_sub_category')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.sub-categories.store',[ 'category_id' => $categoryId])}}"
              enctype="multipart/form-data"
              class="">
            @csrf
            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6 col-md-6">
                                    <x-admin.text-input name="name"></x-admin.text-input>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <x-admin.text-input name="code"></x-admin.text-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.number-input label="cash_price" name="price"></x-admin.number-input>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <x-admin.drop-down-input name="parent_id"
                                                             :selected="$categoryId"
                                                             key-of-value="name" key-of-option="id"
                                                             :options="$mainCategories"></x-admin.drop-down-input>
                                </div>


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
                                    class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                            </button>
                            <a href="{{ route('admin.sub-categories.index',[ 'category_id' => $categoryId]) }}"
                               class="btn btn-danger "> <span
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
'request'=>'App/Http/Requests/Admin/System/Admin/CreateSystemUserRequest','on_start'=>false])


    @endpush
