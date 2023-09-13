@extends('Plantilla.Principal')
@section('title', 'Gestionar Tematicas')
@section('Contenido')
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="accion" id="accion" value="">
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />
    <input type="hidden" class="form-control" id="Ruta" value="{{ url('/') }}/" />
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Lista de Tematicas</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Tematicas</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Tematicas</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="row">
                            <div class="col-5">
                                <button onclick="$.nueva();" id="addRow" class="btn btn-primary mb-2 ml-1"><i
                                        class="feather icon-plus"></i>&nbsp; Agregar Tema</button>
                            </div>
                            <div class="col-7">

                                <div class="bug-list-search">
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
                                        <th>Nombre</th>
                                        <th>Unidad</th>
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

        {{--  Modal nueva unidad  --}}
        <div class="modal fade text-left" id="modalTematica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tituloTematica"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">

                            <form class="form" method="post" id="formGuardar"
                                action="{{ url('/') }}/AdminGramaticaLenguaje/GuardarTema">
                                <input type="hidden" name="id" id="id" value="" />
                                <ul class="nav nav-tabs nav-linetriangle" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="homeIcon1-tab1" data-toggle="tab" href="#homeIcon11"
                                            aria-controls="homeIcon11" role="tab" aria-selected="true"><i
                                                class="fa fa-align-justify"></i> Información Basica
                                            del Tema </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="profileIcon1-tab1" data-toggle="tab"
                                            href="#profileIcon11" aria-controls="profileIcon11" role="tab"
                                            aria-selected="false"><i class="fa fa-film"></i> Contenido Multimedia</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div class="tab-pane  active in" id="homeIcon11" aria-labelledby="homeIcon1-tab1"
                                        role="tabpanel">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="userinput5">Título:</label>
                                                <input class="form-control border-primary" type="text" name="titulo"
                                                    placeholder="Título" id="titulo">
                                            </div>
                                            <div class="form-group">
                                                <label for="userinput5">Unidad Tematica:</label>
                                                <select id="unidad" name="unidad" class="select2 form-control">

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="userinput8">Contenido:</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="full-wrapper">
                                                            <div id="full-container">
                                                                <div id="contenido" name="contenido"
                                                                    style="height: 200px;" class="editor"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profileIcon11" aria-labelledby="profileIcon1-tab1"
                                        role="tabpanel">
                                        <div class="form-group col-12 mb-2 mt-2 file-repeater">
                                            <div data-repeater-list="repeater-list">
                                                <div data-repeater-item>
                                                    <div class="row mb-1">
                                                        <div class="col-9 col-xl-10">
                                                            <label class="file center-block">
                                                                <input type="file"
                                                                    accept=".jpg, .jpeg, .png, .gif, .mp4, .avi, .mov, .pdf"
                                                                    name="multimedia" id="multimedia">
                                                                <span class="file-custom"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-2 col-xl-1">
                                                            <button type="button" data-repeater-delete
                                                                class="btn btn-icon btn-danger mr-1"><i
                                                                    class="feather icon-x"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" data-repeater-create class="btn btn-primary">
                                                <i class="icon-plus4"></i> Agregar nuevo contenido
                                            </button>
                                        </div>

                                        <div class="card-body" id="divMultimedia" style="display:none;">
                                            <h5>Listado de Contenido Multimedia existente</h5>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre de Archivo</th>
                                                            <th>Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="trMultimedia">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions right">
                                    <button id="btnCancelar" type="reset" onclick="$.limpiar()" class="btn btn-warning mr-1">
                                        <i class="feather icon-x"></i> Cancelar
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
        <div class="modal fade text-left" id="modalMultimediaTematica" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Contenido Multimedia</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div id="modalContent" style="align-items: center;"></div>
                        </div>

                        <div class="form-actions right">
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

    <form action="{{ url('/AdminGramaticaLenguaje/CargarTemas') }}" id="formCargarTemas" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

    <form action="{{ url('/AdminGramaticaLenguaje/BuscarTema') }}" id="formBuscarTema" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/EliminarTema') }}" id="formEliminar" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/CargarUnidadesSelect') }}" id="formCargarUnidades" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/eliminarMultimedia') }}" id="formEliminarMultimedia" method="POST">
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
            $("#Princioal").removeClass("active");
            $("#MenuGramatica").addClass("has-sub open");
            $("#MenuGramaticaTematica").addClass("active");

            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });

            // full editor
            var fullEditor = new Quill("#full-container .editor", {
                bounds: "#full-container .editor",
                modules: {
                    formula: true,
                    syntax: true,
                    toolbar: [
                        [{
                                font: []
                            },
                            {
                                size: []
                            }
                        ],
                        ["bold", "italic", "underline", "strike"],
                        [{
                                color: []
                            },
                            {
                                background: []
                            }
                        ],
                        [{
                                script: "super"
                            },
                            {
                                script: "sub"
                            }
                        ],
                        [{
                                header: "1"
                            },
                            {
                                header: "2"
                            },
                            "blockquote",
                            "code-block"
                        ],
                        [{
                                list: "ordered"
                            },
                            {
                                list: "bullet"
                            },
                            {
                                indent: "-1"
                            },
                            {
                                indent: "+1"
                            }
                        ],
                        [
                            "direction",
                            {
                                align: []
                            }
                        ],
                        ["link", "image", "video", "formula"],
                        ["clean"]
                    ]
                },
                theme: "snow"
            });

            $.extend({
                cargar: function(page, searchTerm = '') {
                    var form = $("#formCargarTemas");
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
                                .temas); // Rellenamos la tabla con las filas generadas
                            $('#pagination-links').html(response
                                .links); // Colocamos los enlaces de paginación
                        }
                    });
                },
                nueva: function() {
                    $("#modalTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#tituloTematica").html("Gestionar Tematicas");
                    $("#accion").val("agregar");
                    document.getElementById("formGuardar").reset();
                    $("#btnGuardar").show();
                    $("#btnCancelar").show();
                    $("#btnNuevo").hide();

                    $.cargarUnidades();
                    $.limpiar();

                },
                limpiar: function() {
                    var form = document.getElementById("formGuardar");
                    form.reset();

                    fullEditor.deleteText(0, fullEditor.getLength());
                    $('#unidad').val("").trigger('change.select2');
                   
                    $("#divMultimedia").html("");
                    $("#divMultimedia").hide();
                },
                cargarUnidades: function() {
                    var form = $("#formCargarUnidades");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    let select = '<option value="">Seleccione...</option>';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(respuesta) {
                            $.each(respuesta.unidades, function(i, item) {

                                select += '<option value="' + item.id + '">' + item
                                    .nombre + '</option>';

                            });
                        }
                    });

                    $("#unidad").html(select);
                },
                guardar: function() {

                    if ($("#titulo").val().trim() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar el título",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }
                    if ($("#unidades").val() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de seleccionar la unidad",
                            confirmButtonClass: "btn btn-primary",
                            timer: 2500,
                            buttonsStyling: false
                        });
                        return;
                    }

                    var contenido = fullEditor.root.innerHTML.trim();

                    if (contenido === "" || contenido == "<p><br></p>") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar un contenido",
                            confirmButtonClass: "btn btn-primary",
                            timer: 2500,
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
                    $("#contenidoEdit").remove();
                    form.append("<input type='hidden' id='contenidoEdit' name='contenidoEdit' value='" +
                        contenido + "'>");
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
                            mensaje = "La Evaluación no pudo ser Guardada";
                            Swal.fire({
                                title: "",
                                text: mensaje,
                                icon: "warning",
                                button: "Aceptar",
                            });
                        }
                    });

                },
                editar: function(id) {

                    $("#modalTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#accion").val("editar");
                    $.cargarUnidades();
                    $("#divMultimedia").show();
                    $("#tituloTematica").html("Editar Tematica");
                    $("#btnGuardar").show();
                    $("#btnNuevo").hide();
                    $("#btnCancelar").hide();
          

                    $("#id").val(id);
                    var accion = $("#accion").val();

                    var form = $("#formBuscarTema");

                    $("#idUnidad").remove();
                    form.append("<input type='hidden' id='idTema' name='idTema'  value='" + id +
                        "'>");
                    form.append("<input type='hidden' id='accion' name='accion'  value='" + accion +
                        "'>");

                    var url = form.attr("action");
                    var datos = form.serialize();

                    let multimedia = "";

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#titulo").val(respuesta.tematica.titulo);
                            $('#unidad').val(respuesta.tematica.unidad).trigger(
                                'change.select2');
                            fullEditor.root.innerHTML = respuesta.tematica.contenido;

                            //llenar multimedia 
                            let x = 1;

                            $.each(respuesta.mulTematica, function(i, item) {
                                multimedia += '<tr class="trMultimedia" name="tr_multimedia" id="tr_' + x + '" data-id="' + item.id +'" data-url="' + item.url_contenido +'" data-tipo="' + item.tipo_multimedia + '"><th>' + x + '</th>';
                                multimedia += '<td>' + item.url_contenido + '</td>';
                                multimedia +=
                                    '<td><button type="button"   title="Ver" onclick="$.Ver('+x+');" class="btn btn-icon btn-pure info "><i class="fa fa-search"></i></button>' +
                                    '<button type="button" title="Eliminar" onclick="$.EliminarMulti('+x+');" class="btn btn-icon btn-pure danger  "><i class="fa fa-trash-o"></i></button>' +
                                    '</td></tr>';
                                x++;
                            });
                           
                        }
                    });

                    $("#trMultimedia").html(multimedia);
                },
               
                EliminarMulti: function(id) {

                    Swal.fire({
                        title: "Esta seguro de Eliminar este Contenido Multimedia?",
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
                            $.procederEliminarMultimedia(id);
                           
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
                Ver: function(id) {
                    let url = $('#urlMult').data("ruta") + "/contenidoMultimedia/tematicas/" + $("#tr_" +
                        id).data("url");
                    let tipMuil = $("#tr_" + id).data("tipo");

                    console.log(tipMuil.substr(0, 4));
                    $("#modalMultimediaTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#modalTematica').modal('toggle');

                    // Función para abrir el modal y cargar el contenido según el tipo
                    var modalContent = document.getElementById('modalContent');

                    // Cargar el contenido según el tipo
                    if (tipMuil === 'application/pdf') {
                        modalContent.innerHTML = '<iframe  style="width: 100%; height:360px;" src="' +
                            url + '"></iframe>';
                    } else if (tipMuil.substr(0, 5) === 'video') {
                        modalContent.innerHTML =
                            '<video style="width: 100%; height:360px;"  controls><source  src="' + url +
                            '" type="video/mp4"></video>';
                    } else {
                        modalContent.innerHTML = '<img src="' + url + '" alt="Imagen">';
                    }

                },
                cerrarMultimedia: function() {
                    $("#modalTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#modalMultimediaTematica').modal('toggle');
                },
                eliminar: function(id) {
                    Swal.fire({
                        title: "Esta seguro de Eliminar este registro?",
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

                    $("#idTema").remove();
                    form.append("<input type='hidden' id='idTema' name='idTema'  value='" + id +
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
                            Swal.fire({
                                type: "success",
                                title: "Eliminado!",
                                text: "El Registro fue eliminado correctamente.",
                                confirmButtonClass: "btn btn-success"
                            });
                        }
                    });

                },
                procederEliminarMultimedia: function(id) {
                    var form = $("#formEliminarMultimedia");

                    $("#idmultimedia").remove();
                    $("#rutaMultimedia").remove();
                    let idmult = $("#tr_" + id).data("tipo");
                    let idurl = $("#tr_" + id).data("url");
                    form.append("<input type='hidden' id='idmultimedia' name='idmultimedia'  value='" + idmult +
                        "'>");
                    form.append("<input type='hidden' id='rutaMultimedia' name='rutaMultimedia'  value='" + idurl +
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
                            Swal.fire({
                                type: "success",
                                title: "Eliminado!",
                                text: "El Registro multimedia fue eliminado correctamente.",
                                confirmButtonClass: "btn btn-success"
                            });

                            $("#tr_"+id).remove();
                            if($(".trMultimedia").length<1){
                                $("#divMultimedia").hide();
                            }

                        }
                    });

                },
                evaluaciones:function(id){
                    var rurl = $("#Ruta").val();
                    $(location).attr('href', rurl +
                    "AdminGramaticaLenguaje/GestionarGramatica/evaluaciones/"+id);

                },
                ejemplos:function(id){

                },
                practicas:function(id){

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
    </script>
@endsection
