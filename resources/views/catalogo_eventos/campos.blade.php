@extends('layouts.app')
@section('title', 'Gestión de Campos')

@section('content')

<div class="container">
    <h1>Gestión de Campos</h1>

    <!-- Formulario para agregar campos -->
    <form action="{{ route('campos.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" name="lugar" class="form-control" placeholder="Lugar" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="campo_cancha" class="form-control" placeholder="campo_cancha" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Añadir campo</button>
            </div>
        </div>
    </form>

    <!-- Tabla de campos -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lugar</th>
                <th>Campo o Cancha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campos as $campo)
            <tr>
                <td>{{ $campo->lugar }}</td>
                <td>{{ $campo->campo_cancha }}</td>
                <td>
                    <!-- Botón Editar -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $campo->id }}">Editar</button>

                    <!-- Botón Eliminar -->
                    <form action="{{ route('campos.destroy', $campo) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este elemento?')">Eliminar</button>
                    </form>
                </td>
            </tr>

            <!-- Modal de edición -->
            <div class="modal fade" id="editModal{{ $campo->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('campos.update', $campo) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar campo o cancha </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Lugar</label>
                                    <input type="text" name="marca" class="form-control" value="{{ $campo->lugar }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Campo o Cancha</label>
                                    <input type="text" name="modelo" class="form-control" value="{{ $campo->campo_cancha }}" required>
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