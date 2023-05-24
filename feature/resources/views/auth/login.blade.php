<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="en">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MEAVC - Login</title>
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/universal.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/log.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" id="oxygen-universal-styles-css"
        href="//www.meavc.com/wp-content/uploads/oxygen/css/universal.css?cache=1684316255&#038;ver=6.2.1"
        media="all" /> --}}
</head>

<body>

    <!-- menu -->
    <div class="bgWrapper"></div>
    <h4 class="openMenu">Menu</h4>
    <div id="menuWrapper">

        @guest
            <ul id="menu">
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('home') }}">Home</a></li>
            </ul>
        @endguest

        @auth
            <ul id="menu">
                <li><a href="{{ route('check') }}">Dashboard</a></li>
            </ul>
        @endauth


        <div class="shrink-0 flex items-center">
            <a href="{{ url('/') }}">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-800"
                    style="display:block; height:60px; left:30px; position:absolute; margin-top:5px;" />
            </a>
        </div>

    </div>
    <!-- menu end -->

    <!-- track -->
    <div id="track" class="nowrap"> <a href="{{ url('/') }}">Home</a> <span>/</span> Abstracts <span>/</span>
        Call for Abstracts</div>
    <!-- track end -->
    <!-- article -->
    <article>
        <!-- right -->
        <div id="right" class="content">
            <h1>Login to your account</h1>
            <p>&nbsp;</p>
            <div class="AbstractsTop">
                <div class="log">
                    <div class="log-notices-wrapper"></div>
                    <form method="POST" action="{{ route('login') }}" class="log-form log-form-login login">
                        @csrf
                        <p class="log-form-row log-form-row--wide form-row form-row-wide">
                            <label for="email">Email address&nbsp;<span class="required">*</span></label>
                            <input type="email" class="mt-1 log-Input log-Input--text input-text"
                                name="email" id="email" required autofocus autocomplete="username"
                                value="{{ old('email') }}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </p>

                        <p class="log-form-row log-form-row--wide form-row form-row-wide">
                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                            <span class="password-input">
                                <input class="mt-1 log-Input log-Input--text input-text" type="password"
                                    name="password" id="password" required autocomplete="current-password">
                                <span class="show-password-input"></span>
                            </span>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </p>

                        <p class="form-row">
                            <label for="remember_me"
                                class="mt-4 log-form__label log-form__label-for-checkbox log-form-login__rememberme">
                                <input class="log-form__input log-form__input-checkbox" name="remember"
                                    type="checkbox" id="remember_me" value="forever">
                                <span>Remember me</span>
                            </label>

                            <button type="submit"
                                class=log-button button log-form-login__submit wp-element-button"
                                name="login" value="Log in">Log in</button>
                        </p>

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <p class="clear">&nbsp;</p>
    </article>
    <!-- article end -->

    <!--------------------- footer --------------------->
    <footer style="position: fixed; width:100%;">
        <div class="left">
            <a href="#">
                <img src="{{ asset('assets/images/logofooter.png') }}" alt="LOGO FOOTER">
            </a>
        </div>

        <div class="right">
            <p class="bold">CONTACT</p>
            <p>+971 4 447 5580</p>
            <p><a href="mailto:abstracts@meavc.com">abstracts@meavc.com</a></p>
            <p>&nbsp;</p>

            <p class="bold">LOCATION</p>
            <p>YES BUSINESS TOUR Office number 505, Barsha 1, Dubai - UAE</p>
            <p>&nbsp;</p>

        </div>
        <p class="clear"></p>
        <hr>
        <p style="text-align: center;" class="text-center">All rights reserved {{ date('Y') }} Copyright &copy;</p>
    </footer>
    <!--------------------- footer end --------------------->

    <script type="text/javascript" src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <!-- for slider effect-->
    <script type="text/javascript" src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('assets/js/banner.js') }}"></script>
    <!-- for all -->
    <script type="text/javascript" src=" {{ asset('assets/js/menu.js') }}"></script>
</body>

</html>
