<div class="modal fade" id="descarga">
    <div class="modal-dialog modal-lg modal-dialog-centered d-flex flex-column">

        <span><img src="{{asset('images/logo3.svg')}}" alt="Reunimex" style="width:70px;"></span>

        <div class="modal-content">

            <div class="modal-header fontgradradiant text-uppercase espacioletras py-3 justify-content-center">
                <h5 class="modal-title text-light align-self-center lineagradien2">Confirmar Descascarga</h5>
            </div>

            <form action="{{ route('reportedescarga') }}" method="POST">
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
                            Descargar
                        </span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-arrow-down-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
                        </svg>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>