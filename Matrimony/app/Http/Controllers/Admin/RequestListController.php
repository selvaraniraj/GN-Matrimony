<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LikedProfile;
use App\Models\MemberActivityLog;
use App\Models\Member;

class RequestListController extends Controller
{
    public function contactRequests()
    {
        $requests = MemberActivityLog::with([
            'member:id,name,profile_id',
            'profile:id,name,profile_id',
        ])
            ->where('flag', 2)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pages.contact_request', compact('requests'));
    }

    public function photoRequests()
    {
        $requests = MemberActivityLog::with([
            'member:id,name,profile_id',
            'profile:id,name,profile_id',
        ])
            ->where('flag', 4)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pages.photo_request', compact('requests'));
    }

    public function likedProfiles()
    {
        $likes = LikedProfile::with([
            'member:id,name,profile_id',
            'likedMember:id,name,profile_id',
        ])
            ->where('liked_flag', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pages.liked_profiles', compact('likes'));
    }

    public function profileDetails($profileId)
    {
        $member = Member::with([
            'familyDetails',
            'educationDetails.education',
            'additionalDetails.height',
            'horoscopeDetail',
            'raasi',
            'star',
        ])
            ->where('id', $profileId)
            ->first();

        if (!$member) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return view('admin.pages.profile_details', compact('member'));
    }

}
