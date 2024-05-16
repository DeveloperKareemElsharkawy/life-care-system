@extends('admin-panel.layouts.master')

@section('content')
    <div class="side-app">
        <ol class="breadcrumb1">
            <li class="breadcrumb-item1"><a href="javascript:void(0);" class=""><i class="fe fe-home me-2"
                                                                                   aria-hidden="true"></i>Home</a></li>
            <li class="breadcrumb-item1 active"><i class="fe fe-home me-2" aria-hidden="true"></i>Library</li>
        </ol>

        <div class="row">

            <div class="col-12">
                <div class="card datable-custom ">
                    <div class="card-body">
                        <div class="table-responsive">
                            <livewire:admin.client-table/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
