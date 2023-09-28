@extends('Plantilla.Principal')
@section('title', 'Tablero')
@section('Contenido')
<div class="content-header row">
</div>
<div class="content-body">
 <div class="row">
        <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(1);">
            <div class="card2 work">
                <div class="img-section">
                    <img class="brand-logo ml-1" alt="stack admin logo" width="90"
                        src="../../../app-assets/images/logo/nombre.png">
                </div>
                <div class="card-desc2">
                    <div class="card-header2">
                        <div class="card-title2">Módulo</div>
                        <div class="card-menu2">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="card-time2">Gramatica y Lenguaje</div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card2 work">
                <div class="img-section">
                    <img class="brand-logo ml-1" alt="stack admin logo" width="90"
                        src="../../../app-assets/images/logo/nombre.png">
                </div>
                <div class="card-desc2" >
                    <div class="card-header2" >
                        <div class="card-title2">Módulo</div>
                        <div class="card-menu2">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="card-time2">Mediciona Tradicional</div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card2 work">
                <div class="img-section">
                    <img class="brand-logo ml-1" alt="stack admin logo" width="90"
                        src="../../../app-assets/images/logo/nombre.png">
                </div>
                <div class="card-desc2" >
                    <div class="card-header2" >
                        <div class="card-title2">Módulo</div>
                        <div class="card-menu2">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="card-time2">Usos y Costumbres</div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card2 work">
                <div class="img-section">
                    <img class="brand-logo ml-1" alt="stack admin logo" width="90"
                        src="../../../app-assets/images/logo/nombre.png">
                </div>
                <div class="card-desc2" >
                    <div class="card-header2">
                        <div class="card-title2">Módulo</div>
                        <div class="card-menu2">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="card-time2">Diccionario</div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card2 work">
                <div class="img-section">
                    <img class="brand-logo ml-1" alt="stack admin logo" width="90"
                        src="../../../app-assets/images/logo/nombre.png">
                </div>
                <div class="card-desc2">
                    <div class="card-header2">
                        <div class="card-title2">Módulo</div>
                        <div class="card-menu2">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="card-time2">Actividades y Juegos</div>
                </div>
            </div>
        </div>
    </div>
</div>
   

@endsection
@section('scripts')
    <script>

        $(document).ready(function() {         
            $("#Principal").addClass("active");
            let dest="";
            $.extend({
                abrirModulo: function(opc){
                    switch (opc) {
                        case 1:
                        dest="GramaticaLenguaje";
                          break;
                        case 2:
                        dest="MedicinaTradicional";
                          break;
                        case 3:
                        dest="UsosCostumbres";
                          break;
                        case 4:
                        dest="Diccionario";
                          break;
                        case 5:
                        dest="Actividades";
                          break;
                      }


                      window.location.href = 'GramaticaLenguaje/GestionarGramatica/' + dest;

                }

            })
        });
    </script>
 @endsection