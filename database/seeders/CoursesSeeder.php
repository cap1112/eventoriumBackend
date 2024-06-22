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
            'name' => 'Desarrollo de Aplicaciones Interactivas I',
            'description' => 'Curso dedicado a la programación de páginas web y su funcionamiento interno, proporcionando una comprensión integral del desarrollo web y sus tecnologías subyacentes.',
            'initial' => 'TM-1100'
        ]);

        Course::create([
            'name' => 'Introducción a la Inteligencia Artificial',
            'description' => 'Curso que abarca los fundamentos de la inteligencia artificial y el aprendizaje automático, brindando una base sólida en técnicas y aplicaciones clave en IA.',
            'initial' => 'TM-1200'
        ]);

        Course::create([
            'name' => 'Bases de Datos Avanzadas',
            'description' => 'Curso sobre diseño, implementación y optimización de bases de datos complejas, enfocándose en técnicas avanzadas para el manejo eficiente de grandes volúmenes de datos.',
            'initial' => 'TM-1300'
        ]);

        Course::create([
            'name' => 'Desarrollo de Aplicaciones Móviles',
            'description' => 'Curso centrado en la creación de aplicaciones móviles para plataformas Android y iOS, abarcando desde el diseño de interfaces hasta la implementación de funcionalidades avanzadas.',
            'initial' => 'TM-1400'
        ]);

        Course::create([
            'name' => 'Fundamentos de la Ciberseguridad',
            'description' => 'Curso enfocado en los principios de la seguridad informática y la protección de datos, incluyendo técnicas de prevención y respuesta ante amenazas cibernéticas.',
            'initial' => 'TM-1500'
        ]);

        Course::create([
            'name' => 'Programación en Python',
            'description' => 'Curso completo sobre programación en Python, abarcando desde conceptos básicos hasta técnicas avanzadas de desarrollo y aplicaciones prácticas.',
            'initial' => 'TM-1600'
        ]);

        Course::create([
            'name' => 'Desarrollo de Juegos en Unity',
            'description' => 'Curso diseñado para enseñar la creación de videojuegos utilizando el motor Unity, incluyendo diseño, programación y optimización de juegos.',
            'initial' => 'TM-1700'
        ]);

        Course::create([
            'name' => 'Diseño de Interfaces de Usuario (UI/UX)',
            'description' => 'Curso sobre cómo diseñar interfaces de usuario atractivas y fáciles de usar, centrado en principios de diseño, usabilidad y experiencia de usuario.',
            'initial' => 'TM-1800'
        ]);

        Course::create([
            'name' => 'Computación en la Nube',
            'description' => 'Curso que cubre los conceptos y aplicaciones de la computación en la nube, incluyendo servicios, arquitecturas y estrategias de implementación en entornos cloud.',
            'initial' => 'TM-1900'
        ]);

        Course::create([
            'name' => 'Análisis de Datos con R',
            'description' => 'Curso sobre cómo utilizar el lenguaje R para el análisis y visualización de datos, proporcionando técnicas y herramientas para la gestión y análisis de datos complejos.',
            'initial' => 'TM-2100'
        ]);
    }
}
