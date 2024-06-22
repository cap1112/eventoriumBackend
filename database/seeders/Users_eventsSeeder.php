<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\UsersEvent;

class Users_eventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // 1 Completado
        // 2 No_Completado
        // 3 No_Aplica
        
        UsersEvent::create([
            'user_id' => 1,
            'event_id' => 1,
            'state' => 'Completado'
        ]);

        UsersEvent::create([
            'user_id' => 1,
            'event_id' => 2,
            'state' => 'Completado'
        ]);

        UsersEvent::create([
            'user_id' => 1,
            'event_id' => 3,
            'state' => 'No_Completado'
        ]);

        UsersEvent::create([
            'user_id' => 1,
            'event_id' => 4,
            'state' => 'No_Aplica'
        ]);

        UsersEvent::create([
            'user_id' => 2,
            'event_id' => 5,
            'state' => 'Completado'
        ]);

        UsersEvent::create([
            'user_id' => 2,
            'event_id' => 6,
            'state' => 'No_Aplica'
        ]);

        UsersEvent::create([
            'user_id' => 2,
            'event_id' => 7,
            'state' => 'No_Completado'
        ]);

        UsersEvent::create([
            'user_id' => 2,
            'event_id' => 8,
            'state' => 'No_Aplica'
        ]);        

        UsersEvent::create([
            'user_id' => 3,
            'event_id' => 9,
            'state' => 'No_Completado'
        ]);

        UsersEvent::create([
            'user_id' => 3,
            'event_id' => 10,
            'state' => 'No_Completado'
        ]);

        UsersEvent::create([
            'user_id' => 3,
            'event_id' => 11,
            'state' => 'Completado'
        ]);

        UsersEvent::create([
            'user_id' => 3,
            'event_id' => 12,
            'state' => 'No_Completado'
        ]);

        UsersEvent::create([
            'user_id' => 4,
            'event_id' => 13,
            'state' => 'Completado'
        ]);

        UsersEvent::create([
            'user_id' => 4,
            'event_id' => 14,
            'state' => 'No_Aplica'
        ]);

        UsersEvent::create([
            'user_id' => 4,
            'event_id' => 15,
            'state' => 'Completado'
        ]);

        UsersEvent::create([
            'user_id' => 4,
            'event_id' => 16,
            'state' => 'No_Aplica'
        ]);

        UsersEvent::create([
            'user_id' => 5,
            'event_id' => 17,
            'state' => 'No_Completado'
        ]);

        UsersEvent::create([
            'user_id' => 5,
            'event_id' => 18,
            'state' => 'Completado'
        ]);

        UsersEvent::create([
            'user_id' => 5,
            'event_id' => 19,
            'state' => 'No_Completado'
        ]);

        UsersEvent::create([
            'user_id' => 5,
            'event_id' => 20,
            'state' => 'No_Aplica'
        ]);
        
    }
}
