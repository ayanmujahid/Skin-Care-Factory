<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProfessionalProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfessionalSignupAdminMail;
use App\Mail\ProfessionalSignupUserMail;

class ProfessionalController extends Controller
{
    //


    public function index()
    {
        $professionals = ProfessionalProfile::with('user')->paginate(10);
        
        return view('admin.license-management.index', compact('professionals'));
    }

    public function show($id)
    {
        $professional = ProfessionalProfile::with('user')->findOrFail($id);
        
        return view('admin.license-management.show', compact('professional'));
    }

    public function professionalRegistration(Request $request)
    {

        $request->validate([

            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',

            'password' => 'required|confirmed|min:6',

            'professional_type' => 'required',

            'license_number' => 'nullable|string|max:100',
            'license_state' => 'nullable|string|max:100',
            'license_expiration' => 'nullable|date',

            'license_upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

            'student_id_upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

        ]);


        /*
        |-------------------------------------
        | Create User
        |-------------------------------------
        */

        $user = User::create([

            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'role_id' => 1, // professional
            'verified_status' => 0 // waiting admin approval

        ]);
        // Send email to professional
        Mail::to($user->email)->send(new ProfessionalSignupUserMail($user));

        // Send email to admin
        Mail::to(config('mail.admin_email'))->send(new ProfessionalSignupAdminMail($user));

        /*
        |-------------------------------------
        | Upload Files
        |-------------------------------------
        */

        $licensePath = null;
        $studentIdPath = null;

        if ($request->hasFile('license_upload')) {

            $licensePath = $request->file('license_upload')
                ->store('licenses', 'public');
        }

        if ($request->hasFile('student_id_upload')) {

            $studentIdPath = $request->file('student_id_upload')
                ->store('student_ids', 'public');
        }


        /*
        |-------------------------------------
        | Create Professional Profile
        |-------------------------------------
        */

        ProfessionalProfile::create([

            'user_id' => $user->id,

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,

            'professional_type' => $request->professional_type,

            'license_number' => $request->license_number,
            'license_state' => $request->license_state,
            'license_expiration' => $request->license_expiration,
            'license_upload' => $licensePath,

            'school_name' => $request->school_name,
            'program_enrolled' => $request->program_enrolled,
            'expected_graduation' => $request->expected_graduation,
            'student_id_upload' => $studentIdPath,

            'business_name' => $request->business_name,
            'instagram' => $request->instagram,
            'website' => $request->website,
            'tax_id' => $request->tax_id,
            'business_address' => $request->business_address

        ]);


        return redirect()->route('login')
            ->with('notify_success', 'Professional account created. Waiting for admin approval.');
    }
}
