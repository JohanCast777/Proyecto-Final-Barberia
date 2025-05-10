<?php

namespace Database\Seeders;

use App\Models\Barber;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\NonWorkingDay;
use App\Models\Promotion;
use App\Models\WorkHour;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Score;
use App\Models\Appointment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UserSeeder::class);
        $this->call(BarberSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(Work_HourSeeder::class);
        $this->call(Non_Work_DaySeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(ScoreSeeder::class);  
        $this->call(PromotionSeeder::class);
        
        
        
        
        
        

    }
}
