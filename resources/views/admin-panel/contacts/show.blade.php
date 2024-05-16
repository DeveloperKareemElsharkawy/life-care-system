@extends('admin-panel.layouts.master')

@section('content')
    <div class="side-app">


        <!--Page header-->


                <ol class="breadcrumb1">
                    <li class="breadcrumb-item1"><a href="{{route('admin.dashboard.home')}}" class=""><i
                                class="fe fe-home me-2"
                                aria-hidden="true"></i>
                            @lang('admin/dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item1"><a href="{{route('admin.contacts.index')}}" class="">
                            @lang('admin/dashboard.menus.support_tickets')</a>
                    </li>
                    <li class="breadcrumb-item1 active"> {{$contact->name}}
                    </li>
                </ol>

        <!--End Page header-->

        <form method="post" id="myform" autocomplete="off"
              action="{{route('admin.contacts.reply', ['contact_id' => $contact])}}"
              enctype="multipart/form-data"
              class="">
            @csrf

            <!-- Row -->
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title fs-19">@lang('admin/datatable.ticket')</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 table-striped ">
                                    <tbody>

                                    <tr>
                                        <td class="">
                                            <span class="font-weight-semibold w-50">@lang('admin/datatable.name')</span>
                                        </td>
                                        <td class="">{{$contact->name}}</td>
                                    </tr>

                                    <tr>
                                        <td class="">
                                            <span
                                                class="font-weight-semibold w-50">@lang('admin/datatable.email')</span>
                                        </td>
                                        <td class="">{{$contact->email}}</td>
                                    </tr>

                                    <tr>
                                        <td class="">
                                            <span
                                                class="font-weight-semibold w-50">@lang('admin/datatable.mobile')</span>
                                        </td>
                                        <td class="">{{$contact->phone_number}}</td>
                                    </tr>

                                    <tr>
                                        <td class="">
                                            <span
                                                class="font-weight-semibold w-50">@lang('admin/datatable.subject')</span>
                                        </td>
                                        <td class="">{{$contact->subject}}</td>
                                    </tr>

                                    <tr>
                                        <td class="">
                                            <span
                                                class="font-weight-semibold w-50">@lang('admin/datatable.message')</span>
                                        </td>
                                        <td class="w-50">{{$contact->message}}</td>
                                    </tr>

                                    </tbody>
                                </table>

                                <div class="mt-3">
                                    <x-admin.drop-down-input :selected="$contact->is_read" name="status" :options="[
                                                             '1' => __('admin/datatable.readed'),
                                                             '0' => __('admin/datatable.unreaded'),
                                                             ]" :value="$contact->status"/>
                                </div>
                                <div class="card-footer text-center card-form-footer">
                                    <button type="submit" id="submit_button"
                                            class="btn btn-primary me-2"><span
                                            class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                                    </button>

                                </div>


                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary ">
                            <h3 class="card-title fs-19 text-white">@lang('admin/datatable.replies')</h3>
                        </div>
                        <div class="card-body">
                            @foreach($contact->replies as $reply)
                                <div class="mb-5">

                                    <div class="text-muted fs-15 mb-3">
                                        {{$reply->message}}
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="text-muted text-lg-right fs-15">@lang('admin/datatable.by')
                                                : {{$reply->admin->name}}</div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="text-muted text-lg-left fs-15"> التاريخ
                                                : {{$reply->created_at}}</div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header bg-success ">
                            <h3 class="card-title fs-19 text-white">@lang('admin/datatable.add_reply')</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-5">

                                <x-admin.text-area-input name="message" rows="4"></x-admin.text-area-input>

                                <div class="card overflow-hidden">
                                    <div class="card-footer text-center card-form-footer">
                                        <button type="submit" id="submit_button"
                                                class="btn btn-success me-2"><span
                                                class="fs-15"><i class="fe fe-save me-1"></i>@lang('admin/datatable.buttons.general.save')</span>
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </form>

    </div>

@endsection

@push('scripts')
    @include('vendor.lrgt.ajax_script', ['form' => '#myform','name_class'=>'',
'request'=>'App/Http/Requests/Admin/System/Admin/CreateSystemUserRequest','on_start'=>false])

@endpush
