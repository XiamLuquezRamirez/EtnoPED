@extends('Plantilla.Principal')
@section('title', 'Diccionario')
@section('Contenido')
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"x><a href="/Principal ">Inicio</a>
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
                    <div class="col-12 col-md-12" id="div-palabras">
                        
                        
                        
                    </div>
                    <div class="text-center">
                        <div id="pagination-links" class="text-center ml-1 mt-2">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade text-left" id="modalPalabra" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 id="palabra" class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class="card-body" id="div-detPalabra">

            </div>
            <div class="form-actions right">
                <button type="button" onclick="$.cerrarPalabra();" class="btn btn-warning mr-1">
                    <i class="fa fa-reply"></i> Atras
                </button>

            </div>
        </div>

    </div>
</div>
</div>

    <form action="{{ url('/Diccionario/CargarPalabraDicc') }}" id="formCargarPalabrasDicc" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/Diccionario/CargarDetpalabra') }}" id="formCargarDetpalabra" method="POST">
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
                cargarPalabras: function(page, searchTerm = '') {
                    var form = $("#formCargarPalabrasDicc");
                    var url = form.attr("action");
                    $('#page').remove();
                    $('#searchTerm').remove();
                    form.append("<input type='hidden' id='page' name='page'  value='" + page + "'>");
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
                             $('#div-palabras').html(response
                                .palabras); // Rellenamos la tabla con las filas generadas  
                            $('#pagination-links').html(response
                                .links); // Colocamos los enlaces de paginación
                        }
                    });
                },
                verPalabra: function(id) {

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

            $.cargarPalabras(1);


        });
    </script>
@endsection