@extends('Plantilla.Principal')
@section('title', 'Usos y Costumbres')
@section('Contenido')
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Principal ">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Usos y Costumbres</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0" id="titulo">Usos y Costumbres</h3>
        </div>

    </div>
    <div class="content-body">
        
        <div class="row">
            <div class="col-sm-12 col-md-12"  >
                <div class="card p-1" style="border-radius:10px;background-color: rgba(0,0,0,0);">
                    <div class="card-header" style="background-color: rgba(0,0,0,0);">
                        <h4 id="titulo-usos" class="card-title">Listado de Usos y Costumbres</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="div-Uso" class="col-sm-12 col-md-12">

                            </div>
                            <div id="conte-Uso" style="display: none;" class="card-text">
                               
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
                        <a class="btn btn-outline-dark" style="display: none;" id="btn-atrasUso"
                            onclick="$.atrasUsos();" title="Volver">
                            <i class="fa fa-angle-double-left"></i> Volver
                        </a>
                        <a class="btn btn-blue" style="display: none;" id="btn-vidUso"
                            onclick="$.MostVid();" title="Volver">
                            <i class="fa fa-video-camera"></i> Ver Video
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

    <form action="{{ url('/UsoCostumbres/CargarUsos') }}" id="formCargarUsos" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/UsoCostumbres/CargarDetUsos') }}" id="formCargarDetUsos" method="POST">
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

            $("#UsosCostumbres").addClass("active");

            $.extend({
                cargarUsos: function() {
                    var form = $("#formCargarUsos");
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
                            $.each(response.Usos, function(i, item) {
                                tdTable +=
                                    '  <div class="col-12 pb-1" style="cursor:pointer;" ><div style="border: 1px solid #F9C55A !important; cursor:pointer;background-image: url(\'{{ asset('/app-assets/images/backgrounds/bg_callout.png') }}\'); background-size: 100% 100%;" onclick="$.verDetUsos(' +
                                    item.id +
                                    ');" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1 pl-2 hvr-grow-shadow">' +
                                    '<h4 class="primary">' + item.nombre + '</h4>' +
                                    '</div></div>';
                            });

                            $("#div-Uso").html(tdTable);
                        }
                    });
                },
                verDetUsos: function(idUso) {
                    $("#div-Uso").hide();
                    $("#conte-Uso").show();
                    $("#btn-atrasUso").show();

                    var form = $("#formCargarDetUsos");
                    var url = form.attr("action");
                    $("#idUso").remove();
                    form.append("<input type='hidden' id='idUso' name='idUso'  value='" +
                    idUso + "'>");
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
                            $("#titulo").html(response.detUsos.nombre);
                            $("#titulo-usos").html(response.detUsos.nombre);
                            $("#conte-Uso").html(response.detUsos.descripcion);

                            if(response.detUsos.url_video !=""){
                                $("#btn-vidUso").show();
                                let url = $('#urlMult').data("ruta") + "/contenidoMultimedia/UsosCostumbres/" +response.detUsos.url_video ;
                                var modalContent = document.getElementById('modalContent');
                                modalContent.innerHTML =
                                '<video id="vidUsos" style="width: 100%; height:360px;"  controls><source  src="' + url +
                                '" type="video/mp4"></video>';
                            }else{
                                $("#btn-vidUso").hide();
                            }

                            var video_player = new Plyr("#vidUsos");
                          
                        }
                    });

                },
               
                atrasUsos: function() {
                    $("#btn-atrasUso").hide();
                    $("#btn-vidUso").hide();
                    $("#div-Uso").show();
                    $("#conte-Uso").hide();
                },
                MostVid: function() {
                    $("#modalMultimediaTematica").modal({
                        backdrop: 'static',
                        keyboard: false
                    }).show();
                    
                },
                cerrarMultimedia: function() {
                    $('#modalMultimediaTematica').modal('hide');
                 
                    var videoID = 'datruta';
                    $('#' + videoID).get(0).pause();
                },


            })

            $.cargarUsos();


        });
    </script>
@endsection
