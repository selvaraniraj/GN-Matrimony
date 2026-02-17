<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

  if ($request->expectsJson()) {
        return null; // API requests → no redirect
    }

    return route('app.v2.loginPage_page'); // Web login page
    
        // if (! $request->expectsJson()) {
        //     return route('app.v2.loginPage_page');
        // }
    }
}
