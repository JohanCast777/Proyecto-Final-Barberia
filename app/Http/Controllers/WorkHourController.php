<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkHour; // Importa el modelo WorkHour
use App\Models\Barber; // Importa el modelo Barber

class WorkHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workHours = WorkHour::with('barber')->get(); // Obtén todos los horarios de trabajo con relación al barbero
        return view('work-hours.index', compact('workHours')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barbers = Barber::all(); // Obtén todos los barberos
        return view('work-hours.create', compact('barbers')); // Pasa los datos a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barber_id' => 'required|exists:barbers,barber_id',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        WorkHour::create($validated);

        return redirect()->route('work-hours.index')->with('success', 'Work hour created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workHour = WorkHour::with('barber')->findOrFail($id); // Busca el horario de trabajo con relación al barbero
        return view('work-hours.show', compact('workHour')); // Pasa los datos a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $workHour = WorkHour::findOrFail($id); // Busca el horario de trabajo por ID
        $barbers = Barber::all(); // Obtén todos los barberos
        return view('work-hours.edit', compact('workHour', 'barbers')); // Pasa los datos a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'barber_id' => 'required|exists:barbers,barber_id',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $workHour = WorkHour::findOrFail($id);
        $workHour->update($validated);

        return redirect()->route('work-hours.index')->with('success', 'Work hour updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workHour = WorkHour::findOrFail($id);
        $workHour->delete();

        return redirect()->route('work-hours.index')->with('success', 'Work hour deleted successfully.');
    }
}