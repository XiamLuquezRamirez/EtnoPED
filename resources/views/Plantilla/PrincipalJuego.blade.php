<!-- - var navbarShadow = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('Plantilla.Head')

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" id="bodyPrincipal" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar" data-col="2-columns">
    <!-- fixed-top-->
    @include('Plantilla.Cabecera')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
 
    @include('Plantilla.Menu')

    <div class="app-content content">
        @yield('CHAT')
      
        <div class="content-wrapper" style="padding: 0px !important">
            @yield('Contenido')
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('Plantilla.Footer')
    @yield('scripts')
</body>

</html>