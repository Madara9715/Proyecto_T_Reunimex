@extends('layouts.app')
@section('panel', 'administrador')
@section('titlepanel','Panel principal')

@section('content')
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">

                    {{ __('Ventana principal de Administrador') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection