<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventsCategory;

class Events_categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        EventsCategory::create([
            'category_id'=>1,
            'event_id'=>1
        ]);

        EventsCategory::create([
            'category_id'=>2,
            'event_id'=>2
        ]);

        EventsCategory::create([
            'category_id'=>3,
            'event_id'=>3
        ]);

        EventsCategory::create([
            'category_id'=>3,
            'event_id'=>4
        ]);
    }
}
