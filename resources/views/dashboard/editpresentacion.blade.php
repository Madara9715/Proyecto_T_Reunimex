@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">

    <div class="row d-flex">

        <div class="card bg-dark text-success col-lg-8 mb-3 mt-5  mx-auto">


            <div class="d-md-flex d-inline-flex justify-content-md-end justify-content-center">

                <span class="caret mt-n5 mx-auto">
                    <img src="{{asset('images/ventas.png')}}" alt="F O T O" style="width:150px;"
                        class="rounded-circle showphoto bg-light">
                </span>

                <div class="ml-2 mt-2">
                    <a href="{{ route('productos.index') }}" class="btn bt2 fontgradradiant">
                        <svg width="2em" height="2em" style=" transform: rotateY(180deg);" viewBox="0 0 16 16"
                            class="bi bi-reply-all-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.079 11.9l4.568-3.281a.719.719 0 0 0 0-1.238L8.079 4.1A.716.716 0 0 0 7 4.719V6c-1.5 0-6 0-7 8 2.5-4.5 7-4 7-4v1.281c0 .56.606.898 1.079.62z" />
                            <path fill-rule="evenodd"
                                d="M10.868 4.293a.5.5 0 0 1 .7-.106l3.993 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a.5.5 0 0 1-.593-.805l4.012-2.954a.493.493 0 0 1 .042-.028.147.147 0 0 0 0-.252.496.496 0 0 1-.042-.028l-4.012-2.954a.5.5 0 0 1-.106-.699z" />
                        </svg>
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            regresar
                        </span>
                    </a>
                </div>

            </div>

            <!--  <img src="{{asset('images/iconsbootstrap/emoji-laughing.svg')}}" class="iconwhite" alt="carita" width="32" height="32" title="Bootstrap"> -->
            <form action="{{ route('productos.update',$productos->id) }}" method="POST">
                @csrf
                {{method_field('PUT')}}
                <div class="row m-1 border border-left-0 border-right-0 border-top-0">  
                    
                    <div class="col-md-9 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase">
                        <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                            Categoria:
                        </label>
                        <span
                            class="textdarkgray text-capitalize font-weight-bold bigtitle"></span>
                       <select class="custom-select" name="categoriaproducto_id">
                        <option selected value='{{$catActual->id}}'>{{$catActual->nombre_categoriaP}}</option>
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
                    <div
                    class="col-md-3 d-flex align-self-end justify-content-center border border-success text-dark rounded-lg">
                    <label class="espacioletras font-weight-bold text-uppercase text-success my-auto">
                        clave:
                    </label>
                    <span class="text-light text-capitalize font-weight-bold">{{($productos->clave)}}</span>
                </div>

                    <div class="col-md-9 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase">
                        <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                            Nombre:
                        </label>
                        <span
                            class="textdarkgray text-capitalize font-weight-bold bigtitle"></span>
                        <input type="text" class="form-control border30p nofont inputblack" value="{{$productos->nombre_producto}}" name="nombre_producto">
                        @if($errors->has('nombre_producto'))
                        <span class="text-danger">
                            {{ $errors->first('nombre_producto') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-9 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase">
                        Descripcion:
                        </label>
                        <span
                            class="textdarkgray text-capitalize font-weight-bold bigtitle"></span>
                            <textarea class="form-control nofont inputblack" rows="2" name="descripcion">{{$productos->descripcion}}</textarea>
                        @if($errors->has('descripcion'))
                        <span class="text-danger">
                            {{ $errors->first('descripcion') }}
                        </span>
                        @endif
                    </div>

                    <div class="col-md-9 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase">
                                                <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                        Tipo:
                        </label>
                        <span
                            class="textdarkgray text-capitalize font-weight-bold bigtitle"></span>
                        <select class="custom-select" name="tipoproducto_id">
                        <option selected value='{{$tipActual->id}}'>{{$tipActual->nombre_tipoP}}</option>
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

                    <div class="col-md-9 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase">
                            <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                        Proveedor:
                        </label>
                        <span
                            class="textdarkgray text-capitalize font-weight-bold bigtitle"></span>
                        <select class="custom-select" name="proveedore_id">
                        <option selected value='{{$provActual->id}}'>{{$provActual->nombre_proveedor}}</option>
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

                    <div class="col-md-9 justify-content-center">
                        <label class="espacioletras font-weight-bold text-uppercase">
                             <span class="text-danger">
                                <svg width="0.5em" height="0.5em" viewBox="0 0 16 16" class="bi bi-asterisk" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                </svg>
                            </span>
                        Marca:
                        </label>
                        <span
                            class="textdarkgray text-capitalize font-weight-bold bigtitle"></span>
                        <select class="custom-select" name="marca_id">
                        <option selected value='{{$marActual->id}}'>{{$marActual->nombre_marca}}</option>
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
                    
                </div>
               
                <div class="row m-1 border border-left-0 border-right-0 border-top-0">
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
@endsection