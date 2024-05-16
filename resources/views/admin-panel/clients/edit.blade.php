@extends('admin-panel.layouts.master')
<link href="{{ URL::asset('admin_asset/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet"/>

@section('content')
    <div class="side-app">


        <!--Page header-->


                <ol class="breadcrumb1">
                    <li class="breadcrumb-item1"><a href="{{ route('admin.dashboard.home') }}" class=""><i
                                class="fe fe-home me-2"
                                aria-hidden="true"></i>
                            {{trans('admin/dashboard.dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item1"><a href="{{ route('admin.clients.index') }}" class=""><i
                                class="fe fe-home me-2"
                                aria-hidden="true"></i>
                            {{trans('admin/dashboard.menus.clients')}}</a>
                    </li>
                    <li class="breadcrumb-item1 active"><i class="fe fe-home me-2"
                                                           aria-hidden="true"></i>@lang('admin/datatable.buttons.u_client')
                    </li>
                </ol>

        <!--End Page header-->

        <!-- Row -->
        <div class="text-center mb-5">
            <h1 class="page-title mb-0 text-primary  fs-30">@lang('admin/datatable.buttons.u_client')</h1>
        </div>
        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.clients.update',['client_id'=>$client->id])}}"
              enctype="multipart/form-data"
              class="">
            @csrf

            <input type="hidden" name="client_id" value="{{$client->id}}">

            <div class="row">

                <div class="col-xl-9 col-lg-9">
                    <div class="card datable-custom ">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{trans('admin/datatable.name')}} <span
                                                class="text-red">*</span></label>
                                        <input type="text" name="name"
                                               class="form-control mb-3 input_field"
                                               placeholder="name"
                                               id="name"
                                               value="{{ $client->name }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="direct_manager"
                                               class="form-label">{{trans('admin/datatable.direct_manager')}} <span
                                                class="text-red">*</span></label>
                                        <input type="text" name="direct_manager"
                                               class="form-control mb-3 input_field"
                                               placeholder="direct_manager"
                                               id="direct_manager"
                                               value="{{ $client->direct_manager }}">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label">{{trans('admin/datatable.email')}} <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="email"
                                               class="form-control mb-3 input_field"
                                               placeholder="email"
                                               id="email"
                                               value="{{ $client->email }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="primary_mobile_number"
                                               class="form-label">{{trans('admin/datatable.primary_mobile_number')}}
                                            <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="primary_mobile_number"
                                               class="form-control mb-3 input_field"
                                               placeholder=" primary_mobile_number"
                                               id="primary_mobile_number"
                                               value="{{ $client->primary_mobile_number }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="secondary_mobile_number"
                                               class="form-label">{{trans('admin/datatable.secondary_mobile_number')}}
                                            <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="secondary_mobile_number"
                                               class="form-control mb-3 input_field"
                                               placeholder=" secondary_mobile_number"
                                               id="secondary_mobile_number"
                                               value="{{ $client->secondary_mobile_number }}">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="value_added_tax"
                                               class="form-label">{{trans('admin/datatable.value_added_tax')}} <span
                                                class="text-red">*</span> </label>
                                        <input type="text" name="value_added_tax"
                                               class="form-control mb-3 input_field"
                                               placeholder=" value_added_tax"
                                               id="value_added_tax"
                                               value="{{ $client->value_added_tax }}">

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label
                                            class="form-label mb-5">{{trans('admin/datatable.three_percent_tax')}}  </label>
                                        <div class="material-switch">
                                            <input id="three_percent_tax" name="three_percent_tax"
                                                   type="checkbox" @checked($client->three_percent_tax) >
                                            <label for="three_percent_tax" class="label-success"></label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label
                                            class="form-label">{{trans('admin/datatable.address')}}  </label>
                                        <textarea class="form-control mb-4" placeholder="Textarea" id="address"
                                                  name="address"
                                                  rows="3">{{$client->address}}</textarea>
                                    </div>
                                </div>


                                <div class="destinations-group mb-3"> {{-- Owners Group --}}
                                    @foreach ($client->destinations as $destination)
                                        <div class="row destinations destination-item-{{$loop->index}}">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="from_where"
                                                           class="form-label">@lang('admin/datatable.from_where') <span
                                                            class="text-red">*</span> </label>
                                                    <input type="text" class="form-control from_where"
                                                           name="destinations[0][from_where]"
                                                           value="{{$destination->from_where}}" id="from_where"
                                                           aria-describedby="inputGroupPrepend2">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="to_where"
                                                           class="form-label">@lang('admin/datatable.to_where') <span
                                                            class="text-red">*</span> </label>
                                                    <input type="text" class="form-control to_where"
                                                           name="destinations[0][to_where]"
                                                           value="{{$destination->to_where}}" id="to_where"
                                                           aria-describedby="inputGroupPrepend2">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="price"
                                                           class="form-label">@lang('admin/datatable.price') <span
                                                            class="text-red">*</span> </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend2">%</span>
                                                        <input type="text" class="form-control price"
                                                               value="{{$destination->price}}"
                                                               name="destinations[0][price]" id="price"
                                                               aria-describedby="inputGroupPrepend2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md-1 d-none delete-destination-button">
                                                <button type="button" id="delete-destination-{{$loop->index}}"
                                                        class="delete-destination btn btn-icon btn-md mt-6 btn-danger">
                                                    <i
                                                        class="fe fe-trash "></i></button>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-sm-1 col-md-1 mb-4">
                                    <button type="button" id="add-destination" class="btn btn-primary"><i
                                            class="fe fe-plus me-2"></i>@lang('admin/datatable.add_new_destination')
                                    </button>
                                    </button>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Row-->
                <div class="col-xl-3 col-lg-3">

                    <div class="card overflow-hidden">
                        {{--                        <div class="card-header ">--}}
                        {{--                            <div class="card-title">{{trans('admin/datatable.buttons.publish')}}</div>--}}
                        {{--                        </div>--}}
                        <div class="card-footer text-center card-form-footer">
                            <button type="submit" id="submit_button" value="apply" name="action"
                                    class="btn btn-success me-2"><span
                                    class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                            </button>
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-danger "> <span
                                    class="fs-15"><i class="fe fe-edit me-1"></i>@lang('admin/datatable.buttons.general.cancel')</span></a>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header ">
                            <div class="card-title">{{trans('admin/datatable.image')}}</div>
                        </div>
                        <div class="form-group p-2">
                            <input type="file" id="image" name="image" class="dropify input_field p-5"
                                   data-default-file="{{  $client->imageUrl }}"
                                   data-height="180"/>
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
'request'=>'App/Http/Requests/Admin/Client/UpdateClientRequest'])


    @endpush
