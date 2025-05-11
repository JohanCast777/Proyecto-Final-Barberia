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
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|email|max:100|unique:users,email',
        'phone' => 'required|string|max:15|unique:users,phone',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:client,barber,admin',
    ], [
        'email.unique' => 'Este correo electrónico ya está registrado',
        'phone.unique' => 'Este número de teléfono ya está en uso',
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
            ->with('success', '¡Registro exitoso! Bienvenido a nuestra plataforma.');

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
