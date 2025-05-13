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
        $query = User::where('role', 'client');

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

        return view('crud.index', compact('volunteers'));
    }

    public function barbers(Request $request)
    {
        $query = Barber::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        }

        $barbers = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('crud.barbers', compact('barbers'));
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

    public function services(Request $request)
    {
        $query = Service::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }

        $services = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('services.index', compact('services'));
    }

    public function horarios()
    {
        $workhours = WorkHour::with('barber')->paginate(10);
        return view('workhours.index', compact('workhours'));
    }

    public function diasnolaborados(Request $request)
    {
        $query = NonWorkingDay::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }

        $nonworkingdays = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('nonworkingdays.index', compact('nonworkingdays'));
    }

    public function citas(Request $request)
    {
        $query = Appointment::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('client_name', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%");
            });
        }

        $appointments = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    public function pagos(Request $request)
    {
        $query = Payment::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('payment_method', 'like', "%$search%")
                  ->orWhere('amount', 'like', "%$search%");
            });
        }

        $payments = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('payments.index', compact('payments'));
    }

    public function calificaciones(Request $request)
    {
        $query = Score::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('comment', 'like', "%$search%")
                  ->orWhere('score', 'like', "%$search%");
            });
        }

        $scores = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('scores.index', compact('scores'));
    }

    public function promociones(Request $request)
    {
        $query = Promotion::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }

        $promotions = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('promotions.index', compact('promotions'));
    }
}
