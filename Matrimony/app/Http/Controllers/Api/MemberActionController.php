<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberActivityLog;
use App\Models\LikedProfile;
use App\Models\Photo;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class MemberActionController extends Controller
{
    private function respond(bool $status, string $message, $data = null, int $code = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

private function getMemberFromToken(Request $request)
{
    $user = $request->user(); 

    if (!$user) {
        return null;
    }

    return Member::where('user_id', $user->id)->first();
}

    private function buildMemberSummary($row)
    {
        $age = $row->dob ? Carbon::parse($row->dob)->age : null;

        return [
            'id' => $row->member_id ?? null,
            'profile_id' => $row->profile_id ?? null,
            'user_id' => $row->user_id ?? null,
            'name' => $row->name ?? null,
            'gender' => $row->gender ?? null,
            'age' => $age,
            'height_id' => $row->height_id ?? null,
            'height_name' => $row->height_name ?? null,
            'education_id' => $row->education_id ?? null,
            'address' => $row->address ?? null,
            'photo_id' => $row->photo_id ?? null,
            'photo_path' => $row->file_path ?? null,
        ];
    }

    public function interest(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $membersId = intval($request->input('members_id'));
        $action = $request->input('action'); // like/unlike or 1/2

        $flag = null;
        if ($action === 'like' || $action === '1' || $action === 1) {
            $flag = 1;
        } elseif ($action === 'unlike' || $action === '2' || $action === 2) {
            $flag = 2;
        }

        if (!$membersId || !$flag) {
            return $this->respond(false, 'Invalid request.', null, 422);
        }

        if ($flag === 1) {
            LikedProfile::create([
                'member_id' => $member->id,
                'liked_profile' => $membersId,
                'liked_flag' => 1,
                'unliked_profile' => null,
                'unliked_flag' => 0,
                'is_active' => true,
            ]);
        } else {
            LikedProfile::create([
                'member_id' => $member->id,
                'liked_profile' => null,
                'liked_flag' => 0,
                'unliked_profile' => $membersId,
                'unliked_flag' => 1,
                'is_active' => true,
            ]);
        }

        return $this->respond(true, 'Interest updated.', ['flag' => $flag]);
    }

    public function interestList(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $rows = LikedProfile::where('liked_profiles.member_id', $member->id)
            ->where('liked_profiles.liked_flag', 1)
            ->leftJoin('members as m', 'liked_profiles.liked_profile', '=', 'm.id')
            ->leftJoin('member_addional_details as mad', 'm.id', '=', 'mad.member_id')
            ->leftJoin('heights as h', 'mad.height_id', '=', 'h.id')
            ->leftJoin('education_details as ed', 'm.id', '=', 'ed.member_id')
            ->leftJoin('photos as p', 'm.id', '=', 'p.member_id')
            ->leftJoin('upload_files as uf', 'p.photo_id', '=', 'uf.id')
            ->select(
                'liked_profiles.id as liked_id',
                'liked_profiles.liked_profile',
                'liked_profiles.created_at as liked_at',
                'm.id as member_id',
                'm.profile_id',
                'm.user_id',
                'm.name',
                'm.gender',
                'm.dob',
                'mad.height_id',
                'h.name as height_name',
                'ed.education_id',
                'ed.address',
                'p.photo_id',
                'uf.file_path'
            )
            ->orderBy('liked_profiles.id', 'desc')
            ->get();

        $unique = [];
        foreach ($rows as $row) {
            if (!isset($unique[$row->member_id])) {
                $unique[$row->member_id] = [
                    'liked_id' => $row->liked_id,
                    'liked_at' => $row->liked_at,
                    'member' => $this->buildMemberSummary($row),
                ];
            }
        }

        return $this->respond(true, 'Interest list', array_values($unique));
    }

    public function contactRequest(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $profileId = intval($request->input('profile_id'));
        $userId = intval($request->input('user_id'));
        $name = $request->input('name');

        if (!$profileId || !$userId) {
            return $this->respond(false, 'Invalid request.', null, 422);
        }

        $today = date('Y-m-d');
        $requestToday = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 2)
            ->whereDate('created_at', $today)
            ->count();

        if ($requestToday >= 5) {
            return $this->respond(false, 'You have reached your daily limit of Request Mobile Number.', null, 429);
        }

        $message = $member->name . ' requested ' . $name . ' MobileNumber';

        MemberActivityLog::create([
            'member_id' => $member->id,
            'profile_id' => $profileId,
            'flag' => 2,
            'message' => $message,
            'user_id' => $userId,
            'status' => 1,
        ]);

        return $this->respond(true, 'Contact request sent.');
    }

    public function viewRequest(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $profileId = intval($request->input('profile_id'));
        $userId = intval($request->input('user_id'));
        $name = $request->input('name');

        if (!$profileId || !$userId) {
            return $this->respond(false, 'Invalid request.', null, 422);
        }

        $today = date('Y-m-d');
        $profileViewsToday = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 3)
            ->whereDate('created_at', $today)
            ->count();

        if ($profileViewsToday >= 10) {
            return $this->respond(false, 'You have reached your daily limit of viewing profiles.', null, 429);
        }

        $message = $member->name . ' requested ' . $name . ' Viewprofile';

        MemberActivityLog::create([
            'member_id' => $member->id,
            'profile_id' => $profileId,
            'flag' => 3,
            'message' => $message,
            'user_id' => $userId,
            'status' => 1,
        ]);

        return $this->respond(true, 'View request sent.');
    }

    public function contactRequestList(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $rows = MemberActivityLog::where('member_activity_logs.member_id', $member->id)
            ->where('member_activity_logs.flag', 2)
            ->leftJoin('members as m', 'member_activity_logs.profile_id', '=', 'm.id')
            ->leftJoin('member_addional_details as mad', 'm.id', '=', 'mad.member_id')
            ->leftJoin('heights as h', 'mad.height_id', '=', 'h.id')
            ->leftJoin('education_details as ed', 'm.id', '=', 'ed.member_id')
            ->leftJoin('photos as p', 'm.id', '=', 'p.member_id')
            ->leftJoin('upload_files as uf', 'p.photo_id', '=', 'uf.id')
            ->select(
                'member_activity_logs.id as request_id',
                'member_activity_logs.profile_id',
                'member_activity_logs.flag',
                'member_activity_logs.message',
                'member_activity_logs.status',
                'member_activity_logs.upprove_date',
                'member_activity_logs.upproved_by',
                'member_activity_logs.created_at as requested_at',
                'm.id as member_id',
                'm.profile_id',
                'm.user_id',
                'm.name',
                'm.gender',
                'm.dob',
                'mad.height_id',
                'h.name as height_name',
                'ed.education_id',
                'ed.address',
                'p.photo_id',
                'uf.file_path'
            )
            ->orderBy('member_activity_logs.id', 'desc')
            ->get();

        $requests = [];
        foreach ($rows as $row) {
            if (!isset($requests[$row->request_id])) {
                $requests[$row->request_id] = [
                    'request_id' => $row->request_id,
                    'profile_id' => $row->profile_id,
                    'flag' => $row->flag,
                    'message' => $row->message,
                    'status' => $row->status,
                    'approved_date' => $row->upprove_date,
                    'approved_by' => $row->upproved_by,
                    'requested_at' => $row->requested_at,
                    'member' => $this->buildMemberSummary($row),
                ];
            }
        }

        return $this->respond(true, 'Contact request list', array_values($requests));
    }

    public function photoRequest(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $profileId = intval($request->input('profile_id'));
        $userId = intval($request->input('user_id'));
        $name = $request->input('name');

        if (!$profileId || !$userId) {
            return $this->respond(false, 'Invalid request.', null, 422);
        }

        $message = $member->name . ' requested ' . $name . ' photo';

        MemberActivityLog::create([
            'member_id' => $member->id,
            'profile_id' => $profileId,
            'flag' => 4,
            'message' => $message,
            'user_id' => $userId,
            'status' => 1,
        ]);

        return $this->respond(true, 'Photo request sent.');
    }

    public function approveMobile(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $memberId = intval($request->input('member_id'));
        $profileId = intval($request->input('profile_id'));

        if (!$memberId || !$profileId) {
            return $this->respond(false, 'Invalid request.', null, 422);
        }

        $updated = MemberActivityLog::where('member_id', $memberId)
            ->where('profile_id', $profileId)
            ->where('flag', 2)
            ->update([
                'status' => 2,
                'upprove_date' => now(),
                'upproved_by' => $member->id,
            ]);

        if (!$updated) {
            return $this->respond(false, 'No record updated. Please check the provided data.', null, 404);
        }

        return $this->respond(true, 'Approval successful.');
    }

    public function approvePhoto(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $memberId = intval($request->input('member_id'));
        $profileId = intval($request->input('profile_id'));

        if (!$memberId || !$profileId) {
            return $this->respond(false, 'Invalid request.', null, 422);
        }

        $updated = MemberActivityLog::where('member_id', $memberId)
            ->where('profile_id', $profileId)
            ->where('flag', 4)
            ->update([
                'status' => 2,
                'upprove_date' => now(),
                'upproved_by' => $member->id,
            ]);

        if (!$updated) {
            return $this->respond(false, 'No record updated. Please check the provided data.', null, 404);
        }

        return $this->respond(true, 'Approval successful.');
    }

    public function updateInterest(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $likedProfile = intval($request->input('liked_profile'));
        $flag = $request->input('flag');

        if (!$likedProfile || $flag === null) {
            return $this->respond(false, 'Invalid request.', null, 422);
        }

        $updated = LikedProfile::where('member_id', $likedProfile)
            ->where('liked_profile', $member->id)
            ->update([
                'flag' => $flag,
                'updated_at' => now(),
            ]);

        if (!$updated) {
            return $this->respond(false, 'No record updated. Please check the provided data.', null, 404);
        }

        return $this->respond(true, 'Interest updated.');
    }

    public function requestSent(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $perPage = intval($request->input('per_page', 10));

        $memberLogs = MemberActivityLog::where('member_id', $member->id)
            ->whereIn('flag', [2, 4])
            ->orderBy('id', 'DESC')
            ->get();

        $likedProfiles = LikedProfile::where('member_id', $member->id)
            ->select('liked_profile', 'flag')
            ->get()
            ->keyBy('liked_profile');

        $allProfileIds = array_unique(array_merge(
            $memberLogs->pluck('profile_id')->toArray(),
            $likedProfiles->keys()->toArray()
        ));

        $userDetails = Member::with([
            'star',
            'raasi',
            'educationDetails.education',
            'familyDetails',
            'horoscopeDetail',
            'additionalDetails.height',
            'partner_Information.heightTo',
            'partner_Information.heightFrom',
            'photos.uploadFile',
        ])
        ->whereIn('id', $allProfileIds)
        ->paginate($perPage);

        $allRequests = [];
        foreach ($userDetails as $user) {
            $requestTypes = [];
            $status = 'pending';

            if (isset($likedProfiles[$user->id])) {
                $requestTypes[] = 'interest';
                if ($likedProfiles[$user->id]->flag == 2) {
                    $status = 'accepted';
                } elseif ($likedProfiles[$user->id]->flag == 3) {
                    $status = 'rejected';
                }
            }

            $mobileReq = MemberActivityLog::where('member_id', $member->id)
                ->where('profile_id', $user->id)
                ->where('flag', 2)
                ->first();

            if ($mobileReq) {
                $requestTypes[] = 'mobile';
            }

            $photoReq = MemberActivityLog::where('member_id', $member->id)
                ->where('profile_id', $user->id)
                ->where('flag', 4)
                ->first();

            if ($photoReq) {
                $requestTypes[] = 'photo';
            }

            if (isset($mobileReq) && $mobileReq->status == 2) {
                $status = 'accepted';
            } elseif (isset($photoReq) && $photoReq->status == 2) {
                $status = 'accepted';
            } elseif ((isset($mobileReq) && $mobileReq->status == 3) ||
                      (isset($photoReq) && $photoReq->status == 3)) {
                $status = 'rejected';
            }

            $allRequests[] = [
                'profile' => $user,
                'request_types' => $requestTypes,
                'status' => $status,
                'mobile_request' => $mobileReq,
                'photo_request' => $photoReq,
                'interest_flag' => $likedProfiles[$user->id]->flag ?? null,
            ];
        }

        $photoIds = [];
        foreach ($userDetails as $userDetail) {
            if ($userDetail->photos->isNotEmpty()) {
                foreach ($userDetail->photos as $photo) {
                    $photoIds[] = [
                        'photo_id' => $photo->photo_id,
                        'file_path' => $photo->uploadFile->file_path ?? null,
                        'member_id' => $photo->member_id,
                    ];
                }
            } else {
                $photoIds[] = [
                    'photo_id' => null,
                    'file_path' => null,
                    'member_id' => $userDetail->id,
                ];
            }
        }

        return $this->respond(true, 'Request sent list', [
            'requests' => $allRequests,
            'photo_ids' => $photoIds,
            'pagination' => [
                'current_page' => $userDetails->currentPage(),
                'last_page' => $userDetails->lastPage(),
                'per_page' => $userDetails->perPage(),
                'total' => $userDetails->total(),
            ],
        ]);
    }

    public function headerNotifications(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $notificationCount = MemberActivityLog::where('profile_id', $member->id)
            ->whereIn('flag', [2, 4])
            ->where('status', 1)
            ->count();

        return $this->respond(true, 'Header notifications', [
            'notification_count' => $notificationCount,
        ]);
    }

    public function photoRequestList(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $rows = MemberActivityLog::where('member_activity_logs.member_id', $member->id)
            ->where('member_activity_logs.flag', 4)
            ->leftJoin('members as m', 'member_activity_logs.profile_id', '=', 'm.id')
            ->leftJoin('member_addional_details as mad', 'm.id', '=', 'mad.member_id')
            ->leftJoin('heights as h', 'mad.height_id', '=', 'h.id')
            ->leftJoin('education_details as ed', 'm.id', '=', 'ed.member_id')
            ->leftJoin('photos as p', 'm.id', '=', 'p.member_id')
            ->leftJoin('upload_files as uf', 'p.photo_id', '=', 'uf.id')
            ->select(
                'member_activity_logs.id as request_id',
                'member_activity_logs.profile_id',
                'member_activity_logs.flag',
                'member_activity_logs.message',
                'member_activity_logs.status',
                'member_activity_logs.upprove_date',
                'member_activity_logs.upproved_by',
                'member_activity_logs.created_at as requested_at',
                'm.id as member_id',
                'm.profile_id',
                'm.user_id',
                'm.name',
                'm.gender',
                'm.dob',
                'mad.height_id',
                'h.name as height_name',
                'ed.education_id',
                'ed.address',
                'p.photo_id',
                'uf.file_path'
            )
            ->orderBy('member_activity_logs.id', 'desc')
            ->get();

        $requests = [];
        foreach ($rows as $row) {
            if (!isset($requests[$row->request_id])) {
                $requests[$row->request_id] = [
                    'request_id' => $row->request_id,
                    'profile_id' => $row->profile_id,
                    'flag' => $row->flag,
                    'message' => $row->message,
                    'status' => $row->status,
                    'approved_date' => $row->upprove_date,
                    'approved_by' => $row->upproved_by,
                    'requested_at' => $row->requested_at,
                    'member' => $this->buildMemberSummary($row),
                ];
            }
        }

        return $this->respond(true, 'Photo request list', array_values($requests));
    }

    public function userDetails(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $memberId = $request->input('member_id');
        $profileId = $request->input('profile_id');

        if (!$memberId && !$profileId) {
            return $this->respond(false, 'member_id or profile_id required', null, 422);
        }

        $query = Member::with([
            'star',
            'raasi',
            'educationDetails.education',
            'familyDetails',
            'horoscopeDetail',
            'additionalDetails.height',
            'partner_Information.heightTo',
            'partner_Information.heightFrom',
            'photos.uploadFile',
        ]);

        if ($memberId) {
            $userDetails = $query->where('id', $memberId)->first();
        } else {
            $userDetails = $query->where('profile_id', $profileId)->first();
        }

        if (!$userDetails) {
            return $this->respond(false, 'Member not found', null, 404);
        }

        $today = date('Y-m-d');
        $profileViewsToday = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 3)
            ->whereDate('created_at', $today)
            ->count();

        if ($profileViewsToday >= 10) {
            return $this->respond(false, 'You have reached your daily limit of viewing profiles.', null, 429);
        }

        MemberActivityLog::create([
            'member_id' => $member->id,
            'profile_id' => $userDetails->id,
            'flag' => 3,
            'message' => "{$member->name} requested {$userDetails->name} Viewprofile",
            'user_id' => $userDetails->user_id,
            'status' => 1,
        ]);

        $photoIds = [];
        if ($userDetails->photos->isNotEmpty()) {
            foreach ($userDetails->photos as $photo) {
                $photoIds[] = [
                    'photo_id' => $photo->photo_id,
                    'file_path' => $photo->uploadFile->file_path ?? null,
                    'member_id' => $photo->member_id,
                ];
            }
        } else {
            $photoIds[] = [
                'photo_id' => null,
                'file_path' => null,
                'member_id' => $userDetails->id,
            ];
        }

        $logConditionsMet = MemberActivityLog::where('profile_id', $userDetails->id)
            ->where('flag', 2)
            ->where('status', 2)
            ->where('member_id', $member->id)
            ->exists();

        $logConditionsRequest = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 4)
            ->where('status', 1)
            ->where('profile_id', $userDetails->id)
            ->exists();

        $upprovePhoto = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 4)
            ->where('status', 2)
            ->where('profile_id', $userDetails->id)
            ->exists();

        return $this->respond(true, 'User details', [
            'user' => $userDetails,
            'photoIds' => $photoIds,
            'contact_approved' => $logConditionsMet,
            'photo_request_pending' => $logConditionsRequest,
            'photo_request_approved' => $upprovePhoto,
        ]);
    }

    public function myDetails(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $userDetails = Member::with([
            'star',
            'raasi',
            'educationDetails.education',
            'familyDetails',
            'horoscopeDetail',
            'additionalDetails.height',
            'partner_Information.heightTo',
            'partner_Information.heightFrom',
            'photos.uploadFile',
        ])->where('id', $member->id)->first();

        if (!$userDetails) {
            return $this->respond(false, 'Member not found', null, 404);
        }

        $photoIds = [];
        if ($userDetails->photos->isNotEmpty()) {
            foreach ($userDetails->photos as $photo) {
                $photoIds[] = [
                    'photo_id' => $photo->photo_id,
                    'file_path' => $photo->uploadFile->file_path ?? null,
                    'member_id' => $photo->member_id,
                ];
            }
        } else {
            $photoIds[] = [
                'photo_id' => null,
                'file_path' => null,
                'member_id' => $userDetails->id,
            ];
        }

        return $this->respond(true, 'My details', [
            'user' => $userDetails,
            'photoIds' => $photoIds,
        ]);
    }
}
