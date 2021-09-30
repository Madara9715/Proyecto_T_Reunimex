@extends('layouts.app')
@section('panel',$name)
@section('titlepanel',$panel)

@section('content')
<div class="container-fluid p-3">
    <div class="row d-flex">

        @include('layouts.tareas2')

        @if (Session::has('errors'))
        <script>
        $(document).ready(function() {
            $("#new").reload;
        });
        </script>
        @endif

        <div class="card col-md-8 m-3 pt-3 bordertable">



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
                <div class="table-responsive">

                    <table class="table table-sm table-hove">
                        <thead>
                            <tr class="text-uppercase espacioletras text-muted">
                                <th>Nombre de Usuario</th>
                                <th>E-mail</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)

                            <tr>

                                <td >{{$usuario->name_user}}</td>
                                <td >{{$usuario->email}}</td>
                                @if(($usuario->activo) =='1')
                                <td class="text-capitalize text-primary font-weight-bolder">Activo</td>
                                @else
                                <td class="text-capitalize text-primary font-weight-bolder">Inactivo</td>
                                @endif
                                <td>
                                    <div class="row justify-content-end mr-1">
                                        <div class="col-sm-4 mt-1 px-1 d-flex justify-content-center">
                                            <a href="{{ route('usuarios.edit',$usuario->id) }}"
                                                class="text-primary edit" data-toggle="tooltip" data-placement="top"
                                                title="Editar">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                    class="bi bi-pencil" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 mt-1 px-1 d-flex justify-content-center">
                                            <button value="{{$usuario->id}}" onclick="delete_click(this.value)"
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
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{$usuarios->links()}}
                </div>
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

        var dltUrl = "usuarios" + "/" + $('#DeleteId').val();
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
    $.get("borrar" + "/" + clicked_id+ "/" +"usuario", function(data) {
        document.getElementById("nombreDepartamento").innerText = "¿Desea eliminar a " + data
            .email + "?";
        $('#DeleteId').val(data.id);
        $('#delete').modal('show');
    })
}
</script>
@endsection