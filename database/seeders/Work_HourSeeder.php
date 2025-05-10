<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Barber;
use App\Models\NonWorkingDay;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\WorkHour;

class Work_HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workHour = new WorkHour();
        $workHour->barber_id = Barber::first()?->barber_id;
        $workHour->day_of_week = 'Monday';
        $workHour->start_time = '09:00:00';
        $workHour->end_time = '17:00:00';
        $workHour->save();
    }
}
