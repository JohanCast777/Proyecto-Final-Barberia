<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment; // Importa el modelo Payment
use App\Models\Appointment; // Importa el modelo Appointment

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('appointment')->get(); // Obtén todos los pagos con relación a las citas
        return view('payments.index', compact('payments')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $appointments = Appointment::all(); // Obtén todas las citas
        return view('payments.create', compact('appointments')); // Pasa los datos a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,appointment_id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:50',
            'status' => 'required|in:pending,completed,failed',
            'paid_at' => 'nullable|date',
            'transaction_id' => 'nullable|string|max:100',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::with('appointment')->findOrFail($id); // Busca el pago con relación a la cita
        return view('payments.show', compact('payment')); // Pasa los datos a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id); // Busca el pago por ID
        $appointments = Appointment::all(); // Obtén todas las citas
        return view('payments.edit', compact('payment', 'appointments')); // Pasa los datos a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,appointment_id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:50',
            'status' => 'required|in:pending,completed,failed',
            'paid_at' => 'nullable|date',
            'transaction_id' => 'nullable|string|max:100',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}