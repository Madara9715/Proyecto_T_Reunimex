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

            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-9 justify-content-center">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        nombre producto:
                    </label>
                    <span
                        class="textdarkgray text-capitalize font-weight-bold bigtitle">{{$producto->nombre_producto}}</span>
                </div>
                <div
                    class="col-md-3 d-flex align-self-end justify-content-center border border-success text-dark rounded-lg">
                    <label class="espacioletras font-weight-bold text-uppercase text-success my-auto">
                        clave:
                    </label>
                    <span class="text-light text-capitalize font-weight-bold">{{$producto->clave}}</span>
                </div>
                

            </div>
            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-12">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Categoria:
                    </label>
                    <span class="textdarkgray text-justify">{{$categoria->nombre_categoriaP}}</span>
                </div>
            </div> 
            <div class="row m-1 border border-left-0 border-right-0 border-top-0">

                <div class="col-md-12">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Tipo producto:
                    </label>
                    <span class="textdarkgray text-justify">{{$tipoproducto->nombre_tipoP}}</span>
                </div>
            </div> 

            <div class="row m-1 border border-left-0 border-right-0 border-top-0">
                <div class="col-md-12">
                    <label class="espacioletras font-weight-bold text-uppercase">
                        Descripcion:
                    </label>
                    <span class="textdarkgray text-justify"> {{$producto->descripcion}}</span>
                </div>
            </div>
                    
        </div>
    </div>

<div class="card col-md-12 dark-gray pt-3 bordertable">
        <div class="card-header text-uppercase espacioletras">
            <span>
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-ui-checks" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                    <path fill-rule="evenodd"
                        d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                    <path d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                    <path fill-rule="evenodd"
                        d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg>
            </span>
            <span class="mx-2">{{$tablas[1]}}</span>

        </div>
        <div class="card-body dark-gray p-1">
            <div class="table-responsive-xl">

                <table class="table table-sm table-dark table-hover">
                    <thead>
                        <tr class="text-uppercase espacioletras text-muted small">
                            <th></th>
                            <th>nombre</th>
                            <th>cantidad</th>
                            <th>unidad</th>
                            <th>precio publico</th>
                            <th>precio distribuidor</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presentacion as $producto)

                        <tr>

                            <td>
                                <span class="caret">
                                    
                                </span>
                            </td>
                            <td>{{$producto->id}} {{$producto->nombre_presentacionP}}</td>
                            <td>{{$producto->cantidad}}</td>
                            <td>{{$producto->unidad}}</td>
                            <td>$ {{$producto->precio_publico}}</td>
                            <td>$ {{$producto->precio_distribuidor}}</td>
                            <td>
                                <div class="row justify-content-end mr-1">
                                        <div class="col-sm-4 mt-1 px-1 d-flex justify-content-center">
                                            <button value="{{$producto->id}}" onclick="delete_click(this.value)"
                                                class="text-danger delete" style="background-color: transparent; border-style: none;" data-toggle="tooltip"
                                                data-placement="top" title="Eliminar">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                    class="bi bi-trash" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </div>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

   
</div>
@include('layouts.confirmdelete')
<script  type="application/javascript">
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#DeleteSubmit').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dltUrl = "presentaciones" + "/" + $('#DeleteId').val();
        $.ajax({
            url: dltUrl,
            type: "DELETE",
            cache: false,
            data: {
                _token: '{{ csrf_token() }}'

            },
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    location.reload();
                }
            }
        });
    });
});

function delete_click(clicked_id) {
    $.get("borrar" + "/" + clicked_id + "/" + "presentacion", function(data) {
        document.getElementById("nombreDepartamento").innerText = "¿Desea eliminar a " + data
            .presentacione_id + "?";
        $('#DeleteId').val(data.id);
        $('#delete').modal('show');
    })
}
</script>
@endsection