<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . '    | Skincare Factory' : ' Skincare Factory' }}</title>




    @include('layouts.links')
    @yield('css')
</head>
<input type="hidden" name="" id="web_base_url" value="{{ url('/') }}">

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('js')
    <script>
        (() => {

            // Global SweetAlert Toast Configuration
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });

            // Make it globally available
            window.Swirl = Toast;

            @if (session('notify_success'))
                Swirl.fire({
                    icon: 'success',
                    title: '{{ session('notify_heading', 'Success!') }}',
                    text: '{{ session('notify_success') }}'
                });
            @elseif (session('notify_error'))
                Swirl.fire({
                    icon: 'error',
                    title: '{{ session('notify_heading', 'Error!') }}',
                    text: '{{ session('notify_error') }}'
                });
            @endif

        })();
    </script>
    <script>
        window.CART_MODE = @json($cartMode ?? 'normal');
    </script>


    <style>
        #cta-btn {
            background: #000000;
            color: #f0e1cd;
            pointer-events: all;
            font-weight: 800;
            transition: all 0.5s;
            border: 2px solid #000000;
        }

        #cta-btn:hover {
            background: transparent;
            color: #000;
        }
    </style>

</body>
@include('layouts.errorhandler')
@include('admin.core.editor')
<div id="preloader" style="display:none;">
    <div class="loading">
        <span>Loading...</span>
    </div>
</div>

</html>
