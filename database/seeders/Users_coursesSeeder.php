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
        //
        UsersCourse::create([
            'users_id'=>2,
            'courses_id'=>5
        ]);

        UsersCourse::create([
            'users_id' => 1,
            'courses_id' => 1
        ]);

        UsersCourse::create([
            'users_id' => 2,
            'courses_id' => 9
        ]);

        UsersCourse::create([
            'users_id' => 3,
            'courses_id' => 10
        ]);

        UsersCourse::create([
            'users_id' => 4,
            'courses_id' => 4
        ]);

        UsersCourse::create([
            'users_id' => 5,
            'courses_id' => 5
        ]);

        UsersCourse::create([
            'users_id' => 6,
            'courses_id' => 1
        ]);

        UsersCourse::create([
            'users_id' => 7,
            'courses_id' => 2
        ]);

        UsersCourse::create([
            'users_id' => 8,
            'courses_id' => 3
        ]);

        UsersCourse::create([
            'users_id' => 9,
            'courses_id' => 4
        ]);

        UsersCourse::create([
            'users_id' => 10,
            'courses_id' => 5
        ]);


    }
}
