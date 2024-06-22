<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsersCourse;

class Users_coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        UsersCourse::create([
            'user_id' => 1,
            'course_id' => 1,
        ]);

        UsersCourse::create([
            'user_id' => 1,
            'course_id' => 2,
        ]);

        UsersCourse::create([
            'user_id' => 2,
            'course_id' => 3,
        ]);

        UsersCourse::create([
            'user_id' => 2,
            'course_id' => 4,
        ]);

        UsersCourse::create([
            'user_id' => 3,
            'course_id' => 5,
        ]);

        UsersCourse::create([
            'user_id' => 3,
            'course_id' => 6,
        ]);

        UsersCourse::create([
            'user_id' => 4,
            'course_id' => 7,
        ]);

        UsersCourse::create([
            'user_id' => 4,
            'course_id' => 8,
        ]);

        UsersCourse::create([
            'user_id' => 5,
            'course_id' => 9,
        ]);

        UsersCourse::create([
            'user_id' => 5,
            'course_id' => 10,
        ]);

    }
}
