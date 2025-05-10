<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Appointment;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment = new Payment();
        $payment->appointment_id = Appointment::first()?->appointment_id;
        $payment->amount = 15000;
        $payment->payment_method = 'cash';
        $payment->status = 'completed';
        $payment->paid_at = now();
        $payment->transaction_id = 'TX123456';
        $payment->save();
    }
}
