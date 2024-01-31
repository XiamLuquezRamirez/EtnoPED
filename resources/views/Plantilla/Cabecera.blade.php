<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                        href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="#">
                        <img class="brand-logo ml-1" alt="stack admin logo" width="150"
                            src="{{ asset('app-assets/images/logo/nombre.png') }}">
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content"
            style="background-image: url({{ asset('app-assets/images/backgrounds/bg-header.png') }});  background-repeat: no-repeat; ">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon feather icon-maximize"></i></a></li>

                </ul>
                <ul class="nav navbar-nav float-right">

                    {{--  NOTIFICACION 
                    Aqui codigo
                     NOTIFICACION  --}}

                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <div class="avatar avatar-online"><img src="{{ asset(Session::get('ImgUsu')) }}"
                                    alt="avatar"><i></i></div><span
                                class="user-name">{{ Auth::user()->nombre_usuario }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (Auth::user()->tipo_usuario != 'Administrador')
                                <a class="dropdown-item" href="{{ url('/Perfil') }}"><i class="feather icon-user"></i>
                                    Editar
                                    Perfil</a>
                                <div class="dropdown-divider"></div>
                            @endif

                            <a class="dropdown-item" href="{{ url('/Logout') }}"><i class="feather icon-power"></i>
                                Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
