@extends('admin-panel.layouts.master')

@push('styles')

    <link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.css') }}"
          rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/plugins/wysiwyag/richtext.css') }}" rel="stylesheet"/>

    <link href="{{ URL::asset('admin_asset/css/jquery.imagesloader.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('admin_asset/plugins/date-picker/date-picker.css') }}" rel="stylesheet"/>
@endpush

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
                    <li class="breadcrumb-item1"><a href="{{route('admin.pages.index')}}" class="">
                            @lang('admin/dashboard.menus.pages')</a>
                    </li>
                    <li class="breadcrumb-item1 active">  @lang('admin/datatable.buttons.u_page')
                    </li>
                </ol>

            </div>

        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-25"> @lang('admin/datatable.buttons.u_page')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.pages.update',['page_id'=>$page->id])}}"
              enctype="multipart/form-data"
              class="">
            @csrf

            <input type="hidden" name="category_id" value="{{$page->id}}">

            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card datable-custom ">
                        <div class="card-body">
                            <div class="row">


                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{trans('admin/datatable.title_ar')}} <span
                                                class="text-red">*</span></label>
                                        <input type="text" name="title[ar]"
                                               class="form-control mb-3 input_field"
                                               placeholder="title"
                                               id="title_ar"
                                               value="{{  $page->getTranslation('title','ar') }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{trans('admin/datatable.title_en')}} <span
                                                class="text-red">*</span></label>
                                        <input type="text" name="title[en]"
                                               class="form-control mb-3 input_field"
                                               placeholder="title_en"
                                               id="title_en"
                                               value="{{  $page->getTranslation('title','en') }}">

                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">@lang('admin/datatable.description_en') <span
                                                class="text-red">*</span></label>
                                        <textarea class="content" name="content[en]">{{  $page->getTranslation('content','en') }}</textarea>
                                    </div>

                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">@lang('admin/datatable.description_ar') <span
                                                class="text-red">*</span></label>
                                        <textarea class="content2" name="content[ar]">{{  $page->getTranslation('content','ar') }}</textarea>
                                    </div>

                                </div>


                                <div class="col-12">
                                    <x-admin.multi-image-input gallery-name-key="images"
                                                               :images="json_decode($page->images)"></x-admin.multi-image-input>
                                </div>

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
                            <a href="{{ route('admin.pages.index') }}" class="btn btn-danger "> <span
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

            <script src="{{ URL::asset('admin_asset/plugins/wysiwyag/jquery.richtext.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/form-editor.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/plugins/quill/quill.min.js') }}"></script>
            <script src="{{ URL::asset('admin_asset/js/form-editor2.js') }}"></script>

    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/System/Admin/UpdateSystemUserRequest'])


    @endpush
