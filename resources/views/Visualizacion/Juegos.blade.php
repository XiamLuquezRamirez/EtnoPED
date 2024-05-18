@extends('Plantilla.PrincipalJuego')
@section('title', 'Actividades y Juegos')
@section('Contenido')

    <div class="content-body" style="overflow: hidden">
        <iframe id="myIframe" src="{{ asset('Juegos/index.html') }}" frameborder="0" scrolling="yes" height="678"
            width="100%" name="demo">
        </iframe>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var valorasistencia = "";
            $("#Juegos").addClass("active open");
        });
    </script>
@endsection
