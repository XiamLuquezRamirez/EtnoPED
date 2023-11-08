@extends('Plantilla.Principal')
@section('title', 'Gestionar Evaluaciones')
@section('Contenido')

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
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
        <div class="row" id="div-listEval">
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

        <div id="detCalificacion" style="display: none;" class="row">
            <div class="col-12">
                <div class="card p-1">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Estudiantes</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Grado:</label>
                                        <select class="form-control select2" id="selGrado">
                                            <option value="" selected>Seleccionar...</option>
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Grupo:</label>
                                        <select class="form-control select2" id="selGrupo">
                                            <option value="" selected>Seleccionar...</option>
                                            <option value="1">Grupo 1</option>
                                            <option value="2">Grupo 2</option>
                                            <option value="3">Grupo 3</option>
                                            <option value="4">Grupo 4</option>
                                            <option value="5">Grupo 5</option>
                                            <option value="6">Grupo 6</option>
                                            <option value="7">Grupo 7</option>
                                            <option value="8">Grupo 8</option>
                                            <option value="9">Grupo 9</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Jornada:</label>
                                        <select class="form-control select2" id="selJornada">
                                            <option value="" selected>Seleccionar...</option>
                                            <option value="JM">Jornada Mañana</option>
                                            <option value="JT">Jornada Tarde</option>
                                            <option value="JN">Jornada Nocturna</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-center pt-2">

                                    <div class="form-group">
                                        <!-- basic buttons -->
                                        <button onclick="$.consultar()" id="addRow"
                                            class="btn btn-primary mb-2 ml-1"><i class="fa fa-search"></i>&nbsp;
                                            Consultar</button>
                                        <button type="button" id="btnGuardar" onclick="$.mostrasEval()"
                                            class="btn btn-success mb-2 ml-1">
                                            <i class="fa fa-reply"></i> Atras
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-xs mb-0">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>#</th>
                                            <th>Identificación</th>
                                            <th>Nombre</th>
                                            <th>Calificación</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tr_alumnos">


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
            aria-hidden="true">

            <input type="hidden" class="form-control" id="Id_PregEns" value="" />
            <input type="hidden" class="form-control" id="TipEva" value="" />
            <input type="hidden" class="form-control" id="PuntMax" value="" />
            <input type="hidden" class="form-control" id="TipCali" value="" />
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-transform: capitalize;" id="titu_tema"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-1 my-1">
                            <h3 class="modal-title" id="h3_alumno" style="text-transform: uppercase;">
                            </h3>

                        </div>

                        <br>
                        <div id="enunciadoEval" style="padding-left:15px;"></div>
                        <div id='cont_eva' style=" overflow-x: scroll;">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">

                            <div class="col-md-8">
                                <labe id="fechp">Fecha Presentación:</labe><br>
                                <labe id="tocupado">Tiempo Ocupado:</labe><br>
                                <labe id="irealizados">Intentos Realizados:</labe>
                            </div>
                            <div class="col-xl-4">
                                <fieldset class="form-group">
                                    <label for="roundText">Calificación:</label>
                                    <input id="txt_califVis" style="text-align: center;color: white; font-weight: bold;"
                                        class="form-control round" placeholder="Calificación" disabled type="text">
                                    <input id="txt_calif" style="text-align: center;" class="form-control round"
                                        placeholder="Calificación" type="hidden">
                                    <input id="txt_califMax" style="text-align: center;" class="form-control round"
                                        placeholder="Calificación" type="hidden">
                                    <input id="TipCalif" style="text-align: center;" class="form-control round"
                                        placeholder="Calificación" type="hidden">
                                </fieldset>
                            </div>
                        </div>

                        <button type="button" id="btn_salir" class="btn grey btn-outline-secondary"
                            data-dismiss="modal"><i class="fa fa-reply position-right"></i>
                            Salir</button>
                        <button type="button" id="btn_Conversa" onclick="$.AbrirConv('M');" style="display: none;"
                            class="btn btn-outline-primary"><i class="ft-message-square position-right"></i>
                            Comentarios</button>
                    </div>
                </div>
            </div>
        </div>

        <form class="form" method="POST" id="formAsigEval"
            action="{{ url('/AdminGramaticaLenguaje/guardarEvaluacion') }}">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="Id_Eval" id="Id_Eval" value="">
            <input type="hidden" name="tema_id" id="tema_id" value="{{ $id }}">
            <input type="hidden" name="idAlumno" id="idAlumno" value="">
            <input type="hidden" class="form-control" id="ConsPreguntas" value="1" />
            <input type="hidden" class="form-control" name="Tipreguntas" id="Tipreguntas" value="" />
            <input type="hidden" class="form-control" name="PregConse" id="PregConse" value="" />
            <input type="hidden" class="form-control" name="IdpreguntaMul" id="IdpreguntaMul" value="" />
            <input type="hidden" class="form-control" name="id-pregverfal" id="id-pregverfal" value="" />
            <input type="hidden" class="form-control" name="id-pregensay" id="id-pregensay" value="" />
            <input type="hidden" class="form-control" name="id-pregcomplete" id="id-pregcomplete" value="" />
            <input type="hidden" class="form-control" name="id-relacione" id="id-relacione" value="" />
            <input type="hidden" class="form-control" name="id-taller" id="id-taller" value="" />
            <input type="hidden" class="form-control" id="RutEvalVideo" value="{{ url('/') }}/" />
            <input type="hidden" data-id='id-dat' id="dattaller"
                data-ruta="{{ asset('/app-assets/Archivos_EvaluacionTaller') }}" />
            <input type="hidden" name="idEvaluacion" id="idEvaluacion" value="">
            {{--  Modal nueva evaluacion  --}}
            <div class="modal fade text-left" style="position: fixed;" id="modalEvaluacion" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="tituloEvaluacion">Crear Evaluación</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 25px;">&times;</span>
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
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Datos de evaluación</h5>
                                                    <a class="heading-elements-toggle"><i
                                                            class="fa fa-ellipsis-v font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li class="dropdown nav-item mega-dropdown d-none d-lg-block ">
                                                                <a class="dropdown-toggle nav-link" href="#"
                                                                    data-toggle="dropdown"
                                                                    aria-expanded="true">Configuración</a>
                                                                <ul class="mega-dropdown-menu dropdown-menu row"
                                                                    style="width: 250px;">
                                                                    <li class="col-md-12">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Configuración de
                                                                                Evaluación</h4>

                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-xl-12 col-lg-6 col-md-12">
                                                                                        <fieldset class="form-group">
                                                                                            <label
                                                                                                for="basicSelect">Intentos
                                                                                                permitidos</label>
                                                                                            <select
                                                                                                class="select2 form-control"
                                                                                                name="cb_intentosPer"
                                                                                                id="cb_intentosPer">
                                                                                                <option value="1">1
                                                                                                </option>
                                                                                                <option value="2">2
                                                                                                </option>
                                                                                                <option value="3">3
                                                                                                </option>
                                                                                                <option value="4">4
                                                                                                </option>
                                                                                                <option value="5">5
                                                                                                </option>
                                                                                                <option value="6">6
                                                                                                </option>
                                                                                                <option value="7">7
                                                                                                </option>
                                                                                                <option value="8">8
                                                                                                </option>
                                                                                                <option value="9">9
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                </option>
                                                                                                <option value="0">
                                                                                                    Ilimitado</option>
                                                                                            </select>
                                                                                        </fieldset>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-xl-12 col-lg-6 col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label"
                                                                                                for="porc_modulo">Calificar
                                                                                                Usando:</label>
                                                                                            <select
                                                                                                class="select2 form-control"
                                                                                                id="cb_CalUsando"
                                                                                                name="cb_CalUsando">
                                                                                                <option value="Puntos">
                                                                                                    Puntos</option>
                                                                                                <option value="Porcentaje">
                                                                                                    Porcentaje</option>
                                                                                                <option value="Letra">
                                                                                                    Letra</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label"
                                                                                                for="porc_modulo">Puntos
                                                                                                Máximos:</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                readonly=""
                                                                                                id="Punt_Max"
                                                                                                value="0"
                                                                                                name="Punt_Max" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
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
                                                                        <textarea cols="80" id="enunciado" name="enunciado" rows="10"></textarea>

                                                                        <br>
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
                                                                <div id="vid-adjunto"></div>
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

                                <div class="modal fade text-left" id="ModVidelo" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel15" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success white">
                                                <h4 class="modal-title" style="text-transform: capitalize;"
                                                    id="titu_temaEva">Contenido Didactico
                                                    Cargado</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id='ListEval'
                                                    style="height: 400px; overflow: auto;text-align: center;">
                                                    <video width="640" height="360" id="datruta" controls
                                                        data-ruta="{{ asset('/app-assets/Evaluacion_PregDidact') }}">
                                                    </video>
                                                </div>

                                                <button type="button" id="btn_salir" onclick="$.SalirVideo();"
                                                    class="btn grey btn-outline-secondary"><i
                                                        class="ft-corner-up-left position-right"></i> Salir</button>
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

    <form action="{{ url('/AdminGramaticaLenguaje/CargarEvaluaciones') }}" id="formCargarevaluaciones" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

    <form action="{{ url('/AdminGramaticaLenguaje/consulEvalPreg') }}" id="formAuxiliarEval" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/CargarEvaluacion') }}" id="formAuxiliarEvalDet" method="POST">
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
    <form action="{{ url('/AdminGramaticaLenguaje/CargarAlumnosCalifGrupo') }}" id="formAuxiliarAlumnos" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/RespEval') }}" id="formContenidoEva" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/consulPregAlumno') }}" id="formAuxiliarCargEval" method="POST">
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
                            var cons = 1;
                            $("#MensInf").hide();

                            $('#cb_intentosPer').val(respuesta.Evaluacion.intentos_perm)
                                .trigger(
                                    'change.select2');

                            $('#cb_CalUsando').val(respuesta.Evaluacion.calif_usando)
                                .trigger('change');

                            $("#titulo").val(respuesta.Evaluacion.titulo);
                            $("#Punt_Max").val(respuesta.Evaluacion.punt_max);
                            editorEnun.setData(respuesta.Evaluacion.enunciado);


                            $.each(respuesta.PregEval, function(i, item) {
                                if (item.tipo === "PREGENSAY") {
                                    var Preguntas = '<div id="Preguntas' + cons +
                                        '" style="padding-bottom: 10px;">' +
                                        ' <div class="bs-callout-primary callout-bordered callout-transparent p-1">' +
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
                                        '<input type="hidden" id="id-pregensay' +
                                        cons + '"  value="" />' +
                                        '<input type="hidden" id="Tipreguntas' +
                                        cons +
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
                                        '         <textarea cols="80" id="pregEnsayo' +
                                        cons +
                                        '" name="pregEnsayo" rows="3"></textarea>' +
                                        '         <br>' +
                                        '</div>' +
                                        '</div>' +
                                        '      </div>' +
                                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                                        '    <button type="button" onclick="$.GuardarEvalEnsayo(' +
                                        cons +
                                        ');" id="Btn-guardarPreg' + cons +
                                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                                        '    <button type="button" id="Btn-EditPreg' +
                                        cons +
                                        '"  style="display:none;" onclick="$.EditPreguntasEnsay(' +
                                        cons +
                                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                                        '    <button type="button" id="btnDel' +
                                        cons + '" data-id="' + cons +
                                        '" data-nombre="id-pregensay' + cons +
                                        '" onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                                        '</div>' +
                                        '   </div>' +
                                        '</div>';
                                    $("#div-evaluaciones").append(Preguntas);
                                    $.each(respuesta.PregEnsayo, function(x,
                                        item1) {
                                        if ($.trim(item.idpreg) === $.trim(
                                                item1.id)) {
                                            $("#Btn-guardarPreg" + cons)
                                                .hide();
                                            $("#Btn-EditPreg" + cons)
                                                .show();
                                            $("#div-addpreg").show();
                                            $("#id-pregensay" + cons).val(
                                                item1.id);
                                            $("#PuntEnsay" + cons).html(
                                                '<fieldset >' +
                                                '        <div class="input-group">' +
                                                '          <input type="text" id="PuntEdit' +
                                                cons +
                                                '" class="form-control"' +
                                                '     value="' + item1
                                                .puntaje +
                                                '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                                '          <div class="input-group-append">' +
                                                '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                                '          </div>' +
                                                '        </div>' +
                                                '      </fieldset>');
                                            $("#PregEnsay" + cons).html(
                                                item1.pregunta);
                                            edit = "si";
                                            cons++;
                                        }

                                    });

                                } else if (item.tipo === "COMPLETE") {
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
                                        '<input type="hidden" id="id-pregcomplete' +
                                        cons +
                                        '"  value="" />' +
                                        '<input type="hidden" id="Tipreguntas' +
                                        cons +
                                        '"  value="COMPLETE" />' +
                                        '            <div class="col-md-12 right">' +
                                        '<div id="PuntComplete' + cons + '">' +
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
                                        '        <label class="form-label"><b>Ingrese las Opciones:</b></label>' +
                                        '<div id="PregOpciones' + cons + '">' +
                                        '    <select class="form-control select2" multiple="multiple" style="width: 100%;" data-placeholder="Ingrese las Opciones"' +
                                        '  id="cb_Opciones" name="cb_Opciones[]">' +
                                        '</select>' +
                                        '</div>' +
                                        '</div>' +
                                        '      </div>' +
                                        '  <div class="col-md-12"> ' +
                                        '     <div class="form-group">' +
                                        '        <label class="form-label"><b>Ingrese el parrafo a completar:</b></label>' +
                                        '<div id="DivParrCompleta' + cons + '">' +
                                        '  <textarea cols="80" id="pregEditComplete' +
                                        cons +
                                        '" name="pregEditComplete" rows="3"></textarea>' +
                                        '  <br>' +
                                        '</div>' +
                                        '</div>' +
                                        '      </div>' +
                                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                                        '    <button type="button" onclick="$.GuardarEvalComplete(' +
                                        cons +
                                        ');" id="Btn-guardarPreg' + cons +
                                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                                        '    <button type="button" id="Btn-EditPreg' +
                                        cons +
                                        '"  style="display:none;" onclick="$.EditPreguntascomplete(' +
                                        cons +
                                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                                        '    <button type="button" id="btnDel' +
                                        cons + '" data-id="' + cons +
                                        '" data-nombre="id-pregcomplete' + cons +
                                        '" onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                                        '</div>' +
                                        '   </div>' +
                                        '</div>';
                                    $("#div-evaluaciones").append(Preguntas);
                                    $.each(respuesta.PregComple, function(x,
                                        item1) {
                                        if ($.trim(item.idpreg) === $.trim(
                                                item1.id)) {
                                            $("#Btn-guardarPreg" + cons)
                                                .hide();
                                            $("#Btn-EditPreg" + cons)
                                                .show();
                                            $("#div-addpreg").show();
                                            $("#id-pregcomplete" + cons)
                                                .val(item1.id);
                                            $("#PuntComplete" + cons).html(
                                                '<fieldset >' +
                                                '        <div class="input-group">' +
                                                '          <input type="text" id="PuntEdit' +
                                                cons +
                                                '" class="form-control"' +
                                                '     value="' + item1
                                                .puntaje +
                                                '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                                '          <div class="input-group-append">' +
                                                '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                                '          </div>' +
                                                '        </div>' +
                                                '      </fieldset>');
                                            $("#PregOpciones" + cons).html(
                                                item1.opciones);
                                            $("#DivParrCompleta" + cons)
                                                .html(item1.parrafo);
                                            edit = "si";
                                            cons++;
                                        }

                                    });
                                } else if (item.tipo === "OPCMULT") {
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
                                    $("#div-evaluaciones").append(Preguntas);
                                    var opciones = '';
                                    $.each(respuesta.PregMult, function(x, itemp) {
                                        if ($.trim(item.idpreg) === $.trim(
                                                itemp.id)) {

                                            $('#Btn-guardarPreg' + cons)
                                                .prop('disabled', false);


                                            $("#Btn-guardarPreg" + cons)
                                                .hide();
                                            $("#Btn-EditPreg" + cons)
                                                .show();
                                            $("#div-addpreg").show();

                                            $("#id-preopcmult" +
                                                cons).val(
                                                itemp.id);
                                            $("#PuntMultiple" +
                                                cons).html(
                                                '<fieldset >' +
                                                '        <div class="input-group">' +
                                                '          <input type="text" id="PuntEdit' +
                                                cons +
                                                '" class="form-control"' +
                                                '     value="' +
                                                itemp
                                                .puntuacion +
                                                '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                                '          <div class="input-group-append">' +
                                                '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                                '          </div>' +
                                                '        </div>' +
                                                '      </fieldset>'
                                            );

                                            $("#PreguntaMultiple" +
                                                cons).html(
                                                itemp
                                                .pregunta);




                                            $.each(respuesta.OpciMult,
                                                function(k, itemo) {

                                                    if ($.trim(itemo
                                                            .pregunta
                                                        ) === $
                                                        .trim(item
                                                            .idpreg)) {
                                                        opciones +=
                                                            '<fieldset>';
                                                        if (itemo
                                                            .correcta ===
                                                            "si") {
                                                            opciones +=
                                                                '<input type="checkbox" disabled id="input-15" checked>';
                                                        } else {
                                                            opciones +=
                                                                '<input type="checkbox" disabled id="input-15">';
                                                        }

                                                        opciones +=
                                                            ' <label for="input-15"> ' +
                                                            itemo
                                                            .opciones +
                                                            '</label>' +
                                                            '</fieldset>';
                                                    }

                                                });

                                            $("#DivOpcionesMultiples" +
                                                cons).html(opciones);
                                        }


                                    });

                                    cons++;
                                    edit = "si";

                                } else if (item.tipo === "VERFAL") {
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
                                        '<input type="hidden" id="id-pregverfal' +
                                        cons +
                                        '"  value="" />' +
                                        '<input type="hidden" id="Tipreguntas' +
                                        cons +
                                        '"  value="VERFAL" />' +
                                        '            <div class="col-md-12 right">' +
                                        '<div id="PuntVerFal' + cons + '">' +
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
                                        '     <div class="form-group" >' +
                                        '        <label class="form-label"><b>Contenido de Pregunta:</b></label>' +
                                        '<div id="PregVerFal' + cons + '">' +
                                        '         <textarea cols="80" id="summernote_pregverdFals' +
                                        cons +
                                        '" name="summernote_pregverdFals" rows="3"></textarea>' +
                                        '         <br>' +
                                        '</div>' +
                                        '<div class="col-md-4 border-bottom-cyan" id="CheckResp' +
                                        cons + '"  >' +
                                        '           <div class="form-group row">' +
                                        '<div class="col-md-12">' +
                                        '    <fieldset >' +
                                        '        <div class="input-group">' +
                                        '          <input  name="radpregVerFal[]" checked="" value="si" type="radio">' +
                                        '          <div class="input-group-append" style="margin-left:5px;">' +
                                        '            <span  id="basic-addon2">Verdadero</span>' +
                                        '          </div>' +
                                        '        </div>' +
                                        '      </fieldset>' +
                                        '</div>' +
                                        '<div  class="col-md-12">' +
                                        '    <fieldset >' +
                                        '        <div class="input-group">' +
                                        '          <input  name="radpregVerFal[]"  value="no" type="radio">' +
                                        '          <div class="input-group-append" style="margin-left:5px;">' +
                                        '            <span  id="basic-addon2">Falso</span>' +
                                        '          </div>' +
                                        '        </div>' +
                                        '      </fieldset>' +
                                        '</div>' +
                                        '            </div>' +
                                        '          </div>' +
                                        '</div>' +
                                        '      </div>' +
                                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                                        '    <button type="button" onclick="$.GuardarEvalVerFal(' +
                                        cons +
                                        ');" id="Btn-guardarPreg' + cons +
                                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                                        '    <button type="button" id="Btn-EditPreg' +
                                        cons +
                                        '"  style="display:none;" onclick="$.EditPreguntasVerFal(' +
                                        cons +
                                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                                        '    <button type="button" id="btnDel' +
                                        cons + '" data-id="' + cons +
                                        '" data-nombre="id-pregverfal' + cons +
                                        '"  onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                                        '</div>' +
                                        '   </div>' +
                                        '</div>';

                                    $("#div-evaluaciones").append(Preguntas);
                                    $.each(respuesta.PregVerFal, function(x,
                                        item1) {
                                        if ($.trim(item.idpreg) === $.trim(
                                                item1.id)) {
                                            $("#Btn-guardarPreg" + cons)
                                                .hide();
                                            $("#Btn-EditPreg" + cons)
                                                .show();
                                            $("#div-addpreg").show();

                                            $("#id-pregverfal" + cons).val(
                                                item1.id);

                                            $("#PuntVerFal" + cons).html(
                                                '<fieldset >' +
                                                '        <div class="input-group">' +
                                                '          <input type="text" id="PuntEdit' +
                                                cons +
                                                '" class="form-control"' +
                                                '     value="' + item1
                                                .puntaje +
                                                '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                                '          <div class="input-group-append">' +
                                                '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                                '          </div>' +
                                                '        </div>' +
                                                '      </fieldset>');
                                            $("#PregVerFal" + cons).html(
                                                item1.pregunta);
                                            var Opc =
                                                '<div class="form-group row">' +
                                                '<div class="col-md-12">' +
                                                '    <fieldset >' +
                                                '        <div class="input-group">';
                                            if (item1.respuesta === "si") {
                                                Opc +=
                                                    '<input   checked="" value="si" disabled type="radio">';

                                            } else {
                                                Opc +=
                                                    ' <input   value="si" disabled type="radio">';

                                            }

                                            Opc +=
                                                ' <div class="input-group-append" style="margin-left:5px;">' +
                                                '            <span  id="basic-addon2">Verdadero</span>' +
                                                '          </div>' +
                                                '        </div>' +
                                                '      </fieldset>' +
                                                '</div>' +
                                                '<div  class="col-md-12">' +
                                                '    <fieldset >' +
                                                '        <div class="input-group">';
                                            if (item1.respuesta === "no") {
                                                Opc +=
                                                    '<input   checked="" value="si" disabled type="radio">';

                                            } else {
                                                Opc +=
                                                    '<input  value="si" disabled type="radio">';

                                            }
                                            Opc +=
                                                '<div class="input-group-append" style="margin-left:5px;">' +
                                                '            <span  id="basic-addon2">Falso</span>' +
                                                '          </div>' +
                                                '        </div>' +
                                                '      </fieldset>' +
                                                '</div>' +
                                                '            </div>';

                                            $("#CheckResp" + cons).html(
                                                Opc);

                                            edit = "si";
                                            cons++;
                                        }

                                    });
                                } else if (item.tipo === "RELACIONE") {
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
                                        '<input type="hidden" id="id-relacione' +
                                        cons +
                                        '"  value="" />' +
                                        '<input type="hidden" id="Tipreguntas' +
                                        cons +
                                        '"  value="RELACIONE" />' +
                                        '            <div class="col-md-12 right">' +
                                        '<div id="PuntRelacione' + cons + '">' +
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
                                        '  <div class="col-md-12 pb-1"> ' +
                                        '<div id="ConsEnunRel' + cons + '">' +
                                        '                     <textarea cols="80" class="txtareaR" id="EnuncRelacione" name="EnuncRelacione"' +
                                        '                        rows="3"></textarea>' +
                                        '</div>' +
                                        '</div>' +
                                        '  <div class="col-md-12"> ' +
                                        '     <div class="form-group">' +

                                        '<div id="DivOpcionesRelacione' + cons +
                                        '">' +
                                        '<input type="hidden" class="form-control" id="ConsOpcRel" value="2" />' +
                                        '<div id="RowRelPreg' + cons + '">' +
                                        '                 <div class="row top-buffer" id="RowOpcRelPreg1" style="padding-bottom: 15px;">' +
                                        '                      <div class="col-lg-6 border-top-primary">' +
                                        ' <input type="hidden" class="form-control" name="Mesnsaje[]" value="1" />' +
                                        '        <label class="form-label"><b>Indicaciones:</b></label>' +
                                        '                     <textarea cols="80" id="Mensaje1" name="txtopcpreg[]"' +
                                        '                        rows="3"></textarea>' +
                                        '     </div>' +
                                        '                      <div class="col-lg-6 border-top-primary">' +
                                        ' <input type="hidden" class="form-control" name="respuestas[]" value="1" />' +
                                        '        <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                                        '                     <textarea cols="80" id="Respuesta1" name="txtopcResp[]"' +
                                        '                        rows="3"></textarea>' +
                                        '     </div>' +
                                        '      </div>' +
                                        '   </div>' +
                                        '   <div class="row" id="divaddpar' + cons +
                                        '">' +
                                        '  <button id="AddOpcPre" onclick="$.AddOpcionPar();" type="button" class="btn-sm  btn-success"><i class="fa fa-plus"></i> Agregar Par</button> ' +
                                        '</div>' +
                                        ' <div class="row">' +
                                        '  <label class="form-label pt-2"><b>Respuestas Adicionales:</b></label>' +
                                        '<input type="hidden" class="form-control" id="ConsOpcRelAdd" value="1" />' +
                                        '</div>' +
                                        ' <div class="row" id="DivRespAdd' + cons +
                                        '"></div>' +
                                        '<div class="row" id="divaddpre' + cons +
                                        '">' +
                                        '  <button  onclick="$.AddOpcionRespAdd(' +
                                        cons +
                                        ');" type="button" class="btn-sm  btn-success"><i class="fa fa-plus"></i> Agregar Respuesta</button> ' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '      </div>' +
                                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                                        '    <button type="button" onclick="$.GuardarEvalRelacione(' +
                                        cons +
                                        ');" id="Btn-guardarPreg' + cons +
                                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                                        '    <button type="button" id="Btn-EditPreg' +
                                        cons +
                                        '"  style="display:none;" onclick="$.EditPreguntasRelacione(' +
                                        cons +
                                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                                        '    <button type="button" id="btnDel' +
                                        cons + '" data-id="' + cons +
                                        '" data-nombre="id-relacione' + cons +
                                        '"  onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                                        '</div>' +
                                        '   </div>' +
                                        '</div>';
                                    $("#div-evaluaciones").append(Preguntas);

                                    $.each(respuesta.PregRelacione, function(x,
                                        item1) {

                                        if ($.trim(item.idpreg) === $.trim(
                                                item1.id)) {
                                            $("#Btn-guardarPreg" + cons)
                                                .hide();
                                            $("#Btn-EditPreg" + cons)
                                                .show();
                                            $("#div-addpreg").show();
                                            $("#id-relacione" + cons).val(
                                                item1.id);

                                            $("#PuntRelacione" + cons).html(
                                                '<fieldset >' +
                                                '        <div class="input-group">' +
                                                '          <input type="text" id="PuntEdit' +
                                                cons +
                                                '" class="form-control"' +
                                                '     value="' + item1
                                                .puntaje +
                                                '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                                '          <div class="input-group-append">' +
                                                '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                                '          </div>' +
                                                '        </div>' +
                                                '      </fieldset>');
                                            var y = 1;
                                            var preguntas = "";

                                            $("#ConsEnunRel" + cons).html(
                                                item1.enunciado);

                                            $.each(respuesta.PregRelIndi,
                                                function(k, item2) {
                                                    if ($.trim(item1
                                                            .id) === $
                                                        .trim(
                                                            item2
                                                            .pregunta)
                                                    ) {
                                                        preguntas +=
                                                            '<div class="row top-buffer" id="RowOpcRelPreg' +
                                                            y +
                                                            '" style="padding-bottom: 15px;">' +
                                                            '                      <div class="col-lg-6 border-top-primary">' +
                                                            '        <label class="form-label"><b>Mensaje:</b></label>' +
                                                            '<div id="mesaje' +
                                                            cons + y +
                                                            '"></div>' +
                                                            '     </div>' +
                                                            ' <div class="col-lg-6 border-top-primary">' +
                                                            '  <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                                                            '<div id="respuesta' +
                                                            cons + y +
                                                            '"></div>' +
                                                            '     </div>' +
                                                            '      </div>' +
                                                            ' </div>';
                                                        y++;
                                                    }

                                                });

                                            $("#RowRelPreg" + cons).html(
                                                preguntas);

                                            y = 1;

                                            $.each(respuesta.PregRelIndi,
                                                function(k, item2) {
                                                    if ($.trim(item1
                                                            .id) === $
                                                        .trim(
                                                            item2
                                                            .pregunta)
                                                    ) {
                                                        $("#mesaje" +
                                                                cons + y
                                                            )
                                                            .html(item2
                                                                .definicion
                                                            );
                                                        y++;
                                                    }

                                                });

                                            y = 1;
                                            $.each(respuesta.PregRelResp,
                                                function(k, item3) {
                                                    if ($.trim(item1
                                                            .id) === $
                                                        .trim(
                                                            item3
                                                            .pregunta)
                                                    ) {
                                                        if (item3
                                                            .correcta !==
                                                            "-") {
                                                            $("#respuesta" +
                                                                cons +
                                                                y
                                                            ).html(
                                                                item3
                                                                .respuesta
                                                            );
                                                            y++;
                                                        }
                                                    }
                                                });

                                            preguntas = "";
                                            y = 1;
                                            $.each(respuesta.PregRelResp,
                                                function(k, item4) {
                                                    if (item4
                                                        .correcta ===
                                                        "-") {
                                                        preguntas +=
                                                            '<div class="row top-buffer" id="RowOpcRelPregAdd' +
                                                            y +
                                                            '" style="padding-bottom: 15px;width: 100%;">' +
                                                            '                      <div class="col-lg-6 border-top-primary">' +
                                                            '     </div>' +
                                                            ' <div class="col-lg-6 border-top-primary" >' +
                                                            '  <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                                                            '   <div id="respuestaadd' +
                                                            cons + y +
                                                            '"></div>' +
                                                            '     </div>' +
                                                            '      </div>' +
                                                            " </div>";
                                                    }
                                                    y++;
                                                });

                                            $("#DivRespAdd" + cons).html(
                                                preguntas);

                                            y = 1;
                                            $.each(respuesta.PregRelResp,
                                                function(k, item4) {
                                                    if ($.trim(item1
                                                            .id) === $
                                                        .trim(
                                                            item4
                                                            .pregunta)
                                                    ) {
                                                        if (item4
                                                            .correcta ===
                                                            "-") {
                                                            $("#respuestaadd" +
                                                                cons +
                                                                y
                                                            ).html(
                                                                item4
                                                                .respuesta
                                                            );
                                                        }
                                                        y++;
                                                    }
                                                });

                                            $("#divaddpar" + cons).remove();
                                            $("#divaddpre" + cons).remove();

                                            edit = "si";
                                            cons++;
                                        }
                                    });

                                } else if (item.tipo === "TALLER") {
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
                                        '<input type="hidden" id="id-taller' +
                                        cons +
                                        '"  value="" />' +
                                        '<input type="hidden" id="Tipreguntas' +
                                        cons +
                                        '"  value="TALLER" />' +
                                        '            <div class="col-md-12 right">' +
                                        '<div id="PuntTaller' + cons + '">' +
                                        '    <fieldset >' +
                                        '        <div class="input-group">' +
                                        '          <input type="text" class="form-control" id="puntaje"' +
                                        '    name="puntaje" value="10" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                        '          <div class="input-group-append">' +
                                        '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                        '          </div>' +
                                        '        </div>' +
                                        '      </fieldset>' +
                                        '      </div>' +
                                        '            </div>' +
                                        '          </div>' +
                                        '        </div>' +
                                        '      </div>' +
                                        '  <div class="col-md-12"> ' +
                                        '     <div class="form-group">' +
                                        '<div id="PregTaller' + cons + '">' +
                                        '             <label>Seleccionar Archivo: </label>' +
                                        '<label id="projectinput7" class="file center-block"><br>' +
                                        '    <input id="archiTaller"  name="archiTaller" type="file">' +
                                        '    <span class="file-custom"></span>' +
                                        ' </label>' +
                                        '         <br>' +
                                        '</div>' +
                                        '</div>' +
                                        '      </div>' +
                                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                                        '    <button type="button" onclick="$.GuardarEvalTaller(' +
                                        cons +
                                        ');" id="Btn-guardarPreg' + cons +
                                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                                        '    <button type="button" id="Btn-EditPreg' +
                                        cons +
                                        '"  style="display:none;" onclick="$.EditPreguntasTaller(' +
                                        cons +
                                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                                        '    <button type="button" id="Btn-ElimPreg' +
                                        cons +
                                        '" onclick="$.DelPreguntasTaller(' + cons +
                                        ')" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                                        '</div>' +
                                        '   </div>' +
                                        '</div>';

                                    $("#div-evaluaciones").append(Preguntas);
                                    $.each(respuesta.PregTaller, function(x,
                                        item5) {
                                        if ($.trim(item.idpreg) === $.trim(
                                                item5.id)) {
                                            $("#Btn-guardarPreg" + cons)
                                                .hide();
                                            $("#Btn-EditPreg" + cons)
                                                .show();
                                            $("#div-addpreg").show();

                                            $("#id-taller" + cons).val(item5
                                                .id);

                                            $("#PuntTaller" + cons).html(
                                                '<fieldset >' +
                                                '        <div class="input-group">' +
                                                '          <input type="text" id="PuntEdit' +
                                                cons +
                                                '" class="form-control"' +
                                                '     value="' + item5
                                                .puntaje +
                                                '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                                '          <div class="input-group-append">' +
                                                '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                                '            </div>' +
                                                '        </div>' +
                                                '      </fieldset>');

                                            $("#PregTaller" + cons).html(
                                                '<div class="form-group" id="id_verf">' +
                                                ' <label class="form-label " for="imagen">Ver Archivo Cargado:</label>' +
                                                ' <div class="btn-group" role="group" aria-label="Basic example">' +
                                                '   <button id="idimg' +
                                                cons +
                                                '" type="button" data-archivo="' +
                                                item5.nom_archivo +
                                                '" onclick="$.MostArc(this.id);" class="btn btn-success"><i' +
                                                '             class="fa fa-search"></i> Ver Archivo</button>' +
                                                '      </div>' +
                                                '       </div>');
                                            edit = "si";
                                            cons++;
                                        }
                                    });
                                }

                                $("#ConsPreguntas").val(cons);


                            });
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

                salirModalEval: function() {
                    $('#modalEvaluacion').modal('toggle');
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
                        '  <textarea cols="80" id="pregEditEnsayo' + cons +
                        '" name="pregEditEnsayo" rows="3"></textarea>' +
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
                        '    <button type="button"  id="btnDel' + cons + '" data-id="' + cons +
                        '" data-nombre="id-pregensay' + cons +
                        '" onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                        '</div>' +
                        '   </div>' +
                        '</div>';

                    $("#div-evaluaciones").append(Preguntas);

                    $.inicialEditoPregEnsayo(cons);
                    cons++;
                    $("#ConsPreguntas").val(cons);
                    ///
                    $("#div-addpreg").hide();
                    //  $("#btns_guardar").show();

                },
                ////////////GUARDAR PREGUNTAS TIPO ENSAYO
                GuardarEvalEnsayo: function(id) {
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());
                    $("#PregConse").val(id);
                    $("#id-pregensay").val($("#id-pregensay" + id).val());


                    var form = $("#formAsigEval");
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
                            ' <textarea cols="80" id="pregEditEnsayo' + cons +
                            '" name="pregEditEnsayo" rows="3"></textarea>' +
                            '<br>' +
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
                            '    <button type="button"  id="btnDel' + cons + '" data-id="' + cons +
                            '" data-nombre="id-pregensay' + cons +
                            '"  onclick="$.DelPregunta(this.id)" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                            '</div>' +
                            '   </div>' +
                            '</div>';

                        $("#Preguntas" + cons).html(Preguntas);
                        $.inicialEditoPregEnsayo(cons);
                        $('#PregEnsay' + cons).val(preg);
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
                //AGREGAR PREGUNTA COMPLETE
                AddPregComplete: function() {
                    edit = "no";
                    var cons = parseFloat($("#ConsPreguntas").val());
                    $("#MensInf").hide();

                    var Preguntas = '<div id="Preguntas' + cons + '" style="padding-bottom: 10px;">' +
                        ' <div class="bs-callout-primary  callout-bordered callout-transparent p-1">' +
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
                        '<input type="hidden" id="id-pregcomplete' + cons +
                        '"  value="" />' +
                        '<input type="hidden" id="Tipreguntas' + cons +
                        '"  value="COMPLETE" />' +
                        '            <div class="col-md-12 right">' +
                        '<div id="PuntComplete' + cons + '">' +
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
                        '        <label class="form-label"><b>Ingrese las Opciones:</b></label>' +
                        '<div id="PregOpciones' + cons + '">' +
                        '    <select class="form-control select2" multiple="multiple" style="width: 100%;" data-placeholder="Ingrese las Opciones"' +
                        '  id="cb_Opciones" name="cb_Opciones[]">' +
                        '</select>' +
                        '</div>' +
                        '</div>' +
                        '      </div>' +
                        '  <div class="col-md-12"> ' +
                        '     <div class="form-group">' +
                        '        <label class="form-label"><b>Ingrese el parrafo a completar:</b></label>' +
                        '<div id="DivParrCompleta' + cons + '">' +
                        '  <textarea cols="80" id="pregEditComplete' + cons +
                        '" name="pregEditComplete" rows="3"></textarea>' +
                        '  <br>' +
                        '</div>' +
                        '</div>' +
                        '      </div>' +
                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                        '    <button type="button" onclick="$.GuardarEvalComplete(' + cons +
                        ');" id="Btn-guardarPreg' + cons +
                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                        '    <button type="button" id="Btn-EditPreg' + cons +
                        '"  style="display:none;" onclick="$.EditPreguntascomplete(' + cons +
                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                        '    <button type="button" id="btnDel' + cons + '" data-id="' + cons +
                        '" data-nombre="id-pregcomplete' + cons +
                        '"  onclick="$.DelPregunta(this.id)" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                        '</div>' +
                        '   </div>' +
                        '</div>';

                    $("#div-evaluaciones").append(Preguntas);

                    $.inicialEditorComplete(cons);
                    cons++;
                    $("#ConsPreguntas").val(cons);
                    ///
                    $("#cb_Opciones").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        tags: true
                    });

                    $("#div-addpreg").hide();
                    $("#btns_guardar").show();

                },
                ////////////GUARDAR PREGUNTAS TIPO COMPLETE
                GuardarEvalComplete: function(id) {

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());
                    $("#PregConse").val(id);
                    $("#id-pregcomplete").val($("#id-pregcomplete" + id).val());

                    var form = $("#formAsigEval");
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

                                $("#id-pregcomplete" + id).val(respuesta.ContPreComplete
                                    .id);


                                $("#PuntComplete" + id).html('<fieldset >' +
                                    '        <div class="input-group">' +
                                    '          <input type="text" id="PuntEdit' + id +
                                    '" class="form-control"' +
                                    '     value="' + respuesta.ContPreComplete.puntaje +
                                    '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                    '          <div class="input-group-append">' +
                                    '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>');
                                $("#PregOpciones" + id).html(respuesta.ContPreComplete
                                    .opciones);
                                $("#DivParrCompleta" + id).html(respuesta.ContPreComplete
                                    .parrafo);
                                edit = "si";
                            } else {
                                mensaje = "La Evaluación no pudo ser Guardada";
                                Swal.fire({
                                    title: "Gestionar Evaluaciones",
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
                //EDITAR PREGUNTA COMPLETE

                EditPreguntascomplete: function(cons) {
                    if (edit === "si") {

                        var form = $("#formAuxiliarEval");
                        var id = $("#id-pregcomplete" + cons).val();

                        var opci = "";
                        var parr = "";
                        var punt = "";

                        $("#Pregunta").remove();
                        $("#TipPregunta").remove();
                        form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                            id + "'>");
                        form.append(
                            "<input type='hidden' name='TipPregunta' id='TipPregunta' value='COMPLETE'>"
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
                                opci = respuesta.PregComple.opciones;
                                parr = respuesta.PregComple.parrafo;
                                punt = respuesta.PregComple.puntaje
                            }
                        });

                        let puntPre = punt;
                        let puntmax = $("#Punt_Max").val();
                        let total = parseInt(puntmax) - parseInt(puntPre);
                        $("#Punt_Max").val(total);

                        var Preguntas = '<div id="Preguntas' + cons +
                            '" style="padding-bottom: 10px;">' +
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
                            '<input type="hidden" id="id-pregcomplete' + cons +
                            '"  value="' + id + '" />' +
                            '<input type="hidden" id="Tipreguntas' + cons +
                            '"  value="COMPLETE" />' +
                            '            <div class="col-md-12 right">' +
                            '<div id="PuntComplete' + cons + '">' +
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
                            '</div>' +
                            '            </div>' +
                            '          </div>' +
                            '        </div>' +
                            '      </div>' +
                            '  <div class="col-md-12"> ' +
                            '     <div class="form-group">' +
                            '        <label class="form-label"><b>Ingrese las Opciones:</b></label>' +
                            '<div id="PregOpciones' + cons + '">' +
                            '    <select class="select2 form-control " multiple="multiple" style="width: 100%;" data-placeholder="Ingrese las Opciones"' +
                            '  id="cb_Opciones" name="cb_Opciones[]">' +
                            '</select>' +
                            '</div>' +
                            '</div>' +
                            '      </div>' +
                            '  <div class="col-md-12"> ' +
                            '     <div class="form-group">' +
                            '        <label class="form-label"><b>Ingrese el parrafo a completar:</b></label>' +
                            '<div id="DivParrCompleta' + cons + '">' +
                            '  <textarea cols="80" id="pregEditComplete' + cons +
                            '" name="pregEditComplete" rows="3"></textarea>' +
                            '  <br>' +
                            '</div>' +
                            '         <br>' +
                            '</div>' +
                            '</div>' +
                            '      </div>' +
                            '<div class="form-group"  style="margin-bottom: 0px;">' +
                            '    <button type="button" onclick="$.GuardarEvalComplete(' + cons +
                            ');" id="Btn-guardarPreg' + cons +
                            '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                            '    <button type="button" id="Btn-EditPreg' + cons +
                            '"  style="display:none;" onclick="$.EditPreguntascomplete(' + cons +
                            ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                            '    <button type="button"  id="btnDel' + cons + '" data-id="' + cons +
                            '" data-nombre="id-pregcomplete' + cons +
                            '"  onclick="$.DelPregunta(this.id)" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                            '</div>' +
                            '   </div>' +
                            '</div>';


                        $("#Preguntas" + cons).html(Preguntas);
                        $("#cb_Opciones").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            tags: true
                        });
                        $.inicialEditorComplete(cons);
                        var resp = opci.split(",");
                        var options;
                        $.each(resp, function(index, value) {
                            options += '<option value="' + value + '">' + value + '</option>';
                        });

                        $("#cb_Opciones").html(options);


                        $("#cb_Opciones").val(resp).change();
                        $('#pregEditComplete' + cons).val(parr);

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

                //AGREGAR PREGUNTA OPCION MULTIPLE
                AddPregOpcMultiple: function() {
                    edit = "no";
                    var cons = parseFloat($("#ConsPreguntas").val());
                    $("#MensInf").hide();

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

                    $("#div-evaluaciones").append(Preguntas);

                    $.inicialEditorPreMul("1");
                    $.inicialEditorPreOpcMul("1");
                    cons++;
                    $("#ConsPreguntas").val(cons);
                    $("#div-addpreg").hide();
                    $("#btns_guardar").show();

                },
                ////////////GUARDAR PREGUNTAS TIPO OPCION MULTIPLE
                GuardarEvalOpcMult: function(id) {
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }
                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());

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
                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());
                    var form = $("#formAsigEval");
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
                                $('#Btn-guardarPreg' + id).prop('disabled', false);


                                $("#Btn-guardarPreg" + id).hide();
                                $("#Btn-EditPreg" + id).show();
                                $("#div-addpreg").show();

                                $("#id-preopcmult" + id).val(respuesta.PregOpcMul.id);



                                $("#PuntMultiple" + id).html('<fieldset >' +
                                    '        <div class="input-group">' +
                                    '          <input type="text" id="PuntEdit' + id +
                                    '" class="form-control"' +
                                    '     value="' + respuesta.PregOpcMul.puntuacion +
                                    '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                    '          <div class="input-group-append">' +
                                    '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>');

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
                                        .opciones + '</label>' +
                                        '</fieldset>';

                                });


                                $("#DivOpcionesMultiples" + id).html(opciones);


                                edit = "si";
                            } else {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "La evaluación no pude ser guardada",
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


                },
                //EDITAR PREGUNTA COMPLETE
                EditPreguntasOpcMult: function(cons) {
                    if (edit === "si") {

                        var form = $("#formAuxiliarEval");
                        var id = $("#id-preopcmult" + cons).val();

                        var opci = "";
                        var parr = "";
                        var punt = "";

                        $("#Pregunta").remove();
                        $("#TipPregunta").remove();
                        form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                            id + "'>");
                        form.append(
                            "<input type='hidden' name='TipPregunta' id='TipPregunta' value='OPCMULT'>"
                        );
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
                                        .val(item.opciones);

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
                DelOpcPreg: function(id) {
                    $('#RowOpcPreg' + id).remove();

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
                //AGREGAR PREGUNTA VERDADERO Y FALSO
                AddPregVerdFalso: function() {
                    edit = "no";
                    var cons = parseFloat($("#ConsPreguntas").val());
                    $("#MensInf").hide();

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
                        '<input type="hidden" id="id-pregverfal' + cons +
                        '"  value="" />' +
                        '<input type="hidden" id="Tipreguntas' + cons +
                        '"  value="VERFAL" />' +
                        '            <div class="col-md-12 right">' +
                        '<div id="PuntVerFal' + cons + '">' +
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
                        '     <div class="form-group" >' +
                        '        <label class="form-label"><b>Contenido de Pregunta:</b></label>' +
                        '<div id="PregVerFal' + cons + '">' +
                        '         <textarea cols="80" id="pregverdFals' + cons +
                        '" name="pregverdFals" rows="3"></textarea>' +
                        '         <br>' +
                        '</div>' +
                        '<div class="col-md-4 border-bottom-cyan" id="CheckResp' + cons + '"  >' +
                        '           <div class="form-group row">' +
                        '<div class="col-md-12">' +
                        '    <fieldset >' +
                        '        <div class="input-group">' +
                        '          <input  name="radpregVerFal[]" checked="" value="si" type="radio">' +
                        '          <div class="input-group-append" style="margin-left:5px;">' +
                        '            <span  id="basic-addon2">Verdadero</span>' +
                        '          </div>' +
                        '        </div>' +
                        '      </fieldset>' +
                        '</div>' +
                        '<div  class="col-md-12">' +
                        '    <fieldset >' +
                        '        <div class="input-group">' +
                        '          <input  name="radpregVerFal[]"  value="no" type="radio">' +
                        '          <div class="input-group-append" style="margin-left:5px;">' +
                        '            <span  id="basic-addon2">Falso</span>' +
                        '          </div>' +
                        '        </div>' +
                        '      </fieldset>' +
                        '</div>' +
                        '            </div>' +
                        '          </div>' +
                        '</div>' +
                        '      </div>' +
                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                        '    <button type="button" onclick="$.GuardarEvalVerFal(' + cons +
                        ');" id="Btn-guardarPreg' + cons +
                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                        '    <button type="button" id="Btn-EditPreg' + cons +
                        '"  style="display:none;" onclick="$.EditPreguntasVerFal(' + cons +
                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                        '    <button type="button" id="btnDel' + cons + '" data-id="' + cons +
                        '" data-nombre="id-pregverfal' + cons +
                        '"  onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                        '</div>' +
                        '   </div>' +
                        '</div>';

                    $("#div-evaluaciones").append(Preguntas);

                    $.inicialEditorVerdFal(cons);
                    cons++;
                    $("#ConsPreguntas").val(cons);
                    ///
                    $("#div-addpreg").hide();
                    $("#btns_guardar").show();

                },
                ////////////GUARDAR PREGUNTAS VERDADERO Y FALSO
                GuardarEvalVerFal: function(id) {
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }
                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());
                    $("#PregConse").val(id);
                    $("#id-pregverfal").val($("#id-pregverfal" + id).val());
                    var form = $("#formAsigEval");
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

                                $("#id-pregverfal" + id).val(respuesta.ContPregVerFal.id);

                                $("#PuntVerFal" + id).html('<fieldset >' +
                                    '        <div class="input-group">' +
                                    '          <input type="text" id="PuntEdit' + id +
                                    '" class="form-control"' +
                                    '     value="' + respuesta.ContPregVerFal.puntaje +
                                    '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                    '          <div class="input-group-append">' +
                                    '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>');
                                $("#PregVerFal" + id).html(respuesta.ContPregVerFal
                                    .pregunta);
                                var Opc = '<div class="form-group row">' +
                                    '<div class="col-md-12">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">';
                                if (respuesta.ContPregVerFal.respuesta === "si") {
                                    Opc +=
                                        '<input   checked="" value="si" disabled type="radio">';

                                } else {
                                    Opc +=
                                        ' <input   value="si" disabled type="radio">';

                                }

                                Opc +=
                                    ' <div class="input-group-append" style="margin-left:5px;">' +
                                    '            <span  id="basic-addon2">Verdadero</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '<div  class="col-md-12">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">';
                                if (respuesta.ContPregVerFal.respuesta === "no") {
                                    Opc +=
                                        '<input   checked="" value="si" disabled type="radio">';

                                } else {
                                    Opc += '<input  value="si" disabled type="radio">';

                                }
                                Opc +=
                                    '<div class="input-group-append" style="margin-left:5px;">' +
                                    '            <span  id="basic-addon2">Falso</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '            </div>';

                                $("#CheckResp" + id).html(Opc);

                                edit = "si";
                            } else {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "La pregunta no pudo ser guardada",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                            }
                        },
                        error: function(error_messages) {
                            Swal.fire({
                                type: "alert",
                                title: "Oops...",
                                text: "Ha ocurrido un error",
                                confirmButtonClass: "btn btn-primary",
                                timer: 1500,
                                buttonsStyling: false
                            });
                        }
                    });


                },
                //EDITAR PREGUNTA VERDADERO Y FALSO
                EditPreguntasVerFal: function(cons) {
                    if (edit === "si") {
                        var form = $("#formAuxiliarEval");
                        var id = $("#id-pregverfal" + cons).val();
                        var preg = "";
                        var punt = "";
                        var opci = "";
                        $("#Pregunta").remove();
                        $("#TipPregunta").remove();
                        form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                            id + "'>");
                        form.append(
                            "<input type='hidden' name='TipPregunta' id='TipPregunta' value='VERFAL'>"
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
                                punt = respuesta.PregVerFal.puntaje;
                                preg = respuesta.PregVerFal.pregunta;
                                resp = respuesta.PregVerFal.respuesta;
                            }
                        });

                        let puntPre = punt;
                        let puntmax = $("#Punt_Max").val();
                        let total = parseInt(puntmax) - parseInt(puntPre);
                        $("#Punt_Max").val(total);

                        var Preguntas = '<div id="Preguntas' + cons +
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
                            '<input type="hidden" id="id-pregverfal' + cons +
                            '"  value="' + id + '" />' +
                            '<input type="hidden" id="Tipreguntas' + cons +
                            '"  value="VERFAL" />' +
                            '            <div class="col-md-12 right">' +
                            '<div id="PuntVerFal' + cons + '">' +
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
                            '     <div class="form-group" >' +
                            '        <label class="form-label"><b>Contenido de Pregunta:</b></label>' +
                            '<div id="PregVerFal' + cons + '">' +
                            '         <textarea cols="80" id="pregverdFals' + cons +
                            '" name="pregverdFals" rows="3"></textarea>' +
                            '         <br>' +
                            '</div>' +
                            '<div class="col-md-4 border-bottom-cyan" id="CheckResp' + cons + '"  >' +
                            '           <div class="form-group row">' +
                            '<div class="col-md-12">' +
                            '    <fieldset >' +
                            '        <div class="input-group">';
                        if (resp === "si") {
                            Preguntas +=
                                '          <input  name="radpregVerFal[]" checked="" value="si" type="radio">';
                        } else {
                            Preguntas +=
                                '          <input  name="radpregVerFal[]"  value="si" type="radio">';
                        }
                        Preguntas +=
                            '          <div class="input-group-append" style="margin-left:5px;">' +
                            '            <span  id="basic-addon2">Verdadero</span>' +
                            '          </div>' +
                            '        </div>' +
                            '      </fieldset>' +
                            '</div>' +
                            '<div  class="col-md-12">' +
                            '    <fieldset >' +
                            '        <div class="input-group">';
                        if (resp === "no") {
                            Preguntas +=
                                '          <input  name="radpregVerFal[]"  checked="" value="no" type="radio">';

                        } else {
                            Preguntas +=
                                '          <input  name="radpregVerFal[]"  value="no" type="radio">';

                        }

                        Preguntas +=
                            '          <div class="input-group-append" style="margin-left:5px;">' +
                            '            <span  id="basic-addon2">Falso</span>' +
                            '          </div>' +
                            '        </div>' +
                            '      </fieldset>' +
                            '</div>' +
                            '            </div>' +
                            '          </div>' +
                            '</div>' +
                            '      </div>' +
                            '<div class="form-group"  style="margin-bottom: 0px;">' +
                            '    <button type="button" onclick="$.GuardarEvalVerFal(' + cons +
                            ');" id="Btn-guardarPreg' + cons +
                            '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                            '    <button type="button" id="Btn-EditPreg' + cons +
                            '"  style="display:none;" onclick="$.EditPreguntasVerFal(' + cons +
                            ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                            '    <button type="button" id="btnDel' + cons + '" data-id="' + cons +
                            '" data-nombre="id-pregverfal' + cons +
                            '"  onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                            '</div>' +
                            '   </div>' +
                            '</div>';

                        $("#Preguntas" + cons).html(Preguntas);

                        $.inicialEditorVerdFal(cons);
                        $('#pregverdFals' + cons).val(preg);
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
                //AGREGAR PREGUNTA  RELACIONE
                AddPregRelacione: function() {
                    edit = "no";
                    var cons = parseFloat($("#ConsPreguntas").val());
                    $("#MensInf").hide();

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
                        '<input type="hidden" id="id-relacione' + cons +
                        '"  value="" />' +
                        '<input type="hidden" id="Tipreguntas' + cons +
                        '"  value="RELACIONE" />' +
                        '            <div class="col-md-12 right">' +
                        '<div id="PuntRelacione' + cons + '">' +
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
                        '  <div class="col-md-12 pb-1"> ' +
                        '<div id="ConsEnunRel' + cons + '">' +
                        '                     <textarea cols="80" class="txtareaR" id="EnuncRelacione" name="EnuncRelacione"' +
                        '                        rows="3"></textarea>' +
                        '</div>' +
                        '</div>' +
                        '  <div class="col-md-12"> ' +
                        '     <div class="form-group">' +

                        '<div id="DivOpcionesRelacione' + cons + '">' +
                        '<input type="hidden" class="form-control" id="ConsOpcRel" value="2" />' +
                        '<div id="RowRelPreg' + cons + '">' +
                        '                 <div class="row top-buffer" id="RowOpcRelPreg1" style="padding-bottom: 15px;">' +
                        '                      <div class="col-lg-6 border-top-primary">' +
                        ' <input type="hidden" class="form-control" name="Mesnsaje[]" value="1" />' +
                        '        <label class="form-label"><b>Indicaciones:</b></label>' +
                        '                     <textarea cols="80" class="txtareaM" id="Mensaje1" name="txtopcpreg[]"' +
                        '                        rows="3"></textarea>' +
                        '     </div>' +
                        '                      <div class="col-lg-6 border-top-primary">' +
                        ' <input type="hidden" class="form-control" name="respuestas[]" value="1" />' +
                        '        <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                        '                     <textarea cols="80" class="txtareaR" id="Respuesta1" name="txtopcResp[]"' +
                        '                        rows="3"></textarea>' +
                        '     </div>' +
                        '      </div>' +
                        '   </div>' +
                        '   <div class="row" id="divaddpar' + cons + '">' +
                        '  <button id="AddOpcPre" onclick="$.AddOpcionPar(' + cons +
                        ');" type="button" class="btn-sm  btn-success"><i class="fa fa-plus"></i> Agregar Par</button> ' +
                        '</div>' +
                        ' <div class="row">' +
                        '  <label class="form-label pt-2"><b>Respuestas Adicionales:</b></label>' +
                        '<input type="hidden" class="form-control" id="ConsOpcRelAdd" value="1" />' +
                        '</div>' +
                        ' <div class="row" id="DivRespAdd' + cons + '"></div>' +
                        '<div class="row" id="divaddpre">' +
                        '  <button  onclick="$.AddOpcionRespAdd(' + cons +
                        ');" type="button" class="btn-sm  btn-success"><i class="fa fa-plus"></i> Agregar Respuesta</button> ' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '      </div>' +
                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                        '    <button type="button" onclick="$.GuardarEvalRelacione(' + cons +
                        ');" id="Btn-guardarPreg' + cons +
                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                        '    <button type="button" id="Btn-EditPreg' + cons +
                        '"  style="display:none;" onclick="$.EditPreguntasRelacione(' + cons +
                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                        '    <button type="button" id="btnDel' + cons + '" data-id="' + cons +
                        '" data-nombre="id-relacione' + cons +
                        '"  onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                        '</div>' +
                        '   </div>' +
                        '</div>';

                    $("#div-evaluaciones").append(Preguntas);

                    $.inicialEditorEnunciadoRelacione();
                    $.inicialEditorMensaje("1");
                    $.inicialEditorRespuesta("1");
                    cons++;
                    $("#ConsPreguntas").val(cons);
                    ///
                    $("#div-addpreg").hide();
                    $("#btns_guardar").show();

                },
                AddOpcionPar: function(id) {
                    var cons = $("#ConsOpcRel").val();


                    var preguntas = '<div class="row top-buffer" id="RowOpcRelPreg' + cons +
                        '" style="padding-bottom: 15px;">' +
                        '                      <div class="col-lg-6 border-top-primary">' +
                        ' <input type="hidden" class="form-control" name="Mesnsaje[]" value="' + cons +
                        '" />' +
                        '        <label class="form-label"><b>Mensaje:</b></label>' +
                        '                     <textarea cols="80" class="txtareaM" id="Mensaje' +
                        cons +
                        '" name="txtopcpreg[]"' +
                        '                        rows="3"></textarea>' +
                        '     </div>' +
                        ' <div class="col-lg-6 border-top-primary">' +
                        ' <input type="hidden" class="form-control" name="respuestas[]" value="' +
                        cons + '" />' +
                        '  <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                        '   <textarea cols="80" class="txtareaR" id="Respuesta' + cons +
                        '" name="txtopcResp[]" rows="3"></textarea>' +
                        '     </div>' +
                        '     <div class="col-lg-12 pt-2">' +
                        '<button type="button" onclick="$.DelOpcRelacione(' + cons +
                        ')" class="btn mr-1 mb-1 btn-success btn-sm float-right"><i class="fa fa-trash"></i> Eliminar Par</button>' +
                        "     </div>" +
                        '      </div>' +
                        " </div>";

                    $("#RowRelPreg" + id).append(preguntas);
                    $("#ConsOpcRel").val(parseFloat(cons) + 1);

                    $.inicialEditorMensaje(cons);
                    $.inicialEditorRespuesta(cons);
                },
                AddOpcionRespAdd: function(x) {
                    var cons = $("#ConsOpcRelAdd").val();

                    var preguntas = '<div class="row top-buffer" id="RowOpcRelPregAdd' + cons +
                        '" style="padding-bottom: 15px;">' +
                        '                      <div class="col-lg-6 border-top-primary">' +
                        '     </div>' +
                        ' <div class="col-lg-6 border-top-primary">' +
                        ' <input type="hidden" class="form-control" name="respuestas[]" value="-" />' +
                        '  <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                        '   <textarea cols="80" id="RespuestaAdd' + cons +
                        '" name="txtopcResp[]" rows="3"></textarea>' +
                        '     </div>' +
                        '     <div class="col-lg-12 pt-2">' +
                        '<button type="button" onclick="$.DelOpcRelacioneAdd(' + cons +
                        ')" class="btn mr-1 mb-1 btn-success btn-sm float-right"><i class="fa fa-trash"></i> Eliminar Respuesta</button>' +
                        "     </div>" +
                        '      </div>' +
                        " </div>";
                    console.log(x);

                    $("#DivRespAdd" + x).append(preguntas);
                    $("#ConsOpcRelAdd").val(parseFloat(cons) + 1);

                    $.inicialEditorRespuestaAdd(cons);
                },
                DelOpcRelacione: function(id) {
                    $('#RowOpcRelPreg' + id).remove();

                },
                DelOpcRelacioneAdd: function(id) {
                    $('#RowOpcRelPregAdd' + id).remove();

                },

                calificar: function(idEval) {
                    $("#idEvaluacion").val(idEval);

                    // $("#titPractica").html("CALIFICACIÓN DE EVALUACIÓN");
                    $("#div-listEval").hide();
                    $("#detCalificacion").show();
                    $("#tr_alumnos").html("");
                    ////CARGAR ALUMNOS DE GRADO Y GRUPO CORRESPONDIENTES AL TEMA 

                },
                ////////////GUARDAR PREGUNTAS RELACIONE
                GuardarEvalRelacione: function(id) {
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }
                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());
                    $("#PregConse").val(id);
                    $("#id-relacione").val($("#id-relacione" + id).val());
                    var form = $("#formAsigEval");
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
                                $("#id-relacione" + id).val(respuesta.PregRel.id);


                                $("#PuntRelacione" + id).html('<fieldset >' +
                                    '        <div class="input-group">' +
                                    '          <input type="text" id="PuntEdit' + id +
                                    '" class="form-control"' +
                                    '     value="' + respuesta.PregRel.puntaje +
                                    '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                    '          <div class="input-group-append">' +
                                    '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>');

                                $("#ConsEnunRel" + id).html(respuesta.PregRel.enunciado);
                                var cons = 1;
                                var preguntas = "";
                                $.each(respuesta.PregRelIndi, function(k, item) {
                                    preguntas +=
                                        '<div class="row top-buffer" id="RowOpcRelPreg' +
                                        cons +
                                        '" style="padding-bottom: 15px;">' +
                                        '                      <div class="col-lg-6 border-top-primary">' +
                                        '        <label class="form-label"><b>Mensaje:</b></label>' +
                                        '<div id="mesaje' + id + cons + '"></div>' +
                                        '     </div>' +
                                        ' <div class="col-lg-6 border-top-primary">' +
                                        '  <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                                        '<div id="respuesta' + id + cons +
                                        '"></div>' +
                                        '     </div>' +
                                        '      </div>' +
                                        ' </div>';
                                    cons++;
                                });

                                $("#RowRelPreg" + id).html(preguntas);
                                cons = 1;
                                $.each(respuesta.PregRelIndi, function(k, item) {
                                    $("#mesaje" + id + cons).html(item.definicion);
                                    cons++;
                                });

                                cons = 1;
                                $.each(respuesta.PregRelResp, function(k, item) {
                                    if (item.correcta !== "-") {
                                        $("#respuesta" + id + cons).html(item
                                            .respuesta);
                                        cons++;
                                    }
                                });
                                preguntas = "";
                                cons = 1;
                                $.each(respuesta.PregRelResp, function(k, item2) {
                                    if (item2.correcta === "-") {
                                        preguntas +=
                                            '<div class="row top-buffer" id="RowOpcRelPregAdd' +
                                            cons +
                                            '" style="padding-bottom: 15px;width: 100%;">' +
                                            '                      <div class="col-lg-6 border-top-primary">' +
                                            '     </div>' +
                                            ' <div class="col-lg-6 border-top-primary" >' +
                                            '  <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                                            '   <div id="respuestaadd' + id + cons +
                                            '"></div>' +
                                            '     </div>' +
                                            '      </div>' +
                                            " </div>";
                                    }
                                    cons++;
                                });

                                $("#DivRespAdd" + id).html(preguntas);

                                cons = 1;
                                $.each(respuesta.PregRelResp, function(k, item2) {
                                    if (item2.correcta === "-") {
                                        $("#respuestaadd" + id + cons).html(item2
                                            .respuesta);
                                    }
                                    cons++;
                                });

                                $("#divaddpar" + id).remove();
                                $("#divaddpre" + id).remove();

                                edit = "si";
                            } else {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "La pregunta no pudo ser guardada",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                            }
                        },
                        error: function(error_messages) {
                            Swal.fire({
                                type: "alert",
                                title: "Oops...",
                                text: "Ha ocurrido un error",
                                confirmButtonClass: "btn btn-primary",
                                timer: 1500,
                                buttonsStyling: false
                            });
                        }
                    });


                },
                //EDITAR PREGUNTA RELACIONE
                EditPreguntasRelacione: function(cons) {
                    $("#div-addpreg").hide();
                    if (edit === "si") {
                        var form = $("#formAuxiliarEval");
                        var id = $("#id-relacione" + cons).val();

                        var preg = "";
                        var punt = "";
                        var comp = "";

                        $("#Pregunta").remove();
                        $("#TipPregunta").remove();
                        form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                            id + "'>");
                        form.append(
                            "<input type='hidden' name='TipPregunta' id='TipPregunta' value='RELACIONE'>"
                        );
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
                                punt = respuesta.PregRelacione.puntaje;

                                let puntPre = punt;
                                let puntmax = $("#Punt_Max").val();
                                let total = parseInt(puntmax) - parseInt(puntPre);
                                $("#Punt_Max").val(total);

                                Preguntas += '<div id="Preguntas' + cons +
                                    '" style="padding-bottom: 10px;">' +
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
                                    '<input type="hidden" id="id-relacione' + cons +
                                    '"  value="' + id + '" />' +
                                    '<input type="hidden" id="Tipreguntas' + cons +
                                    '"  value="RELACIONE" />' +
                                    '            <div class="col-md-12 right">' +
                                    '<div id="PuntRelacione' + cons + '">' +
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
                                    '</div>' +
                                    '            </div>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </div>' +
                                    '  <div class="col-md-12 pb-1"> ' +
                                    '<div id="ConsEnunRel' + cons + '">' +
                                    '                     <textarea cols="80" class="txtareaR" id="EnuncRelacione" name="EnuncRelacione"' +
                                    '                        rows="3"></textarea>' +
                                    '</div>' +
                                    '</div>' +
                                    '  <div class="col-md-12"> ' +
                                    '     <div class="form-group">' +

                                    '<div id="DivOpcionesRelacione' + cons + '">' +
                                    '<input type="hidden" class="form-control" id="ConsOpcRel" value="2" />' +
                                    '<div id="RowRelPreg' + cons + '">';

                                $.each(respuesta.PregRelIndi, function(k, item) {
                                    Preguntas +=
                                        '<div class="row top-buffer" id="RowOpcRelPreg' +
                                        j + '" style="padding-bottom: 15px;">' +
                                        '                      <div class="col-lg-6 border-top-primary">' +
                                        ' <input type="hidden" class="form-control" name="Mesnsaje[]" value="' +
                                        j + '" />' +
                                        '        <label class="form-label"><b>Indicaciones:</b></label>' +
                                        '                     <textarea cols="80" id="Mensaje' +
                                        j + '" name="txtopcpreg[]"' +
                                        '                        rows="3"></textarea>' +
                                        '     </div>' +
                                        '                      <div class="col-lg-6 border-top-primary">' +
                                        ' <input type="hidden" class="form-control" name="respuestas[]" value="' +
                                        j + '" />' +
                                        '        <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                                        '                     <textarea cols="80" id="Respuesta' +
                                        j + '" name="txtopcResp[]"' +
                                        '                        rows="3"></textarea>' +
                                        '     </div>' +
                                        '     <div class="col-lg-12 pt-2">' +
                                        '<button type="button" onclick="$.DelOpcRelacione(' +
                                        j +
                                        ')" class="btn mr-1 mb-1 btn-success btn-sm float-right"><i class="fa fa-trash"></i> Eliminar Par</button>' +
                                        '     </div>' +
                                        '      </div>';
                                    j++;
                                });


                                Preguntas += '   </div>' +
                                    '   <div class="row" id="divaddpar' + cons + '">' +
                                    '  <button id="AddOpcPre" onclick="$.AddOpcionPar(' +
                                    cons +
                                    ');" type="button" class="btn-sm  btn-success"><i class="fa fa-plus"></i> Agregar Par</button> ' +
                                    '</div>' +
                                    ' <div class="row">' +
                                    '  <label class="form-label pt-2"><b>Respuestas Adicionales:</b></label>' +
                                    '<input type="hidden" class="form-control" id="ConsOpcRelAdd" value="1" />' +
                                    '</div>' +
                                    ' <div class="row" id="DivRespAdd' + cons + '">';
                                j = 1;
                                $.each(respuesta.PregRelRespAdd, function(k, item) {

                                    Preguntas +=
                                        '<div class="row top-buffer" id="RowOpcRelPregAdd' +
                                        j +
                                        '" style="padding-bottom: 15px;">' +
                                        '                      <div class="col-lg-6 border-top-primary">' +
                                        '     </div>' +
                                        ' <div class="col-lg-6 border-top-primary">' +
                                        ' <input type="hidden" class="form-control"  name="respuestas[]" value="-" />' +
                                        '  <label class="form-label"><b>Respuesta Enviada:</b></label>' +
                                        '   <textarea cols="80" id="RespuestaAdd' +
                                        j +
                                        '" name="txtopcResp[]" rows="3"></textarea>' +
                                        '     </div>' +
                                        '     <div class="col-lg-12 pt-2">' +
                                        '<button type="button" onclick="$.DelOpcRelacioneAdd(' +
                                        j +
                                        ')" class="btn mr-1 mb-1 btn-success btn-sm float-right"><i class="fa fa-trash"></i> Eliminar Respuesta</button>' +
                                        "     </div>" +
                                        '      </div>';
                                    j++;
                                });

                                Preguntas += '</div>' +
                                    '<div class="row" id="divaddpre' + cons + '">' +
                                    '  <button  onclick="$.AddOpcionRespAdd(' + cons +
                                    ');" type="button" class="btn-sm  btn-success"><i class="fa fa-plus"></i> Agregar Respuesta</button> ' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '      </div>' +
                                    '<div class="form-group"  style="margin-bottom: 0px;">' +
                                    '    <button type="button" onclick="$.GuardarEvalRelacione(' +
                                    cons +
                                    ');" id="Btn-guardarPreg' + cons +
                                    '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                                    '    <button type="button" id="Btn-EditPreg' + cons +
                                    '"  style="display:none;" onclick="$.EditPreguntasRelacione(' +
                                    cons +
                                    ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                                    '    <button type="button" id="btnDel' + cons +
                                    '" data-id="' + cons +
                                    '" data-nombre="id-relacione' + cons +
                                    '"  onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                                    '</div>' +
                                    '   </div>' +
                                    '</div>';


                                $("#Preguntas" + cons).html(Preguntas);
                                j = 1;

                                $.inicialEditorEnunciadoRelacione();
                                $("#EnuncRelacione").val(respuesta.PregRelacione.enunciado);

                                $.each(respuesta.PregRelIndi, function(k, item) {
                                    $.inicialEditorMensaje(j);
                                    $('#Mensaje' + j).val(item
                                        .definicion);
                                    j++;
                                    $("#ConsOpcRel").val(j);
                                });
                                j = 1;
                                $.each(respuesta.PregRelResp, function(k, item) {
                                    if (item.correcta !== "-") {
                                        $.inicialEditorRespuesta(j);
                                        $('#Respuesta' + j).val(item
                                            .respuesta);
                                        j++;
                                    }

                                });
                                j = 1;
                                $.each(respuesta.PregRelRespAdd, function(k, item) {
                                    $.inicialEditorRespuestaAdd(j);

                                    $('#RespuestaAdd' + j).val(item
                                        .respuesta);
                                    j++;

                                    $("#ConsOpcRelAdd").val(j);
                                });


                                cons++;
                                $("#ConsPreguntas").val(cons);


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
                //AGREGAR ARCHIVO
                AddPregArchivo: function() {
                    edit = "no";
                    var cons = parseFloat($("#ConsPreguntas").val());
                    $("#MensInf").hide();

                    var Preguntas = '<div id="Preguntas' + cons + '" style="padding-bottom: 10px;">' +
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
                        '<input type="hidden" id="id-taller' + cons +
                        '"  value="" />' +
                        '<input type="hidden" id="Tipreguntas' + cons +
                        '"  value="TALLER" />' +
                        '            <div class="col-md-12 right">' +
                        '<div id="PuntTaller' + cons + '">' +
                        '    <fieldset >' +
                        '        <div class="input-group">' +
                        '          <input type="text" class="form-control" id="puntaje"' +
                        '    name="puntaje" value="10" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                        '          <div class="input-group-append">' +
                        '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                        '          </div>' +
                        '        </div>' +
                        '      </fieldset>' +
                        '      </div>' +
                        '            </div>' +
                        '          </div>' +
                        '        </div>' +
                        '      </div>' +
                        '  <div class="col-md-12"> ' +
                        '     <div class="form-group">' +
                        '<div id="PregTaller' + cons + '">' +
                        '             <label>Seleccionar Archivo: </label>' +
                        '<label id="projectinput7" class="file center-block"><br>' +
                        '    <input id="archiTaller"  name="archiTaller" type="file">' +
                        '    <span class="file-custom"></span>' +
                        ' </label>' +
                        '         <br>' +
                        '</div>' +
                        '</div>' +
                        '      </div>' +
                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                        '    <button type="button" onclick="$.GuardarEvalTaller(' + cons +
                        ');" id="Btn-guardarPreg' + cons +
                        '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                        '    <button type="button" id="Btn-EditPreg' + cons +
                        '"  style="display:none;" onclick="$.EditPreguntasTaller(' + cons +
                        ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                        '    <button type="button" id="btnDel' + cons + '" data-id="' + cons +
                        '" data-nombre="id-taller' + cons +
                        '"  onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                        '</div>' +
                        '   </div>' +
                        '</div>';

                    $("#div-evaluaciones").append(Preguntas);

                    cons++;
                    $("#ConsPreguntas").val(cons);
                    ///
                    $("#div-addpreg").hide();
                    $("#btns_guardar").show();

                },
                ////////////GUARDAR PREGUNTAS TALLER
                GuardarEvalTaller: function(id) {
                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());
                    $("#PregConse").val(id);
                    $("#id-taller").val($("#id-taller" + id).val());
                    var form = $("#formAsigEval");
                    var url = form.attr("action");

                    if (!$('#archiTaller').val()) {

                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de seleccionar un archivo ",
                            confirmButtonClass: "btn btn-primary",
                            timer: 2500,
                            buttonsStyling: false
                        });
                        return;
                    }

                    $.UpdPunMax();

                    Swal.fire({
                        title: 'Espere Por Favor',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        background: '#FFFFFF',
                        showConfirmButton: false,
                        onOpen: () => {
                            Swal.showLoading();
                        }
                    })
                    Swal.showLoading();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: new FormData($('#formAsigEval')[0]),
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            if (respuesta) {
                                $("#Id_Eval").val(respuesta.idEval);
                                Swal.hideLoading();
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

                                $("#id-taller" + id).val(respuesta.ContPregTaller.id);

                                $("#PuntTaller" + id).html('<fieldset >' +
                                    '        <div class="input-group">' +
                                    '          <input type="text" id="PuntEdit' + id +
                                    '" class="form-control"' +
                                    '     value="' + respuesta.ContPregTaller.puntaje +
                                    '" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                    '          <div class="input-group-append">' +
                                    '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>');

                                $("#PregTaller" + id).html(
                                    '<div class="form-group" id="id_verf">' +
                                    ' <label class="form-label " for="imagen">Ver Archivo Cargado:</label>' +
                                    ' <div class="btn-group" role="group" aria-label="Basic example">' +
                                    '   <button id="idimg' + id +
                                    '" type="button" data-archivo="' +
                                    respuesta.ContPregTaller.nom_archivo +
                                    '" onclick="$.MostArc(this.id);" class="btn btn-success"><i' +
                                    '             class="fa fa-search"></i> Ver Archivo</button>' +
                                    '      </div>' +
                                    '       </div>');
                                edit = "si";
                            } else {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "La pregunta no pudo ser guardada",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                            }
                        },
                        error: function(error_messages) {
                            Swal.fire({
                                type: "alert",
                                title: "Oops...",
                                text: "Ha ocurrido un error",
                                confirmButtonClass: "btn btn-primary",
                                timer: 1500,
                                buttonsStyling: false
                            });
                        }
                    });


                },
                //EDITAR PREGUNTA ABIERTA
                EditPreguntasTaller: function(cons) {
                    if (edit === "si") {
                        var form = $("#formAuxiliarEval");
                        var id = $("#id-taller" + cons).val();

                        var preg = "";
                        var punt = "";
                        var comp = "";

                        $("#Pregunta").remove();
                        $("#TipPregunta").remove();
                        form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                            id + "'>");
                        form.append(
                            "<input type='hidden' name='TipPregunta' id='TipPregunta' value='TALLER'>"
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
                                punt = respuesta.PregTaller.puntaje;
                            }
                        });

                        let puntPre = punt;
                        let puntmax = $("#Punt_Max").val();
                        let total = parseInt(puntmax) - parseInt(puntPre);
                        $("#Punt_Max").val(total);

                        var Preguntas = '<div id="Preguntas' + cons +
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
                            '<input type="hidden" id="id-taller' + cons +
                            '"  value="' + id + '" />' +
                            '<input type="hidden" id="Tipreguntas' + cons +
                            '"  value="TALLER" />' +
                            '            <div class="col-md-12 right">' +
                            '<div id="PuntTaller' + cons + '">' +
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
                            '      </div>' +
                            '            </div>' +
                            '          </div>' +
                            '        </div>' +
                            '      </div>' +
                            '  <div class="col-md-12"> ' +
                            '     <div class="form-group">' +
                            '<div id="PregTaller' + cons + '">' +
                            '             <label>Seleccionar Archivos</label>' +
                            '<label id="projectinput7" class="file center-block"><br>' +
                            '    <input id="archiTaller"  name="archiTaller" type="file">' +
                            '    <span class="file-custom"></span>' +
                            ' </label>' +
                            '         <br>' +
                            '</div>' +
                            '</div>' +
                            '      </div>' +
                            '<div class="form-group"  style="margin-bottom: 0px;">' +
                            '    <button type="button" onclick="$.GuardarEvalTaller(' + cons +
                            ');" id="Btn-guardarPreg' + cons +
                            '"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                            '    <button type="button" id="Btn-EditPreg' + cons +
                            '"  style="display:none;" onclick="$.EditPreguntasTaller(' + cons +
                            ')" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                            '    <button type="button" id="btnDel' + cons + '" data-id="' + cons +
                            '" data-nombre="id-taller' + cons +
                            '"  onclick="$.DelPregunta(this.id)"  class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                            '</div>' +
                            '   </div>' +
                            '</div>';

                        $("#Preguntas" + cons).html(Preguntas);
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
                //AGREGAR VIDO
                AddVideo: function() {
                    edit = "no";
                    $("#MensInf").hide();

                    var Preguntas = '<div id="Video" style="padding-bottom: 10px;">' +
                        ' <div class="bs-callout-primary callout-bordered callout-transparent p-1">' +
                        '         <div class="row">' +
                        '            <div class="col-md-8">' +
                        '             <div class="form-group row">' +
                        '             <div class="col-md-12">' +
                        '<input type="hidden" id="id-video" name="id-video" value="" />' +
                        '     <h4 class="primary">Video Adjunto</h4>' +
                        '            </div>' +
                        '           </div>' +
                        '         </div>' +
                        '      </div>' +
                        '  <div class="col-md-12"> ' +
                        '     <div class="form-group">' +
                        '<div id="Det_video">' +
                        '<label>Seleccionar Archivo:  </label>' +
                        '<label id="projectinput7" class="file center-block"><br>' +
                        '    <input id="archiVideo" accept="video/*" name="archiVideo" type="file">' +
                        '    <span class="file-custom"></span>' +
                        ' </label>' +
                        '         <br>' +
                        '</div>' +
                        '</div>' +
                        '      </div>' +
                        '<div class="form-group"  style="margin-bottom: 0px;">' +
                        '    <button type="button" onclick="$.GuardarEvalVideo();" id="Btn-guardarVideo"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                        '    <button type="button" id="Btn-Editvideo"  style="display:none;" onclick="$.EditEvalVideo()" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                        '    <button type="button" id="Btn-EliVideo" onclick="$.DelEvalVideo()" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                        '</div>' +
                        '   </div>' +
                        '</div>';

                    $("#vid-adjunto").append(Preguntas);

                    $("#div-addpreg").hide();
                    $("#btns_guardar").show();

                },

                ////////////GUARDAR VIDEO
                GuardarEvalVideo: function(id) {
                    $("#Tipreguntas").val($("#Tipreguntas" + id).val());
                    var form = $("#formAsigEval");
                    var url = form.attr("action");

                    if (!$('#archiVideo').val()) {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de seleccionar un archivo ",
                            confirmButtonClass: "btn btn-primary",
                            timer: 2500,
                            buttonsStyling: false
                        });
                        return;
                    }

                    var rurl = $("#RutEvalVideo").val();

                    Swal.fire({
                        title: 'Espere Por Favor',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        background: '#FFFFFF',
                        showConfirmButton: false,
                        onOpen: () => {
                            Swal.showLoading();
                        }
                    })

                    Swal.showLoading();

                    $.ajax({
                        type: "POST",
                        url: rurl + "Guardar/VideoEval",
                        data: new FormData($('#formAsigEval')[0]),
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            if (respuesta) {
                                $("#Id_Eval").val(respuesta.idEval);
                                Swal.hideLoading();
                                Swal.fire({
                                    type: "success",
                                    title: "",
                                    text: "Operación realizada exitosamente",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                                $("#id-video").val(respuesta.EvPDidact.id);
                                $("#Btn-guardarVideo").hide();
                                $("#Btn-Editvideo").show();
                                $("#div-addpreg").show();
                                $('#Btn-guardarVideo').prop('disabled', false);
                                $("#Btn-guardarVideo").html(
                                    '<i  class="fa fa-save"></i> Guardar');


                                $("#Det_video").html(
                                    '<div class="form-group" id="id_verf">' +
                                    ' <label class="form-label " for="imagen">Ver Archivo Cargado:</label>' +
                                    ' <div class="btn-group" role="group" aria-label="Basic example">' +
                                    '   <button id="idvide" type="button" data-archivo="' +
                                    respuesta.EvPDidact.cont_didactico +
                                    '" onclick="$.Mostvideo(this.id);" class="btn btn-success"><i' +
                                    '             class="fa fa-search"></i> Ver Archivo</button>' +
                                    '      </div>' +
                                    '       </div>');
                                edit = "si";
                            } else {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "La operación no pudo ser realizada",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
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
                //EDITAR VIDEO
                EditEvalVideo: function(cons) {
                    if (edit === "si") {
                        var id = $("#id-video").val();

                        var Preguntas = '<div id="Video" style="padding-bottom: 10px;">' +
                            ' <div class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">' +
                            '         <div class="row">' +
                            '            <div class="col-md-8">' +
                            '             <div class="form-group row">' +
                            '             <div class="col-md-12">' +
                            '<input type="hidden" id="id-video" name="id-video" value="' + id + '" />' +
                            '     <h4 class="primary">Video Adjunto</h4>' +
                            '            </div>' +
                            '           </div>' +
                            '         </div>' +
                            '      </div>' +
                            '  <div class="col-md-12"> ' +
                            '     <div class="form-group">' +
                            '<div id="Det_video">' +
                            '             <label>Seleccionar Archivo:  </label>' +
                            '<label id="projectinput7" class="file center-block"><br>' +
                            '    <input id="archiVideo" accept="video/*"  name="archiVideo" type="file">' +
                            '    <span class="file-custom"></span>' +
                            ' </label>' +
                            '         <br>' +
                            '</div>' +
                            '</div>' +
                            '      </div>' +
                            '<div class="form-group"  style="margin-bottom: 0px;">' +
                            '    <button type="button" onclick="$.GuardarEvalVideo();" id="Btn-guardarVideo"   class="btn mr-1 mb-1 btn-success"><i class="fa fa-save"></i> Guardar</button>' +
                            '    <button type="button" id="Btn-Editvideo"  style="display:none;" onclick="$.EditEvalVideo()" class="btn mr-1 mb-1 btn-primary"><i class="fa fa-edit"></i> Editar</button>' +
                            '    <button type="button" id="Btn-EliVideo" onclick="$.DelEvalVideo()" class="btn mr-1 mb-1 btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>' +
                            '</div>' +
                            '   </div>' +
                            '</div>';

                        $("#vid-adjunto").html(Preguntas);
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
                //ELIMINAR VIDEO
                DelEvalVideo: function(id_fila) {
                    edit = "si";
                    if ($("#id-video").val() !== "") {
                        var preg = $("#Id_Eval").val();
                        var form = $("#formAuxiliar");
                        $("#idAuxiliar").remove();
                        $("#idtippreg").remove();
                        form.append("<input type='hidden' name='id' id='idAuxiliar' value='" + preg +
                            "'>");
                        form.append("<input type='hidden' name='tip' id='idtippreg' value='VIDEO'>");
                        var url = form.attr("action");
                        var datos = form.serialize();
                        var mensaje = "";
                        mensaje = "¿Desea Eliminar este Video?";
                        Swal.fire({
                            title: 'Gestionar Evaluaciones',
                            text: mensaje,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "post",
                                    url: url,
                                    data: datos,
                                    success: function(respuesta) {
                                        Swal.fire({
                                            title: "Gestionar Evaluaciones",
                                            text: respuesta.mensaje,
                                            icon: "success",
                                            button: "Aceptar"
                                        });

                                        $('#Video').remove();
                                        $("#div-addpreg").show();
                                        $("#btns_guardar").hide();


                                    },
                                    error: function() {

                                        mensaje =
                                            "La Pregunta no pudo ser Eliminada";

                                        Swal.fire(
                                            'Gestionar Evaluaciones',
                                            mensaje,
                                            'warning'
                                        )
                                    }
                                });

                            }
                        });

                    } else {
                        $('#Video').remove();
                        $("#div-addpreg").show();
                        $("#btns_guardar").hide();
                    }

                },
                Mostvideo: function(id) {

                    $("#ModVidelo").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    $("#datruta").html(
                        '<source src="" id="sour_video" type="video/mp4">'
                    );
                    jQuery('#sour_video').attr('src', $('#datruta').data(
                        "ruta") + "/" + $('#' + id).data("archivo"));
                    $('#' + id).data("archivo")
                },
                SalirVideo: function() {
                    $('#ModVidelo').modal('toggle');
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
                    let regDel = $("#" + id_fila).data("nombre");
                    let idPreg = $("#" + id_fila).data("id");


                    if ($("#" + regDel).val() !== "") {
                        var preg = $("#" + regDel).val();
                        var TipPreg = $("#Tipreguntas" + idPreg).val();
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

                                let puntPre = $("#PuntEdit" + idPreg).val();
                                let puntmax = $("#Punt_Max").val();
                                let total = parseInt(puntmax) - parseInt(puntPre);

                                $("#Punt_Max").val(total);

                                $('#Preguntas' + idPreg).remove();
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
                        $('#Preguntas' + idPreg).remove();
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

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

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
                MostArc: function(id) {
                    window.open($('#dattaller').data("ruta") + "/" + $('#' + id).data("archivo"),
                        '_blank');
                },

                mostrasEval: function() {
                    $('#div-listEval').show();
                    $('#detCalificacion').hide();
                },
                UpdPunMax: function() {
                    let puntPre = $("#puntaje").val();
                    let puntmax = $("#Punt_Max").val();
                    let total = parseInt(puntmax) + parseInt(puntPre);
                    $("#Punt_Max").val(total);
                },
                inicialEditorEnunciado: function() {

                    CKEDITOR.replace('enunciado', {
                        width: '100%',
                        height: 100
                    });
                },
                inicialEditorEnunciadoRelacione: function() {
                    CKEDITOR.replace('EnuncRelacione', {
                        width: '100%',
                        height: 100
                    });
                },
                inicialEditoPregEnsayo: function(id) {
                    CKEDITOR.replace('pregEditEnsayo' + id, {
                        width: '100%',
                        height: 150
                    });
                },
                inicialEditorComplete: function(id) {
                    CKEDITOR.replace('pregEditComplete' + id, {
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
                inicialEditorMensaje: function(preg) {
                    CKEDITOR.replace('Mensaje' + preg, {
                        width: '100%',
                        height: 100
                    });

                },
                inicialEditorRespuesta: function(preg) {
                    CKEDITOR.replace('Respuesta' + preg, {
                        width: '100%',
                        height: 100
                    });

                },
                inicialEditorVerdFal: function(preg) {
                    CKEDITOR.replace('pregverdFals', {
                        width: '100%',
                        height: 100
                    });

                },
                inicialEditorRespuestaAdd: function(cons) {
                    CKEDITOR.replace('RespuestaAdd' + cons, {
                        width: '100%',
                        height: 100
                    });

                },
                consultar: function() {
                    //   $("#titPractica").html("CALIFICACIÓN DE EVALUACIÓN");

                    $("#tr_alumnos").html("");
                    ////CARGAR ALUMNOS DE GRADO Y GRUPO CORRESPONDIENTES AL TEMA 
                    let selGrado = $("#selGrado").val();
                    let selGrupo = $("#selGrupo").val();
                    let selJornada = $("#selJornada").val();
                    let idEval = $("#idEvaluacion").val();
                    var form = $("#formAuxiliarAlumnos");
                    $("#graSel").remove();
                    $("#gruSel").remove();
                    $("#jorSel").remove();
                    $("#eval").remove();
                    form.append("<input type='hidden' name='graSel' id='graSel' value='" +
                        selGrado + "'>");
                    form.append("<input type='hidden' name='gruSel' id='gruSel' value='" +
                        selGrupo + "'>");
                    form.append("<input type='hidden' name='jorSel' id='jorSel' value='" +
                    selJornada + "'>");
                    form.append("<input type='hidden' name='eval' id='eval' value='" +
                        idEval + "'>");

                    var datos = form.serialize();
                    var url = form.attr("action");

                    $.ajax({
                        type: "POST",
                        url: url,
                        async: false,
                        data: datos,
                        success: function(respuesta) {

                            $.dibujarRespuesta(respuesta);

                        }
                    });
                },
                dibujarRespuesta: function(respuesta) {
                    let conse = 1;
                    tablaAlumnos = "";
                    $.each(respuesta.alumnosListado, function(index, listado) {
                        let colorCal = "";
                        let calificacion = "";
                        tablaAlumnos += "<tr>";
                        tablaAlumnos +=
                            '<td class="text-truncate"><button type="button" onclick="$.CalEval(' +
                            listado.id +
                            ');" class="btn btn-outline-success btn-sm"><i class="fa fa-check-square-o"></i> Calificar</button></td>';
                        tablaAlumnos += '<td class="text-truncate">' +
                            conse + '</td>';
                        tablaAlumnos += '<td class="text-truncate">' +
                            listado.ident_alumno + '</td>';
                        tablaAlumnos += '<td class="text-truncate">' +
                            listado.nalumno + '</td>';

                        if (listado.estado_eval == "CALIFICADA") {
                            var porcentaje = (parseInt(listado.puntuacion) /
                                parseInt(listado.punt_max)) * 100;
                            console.log(porcentaje);
                            if (porcentaje <= 50) {
                                colorCal = "#f20d00";
                            } else if (porcentaje > 50 && porcentaje <=
                                60) {
                                colorCal = "#F08D0E";
                            } else if (porcentaje > 60 && porcentaje <=
                                70) {
                                colorCal = "#F5DA00";
                            } else if (porcentaje > 70 && porcentaje <=
                                80) {
                                colorCal = "#C0EA1C";
                            } else if (porcentaje > 80 && porcentaje <=
                                100) {
                                colorCal = "#1ECD60";
                            }

                            if (listado.calif_usando === "Puntos") {
                                calificacion = "Calificada (" + listado.puntuacion + "/" +
                                    listado.punt_max + ")";
                            } else if (listado.calif_usando ===
                                "Porcentaje") {
                                calificacion = porcentaje + "%";
                            } else {
                                switch (true) {
                                    case (porcentaje < 30):
                                        calificacion =
                                            "Deficiente (D) - (" + listado
                                            .puntuacion + "/" + listado
                                            .punt_max + ")"
                                        break;
                                    case (porcentaje >= 30 && porcentaje <
                                        65):
                                        calificacion =
                                            "Insuficiente - (I) (" + listado
                                            .puntuacion + "/" + listado
                                            .punt_max + ")"
                                        break;
                                    case (porcentaje >= 65 && porcentaje <
                                        80):
                                        calificacion = "Aceptable (A) - (" +
                                            listado.puntuacion + "/" +
                                            listado.punt_max + ")"
                                        break;
                                    case (porcentaje >= 80 && porcentaje <
                                        95):
                                        calificacion =
                                            "Sobresaliente (S) - (" +
                                            listado.puntuacion + "/" +
                                            listado.punt_max + ")"
                                        break;
                                    case (porcentaje >= 95):
                                        calificacion = "Excelente (E) - (" +
                                            listado.puntuacion + "/" +
                                            listado.punt_max + ")"

                                        $("#txt_califVis").val(
                                            "Excelente (E)");
                                        break;
                                }
                            }

                        } else {
                            calificacion = "Pendiente"
                        }



                        tablaAlumnos +=
                            '<td class="text-truncate"><span class="badge badge-default badge-secondary" style="background-color: ' +
                            colorCal + '">' + calificacion +
                            '</span></td>';

                        tablaAlumnos += "</tr>";
                        conse++;
                    });
                    $("#tr_alumnos").html(tablaAlumnos);
                },
                CalEval: function(id) {

                    if (id == undefined) {

                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Este Alumno no ha Presentado la evaluación",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                    } else {

                        $("#large").modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        var form = $("#formContenidoEva");
                        $("#idRespEval").remove();
                        form.append("<input type='hidden' name='idRespEval' id='idRespEval' value='" +
                            id + "'>");
                        var url = form.attr("action");
                        var datos = form.serialize();
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: datos,
                            async: true,
                            dataType: "json",
                            success: function(respuesta) {
                                $("#idAlumno").val(respuesta.Evaluacion.alumno);
                                $("#titu_tema").html(respuesta.Evaluacion.titulo);

                                $("#h3_alumno").html(respuesta.Evaluacion.nombre_alumno +
                                    " " + respuesta.Evaluacion.apellido_alumno);

                                var Puntos = respuesta.Evaluacion.puntuacion;
                                var puntmax = respuesta.Evaluacion.punt_max;
                                var calfvis = respuesta.Evaluacion.calificacion;
                                $("#idAlumno").val(respuesta.Evaluacion.alumno);

                                $("#enunciado").html(respuesta.Evaluacion.enunciado);
                                $("#txt_calif").val(Puntos);
                                $("#txt_califMax").val(puntmax);
                                $("#txt_califVis").val(calfvis);

                                $("#TipCalif").val(respuesta.Evaluacion.calif_usando);

                                $("#fechp").html("<b>Fecha de Presentación:</b> " +
                                    respuesta.Evaluacion.fecha_pres);
                                $("#tocupado").html("<b>Tiempo Ocupado:</b> " + respuesta
                                    .Evaluacion.tiempo_usado);
                                $("#irealizados").html("<b>Intentos Realizados:</b> " +
                                    respuesta.int_perm);

                                var contenido =
                                    '  <div class="row"><div class="card-content collapse show">' +
                                    '  <div class="card-body" style="padding-top: 0px;">' +
                                    '        <form method="post" action="{{ url('/') }}/AdminGramaticaLenguaje/GuardarPuntPreg" id="formGuarCalPunt" class="number-tab-stepsPreg wizard-circle">';
                                var Preg = 1;
                                var ConsPre = 0;

                                $.MostrCal(Puntos, puntmax, calfvis);

                                ////////////////CARGAR PREGUNTAS
                                $.each(respuesta.PregEval, function(i, item) {
                                    contenido += '         <h6>Pregunta</h6>' +
                                        '         <fieldset>' +
                                        '              <div class="row p-1">' +
                                        '   <div  style="width: 100%" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1" >' +
                                        '              <div class="row" >' +
                                        '<input type="hidden" id="id-pregunta' +
                                        ConsPre + '"  value="' + item.idpreg +
                                        '" />' +
                                        '<input type="hidden" id="tip-pregunta' +
                                        ConsPre + '"  value="' + item.tipo +
                                        '" />' +
                                        '      <div class="col-md-9"><h4 class="primary">Pregunta ' +
                                        Preg + '</h4></div>' +
                                        '      <div class="col-md-3">' +
                                        '    <fieldset >' +
                                        '        <div class="input-group">' +
                                        '          <input type="hidden" class="form-control" id="puntajeOcul' +
                                        ConsPre + '"' +
                                        '    name="puntaje" value="10" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                        '          <input type="text" class="form-control" onblur="$.ValPunt(' +
                                        ConsPre +
                                        ');" onFocus="$.RestCal(this.id)"  id="puntaje' +
                                        ConsPre + '"' +
                                        '    name="puntaje" value="10" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                        '          <div class="input-group-append">' +
                                        '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                        '          </div>' +
                                        '        </div>' +
                                        '      </fieldset>' +
                                        '</div>' +
                                        '      <div class="col-md-12" id="Pregunta' +
                                        ConsPre + '">' +
                                        '           </div>    ' +
                                        '           </div>    ' +
                                        '           </div>    ' +
                                        '             </div>' +
                                        '        </fieldset>';
                                    Preg++;
                                    ConsPre++;

                                });

                                //////////////////////

                                contenido += '</form>' +
                                    ' </div>' +
                                    '</div></div>';

                                $("#cont_eva").html(contenido);


                                $.CargPreg("0");

                                $(".number-tab-stepsPreg").steps({
                                    headerTag: "h6",
                                    bodyTag: "fieldset",
                                    transitionEffect: "fade",
                                    titleTemplate: '<span class="step">#index#</span> #title#',
                                    labels: {
                                        finish: 'Finalizar',
                                        next: 'Siguiente',
                                        previous: 'Atras'
                                    },
                                    onFinished: function(event, currentIndex) {
                                        $.GuarPunt(currentIndex, 'Ultima');
                                        if (flagGlobal === "s") {
                                            return;
                                        }

                                    },
                                    onStepChanging: function(event, currentIndex,
                                        newIndex) {
                                        // Allways allow previous action even if the current form is not valid!
                                        $.GuarPunt(currentIndex, 'next');
                                        if (flagGlobal === "s") {
                                            return;
                                        }
                                        $.CargPreg(newIndex);

                                        if (currentIndex > newIndex) {
                                            return true;
                                        }
                                        form.validate().settings.ignore =
                                            ":disabled,:hidden";
                                        return form.valid();
                                    },
                                });

                            }

                        });
                    }
                },
                MostrCal: function(punt, max, calf) {
                    var porcentaje = (parseInt(punt) / parseInt(max)) * 100;
                    if (porcentaje <= 50) {
                        $("#txt_califVis").css('background-color', '#f20d00');
                    } else if (porcentaje > 50 && porcentaje <= 60) {
                        $("#txt_califVis").css('background-color', '#F08D0E');
                    } else if (porcentaje > 60 && porcentaje <= 70) {
                        $("#txt_califVis").css('background-color', '#F5DA00');
                    } else if (porcentaje > 70 && porcentaje <= 80) {
                        $("#txt_califVis").css('background-color', '#C0EA1C');
                    } else if (porcentaje > 80 && porcentaje <= 100) {
                        $("#txt_califVis").css('background-color', '#1ECD60');
                    }

                },
                CargPreg: function(id) {

                    var form = $("#formAuxiliarCargEval");
                    var Preg = $("#id-pregunta" + id).val();
                    var tipo = $("#tip-pregunta" + id).val();
                    var IdLib = $("#idRespEval").val();

                    var opci = "";
                    var parr = "";
                    var punt = "";

                    $("#Pregunta").remove();
                    $("#TipPregunta").remove();
                    $("#IdLibCalif").remove();
                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                        Preg + "'>");
                    form.append(
                        "<input type='hidden' name='TipPregunta' id='TipPregunta' value='" + tipo +
                        "'>");
                    form.append(
                        "<input type='hidden' name='IdLibCalif' id='IdLibCalif' value='" + IdLib +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var j = 1;
                    var Pregunta = "";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: true,
                        dataType: "json",
                        success: function(respuesta) {
                            if (tipo === "PREGENSAY") {
                                $("#RespEvalEnsayo").remove();
                                $("#Retro").remove();
                                $("#puntajeOcul" + id).val(respuesta.PregEnsayo.puntaje);

                                $("#puntaje" + id).val(respuesta.PuntAct);
                                Pregunta += respuesta.PregEnsayo.pregunta;
                                Pregunta += '<div class="col-xl-12 col-lg-6 col-md-12">' +
                                    '   <label style="font-weight:bold;" for="placeTextarea">Respuesta Estudiante:</label>' +
                                    ' <div id="RespEvalEnsayo"></div>' +
                                    ' </div>';

                                    Pregunta += '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        ' </div>';

                                $("#Pregunta" + id).html(Pregunta);
                                if (respuesta.RespPregEnsayo) {
                                    $('#RespEvalEnsayo').html(respuesta.RespPregEnsayo
                                        .respuesta);
                                }

                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            } else if (tipo === "COMPLETE") {
                                $("#RespPregComplete").remove();
                                $("#Retro").remove();
                                $("#puntajeOcul" + id).val(respuesta.PregComple.puntaje);
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                Pregunta += '<div class="col-xl-12 col-lg-6 col-md-12">' +
                                    '   <label for="placeTextarea">Complete el Parrafo con las siguientes Opciones:</label>' +
                                    '<p>' + respuesta.PregComple.opciones + '</p>' +
                                    ' <div id="RespPregComplete"></div>' +
                                    '<hr><strong>Respuesta:</strong>' +
                                    ' <div id="RespAlumPregComplete"></div>' +
                                    ' </div>';
                                    Pregunta += '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        ' </div>';
                      
                                $("#Pregunta" + id).html(Pregunta);
                                $('#RespPregComplete').html(respuesta.PregComple.parrafo);
                                if (respuesta.RespPregComple) {
                                    $('#RespAlumPregComplete').html(respuesta.RespPregComple
                                        .respuesta);
                                }
                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            } else if (tipo === "OPCMULT") {
                                $("#puntajeOcul" + id).val(respuesta.PregMult.puntuacion);
                                $("#Retro").remove();
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                $("#puntaje" + id).prop("disabled", true);
                                Pregunta +=
                                    '<div class="pb-1"><input type="hidden"  name="PreguntaOpc" value="' +
                                    respuesta.PregMult.id + '" />' + respuesta.PregMult
                                    .pregunta + '</div>';
                                opciones = '';
                                var l = 1;
                                $.each(respuesta.OpciMult,
                                    function(k, itemo) {

                                        if ($.trim(itemo
                                                .pregunta
                                            ) === $
                                            .trim(respuesta.PregMult.id)) {
                                            if (respuesta.RespPregMul) {
                                                opciones +=
                                                    '<fieldset>';
                                                if ($.trim(respuesta.RespPregMul
                                                        .respuesta) === $.trim(itemo
                                                        .id)) {
                                                    opciones +=
                                                        '<input type="hidden" id="OpcionSel_' +
                                                        l +
                                                        '" class="OpcionSel"  name="OpcionSel[]" value="si"/>';
                                                    opciones +=
                                                        ' <input type="hidden" id=""  name="Opciones[]" value="' +
                                                        itemo.id + '"/>';
                                                    opciones +=
                                                        '<input onclick="$.RespMulPreg(this.id)" id="' +
                                                        l +
                                                        '" class="checksel" checked type="checkbox" >';
                                                } else {
                                                    opciones +=
                                                        '<input type="hidden" id="OpcionSel_' +
                                                        l +
                                                        '" class="OpcionSel"  name="OpcionSel[]" value="no"/>';
                                                    opciones +=
                                                        ' <input type="hidden" id=""  name="Opciones[]" value="' +
                                                        itemo.id + '"/>';
                                                    opciones +=
                                                        '<input onclick="$.RespMulPreg(this.id)" id="' +
                                                        l +
                                                        '" class="checksel" type="checkbox" >';
                                                }


                                                opciones +=
                                                    ' <label for="input-15"> ' +
                                                    itemo
                                                    .opciones +
                                                    '</label>' +
                                                    '</fieldset>';
                                                l++;
                                            } else {
                                                opciones +=
                                                    '<fieldset>';
                                                opciones +=
                                                    '<input type="hidden" id="OpcionSel_' +
                                                    l +
                                                    '" class="OpcionSel"  name="OpcionSel[]" value="-"/>';
                                                opciones +=
                                                    ' <input type="hidden" id=""  name="Opciones[]" value="' +
                                                    itemo.id + '"/>';
                                                opciones +=
                                                    '<input disabled id="' +
                                                    l +
                                                    '" class="checksel" type="checkbox" >';

                                                opciones +=
                                                    ' <label for="input-15"> ' +
                                                    itemo
                                                    .opciones +
                                                    '</label>' +
                                                    '</fieldset>';
                                                l++;
                                            }

                                        }

                                    });

                            var Retro = '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '<label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        '</div>';
                      
                                $("#Pregunta" + id).html(Pregunta + opciones + Retro);
                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            } else if (tipo === "VERFAL") {
                                $("#puntajeOcul" + id).val(respuesta.PregVerFal.puntaje);
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                $("#puntaje" + id).prop("disabled", true);
                                $("#Retro").remove();

                                Pregunta += respuesta.PregVerFal.pregunta;
                                var Opc =
                                    '<div class="form-group row">' +
                                    '<div class="col-md-12">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">';

                                Opc +=
                                    '<input name="radpregVerFal[]" id="RadVer'+ id+'" value="si"  type="radio">';

                                Opc +=
                                    ' <div class="input-group-append" style="margin-left:5px;">' +
                                    '            <span  id="basic-addon2">Verdadero</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '<div  class="col-md-12">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">';
                                Opc +=
                                    ' <input name="radpregVerFal[]" id="RadFal'+ id+'"  value="no"  type="radio">';
                                Opc +=
                                    '<div class="input-group-append" style="margin-left:5px;">' +
                                    '            <span  id="basic-addon2">Falso</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '            </div>';

                                    var Retro =  '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        ' </div>';


                                $("#Pregunta" + id).html(Pregunta + Opc+Retro);

                                if (respuesta.RespPregVerFal) {
                                    if (respuesta.RespPregVerFal.respuesta_alumno ===
                                        "si") {
                                        $('#RadVer'+id).prop("checked", "checked");
                                    } else {
                                        $('#RadFal'+id).prop("checked", "checked");
                                    }
                                }
                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }
                            } else if (tipo === "RELACIONE") {
                                $("#puntajeOcul" + id).val(respuesta.PregRelacione.puntaje);
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                $("#puntaje" + id).prop("disabled", true);
                                $("#Retro").remove();
                                var enun = respuesta.PregRelacione.enunciado;
                                if (enun === null) {
                                    enun = "";
                                }
                                Pregunta += '<div class="row"><div class="col-md-12"><p>' +
                                    enun + '</p></div></div><div class="row">';
                                var j = 1;
                                var selectPreg = '';
                                var cons = 1;

                                $.each(respuesta.PregRelIndi, function(k, item) {

                                    selectPreg = '<div class="contenedor' + cons +
                                        '">' +
                                        '    <div class="selectbox">' +
                                        '        <div class="select" id="select' +
                                        cons + '">' +
                                        '            <div class="contenido-select">' +
                                        '               <h5 class="titulo">Seleccione Una Respuesta</h5>' +
                                        '            </div>' +
                                        '           <i class="fa fa-angle-down"></i>' +
                                        '       </div>' +
                                        '<div class="opciones" id="opciones' +
                                        cons + '">';
                                    var j = 1;
                                    $.each(respuesta.PregRelResp, function(k,
                                        itemr) {
                                        selectPreg +=
                                            ' <a id="' + j +
                                            '" data-id="' + itemr.id +
                                            '" class="opcion">' +
                                            '<div class="contenido-opcion">' +
                                            itemr.respuesta +
                                            '     </div>' +
                                            '   </a>';
                                        j++;
                                    });
                                    selectPreg += '</div>' +
                                        '   </div>' +
                                        '    <input type="hidden"  name="RespSelect[]" id="RespSelect' +
                                        cons + '" value="">' +
                                        '    <input type="hidden"  name="RespPreg[]" value="' +
                                        item.id + '">' +
                                        '    <input type="hidden"  name="ConsPreg[]" id="ConsPreg' +
                                        cons + '" value="">' +
                                        ' </div>';
                                    Pregunta +=
                                        '<div class="col-md-6 pb-2" style="display: flex;align-items: center;justify-content: center;"> <div  id="DivInd' +
                                        j + '">' + item.definicion + '</div></div>';
                                    Pregunta +=
                                        '<div class="col-md-6 pb-2"> <div id="DivRes' +
                                        j + '">' + selectPreg + '</div></div>';
                                    cons++;
                                });

                                Pregunta += '</div>';

                                Pregunta += '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                    '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                    '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                    ' rows="3"></textarea></div>' +
                                    ' </div>';

                                $("#Pregunta" + id).html(Pregunta);
                                cons = 1;
                                $.each(respuesta.PregRelIndi, function(k, item) {
                                    const select = document.querySelector(
                                        '#select' + cons);
                                    const opciones = document.querySelector(
                                        '#opciones' + cons);
                                    const contenidoSelect = document.querySelector(
                                        '#select' + cons + ' .contenido-select');
                                    const hiddenInput = document.querySelector(
                                        '#inputSelect' + cons);

                                    document.querySelectorAll('#opciones' + cons +
                                        ' > .opcion').forEach((opcion) => {
                                        opcion.addEventListener('click', (
                                            e) => {
                                            e.preventDefault();
                                            contenidoSelect
                                                .innerHTML = e
                                                .currentTarget
                                                .innerHTML;
                                            select.classList.toggle(
                                                'active');
                                            opciones.classList
                                                .toggle('active');
                                        });
                                    });

                                    select.addEventListener('click', () => {
                                        select.classList.toggle('active');
                                        opciones.classList.toggle('active');
                                    });
                                    cons++;

                                });

                                cons = 1;
                                $.each(respuesta.RespPregRelacione, function(k, item) {
                                    const select = document.querySelector(
                                        '#select' + cons);
                                    const opciones = document.querySelector(
                                        '#opciones' + cons);
                                    const contenidoSelect = document.querySelector(
                                        '#select' + cons + ' .contenido-select');
                                    const hiddenInput = document.querySelector(
                                        '#inputSelect' + cons);
                                    const sel = document.querySelectorAll(
                                        '#opciones' + cons + ' > .opcion')

                                        for (var i = 0; i < sel.length; i++) {
                                            var item2 = sel[i];
                                            let optioSel=item2.getAttribute('data-id');
                                            if(item.respuesta_alumno==optioSel){
                                                
                                                contenidoSelect.innerHTML = sel[i].innerHTML;
                                            }
    
                                          }
                                    select.classList.toggle('active');
                                    $.selopc(item.consecu, cons)
                                    cons++;
                                });

                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            } else if (tipo === "TALLER") {
                                $("#puntajeOcul" + id).val(respuesta.PregTaller.puntaje);
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                $("#CargArchi").val("");
                                $("#Retro").remove();


                                Pregunta +=
                                    '<div class="row"><div class="col-md-12 pb-1">' +
                                    ' <label class="form-label " for="imagen">Ver Archivo Cargado:</label>' +
                                    ' <div class="btn-group" role="group" aria-label="Basic example">' +
                                    '   <button id="idimg' + id +
                                    '" type="button" data-archivo="' + respuesta.PregTaller
                                    .nom_archivo +
                                    '" onclick="$.MostArc(this.id);" class="btn btn-success"><i' +
                                    '             class="fa fa-download"></i> Descargar Archivo</button>' +
                                    '      </div>' +
                                    '</div></div>';

                                Pregunta += ' <div class="row">' +
                                    '   <div class="col-md-12">' +
                                    '       <div class="form-group" id="divarchi'+id+'">' +
                                    '       <h6 class="form-section"><strong>Agregar Desarrollo de Taller: </strong> </h6>' +
                                    '             <input id="archiTaller"  name="archiTaller" type="file">' +
                                    '       </div>' +
                                    '  </div>' +
                                    '</div>';

                                    Pregunta += '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        ' </div>';

                                $("#Pregunta" + id).html(Pregunta);

                                var archivo = "";

                                if (respuesta.RespPregTaller) {
                                    $("#CargArchi").val(respuesta.RespPregTaller.archivo);
                                    archivo +=
                                        ' <div class="form-group" id="id_file" style="display:none;">' +
                                        '<label class="form-label " for="imagen">Agregar Desarrollo de Taller: </label>' +
                                        '<input type="file" id="archiTaller" name="archiTaller" />' +
                                        '</div>' +
                                        '<div class="form-group" id="id_verf">' +
                                        '<label class="form-label " for="imagen">Ver Desarrollo de Taller: </label>' +
                                        '<div class="btn-group" role="group" aria-label="Basic example">' +
                                        '<button type="button" id="archi" onclick="$.VerArchResp(this.id);" data-archivo="' +
                                        respuesta.RespPregTaller.archivo +
                                        '" class="btn btn-success"><i' +
                                        '            class="fa fa-search"></i> Ver Archivo</button>' +
                                        ' </div>' +
                                        ' </div>';

                                    $("#divarchi"+id).html(archivo);
                                }

                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            }

                            

                        }

                    });

                },
                GuarPunt: function(id, npreg) {
               

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }
                    
                    var form = $("#formGuarCalPunt");
                    var url = form.attr("action");
                    var IdEval = $("#idEvaluacion").val();
                    var Alumno = $("#idAlumno").val();
                    var token = $("#token").val();
                    var Id_Doce = $("#Id_Doce").val();
                    var Preg = $("#id-pregunta" + id).val();
                    var Punt = $("#puntaje" + id).val();
                    var tipo = $("#tip-pregunta" + id).val();
                    var PunMmax = $("#txt_califMax").val();
                    
                   if (Punt === "") {
                        flagGlobal = "s";
                        mensaje = "Debe de Ingresar la Puntuación de esta Pregunta.";
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: mensaje,
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    } else {
                        flagGlobal = "n";

                    }


                    $("#Pregunta").remove();
                    $("#TipPregunta").remove();
                    $("#nPregunta").remove();
                    $("#IdEvaluacion").remove();
                    $("#IdAlum").remove();
                    $("#idtoken").remove();
                    $("#Puntaje").remove();
                    $("#PMax").remove();

                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                        Preg + "'>");
                    form.append("<input type='hidden' name='nPregunta' id='nPregunta' value='" +
                        npreg + "'>");
                    form.append(
                        "<input type='hidden' name='TipPregunta' id='TipPregunta' value='" + tipo +
                        "'>");
                    form.append("<input type='hidden' name='IdEvaluacion' id='IdEvaluacion' value='" +
                        IdEval + "'>");
                    form.append("<input type='hidden' id='idtoken' name='_token'  value='" + token +
                        "'>");
                    form.append("<input type='hidden' id='IdAlum' name='IdAlum'  value='" + Alumno +
                        "'>");
                    form.append("<input type='hidden' id='Puntaje' name='Puntaje'  value='" + Punt +
                        "'>");

                    form.append("<input type='hidden' id='PMax' name='PMax'  value='" + PunMmax +
                        "'>");
                    var datos = form.serialize();
                    var contenido = "";
                    let grupo = $("#selGrupo").val();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: true,
                        dataType: "json",
                        success: function(respuesta) {
                            var j = 1;

                         if(npreg == "Ultima"){
                            $.consultar();

                            Swal.fire({
                                type: "success",
                                title: "",
                                text: "Operación realizada exitosamente",
                                confirmButtonClass: "btn btn-primary",
                                timer: 1500,
                                buttonsStyling: false
                            });
                         }
                           

                        }
                    });

                },
                hab_editRetro: function() {
                    CKEDITOR.replace('Resptroalimentacion', {
                        width: '100%',
                        height: 100
                    });
                },
                ValPunt: function(id) {
                    var puntPreg = $("#puntajeOcul" + id).val();
                    var puntAct = $("#puntaje" + id).val();

                    if (parseInt(puntAct) > parseInt(puntPreg)) {
                        mensaje = "El Puntaje no debe ser Mayor a " + puntPreg + " Puntos";
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: mensaje,
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        puntAct = $("#puntaje" + id).val("");
                        return;
                    }


                    $.CalCalif(id);

                },
                RestCal: function(id) {
                    $("#" + id).select();
                    var puntNew = $("#" + id).val();
                    var puntAct = $("#txt_calif").val();

                    if (puntNew !== "") {
                        var Calact = parseInt(puntAct) - parseInt(puntNew);

                        $("#txt_calif").val(Calact);
                    }


                },
                CalCalif: function(id) {
                    if ($("#puntaje" + id).val() !== "") {
                        var Puntos = $("#txt_calif").val();
                        var puntmax = $("#txt_califMax").val();
                        var TipCali = $("#TipCalif").val();

                        var newpuntos = parseInt(Puntos) + parseInt($("#puntaje" + id).val());

                        $("#txt_calif").val(newpuntos)

                        var porcentaje = (parseInt(newpuntos) / parseInt(puntmax)) * 100;
                        if (porcentaje <= 50) {
                            $("#txt_califVis").css('background-color', '#f20d00');
                        } else if (porcentaje > 50 && porcentaje <= 60) {
                            $("#txt_califVis").css('background-color', '#F08D0E');
                        } else if (porcentaje > 60 && porcentaje <= 70) {
                            $("#txt_califVis").css('background-color', '#F5DA00');
                        } else if (porcentaje > 70 && porcentaje <= 80) {
                            $("#txt_califVis").css('background-color', '#C0EA1C');
                        } else if (porcentaje > 80 && porcentaje <= 100) {
                            $("#txt_califVis").css('background-color', '#1ECD60');
                        }

                        if (TipCali === "Puntos") {
                            $("#txt_califVis").val(newpuntos + "/" + puntmax);
                        } else if (TipCali === "Porcentaje") {
                            $("#txt_califVis").val(porcentaje + "%");
                        } else {
                            switch (true) {
                                case (porcentaje < 30):
                                    $("#txt_califVis").val("Deficiente (D)");
                                    break;
                                case (porcentaje >= 30 && porcentaje < 65):
                                    $("#txt_califVis").val("Insuficiente (I)");
                                    break;
                                case (porcentaje >= 65 && porcentaje < 80):
                                    $("#txt_califVis").val("Aceptable (A)");
                                    break;
                                case (porcentaje >= 80 && porcentaje < 95):
                                    $("#txt_califVis").val("Sobresaliente (S)");
                                    break;
                                case (porcentaje >= 95):
                                    $("#txt_califVis").val("Excelente (E)");
                                    break;
                            }
                        }
                    }
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
