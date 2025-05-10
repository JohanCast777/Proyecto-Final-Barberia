<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotion = new Promotion();
        $promotion->code = 'WELCOME10';
        $promotion->description = '10% off for first-time clients';
        $promotion->discount = 10;
        $promotion->discount_type = 'percentage';
        $promotion->start_date = now()->toDateString();
        $promotion->end_date = now()->addDays(30)->toDateString();
        $promotion->max_uses = 100;
        $promotion->active = true;
        $promotion->save();
    }
}
