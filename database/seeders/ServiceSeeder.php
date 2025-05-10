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
use App\Models\Payment;
use App\Models\WorkHour;
use App\Models\Score;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = new Service();
        $service->name = 'Haircut';
        $service->description = 'Basic haircut service';
        $service->duration_minutes = 30;
        $service->price = 15000;
        $service->image = 'haircut.jpg';
        $service->active = true;
        $service->save();
    }
}
