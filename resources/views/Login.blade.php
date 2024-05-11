<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Inicio de Sesión</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/login-register.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
    <!-- END: Custom CSS-->
    
    <style>
        .bg-full-screen-image {
            position: fixed; /* Fijar la imagen de fondo en la ventana */
            top: 0;
            left: 0;
            width: 100%; /* Ocupa el ancho completo de la ventana */
            height: 100%; /* Ocupa la altura completa de la ventana */
            z-index: -1; /* Coloca la imagen detrás de otros elementos */
            background-size: 100% 100%; /* Ajusta la imagen al tamaño de la ventana */
            background-position: center center; /* Centra la imagen horizontal y verticalmente */
        }

        body {
            margin: 0;
            padding: 0;
        }

        .banner {
            position: relative;
            width: 100%;
            max-width: 800px; /* Ancho máximo del banner */
            height: 400px; /* Alto del banner */
            overflow: hidden;
        }

        .banner-img {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 5s ease-in-out;
        }

        .banner-img.active {
            opacity: 1;
        }
        

    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column  blank-page blank-page" style="background-size: 100% 100% !important" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->



    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-right">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0 ml-4" style="border-radius: 20px;">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0" style="border-radius: 20px;">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{asset('app-assets/images/logo/stack-logo-dark.png')}}" width="350" alt="branding logo">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                @if (Session::has('error'))
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <strong>Alerta!</strong> {!! session('error') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if (Session::has('success'))
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <strong>{!! session('success') !!}</strong> 
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <form class="form-horizontal" action="{{ url('/Login') }}" method="POST" novalidate>
                                            {{ csrf_field() }}
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" name="pasword" id="pasword" placeholder="Contraseña" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-outline-primary btn-block"><i class="feather icon-unlock"></i> Entrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="bg-full-screen-image">
        <img src="{{ asset('app-assets/images/backgrounds/portada1.png') }}" alt="Imagen 2" class="banner-img">
        <img src="{{ asset('app-assets/images/backgrounds/portada2.png') }}" alt="Imagen 3" class="banner-img">
        <img src="{{ asset('app-assets/images/backgrounds/portada3.png') }}" alt="Imagen 3" class="banner-img">
        <img src="{{ asset('app-assets/images/backgrounds/portada4.png') }}" alt="Imagen 3" class="banner-img">
    </div>
    <!-- END: Content-->



    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/forms/form-login-register.js')}}"></script>
    <!-- END: Page JS-->

    
    <script>
        $(document).ready(function() {
            const images = document.querySelectorAll(".banner-img");
            let currentImage = 0;

            // Función para mostrar la siguiente imagen
            function showNextImage() {
                images[currentImage].classList.remove("active");
                currentImage = (currentImage + 1) % images.length;
                images[currentImage].classList.add("active");
            }

            // Mostrar la primera imagen
            images[currentImage].classList.add("active");

            // Cambiar de imagen cada 5 segundos
            setInterval(showNextImage, 6000);
        });
        
        
    </script>

</body>
<!-- END: Body-->



</html>