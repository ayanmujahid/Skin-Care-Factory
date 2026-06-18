<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
{
    $users = User::get();
    $newsletters = Newsletter::get();
    $orders = Order::get();

    $totalIncome = Order::sum('total');
    $totalUsers = User::count();
    $totalSubscribers = Newsletter::count();
    $totalOrders = Order::count();
    $totalIncome = Order::sum('total');

    // Example: users created today
    $newUsers = User::whereDate('created_at', today())->count();

    // Example: subscribers created today
    $newSubscribers = Newsletter::whereDate('created_at', today())->count();

    return view('admin.index', compact(
        'users',
        'newsletters',
        'orders',
        'totalIncome',
        'totalUsers',
        'totalSubscribers',
        'totalOrders',
        'newUsers',
        'newSubscribers'
    ));
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
