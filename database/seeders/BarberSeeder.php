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
        $barber1 = new Barber();
        $barber1->user_id = '1';
        $barber1->bio = 'Experienced barber';
        $barber1->profile_picture = 'barber.jpg';
        $barber1->average_rating = 4.5;
        $barber1->save();

        $barber2 = new Barber();
        $barber2->user_id = '2';
        $barber2->bio = 'Experienced barber';
        $barber2->profile_picture = 'barber.jpg';
        $barber2->average_rating = 4.5;
        $barber2->save();


        $barber3 = new Barber();
        $barber3->user_id = '3';
        $barber3->bio = 'Experienced barber';
        $barber3->profile_picture = 'barber.jpg';
        $barber3->average_rating = 4.5;
        $barber3->save();

        $barber4 = new Barber();
        $barber4->user_id = '4';
        $barber4->bio = 'Experienced barber';
        $barber4->profile_picture = 'barber.jpg';
        $barber4->average_rating = 4.5;
        $barber4->save();

        $barber5 = new Barber();
        $barber5->user_id = '5';
        $barber5->bio = 'Experienced barber';
        $barber5->profile_picture = 'barber.jpg';
        $barber5->average_rating = 4.5;
        $barber5->save();


        $barber6 = new Barber();
        $barber6->user_id = '6';
        $barber6->bio = 'Experienced barber';
        $barber6->profile_picture = 'barber.jpg';
        $barber6->average_rating = 4.5;
        $barber6->save();

        $barber7 = new Barber();
        $barber7->user_id = '7';
        $barber7->bio = 'Experienced barber';
        $barber7->profile_picture = 'barber.jpg';
        $barber7->average_rating = 4.5;
        $barber7->save();

        $barber8 = new Barber();
        $barber8->user_id = '8';
        $barber8->bio = 'Experienced barber';
        $barber8->profile_picture = 'barber.jpg';
        $barber8->average_rating = 4.5;
        $barber8->save();

        $barber9 = new Barber();
        $barber9->user_id = '9';
        $barber9->bio = 'Experienced barber';
        $barber9->profile_picture = 'barber.jpg';
        $barber9->average_rating = 4.5;
        $barber9->save();

        $barber10 = new Barber();
        $barber10->user_id = '10';
        $barber10->bio = 'Experienced barber';
        $barber10->profile_picture = 'barber.jpg';
        $barber10->average_rating = 4.5;
        $barber10->save();

        
    }
}
