<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class AccessPanelController extends Controller
{
    //
    public function index()
    {
        return view('access.login');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        // $credentials = request()->only('email', 'password');

        $users = User::all();


        $credentials = [
            'email' => $request->email,
            'password' => $request->Password,
        ];
        

        $remember = ($request->has('remember')) ? true : false;

        // dd($remember);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            // Comprobación adicional para verificar si el usuario tiene el perfil de "admin"
            if (Auth::user()->profile === 'Admin') {
                $request->session()->regenerate();
                return redirect()->intended('/users');
            } else {
                // Si el usuario no es un admin, cerrar la sesión y redirigir al login con un mensaje de error
                Auth::logout();
                return back()->with('error', 'Access denied. Only admins can access.');

            }
        } else {
            return back()->with('error', 'User not found or incorrect password.');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        return redirect('/access/login');
    }
}
