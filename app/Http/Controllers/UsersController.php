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
        $file = $request->file('image');
        $file_name = 'event_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/users_img', $file_name);
        
        $selectedCourses = $request->input('selectedCourses');

        $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'password' => bcrypt($request->password),
                'profile' => $request->profile,
                'sleep_hours' => $request->sleep_hours,
                'image' => $request->image,
                'diseases' => $request->diseases,
                'physical_activity' => $request->physical_activity,
            ]);

        foreach ($selectedCourses as $courseId) {
                UsersCourse::create([
                'user_id' => $user->id,
                'course_id' => $courseId,
            ]);
        }

        return redirect ()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //retorna la informacion de un usuario
        
        $user = User::find($id);
        return view('users.show', compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $registeredUsers = User::find($id);
        // $selectedCourses = Course::find($id);

    //     foreach ($selectedCourses as $courseId) {
    //         UsersCourse::create([
    //         'user_id' => $registeredUsers->id,
    //         'course_id' => $courseId,
    //     ]);
    // }
        $courses = Course::all();
        return view('users.edit', compact('registeredUsers', 'courses'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $registeredUsers = User::find($id);
        $registeredUsers->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'lastname' => $request->lastname,
            'password' => bcrypt($request->password),
            'profile' => $request->profile,
            'sleep_hours' => $request->sleep_hours,
            'image' => $request->image,
            'diseases' => $request->diseases,
            'physical_activity' => $request->physical_activity,
        ]);

        UsersCourse::where('user_id', $id)->delete();
        $selectedCourses = $request->input('selectedCourses');

        foreach ($selectedCourses as $courseId) {
            UsersCourse::create([
            'user_id' => $registeredUsers->id,
            'course_id' => $courseId,
        ]);
    }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ...
        $user = User::find($id);
        if ($user->profile == 'Admin') {
            Session::flash('success', 'You cannot delete an administrator user.');
            return redirect()->route('users.index');
        }else if ($user->profile == 'Estudiante' || $user->profile == 'Profesor') {
            $user->delete();
            Session::flash('success', 'Successfully deleted user.');
            return redirect()->route('users.index');
        }else {
            Session::flash('success', 'You cant delete this user. Please try again.');
            return redirect()->route('users.index');
        }
    }
}
