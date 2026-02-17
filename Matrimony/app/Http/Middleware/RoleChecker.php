<?php

namespace App\Http\Middleware;

use App\Models\Route;
use App\Utils\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleChecker
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $route)
    {
        $checkRoute = Route::where('name', $route)->first();
        if(!empty($checkRoute)){
            $userRoleId = Auth::user()->role_id;
            $routesArray = $this->getRoutes($userRoleId);
            if(!in_array($route, $routesArray)){
                return redirect()->back()->with('error', 'Your does not have access for this');
            }
        }else{
            return redirect()->back()->with('error', "This Route is not Available");
        }

        return $next($request);
    }
}
