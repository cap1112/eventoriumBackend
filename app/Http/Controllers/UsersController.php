<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Event;
use App\Models\UsersCourse;
use App\Models\UsersEvent;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;

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
            'username' => $request->username,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'password' => Hash::make($request->password),
            'profile' => $request->profile,
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

        //Logica detras de si se seleccionaron courses o no, o si se incluyo un 0 como course
        if (is_string($selectedCourses)) {
            //No ocurre nada
        } else {
            if (in_array(0, $selectedCourses)) {              
                if (count($selectedCourses) > 1) {
                    $selectedCourses = array_diff($selectedCourses, array("0"));

                    foreach ($selectedCourses as $courseId) {
                        UsersCourse::create([
                        'user_id' => $user->id,
                        'course_id' => $courseId,
                    ]);
        
                    $events = Event::where('courses_id', $courseId)->get();
                    foreach ($events as $event) {
            
                        if ($event->categories_id == 3) {
                            $estado = 'No_Aplica';
                        } else {
                            $estado = 'No_Completado';
                        }
            
                        UsersEvent::create([
                        'user_id' => $user->id,
                        'event_id' => $event->id,
                        'state' => $estado
                        ]);
                    }
                }

                } else {
                    //No ocurre nada
                }
            } else {
                foreach ($selectedCourses as $courseId) {
            UsersCourse::create([
                'user_id' => $user->id,
                'course_id' => $courseId,
            ]);

            $events = Event::where('courses_id', $courseId)->get();
            foreach ($events as $event) {
    
                if ($event->categories_id == 3) {
                    $estado = 'No_Aplica';
                } else {
                    $estado = 'No_Completado';
                }
    
                UsersEvent::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'state' => $estado
                ]);
            }
        }
            }
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
        $selectedCourses = $request->input('selectedCourses');

        $registeredUsers = User::find($id);

        if($request->image) {
        $registeredUsers->update([
            'name' => $request->name,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'password' => bcrypt($request->password),
            'profile' => $request->profile,
            'sleep_hours' => $request->sleep_hours,
            'image' => $request->image,
            'diseases' => $request->diseases,
            'physical_activity' => $request->physical_activity,
        ]);

        $file = $request->file('image');
        $file_name = 'usuario_' . $registeredUsers->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/users_img', $file_name);

        $registeredUsers->update([
            'image' => $file_name,
        ]);

        } else {
            $registeredUsers->update([
                'name' => $request->name,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'password' => bcrypt($request->password),
                'profile' => $request->profile,
                'sleep_hours' => $request->sleep_hours,
                'diseases' => $request->diseases,
                'physical_activity' => $request->physical_activity,
            ]);
        }

        UsersCourse::where('user_id', $id)->delete();
        UsersEvent::where('user_id', $id)->delete();

        //Logica detras de si se seleccionaron courses o no, o si se incluyo un 0 como course
        if (is_string($selectedCourses)) {
            //No ocurre nada
        } else {
            if (in_array(0, $selectedCourses)) {              
                if (count($selectedCourses) > 1) {
                    $selectedCourses = array_diff($selectedCourses, array("0"));

                    foreach ($selectedCourses as $courseId) {
                        UsersCourse::create([
                            'user_id' => $registeredUsers->id,
                            'course_id' => $courseId,
                        ]);
                
                    $events = Event::where('courses_id', $courseId)->get();
                    foreach ($events as $event) {
            
                        if ($event->categories_id == 3) {
                            $estado = 'No_Aplica';
                        } else {
                            $estado = 'No_Completado';
                        }
            
                        UsersEvent::create([
                        'user_id' => $registeredUsers->id,
                        'event_id' => $event->id,
                        'state' => $estado
                        ]);
                    }
                }

                } else {
                    //No ocurre nada
                }
            } else {
                foreach ($selectedCourses as $courseId) {
                    UsersCourse::create([
                    'user_id' => $registeredUsers->id,
                    'course_id' => $courseId,
                ]);
        
                $events = Event::where('courses_id', $courseId)->get();
                foreach ($events as $event) {
        
                    if ($event->categories_id == 3) {
                        $estado = 'No_Aplica';
                    } else {
                        $estado = 'No_Completado';
                    }
        
                    UsersEvent::create([
                    'user_id' => $registeredUsers->id,
                    'event_id' => $event->id,
                    'state' => $estado
                    ]);
                }
            }
            }
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
        } else if ($user->profile == 'Estudiante' || $user->profile == 'Profesor') {
            $user->delete();
            Session::flash('success', 'Successfully deleted user.');
            return redirect()->route('users.index');
        } else {
            Session::flash('success', 'You cant delete this user. Please try again.');
            return redirect()->route('users.index');
        }
    }
}
