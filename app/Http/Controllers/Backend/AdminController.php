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
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        return view('admin.admin-management.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admin-management.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]/',      // lowercase
                'regex:/[A-Z]/',      // uppercase
                'regex:/[0-9]/',      // number
                'regex:/[@$!%*#?&]/', // special character
            ]
        ], [
            'password.regex' => 'Password must contain uppercase, lowercase, number and special character.'
        ]);

        Admin::create($request->all());

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin created successfully');
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin-management.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        // Toggle verification status
        $admin->is_verified = $admin->is_verified == 1 ? 0 : 1;

        $admin->save();

        return redirect()
            ->route('admin.admins.index')
            ->with('success', $admin->is_verified ? 'Admin verified successfully!' : 'Admin disabled successfully!');
    }


    // 🟢 Admin Register
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]/',      // lowercase
                'regex:/[A-Z]/',      // uppercase
                'regex:/[0-9]/',      // number
                'regex:/[@$!%*#?&]/', // special character
            ]
        ], [
            'password.regex' => 'Password must contain uppercase, lowercase, number and special character.'
        ]);

        Admin::create($request->all());

        return redirect()->route('dashboard.login')
            ->with('notify_success', 'Admin registered successfully');
    }

    // 🟢 Admin Login Form Logic
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // First check if admin exists
        $admin = \App\Models\Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->with('notify_error', 'Invalid login credentials.');
        }

        // Check if admin is verified
        if ($admin->is_verified != 1) {
            return back()->with('notify_error', 'You are not approved yet by the admin.');
        }

        // Attempt login
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->route('admin.dashboard.index')
                ->with('notify_success', 'Login successful.');
        }

        return back()->with('notify_error', 'Invalid login credentials.');
    }

    // 🟢 Admin Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login')->with('notify_success', 'Logout successfull');
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
