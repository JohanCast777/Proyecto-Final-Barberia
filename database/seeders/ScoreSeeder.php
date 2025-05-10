<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Score;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $score = new Score();
        $score->appointment_id = Appointment::first()?->appointment_id;
        $score->rating = 5;
        $score->comment = 'Excellent service!';
        $score->rated_at = now();
        $score->save();
    }
}
