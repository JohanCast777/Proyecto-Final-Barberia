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
        'first_name' => 'required|string|max:12|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', // Solo letras y espacios
        'last_name' => 'required|string|max:12|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',  // Solo letras y espacios
        'email' => 'required|email|max:100|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'phone' => 'required|string|regex:/^\d{10}$/|unique:users,phone', // Exactamente 10 dígitos
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:client,barber,admin',
    ], [
        'first_name.regex' => 'No se permiten caracteres especiales.',
        'last_name.regex' => 'No se permiten caracteres especiales.',
        'first_name.max' => 'El nombre no puede tener más de 12 caracteres. Ingrese un valor adecuado.',
        'last_name.max' => 'El apellido no puede tener más de 12 caracteres. Ingrese un valor adecuado.',
        'email.unique' => 'Este correo electrónico ya está registrado.',
        'email.regex' => 'El correo electrónico debe tener un dominio válido (por ejemplo, .com, .co, .org).',
        'phone.unique' => 'Este número de teléfono ya está en uso.',
        'phone.regex' => 'El campo teléfono debe tener 10 números.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.', // Mensaje personalizado
        'password.confirmed' => 'La confirmación de la contraseña no coincide.', // Mensaje adicional si es necesario
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
