@extends('Plantilla.Principal')
@section('title', 'Tablero')
@section('Contenido')
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />
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
        <div class="row" id="div-unidades">

        </div>

        <div id="div-temas" style="display: none;">

        </div>

        <div id="div-detTemas" style="display: none;">
            <div class="card-body">
                <ul class="nav nav-tabs nav-linetriangle" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="homeIcon2-tab1" data-toggle="tab" href="#contenido"
                            aria-controls="homeIcon21" role="tab" aria-selected="true"><i class="fa fa-indent"></i>
                            Contenido</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="multimedia-tab1" data-toggle="tab" href="#multimedia"
                            aria-controls="multimedia" role="tab" aria-selected="false"><i
                                class="fa fa-file-video-o"></i>
                            Multimedia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ejemplos-tab1" data-toggle="tab" href="#ejemplos" aria-controls="ejemplos"
                            role="tab" aria-selected="false"><i class="fa fa-file-image-o"></i>
                            Ejemplos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="practicas-tab1" data-toggle="tab" href="#practicas"
                            aria-controls="practicas" role="tab" aria-selected="false"><i class="fa fa-comments-o"></i>
                            Practicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="evaluacion-tab1" data-toggle="tab" href="#evaluacion"
                            aria-controls="evaluacion" role="tab" aria-selected="false"><i
                                class="fa fa-check-square-o"></i>
                            Evaluación</a>
                    </li>
                </ul>
                <div class="tab-content px-1 pt-1">
                    <div class="tab-pane active in" id="contenido" aria-labelledby="contenido-tab1" role="tabpanel">
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
                        <p>Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice
                            cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream
                            powder tootsie roll cake.</p>
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
    <div class="modal fade text-left" id="modalPracticaTematica"  style="height: 90% !important; overflow: hidden;" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="titPractica" class="modal-title">Contenido Ejemplo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="px-1">
                    <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                        <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                            <span>En este espacio colocaras en practica lo aprendido.</span>
                        </div>
                        <li><span class="text-muted"></span> Deberas seleccionar la respuesta correcta segun la pregunta
                            que sea relizada por el personaje mostrado a tu izquierda. </li>
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
                                <div id="div-opcionesP"  style="display: none; width: 30%; text-align: center;" class="centered-div" >
                                    <h4>Seleccione la Respuesta</h4>
                                    <div id="div-opciones"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
           
            $("#Gramatica").addClass("active");
            let dest = "";
            let pregPractica = [];
            let respPractica = [];
            let actual = 0;
            let pregAct;
            let ok = false;
            let arrayOpciones =[];
            $.extend({
                cargarUnidades: function() {
                    var form = $("#formCargarUnidad");
                    var url = form.attr("action");

                    var datos = form.serialize();

                    let tdTable = '';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {
                            $.each(response.Unidades, function(i, item) {
                                tdTable +=
                                    '  <div class="col-12 pb-1" style="cursor:pointer;" ><div onclick="$.verTemasUnidad(' +
                                    item.id +
                                    ');" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">' +
                                    '<h4 class="primary">' + item.nombre + '</h4>' +
                                    ' <p>' + item.descripcion + '</p>' +
                                    '</div></div>';
                            });

                            $("#div-unidades").html(tdTable);
                        }
                    });
                },
                verTemasUnidad: function(idUnidad) {

                    $("#btn-atrasUnidades").show();
                    $("#btn-atrasModulos").hide();
                    $("#div-unidades").hide();
                    $("#div-temas").show();

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

                            $("#titulo").html("Gramatica y Lenguaje - " + response.Unidad
                                .nombre);
                            $("#titulo").html(response.Unidad.nombre);

                            $.each(response.Temas, function(i, item) {
                                tdTable +=
                                    '  <div class="col-12 pb-1" style="cursor:pointer;" ><div onclick="$.verTemas(' +
                                    item.id +
                                    ');" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">' +
                                    '<h4 class="primary">' + item.titulo + '</h4>' +
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

                    var form = $("#formCargarDetTemas");
                    var url = form.attr("action");
                    $("#idTema").remove();
                    form.append("<input type='hidden' id='idTema' name='idTema'  value='" +
                        idTema + "'>");
                    var datos = form.serialize();

                    let multi = '';
                    let ejemplos = '';
                    let practicas = '';
                    let x = 1;
                    let claseCallout = "";
                    let iconCallout = "";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {

                            $("#titulo").html("Gramatica y Lenguaje - " + response.Temas
                                .titulo);

                            //cargar Tematica
                            $("#titu").html(response.Temas.titulo);
                            $("#conte").html(response.Temas.contenido);

                            //cargarMultimedia
                            $.each(response.TemasMult, function(i, item) {

                                if (item.tipo_multimedia === 'application/pdf') {
                                    claseCallout = "danger";
                                    iconCallout = "fa-file-pdf-o";
                                } else if (item.tipo_multimedia.substr(0, 5) ===
                                    'video') {
                                    claseCallout = "info";
                                    iconCallout = "fa-file-video-o";
                                } else {
                                    claseCallout = "success";
                                    iconCallout = "fa-picture-o";
                                }
                                console.log(item.url_contenido);

                                multi +=
                                    ' <div style="cursor:pointer;" onclick="$.Ver(this.id);" id="div_' +
                                    x + '" data-id="' + item.id + '" data-url="' +
                                    item.url_contenido + '" data-tipo="' + item
                                    .tipo_multimedia + '" class="bs-callout-' +
                                    claseCallout + ' callout-bordered mb-1">' +
                                    '<div class="media align-items-stretch">' +
                                    '<div class="d-flex align-items-center bg-' +
                                    claseCallout + ' p-2">' +
                                    '<i class="fa ' + iconCallout +
                                    ' fa-lg white"></i>' +
                                    '</div>' +
                                    '<div class="media-body p-1">' +
                                    '<strong>' + item.nombre.slice(0, -4) +
                                    '</strong>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                x++;
                            });

                            $("#div-multimedia").html(multi);

                            x = 1;
                            //cargar ejemplos
                            $.each(response.TemasEjemplos, function(i, item) {

                                ejemplos +=
                                    '<div style="display:none;" id="contEjemplohide' +
                                    x + '">' + item.contenido +
                                    '</div> <div style="cursor:pointer;" onclick="$.VerEjemplo(' +
                                    x + ');" id="div_Ejemplo' + x +
                                    '" data-titulo="' + item.nombre +
                                    '"  data-audio="' + item.url_audio +
                                    '" class="bs-callout-danger callout-bordered mb-1">' +
                                    '<div class="media align-items-stretch">' +
                                    '<div class="d-flex align-items-center bg-danger p-2">' +
                                    '<i class="fa fa-child fa-lg white"></i>' +
                                    '</div>' +
                                    '<div class="media-body p-1">' +
                                    '<strong>' + item.nombre + '</strong>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                x++;
                            });

                            $("#div-ejemplos").html(ejemplos);

                            x = 1;
                            //cargar practicas
                            $.each(response.TemasPracticas, function(i, item) {

                                practicas +=
                                    '<div style="cursor:pointer;" id="practica' +
                                    item.id + '" data-titulo="' + item.titulo +
                                    '" onclick="$.VerPractica(' + item.id +
                                    ');"  class="bs-callout-danger callout-bordered mb-1">' +
                                    '<div class="media align-items-stretch">' +
                                    '<div class="d-flex align-items-center bg-danger p-2">' +
                                    '<i class="fa fa-comments-o fa-lg white"></i>' +
                                    '</div>' +
                                    '<div class="media-body p-1">' +
                                    '<strong>' + item.titulo + '</strong>' +
                                    '<p>' + item.objetivo + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                x++;
                            });

                            $("#div-practicas").html(practicas);

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
                            '<video style="width: 100%; height:360px;"  controls><source  src="' + url +
                            '" type="video/mp4"></video>';
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
                    
                    pregAct = pregPractica[actual].id;
                    $.maquina("parrafo1", pregPractica[actual].pregunta, 50, 1);
                },
                dialogo_Secundario: function(){
                    arrayOpciones = respPractica.filter((e) => e.preg_practica == pregAct);
                    $("#div-opcionesP").show();
                    $("#div-opciones").html("");
                    let opc="";
                    for (let itemOpc of arrayOpciones) {
                        opc +='<button style="width: 80%" type="button" data-id="'+itemOpc.correcta+'" onclick="$.verificar_respuesta(this);" class="btn btn-outline-dark round btn-min-width mr-1 mb-1">'+itemOpc.respuesta +'</button>'
                    }

                    $("#div-opciones").html(opc);

                    actual++;

                },
                verificar_respuesta: function(elemento){
                    var textop = elemento.innerHTML;
                    var respuesta = elemento.getAttribute('data-id');
                    var respuestas = document.getElementsByClassName("opcion");

                    if (respuesta == "si") {
                        elemento.classList.remove("btn-outline-dark");
                        elemento.classList.add("btn-success");
                    } else {
                        element.classList.remove("btn-outline-dark");
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
                },
                atrasUnidades: function() {
                    $("#btn-atrasUnidades").hide();
                    $("#btn-atrasModulos").show();
                    $("#div-unidades").show();
                    $("#div-temas").hide();
                },
                atrasTemas: function() {
                    $("#div-detTemas").hide();
                    $("#div-temas").show();
                    $("#btn-atrasUnidades").show();
                    $("#btn-atrasTemas").hide();
                }

            })

            $.cargarUnidades();

            function verificar_respuesta(elemento){
                alert("entr");
            }
        });

       
    </script>
@endsection
