@extends('layouts.app')
@section('title', 'Gestión de Vehiculos')

@section('content')

<div class="container">
    <br>
    <div class="btnregresar">
        <a href="configuracion" class="regresar"> regresar</a>
    </div>
    <br>

    <h1>Gestión de Vehículos</h1>

    <!-- Formulario para agregar vehículos -->
    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" name="marca" class="form-control" placeholder="Marca" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="modelo" class="form-control" placeholder="Modelo" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="placa" class="form-control" placeholder="Placa" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Añadir Vehículo</button>
            </div>
        </div>
    </form>

    <!-- Tabla de vehículos -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->marca }}</td>
                <td>{{ $vehiculo->modelo }}</td>
                <td>{{ $vehiculo->placa }}</td>
                <td>
                    <!-- Botón Editar -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $vehiculo->id }}">Editar</button>

                    <!-- Botón Eliminar -->
                    <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este vehículo?')">Eliminar</button>
                    </form>
                </td>
            </tr>

            <!-- Modal de edición -->
            <div class="modal fade" id="editModal{{ $vehiculo->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Vehículo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Marca</label>
                                    <input type="text" name="marca" class="form-control" value="{{ $vehiculo->marca }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Modelo</label>
                                    <input type="text" name="modelo" class="form-control" value="{{ $vehiculo->modelo }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Placa</label>
                                    <input type="text" name="placa" class="form-control" value="{{ $vehiculo->placa }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

@endsection