<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verificar si el correo existe en la base de datos
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Este usuario no existe.', // Mensaje actualizado
            ])->withInput();
        }

        // Intentar autenticar al usuario
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'password' => 'La contraseña ingresada es incorrecta.',
            ])->withInput();
        }

        // Si la autenticación es exitosa
        $request->session()->regenerate();
        return redirect()->route('main'); // Redirige al usuario a la página principal o donde desees
    }
}