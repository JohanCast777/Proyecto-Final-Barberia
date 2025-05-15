<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber; // Asegúrate de importar el modelo Barber
use App\Models\Appointment; // Asegúrate de importar el modelo Appointment
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class BarberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        
        
        $query = \App\Models\Barber::with('user');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        }

        $barbers = $query->orderBy('created_at', 'desc')->paginate(10);

        // Obtén las citas (appointments) desde la base de datos
        $appointments = Appointment::all(); // Cambia esto según tu lógica

        // Retorna la vista con la variable $appointments
        return view('barbers.index', compact('barbers', 'appointments'));
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
