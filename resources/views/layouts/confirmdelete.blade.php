<div class="modal fade" id="delete" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered d-flex flex-column" role="document">

        <span><img src="{{asset('images/logo3.svg')}}" alt="Reunimex" style="width:70px;"></span>

        <div class="modal-content">

            <div class="modal-header fontgradradiant text-uppercase espacioletras py-3 justify-content-center">
                <h5 class="modal-title text-light align-self-center lineagradien2">eliminar</h5>
            </div>

            <form id="DeleteForm">
                @csrf
                @method('PATCH')
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" id="Id" name="Id">

                <div class="modal-body nofont">
                    <div class="row">
                        <input type="hidden" id="DeleteId" name="DeleteId">

                        <div class="col-lg-12">
                            <div class="row mb-3 justify-content-center" style="color: goldenrod;">
                                <svg width="7em" height="7em" viewBox="0 0 16 16" class="bi bi-exclamation-circle"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                </svg>
                            </div>

                            <div class="row text-light d-flex justify-content-center p-1 mb-2">
                                <h4 id="nombreDepartamento" class="text-center font-weight-bold">
                                </h4>
                                <label class="text-muted mb-2">Una vez eliminado el elemento ya no podrá ser restaurado
                                </label>
                            </div>



                            <div class="text-danger mt-2">
                                <span id="OcultDeleteErrorMessages" class="justify-content-center p-2"
                                    style="display:none">

                                    <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-emoji-frown"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path fill-rule="evenodd"
                                            d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683z" />
                                        <path
                                            d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                                    </svg>
                                    <strong> ¡Atención!, parece que no se puede eliminar el elemento por alguna de estas
                                        razones:</strong>
                                </span>
                                <div id="DeleteErrorMessages"
                                    class="alert-danger text-muted bg-dark border30p p-2 px-5 my-2 font-weight-bold"
                                    style="display:none">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="modal-footer justify-content-center nofont">


                    <button type="button" class="btn bt2 btn-danger delete" id="DeleteSubmit">
                        <span class="mx-2 espacioletras font-weight-bold text-uppercase">
                            Eliminar
                        </span>
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                        </svg>
                    </button>

                    <button type="button" class="btn bt2 btn-secondary border30p" data-dismiss="modal">
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