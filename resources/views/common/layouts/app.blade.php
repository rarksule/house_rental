<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/') }}assets/libs/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/') }}assets/libs/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/libs/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://code.iconify.design/1/1.0.7/iconify.min.css">

    <link rel="stylesheet" href="{{ asset('/') }}assets/libs/venobox/venobox.min.css">
    <link href="{{ asset('/') }}assets/css/icons.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/css/extra-style.css" rel="stylesheet">

    <!-- RTL Style End -->

    <link rel="stylesheet" href="{{ asset('/') }}assets/css/responsive.css">

    <!-- FAVICONS -->
    <link rel="icon" href="{{ getSettingImage('app_fav_icon') }}.png" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="{{ getSettingImage('app_fav_icon') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ getSettingImage('app_fav_icon') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    @stack('style')
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

    @if (!Auth::check())
        <style>
            .container {
                width: 90%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px 0;
            }

            /* Hero Section */
            .hero-section {
                background-color: #f5f5f5;
                padding: 60px 0;
                text-align: center;
            }

            .hero-section h1 {
                font-size: 2.5rem;
                margin-bottom: 15px;
            }

            .search-form {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                gap: 15px;
                margin-top: 30px;
            }

            .form-group {
                display: flex;
                align-items: center;
            }

            .search-btn {
                background-color: #2c3e50;
                color: white;
                border: none;
                padding: 10px 25px;
                border-radius: 5px;
                cursor: pointer;
            }

            /* Property Cards */
            .property-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 30px;
                margin: 40px 0;
            }

            .property-card {
                border: 1px solid #ddd;
                border-radius: 8px;
                overflow: hidden;
            }

            .property-image {
                height: 200px;
                background-color: #eee;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .property-details {
                padding: 20px;
            }

            .property-type {
                display: inline-block;
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

            .property-features {
                display: flex;
                list-style: none;
                padding: 0;
                gap: 15px;
            }


            /* Footer */
            .main-footer {
                background-color: #2c3e50;
                color: white;
                padding: 50px 0;
            }

            .footer-nav {
                display: flex;
                gap: 20px;
                margin: 20px 0;
            }

            .footer-nav a {
                color: white;
                text-decoration: none;
            }

            .footer-actions {
                display: flex;
                gap: 15px;
            }

            .add-property,
            .sign-in {
                padding: 10px 20px;
                border-radius: 5px;
            }

            .add-property {
                background-color: #e74c3c;
                color: white;
            }

            .sign-in {
                background-color: white;
                color: #2c3e50;
            }


            .hero-section {
                background: linear-gradient(rgba(0, 0, 0, 0.6), url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
                        background-size: cover;
                        background-position: center;
                        color: white;
                        padding: 120px 0;
                }

                .property-card {
                    transition: transform 0.3s;
                    margin-bottom: 30px;
                }

                .property-card:hover {
                    transform: translateY(-5px);
                }

                .property-img-placeholder {
                    height: 200px;
                    background-color: #f8f9fa;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #6c757d;
                }

                .rating {
                    color: #FFD700;
                }

                .search-options .form-check-label {
                    cursor: pointer;
                }
        </style>
    @endif
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
        @include('common.layouts.sidebar')
        {{ $slot }}
        {{-- @yield('content') --}}
    </div>
    @include('common.layouts.script')
    @stack('script')

    <!-- App Custom js -->
    <!-- <script src="{{ asset('assets/appvite.js') }}"></script> -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <input type="hidden" id="topSearchRoute" value="{{ route('owner.top.search') }}">
</body>

</html>