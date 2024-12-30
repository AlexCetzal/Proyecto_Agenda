@extends('layouts.app')
@section('title', 'Gestión de Ubicacion')

@section('content')

<div class="container">

    <br>
    <div class="btnregresar">
        <a href="configuracion" class="regresar"> regresar</a>
    </div>
    <br>
    
    <h1>Gestión de ubicacion</h1>

    <!-- Formulario para agregar la ubicacion -->
    <form action="{{ route('ubicacion.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" name="edificio" class="form-control" placeholder="Edificio" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="lugar" class="form-control" placeholder="Lugar" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="aula" class="form-control" placeholder="Aula" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Añadir ubicacion</button>
            </div>
        </div>
    </form>

    <!-- Tabla de vehículos -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Edificio</th>
                <th>Lugar</th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ubicacion as $ubicaciones)
            <tr>
                <td>{{ $ubicaciones->edificio }}</td>
                <td>{{ $ubicaciones->lugar }}</td>
                <td>{{ $ubicaciones->aula }}</td>
                <td>
                    <!-- Botón Editar -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $ubicaciones->id }}">Editar</button>

                    <!-- Botón Eliminar -->
                    <form action="{{ route('ubicacion.destroy', $ubicaciones) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este elemento?')">Eliminar</button>
                    </form>
                </td>
            </tr>

            <!-- Modal de edición -->
            <div class="modal fade" id="editModal{{ $ubicaciones->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('ubicacion.update', $ubicaciones) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Ubicacion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Edificio</label>
                                    <input type="text" name="marca" class="form-control" value="{{ $ubicaciones->edificio }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Lugar</label>
                                    <input type="text" name="modelo" class="form-control" value="{{ $ubicaciones->lugar }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Aula</label>
                                    <input type="text" name="placa" class="form-control" value="{{ $ubicaciones->aula }}" required>
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