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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'client') {
                return redirect()->route('user.index');
            } elseif ($user->role === 'barber') {
                return redirect()->route('barbers.index');
            } elseif ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } else {
                // Por ahora, admin u otros roles van al inicio
                return redirect()->route('main');
            }
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
}