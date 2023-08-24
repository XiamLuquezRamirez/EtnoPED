<!-- - var navbarShadow = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('Plantilla.Head')

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    @include('Plantilla.Cabecera')
    <!-- ////////////////////////////////////////////////////////////////////////////-->|
    @include('Plantilla.Menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            @yield('Contenido')
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('Plantilla.Footer')
    @yield('scripts')
</body>

</html>