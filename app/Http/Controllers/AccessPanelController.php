<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class AccessPanelController
 *
 * This class handles the access control panel functionality, including login and logout operations.
 * It extends the Controller class and is responsible for managing user authentication and authorization.
 *
 */

class AccessPanelController extends Controller
{
    //
    public function index()
    {
        return view('access.login');
    }
    /**
     * Handles the login process for users.
     * 
     * This function processes the login request by validating the provided credentials (email and password).
     * If the credentials are valid, it checks if the user has an 'Admin' profile. Only users with an 'Admin'
     * profile are allowed to proceed; others are logged out and redirected back with an error message.
     * 
     */
    public function login(Request $request)
    {

        $remember = ($request->has('remember')) ? true : false;

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

    /**
     * Logs out the current user.
     * 
     * This function handles the logout process for authenticated users. It first logs out the user by
     * invalidating the user's session using Laravel's Auth facade. Then, it regenerates the session token.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        return redirect('/access/login');
    }
}
