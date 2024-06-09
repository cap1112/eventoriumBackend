<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventsCourse;

class Events_coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        EventsCourse::create([
            'events_id'=>1,
            'courses_id'=>9
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 8
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 5
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 7
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 4
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 1
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 2
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 3
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 6
        ]);

        EventsCourse::create([
            'events_id' => 1,
            'courses_id' => 5
        ]);
    }
}
