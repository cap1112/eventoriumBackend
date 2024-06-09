<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create([
            'name'=>'Desarrollo de aplicaciones Interactivas','description'=>"Es un curso de programación de pagimas web y su funcionamiento interno"
        ]);
        
        Course::create([
            'name' => 'Introducción a la Inteligencia Artificial',
            'description' => 'Un curso que abarca los fundamentos de la inteligencia artificial y el aprendizaje automático'
        ]);

        Course::create([
            'name' => 'Bases de Datos Avanzadas',
            'description' => 'Curso sobre diseño, implementación y optimización de bases de datos complejas'
        ]);

        Course::create([
            'name' => 'Desarrollo de Aplicaciones Móviles',
            'description' => 'Este curso se centra en la creación de aplicaciones móviles para Android y iOS'
        ]);

        Course::create([
            'name' => 'Fundamentos de la Ciberseguridad',
            'description' => 'Curso enfocado en los principios de la seguridad informática y protección de datos'
        ]);

        Course::create([
            'name' => 'Programación en Python',
            'description' => 'Un curso completo sobre programación en Python, desde lo básico hasta lo avanzado'
        ]);

        Course::create([
            'name' => 'Desarrollo de Juegos en Unity',
            'description' => 'Aprende a crear videojuegos usando el motor de juegos Unity'
        ]);

        Course::create([
            'name' => 'Diseño de Interfaces de Usuario (UI/UX)',
            'description' => 'Curso sobre cómo diseñar interfaces de usuario atractivas y fáciles de usar'
        ]);

        Course::create([
            'name' => 'Computación en la Nube',
            'description' => 'Este curso cubre los conceptos y aplicaciones de la computación en la nube'
        ]);

        Course::create([
            'name' => 'Análisis de Datos con R',
            'description' => 'Curso sobre cómo utilizar el lenguaje R para el análisis y visualización de datos'
        ]);
    }
}
