@extends('Plantilla.Principal')
@section('title', 'Gestionar Practicas')
@section('Contenido')




    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Lista de Practicas</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Practicas - {{ $tema }}</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Practicas</h4>
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
                            <div class="col-6">
                                <div class="form-group">
                                    <!-- basic buttons -->
                                    <button onclick="$.nueva();" id="addRow" class="btn btn-primary mb-2 ml-1"><i
                                            class="feather icon-plus"></i>&nbsp; Agregar Evaluación</button>
                                    <button type="button" id="btnGuardar" onclick="javascript:history.back();"
                                        class="btn btn-success mb-2 ml-1">
                                        <i class="fa fa-reply"></i> Atras
                                    </button>
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="position-relative">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Busqueda...">
                                    <div class="form-control-position">
                                        <i class="fa fa-search text-size-base text-muted"></i>
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
        <form class="form" method="POST" id="formAsigEval"
            action="{{ url('/AdminGramaticaLenguaje/guardarEvaluacion') }}">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="Id_Eval" id="Id_Eval" value="">
            <input type="hidden" name="tema_id" id="tema_id" value="{{ $id }}">
            <input type="hidden" class="form-control" id="ConsPreguntas" value="1" />

            {{--  Modal nueva evaluacion  --}}
            <div class="modal fade text-left" style="position: fixed;" id="modalEvaluacion" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="tituloEvaluacion">Crear Practica</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card-text">
                                                <dl class="row">
                                                    <dt class="col-sm-2">Tema:</dt>
                                                    <dd class="col-sm-10">{{ $unidad }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-text">
                                                <dl class="row">
                                                    <dt class="col-sm-2">Unidad:</dt>
                                                    <dd class="col-sm-10">{{ $tema }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Datos de Practica</h5>
                                                              
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="tab-content px-1 pt-1">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label for="userinput5">Título:</label>
                                                                    <input class="form-control border-primary"
                                                                        type="text" name="titulo"
                                                                        placeholder="Título" id="titulo">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="userinput8">Enunciado:</label>
                                                                    <textarea cols="80" id="enunciado" name="enunciado" rows="10"></textarea>

                                                                    <br>
                                                                </div>

                                                            </div>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-actions right">
                                    <button type="button" onclick="$.salirModalEval();" class="btn btn-warning mr-1">
                                        <i class="fa fa-reply"></i> Salir
                                    </button>
                                    <button type="button" id="btnGuardar" onclick="$.GuardarEval()"
                                        class="btn btn-success">
                                        <i class="fa fa-check-square-o"></i> Guardar y Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
         </form>
    </div>

    </div>

    <form action="{{ url('/AdminGramaticaLenguaje/CargarPracticas') }}" id="formCargarPracticas" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

  


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#Princioal").removeClass("active");
            $("#MenuGramatica").addClass("has-sub open");
            $("#MenuGramaticaTematica").addClass("active");

            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });

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

            $.extend({
                cargar: function(page, searchTerm = '') {
                    var form = $("#formCargarPracticas");
                    var url = form.attr("action");
                    var idTema = $("#tema_id").val();
                    $('#page').remove();
                    $('#idTema').remove();
                    $('#searchTerm').remove();
                    form.append("<input type='hidden' id='page' name='page'  value='" + page +
                        "'>");
                    form.append("<input type='hidden' id='idTema' name='idTema'  value='" + idTema +
                        "'>");
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
                                .unidades); // Rellenamos la tabla con las filas generadas
                            $('#pagination-links').html(response
                                .links); // Colocamos los enlaces de paginación
                        }
                    });
                },
                nueva: function() {
                    $("#modalEvaluacion").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#Id_Eval").val("");
                    $("#ConsPreguntas").val(1);
                    $("#tituloEvaluacion").html("Crear Practica");
                    $("#titulo").val("");
                    $("#Punt_Max").val("0");


                    editorEnun.setData('<p>Ingresa el contenido Aquí</p>');


                    $("#div-evaluaciones").html("");

                },
                guardar: function() {

                    if ($("#nombre").val().trim() == "") {
                        Swal.fire({
                            title: " Alerta!",
                            text: " Debe de ingresar el nombre!",
                            type: "warning",
                            confirmButtonClass: "btn btn-warning",
                            buttonsStyling: false
                        });


                        return;
                    }

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

                    $("#modalEvaluacion").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#div-evaluaciones").html("");

                    $("#tituloEvaluacion").html("Editar Evaluación");

                    $("#Id_Eval").val(id);
                    var form = $("#formAuxiliarEvalDet");
                    $("#idAsig").remove();
                    form.append("<input type='hidden' name='ideva' id='ideva' value='" + id + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                          
                            
                        }
                    });

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
                    var form = $("#formEliminarEvaluacion");

                    $("#idEval").remove();
                    form.append("<input type='hidden' id='idEval' name='idEval'  value='" + id +
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
                            if (respuesta.opc == "NT") {
                                Swal.fire({
                                    title: "Gestionar Evaluaciones",
                                    text: respuesta.mensaje,
                                    icon: respuesta.icon,
                                    type: "success",
                                    button: "Aceptar"
                                });

                                if (respuesta.estado === "ELIMINADO") {
                                    $.cargar();
                                }
                            } else if (respuesta.opc == "VU") {
                                Swal.fire({
                                    title: "Gestionar Evaluaciones",
                                    text: respuesta.mensaje,
                                    icon: respuesta.icon,
                                    type: "warning",
                                    button: "Aceptar"
                                });
                            }
                        }
                    });

                },
                inicialEditorEnunciado: function() {
                    CKEDITOR.replace('enunciado', {
                        width: '100%',
                        height: 100
                    });

                },

            });
            $.inicialEditorEnunciado();
            $.cargar(1);
            var editorEnun = CKEDITOR.instances.enunciado;


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
