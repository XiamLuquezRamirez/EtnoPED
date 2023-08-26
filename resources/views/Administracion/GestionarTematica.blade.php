@extends('Plantilla.Principal')
@section('title', 'Gestionar Tematicas')
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
                        <li class="breadcrumb-item"><a href="#">Lista de Tematicas</a>
                        </li>

                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Tematicas</h3>
        </div>

    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Tematicas</h4>
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
                            <div class="col-5">
                                <button onclick="$.nueva();" id="addRow" class="btn btn-primary mb-2 ml-1"><i
                                        class="feather icon-plus"></i>&nbsp; Agregar Tema</button>
                            </div>
                            <div class="col-7">

                                <div class="bug-list-search">
                                    <div class="bug-list-search-content">
                                        <div class="sidebar-toggle d-block d-lg-none"><i
                                                class="feather icon-menu font-large-1"></i></div>

                                        <form action="#">
                                            <div class="position-relative">
                                                <input type="search" id="search-contacts" class="form-control"
                                                    placeholder="Busqueda...">
                                                <div class="form-control-position">
                                                    <i class="fa fa-search text-size-base text-muted la-rotate-270"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Unidad</th>

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
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tituloUnidad"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">

                            <form class="form" method="post" id="formGuardar"
                                action="{{ url('/') }}/AdminGramaticaLenguaje/GuardarTema">
                                <input type="hidden" name="id" id="id" value="" />
                                <div class="form-body">
                                    <h4 class="form-section"><i class="feather icon-info"></i> Información Basica del Tema
                                    </h4>

                                    <div class="form-group">
                                        <label for="userinput5">Título:</label>
                                        <input class="form-control border-primary" type="text" name="titulo"
                                            placeholder="Título" id="titulo">
                                    </div>
                                    <div class="form-group">
                                        <label for="userinput5">Unidad Tematica:</label>
                                        <label for="userinput8">Descripción:</label>
                                        <select class="select2 form-control">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="userinput8">Contenido:</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="full-wrapper">
                                                    <div id="full-container">
                                                        <div class="editor">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions right">
                                    <button type="reset" class="btn btn-warning mr-1">
                                        <i class="feather icon-x"></i> Cancelar
                                    </button>
                                    <button type="button" id="btnGuardar" onclick="$.guardar()"
                                        class="btn btn-primary">
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
            $("#MenuGramaticaTematica").addClass("active");

            $(".select2").select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%'
              });


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
                                var descripcionCortada = item.descripcion.length >
                                    100 ? item.descripcion.substring(0, 100) +
                                    '...' : item.descripcion;
                                tdTable += '<tr>' +
                                    '<td>' +
                                    '<div class="form-group">' +
                                    '<div class="btn-group btn-group" role="group" aria-label="Basic example">' +
                                    '<button title="Editar" type="button" class="btn btn-outline-success"><i class="fa fa-edit"></i> </button>' +
                                    '<button title="Eliminar" type="button" class="btn btn-outline-danger"><i class="fa fa-trash-o"></i> </button>' +
                                    '<button title="Evaluaciones" type="button" class="btn btn-outline-primary"><i class="fa fa-check-square-o"></i> </button>' +
                                    '<button title="Ejemplos" type="button" class="btn btn-outline-warning"><i class="fa fa-etsy"></i> </button>' +
                                    '<button title="Practicas" type="button" class="btn btn-outline-info"><i class="fa fa-users"></i> </button>' +
                                    '</div>' +
                                    '</div>' +
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
                guardar: function() {

                    if ($("#nombre").val() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de Ingresar el Nombre de la Unidad",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
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
