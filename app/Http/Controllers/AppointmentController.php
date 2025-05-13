<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Importa el modelo Appointment
use App\Models\User; // Importa el modelo User
use App\Models\Barber; // Importa el modelo Barber
use App\Models\Service; // Importa el modelo Service

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with(['client', 'barber', 'service'])->get(); // Obtén todas las citas con relaciones
        return view('appointments.index', compact('appointments')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::where('role', 'client')->get(); // Obtén todos los clientes
        $barbers = Barber::all(); // Obtén todos los barberos
        $services = Service::all(); // Obtén todos los servicios
        return view('appointments.create', compact('clients', 'barbers', 'services')); // Pasa los datos a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'barber_id' => 'required|exists:barbers,barber_id',
            'service_id' => 'required|exists:services,service_id',
            'scheduled_date' => 'required|date|after_or_equal:today',
            'scheduled_time' => 'required',
        ]);

        // Combinar fecha y hora en un solo campo
        $validated['scheduled_at'] = $validated['scheduled_date'] . ' ' . $validated['scheduled_time'];
        unset($validated['scheduled_date'], $validated['scheduled_time']);

        // Guardar la cita en la base de datos
        Appointment::create($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Cita agendada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::with(['client', 'barber', 'service'])->findOrFail($id); // Busca la cita con relaciones
        return view('appointments.show', compact('appointment')); // Pasa los datos a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment = Appointment::findOrFail($id); // Busca la cita por ID
        $clients = User::where('role', 'client')->get(); // Obtén todos los clientes
        $barbers = Barber::all(); // Obtén todos los barberos
        $services = Service::all(); // Obtén todos los servicios
        return view('appointments.edit', compact('appointment', 'clients', 'barbers', 'services')); // Pasa los datos a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:users,user_id',
            'barber_id' => 'required|exists:barbers,barber_id',
            'service_id' => 'required|exists:services,service_id',
            'scheduled_at' => 'required|date|after:now',
            'estimated_duration' => 'required|integer|min:1',
            'status' => 'required|in:pending,confirmed,completed,cancelled,no_show',
            'notes' => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Cita eliminada correctamente.');
    }
}