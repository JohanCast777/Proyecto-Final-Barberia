<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Barber;

class BarberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barber = new Barber();
        $barber->user_id = User::first()?->user_id;
        $barber->bio = 'Experienced barber';
        $barber->profile_picture = 'barber.jpg';
        $barber->average_rating = 4.5;
        $barber->save();
    }
}
