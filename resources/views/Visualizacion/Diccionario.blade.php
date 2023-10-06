@extends('Plantilla.Principal')
@section('title', 'Diccionario')
@section('Contenido')
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Principal ">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Diccionario</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0" id="titulo">Diccionario</h3>
        </div>

    </div>
    <div class="content-body">
    <!-- Search form-->
    <section id="search-website" class="card overflow-hidden">
        <div class="card-header">
            <h4 class="card-title">Realiza tu busqueda</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                    <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body pb-0">
                <fieldset class="form-group position-relative mb-0">
                    <input type="text" class="form-control form-control-xl input-xl" id="iconLeft1" placeholder="Ingresa la Palabra a Buscar ...">
                  
                </fieldset>
            </div>
            
            <div id="search-results" class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <ul class="media-list p-0">
                            <li class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object width-150" src="../../../app-assets/images/portfolio/width-600/portfolio-14.jpg" alt="Generic placeholder image">
                                    </a>
                                </div>
                                <div class="media-body media-search">
                                    <p class="lead mb-0"><a href="#"><span class="text-bold-600">Attire bench</span> - Quick win shoot me an email</a></p>
                                    <p class="mb-0"><a href="#" class="teal darken-1">https://pixinvent.com/<span class="text-bold-600">stack</span>/ <i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
                                   
                                    <p><span class="text-muted">Aug 3, 2016 - </span> We need to dialog around <span class="text-bold-600">Stack Admin</span> your choice of work attire bench mark, or win-win-win. Quick win shoot me an email. Proceduralize i dont want to drain the whole swamp, i just want to shoot some alligators yet old boys club.</p>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-separate pagination-round pagination-flat">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">« Prev</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">Next »</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

            $("#Diccionario").addClass("active");

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
