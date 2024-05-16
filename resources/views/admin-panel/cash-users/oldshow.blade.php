@extends('admin-panel.layouts.master')
@push('styles')
    <link href="{{ URL::asset('admin_asset/plugins/gallery/gallery.css')}}" rel="stylesheet">
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
                    <li class="breadcrumb-item1"><a href="{{route('admin.users.index')}}" class="">
                            @lang('admin/dashboard.menus.users')</a>
                    </li>
                    <li class="breadcrumb-item1 active"> {{$user->name_ar}}
                    </li>
                </ol>

            </div>

        </div>
        <!--End Page header-->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card box-widget widget-user ">
                    <div class="widget-user-image mx-auto custom-widget-user mt-5"><img alt="User Avatar"
                                                                                        class="rounded-circle custom-rounded-circle"
                                                                                        src="{{$user->imageUrl}}">
                    </div>
                    <div class="card-body text-center mt-6">
                        <div class="pro-user">
                            <h4 class="pro-user-username mb-1 font-weight-bold">{{$user->name_ar}}</h4>

                            <a href="{{route('admin.users.edit',['user_id' =>$user->id])}}"
                               class="btn btn-success mt-1"><i
                                    class="fa fa-pencil me-2"></i>@lang('admin/datatable.buttons.general.update_info')
                            </a>
                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="description-block text-center p-4">
                                    <h5 class="description-header mb-1 font-weight-bold number-font">0  </h5>
                                    <span class="text-muted">@lang('admin/datatable.orders')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title fs-19">@lang('admin/datatable.personal_info')</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50">@lang('admin/datatable.name') </span>
                                    </td>
                                    <td class="">{{$user->name_ar}}</td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span
                                            class="font-weight-semibold w-50">@lang('admin/datatable.email')  </span>
                                    </td>
                                    <td class="">{{$user->email}}  </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50"> @lang('admin/datatable.mobile')</span>
                                    </td>
                                    <td class="">{{$user->mobile}}</td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50"> @lang('admin/datatable.state_id')</span>
                                    </td>
                                    <td class="">{{$user->state->name_ar}}</td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50"> @lang('admin/datatable.zone')</span>
                                    </td>
                                    <td class="">{{$user->zone}}</td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50"> @lang('admin/datatable.street')</span>
                                    </td>
                                    <td class="">{{$user->street}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($user->archives))
                <div class="col-xl-12 col-lg-12">
                    <div class="text-center mb-5">
                        <h1 class="page-title mb-0 text-primary mb-3 fs-25">أرشيف الطلب
                        </h1>
                    </div>
                </div>
                @foreach($user->archives as $archive)
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fs-19">{{$archive->title}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-muted fs-15 mb-3"> {{$archive->description}}</div>

                                <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        @foreach(json_decode($archive->images) as $image)
                                            <button type="button" data-bs-target="#carousel-indicators"
                                                    data-bs-slide-to="{{$loop->index}}"
                                                    class="active"></button>
                                        @endforeach
                                    </div>

                                    <div class="carousel-inner">
                                        <div class="card-body">
                                            <ul id="lightgallery" class="list-unstyled row">
                                                @foreach(json_decode($archive->images) as $image)
                                                    <li class="col-xs-4 col-sm-4 col-md-4 col-lg-4  "
                                                        data-responsive="{{asset('storage/' . $image)}}"
                                                        data-src="{{asset('storage/' . $image)}}"
                                                        data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                        <a href="#">
                                                            <img class="img-responsive br-7 img-archive"
                                                                 style="width: 300px; height: 200px; object-fit: fill;"
                                                                 src="{{asset('storage/' . $image)}}"
                                                                 alt="Thumb-1">
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>


    </div>

@endsection

@push('scripts')
    <script>
        @foreach($user->archives as $archive)
        lightGallery(document.getElementById('lightgallery{{$archive['id']}}'), {
            speed: 500,
        });
        @endforeach
    </script>

@endpush
