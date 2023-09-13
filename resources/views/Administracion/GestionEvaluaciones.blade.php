@extends('Plantilla.Principal')
@section('title', 'Gestionar Evaluaciones')
@section('Contenido')




    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Lista de Evaluaciones</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Evaluaciones - {{ $tema }}</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Evaluaciones</h4>
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
            <input type="hidden" class="form-control" name="Tipreguntas" id="Tipreguntas" value="" />
            <input type="hidden" class="form-control" name="PregConse" id="PregConse" value="" />
            <input type="hidden" class="form-control" name="id-pregensay" id="id-pregensay" value="" />
            <input type="hidden" class="form-control" id="RutEvalVideo" value="{{ url('/') }}/" />
            {{--  Modal nueva evaluacion  --}}
            <div class="modal fade text-left" style="position: fixed;" id="modalEvaluacion" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="tituloEvaluacion">Crear Evaluación</h4>
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
                                                    <h5 class="card-title">Datos de evaluación</h5>
                                                    <a class="heading-elements-toggle"><i
                                                            class="fa fa-ellipsis-v font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li onclick="$.abrirConfig();"><a><i
                                                                        style="transition: all .2s ease-in-out;"
                                                                        class="fa fa-cogs"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">


                                                        <ul class="nav nav-tabs nav-linetriangle" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="homeIcon1-tab1"
                                                                    data-toggle="tab" href="#homeIcon11"
                                                                    aria-controls="homeIcon11" role="tab"
                                                                    aria-selected="true"><i
                                                                        class="fa fa-align-justify"></i>
                                                                    Información Basica
                                                                    del Tema </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link " id="profileIcon1-tab1"
                                                                    data-toggle="tab" href="#profileIcon11"
                                                                    aria-controls="profileIcon11" role="tab"
                                                                    aria-selected="false"><i class="fa fa-list-ol"></i>
                                                                    Preguntas</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content px-1 pt-1">
                                                            <div class="tab-pane  active in" id="homeIcon11"
                                                                aria-labelledby="homeIcon1-tab1" role="tabpanel">

                                                                <input type="hidden" name="id" id="id"
                                                                    value="" />
                                                                <div class="form-body">
                                                                    <div class="form-group">
                                                                        <label for="userinput5">Título:</label>
                                                                        <input class="form-control border-primary"
                                                                            type="text" name="titulo"
                                                                            placeholder="Título" id="titulo">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="userinput8">Enunciado:</label>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div id="full-wrapper">
                                                                                    <div id="full-container">
                                                                                        <div id="contenido"
                                                                                            name="contenido"
                                                                                            style="height: 200px;"
                                                                                            class="editor"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="tab-pane" id="profileIcon11"
                                                                aria-labelledby="profileIcon1-tab1" role="tabpanel">
                                                                <div id="MensInf">
                                                                    <div class="bs-callout-warning callout-bordered mt-1">
                                                                        <div class="media align-items-stretch">
                                                                            <div class="media-body p-1 center">
                                                                                <strong>Utilice este espacio para crear su
                                                                                    evaluación</strong>
                                                                                <p>Presione <b>Guardar</b> para que los
                                                                                    cambios
                                                                                    se guarden a medida que los hace. </p>
                                                                                <p>Presione <b>Guardar y Cerrar</b> para
                                                                                    guardar
                                                                                    y Cerrar los Cambios. </p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex align-items-center bg-warning p-2">
                                                                                <i
                                                                                    class="fa fa-warning white font-medium-5"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="div-evaluaciones">
                                                                </div>
                                                                <div class="form-actions" style="text-align: center;"
                                                                    id="div-addpreg">
                                                                    <div class="heading-elements ">
                                                                        <div class="btn-group">
                                                                            <button type="button"
                                                                                class="btn btn-success btn-min-width dropdown-toggle"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"><i
                                                                                    class="fa fa-check"></i> Contenido para
                                                                                la
                                                                                Evaluación</button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item"
                                                                                    onclick="$.AddPregAbierta();">Agregar
                                                                                    Pregunta Abierta</a>
                                                                                <a class="dropdown-item"
                                                                                    onclick="$.AddPregComplete();">Agregar
                                                                                    Pregunta Complete</a>
                                                                                <a class="dropdown-item"
                                                                                    onclick="$.AddPregOpcMultiple();">Agregar
                                                                                    Pregunta Opción Multiple</a>
                                                                                <a class="dropdown-item"
                                                                                    onclick="$.AddPregVerdFalso();">Agregar
                                                                                    Pregunta Verdadero / Falso</a>
                                                                                <a class="dropdown-item"
                                                                                    onclick="$.AddPregRelacione();">Agregar
                                                                                    Pregunta Relacione</a>
                                                                                <a class="dropdown-item"
                                                                                    onclick="$.AddPregArchivo();">Agregar
                                                                                    Guía
                                                                                    para Desarrollar</a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item"
                                                                                    onclick="$.AddVideo();">Adjuntar Video
                                                                                    Local</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                    <button type="reset" class="btn btn-warning mr-1">
                                        <i class="feather icon-x"></i> Cancelar
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
            {{--  Modal configuraciom  --}}
            <div class="modal fade text-left" id="modalConfiguraciones" style="position: fixed;" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Configuración de Evaluación</h4>

                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                        <fieldset class="form-group">
                                            <label for="basicSelect">Intentos permitidos</label>
                                            <select class="form-control" data-placeholder="Seleccione"
                                                name="cb_intentosPer" id="cb_intentosPer ">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="0">Ilimitado</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="porc_modulo">Calificar Usando:</label>
                                            <select class="form-control select2" style="width: 100%;"
                                                data-placeholder="Seleccione" id="cb_CalUsando" name="cb_CalUsando">
                                                <option value="Puntos">Puntos</option>
                                                <option value="Porcentaje">Porcentaje</option>
                                                <option value="Letra">Letra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="porc_modulo">Puntos Máximos:</label>
                                            <input type="text" class="form-control" readonly="" id="Punt_Max"
                                                value="0" name="Punt_Max" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">

                                <button type="button" id="btnGuardar" onclick="$.aceptarCong()"
                                    class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> Aceptar
                                </button>

                            </div>
                        </div>

                    </div>
                </div>

        </form>
    </div>

    </div>

    <form action="{{ url('/AdminGramaticaLenguaje/CargarEvaluaciones') }}" id="formCargarevaluaciones" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

    <form action="{{ url('/AdminGramaticaLenguaje/consulEvalPreg') }}" id="formAuxiliarEval" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/ElimnarPreg') }}" id="formAuxiliar" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/EliminarEvaluacion') }}" id="formEliminarEvaluacion" method="POST">
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

            var fullEditor = new Quill(".editor", {
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

            var quillEnsayo;

            $.extend({
                cargar: function(page, searchTerm = '') {
                    var form = $("#formCargarevaluaciones");
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
                    $("#tituloEvaluacion").html("Crear Evaluación");
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
                nuevo: function() {
                    document.getElementById("formGuardar").reset();
                },
                editar: function(id) {

                    $("#modalUnidad").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#accion").val("editar");
                    $("#btnGuardar").prop('disabled', false);
                    $("#tituloUnidad").html("Editar Unidad Tematica");

                    $("#id").val(id);
                    var accion = $("#accion").val();

                    var form = $("#formBuscarUnidad");

                    $("#idUnidad").remove();
                    form.append("<input type='hidden' id='idUnidad' name='idUnidad'  value='" + id +
                        "'>");
                    form.append("<input type='hidden' id='accion' name='accion'  value='" + accion +
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
                            $("#nombre").val(respuesta.unidades.nombre);
                            $("#descripcion").val(respuesta.unidades.descripcion);
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
                            if (respuesta.opc=="NT") {
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
                            }else if (respuesta.opc=="VU") {
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
                abrirConfig: function() {
                    $("#modalConfiguraciones").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#modalEvaluacion').modal('toggle');

                },
                aceptarCong: function() {
                    $("#modalEvaluacion").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#modalConfiguraciones').modal('toggle');
                },
                //AGREGAR PREGUNTA ABIERTA
                AddPregAbierta: function() {
                    edit = "no";
                    var cons = parseFloat($("#ConsPreguntas").val());
                    $("#MensInf").hide();
                    $("#div-addpreg").hide();

                    var Preguntas = '<div id="Preguntas' + cons + '" style="padding-bottom: 10px;">' +
                        ' <div class="bs-callout-primary callout-border callout-bordered callout-transparent p-1">' +
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
                        '<input type="hidden" id="id-pregensay' + cons +
                        '"  value="" />' +
                        '<input type="hidden" id="Tipreguntas' + cons +
                        '"  value="PREGENSAY" />' +
                        '            <div class="col-md-12 right">' +
                        '<div id="PuntEnsay' + cons + '">' +
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
                        '        <label class="form-label"><b>Contenido de Pregunta:</b></label>' +
                        '<div id="PregEnsay' + cons + '">' +
                        '    <div class="col-md-12">' +
                        '    <div id="full-wrapper">' +
                        '        <div id="full-container">' +
                        '            <div id="contenidoEnsayo" name="contenido" style="height: 150px;" class="editor">' +
                        '            </div>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>      ' +
                        '  <br>' +
                        '</div>' +
                        '</div>' +
                        '      </div>' +
                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                        '    <button type="button" onclick="$.GuardarEvalEnsayo(' + cons +
                        ');" id="Btn-guardarPreg' + cons +
                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                        '    <button type="button" id="Btn-EditPreg' + cons +
                        '"  style="display:none;" onclick="$.EditPreguntasEnsay(' + cons +
                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                        '    <button type="button" id="Btn-ElimPreg' + cons +
                        '" onclick="$.DelPregunta(' + cons +
                        ')" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                        '</div>' +
                        '   </div>' +
                        '</div>';

                    $("#div-evaluaciones").append(Preguntas);

                    $.inicialEditorEnsayo();
                    cons++;
                    $("#ConsPreguntas").val(cons);
                    ///
                    $("#div-addpreg").hide();
                    //  $("#btns_guardar").show();

                },
                ////////////GUARDAR PREGUNTAS TIPO ENSAYO
                GuardarEvalEnsayo: function(id) {
                    var pregEnsayo = quillEnsayo.root.innerHTML.trim();
                    var enunciado = fullEditor.root.innerHTML.trim();

                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());
                    $("#PregConse").val(id);
                    $("#id-pregensay").val($("#id-pregensay" + id).val());
                    $("#pregEnsayo").remove();
                    $("#enunciado").remove();

                    var form = $("#formAsigEval");
                    form.append("<input type='hidden' id='pregEnsayo' name='pregEnsayo' value='" +
                        pregEnsayo + "'>");
                    form.append("<input type='hidden' id='enunciado' name='enunciado' value='" +
                        enunciado + "'>");
                    var datos = form.serialize();

                    var url = form.attr("action");
                    $.UpdPunMax();
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
                                $("#Btn-guardarPreg" + id).hide();
                                $("#Btn-EditPreg" + id).show();
                                $("#div-addpreg").show();

                                $("#id-pregensay" + id).val(respuesta.ContPregEnsayo.id);


                                $("#PuntEnsay" + id).html('<fieldset >' +
                                    '        <div class="input-group">' +
                                    '          <input type="text" id="PuntEdit' + id +
                                    '" class="form-control"' +
                                    '     value="' + respuesta.ContPregEnsayo.puntaje +
                                    '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                    '          <div class="input-group-append">' +
                                    '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>');
                                $("#PregEnsay" + id).html(respuesta.ContPregEnsayo
                                    .pregunta);
                                edit = "si";
                            } else {
                                mensaje = "La Evaluación no pudo ser Guardada";
                                Swal.fire({
                                    title: "Gestinar de Evaluaciones",
                                    text: mensaje,
                                    icon: "warning",
                                    button: "Aceptar",
                                });
                            }
                        },
                        error: function(error_messages) {
                            alert('HA OCURRIDO UN ERROR');
                        }
                    });


                },
                //EDITAR PREGUNTA ABIERTA
                EditPreguntasEnsay: function(cons) {
                    if (edit === "si") {
                        var form = $("#formAuxiliarEval");
                        var id = $("#id-pregensay" + cons).val();
                        $("#div-addpreg").hide();
                        var preg = "";
                        var punt = "";
                        var comp = "";

                        $("#Pregunta").remove();
                        $("#TipPregunta").remove();
                        form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                            id + "'>");
                        form.append(
                            "<input type='hidden' name='TipPregunta' id='TipPregunta' value='PREGENSAY'>"
                        );
                        var url = form.attr("action");
                        var datos = form.serialize();
                        var j = 1;
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: datos,
                            async: false,
                            dataType: "json",
                            success: function(respuesta) {
                                punt = respuesta.PregEnsayo.puntaje;
                                preg = respuesta.PregEnsayo.pregunta;
                            }
                        });

                        let puntPre = punt;
                        let puntmax = $("#Punt_Max").val();
                        let total = parseInt(puntmax) - parseInt(puntPre);
                        $("#Punt_Max").val(total);

                        var Preguntas = '<div id="Preguntas' + cons +
                            '" style="padding-bottom: 10px;">' +
                            ' <div class="bs-callout-primary callout-border callout-bordered callout-transparent p-1">' +
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
                            '<input type="hidden" id="id-pregensay' + cons +
                            '"  value="' + id + '" />' +
                            '<input type="hidden" id="Tipreguntas' + cons +
                            '"  value="PREGENSAY" />' +
                            '            <div class="col-md-12 right">' +
                            '<div id="PuntEnsay' + cons + '">' +
                            '    <fieldset >' +
                            '        <div class="input-group">' +
                            '          <input type="text" class="form-control" id="puntaje"' +
                            '    name="puntaje" value="' + punt +
                            '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                            '          <div class="input-group-append">' +
                            '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                            '          </div>' +
                            '        </div>' +
                            '      </fieldset>' +
                            '   </div>' +
                            '            </div>' +
                            '          </div>' +
                            '        </div>' +
                            '      </div>' +
                            '  <div class="col-md-12"> ' +
                            '     <div class="form-group">' +
                            '        <label class="form-label">Contenido de Pregunta:</label>' +
                            '<div id="PregEnsay' + cons + '">' +
                            '    <div class="col-md-12">' +
                            '    <div id="full-wrapper">' +
                            '        <div id="full-container">' +
                            '            <div id="contenidoEnsayo" name="contenido" style="height: 150px;" class="editor">' +
                            '            </div>' +
                            '        </div>' +
                            '    </div>' +
                            '</div>      ' +
                            '  <br>' +
                            '</div>' +
                            '</div>' +
                            '      </div>' +
                            '<div class="form-group"  style="margin-bottom: 0px;">' +
                            '    <button type="button" onclick="$.GuardarEvalEnsayo(' + cons +
                            ');" id="Btn-guardarPreg' + cons +
                            '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                            '    <button type="button" id="Btn-EditPreg' + cons +
                            '" onclick="$.EditPreguntasEnsay(' + cons +
                            ')" style="display:none;" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                            '    <button type="button" id="Btn-ElimPreg' + cons +
                            '" onclick="$.DelPregunta(' + cons +
                            ')" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                            '</div>' +
                            '   </div>' +
                            '</div>';

                        $("#Preguntas" + cons).html(Preguntas);
                        $.inicialEditorEnsayo();
                        quillEnsayo.root.innerHTML = preg;
                        edit = "no"
                    } else {
                        mensaje = "Debe Guardar la Pregunta antes de editar otra.";
                        Swal.fire({
                            title: "Gestionar Evaluaciones",
                            text: mensaje,
                            icon: "warning",
                            button: "Aceptar",
                        });
                    }
                },

                //ELIMINAR PREGUNTA
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
                    if ($("#id-pregensay" + id_fila).val() !== "") {
                        var preg = $("#id-pregensay" + id_fila).val();
                        var TipPreg = $("#Tipreguntas" + id_fila).val();
                        var IdEval = $("#Id_Eval").val();
                        var form = $("#formAuxiliar");
                        $("#idAuxiliar").remove();
                        $("#idtippreg").remove();
                        $("#ideval").remove();
                        form.append("<input type='hidden' name='id' id='idAuxiliar' value='" + preg +
                            "'>");
                        form.append("<input type='hidden' name='tip' id='idtippreg' value='" + TipPreg +
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

                                let puntPre = $("#PuntEdit" + id_fila)
                                    .val();

                                let puntmax = $("#Punt_Max").val();
                                let total = parseInt(puntmax) - parseInt(
                                    puntPre);
                                $("#Punt_Max").val(total);

                                $('#Preguntas' + id_fila).remove();
                                ConsPreg = $('#ConsPreguntas').val() - 1;
                                $("#ConsPreguntas").val(ConsPreg);
                                $("#div-addpreg").show();
                                $("#btns_guardar").hide();

                                if ($("#ConsPreguntas").val() <= 1) {
                                    $("#MensInf").show();
                                }


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
                        $('#Preguntas' + id_fila).remove();
                        ConsPreg = $('#ConsPreguntas').val() - 1;
                        $("#ConsPreguntas").val(ConsPreg);
                        $("#div-addpreg").show();
                        $("#btns_guardar").hide();
                        if ($("#ConsPreguntas").val() <= 1) {
                            $("#MensInf").show();
                        }
                    }
                },
                ////////////GUARDAR Y CERRAR
                GuardarEval: function(id) {
                    var form = $("#formAsigEval");
                    var url = form.attr("action");

                    var rurl = $("#RutEvalVideo").val();
                    if ($("#ConsPreguntas").val() <= 1) {
                        mensaje = "No existe Ninguna Pregunta en la Evaluación";
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
                            title: "Warning!",
                            text: mensaje,
                            type: "warning",
                            confirmButtonClass: "btn btn-warning",
                            buttonsStyling: false
                        });
                        return;
                    }

                    $.ajax({
                        type: "POST",
                        url: rurl + "AdminGramaticaLenguaje/GuardarEvalFin",
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
                UpdPunMax: function() {
                    let puntPre = $("#puntaje").val();
                    let puntmax = $("#Punt_Max").val();
                    let total = parseInt(puntmax) + parseInt(puntPre);
                    $("#Punt_Max").val(total);
                },
                inicialEditorEnsayo: function() {
                    quillEnsayo = new Quill('#contenidoEnsayo', {
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
                        theme: 'snow' // Puedes usar otro tema si lo prefieres
                    });
                }

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
