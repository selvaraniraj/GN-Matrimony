<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatrimonyProfileController extends Controller
{
    //

        public function index()
    {
       $profiles = DB::table('members as m')
        ->leftJoin('users as u', 'u.id', '=', 'm.user_id')
        ->select(
            'm.*',
            'u.email as username',
            'u.name as user_name',
            'u.password as password'
        )
        ->orderBy('m.id', 'desc')
        ->get();
        return view('admin.pages.profile_list', compact('profiles'));
    }

    public function create()
    {
        return view('admin.matrimony.create');
    }

   public function delete($id)
{
    $member = DB::table('members')->where('id', $id)->first();

    if ($member) {
        DB::table('members')
            ->where('id', $id)
            ->update([
                'is_active' => 0,
                'updated_at' => now()
            ]);

        DB::table('users')
            ->where('id', $member->user_id)
            ->update([
                'is_active' => 0,
                'updated_at' => now()
            ]);
    }

    return redirect()->back()->with('success', 'Profile deactivated successfully.');
}





}

