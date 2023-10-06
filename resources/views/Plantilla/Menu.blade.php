<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>Generar</span><i class=" feather icon-minus" data-toggle="tooltip"
                    data-placement="right" data-original-title="Apps"></i>
            </li>
            <li id="Principal"><a href="{{ url('/Principal') }}"><i class="feather icon-home"></i><span class="menu-title"
                        data-i18n="Dashboard">Principal</span></a>
            </li>
            <li id="Gramatica" class="nav-item"><a href="{{ url('/Visualizacion/Modulos/GramaticaLenguaje') }}"><i class="fa fa-comments"></i><span class="menu-title"
                        data-i18n="Templates">Gramatica y Lenguaje</span></a>

            </li>
            <li id="MedicinaTradicional" class="nav-item"><a href="{{ url('/Visualizacion/Modulos/MedicinaTradicional') }}"><i class="fa fa-envira"></i><span class="menu-title"
                        data-i18n="Layouts">Medicina Tradicional</span></a>

            </li>
            <li id="UsosCostumbres" class="nav-item"><a href="{{ url('/Visualizacion/Modulos/UsosCostumbres') }}"><i class="fa fa-gg"></i><span class="menu-title"
                        data-i18n="Starter kit">Usos y Costumbres</span></a>

            </li>
            <li id="Diccionario" class=" nav-item"><a href="{{ url('/Visualizacion/Modulos/Diccionario') }}"><i class="fa fa-list-ul"></i><span class="menu-title"
                        data-i18n="Starter kit">Diccionario</span></a>

            </li>
            <li class=" nav-item"><a href="#"><i class="fa fa-gamepad"></i><span class="menu-title"
                        data-i18n="Starter kit">Actividades Interactivas</span></a>

            </li>

            {{--  MENU ADMNISTRACCION  --}}
            @if (Auth::user()->tipo_usuario != 'Estudiante')
                <li class="navigation-header"><span>Administrar</span><i class=" feather icon-minus"
                        data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                </li>
                <li id="MenuGramatica" class="nav-item"><a href="#"><i class="fa fa-cogs"></i><span class="menu-title"
                            data-i18n="Templates">Gramatica y Lenguaje</span></a>
                    <ul class="menu-content">
                        <li id="MenuGramaticaUnidad"><a class="menu-item" href="{{ url('/AdminGramaticaLenguaje/GestionarGramatica/unidades/-') }}" data-i18n="Vertical">Gestionar Unidades Tematicas</a>
                        </li>
                        <li id="MenuGramaticaTematica"><a class="menu-item" href="{{ url('/AdminGramaticaLenguaje/GestionarGramatica/temas/-') }}" data-i18n="Vertical">Gestionar Tematicas</a></li>
                    </ul>

                </li>
                <li id="GestionMedicinaTradicional" class="nav-item"><a href="{{ url('/AdminMedicinaTradicional/GestionarMedicinaTradicional/') }}"><i class="fa fa-cogs"></i><span class="menu-title"
                            data-i18n="Templates">Medicina Tradicional</span></a>
                </li>
                <li id="GestionUsosCostumbres" class=" nav-item"><a href="{{ url('/AdminUsoCostumbres/GestionarUsosCostumbres/') }}"><i class="fa fa-cogs"></i><span class="menu-title"
                            data-i18n="Starter kit">Usos y Costumbres</span></a>

                </li>
                <li id="GestionDiccionario" class="nav-item"><a href="{{ url('/AdminDiccionario/GestionarDiccionario/') }}"><i class="fa fa-cogs"></i><span class="menu-title"
                            data-i18n="Starter kit">Diccionario</span></a>

                </li>
            @endif
                 {{-- FIN MENU ADMNISTRACCION  --}}

        </ul>
    </div>
</div>
*