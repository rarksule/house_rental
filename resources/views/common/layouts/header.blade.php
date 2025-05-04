<header id="page-topbar">
    <!-- Main Navbar -->
    <div class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <div class="d-flex w-100 align-items-center">
                <!-- Left Side: Brand and Admin Button -->
                <div class="d-flex align-items-center">
                    <a class="navbar-brand d-none d-sm-block" href="{{route('home')}}">
                        <h2 class="m-0 text-primary font-24">JIGJIGA House Rental</h2>
                    </a>

                    @if (isAdminPanel())
                        <button type="button" class="btn-sm px-3 font-24 header-item ms-2" id="vertical-menu-btn">
                            <i class="ri-indent-decrease"></i>
                        </button>
                    @endif
                </div>




                <!-- Right Side: User Controls -->
                <div class="d-flex align-items-center ms-auto">
                    @if (Auth::check())
                        <!-- Language Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="header-item noti-icon" id="page-header-languages-dropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset(selectedLanguage()->icon) }}"
                                    alt="{{ selectedLanguage()->name ?? 'English' }}"
                                    title="{{ selectedLanguage()->name ?? 'English' }}"
                                    class="rounded-circle avatar-xs fit-image">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="page-header-languages-dropdown">
                                <div>
                                    @foreach (languages() as $language)
                                        <a href="{{ route('local', $language->code) }}" class="dropdown-item"
                                            title="{{ $language->code }}">
                                            <div class="d-flex">
                                                <img src="{{ $language->icon }}" class="me-3 rounded-circle avatar-xs"
                                                    alt="user-pic">
                                                <div class="flex-1">{{ $language->name }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block ms-2">
                            <button type="button" class="header-item noti-icon" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-notification-2-fill"></i>
                                <span class="noti-dot pulse"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 text-start">{{ __('Notifications') }}</h5>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar>
                                    @foreach (getNotificationLimit(auth()->id()) as $notification)
                                        <a href="{{ route('notification.status', $notification->id) }}"
                                            class="notification-item">
                                            <div class="d-flex">
                                                <img src="{{ getFileUrl($notification->folder_name, $notification->file_name) }}"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">

                                                <div class="flex-1">
                                                    <h6 class="mb-1">{{ $notification->first_name }}</h6>
                                                    <div class="">
                                                        <p class="mb-1">{{ $notification->title }}</p>
                                                        <p class="mb-0 font-12"><i class="mdi mdi-clock-outline"></i>
                                                            {{ $notification->created_at->diffForHumans() }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn-sm theme-link font-size-14 d-flex align-items-center justify-content-center"
                                            href="{{ route('owner.notification') }}">
                                            {{ __('See All') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ms-2 user-dropdown">
                            <button type="button" class="header-item" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle avatar-xs fit-image header-profile-user"
                                    src="{{ getSingleImage(auth()->user(),'profile_image') }}" alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 font-medium">{{ auth()->user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="page-header-user-dropdown">
                                <a class="dropdown-item" href="{{ route(userPrefix().'.profile') }}"><i
                                        class="ri-user-line align-middle me-1"></i> {{ __('Profile') }}</a>

                                @if (isAdmin())
                                    <a class="dropdown-item" href="{{ route('admin.setting') }}"><i
                                            class="ri-settings-2-line align-middle me-1"></i> {{ __('Settings') }}</a>
                                @endif

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ri-shut-down-line align-middle me-1"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>

                    @endif
                </div>

                <!-- Mobile Toggler -->
                @if (!isAdminPanel())
                    <button class="navbar-toggler d-lg-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endif
            </div>
            <!-- Navigation Links (Will collapse on mobile) -->
            @if (!isAdminPanel())
                <div class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarContent">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                @if (isAdmin() || isOwner())
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('home')}}">Home</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Listings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                </li>
                                <li class="nav-item me-2">
                                    <a class="nav-link" href="#">Pages</a>
                                </li>
                                @if (!Auth::check())
                                    <li class="nav-item">
                                        <a href="{{route('login')}}" ><button class="btn btn-success text-nowrap">Sign In</button></a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</header>