<div class="modal fade" id="new">
    <div class="modal-dialog modal-lg modal-dialog-centered d-flex flex-column">

        <span><img src="{{asset('images/logo3.svg')}}" alt="Reunimex" style="width:70px;"></span>

        <div class="modal-content">

            <div class="modal-header fontgradradiant text-uppercase espacioletras py-3 justify-content-center">
                <h5 class="modal-title text-light align-self-center lineagradien2">nuevo empleado</h5>
            </div>

            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                <div class="modal-body nofont">

                <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary">
                            <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                            Tipo Empleado:
                        </label>
                        <select class="custom-select" name="tipoempleado_id">
                            <option selected value=null>Choose...</option>
                            @foreach($tipoempleados as $tipo)
                            {{$valueTipo=$tipo->id}}
                            <option value={{$valueTipo}}>{{$tipo->nombre_tipoE}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('tipoempleado_id'))
                        <span class="text-danger">
                            {{ $errors->first('tipoempleado_id') }}
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
                            Departamento:
                        </label>
                        <select class="custom-select " name="departamento_id">
                            <option selected value=null>Choose...</option>
                            @foreach($departamentos as $departamento)
                            {{$valueDepartamento=$departamento->id}}
                            <option value={{$valueDepartamento}}>{{$departamento->nombre_departamento}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('departamento_id'))
                        <span class="text-danger">
                            {{ $errors->first('departamento_id') }}
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
                            Nombre:
                        </label>
                        <input type="text" class="form-control border30p nofont inputblack" name="nombre_empleado">
                        @if($errors->has('nombre_empleado'))
                        <span class="text-danger">
                            {{ $errors->first('nombre_empleado') }}
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
                            Apellido Paterno:
                        </label>
                        <input type="text" class="form-control border30p nofont inputblack" name="apellido_p">
                        @if($errors->has('apellido_p'))
                        <span class="text-danger">
                            {{ $errors->first('apellido_p') }}
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
                            Apellido Materno:
                        </label>
                        <input type="text" class="form-control border30p nofont inputblack" name="apellido_m">
                        @if($errors->has('apellido_m'))
                        <span class="text-danger">
                            {{ $errors->first('apellido_m') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary">
                            Telefono Fijo:
                        </label>
                        <input type="text" class="form-control border30p nofont inputblack" name="telefono_fijo">
                        @if($errors->has('telefono_fijo'))
                        <span class="text-danger">
                            {{ $errors->first('telefono_fijo') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary">
                            Telefono Movil:
                        </label>
                        <input type="text" class="form-control border30p nofont inputblack" name="telefono_movil">
                        @if($errors->has('telefono_movil'))
                        <span class="text-danger">
                            {{ $errors->first('telefono_movil') }}
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
                            Direccion:
                        </label>
                        <input type="text" class="form-control border30p nofont inputblack" name="direccion">
                        @if($errors->has('direccion'))
                        <span class="text-danger">
                            {{ $errors->first('direccion') }}
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
                            Correo:
                        </label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control border30p nofont inputblack" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name='correo_electronico'>
                        <div class="input-group-append">
                            <span class="input-group-text border30p nofont inputblack" id="basic-addon2">@example.com</span>
                        </div>
                        </div>
                        @if($errors->has('correo_electronico'))
                        <span class="text-danger">
                            {{ $errors->first('correo_electronico') }}
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
                            Edad:
                        </label>
                        <input type="text" class="form-control border30p nofont inputblack" name="edad">
                        @if($errors->has('edad'))
                        <span class="text-danger">
                            {{ $errors->first('edad') }}
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
                            Sexo:
                        </label>
                        <select class="custom-select" name="sexo">
                            <option selected value=null>Choose...</option>
                            <option value="2">Femenino</option>
                            <option value="1">Masculino</option>
                            <option value="0">Otro</option>
                        </select>
                        @if($errors->has('sexo'))
                        <span class="text-danger">
                            {{ $errors->first('sexo') }}
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
                            guardar
                        </span>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-folder-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z" />
                            <path fill-rule="evenodd" d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>