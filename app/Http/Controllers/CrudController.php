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
    public function index()
    {
        $users = User::all();
        $barbers = Barber::all();
        $services = Service::all();
        $workhours = WorkHour::all();
        $nonworkingdays = NonWorkingDay::all();
        $appointments = Appointment::all();
        $payments = Payment::all();
        $scores = Score::all();
        $promotions = Promotion::all();

        $volunteers = User::where('role', 'client')->paginate(10);

        return view('crud.index', compact(
            'users', 'barbers', 'services', 'workhours', 'nonworkingdays',
            'appointments', 'payments', 'scores', 'promotions', 'volunteers'
        ));
    }

    public function create(Request $request)
    {
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
