<div class="modal fade" id="new">
    <div class="modal-dialog modal-lg modal-dialog-centered d-flex flex-column">

        <span><img src="{{asset('images/logo3.svg')}}" alt="Reunimex" style="width:70px;"></span>

        <div class="modal-content">

            <div class="modal-header fontgradradiant text-uppercase espacioletras py-3 justify-content-center">
                <h5 class="modal-title text-light align-self-center lineagradien2">nuevo producto</h5>
            </div>

            <form action="{{ route('productos.store') }}" method="POST">
                @csrf

                <div class="modal-body nofont">
                    <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary imput-group-text ">
                            <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                            Categoria:
                        </label>
                        <select class="custom-select" name="categoriaproducto_id">
                            <option selected value=''>{{null}}</option>
                            @foreach($categorias as $categoria)
                            {{$valueCategoria=$categoria->id}}
                            <option value={{$valueCategoria}}>{{$categoria->nombre_categoriaP}}</option>
                            @endforeach
                        </select>
                        
                        @if($errors->has('categoriaproducto_id'))
                        <span class="text-danger">
                            {{ $errors->first('categoriaproducto_id') }}
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
                        <input type="text" class="form-control border30p nofont inputblack" name="nombre_producto">
                        @if($errors->has('nombre_producto'))
                        <span class="text-danger">
                            {{ $errors->first('nombre_producto') }}
                        </span>
                        @endif
                     </div>
                     <div class="form-group">
                        <label for="descripcion" class="espacioletras  text-uppercase text-primary">Descripcion:</label>
                        <textarea class="form-control nofont inputblack" rows="2" name="descripcion"></textarea>
                        @if($errors->has('descripcion'))
                        <span class="text-danger">
                            {{ $errors->first('descripcion') }}
                        </span>
                        @endif
                    </div>
                   
                    <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary imput-group-text ">
                            Tipo:
                        </label>
                        <select class="custom-select" name="tipoproducto_id">
                            <option selected value=''>null</option>
                            @foreach($tipoproductos as $tipoproducto)
                            {{$valuetipoproducto=$tipoproducto->id}}
                            <option value={{$valuetipoproducto}}>{{$tipoproducto->nombre_tipoP}}</option>
                            @endforeach
                        </select>
                        
                        @if($errors->has('tipoproducto_id'))
                        <span class="text-danger">
                            {{ $errors->first('tipoproducto_id') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary imput-group-text ">
                            Proveedor:
                        </label>
                        <select class="custom-select" name="proveedore_id">
                            <option selected value=''>null</option>
                            @foreach($proveedores as $proveedor)
                            {{$valueproveedor=$proveedor->id}}
                            <option value={{$valueproveedor}}>{{$proveedor->nombre_proveedor}}</option>
                            @endforeach
                        </select>
                        
                        @if($errors->has('proveedore_id'))
                        <span class="text-danger">
                            {{ $errors->first('proveedore_id') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="espacioletras  text-uppercase text-primary imput-group-text ">
                            Marca:
                        </label>
                        <select class="custom-select" name="marca_id">
                            <option selected value=''>null</option>
                            @foreach($marcas as $marca)
                            {{$valuemarca=$marca->id}}
                            <option value={{$valuemarca}}>{{$marca->nombre_marca}}</option>
                            @endforeach
                        </select>
                        
                        @if($errors->has('marca_id'))
                        <span class="text-danger">
                            {{ $errors->first('marca_id') }}
                        </span>
                        @endif
                    </div>

                    <label class="text-muted small">NOTA: Los datos marcados con el s??mbolo
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