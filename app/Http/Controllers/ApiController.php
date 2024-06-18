<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Course;
use App\Models\Event;
use App\Models\EventsCourse;
use App\Models\User;
use App\Models\UsersCourse;
use App\Models\UsersEvent;

class ApiController extends Controller
{
    //Lista de Categorias
    public function categoryList()
    {
        //
        $category = Category::select(
            'id',
            'name'
        )
        ->get();

        return $category;
    }

    //Categoria en especifico
    public function categoryDetail($id)
    {
        //
        $category = Category::select(
            'id',
            'name'
        )
        ->where('id', $id)
        ->get();

        return $category;
    }

    //Lista de Cursos
    public function courseList()
    {
        //
        $course = Course::select(
            'id',
            'name',
            'description',
        )
        ->get();

        return $course;
    }

    //Curso en especifico
    public function courseDetail($id)
    {
        //
        $course = Course::select(
            'id',
            'name',
            'description',
        )
        ->where('id', $id)
        ->get();

        return $course;
    }

    //Lista de Eventos
    public function eventList()
    {
        //
        $event = Event::select(
            'events.id as id',
            'events.title as title',
            'events.description as description',
            'events.state as state',
            'events.start as start',
            'events.end as end',
            'events.startTime as startTime',
            'events.endTime as endTime',
            'events.image as image',
            'events.categories_id as category_id',
            'categories.name as category_name',
        )
        ->join('categories', 'events.categories_id', '=', 'categories.id')
        ->get();

        return $event;
    }

    //Evento en especifico
    public function eventDetail($id)
    {
        //

        $event = Event::select(
            'events.id as id',
            'events.title as title',
            'events.description as description',
            'events.state as state',
            'events.start as start',
            'events.end as end',
            'events.startTime as startTime',
            'events.endTime as endTime',
            'events.image as image',
            'events.categories_id as category_id',
            'categories.name as category_name',
        )
        ->join('categories', 'events.categories_id', '=', 'categories.id')
        ->where('events.id', $id)
        ->get();

        return $event;
    }

    //Lista de Usuarios
    public function userList()
    {
        //
        $user = User::select(
            'id',
            'name',
            'lastname',
            'email',
            'password',
            'profile',
            'sleep_hours',
            'diseases',
            'physical_activity'
        )
        ->get();

        return $user;
    }

    //Usuario en especifico
    public function userDetail($id)
    {
        //
        $user = User::select(
            'id',
            'name',
            'lastname',
            'email',
            'password',
            'profile',
            'sleep_hours',
            'diseases',
            'physical_activity'
        )
        ->where('id', $id)
        ->get();

        return $user;
    }

    //Lista de Eventos por Cursos
    public function eventCourses()
    {
        $eventCourse = EventsCourse::select(
            'events_courses.id as id',
            'events_courses.event_id as event_id',
            'events_courses.course_id as course_id',
            'events.title as event_type',
            'courses.name as course_name',
        )
        ->join('events', 'events_courses.event_id', '=', 'events.id')
        ->join('courses', 'events_courses.course_id', '=', 'courses.id')
        ->get();

        return $eventCourse;
    }

    //Lista de Eventos por Curso, en especifico de un Curso
    public function eventCourses_Course($id)
    {
        $eventCourses = EventsCourse::select(
            'events_courses.id as id',
            'events_courses.course_id as course_id',
            'courses.name as course_name',
            'events_courses.event_id as event_id',
            'events.title as event_type',
        )
        ->join('events', 'events_courses.event_id', '=', 'events.id')
        ->join('courses', 'events_courses.course_id', '=', 'courses.id')
        ->where('events_courses.course_id', $id)
        ->get();
        
        return $eventCourses;    
    }

    //Lista de Eventos por Curso, en especifico de un Evento
    public function eventCourses_Event($id)
    {
        $eventCourses = EventsCourse::select(
            'events_courses.id as id',
            'events_courses.event_id as event_id',
            'events.title as event_type',
            'events_courses.course_id as course_id',
            'courses.name as course_name',
        )
        ->join('events', 'events_courses.event_id', '=', 'events.id')
        ->join('courses', 'events_courses.course_id', '=', 'courses.id')
        ->where('events_courses.event_id', $id)
        ->get();
        
        return $eventCourses;    
    }
    
    //Lista de Usuarios por Cursos
    public function usersCourses()
    {
        $userCourses = UsersCourse::select(
            'users_courses.id as id',
            'users_courses.user_id as user_id',
            'users.name as user_name',
            'users.lastname as user_lastname',
            'users_courses.course_id as course_id',
            'courses.name as course_name',
        )
        ->join('users', 'users_courses.user_id', '=', 'users.id')
        ->join('courses', 'users_courses.course_id', '=', 'courses.id')
        ->get();

        return $userCourses;
    }

        //Lista de Usuarios por Cursos, en especifico de un Curso
        public function usersCourses_Course($id)
        {
            $usersCourses = UsersCourse::select(
                'users_courses.id as id',
                'users_courses.course_id as course_id',
                'courses.name as course_name',
                'users_courses.user_id as user_id',
                'users.name as user_name',
                'users.lastname as user_lastname',
            )
            ->join('users', 'users_courses.user_id', '=', 'users.id')
            ->join('courses', 'users_courses.course_id', '=', 'courses.id')
            ->where('users_courses.course_id', $id)
            ->get();
            
            return $usersCourses;    
        }

        //Lista de Usuarios por Cursos, en especifico de un Usuario
        public function usersCourses_User($id)
        {
            $usersCourses = UsersCourse::select(
                'users_courses.id as id',
                'users_courses.user_id as user_id',
                'users.name as user_name',
                'users.lastname as user_lastname',
                'users_courses.course_id as course_id',
                'courses.name as course_name',
            )
            ->join('users', 'users_courses.user_id', '=', 'users.id')
            ->join('courses', 'users_courses.course_id', '=', 'courses.id')
            ->where('users_courses.user_id', $id)
            ->get();
            
            return $usersCourses;    
        }

        //Lista de Usuarios por Evento
        public function usersEvents()
        {
            $userEvents = UsersEvent::select(
                'users_events.id as id',
                'users_events.user_id as user_id',
                'users.name as user_name',
                'users.lastname as user_lastname',
                'users_events.event_id as event_id',
                'events.title as event_type',
            )
            ->join('users', 'users_events.user_id', '=', 'users.id')
            ->join('events', 'users_events.event_id', '=', 'events.id')
            ->get();

            return $userEvents;
        }

        //Lista de Usuarios por Evento, en especifico de un Evento
        public function usersEvents_Event($id)
        {
            $usersEvents = UsersEvent::select(
                'users_events.id as id',
                'users_events.event_id as event_id',
                'events.title as event_type',
                'users_events.user_id as user_id',
                'users.name as user_name',
                'users.lastname as user_lastname',
            )
            ->join('users', 'users_events.user_id', '=', 'users.id')
            ->join('events', 'users_events.event_id', '=', 'events.id')
            ->where('users_events.event_id', $id)
            ->get();
            
            return $usersEvents;    
        }

        //Lista de Usuarios por Evento, en especifico de un Usuario
        public function usersEvents_User($id)
        {
            $usersEvents = UsersEvent::select(
                'users_events.id as id',
                'users_events.user_id as user_id',
                'users.name as user_name',
                'users.lastname as user_lastname',
                'users_events.event_id as event_id',
                'events.title as event_type',
            )
            ->join('users', 'users_events.user_id', '=', 'users.id')
            ->join('events', 'users_events.event_id', '=', 'events.id')
            ->where('users_events.user_id', $id)
            ->get();
            
            return $usersEvents;    
        }
}