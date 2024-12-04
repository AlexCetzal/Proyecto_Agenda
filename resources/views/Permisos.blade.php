@extends('layouts.app')

@section('title', 'Gestión de Permisos')

@section('content')
<div class="container">
    <h1 class="mb-4">Gestión de Permisos</h1>

    <form method="POST" action="{{ route('permisos.store') }}">
        @csrf

        <div class="mb-3">
            <label for="usuario" class="form-label">Selecciona el Usuario:</label>
            <select class="form-select" id="usuario" name="user_id">
                <option value="">Selecciona un Usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <h5>Selecciona los permisos de visualización:</h5>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="verActividadesModelo" name="permisos[]" value="ver_actividades_modelo">
                <label class="form-check-label" for="verActividadesModelo">Ver Actividades modelo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="verCetroCultural" name="permisos[]" value="ver_centro_cultural">
                <label class="form-check-label" for="verCetroCultural">Ver centro cultural</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="verCamposModelo" name="permisos[]" value="ver_campos_modelo">
                <label class="form-check-label" for="verCamposModelo">Ver campos modelo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="verTransporte" name="permisos[]" value="ver_transporte">
                <label class="form-check-label" for="verTransporte">Ver transporte</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="verConfiguracion" name="permisos[]" value="ver_configuracion">
                <label class="form-check-label" for="verConfiguracion">Ver configuracion</label>
            </div>
            <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" id="asignarEvento" name="permisos[]" value="asignar_evento">
                <label class="form-check-label" for="asignarEvento">Asiginar evento</label>
            </div> -->
        </div>

        <button type="submit" class="btn btn-primary">Guardar Permisos</button>
    </form>
</div>


@endsection
