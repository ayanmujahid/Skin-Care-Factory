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
    <link rel="icon" type="image/png" href="{{ asset(isset($logo) ? $logo->img_path : '') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.auth-layouts.links')
    @yield('css')
</head>

<body class="responsive">
    <input type="hidden" id="web_base_url" value="{{ url('/') }}" />
    @include('admin.auth-layouts.header')
    @yield('content')
    @include('admin.auth-layouts.footer')
    @include('admin.auth-layouts.scripts')
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

</html>
