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

    <link rel="stylesheet" href="{{asset("assets/libs/dropzone/dropzone.css")}}"/>
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
    </style>


    <style>
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }

        .hero-section {
            background-color: #f5f5f5;
            padding: 60px 0;
            margin-top: 2rem;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .property-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
            margin-bottom: 30px;
        }

        .property-image {
            height: 200px;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .property-type {
            background-color: #e74c3c;
            color: white;
            padding: 3px 10px;
            border-radius: 3px;
            font-size: 0.8rem;
        }

        .property-rating {
            color: #f39c12;
            margin: 10px 0;
        }

        .property-card:hover {
            transform: translateY(-5px);
        }

        .property-header {
            background-color: #f8f9fa;
            padding: 2rem;
            margin-top: 4rem;
        }

        .review-card {
            margin-bottom: 1.5rem;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .contact-form {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 0.25rem;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/appvite.css') }}">
</head>

<body class="font-sans text-gray-900 antialiased">

    @if (app_preloader_status == 1)
        <div id="preloader">
            <div id="preloaderInner"><img src="{{ getSettingImage('app_preloader') }}" alt="img"></div>
        </div>
    @endif

    <div id="layout-wrapper">
        {{-- @if (isAdmin() || isOwner())
        @include('common.layouts.header')

        @endif --}}
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