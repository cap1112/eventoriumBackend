<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\UsersCourse;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registeredUsers = User::all();
        return view('users.index', compact('registeredUsers'));

    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('search');
    //     $users = User::where('name', 'like', "%{$query}%")->get();
    //     return view('users.partials.userTable', compact('users'));
    // }



    public function search(Request $request)
    {
        // $query = $request->input('search');
        // $registeredUsers = User::where('name', 'like', "%{$query}%")->get();
        // return view('users.partials.userTable ', compact('registeredUsers'));



        $registeredUsers = [
            ['name' => 'John Doe'],
            ['name' => 'Jane Doe'],
            ['name' => 'Test User'],
        ];

        // return view('users.partials.userTable', compact('registeredUsers'));
        return view('users.index', compact('registeredUsers'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('users.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $selectedCourses = $request->input('selectedCourses');

        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'password' => bcrypt($request->password),
                'profile' => $request->profile,
                'sleep_hours' => $request->sleep_hours,
                'diseases' => $request->diseases,
                'physical_activity' => $request->physical_activity,
            ]);

        foreach ($selectedCourses as $courseId) {
                UsersCourse::create([
                'users_id' => $user->id,
                'courses_id' => $courseId,
            ]);
        }

        return redirect ()->route('users.index');
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
        // ...
        Session::flash('success', 'Evento eliminado con éxito.');
        return redirect()->route('events.index');
    }
}
