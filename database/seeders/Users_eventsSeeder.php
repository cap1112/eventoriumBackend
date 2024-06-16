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
        //
        UsersEvent::create([
            'user_id' => 1,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 2,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 3,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 4,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 5,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 6,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 7,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 8,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 9,
            'event_id' => 1
        ]);

        UsersEvent::create([
            'user_id' => 10,
            'event_id' => 1
        ]);
    }
}
