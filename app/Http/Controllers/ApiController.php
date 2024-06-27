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

    //Returns the necessary data for reading the events in the fullCalendar from the frontpage
    public function userEventCalendar($id){
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

    //Event Details per Course of a User
    public function userCourseEvents($id){
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

    //Details of a specific Event 
    public function userCourseEventDetail($id){
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

    //Details of a specific events of a User
    public function userEvent($idEvent, $idUser){
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

    //returns the courses of a user
    public function userCourses($id){
        $userCourses = UsersCourse::select(
            'users_courses.user_id as user_id',
            'users_courses.course_id as course_id',
            'courses.initial as initial',
        )
            ->join('courses', 'courses.id', '=', 'users_courses.course_id')
            ->where('users_courses.user_id', $id)
            ->orderBy('users_courses.course_id', 'asc')
            ->get();

        return $userCourses;
    }

    //returns all the categories that are registered
    public function categories(){

        $categories = Category::select(
            'categories.id as id',
            'categories.name as name',
        )
            ->get();

        return $categories;
    }

    //Search the events of a user
    public function searchUserEvents($id)
    {
        $searchUserEvents = Event::select(
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

        foreach ($searchUserEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $searchUserEvents;
    }

    //Search the events of a user depending of the category
    public function searchUserEvents_Event($userId, $categoryName)
    {

        $searchUserEvents = Event::select(
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
            ->where('categories.name', $categoryName)
            ->where('users_courses.user_id', $userId)
            ->get();

        foreach ($searchUserEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $searchUserEvents;
    }

    //Search the events of a user depending of the initials of a course
    public function searchUserEvents_Course($userId, $courseInitial)
    {

        $searchUserEvents = Event::select(
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
            ->where('courses.initial', $courseInitial)
            ->where('users_courses.user_id', $userId)
            ->get();

        foreach ($searchUserEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $searchUserEvents;
    }

    //Search the events of a user depending of the category and the initials of a course
    public function searchUserEvents_Event_Course($userId, $categoryName, $courseInitial)
    {

        $searchUserEvents = Event::select(
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
            ->where('categories.name', $categoryName)
            ->where('courses.initial', $courseInitial)
            ->where('users_courses.user_id', $userId)
            ->get();

        foreach ($searchUserEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $searchUserEvents;
    }

    //Search the events of a user depending of the eventname
    public function searchUserEvents_Search($userId, $eventName)
    {

        $searchUserEvents = Event::select(
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
            ->where('events.title', 'like', '%' . $eventName . '%')
            ->where('users_courses.user_id', $userId)
            ->get();

        foreach ($searchUserEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $searchUserEvents;
    }

    //Search the events of a user depending of the eventname, and categories
    public function searchUserEvents_Search_Event($userId, $eventName, $categoryName)
    {

        $searchUserEvents = Event::select(
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
            ->where('events.title', 'like', '%' . $eventName . '%')
            ->where('categories.name', $categoryName)
            ->where('users_courses.user_id', $userId)
            ->get();

        foreach ($searchUserEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $searchUserEvents;
    }

    //Search the events of a user depending of the eventname, and course's in
    public function searchUserEvents_Search_Course($userId, $eventName, $courseInitial)
    {

        $searchUserEvents = Event::select(
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
            ->where('events.title', 'like', '%' . $eventName . '%')
            ->where('courses.initial', $courseInitial)
            ->where('users_courses.user_id', $userId)
            ->get();

        foreach ($searchUserEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $searchUserEvents;
    }

    //Searches for events based on user ID, event name, category name, and course initial.
    public function searchUserEvents_Search_Event_Course($userId, $eventName, $categoryName, $courseInitial)
    {
        $searchUserEvents = Event::select(
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
            ->where('events.title', 'like', '%' . $eventName . '%')
            ->where('categories.name', $categoryName)
            ->where('courses.initial', $courseInitial)
            ->where('users_courses.user_id', $userId)
            ->get();

        foreach ($searchUserEvents as $EventDetail) {
            Carbon::setLocale('es');

            $EventDetail->event_date_start = Carbon::parse($EventDetail->event_date_start)->translatedFormat('l j \\d\\e F');
            $EventDetail->event_date_end = Carbon::parse($EventDetail->event_date_end)->translatedFormat('l j \\d\\e F');

            $EventDetail->event_date_start_short = Carbon::parse($EventDetail->event_date_start_short)->translatedFormat('j \\d\\e F');
            $EventDetail->event_date_end_short = Carbon::parse($EventDetail->event_date_end_short)->translatedFormat('j \\d\\e F');

            $EventDetail->event_time_start = Carbon::parse($EventDetail->event_time_start)->formatLocalized('%I:%M %p');
            $EventDetail->event_time_end = Carbon::parse($EventDetail->event_time_end)->formatLocalized('%I:%M %p');
        }
        return $searchUserEvents;
    }

    //Retrieves a list of incomplete events for a specific user.
    public function userEventsIncomplete($id)
    {
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

    //Retrieves a list of completed events for a specific user.
    public function userEventsComplete($id)
    {
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

    //Updates the state of a user's event.
    public function updateEvent(Request $request){

        $userEvents = UsersEvent::where('user_id', $request->user_id)->where('event_id', $request->event_id)
            ->update([
                'state' => $request->state,
            ]);

        return redirect($request->url);
    }

    //Stores a new user in the database and handles the upload of a user image.
    public function userStore(Request $request)
    {
        if ($request->image) {            
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
        } else {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'password' => Hash::make($request->password),
                'sleep_hours' => $request->sleep_hours,
                'image' => 'default-user.png',
                'diseases' => $request->diseases,
                'physical_activity' => $request->physical_activity,
            ]);
        }

        return redirect($request->url);
    }
    
    //Authenticates a user and generates an authentication token.
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

    //Generates a JSON response containing the authenticated user's information, including an updated image URL.
    public function token(Request $request)
    {
        $user = $request->user();
        $user->image_url = url('storage/users_img/' . $user->image);

        return response()->json(
            $user
        );
    }

    //Updates a user's profile information.
    public function updateProfile(Request $request)
    {
        $user = User::find($request->userId);

        if ($request->image) {            
            $user ->update([
                'username' => $request->username,
                'email' => $request->email,
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
        } else {
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'sleep_hours' => $request->sleep_hours,
                'diseases' => $request->diseases,
                'physical_activity' => $request->physical_activity,
            ]);

        }

        return redirect($request->url);
    }

    // Handles the password recovery process for a user.
    public function recoveryPassword(Request $request)
    {
        $user = User::select('email')->where('email', $request->email)->first();
        if ($user) {
            $user = User::select('id')->where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();


            return redirect('http://localhost:5173/SignIn');

        }
    }



}