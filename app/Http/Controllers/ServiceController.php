<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // Importa el modelo Service

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all(); // Obtén todos los servicios
        
        return view('services.index', compact('services')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create'); // Muestra el formulario para crear un servicio
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'duration_minutes' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'active' => 'required|boolean',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id); // Busca el servicio por ID
        return view('services.show', compact('service')); // Pasa los datos a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id); // Busca el servicio por ID
        return view('services.edit', compact('service')); // Pasa los datos a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'duration_minutes' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'active' => 'required|boolean',
        ]);

        $service = Service::findOrFail($id);
        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}