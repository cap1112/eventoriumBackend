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
            'users_id' => 1,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 2,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 3,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 4,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 5,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 6,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 7,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 8,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 9,
            'events_id' => 1
        ]);

        UsersEvent::create([
            'users_id' => 10,
            'events_id' => 1
        ]);

    }
}
