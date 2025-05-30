<x-app-layout>

    <div id="headless-wrapper">
        <section class="sign-up-page bg-white">
            <div class="container-fluid p-0">
                <div class="row sign-up-page-wrap-row">
                    <div class="col-md-6">
                        <div class="sign-up-right-content bg-white mx-4">
                            <form action="register" method="post">
                                @csrf
                                <h1 class="mb-25">{{ __('Sign Up') }}</h1>
                                <p class="font-16 mb-30">{{ __('Already have an account?') }} <a href="{{ route('login') }}"
                                        class="secondary-color font-medium">{{ __('Sign In') }}</a></p>
                                <div class="row mb-25">
                                    <div class="col-md-6">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('First Name') }}</label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                                            class="form-control" placeholder="{{ __('First Name') }}">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('Last Name') }}</label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                                            class="form-control" placeholder="{{ __('Last Name') }}">
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-8">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('Contact Number') }}</label>
                                        <input type="text" name="contact_number" value="{{ old('contact_number') }}"
                                            class="form-control" placeholder="{{ __('Contact Number') }}">
                                        @error('contact_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('Register As') }}</label>
                                    <select id="role" name="role" class="form-control"> 
                                            <option value={{USER_ROLE_TENANT}}>{{"Tenant"}}</option>
                                            <option value={{USER_ROLE_OWNER}}>{{"Owner"}}</option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('Email') }}</label>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control" placeholder="{{ __('Email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('UserName') }}</label>
                                        <input type="text" name="user_name" value="{{ old('user_name') }}"
                                            class="form-control" placeholder="{{ __('User Name') }}">
                                        @error('user_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-25">
                                    <div class="col-md-12 mb-25">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('Password') }}</label>
                                        <div class="form-group mb-0 position-relative">
                                            <input class="form-control" name="password" placeholder="{{ __('Password') }}"
                                                type="password">
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label
                                            class="label-text-title color-heading font-medium mb-2">{{ __('Confirm Password') }}</label>
                                        <div class="form-group mb-0 position-relative">
                                            <input class="form-control" name="password_confirmation"
                                                placeholder="{{ __('Confirmation Password') }}" type="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100"
                                            title="{{ __('Sign Up') }}">{{ __('Sign Up') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <div class="sign-up-left-content position-relative text-center">
                            <div class="sign-up-bottom-img mb-25">
                                <img src="{{ getSettingImage('sign_in_image') }}" alt="app_name"
                                    class="img-fluid">
                            </div>
                            <h1 class="text-white">{{ __('sign_in_text_title')}}</h1>
                            <p class="mt-25 w-75 mx-auto">{{ __('sign_in_text_subtitle')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
