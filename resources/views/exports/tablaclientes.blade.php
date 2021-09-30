<table class="table table-sm table-dark table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Telefono fijo</th>
                                <th>Telefono movil</th>
                                <th>Direccion</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)

                            <tr>

                                <td>{{$cliente->clave}}</td>
                                <td class="text-capitalize text-primary">{{$cliente->nombre_cliente}}</td>
                                <td class="text-capitalize text-primary">{{$cliente->apellido_p}}</td>
                                <td class="text-capitalize text-primary">{{$cliente->apellido_m}}</td>
                                <td class="text-capitalize text-primary">{{$cliente->telefono_fijo}}</td>
                                <td class="text-capitalize text-primary">{{$cliente->telefono_movil}}</td>
                                <td class="text-capitalize text-primary">{{$cliente->direccion}}</td>
                                @if(($cliente->activo) =='1')
                                <td class="text-capitalize text-primary">Activo</td>
                                @else
                                <td class="text-capitalize text-primary">Inactivo</td>
                                @endif
                                

                            @endforeach
                        </tbody>
                    </table>