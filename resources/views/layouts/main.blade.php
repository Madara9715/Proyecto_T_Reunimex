<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reunimex') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('images/icons/logo128-128.ico') }}" rel="shortcut icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    main{
        background-image: url("{{ asset('images/fondo2.jpg') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-color: black;
    }
    body{
        background-color: black;
    }
    </style>
</head>
<body>
    <div id="app">
        <main class="pt-4 lineagradien2">
            @yield('content')
        </main>
    </div>
</body>
</html>
