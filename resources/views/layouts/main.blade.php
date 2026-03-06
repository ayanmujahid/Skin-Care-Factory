<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . "    | Christelle Store" : " Christelle Store" }}</title>
    
 


    @include('layouts.links')
    @yield('css')
</head>
<input type="hidden" name="" id="web_base_url" value="{{url('/')}}">
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('js')
    <script>
(() => {
    @if(session('notify_success'))
        Swal.fire({
            icon: 'success',
            title: '{{ session('notify_heading', 'Success!') }}',
            text: '{{ session('notify_success') }}',
            confirmButtonText: 'OK'
        });
    @elseif(session('notify_error'))
        Swal.fire({
            icon: 'error',
            title: '{{ session('notify_heading', 'Error!') }}',
            text: '{{ session('notify_error') }}',
            confirmButtonText: 'OK'
        });
    @endif
})();
</script>

</body>
@include('layouts.errorhandler')
@include('admin.core.editor')
<div id="preloader" style="display:none;">
    <div class="loading">
        <span>Loading...</span>
    </div>
</div>

</html>
