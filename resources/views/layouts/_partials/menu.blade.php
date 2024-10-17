<div class="padre">
    <div class=" menu_izquierda">
        <div class="contenedor-h1">
            <h1 class="menu-title">Menu</h1>
        </div>
        <ul>
            <li><a href="{{ route('actividades_Modelo') }}">ActividadesModelo</a></li>
            <li><a href="{{ route('centro_cultural') }}">Centrocultural</a></li>
            <li><a href="{{ route('campos_Modelo') }}">CamposModelo</a></li>
            <li><a href="{{ route('transporte') }}">Transporte</a></li>
        </ul>
        <hr>
        <ul>
            <li> <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
        </ul>
    </div>
    <main class="py-4 pl-2">
        @yield('content')
    </main>
</div>