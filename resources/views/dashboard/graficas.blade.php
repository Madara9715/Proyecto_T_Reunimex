@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">
    <div class="row d-flex">

        

        @if (Session::has('errors'))
        <script>
        $(document).ready(function() {
            $("#new").reload;
        });
        </script>
        @endif

        <div class="card col-md-8 dark-gray m-3 pt-3 bordertable mx-auto">

            <div class="card-header fontgradradiant text-uppercase espacioletras">
                <span>
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-ui-checks" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                        <path fill-rule="evenodd"
                            d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                        <path
                            d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                        <path fill-rule="evenodd"
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </span>
                <span class="mx-2">{{$panel}}</span>
                <span class="mx-2">{{$AñoMes}}</span>

            </div>
            <div class="card-body dark-gray p-1">
                <div class="table-responsive-sm">

                    <table class="table table-sm table-dark table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombre Producto</th>
                                <th>Saldo Anterior</th>
                                <th>Monto Abonado</th>
                                <th>Saldo Actual</th>
                                <th>Fecha Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $pago)

                            <tr>

                                
                                <td class="text-capitalize text-primary">{{$pago->nombre_cliente}}</td>
                                <td class="text-capitalize text-primary">{{$pago->apellido_p}}</td>
                                <td class="text-capitalize text-primary">{{$pago->apellido_m}}</td>
                                <td class="text-capitalize text-primary">{{$pago->nombre_producto}}</td>
                                <td class="text-capitalize text-primary">$ {{$pago->saldo_anterior}}</td>
                                <td class="text-capitalize text-primary">$ {{$pago->monto_abonado}}</td>
                                <td class="text-capitalize text-primary">{{$pago->saldo_actual}}</td>
                                <td class="text-capitalize text-primary">{{$pago->created_at}}</td>
                                <td>
                                    
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

        <div class="card col-md-8 dark-gray m-3 pt-3 bordertable mx-auto">

            <div class="card-header fontgradradiant text-uppercase espacioletras">
                <span>
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-ui-checks" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                        <path fill-rule="evenodd"
                            d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                        <path
                            d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                        <path fill-rule="evenodd"
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </span>
                <span class="mx-2">Productos</span>
                <span class="mx-2">{{$AñoMes}}</span>

            </div>
            <div class="card-body dark-gray p-1">
                <div class="table-responsive-sm">

                    <table class="table table-sm table-dark table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                
                                <th>Nombre</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ProductosVentas as $producto)

                            <tr>

                                
                                <td class="text-capitalize text-primary">{{$producto->nombre_producto}}</td>
                                <td class="text-capitalize text-primary">{{$producto->cantidad}}</td>
                                
                                <td>
                                    
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
        
        <div class="card col-md-8 dark-gray m-3 pt-3 bordertable mx-auto">

            <div class="card-header fontgradradiant text-uppercase espacioletras">
                <span>
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-ui-checks" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                        <path fill-rule="evenodd"
                            d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                        <path
                            d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                        <path fill-rule="evenodd"
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </span>
                <span class="mx-2">Productos</span>
                <span class="mx-2">{{$AñoMes}}</span>

            </div>
            <div class="card-body dark-gray p-1">
                <div class="table-responsive-sm">

                    <table class="table table-sm table-dark table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                
                                <th>Nombre Cliente</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Tipo Venta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas as $productov)

                            <tr>

                                
                                <td class="text-capitalize text-primary">{{$productov->nombre_cliente}}</td>
                                <td class="text-capitalize text-primary">{{$productov->nombre_producto}}</td>
                                <td class="text-capitalize text-primary">{{$productov->cantidad}}</td>
                                <td class="text-capitalize text-primary">{{$productov->nombre_tipoV}}</td>
                                
                                <td>
                                    
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
@section('scripts')

@endsection
