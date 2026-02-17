<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
   use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //


    public function showLoginForm()
    {
        return view('admin.login');
    }

public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|min:6',
    ]);

    // First check user exists & role allowed
    $user = DB::table('users')
        ->where('email', $request->email)
        ->whereIn('role_id', [1, 2, 3]) // ✅ allowed roles
        ->where('is_active', 1)
        ->first();

    if (!$user) {
        return back()->with('error', 'You are not authorized to login');
    }

    // Then attempt login
    if (Auth::guard('admin')->attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {


// if (Auth::guard('admin')->check()) {
//     $roleId = Auth::guard('admin')->user()->role_id;

//     if ($roleId == 1) return redirect()->route('admin.dashboard');
//     if ($roleId == 2) return redirect()->route('manager.dashboard');
//     if ($roleId == 3) return redirect()->route('user.dashboard');
// }

        return redirect()->route('admin.dashboard')
            ->with('success', 'Welcome Admin!');
    }

    return back()->with('error', 'Invalid login credentials');
}


    /**
     * Admin logout
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function register()
    {

     $roles = DB::table('roles')
        ->where('is_active', 1)
        ->whereNotIn('id', [4, 5]) // member & association member hide
        ->get();
        return view('admin.sign-up' , compact('roles'));
    }

    public function checkEmail(Request $request)
{
    $exists = DB::table('users')->where('email', $request->email)->exists();

    return response()->json([
        'exists' => $exists
    ]);
}


      public function submit(Request $request)
{

    try {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role_id'  => 'required|exists:roles,id',
        ]);

        DB::table('users')->insert([
            'role_id'   => $request->role_id,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'is_active' => 1,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        return redirect()->route('admin.login')->with('success','Registered');
    }
    catch (\Exception $e) {
        dd($e->getMessage());
    }
}

public function dashboard()
{
    return view('admin.pages.dashboard');

}



}
