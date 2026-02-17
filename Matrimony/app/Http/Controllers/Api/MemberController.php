<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Member;
use App\Models\MemberAddionalDetail;
use App\Models\FamilyDetail;
use App\Models\EducationDetail;


class MemberController extends Controller
{



    // ✅ 1. Basic Info
  public function basicInfo(Request $request)
{
    try {
        $user = JWTAuth::parseToken()->authenticate();
    } catch (\Exception $e) {
        return response()->json(['status' => false, 'message' => 'Invalid or expired token'], 401);
    }

    // Get the logged-in user's member record
    $member = Member::where('user_id', $user->id)->first();

    if (!$member) {
        return response()->json(['status' => false, 'message' => 'Member not found']);
    }

    $member->update([
        'name' => $request->name,
        'association_id' => $request->association_id,
        'created_by_relation' => $request->created_by_relation,
        'email' => $request->email,
        'gender' => $request->gender,
        'dob' => $request->dob,
        'mobile' => $request->mobile,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Basic Info Updated Successfully',
        'data' => $member
    ]);
}

    // ✅ 2. Ethinicity Info
    public function ethinicityInfo(Request $request)
    {
        $member = Member::find(intval($request->member_id));
        if (!$member) {
            return response()->json(['status' => false, 'message' => 'Member not found']);
        }

        $member->update([
            'religion' => $request->religion,
            'mothertongue' => $request->mothertongue,
            'caste' => $request->caste,
            'subcaste' => $request->subcaste,
            'village_temple' => $request->village_temple,
            'family_god' => $request->family_god,
            'language' => is_array($request->language) ? implode(',', $request->language) : $request->language,
        ]);

        return response()->json(['status' => true, 'message' => 'Ethinicity Info Updated Successfully', 'data' => $member]);
    }

    // ✅ 3. Horoscope Info
    public function horoscopeInfo(Request $request)
    {
        $member = Member::find(intval($request->member_id));
        if (!$member) {
            return response()->json(['status' => false, 'message' => 'Member not found']);
        }

        $member->raasi_id = $request->raasi;
        $member->star_id = $request->star;
        $member->hours = $request->hrs;
        $member->mins = $request->mins;
        $member->am_pm = $request->am;
        $member->birth_place = $request->birth_place;

        if ($request->hasFile('horoscope_image')) {
            $imageName = time() . '.' . $request->horoscope_image->extension();
            $request->horoscope_image->move(public_path('assets/images/custom'), $imageName);
            $member->horoscope_image = $imageName;
        }

        $member->dosham = $request->dosham;
        $member->doshamdetail = ($request->dosham == 'Yes' && !empty($request->dosam_detail))
            ? implode(',', $request->dosam_detail)
            : null;

        $member->save();

        return response()->json(['status' => true, 'message' => 'Horoscope Info Updated Successfully', 'data' => $member]);
    }

    // ✅ 4. Profile Info
    public function profileInfo(Request $request)
    {
        $memberAdd = MemberAddionalDetail::firstOrNew(['member_id' => intval($request->member_id)]);

        $memberAdd->body_type = $request->body_composition;
        $memberAdd->height_id = $request->height;
        $memberAdd->weight_id = $request->weight;
        $memberAdd->disablitiy = $request->deficiency ?? 0;
        $memberAdd->eating_habit = $request->eating_habits ?? 0;
        $memberAdd->drinking_habit = $request->alcholism ?? 0;
        $memberAdd->smoking_habit = $request->smoking_habits ?? 0;
        $memberAdd->about_you = $request->about_you;
        $memberAdd->is_active = true;
        $memberAdd->save();

        return response()->json(['status' => true, 'message' => 'Profile Info Updated Successfully', 'data' => $memberAdd]);
    }

    // ✅ 5. Family / Personal Info
    public function personalInfo(Request $request)
    {
        $family = FamilyDetail::firstOrNew(['member_id' => intval($request->member_id)]);

        $family->family_status = $request->family_status;
        $family->family_type = $request->family_type;
        $family->family_values = $request->family_value;
        $family->father_status = $request->paternity;
        $family->mother_status = $request->mother_status;
        $family->number_of_brothers = $request->no_brothers;
        $family->number_of_sisters = $request->no_sisters;
        $family->father_name = $request->father_name;
        $family->mother_name = $request->mother_name;
        $family->brothers_married = $request->brothers_married;
        $family->sisters_married = $request->sisters_married;
        $family->parent_contact_number = $request->parent_contact;
        $family->ancestral_origin = $request->ancestral_origin;
        $family->is_active = true;
        $family->save();

        return response()->json(['status' => true, 'message' => 'Personal Info Updated Successfully', 'data' => $family]);
    }

    // ✅ 6. Address Info
    public function addressInfo(Request $request)
    {
        $member = Member::find(intval($request->member_id));

        if (!$member) {
            return response()->json(['status' => false, 'message' => 'Member not found']);
        }

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
        }

        $member->save();
        return response()->json(['status' => true, 'message' => 'Address Info Updated Successfully', 'data' => $member]);
    }

    // ✅ 7. Professional Info
    public function professionalInfo(Request $request)
    {
        $education_ids = implode(',', $request->education ?? []);
        $college_insts = implode(',', $request->collage_school ?? []);

        $educationDetail = EducationDetail::firstOrNew(['member_id' => intval($request->member_id)]);
        $educationDetail->education_id = $education_ids;
        $educationDetail->college_inst = $college_insts;
        $educationDetail->employee_in = $request->employed_in;
        $educationDetail->is_active = true;
        $educationDetail->save();

        return response()->json(['status' => true, 'message' => 'Professional Info Updated Successfully', 'data' => $educationDetail]);
    }
}
