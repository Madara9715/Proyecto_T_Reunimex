@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">

    <div class="row d-flex">

        <div class="card text-primary col-lg-8 mb-3 mt-5  mx-auto">


            <div class="d-md-flex d-inline-flex justify-content-md-end justify-content-center">

                <span class="d-flex caret mt-n5 mx-auto text-light px-3 rounded-circle showphoto bg-primary">
                    <img src="{{asset('images/icons/shop.svg')}}" alt="F O T O" style="width:100px;height:auto"
                        class="m-auto align-self-center">
                </span>

                <div class="ml-2 mt-2">
                    <a href="#" class="btn bt2 fontgradradiant">
                        <svg width="2em" height="2em" style=" transform: rotateY(180deg);" viewBox="0 0 16 16"
                            class="bi bi-reply-all-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.079 11.9l4.568-3.281a.719.719 0 0 0 0-1.238L8.079 4.1A.716.716 0 0 0 7 4.719V6c-1.5 0-6 0-7 8 2.5-4.5 7-4 7-4v1.281c0 .56.606.898 1.079.62z" />
                            <path fill-rule="evenodd"
                                d="M10.868 4.293a.5.5 0 0 1 .7-.106l3.993 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a.5.5 0 0 1-.593-.805l4.012-2.954a.493.493 0 0 1 .042-.028.147.147 0 0 0 0-.252.496.496 0 0 1-.042-.028l-4.012-2.954a.5.5 0 0 1-.106-.699z" />
                        </svg>
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            regresar
                        </span>
                    </a>
                </div>

            </div>

            <!--  <img src="{{asset('images/iconsbootstrap/emoji-laughing.svg')}}" class="iconwhite" alt="carita" width="32" height="32" title="Bootstrap"> -->

            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-9 justify-content-center">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        nombre almacen:
                    </label>
                    <span
                        class="text-dark text-capitalize font-weight-bold bigtitle">{{$almacenes->nombre_almacen}}</span>
                </div>
                <div
                    class="col-md-3 d-flex align-self-end justify-content-center border bg-danger text-dark rounded-lg">
                    <label class="espacioletras font-weight-bold text-uppercase text-light my-auto">
                        clave:
                    </label>
                    <span class="text-dark text-capitalize font-weight-bold">{{$almacenes->clave}}</span>
                </div>


            </div>

            <div class="row m-1 border border-left-0 border-right-0 border-top-0">
                <div class="col-md-6">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Productos:
                    </label>
                    <span class="text-dark text-justify">{{count($almacenes->productos)}}</span>
                </div>
                <div class="col-md-6">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        descripción:
                    </label>
                    <span class="text-dark text-justify">{{$almacenes->detalles}}</span>
                </div>
            </div>

            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-6">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Telefono fijo:
                    </label>
                    <span class="text-dark font-weight-bold">{{$almacenes->telefono_fijo}}</span>
                </div>
                <div class="col-md-6">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Dirección:
                    </label>
                    <span class="text-dark font-weight-bold">{{$almacenes->direccion}}</span>
                </div>

            </div>

        </div>
    </div>

    @if(count($inventarios)>0)

    <div class="card col-md-12 pt-3 bordertable">
        <div class="card-header text-uppercase espacioletras bg-danger text-light">
            <span>
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-ui-checks" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                    <path fill-rule="evenodd"
                        d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                    <path d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                    <path fill-rule="evenodd"
                        d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg>
            </span>
            <span class="mx-2">{{$tablas[1]}}</span><span class="mx-2">{{$almacenes->nombre_almacen}}</span>

        </div>
        <div class="card-body p-1">
            <div class="table-responsive-xl">

                <table class="table table-sm table-hover">
                    <thead>
                        <tr class="text-uppercase espacioletras small">
                            <th>Inventario</th>
                            <th class="text-center">estatus</th>
                            <th>clave</th>
                            <th>Productos Asignados</th>
                            <th>detalles inventario</th>
                            <th>Encargado de inventario</th>
                            <th>Foto</th>
                            <th>Clave Encargado</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventarios as $inventario)

                        <tr>
                            <td>Inventario {{$inventario->id}}</td>
                            @if($inventario->activo == 1)
                            <td class="text-light border30p text-center"><span class="nofont text-light border30p p-2 ">
                                    Activo </span> </td>
                            @else
                            <td class=" text-light border30p text-center"><span
                                    class="bg-secondary text-light border30p p-2 px-3">Inactivo</span></td>
                            @endif
                            <td>{{$inventario->clave}}</td>
                            <td>{{count($inventario->productos)}}</td>
                            <td>{{$inventario->detalles}}</td>
                            <td>{{$inventario->empleado->nombre_empleado}} {{$inventario->empleado->apellido_p}}
                                {{$inventario->empleado->apellido_m}}</td>
                            <td>
                                <span class="caret">
                                    <img src="{{asset('images/user/avatar/'.$inventario->empleado->foto)}}"
                                        alt="F O T O" style="width:50px; height:50px;"
                                        class="rounded-circle tablephoto">
                                </span>
                            </td>
                            <td>{{$inventario->empleado->clave}}</td>
                            <td>{{$inventario->empleado->correo_electronico}}</td>
                            <td>{{$inventario->empleado->telefono_movil}}</td>

                            <td>
                                <div class="row justify-content-end mr-1">
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class=" text-dark border30p" data-toggle="tooltip"
                                            data-placement="top" title="Ver empleado">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16"
                                                class="bi bi-person-lines-fill" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class=" text-primary border30p" data-toggle="tooltip"
                                            data-placement="top" title="Mover a otro departamento">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-shuffle"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z" />
                                                <path
                                                    d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class=" text-danger border30p" data-toggle="tooltip"
                                            data-placement="top" title="Dar de baja">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x-circle"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path fill-rule="evenodd"
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    @endif

    @if(count($almacenes->productos)>0)

    <div class="card col-md-12 pt-3 mt-3 bordertable">
        <div class="card-header text-uppercase espacioletras nofont text-white">
            <span>
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-ui-checks" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                    <path fill-rule="evenodd"
                        d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                    <path d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                    <path fill-rule="evenodd"
                        d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg>
            </span>
            <span class="mx-2">{{$tablas[2]}}</span><span class="mx-2">{{$almacenes->nombre_almacen}}</span>

        </div>
        <div class="card-body p-1">
            <div class="table-responsive-xl">

                <table class="table table-sm table-hover">
                    <thead>
                        <tr class="text-uppercase espacioletras small">
                            <th class="text-center"></th>
                            <th class="text-center">Clave</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">última Actualización</th>
                            <th class="text-center">Operaciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($almacenes->productos as $producto)

                        <tr>
                            <td>
                                <span class="caret">
                                    <img src="{{asset('images/product/'.$producto->imagen)}}" alt="F O T O"
                                        style="width:70px;" class="rounded tablephoto">
                                </span>
                            </td>
                            <td>
                                <span class="nofont border30p p-2" style="color: gold;">{{$producto->clave}}</span>
                            </td>
                            <td class="font-weight-bolder">{{$producto->nombre_producto}}</td>
                            <td class="font-weight-bolder">{{$producto->descripcion}}</td>
                            <td>{{$producto->categoriaproducto["nombre_categoriaP"]}}</td>
                            <td class="font-weight-bolder">{{$producto->pivot->stock}}</td>
                            <td class="pl-3">{{$producto->pivot->updated_at}}</td>
                            <td>
                                <div class="row justify-content-end mr-1 pl-3">
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class=" text-dark border30p" data-toggle="tooltip"
                                            data-placement="top" title="Ver Producto">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-eye"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                <path fill-rule="evenodd"
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class=" text-primary border30p" data-toggle="tooltip"
                                            data-placement="top" title="Agregar a Inventario">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16"
                                                class="bi bi-file-earmark-ruled" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5 10H3V9h10v1H6v2h7v1H6v2H5v-2H3v-1h2v-2z" />
                                                <path
                                                    d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                                                <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                                            </svg>
                                        </a>
                                    </div>

                                    @if($producto->activo == 1)
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                            title="Dar de Baja">
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
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" style="color: #00cc66;" data-toggle="tooltip" data-placement="top"
                                            title="Dar de Alta">
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
        </div>

    </div>

    @endif




</div>
@endsection

@section('scripts')


<script type="application/javascript">
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection