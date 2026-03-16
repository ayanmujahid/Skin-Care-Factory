@extends('layouts.main')
@section('content')
 <section class="collection-banner text-center">
    <h2>ACCOUNT</h2>
    <p>Home / Login</p>
</section>


<section>
    <div class="account">
    <form action="{{route('loginSubmit')}}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Sign In</button>

        <div class="account-links">
            <a href="#">Forgot your password?</a>
            <a href="{{ route('signup') }}">Create account</a>
            <a href="{{ route('index') }}">Return to Store</a>
        </div>
    </form>
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