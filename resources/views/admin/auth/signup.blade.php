@extends('admin.auth-layouts.main')
@section('content')


<div class="container">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-6 col-sm-8 col-12">
            <div class="card custom-card border-0 my-4">
                <div class="card-body p-5">

                    <div class="mb-4">
                        <a href="#">
                            <img src="{{asset('admin/images/brand-logos/toggle-logo.png')}}" alt="logo" class="desktop-dark">
                        </a>
                    </div>

                    <div>
                        <h4 class="mb-1 fw-semibold">Sign Up</h4>
                        <p class="mb-4 text-muted fw-normal">Join us by creating a free account!</p>
                    </div>

                    {{-- SHOW ERRORS --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- SUCCESS MESSAGE --}}
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('admin.register.submit') }}" method="POST">
                        @csrf

                        <div class="row gy-3">

                            <div class="col-xl-12">
                                <label class="form-label text-default">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                       placeholder="Enter Full Name"
                                       value="{{ old('name') }}">
                            </div>

                            <div class="col-xl-12">
                                <label class="form-label text-default">Email</label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="Enter Email"
                                       value="{{ old('email') }}">
                            </div>

                            <div class="col-xl-12 mb-2">
                                <label class="form-label text-default d-block">Password</label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control"
                                           id="signin-password"
                                           placeholder="Enter Password">
                                    <a href="javascript:void(0);" class="show-password-button text-muted"
                                       onclick="createpassword('signin-password',this)"
                                       id="button-addon2">
                                        <i class="ri-eye-off-line align-middle"></i>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>

                    </form>

                    <div class="text-center mt-3 fw-medium">
                        Already have an account?
                        <a href="{{ route('dashboard.login') }}" class="text-primary">Sign In</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection
@section('css')
<!-- <style type="text/css">
       
    </style> -->
@endsection
@section('js')
<script type="text/javascript">
    (() => {
        /*in page css here*/
    })()
</script>
@endsection