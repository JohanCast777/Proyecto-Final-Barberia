<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber; // Asegúrate de importar el modelo Barber

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $barbers = Barber::all(); // Obtén todos los barberos
        return view('barbers.index', compact('barbers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barbers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
            'average_rating' => 'nullable|numeric|min:0|max:5',
        ]);
    
        Barber::create($validated);
    
        return redirect()->route('barbers.index')->with('success', 'Barber created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barber = Barber::findOrFail($id); // Busca el barbero por ID
    return view('barbers.show', compact('barber')); // Pasa los datos a la vista    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barber = Barber::findOrFail($id); // Busca el barbero por ID
        return view('barbers.edit', compact('barber')); // Pasa los datos a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
            'average_rating' => 'nullable|numeric|min:0|max:5',
        ]);
    
        $barber = Barber::findOrFail($id);
        $barber->update($validated);
    
        return redirect()->route('barbers.index')->with('success', 'Barber updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barber = Barber::findOrFail($id);
        $barber->delete();
        return redirect()->route('barbers.index')->with('success', 'Barber deleted successfully.');
    }
}
