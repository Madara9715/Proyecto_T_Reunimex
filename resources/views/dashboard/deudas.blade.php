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

        <div class="card col-md-8 m-3 pt-3 bordertable mx-auto">

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
                <span class="mx-2">{{$panel}}</span>

            </div>
            <div class="card-body p-1">
                <div class="table-responsive-sm">

                    <table class="table table-sm table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                
                                <th>Nombre Cliente</th>
                                <th>Nombre Empleado</th>
                                <th>Valor Total</th>
                                <th>Abonado</th>
                                <th>Deuda</th>
                                <th>Fecha Limite</th>
                                <th>Fecha actual</th>
                                <th>Acciones</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientesinf as $cliente)

                            <tr>

                                
                                <td >{{$cliente->nombre_cliente}}</td>
                                <td >{{$cliente->nombre_empleado}}</td>
                                <td >$ {{$cliente->valor_total}}</td>
                                <td >$ {{$cliente->monto_abonado}}</td>
                                <td >$ {{$cliente->monto_restante}}</td>
                                <td class="text-capitalize text-primary font-weight-bolder">{{\Carbon\Carbon::parse($cliente->fecha_limite)->format('Y-m-d')}}</td>
                                <td class="text-capitalize text-primary font-weight-bolder">{{$FechaActual}}</td>
                                
                                <td>

                                    <div class="row justify-content-end mr-1">
                                        <div class="col-sm-4 mt-1 px-1 d-flex justify-content-center">
                                            <a href="{{ route('pagos.show',$cliente->id) }}"
                                                class=" btn btn-primary border30p">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash-stack" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14 3H1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1h-1z"/>
                                                    <path fill-rule="evenodd" d="M15 5H1v8h14V5zM1 4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H1z"/>
                                                    <path d="M13 5a2 2 0 0 0 2 2V5h-2zM3 5a2 2 0 0 1-2 2V5h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 13a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                                                  </svg>
                                            </a>
                                        </div>
                                        @if (($cliente->fecha_limite)<$FechaActual)
                                        <div class="col-sm-4 mt-1 px-1 d-flex justify-content-center">
                                            <a href="{{ route('deudas.show',$cliente->id) }}" class="btn btn-danger border30p">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
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
                    {{$clientesinf->links()}}
                </div>
            </div>

        </div>

    </div>
</div>



@endsection