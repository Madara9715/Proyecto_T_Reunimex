<div class="modal fade" id="newconsult">
    <div class="modal-dialog modal-lg modal-dialog-centered d-flex flex-column">

        <span><img src="{{asset('images/logo3.svg')}}" alt="Reunimex" style="width:70px;"></span>

        <div class="modal-content">

            <div class="modal-header fontgradradiant text-uppercase espacioletras py-3 justify-content-center">
                <h5 class="modal-title text-light align-self-center lineagradien2">Consulta compra</h5>
            </div>

            <form action="{{ route('reportecompras') }}" method="POST">
                @csrf

                <div class="modal-body nofont">

                    <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary">
                            <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                            Tipo Compra:
                        </label>
                        <input type="hidden" value="{{$idCliente}}" name="idCliente">
                        <select class="custom-select" name="tipoventa_id">
                            <option selected value='todo'>Todo</option>
                            @foreach($tipocompra as $tipo)
                            {{$valor=$tipo->id}}
                            <option value={{$valor}} >{{$tipo->nombre_tipoV}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('tipoventa_id'))
                        <span class="text-danger">
                            {{ $errors->first('tipoventa_id') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary">
                            <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                            Fecha Inicial:
                        </label>
                        <input type="date" class="form-control border30p nofont inputblack" name="fechainicial" >
                        @if($errors->has('fechainicial'))
                        <span class="text-danger">
                            {{ $errors->first('fechainicial') }}
                        </span>
                        @endif
                    </div>

                     <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary">
                            <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                            Fecha Fin:
                        </label>
                        <input type="date" class="form-control border30p nofont inputblack" name="fechafin" >
                        @if($errors->has('fechafin'))
                        <span class="text-danger">
                            {{ $errors->first('fechafin') }}
                        </span>
                        @endif
                    </div>
                    

                    <label class="text-muted small">NOTA: Los datos marcados con el símbolo
                        <span class="text-danger">
                            <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                            </svg>
                        </span>
                        son obligatorios
                    </label>

                </div>


                <div class="modal-footer justify-content-center nofont">
                    <button type="button" class="btn bt2 btn-danger border30p" data-dismiss="modal">
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">cancelar</span>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                    <button type="submit" class="btn bt2 fontgradradiant">
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            Ver
                        </span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-binoculars" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                        </svg>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>