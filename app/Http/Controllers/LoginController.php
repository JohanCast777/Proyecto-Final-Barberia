<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
 
    public function showLoginForm()
    {
        return view('Login'); // Asegúrate de que 'Login' sea el nombre correcto de tu vista
    }
    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirigir al dashboard
            return redirect()->route('users.index');
        }
        

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
}

