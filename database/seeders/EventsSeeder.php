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
        Event::create(['name' => 'quiz', 'image' => "https://source.unsplash.com/random", 'date' => '2024-03-17', 'hour' => '09:45:32', 'description' => 'quiz sobre los procesos de pruebas de desarrollo de software', 'state' => 'Activo', 'label' => 'Evento']);
    }
}
