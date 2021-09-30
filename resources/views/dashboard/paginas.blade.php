@if (count($clientes))
    <div class="card-body dark-gray p-1">
                                <div class="table-responsive-sm">

                                    <table class="table table-sm table-dark table-hover">
                                        <thead>
                                            <tr class="text-uppercase espacioletras text-muted">
                                                <th>Clave</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientes as $cliente)

                                            <tr>

                                                <td>{{$cliente->clave}}</td>
                                                <td >{{$cliente->nombre_cliente}} {{$cliente->apellido_p}} {{$cliente->apellido_m}}</td>
                                                <td>    
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$cliente->id}}" name="agrega[]">
                                                </div>  
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table> 
                                </div>             
@endif  