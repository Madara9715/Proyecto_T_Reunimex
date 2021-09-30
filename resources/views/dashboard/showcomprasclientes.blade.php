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
        
        <div class="card col-md-8 m-3 pt-3 bordertable  mx-auto">

            <div class="card-header nofont text-white text-uppercase espacioletras">
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
                <span class="mx-2">Compras</span>
                <span class="mx-2">({{$fechainicio}})-({{$fechafin}})</span>

            </div>
            <div class="card-body p-1">
                <div class="table-responsive-sm">

                    <table class="table table-sm table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                
                                <th>Nombre Cliente</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Tipo Venta</th>
                                <th>Monto Unitario</th>
                                <th>Monto Total</th>
                                <th>Fecha Captura</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas as $productov)

                            <tr>

                                
                                <td class="text-capitalize text-primary">{{$productov->nombre_cliente}}</td>
                                <td class="text-capitalize text-primary">{{$productov->nombre_producto}}</td>
                                <td class="text-capitalize text-primary">{{$productov->cantidad}}</td>
                                <td class="text-capitalize text-primary">{{$productov->nombre_tipoV}}</td>
                                <td class="text-capitalize text-primary">$ {{$productov->importe}}</td>
                                <td class="text-capitalize text-primary">$ {{$productov->total_importe}}</td>
                                <td class="text-capitalize text-primary">{{\Carbon\Carbon::parse($productov->created_at)->format('Y-m-d')}}</td>
                                
                                <td>
                                    
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{$ventas->links()}}
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
@section('scripts')

@endsection
