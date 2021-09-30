<div class="modal fade" id="resurtir" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered d-flex flex-column" role="document">

        <span><img src="{{asset('images/logo3.svg')}}" alt="Reunimex" style="width:70px;"></span>

        <div class="modal-content">

            <div class="modal-header fontgradradiant text-uppercase espacioletras py-3 justify-content-center">
                <h5 class="modal-title text-light align-self-center lineagradien2">Re-surtido de Inventario</h5>
            </div>

            <form id="Resurtir">
                @csrf
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center mb-2 align-items-center">
                            <div class="mx-3">
                                <label class="espacioletras font-weight-bold text-uppercase">
                                    Asesor:
                                </label>
                                <span class="text-dark text-justify border-bottom">
                                    {{$inventario->empleado->nombre_empleado}} {{$inventario->empleado->apellido_p}}
                                    {{$inventario->empleado->apellido_m}}</span>
                            </div>
                            <div class="mx-3">
                                <label class="espacioletras font-weight-bold text-uppercase">
                                    Fecha de surtido:
                                </label>
                                <span
                                    class="text-dark text-justify border-bottom">{{Carbon\Carbon::now()->toDayDateTimeString()}}</span>
                            </div>
                            <div class="mx-3">
                                <input type="text" class="form-control border30p" id="nombre_recibe"
                                    name="nombre_recibe" placeholder="Autoriza:">
                            </div>
                        </div>

                        <div class="table-responsive">

                            <table class="table table-sm table-hover w-auto">
                                <thead>

                                    <tr class="text-uppercase espacioletras small">
                                        <th class="align-top text-center"></th>
                                        <th class="align-top text-center">Clave</th>
                                        <th class="align-top text-center">Nombre</th>
                                        <th class="align-top text-center">Presentación</th>
                                        <th class="align-top text-center">Cantidad</th>
                                        <th class="align-top text-center">Unidad</th>
                                        <th class="align-top text-center">Precio P/M $</th>
                                        <th class="align-top text-center font-weight-bolder text-dark border border-top-0 border-right-0 border-bottom-0"
                                            style="background-color:rgba(0, 0, 0, 0.1);">Stock Actual</th>
                                        <th class="align-top text-center font-weight-bolder">
                                            Retirar Stock
                                        </th>
                                        <th class="align-top text-center font-weight-bolder">
                                            E/S
                                        </th>
                                        <th class="align-top text-center font-weight-bolder text-light fontgradradiant">
                                            Cantidad Producto
                                        </th>
                                        <th class="align-top text-center font-weight-bolder border border-top-0 border-left-0 border-bottom-0 nofont"
                                            style="color:white;">Stock Nuevo</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $idp = 0;
                                    @endphp
                                    @foreach ($productosactivos as $preproducto)
                                    @if ($preproducto->producto_id != $idp)
                                    <tr class="p-0 m-0">
                                        <td>
                                            <span class="caret">
                                                <img src="{{asset('images/product/'.$preproducto->producto->imagen)}}"
                                                    alt="F O T O" style="width:40px;height:40px;"
                                                    class="rounded tablephoto">
                                            </span>
                                        </td>
                                        <td>
                                            <span class="nofont border30p p-2"
                                                style="color: gold;">{{$preproducto->producto->clave}}</span>
                                        </td>
                                        <td class="font-weight-bolder">{{$preproducto->producto->nombre_producto}}</td>
                                        <td class="">
                                            {{$preproducto->presentacione->nombre_presentacionP}}
                                        </td>
                                        <td class="">{{$preproducto->cantidad}}</td>
                                        <td class="">{{$preproducto->unidad}}</td>
                                        <td class="text-left p-3 small">P: {{$preproducto->precio_publico}}$
                                            <br>M: {{$preproducto->precio_distribuidor}}$
                                        </td>
                                        <td class="font-weight-bolder text-right px-2 border p-3">
                                            {{$preproducto->pivot->stock_restante}}</td>
                                        <td class="px-3">
                                            <button type="button" class="btn bt2 btn-danger border30p"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Retirar del inventario" value="{{$preproducto->id}}"
                                                id="{{$preproducto->pivot->stock_restante}}"
                                                onClick="retirarstock(this.value,this.id)">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                    class="bi bi-trash" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>

                                        </td>

                                        <td class="font-weight-bolder d-flex align-items-center px-3 pt-3 ">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input"
                                                    id="e{{$preproducto->id}}" name="es{{$preproducto->id}}" Checked
                                                    onclick="sumaresta('{{$preproducto->id}}',this.id,'e','{{$preproducto->pivot->stock_restante}}');">
                                                <label class="custom-control-label" for="e{{$preproducto->id}}"><svg
                                                        width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                        class="bi bi-plus" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input"
                                                    id="s{{$preproducto->id}}" name="es{{$preproducto->id}}"
                                                    onclick="sumaresta('{{$preproducto->id}}',this.id,'s','{{$preproducto->pivot->stock_restante}}');">
                                                <label class="custom-control-label" for="s{{$preproducto->id}}">
                                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                        class="bi bi-dash" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                    </svg>
                                                </label>
                                            </div>
                                        </td>

                                        <td class="font-weight-bolder">

                                            <input type="number" value="0" class="form-control cantidad"
                                                id="cantidad{{$preproducto->id}}"
                                                onchange="cambiovalor(this.value,'{{$preproducto->id}}','{{$preproducto->pivot->stock_restante}}')">
                                        </td>

                                        <td class="text-left font-weight-bolder">

                                            <input type="text"
                                                class="form-control bg-light text-dark font-weight-bolder text-right"
                                                id="nuevo{{$preproducto->id}}"
                                                value="{{$preproducto->pivot->stock_restante}}" readonly>

                                        </td>
                                    </tr>
                                    @else
                                    <tr class="p-0 m-0">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="">
                                            {{$preproducto->presentacione->nombre_presentacionP}}
                                        </td>
                                        <td class="">{{$preproducto->cantidad}}</td>
                                        <td class="">{{$preproducto->unidad}}</td>
                                        <td class="text-left p-3 small">P: {{$preproducto->precio_publico}}$
                                            <br>M: {{$preproducto->precio_distribuidor}}$
                                        </td>
                                        <td
                                            class="font-weight-bolder text-right px-2 border border-top-0 border-left border-bottom-0 p-3">
                                            {{$preproducto->pivot->stock_restante}}</td>
                                        <td class="px-3">
                                            <button type="button" class="btn bt2 btn-danger border30p"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Retirar del inventario" value="{{$preproducto->id}}"
                                                id="{{$preproducto->pivot->stock_restante}}"
                                                onClick="retirarstock(this.value,this.id)">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                    class="bi bi-trash" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>

                                        </td>

                                        <td class="font-weight-bolder d-flex align-items-center px-3 pt-3 ">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input"
                                                    id="e{{$preproducto->id}}" name="es{{$preproducto->id}}" Checked
                                                    onclick="sumaresta('{{$preproducto->id}}',this.id,'e','{{$preproducto->pivot->stock_restante}}');">
                                                <label class="custom-control-label" for="e{{$preproducto->id}}"><svg
                                                        width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                        class="bi bi-plus" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input"
                                                    id="s{{$preproducto->id}}" name="es{{$preproducto->id}}"
                                                    onclick="sumaresta('{{$preproducto->id}}',this.id,'s','{{$preproducto->pivot->stock_restante}}');">
                                                <label class="custom-control-label" for="s{{$preproducto->id}}">
                                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                        class="bi bi-dash" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                    </svg>
                                                </label>
                                            </div>
                                        </td>

                                        <td class="font-weight-bolder">

                                            <input type="number" value="0" class="form-control cantidad"
                                                id="cantidad{{$preproducto->id}}"
                                                onchange="cambiovalor(this.value,'{{$preproducto->id}}','{{$preproducto->pivot->stock_restante}}')">
                                        </td>

                                        <td class="text-left font-weight-bolder">

                                            <input type="text"
                                                class="form-control bg-light text-dark font-weight-bolder text-right"
                                                id="nuevo{{$preproducto->id}}"
                                                value="{{$preproducto->pivot->stock_restante}}" readonly>

                                        </td>
                                    </tr>
                                    @endif

                                    @php
                                    $idp = $preproducto->producto_id;
                                    @endphp

                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>


                <div class="modal-footer justify-content-center nofont">

                    <button type="button" class="btn bt2 fontgradradiant" id="SurtirSubmit" value="{{$inventario->id}}">
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            guardar
                        </span>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-clipboard-check"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path fill-rule="evenodd"
                                d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm4.354 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </button>

                    <button type="button" class="btn btn-secondary border30p" data-dismiss="modal">
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">reintentar</span>
                        <svg width="1.5m" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                            <path
                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                        </svg>
                    </button>

                    <button type="button" class="btn bt2 btn-danger border30p" data-dismiss="modal">
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">cancelar</span>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>