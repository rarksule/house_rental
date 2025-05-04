<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/') }}assets/libs/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/css/icons.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/css/extra-style.css" rel="stylesheet">
    <link rel="icon" href="{{ getSettingImage('app_fav_icon') }}.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">

    

    <link href="{{ asset('/') }}assets/css/extra-style.css" rel="stylesheet" type="text/css" />
    <style>
        :root {
            @if ('website_color_mode' == ACTIVE)
                --primary-color: '#3686FC';
                --secondary-color: '#8253FB';
                --button-primary-color: '#3686FC';
                --button-hover-color: '#0063E6';
            @else --primary-color: #3686FC;
                --secondary-color: #8253FB;
                --button-primary-color: #3686FC;
                --button-hover-color: #0063E6;
            @endif
        }
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
            min-height: 150px;
            padding: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/appvite.css') }}">
</head>

<body class="font-sans text-gray-900 antialiased">

    @if (app_preloader_status == 1)
        <div id="preloader">
            <div id="preloaderInner"><img src="{{ getSettingImage('app_preloader') }}" alt="img"></div>
        </div>
    @endif

    <div id="layout-wrapper">
        @include('common.layouts.header')

        @if(!isTenant())
            @include('common.layouts.sidebar')
        @endif

        {{ $slot }}
        {{-- @yield('content') --}}
    </div>
    @if (!isAdminPanel())
        @include('common.layouts.footer')
    @endif


    @include('common.layouts.script')
    @stack('script')
    
    <!-- App Custom js -->
    <!-- <script src="{{ asset('assets/appvite.js') }}"></script> -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <input type="hidden" id="topSearchRoute" value="{{ route('owner.top.search') }}">
</body>

</html>