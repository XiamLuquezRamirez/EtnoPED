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
        <div class="row" >
            <div id="div-medicina" class="col-sm-12 col-md-12">

            </div>
        </div>
        <div class="row" id="div-detmedicina" style="display: none;">
            <div class="row match-height" style="width: 100%;">
                <!-- Description lists horizontal -->
                <div class="col-sm-12 col-md-8"  >
                    <div class="card" style="height: 432.517px;">
                        <div class="card-header">
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
                <div class="col-sm-12 col-md-4">
                    <div class="card" style="height: 432.517px;">
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
                </div>
                <!--/ Description lists vertical-->
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
                                    '  <div class="col-12 pb-1" style="cursor:pointer;" ><div onclick="$.verDetMedicina(' +
                                    item.id +
                                    ');" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">' +
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

                          var ContentVidPreparacion = document.getElementById('cont-vidPre');
                          let url = $('#urlMult').data("ruta") + "/contenidoMultimedia/PreparacionMedicinaTradicional/" + response.Medicina.video_prepa;
                            if(response.Medicina.video_prepa =! ""){
                              
                              console.log(url);
                                $("#cont-vidPre").show();
                                ContentVidPreparacion.innerHTML =
                                '<video style="width: 100%;"  controls><source  src="' + url +
                                '" type="video/mp4"></video>';

                            }else{
                                $("#cont-vidPre").hide();
                            }

                        }
                    });

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
