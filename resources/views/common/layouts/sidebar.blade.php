<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ route('home') }}">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                @if (isOwner())
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="ri-building-line"></i>
                            <span>{{ __('Properties') }}</span>
                        </a>
                        <ul class="sub-menu {{ @$navPropertyMMShowClass }}" aria-expanded="false">
                            <li class="{{ @$subNavAllPropertyMMActiveClass }}">
                                <a href="{{ route('owner.property.allProperty') }}"
                                    class="{{ @$subNavAllPropertyActiveClass }}">{{ __('All Property') }}</a>
                            </li>
                            <li class="{{ @$subNavAllUnitMMActiveClass }}">
                                <a href="{{ route('owner.property.allUnit') }}"
                                    class="{{ @$subNavAllUnitActiveClass }}">{{ __('All Unit') }}</a>
                            </li>
                            <li class="{{ @$subNavOwnPropertyActiveClass }}">
                                <a href="{{ route('owner.property.ownProperty') }}"
                                    class="{{ @$subNavOwnPropertyActiveClass }}">{{ __('Own Property') }}</a>
                            </li>
                            <li class="{{ @$subNavLeasePropertyActiveClass }}">
                                <a href="{{ route('owner.property.leaseProperty') }}"
                                    class="{{ @$subNavLeasePropertyActiveClass }}">{{ __('Lease Property') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="ri-user-3-line"></i>
                        <span>{{ __('Tenants') }}</span>
                    </a>
                    <ul class="sub-menu {{ @$navTenantMMShowClass }}" aria-expanded="false">
                        <li class="{{ @$subNavAllTenantMMActiveClass }}">
                            <a href="{{ route('owner.tenant.index', ['type' => 'all']) }}"
                                class="{{ @$subNavAllTenantActiveClass }}">{{ __('All Tenants') }}</a>
                        </li>
                        <li class="{{ @$subNavTenantHistoryMMActiveClass }}">
                            <a href="{{ route('owner.tenant.index', ['type' => 'history']) }}"
                                class="{{ @$subNavTenantHistoryActiveClass }}">{{ __('Tenant History') }}</a>
                        </li>
                    </ul>
                </li>

                @if (isAdmin())
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="ri-user-3-line"></i>
                            <span>{{ __('Owners') }}</span>
                        </a>
                        <ul class="sub-menu {{ @$navTenantMMShowClass }}" aria-expanded="false">
                            <li class="{{ @$subNavAllTenantMMActiveClass }}">
                                <a href="{{ route('owner.tenant.index', ['type' => 'all']) }}"
                                    class="{{ @$subNavAllTenantActiveClass }}">{{ __('All Owners') }}</a>
                            </li>
                            <li class="{{ @$subNavTenantHistoryMMActiveClass }}">
                                <a href="{{ route('owner.tenant.index', ['type' => 'history']) }}"
                                    class="{{ @$subNavTenantHistoryActiveClass }}">{{ __('Owners History') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="ri-account-circle-line"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>
                    <ul class="sub-menu {{ @$navProfileMMShowClass }}" aria-expanded="false">
                        <li class="{{ @$subNavProfileMMActiveClass }}"><a class="{{ @$subNavProfileActiveClass }}"
                                href="{{ route('profile') }}">{{ __('My Profile') }}</a></li>
                        <li><a href="{{ route('change-password') }}">{{ __('Change Password') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href=" route('admin.dashboard')">
                        <i class="ri-message-fill"></i>
                        <span>{{ __('Message') }}</span>
                    </a>
                </li>
                @if (isAdmin())
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="ri-lock-2-line"></i>
                            <span>{{ __('Manage Policy') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href=" route('admin.dashboard') ">{{ __('Terms & Conditions') }}</a>
                            </li>
                            <li>
                                <a href=" route('admin.dashboard') ">{{ __('Privacy Policy') }}</a>
                            </li>
                            <li>
                                <a href="route('admin.dashboard') ">{{ __('Cookie Policy') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('owner.setting') }}">
                            <i class="ri-settings-3-line"></i>
                            <span>{{ __('Settings') }}</span>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</div>