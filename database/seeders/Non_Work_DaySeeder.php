<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Barber;
use App\Models\NonWorkingDay;

class Non_Work_DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $day = new NonWorkingDay();
        $day->barber_id = Barber::first()?->barber_id;
        $day->date = now()->addDays(3)->toDateString();
        $day->reason = 'Vacation';
        $day->save();
    }
}

