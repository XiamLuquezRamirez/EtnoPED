@extends('Plantilla.Principal')
@section('title', 'Gestionar Diccionario')
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
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Lista Palabra Diccionario </a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Diccionario</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista Palabra Diccionario</h4>
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
                                        class="feather icon-plus"></i>&nbsp; Agregar Palabra</button>
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
                                        <th>Palabra</th>
                                        <th>Significado</th>
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
        <div class="modal fade text-left" id="modalDiccionario" style="height: 550px; overflow-y: auto;"  tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tituloDiccionario"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form class="form" method="post" id="formGuardar"
                                action="{{ url('/') }}/AdminDiccionario/GuardarDiccionario">
                                <input type="hidden" name="id" id="id" value="" />
                                <input type="hidden" name="audDicc" id="audDicc" value="" />
                                <input type="hidden" name="imgDicc" id="imgDicc" value="" />
                                <ul class="nav nav-tabs nav-linetriangle" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="homeIcon1-tab1" data-toggle="tab"
                                            href="#infBasica" aria-controls="infBasica" role="tab"
                                            aria-selected="true"><i class="fa fa-sort-alpha-asc"></i> Palabra </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="ejemplo-tab1" data-toggle="tab" href="#ejemplo"
                                            aria-controls="multimedia" role="tab" aria-selected="false"><i
                                                class="fa fa-child"></i> Ejemplo</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div class="tab-pane  active in" id="infBasica" aria-labelledby="infBasica-tab1"
                                        role="tabpanel">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="userinput5">Palabra en español:</label>
                                                        <textarea cols="80" id="espanol" name="espanol" rows="10"></textarea>
                                                    </div>

                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="userinput5">Palabra en Wayuunaikin:</label>
                                                        <textarea cols="80" id="wayuu" name="wayuu" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="userinput5">Lectura:</label>
                                                        <textarea cols="80" id="lectura" name="lectura" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="userinput8">Definición:</label>
                                                        <textarea cols="80" id="definicion" name="definicion" rows="10"></textarea>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group" id="cargImg">
                                                        <label for="userinput5">Cargar Imagen: </label>
                                                        <input type="file" name="imgDicc[]"
                                                            onchange="mostrarReproductorVideo(this)"
                                                            accept=".jpg, .jpeg, .png, .gif" id="imgDicc">
                                                    </div>
                                                    <div class="form-group" id="verImg" style="display: none;">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic example">
                                                            <button type="button" onclick="$.verCont(1);"
                                                                class="btn btn-success"><i class="fa fa-search"></i>
                                                                Ver</button>
                                                            <button type="button" onclick="$.cambiaImg();"
                                                                class="btn btn-warning"><i class="fa fa-refresh"></i>
                                                                Cambiar Imagen</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group" id="cargAudio">
                                                        <label for="userinput5">Cargar Audio: </label>
                                                        <input type="file" name="audDicc[]"
                                                            accept=".mp3"
                                                            id="audDicc">
                                                    </div>

                                                    <div class="form-group" id="verAudio" style="display: none;">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic example">
                                                            <button type="button" onclick="$.verCont(2);"
                                                                class="btn btn-success"><i class="fa fa-search"></i>
                                                                Escuchar</button>
                                                            <button type="button" onclick="$.cambiaAudio();"
                                                                class="btn btn-warning"><i class="fa fa-refresh"></i>
                                                                Cambiar Audio</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="ejemplo" aria-labelledby="ejemplo-tab1" role="tabpanel">
                                        <div class="form-group col-12 mb-2 mt-2">
                                            <div id="div-ejemplo">
                                                <div class="row mb-1 border-bottom-cyan">
                                                    <div class="col-12 col-xl-12 pb-1">
                                                        <div class="form-group">
                                                           
                                                            <textarea cols="80" id="ejemploEdit" name="ejemploEdit" rows="10"></textarea>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button id="btnCancelar" type="reset" onclick="$.limpiar()"
                                        class="btn btn-warning mr-1">
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
        <div class="modal fade text-left" id="modalMultimedia" style="overflow-y: auto;" tabindex="-1" role="dialog"
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

    <form action="{{ url('/AdminDiccionario/CargarDiccionario') }}" id="formCargarDiccionario" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

    <form action="{{ url('/AdminDiccionario/BuscarDiccionario') }}" id="formBuscarDiccionario" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminDiccionario/EliminarDiccionario') }}" id="formEliminar" method="POST">
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

        ///////////////////CONFIGURACION EDITOR

        CKEDITOR.editorConfig = function(config) {
            config.toolbarGroups = [{
                    name: 'document',
                    groups: ['mode', 'document', 'doctools']
                },
                {
                    name: 'clipboard',
                    groups: ['clipboard', 'undo']
                },
                {
                    name: 'styles',
                    groups: ['styles']
                },
                {
                    name: 'editing',
                    groups: ['find', 'selection', 'spellchecker', 'editing']
                },
                {
                    name: 'forms',
                    groups: ['forms']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup']
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
                },
                {
                    name: 'links',
                    groups: ['links']
                },
                {
                    name: 'insert',
                    groups: ['insert']
                },
                {
                    name: 'colors',
                    groups: ['colors']
                },
                {
                    name: 'tools',
                    groups: ['tools']
                },
                {
                    name: 'others',
                    groups: ['others']
                },
                {
                    name: 'about',
                    groups: ['about']
                }
            ];

            config.removeButtons =
                'Source,Save,NewPage,ExportPdf,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Replace,Find,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,SelectAll,Button,ImageButton,HiddenField,Strike,CopyFormatting,RemoveFormat,Indent,Blockquote,Outdent,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,BGColor,ShowBlocks,About,Underline,Italic';
        };

        var audio_player = new Plyr("#plyr-audio-player");
        let consEjemplo;

        $(document).ready(function() {
            $("#GestionDiccionario").addClass("active");

            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });

            $.extend({
                cargar: function(page, searchTerm = '') {
                    var form = $("#formCargarDiccionario");
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
                                .diccionario); // Rellenamos la tabla con las filas generadas
                            $('#pagination-links').html(response
                                .links); // Colocamos los enlaces de paginación
                        }
                    });
                },
                nueva: function() {
                    $("#modalDiccionario").modal({
                        backdrop: 'static',
                        keyboard: false
                    }).show();
                    $("#tituloDiccionario").html("Gestionar Palabra Diccionario");
                    $("#accion").val("agregar");
                    document.getElementById("formGuardar").reset();
                    $("#btnGuardar").show();
                    $("#btnCancelar").show();
                    $("#btnNuevo").hide();
                                     
                    $.limpiar();
                },
                limpiar: function() {
                    var form = document.getElementById("formGuardar");
                    form.reset();
                    editorEspanol.setData('<p></p>');
                    editorWayuu.setData('<p></p>');
                    editorLectura.setData('<p></p>');
                    editorDefinic.setData('<p>Ingresa la Definicion Aquí</p>');
                    editorEjemplo.setData('');

                    $("#btnGuardar").show();
                    $("#btnCancelar").show();
                    $("#btnNuevo").hide();

                    $("#audDicc").val("");
                    $("#imgDicc").val("");

                    $("#verImg").hide();
                    $("#cargImg").show();

                    $("#verAudio").hide();
                    $("#cargAudio").show();
                },
                guardar: function() {

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    if (editorEspanol.getData() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar la palabra en español...",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }
                    if (editorWayuu.getData() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar la palabra en wayuunaikin...",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }
                    if (editorDefinic.getData() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar la definición de la palabra...",
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
                verVideo: function() {

                    let url = $('#urlMult').data("ruta") +
                        "/contenidoMultimedia/PreparacionMedicinaTradicional/" + $("#VideoPrepa")
                        .val();

                    $('#modalMedicina').modal('hide');
                    $("#modalMultimediaTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    }).show();

                    // Función para abrir el modal y cargar el contenido según el tipo
                    var modalContent = document.getElementById('modalContent');
                    modalContent.innerHTML =
                        '<video style="width: 100%; height:360px;"  controls><source  src="' + url +
                        '" type="video/mp4"></video>';


                },
                editar: function(id) {

                    $("#modalDiccionario").modal().show();
                    $("#accion").val("editar");

                    $("#tituloTematica").html("Editar Medicina Tradicional");
                    $("#btnGuardar").show();
                    $("#btnNuevo").hide();
                    $("#btnCancelar").hide();

                    $("#id").val(id);
                    var accion = $("#accion").val();

                    var form = $("#formBuscarDiccionario");

                    $("#idDicc").remove();
                    form.append("<input type='hidden' id='idDicc' name='idDicc'  value='" + id +
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
                            editorEspanol.setData(respuesta.diccionario.palabra_espanol);
                            editorWayuu.setData(respuesta.diccionario.palabra_wuayuunaiki);
                            editorLectura.setData(respuesta.diccionario.palabra_lectura);
                            editorDefinic.setData(respuesta.diccionario.definicion);
                            editorEjemplo.setData(respuesta.diccionario.ejemplo);
                       
                            $("#imgDicc").val(respuesta.diccionario.imagen);
                            $("#audDicc").val(respuesta.diccionario.audio);
                          
                            if (respuesta.diccionario.imagen != "") {
                                $("#verImg").show();
                                $("#cargImg").hide();
                            }
                            if (respuesta.diccionario.audio != "") {
                                $("#verAudio").show();
                                $("#cargAudio").hide();
                            }
                        }
                    });

                    $("#trMultimedia").html(multimedia);
                    $("#trEjemplos").html(ejemplos);
                },

                cambiaImg: function() {
                    $("#verImg").hide();
                    $("#cargImg").show();
                },
                cambiaAudio: function() {
                    $("#verAudio").hide();
                    $("#cargAudio").show();
                },
                cerrarMultimedia: function() {
                    $("#modalDiccionario").modal({
                        backdrop: 'static',
                        keyboard: false
                    }).show();
                    $('#modalMultimedia').modal('hide');
                },
                verCont: function(op) {
                    $("#modalMultimedia").modal({
                        backdrop: 'static',
                        keyboard: false
                    }).show();

                    $('#modalDiccionario').modal('hide');
                    let url ="";
                    var modalContent = document.getElementById('modalContent');

                    if(op==1){
                         url = $('#urlMult').data("ruta") + "/contenidoMultimedia/imgDiccionario/" + $(
                            "#imgDicc").val();
                            modalContent.innerHTML = '<img width="100%" src="' + url + '" alt="Imagen">';

                    }else{
                        url = $('#urlMult').data("ruta") + "/contenidoMultimedia/audioDiccionario/" + $(
                            "#audDicc").val();
                            modalContent.innerHTML = '<audio  id="audioDicc" style="width:100%" controls>' +
                            '    <source src="" type="audio/mp3" />' +
                            '    <source src="" type="audio/ogg" />' +
                            '</audio>';

                        let audio = document.getElementById('audioDicc');
                        audio.src = url;
                    }



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

                    $("#idDicc").remove();
                    form.append("<input type='hidden' id='idDicc' name='idDicc'  value='" + id + "'>");

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
                inicialEditDef: function() {
                    CKEDITOR.replace('definicion', {
                        width: '100%',
                        height: 150
                    });
                },
                inicialEditEsp: function() {
                    CKEDITOR.replace('espanol', {
                        removePlugins: 'toolbar,dialogui', // Quitar todas las herramientas
                        toolbar: [],
                        width: '100%',
                        height: 50
                    });

                },
                inicialEditWay: function() {
                    CKEDITOR.replace('wayuu', {
                        removePlugins: 'toolbar,dialogui', // Quitar todas las herramientas
                        toolbar: [],
                        width: '100%',
                        height: 50
                    });

                },
                inicialEditLec: function() {
                    CKEDITOR.replace('lectura', {
                        removePlugins: 'toolbar,dialogui', // Quitar todas las herramientas
                        toolbar: [],
                        width: '100%',
                        height: 50
                    });
                },
                inicialEditEje: function() {
                    CKEDITOR.replace('ejemploEdit', {
                        width: '100%',
                        height: 150
                    });
                },
            });
            $.inicialEditEsp();
            $.inicialEditWay();
            $.inicialEditLec();
            $.inicialEditDef();
            $.inicialEditEje();
            $.cargar(1);

            var editorEspanol = CKEDITOR.instances.espanol;
            var editorWayuu = CKEDITOR.instances.wayuu;
            var editorLectura = CKEDITOR.instances.lectura;
            var editorDefinic = CKEDITOR.instances.definicion;
            var editorEjemplo = CKEDITOR.instances.ejemploEdit;

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
