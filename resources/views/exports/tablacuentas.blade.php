<table class="table table-sm table-dark table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                
                                <th>Nombre Cliente</th>
                                <th>Valor Total</th>
                                <th>Abonado</th>
                                <th>Restante</th>
                                <th>Fecha Limite</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientesinf as $cliente)

                            <tr>

                                
                                <td class="text-capitalize text-primary">{{$cliente->nombre_cliente}}</td>
                                <td class="text-capitalize text-primary">$ {{$cliente->valor_total}}</td>
                                <td class="text-capitalize text-primary">$ {{$cliente->monto_abonado}}</td>
                                <td class="text-capitalize text-primary">$ {{$cliente->monto_restante}}</td>
                                <td class="text-capitalize text-primary">{{\Carbon\Carbon::parse($cliente->fecha_limite)->format('Y-m-d')}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
