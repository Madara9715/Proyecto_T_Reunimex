@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">

    <div class="row d-flex">

        <div class="card text-primary col-lg-8 mb-3 mt-5  mx-auto">


            <div class="d-md-flex d-inline-flex justify-content-md-end justify-content-center">

                <span class="d-flex caret mt-n5 mx-auto text-light px-3 rounded-circle showphoto"
                    style="background-color: gold; width:100px;height:100px; ">
                    <img src="{{asset('images/icons/file-ruled.svg')}}" alt="F O T O" style="width:70px;height:70px;"
                        class="m-auto align-self-center">
                </span>
                <span class="d-flex caret mt-n5 mx-auto text-light px-3 rounded-circle showphoto bg-light"
                    style="width:100px;height:100px; ">
                    <img src="{{asset('images/logo3.svg')}}" alt="F O T O" style="width:70px;height:70px;"
                        class="m-auto align-self-center">
                </span>
                <span class="d-flex caret mt-n5 mx-auto text-light rounded-circle showphoto bg-light"
                    style="width:100px;height:100px; ">

                    <img src="{{asset('images/user/avatar/'.$inventario->empleado->foto)}}" alt="U S U A R I O"
                        style="width:100px; height:100px;" class="rounded-circle iconphoto m-auto align-self-center">
                </span>

                <div class="ml-2 mt-2">
                    <a href="{{ route('inventarios.index') }}" class="btn bt2 fontgradradiant">
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


            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-9 justify-content-center">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Detalles
                    </label>
                    <span class="text-dark text-capitalize font-weight-bold">{{$inventario->detalles}}
                        {{$inventario->empleado->nombre_empleado}} {{$inventario->empleado->apellido_p}}
                        {{$inventario->empleado->apellido_m}}</span>
                </div>

                <div class="col-md-3 d-flex align-self-end justify-content-center border bg-dark text-dark rounded-lg">
                    <label class="espacioletras font-weight-bold text-uppercase text-light my-auto">
                        clave:
                    </label>
                    <span class="text-light text-capitalize font-weight-bold">{{$inventario->clave}}</span>
                </div>


            </div>

            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-12">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Estatus inventario:
                    </label>
                    <span class="text-dark text-justify"> @if($inventario->activo == 1)
                        Activo
                        @else
                        Inactivo
                        @endif
                    </span>
                </div>

            </div>

            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-6">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Productos asignados:
                    </label>
                    <span class="text-dark font-weight-bold">{{$cantidad}}</span>
                </div>
                <div class="col-md-6">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Última Actualización:
                    </label>
                    <span class="text-dark font-weight-bold" data-toggle="tooltip" data-placement="top"
                        title="{{$inventario->updated_at->formatLocalized('%A %d %B %Y')}}">{{$inventario->updated_at->diffForHumans()}}</span>
                </div>

            </div>

        </div>
    </div>

    @if(count($productosactivos)>0)

    <div class="card col-md-12 pt-3 mt-3 bordertable">
        <div class="card-header text-uppercase espacioletras nofont text-white">
            <div class="row justify-content-between px-2">

                <div>
                    <span>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-ui-checks"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                            <path fill-rule="evenodd"
                                d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                            <path
                                d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                            <path fill-rule="evenodd"
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </span>
                    <span class="mx-2">{{$tablas[0]}}</span>
                </div>

                <button type="button" data-toggle="modal" data-target="#resurtir" class="btn bt2 btn-danger">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-clipboard-plus" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                        <path fill-rule="evenodd"
                            d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zM8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                    </svg>
                    <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                        Re-surtir Inventario
                    </span>
                </button>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="table-responsive">

                <table class="table table-sm table-hover w-auto">
                    <thead>
                        <tr class="text-uppercase espacioletras small ">
                            <th colspan="9" class="align-top text-center">
                                <h5> Datos generales del producto</h5>
                            </th>
                            <th
                                class="align-top nofont text-light text-center small align-self-center font-weight-bolder border border-right-0 border-bottom-0">
                                {{$inventario->created_at->formatLocalized('%A %d %B %Y')}}</th>
                            <th
                                class="align-top nofont text-light text-center small align-self-center font-weight-bolder border border-top-0 border-left-0 border-bottom-0">
                                {{$inventario->updated_at->formatLocalized('%A %d %B %Y')}}</th>
                            <th
                                class="align-top nofont text-light text-center small align-self-center font-weight-bolder">
                                {{Carbon\Carbon::now()->formatLocalized('%A %d %B %Y')}}</th>
                            <th colspan="4" class="nofont text-light text-center"></th>

                        </tr>
                        <tr class="text-uppercase espacioletras small">
                            <th class="align-top text-center"></th>
                            <th class="align-top text-center">Clave</th>
                            <th class="align-top text-center">Nombre</th>
                            <th class="align-top text-center">Categoria</th>
                            <th class="align-top text-center">Presentación</th>
                            <th class="align-top text-center">Cantidad</th>
                            <th class="align-top text-center">Unidad</th>
                            <th class="align-top text-center">Precio Publico</th>
                            <th class="align-top text-center">Precio Distribuidor</th>
                            <th class="align-top text-center font-weight-bolder text-dark border border-top-0 border-right-0 border-bottom-0"
                                style="background-color:rgba(0, 0, 0, 0.1);">Stock Inicial</th>
                            <th class="align-top text-center font-weight-bolder border border-top-0 border-left-0 border-bottom-0"
                                style="background-color:rgba(0, 0, 0, 0.5); color:white;">Salidas Stock</th>
                            <th class="align-top text-center font-weight-bolder text-light fontgradradiant">Stock Actual
                            </th>

                            <th class="align-top text-center">Valor en Inventario</th>
                            <th class="align-top text-center">última Actualización</th>
                            <th class="align-top text-center">Operaciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $id = 0;
                        @endphp

                        @foreach ($productosactivos as $preproducto)

                        @if ($preproducto->producto_id != $id)
                        <tr>
                            <td class="bg-light border-0"></td>
                        </tr>
                        <tr class="text-light" style="background-color: black;">
                            <td>
                                <span class="caret">
                                    <img src="{{asset('images/product/'.$preproducto->producto->imagen)}}" alt="F O T O"
                                        style="width:70px;" class="rounded tablephoto bg-light">
                                </span>
                            </td>
                            <td>
                                <span class="nofont border30p p-2"
                                    style="color: gold;">{{$preproducto->producto->clave}}</span>
                            </td>
                            <td class="font-weight-bolder">{{$preproducto->producto->nombre_producto}}</td>
                            <td>{{$preproducto->producto->categoriaproducto->nombre_categoriaP}}</td>
                            <td class="bg-light text-dark">
                                {{$preproducto->presentacione->nombre_presentacionP}}
                            </td>

                            <td class="bg-light text-dark">{{$preproducto->cantidad}}</td>
                            <td class="bg-light text-dark">{{$preproducto->unidad}}</td>
                            <td class="text-right bg-light text-dark">
                                {{$preproducto->precio_publico}} $
                            </td>
                            <td class="text-right bg-light text-dark">
                                {{$preproducto->precio_distribuidor}} $
                            </td>
                            <td
                                class="font-weight-bolder text-right px-2 text-dark border border-top-0 border-right-0 border-bottom-0 bg-light text-muted">
                                {{$preproducto->pivot->stock}}</td>
                            <td
                                class="font-weight-bolder text-right px-2 border border-top-0 border-left-0 border-bottom-0 text-danger  bg-light">
                                @php
                                $restante = ($preproducto->pivot->stock) - ($preproducto->pivot->stock_restante);
                                echo $restante;
                                @endphp</td>
                            <td class="font-weight-bolder text-right px-2 text-light fontgradradiant">
                                {{$preproducto->pivot->stock_restante}}</td>
                            <td class="text-left font-weight-bolder bg-light text-dark">
                                @php
                                $pub = $preproducto->precio_publico;
                                $dist = $preproducto->precio_distribuidor;
                                $stock = $preproducto->pivot->stock;
                                $totalpub = $pub * $stock;
                                $totaldist = $dist * $stock;
                                echo "Público: ".$totalpub."$";
                                echo "<br>Distribuidor: ".$totaldist."$";
                                @endphp
                            </td>
                            <td class="pl-3 bg-light text-dark">
                                {{$preproducto->pivot->updated_at->formatLocalized('%A %d %B %Y')}}</td>
                            <td class="bg-light text-dark">
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

                                    @if($preproducto->activo == 1)
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                            title="Retirar del Inventario">
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

                        @else

                        <tr class="bg-light">
                            <td class="font-weight-bolder" colspan="4"></td>
                            <td class="">{{$preproducto->presentacione->nombre_presentacionP}}</td>
                            <td class="">{{$preproducto->cantidad}}</td>
                            <td class="">{{$preproducto->unidad}}</td>
                            <td class="text-right">{{$preproducto->precio_publico}} $
                            </td>
                            <td class="text-right">{{$preproducto->precio_distribuidor}} $
                            </td>
                            <td
                                class="font-weight-bolder text-right px-2 text-dark border border-top-0 border-right-0 border-bottom-0 bg-light text-muted">
                                {{$preproducto->pivot->stock}}</td>
                            <td
                                class="font-weight-bolder text-right px-2 border border-top-0 border-left-0 border-bottom-0 text-danger">
                                @php
                                $restante = ($preproducto->pivot->stock) - ($preproducto->pivot->stock_restante);
                                echo $restante;
                                @endphp</td>
                            <td class="font-weight-bolder text-right px-2 text-light fontgradradiant">
                                {{$preproducto->pivot->stock_restante}}</td>
                            <td class="text-left font-weight-bolder">@php
                                $pub = $preproducto->precio_publico;
                                $dist = $preproducto->precio_distribuidor;
                                $stock = $preproducto->pivot->stock;
                                $totalpub = $pub * $stock;
                                $totaldist = $dist * $stock;
                                echo "Público: ".$totalpub."$";
                                echo "<br>Distribuidor: ".$totaldist."$";
                                @endphp
                            </td>
                            <td class="pl-3">{{$preproducto->pivot->updated_at->formatLocalized('%A %d %B %Y')}}</td>
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

                                    @if($preproducto->activo == 1)
                                    <div class="col-lg-4 mt-1 px-1 d-flex justify-content-center">
                                        <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                            title="Retirar del Inventario">
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
                        @endif

                        @php
                        $id = $preproducto->producto_id;
                        @endphp
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>

    </div>


    @endif


</div>
@include('dashboard.resurtir')
@endsection

@section('scripts')


<script type="application/javascript">
$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#SurtirSubmit').click(function(e) {
        e.preventDefault();
        var id_inv = $("#SurtirSubmit").val();
        var cantprod = [];
        //var e_s = [];
        var es = "";

        var texts = $(".cantidad").map(function() {
            var id = $(this).attr('id');
            id = id.replace('cantidad', '');
            if ($("#e" + id).is(":checked")) {
                // e_s.push("+");
                es = "+";
            } else {
                // e_s.push("-");
                es = "-";
            }
            cantprod.push(id + "," + $(this).val() + "," + es+ "," + $("#nuevo"+ id).val());
        }).get();

        $.each(cantprod, function(key, value) {
            console.log(key + ": " + value);
        });

        /*  

         $.each(e_s, function(key, value) {
             console.log(key + ": " + value);
         }); */

        $.ajax({
            url: "{{ route('surtir') }}",
            type: 'POST',
            method: 'POST',
            data: {
                token: $('#token').val(),
                id: id_inv,
                todo:  cantprod,
            },

            success: function(result) {
                if (result.errors) {
                    alert("Oops!, parece que algo malo ocurrio");
                } else {
                   
                    alert("Todo bien, se resurtió el inventario de forma exitosa");
                }
            }
        });



    });

});



function cambiovalor(valor, id, stock) {
    if (valor < 0) {
        $("#cantidad" + id).val(0);
        $("#nuevo" + id).val(stock);
    } else {
        if ($("#e" + id).is(":checked")) {
            $nuevo = parseInt(stock) + parseInt(valor);
            $("#nuevo" + id).val($nuevo);
        } else {
            if (parseInt(stock) > parseInt(valor)) {
                $nuevo = parseInt(stock) - parseInt(valor);
                $("#nuevo" + id).val($nuevo);
            } else {
                $("#cantidad" + id).val(stock);
                $("#nuevo" + id).val("0");
            }
        }
    }
}

function retirarstock(clicked_id, cantidad_retiro) {
    $("#s" + clicked_id).prop("checked", true);
    $("#e" + clicked_id).prop("checked", false);
    $("#cantidad" + clicked_id).val(cantidad_retiro);
    $("#nuevo" + clicked_id).val("0");
}

function sumaresta(id, es, tipo, stock) {
    if ($("#cantidad" + id).val() == "") {
        $("#cantidad" + id).val("0");
    }
    var cant = $("#cantidad" + id).val();
    if (tipo == "e") {
        var nuevo = parseInt(stock) + parseInt(cant);
        console.log("id: " + id + " tipo: " + tipo + " id_es: " + es + " stock:" + stock + " cantidad: " + cant +
            " =" + nuevo);
        $("#nuevo" + id).val(nuevo);
    } else {
        var nuevo = parseInt(stock) - parseInt(cant);
        console.log("id: " + id + " tipo: " + tipo + " id_es: " + es + " stock:" + stock + " cantidad: " + cant +
            " =" + nuevo);
        $("#nuevo" + id).val(nuevo);
    }
}
</script>
@endsection