<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber; // Asegúrate de importar el modelo Barber
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Obtén todos los usuarios
        return view('users.index', compact('users')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Si usas un modelo User como voluntario:
        $volunteers = User::where('role', 'client')
            ->when($request->search, function ($query, $search) {
                $query->where('first_name', 'like', "%$search%")
                      ->orWhere('last_name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('users.create', compact('volunteers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15|unique:users,phone',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'client',
            'active' => true,
            'registered_at' => now(),
        ]);

        return redirect()->route('crud.index')->with('success', 'Voluntario creado correctamente.');
    }

    public function processSignup(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email|max:100',
            'phone' => 'required|string|max:15|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:client,barber,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear el usuario (versión más segura)
        $user = User::create([
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'email' => strtolower(trim($request->email)),
            'phone' => trim($request->phone),
            'password' => Hash::make($request->password), // Aquí se encripta
            'role' => $request->role,
            'registered_at' => now(),
            'active' => true,
        ]);

        // Opcional: Autenticar al usuario después de registrarse
        
        return redirect()->route('main')
            ->with('success', 'Registro exitoso. ¡Bienvenido!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('crud.index')->with('success', 'Usuario eliminado correctamente.');
    }

        public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,'.$id.',user_id',
            'phone' => 'required|string|max:15|unique:users,phone,'.$id.',user_id',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('crud.index')->with('success', 'Usuario actualizado correctamente.');
    }
}
