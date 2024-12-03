@extends('layouts.template')

@section('content')

<section class="hero text-white text-center py-5" style="background: linear-gradient(135deg, #343a40, #17a2b8);">
    <div class="container">
        <h1 class="display-4 fw-bold">Gestión de Vacunación</h1>
        <p class="lead mt-3">Administra el seguimiento de las vacunas aplicadas a tus mascotas y programa las próximas dosis.</p>
    </div>
</section>

<div class="container mt-5">
    <h1>Gestión de Vacunación</h1>
    <button  
        class="btn btn-sm text-white fw-bold border-0" 
        style="background-color: #343a40; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); font-size: 1.1rem;" 
        data-bs-toggle="modal" 
        data-bs-target="#modalVacunacion" 
        onclick="limpiarModal()">
        + Agregar Vacunación
    </button>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="modalVacunacion" tabindex="-1" aria-labelledby="modalVacunacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVacunacionLabel">Agregar/Editar Vacunación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formVacunacion" method="POST" action="">
                        @csrf
                        <input type="hidden" id="vacunacionId" name="id">
                        
                        <div class="mb-3">
                            <label for="mascota_id" class="form-label">Mascota</label>
                            <select id="mascota_id" name="mascota_id" class="form-select" required>
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="vacuna" class="form-label">Vacuna</label>
                            <input type="text" class="form-control" id="vacuna" name="vacuna" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_aplicacion" class="form-label">Fecha de Aplicación</label>
                            <input type="date" class="form-control" id="fecha_aplicacion" name="fecha_aplicacion" required>
                        </div>
                        <div class="mb-3">
                            <label for="dias_siguiente_dosis" class="form-label">Días para la Siguiente Dosis</label>
                            <input type="number" class="form-control" id="dias_siguiente_dosis" name="dias_siguiente_dosis" required>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Vacunación -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Mascota</th>
                <th>Vacuna</th>
                <th>Fecha de Aplicación</th>
                <th>Días para Próxima Dosis</th>
                <th>Fecha Próxima Dosis</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vacunaciones as $vacunacion)
                <tr>
                    <td>{{ $vacunacion->mascota->nombre }}</td>
                    <td>{{ $vacunacion->vacuna }}</td>
                    <td>{{ $vacunacion->fecha_aplicacion }}</td>
                    <td>{{ $vacunacion->dias_siguiente_dosis }}</td>
                    <td>{{ $vacunacion->fecha_proxima_dosis }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" 
                                onclick="editarVacunacion({{ $vacunacion }})">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <form action="{{ route('vacunacion.destroy', $vacunacion->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
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
    function editarVacunacion(vacunacion) {
        const form = document.getElementById('formVacunacion');

        form.action = `/vacunacion/${vacunacion.id}`;
        form.method = 'POST';

        if (!document.querySelector("input[name='_method']")) {
            const hiddenMethod = document.createElement('input');
            hiddenMethod.type = 'hidden';
            hiddenMethod.name = '_method';
            hiddenMethod.value = 'PUT';
            form.appendChild(hiddenMethod);
        }

        document.getElementById('vacunacionId').value = vacunacion.id;
        document.getElementById('mascota_id').value = vacunacion.mascota_id;
        document.getElementById('vacuna').value = vacunacion.vacuna;
        document.getElementById('fecha_aplicacion').value = vacunacion.fecha_aplicacion;
        document.getElementById('dias_siguiente_dosis').value = vacunacion.dias_siguiente_dosis;

        const modal = new bootstrap.Modal(document.getElementById('modalVacunacion'));
        modal.show();
    }

    function limpiarModal() {
        const form = document.getElementById('formVacunacion');

        form.action = '/vacunacion';
        form.method = 'POST';

        document.getElementById('vacunacionId').value = '';
        document.getElementById('mascota_id').value = '';
        document.getElementById('vacuna').value = '';
        document.getElementById('fecha_aplicacion').value = '';
        document.getElementById('dias_siguiente_dosis').value = '';

        const methodInput = document.querySelector("input[name='_method']");
        if (methodInput) {
            methodInput.remove();
        }
    }
</script>

@endsection
