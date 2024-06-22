<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Workshop sobre Desarrollo de Aplicaciones Interactivas',
            'start' => '2024-07-10',
            'end' => '2024-07-10',
            'startTime' => '09:00:00',
            'endTime' => '17:00:00',
            'image' => 'event_1.jpg',
            'description' => 'Este workshop intensivo ofrece una inmersión en el desarrollo de aplicaciones interactivas. Los participantes aprenderán a utilizar herramientas y frameworks modernos para crear interfaces de usuario atractivas y dinámicas. Se cubrirán temas como React, Vue.js, y animaciones avanzadas en CSS.',
            'state' => 'Activo',
            'categories_id' => '1',  // Evento
            'courses_id' => '1',
        ]);
        
        Event::create([
            'title' => 'Tarea sobre Desarrollo de Aplicaciones Interactivas',
            'start' => '2024-06-15',
            'end' => '2024-06-20',
            'startTime' => '09:00:00',
            'endTime' => '17:00:00',
            'image' => 'event_2.jpg',
            'description' => 'Esta tarea tiene como objetivo que los estudiantes apliquen los conocimientos adquiridos en el desarrollo de aplicaciones interactivas. Los participantes deberán desarrollar una pequeña aplicación web que incluya interactividad avanzada, utilizando las tecnologías discutidas en clase. Se evaluará la funcionalidad, la experiencia del usuario y la calidad del código.',
            'state' => 'Inactivo',
            'categories_id' => '2',  // Tarea
            'courses_id' => '1',
        ]);

        Event::create([
            'title' => 'Seminario sobre Introducción a la Inteligencia Artificial',
            'start' => '2024-07-20',
            'end' => '2024-07-20',
            'startTime' => '10:00:00',
            'endTime' => '16:00:00',
            'image' => 'event_3.jpg',
            'description' => 'Este seminario ofrece una visión general de los conceptos fundamentales de la inteligencia artificial. Los participantes explorarán las bases teóricas y prácticas de la IA, incluyendo algoritmos de aprendizaje automático, redes neuronales y aplicaciones en el mundo real. El seminario incluirá presentaciones, discusiones y actividades prácticas.',
            'state' => 'Activo',
            'categories_id' => '1',  // Evento
            'courses_id' => '2',
        ]);
        
        Event::create([
            'title' => 'Comunicado sobre Nuevas Herramientas en Introducción a la Inteligencia Artificial',
            'start' => '2024-06-15',
            'end' => '2024-06-15',
            'startTime' => '01:00:00',
            'endTime' => '23:00:00',
            'image' => 'event_4.jpg',
            'description' => 'Este comunicado informa a los estudiantes y profesionales sobre las nuevas herramientas disponibles para el estudio y la aplicación de la inteligencia artificial. Se destacan las últimas versiones de bibliotecas y frameworks de IA, así como recursos educativos actualizados. El comunicado tiene como objetivo mantener a la comunidad informada sobre las innovaciones y avances en el campo de la IA.',
            'state' => 'Inactivo',
            'categories_id' => '3',  // Comunicado
            'courses_id' => '2',
        ]);
     
        Event::create([
            'title' => 'Workshop sobre Bases de Datos Avanzadas',
            'start' => '2024-07-15',
            'end' => '2024-07-17',
            'startTime' => '09:00:00',
            'endTime' => '17:00:00',
            'image' => 'event_5.jpg',
            'description' => 'Este workshop intensivo se centra en el estudio y aplicación de técnicas avanzadas en bases de datos. Los participantes aprenderán sobre optimización de consultas, administración de bases de datos distribuidas y tecnologías emergentes en el ámbito de las bases de datos. Incluye sesiones prácticas y discusiones en profundidad sobre casos de uso reales.',
            'state' => 'Activo',
            'categories_id' => '1',  // Evento
            'courses_id' => '3',
        ]);
        
        Event::create([
            'title' => 'Comunicado sobre Actualizaciones en Bases de Datos Avanzadas',
            'start' => '2024-06-10',
            'end' => '2024-06-10',
            'startTime' => '01:00:00',
            'endTime' => '23:00:00',
            'image' => 'event_6.jpg',
            'description' => 'Este comunicado informa a la comunidad académica y profesional sobre las últimas actualizaciones y tendencias en el campo de las bases de datos avanzadas. Se abordan nuevas herramientas y tecnologías, así como mejoras en técnicas de almacenamiento y recuperación de datos. Este comunicado es esencial para quienes buscan mantenerse al día con los avances en esta área crucial de la tecnología de la información.',
            'state' => 'Inactivo',
            'categories_id' => '3',  // Comunicado
            'courses_id' => '3',
        ]);

        Event::create([
            'title' => 'Seminario sobre Desarrollo de Aplicaciones Móviles',
            'start' => '2024-07-10',
            'end' => '2024-07-12',
            'startTime' => '10:00:00',
            'endTime' => '16:00:00',
            'image' => 'event_7.jpg',
            'description' => 'Este seminario ofrece una inmersión completa en el desarrollo de aplicaciones móviles. Los participantes explorarán las mejores prácticas para crear aplicaciones en iOS y Android, utilizando herramientas y lenguajes modernos como Swift y Kotlin. También se discutirán temas como el diseño de interfaces de usuario, la gestión de estados y la integración con servicios web.',
            'state' => 'Activo',
            'categories_id' => '1',  // Evento
            'courses_id' => '4',
        ]);
        
        Event::create([
            'title' => 'Comunicado sobre Actualizaciones en Desarrollo de Aplicaciones Móviles',
            'start' => '2024-06-20',
            'end' => '2024-06-20',
            'startTime' => '01:00:00',
            'endTime' => '23:00:00',
            'image' => 'event_8.jpg',
            'description' => 'Este comunicado proporciona información actualizada sobre las últimas tendencias y herramientas en el desarrollo de aplicaciones móviles. Incluye detalles sobre nuevas versiones de sistemas operativos, herramientas de desarrollo y mejores prácticas recomendadas por la industria. Es una lectura obligada para desarrolladores que buscan mantenerse al día con los cambios rápidos en este campo.',
            'state' => 'Inactivo',
            'categories_id' => '3',  // Comunicado
            'courses_id' => '4',
        ]);

        Event::create([
            'title' => 'Tarea sobre Análisis de Vulnerabilidades',
            'start' => '2024-07-15',
            'end' => '2024-07-25',
            'startTime' => '10:00:00',
            'endTime' => '18:00:00',
            'image' => 'event_9.jpg',
            'description' => 'En esta tarea, los estudiantes deberán realizar un análisis detallado de vulnerabilidades en un sistema específico. Utilizando herramientas de escaneo y técnicas aprendidas en clase, deberán identificar posibles brechas de seguridad y proponer soluciones adecuadas para mitigarlas. Esta tarea fomenta el pensamiento crítico y la aplicación práctica de los conocimientos de ciberseguridad.',
            'state' => 'Activo',
            'categories_id' => '2',  // Tarea
            'courses_id' => '5',
        ]);

        Event::create([
            'title' => 'Tarea sobre Implementación de Políticas de Seguridad',
            'start' => '2024-06-10',
            'end' => '2024-06-20',
            'startTime' => '09:00:00',
            'endTime' => '17:00:00',
            'image' => 'event_10.jpg',
            'description' => 'Esta tarea tiene como objetivo que los estudiantes desarrollen e implementen políticas de seguridad efectivas para una organización ficticia. Deberán considerar diversos aspectos como el control de acceso, la protección de datos y la respuesta a incidentes. La tarea evaluará la capacidad de los estudiantes para diseñar estrategias de seguridad robustas y su conocimiento de los estándares de la industria.',
            'state' => 'Inactivo',
            'categories_id' => '2',  // Tarea
            'courses_id' => '5',
        ]);
        
        Event::create([
            'title' => 'Tarea sobre Programación Orientada a Objetos en Python',
            'start' => '2024-06-20',
            'end' => '2024-06-30',
            'startTime' => '09:00:00',
            'endTime' => '11:00:00',
            'image' => 'event_11.jpg',
            'description' => 'Esta tarea tiene como objetivo que los estudiantes apliquen conceptos de programación orientada a objetos (POO) en Python. Deberán diseñar y desarrollar clases y objetos que representen entidades del mundo real, aplicando conceptos como encapsulamiento, herencia y polimorfismo. La tarea evaluará la capacidad de los estudiantes para aplicar los principios de la POO en Python de manera efectiva y estructurada.',
            'state' => 'Activo',
            'categories_id' => '2',  // Tarea
            'courses_id' => '6',
        ]);

        Event::create([
            'title' => 'Seminario sobre Desarrollo Avanzado en Python',
            'start' => '2024-07-15',
            'end' => '2024-07-15',
            'startTime' => '10:00:00',
            'endTime' => '17:00:00',
            'image' => 'event_12.jpg',
            'description' => 'Este seminario está diseñado para estudiantes y profesionales que desean profundizar en el desarrollo avanzado en Python. Los participantes explorarán temas como programación funcional, manejo avanzado de excepciones, técnicas de optimización de rendimiento y el uso de bibliotecas populares. El seminario incluirá conferencias magistrales, demostraciones prácticas y discusiones interactivas.',
            'state' => 'Activo',
            'categories_id' => '1',  // Evento
            'courses_id' => '6',
        ]);

        Event::create([
            'title' => 'Webinar sobre Introducción al Desarrollo de Juegos en Unity',
            'start' => '2024-07-10',
            'end' => '2024-07-10',
            'startTime' => '10:00:00',
            'endTime' => '16:00:00',
            'image' => 'event_13.jpg',
            'description' => 'Este webinar proporciona una introducción completa al desarrollo de juegos utilizando el motor Unity. Los participantes aprenderán los conceptos básicos de la creación de escenarios, la programación de gameplay y el diseño de gráficos. Se cubrirán temas como física de juego, animaciones, efectos visuales y optimización para diferentes plataformas.',
            'state' => 'Activo',
            'categories_id' => '1',  // Evento
            'courses_id' => '7',
        ]);
        
        Event::create([
            'title' => 'Comunicado sobre Novedades en Desarrollo de Juegos en Unity',
            'start' => '2024-06-20',
            'end' => '2024-06-20',
            'startTime' => '01:00:00',
            'endTime' => '23:00:00',
            'image' => 'event_14.jpg',
            'description' => 'Este comunicado presenta las últimas novedades y actualizaciones en el desarrollo de juegos con Unity. Incluye detalles sobre nuevas funcionalidades del motor, mejoras en el rendimiento y casos de estudio de juegos exitosos desarrollados con Unity. Es esencial para desarrolladores de juegos y entusiastas que desean mantenerse al día con las tendencias en el campo del desarrollo de juegos.',
            'state' => 'Inactivo',
            'categories_id' => '3',  // Comunicado
            'courses_id' => '7',
        ]);

        Event::create([
            'title' => 'Taller Práctico de Prototipado en UI/UX',
            'start' => '2024-07-10',
            'end' => '2024-07-12',
            'startTime' => '10:00:00',
            'endTime' => '16:00:00',
            'image' => 'event_15.jpg',
            'description' => 'Este taller práctico está diseñado para que los participantes aprendan técnicas avanzadas de prototipado en UI/UX. Se cubrirán herramientas populares como Figma y Adobe XD, así como metodologías ágiles para el diseño iterativo de interfaces de usuario. Los participantes trabajarán en proyectos prácticos y recibirán retroalimentación en tiempo real para mejorar sus habilidades de diseño.',
            'state' => 'Activo',
            'categories_id' => '1',  // Evento
            'courses_id' => '8',
        ]);
        
        Event::create([
            'title' => 'Comunicado sobre Tendencias en Diseño de UI/UX',
            'start' => '2024-06-20',
            'end' => '2024-06-20',
            'startTime' => '01:00:00',
            'endTime' => '23:00:00',
            'image' => 'event_16.jpg',
            'description' => 'Este comunicado ofrece una visión actualizada de las tendencias emergentes en el diseño de interfaces de usuario (UI) y experiencia de usuario (UX). Se discutirán temas como el diseño centrado en el usuario, la accesibilidad, el diseño responsivo y las mejores prácticas en la creación de interfaces efectivas. Esencial para diseñadores y desarrolladores interesados en mantenerse al día con los avances en el campo del diseño digital.',
            'state' => 'Inactivo',
            'categories_id' => '3',  // Comunicado
            'courses_id' => '8',
        ]);

        Event::create([
            'title' => 'Tarea sobre Implementación de Servicios en la Nube',
            'start' => '2024-07-05',
            'end' => '2024-07-12',
            'startTime' => '14:00:00',
            'endTime' => '16:00:00',
            'image' => 'event_17.jpg',
            'description' => 'En esta tarea, los estudiantes implementarán diferentes servicios en la nube utilizando plataformas como AWS, Google Cloud o Azure. Se les pedirá configurar máquinas virtuales, almacenamiento en la nube, bases de datos y redes de manera segura y eficiente. La tarea evaluará la capacidad de los estudiantes para aplicar los conceptos aprendidos en el curso de Computación en la Nube en un entorno práctico.',
            'state' => 'Activo',
            'categories_id' => '2',  // Tarea
            'courses_id' => '9',
        ]);
        
        Event::create([
            'title' => 'Tarea sobre Seguridad en la Computación en la Nube',
            'start' => '2024-06-17',
            'end' => '2024-06-21',
            'startTime' => '09:00:00',
            'endTime' => '11:00:00',
            'image' => 'event_18.jpg',
            'description' => 'Esta tarea tiene como objetivo que los estudiantes investiguen y presenten estrategias de seguridad específicas para entornos de computación en la nube. Deberán abordar temas como la protección de datos, el control de acceso, la prevención de intrusiones y la gestión de identidades en un contexto de servicios en la nube. La tarea fomentará el análisis crítico y la aplicación de prácticas de seguridad efectivas.',
            'state' => 'Inactivo',
            'categories_id' => '2',  // Tarea
            'courses_id' => '9',
        ]);

        Event::create([
            'title' => 'Seminario Avanzado de Análisis de Datos con R',
            'start' => '2024-07-10',
            'end' => '2024-07-12',
            'startTime' => '10:00:00',
            'endTime' => '16:00:00',
            'image' => 'event_19.jpg',
            'description' => 'Este seminario avanzado está diseñado para analistas de datos y científicos que desean profundizar en el uso de R para análisis estadístico y visualización de datos. Se cubrirán temas como modelos predictivos, análisis de series temporales, visualización avanzada de datos y técnicas de machine learning con R. El seminario incluirá demostraciones prácticas y estudios de casos reales.',
            'state' => 'Activo',
            'categories_id' => '1',  // Evento
            'courses_id' => '10',
        ]);
        
        Event::create([
            'title' => 'Comunicado sobre Nuevas Funcionalidades en R para Análisis de Datos',
            'start' => '2024-06-20',
            'end' => '2024-06-20',
            'startTime' => '01:00:00',
            'endTime' => '23:00:00',
            'image' => 'event_20.jpg',
            'description' => 'Este comunicado presenta las nuevas funcionalidades y mejoras en el lenguaje R para análisis de datos. Incluye detalles sobre nuevas bibliotecas, técnicas avanzadas de modelado y visualización, y mejoras en el rendimiento. Es esencial para profesionales y estudiantes que utilizan R como herramienta principal para el análisis de datos y la investigación estadística.',
            'state' => 'Inactivo',
            'categories_id' => '3',  // Comunicado
            'courses_id' => '10',
        ]);
    }
}