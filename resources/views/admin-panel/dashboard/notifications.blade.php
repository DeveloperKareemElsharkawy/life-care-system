@extends('admin-panel.layouts.master')
@section('content')
    <!--app-content open-->

    <div class="side-app">
        @foreach($notifications as  $key => $notifications)
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="fs-16">{{$key}}</h3>
                </div>
                <div class="card-body">

                    @foreach($notifications as $notification)
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i>
                            <a href="{{route('admin.orders.show',['order_id' => ($notification->data)[0]['order_id']])}}" class="link-light">
                                @lang('admin/datatable.order_status_changed_to',['order' => ($notification->data)[0]['order_number'] ] ) {{($notification->data)[0]['status']}}

                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        @endforeach

    </div>

@endsection

@push('scripts')

@endpush
