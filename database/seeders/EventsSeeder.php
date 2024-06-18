<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Event::create(['title' => 'Quiz', 'start' => '2024-03-17', 'end' => '2024-04-17', 'startTime' => '09:45:32', 'endTime' => '18:20:24', 'image' => "https://source.unsplash.com/random", 'description' => 'Quiz sobre los procesos de pruebas de desarrollo de software.', 'state' => 'Activo', 'category_id' => '3']);
        Event::create(['title' => 'ExpoMedia', 'start' => '2024-05-28', 'end' => '2024-05-31', 'startTime' => '08:00:00', 'endTime' => '23:00:00', 'image' => "https://source.unsplash.com/random", 'description' => 'La Expomedia.', 'state' => 'Inactivo', 'category_id' => '1']);
        Event::create(['title' => 'Entrega Proyecto 02', 'start' => '2024-06-28', 'end' => '2024-06-28', 'startTime' => '10:38:50', 'endTime' => '22:24:00', 'image' => "https://source.unsplash.com/random", 'description' => 'Fecha de la entrega del proyecto 02', 'state' => 'Activo', 'category_id' => '2']);
        Event::create(['title' => 'Vacaciones', 'start' => '2024-07-01', 'end' => '2024-07-14', 'startTime' => '00:00:00', 'endTime' => '23:59:59', 'image' => "https://source.unsplash.com/random", 'description' => 'Salidas de vacaciones', 'state' => 'Activo', 'category_id' => '1']);
    }
}
