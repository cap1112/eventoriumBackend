<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Translation\Translator;
use Illuminate\Translation\ArrayLoader;

use Carbon\Carbon;

use App\Models\Category;
use App\Models\Course;
use App\Models\Event;
use App\Models\EventsCourse;
use App\Models\User;
use App\Models\UsersCourse;
use App\Models\UsersEvent;

class ApiController extends Controller
{

    //APs de base, los hice como guia para cuando quiero sacar ya un api en especifico,    
    //se eliminaran una vez estemos seguros tenemos todos los que ocupemos

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

    //Lista de todos los Eventos para Calendario
    public function eventCalendar()
    {
        //
        $event = Event::select(
            'events.id as id',
            'events.title as title',
            DB::raw("CONCAT(events.start, 'T', events.startTime) as start"),
            DB::raw("CONCAT(events.end, 'T', events.endTime) as end"),
            'events.description as description',
            'events.state as state',
            'events.categories_id as category_id',
            'categories.name as category_name',
            DB::raw("CONCAT('Homepage/EventDetail/', events.id) as url")
        )
            ->join('categories', 'events.categories_id', '=', 'categories.id')
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
            'image',
            'password',
            'profile',
            'sleep_hours',
            'diseases',
            'physical_activity'
        )
            ->get();

        return $user;
    }

    //Api para crear usuarios
    public function userStore(Request $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'password' => bcrypt($request->password),
            'sleep_hours' => $request->sleep_hours,
            'image' => $request->image,
            'diseases' => $request->diseases,
            'physical_activity' => $request->physical_activity,
        ]);
        
        $file = $request->file('image');
        $file_name = 'usuario_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/users_img', $file_name);
        
        $user->update([
            'image' => $file_name,
        ]);


        return redirect('http://localhost:5173/SignIn');
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
            'image',
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
            'events.title as event_name',
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
            'events.title as event_name',
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
            'events.title as event_name',
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

    //Lista de Eventos de Usuario por Cursos, de un Usuario 
    public function userEvents($id)
    {
        $usersCourses = UsersCourse::select(
            'users_courses.id as id',
            'users_courses.user_id as user_id',
            'users.name as user_name',
            'users.lastname as user_lastname',
            'users_courses.course_id as course_id',
            'courses.name as course_name',
            'events_courses.event_id as event_id',
            'events.title as event_name',
        )
            ->join('users', 'users_courses.user_id', '=', 'users.id')
            ->join('courses', 'users_courses.course_id', '=', 'courses.id')
            ->join('events_courses', 'users_courses.course_id', '=', 'events_courses.course_id')
            ->join('events', 'events_courses.event_id', '=', 'events.id')
            ->where('users_courses.user_id', $id)
            ->get();

        return $usersCourses;
    }


    //De aqui en adelante, son los apis que se estan dando un uso

    //Lista de Eventos para el calendario por Cursos de un Usuario
    public function userCourseEvents($id)
    {

        $userCourseEvents = EventsCourse::select(
            'events_courses.event_id as id',
            'events.title as title',
            DB::raw("CONCAT(events.start, 'T', events.startTime) as start"),
            DB::raw("CONCAT(events.end, 'T', events.endTime) as end"),
            'events.description as description',
            'events.state as state',
            'events.categories_id as category_id',
            'categories.name as category_name',
            DB::raw("CONCAT('EventDetails/', events.id, '/', users_courses.user_id) as url")
        )
            ->join('events', 'events_courses.event_id', '=', 'events.id')
            ->join('users_courses', 'events_courses.course_id', '=', 'users_courses.course_id')
            ->join('categories', 'events.categories_id', '=', 'categories.id')
            ->where('users_courses.user_id', $id)
            ->get();

        return $userCourseEvents;
    }

    //Detalles de Evento por Cursos de un Usuario    
    public function userCourseEventsDetail($id)
    {

        $userCourseEventsDetail = EventsCourse::select(
            'events_courses.event_id as id',
            'events.title as event_name',
            'events.description as event_description',
            'events.start as event_date_start',
            'events.end as event_date_end',
            'events.start as event_date_start_short',
            'events.end as event_date_end_short',
            'events.startTime as event_time_start',
            'events.endTime as event_time_end',
            'events.image as event_image',
            'events.state as event_state',
            'categories.name as category_name',
            'courses.name as course_name',
            'users_courses.user_id as user_id',
            'users.name as user_name',
        )
            ->join('events', 'events_courses.event_id', '=', 'events.id')
            ->join('users_courses', 'events_courses.course_id', '=', 'users_courses.course_id')
            ->join('categories', 'events.categories_id', '=', 'categories.id')
            ->join('courses', 'events_courses.course_id', '=', 'courses.id')
            ->join('users', 'users_courses.user_id', '=', 'users.id')
            ->where('users_courses.user_id', $id)
            ->get();

        foreach ($userCourseEventsDetail as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $userCourseEventsDetail;
    }

    //Detalles de Evento de un Evento en especifico
    public function userCourseEventsDetail_Event($id)
    {

        $userCourseEventsDetail_Event = EventsCourse::select(
            'events_courses.event_id as id',
            'events.title as event_name',
            'events.description as event_description',
            'events.start as event_date_start',
            'events.end as event_date_end',
            'events.start as event_date_start_short',
            'events.end as event_date_end_short',
            'events.startTime as event_time_start',
            'events.endTime as event_time_end',
            'events.image as event_image',
            'events.state as event_state',
            'categories.name as category_name',
            'courses.name as course_name',
        )
            ->join('events', 'events_courses.event_id', '=', 'events.id')
            ->join('categories', 'events.categories_id', '=', 'categories.id')
            ->join('courses', 'events_courses.course_id', '=', 'courses.id')
            ->where('events.id', $id)
            ->get();

        foreach ($userCourseEventsDetail_Event as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }

        return $userCourseEventsDetail_Event;
    }
}