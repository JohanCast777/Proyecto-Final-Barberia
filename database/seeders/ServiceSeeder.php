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
        $servicio1 = new Service();
        $servicio1->name = 'Corte Clásico';
        $servicio1->description = 'Corte de cabello tradicional con técnicas precisas que garantizan un estilo limpio y atemporal.';
        $servicio1->duration_minutes = 40;
        $servicio1->price = 14000;
        $servicio1->image = null; // No se proporcionó imagen
        $servicio1->active = true;
        $servicio1->created_at = now();
        $servicio1->updated_at = now();
        $servicio1->save();
        
        $servicio2 = new Service();
        $servicio2->name = 'Barba Completa';
        $servicio2->description = 'Afeitado completo de la barba con técnicas de precisión para un acabado impecable.';
        $servicio2->duration_minutes = 15;
        $servicio2->price = 8000;
        $servicio2->image = null; // No se proporcionó imagen
        $servicio2->active = true;
        $servicio2->created_at = now();
        $servicio2->updated_at = now();
        $servicio2->save();

        $servicio3 = new Service();
        $servicio3->name = 'Corte de Cabello y Barba';
        $servicio3->description = 'Combinación de corte de cabello y afeitado de barba para un look completo y cuidado.';   
        $servicio3->duration_minutes = 60;
        $servicio3->price = 21000;
        $servicio3->image = null; // No se proporcionó imagen
        $servicio3->active = true;      
        $servicio3->created_at = now();
        $servicio3->updated_at = now();
        $servicio3->save();

        $servicio4 = new Service();
        $servicio4->name = 'Limpieza Facial';
        $servicio4->description = 'Tratamiento facial que incluye limpieza profunda, exfoliación e hidratación para una piel fresca y saludable.';
        $servicio4->duration_minutes = 35;
        $servicio4->price = 10000;
        $servicio4->image = null; // No se proporcionó imagen
        $servicio4->active = true;
        $servicio4->created_at = now();
        $servicio4->updated_at = now();
        $servicio4->save();

        $servicio5 = new Service();
        $servicio5->name = 'Despilacion de Cejas';
        $servicio5->description = 'Diseño y depilación de cejas para un marco facial perfecto.';
        $servicio5->duration_minutes = 5;
        $servicio5->price = 3000;
        $servicio5->image = null; // No se proporcionó imagen
        $servicio5->active = true;
        $servicio5->created_at = now();
        $servicio5->updated_at = now();
        $servicio5->save();

        $servicio6 = new Service();
        $servicio6->name = 'Tintura de Cabello';
        $servicio6->description = 'Aplicación de tinte para cambiar el color del cabello, con opciones de tonos variados.';
        $servicio6->duration_minutes = 180;
        $servicio6->price = 80000;
        $servicio6->image = null; // No se proporcionó imagen
        $servicio6->active = true;
        $servicio6->created_at = now();
        $servicio6->updated_at = now();
        $servicio6->save();

        $servicio7 = new Service();
        $servicio7->name = 'Rayos para el Cabello';
        $servicio7->description = 'Aplicación de rayos para dar luminosidad y estilo al cabello.';
        $servicio7->duration_minutes = 180;
        $servicio7->price = 80000;
        $servicio7->image = null; // No se proporcionó imagen
        $servicio7->active = true;
        $servicio7->created_at = now();
        $servicio7->updated_at = now();
        $servicio7->save();
    }
}
