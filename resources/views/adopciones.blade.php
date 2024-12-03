@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Gestión de Adopciones</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdopcion" onclick="limpiarModal()">+ Registrar Adopción</button>

    <!-- Feedback de operaciones -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Modal para agregar adopción -->
    <div class="modal fade" id="modalAdopcion" tabindex="-1" aria-labelledby="modalAdopcionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdopcionLabel">Registrar Adopción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAdopcion" method="POST" action="{{ route('adopciones.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="mascota" class="form-label">Mascota</label>
                            <select id="mascota" name="mascota_id" class="form-select">
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="adoptante_nombre" class="form-label">Nombre del Adoptante</label>
                            <input type="text" id="adoptante_nombre" name="adoptante_nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="adoptante_contacto" class="form-label">Contacto del Adoptante</label>
                            <input type="text" id="adoptante_contacto" name="adoptante_contacto" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_adopcion" class="form-label">Fecha de Adopción</label>
                            <input type="date" id="fecha_adopcion" name="fecha_adopcion" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de adopciones -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Mascota</th>
                <th>Adoptante</th>
                <th>Contacto</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adopciones as $adopcion)
                <tr>
                    <td>{{ $adopcion->mascota->nombre }}</td>
                    <td>{{ $adopcion->adoptante_nombre }}</td>
                    <td>{{ $adopcion->adoptante_contacto }}</td>
                    <td>{{ $adopcion->fecha_adopcion }}</td>
                    <td>
                        <form action="{{ route('adopciones.destroy', $adopcion->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function limpiarModal() {
        document.getElementById('formAdopcion').reset();
    }
</script>

@endsection
