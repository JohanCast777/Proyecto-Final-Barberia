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
        $user1= new User();
        $user1->first_name = 'Sebastian';
        $user1->last_name = 'Caicedo';
        $user1->email = 'Sebastiacaicedo3@gmail.com';
        $user1->phone = '3104827593';
        $user1->password = bcrypt('Sb1043875');
        $user1->role = 'barber';
        $user1->save();

        $user2 = new User();
        $user2->first_name = 'Jose';
        $user2->last_name = 'Caicedo';
        $user2->email = 'Joseca22@gmail.com';
        $user2->phone = '3119374205';
        $user2->password = bcrypt('Jc2910464');
        $user2->role = 'barber';
        $user2->save();

        $user3 = new User();
        $user3->first_name = 'Daniel';
        $user3->last_name = 'Cordoba';
        $user3->email = 'Daniel532@gmail.com';
        $user3->phone = '3120681739';
        $user3->password = bcrypt('Dn21324324');
        $user3->role = 'barber';
        $user3->save();

        $user4 = new User();
        $user4->first_name = 'Joshep';
        $user4->last_name = 'Chitia';
        $user4->email = 'JoshepChii55@gmail.com';
        $user4->phone = '3137458201';
        $user4->password = bcrypt('Jc12343562');
        $user4->role = 'barber';
        $user4->save();

        $user5 = new User();
        $user5->first_name = 'Andrés';
        $user5->last_name = 'Ramírez';
        $user5->email = 'AndresRamGon@gmail.com';
        $user5->phone = '3141597862';
        $user5->password = bcrypt('Ar3557673');
        $user5->role = 'barber';
        $user5->save();

        $user6 = new User();
        $user6->first_name = 'Santiago';
        $user6->last_name = 'Herrera';
        $user6->email = 'Santiher@gmail.com';
        $user6->phone = '3154903067';
        $user6->password = bcrypt('Sh24354656');
        $user6->role = 'barber';
        $user6->save();

        $user7 = new User();
        $user7->first_name = 'Carlos';
        $user7->last_name = 'Morales';
        $user7->email = 'CarlosMo2004@gmail.com';
        $user7->phone = '3168231450';
        $user7->password = bcrypt('Cm89734521');
        $user7->role = 'barber';
        $user7->save();

        $user8 = new User();
        $user8->first_name = 'Miguel';
        $user8->last_name = 'Patiño';
        $user8->email = 'MiguelPat22@gmail.com';
        $user8->phone = '3172786941';
        $user8->password = bcrypt('Mp35510341');
        $user8->role = 'barber';
        $user8->save();

        $user9 = new User();
        $user9->first_name = 'Julián';
        $user9->last_name = 'Cárdenas';
        $user9->email = 'Juliandenas@gmail.com';
        $user9->phone = '3180614375';
        $user9->password = bcrypt('Jc20240254');
        $user9->role = 'barber';
        $user9->save();

        $user10 = new User();
        $user10->first_name = 'Tomás';
        $user10->last_name = 'Vargas';
        $user10->email = 'TomásVar37@gmail.com';
        $user10->phone = '3195069820';
        $user10->password = bcrypt('Tv22498013');
        $user10->role = 'barber';
        $user10->save();

        $user11 = new User();        
        $user11->first_name = 'Juan';
        $user11->last_name = 'Granados';
        $user11->email = 'Juan126743@gmail.com';
        $user11->phone = '3201245698';
        $user11->password = bcrypt('jskdiuepolr123a');
        $user11->role = 'barber';
        $user11->save();
        
        

        // Cliente 2
        $user12 = new User();
        $user12->first_name = 'Carlos';
        $user12->last_name = 'Martínez';
        $user12->email = 'carlos.martinez99@example.com';
        $user12->phone = '3107896543';
        $user12->password = bcrypt('Cm98765432');
        $user12->role = 'client';
        $user12->save();

        // Cliente 3
        $user13 = new User();
        $user13->first_name = 'Sofía';
        $user13->last_name = 'Ramírez';
        $user13->email = 'sofia.ramirez21@example.com';
        $user13->phone = '3131234567';
        $user13->password = bcrypt('Sr11223344');
        $user13->role = 'client';
        $user13->save();

        // Cliente 4
        $user14 = new User();
        $user14->first_name = 'Andrés';
        $user14->last_name = 'Hernández';
        $user14->email = 'andres.hernandez43@example.com';
        $user14->phone = '3149871230';
        $user14->password = bcrypt('Ah33445566');
        $user14->role = 'client';
        $user14->save();

        // Cliente 5
        $user15 = new User();
        $user15->first_name = 'Mariana';
        $user15->last_name = 'Lopez';
        $user15->email = 'mariana.lopez10@example.com';
        $user15->phone = '3114567899';
        $user15->password = bcrypt('Ml77889900');
        $user15->role = 'client';
        $user15->save();

        // Cliente 6
        $user16 = new User();
        $user16->first_name = 'Sebastián';
        $user16->last_name = 'Ortiz';
        $user16->email = 'sebastian.ortiz55@example.com';
        $user16->phone = '3186543210';
        $user16->password = bcrypt('So99887766');
        $user16->role = 'client';
        $user16->save();

        // Cliente 7
        $user17 = new User();
        $user17->first_name = 'Daniela';
        $user17->last_name = 'Mejía';
        $user17->email = 'daniela.mejia12@example.com';
        $user17->phone = '3201237890';
        $user17->password = bcrypt('Dm44556677');
        $user17->role = 'client';
        $user17->save();

        // Cliente 8
        $user18 = new User();
        $user18->first_name = 'Felipe';
        $user18->last_name = 'Moreno';
        $user18->email = 'felipe.moreno75@example.com';
        $user18->phone = '3169876543';
        $user18->password = bcrypt('Fm22110099');
        $user18->role = 'client';
        $user18->save();

        // Cliente 9
        $user19 = new User();
        $user19->first_name = 'Camila';
        $user19->last_name = 'Pérez';
        $user19->email = 'camila.perez88@example.com';
        $user19->phone = '3159873210';
        $user19->password = bcrypt('Cp77889966');
        $user19->role = 'client';
        $user19->save();

        // Cliente 10
        $user20 = new User();
        $user20->first_name = 'Julián';
        $user20->last_name = 'Rojas';
        $user20->email = 'julian.rojas32@example.com';
        $user20->phone = '3191234567';
        $user20->password = bcrypt('Jr55667788');
        $user20->role = 'client';
        $user20->save();

        $user21 = new User();
        $user21->first_name = 'Laura';
        $user21->last_name = 'González';
        $user21->email = 'laura.gonzalez82@example.com';
        $user21->phone = '3124567890';
        $user21->password = bcrypt('Lg12345678');
        $user21->role = 'client';
        $user21->save();

    }
}

