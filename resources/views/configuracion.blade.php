@extends('layouts.app')

@section('title', 'Configuración')

@section('content')
<h1>Configuración</h1>
<div class="container-padre">

    <div class="col-md-2 mb-2">
        <div class="card h-100">
            <a href="{{ route('permisos.index') }}" class="card-body d-flex flex-column align-items-center text-decoration-none per">
            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100px;">
                <i class="bi bi-folder2 fs-1"></i>
                <h5 class="card-title">Permisos</h5>
            </div>
            </a>
        </div>
    </div>
    
    <div class="col-md-2 mb-2">
    <div class="card h-100">
        <a href="{{ route('vehiculos.index') }}" class="card-body d-flex flex-column align-items-center text-decoration-none per">
            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100px;">
                <i class="bi bi-truck fs-1"></i> 
                <h5 class="card-title">Gestión de Vehículos</h5>
            </div>
        </a>
    </div>
</div>
    <div class="col-md-2 mb-2">
        <div class="card h-100">
            <a href="{{ route('ubicacion.index') }}" class="card-body d-flex flex-column align-items-center text-decoration-none per">
            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100px;">
                <i class="bi bi-geo-alt fs-1"></i>
                <h5 class="card-title">Ubicaciones</h5>
            </div>
            </a>
        </div>
    </div>

    <div class="col-md-2 mb-2">
        <div class="card h-100">
            <a href="{{ route('campos.index') }}" class="card-body d-flex flex-column align-items-center text-decoration-none per">
            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100px;">
                <i class="bi bi-tree fs-1"></i>
                <h5 class="card-title">Campos</h5>
            </div>
            </a>
        </div>
    </div>

    <!-- <div class="col-md-2 mb-2">
        <div class="card h-100">
            <a href="{{ route('home') }}" class="card-body d-flex flex-column align-items-center text-decoration-none per">
            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100px;">
                <i class="bi bi-tree fs-1"></i>
                <h5 class="card-title">home</h5>
            </div>
            </a>
        </div>
    </div> -->

</div>

@endsection
