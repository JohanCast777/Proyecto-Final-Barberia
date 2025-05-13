@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Barberos</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="" class="mb-3 row">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar barbero...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearBarberoModal">
                Nuevo barbero
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
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Puntuacion</th>
                    <th>Horario laboral</th>
                    <th>Registrado</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barbers as $barber)
                    <tr>
                        <td>{{ $barber->barber_id }}</td>
                        <td>{{ $barber->user->first_name ?? '' }}</td>
                        <td>{{ $barber->user->last_name ?? '' }}</td>
                        <td>{{ $barber->user->phone ?? '' }}</td>
                        <td><a href="mailto:{{ $barber->user->email ?? '' }}">{{ $barber->user->email ?? '' }}</a></td>
                        <td>{{ $barber->average_rating }}</td>
                        <td>{{ $barber->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $barber->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            <button
                                type="button"
                                class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editarBarberoModal"
                                data-id="{{ $barber->barber_id }}"
                                data-first_name="{{ $barber->first_name }}"
                                data-last_name="{{ $barber->last_name }}"
                                data-email="{{ $barber->email }}"
                                data-phone="{{ $barber->phone }}"
                            >
                                Editar
                            </button>
                            <form action="{{ route('barber.destroy', $barber->barber_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay barberos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        
    </div>
</div>

<!-- Modal para crear barbero -->
<div class="modal fade" id="crearBarberoModal" tabindex="-1" aria-labelledby="crearBarberoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('barber.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="crearBarberoModalLabel">Registrar nuevo barbero</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="first_name" class="form-label">Nombre</label>
            <input type="text" name="first_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Apellido</label>
            <input type="text" name="last_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para editar barbero -->
<div class="modal fade" id="editarBarberoModal" tabindex="-1" aria-labelledby="editarBarberoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editarBarberoForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="editarBarberoModalLabel">Editar barbero</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="barber_id" id="edit_barber_id">
          <div class="mb-3">
            <label for="edit_first_name" class="form-label">Nombre</label>
            <input type="text" name="first_name" id="edit_first_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="edit_last_name" class="form-label">Apellido</label>
            <input type="text" name="last_name" id="edit_last_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="edit_email" class="form-label">Correo</label>
            <input type="email" name="email" id="edit_email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="edit_phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" id="edit_phone" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-warning">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editarModal = document.getElementById('editarBarberoModal');
    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var first_name = button.getAttribute('data-first_name');
        var last_name = button.getAttribute('data-last_name');
        var email = button.getAttribute('data-email');
        var phone = button.getAttribute('data-phone');

        document.getElementById('edit_barber_id').value = id;
        document.getElementById('edit_first_name').value = first_name;
        document.getElementById('edit_last_name').value = last_name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_phone').value = phone;

        // Cambia la acción del formulario dinámicamente
        document.getElementById('editarBarberoForm').action = '/barber/' + id;
    });
});
</script>
@endsection