<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Course;
use App\Models\UsersCourse;
use App\Models\UsersEvent;
use Carbon\Carbon;

class EventsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registeredEvents = Event::all();
        $registeredCategories = Category::all();

        //Comprueba si la fecha de un evento es pasada a hoy y le cambia su estado a inactivo.
        foreach ($registeredEvents as $event) {
            $date = Carbon::parse($event->end);
            if ($date->isPast()) {
                $event->update([
                    'state' => 2,
                ]);                
            }
        }


        //donde la llave foranea categories_id sea igual a la llave primaria id de categories lo agregamos a la variable $registeredEvents
        $registeredEvents = Event::join('categories', 'categories.id', '=', 'events.categories_id')
            ->select('events.*', 'categories.name as category_name')
            ->orderBy('events.id', 'asc')
            ->get();
        //imprime el contenido de registeredEvents


        return view('events.index', compact('registeredEvents', 'registeredCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $events = Event::all();
        $courses = Course::all();
        return view('events.create', compact ('events', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //              
        $events = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'categories_id' => $request->category,
            'image' => $request->image,
            'state' => $request->state,
            'courses_id' => $request->courses
        ]);

        $file = $request->file('image');
        $file_name = 'event_' . $events->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/events_img', $file_name);

        $events->update([
            'image' => $file_name
        ]);

        if ($request->category == 3) {
            $estado = 'No_Aplica';
        } else {
            $estado = 'No_Completado';
        }

        $users = UsersCourse::where('course_id', $request->courses)->pluck('user_id');
        foreach ($users as $user) {
            UsersEvent::create([
                'user_id' => $user,
                'event_id' => $events->id,
                'state' => $estado
            ]);
        }

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $event = Event::find($id);
        //donde la llave foranea categories_id sea igual a la llave primaria id de categories le agregamos el nombre a $registeredEvents
        $event = Event::join('categories', 'categories.id', '=', 'events.categories_id')
            ->select('events.*', 'categories.name as category_name')
            ->where('events.id', $id)
            ->first();
        
        $registeredUsers = User::join('users_events', 'users.id', '=', 'users_events.user_id')
            ->select('users.*')
            ->where('users_events.event_id', $id)
            ->get();

        return view('events.show', compact('event', 'registeredUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $courses = Course::all();
        $registeredEvents = Event::find($id);
        $courseName = Course::find($registeredEvents->courses_id);
        return view('events.edit', compact('registeredEvents', 'courses', 'courseName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $registeredEvents = Event::find($id);

        if ($request->courses != $registeredEvents->courses_id) {            
            //Comprueba si el curso ingresado en el request es diferente al anterior, para asi poder actualizar la tabla users_event de acuerdo al cambio  
            
            //Obtiene todos los usuarios que pertenecen al curso anterior
            $oldStudentsID = UsersCourse::where('course_id', $registeredEvents->courses_id)->pluck('user_id');
            //Obtiene todos los usuarios que pertenecen al nuevo curso
            $newStudentsID = UsersCourse::where('course_id', $request->courses)->pluck('user_id');
            //Obtiene la diferencia entre los dos arreglos
            $diffStudents = $oldStudentsID->diff($newStudentsID);

            //Elimina todos los usuarios que ya no estan presentes en el nuevo curso
            foreach ($diffStudents as $student) {
                UsersEvent::where('user_id', $student)->where('event_id', $id)->delete();
            }

            //Asigna un valor de estado dependiendo del tipo de evento
            if ($request->category == 3) {
                $estado = 'No_Aplica';
                //Vuelve a crear a los usuarios del evento con el nuevo curso dado.
                $users = UsersCourse::where('course_id', $request->courses)->pluck('user_id');
                foreach ($users as $user) {
                    UsersEvent::updateOrCreate([
                        'user_id' => $user,
                        'event_id' => $registeredEvents->id,
                        'state' => $estado
                    ]);
                }
            } else {                
                //Vuelve a crear a los usuarios del evento con el nuevo curso dado.
                $users = UsersCourse::where('course_id', $request->courses)->pluck('user_id');
                foreach ($users as $user) {
                    UsersEvent::updateOrCreate([
                        'user_id' => $user,
                        'event_id' => $registeredEvents->id,
                    ]);
                }
            }
        }

        if($request->image) {
            //Comprobamos si hay imagen y la guardamos
            $registeredEvents->update([
                'title' => $request->title,
                'description' => $request->description,
                'start' => $request->start,
                'end' => $request->end,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
                'categories_id' => $request->category,
                'image' => $request->image,
                'state' => $request->state,
                'courses_id' => $request->courses,
            ]);

            $file = $request->file('image');
            $file_name = 'event_' . $registeredEvents->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/events_img', $file_name);
    
            $registeredEvents->update([
                'image' => $file_name,
            ]);

        } else {
            //Como no hay imagen, se deduce que es la misma que antes y se omite su actualizacion.
            $registeredEvents->update([
                'title' => $request->title,
                'description' => $request->description,
                'start' => $request->start,
                'end' => $request->end,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
                'categories_id' => $request->category,
                'state' => $request->state,
                'courses_id' => $request->courses,
            ]);
        }

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //
        $event = Event::find($id);

        if ($event) {
            $event->delete();
            Session::flash('success', 'Successfully deleted event.');
            return redirect()->route('events.index');
        } else {
            Session::flash('error', 'Error deleting event.');
            return redirect()->route('events.index');
        }
    }
}
