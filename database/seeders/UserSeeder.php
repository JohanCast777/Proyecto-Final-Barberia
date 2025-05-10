<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->first_name = 'John';
        $user->last_name = 'Doe';
        $user->email = 'john@example.com';
        $user->phone = '1234567890';
        $user->password = bcrypt('password');
        $user->role = 'client';
        $user->save();
    }
}

