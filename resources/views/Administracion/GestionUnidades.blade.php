@extends('Plantilla.Principal')
@section('title', 'Gestionar Unidades Tematicas')
@section('Contenido')
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="accion" id="accion" value="">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Lista de Unidades Tematicas</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Unidades Tematicas</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Unidades Tematicas</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <button onclick="$.nueva();" id="addRow" class="btn btn-primary mb-2 ml-1"><i
                                class="feather icon-plus"></i>&nbsp; Agregar Unidad</button>
                        <div class="table-responsive">
                            <table class="table table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>

                                    </tr>
                                </thead>
                                <tbody id="tdTable">


                                </tbody>
                            </table>
                        </div>
                        <div class="text-center ml-1 mt-2">
                            <ul class="pagination page1-links">
                                <li class="page-item prev disabled"><a href="#" class="page-link">Aterior</a></li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item next"><a href="#" class="page-link">Siguiente</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  Modal nueva unidad  --}}
        <div class="modal fade text-left" id="modalUnidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tituloUnidad"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">

                            <form class="form" onsubmit="$.guardar(event)" method="post" id="formGuardar"
                                action="{{ url('/') }}/AdminGramaticaLenguaje/GuardarUnidad">
                                <input type="hidden" name="id" id="id" value="" />
                                <div class="form-body">
                                    <h4 class="form-section"><i class="feather icon-info"></i> Información Basica de la
                                        Unidad</h4>

                                    <div class="form-group">
                                        <label for="userinput5">Nombre:</label>
                                        <div class="controls">
                                            <input class="form-control border-primary" type="text" required
                                                data-validation-required-message="This field is required" name="nombre"
                                                placeholder="Nombre" id="nombre">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="userinput8">Descripción:</label>
                                        <textarea id="descripcion" rows="5" class="form-control border-primary" name="descripcion"
                                            placeholder="Descripcion"></textarea>
                                    </div>

                                </div>

                                <div class="form-actions right">
                                    <button type="reset" class="btn btn-warning mr-1">
                                        <i class="feather icon-x"></i> Cancelar
                                    </button>
                                    <button type="submit" id="btnGuardar" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Guardar
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <form action="{{ url('/AdminGramaticaLenguaje/CargarUnidades') }}" id="formCargarUnidad" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

    <form action="{{ url('/AdminGramaticaLenguaje/BuscarUnidad') }}" id="formBuscarUnidad" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/AdminGramaticaLenguaje/EliminarUnidad') }}" id="formEliminarUnidad" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#Princioal").removeClass("active");
            $("#MenuGramatica").addClass("has-sub open");
            $("#MenuGramaticaUnidad").addClass("active");


            $.extend({
                cargar: function() {
                    var form = $("#formCargarUnidad");
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
                        success: function(respuesta) {
                            $.each(respuesta.unidades, function(i, item) {
                                if (item.descripcion)
                                    var descripcionCortada = item.descripcion
                                        .length >
                                        100 ? item.descripcion.substring(0, 100) +
                                        '...' : item.descripcion;
                                tdTable += '<tr>' +
                                    '<td><div class="btn-group" role="group" aria-label="First Group">' +
                                    '    <button type="button" onclick="$.editar(' +
                                    item.id +
                                    ');" class="btn btn-icon btn-outline-primary"><i' +
                                    '     class="fa fa-edit"></i></button>' +
                                    '    <button type="button" onclick="$.eliminar(' +
                                    item.id +
                                    ');" class="btn btn-icon btn-outline-warning"><i' +
                                    '     class="fa fa-trash-o"></i></button>' +
                                    '    </div>' +
                                    '</td>' +
                                    '<th scope="row">' + x + '</th>' +
                                    '<td>' + item.nombre + '</td>' +
                                    '<td>' + descripcionCortada + '</td>' +
                                    '</tr>';
                                x++;
                            });
                        }
                    });

                    $("#tdTable").html(tdTable);

                },
                nueva: function() {
                    $("#modalUnidad").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#tituloUnidad").html("Gestionar Unidades Tematicas");
                    $("#accion").val("agregar");
                    document.getElementById("formGuardar").reset();
                    $("#btnGuardar").prop('disabled', false);

                },
                guardar: function(e) {
                    e.preventDefault();


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
                                $("#btnGuardar").prop('disabled', true);
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

                    $("#modalUnidad").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
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
                            $.cargar();
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
                    var form = $("#formEliminarUnidad");

                    $("#idUnidad").remove();
                    form.append("<input type='hidden' id='idUnidad' name='idUnidad'  value='" + id +
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
                            Swal.fire({
                                type: "success",
                                title: "Eliminado!",
                                text: "El Registro fue eliminado correctamente.",
                                confirmButtonClass: "btn btn-success"
                            });
                        }
                    });

                }
            });
            $.cargar();
        });
    </script>
@endsection
