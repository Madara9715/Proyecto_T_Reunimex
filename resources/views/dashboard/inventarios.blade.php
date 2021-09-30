@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">

    <div class="row d-flex">
        @include('layouts.tareas2')


        @if(count($inventarios)>0)

        <div class="card col-md-8 pt-3 bordertable">
            <div class="card-header text-uppercase nofont text-light">
                <div class="row">
                    <div class="col-xl-12">

                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-file-ruled"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v4h10V2a1 1 0 0 0-1-1H4zm9 6H6v2h7V7zm0 3H6v2h7v-2zm0 3H6v2h6a1 1 0 0 0 1-1v-1zm-8 2v-2H3v1a1 1 0 0 0 1 1h1zm-2-3h2v-2H3v2zm0-3h2V7H3v2z" />
                        </svg>

                        <label class="mx-2 espacioletras">{{$tablas[1]}}</label>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">


                <div class="table-responsive border-bottom">

                    <table class="table table-sm table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras small">
                                <th class="align-top">Inventario</th>
                                <th class="align-top">estatus</th>
                                <th class="align-top">clave</th>
                                <th class="align-top">Productos Asignados</th>
                                <th class="align-top">detalles inventario</th>
                                <th class="align-top">Encargado de inventario</th>
                                <th class="align-top">Foto</th>
                                <th class="align-top">Clave Encargado</th>
                                <th class="align-top">Último movimiento</th>
                                <th class="align-top">Acciones <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-tools"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M0 1l1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z" />
                                        <path fill-rule="evenodd"
                                            d="M15.898 2.223a3.003 3.003 0 0 1-3.679 3.674L5.878 12.15a3 3 0 1 1-2.027-2.027l6.252-6.341A3 3 0 0 1 13.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z" />
                                    </svg></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventarios as $inventario)
                            @if($inventario->activo == 0)
                            <tr class="text-muted">
                                @else
                            <tr>
                                @endif
                                <td class="font-weight-bolder">Inventario {{$inventario->id}}</td>
                                @if($inventario->activo == 1)
                                <td class="text-light border30p text-center"><span
                                        class="bg-success text-light border30p p-2 ">
                                        Activo </span> </td>
                                @else
                                <td class=" text-light border30p text-center"><span
                                        class="bg-secondary text-light border30p p-2 px-3">Baja</span></td>
                                @endif
                                <td>{{$inventario->clave}}</td>
                                <td>{{count($inventario->productosactivos()->get()->unique('id'))}}</td>
                                <td class="text-capitalize">{{$inventario->detalles}}</td>
                                <td class="font-weight-bolder">{{$inventario->empleado->nombre_empleado}}
                                    {{$inventario->empleado->apellido_p}}
                                    {{$inventario->empleado->apellido_m}}</td>
                                <td>
                                    <span class="caret">
                                        <img src="{{asset('images/user/avatar/'.$inventario->empleado->foto)}}"
                                            alt="F O T O" style="width:50px; height:50px;"
                                            class="rounded-circle tablephoto">
                                    </span>
                                </td>
                                <td>{{$inventario->empleado->clave}}</td>
                                <td>{{$inventario->empleado->updated_at->formatLocalized('%A %d %B %Y')}}</td>

                                <td>
                                    <div class="row justify-content-end mr-1">
                                        <div class="col-lg-3 mt-1 px-4 d-flex justify-content-center">
                                            <a href="{{ route('inventarios.show',$inventario->id)}}"
                                                class=" text-dark border30p" data-toggle="tooltip" data-placement="top"
                                                title="Ver inventario">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-eye"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                    <path fill-rule="evenodd"
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col-lg-3 mt-1 px-4 d-flex justify-content-center">
                                            <a href="{{ route('ventasinventario',$inventario->id)}}" class=" text-primary border30p" data-toggle="tooltip"
                                                data-placement="top" title="Ver ventas del inventario">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart4"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col-lg-3 mt-1 px-4 d-flex justify-content-center">
                                            <a href="#" class=" border30p" data-toggle="tooltip" data-placement="top"
                                                title="Ver movimientos del inventario" style="color: gold;">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16"
                                                    class="bi bi-arrow-down-up" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z" />
                                                </svg>
                                            </a>
                                        </div>
                                        @if($inventario->activo == 1)
                                        <div class="col-lg-3 mt-1 px-4 d-flex justify-content-center">
                                            <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                                title="Dar de baja inventario">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16"
                                                    class="bi bi-arrow-down-circle" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </a>
                                        </div>
                                        @else
                                        <div class="col-lg-3 mt-1 px-4 d-flex justify-content-center">
                                            <a href="#" style="color: #00cc66;" data-toggle="tooltip"
                                                data-placement="top" title="Dar de alta inventario">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16"
                                                    class="bi bi-arrow-up-circle" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path fill-rule="evenodd"
                                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
                                                </svg>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="row mx-2 text-dark small justify-content-end">SIMBOLOGÍA:
                    <label class="text-capitalize ml-4">Ver Inventario
                        <span class="text-dark">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                <path fill-rule="evenodd"
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </span>
                    </label>
                    <label class="text-capitalize ml-4">Ver Ventas Inventario
                        <span class="text-primary">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart4"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                        </span>
                    </label>
                    <label class="text-capitalize ml-4">Ver Movimientos Inventario
                        <span style="color: gold;">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-down-up"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                        </span>
                    </label>
                    <label class="text-capitalize ml-4">Dar de Baja Inventario
                        <span class="text-danger">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-down-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path fill-rule="evenodd"
                                    d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                    </label>
                    <label class="text-capitalize ml-4">Dar de Alta Inventario
                        <span class="text-success">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-up-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path fill-rule="evenodd"
                                    d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
                            </svg>
                        </span>
                    </label>
                </div>
            </div>

        </div>
        @else
        <div class="row m-1 border border-left-0 border-right-0 border-top-0">
            <div class="col-md-12">
                <label class="espacioletras font-weight-bold text-uppercase">
                    Aún no hay inventarios registrados:
                </label>
            </div>
        </div>

        @endif
    </div>




</div>
@endsection
@include('dashboard.new'.$nuevo)
@section('scripts')


<script type="application/javascript">
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection