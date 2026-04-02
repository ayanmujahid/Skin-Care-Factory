<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ProfessionalRejectedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\ProfessionalRejection;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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


    public function approve($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'verified_status' => 1
        ]);

        // Resolve any rejection
        ProfessionalRejection::where('user_id', $id)
            ->update(['is_resolved' => 1]);

        return back()->with('success', 'Professional approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'verified_status' => 2
        ]);

        // Store rejection
        ProfessionalRejection::create([
            'user_id' => $id,
            'reason' => $request->reason,
            'is_resolved' => 0
        ]);

        // Send email
        Mail::to($user->email)->send(new ProfessionalRejectedMail($user, $request->reason));

        return back()->with('error', 'Professional rejected.');
    }
}
