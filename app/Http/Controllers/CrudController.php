<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barber;
use App\Models\Service;
use App\Models\WorkHour;
use App\Models\NonWorkingDay;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Score;
use App\Models\Promotion;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\User::where('role', 'client');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        }

        $volunteers = $query->orderBy('created_at', 'desc')->paginate(10);

        // ...otros datos si los necesitas...

        return view('crud.index', compact('volunteers'));
    }

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
}
