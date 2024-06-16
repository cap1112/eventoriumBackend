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
            'event_id'=>1,
            'course_id'=>9
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 8
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 5
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 7
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 4
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 1
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 2
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 3
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 6
        ]);

        EventsCourse::create([
            'event_id' => 1,
            'course_id' => 5
        ]);
    }
}
