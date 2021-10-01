<div class="col-lg-3  mt-n1">

    <button class="btn-block btn bg-2 py-2 navbar-toggler rounded-0 mb-2" type="button" data-toggle="collapse" data-target="#tareas">
        <span>
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-clipboard-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm4.354 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
            </svg>
        </span>
        <span class="espacioletras text-uppercase">
            tareas
        </span>
    </button>

    <div class="collapse clipboard navbar-collapse show font-weight-bold" id="tareas" style="background-color:transparent;">

        <ul class="nav flex-column espacioletras">

            <li>
                <button type="button" data-toggle="modal" data-target="#new" class="btn btn-block btn-danger border30p my-1 py-2">
                    <span class="mr-2">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </span>
                    <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                        nuevo {{$nuevo}}
                    </span>
                </button>
            </li>
            @if($nuevo==='producto')
                <li>
                    <button type="button" data-toggle="modal" data-target="#newpres" class="btn btn-block bt2 fontgradradiant my-1 py-2">
                        <span class="mr-2">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            Presentacion {{$nuevo}} 
                        </span>
                    </button>
                </li>
                @elseif($nuevo==='empleado')
                <li>
                    <button type="button" data-toggle="modal" data-target="#asignacion" class="btn btn-block bt2 fontgradradiant my-1 py-2">
                        <span class="mr-2">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            Cliente-{{$nuevo}} 
                        </span>
                    </button>
                </li>
                @elseif($nuevo==='inventario')
                <li>
                    <button type="button" data-toggle="modal" data-target="#asignacion" class="btn btn-block bt2 fontgradradiant my-1 py-2">
                        <span class="mr-2">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            Productos-{{$nuevo}} 
                        </span>
                    </button>
                </li>
            @endif

        </ul>
    </div>
    @if ($nuevo==='departamento')
        @include('dashboard.new2')
        @elseif($nuevo==='cliente_asesor')
        @include('dashboard.newclienteA')
        @else
        @include('dashboard.new'.$nuevo)
    @endif
    
    
</div>