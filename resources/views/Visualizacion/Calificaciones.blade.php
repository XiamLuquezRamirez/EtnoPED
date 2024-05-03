@extends('Plantilla.Principal')
@section('title', 'Gestionar Tematicas')
@section('Contenido')
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="accion" id="accion" value="">
    <input type="hidden" name="consEjemplo" id="consEjemplo" value="0">
    <input type="hidden" id="urlMult" data-ruta="{{ asset('/app-assets/') }}" />
    <input type="hidden" class="form-control" id="Ruta" value="{{ url('/') }}/" />
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/Principal') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Lista de Calificaciones</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Calificaciones</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Módulo</th>
                                        <th>Tema</th>
                                        <th class="text-center">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody id="tr_calificaciones">
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="loader" class="loader-spinner" style="display: none;">
            <img src="{{ asset('app-assets/images/libro.gif') }}" width="150" />
            <h2 class="parpadeo" style="color: #FC4F00; font-weight: bold;">Cargando...</h2>

        </div>

    </div>

    <form action="{{ url('/Visualizacion/CargarCalificaciones') }}" id="formCargarCalificaciones" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>



@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#Calificaciones").addClass("active");

            $.extend({
                cargar: function() {
                    var form = $("#formCargarCalificaciones");
                    var url = form.attr("action");
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
                            $('#tr_calificaciones').html(response.calificaciones);
                        }
                    });
                }
            });

            $.cargar();

        });
    </script>
@endsection
