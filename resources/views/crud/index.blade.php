{{-- filepath: resources/views/admin/volunteers.blade.php --}}


@section('content')
<div class="container">
    <h4>Voluntarios</h4>

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
            <a href="" class="btn btn-success">Nuevo voluntario</a>
        </div>
    </form>

    {{-- Tabla --}}
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
                        <td>{{ $volunteer->id }}</td>
                        <td>{{ $volunteer->name }}</td>
                        <td>{{ $volunteer->phone }}</td>
                        <td><a href="mailto:{{ $volunteer->email }}">{{ $volunteer->email }}</a></td>
                        <td>{{ $volunteer->status }}</td>
                        <td>{{ $volunteer->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-warning">Editar</a>
                            <form action="" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay voluntarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {{ $volunteers->links() }}
    </div>
</div>
@endsection

{{-- filepath: resources/views/users/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Voluntarios</h4>
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
            <a href="" class="btn btn-success">Nuevo voluntario</a>
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
                        <td>{{ $volunteer->id }}</td>
                        <td>{{ $volunteer->first_name }} {{ $volunteer->last_name }}</td>
                        <td>{{ $volunteer->phone }}</td>
                        <td><a href="mailto:{{ $volunteer->email }}">{{ $volunteer->email }}</a></td>
                        <td>{{ $volunteer->status ?? '' }}</td>
                        <td>{{ $volunteer->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-warning">Editar</a>
                            <form action="" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay voluntarios registrados.</td>
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