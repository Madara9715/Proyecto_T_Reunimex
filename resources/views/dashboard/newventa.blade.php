@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">

    <form id="NuevaVenta">
        @csrf
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

        <div class="row d-flex">

            <div class="card text-success col-lg-8 mb-3 mt-5  mx-auto">


                <div class="d-md-flex d-inline-flex justify-content-md-end justify-content-center">

                    <span class="d-flex caret mt-n5 mx-auto text-light rounded-circle showphoto bg-light"
                        style="width:100px;height:100px; ">
                        <img src="{{asset('images/user/avatar/'.$user->empleado->foto)}}" alt="U S U A R I O"
                            style="width:100px; height:100px;"
                            class="rounded-circle iconphoto m-auto align-self-center">
                    </span>

                    <div class="ml-2 mt-2">
                        <a href="{{url('/')}}" class="btn bt2 fontgradradiant">
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
                <div class="row justify-content-center bt1 text-light p-1 mt-3">
                    <h4 class="mx-2"><span><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></span>Datos de Venta</h4>
                </div>
                <div class="row m-1 mt-3 border border-left-0 border-right-0 border-top-0">

                    <div class="col-md-4 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase text-danger">
                            Cliente
                            <span class="text-dark">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-briefcase-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
                                    <path fill-rule="evenodd"
                                        d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v1.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 5.884V4.5zm5-2A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z" />
                                </svg>
                            </span>
                        </label>
                        <select name="cliente" id="cliente" class="custom-select font-weight-bold">
                            <option value="" selected> SELECCIONE CLIENTE... </option>
                            @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->clave}} | {{$cliente->nombre_cliente}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase text-danger">
                            Tipo de venta
                            <span class="text-dark">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-basket"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                        </label>
                        <select name="tipoventa" id="tipoventa" class="custom-select font-weight-bold">
                            <option value="" selected> SELECCIONE TIPO DE VENTA... </option>
                            @foreach ($tipoventas as $tipoventa)
                            <option value="{{$tipoventa->id}}">{{$tipoventa->clave}} | {{$tipoventa->nombre_tipoV}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase text-danger">
                            Tipo de pago
                            <span class="text-dark">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cash"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z" />
                                    <path
                                        d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                                </svg>
                            </span>
                        </label>
                        <select name="tipopago" id="tipopago" class="custom-select font-weight-bold">
                            <option value="" selected> SELECCIONE TIPO DE PAGO... </option>
                            @foreach ($tipopagos as $tipopago)
                            <option value="{{$tipopago->id}}">{{$tipopago->clave}} | {{$tipopago->nombre_tipopago}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 justify-content-center mt-3">
                        <label class="espacioletras font-weight-bold text-uppercase text-danger">
                            Fecha de venta
                            <span class="text-dark">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-calendar2-date"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                    <path
                                        d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zm3.945 8.688V7.354h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z" />
                                </svg>
                            </span>
                        </label>
                        <span class="text-dark text-capitalize">
                            @php
                            $fecha = Carbon\Carbon::now();
                            $fecha = $fecha->toDayDateTimeString();
                            echo $fecha;
                            @endphp
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center bt1 text-light p-1 mt-3">
                    <h4 class="mx-2"><span class="text-dark"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></span>Productos a vender</h4>
                </div>
                <div class="row m-1 mt-3 border border-left-0 border-right-0 border-top-0 justify-content-center">

                    <div class="col-md-6 justify-content-center mt-3">
                        <label class="espacioletras font-weight-bold text-uppercase text-danger">
                            Producto a vender <span class="text-dark">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart4"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg>
                            </span>
                        </label>
                        <select name="producto" id="producto" class="custom-select font-weight-bold">
                            <option value="" selected> SELECCIONE PRODUCTO... </option>
                            @foreach ($productosactivos as $productosactivo)
                            <option value="{{$productosactivo->id}}">{{$productosactivo->producto->clave}} |
                                {{$productosactivo->producto->nombre_producto}} |
                                {{$productosactivo->presentacione->nombre_presentacionP}}
                                {{$productosactivo->cantidad}}
                                {{$productosactivo->unidad}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 justify-content-center mt-3">
                        <label class="espacioletras font-weight-bold text-uppercase text-danger">
                            Cantidad:
                        </label>

                        <input type="number" value="1" class="form-control" id="cantidadproducto">
                    </div>
                    <div class="col-md-3 justify-content-center mt-3">
                        <label class="espacioletras font-weight-bold text-uppercase text-danger">
                            Añadir a venta
                        </label>
                        <button type="button" class="btn bt2 btn-danger border30p text-uppercase" data-toggle="tooltip"
                            data-placement="top" title="Añadir producto a venta" id="addproducto">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>

                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart4"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-md-8 offset-md-2 pt-3 bordertable">
            <div class="card-header text-uppercase espacioletras">
                <span>
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                    </svg>
                </span>
                <span class="mx-2">Productos a vender</span>

            </div>
            <div class="card-body p-1 bg-light">
                <div class="table-responsive border-bottom">
                    <table class="table table-sm table-hover w-auto" id="listproducts">
                        <thead>

                            <tr class="text-uppercase espacioletras small">
                                <th class="align-top text-center">Clave</th>
                                <th class="align-top text-center">Nombre</th>
                                <th class="align-top text-center">Presentación</th>
                                <th class="align-top text-center">Cantidad</th>
                                <th class="align-top text-center">Unidad</th>
                                <th class="align-top text-center">Precio P/D $</th>
                                <th class="align-top text-center font-weight-bolder text-dark border border-top-0 border-right-0 border-bottom-0"
                                    style="background-color:rgba(0, 0, 0, 0.1);">Cantidad a vender</th>
                                <th class="align-top text-center">Precio a vender</th>
                                <th class="align-top text-center font-weight-bolder">
                                    Quitar producto
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                    <div class="row justify-content-center">
                        <div class="text-danger mt-2">
                            <span id="OcultVentaErrorMessages" class="justify-content-center p-2" style="display:none">

                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-emoji-frown"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path fill-rule="evenodd"
                                        d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683z" />
                                    <path
                                        d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                                </svg>
                                <strong> ¡Error!, Faltán datos para guardar la venta, verifica la información ingresada:</strong>
                            </span>
                            <div id="VentaErrorMessages"
                                class="alert-danger text-muted bg-dark border30p p-2 px-5 my-2 font-weight-bold"
                                style="display:none">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="button" class="btn bt2 fontgradradiant" id="VentaSubmit"
                            value="{{$inventario->id}}">
                            <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                                guardar venta
                            </span>
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-clipboard-check"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                <path fill-rule="evenodd"
                                    d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm4.354 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            </svg>
                        </button>

                        <button type="button" class="btn bt2 btn-danger border30p" data-dismiss="modal">
                            <span class="mx-2 espacioletras font-weight-bold text-uppercase">cancelar venta</span>
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>


    </form>


</div>
@endsection

@section('scripts')


<script type="application/javascript">
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();


    $('#producto').change(function(e) {
        var id = e.target.value;
        $.ajax({
            url: "{{ route('getlimitcant') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function(data) {
                //console.log(data[0].pivot['stock_restante']);
                $("#cantidadproducto").attr({
                    "max": data[0].pivot['stock_restante'],
                    "min": 1
                });

                //  console.log(data[0]);
            }
        })
    })

    $('#addproducto').click(function(e) {
        e.preventDefault();
        var inpObj = document.getElementById("cantidadproducto");
         if (!inpObj.checkValidity()) {
           // document.getElementById("demo").innerHTML = "Esta mal";
        } else {
           var idproducto = $('#producto option:selected').val();
        var cantidadproducto = $("#cantidadproducto").val();


        //console.log("id :"+idproducto+" cantidad: "+cantidadproducto);
        //$('#listproducts tbody').empty();

        $.ajax({
            url: "{{ route('getproducto') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: idproducto
            },
            success: function(data) {
                $cantidad = $("#cantidadproducto").val();
                $precio = '<select name="precio" id="precio' + idproducto +
                    '" class="custom-select small"><option value="1" selected class="small"> Público </option><option value="2" class="small"> Distribuidor </option></select>';
                $btn = '<button type="button" href="#" id="' + idproducto +
                    '" class="btn btn-danger text-uppercase text-light font-weight-bold remover" style="border-radius: 30px;">&times</button>';
                $val = '<tr><td class="font-weight-bold">' + data[0]['clave'] +
                    '</td><td class="font-weight-bold">' + data[0]['nombre_producto'] +
                    '</td><td>' + data[1]['presentacione']['nombre_presentacionP'] +
                    '</td><td class="text-center">' + data[1]['cantidad'] + '</td><td>' +
                    data[1]['unidad'] + '</td><td class="small">Público: ' + data[1][
                        'precio_publico'
                    ] + '$<br>Distribuidor: ' + data[1]['precio_distribuidor'] +
                    '$</td><td class="text-center font-weight-bold"> <input type="number" value="' +
                    $cantidad + '" class="form-control cantidad" id="cantidadproducto' +
                    idproducto + '" min= "1" max="' + data[0]['pivot']['stock_restante'] +
                    '"></td><td class="small">' + $precio +
                    '</td><td class="text-center">' + $btn + '</td><tr>';
                $($val).appendTo("#listproducts tbody")
            }
        })

        

        $('#listproducts').on('click', '.remover', function() {
            $(this).parent().parent('tr').remove();
        });

        } 
        
    });



    $('#VentaSubmit').click(function(e) {
        e.preventDefault();
        var id_inv = $("#VentaSubmit").val();
        var cantprod = [];

        var ids = $(".cantidad").map(function() {
            var id = $(this).attr('id');
            id = id.replace('cantidadproducto', '');

            var cantidadprodventa = $("#cantidadproducto" + id).val();
            var tipoprecio = $('#precio' + id + ' option:selected').val();
            cantprod.push(id + "," + cantidadprodventa + "," + tipoprecio);
        }).get();

        if((cantprod.length)>0){

        var cliente = $('#cliente option:selected').val();
        var tipoventa = $('#tipoventa option:selected').val();
        var tipopago = $('#tipopago option:selected').val();


        $.ajax({
            url: "{{ route('ventas.store') }}",
            type: 'POST',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id_inv,
                cliente: cliente,
                tipoventa: tipoventa,
                tipopago: tipopago,
                todo: cantprod,
            },

            success: function(result) {
                if (result.errors) {
                    $('#VentaErrorMessages').html('');
                    $('#OcultVentaErrorMessages').show();
                    $.each(result.errors, function(key, value) {
                        $('#VentaErrorMessages').show();
                        $('#VentaErrorMessages').append('<li class="text-light">' + value + '</li>');
                    });

                } else {
                    $('#VentaErrorMessages').hide();
                    $('#OcultVentaErrorMessages').hide();
                    alert("Se guardó correctamente");
                    location.reload();
                }
            }
        });


        }

        
    });



});
</script>
@endsection