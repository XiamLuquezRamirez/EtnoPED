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
                                            class="feather icon-plus"></i>&nbsp; Agregar Practica</button>
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
            action="{{ url('/AdminGramaticaLenguaje/guardarPractica') }}">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="Id_Eval" id="Id_Eval" value="">
            <input type="hidden" name="tema_id" id="tema_id" value="{{ $id }}">
            <input type="hidden" class="form-control" id="ConsPreguntas" value="1" />
            <input type="hidden" class="form-control" name="IdpreguntaMul" id="IdpreguntaMul" value="" />
            <input type="hidden" class="form-control" id="RutEvalVideo" value="{{ url('/') }}/" />

            {{--  Modal nueva evaluacion  --}}
            
            <div class="modal fade text-left" style="position: fixed;" id="modalEvaluacion" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
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
                                                    <dt class="col-sm-3">Unidad:</dt>
                                                    <dd class="col-sm-9">{{ $tema }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Datos de Practica</h5>

                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content px-1 pt-1">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label for="userinput5">Título:</label>
                                                            <input class="form-control border-primary" type="text"
                                                                name="titulo" placeholder="Título" id="titulo">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="userinput8">Objetivo:</label>
                                                            <textarea cols="80" id="objetivo" name="objetivo" rows="10"></textarea>

                                                            <br>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-1">
                                                        <h4>Listado Preguntas y Respuestas</h4>
                                                        <p>En este espacio podra agregar preguntas y respuestas para poner
                                                            en practica la gramatica y Vocabulario </p>
                                                    </div>
                                                </div>
                                                <div id="div-practicas">

                                                </div>

                                                <button type="button" id="btn-agregar" onclick="$.addPregunta();"
                                                    class="btn btn-primary mt-2">
                                                    <i class="fa fa-plus"></i> Agregar pregunta
                                                </button>


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
    <form action="{{ url('/AdminGramaticaLenguaje/consulPractPreg') }}" id="formAuxiliarEval" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/CargarPractica') }}" id="formAuxiliarPractDet" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/EliminarPregPract') }}" id="formAuxiliar" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

    <form action="{{ url('/AdminGramaticaLenguaje/EliminarPractica') }}" id="formEliminarEvaluacion" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>



@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#Principal").removeClass("active");
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

                    editorEnun.setData('<p>Ingresa el objetivo Aquí</p>');

                    $("#div-practicas").html("");

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
                    $("#div-practicas").html("");
                    $("#btn-agregar").show();
                    $("#tituloEvaluacion").html("Editar Practica");

                    $("#Id_Eval").val(id);
                    var form = $("#formAuxiliarPractDet");
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
                            var cons = 1;
                            $("#MensInf").hide();

                            $("#titulo").val(respuesta.Evaluacion.titulo);
                            editorEnun.setData(respuesta.Evaluacion.objetivo);
                            $.each(respuesta.PregMult, function(i, item) {
                               
                                    var Preguntas = '<div id="Preguntas' + cons +
                                        '" style="padding-bottom: 10px;">' +
                                        ' <div class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">' +
                                        '         <div class="row">' +
                                        '            <div class="col-md-8">' +
                                        '             <div class="form-group row">' +
                                        '             <div class="col-md-12">' +
                                        '     <h4 class="primary">Pregunta  ' +
                                        cons + '</h4>' +
                                        '            </div>' +
                                        '           </div>' +
                                        '         </div>' +
                                        '         <div class="col-md-4">' +
                                        '           <div class="form-group row">' +
                                        '<input type="hidden" id="id-preopcmult' +
                                        cons +
                                        '" name="id-preopcmult" value="" />' +
                                        '<input type="hidden" id="Tipreguntas' +
                                        cons +
                                        '"  value="OPCMULT" />' +
                                        '            <div class="col-md-12 right">' +
                                        '<div id="PuntMultiple' + cons + '">' +
                                        '    <fieldset >' +
                                        '        <div class="input-group">' +
                                        '          <input type="text" class="form-control" id="puntaje"' +
                                        '    name="puntaje" value="10" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                        '          <div class="input-group-append">' +
                                        '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                        '          </div>' +
                                        '        </div>' +
                                        '      </fieldset>' +
                                        '</div>' +
                                        '            </div>' +
                                        '          </div>' +
                                        '        </div>' +
                                        '      </div>' +
                                        '  <div class="col-md-12"> ' +
                                        '     <div class="form-group">' +
                                        '        <label class="form-label"><b>Ingrese la Pregunta:</b></label>' +
                                        '<div id="PreguntaMultiple' + cons + '">' +
                                        '     <textarea cols="80" id="PreMulResp1" name="PreMulResp" rows="3"></textarea>' +
                                        '</div>' +
                                        '</div>' +
                                        '      </div>' +
                                        '  <div class="col-md-12"> ' +
                                        '     <div class="form-group">' +
                                        '        <label class="form-label"><b>Ingrese las Opciones:</b></label>' +
                                        '<div id="DivOpcionesMultiples' + cons +
                                        '">' +
                                        '<input type="hidden" class="form-control" id="ConsOpcMul" value="2" />' +
                                        '<div id="RowMulPreg1">' +
                                        '                 <div class="row top-buffer" id="RowOpcPreg1" style="padding-bottom: 15px;">' +
                                        '                      <div class="col-lg-11">' +
                                        '                            <div class="input-group" style="padding-bottom: 10px;">' +
                                        '                            <div class="input-group-prepend" style="width: 100%;">' +
                                        '                              <div class="input-group-text">' +
                                        '                             <input aria-label="Checkbox for following text input" id="checkopcpreg11"' +
                                        '                              name="RadioOpcPre[]" onclick="$.selCheck(1);" value="off"' +
                                        '                            type="radio">' +
                                        '                        <input type="hidden" id="OpcCorecta1" name="OpcCorecta[]" value="no" />' +
                                        '                      </div>' +
                                        '                     <textarea cols="80" id="txtopcpreg1" name="txtopcpreg[]"' +
                                        '                        rows="3"></textarea>' +
                                        '                </div>' +
                                        '           <!--<input class="form-control" placeholder="Opción 1" aria-label="Text input with radio button" name="txtopcpreg1[]" type="text">-->' +
                                        '          </div>' +
                                        '     </div>' +
                                        '     <div class="col-lg-1">' +
                                        '         <!--<button type="button" class="btn btn-icon btn-outline-warning btn-social-icon btn-sm"><i class="fa fa-trash"></i></button>-->' +
                                        '      </div>' +
                                        '      </div>' +
                                        '   </div>' +
                                        '   <div class="row">' +
                                        '  <button id="AddOpcPre" onclick="$.AddOpcion();" type="button" class="btn mr-1 mb-1 btn-success"><i class="fa fa-plus"></i> Agregar Opcion</button> ' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '      </div>' +
                                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                                        '    <button type="button" onclick="$.GuardarEvalOpcMult(' +
                                        cons +
                                        ');" id="Btn-guardarPreg' + cons +
                                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                                        '    <button type="button" id="Btn-EditPreg' +
                                        cons +
                                        '"  style="display:none;" onclick="$.EditPreguntasOpcMult(' +
                                        cons +
                                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                                        '    <button type="button" id="btnDel' +
                                        cons + '" data-id="' + cons +
                                        '" data-nombre="id-preopcmult' + cons +
                                        '" onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                                        '</div>' +
                                        '   </div>' +
                                        '</div>';
                                    $("#div-practicas").append(Preguntas);
                                    var opciones = '';
                                    $.each(respuesta.PregMult, function(x, itemp) {
                                        if ($.trim(item.id) === $.trim(itemp.id)) {

                                            $('#Btn-guardarPreg' + cons)
                                                .prop('disabled', false);


                                            $("#Btn-guardarPreg" + cons)
                                                .hide();
                                            $("#Btn-EditPreg" + cons)
                                                .show();
                                            $("#div-addpreg").show();

                                            $("#id-preopcmult" +cons).val(itemp.id);

                                            $("#PreguntaMultiple" +cons).html(itemp.pregunta);

                                            $.each(respuesta.OpciMult,function(k, itemo) {

                                                    if ($.trim(itemo.preg_practica) === $.trim(itemp.id)) {
                                                        opciones +='<fieldset>';
                                                        if (itemo.correcta ==="si") {
                                                            opciones +='<input type="checkbox" disabled id="input-15" checked>';
                                                        } else {
                                                            opciones += '<input type="checkbox" disabled id="input-15">';
                                                        }

                                                        opciones +=' <label for="input-15"> ' + itemo.respuesta + '</label>' +
                                                            '</fieldset>';
                                                    }

                                                });

                                            $("#DivOpcionesMultiples" +
                                                cons).html(opciones);
                                        }


                                    });

                                    cons++;
                                    edit = "si";

                                $("#ConsPreguntas").val(cons);

                            });
                        }
                    });

                },
                salirModalEval: function() {
                    $('#modalEvaluacion').modal('toggle');
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
                addPregunta: function() {

                    edit = "no";
                    var cons = parseFloat($("#ConsPreguntas").val());


                    var Preguntas = '<div id="Preguntas' + cons + '" style="padding-bottom: 10px;">' +
                        ' <div class="bs-callout-primary callout-bordered callout-transparent p-1">' +
                        '         <div class="row">' +
                        '            <div class="col-md-8">' +
                        '             <div class="form-group row">' +
                        '             <div class="col-md-12">' +
                        '     <h4 class="primary">Pregunta  ' + cons + '</h4>' +
                        '            </div>' +
                        '           </div>' +
                        '         </div>' +
                        '         <div class="col-md-4">' +
                        '           <div class="form-group row">' +
                        '<input type="hidden" id="id-preopcmult' + cons +
                        '"  value="" />' +
                        '<input type="hidden" id="Tipreguntas' + cons +
                        '"  value="OPCMULT" />' +
                        '          </div>' +
                        '        </div>' +
                        '      </div>' +
                        '  <div class="col-md-12"> ' +
                        '     <div class="form-group">' +
                        '        <label class="form-label"><b>Ingrese la Pregunta:</b></label>' +
                        '<div id="PreguntaMultiple' + cons + '">' +
                        '     <textarea cols="80" id="PreMulResp1" name="PreMulResp" rows="3"></textarea>' +
                        '</div>' +
                        '</div>' +
                        '      </div>' +
                        '  <div class="col-md-12"> ' +
                        '     <div class="form-group">' +
                        '        <label class="form-label"><b>Ingrese las Opciones de respuesta:</b></label>' +
                        '<div id="DivOpcionesMultiples' + cons + '">' +
                        '<input type="hidden" class="form-control" id="ConsOpcMul" value="2" />' +
                        '<div id="RowMulPreg1">' +
                        '                 <div class="row top-buffer" id="RowOpcPreg1" style="padding-bottom: 15px;">' +
                        '                      <div class="col-lg-11">' +
                        '                            <div class="input-group" style="padding-bottom: 10px;">' +
                        '                            <div class="input-group-prepend" style="width: 100%;">' +
                        '                              <div class="input-group-text">' +
                        '                             <input aria-label="Checkbox for following text input" id="checkopcpreg11"' +
                        '                              name="RadioOpcPre[]" onclick="$.selCheck(1);" value="off"' +
                        '                            type="radio">' +
                        '                        <input type="hidden" id="OpcCorecta1" name="OpcCorecta[]" value="no" />' +
                        '                      </div>' +
                        '                     <textarea cols="80" id="txtopcpreg1" name="txtopcpreg[]"' +
                        '                        rows="3"></textarea>' +
                        '                </div>' +
                        '           <!--<input class="form-control" placeholder="Opción 1" aria-label="Text input with radio button" name="txtopcpreg1[]" type="text">-->' +
                        '          </div>' +
                        '     </div>' +
                        '     <div class="col-lg-1">' +
                        '         <!--<button type="button" class="btn btn-icon btn-outline-warning btn-social-icon btn-sm"><i class="fa fa-trash"></i></button>-->' +
                        '      </div>' +
                        '      </div>' +
                        '   </div>' +
                        '   <div class="row">' +
                        '  <button id="AddOpcPre" onclick="$.AddOpcion();" type="button" class="btn mr-1 mb-1 btn-success"><i class="fa fa-plus"></i> Agregar Opcion</button> ' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '      </div>' +
                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                        '    <button type="button" onclick="$.GuardarEvalOpcMult(' + cons +
                        ');" id="Btn-guardarPreg' + cons +
                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                        '    <button type="button" id="Btn-EditPreg' + cons +
                        '"  style="display:none;" onclick="$.EditPreguntasOpcMult(' + cons +
                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                        '    <button type="button" id="btnDel' + cons + '" data-id="' + cons +
                        '" data-nombre="id-preopcmult' + cons +
                        '"  onclick="$.DelPregunta(this.id)" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                        '</div>' +
                        '   </div>' +
                        '</div>';

                    $("#div-practicas").append(Preguntas);

                    $.inicialEditorPreMul("1");
                    $.inicialEditorPreOpcMul("1");
                    cons++;
                    $("#ConsPreguntas").val(cons);
                    $("#btns_guardar").show();
                    $("#btn-agregar").hide();

                },
                GuardarEvalOpcMult: function(id) {
                   
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }
                 
                    $("#IdpreguntaMul").val($("#id-preopcmult" + id).val());
                    $("#PregConse").val(id);

                    let flag = "no";
                    $("input[name='OpcCorecta[]']").each(function(indice, elemento) {
                        if ($(elemento).val() == "si") {
                            flag = "si";
                        }
                    });
                    if (flag === "no") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de seleccionar la respuesta correcta",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }

                    $('#Btn-guardarPreg' + id).prop('disabled', true);
                  
                    var form = $("#formAsigEval");
                    var datos = form.serialize();
                    var url = form.attr("action");

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        success: function(respuesta) {
                            if (respuesta) {
                                $("#Id_Eval").val(respuesta.idEval);
                                Swal.fire({
                                    type: "success",
                                    title: "",
                                    text: "Operación realizada exitosamente",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });

                                $('#Btn-guardarPreg' + id).prop('disabled', false);

                                $("#Btn-guardarPreg" + id).hide();
                                $("#Btn-EditPreg" + id).show();
                                $("#div-addpreg").show();

                                $("#id-preopcmult" + id).val(respuesta.PregOpcMul.id);

                                $("#PreguntaMultiple" + id).html(respuesta.PregOpcMul
                                    .pregunta);
                                var opciones = '';

                                $.each(respuesta.OpciPregMul, function(k, item) {
                                    opciones += '<fieldset>';
                                    if (item.correcta === "si") {
                                        opciones +=
                                            '<input type="checkbox" disabled id="input-15" checked>';
                                    } else {
                                        opciones +=
                                            '<input type="checkbox" disabled id="input-15">';
                                    }

                                    opciones += ' <label for="input-15"> ' + item
                                        .respuesta + '</label>' +
                                        '</fieldset>';

                                });


                                $("#DivOpcionesMultiples" + id).html(opciones);


                                edit = "si";
                            } else {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "La Practica no pude ser guardada",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                            }
                        },
                        error: function(error_messages) {
                            Swal.fire({
                                type: "warning",
                                title: "Oops...",
                                text: "Ha ocurrido un error",
                                confirmButtonClass: "btn btn-primary",
                                timer: 1500,
                                buttonsStyling: false
                            });
                        }
                    });

                    $("#btn-agregar").show();


                },
                EditPreguntasOpcMult: function(cons) {
                    if (edit === "si") {
                        $("#btn-agregar").hide();
                        var form = $("#formAuxiliarEval");
                        var id = $("#id-preopcmult" + cons).val();

                        var opci = "";
                        var parr = "";
                        var punt = "";

                        $("#Pregunta").remove();
                        $("#TipPregunta").remove();
                        form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                            id + "'>");
                      
                        var url = form.attr("action");
                        var datos = form.serialize();
                        var j = 1;
                        var Preguntas = "";
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: datos,
                            async: false,
                            dataType: "json",
                            success: function(respuesta) {
                                let puntPre = respuesta.PregMult.puntuacion;
                                let puntmax = $("#Punt_Max").val();
                                let total = parseInt(puntmax) - parseInt(puntPre);
                                $("#Punt_Max").val(total);

                                Preguntas = '<div id="Preguntas' + cons +
                                    '" style="padding-bottom: 10px;">' +
                                    ' <div class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">' +
                                    '         <div class="row">' +
                                    '            <div class="col-md-8">' +
                                    '             <div class="form-group row">' +
                                    '             <div class="col-md-12">' +
                                    '     <h4 class="primary">Pregunta  ' + cons + '</h4>' +
                                    '            </div>' +
                                    '           </div>' +
                                    '         </div>' +
                                    '         <div class="col-md-4">' +
                                    '           <div class="form-group row">' +
                                    '<input type="hidden" id="id-preopcmult' + cons +
                                    '"  value="' + id + '" />' +
                                    '<input type="hidden" id="Tipreguntas' + cons +
                                    '"  value="OPCMULT" />' +
                                    '            <div class="col-md-12 right">' +
                                    '<div id="PuntMultiple' + cons + '">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">' +
                                    '          <input type="text" class="form-control" id="puntaje"' +
                                    '    name="puntaje" value="' + puntPre +
                                    '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                    '          <div class="input-group-append">' +
                                    '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '            </div>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </div>' +
                                    '  <div class="col-md-12"> ' +
                                    '     <div class="form-group">' +
                                    '        <label class="form-label"><b>Ingrese la Pregunta:</b></label>' +
                                    '<div id="PreguntaMultiple' + cons + '">' +
                                    '     <textarea cols="80" id="PreMulResp1" name="PreMulResp" rows="3"></textarea>' +
                                    '</div>' +
                                    '</div>' +
                                    '      </div>' +
                                    '  <div class="col-md-12"> ' +
                                    '     <div class="form-group">' +
                                    '        <label class="form-label"><b>Ingrese las Opciones:</b></label>' +
                                    '<input type="hidden" class="form-control" id="ConsOpcMul" value="2" />' +
                                    '<div id="DivOpcionesMultiples' + cons +
                                    '"><div id="RowMulPreg1">';
                                var x = 1;
                                $.each(respuesta.OpciMult, function(k, item) {
                                    Preguntas +=
                                        '<div class="row top-buffer" id="RowOpcPreg1' +
                                        x + '" style="padding-bottom: 15px;">' +
                                        '                      <div class="col-lg-11">' +
                                        '                            <div class="input-group" style="padding-bottom: 10px;">' +
                                        '                            <div class="input-group-prepend" style="width: 100%;">' +
                                        '                              <div class="input-group-text">';
                                    if (item.correcta === "no") {
                                        Preguntas +=
                                            '<input aria-label="Checkbox for following text input" id="checkopcpreg1' +
                                            x + '"' +
                                            '                              name="RadioOpcPre[]" onclick="$.selCheck( ' +
                                            x + ');" value="off"' +
                                            '                            type="radio">';
                                    } else {
                                        Preguntas +=
                                            '<input aria-label="Checkbox for following text input" checked id="checkopcpreg1' +
                                            x + '"' +
                                            '                              name="RadioOpcPre[]" onclick="$.selCheck( ' +
                                            x + ');" value="off"' +
                                            '                            type="radio">';
                                    }

                                    Preguntas +=
                                        '<input type="hidden" id="OpcCorecta' + x +
                                        '" name="OpcCorecta[]" value="' +
                                        item.correcta + '" />' +
                                        '                      </div>' +
                                        '                     <textarea cols="80" id="txtopcpreg' +
                                        x + '" name="txtopcpreg[]"' +
                                        '                        rows="3"></textarea>' +
                                        '                </div>' +
                                        '          </div>' +
                                        '     </div>' +
                                        '     <div class="col-lg-1">';
                                    if (x > 1) {
                                        Preguntas +=
                                            ' <button type="button" onclick="$.DelOpcPreg(' +
                                            x +
                                            ')" class="btn btn-icon btn-outline-warning btn-social-icon btn-sm"><i class="fa fa-trash"></i></button>';

                                    }
                                    Preguntas += '       </div>' +
                                        '      </div>';
                                    x++;
                                });

                                Preguntas +=
                                    '<input type="hidden" class="form-control" id="ConsOpcMu' +
                                    cons + '" value="' +
                                    x + '" /></div>  <div class="row">' +
                                    '  <button id="AddOpcPre" onclick="$.AddOpcion(1);" type="button" class="btn mr-1 mb-1 btn-success"><i class="fa fa-plus"></i> Agregar Opcion</button> ' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '      </div>' +
                                    '<div class="form-group"  style="margin-bottom: 0px;">' +
                                    '    <button type="button" onclick="$.GuardarEvalOpcMult(' +
                                    cons +
                                    ');" id="Btn-guardarPreg' + cons +
                                    '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                                    '    <button type="button" id="Btn-EditPreg' + cons +
                                    '"  style="display:none;" onclick="$.EditPreguntasOpcMult(' +
                                    cons +
                                    ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                                    '    <button type="button" id="btnDel' + cons +
                                    '" data-id="' + cons + '" data-nombre="id-preopcmult' +
                                    cons +
                                    '" onclick="$.DelPregunta(this.id)" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                                    '</div>' +
                                    '   </div>' +
                                    '</div>';

                                $("#Preguntas" + cons).html(Preguntas);
                                $.inicialEditorPreMul("1");




                                $('#PreMulResp1').val(respuesta.PregMult.pregunta);
                                var j = 1;
                                var y = 1;
                                $.each(respuesta.OpciMult, function(k, item) {

                                    $.inicialEditorPreOpcMul(y);
                                    $('#txtopcpreg' + y)
                                        .val(item.respuesta);

                                    y++;

                                });
                                $("#ConsOpcMul").val(y);

                            }
                        });

                        edit = "no"
                    } else {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debe Guardar la Pregunta antes de editar otra.",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1800,
                            buttonsStyling: false
                        });
                    }
                },

                DelPregunta: function(id_fila) {
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
                            $.procederEliminarPregunta(id_fila);
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
                procederEliminarPregunta: function(id_fila) {
                    edit = "si";
                    let regDel = $("#" + id_fila).data("nombre");
                    let idPreg = $("#" + id_fila).data("id");


                    if ($("#" + regDel).val() !== "") {
                        var preg = $("#" + regDel).val();
                    
                        var IdEval = $("#Id_Eval").val();
                        var form = $("#formAuxiliar");
                        $("#idAuxiliar").remove();
                    
                        $("#ideval").remove();
                        form.append("<input type='hidden' name='id' id='idAuxiliar' value='" + preg +
                            "'>");
                        form.append("<input type='hidden' name='ideval' id='ideval' value='" + IdEval +
                            "'>");
                        var url = form.attr("action");
                        var datos = form.serialize();

                        $.ajax({
                            type: "post",
                            url: url,
                            data: datos,
                            success: function(respuesta) {

                                Swal.fire({
                                    type: "success",
                                    title: "",
                                    text: "Operación realizada exitosamente",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });

                                let puntPre = $("#PuntEdit" + idPreg).val();
                                let puntmax = $("#Punt_Max").val();
                                let total = parseInt(puntmax) - parseInt(puntPre);

                                $("#Punt_Max").val(total);

                                $('#Preguntas' + idPreg).remove();
                                ConsPreg = $('#ConsPreguntas').val() - 1;
                                $("#ConsPreguntas").val(ConsPreg);
                                $("#btn-agregar").show();
                                $("#btns_guardar").hide();

                              
                            },
                            error: function() {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "La pregunta no puso ser Eliminada",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                            }
                        });


                    } else {
                        $('#Preguntas' + idPreg).remove();
                        ConsPreg = $('#ConsPreguntas').val() - 1;
                        $("#ConsPreguntas").val(ConsPreg);
                        $("#btn-agregar").show();
                        $("#btns_guardar").hide();
                       
                    }
                },
                GuardarEval: function(id) {

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    var form = $("#formAsigEval");
                    var url = form.attr("action");

                    var rurl = $("#RutEvalVideo").val();
                    if ($("#ConsPreguntas").val() <= 1) {
                        mensaje = "No existe Ninguna Pregunta en la Practica";
                        Swal.fire({
                            title: "Warning!",
                            text: mensaje,

                            type: "warning",
                            confirmButtonClass: "btn btn-warning",
                            buttonsStyling: false
                        });
                        return;
                    }


                    if ($("#titulo").val() === "") {
                        mensaje = "Ingrese el Título";
                        Swal.fire({
                            title: "Warning!",
                            text: mensaje,
                            type: "warning",
                            confirmButtonClass: "btn btn-warning",
                            buttonsStyling: false
                        });
                        return;
                    }

                    if (edit === "no") {
                        mensaje = "Existe una pregunta sin Guardar, Verifique...";
                        Swal.fire({
                            title: "Alerta!",
                            text: mensaje,
                            type: "warning",
                            confirmButtonClass: "btn btn-warning",
                            buttonsStyling: false
                        });
                        return;
                    }

                    $.ajax({
                        type: "POST",
                        url: rurl + "AdminGramaticaLenguaje/GuardarPractFin",
                        data: new FormData($('#formAsigEval')[0]),
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            if (respuesta) {
                                $("#Id_Eval").val(respuesta.idEval);
                                Swal.fire({
                                    type: "success",
                                    title: "",
                                    text: "Operación realizada exitosamente",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });

                                $.cargar(1);
                                $('#modalEvaluacion').modal('toggle');
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "La Operación no pudo ser realizada!",
                                    type: "error",
                                    confirmButtonClass: "btn btn-danger",
                                    buttonsStyling: false
                                });
                            }
                        },
                        error: function(error_messages) {

                            Swal.fire({
                                title: "Error!",
                                text: " Ha ocurrido un error en el proceso!",
                                type: "error",
                                confirmButtonClass: "btn btn-danger",
                                buttonsStyling: false
                            });
                        }
                    });


                },
                AddOpcion: function(id) {
                    var cons = $("#ConsOpcMul").val();

                    var preguntas = "<div class='row top-buffer' id='RowOpcPreg" + cons +
                        "' style='padding-bottom: 15px;'>" +
                        "    <div class='col-lg-11' >" +
                        "       <div class='input-group' style='padding-bottom: 10px;' >" +
                        "            <div class='input-group-prepend' style='width: 100%;''>" +
                        "                <div class='input-group-text'>" +
                        "                    <input aria-label='Checkbox for following text input'value='off' name='RadioOpcPre[]'  onclick='$.selCheck(" +
                        cons + ");' id='checkopcpreg1" + cons +
                        "'  type='radio'>" +
                        "                    <input type='hidden'  id='OpcCorecta" + cons +
                        "' name='OpcCorecta[]'  value='no'/>" +
                        "             </div>" +
                        '  <textarea cols="80" id="txtopcpreg' + cons +
                        '" name="txtopcpreg[]" rows="3"></textarea>' +
                        '  <br>' +
                        "        </div>" +
                        "        </div>" +
                        "     </div>" +
                        "     <div class='col-lg-1'>" +
                        "         <button type='button' onclick='$.DelOpcPreg(" + cons +
                        ")' class='btn btn-icon btn-outline-warning btn-social-icon btn-sm'><i class='fa fa-trash'></i></button>" +
                        "     </div>" +
                        " </div>";

                    $("#RowMulPreg1").append(preguntas);
                    $("#ConsOpcMul").val(parseFloat(cons) + 1);

                    $.inicialEditorPreOpcMul(cons);
                },
                selCheck: function(pre) {
                    $("input[name='OpcCorecta[]']").each(function(indice, elemento) {
                        $(elemento).val("no");
                    });

                    if ($('#checkopcpreg1' + pre).prop('checked')) {
                        $('#OpcCorecta' + pre).val("si");
                    } else {
                        $('#OpcCorecta' + pre).val("no");
                    }
                },
                DelOpcPreg: function(id) {
                    $('#RowOpcPreg' + id).remove();
                },
                inicialEditorEnunciado: function() {
                    CKEDITOR.replace('objetivo', {
                        width: '100%',
                        height: 100
                    });

                },
                inicialEditorPreMul: function(cons) {
                    CKEDITOR.replace('PreMulResp' + cons, {
                        width: '100%',
                        height: 100
                    });
                },
                inicialEditorPreOpcMul: function(preg) {
                    CKEDITOR.replace('txtopcpreg' + preg, {
                        width: '100%',
                        height: 100
                    });

                },

            });

            $.inicialEditorEnunciado();


            $.cargar(1);
            var editorEnun = CKEDITOR.instances.objetivo;


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
