{{-- filepath: resources/views/admin/volunteers.blade.php --}}


@section('content')
<div class="container">
    <h4>Usuarios</h4>

    {{-- Mensajes de éxito/error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Buscador --}}
    <form method="GET" action="" class="mb-3 row">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar voluntario...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
        <div class="col-md-6 text-end">
            <!-- Botón para abrir el modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearVoluntarioModal">
                Nuevo usuario
            </button>
        </div>
    </form>

    {{-- Tabla --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Correo</th>                                       
                    <th>Estado</th>
                    <th>Fecha de registro</th>                                                     
                    <th class="text-center">Acción</th>
                </tr>           
            </thead>                
            <tbody>                              
                @forelse($volunteers as $volunteer)
                    <tr>
                        <td>{{ $volunteer->user_id }}</td>                        
                        <td>{{ $volunteer->first_name }}</td>
                        <td>{{ $volunteer->last_name }}</td>
                        <td>{{ $volunteer->phone }}</td>
                        <td><a href="mailto:{{ $volunteer->email }}">{{ $volunteer->email }}</a></td>                        
                        <td>{{ $volunteer->active ? 'Activo' : 'Inactivo' }}</td>
                        <td>{{ $volunteer->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            <button
                                type="button"
                                class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editarVoluntarioModal"
                                data-id="{{ $volunteer->user_id }}"
                                data-first_name="{{ $volunteer->first_name }}"
                                data-last_name="{{ $volunteer->last_name }}"
                                data-email="{{ $volunteer->email }}"
                                data-phone="{{ $volunteer->phone }}"
                            >
                                Editar
                            </button>
                            <form action="{{ route('user.destroy', $volunteer->user_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay Usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            {{ $volunteers->links('pagination::bootstrap-5') }}
        </nav>
    </div>
</div>

<!-- Modal para crear voluntario -->
<div class="modal fade" id="crearVoluntarioModal" tabindex="-1" aria-labelledby="crearVoluntarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="crearVoluntarioModalLabel">Registrar nuevo voluntario</h5>
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
          <input type="hidden" name="role" value="client">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para editar voluntario -->
<div class="modal fade" id="editarVoluntarioModal" tabindex="-1" aria-labelledby="editarVoluntarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editarVoluntarioForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="editarVoluntarioModalLabel">Editar voluntario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
        <input type="hidden" name="id" id="edit_user_id">
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

<!-- Modal para editar voluntario -->
<div class="modal fade" id="editarVoluntarioModal" tabindex="-1" aria-labelledby="editarVoluntarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editarVoluntarioForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="editarVoluntarioModalLabel">Editar voluntario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="user_id" id="edit_user_id">
          <div class="mb-3">
            <label for="edit_first_name" class="form-label">Nombre</label>
            <input type="text" name="first_name" id="edit_first_name" class="form-control" required>
            @error('first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="edit_last_name" class="form-label">Apellido</label>
            <input type="text" name="last_name" id="edit_last_name" class="form-control" required>
            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="edit_email" class="form-label">Correo</label>
            <input type="email" name="email" id="edit_email" class="form-control" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="edit_phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" id="edit_phone" class="form-control" required>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
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
    var editarModal = document.getElementById('editarVoluntarioModal');
    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var first_name = button.getAttribute('data-first_name');
        var last_name = button.getAttribute('data-last_name');
        var email = button.getAttribute('data-email');
        var phone = button.getAttribute('data-phone');

        document.getElementById('edit_user_id').value = id;
        document.getElementById('edit_first_name').value = first_name;
        document.getElementById('edit_last_name').value = last_name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_phone').value = phone;

        // Cambia la acción del formulario dinámicamente usando Laravel route helper
        var form = document.getElementById('editarVoluntarioForm');
        var actionTemplate = form.getAttribute('data-action-template');
        if (!actionTemplate) {
            // Set the template attribute once
            actionTemplate = "{{ route('user.update', ['user' => ':id']) }}";
            form.setAttribute('data-action-template', actionTemplate);
        }
        form.action = actionTemplate.replace(':id', id);
        // Remove any input named 'user' with value ':id' to avoid conflict
        var userInput = form.querySelector('input[name="user"]');
        if (userInput) {
            userInput.parentNode.removeChild(userInput);
        }
    });
});
</script>
@endsection

{{-- filepath: resources/views/users/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Usuarios</h4>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="" class="mb-3 row">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar voluntario...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
        <div class="col-md-6 text-end">
            <a href="" class="btn btn-success">Nuevo usuario</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Registrado</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($volunteers as $volunteer)
                    <tr>
                        <td>{{ $volunteer->user_id }}</td>
                        <td>{{ $volunteer->first_name }} {{ $volunteer->last_name }}</td>
                        <td>{{ $volunteer->phone }}</td>
                        <td><a href="mailto:{{ $volunteer->email }}">{{ $volunteer->email }}</a></td>
                        <td>{{ $volunteer->active ? 'Activo' : 'Inactivo' }}</td>
                        <td>{{ $volunteer->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('user.destroy', $volunteer->user_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay Usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $volunteers->links() }}
    </div>
</div>
@endsection