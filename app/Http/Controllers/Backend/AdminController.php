<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    // 🟢 Admin Register
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins',
            'password' => 'required|min:6'
        ]);

        Admin::create($request->all());

        return redirect()->route('dashboard.login')->with('success', 'Admin registered successfully');
    }

    // 🟢 Admin Login Form Logic
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'Invalid login credentials.',
        ]);
    }

    // 🟢 Admin Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
