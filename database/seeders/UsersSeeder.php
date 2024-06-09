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
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 7,
            'diseases' => 'asthma',
            'physical_activity' => 'Running'
        ]);

        User::create([
            'name' => 'María',
            'lastname' => 'González',
            'email' => 'maria.gonzalez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 6,
            'diseases' => 'none',
            'physical_activity' => 'Yoga'
        ]);

        User::create([
            'name' => 'Carlos',
            'lastname' => 'Ramírez',
            'email' => 'carlos.ramirez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 8,
            'diseases' => 'diabetes',
            'physical_activity' => 'Swimming'
        ]);

        User::create([
            'name' => 'Lucía',
            'lastname' => 'Martínez',
            'email' => 'lucia.martinez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 5,
            'diseases' => 'hypertension',
            'physical_activity' => 'Cycling'
        ]);

        User::create([
            'name' => 'Diego',
            'lastname' => 'Hernández',
            'email' => 'diego.hernandez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'none',
            'physical_activity' => 'Running'
        ]);

        User::create([
            'name' => 'Ana',
            'lastname' => 'López',
            'email' => 'ana.lopez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 9,
            'diseases' => 'allergies',
            'physical_activity' => 'Hiking'
        ]);

        User::create([
            'name' => 'Jorge',
            'lastname' => 'Díaz',
            'email' => 'jorge.diaz@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 6,
            'diseases' => 'none',
            'physical_activity' => 'Dancing'
        ]);

        User::create([
            'name' => 'Isabel',
            'lastname' => 'Morales',
            'email' => 'isabel.morales@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'asthma',
            'physical_activity' => 'Yoga'
        ]);

        User::create([
            'name' => 'Luis',
            'lastname' => 'Fernández',
            'email' => 'luis.fernandez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 8,
            'diseases' => 'none',
            'physical_activity' => 'Swimming'
        ]);

        User::create([
            'name' => 'Elena',
            'lastname' => 'Suárez',
            'email' => 'elena.suarez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 5,
            'diseases' => 'diabetes',
            'physical_activity' => 'Cycling'
        ]);

        User::create([
            'name' => 'Pedro',
            'lastname' => 'Gómez',
            'email' => 'pedro.gomez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'hypertension',
            'physical_activity' => 'Running'
        ]);

        User::create([
            'name' => 'Sara',
            'lastname' => 'Torres',
            'email' => 'sara.torres@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 6,
            'diseases' => 'none',
            'physical_activity' => 'Yoga'
        ]);

        User::create([
            'name' => 'Antonio',
            'lastname' => 'Méndez',
            'email' => 'antonio.mendez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 7,
            'diseases' => 'allergies',
            'physical_activity' => 'Swimming'
        ]);

        User::create([
            'name' => 'Patricia',
            'lastname' => 'Cruz',
            'email' => 'patricia.cruz@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 8,
            'diseases' => 'none',
            'physical_activity' => 'Cycling'
        ]);

        User::create([
            'name' => 'Andrés',
            'lastname' => 'Vega',
            'email' => 'andres.vega@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 9,
            'diseases' => 'asthma',
            'physical_activity' => 'Running'
        ]);

        User::create([
            'name' => 'Laura',
            'lastname' => 'Navarro',
            'email' => 'laura.navarro@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 6,
            'diseases' => 'none',
            'physical_activity' => 'Hiking'
        ]);

        User::create([
            'name' => 'Francisco',
            'lastname' => 'Rojas',
            'email' => 'francisco.rojas@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'diabetes',
            'physical_activity' => 'Dancing'
        ]);

        User::create([
            'name' => 'Clara',
            'lastname' => 'Iglesias',
            'email' => 'clara.iglesias@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 8,
            'diseases' => 'hypertension',
            'physical_activity' => 'Running'
        ]);

        User::create([
            'name' => 'Miguel',
            'lastname' => 'Ortega',
            'email' => 'miguel.ortega@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'admin',
            'sleep_hours' => 5,
            'diseases' => 'allergies',
            'physical_activity' => 'Yoga'
        ]);

        User::create([
            'name' => 'Daniela',
            'lastname' => 'Reyes',
            'email' => 'daniela.reyes@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'none',
            'physical_activity' => 'Cycling'
        ]);
    }
}
