<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:50',
            'email_address'    => 'required|email|max:255',
            'password' => 'required|string|min:8'
        ]);

        $user = session()->get('users', []);

        $user[] = $validated;

        // Save data in a session
        session(['users' => $user]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Account created successfully!',
            'data'    => $validated
        ]);
    }
}
