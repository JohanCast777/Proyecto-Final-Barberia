<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score; // Importa el modelo Score
use App\Models\User; // Importa el modelo User
use App\Models\Barber; // Importa el modelo Barber

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scores = Score::with(['client', 'barber'])->get(); // Obtén todas las calificaciones con relaciones
        return view('scores.index', compact('scores')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::where('role', 'client')->get(); // Obtén todos los clientes
        $barbers = Barber::all(); // Obtén todos los barberos
        return view('scores.create', compact('clients', 'barbers')); // Pasa los datos a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,appointment_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        \DB::table('scores')->insert([
            'appointment_id' => $request->appointment_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'rated_at' => now(),
        ]);

        return redirect()->back()->with('success', '¡Calificación registrada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $score = Score::with(['client', 'barber'])->findOrFail($id); // Busca la calificación con relaciones
        return view('scores.show', compact('score')); // Pasa los datos a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $score = Score::findOrFail($id); // Busca la calificación por ID
        $clients = User::where('role', 'client')->get(); // Obtén todos los clientes
        $barbers = Barber::all(); // Obtén todos los barberos
        return view('scores.edit', compact('score', 'clients', 'barbers')); // Pasa los datos a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:users,user_id',
            'barber_id' => 'required|exists:barbers,barber_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $score = Score::findOrFail($id);
        $score->update($validated);

        return redirect()->route('scores.index')->with('success', 'Score updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $score = Score::findOrFail($id);
        $score->delete();

        return redirect()->route('scores.index')->with('success', 'Score deleted successfully.');
    }
}