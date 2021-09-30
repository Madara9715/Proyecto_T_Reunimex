<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
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

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark nofont shadow-sm">
            <div class="container d-flex flex-row">
                <a href="{{ url('/') }}">
                    <img src="{{asset('images/logo3.svg')}}" alt="Reunimex" style="width:55px;" class="imgwhite">
                </a>

                <div class="col-xl-8 d-none d-sm-none d-md-block">
                    <div class="row d-flex justify-content-end">
                        <span class="mx-3 text-light text-uppercase espacioletras">
                            ¡ Bienvenido de vuelta {{$user->empleado->nombre_empleado}} {{$user->empleado->apellido_p}} !
                        </span>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <span class="mx-3 text-secondary">
                            Hoy es {{Carbon\Carbon::now()->toDateString()}}
                        </span>
                    </div>
                </div>
                <div class="row text-light text-uppercase espacioletras justify-content-center d-block d-md-none">
                    R e u n i m e x
                </div>

                <div class="row px-2">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle transparentfont border30p imgwhite" data-toggle="dropdown">
                            <span class="caret">
                                <img src="{{asset('images/user/avatar/'.$user->empleado->foto)}}" alt="U S U A R I O" style="width:40px;" class="rounded-circle iconphoto">
                            </span>
                            <span class="px-4 py-2 lineagradient d-none d-sm-none d-md-inline">
                                {{ $user->name_user }}
                            </span>
                        </button>
                        <div class="dropdown-menu transparentfont text-light text-uppercase espacioletras px-2 rounded-corners-gradient-borders">
                            <a class="dropdown-item orangen2" href="{{ route('login') }}">

                                <span>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    </svg>
                                </span>
                                <span class="d-none d-sm-none d-md-inline">
                                    <small class="font-weight-bolder">Ver perfíl</small>
                                </span>
                            </a>
                            <a class="dropdown-item orangen2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">

                                <span>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-door-open" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1 15.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM11.5 2H11V1h.5A1.5 1.5 0 0 1 13 2.5V15h-1V2.5a.5.5 0 0 0-.5-.5z" />
                                        <path fill-rule="evenodd" d="M10.828.122A.5.5 0 0 1 11 .5V15h-1V1.077l-6 .857V15H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117z" />
                                        <path d="M8 9c0 .552.224 1 .5 1s.5-.448.5-1-.224-1-.5-1-.5.448-.5 1z" />
                                    </svg>
                                </span>
                                <span class="d-none d-sm-none d-md-inline">
                                    <small class="font-weight-bolder">Salir</small>
                                </span>
                            </a>
                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

            </div>
        </nav>

        @include('layouts.nav2')
        <main>
            <div class="container-fluid">
                <div class="row align-items-center text-light espacioletras" style="background-color: #0066cc;">
                    <div class="col-md-3 text-uppercase p-2 bt1 btn btn-sm font-weight-bolder d-none d-sm-none d-md-inline">
                        <span>
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-grid-3x3-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 2H2v2h2V2zm1 12v-2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm5 10v-2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zM9 2H7v2h2V2zm5 0h-2v2h2V2zM4 7H2v2h2V7zm5 0H7v2h2V7zm5 0h-2v2h2V7zM4 12H2v2h2v-2zm5 0H7v2h2v-2zm5 0h-2v2h2v-2zM12 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2z" />
                            </svg>
                        </span>
                        @yield('panel')
                    </div>
                    <div class="col-md-9">
                        <div class="row py-1 justify-content-center text-uppercase d-none d-sm-flex border border-top-0 border-left-0 border-right-0 border-primary">

                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                            </svg>

                            <small class="mx-2"> Sección actual</small>
                        </div>
                        <div class="row mx-2 justify-content-center align-items-center">
                            <span class="text-uppercase rounded-corners-gradient-borders px-5 py-2 transparentfont" style="color:gold;"> @yield('titlepanel')</span>
                            <!-- <span class="d-none d-sm-none d-md-inline" style="color: #A8EB12;"><small>|</small></span> -->
                        </div>
                    </div>
                </div>

            </div>

            @yield('content')

            @yield('scripts')
        </main>
    </div>

</body>



</html>