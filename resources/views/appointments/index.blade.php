@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Citas</h4>

    {{-- Mensajes de éxito/error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Buscador --}}
    <form method="GET" action="" class="mb-3 row">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar cita...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
        <div class="col-md-6 text-end">
            <!-- Botón para crear nueva cita -->
            <a href="" class="btn btn-success">
                Nueva cita
            </a>
        </div>
    </form>

    {{-- Tabla --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Barbero (ID)</th>
                    <th>Barbero Nombre</th>
                    <th>Servicio</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->appointment_id }}</td>
                        <td>{{ $appointment->client ? $appointment->client->first_name . ' ' . $appointment->client->last_name : 'N/A' }}</td>
                        <td>{{ $appointment->barber_id }}</td>
                        <td>
                            @if($appointment->barber && $appointment->barber->user)
                                {{ $appointment->barber->user->first_name }} {{ $appointment->barber->user->last_name }}
                            @else
                                <span style="color:red;">No Barber Data</span>
                            @endif
                        </td>
                        <td>{{ $appointment->service ? $appointment->service->name : 'N/A' }}</td>
                        <td>{{ $appointment->scheduled_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay citas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {{ $appointments->links() }}
    </div>
</div>
@endsection
