@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Horarios de Trabajo</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="" class="mb-3 row">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar horario...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearHorarioModal">
                Nuevo horario
            </button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Fin</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($workhours as $workhour)
                    <tr>
                        <td>{{ $workhour->work_hour_id }}</td>
                        <td>{{ $workhour->barber->user->first_name ?? '' }}</td>
                        <td>{{ $workhour->barber->user->last_name ?? '' }}</td>
                        <td>{{ $workhour->start_time }}</td>
                        <td>{{ $workhour->end_time }}</td>
                        <td class="text-center">
                            <button
                                type="button"
                                class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editarHorarioModal"
                                data-id="{{ $workhour->id }}"
                                data-day="{{ $workhour->day }}"
                                data-start_time="{{ $workhour->start_time }}"
                                data-end_time="{{ $workhour->end_time }}"                            
                                Editar
                            </button>
                            <form action="{{ route('workhour.destroy', $workhour) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar este horario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay horarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $workhours->links() }}
    </div>
</div>

<!-- Aquí van los modales de crear/editar horario -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editarModal = document.getElementById('editarHorarioModal');
    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var day = button.getAttribute('data-day');
        var start_time = button.getAttribute('data-start_time');
        var end_time = button.getAttribute('data-end_time');

        document.getElementById('edit_id').value = id;
        document.getElementById('edit_day').value = day;
        document.getElementById('edit_start_time').value = start_time;
        document.getElementById('edit_end_time').value = end_time;

        document.getElementById('editarHorarioForm').action = '/workhours/' + id;
    });
});
</script>
@endsection