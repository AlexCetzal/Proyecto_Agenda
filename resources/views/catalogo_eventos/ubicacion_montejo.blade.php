@extends('layouts.app')
@section('title', 'Gestión de Ubicacion Montejo')

@section('content')

<div class="container">

    <br>
    <div class="btnregresar">
        <a href="configuracion" class="regresar"> regresar</a>
    </div>
    <br>

    <h1>Gestión de ubicacion montejo</h1>

    <!-- Formulario para agregar la ubicacion -->
    <form action="{{ route('ubicacion_montejo.store') }}" method="POST">
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
            @foreach($ubicacion_montejo as $ubicacionesmontejo)
            <tr>
                <td>{{ $ubicacionesmontejo->edificio }}</td>
                <td>{{ $ubicacionesmontejo->lugar }}</td>
                <td>{{ $ubicacionesmontejo->aula }}</td>
                <td>
                    <!-- Botón Editar -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $ubicacionesmontejo->id }}">Editar</button>

                    <!-- Botón Eliminar -->
                    <form action="{{ route('ubicacion_montejo.destroy', $ubicacionesmontejo) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este elemento?')">Eliminar</button>
                    </form>
                </td>
            </tr>

            <!-- Modal de edición -->
            <div class="modal fade" id="editModal{{ $ubicacionesmontejo->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('ubicacion_montejo.update', $ubicacionesmontejo) }}" method="POST">
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
                                    <input type="text" name="marca" class="form-control" value="{{ $ubicacionesmontejo->edificio }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Lugar</label>
                                    <input type="text" name="modelo" class="form-control" value="{{ $ubicacionesmontejo->lugar }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Aula</label>
                                    <input type="text" name="placa" class="form-control" value="{{ $ubicacionesmontejo->aula }}" required>
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