<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gustavo',
            'lastname' => 'Acosta',
            'email' => 'gustavo.acosta@example.com',
            'username' => 'gustavo.acosta',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 7,
            'diseases' => 'asthma',
            'physical_activity' => 'Running',
            'image' => 'https://picsum.photos/seed/gustavo.acosta@example.com/200/200'
        ]);

        User::create([
            'name' => 'María',
            'lastname' => 'González',
            'email' => 'maria.gonzalez@example.com',
            'username' => 'maria.gonzalez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 6,
            'diseases' => 'none',
            'physical_activity' => 'Yoga',
            'image' => 'https://picsum.photos/seed/maria.gonzalez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Carlos',
            'lastname' => 'Ramírez',
            'email' => 'carlos.ramirez@example.com',
            'username' => 'carlos.ramirez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 8,
            'diseases' => 'diabetes',
            'physical_activity' => 'Swimming',
            'image' => 'https://picsum.photos/seed/carlos.ramirez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Lucía',
            'lastname' => 'Martínez',
            'email' => 'lucia.martinez@example.com',
            'username' => 'lucia.martinez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 5,
            'diseases' => 'hypertension',
            'physical_activity' => 'Cycling',
            'image' => 'https://picsum.photos/seed/lucia.martinez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Diego',
            'lastname' => 'Hernández',
            'email' => 'diego.hernandez@example.com',
            'username' => 'diego.hernandez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'none',
            'physical_activity' => 'Running',
            'image' => 'https://picsum.photos/seed/diego.hernandez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Ana',
            'lastname' => 'López',
            'email' => 'ana.lopez@example.com',
            'username' => 'ana.lopez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 9,
            'diseases' => 'allergies',
            'physical_activity' => 'Hiking',
            'image' => 'https://picsum.photos/seed/ana.lopez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Jorge',
            'lastname' => 'Díaz',
            'email' => 'jorge.diaz@example.com',
            'username' => 'jorge.diaz',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 6,
            'diseases' => 'none',
            'physical_activity' => 'Dancing',
            'image' => 'https://picsum.photos/seed/jorge.diaz@example.com/200/200'
        ]);

        User::create([
            'name' => 'Isabel',
            'lastname' => 'Morales',
            'email' => 'isabel.morales@example.com',
            'username' => 'isabel.morales',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'asthma',
            'physical_activity' => 'Yoga',
            'image' => 'https://picsum.photos/seed/isabel.morales@example.com/200/200'
        ]);

        User::create([
            'name' => 'Luis',
            'lastname' => 'Fernández',
            'email' => 'luis.fernandez@example.com',
            'username' => 'luis.fernandez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 8,
            'diseases' => 'none',
            'physical_activity' => 'Swimming',
            'image' => 'https://picsum.photos/seed/luis.fernandez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Elena',
            'lastname' => 'Suárez',
            'email' => 'elena.suarez@example.com',
            'username' => 'elena.suarez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 5,
            'diseases' => 'diabetes',
            'physical_activity' => 'Cycling',
            'image' => 'https://picsum.photos/seed/elena.suarez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Pedro',
            'lastname' => 'Gómez',
            'email' => 'pedro.gomez@example.com',
            'username' => 'pedro.gomez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'hypertension',
            'physical_activity' => 'Running',
            'image' => 'https://picsum.photos/seed/pedro.gomez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Sara',
            'lastname' => 'Torres',
            'email' => 'sara.torres@example.com',
            'username' => 'sara.torres',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 6,
            'diseases' => 'none',
            'physical_activity' => 'Yoga',
            'image' => 'https://picsum.photos/seed/sara.torres@example.com/200/200'
        ]);

        User::create([
            'name' => 'Antonio',
            'lastname' => 'Méndez',
            'email' => 'antonio.mendez@example.com',
            'username' => 'antonio.mendez',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 7,
            'diseases' => 'allergies',
            'physical_activity' => 'Swimming',
            'image' => 'https://picsum.photos/seed/antonio.mendez@example.com/200/200'
        ]);

        User::create([
            'name' => 'Patricia',
            'lastname' => 'Cruz',
            'email' => 'patricia.cruz@example.com',
            'username' => 'patricia.cruz',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 8,
            'diseases' => 'none',
            'physical_activity' => 'Cycling',
            'image' => 'https://picsum.photos/seed/patricia.cruz@example.com/200/200'
        ]);

        User::create([
            'name' => 'Andrés',
            'lastname' => 'Vega',
            'email' => 'andres.vega@example.com',
            'username' => 'andres.vega',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 9,
            'diseases' => 'asthma',
            'physical_activity' => 'Running',
            'image' => 'https://picsum.photos/seed/andres.vega@example.com/200/200'
        ]);

        User::create([
            'name' => 'Laura',
            'lastname' => 'Navarro',
            'email' => 'laura.navarro@example.com',
            'username' => 'laura.navarro',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 6,
            'diseases' => 'none',
            'physical_activity' => 'Hiking',
            'image' => 'https://picsum.photos/seed/laura.navarro@example.com/200/200'
        ]);

        User::create([
            'name' => 'Francisco',
            'lastname' => 'Rojas',
            'email' => 'francisco.rojas@example.com',
            'username' => 'francisco.rojas',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'diabetes',
            'physical_activity' => 'Dancing',
            'image' => 'https://picsum.photos/seed/francisco.rojas@example.com/200/200'
        ]);

        User::create([
            'name' => 'Clara',
            'lastname' => 'Iglesias',
            'email' => 'clara.iglesias@example.com',
            'username' => 'clara.iglesias',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 8,
            'diseases' => 'hypertension',
            'physical_activity' => 'Running',
            'image' => 'https://picsum.photos/seed/clara.iglesias@example.com/200/200'
        ]);

        User::create([
            'name' => 'Miguel',
            'lastname' => 'Ortega',
            'email' => 'miguel.ortega@example.com',
            'username' => 'miguel.ortega',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 5,
            'diseases' => 'allergies',
            'physical_activity' => 'Yoga',
            'image' => 'https://picsum.photos/seed/miguel.ortega@example.com/200/200'
        ]);

        User::create([
            'name' => 'Daniela',
            'lastname' => 'Reyes',
            'email' => 'daniela.reyes@example.com',
            'username' => 'daniela.reyes',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'none',
            'physical_activity' => 'Cycling',
            'image' => 'https://picsum.photos/seed/daniela.reyes@example.com/200/200'
        ]);
    }
}
