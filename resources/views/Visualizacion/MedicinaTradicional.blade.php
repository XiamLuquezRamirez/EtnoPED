@extends('Plantilla.Principal')
@section('title', 'Medicina Tradicional')
@section('Contenido')
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Principal ">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Medicina Tradicional</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0" id="titulo">Medicina Tradicional</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="card p-1" style="border-radius:10px;background-color: rgba(0,0,0,0);">
            <div class="card-header" style="background-color: rgba(0,0,0,0);">
                <h4 class="card-title">Medicinas Tradicionales</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>

                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="row">
                    <div id="div-medicina" class="col-sm-12 col-md-12">

                    </div>
                </div>
                <div class="row" id="div-detmedicina" style="display: none;">
                    <div class="row match-height" style="width: 100%;">
                        <!-- Description lists horizontal -->
                        <div class="col-sm-12 col-md-8" style="">
                            <div class="card" style="height: 432.517px; background-image: url({{ asset('/app-assets/images/backgrounds/fondo3.png') }})">
                                <div class="card-header" >
                                    <h4 id="titulo-medicina" class="card-title"></h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="conte-medicina" class="card-text">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Description lists horizontal-->

                        <!-- Description lists vertical-->
                        <div class="col-sm-12 col-md-4" style="">
                            <div class="card" style="background-image: url({{ asset('/app-assets/images/backgrounds/fondo3.png') }})">
                                <div class="card-header">
                                    <h4 class="card-title">Preparación</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="conte-preparacion" class="card-text">

                                        </div>
                                        <div id="cont-vidPre" style="display: none;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="; background-image: url({{ asset('/app-assets/images/backgrounds/fondo3.png') }})">
                                <div class="card-header">
                                    <h4 class="card-title">Evaluaciónes</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <ul class="list-group" id="listEvalMedicina">
                                           
                                          
                                         
                                        </ul>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Description lists vertical-->
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="form-actions right">
            <div class="row ">
                <div class="col-md-12 col-lg-12 ">
                    <div class="btn-list">
                        <a class="btn btn-outline-dark" style="display: none;" id="btn-atrasMedi"
                            onclick="$.atrasMedicina();" title="Volver">
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

    <form action="{{ url('/MedicinaTradicional/CargarMedicina') }}" id="formCargarMedicina" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/MedicinaTradicional/CargarDetMedicina') }}" id="formCargarDetMedicina" method="POST">
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

            $("#MedicinaTradicional").addClass("active");

            $.extend({
                cargarMedicina: function() {
                    var form = $("#formCargarMedicina");
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
                            $.each(response.Medicinas, function(i, item) {
                                tdTable +=
                                    '  <div class="col-12 pb-1" style="cursor:pointer;" ><div style="border: 1px solid #F9C55A !important; cursor:pointer;background-image: url(\'{{ asset('/app-assets/images/backgrounds/bg_callout.png') }}\'); background-size: 100% 100%;" onclick="$.verDetMedicina(' +
                                    item.id +
                                    ');" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1 pl-2 hvr-grow-shadow">' +
                                    '<h4 class="primary">' + item.nombre + '</h4>' +
                                    '</div></div>';
                            });

                            $("#div-medicina").html(tdTable);
                        }
                    });
                },
                verDetMedicina: function(idTema) {
                    $("#div-medicina").hide();
                    $("#div-detmedicina").show();
                    $("#btn-atrasMedi").show();

                    var form = $("#formCargarDetMedicina");
                    var url = form.attr("action");
                    $("#idMedicina").remove();
                    form.append("<input type='hidden' id='idMedicina' name='idMedicina'  value='" +
                        idTema + "'>");
                    var datos = form.serialize();

                    let multi = '';
                    let ejemplos = '';
                    let practicas = '';
                    let evaluacion = '';
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
                            $("#titulo").html(response.Medicina.nombre);

                            $("#titulo-medicina").html(response.Medicina.nombre);
                            $("#conte-medicina").html(response.Medicina.contenido);
                            $("#conte-preparacion").html(response.Medicina.cotenido_prepa);

                            var ContentVidPreparacion = document.getElementById(
                                'cont-vidPre');
                            let url = $('#urlMult').data("ruta") +
                                "/contenidoMultimedia/PreparacionMedicinaTradicional/" +
                                response.Medicina.video_prepa;
                            if (response.Medicina.video_prepa = !"") {

                                console.log(url);
                                $("#cont-vidPre").show();
                                ContentVidPreparacion.innerHTML =
                                    '<video id="vidPrepa"  style="width: 100%;"  controls><source  src="' +
                                    url +
                                    '" type="video/mp4"></video>';

                                var video_player = new Plyr("#vidPrepa");

                            } else {
                                $("#cont-vidPre").hide();
                            }

                            //Listar evaluaciones
                            let listEval = "";
                            $.each(response.evaluaciones, function(i, item){
                                listEval+=' <li onclick="$.MostEval('+item.id+');" class="list-group-item hvr-grow-shadow" style="text-transform: capitalize; cursor: pointer;">'
                                    +'<span class="float-left">'
                                    +'<i class="fa fa-check-square-o mr-1"></i>'
                                    +'</span>'
                                    + item.titulo
                                +'</li>';
                            });

                            $("#listEvalMedicina").html(listEval);

                        }
                    });

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

                atrasMedicina: function() {
                    $("#btn-atrasMedi").hide();
                    $("#div-medicina").show();
                    $("#div-detmedicina").hide();
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

            $.cargarMedicina();


        });
    </script>
@endsection
