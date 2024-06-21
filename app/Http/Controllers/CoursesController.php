<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registeredCourses = Course::all();
        return view('courses.index', compact('registeredCourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
        $courses = Course::all();
        return view('courses.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $course = Course::create([
                  'name' => $request->name,
                  'description' => $request->description,
        ]);

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $course = Course::find($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $registeredCourses = Course::find($id);
        return view('courses.edit', compact('registeredCourses'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $registeredCourses = Course::find($id);
        $registeredCourses->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('courses.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $course = Course::find($id);
        if ($course) {
            $course->delete();
            Session::flash('success', 'Successfully deleted course.');
            return redirect()->route('courses.index');
        } else {
            Session::flash('error', 'Error deleting course.');
            return redirect()->route('courses.index');
        }
    }
}
