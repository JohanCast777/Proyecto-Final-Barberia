<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion; // Importa el modelo Promotion

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all(); // Obtén todas las promociones
        return view('promotions.index', compact('promotions')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promotions.create'); // Muestra el formulario para crear una promoción
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:promotions,code',
            'description' => 'nullable|string|max:255',
            'discount' => 'required|numeric|min:0',
            'discount_type' => 'required|in:percentage,fixed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'max_uses' => 'nullable|integer|min:1',
            'active' => 'required|boolean',
        ]);

        Promotion::create($validated);

        return redirect()->route('promotions.index')->with('success', 'Promotion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = Promotion::findOrFail($id); // Busca la promoción por ID
        return view('promotions.show', compact('promotion')); // Pasa los datos a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = Promotion::findOrFail($id); // Busca la promoción por ID
        return view('promotions.edit', compact('promotion')); // Pasa los datos a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:promotions,code,' . $id . ',promotion_id',
            'description' => 'nullable|string|max:255',
            'discount' => 'required|numeric|min:0',
            'discount_type' => 'required|in:percentage,fixed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'max_uses' => 'nullable|integer|min:1',
            'active' => 'required|boolean',
        ]);

        $promotion = Promotion::findOrFail($id);
        $promotion->update($validated);

        return redirect()->route('promotions.index')->with('success', 'Promotion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('promotions.index')->with('success', 'Promotion deleted successfully.');
    }
}