@extends('layouts.template')

@section('content')

<section class="hero text-white text-center py-5" style="background: linear-gradient(135deg, #343a40, #17a2b8);">
    <div class="container">
        <h1 class="display-4 fw-bold">Historial Médico</h1>
        <p class="lead mt-3">Registra y consulta los diagnósticos, tratamientos y medicamentos de tus mascotas de manera eficiente.</p>
    </div>
</section>

<div class="container mt-5">
    <h1>Historial Médico</h1>
    <button  
        class="btn btn-sm text-white fw-bold border-0" 
        style="background-color: #343a40; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); font-size: 1.1rem;" 
        data-bs-toggle="modal" 
        data-bs-target="#modalHistorial" 
        onclick="limpiarModal()">
        + Agregar Registro
    </button>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Modal para agregar/editar registros -->
    <div class="modal fade" id="modalHistorial" tabindex="-1" aria-labelledby="modalHistorialLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHistorialLabel">Agregar/Editar Historial Médico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formHistorial" method="POST" action="">
                        @csrf
                        <input type="hidden" id="historialId" name="id">
                        
                        <div class="mb-3">
                            <label for="mascota" class="form-label">Mascota</label>
                            <select id="mascota" name="mascota_id" class="form-select">
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="diagnostico" class="form-label">Diagnóstico</label>
                            <input type="text" class="form-control" id="diagnostico" name="diagnostico">
                        </div>
                        <div class="mb-3">
                            <label for="tratamiento" class="form-label">Tratamiento</label>
                            <textarea id="tratamiento" name="tratamiento" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="medicamento" class="form-label">Medicamento</label>
                            <input type="text" class="form-control" id="medicamento" name="medicamento">
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla para listar los registros -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Mascota</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
                <th>Medicamento</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiales as $historial)
                <tr>
                    <td>{{ $historial->mascota->nombre }}</td>
                    <td>{{ $historial->diagnostico }}</td>
                    <td>{{ $historial->tratamiento ?? 'N/A' }}</td>
                    <td>{{ $historial->medicamento ?? 'N/A' }}</td>
                    <td>{{ $historial->fecha }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="editarHistorial('{{ $historial->id }}', '{{ $historial->mascota_id }}', '{{ $historial->diagnostico }}', '{{ $historial->tratamiento }}', '{{ $historial->medicamento }}', '{{ $historial->fecha }}')">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <form action="{{ route('historial_medico.destroy', $historial->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function editarHistorial(id, mascota, diagnostico, tratamiento, medicamento, fecha) {
        document.getElementById('historialId').value = id;
        document.getElementById('mascota').value = mascota;
        document.getElementById('diagnostico').value = diagnostico;
        document.getElementById('tratamiento').value = tratamiento;
        document.getElementById('medicamento').value = medicamento;
        document.getElementById('fecha').value = fecha;

        document.getElementById('modalHistorialLabel').textContent = 'Editar Historial Médico';
        document.getElementById('formHistorial').action = `/historial_medico/${id}`;
        document.getElementById('formHistorial').method = 'POST';
        var hiddenMethod = document.createElement('input');
        hiddenMethod.type = 'hidden';
        hiddenMethod.name = '_method';
        hiddenMethod.value = 'PUT';
        document.getElementById('formHistorial').appendChild(hiddenMethod);

        var modal = new bootstrap.Modal(document.getElementById('modalHistorial'));
        modal.show();
    }

    function limpiarModal() {
        document.getElementById('historialId').value = '';
        document.getElementById('mascota').value = '';
        document.getElementById('diagnostico').value = '';
        document.getElementById('tratamiento').value = '';
        document.getElementById('medicamento').value = '';
        document.getElementById('fecha').value = '';

        document.getElementById('modalHistorialLabel').textContent = 'Agregar Historial Médico';
        document.getElementById('formHistorial').action = '/historial_medico';
        document.getElementById('formHistorial').method = 'POST';
    }
</script>

@endsection
