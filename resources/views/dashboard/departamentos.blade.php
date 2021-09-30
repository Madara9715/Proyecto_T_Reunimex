@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">
    <div class="row d-flex">

        @include('layouts.tareas2')

        <div class="card col-md-8 m-3 pt-3 bordertable ">

            <div class="card-header nofont text-white text-uppercase espacioletras">
                <span>
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-ui-checks" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                        <path fill-rule="evenodd"
                            d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                        <path
                            d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                        <path fill-rule="evenodd"
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </span>
                <span class="mx-2">{{$panel}}</span>

            </div>
            <div class="card-body p-1">
                <div class="table-responsive-sm">

                    <table class="table table-sm table-hover">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departamentos as $departamento)

                            <tr>

                                <td>{{$departamento->clave}}</td>
                                <td class="text-capitalize text-primary font-weight-bolder">
                                    {{$departamento->nombre_departamento}}</td>
                                <td>{{$departamento->descripcion}}</td>


                                <td>

                                    <div class="row justify-content-end mr-1">
                                        <div class="col-sm-4 mt-1 px-1 d-flex justify-content-center">
                                            <a href="{{ route('departamentos.show',$departamento->id) }}"
                                                class="text-dark" data-toggle="tooltip" data-placement="top"
                                                title="Ver">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-eye"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                    <path fill-rule="evenodd"
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 mt-1 px-1 d-flex justify-content-center">
                                            <a id="{{$departamento->id}}" onclick="edit_click(this.id)"
                                                class="text-primary edit" data-toggle="tooltip" data-placement="top"
                                                title="Editar">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 mt-1 px-1 d-flex justify-content-center">

                                            <button value="{{$departamento->id}}" onClick="delete_click(this.value)"
                                                class="text-danger delete" style="background-color: transparent; border-style: none;" data-toggle="tooltip"
                                                data-placement="top" title="Eliminar">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16"
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
</div>
@include('dashboard.editdepartamento')
@include('layouts.confirmdelete')
@endsection

@section('scripts')


<script type="application/javascript">
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $(".modal").on("hidden.bs.modal", function() {
        $('#NewErrorMessages').html('');
        $('#NewErrorMessages').hide();
        $('#OcultNewErrorMessages').hide();
        $('#EditErrorMessages').html('');
        $('#EditErrorMessages').hide();
        $('#OcultEditErrorMessages').hide();
    });



    $('#NuevoSubmit').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            url: "{{ route('departamentos.store') }}",
            type: 'POST',
            method: 'POST',
            data: {
                token: $('#token').val(),
                nombre_departamento: $('#nombre').val(),
                descripcion: $('#descripcion').val(),

            },

            success: function(result) {
                if (result.errors) {
                    $('#NewErrorMessages').html('');
                    $('#OcultNewErrorMessages').show();
                    $.each(result.errors, function(key, value) {
                        $('#NewErrorMessages').show();
                        $('#NewErrorMessages').append('<li>' + value + '</li>');
                    });

                } else {
                    $('#NewErrorMessages').hide();
                    $('#OcultNewErrorMessages').hide();
                    $('#new').modal('hide');
                    location.reload();
                }
            }
        });
    });


    $('#EditSubmit').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dltUrl = "departamentos" + "/" + $('#Id').val();

        $.ajax({
            url: dltUrl,
            type: 'PATCH',
            method: 'PATCH',
            data: {
                token: $('#token').val(),
                nombre_departamento: $('#nombreEdit').val(),
                id: $('#Id').val(),
                descripcion: $('#descripcionEdit').val(),
            },

            success: function(result) {
                if (result.errors) {
                    $('#EditErrorMessages').html('');
                    $('#OcultEditErrorMessages').show();
                    $.each(result.errors, function(key, value) {
                        $('#EditErrorMessages').show();
                        $('#EditErrorMessages').append('<li>' + value + '</li>');
                    });

                } else {

                    $('#edit').modal('hide');
                    location.reload();

                }
            }
        });
    });

    $('#DeleteSubmit').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dltUrl = "departamentos" + "/" + $('#DeleteId').val();
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

function edit_click(clicked_id) {
    $.get("departamentos" + "/" + clicked_id + "/edit", function(data) {
        document.getElementById("claveEdit").innerText = data.clave;
        $('#nombreEdit').val(data.nombre_departamento);
        $('#Id').val(data.id);
        $('#descripcionEdit').val(data.descripcion);
        $('#edit').modal('show');
    })
}

function delete_click(clicked_id) {
    $.get("departamentos" + "/" + clicked_id + "/edit", function(data) {
        document.getElementById("nombreDepartamento").innerText = "¿Desea eliminar el departamento " + data
            .nombre_departamento + "?";
        $('#DeleteId').val(data.id);
        $('#delete').modal('show');
    })
}
</script>
@endsection