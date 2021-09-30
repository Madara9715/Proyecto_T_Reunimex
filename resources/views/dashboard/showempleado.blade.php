@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">

    <div class="row d-flex">

        <div class="card bg-dark text-success col-lg-8 mb-3 mt-5  mx-auto">


            <div class="d-md-flex d-inline-flex justify-content-md-end justify-content-center">

                <span class="caret mt-n5 mx-auto">
                    <img src="{{asset('images/ventas.png')}}" alt="F O T O" style="width:150px;"
                        class="rounded-circle showphoto bg-light">
                </span>

                <div class="ml-2 mt-2">
                    <a href="{{ route('empleados.index') }}" class="btn bt2 fontgradradiant">
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
                <div class="ml-2 mt-2">
                    <a href="{{ route('cuentas.edit',$idEmpleado) }}" class="btn bt2 fontgradradiant">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calculator" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
  <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>
</svg>
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            Cuentas
                        </span>
                    </a>
                </div>

            </div>

            <!--  <img src="{{asset('images/iconsbootstrap/emoji-laughing.svg')}}" class="iconwhite" alt="carita" width="32" height="32" title="Bootstrap"> -->

            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-9 justify-content-center">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        nombre empleado:
                    </label>
                    <span
                        class="textdarkgray text-capitalize font-weight-bold bigtitle">{{$empleado->nombre_empleado}} {{$empleado->apellido_p}} {{$empleado->apellido_m}}</span>
                </div>
                <div
                    class="col-md-3 d-flex align-self-end justify-content-center border border-success text-dark rounded-lg">
                    <label class="espacioletras font-weight-bold text-uppercase text-success my-auto">
                        clave:
                    </label>
                    <span class="text-light text-capitalize font-weight-bold">{{$empleado->clave}}</span>
                </div>
                

            </div>
            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-12">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Telefono Fijo:
                    </label>
                    <span class="textdarkgray text-justify">{{$empleado->telefono_fijo}}</span>
                </div>
            </div>  
            <div class="row m-1 border border-left-0 border-right-0 border-top-0">
                <div class="col-md-12">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Telefono Movil:
                    </label>
                    <span class="textdarkgray text-justify">{{$empleado->telefono_movil}}</span>
                </div>
            </div>
            
            <div class="row m-1 border border-left-0 border-right-0 border-top-0">
                <div class="col-md-12">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Direccion:
                    </label>
                    <span class="textdarkgray text-justify">{{$empleado->direccion}}</span>
                </div>
            </div>
            
            <div class="row m-1 border border-left-0 border-right-0 border-top-0">
                <div class="col-md-12">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Correo:
                    </label>
                    <span class="textdarkgray text-justify">{{$empleado->correo_electronico}}</span>
                </div>
            </div>
            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-6">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        total clientes:
                    </label>
                    <span class="textdarkgray font-weight-bold">{{count($clientes)}}</span>
                </div>

            </div>

        </div>
    </div>



    @if(count($clientes)>0)

    <div class="card col-md-12 dark-gray pt-3 bordertable">
        <div class="card-header text-uppercase espacioletras">
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
            <span class="mx-2">{{$tablas[1]}}</span>

        </div>
        <div class="card-body dark-gray p-1">
            <div class="table-responsive-xl">

                <table class="table table-sm table-dark table-hover">
                    <thead>
                        <tr class="text-uppercase espacioletras text-muted small">
                            <th></th>
                            <th>clave</th>
                            <th>nombre</th>
                            <th>apellido paterno</th>
                            <th>apellido materno</th>
                            <th>telefono fijo</th>
                            <th>telefono móvil</th>
                            <th>dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)

                        <tr>

                            <td>
                                <span class="caret">
                                    <img src="{{asset('images/user/avatar/'.$empleado->foto)}}" alt="F O T O"
                                        style="width:70px;" class="rounded tablephoto">
                                </span>
                            </td>
                            <td>{{$cliente->clave}}</td>
                            <td>{{$cliente->nombre_cliente}}</td>
                            <td>{{$cliente->apellido_p}}</td>
                            <td>{{$cliente->apellido_m}}</td>
                            <td>{{$cliente->telefono_fijo}}</td>
                            <td>{{$cliente->telefono_movil}}</td>
                            <td>{{$cliente->direccion}}</td>

                            <td>
                                <div class="row justify-content-end mr-1">
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="{{ route('empleados.show',$empleado->id) }}"
                                            class=" text-success border30p">
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                class="bi bi-person-lines-fill" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="{{ route('empleados.update',$empleado->id) }}"
                                            class=" text-info border30p">
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-shuffle"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z" />
                                                <path
                                                    d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class=" text-danger border30p">
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle"
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
</div>
@endsection