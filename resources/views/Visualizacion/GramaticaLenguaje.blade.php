@extends('Plantilla.Principal')
@section('title', 'Gramatica y Lenguaje')
@section('Contenido')
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />
    <input type="hidden" class="form-control" id="IdEval" value="" />
    <input type="hidden" class="form-control" id="Tip_Usu" value="{{ Auth::user()->tipo_usuario }}" />
    <input type="hidden" class="form-control" id="Id_Doce" value="{{ Session::get('DOCENTE') }}" />
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" data-id='id-dat' id="dattaller"
        data-ruta="{{ asset('/app-assets/Archivos_EvaluacionTaller') }}" />
    <input type="hidden" class="form-control" id="h" value="" />
    <input type="hidden" class="form-control" id="m" value="" />
    <input type="hidden" class="form-control" id="s" value="" />
    <input type="hidden" class="form-control" id="tiempEvaluacion" value="" />

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Principal ">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Gramatica y Lenguaje</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0" id="titulo">Gramatica y Lenguaje</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="card p-1" style="border-radius:10px; background-color: rgba(0,0,0,0);">
            <div class="card-header" style="background-color: rgba(0,0,0,0);">
                <h4 id='tit-gram' class="card-title">Unidades Tematicas</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

            </div>
            <div class="card-content collapse show">
                <div class="row" id="div-unidades">

                </div>

                <div id="div-temas" style="display: none;">

                </div>

                <div id="div-detTemas" style="display: none;">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-linetriangle" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="homeIcon2-tab1" data-toggle="tab" href="#contenido"
                                    aria-controls="homeIcon21" role="tab" aria-selected="true"><i
                                        class="fa fa-indent"></i>
                                    Contenido</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="multimedia-tab1" data-toggle="tab" href="#multimedia"
                                    aria-controls="multimedia" role="tab" aria-selected="false"><i
                                        class="fa fa-file-video-o"></i>
                                    Multimedia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ejemplos-tab1" data-toggle="tab" href="#ejemplos"
                                    aria-controls="ejemplos" role="tab" aria-selected="false"><i
                                        class="fa fa-file-image-o"></i>
                                    Ejemplos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="practicas-tab1" data-toggle="tab" href="#practicas"
                                    aria-controls="practicas" role="tab" aria-selected="false"><i
                                        class="fa fa-comments-o"></i>
                                    Practicas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="evaluacion-tab1" data-toggle="tab" href="#evaluacion"
                                    aria-controls="evaluacion" role="tab" aria-selected="false"><i
                                        class="fa fa-check-square-o"></i>
                                    Evaluaciones</a>
                            </li>
                        </ul>
                        <div class="tab-content px-1 pt-1">
                            <div class="tab-pane active in" id="contenido" aria-labelledby="contenido-tab1"
                                role="tabpanel">
                                <div id="search-results" style="padding: 0" class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <ul class="media-list p-0">
                                                <!--search with list-->
                                                <li class="media">
                                                    <div class="media-body">
                                                        <p class="lead mb-0"><a href="#"><span id="titu"
                                                                    class="text-bold-600"></span> </a></p>
                                                        <div class="vertical-scroll scroll-example height-300 ps ps--active-y"
                                                            id="conte">

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="multimedia" aria-labelledby="multimedia-tab1" role="tabpanel">
                                <div id="div-multimedia" class="card-body">



                                </div>
                            </div>
                            <div class="tab-pane" id="ejemplos" aria-labelledby="ejemplos-tab1" role="tabpanel">
                                <div id="div-ejemplos" class="card-body">



                                </div>
                            </div>
                            <div class="tab-pane" id="practicas" aria-labelledby="practicas-tab1" role="tabpanel">
                                <div id="div-practicas" class="card-body">

                                </div>
                            </div>
                            <div class="tab-pane" id="evaluacion" aria-labelledby="evaluacion-tab1" role="tabpanel">
                                <div id="div-evaluacion" class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <hr>
        <div class="form-actions right">
            <div class="row ">
                <div class="col-md-12 col-lg-12 ">
                    <div class="btn-list">
                        <a class="btn btn-outline-dark" id="btn-atrasModulos" href="javascript:history.go(-1)"
                            title="Volver">
                            <i class="fa fa-angle-double-left"></i> Volver
                        </a>
                        <a class="btn btn-outline-dark" style="display: none;" id="btn-atrasUnidades"
                            onclick="$.atrasUnidades();" title="Volver">
                            <i class="fa fa-angle-double-left"></i> Volver
                        </a>
                        <a class="btn btn-outline-dark" style="display: none;" id="btn-atrasTemas"
                            onclick="$.atrasTemas();" title="Volver">
                            <i class="fa fa-angle-double-left"></i> Volver
                        </a>
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
    <div class="modal fade text-left" id="modalEjemploTematica" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="titEjemplo" class="modal-title">Contenido Ejemplo</h4>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="modalContentEjemplo" style="align-items: center; text-align: center;"></div>
                    </div>

                    <div class="form-actions right">
                        <button type="button" onclick="$.cerrarEjemplo();" class="btn btn-warning mr-1">
                            <i class="fa fa-reply"></i> Atras
                        </button>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="modalPracticaTematica" style="height: 90% !important; overflow: hidden; "
        tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" id="div-practia"
                style="background-image: url({{ asset('assets/css/img/fondo.png') }})">
                <div class="modal-header">
                    <h4 id="titPractica" style="color: #fff; font-weight: bold;" class="modal-title">Contenido Ejemplo
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="px-1">
                    <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                        <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                            <span> Deberas seleccionar la respuesta
                                correcta segun la pregunta
                                que sea relizada por el personaje mostrado a tu izquierda. </span>
                        </div>
                        <li><span class="text-muted"></span> </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12"
                                style="display: flex; justify-content: center; align-items: center; height: 400px;"
                                id="dialogo">
                                <div class="persona1"
                                    style="background-image: url(asset('app-assets/images/img_practicas/docente.png'));">
                                    <div class="dialogo1" id="dialogo1">
                                        <p id="parrafo1"></p>
                                    </div>
                                </div>
                                <div class="persona2"
                                    style="background-image: url(asset('app-assets/images/img_practicas/estudiante.png'));">
                                    <div class="dialogo2" id="dialogo2">
                                        <p id="parrafo2"></p>
                                    </div>
                                </div>


                            </div>
                            <div class="col-12">
                                <div id="div-opcionesP"
                                    style="display: none; width: 30%; border-radius: 10px; text-align: center; background-color:#F5F7FA"
                                    class="centered-div">
                                    <h4 id="titoOpciones" style="padding-top: 5px;">Seleccione la Respuesta</h4>
                                    <div id="div-opciones"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="ModVidelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel15"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success white">
                    <h4 class="modal-title" style="text-transform: capitalize;" id="titu_temaEva">Contenido
                        Didactico Cargado</h4>
                </div>
                <div class="modal-body">
                    <div id='ListEvalVid' style="height: 400px; overflow: auto;text-align: center;">
                        <video width="640" height="360" id="datruta" controls
                            data-ruta="{{ asset('/app-assets/Evaluacion_PregDidact') }}">
                        </video>
                    </div>

                    <button type="button" id="btn_salir" onclick="$.SalirAnim();"
                        class="btn grey btn-outline-secondary" data-dismiss="modal"><i
                            class="ft-corner-up-left position-right"></i> Salir</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="ModEval" tabindex="-1" role="dialog" aria-labelledby="myModalLabel15"
        aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content"
                style="background-image: url({{ asset('/app-assets/images/backgrounds/fondo3.png') }})">
                <div class="modal-body">

                    <article id='DetEval' style="text-transform: capitalize;" class="wrapper">
                        <header></header>
                        <main style="height: 400px; overflow: auto; overflow-x: hidden;"></main>
                    </article>

                    <article id='DetEvalFin' style="display: none;text-transform: capitalize;" class="wrapper">
                        <header></header>
                        <main style="height: 400px; overflow: auto;"></main>
                    </article>

                </div>
                <div class="modal-footer">
                    <div id="contTiempo" style="text-align: left; font-size: 25px;display: none; padding-right: 20px;">
                        <div class="content-header row">

                            <div class="content-header-left col-md-12 col-12" style="pointer-events:none;">
                                <div class="btn-group float-md-right" role="group"
                                    aria-label="Button group with nested dropdown">

                                    <a class="btn btn-outline-primary"><i class="ft-clock"> Tiempo para
                                            Terminar</i></a>
                                    <a class="btn btn-outline-primary" style="color: #CE2605;" id="cuenta"></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row" id="Dat_Cal" style="display: none;">
                        <div class="col-md-5" style="text-align: center;">
                            <labe>Intentos Permitidos:</labe><br>
                            <labe id="label_IntPerm" style="color:  #CE2605;"></labe>
                        </div>
                        <div class="col-md-5" style="text-align: center;">
                            <labe>Intentos Realizados:</labe><br>
                            <labe id="label_IntReal"></labe>
                        </div>
                    </div>
                    <button type="button" id="VidDidac" onclick="$.MostVid();" style="display: none;"
                        class="btn btn-success"><i class="fa fa-video-camera"></i> Ver Contenido
                        Didactico</button>

                    <button type="button" id="btn_salirModEv" class="btn grey btn-outline-secondary"
                        onclick="$.CloseModActIni();" data-dismiss="modal"><i
                            class="ft-corner-up-left position-right"></i> Salir</button>
                    <button type="button" id="btn_atrasModEv" style="display: none;"
                        class="btn grey btn-outline-secondary" onclick="$.AtrasModActIni();"><i class="fa fa-reply"></i>
                        Atras</button>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ url('/GramaticaLenguaje/CargarUnidades') }}" id="formCargarUnidad" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/GramaticaLenguaje/CargarTemas') }}" id="formCargarTemas" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/GramaticaLenguaje/CargarDetTemas') }}" id="formCargarDetTemas" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/GramaticaLenguaje/CargarDetPractica') }}" id="formCargarContPractica" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/GramaticaLenguaje/CargarDetEvaluacion') }}" id="formCargaContenidoEvaluacion" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/GramaticaLenguaje/CargarPreguntaEvaluacion') }}" id="formCargaPreguntas" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>


@endsection
@section('scripts')
    <script>
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

        var tempDivTitu = document.createElement('div');

        $(document).ready(function() {

            $("#Gramatica").addClass("active");
            let dest = "";
            let pregPractica = [];
            let respPractica = [];
            let actual = 0;
            let pregAct;
            let ok = false;
            let arrayOpciones = [];
            let actor1 = "";
            let actor2 = "";


            var flagGlobal = "n";
            var flagTimExt = "n";
            var flagTimFin = "n";
            var flagIntent = "ok"
            var xtiempo;

            $.extend({
                cargarUnidades: function() {
                    var form = $("#formCargarUnidad");
                    var url = form.attr("action");

                    var datos = form.serialize();
                    let descripcion = "";
                    let tdTable = '';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {
                            var textoTitu = "";
                            $.each(response.Unidades, function(i, item) {
                                descripcion = item.descripcion !== null ? item
                                    .descripcion : "";
                                tempDivTitu.innerHTML = item.nombre;
                                textoTitu = tempDivTitu.firstChild.textContent ||
                                    tempDivTitu.firstChild.innerText;
                                tdTable +=
                                    '  <div class="col-12 pb-1 justify-content-center " ><div style="border: 1px solid #F9C55A !important; cursor:pointer;background-image: url(\'{{ asset('/app-assets/images/backgrounds/bg_callout.png') }}\'); background-size: 100% 100%;height: 100px; width:100%;display: flex; flex-direction: column; justify-content: center; align-items: center;" onclick="$.verTemasUnidad(' +
                                    item.id +
                                    ');" class="bs-callout-primary p-1 pl-2 align-items-stretch hvr-grow-shadow">' +
                                    '<h4 class="primary ">' + textoTitu + '</h4>' +
                                    ' ' + descripcion + '' +
                                    '</div></div>';
                            });

                            $("#div-unidades").html(tdTable);
                        }
                    });
                },
                verTemasUnidad: function(idUnidad) {
                    let objetivo = "";
                    $("#btn-atrasUnidades").show();
                    $("#btn-atrasModulos").hide();
                    $("#div-unidades").hide();
                    $("#div-temas").show();
                    $("#tit-gram").html("Tematicas Gramatica y Lenguaje");

                    var form = $("#formCargarTemas");
                    var url = form.attr("action");
                    $("#idUnidad").remove();
                    form.append("<input type='hidden' id='idUnidad' name='idUnidad'  value='" +
                        idUnidad + "'>");
                    var datos = form.serialize();

                    let tdTable = '';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {

                            tempDivTitu.innerHTML = response.Unidad.nombre;
                            var textoTitu = tempDivTitu.firstChild.textContent ||
                                tempDivTitu.firstChild.innerText;

                            $("#titulo").html("Gramatica y Lenguaje - " + textoTitu);

                            $.each(response.Temas, function(i, item) {
                                objetivo = item.objetivo !== null ? item
                                    .objetivo : "";
                                tdTable +=
                                    '  <div class="col-12 pb-1 justify-content-center " ><div style="border: 1px solid #F9C55A !important; cursor:pointer;background-image: url(\'{{ asset('/app-assets/images/backgrounds/bg_callout.png') }}\'); background-size: 100% 100%;height: 100px; width:100%;display: flex; flex-direction: column; justify-content: center; align-items: center;" onclick="$.verTemas(' +
                                    item.id +
                                    ');" class="bs-callout-primary p-1 pl-2 align-items-stretch hvr-grow-shadow">' +
                                    '<h4 class="primary ">' + textoTitu + '</h4>' +
                                    ' ' + objetivo + '' +
                                    '</div></div>';

                            });

                            $("#div-temas").html(tdTable);
                        }
                    });
                },
                verTemas: function(idTema) {
                    $("#div-temas").hide();
                    $("#btn-atrasUnidades").hide();
                    $("#div-detTemas").show();
                    $("#btn-atrasTemas").show();
                    $("#tit-gram").html("Desarrollo del Tema");


                    var form = $("#formCargarDetTemas");
                    var url = form.attr("action");
                    $("#idTema").remove();
                    form.append("<input type='hidden' id='idTema' name='idTema'  value='" +
                        idTema + "'>");
                    var datos = form.serialize();

                    let multi = '';
                    let ejemplos = '';
                    let practicas = '';
                    let evaluacion = '';
                    let x = 1;
                    let claseCallout = "";
                    let iconCallout = "";
                    let img = "bg_callout_video.png";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {

                            tempDivTitu.innerHTML = response.Temas.titulo;
                            var textoTitu = tempDivTitu.firstChild.textContent ||
                                tempDivTitu.firstChild.innerText;

                            $("#titulo").html("Gramatica y Lenguaje - " + textoTitu);

                            //cargar Tematica
                            $("#titu").html(response.Temas.titulo);
                            $("#conte").html(response.Temas.contenido);
                            let urlMul = "";
                            //cargarMultimedia
                            $.each(response.TemasMult, function(i, item) {

                                if (item.tipo_multimedia === 'application/pdf') {
                                    claseCallout = "danger";
                                    iconCallout = "fa-file-pdf-o";
                                    img = "bg_callout_pdf.png";
                                } else if (item.tipo_multimedia.substr(0, 5) ===
                                    'video') {
                                    claseCallout = "info";
                                    iconCallout = "fa-file-video-o";
                                    img = "bg_callout_img.png";
                                } else {
                                    claseCallout = "success";
                                    iconCallout = "fa-picture-o";
                                    img = "bg_callout_video.png";
                                }


                                urlMul = $('#urlMult').data("ruta") +
                                    "/images/backgrounds/" + img;


                                multi +=
                                    ' <div style="cursor:pointer;" onclick="$.Ver(this.id);" id="div_' +
                                    x + '" data-id="' + item.id + '" data-url="' +
                                    item.url_contenido + '" data-tipo="' + item
                                    .tipo_multimedia + '" class="bs-callout-' +
                                    claseCallout + ' callout-bordered mb-1">' +
                                    '<div class="media align-items-stretch">' +
                                    '<div class="media-body p-1 pl-2 hvr-grow-shadow" style="background-image: url(' +
                                    urlMul +
                                    '); background-size: 100% 100%;  border-radius:7px;">' +
                                    '<strong>' + item.nombre.slice(0, -4) +
                                    '</strong>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                x++;
                            });

                            $("#div-multimedia").html(multi);

                            x = 1;
                            let urlEjemplo = "";
                            //cargar ejemplos
                            $.each(response.TemasEjemplos, function(i, item) {

                                urlEjemplo = $('#urlMult').data("ruta") +
                                    "/images/backgrounds/bg_callout_ejemplo.png";

                                ejemplos +=
                                    '<div style="display:none;" id="contEjemplohide' +
                                    x + '">' + item.contenido +
                                    '</div> <div style="cursor:pointer;" onclick="$.VerEjemplo(' +
                                    x + ');" id="div_Ejemplo' + x +
                                    '" data-titulo="' + item.nombre +
                                    '"  data-audio="' + item.url_audio +
                                    '" class="bs-callout-danger callout-bordered mb-1">' +
                                    '<div class="media align-items-stretch">' +

                                    '<div class="media-body p-1 pl-2 hvr-grow-shadow" style="background-image: url(' +
                                    urlEjemplo +
                                    '); background-size: 100% 100%;  border-radius:7px;">' +
                                    '<strong>' + item.nombre + '</strong>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                x++;
                            });

                            $("#div-ejemplos").html(ejemplos);

                            x = 1;
                            let urlPractica = "";
                            //cargar practicas
                            $.each(response.TemasPracticas, function(i, item) {
                                urlPractica = $('#urlMult').data("ruta") +
                                    "/images/backgrounds/bg_callout_ejemplo.png";

                                practicas +=
                                    '<div style="cursor:pointer;" id="practica' +
                                    item.id + '" data-titulo="' + item.titulo +
                                    '" onclick="$.VerPractica(' + item.id +
                                    ');"  class="bs-callout-danger callout-bordered mb-1">' +
                                    '<div class="media align-items-stretch">' +

                                    '<div class="media-body p-1 pl-2 hvr-grow-shadow" style="background-image: url(' +
                                    urlPractica +
                                    '); background-size: 100% 100%;  border-radius:7px; ">' +
                                    '<strong>' + item.titulo + '</strong>' +
                                    '<p>' + item.objetivo + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                x++;
                            });

                            $("#div-practicas").html(practicas);
                            x = 1;
                            let estadoEval = "";
                            let urlEvaluacion = "";

                            //cargar evaluación
                            $.each(response.TemasEvaluacion, function(i, item) {

                                if (item.estado_eval == "TERMINADA" || item
                                    .estado_eval == "CALIFICADA") {
                                    estadoEval = "bg_callout_eval_ok.png";
                                } else {
                                    estadoEval = "bg_callout_eval.png";
                                }

                                urlEvaluacion = $('#urlMult').data("ruta") +
                                    "/images/backgrounds/" + estadoEval;


                                evaluacion +=
                                    '<div style="cursor:pointer;" id="evaluacion' +
                                    item.id + '" data-titulo="' + item.titulo +
                                    '" onclick="$.MostEval(' + item.id +
                                    ');"  class="callout-bordered mb-1">' +
                                    '<div class="media align-items-stretch">' +
                                    '<div class="media-body p-1 pl-2 hvr-grow-shadow" style="background-image: url(' +
                                    urlEvaluacion +
                                    '); background-size: 100% 100%; border-radius:7px;">' +
                                    '<strong>' + item.titulo + '</strong>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                x++;
                            });

                            $("#div-evaluacion").html(evaluacion);

                        }
                    });

                },
                Ver: function(id) {
                    let url = $('#urlMult').data("ruta") + "/contenidoMultimedia/tematicas/" + $("#" +
                        id).data("url");
                    let tipMuil = $("#" + id).data("tipo");


                    $("#modalMultimediaTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    });


                    // Función para abrir el modal y cargar el contenido según el tipo
                    var modalContent = document.getElementById('modalContent');

                    // Cargar el contenido según el tipo
                    if (tipMuil === 'application/pdf') {
                        modalContent.innerHTML = '<iframe  style="width: 100%; height:360px;" src="' +
                            url + '"></iframe>';
                    } else if (tipMuil.substr(0, 5) === 'video') {
                        modalContent.innerHTML =
                            '<video id="vidPrac" style="width: 100%; height:360px;"  controls><source  src="' +
                            url +
                            '" type="video/mp4"></video>';
                        var video_player = new Plyr("#vidPrac");
                    } else {
                        modalContent.innerHTML =
                            '<div class="mb-1" style="width:100%; height:340px;"><img src="' + url +
                            '" style="width:100%; height:360px;" alt="Imagen"></div>';
                    }

                },
                VerEjemplo: function(id) {
                    let ejemplo = "";
                    $("#modalEjemploTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    let divEjemplo = document.getElementById('contEjemplohide' + id);
                    let ejemploContenido = divEjemplo.innerHTML;

                    ejemplo += ejemploContenido;

                    let AudioEjemplo = $('#urlMult').data("ruta") + "/contenidoMultimedia/audios/" + $(
                        "#div_Ejemplo" + id).data("audio");

                    $("#titEjemplo").html($("#div_Ejemplo" + id).data("titulo"));

                    if ($("#div_Ejemplo" + id).data("audio") != "") {
                        ejemplo += '<audio  id="audioEjemplo" style="width:100%" controls>' +
                            '    <source src="" type="audio/mp3" />' +
                            '    <source src="" type="audio/ogg" />' +
                            '</audio>'
                    }

                    $("#modalContentEjemplo").html(ejemplo);

                    var audio_player = new Plyr("#audioEjemplo");

                    let audio = document.getElementById('audioEjemplo');
                    if (audio) {
                        audio.src = AudioEjemplo;
                    }

                },
                VerPractica: function(id) {
                    $("#modalPracticaTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    let paisajes = [{
                            fondo: "fondo1.png",
                        },
                        {
                            fondo: "fondo2.png",
                        },
                        {
                            fondo: "fondo3.png",
                        }
                    ];

                    const indiceAleatorio = Math.floor(Math.random() * paisajes.length);
                    let imgPaisaje = $('#urlMult').data("ruta") + "/images/paisajes/" + paisajes[
                        indiceAleatorio].fondo;

                    // Obtener el div
                    const miDiv = document.getElementById("div-practia");

                    // Establecer el fondo del div con la imagen aleatoria
                    miDiv.style.backgroundImage = `url(${imgPaisaje})`;


                    $("#modalPracticaTematica .modal-dialog").css("height", "400px");

                    let titulo = $("#practica" + id).data("titulo");
                    $("#titPractica").html(titulo);

                    var form = $("#formCargarContPractica");
                    var url = form.attr("action");
                    $("#idPractica").remove();
                    form.append("<input type='hidden' id='idPractica' name='idPractica'  value='" + id +
                        "'>");
                    var datos = form.serialize();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {
                            pregPractica = response.PregPractica;
                            respPractica = response.OpcPractica;
                            actor1 = response.actor1;
                            actor2 = response.actor2
                        }
                    });

                    setTimeout(function() {
                        $.mostrarPersonas();
                    }, 1000); // 5000 milisegundos = 5 segundos

                },
                mostrarPersonas: function() {
                    const divAnimado = document.querySelector('.persona1');
                    divAnimado.style.animationName = 'mover_persona_1';
                    const divAnimado2 = document.querySelector('.persona2');
                    divAnimado2.style.animationName = 'mover_persona_2';
                    $("#div-opcionesP").hide();

                    let imgActor1 = $('#urlMult').data("ruta") + "/images/personajes/" + actor1;
                    let imgActor2 = $('#urlMult').data("ruta") + "/images/personajes/" + actor2;

                    divAnimado.style.backgroundImage = 'url("' + imgActor1 + '")';
                    divAnimado2.style.backgroundImage = 'url("' + imgActor2 + '")';

                    setTimeout(() => {
                        $('#dialogo1').fadeToggle(2000);
                        document.getElementById("dialogo1").style.display = "flex";
                        document.getElementById("dialogo1").style.alignItems = "center";
                        document.getElementById("dialogo1").style.justifyContent = "center";
                    }, 4000)

                    setTimeout(() => {
                        $.dialogo_primario();
                    }, 5000)
                },
                dialogo_primario: function() {
                    document.getElementById("dialogo1").style.display = "flex";
                    document.getElementById("dialogo1").style.alignItems = "center";
                    document.getElementById("dialogo1").style.justifyContent = "center";
                    if (actual < pregPractica.length) {
                        pregAct = pregPractica[actual].id;
                        $.maquina("parrafo1", pregPractica[actual].pregunta, 50, 1);
                    } else {
                        $('#dialogo1').fadeToggle(2000);
                        $('#dialogo2').fadeToggle(2000);
                        actual = 0;
                        Swal.fire({
                            type: "success",
                            title: "Felixtaciones...",
                            text: "La Practica fue realizada con exito",
                            confirmButtonClass: "btn btn-primary",
                            timer: 2500,
                            buttonsStyling: false
                        });


                    }

                },
                dialogo_Secundario: function() {
                    arrayOpciones = respPractica.filter((e) => e.preg_practica == pregAct);
                    $("#titoOpciones").html("Seleccione la Respuesta");
                    $("#div-opcionesP").show();
                    $("#div-opciones").html("");
                    let opc = "";

                    var tempDiv = document.createElement('div');
                    var texto = "";

                    for (let itemOpc of arrayOpciones) {
                        tempDiv.innerHTML = itemOpc.respuesta;
                        texto = tempDiv.firstChild.textContent || tempDiv.firstChild.innerText;
                        opc += '<button style="width: 80%" type="button" data-id="' + itemOpc.correcta +
                            '" onclick="$.verificar_respuesta(this);" class="btn btn-outline-dark round btn-min-width mr-1 mb-1">' +
                            texto + '</button>';
                    }

                    $("#div-opciones").html(opc);
                    actual++;

                },
                verificar_respuesta: function(elemento) {
                    var textop = elemento.innerHTML;
                    var respuesta = elemento.getAttribute('data-id');
                    var respuestas = document.getElementsByClassName("opcion");

                    if (respuesta == "si") {
                        elemento.classList.remove("btn-outline-dark");
                        elemento.classList.add("btn-success");
                    } else {
                        elemento.classList.remove("btn-outline-dark");
                        elemento.classList.add("btn-danger");

                    }

                    if (document.getElementById("dialogo2").style.display == "") {
                        $('#dialogo2').fadeToggle(2000);
                    }

                    setTimeout(() => {
                        $("#div-opcionesP").hide();
                        if (respuesta == "si") {
                            $.maquina("parrafo2", textop, 50, 1);
                        } else {
                            Swal.fire({
                                type: "warning",
                                title: "Oops...",
                                text: "Respuesta incorrecta sigue practicando",
                                confirmButtonClass: "btn btn-primary",
                                timer: 2000,
                                buttonsStyling: false
                            });

                            actual = 0;
                            setTimeout(() => {
                                $.cerrarPractica();
                            }, 1000)
                        }
                    }, 3000)
                },
                maquina: function(contenedor, texto, intervalo) {
                    var i = 0,
                        // Creamos el timer
                        timer = setInterval(function() {
                            if (i < texto.length) {
                                // Si NO hemos llegado al final del texto..
                                // Vamos añadiendo letra por letra y la _ al final.
                                $("#" + contenedor).html(texto.substr(0, i++) + "_");
                            } else {
                                // En caso contrario..
                                // Salimos del Timer y quitamos la barra baja (_)
                                clearInterval(timer);
                                $("#" + contenedor).html(texto);

                                if (ok) {
                                    $('#parrafo1').text("");
                                    setTimeout(() => {
                                        $.dialogo_primario();
                                    }, 2000)
                                    ok = false;
                                } else {
                                    $('#parrafo2').text("")
                                    setTimeout(() => {
                                        $.dialogo_Secundario();
                                    }, 3000)
                                    ok = true;
                                }
                            }
                        }, intervalo);
                },

                cerrarMultimedia: function() {
                    $('#modalMultimediaTematica').modal('toggle');
                },
                cerrarEjemplo: function() {
                    $('#modalEjemploTematica').modal('toggle');
                },
                cerrarPractica: function() {
                    $('#modalPracticaTematica').modal('toggle');
                    $('#dialogo1').fadeToggle(2000);
                    $('#dialogo2').fadeToggle(2000);
                },
                atrasUnidades: function() {
                    $("#btn-atrasUnidades").hide();
                    $("#btn-atrasModulos").show();
                    $("#div-unidades").show();
                    $("#div-temas").hide();
                    $("#tit-gram").html("Unidades Tematicas Gramatica y Lenguaje");
                },
                atrasTemas: function() {
                    $("#div-detTemas").hide();
                    $("#div-temas").show();
                    $("#btn-atrasUnidades").show();
                    $("#btn-atrasTemas").hide();
                },
                ///////MOSTRAR EVALUACIÓN
                MostEval: function(id) {

                    $("#ModEval").modal({
                        backdrop: 'static',
                        keyboard: false
                    });


                    $("#DetEval").show();
                    $("#IdEval").val(id);

                    var $wrapper = $('#DetEval');
                    $wrapper.avnSkeleton('display');
                    $("#label_IntPerm").html("");
                    $("#label_IntReal").html("");
                    $("#txt_califVis").val("");
                    $("#txt_califVis").css('background-color', '#ffffff');
                    var NomVidEval = "";
                    var Parrafo = "";
                    var PregMul = "";
                    var TipEval = "";
                    var Tiempo = "";
                    var HabTie = "";
                    var Enunciado = "";
                    var form = $("#formCargaContenidoEvaluacion");
                    var token = $("#token").val();
                    $("#idEvaluacion").remove();

                    form.append("<input type='hidden' name='idEvaluacion' id='idEvaluacion' value='" +
                        id +
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

                            $wrapper.avnSkeleton('remove');
                            var n = 1;
                            Tiempo = respuesta.tiempo;
                            HabTie = respuesta.hab_tiempo;
                            var contenido = '';
                            $wrapper.find('> header').append(respuesta.titulo
                                .toLowerCase());

                            Enunciado = respuesta.enunciado;
                            if (Enunciado == null) {
                                Enunciado = "";
                            }

                            //////////////CARGAR ENUNCIADO
                            contenido += ' <div class="row">' +
                                '<div class="col-md-12">' +
                                '<p>' + Enunciado + '</p>' +
                                '</div>' +
                                ' </div>';

                            /////////

                            //////// CARGAR INFORMACIÓN DE VIDEOS

                            if (respuesta.VideoEval !== "no") {
                                $("#VidDidac").show();
                                $("#datruta").html(
                                    '<source src="" id="sour_video" type="video/mp4">'
                                );
                                jQuery('#sour_video').attr('src', $('#datruta').data(
                                    "ruta") + "/" + respuesta.VideoEval);
                                $("#Nom_Video").val(respuesta.VideoEval);
                            } else {
                                $("#VidDidac").hide();
                            }

                            //////////////

                            //////CARGAR INFORMACIÓN DE INTENTOS

                            $("#Dat_Cal").show();
                            var int_real = respuesta.int_realizados;
                            var int_perm = respuesta.int_perm;

                            $("#label_IntPerm").html(int_perm);
                            $("#label_IntReal").html(int_real);
                            if (respuesta.perfil === "Estudiante") {
                                if (parseInt(respuesta.int_realizados) >= parseInt(respuesta
                                        .int_perm)) {
                                    flagIntent = "fail";
                                } else {
                                    flagIntent = "ok";
                                }
                            } else {
                                flagIntent = "ok";
                            }


                            contenido +=
                                '  <div class="row"><div class="card-content collapse show">' +
                                '  <div class="card-body" style="padding-top: 0px;">' +
                                '        <form method="post" action="{{ url('/') }}/GramaticaLenguaje/RespEvaluaciones" id="Evaluacion" class="number-tab-stepsPreg wizard-circle">';
                            var Preg = 1;
                            var ConsPre = 0;

                            ////////////////CARGAR PREGUNTAS
                            $.each(respuesta.PregEval, function(i, item) {
                                contenido += '         <h6>Pregunta</h6>' +
                                    '         <fieldset>' +
                                    '              <div class="row p-1">' +
                                    '   <div  style="width: 100%" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1" >' +
                                    '              <div class="row" >' +
                                    '<input type="hidden" id="id-pregunta' +
                                    ConsPre + '"  value="' + item.idpreg + '" />' +
                                    '<input type="hidden" id="tip-pregunta' +
                                    ConsPre + '"  value="' + item.tipo + '" />' +
                                    '      <div class="col-md-9"><h4 class="primary">Pregunta ' +
                                    Preg + '</h4></div>' +
                                    '      <div class="col-md-3"><span class=" float-right"><i class="fa fa-circle success"></i id="Puntaje' +
                                    ConsPre + '"> 10 Puntos</span></div>' +
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


                            $wrapper.find('> main').append(contenido);
                            $.CargPreg("0");

                            ///////////////INICALIZAR STEPS

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

                                    if (flagTimFin === "s") {
                                        mensaje =
                                            "El Tiempo de Evaluación a Finalizado";
                                        Swal.fire({
                                            title: "",
                                            text: mensaje,
                                            icon: "warning",
                                            button: "Aceptar",
                                        });
                                        return;
                                    }

                                    $.GuarPreg(currentIndex, 'Ultima');
                                    if (flagGlobal === "s") {
                                        return;
                                    }
                                },
                                onStepChanging: function(event, currentIndex,
                                    newIndex) {
                                    // Allways allow previous action even if the current form is not valid!
                                    if (flagTimFin === "s") {
                                        mensaje =
                                            "El Tiempo de Evaluación a Finalizado";
                                        Swal.fire({
                                            title: "",
                                            text: mensaje,
                                            icon: "warning",
                                            button: "Aceptar",
                                        });
                                        return;
                                    }

                                    $.GuarPreg(currentIndex, 'next');

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

                            ///////////////////////


                        }

                    });

                    $("#btn_salirModEv").hide();
                    $("#btn_atrasModEv").show();



                    //////MOSTRAR CONTADOR DE EVALUACIÓN//////////
                    if (HabTie === "SI") {
                        mensaje = "Esta Evaluación Cuenta con un Tiempo de " + Tiempo +
                            " para ser Desarrollada. ¿Desea Realizar Esta Evaluación?";
                        Swal.fire({
                            title: "Notificación de evaluación",
                            text: mensaje,
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Comenzar!",
                            cancelButtonText: "Cancelar",
                            confirmButtonClass: "btn btn-warning",
                            cancelButtonClass: "btn btn-danger ml-1",
                            buttonsStyling: false,
                            customClass: {
                                container: 'custom-swal-container',
                                popup: 'custom-swal-popup'
                            },
                        }).then(function(result) {
                            if (result.value) {

                                $("#btn_eval").show();
                                $("#titu_Eva").show();
                                $("#titu_temaEva").hide();

                                clearInterval();

                                if (HabTie == "SI") {
                                    var hora = Tiempo;

                                    parts = hora.split(':');
                                    var hora = Tiempo;
                                    parts = hora.split(':');
                                    var hor = parts[0];
                                    var min = parts[1];

                                    var milhor = parseInt(hor) * 3600000;
                                    var milmin = parseInt(min) * 60000;


                                    $("#contTiempo").show();
                                    // Establece la fecha hasta la que estamos contando
                                    var countDownDate = milhor + milmin;

                                    var ahora = new Date().getTime();
                                    countDownDate = countDownDate + ahora;
                                    var tiempoextra = 300000;



                                    // Actualiza la cuenta atrás cada 1 segundo.
                                    xtiempo = setInterval(function() {

                                        var oElem = document.getElementById('cuenta');
                                        oElem.style.backgroundColor = oElem.style
                                            .backgroundColor == 'white' ? '#00b5b8' :
                                            'white';

                                        // Obtener la fecha y la hora de hoy
                                        var now = new Date().getTime();

                                        // Encuentra la distancia entre ahora y la fecha de la cuenta regresiva
                                        var distance = countDownDate - now;

                                        // Cálculos de tiempo para días, horas, minutos y segundos
                                        var days = Math.floor(distance / (1000 * 60 *
                                            60 * 24));
                                        var hours = Math.floor((distance % (1000 * 60 *
                                            60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((distance % (1000 *
                                            60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 *
                                            60)) / 1000);

                                        var tiempoCompl = now - ahora;


                                        // Muestra el resultado en un elemento
                                        document.getElementById("cuenta").innerHTML =
                                            hours + "h " + minutes + "m " + seconds +
                                            "s ";
                                        var horas = Math.floor(tiempoCompl / (1000 *
                                            60 * 60));
                                        var minutes = Math.floor(tiempoCompl / 60000);
                                        var seconds = ((tiempoCompl % 60000) / 1000)
                                            .toFixed(0);

                                        $("#tiempEvaluacion").val(horas + ":" +
                                            minutes + ":" + (seconds < 10 ? '0' :
                                                '') + seconds);

                                        // Si la cuenta atrás ha terminado, escribe un texto.

                                        if (flagTimExt === "n") {
                                            if (distance < tiempoextra) {
                                                flagTimExt = "s";
                                                mensaje =
                                                    "La Evaluación finalizara en 5 Minutos, si aún tiene preguntas por responder por favor responda y presione el botón Finalizar.";
                                                Swal.fire({
                                                    title: "Notificación de Evaluación",
                                                    text: mensaje,
                                                    icon: "warning",
                                                    button: "Aceptar",
                                                });
                                            }
                                        }

                                        if (flagTimExt === "s") {
                                            if (distance < 0) {
                                                flagTimFin = "s";
                                                clearInterval(xtiempo);
                                                document.getElementById("cuenta")
                                                    .innerHTML =
                                                    "TIEMPO DE EVALUACIÓN TERMINADO";

                                                mensaje =
                                                    "La Evaluación ha finalizado, si no logro terminar informe al Docente encargado.";
                                                Swal.fire({
                                                    title: "Notificación de Evaluación",
                                                    text: mensaje,
                                                    icon: "warning",
                                                    button: "Aceptar",
                                                });

                                            }
                                        }

                                    }, 1000);
                                }
                                ////////////////////////FIN CONTADOR////////////////////////


                            } else {
                                $.AtrasModActIni('F');
                            }
                        });
                    }


                },
                CargPreg: function(id) {

                    var form = $("#formCargaPreguntas");
                    var Preg = $("#id-pregunta" + id).val();
                    var tipo = $("#tip-pregunta" + id).val();

                    var opci = "";
                    var parr = "";
                    var punt = "";

                    $("#Pregunta").remove();
                    $("#TipPregunta").remove();
                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                        Preg + "'>");
                    form.append(
                        "<input type='hidden' name='TipPregunta' id='TipPregunta' value='" + tipo +
                        "'>"
                    );
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
                                $("#Puntaje" + id).html(respuesta.PregEnsayo.puntaje +
                                    " Puntos");

                                Pregunta += respuesta.PregEnsayo.pregunta;
                                Pregunta += '<div class="col-xl-12 col-lg-6 col-md-12">' +
                                    '   <label for="placeTextarea">Respuesta:</label>' +
                                    ' <textarea cols="80" id="RespPregEns" name="RespPregEns"' +
                                    ' rows="3"></textarea>' +
                                    ' </div>';
                                $("#Pregunta" + id).html(Pregunta);
                                $.hab_ediContPregEnsayo();
                                if (respuesta.RespPregEnsayo) {
                                    $('#RespPregEns').val(respuesta.RespPregEnsayo
                                        .respuesta);
                                }
                            } else if (tipo === "COMPLETE") {
                                $("#Puntaje" + id).html(respuesta.PregComple.puntaje +
                                    " Puntos");
                                Pregunta += '<div class="col-xl-12 col-lg-6 col-md-12">' +
                                    '   <label for="placeTextarea">Complete el Parrafo con las siguientes Opciones:</label>' +
                                    '<p>' + respuesta.PregComple.opciones + '</p>' +
                                    ' <textarea cols="80" id="RespPregComplete" name="RespPregComplete"' +
                                    ' rows="3"></textarea>' +
                                    ' </div>';
                                $("#Pregunta" + id).html(Pregunta);
                                $.hab_ediContComplete();
                                $('#RespPregComplete').val(respuesta.PregComple.parrafo);
                                if (respuesta.RespPregComple) {
                                    $('#RespPregComplete').val(respuesta.RespPregComple
                                        .respuesta);
                                }

                            } else if (tipo === "OPCMULT") {
                                $("#Puntaje" + id).html(respuesta.PregMult.puntuacion +
                                    " Puntos");
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
                                                    '<input onclick="$.RespMulPreg(this.id)" id="' +
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

                                $("#Pregunta" + id).html(Pregunta + opciones);


                            } else if (tipo === "VERFAL") {
                                $("#Puntaje" + id).html(respuesta.PregVerFal.puntaje +
                                    " Puntos");


                                Pregunta += respuesta.PregVerFal.pregunta;
                                var Opc =
                                    '<div class="form-group row">' +
                                    '<div class="col-md-12">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">';

                                Opc +=
                                    '<input name="radpregVerFal[]" id="RadVer" value="si"  type="radio">';

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
                                    ' <input name="radpregVerFal[]" id="RadFal"  value="no"  type="radio">';
                                Opc +=
                                    '<div class="input-group-append" style="margin-left:5px;">' +
                                    '            <span  id="basic-addon2">Falso</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '            </div>';


                                $("#Pregunta" + id).html(Pregunta + Opc);

                                if (respuesta.RespPregVerFal) {
                                    if (respuesta.RespPregVerFal.respuesta_alumno ===
                                        "si") {
                                        $('#RadVer').prop("checked", "checked");
                                    } else {
                                        $('#RadFal').prop("checked", "checked");
                                    }
                                }
                            } else if (tipo === "RELACIONE") {
                                $("#Puntaje" + id).html(respuesta.PregRelacione.puntaje +
                                    " Puntos");
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

                                    selectPreg =
                                        '<div style="text-transform: none;" class="contenedor' +
                                        cons +
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
                                            ' <a onclick="$.selopc(this.id,' +
                                            cons + ')" id="' + j +
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
                                console.log(respuesta.RespPregRelacione);
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
                                        let optioSel = item2.getAttribute(
                                            'data-id');
                                        if (item.respuesta_alumno == optioSel) {

                                            contenidoSelect.innerHTML = sel[i]
                                                .innerHTML;
                                        }

                                    }

                                    select.classList.toggle('active');
                                    $.selopc(item.consecu, cons)
                                    cons++;
                                });

                            } else if (tipo === "TALLER") {
                                $("#Puntaje" + id).html(respuesta.PregTaller.puntaje +
                                    " Puntos");

                                $("#CargArchi").val("");

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
                                    '       <div class="form-group" id="divarchi">' +
                                    '       <h6 class="form-section"><strong>Agregar Desarrollo de Taller: </strong> </h6>' +
                                    '             <input id="archiTaller"  name="archiTaller" type="file">' +
                                    '       </div>' +
                                    '  </div>' +
                                    '</div>';

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
                                        '<button type="button" onclick="$.CambArchivo();" class="btn btn-warning"><i' +
                                        '           class="fa fa-refresh"></i> Cambiar Archivo</button>' +
                                        ' </div>' +
                                        ' </div>';

                                    $("#divarchi").html(archivo);
                                }

                            }

                        }

                    });

                },
                GuarPreg: function(id, npreg) {

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    flagGlobal = "n";
                    var form = $("#Evaluacion");
                    var url = form.attr("action");
                    var IdEval = $("#IdEval").val();
                    var token = $("#token").val();
                    var Id_Doce = $("#Id_Doce").val();
                    var archivo = $("#CargArchi").val();
                    var Preg = $("#id-pregunta" + id).val();
                    var tipo = $("#tip-pregunta" + id).val();
                    var tiempo = $("#tiempEvaluacion").val();

                    if ($("#Tip_Usu").val() === "Estudiante") {

                        if (tipo === "OPCMULT") {
                            var sel = "n";
                            if ($('.checksel').is(':checked')) {
                                sel = "s";
                            }

                            if (sel === "n") {
                                flagGlobal = "s";
                                mensaje = "No ha seleccionado ninguna Opción";
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: mensaje,
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 2500,
                                    buttonsStyling: false
                                });
                                return;
                                return;
                            }
                        } else if (tipo === "VERFAL") {
                            var sel = "n";
                            if ($("input:radio[name='radpregVerFal[]']").is(":checked")) {
                                sel = "s";
                            }

                            if (sel === "n") {
                                flagGlobal = "s";
                                mensaje = "No ha seleccionado ninguna Opción";
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: mensaje,
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 2500,
                                    buttonsStyling: false
                                });
                                return;
                            }

                        } else if (tipo === "RELACIONE") {
                            var sel = "s";
                            $("input[name='RespSelect[]']").each(function(indice, elemento) {
                                if ($(elemento).val() === '') {
                                    sel = "n";
                                }
                            });

                            if (sel === "n") {
                                flagGlobal = "s";
                                mensaje = "No se han completado las relaciones";
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: mensaje,
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 2500,
                                    buttonsStyling: false
                                });
                                return;
                            }
                        } else if (tipo === "TALLER") {
                            var sel = "s";
                            if ($('#archiTaller').val()) {} else {
                                sel = "n";
                            }

                            if (sel === "n" && archivo === "") {
                                flagGlobal = "s";
                                mensaje = "No se ha cargado ningun archivo";
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: mensaje,
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 2500,
                                    buttonsStyling: false
                                });
                                return;
                            }


                        }

                        if (flagIntent === "fail" && $("#Tip_Usu").val() === "Estudiante") {
                            flagGlobal = "s";
                            mensaje = "Ha superado Los Intentos Permitidos";
                            Swal.fire({
                                type: "warning",
                                title: "Oops...",
                                text: mensaje,
                                confirmButtonClass: "btn btn-primary",
                                timer: 2500,
                                buttonsStyling: false
                            });
                            return;
                        }

                    } else {
                        if (npreg === "Ultima") {
                            mensaje = "Solo los Estudiantes pueden Responder las Evaluaciones";
                            Swal.fire({
                                type: "warning",
                                title: "Oops...",
                                text: mensaje,
                                confirmButtonClass: "btn btn-primary",
                                timer: 2500,
                                buttonsStyling: false
                            });
                            clearInterval(xtiempo);
                            xtiempo = null;
                        } else {
                            $("#Pregunta" + id).html("");
                        }
                        return;


                    }

                    $("#Pregunta").remove();
                    $("#TipPregunta").remove();
                    $("#nPregunta").remove();
                    $("#NArchivo").remove();
                    $("#IdEvaluacion").remove();
                    $("#idtoken").remove();
                    $("#Id_Docente").remove();
                    $("#Tiempo").remove();

                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                        Preg + "'>");
                    form.append("<input type='hidden' name='nPregunta' id='nPregunta' value='" +
                        npreg + "'>");
                    form.append(
                        "<input type='hidden' name='TipPregunta' id='TipPregunta' value='" + tipo +
                        "'>");
                    form.append(
                        "<input type='hidden' name='NArchivo' id='NArchivo' value='" + archivo +
                        "'>"
                    );
                    form.append("<input type='hidden' name='IdEvaluacion' id='IdEvaluacion' value='" +
                        IdEval + "'>");
                    form.append("<input type='hidden' id='idtoken' name='_token'  value='" + token +
                        "'>");
                    form.append("<input type='hidden' id='Id_Docente' name='Id_Docente'  value='" +
                        Id_Doce + "'>");
                    form.append("<input type='hidden' id='Tiempo' name='Tiempo'  value='" +
                        tiempo + "'>");




                    if (tipo === "TALLER") {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: new FormData($('#Evaluacion')[0]),
                            processData: false,
                            contentType: false,
                            success: function(respuesta) {
                                if (npreg === "Ultima") {
                                    $.MostrResulEval(respuesta);
                                } else {
                                    $("#Pregunta" + id).html("");
                                }

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
                    } else {
                        var datos = form.serialize();

                        $.ajax({
                            type: "POST",
                            url: url,
                            data: datos,
                            dataType: "json",
                            async: false,
                            success: function(respuesta) {

                                if (npreg === "Ultima") {
                                    $.MostrResulEval(respuesta);

                                } else {
                                    $("#Pregunta" + id).html("");

                                }
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

                    }

                },
                hab_ediContPregEnsayo: function() {
                    CKEDITOR.replace('RespPregEns', {
                        width: '100%',
                        height: 100
                    });
                },
                hab_ediContComplete: function() {
                    CKEDITOR.replace('RespPregComplete', {
                        width: '100%',
                        height: 100
                    });
                },
                AtrasModActIni: function(opc) {
                    if (opc == "F") {
                        $('#ModEval').modal('toggle');
                        $("#contTiempo").hide();
                        $("#VidDidac").hide();
                        $("#DetEval").hide();
                        $("#DetEvalFin").hide();
                        $("#btn_eval").hide();
                        $("#Dat_Cal").hide();
                        $("#btn_atrasModEv").show();
                        $("#btn_salirModEv").hide();
                        $("#titu_Eva").hide();
                        $("#titu_temaEva").show();
                    } else {

                        var mensaje = "¿Esta seguro de Cerrar La Evaluación?";
                        Swal.fire({
                            title: "Notificación de evaluación",
                            text: mensaje,
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Cerrar!",
                            cancelButtonText: "Cancelar",
                            confirmButtonClass: "btn btn-warning",
                            cancelButtonClass: "btn btn-danger ml-1",
                            buttonsStyling: false,
                        }).then(function(result) {
                            if (result.value) {
                                $('#ModEval').modal('toggle');
                                $("#contTiempo").hide();
                                $("#DetEval").hide();
                                $("#DetEvalFin").hide();
                                $("#btn_eval").hide();
                                $("#VidDidac").hide();
                                $("#Dat_Cal").hide();
                                $("#btn_salirModEv").show();
                                $("#btn_atrasModEv").hide();
                                $("#titu_Eva").hide();
                                $("#titu_temaEva").show();

                                $.ReiniciarCont();

                            }
                        });
                    }

                },
                ReiniciarCont: function() {
                    $("#contTiempo").hide();
                    $('#cuenta').timer('remove');
                    clearInterval(xtiempo);
                    xtiempo = null;
                },
                MostrResulEval: function(respuesta) {

                    Swal.fire({
                        type: "success",
                        title: "Notificación de Evaluación",
                        text: "Operación realizada exitosamente",
                        confirmButtonClass: "btn btn-primary",
                        timer: 1500,
                        buttonsStyling: false
                    });
                    let idTema = $("#idTema").val();
                    $.verTemas(idTema);

                    var IntReal = respuesta.InfEval.int_realizados;
                    var IntPerm = respuesta.InfEval.intentos_perm;
                    var puntMax = parseInt(respuesta.InfEval.punt_max);
                    var puntTotal = parseInt(respuesta.Libro.puntuacion);
                    var TipCali = respuesta.InfEval.calif_usando;

                    $("#DetEval").hide();
                    $("#contTiempo").hide();
                    $("#Dat_Cal").hide();
                    $("#VidDidac").hide();
                    $("#btn_ConversaEval").hide();

                    $("#DetEvalFin").show();

                    var $wrapper = $('#DetEvalFin');
                    $wrapper.avnSkeleton('display');

                    $wrapper.avnSkeleton('remove');

                    $wrapper.find('> header').append("Resultado de Evaluación");
                    var tiempoEval = "";
                    var tiempoUsad = "";

                    if (respuesta.InfEval.hab_tiempo === "NO") {
                        tiempoEval = "Esta Evaluación no Cuenta con un tiempo para su Desarrollo";
                        tiempoUsad = "No Aplica";
                    } else {
                        tiempoEval = respuesta.InfEval.tiempo;
                        tiempoUsad = respuesta.Libro.tiempo_usado;
                    }


                    var contenido = '<div class="card">' +
                        '<div class="card-content">' +
                        '  <ul class="list-group list-group-flush">' +
                        '    <li class="list-group-item">' +
                        '      <span class="badge badge-default badge-pill bg-info float-right">' +
                        tiempoEval + '</span> <b>Tiempo de la Evaluación:</b>' +
                        '    </li>' +
                        '     <li class="list-group-item">' +
                        '       <span class="badge badge-default badge-pill bg-danger float-right">' +
                        tiempoUsad + '</span> <b>Tiempo Utilizado:</b>' +
                        '</li>' +
                        '<li class="list-group-item">' +
                        '<span class="badge badge-default badge-pill bg-warning float-right">' +
                        respuesta.InfEval.int_realizados + '/' + respuesta.InfEval.intentos_perm +
                        '</span> <b>Intentos</b>' +
                        '</li>' +
                        '<li class="list-group-item">' +
                        '<span id="txt_califVis" class="badge badge-default badge-pill  float-right">30/60</span> <b>Calificación:</b> ' +
                        '</li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>';

                    $wrapper.find('> main').append(contenido);


                    if (respuesta.InfEval.calxdoc == "SI") {
                        $("#txt_califVis").css('background-color', '#2DCEE3');
                        $("#txt_califVis").html("PENDIENTE POR CALIFICAR.");

                    } else {

                        var porcentaje = (puntTotal / puntMax) * 100;
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
                        $("#txt_califVis").css('color', '#ffffff');

                        if (TipCali == "Puntos") {
                            $("#txt_califVis").html(puntTotal + "/" + puntMax);
                        } else if (TipCali == "Porcentaje") {
                            $("#txt_califVis").html(porcentaje + "%");
                        } else {
                            switch (true) {
                                case (porcentaje < 35):
                                    $("#txt_califVis").html("Super Bajo");
                                    break;
                                case (porcentaje >= 35 && porcentaje < 60):
                                    $("#txt_califVis").html("Bajo");
                                    break;
                                case (porcentaje >= 60 && porcentaje < 80):
                                    $("#txt_califVis").html("Basico");
                                    break;
                                case (porcentaje >= 80 && porcentaje < 95):
                                    $("#txt_califVis").html("Alto");
                                    break;
                                case (porcentaje >= 95):
                                    $("#txt_califVis").html("Superior");
                                    break;
                            }
                        }

                    }

                },
                RespMulPreg: function(id) {

                    $('.OpcionSel').val("no");

                    if ($('#' + id).prop('checked')) {
                        $('.checksel').prop("checked", "");
                        $('#' + id).prop("checked", "checked");
                        $('#OpcionSel_' + id).val("si");
                    }

                },
                selopc: function(id, cons) {
                    $("#RespSelect" + cons).val($("#" + id).data("id"));
                    $("#ConsPreg" + cons).val(id);

                },
                MostArc: function(id) {
                    window.open($('#dattaller').data("ruta") + "/" + $('#' + id).data("archivo"),
                        '_blank');
                },
                MostVid: function() {
                    $("#ModVidelo").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#ModEval').modal('toggle');
                },
                SalirAnim: function() {
                    $('#ModVidelo').modal('toggle');
                    $("#ModEval").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    var videoID = 'datruta';
                    $('#' + videoID).get(0).pause();
                },


            })

            $.cargarUnidades();


        });
    </script>
@endsection
