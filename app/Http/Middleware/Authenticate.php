<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            // If user is trying to access admin routes
            if ($request->is('admin/*')) {
                return route('dashboard.login');
            }

            return route('login'); // normal user login
        }
    }
}
