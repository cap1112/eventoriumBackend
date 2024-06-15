<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
    
        return view('users.partials.userTable', compact('registeredUsers'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'password' => $request->password,
            'profile' => $request->profile,
            'sleep_hours' => $request->sleep_hours,
            'diseases' => $request->diseases,
            'physical_activity' => $request->physical_activity,
        ]);
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
    }
}
