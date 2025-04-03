<div class="page-topbar">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        
        <a class="navbar-brand" href="#">
            <h2 class="m-0 text-primary">JIGJIGA House Rental</h2>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            @if (isTenant() || !Auth::check())
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Listings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pages</a>
                    </li>
            </ul>
            @endif

        </div>
        @if (Auth::check())
            <div class="d-flex">
                <div class="dropdown d-inline-block">
                    <button type="button" class="header-item noti-icon" id="page-header-languages-dropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset(selectedLanguage()->icon) }}" alt="{{ selectedLanguage()->name ?? 'English' }}"
                            title="{{ selectedLanguage()->name ?? 'English' }}" class="rounded-circle avatar-xs fit-image">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="page-header-languages-dropdown">
                        <div>
                            @foreach (languages() as $language)
                                <a href="{{ route('local', $language->code) }}" class="dropdown-item"
                                    title="{{ $language->code }}">
                                    <div class="d-flex">
                                        <img src="{{ $language->icon }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">{{ $language->name }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
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
                                <a href="{{ route('notification.status', $notification->id) }}" class="notification-item">
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

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="header-item" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle avatar-xs fit-image header-profile-user"
                            src="{{ auth()->user()->image }}" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1 font-medium">{{ auth()->user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="page-header-user-dropdown">
                        <a class="dropdown-item" href="{{ route('owner.profile') }}"><i
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
            </div>
        @else
            <div class="d-flex">
                <a href="{{route('login')}}" class="btn btn-danger px-4">Sign In</a>
            </div>
        @endif
    </div>
</nav>

</div>