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
        $usernames = User::pluck('username')->toArray();
        $emails = User::pluck('email')->toArray();

        $courses = Course::all();
        return view('users.create', compact('courses', 'usernames', 'emails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $selectedCourses = $request->input('selectedCourses');
        
        if ($request->image) {
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
        } else {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'password' => Hash::make($request->password),
                'profile' => $request->profile,
                'sleep_hours' => $request->sleep_hours,
                'image' => 'default-user.png',
                'diseases' => $request->diseases,
                'physical_activity' => $request->physical_activity,
            ]);
        }


         //Logica detras de si se seleccionaron cursos o no
        if($selectedCourses == null) {
                        //No ocurre nada
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
        $usernames = User::pluck('username')->toArray();
        $emails = User::pluck('email')->toArray();
        $registeredUsers = User::find($id);
        $userCourses = UsersCourse::where('user_id', $id)->get();
        $registeredCourses = Course::whereIn('id', $userCourses->pluck('course_id'))->get();
        $courses = Course::whereNotIn('id', $userCourses->pluck('course_id'))->get();

        return view('users.edit', compact('registeredUsers', 'courses', 'registeredCourses', 'usernames', 'emails'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $selectedCourses = $request->input('selectedCourses');
        $registeredCourses = UsersCourse::where('user_id', $id)->get();

        $registeredUsers = User::find($id);

        if($request->password){     
            //Si hay contraseña se actualiza
            if($request->image) {
                $registeredUsers->update([
                    'name' => $request->name,
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
                        'password' => Hash::make($request->password),
                        'profile' => $request->profile,
                        'sleep_hours' => $request->sleep_hours,
                        'diseases' => $request->diseases,
                        'physical_activity' => $request->physical_activity,
                    ]);
                }

        } else {
            //Como no hay contraseña no se actualiza la contra
            if($request->image) {
                $registeredUsers->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'lastname' => $request->lastname,
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
                        'profile' => $request->profile,
                        'sleep_hours' => $request->sleep_hours,
                        'diseases' => $request->diseases,
                        'physical_activity' => $request->physical_activity,
                    ]);
                }
        }

        //Actualiza los cursos y eventos del usuario
        if($selectedCourses == null) {
            //No ocurre nada
        } else {
            foreach ($selectedCourses as $courseId) {
            UsersCourse::updateOrCreate([
                'user_id' => $registeredUsers->id,
                'course_id' => $courseId,
            ]);                    
                $events = Event::where('courses_id', $courseId)->get();
                foreach ($events as $event) {                    
                if ($event->categories_id == 3) {
                    $estado = 'No_Aplica';

                    UsersEvent::updateOrCreate([
                        'user_id' => $registeredUsers->id,
                        'event_id' => $event->id,
                        'state' => $estado,
                        ]);
                    
                } else {
                    UsersEvent::updateOrCreate([
                        'user_id' => $registeredUsers->id,
                        'event_id' => $event->id,
                        ]);
                 }
                }
            }
        }

        //Revisa si un curso de los matriculados anteriormente fue desmatriculado y elimina sus conexiones
        if ($selectedCourses != null){
            $missing_courses = array_diff($registeredCourses->pluck('course_id')->toArray(), $selectedCourses);
            if ($missing_courses == null) {
                //Todos los anteriores siguen matriculados y no hay que hacer nada
            } else {
                //Detecta los cursos que ya no estaban matriculados y elimina sus conexiones con el usuario
                foreach ($missing_courses as $courseId) {
                    UsersCourse::where('user_id', $id)->where('course_id', $courseId)->delete();
                    $events = Event::where('courses_id', $courseId)->get();
                    foreach ($events as $event) {
                    UsersEvent::where('user_id', $id)->where('event_id', $event->id)->delete();
                    }
                }
            }
        } else {
            UsersCourse::where('user_id', $id)->delete();
            UsersEvent::where('user_id', $id)->delete();
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
