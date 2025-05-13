<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    // Muestra el formulario de registro
    public function showSignupForm()
    {
        return view('Signup'); 
    }

    // Procesa el registro de un nuevo usuario
    public function processSignup(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:12', // Máximo 12 caracteres
        'last_name' => 'required|string|max:12',  // Máximo 12 caracteres
        'email' => 'required|email|max:100|unique:users,email',
        'phone' => 'required|string|regex:/^\d{10}$/|unique:users,phone', // Exactamente 10 dígitos
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:client,barber,admin',
    ], [
        'first_name.max' => 'El nombre no puede tener más de 12 caracteres. Ingrese un valor adecuado.',
        'last_name.max' => 'El apellido no puede tener más de 12 caracteres. Ingrese un valor adecuado.',
        'email.unique' => 'Este correo electrónico ya está registrado',
        'phone.unique' => 'Este número de teléfono ya está en uso',
        'phone.regex' => 'El campo teléfono debe tener 10 números', // Mensaje personalizado
    ]);

    try {
        $user = User::create([
            'first_name' => trim($validatedData['first_name']),
            'last_name' => trim($validatedData['last_name']),
            'email' => strtolower(trim($validatedData['email'])),
            'phone' => trim($validatedData['phone']),
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
            'registered_at' => now(),
            'active' => true,
        ]);        

        return redirect()->route('main')
            ->with('success', '¡Registro exitoso! Ahora ingresa para continuar.');

    } catch (\Illuminate\Database\QueryException $e) {
        $errorCode = $e->errorInfo[1];
        
        // Código de error para duplicados en MySQL
        if ($errorCode == 1062) {
            return back()->withInput()
                ->with('error', 'Error: Los datos proporcionados ya existen en nuestro sistema');
        }

        return back()->withInput()
            ->with('error', 'Ocurrió un error inesperado. Por favor intenta nuevamente.');
    }
}}
