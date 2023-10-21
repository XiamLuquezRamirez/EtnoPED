@extends('Plantilla.Principal')
@section('title', 'Tablero')
@section('Contenido')

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="imgDefaults" value="{{ Session::get('imgDefaults') }}" />

    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users edit start -->
        <section class="users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="tab-content">
                            <form class="form" method="post" id="formGuardar"
                                action="{{ url('/') }}/Perfil/GuardarPerfil">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->
                                    <div id='div-media' class="media">
                                        <a href="javascript: void(0);">
                                            <img src="{{ Session::get('ImgUsu') }}" class="rounded mr-75" id="previewImage"
                                                alt="profile image" height="64" width="64">
                                        </a>
                                        <input type="hidden" name="foto" value="{{ $Usuario->foto }}" />
                                        <div class="media-body mt-75">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                    for="account-upload">Subir una foto</label>
                                                <input type="file" name="fotoUsuario" id="account-upload" hidden>
                                                <button type="button" class="btn btn-sm btn-secondary ml-50"
                                                    onclick="clearImage()">Limpiar</button>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Solo JPG, GIF o PNG.
                                                    Tam. Max. de 800kB</small></p>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->

                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Identificación:</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $Usuario->identificacion }}" id="identificacion"
                                                        name="identificacion" onchange="$.VerfIdentif(this.value)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Nombre:</label>
                                                    <input type="text" class="form-control" placeholder="Nombre"
                                                        value="{{ $Usuario->nombre }}" id="nombre" name="nombre">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Apellido:</label>
                                                    <input type="text" class="form-control" placeholder="Apellido"
                                                        value="{{ $Usuario->apellido }}" id="apellido" name="apellido">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-5">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Dirección:</label>
                                                    <input type="text" class="form-control" placeholder="Dirección"
                                                        value="{{ $Usuario->direccion }}" id="direccion" name="direccion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Email:</label>
                                                    <input type="text" class="form-control" placeholder="Email"
                                                        value="{{ $Usuario->email }}" id="email" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Teléfono:</label>
                                                    <input type="text" class="form-control" placeholder="Teléfono"
                                                        value="{{ $Usuario->telefono }}" id="telefono" name="telefono">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Login</label>
                                                <input type="text" class="form-control" placeholder="Login"
                                                    value="{{ $Usuario->login_usuario }}" id="login" name="login"
                                                    onchange="$.VerfLogin(this.value)">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Cambiar Contraseña</label>
                                                <fieldset>
                                                    <div class="input-group">

                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" id="checkPasw"
                                                                    onclick="$.habilitar(this);"> &nbsp; Cambiar Contraseña
                                                            </div>
                                                        </div>
                                                        <input type="password"  name="password"
                                                            placeholder="Contraseña" id="password" class="form-control">
                                                        <input type="password"  placeholder="Repetir Contraseña"
                                                            onchange="$.validaPass();" name="rpassword" id="rpassword"
                                                            class="form-control">
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group">
                                                <label>Perfil</label>
                                                <input type="text" class="form-control" placeholder="Perfil"
                                                    value="{{ $Usuario->tipo_usuario }}" disabled id="perfil"
                                                    name="perfil">
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="button" onclick="$.guardar();"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Guardar
                                                Cambios</button>
                                            <button type="reset" class="btn btn-light">Cancelar</button>
                                        </div>
                                    </div>

                                    <!-- users edit account form ends -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->
    </div>

    <div id="loader" class="loader-spinner" style="display: none;">
        <img src="{{ asset('app-assets/images/libro.gif') }}" width="150" />
        <h2 class="parpadeo" style="color: #FC4F00; font-weight: bold;">Cargando...</h2>

    </div>

    <form action="{{ url('/Usuarios/ValidarUsuario') }}" id="formValidarUsuario" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>
    <form action="{{ url('/Usuarios/ValidarIdentificacion') }}" id="formValidarIdentificacion" method="POST">
        @csrf
        <!-- Tus campos del formulario aquí -->
    </form>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            //$("#Principal").addClass("active");
            $.extend({
                VerfIdentif: function(valida) {

                    var form = $("#formValidarIdentificacion");
                    var url = form.attr("action");
                    $('#ident').remove();
                    form.append("<input type='hidden' id='ident' name='ident'  value='" + valida +
                        "'>");
                    var datos = form.serialize();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.existe === "si") {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "Esta identificación se enuentra registrada",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                                $("#identificacion").val("");
                                return;
                            }

                        }
                    });
                },

                validaPass: function() {
                    // Obtén las contraseñas ingresadas por el usuario
                    const password = document.getElementById('password').value;
                    const rpassword = document.getElementById('rpassword').value;

                    // Compara las contraseñas
                    if (password !== rpassword) {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Las contraseñas no coinciden... Verificar",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                       document.getElementById("password").value = "";
                       document.getElementById("rpassword").value = "";
                    }
                },
                VerfLogin: function(valida) {

                    var form = $("#formValidarUsuario");
                    var url = form.attr("action");
                    $('#idUsu').remove();
                    form.append("<input type='hidden' id='idUsu' name='idUsus'  value='" + valida +
                        "'>");
                    var datos = form.serialize();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.existe === "si") {
                                Swal.fire({
                                    type: "warning",
                                    title: "Oops...",
                                    text: "Este Login se enuentra registrado",
                                    confirmButtonClass: "btn btn-primary",
                                    timer: 1500,
                                    buttonsStyling: false
                                });
                                $("#login").val("");
                                return;
                            }

                        }
                    });
                },
                habilitar: function(checkbox) {
                    const input = document.getElementById('password');
                    const rinput = document.getElementById('rpassword');

                    if (checkbox.checked) {
                        input.disabled = false;
                        rinput.disabled = false;
                    } else {
                        input.disabled = true;
                        rinput.disabled = true;
                        input.value = "";
                        rinput.value = "";
                    }

                },
                guardar: function() {

                    if ($("#nombre").val().trim() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar un nombre para el usuario",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }
                    if ($("#login").val().trim() === "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar un login para el usuario",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }

                    const pasword = document.getElementById('password');
                    const check = document.getElementById('checkPasw');

                    if (check.checked && pasword.value == "") {
                        Swal.fire({
                            type: "warning",
                            title: "Oops...",
                            text: "Debes de ingresar una contraseña",
                            confirmButtonClass: "btn btn-primary",
                            timer: 1500,
                            buttonsStyling: false
                        });
                        return;
                    }

                    var loader = document.getElementById('loader');
                    loader.style.display = 'block';


                    var form = $("#formGuardar");
                    var url = form.attr("action");
                    var accion = $("#accion").val();
                    var token = $("#token").val();
                    $("#idtoken").remove();
                    form.append("<input type='hidden' id='idtoken' name='_token'  value='" + token +
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


                                var loader = document.getElementById('loader');
                                loader.style.display = 'none';
                            }
                        },
                        error: function() {
                            Swal.fire({
                                type: "errot",
                                title: "Opsss...",
                                text: "Ha ocurrido un error",
                                confirmButtonClass: "btn btn-primary",
                                timer: 1500,
                                buttonsStyling: false
                            });
                        }
                    });
                }

            })
        });

        document.getElementById('account-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewImage = document.getElementById('previewImage');

            if (file) {
                const imageUrl = URL.createObjectURL(file);
                previewImage.src = imageUrl;
            }
        });

        function clearImage() {
            let imgDefault = document.getElementById("imgDefaults");
            console.log(imgDefault.value);
            const previewImage = document.getElementById('previewImage');
            previewImage.src = imgDefault.value;
        }
    </script>
@endsection
