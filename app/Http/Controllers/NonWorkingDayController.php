<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NonWorkingDay; // Importa el modelo NonWorkingDay
use App\Models\Barber; // Importa el modelo Barber

class NonWorkingDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nonWorkingDays = NonWorkingDay::with('barber')->get(); // Obtén todos los días no laborales con relación al barbero
        return view('nonworkingdays.index', compact('nonWorkingDays')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barbers = Barber::all(); // Obtén todos los barberos
        return view('nonworkingdays.create', compact('barbers')); // Pasa los datos a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barber_id' => 'required|exists:barbers,barber_id',
            'date' => 'required|date|after_or_equal:today',
            'reason' => 'nullable|string|max:255',
        ]);

        NonWorkingDay::create($validated);

        return redirect()->route('nonworkingdays.index')->with('success', 'Non-working day created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nonWorkingDay = NonWorkingDay::with('barber')->findOrFail($id); // Busca el día no laboral con relación al barbero
        return view('nonworkingdays.show', compact('nonWorkingDay')); // Pasa los datos a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nonWorkingDay = NonWorkingDay::findOrFail($id); // Busca el día no laboral por ID
        $barbers = Barber::all(); // Obtén todos los barberos
        return view('nonworkingdays.edit', compact('nonWorkingDay', 'barbers')); // Pasa los datos a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'barber_id' => 'required|exists:barbers,barber_id',
            'date' => 'required|date|after_or_equal:today',
            'reason' => 'nullable|string|max:255',
        ]);

        $nonWorkingDay = NonWorkingDay::findOrFail($id);
        $nonWorkingDay->update($validated);

        return redirect()->route('nonworkingdays.index')->with('success', 'Non-working day updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nonWorkingDay = NonWorkingDay::findOrFail($id);
        $nonWorkingDay->delete();

        return redirect()->route('nonworkingdays.index')->with('success', 'Non-working day deleted successfully.');
    }
}