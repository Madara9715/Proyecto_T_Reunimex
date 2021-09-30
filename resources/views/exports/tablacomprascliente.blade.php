
                    <table class="table table-sm table-dark table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                
                                <th>Nombre Cliente</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Tipo Venta</th>
                                <th>Monte Unitario</th>
                                <th>Monte Total</th>
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