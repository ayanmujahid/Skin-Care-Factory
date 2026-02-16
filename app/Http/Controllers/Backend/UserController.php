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
        $validator = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',


        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            // 'password' => bcrypt($request['password']),
            'password' => bcrypt($request['password']),
        ]);
        Auth::login($user);
        return redirect()->route('index')->with('notify_success', 'Signup successfully');
    }


    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:50',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('index')->with('notify_success', 'Logged in successfully!');
        }

        return back()->with('notify_error', 'Invalid credentials, please try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('index')->with('notify_success', 'Logged Out!');
    }
}
