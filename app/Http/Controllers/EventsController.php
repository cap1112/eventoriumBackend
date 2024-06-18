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
        $registeredEvents = Event::select(
            "events.id",
            "events.start",
            "events.startTime",
            "events.end",
            "events.endTime",
            "events.image",
            "events.description",
            "events.title",
            "events.state",
            "categories.name as category"
        )

            ->join('events_categories', 'events.id', '=', 'events_categories.event_id')
            ->join('categories', 'events_categories.category_id', '=', 'categories.id')
            ->get();


        return view('events.index', compact('registeredEvents'));

        // $registeredEvents = Event::with('Events')->get();
        // ->where('status_events_id', 1)
        //obtiene la cantidad de usuarios registrados en cada evento y los almacena en un array segun el id del evento
        // $userCountByEvent = Event::withCount('Events')->get()->pluck('Events_count', 'id')->toArray();

        // return view('events.index', compact('registeredEvents') , compact('userCountByEvent'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $events = Event::all();
        return view('events.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('image');
        $file_name = 'event_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/images', $file_name);
        
        $events = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'category' => $request->category,
            'image' => $request->image,
            'state' => $request->state,
        ]);

        return redirect()->route('events.index');
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
        $registeredEvents = Event::find($id);
        return view('events.edit', compact('registeredEvents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $registeredEvents = Event::find($id);
        $registeredEvents->title = $request->title;
        $registeredEvents->start = $request->start;
        $registeredEvents->end = $request->end;
        $registeredEvents->startTime = $request->startTime;
        $registeredEvents->endTime = $request->endTime;
        $registeredEvents->image = $request->image;
        $registeredEvents->description = $request->description;
        $registeredEvents->state = $request->state;
        $registeredEvents->save();
        return redirect()->route('Events.index');
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
            // $event->Events()->detach();

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
