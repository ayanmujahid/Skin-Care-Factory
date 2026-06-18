<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Any config settings you want to fetch you will get in $config array, -->
    <?php //echo $config['COMPANY'];
    ?>
    <title>{{ isset($title) ? $title : '' }}</title>
    <link rel="icon" type="image/png" href="{{ asset(isset($favicon) ? $favicon : '') }}">
    <link rel="icon" href="{{ asset(isset($logo) ? $logo->img_path : '') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layouts.links')
    @yield('css')
</head>

<body>
    <input type="hidden" id="web_base_url" value="{{ url('/') }}" />
    @include('admin.layouts.header')
    @yield('content')
    @include('admin.layouts.footer')
    @include('admin.layouts.scripts')
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
</body>
<div id="preloader" style="display:none;">
    <div class="loading">
        <!--<span>Loading...</span>-->
    </div>
</div>

</html>
