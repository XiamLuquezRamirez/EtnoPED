@extends('Plantilla.Principal')
@section('title', 'Tablero')
@section('Contenido')


<div class="content-header row">
</div>
<div class="content-body">
 <div class="row">
        <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(1);">
            <div class="card2 work">
                <div class="img-section" style="background-image: url(../../../app-assets/images/backgrounds/header_gramatica.png); background-size: 100% 60%; background-repeat: no-repeat;">
               
                </div>
                <div class="card-desc2" style="background-image: url(../../../app-assets/images/backgrounds/gramatica.png); background-size: 100% 100%">
                    <div class="card-header2">
                        <div class="card-title2"></div>
                      
                    </div>
                    <div class="card-time2"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(2);">
            <div class="card2 work">
                <div class="img-section" style="background-image: url(../../../app-assets/images/backgrounds/header_medicina.png); background-size: 100% 60%; background-repeat: no-repeat;">
                   
                </div>
                <div class="card-desc2" style="background-image: url(../../../app-assets/images/backgrounds/medicina.png); background-size: 100% 100%">
                    <div class="card-header2" >
                        <div class="card-title2"></div>
                      
                    </div>
                    <div class="card-time2"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(3);">
            <div class="card2 work">
                <div class="img-section" style="background-image: url(../../../app-assets/images/backgrounds/header_usos.png); background-size: 100% 60%; background-repeat: no-repeat;">
                  
                </div>
                <div class="card-desc2" style="background-image: url(../../../app-assets/images/backgrounds/usos.png); background-size: 100% 100%">
                    <div class="card-header2" >
                        <div class="card-title2"></div>
                     
                    </div>
                    <div class="card-time2"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12" onclick="$.abrirModulo(4);">
            <div class="card2 work">
                <div class="img-section" style="background-image: url(../../../app-assets/images/backgrounds/header_diccionario.png); background-size: 100% 60%; background-repeat: no-repeat;">
              
                </div>
                <div class="card-desc2" style="background-image: url(../../../app-assets/images/backgrounds/diccionario.png); background-size: 100% 100%">
                    <div class="card-header2">
                        <div class="card-title2"></div>
                    
                    </div>
                    <div class="card-time2"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card2 work">
                <div class="img-section" style="background-image: url(../../../app-assets/images/backgrounds/header_juegos.png); background-size: 100% 60%; background-repeat: no-repeat;">
          
                </div>
                <div class="card-desc2" style="background-image: url(../../../app-assets/images/backgrounds/juegos.png); background-size: 100% 100%">
                    <div class="card-header2">
                        <div class="card-title2"></div>
                     
                    </div>
                    <div class="card-time2"></div>
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


                      window.location.href = 'Visualizacion/Modulos/' + dest;

                }

            })
        });
    </script>
 @endsection