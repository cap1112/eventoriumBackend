<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name' => 'Evento',
        ]);

        Category::create([
            'name' => 'Tarea',
        ]);

        Category::create([
            'name' => 'Comunicado',
        ]);
    }
}
