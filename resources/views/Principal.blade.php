@extends('Plantilla.Principal')
@section('title', 'Tablero')
@section('Contenido')


    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(1);">
                <div class="card2 work">
                    <div class="img-section"
                        style="background-image: url({{ asset('app-assets/images/backgrounds/header_gramatica.png') }}); background-size: 100% 60%; background-repeat: no-repeat;">
                    </div>
                    <div class="card-desc2"
                        style="background-image: url({{ asset('app-assets/images/backgrounds/gramatica.png') }}); background-size: 100% 100%">
                        <div class="card-header2">
                            <div class="card-title2"></div>

                        </div>
                        <div class="card-time2"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(2);">
                <div class="card2 work">
                    <div class="img-section"
                        style="background-image: url({{ asset('app-assets/images/backgrounds/header_medicina.png') }}); background-size: 100% 60%; background-repeat: no-repeat;">

                    </div>
                    <div class="card-desc2"
                        style="background-image: url({{ asset('app-assets/images/backgrounds/medicina.png') }}); background-size: 100% 100%">
                        <div class="card-header2">
                            <div class="card-title2"></div>

                        </div>
                        <div class="card-time2"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(3);">
                <div class="card2 work">
                    <div class="img-section"
                        style="background-image: url({{ asset('app-assets/images/backgrounds/header_usos.png') }}); background-size: 100% 60%; background-repeat: no-repeat;">

                    </div>
                    <div class="card-desc2"
                        style="background-image:url({{ asset('app-assets/images/backgrounds/usos.png') }}); background-size: 100% 100%">
                        <div class="card-header2">
                            <div class="card-title2"></div>

                        </div>
                        <div class="card-time2"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(4);">
                <div class="card2 work">
                    <div class="img-section"
                        style="background-image: url({{ asset('app-assets/images/backgrounds/header_diccionario.png') }}); background-size: 100% 60%; background-repeat: no-repeat;">

                    </div>
                    <div class="card-desc2"
                        style="background-image: url({{ asset('app-assets/images/backgrounds/diccionario.png') }}); background-size: 100% 100%">
                        <div class="card-header2">
                            <div class="card-title2"></div>

                        </div>
                        <div class="card-time2"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(5);">
                <div class="card2 work">
                    <div class="img-section"
                        style="background-image: url({{ asset('app-assets/images/backgrounds/header_juegos.png') }}); background-size: 100% 60%; background-repeat: no-repeat;">

                    </div>
                    <div class="card-desc2"
                        style="background-image:  url({{ asset('app-assets/images/backgrounds/juegos.png') }}); background-size: 100% 100%">
                        <div class="card-header2">
                            <div class="card-title2"></div>

                        </div>
                        <div class="card-time2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="videoModal" class="modalVideo">
        <div class="modalVideo-content">
            <span id="closeModalBtn" class="close">&times;</span>
            <video id="mainVideo" controls autoplay muted>
                <source src="{{ asset('app-assets/contenidoMultimedia/modulos/84ab35_683dff_0190LOSPRISMAS.mp4') }}" type="video/mp4">
                Tu navegador no soporta videos.
            </video>
            <div class="video-options">
                <button onclick="changeVideo('video1.mp4')">Video 1</button>
                <button onclick="changeVideo('video2.mp4')">Video 2</button>
                <button onclick="changeVideo('video3.mp4')">Video 3</button>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#Principal").addClass("active");
            let dest = "";
            $.extend({
                abrirModulo: function(opc) {
                    switch (opc) {
                        case 1:
                            dest = "GramaticaLenguaje";
                            break;
                        case 2:
                            dest = "MedicinaTradicional";
                            break;
                        case 3:
                            dest = "UsosCostumbres";
                            break;
                        case 4:
                            dest = "Diccionario";
                            break;
                        case 5:
                            dest = "Juegos";
                            break;
                    }

                    window.location.href = 'Visualizacion/Modulos/' + dest;

                }

            })
        });

// Abrir el modal automáticamente después de cargar la página y reproducir el video
window.onload = function() {
    var modal = document.getElementById("videoModal");
    var video = document.getElementById("mainVideo");

    // Mostrar el modal
    modal.style.display = "block";

    // Reproducir el video automáticamente
    video.play().catch(function(error) {
        console.log("Autoplay failed: ", error);
    });
};

// Función para cambiar el video
function changeVideo(videoSrc) {
    var video = document.getElementById("mainVideo");
    video.src = videoSrc;
    video.play().catch(function(error) {
        console.log("Autoplay failed: ", error);
    });
}

// Cerrar el modal al hacer clic en la "X"
document.getElementById("closeModalBtn").onclick = function() {
    document.getElementById("videoModal").style.display = "none";
};

// Opcional: Cerrar el modal al hacer clic fuera del contenido del modal
window.onclick = function(event) {
    var modal = document.getElementById("videoModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
};


    </script>
@endsection
