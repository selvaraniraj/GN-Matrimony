<?php

namespace App\Http\Middleware;

use App\Models\Route;
use App\Utils\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRoleChecker
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $route = $request->route()->getName();
        $checkRoute = Route::where('name', $route)->first();
        if(!empty($checkRoute)){
            $userRoleId = Auth::user()->role_id;
            $routesArray = $this->getRoutes($userRoleId);
            if(!in_array($route, $routesArray)){
                return response('Access Denied', 403);
            }
        }else{
            return response('Access Denied', 403);
        }

        return $next($request);
    }
}
