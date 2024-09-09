@extends('Plantilla.Principal')
@section('title', 'Gestionar Medicina Tradicional')
@section('Contenido')
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="accion" id="accion" value="">
    <input type="hidden" name="consEjemplo" id="consEjemplo" value="0">
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />
    <input type="hidden" class="form-control" id="Ruta" value="{{ url('/') }}/" />
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/Principal') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Lista de contenido multimedia</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Contenido multimedia</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de contenido multimedia</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="row">
                            <div class="col-5">
                                <button onclick="$.nueva();" id="addRow" class="btn btn-primary mb-2 ml-1"><i
                                        class="feather icon-plus"></i>&nbsp; Agregar contenido multimedia</button>
                            </div>
                            <div class="col-7">

                                <div class="bug-list-search pr-1">
                                    <div class="bug-list-search-content">
                                        <div class="sidebar-toggle d-block d-lg-none"><i
                                                class="feather icon-menu font-large-1"></i></div>

                                        <div class="position-relative">
                                            <input type="search" id="searchInput" class="form-control"
                                                placeholder="Busqueda...">
                                            <div class="form-control-position">
                                                <i class="fa fa-search text-size-base text-muted la-rotate-270"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th width="20%">Opciones</th>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Módulo</th>
                                    </tr>
                                </thead>
                                <tbody id="tdTable">

                                </tbody>
                            </table>
                        </div>
                        <div id="pagination-links" class="text-center ml-1 mt-2">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  Modal nueva medicina  --}}
        <div class="modal fade text-left" id="modalMultimedia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tituloMedicina"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form class="form" method="post" id="formGuardar"
                                action="{{ url('/') }}/AdminMultimedia/GuardarMultimedia">
                                <input type="hidden" name="id" id="id" value="" />
                                <input type="hidden" name="VideoMulti" id="VideoMulti" value="" />
                                <div class="form-group col-12 mb-2 mt-2">
                                    <div id="div-preparacion">
                                        <div class="row mb-1 border-bottom-cyan">
                                            <div class="col-12 col-xl-6">
                                                <label for="userinput5">Título: </label>
                                                <input type="text" class="form-control" id="tituloMultimedia"
                                                    name="tituloMultimedia" />
                                            </div>
                                            <div class="col-12 col-xl-6">
                                                <label for="userinput5">Módulo: </label>
                                                <select name="moduloMultimedia" class="form-control"
                                                    id="moduloMultimedia">
                                                    <option value="">Seleccione...</option>
                                                    <option value="Introducción">Introducción</option>
                                                    <option value="Gramatica y Lenguaje">Gramatica y Lenguaje</option>
                                                    <option value="Medicina Tradicional">Medicina Tradicional</option>
                                                    <option value="Usos y Costumbres">Usos y Costumbres</option>
                                                </select>
                                            </div>

                                            <div class="col-12 col-xl-12 mt-2">

                                                <div class="form-group" id="cargVideo">
                                                    <label for="userinput5">Cargar Video de Preparación: </label>
                                                    <input type="file" name="vidMult[]"
                                                        onchange="mostrarReproductorVideo(this)" accept=".mp4, .avi, .mov"
                                                        id="vidMult">
                                                </div>
                                                <div class="form-group" id="verVideo" style="display: none;">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" onclick="$.verVideo();"
                                                            class="btn btn-success"><i class="fa fa-search"></i>
                                                            Ver</button>
                                                        <button type="button" onclick="$.cambiaVodeo();"
                                                            class="btn btn-warning"><i class="fa fa-refresh"></i>
                                                            Modificar Video</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button id="btnCancelar" type="reset" onclick="$.salir()"
                                        class="btn btn-warning mr-1">
                                        <i class="feather icon-corner-up-left"></i> Salir
                                    </button>
                                    <button type="button" id="btnGuardar" onclick="$.guardar()"
                                        class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Guardar
                                    </button>
                                    <button type="button" id="btnNuevo" style="display: none;" onclick="$.limpiar()"
                                        class="btn btn-primary">
                                        <i class="feather icon-plus"></i> Nuevo
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="modalMultimediaVis" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Contenido Multimedia</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div id="modalContent" style="align-items: center;"></div>
                        </div>

                        <div class="form-actions right">
                            <input type="hidden" name="orAper" id="orAper" value="" />
                            <button type="button" onclick="$.cerrarMultimedia();" class="btn btn-warning mr-1">
                                <i class="fa fa-reply"></i> Atras
                            </button>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="loader" class="loader-spinner" style="display: none;">
            <img src="{{ asset('app-assets/images/libro.gif') }}" width="150" />
            <h2 class="parpadeo" style="color: #FC4F00; font-weight: bold;">Cargando...</h2>

        </div>

    </div>

    <form action="{{ url('/AdminMultimedia/CargarMultimedia') }}" id="formCargarMultimedia" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

    <form action="{{ url('/AdminMultimedia/BuscarMultimedia') }}" id="formBuscarMultimedia" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminMultimedia/EliminarMultimediaVideo') }}" id="formEliminar" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>





@endsection
@section('scripts')

    <script>
        (function(window, document, $) {
            'use strict';

            // Default
            $('.repeater-default').repeater();

            // Custom Show / Hide Configurations
            $('.file-repeater, .contact-repeater').repeater({
                show: function() {
                    $(this).slideDown();
                },
                hide: function(remove) {
                    var element = $(this);
                    Swal.fire({
                        title: "¿Está seguro?",
                        text: "¡No podrás revertir esto!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, Eliminar!",
                        cancelButtonText: "Cancelar",
                        confirmButtonClass: "btn btn-primary",
                        cancelButtonClass: "btn btn-danger ml-1",
                        buttonsStyling: false
                    }).then(function(result) {
                        if (result.value) {
                            element.slideUp(remove);
                            Swal.fire({
                                type: "success",
                                title: "Eliminado!",
                                text: "El cotenido multimedia a sido eliminado.",
                                confirmButtonClass: "btn btn-success"
                            });
                        }
                    });
                }
            });


        })(window, document, jQuery);



        $(document).ready(function() {
            $("#GestionMultimedia").addClass("active");

            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });

            $.extend({
                cargar: function(page, searchTerm = '') {
                    var form = $("#formCargarMultimedia");
                    var url = form.attr("action");
                    $('#page').remove();
                    $('#searchTerm').remove();
                    form.append("<input type='hidden' id='page' name='page'  value='" + page + "'>");
                    form.append("<input type='hidden' id='searchTerm' name='search'  value='" +
                        searchTerm +
                        "'>");
                    var datos = form.serialize();

                    $('#tdTable').empty();

                    let x = 1;
                    let tdTable = '';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {
                            $('#tdTable').html(response
                                .multimedia); // Rellenamos la tabla con las filas generadas
                            $('#pagination-links').html(response
                                .links); // Colocamos los enlaces de paginación
                        }
                    });
                },
                nueva: function() {
                    $("#modalMultimedia").modal({
                        backdrop: 'static',
                        keyboard: false
                    }).show();

                    $("#tituloMedicina").html("Gestionar contenido multimedia");
                    $("#accion").val("agregar");
                    document.getElementById("formGuardar").reset();
                    $("#btnGuardar").show();
                    $("#btnCancelar").show();
                    $("#btnNuevo").hide();

                    $.limpiar();

                },

                salir: function() {
                    $.limpiar();
                    $('#modalMultimedia').modal('toggle');
                },
                limpiar: function() {
                    var form = document.getElementById("formGuardar");
                    form.reset();

                    $("#btnGuardar").show();
                    $("#btnCancelar").show();
                    $("#cargVideo").show();
                    $("#btnNuevo").hide();
                    $("#verVideo").hide();

                    $("#tituloMultimedia").val("");
                    $("#moduloMultimedia").val("");
                    $("#vidMult").val("");

                },
                guardar: function() {

                    if ($("#tituloMultimedia").val().trim() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar el título...",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }
                    if ($("#moduloMultimedia").val().trim() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de seleccionar le módulo al que pertenece el video...",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }

                    if ($("#vidMult").val().trim() === "" && $("#VideoMulti").val().trim() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de seleccionar un video...",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }

                    var loader = document.getElementById('loader');
                    loader.style.display = 'block';

                    var form = $("#formGuardar");
                    var url = form.attr("action");

                    var token = $("#token").val();
                    var accion = $("#accion").val();
                    $("#idtoken").remove();
                    $("#accion").remove();

                    form.append("<input type='hidden' id='idtoken' name='_token'  value='" + token +
                        "'>");
                    form.append("<input type='hidden' id='accion' name='accion'  value='" + accion +
                        "'>");

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: new FormData($('#formGuardar')[0]),
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            if (respuesta.estado == "ok") {
                                Swal.fire({
                                    type: "success",
                                    title: "",
                                    text: "Operación realizada exitosamente",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                                $("#btnGuardar").hide();
                                $("#btnNuevo").show();
                                var loader = document.getElementById('loader');
                                loader.style.display = 'none';
                            }

                            $.cargar();

                        },
                        error: function() {
                            mensaje = "El archivo multimedia no pudo ser Guardada";
                            Swal.fire({
                                title: "",
                                text: mensaje,
                                icon: "warning",
                                button: "Aceptar",
                            });
                        }
                    });

                },
                verVideo: function() {
                    $("#orAper").val(2);
                    let url = $('#urlMult').data("ruta") +
                        "/contenidoMultimedia/modulos/" + $("#VideoMulti")
                        .val();


                    $('#modalMultimedia').modal('hide');
                    $("#modalMultimediaVis").modal({
                        backdrop: 'static',
                        keyboard: false
                    }).show();

                    var modalContent = document.getElementById('modalContent');
                    modalContent.innerHTML =
                        '<video style="width: 100%; height:360px;"  controls><source  src="' + url +
                        '" type="video/mp4"></video>';


                },

                verMultimedia: function(id) {

                    let nvideo = $("#urlVideo-" + id).data("video");
                    $("#orAper").val(1);

                    let url = $('#urlMult').data("ruta") +
                        "/contenidoMultimedia/modulos/" + nvideo;

                    $("#modalMultimediaVis").modal({
                        backdrop: 'static',
                        keyboard: false
                    }).show();

                    var modalContent = document.getElementById('modalContent');
                    modalContent.innerHTML =
                        '<video style="width: 100%; height:360px;"  controls><source  src="' + url +
                        '" type="video/mp4"></video>';


                },
                editar: function(id) {

                    $("#modalMultimedia").modal().show();

                    $("#accion").val("editar");

                    $("#tituloMedicina").html("Editar contenido multimedia");
                    $("#btnGuardar").show();
                    $("#btnNuevo").hide();
                    $("#btnCancelar").show();

                    $("#id").val(id);
                    var accion = $("#accion").val();

                    var form = $("#formBuscarMultimedia");

                    $("#idMedicina").remove();
                    form.append("<input type='hidden' id='idMultimedia' name='idMultimedia'  value='" +
                        id +
                        "'>");
                    form.append("<input type='hidden' id='accion' name='accion'  value='" + accion +
                        "'>");

                    var url = form.attr("action");
                    var datos = form.serialize();

                    let multimedia = "";
                    let ejemplos = "";

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#tituloMultimedia").val(respuesta.multimedia.titulo);
                            $("#moduloMultimedia").val(respuesta.multimedia.modulo);

                            if (respuesta.multimedia.url) {
                                $("#verVideo").show();
                                $("#cargVideo").hide();
                                $("#VideoMulti").val(respuesta.multimedia.url);
                            } else {
                                $("#verVideo").hide();
                                $("#cargVideo").show();
                                $("#nVideoPrepa").val("");
                                $("#VideoPrepa").val("");
                            }
                        }
                    });
                },
                eliminarVideo: function() {
                    $("#VideoPrepa").val("")
                    $("#verVideo").hide();
                    $("#cargVideo").show();
                },
                cambiaVodeo: function() {
                    $("#verVideo").hide();
                    $("#cargVideo").show();
                },
                cerrarMultimedia: function() {
                    let ori = $("#orAper").val();

                    $('#modalMultimediaVis').modal('hide');
                 
                    if (ori == 2) {
                        $("#modalMultimedia").modal({
                            backdrop: 'static',
                            keyboard: false
                        }).show();
                        var miDiv = document.getElementById("modalMultimedia");
                        miDiv.style.setProperty("overflow-y", "auto", "important");
                    }
                },
                eliminar: function(id) {
                    Swal.fire({
                        title: "¿Esta seguro de Eliminar este registro?",
                        text: "¡No podrás revertir esto!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, eliminar!",
                        cancelButtonText: "Cancelar",
                        confirmButtonClass: "btn btn-warning",
                        cancelButtonClass: "btn btn-danger ml-1",
                        buttonsStyling: false
                    }).then(function(result) {
                        if (result.value) {
                            $.procederEliminar(id);
                            $.cargar(1);
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                title: "Cancelado",
                                text: "Tu registro está a salvo ;)",
                                type: "error",
                                confirmButtonClass: "btn btn-success"
                            });
                        }
                    });
                },
                procederEliminar: function(id) {
                    var form = $("#formEliminar");

                    $("#idMult").remove();
                    form.append("<input type='hidden' id='idMult' name='idMult'  value='" + id +
                        "'>");

                    var url = form.attr("action");
                    var datos = form.serialize();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(respuesta) {
                            if (respuesta.estado == "no") {
                                Swal.fire({
                                    type: "warning",
                                    title: "Cancelado!",
                                    text: "Este Registro es propio de la plataforma y no puede ser eleminado",
                                    confirmButtonClass: "btn btn-warning"
                                });
                            } else {
                                Swal.fire({
                                    type: "success",
                                    title: "Eliminado!",
                                    text: "El Registro fue eliminado correctamente.",
                                    confirmButtonClass: "btn btn-success"
                                });
                            }
                        }
                    });

                },
            });

            $.cargar(1);

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];

                // Asegurarse de que 'page' sea un número antes de hacer la solicitud
                if (!isNaN(page)) {
                    $.cargar(page);
                }
            });

            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val();
                $.cargar(1, searchTerm); // Cargar la primera página con el término de búsqueda
            });


        });

        function mostrarReproductorAudio(input) {
            const audioPlayer = document.getElementById('plyr-audio-player' + consEjemplo);
            const file = input.files[0];

            if (file) {
                const audioUrl = URL.createObjectURL(file);
                audioPlayer.src = audioUrl;
                audioPlayer.style.display = 'block'; // Mostrar el reproductor de audio
            }
        }
    </script>
@endsection
