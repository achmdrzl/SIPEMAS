{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<!--
Jampack
Author: Hencework
Contact: contact@hencework.com
-->
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Classic | Jampack - Admin CRM Dashboard Template</title>
    <meta name="description"
        content="A modern CRM Dashboard Template with reusable and flexible components for your SaaS web applications by hencework. Based on Bootstrap." />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link href="{{ asset('backend/dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper hk-pg-auth" data-footer="simple">
        <!-- Main Content -->
        <div class="hk-pg-wrapper pt-0 pb-xl-0 pb-5">
            <div class="hk-pg-body pt-0 pb-xl-0">
                <!-- Container -->
                <div class="container-xxl">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-sm-10 position-relative mx-auto">
                            <div class="auth-content py-8">
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <form class="w-100" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-5 col-md-7 col-sm-10 mx-auto">
                                            <div class="text-center mb-7">
                                                <a class="navbar-brand me-0" href="index.html">
                                                    <img class="brand-img d-inline-block"
                                                        src="{{ asset('backend/dist/img/logo-light.png') }}"
                                                        alt="brand">
                                                </a>
                                            </div>
                                            <div class="card card-lg card-border">
                                                <div class="card-body">
                                                    <h4 class="mb-4 text-center">Sign in to your account</h4>
                                                    <div class="row gx-3">
                                                        <div class="form-group col-lg-12">
                                                            <div class="form-label-group">
                                                                <label>User Name</label>
                                                            </div>
                                                            <input name="email" :value="old('email')" required
                                                                autofocus autocomplete="username" class="form-control"
                                                                placeholder="Enter username or email ID" type="email">
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            {{-- @if (Route::has('password.request'))
                                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                    href="{{ route('password.request') }}">
                                                                    {{ __('Forgot your password?') }}
                                                                </a>
                                                                <div class="form-label-group">
                                                                    <label>Password</label>
                                                                    <a href="{{ route('password.request') }}"
                                                                        class="fs-7 fw-medium">Forgot
                                                                        Password
                                                                        ?</a>
                                                                </div>
                                                            @endif --}}
                                                            <div class="input-group password-check">
                                                                <span class="input-affix-wrapper">
                                                                    <input class="form-control"
                                                                        placeholder="Enter your password"
                                                                        type="password" name="password" required
                                                                        autocomplete="current-password">
                                                                    <a href="#" class="input-suffix text-muted">
                                                                        <span class="feather-icon"><i class="form-icon"
                                                                                data-feather="eye"></i></span>
                                                                        <span class="feather-icon d-none"><i
                                                                                class="form-icon"
                                                                                data-feather="eye-off"></i></span>
                                                                    </a>
                                                                </span>
                                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="form-check form-check-sm mb-3">
                                                            <input id="remember_me" type="checkbox"
                                                                class="form-check-input" name="remember">
                                                            <label class="form-check-label text-muted fs-7"
                                                                for="logged_in">Keep me logged in</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-uppercase btn-block">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /Container -->
            </div>
            <!-- /Page Body -->

            <!-- Page Footer -->
            <div class="hk-footer border-0">
                <footer class="container-xxl footer">
                    <div class="row">
                        <div class="col-xl-8 text-center">
                            <p class="footer-text pb-0"><span class="copy-text">Jampack © 2022 All rights
                                    reserved.</span> <a href="#" class="" target="_blank">Privacy
                                    Policy</a><span class="footer-link-sep">|</span><a href="#" class=""
                                    target="_blank">T&C</a><span class="footer-link-sep">|</span><a href="#"
                                    class="" target="_blank">System Status</a></p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- / Page Footer -->

        </div>
        <!-- /Main Content -->
    </div>
    <!-- /Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- FeatherIcons JS -->
    <script src="{{ asset('backend/dist/js/feather.min.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('backend/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('backend/vendors/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Init JS -->
    <script src="{{ asset('backend/dist/js/init.js') }}"></script>
</body>

</html>
