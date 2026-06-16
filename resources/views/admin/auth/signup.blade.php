@extends('admin.auth-layouts.main')
@section('content')
    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ asset('admin/images/auth/auth-img.png') }}" alt="Image">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="{{route('dashboard.login')}}" class="mb-40 max-w-290-px">
                        <img src="{{ asset('admin/images/logo.webp') }}" alt="Image">

                    </a>
                    <h4 class="mb-12">Sign Up to your Account</h4>
                    <p class="mb-32 text-secondary-light text-lg">Please enter your details.</p>
                </div>
                <form action="{{ route('admin.register.submit') }}" method="POST">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="f7:person"></iconify-icon>
                        </span>
                        <input type="text" name="name" class="form-control h-56-px bg-neutral-50 radius-12"
                            placeholder="Username">
                    </div>

                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12"
                            placeholder="Email">
                    </div>

                    <div class="mb-20">
                        <div class="position-relative">
                            <div class="icon-field">
                                <span class="icon top-50 translate-middle-y">
                                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                </span>

                                <input type="password" name="password" class="form-control h-56-px bg-neutral-50 radius-12"
                                    id="your-password" placeholder="Password">
                            </div>

                            <span
                                class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                                data-toggle="#your-password"></span>
                        </div>

                        <div class="mt-12 text-sm">
                            <div id="length" class="text-danger">✖ Minimum 8 characters</div>
                            <div id="uppercase" class="text-danger">✖ One uppercase letter</div>
                            <div id="lowercase" class="text-danger">✖ One lowercase letter</div>
                            <div id="number" class="text-danger">✖ One number</div>
                            <div id="special" class="text-danger">✖ One special character</div>
                        </div>
                    </div>

                    <button type="submit" id="submitBtn" class="btn btn-primary w-100 mt-32" disabled>
                        Sign Up
                    </button>

                    <div class="mt-32 text-center text-sm">
                        <p class="mb-0">Already have an account? <a href="{{ route('dashboard.login') }}"
                                class="text-primary-600 fw-semibold">Sign In</a></p>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <!-- <style type="text/css">
                       
                    </style> -->
@endsection
@section('js')
<script type="text/javascript">
    (() => {

        const password = document.getElementById('your-password');
        const submitBtn = document.getElementById('submitBtn');

        const checks = {
            length: document.getElementById('length'),
            uppercase: document.getElementById('uppercase'),
            lowercase: document.getElementById('lowercase'),
            number: document.getElementById('number'),
            special: document.getElementById('special'),
        };

        password.addEventListener('keyup', function() {

            const value = password.value;

            const validations = {
                length: value.length >= 8,
                uppercase: /[A-Z]/.test(value),
                lowercase: /[a-z]/.test(value),
                number: /[0-9]/.test(value),
                special: /[@$!%*#?&]/.test(value),
            };

            let allValid = true;

            for (const key in validations) {

                if (validations[key]) {
                    checks[key].classList.remove('text-danger');
                    checks[key].classList.add('text-success');
                    checks[key].innerHTML = '✔ ' + checks[key].innerText.substring(2);
                } else {
                    checks[key].classList.remove('text-success');
                    checks[key].classList.add('text-danger');
                    checks[key].innerHTML = '✖ ' + checks[key].innerText.substring(2);

                    allValid = false;
                }
            }

            submitBtn.disabled = !allValid;
        });

    })()
</script>
@endsection
