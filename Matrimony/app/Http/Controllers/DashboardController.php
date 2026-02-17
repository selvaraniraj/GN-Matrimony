<?php

namespace App\Http\Controllers;

use App\Models\DeveloperTicket;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Role;
use App\Models\Route;
use App\Models\Ticket;
use App\Models\User;
use App\Utils\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use GeneralTrait;
    public function dashboard(Request $request)
    {
        $user_id = auth()->user()->id;

        $data = [
            'users' => $this->getUserStats(),
            'roles' => $this->getRoleStats(),
            'routes' => $this->getRouteStats(),

        ];

        return view('dashboard.main', compact('data'));
    }

    private function getUserStats()
    {
        $total_users = User::count();
        $active_users = User::where('is_active', 1)->count();
        $inactive_users = $total_users - $active_users;

        return compact('total_users', 'active_users', 'inactive_users');
    }

    private function getRoleStats()
    {
        $total_roles = Role::count();
        $active_roles = Role::where('is_active', 1)->count();
        $inactive_roles = $total_roles - $active_roles;

        return compact('total_roles', 'active_roles', 'inactive_roles');
    }

    private function getRouteStats()
    {
        $total_routes = Route::count();
        $active_routes = Route::where('is_active', 1)->count();
        $inactive_routes = $total_routes - $active_routes;

        return compact('total_routes', 'active_routes', 'inactive_routes');
    }

    public function userLandingPage(){
        return view('userPages.main.dashboard');
    }


    public function maintenance(){
        return view('pages.maintenance');
    }

}
