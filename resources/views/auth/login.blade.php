<x-app-layout>
    <div id="headless-wrapper">
        <section class="sign-up-page bg-white">
            <div class="container-fluid p-0">
                <div class="row sign-up-page-wrap-row">
                    <div class="col-md-6">
                        <div class="sign-up-right-content bg-white">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <h1 class="mb-25">{{ __('Sign in') }}</h1>
                                <p class="font-16 mb-30">{{ __('New owner?') }} <a href="{{ route('register') }}"
                                        class="secondary-color font-medium">{{ __('Sign Up') }}</a></p>

                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('Email') }}</label>
                                        <input type="text" name="email" class="form-control email"
                                            placeholder="{{ __('Email') }}">
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('Password') }}</label>
                                        <div class="form-group mb-0 position-relative">
                                            <input class="form-control password" name="password"
                                                placeholder="{{ __('Password') }}" type="password">
                                            <span class="toggle cursor fas fa-eye pass-icon"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-6">
                                        <div>
                                            <div class="form-group custom-checkbox" title="{{ __('Remember Me') }}">
                                                <input type="checkbox" id="rememberMe" name="remember" value="1">
                                                <label class="fw-normal"
                                                    for="rememberMe">{{ __('Remember Me') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"><a href="{{ route('password.request') }}"
                                            class="theme-link d-block text-start text-md-end"
                                            title="{{ __('Forgot Password?') }}">{{ __('Forgot Password?') }}</a></div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100"
                                            title="{{ __('Sign In') }}">{{ __('Sign In') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <div class="sign-up-left-content position-relative text-center">
                            <div class="sign-up-bottom-img mb-25">
                                <img src="{{ getSettingImage('sign_in_image') }}" alt="{{ 'app_name' }}"
                                    class="img-fluid">
                            </div>
                            <h1 class="text-white">{{ __('sign_in_text_title') }}</h1>
                            <p class="mt-25 w-75 mx-auto">{{ __('sign_in_text_subtitle') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>