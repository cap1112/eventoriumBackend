<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

use Illuminate\Support\Facades\Session;

class EventsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registeredEvents = Event::all();


        // $registeredEvents = Event::with('users')->get();
        // ->where('status_events_id', 1)
        //obtiene la cantidad de usuarios registrados en cada evento y los almacena en un array segun el id del evento
        // $userCountByEvent = Event::withCount('users')->get()->pluck('users_count', 'id')->toArray();

        // return view('events.index', compact('registeredEvents') , compact('userCountByEvent'));
        return view('events.index', compact('registeredEvents') );
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id)
    {
        //
        $event = Event::find($id);
        
        if ($event) {

            // $event->courses()->detach();
            // $event->users()->detach();

            $event->delete();
            // Comment::where('posts_id', $id)->delete(); Esto se tiene que usar para eliminar la relación de la tabla intermedia
            Session::flash('success', 'Successfully deleted event.');
            return redirect()->route('events.index');
        } else {
            Session::flash('error', 'Error deleting event.');
            return redirect()->route('events.index');
        }
    }
}
