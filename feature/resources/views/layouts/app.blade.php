<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"                                                        integrity="sha512-Fu9FMbWz7kpctCjntiVgtreD4ZwOKgkHp4x6d4j3Uv9yU55l6mpAvvlhSjrvfZsygNJwXTnnmHmBNbc4dK3Ykw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Scripts -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-stepper.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{ asset('assets/js/flowbite.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote-bs5.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote-bs5.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @can('action')
            @include('layouts.navigation')
        @endcan

        @can('president')
            @include('layouts.navigation')
        @endcan

        <!-- Page Content -->
        <main>
            @can('personne')
                <x-primary-button id="backButton"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</x-primary-button>

                <style>
                    #backButton {
                        margin: 10px;
                        padding: 10px;
                        position: fixed;
                    }
                </style>

                <script>
                    const backButton = document.getElementById("backButton");
                    backButton.addEventListener("click", () => {
                        window.history.back();
                    });
                </script>
            @endcan

            {{ $slot }}
        </main>

    </div>
</body>

</html>
