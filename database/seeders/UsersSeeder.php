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
            'username' => 'gustavo_acosta',
            'email' => 'gustavo.acosta@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 7,
            'diseases' => 'Asma',
            'physical_activity' => 'Moderado',
            'image' => 'usuario_1.jpg'
        ]);

        User::create([
            'name' => 'María',
            'lastname' => 'González',
            'username' => 'maria_gonzalez',
            'email' => 'maria.gonzalez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 6,
            'diseases' => 'Hipertension',
            'physical_activity' => 'Sedentario',
            'image' => 'usuario_2.jpg'
        ]);

        User::create([
            'name' => 'Carlos',
            'lastname' => 'Ramírez',
            'username' => 'carlos_ramirez',
            'email' => 'carlos.ramirez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 8,
            'diseases' => 'Diabetes',
            'physical_activity' => 'Activo',
            'image' => 'usuario_3.jpg'
        ]);

        User::create([
            'name' => 'Lucía',
            'lastname' => 'Martínez',
            'username' => 'lucia.martinez',
            'email' => 'lucia.martinez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'estudiante',
            'sleep_hours' => 5,
            'diseases' => 'Hipertension',
            'physical_activity' => 'Activo',
            'image' => 'usuario_4.jpg'
        ]);

        User::create([
            'name' => 'Diego',
            'lastname' => 'Hernández',
            'username' => 'diego.hernandez',
            'email' => 'diego.hernandez@example.com',
            'password' => bcrypt('contraseña_ejemplo'),
            'profile' => 'profesor',
            'sleep_hours' => 7,
            'diseases' => 'Ninguna',
            'physical_activity' => 'Activo',
            'image' => 'usuario_5.jpg'
        ]);

        User::create([
            'name' => 'admin',
            'lastname' => 'eventorium',
            'username' => 'admin_2024',
            'email' => 'admin@eventorium.com',
            'password' => bcrypt('admin'),
            'profile' => 'admin',
            'sleep_hours' => 0,
            'diseases' => 'Obesidad',
            'physical_activity' => 'Sedentario',
            'image' => 'usuario_6.jpg'
        ]);
    }
}
