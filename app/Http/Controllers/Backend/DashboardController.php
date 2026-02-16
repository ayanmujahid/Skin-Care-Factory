<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.auth.login');
    }
    public function register()
    {
        return view('admin.auth.signup');
    }
}
