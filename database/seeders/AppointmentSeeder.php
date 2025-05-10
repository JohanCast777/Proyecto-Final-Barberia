<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Barber;
use App\Models\NonWorkingDay;
use App\Models\Service;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointment = new Appointment();
        $appointment->client_id = User::first()?->user_id;
        $appointment->barber_id = Barber::first()?->barber_id;
        $appointment->service_id = Service::first()?->service_id;
        $appointment->scheduled_at = now()->addDays(1);
        $appointment->estimated_duration = 30;
        $appointment->status = 'pending';
        $appointment->notes = 'Please be on time.';
        $appointment->created_at = now();
        $appointment->save();
    }
}
