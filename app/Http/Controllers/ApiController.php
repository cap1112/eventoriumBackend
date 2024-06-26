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

use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //Lista de Eventos para el calendario por Cursos de un Usuario
    public function userEventCalendar($id)
    {
        $userEventCalendar = Event::select(
            'events.id as id',
            'events.title as title',
            DB::raw("CONCAT(events.start, 'T', events.startTime) as start"),
            DB::raw("CONCAT(events.end, 'T', events.endTime) as end"),
            'events.description as description',
            'events.state as state',
            'events.categories_id as category_id',
            'categories.name as category_name',
            DB::raw("CONCAT('EventDetails/', events.id) as url"),
            'events.courses_id as course_id',
            'users_courses.user_id as user_id'
        )
        ->join('categories', 'events.categories_id', '=', 'categories.id')
        ->join('users_courses', 'events.courses_id', '=', 'users_courses.course_id')
        ->where('users_courses.user_id', $id)
        ->get();

        return $userEventCalendar;
    }

    //Detalles de Evento por Cursos de un Usuario    
    public function userCourseEvents($id)
    {
        $userCourseEvents = Event::select(
            'events.id as id',
            'events.id as event_id',
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
            'courses.initial as course_initial',
            'users_courses.user_id as user_id',
            'users.name as user_name',
        )
        ->join('categories', 'events.categories_id', '=', 'categories.id')
        ->join('courses', 'events.courses_id', '=', 'courses.id')
        ->join('users_courses', 'events.courses_id', '=', 'users_courses.course_id')
        ->join('users', 'users_courses.user_id', '=', 'users.id')
        ->where('users_courses.user_id', $id)
        ->get();

        foreach ($userCourseEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $userCourseEvents;
    }

    //Detalles de Evento de un Evento en especifico
    public function userCourseEventDetail($id)
    {
        $userCourseEventDetail = Event::select(
            'events.id as event_id',
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
            'courses.initial as course_initial',
        )
        ->join('categories', 'events.categories_id', '=', 'categories.id')
        ->join('courses', 'events.courses_id', '=', 'courses.id')
        ->where('events.id', $id)
        ->get();

        foreach ($userCourseEventDetail as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }

        return $userCourseEventDetail;
    }

    public function userEvent($idEvent, $idUser) {

        $userEvent = UsersEvent::select(
            'users_events.id as id',
            'users_events.user_id as user_id',
            'users_events.event_id as event_id',
            'users_events.state as state',
            'events.startTime as event_time_start',
            'events.endTime as event_time_end',
            'courses.initial as course_initial',
        )
        ->join('events', 'users_events.event_id', '=', 'events.id')
        ->join('courses', 'events.courses_id', '=', 'courses.id')
        ->where('users_events.user_id', $idUser)
        ->where('users_events.event_id', $idEvent)
        ->get();

        foreach ($userEvent as $EventDetail) {
            Carbon::setLocale('es');
            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }

        return $userEvent;
    }

    public function userEventsIncomplete($id){

        $userEventsIncomplete = UsersEvent::select(
            'users_events.id as id',
            'users_events.user_id as user_id',
            'users_events.event_id as event_id',
            'users_events.state as state',
        )
        ->where('users_events.user_id', $id)
        ->where('users_events.state', 2)
        ->get();

        return $userEventsIncomplete;
    }

    public function userEventsComplete($id){

        $userEventsComplete = UsersEvent::select(
            'users_events.id as id',
            'users_events.user_id as user_id',
            'users_events.event_id as event_id',
            'users_events.state as state',
        )
        ->where('users_events.user_id', $id)
        ->where('users_events.state', 1)
        ->get();

        return $userEventsComplete;
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
            'password' => Hash::make($request->password),
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


    public function userlogIn(Request $request)
    {

        $user = User::select('email', 'password')->where('email', $request->user)->first();
        if (!Hash::check($request->password, $user->password)) {
            return response(['message' => 'Invalid credentials']);
        }
        $user = User::select('id')->where('email', $request->user)->first();
        $token = $user->createToken('Token')->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user
        ]);
    }

    public function token(Request $request)
    {
        $user = $request->user();
        $user->image_url = url('storage/users_img/' . $user->image);

        return response()->json(
            $user
        );
    }


    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $user->save($request->all());

        return response()->json(
            $user
        );
    }

    public function userEnrollCourses($id)
    {
        $registeredCourses = UsersCourse::select(
            'users_courses.id as id',
            'users_courses.user_id as user_id',
            'users_courses.course_id as course_id',
            'courses.initial as initial'
        )
            ->join('courses', 'courses.id', '=', 'users_courses.course_id')
            ->where('users_course.user_id', $id)
            ->get();
        
        return response()->json(
            $registeredCourses
        );
    }
}