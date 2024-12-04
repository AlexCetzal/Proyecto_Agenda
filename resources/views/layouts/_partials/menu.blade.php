<div class="padre">

    <div class=" menu_izquierda">
        <img src="{{asset('assets/img/logo-modelo.png')}}" alt="example" class="img-logo">
        <div class="contenedor-h1">
            <h1 class="menu-title">Menu</h1>
        </div>
        <ul>
            @if(auth()->check())
            <!-- Verificar si el usuario está autenticado -->
            @if(auth()->user()->hasPermission('ver_actividades_modelo'))
            <li><a href="{{ route('actividades_Modelo_view') }}">Actividades Modelo</a></li>
            @endif

            @if(auth()->user()->hasPermission('ver_centro_cultural'))
            <li><a href="{{ route('centro_cultural') }}">Centro Cultural</a></li>
            @endif

            @if(auth()->user()->hasPermission('ver_campos_modelo'))
            <li><a href="{{ route('campos_Modelo_view') }}">Campos Modelo</a></li>
            @endif

            @if(auth()->user()->hasPermission('ver_transporte'))
            <li><a href="{{ route('transporte_view') }}">Transporte</a></li>
            @endif
            @else
            <p>No estás autenticado.</p>
            @endif
        </ul>



        <hr style="border: 1px solid white;">
        <ul>
            <li> <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                    sesión</a></li>
            @if(auth()->user()->hasPermission('ver_configuracion'))
            <li><a href="{{ route('configuracion') }}">Configuracion</a></li>
            @endif
        </ul>
    </div>
    <main class=" der-nav">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm nav-color">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav-derecha" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </main>
</div>