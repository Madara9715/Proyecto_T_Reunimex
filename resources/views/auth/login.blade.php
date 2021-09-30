@extends('layouts.main')

@section('content')
<div class="container mb-4">
    <div class="row">
        <div class="col-lg-2 offset-lg-5 pl-5 col-4 offset-4 d-none d-md-inline">
            <div class="col-12">
                <img class="img-fluid" src="images/logo3.svg" alt="Logo Reunimex">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="col-xl-5 offset-xl-5 col-md-8 offset-md-2 col-sm-10 offset-sm-1 p-2 fontgradradiant border30p">

                <div class="text-center p-2 mt-4">
                    <label class="headcardwhite espacioletras  text-uppercase lineagradien2">Iniciar Sesión</label>
                    <label class="text-info"> Ingresa tus datos para acceder </label>
                </div>


                <div class="card nofont  border30p">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror my-4 inputblack border30p"
                                placeholder="Email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror my-4 inputblack border30p"
                                placeholder="Contraseña" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="form-check my-4">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" name="remember"
                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label custom-control-label"
                                        for="remember">{{ __('Recordarme') }}</label>
                                </div>
                            </div>


                            <button type="submit"
                                class="btn btn-primary btn-block btn-lg fontgradradiant border30p  espacioletras text-uppercase">
                                accesar
                                <span>
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                        class="bi bi-box-arrow-in-right" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8.146 11.354a.5.5 0 0 1 0-.708L10.793 8 8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 1 8z" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 14.5A1.5 1.5 0 0 0 15 13V3a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 4 3v1.5a.5.5 0 0 0 1 0V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5h-8A.5.5 0 0 1 5 13v-1.5a.5.5 0 0 0-1 0V13a1.5 1.5 0 0 0 1.5 1.5h8z" />
                                    </svg>
                                </span>
                            </button>

                            <div class="row justify-content-center">
                                <a class="btn btn-link"
                                    href="{{ route('password.request') }}">{{ __('¿Olvidaste tu contraseña?') }}</a>
                            </div>

                            <div class="row justify-content-center">
                                <label class="text-muted small">Reunimex ® 2012 - {{Carbon\Carbon::now()->year}}</label>
                            </div>
                        </form>
                        <div class="text-center d-flex align-self-center py-2 d-inline d-md-none">
                            <img class="img-fluid mx-auto" src="images/logo3.svg" alt="Logo Reunimex"
                                style="width: 60px; height:auto;">
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="col-xl-2 d-none d-md-inline">
            <img class="img-fluid" src="images/marca-gto-logo-300x300.png" alt="GTO">
        </div>
    </div>
</div>
@endsection