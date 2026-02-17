<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Models\MemberAddionalDetail;
use App\Models\FamilyDetail;
use App\Models\EducationDetail;
use App\Models\MemberHobby;
use App\Models\PartnerInformation;
use App\Models\Relative;
use App\Models\UploadFile;
use App\Models\Photo;
use App\Models\HoroscopeDetail;
use Illuminate\Support\Facades\DB;

class MemberFormController extends Controller
{
    private function respond(bool $status, string $message, $data = null, int $code = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public function basicAdd(Request $request)
    {
       $member = $request->member;
        $member->update([
            'name' => $request->name,
            'association_id' => $request->association_id,
            'created_by_relation' => $request->created_by_relation,
            'email' => $request->email,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'mobile' => $request->mobile,
        ]);

        return $this->respond(true, 'Basic information saved.', $member);
    }

    public function ethinicityAdd(Request $request)
    {
        $member = $request->member;
        $member->update([
            'religion' => $request->religion,
            'mothertongue' => $request->mothertongue,
            'caste' => $request->caste,
            'subcaste' => $request->subcaste,
            'village_temple' => $request->village_temple,
            'family_god' => $request->family_god,
            'language' => is_array($request->language) ? implode(',', $request->language) : $request->language,
        ]);

        return $this->respond(true, 'Ethinicity information saved.', $member);
    }

    public function horoscopeAdd(Request $request)
    {
        $member = $request->member;

        $member->raasi_id = is_numeric($request->raasi) ? intval($request->raasi) : null;
        $member->star_id = is_numeric($request->star) ? intval($request->star) : null;
        $member->hours = $request->hrs;
        $member->mins = $request->mins;
        $member->am_pm = $request->am;
        $member->birth_place = $request->birth_place;

        if ($request->hasFile('horoscope_image')) {
            $imageName = time() . '.' . $request->horoscope_image->extension();
            $request->horoscope_image->move(public_path('assets/images/custom'), $imageName);
            $member->horoscope_image = $imageName;
        } elseif (!empty($request->old_horoscope_image)) {
            $member->horoscope_image = $request->old_horoscope_image;
        }

        $member->dosham = $request->dosham;
        $member->doshamdetail = ($request->dosham === 'Yes' && !empty($request->dosam_detail))
            ? (is_array($request->dosam_detail) ? implode(',', $request->dosam_detail) : $request->dosam_detail)
            : null;

        $member->save();

        return $this->respond(true, 'Horoscope information saved.', $member);
    }

    public function horoscopeDetailAdd(Request $request)
    {

    $user = $request->user();

    if (!$user) {
        return $this->respond(false, 'Unauthorized', null, 401);
    }

    $member = Member::where('user_id', $user->id)->first();

    if (!$member) {
        return $this->respond(false, 'Member not found', null, 404);
    }

    $detail = HoroscopeDetail::firstOrNew([
        'member_id' => $member->id
    ]);

        $detail->rasi_1 = $request->rasi_1;
        $detail->rasi_2 = $request->rasi_2;
        $detail->rasi_3 = $request->rasi_3;
        $detail->rasi_4 = $request->rasi_4;
        $detail->rasi_5 = $request->rasi_5;
        $detail->rasi_6 = $request->rasi_6;
        $detail->rasi_7 = $request->rasi_7;
        $detail->rasi_8 = $request->rasi_8;
        $detail->rasi_9 = $request->rasi_9;
        $detail->rasi_10 = $request->rasi_10;
        $detail->rasi_11 = $request->rasi_11;
        $detail->rasi_12 = $request->rasi_12;
        $detail->Navamsam_1 = $request->Navamsam_1;
        $detail->Navamsam_2 = $request->Navamsam_2;
        $detail->Navamsam_3 = $request->Navamsam_3;
        $detail->Navamsam_4 = $request->Navamsam_4;
        $detail->Navamsam_5 = $request->Navamsam_5;
        $detail->Navamsam_6 = $request->Navamsam_6;
        $detail->Navamsam_7 = $request->Navamsam_7;
        $detail->Navamsam_8 = $request->Navamsam_8;
        $detail->Navamsam_9 = $request->Navamsam_9;
        $detail->Navamsam_10 = $request->Navamsam_10;
        $detail->Navamsam_11 = $request->Navamsam_11;
        $detail->Navamsam_12 = $request->Navamsam_12;
        $detail->is_active = true;
        $detail->save();

        return $this->respond(true, 'Horoscope detail saved.', $detail);
    }

    public function profileAdd(Request $request)
    {

          $user = $request->user();

if (!$user) {
    return $this->respond(false, 'Unauthorized', null, 401);
}

$member = Member::where('user_id', $user->id)->first();

if (!$member) {
    return $this->respond(false, 'Member not found', null, 404);
}

$detail = MemberAddionalDetail::firstOrNew([
    'member_id' => $member->id
]);

        $detail->body_type = $request->body_composition;
        $detail->height_id = $request->height;
        $detail->weight_id = $request->weight;
        $detail->disablitiy = $request->deficiency ?? 0;
        $detail->eating_habit = $request->eating_habits ?? 0;
        $detail->drinking_habit = $request->alcholism ?? 0;
        $detail->smoking_habit = $request->smoking_habits ?? 0;
        $detail->about_you = $request->about_you;
        $detail->is_active = true;
        $detail->save();

        return $this->respond(true, 'Profile information saved.', $detail);
    }

    public function personalAdd(Request $request)
    {

       // Sanctum authenticated user
    $user = $request->user();

    if (!$user) {
        return $this->respond(false, 'Unauthorized', null, 401);
    }

    // Get member using user_id
    $member = Member::where('user_id', $user->id)->first();

    if (!$member) {
        return $this->respond(false, 'Member not found', null, 404);
    }

    // ✅ Use member->id (INT)
    $detail = FamilyDetail::firstOrNew([
        'member_id' => $member->id
    ]);

        $detail->family_status = $request->family_status;
        $detail->family_type = $request->family_type;
        $detail->family_values = $request->family_value;
        $detail->father_status = $request->paternity;
        $detail->mother_status = $request->mother_status;
        $detail->number_of_brothers = $request->no_brothers;
        $detail->number_of_sisters = $request->no_sisters;
        $detail->father_name = $request->father_name;
        $detail->mother_name = $request->mother_name;
        $detail->brothers_married = $request->brothers_married;
        $detail->sisters_married = $request->sisters_married;
        $detail->parent_contact_number = $request->parent_contact;
        $detail->ancestral_origin = $request->ancestral_origin;
        $detail->is_active = true;
        $detail->save();

        return $this->respond(true, 'Personal information saved.', $detail);
    }

    public function addressAdd(Request $request)
    {
       $member = $request->member;

        $member->state = $request->state;
        $member->city = $request->city;
        $member->taluk = $request->taluk;
        $member->village = $request->village;
        $member->pincode = $request->pincode;
        $member->door_no = $request->doorno;
        $member->land_mark = $request->landmark;
        $member->permanent_address = $request->other_address;

        if ($request->other_address == 2) {
            $member->permanent_state_id = $request->permanent_state ?? null;
            $member->permanent_city_id = $request->permanent_city ?? null;
            $member->permanent_taulk_id = $request->permanent_taluk ?? null;
            $member->permanent_village = $request->permanent_village;
            $member->permanent_pincode = $request->permanent_pincode;
            $member->permanent_door_no = $request->permanent_doorno;
            $member->permanent_land_mark = $request->permanent_landmark;
        } else {
            $member->permanent_state_id = null;
            $member->permanent_city_id = null;
            $member->permanent_taulk_id = null;
            $member->permanent_village = null;
            $member->permanent_pincode = null;
            $member->permanent_door_no = null;
            $member->permanent_land_mark = null;
        }

        $member->save();

        return $this->respond(true, 'Address information saved.', $member);
    }

    public function professionalAdd(Request $request)
    {
        $educationIds = is_array($request->education) ? implode(',', $request->education) : (string) $request->education;
        $collegeInsts = is_array($request->collage_school) ? implode(',', $request->collage_school) : (string) $request->collage_school;

$member = $request->member;

        $detail = EducationDetail::where('member_id', $member)->first();

        if ($detail) {
            $detail->update([
                'education_id' => $educationIds,
                'college_inst' => $collegeInsts,
                'employee_in' => $request->employed_in ?? $detail->employee_in,
                'is_active' => true,
            ]);
        } else {
            $detail = EducationDetail::create([
                'member_id' => $member,
                'education_id' => $educationIds,
                'college_inst' => $collegeInsts,
                'employee_in' => $request->employed_in,
                'is_active' => true,
            ]);
        }

        return $this->respond(true, 'Professional information saved.', $detail);
    }

    public function occupationalAdd(Request $request)
    {

 $user = $request->user();

if (!$user) {
    return $this->respond(false, 'Unauthorized', null, 401);
}

$member = Member::where('user_id', $user->id)->first();

if (!$member) {
    return $this->respond(false, 'Member not found', null, 404);
}

$detail = MemberAddionalDetail::firstOrNew([
    'member_id' => $member->id
]);

        $detail->occuption = $request->profession;
        $detail->company_name = $request->company_name;
        $detail->destination = $request->destination;
        $detail->income = $request->income;
        $detail->location = $request->work_location;

        if ($request->work_location === 'India') {
            $detail->state_id = $request->state;
            $detail->city_id = $request->city;
            $detail->taulk_id = $request->taluk;
            $detail->pincode = $request->pincode;
            $detail->address = $request->address;

            $detail->passport_number = null;
            $detail->visa_type = null;
            $detail->other_country_address = null;
        } elseif ($request->work_location === 'Other_Country') {
            $detail->passport_number = $request->passport_number;
            $detail->visa_type = $request->visa_type;
            $detail->other_country_address = $request->other_country_address;

            $detail->state_id = null;
            $detail->city_id = null;
            $detail->taulk_id = null;
            $detail->pincode = null;
            $detail->address = null;
        }

        $detail->is_active = true;
        $detail->save();

        return $this->respond(true, 'Occupational information saved.', $detail);
    }

    public function hobbiesAdd(Request $request)
    {

  $user = $request->user();

if (!$user) {
    return $this->respond(false, 'Unauthorized', null, 401);
}

$member = Member::where('user_id', $user->id)->first();

if (!$member) {
    return $this->respond(false, 'Member not found', null, 404);
}

$detail = MemberAddionalDetail::firstOrNew([
    'member_id' => $member->id
]);

        $detail->hobbies = is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies;
        $detail->otherhobbies = $request->other_hobbies;
        $detail->music = is_array($request->music) ? implode(',', $request->music) : $request->music;
        $detail->othermusic = $request->other_music;
        $detail->sports = is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies;
        $detail->othersports = $request->other_sports;
        $detail->is_active = true;
        $detail->save();

        return $this->respond(true, 'Hobbies information saved.', $detail);
    }

    public function partnerAdd(Request $request)
    {
       $user = $request->user();

if (!$user) {
    return $this->respond(false, 'Unauthorized', null, 401);
}

$member = Member::where('user_id', $user->id)->first();

if (!$member) {
    return $this->respond(false, 'Member not found', null, 404);
}

$detail = MemberAddionalDetail::firstOrNew([
    'member_id' => $member->id
]);

        $detail->age = $request->age_to;
        $detail->age_from = $request->age_from;
        $detail->height_id = $request->height_to;
        $detail->height_id_from = $request->height_from;
        $detail->religion = $request->per_religion;
        $detail->mother_tongue = $request->par_mother_tongue;
        $detail->caste = $request->par_caste;
        $detail->star = is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star;
        $detail->rassi = is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi;
        $detail->education = is_array($request->education) ? implode(',', $request->education) : $request->education;
        $detail->dosam = $request->par_dhosam;
        $detail->income = $request->par_income;
        $detail->about_you = $request->about_partner;
        $detail->is_active = true;
        $detail->save();

        return $this->respond(true, 'Partner information saved.', $detail);
    }

    public function relativeAdd(Request $request)
    {
      $user = $request->user();

if (!$user) {
    return $this->respond(false, 'Unauthorized', null, 401);
}

$member = Member::where('user_id', $user->id)->first();

if (!$member) {
    return $this->respond(false, 'Member not found', null, 404);
}

$detail = MemberAddionalDetail::firstOrNew([
    'member_id' => $member->id
]);
        $detail->first_relative_name = $request->first_relative_name;
        $detail->first_relative_relation = $request->first_relative_relation;
        $detail->first_relative_bussiness = $request->first_relative_bussiness;
        $detail->first_relative_number = $request->first_relative_number;
        $detail->second_relative_name = $request->second_name;
        $detail->second_relative_relation = $request->second_relation_type;
        $detail->second_relative_bussiness = $request->second_profession;
        $detail->second_relative_number = $request->second_contact;
        $detail->third_relative_name = $request->third_name;
        $detail->third_relative_relation = $request->third_relation_type;
        $detail->third_relative_bussiness = $request->third_profession;
        $detail->third_relative_number = $request->third_contact;
        $detail->is_active = true;
        $detail->save();

        return $this->respond(true, 'Relative information saved.', $detail);
    }

    public function photoAdd(Request $request)
    {


       $member = $request->member;
        $photos = $request->file('photo');
        if (!is_array($photos)) {
            $photos = $photos ? [$photos] : [];
        }

        $oldPhotoPaths = $request->input('up_photo', []);
        if (!is_array($oldPhotoPaths)) {
            $oldPhotoPaths = [$oldPhotoPaths];
        }

        $memberId = $member;
        $saved = [];

        foreach ($photos as $index => $photo) {
            if (!$photo || !$photo->isValid()) {
                continue;
            }

            $existingFilePath = $oldPhotoPaths[$index] ?? null;
            $uploadedFile = $existingFilePath
                ? UploadFile::where('file_path', $existingFilePath)->first()
                : null;

            $sizeInBytes = $photo->getSize();
            $size = $sizeInBytes < 1048576 ? round($sizeInBytes / 1024, 2) . ' KB' : round($sizeInBytes / 1048576, 2) . ' MB';

            $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;

            $destinationPath = public_path('assets/images/photos');
            $photo->move($destinationPath, $imageName);
            $filePath = 'assets/images/photos/' . $imageName;

            if ($uploadedFile) {
                $uploadedFile->update([
                    'file_name' => $imageName,
                    'file_type' => $photo->getClientMimeType(),
                    'file_size' => $size,
                    'file_path' => $filePath,
                    'is_active' => true,
                ]);
            } else {
                $uploadedFile = UploadFile::create([
                    'file_name' => $imageName,
                    'file_type' => $photo->getClientMimeType(),
                    'file_size' => $size,
                    'file_path' => $filePath,
                    'is_active' => true,
                ]);

                Photo::create([
                    'member_id' => $memberId,
                    'photo_id' => $uploadedFile->id,
                    'is_active' => true,
                ]);
            }

            $saved[] = $uploadedFile;
        }

        return $this->respond(true, 'Photos saved.', $saved);
    }

    public function updateAll(Request $request)
    {
$user = $request->user();

    if (!$user) {
        return $this->respond(false, 'Unauthorized', null, 401);
    }

    $member = Member::where('user_id', $user->id)->first();

    if (!$member) {
        return $this->respond(false, 'Member not found.', null, 404);
    }

        $result = DB::transaction(function () use ($request, $member) {
            $member->update([
                'name' => $request->name,
                'association_id' => $request->association_id,
                'created_by_relation' => $request->created_by_relation,
                'email' => $request->email,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'mobile' => $request->mobile,
                'religion' => $request->religion,
                'mothertongue' => $request->mothertongue,
                'caste' => $request->caste,
                'subcaste' => $request->subcaste,
                'village_temple' => $request->village_temple,
                'family_god' => $request->family_god,
                'language' => is_array($request->language) ? implode(',', $request->language) : $request->language,
                'state' => $request->state,
                'city' => $request->city,
                'taluk' => $request->taluk,
                'village' => $request->village,
                'pincode' => $request->pincode,
                'door_no' => $request->doorno,
                'land_mark' => $request->landmark,
                'permanent_address' => $request->other_address,
            ]);

            $member->raasi_id = is_numeric($request->raasi) ? intval($request->raasi) : null;
            $member->star_id = is_numeric($request->star) ? intval($request->star) : null;
            $member->hours = $request->hrs;
            $member->mins = $request->mins;
            $member->am_pm = $request->am;
            $member->birth_place = $request->birth_place;

            if ($request->hasFile('horoscope_image')) {
                $imageName = time() . '.' . $request->horoscope_image->extension();
                $request->horoscope_image->move(public_path('assets/images/custom'), $imageName);
                $member->horoscope_image = $imageName;
            } elseif (!empty($request->old_horoscope_image)) {
                $member->horoscope_image = $request->old_horoscope_image;
            }

            $member->dosham = $request->dosham;
            $member->doshamdetail = ($request->dosham === 'Yes' && !empty($request->dosam_detail))
                ? (is_array($request->dosam_detail) ? implode(',', $request->dosam_detail) : $request->dosam_detail)
                : null;

            if ($request->other_address == 2) {
                $member->permanent_state_id = $request->permanent_state ?? null;
                $member->permanent_city_id = $request->permanent_city ?? null;
                $member->permanent_taulk_id = $request->permanent_taluk ?? null;
                $member->permanent_village = $request->permanent_village;
                $member->permanent_pincode = $request->permanent_pincode;
                $member->permanent_door_no = $request->permanent_doorno;
                $member->permanent_land_mark = $request->permanent_landmark;
            } else {
                $member->permanent_state_id = null;
                $member->permanent_city_id = null;
                $member->permanent_taulk_id = null;
                $member->permanent_village = null;
                $member->permanent_pincode = null;
                $member->permanent_door_no = null;
                $member->permanent_land_mark = null;
            }

            $member->save();

            $profileDetail = MemberAddionalDetail::firstOrNew(['member_id' => $member->id ]);
            $profileDetail->body_type = $request->body_composition;
            $profileDetail->height_id = $request->height;
            $profileDetail->weight_id = $request->weight;
            $profileDetail->disablitiy = $request->deficiency ?? 0;
            $profileDetail->eating_habit = $request->eating_habits ?? 0;
            $profileDetail->drinking_habit = $request->alcholism ?? 0;
            $profileDetail->smoking_habit = $request->smoking_habits ?? 0;
            $profileDetail->about_you = $request->about_you;
            $profileDetail->is_active = true;
            $profileDetail->save();

            $familyDetail = FamilyDetail::firstOrNew(['member_id' => $member->id ]);
            $familyDetail->family_status = $request->family_status;
            $familyDetail->family_type = $request->family_type;
            $familyDetail->family_values = $request->family_value;
            $familyDetail->father_status = $request->paternity;
            $familyDetail->mother_status = $request->mother_status;
            $familyDetail->number_of_brothers = $request->no_brothers;
            $familyDetail->number_of_sisters = $request->no_sisters;
            $familyDetail->father_name = $request->father_name;
            $familyDetail->mother_name = $request->mother_name;
            $familyDetail->brothers_married = $request->brothers_married;
            $familyDetail->sisters_married = $request->sisters_married;
            $familyDetail->parent_contact_number = $request->parent_contact;
            $familyDetail->ancestral_origin = $request->ancestral_origin;
            $familyDetail->is_active = true;
            $familyDetail->save();

            $educationIds = is_array($request->education) ? implode(',', $request->education) : (string) $request->education;
            $collegeInsts = is_array($request->collage_school) ? implode(',', $request->collage_school) : (string) $request->collage_school;

            $educationDetail = EducationDetail::firstOrNew(['member_id' => $member->id ]);
            $educationDetail->education_id = $educationIds;
            $educationDetail->college_inst = $collegeInsts;
            $educationDetail->organization = $request->organization;
            $educationDetail->employee_in = $request->employed_in ?? $educationDetail->employee_in;
            $educationDetail->occuption = $request->profession;
            $educationDetail->company_name = $request->company_name;
            $educationDetail->destination = $request->destination;
            $educationDetail->income = $request->income;
            $educationDetail->location = $request->work_location;

            if ($request->work_location === 'India') {
                $educationDetail->state_id = $request->state;
                $educationDetail->city_id = $request->city;
                $educationDetail->taulk_id = $request->taluk;
                $educationDetail->pincode = $request->pincode;
                $educationDetail->address = $request->address;

                $educationDetail->passport_number = null;
                $educationDetail->visa_type = null;
                $educationDetail->other_country_address = null;
            } elseif ($request->work_location === 'Other_Country') {
                $educationDetail->passport_number = $request->passport_number;
                $educationDetail->visa_type = $request->visa_type;
                $educationDetail->other_country_address = $request->other_country_address;

                $educationDetail->state_id = null;
                $educationDetail->city_id = null;
                $educationDetail->taulk_id = null;
                $educationDetail->pincode = null;
                $educationDetail->address = null;
            }

            $educationDetail->is_active = true;
            $educationDetail->save();

            $hobbyDetail = MemberHobby::firstOrNew(['member_id' => $member->id ]);
            $hobbyDetail->hobbies = is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies;
            $hobbyDetail->otherhobbies = $request->other_hobbies;
            $hobbyDetail->music = is_array($request->music) ? implode(',', $request->music) : $request->music;
            $hobbyDetail->othermusic = $request->other_music;
            $hobbyDetail->sports = is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies;
            $hobbyDetail->othersports = $request->other_sports;
            $hobbyDetail->is_active = true;
            $hobbyDetail->save();

            $partnerDetail = PartnerInformation::firstOrNew(['member_id' => $member->id ]);
            $partnerDetail->age = $request->age_to;
            $partnerDetail->age_from = $request->age_from;
            $partnerDetail->height_id = $request->height_to;
            $partnerDetail->height_id_from = $request->height_from;
            $partnerDetail->religion = $request->per_religion;
            $partnerDetail->mother_tongue = $request->par_mother_tongue;
            $partnerDetail->caste = $request->par_caste;
            $partnerDetail->star = is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star;
            $partnerDetail->rassi = is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi;
            $partnerDetail->education = is_array($request->education) ? implode(',', $request->education) : $request->education;
            $partnerDetail->dosam = $request->par_dhosam;
            $partnerDetail->income = $request->par_income;
            $partnerDetail->about_you = $request->about_partner;
            $partnerDetail->is_active = true;
            $partnerDetail->save();

            $relativeDetail = Relative::firstOrNew(['member_id' => $member->id ]);
            $relativeDetail->first_relative_name = $request->first_relative_name;
            $relativeDetail->first_relative_relation = $request->first_relative_relation;
            $relativeDetail->first_relative_bussiness = $request->first_relative_bussiness;
            $relativeDetail->first_relative_number = $request->first_relative_number;
            $relativeDetail->second_relative_name = $request->second_name;
            $relativeDetail->second_relative_relation = $request->second_relation_type;
            $relativeDetail->second_relative_bussiness = $request->second_profession;
            $relativeDetail->second_relative_number = $request->second_contact;
            $relativeDetail->third_relative_name = $request->third_name;
            $relativeDetail->third_relative_relation = $request->third_relation_type;
            $relativeDetail->third_relative_bussiness = $request->third_profession;
            $relativeDetail->third_relative_number = $request->third_contact;
            $relativeDetail->is_active = true;
            $relativeDetail->save();

            $horoscopeDetail = HoroscopeDetail::firstOrNew(['member_id' => $member->id ]);
            $horoscopeDetail->rasi_1 = $request->rasi_1;
            $horoscopeDetail->rasi_2 = $request->rasi_2;
            $horoscopeDetail->rasi_3 = $request->rasi_3;
            $horoscopeDetail->rasi_4 = $request->rasi_4;
            $horoscopeDetail->rasi_5 = $request->rasi_5;
            $horoscopeDetail->rasi_6 = $request->rasi_6;
            $horoscopeDetail->rasi_7 = $request->rasi_7;
            $horoscopeDetail->rasi_8 = $request->rasi_8;
            $horoscopeDetail->rasi_9 = $request->rasi_9;
            $horoscopeDetail->rasi_10 = $request->rasi_10;
            $horoscopeDetail->rasi_11 = $request->rasi_11;
            $horoscopeDetail->rasi_12 = $request->rasi_12;
            $horoscopeDetail->Navamsam_1 = $request->Navamsam_1;
            $horoscopeDetail->Navamsam_2 = $request->Navamsam_2;
            $horoscopeDetail->Navamsam_3 = $request->Navamsam_3;
            $horoscopeDetail->Navamsam_4 = $request->Navamsam_4;
            $horoscopeDetail->Navamsam_5 = $request->Navamsam_5;
            $horoscopeDetail->Navamsam_6 = $request->Navamsam_6;
            $horoscopeDetail->Navamsam_7 = $request->Navamsam_7;
            $horoscopeDetail->Navamsam_8 = $request->Navamsam_8;
            $horoscopeDetail->Navamsam_9 = $request->Navamsam_9;
            $horoscopeDetail->Navamsam_10 = $request->Navamsam_10;
            $horoscopeDetail->Navamsam_11 = $request->Navamsam_11;
            $horoscopeDetail->Navamsam_12 = $request->Navamsam_12;
            $horoscopeDetail->is_active = true;
            $horoscopeDetail->save();

            $savedPhotos = [];
            if ($request->hasFile('photo') || $request->has('up_photo')) {
                $photos = $request->file('photo');
                if (!is_array($photos)) {
                    $photos = $photos ? [$photos] : [];
                }

                $oldPhotoPaths = $request->input('up_photo', []);
                if (!is_array($oldPhotoPaths)) {
                    $oldPhotoPaths = [$oldPhotoPaths];
                }

                foreach ($photos as $index => $photo) {
                    if (!$photo || !$photo->isValid()) {
                        continue;
                    }

                    $existingFilePath = $oldPhotoPaths[$index] ?? null;
                    $uploadedFile = $existingFilePath
                        ? UploadFile::where('file_path', $existingFilePath)->first()
                        : null;

                    $sizeInBytes = $photo->getSize();
                    $size = $sizeInBytes < 1048576 ? round($sizeInBytes / 1024, 2) . ' KB' : round($sizeInBytes / 1048576, 2) . ' MB';

                    $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $photo->getClientOriginalExtension();
                    $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;

                    $destinationPath = public_path('assets/images/photos');
                    $photo->move($destinationPath, $imageName);
                    $filePath = 'assets/images/photos/' . $imageName;

                    if ($uploadedFile) {
                        $uploadedFile->update([
                            'file_name' => $imageName,
                            'file_type' => $photo->getClientMimeType(),
                            'file_size' => $size,
                            'file_path' => $filePath,
                            'is_active' => true,
                        ]);
                    } else {
                        $uploadedFile = UploadFile::create([
                            'file_name' => $imageName,
                            'file_type' => $photo->getClientMimeType(),
                            'file_size' => $size,
                            'file_path' => $filePath,
                            'is_active' => true,
                        ]);

                        Photo::create([
                            'member_id' => $member->id ,
                            'photo_id' => $uploadedFile->id,
                            'is_active' => true,
                        ]);
                    }

                    $savedPhotos[] = $uploadedFile;
                }
            }

            return [
                'member' => $member,
                'profile' => $profileDetail,
                'family' => $familyDetail,
                'education' => $educationDetail,
                'hobbies' => $hobbyDetail,
                'partner' => $partnerDetail,
                'relative' => $relativeDetail,
                'horoscope_detail' => $horoscopeDetail,
                'photos' => $savedPhotos,
            ];
        });

        return $this->respond(true, 'Profile updated.', $result);
    }

    // ===== Skip APIs (same save logic) =====

    public function basicSkip(Request $request) { return $this->basicAdd($request); }
    public function ethinicitySkip(Request $request) { return $this->ethinicityAdd($request); }
    public function horoscopeSkip(Request $request) { return $this->horoscopeAdd($request); }
    public function horoscopeDetailSkip(Request $request) { return $this->horoscopeDetailAdd($request); }
    public function profileSkip(Request $request) { return $this->profileAdd($request); }
    public function personalSkip(Request $request) { return $this->personalAdd($request); }
    public function addressSkip(Request $request) { return $this->addressAdd($request); }
    public function professionalSkip(Request $request) { return $this->professionalAdd($request); }
    public function occupationalSkip(Request $request) { return $this->occupationalAdd($request); }
    public function hobbySkip(Request $request) { return $this->hobbiesAdd($request); }
    public function partnerSkip(Request $request) { return $this->partnerAdd($request); }
    public function relativeSkip(Request $request) { return $this->relativeAdd($request); }
    public function photoSkip(Request $request) { return $this->photoAdd($request); }
}
