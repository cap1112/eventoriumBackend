<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Event;
use App\Models\UsersEvent;
use App\Models\UsersCourse;

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
        $students = User::where('profile', 'Estudiante')->get();
        //variable que retorna students y si tienen este curso asociado
        return view('courses.create', compact('courses', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //        
        $course = Course::create([
                  'initial' => $request->initial,
                  'name' => $request->name,
                  'description' => $request->description,
        ]);
        
        $studentIds = $request->students;

        foreach ($studentIds as $studentId) {
            UsersCourse::create([
                'user_id' => $studentId,
                'course_id' => $course->id,
            ]);
        }

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        $registeredUsers = User::join('users_courses', 'users.id', '=', 'users_courses.user_id')
        ->select('users.*')
        ->where('users_courses.course_id', $id)
        ->get();

        $course = Course::find($id);
        return view('courses.show', compact('course', 'registeredUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $registeredUsers = User::join('users_courses', 'users.id', '=', 'users_courses.user_id')
        ->select('users.*')
        ->where('users_courses.course_id', $id)
        ->get();

        $unregisteredUsers = User::whereDoesntHave('courses', function ($query) use ($id) {
            $query->where('course_id', $id);
        })->get();

        $registeredCourses = Course::find($id);

        return view('courses.edit', compact('registeredCourses', 'registeredUsers', 'unregisteredUsers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registeredCourse = Course::find($id);
        $registeredCourse->update([
            'initial' => $request->initial,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        $studentIds = $request->students ?? []; // Asegúrate de tener un array, incluso si está vacío
    
        // Obtén todos los estudiantes actualmente matriculados en el curso
        $currentlyEnrolledStudents = $registeredCourse->users()->pluck('users.id')->toArray();
    
        // Desmatricular estudiantes que no están en la nueva lista
        foreach ($currentlyEnrolledStudents as $enrolledStudentId) {
            if (!in_array($enrolledStudentId, $studentIds)) {
                UsersCourse::where('user_id', $enrolledStudentId)->where('course_id', $id)->delete();     
            }
        }
    
        // Matricular nuevos estudiantes
        foreach ($studentIds as $studentId) {
            if (!in_array($studentId, $currentlyEnrolledStudents)) {
                UsersCourse::create([
                    'user_id' => $studentId,
                    'course_id' => $id,
                ]);
            }
        }
    
        // Asumiendo que tienes un modelo Event que está relacionado con Course
        $eventsLinkedToCourse = Event::where('courses_id', $registeredCourse->id)->get();
    
        foreach ($eventsLinkedToCourse as $event) {
            // Para cada evento, revisar y actualizar user_events
            foreach ($studentIds as $studentId) {
                // Asegurarse de que los estudiantes matriculados estén en user_events
                UsersEvent::updateOrCreate(
                    ['user_id' => $studentId, 'event_id' => $event->id],
                    ['status' => 'matriculado'] // o cualquier otro campo relevante
                );
            }
    
            // Para estudiantes que ya no están matriculados, actualizar o eliminar de user_events
            $enrolledUserIdsInEvent = UsersEvent::where('event_id', $event->id)->pluck('user_id')->toArray();
            foreach ($enrolledUserIdsInEvent as $userId) {
                if (!in_array($userId, $studentIds)) {
                    // Opción 1: Eliminar el registro
                    UsersEvent::where('user_id', $userId)->where('event_id', $event->id)->delete();
                }
            }
        }
    
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
