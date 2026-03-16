@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>ACCOUNT</h2>
        <p>Home / Signup</p>
    </section>


    <section>
        <div class="account">
            <form action="{{ route('signUp') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

                <button type="submit">Create Account</button>

                <div class="account-links">
                    <a href="{{ route('login') }}">Already have an account?</a>
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
