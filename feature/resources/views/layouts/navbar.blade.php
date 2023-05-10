<!DOCTYPE html>
<html>

<head>
    <title> @yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #keywordList li {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
            padding: 5px 10px;
            background-color: lightblue;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }

        #authors-table th,
        #authors-table td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div id="master">

        <div id="logged">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <img class="profile-photo" src="{{ asset('assets/images/logo1.png') }}"
                    alt="{{ asset('assets/images/logo1.png') }}" />
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>

        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex" id="topnav">

            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>

            <x-nav-link :href="route('check')" :active="request()->routeIs('check')">
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

        </div>

        @yield('content')

    </div>
    <div id="footer">
        <div class="footer">
            <p style="text-align:center;">MEAVC {{ date('Y') }}. All rights reserved.</p>
        </div>
    </div>

    {{-- <script src="{{ asset('assets/js/popper.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-stepper.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    {{-- <script src="{{ asset('assets/js/flowbite.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>
