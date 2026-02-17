<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Member;
use App\Models\MemberAddionalDetail;
use App\Models\EducationDetail;
use App\Models\LikedProfile;
use App\Models\MemberActivityLog;
use App\Models\Photo;
use App\Models\UploadFile;
use App\Utils\GeneralTrait;

class MemberSearchController extends Controller
{
    use GeneralTrait;

private function getMemberFromToken(Request $request)
{
    $user = $request->user(); 

    if (!$user) {
        return null;
    }

    return Member::where('user_id', $user->id)->first();
}


    private function respond(bool $status, string $message, $data = null, int $code = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }




    private function getAgeRange($gender, $age)
    {
        if ($gender === 'male') {
            return ['min' => $age - 5, 'max' => $age];
        }

        return ['min' => $age, 'max' => $age + 5];
    }

    private function getHeightRange($gender, $heightId)
    {
        if (!$heightId) {
            return null;
        }

        if ($gender === 'male') {
            return ['min' => $heightId - 5, 'max' => $heightId];
        }

        return ['min' => $heightId, 'max' => $heightId + 5];
    }


    public function matches(Request $request)
    {
        $member = $this->getMemberFromToken($request);

        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $gender = $member->gender;
        $memberId = Member::with([
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

        if (!$memberId) {
            return $this->respond(false, 'Member not found.', null, 404);
        }

        $dob = $memberId->dob;
        $heightId = $memberId->height_id;
        $age = $dob ? Carbon::parse($dob)->age : null;

        $ageRange = $this->getAgeRange($gender, $age ?? 0);
        $heightRange = $this->getHeightRange($gender, $heightId);

        $currentDate = Carbon::now();
        $minDob = $currentDate->copy()->subYears($ageRange['max'])->format('Y-m-d');
        $maxDob = $currentDate->copy()->subYears($ageRange['min'])->format('Y-m-d');

        $detailsQuery = Member::where('members.gender', '!=', $gender)
            ->leftJoin('stars', 'members.star_id', '=', 'stars.id')
            ->leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
            ->leftJoin('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
            ->leftJoin('heights', 'heights.id', '=', 'member_addional_details.height_id')
            ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
            ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
            ->where(function ($query) use ($memberId, $minDob, $maxDob) {
                if (
                    !$memberId->partner_Information ||
                    $memberId->partner_Information->age_from == 0 ||
                    $memberId->partner_Information->age_from === null ||
                    $memberId->partner_Information->age == 0 ||
                    $memberId->partner_Information->age === null
                ) {
                    $query->whereBetween('members.dob', [$minDob, $maxDob]);
                } else {
                    $query->whereYear('members.dob', '>=', Carbon::now()->subYears($memberId->partner_Information->age_from)->year)
                          ->whereYear('members.dob', '<=', Carbon::now()->subYears($memberId->partner_Information->age)->year);
                }
            })
            ->orWhere(function ($query) use ($memberId, $gender) {
                $rassiValues = null;
                if ($memberId->partner_Information && isset($memberId->partner_Information->rassi)) {
                    $rassiValues = is_array($memberId->partner_Information->rassi)
                        ? $memberId->partner_Information->rassi
                        : explode(',', $memberId->partner_Information->rassi);
                }
                if ($rassiValues) {
                    $query->where('members.gender', '!=', $gender)
                          ->whereIn('members.raasi_id', $rassiValues);
                }
            })
            ->orWhere(function ($query) use ($memberId, $gender) {
                $starValues = null;
                if ($memberId->partner_Information && isset($memberId->partner_Information->star)) {
                    $starValues = is_array($memberId->partner_Information->star)
                        ? $memberId->partner_Information->star
                        : explode(',', $memberId->partner_Information->star);
                }
                if (!empty($starValues)) {
                    $query->where('members.gender', '!=', $gender)
                          ->whereIn('members.star_id', $starValues);
                }
            })
            ->select(
                'members.id',
                'members.profile_id',
                'members.user_id',
                'members.name',
                'members.gender',
                'members.dob',
                'members.created_by_relation',
                'members.star_id',
                'members.raasi_id',
                'members.taluk',
                'stars.name as star_name',
                'member_addional_details.height_id',
                'heights.name as height_name',
                'education_details.education_id',
                'education_details.address',
                'photos.photo_id',
                'upload_files.file_path'
            )
            ->orderBy('members.dob', 'desc');

        $detailsmatch = $detailsQuery->get();

        if ($detailsmatch->isEmpty()) {
            $detailsmatch = Member::where('members.gender', '!=', $gender)
                ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
                ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
                ->select('members.*', 'photos.photo_id', 'upload_files.file_path')
                ->get();
        }

        $uniqueResults = [];
        $processedMembers = [];
        foreach ($detailsmatch as $result) {
            if (!in_array($result->id, $processedMembers, true)) {
                $uniqueResults[] = $result;
                $processedMembers[] = $result->id;
            }
        }

        $likedProfiles = LikedProfile::where('member_id', $member->id)->get();
        $likedIds = $likedProfiles->where('liked_flag', 1)->pluck('liked_profile')->filter()->toArray();
        $unlikedIds = $likedProfiles->where('unliked_flag', 1)->pluck('unliked_profile')->filter()->toArray();

        $photoRequested = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 4)
            ->where('status', 1)
            ->pluck('profile_id')
            ->toArray();

        $photoApproved = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 4)
            ->where('status', 2)
            ->pluck('profile_id')
            ->toArray();

        $viewProfile = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 3)
            ->where('status', 1)
            ->pluck('profile_id')
            ->toArray();

        $mobileRequested = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 2)
            ->where('status', 1)
            ->pluck('profile_id')
            ->toArray();

        $data = collect($uniqueResults)->map(function ($row) use ($likedIds, $unlikedIds, $photoRequested, $photoApproved, $viewProfile, $mobileRequested) {
            $age = $row->dob ? Carbon::parse($row->dob)->age : null;
            return [
                'id' => $row->id,
                'profile_id' => $row->profile_id,
                'user_id' => $row->user_id,
                'name' => $row->name,
                'age' => $age,
                'height_id' => $row->height_id ?? null,
                'height_name' => $row->height_name ?? null,
                'education_id' => $row->education_id ?? null,
                'address' => $row->address ?? null,
                'photo_id' => $row->photo_id ?? null,
                'photo_path' => $row->file_path ?? null,
                'liked' => in_array($row->id, $likedIds, true),
                'unliked' => in_array($row->id, $unlikedIds, true),
                'photo_request_pending' => in_array($row->id, $photoRequested, true),
                'photo_request_approved' => in_array($row->id, $photoApproved, true),
                'view_profile_request' => in_array($row->id, $viewProfile, true),
                'mobile_request_pending' => in_array($row->id, $mobileRequested, true),
            ];
        })->values();

        return $this->respond(true, 'Matches list', $data);
    }

    public function search(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $perPage = intval($request->input('per_page', 10));
        $gender = $member->gender;

        $query = Member::where('members.gender', '!=', $gender)
            ->leftJoin('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
            ->leftJoin('heights', 'heights.id', '=', 'member_addional_details.height_id')
            ->leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
            ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
            ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id');

        $searchId = $request->input('search_id');
        if (!empty($searchId)) {
            $query->where(function ($q) use ($searchId) {
                $q->where('members.profile_id', $searchId)
                  ->orWhere('members.id', $searchId);
            });
        }

        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('members.name', 'like', '%' . $keyword . '%')
                  ->orWhere('members.profile_id', 'like', '%' . $keyword . '%')
                  ->orWhere('members.mobile', 'like', '%' . $keyword . '%')
                  ->orWhere('members.email', 'like', '%' . $keyword . '%');
            });
        }

        $ageFrom = $request->input('age_from');
        $ageTo = $request->input('age_to');
        if (!empty($ageFrom) && !empty($ageTo)) {
            $maxDob = Carbon::now()->subYears(intval($ageFrom))->toDateString();
            $minDob = Carbon::now()->subYears(intval($ageTo))->toDateString();
            $query->whereBetween('members.dob', [$minDob, $maxDob]);
        }

        $heightFrom = $request->input('height_from');
        $heightTo = $request->input('height_to');
        if (!empty($heightFrom) && !empty($heightTo)) {
            $query->whereBetween('member_addional_details.height_id', [intval($heightFrom), intval($heightTo)]);
        }

        $results = $query->select(
            'members.id',
            'members.profile_id',
            'members.user_id',
            'members.name',
            'members.gender',
            'members.dob',
            'member_addional_details.height_id',
            'heights.name as height_name',
            'education_details.education_id',
            'education_details.occuption',
            'education_details.company_name',
            'education_details.address',
            'photos.photo_id',
            'upload_files.file_path'
        )
        ->orderBy('members.id', 'desc')
        ->paginate($perPage);

        $data = $results->through(function ($row) {
            $age = $row->dob ? Carbon::parse($row->dob)->age : null;
            return [
                'id' => $row->id,
                'profile_id' => $row->profile_id,
                'user_id' => $row->user_id,
                'name' => $row->name,
                'age' => $age,
                'height_id' => $row->height_id,
                'height_name' => $row->height_name,
                'education_id' => $row->education_id,
                'occupation' => $row->occuption,
                'company_name' => $row->company_name,
                'address' => $row->address,
                'photo_id' => $row->photo_id,
                'photo_path' => $row->file_path,
            ];
        });

        return $this->respond(true, 'Search results', $data);
    }

    public function matchesFilter(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $gender = $member->gender;

        $duration = $request->input('duration'); // 1=7 days, 2=1 month, 3=1 year
        $photo = $request->input('photo');
        $heightMax = $request->input('height');
        $heightMin = $request->input('height1');
        $ageMax = $request->input('age_val');
        $ageMin = $request->input('age_val1');
        $perPage = intval($request->input('per_page', 10));

        $query = Member::from('members')
            ->leftJoin('member_addional_details as mad', 'members.id', '=', 'mad.member_id')
            ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
            ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
            ->where('members.gender', '!=', $gender);

        if (!empty($duration)) {
            $date = Carbon::now();
            if ((int) $duration === 1) {
                $datec = $date->copy()->subDays(7)->toDateString();
            } elseif ((int) $duration === 2) {
                $datec = $date->copy()->subMonth()->toDateString();
            } elseif ((int) $duration === 3) {
                $datec = $date->copy()->subYear()->toDateString();
            } else {
                $datec = null;
            }

            if (!empty($datec)) {
                $query->whereDate('members.created_at', '>=', $datec);
            }
        }

        if (!empty($photo)) {
            $query->whereNotNull('photos.member_id');
        }

        if (!empty($heightMax) && !empty($heightMin)) {
            $query->whereBetween('mad.height_id', [intval($heightMin), intval($heightMax)]);
        }

        if (!empty($ageMax) && !empty($ageMin)) {
            $maxDob = Carbon::now()->subYears(intval($ageMax))->toDateString();
            $minDob = Carbon::now()->subYears(intval($ageMin))->toDateString();
            $query->whereBetween('members.dob', [$minDob, $maxDob]);
        }

        $results = $query->select(
                'members.*',
                'mad.height_id',
                'photos.photo_id',
                'upload_files.file_path'
            )
            ->distinct()
            ->orderBy('members.created_at', 'desc')
            ->paginate($perPage);

        $data = $results->through(function ($row) {
            $age = $row->dob ? Carbon::parse($row->dob)->age : null;
            return [
                'id' => $row->id,
                'profile_id' => $row->profile_id,
                'user_id' => $row->user_id,
                'name' => $row->name,
                'gender' => $row->gender,
                'dob' => $row->dob,
                'age' => $age,
                'height_id' => $row->height_id,
                'photo_id' => $row->photo_id,
                'photo_path' => $row->file_path,
            ];
        });

        return $this->respond(true, 'Matches filter results', [
            'data' => $data,
            'current_page' => $results->currentPage(),
            'last_page' => $results->lastPage(),
            'per_page' => $results->perPage(),
            'total' => $results->total(),
        ]);
    }

    public function featuredProfiles(Request $request)
    {
        $member = $this->getMemberFromToken($request);
        if (!$member) {
            return $this->respond(false, 'Unauthorized', null, 401);
        }

        $gender = $member->gender;
        $memberId = Member::with(['partner_Information'])->where('id', $member->id)->first();
        if (!$memberId) {
            return $this->respond(false, 'Member not found.', null, 404);
        }

        $detailsQuery = Member::where('members.gender', '!=', $gender)
            ->leftJoin('stars', 'members.star_id', '=', 'stars.id')
            ->leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
            ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
            ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
            ->where(function ($query) use ($memberId) {
                if (
                    !$memberId->partner_Information ||
                    $memberId->partner_Information->age_from == 0 ||
                    $memberId->partner_Information->age_from === null ||
                    $memberId->partner_Information->age == 0 ||
                    $memberId->partner_Information->age === null
                ) {
                    $dob = $memberId->dob;
                    $age = $dob ? Carbon::parse($dob)->age : 0;
                    $ageRange = $this->getAgeRange($memberId->gender, $age);
                    $currentDate = Carbon::now();
                    $minDob = $currentDate->copy()->subYears($ageRange['max'])->format('Y-m-d');
                    $maxDob = $currentDate->copy()->subYears($ageRange['min'])->format('Y-m-d');
                    $query->whereBetween('members.dob', [$minDob, $maxDob]);
                } else {
                    $query->whereYear('members.dob', '>=', Carbon::now()->subYears($memberId->partner_Information->age_from)->year)
                          ->whereYear('members.dob', '<=', Carbon::now()->subYears($memberId->partner_Information->age)->year);
                }
            })
            ->orWhere(function ($query) use ($memberId, $gender) {
                $rassiValues = null;
                if ($memberId->partner_Information && isset($memberId->partner_Information->rassi)) {
                    $rassiValues = is_array($memberId->partner_Information->rassi)
                        ? $memberId->partner_Information->rassi
                        : explode(',', $memberId->partner_Information->rassi);
                }
                if ($rassiValues) {
                    $query->where('members.gender', '!=', $gender)
                          ->whereIn('members.raasi_id', $rassiValues);
                }
            })
            ->orWhere(function ($query) use ($memberId, $gender) {
                $starValues = null;
                if ($memberId->partner_Information && isset($memberId->partner_Information->star)) {
                    $starValues = is_array($memberId->partner_Information->star)
                        ? $memberId->partner_Information->star
                        : explode(',', $memberId->partner_Information->star);
                }
                if (!empty($starValues)) {
                    $query->where('members.gender', '!=', $gender)
                          ->whereIn('members.star_id', $starValues);
                }
            })
            ->select(
                'members.id',
                'members.profile_id',
                'members.user_id',
                'members.name',
                'members.gender',
                'members.dob',
                'stars.name as star_name',
                'education_details.address',
                'photos.photo_id',
                'upload_files.file_path'
            )
            ->orderBy('members.dob', 'desc');

        $detailsmatch = $detailsQuery->get();

        if ($detailsmatch->isEmpty()) {
            $detailsmatch = Member::where('members.gender', '!=', $gender)
                ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
                ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
                ->select('members.*', 'photos.photo_id', 'upload_files.file_path')
                ->get();
        }

        $uniqueResults = [];
        $processedMembers = [];
        foreach ($detailsmatch as $result) {
            if (!in_array($result->id, $processedMembers, true)) {
                $uniqueResults[] = $result;
                $processedMembers[] = $result->id;
            }
        }

        $profileIds = collect($uniqueResults)->pluck('id')->toArray();

        $photoRequested = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 4)
            ->where('status', 1)
            ->whereIn('profile_id', $profileIds)
            ->pluck('profile_id')
            ->toArray();

        $photoApproved = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 4)
            ->where('status', 2)
            ->whereIn('profile_id', $profileIds)
            ->pluck('profile_id')
            ->toArray();

        $viewProfile = MemberActivityLog::where('member_id', $member->id)
            ->where('flag', 3)
            ->where('status', 1)
            ->whereIn('profile_id', $profileIds)
            ->pluck('profile_id')
            ->toArray();

        $data = collect($uniqueResults)->map(function ($row) use ($photoRequested, $photoApproved, $viewProfile) {
            $age = $row->dob ? Carbon::parse($row->dob)->age : null;
            return [
                'id' => $row->id,
                'profile_id' => $row->profile_id,
                'user_id' => $row->user_id,
                'name' => $row->name,
                'age' => $age,
                'star_name' => $row->star_name ?? null,
                'address' => $row->address ?? null,
                'photo_id' => $row->photo_id ?? null,
                'photo_path' => $row->file_path ?? null,
                'photo_request_pending' => in_array($row->id, $photoRequested, true),
                'photo_request_approved' => in_array($row->id, $photoApproved, true),
                'view_profile_requested' => in_array($row->id, $viewProfile, true),
            ];
        })->values();

        return $this->respond(true, 'Featured profiles', $data);
    }
}
