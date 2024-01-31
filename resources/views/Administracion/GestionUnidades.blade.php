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
                        <li class="breadcrumb-item"><a href="{{ url('/Principal') }}">Inicio</a>
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
                        <div class="row">
                            <div class="col-4">
                                <button onclick="$.nueva();" id="addRow" class="btn btn-primary mb-2 ml-1"><i
                                        class="feather icon-plus"></i>&nbsp; Agregar Unidad</button>
                            </div>
                            <div class="col-8">
                                <div class="position-relative pr-1">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Busqueda...">
                                    <div class="form-control-position pr-2">
                                        <i class="fa fa-search text-size-base text-muted"></i>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th width="20%">Opciones</th>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>

                                    </tr>
                                </thead>
                                <tbody id="tdTable">


                                </tbody>
                            </table>
                        </div>
                        <div id="pagination-links" class="text-center ml-1 mt-2">

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
                            <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">

                            <form class="form" method="post" id="formGuardar"
                                action="{{ url('/') }}/AdminGramaticaLenguaje/GuardarUnidad">
                                <input type="hidden" name="id" id="id" value="" />
                                <div class="form-body">
                                    <h4 class="form-section"><i class="feather icon-info"></i> Información Basica de la
                                        Unidad</h4>

                                    <div class="form-group">
                                        <label for="userinput5">Nombre:</label>
                                        <textarea cols="80" id="nombre" name="nombre" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="userinput8">Descripción:</label>
                                    <textarea id="descripcion" rows="5" class="form-control border-primary" name="descripcion"
                                        placeholder="Descripcion"></textarea>
                                </div>

                        </div>

                        <div class="form-actions right">
                            <button type="button"  onclick="$.salir();" class="btn btn-warning mr-1">
                                <i class="feather icon-corner-up-left"></i> Salir
                            </button>
                            <button type="button" id="btnGuardar" onclick="$.guardar()" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> Guardar
                            </button>
                            <button type="button" id="btnNuevo" style="display: none;" onclick="$.nuevo()"
                                class="btn btn-primary">
                                <i class="feather icon-plus"></i> Nuevo
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
        ///////////////////CONFIGURACION EDITOR

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

        $(document).ready(function() {
            $("#Princioal").removeClass("active");
            $("#MenuGramatica").addClass("has-sub open");
            $("#MenuGramaticaUnidad").addClass("active");


            $.extend({
                cargar: function(page, searchTerm = '') {
                    var form = $("#formCargarUnidad");
                    var url = form.attr("action");
                    $('#page').remove();
                    $('#searchTerm').remove();
                    form.append("<input type='hidden' id='page' name='page'  value='" + page +
                        "'>");
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
                            $('#tdTable').html(response
                                .unidades); // Rellenamos la tabla con las filas generadas
                            $('#pagination-links').html(response
                                .links); // Colocamos los enlaces de paginación
                        }
                    });




                },
                nueva: function() {
                    $("#modalUnidad").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#tituloUnidad").html("Gestionar Unidades Tematicas");
                    $("#accion").val("agregar");

                    editorNombre.setData('');
                    editorDescripcion.setData('');
                  
                    $("#btnGuardar").show();
                    $("#btnNuevo").hide();


                },
                guardar: function() {

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    var contenido = editorNombre.getData()
                        .trim(); // Obtener el contenido y quitar espacios en blanco al inicio y al final

                    if (contenido.length === 0) {
                        Swal.fire({
                            title: " Alerta!",
                            text: " Debe de ingresar el nombre!",
                            type: "warning",
                            confirmButtonClass: "btn btn-warning",
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
                                $("#btnGuardar").hide();
                                $("#btnNuevo").show();

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
                nuevo: function() {
                    editorNombre.setData('');
                    editorDescripcion.setData('');
                    $("#accion").val("agregar");
                    $("#btnGuardar").show();
                    $("#btnNuevo").hide();
                },

                salir: function() {
                    editorNombre.setData('');
                    editorDescripcion.setData('');
                    $('#modalUnidad').modal('toggle');
                    $("#accion").val("agregar");
                    $("#btnGuardar").show();
                    $("#btnNuevo").hide();
                },
                editar: function(id) {

                    $("#modalUnidad").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#accion").val("editar");
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
                            editorNombre.setData(respuesta.unidades.nombre);
                            editorDescripcion.setData(respuesta.unidades.descripcion);
                        }
                    });

                },
                eliminar: function(id) {
                    Swal.fire({
                        title: "¿Esta seguro de Eliminar este registro?",
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

                },
                contDescripcion: function(idPrep) {
                    CKEDITOR.replace('descripcion', {
                        width: '100%',
                        height: 150
                    });

                },
                contNombre: function() {
                    CKEDITOR.replace('nombre', {
                        removePlugins: 'toolbar,dialogui', // Quitar todas las herramientas
                        toolbar: [],
                        width: '100%',
                        height: 50
                    });

                },
            });
            $.cargar(1);

            $.contDescripcion();
            $.contNombre();

            var editorNombre = CKEDITOR.instances.nombre;
            var editorDescripcion = CKEDITOR.instances.descripcion;

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];

                // Asegurarse de que 'page' sea un número antes de hacer la solicitud
                if (!isNaN(page)) {
                    $.cargar(page);
                }
            });

            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val();
                $.cargar(1, searchTerm); // Cargar la primera página con el término de búsqueda
            });

        });
    </script>
@endsection
