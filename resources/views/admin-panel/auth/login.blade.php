@extends('admin-panel.layouts.auth.master')
@section('content')
    <div class="page">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="text-center mb-5">
{{--                                    <img src="https://static.vecteezy.com/system/resources/thumbnails/005/261/209/small_2x/fast-delivery-icon-free-vector.jpg"--}}
{{--                                         class="header-brand-img desktop-lgo"--}}
{{--                                         alt="Azea logo">--}}

                                    <img src="{{url('admin_asset/images/brand/logo1.png')}}"
                                         class="header-brand-img desktop-lgo"
                                         alt="Azea logo">
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <h1 class="mb-2"> تسجيل الدخول</h1>
                                            <a href="javascript:void(0);" class="">مرحبًا بعودتك !</a>
                                        </div>
                                        <form class="row g-3 needs-validation" novalidate method="post" style=" direction: rtl; "
                                              action="{{route('admin.login.submit')}}">
                                            @csrf

                                            <div class="input-group mb-4">
                                                <label for="validationCustomUsername"
                                                       class="form-label">البريد الالكترونى</label>
                                                <div class="input-group has-validation">
                                                    <div class="input-group-text"><i class="fe fe-user"></i></div>

                                                    <input type="text"
                                                           class="form-control @error('username') is-invalid @enderror"
                                                           id="validationCustomUsername" placeholder="Username"
                                                           aria-describedby="inputGroupPrepend" required="" value="{{old('username')}}"
                                                           name="username">

                                                    @error('username')
                                                    <div class="invalid-feedback ">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>


                                            <div class="input-group mb-4">
                                                <div class="input-group has-validation" id="Password-toggle1">
                                                    <a href="#" class="input-group-text">
                                                        <i class="fe fe-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="form-control @error('password') is-invalid @enderror" id="validationCustom05" required=""
                                                           name="password" type="password"
                                                           placeholder="Confirm Password">
                                                    @error('password')
                                                    <div class="invalid-feedback ">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>



                                            <div class="form-group text-center mb-3">
                                                <input type="submit" class="btn btn-primary btn-lg w-100 br-7"
                                                       value="تسجيل الدخول">
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
