@extends('layouts.main')

@section('content')
<div class="jumbotron">
    <div class="row">
        <div class="col-lg-2 offset-lg-5 col-4 offset-4">
            <div class="col-12">
                <img class="img-fluid" src="images/logo3.svg" alt="Logo Reunimex">
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <h1 class="espacioletras">¡ALTO!</h1>
    </div>

    <div class="row justify-content-center">
        <h3>No tienes acceso al sitio Reunimex</h3>
    </div>

    <div class="row justify-content-center">
        <p class="text-muted lineagradient">Para más información contacta con la empresa</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-8 col-sm-10 py-4 px-5">
            <a class="btn btn-primary btn-block btn-lg fontgradradiant border30p  espacioletras text-uppercase px-3" href="{{ route('login') }}">
                <span class="col-md-5">regresar</span>
                <span>
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-bar-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L3.207 8l2.647-2.646a.5.5 0 0 0 0-.708z" />
                        <path fill-rule="evenodd" d="M10 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h6.5A.5.5 0 0 0 10 8zm2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z" />
                    </svg>
                </span>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <label class="text-muted small">Reunimex ® 2012 - {{Carbon\Carbon::now()->year}}</label>
    </div>
</div>
@endsection