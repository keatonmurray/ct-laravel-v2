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

    public function loginUser(Request $request)
    {
        $validated = $request->validate([
            'email_address' => 'required|email',
            'password'      => 'required|string'
        ]);

        $users = session()->get('users', []);

        $user = collect($users)->firstWhere(function ($user) use ($validated) {
            return $user['email_address'] === $validated['email_address']
                && $user['password'] === $validated['password'];
        });

        if ($user) {
            session(['logged_in_user' => $user]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Logged in successfully!',
                'data'    => $user
            ]);
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'Invalid email or password.',
            ], 401);
        }
    }

    public function logout()
    {
        session()->forget('logged_in_user');
        return redirect()->route('auth.loginView');
    }
}
