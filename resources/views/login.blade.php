@extends('layouts.main')
@section('content')
<!-- ================= Login Banner ================= -->
<section class="login-banner" style="background: url('{{ asset('assets/images/banner-image.jpg') }}') center/cover no-repeat; padding: 100px 0; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-size:48px; font-weight:700;">Welcome Back</h1>
        <p style="font-size:18px; margin-top:10px;">Log in to access your account and start shopping fresh groceries.</p>
    </div>
</section>

<!-- ================= Login Form ================= -->
<section class="login-form-section" style="padding:80px 0;">
    <div class="container" style="max-width:600px; margin:0 auto;">
        <h2 style="font-size:32px; font-weight:700; text-align:center; margin-bottom:30px;">Login</h2>
        <form action="{{route('loginSubmit')}}" method="POST" style="display:flex; flex-direction:column; gap:20px;">
            @csrf
            <input type="email" name="email" placeholder="Email Address" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
            <input type="password" name="password" placeholder="Password" required style="padding:12px; border-radius:8px; border:1px solid #ccc; font-size:16px;">
            <button type="submit" class="btn btn-success" style="padding:12px 30px; border-radius:8px;">Login</button>
        </form>
        <p style="text-align:center; margin-top:20px; color:#555;">Don't have an account? <a href="{{route('signup')}}" style="color:#3cb815; text-decoration:none;">Sign up here</a></p>
    </div>
</section>

@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection