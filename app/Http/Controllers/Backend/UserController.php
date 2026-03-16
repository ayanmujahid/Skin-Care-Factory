<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function signUp(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        // Create user (default role_id 0 = Customer)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 0, // default as Customer
        ]);

        // Login the user
        Auth::login($user);

        return redirect()->route('index')->with('notify_success', 'Signup successful!');
    }


    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:50',
        ]);

        // Attempt to find user first
        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            return back()->with('notify_error', 'Invalid credentials, please try again.');
        }

        // Handle Customer Login
        if ($user->role_id == 0) {
            Auth::login($user);
            return redirect()->route('index')->with('notify_success', 'You are logged in as Customer!');
        }

        // Handle Professional Login
        if ($user->role_id == 1) {
            if ($user->verified_status == 1) {
                Auth::login($user);
                return redirect()->route('index')->with('notify_success', 'You are logged in as Professional!');
            } elseif ($user->verified_status == 0) {
                return back()->with('notify_error', 'Your application is still pending.');
            } elseif ($user->verified_status == 2) {
                return back()->with('notify_error', 'Admin has rejected your application. Check your inbox for the reason.');
            }
        }

        // Fallback
        return back()->with('notify_error', 'Login not allowed.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('index')->with('notify_success', 'Logged Out!');
    }
}
