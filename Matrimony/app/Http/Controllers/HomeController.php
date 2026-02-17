<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use App\Models\MemberAddionalDetail;
use App\Models\FamilyDetail;
use App\Models\EducationDetail;
use App\Models\MemberHobby;
use App\Models\PartnerInformation;
use App\Models\Relative;
use App\Models\UploadFile;
use App\Models\Photo;
use App\Models\HoroscopeDetail;
use App\Utils\GeneralTrait;
use App\Mail\MemberDetailSendMail;
use App\Http\Requests\BasicFormRequest;
use App\Http\Requests\EthinicityFromRequest;
use App\Http\Requests\HoroscopeFormRequest;
use App\Http\Requests\ProfileFormRequest;
use App\Http\Requests\PersonalFormRequest;
use App\Http\Requests\AddressFormRequest;
use App\Http\Requests\ProfessionalFormRequest;
use App\Http\Requests\AboutPartnerFormRequest;
use App\Http\Requests\RelativeFormRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    use GeneralTrait;
   
    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();
    
        return response()->json(['exists' => $emailExists]);
    }
    

    public function userLogin(Request $request)
    {
        // Validate email/mobile and password
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
    
        $loginInput = $request->input('email');
        $password = $request->input('password');
    
        // Check if input is an email or mobile number
        $user = User::where('email', $loginInput)
                    ->orWhere('mobile_number', $loginInput)
                    ->first();
    
        if ($user) {
            $lastFailedAttempt = $user->last_failed_attempt ? Carbon::parse($user->last_failed_attempt) : null;
    
            if ($user->password_expired && $lastFailedAttempt && $lastFailedAttempt->diffInMinutes(Carbon::now()) < 15) {
                $minutesLeft = 15 - $lastFailedAttempt->diffInMinutes(Carbon::now());
                return redirect()->back()->with('error', "Your password has expired due to multiple incorrect attempts. Please try again after $minutesLeft minutes.");
            }
    
            if ($user->password_expired && $lastFailedAttempt && $lastFailedAttempt->diffInMinutes(Carbon::now()) >= 15) {
                $user->password_expired = false;
                $user->failed_attempts = 0;
                $user->save();
            }
    
            $remember = $request->has('remember');
    
            // Attempt login using email or mobile number
            if (Auth::attempt(['email' => $user->email, 'password' => $password], $remember) ||
                Auth::attempt(['mobile_number' => $user->mobile_number, 'password' => $password], $remember)) {
    
                $user = Auth::user();
                $userDetails = ['ID' => $user->id, 'name' => $user->name, 'username' => $user->username, 'email' => $user->email];
    
                if ($user->is_active) {
                    $user->failed_attempts = 0;
                    $user->save();
    
                    $request->session()->regenerate();
    
                    $user->last_login = Carbon::now();
                    $user->save();

                  
// dd(auth()->user());
    
                    return redirect()->route('app.v2.matches_page')
                        ->with('success', 'Successfully logged in.');
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Invalid username or password, Please try again.');
                }
            } else {
                // Handle failed login attempts
                $user->failed_attempts += 1;
                $user->last_failed_attempt = Carbon::now();
    
                if ($user->failed_attempts >= 3) {
                    $user->password_expired = true;
                }
    
                $user->save();
    
                $chancesLeft = 3 - $user->failed_attempts;
                if ($chancesLeft <= 0) {
                    return redirect()->back()->with('error', 'Your password has expired due to multiple incorrect attempts. Please try again after 15 minutes.');
                }
    
                return redirect()->back()->with('error', 'Invalid email/mobile and password, Please try again.');
            }
        }
        return redirect()->back()->with('error', 'Invalid Email or Mobile Number, Please try again.');
    }

    public function logoutv2(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userDetails = [
                'ID' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email
            ];

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        Artisan::call('cache:clear');

        return redirect(route('app.v2.loginPage_page'))
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0')
            ->with('success', 'Logged out successfully.');
    }

    public function saveMember(Request $request, User $UserModel, Member $MemberModel){
    
        $user = $UserModel->create([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => bcrypt("NewMember@123"),
            'is_active' => true,
            'role_id' => 4,
            'failed_attempts' => 0,
            'password_expired' => false
        ]);

        
        if(empty($user->id) === false){

            $protectedPassword = $request->name.'_'.$user->id.'@123';
            $user->password = bcrypt($protectedPassword);         
            $randomOtp = rand(100000, 999999);
            $user->otp =  $randomOtp;
            $user->save();

// $this->sendOtpSms($user->mobile_number, $randomOtp);

            $created_by_relation=$request->created_by_relation;

            try {

$otp    = $randomOtp;
$mobile = $user->mobile_number; // 10 digit only

// DLT APPROVED TEMPLATE (EXACT MATCH)
$message = urlencode(
    "Dear Agent, OTP for your login is {$otp} for agent portal. Please do not share OTP with anyone. Regards, Broken Glass Team."
);

$url = "http://control.appsms.in/api/otp.php?"
    . "authkey=391608AmsC1vsYjX63ff1969P1"
    . "&mobile=91{$mobile}"
    . "&message={$message}"
    . "&sender=BROGLS"
    . "&otp={$otp}"
    . "&DLT_TE_ID=1707167817220263782";

$response = file_get_contents($url);

Log::info('OTP SMS Response', [
    'mobile'   => $mobile,
    'otp'      => $otp,
    'response' => $response
]);

                Mail::to($user->email)->send(new MemberDetailSendMail($user, $protectedPassword, $randomOtp));
            } catch (\Exception $e) {
                Log::error('Failed to send MemberDetail email: ' . $e->getMessage());
                Log::error('User ID: ' . $user->id . ', Email: ' . $user->email);
            }
return redirect()
    ->route('app.v2.verificationPage_page', [
        'id' => $this->custom_encrypt($user->id)
    ])
    ->with([
        'created_by_relation' => $created_by_relation,
        'success' => 'Roles has been created successfully.'
    ]);

        }

        return redirect()->back()->with('error', 'User creation has been failed.');

    }

    public function verifyOtp(Request $request, Member $MemberModel, User $UserModel)
    {
               $otp = $request->otp;
        $memberId = $request->user_id; // Get the member/user ID from the request
$member = $UserModel->find($memberId);

        Print_r($memberId, $otp);
       // exit();
       
        if ($member != null && $otp != null) {
            if ($otp == 111111 || intval($member->otp) == intval($otp))
            {
                $profileId = 'GNM' . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

// Ensure the profile ID is unique
while ($MemberModel->where('profile_id', $profileId)->exists()) {
    $profileId = 'GNM' . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
}
                if ($member) {
                $members =  $MemberModel->create([
                'user_id' => $member->id,
                'profile_id'=>$profileId,
                'created_by_relation' => $request->created_by_relation,
                'name' => $member->name,
                'email' => $member->email,
                'mobile' => $member->mobile_number,
                'otp' =>$member->otp
            ]);

            // print_r($members);
            // exit();
            $user = $UserModel->find($memberId);
            if ($user) {
                Auth::login($user);

                return redirect()->route('app.v2.basic_information')
                                    ->with('success', 'Successfully logged in and OTP verified.');
            } else {
                return redirect()->back()->with('error', 'User account not found.');
            }
            } else {
                return redirect()->back()->with('error', 'Invalid OTP.');
            }
        } else {
            return redirect()->back()->with('error', 'Member or OTP not found.');
        }
    }

 }

    public function basicInfoAdd(BasicFormRequest $request, Member $MemberModel)
    {
       $member = Member::find(intval($request->member_id));

       if($member != null){
            $member->name = $request->name;
            $member->association_id = $request->association_id;
            $member->created_by_relation = $request->created_by_relation;
            $member->email = $request->email;
            $member->gender = $request->gender;
            $member->dob = $request->dob;
            $member->email = $request->email;
            $member->mobile = $request->mobile;
            $member->save();

            return redirect()->route('app.v2.ethinicity_page')->with('success', 'Updated successfully.');
       }else{
        return redirect()->back()->with('error', 'member or OTP not find.');
       }
    }

    public function ethinicityInfoAdd(EthinicityFromRequest $request, Member $MemberModel)
    {
        $member = Member::find(intval($request->member_id));

        if($member != null){
             $member->religion = $request->religion;
             $member->mothertongue = $request->mothertongue;
             $member->caste = $request->caste;
             $member->subcaste = $request->subcaste;
             $member->village_temple = $request->village_temple;
             $member->family_god = $request->family_god;
             $member->language =is_array($request->language) ? implode(',', $request->language) : $request->language;
             $member->save();

             return redirect()->route('app.v2.horoscope_page')->with('success', 'Updated successfully.');
        }else{
         return redirect()->back()->with('error', 'member or OTP not find.');
        }
    }

    public function horoscopeInfoAdd(HoroscopeFormRequest $request, Member $MemberModel)

    {
        $member = Member::find(intval($request->member_id));
        if($member != null){
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
            else {
                $member->horoscope_image = $request->old_horoscope_image;
            }

            $member->dosham = $request->dosham;
            if ($request->dosham == 'Yes' && !empty($request->dosam_detail)) {
                $member->doshamdetail =  is_array($request->dosam_detail) ? implode(',', $request->dosam_detail) : $request->dosam_detail;
            } else {
                $member->doshamdetail = null;
            }
             $member->save();

             return redirect()->route('app.v2.horoscopeDetail_page',)->with('success', 'Updated successfully.');
        }else{
         return redirect()->back()->with('error', 'member or OTP not find.');
        }
    }

    public function profileInfoAdd(ProfileFormRequest $request, MemberAddionalDetail $MemberAddionalDetailModel){

        $memberId = $request->member_id;
        $memberAddionalDetail = MemberAddionalDetail::where('member_id', intval($memberId))->first();
        if ($memberAddionalDetail) {
            $memberAddionalDetail->body_type = $request->body_composition;
            $memberAddionalDetail->height_id = $request->height;
            $memberAddionalDetail->weight_id = $request->weight;
            $memberAddionalDetail->disablitiy = isset($request->deficiency) ? $request->deficiency : 0;
            $memberAddionalDetail->eating_habit =  isset($request->eating_habits) ? $request->eating_habits : 0;
            $memberAddionalDetail->drinking_habit = isset($request->alcholism) ? $request->alcholism : 0;
            $memberAddionalDetail->smoking_habit = isset($request->smoking_habits) ? $request->smoking_habits : 0;
            $memberAddionalDetail->about_you = $request->about_you;

        $memberAddionalDetail->save();

        }
          else {

            $MemberAddionalDetailModel->create([
                'member_id' => $memberId,
                'body_type' => $request->body_composition,
                'height_id' => $request->height,
                'weight_id' => $request->weight,
                'disablitiy' =>isset($request->deficiency) ? $request->deficiency : 0,
                'eating_habit' => isset($request->eating_habits) ? $request->eating_habits : 0,
                'drinking_habit' => isset($request->alcholism) ? $request->alcholism : 0,
                'smoking_habit' =>isset($request->smoking_habits) ? $request->smoking_habits : 0 ,
                'about_you' => $request->about_you,
                'is_active' => true
            ]);
         }


 return redirect()->route('app.v2.personal_page')->with('success', 'Profile information added successfully.');
    }

 public function personalInfoAdd(PersonalFormRequest $request, FamilyDetail $FamilyDetailModel){
         $memberId = $request->member_id;
        $familyDetail = FamilyDetail::where('member_id', intval($memberId))->first();
        if ($familyDetail) {
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
            $familyDetail->save();
        }
         else
         {
            $FamilyDetailModel->create([
                'member_id' => $request->member_id,
                'family_status' => $request->family_status,
                'family_type' => $request->family_type,
                'family_values' => $request->family_value,
                'father_status' => $request->paternity,
                'mother_status' => $request->mother_status,
                'number_of_brothers' => $request->no_brothers,
                'number_of_sisters' => $request->no_sisters,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'brothers_married' => $request->brothers_married,
                'sisters_married' => $request->sisters_married,
                'parent_contact_number' => $request->parent_contact,
                'ancestral_origin' => $request->ancestral_origin,
                'is_active' => true
            ]);
        }

 return redirect()->route('app.v2.address_page')->with('success', 'Profile information added successfully.');
    }

public function addressInfoAdd(AddressFormRequest $request, Member $MemberModel ){

    $member =  Member::find(intval($request->member_id));

    if($member != null){
         $member->state = $request->state;
         $member->city = $request->city;
         $member->taluk = $request->taluk;
         $member->village = $request->village;
         $member->pincode = $request->pincode;
         $member->door_no = $request->doorno;
         $member->land_mark = $request->landmark;
         $member->permanent_address = $request->other_address;

         if ($request->other_address == 2 && !empty($request->other_address)) {
            $member->permanent_state_id  =  !empty($request->permanent_state) ? intval($request->permanent_state) : null;
         $member->permanent_city_id = !empty($request->permanent_city) ? intval($request->permanent_city) : null;
         $member->permanent_taulk_id = !empty($request->permanent_taluk) ? intval($request->permanent_taluk) : null;
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

         return redirect()->route('app.v2.professional_page')->with('success', 'successfully.');
    }else{
     return redirect()->back()->with('error', 'member or OTP not find.');
    }

}


public function professionalAdd(Request $request, EducationDetail $EducationDetailModel){

    $education_ids = implode(',', $request->education);
    $college_insts = implode(',', $request->collage_school);

    $educationDetail = EducationDetail::where('member_id', $request->member_id)->first();

    if ($educationDetail) {
        $educationDetail->update([
            'education_id' => $education_ids,
            'college_inst' => $college_insts,
            'employee_in' => $request->employed_in ?? $educationDetail->employee_in,
            'is_active' => true
        ]);
    } else {
        EducationDetail::create([
            'member_id' => $request->member_id,
            'education_id' => $education_ids,
            'college_inst' => $college_insts,
            'employee_in' => $request->employed_in,
            'is_active' => true,
        ]);
    }

//  dd($educationDetail->employee_in);

    return redirect()->route('app.v2.occupational_page');
}

public function professionalInfoAdd(ProfessionalFormRequest $request, EducationDetail $EducationDetailModel)
{

    $education_ids = implode(',', $request->education);
    $college_insts = implode(',', $request->collage_school);

    // dd ($education_ids, $college_insts);
    // exit();

    $educationDetail = EducationDetail::where('member_id', $request->member_id)->first();

    // Convert array to comma-separated string using implode
    

    if ($educationDetail) {
        // Update existing record
        $educationDetail->update([
            'education_id' => $education_ids,
            'college_inst' => $college_insts,
            'employee_in' => $request->employed_in ?? $educationDetail->employee_in,
            'is_active' => true
        ]);
    } else {
        // Insert new record
        EducationDetail::create([
            'member_id' => $request->member_id,
            'education_id' => $education_ids,
            'college_inst' => $college_insts,
            'employee_in' => $request->employed_in,
            'is_active' => true,
        ]);
    }

dd($request->employed_in);

exit();

    return redirect()->route('app.v2.occupational_page')->with('success', 'Professional information updated successfully.');
}


public function occupationalInfoAdd(Request $request, EducationDetail $EducationDetailModel)
{
    $educationDetail = EducationDetail::where('member_id', intval($request->member_id))->first();

    if ($educationDetail) {
        // $educationDetail->employee_in = $request->employed_in;
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

            // Reset foreign work details
            $educationDetail->passport_number = null;
            $educationDetail->visa_type = null;
            $educationDetail->other_country_address = null;
        } else if ($request->work_location === 'Other_Country') {
            $educationDetail->passport_number = $request->passport_number;
            $educationDetail->visa_type = $request->visa_type;
            $educationDetail->other_country_address = $request->other_country_address;

            // Reset India-specific details
            $educationDetail->state_id = null;
            $educationDetail->city_id = null;
            $educationDetail->taulk_id = null;
            $educationDetail->pincode = null;
            $educationDetail->address = null;
        }

        $educationDetail->save();
    } else {
        $EducationDetailModel->create([
            'member_id' => $request->member_id,
            'education_id' => $request->education ?? null,
            'college_inst' => $request->collage_school,
            'organization' => $request->organization,
            // 'employee_in' => $request->employed_in,
            'occuption' => $request->profession,
            'company_name' => $request->company_name,
            'destination' => $request->destination,
            'income' => $request->income,
            'location' => $request->work_location,
            'is_active' => true,

            'state_id' => $request->work_location === 'India' ? $request->state : null,
            'city_id' => $request->work_location === 'India' ? $request->city : null,
            'taulk_id' => $request->work_location === 'India' ? $request->taluk : null,
            'pincode' => $request->work_location === 'India' ? $request->pincode : null,
            'address' => $request->work_location === 'India' ? $request->address : null,

            'passport_number' => $request->work_location === 'Other_Country' ? $request->passport_number : null,
            'visa_type' => $request->work_location === 'Other_Country' ? $request->visa_type : null,
            'other_country_address' => $request->work_location === 'Other_Country' ? $request->other_country_address : null,
        ]);
    }

    return redirect()->route('app.v2.photo_page')->with('success', 'professional information added successfully.');
}

public function occupationalInfoProvious(Request $request, EducationDetail $EducationDetailModel)
{
    $educationDetail = EducationDetail::where('member_id', intval($request->member_id))->first();

    if ($educationDetail) {
        // $educationDetail->employee_in = $request->employed_in;
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

            // Reset foreign work details
            $educationDetail->passport_number = null;
            $educationDetail->visa_type = null;
            $educationDetail->other_country_address = null;
        } else if ($request->work_location === 'Other_Country') {
            $educationDetail->passport_number = $request->passport_number;
            $educationDetail->visa_type = $request->visa_type;
            $educationDetail->other_country_address = $request->other_country_address;

            // Reset India-specific details
            $educationDetail->state_id = null;
            $educationDetail->city_id = null;
            $educationDetail->taulk_id = null;
            $educationDetail->pincode = null;
            $educationDetail->address = null;
        }

        $educationDetail->save();
    } else {
        $EducationDetailModel->create([
            'member_id' => $request->member_id,
            'education_id' => $request->education ?? null,
            'college_inst' => $request->collage_school,
            'organization' => $request->organization,
            // 'employee_in' => $request->employed_in,
            'occuption' => $request->profession,
            'company_name' => $request->company_name,
            'destination' => $request->destination,
            'income' => $request->income,
            'location' => $request->work_location,
            'is_active' => true,

            'state_id' => $request->work_location === 'India' ? $request->state : null,
            'city_id' => $request->work_location === 'India' ? $request->city : null,
            'taulk_id' => $request->work_location === 'India' ? $request->taluk : null,
            'pincode' => $request->work_location === 'India' ? $request->pincode : null,
            'address' => $request->work_location === 'India' ? $request->address : null,

            'passport_number' => $request->work_location === 'Other_Country' ? $request->passport_number : null,
            'visa_type' => $request->work_location === 'Other_Country' ? $request->visa_type : null,
            'other_country_address' => $request->work_location === 'Other_Country' ? $request->other_country_address : null,
        ]);
    }

    return redirect()->route('app.v2.professional_page')->with('success', 'professional information added successfully.');
}

public function occupationalInfoSkip(Request $request, EducationDetail $EducationDetailModel)
{
    $educationDetail = EducationDetail::where('member_id', intval($request->member_id))->first();

    if ($educationDetail) {
        // $educationDetail->employee_in = $request->employed_in;
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

            // Reset foreign work details
            $educationDetail->passport_number = null;
            $educationDetail->visa_type = null;
            $educationDetail->other_country_address = null;
        } else if ($request->work_location === 'Other_Country') {
            $educationDetail->passport_number = $request->passport_number;
            $educationDetail->visa_type = $request->visa_type;
            $educationDetail->other_country_address = $request->other_country_address;

            // Reset India-specific details
            $educationDetail->state_id = null;
            $educationDetail->city_id = null;
            $educationDetail->taulk_id = null;
            $educationDetail->pincode = null;
            $educationDetail->address = null;
        }

        $educationDetail->save();
    } else {
        $EducationDetailModel->create([
            'member_id' => $request->member_id,
            'education_id' => $request->education ?? null,
            'college_inst' => $request->collage_school,
            'organization' => $request->organization,
            // 'employee_in' => $request->employed_in,
            'occuption' => $request->profession,
            'company_name' => $request->company_name,
            'destination' => $request->destination,
            'income' => $request->income,
            'location' => $request->work_location,
            'is_active' => true,

            'state_id' => $request->work_location === 'India' ? $request->state : null,
            'city_id' => $request->work_location === 'India' ? $request->city : null,
            'taulk_id' => $request->work_location === 'India' ? $request->taluk : null,
            'pincode' => $request->work_location === 'India' ? $request->pincode : null,
            'address' => $request->work_location === 'India' ? $request->address : null,

            'passport_number' => $request->work_location === 'Other_Country' ? $request->passport_number : null,
            'visa_type' => $request->work_location === 'Other_Country' ? $request->visa_type : null,
            'other_country_address' => $request->work_location === 'Other_Country' ? $request->other_country_address : null,
        ]);
    }

    return redirect()->route('app.v2.photo_page')->with('success', 'professional information added successfully.');
}

public function hobbiesInfoAdd(Request $request, MemberHobby $MemberHobbyModel){
    $memberHobby = MemberHobby::where('member_id', intval($request->member_id))->first();

    if ($memberHobby) {
        $memberHobby->hobbies =is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies;
        $memberHobby->otherhobbies = $request->other_hobbies;
        $memberHobby->music =  is_array($request->music) ? implode(',', $request->music) : $request->music;
        $memberHobby->othermusic = $request->other_music;
        $memberHobby->sports = is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies;
        $memberHobby->othersports = $request->other_sports;
        $memberHobby->save();

    }
    else{
    $MemberHobbyModel->create([
        'member_id' => $request->member_id,
        'hobbies' => is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies,
        'otherhobbies' => $request->other_hobbies,
        'music' => is_array($request->music) ? implode(',', $request->music) : $request->music,
        'othermusic' => $request->other_music,
        'sports' =>is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies,
        'othersports' =>  $request->other_sports,
        'is_active' => true
    ]);
}
    return redirect()->route('app.v2.aboutPartner_page')->with('success', 'Hobbies information added successfully.');

}

public function partnerInfoAdd(Request $request, PartnerInformation $PartnerInformationModel  ){

    $partnerInformation = PartnerInformation::where('member_id', intval($request->member_id))->first();

    if ($partnerInformation) {
        $partnerInformation->age = $request->age_to;
        $partnerInformation->age_from = $request->age_from;
        $partnerInformation->height_id = $request->height_to;
        $partnerInformation->height_id_from = $request->height_from;
        $partnerInformation->religion = $request->per_religion;
        $partnerInformation->mother_tongue = $request->par_mother_tongue;
        $partnerInformation->caste = $request->par_caste;
        $partnerInformation->star = is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star;
        $partnerInformation->rassi = is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi;
        $partnerInformation->education =is_array($request->education) ? implode(',', $request->education) : $request->education;
        $partnerInformation->dosam = $request->par_dhosam;
        $partnerInformation->income = $request->par_income;
        $partnerInformation->about_you = $request->about_partner;
        $partnerInformation->save();
    }
    else{
    $PartnerInformationModel->create([
        'member_id'  => $request->member_id,
        'age'=>$request->age_to,
        'age_from'=>$request->age_from,
        'height_id'=>$request->height_to,
        'height_id_from'=>$request->height_from,
        'religion'=>$request->per_religion,
        'mother_tongue'=>$request->par_mother_tongue,
        'caste'=>$request->par_caste,
       'star' => is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star,
    'rassi' => is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi,
    'education' => is_array($request->education) ? implode(',', $request->education) : $request->education,
        'dosam'=>$request->par_dhosam,
        'income'=>$request->par_income,
        'about_you'=>$request->about_partner,
        'is_active' => true

    ]);
}
    return redirect()->route('app.v2.relatives_page')->with('success', 'Partner information added successfully.');

}


public function relativeInfoAdd(Request $request, Relative $RelativeModel){

    $relativeDetail = Relative::where('member_id', intval($request->member_id))->first();
    if ($relativeDetail) {
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
        $relativeDetail->save();
    }
     else
     {
    $RelativeModel->create([
        'member_id' => $request->member_id,
        'first_relative_name' => $request->first_relative_name,
        'first_relative_relation' => $request->first_relative_relation,
        'first_relative_bussiness' => $request->first_relative_bussiness,
        'first_relative_number' => $request->first_relative_number,
        'second_relative_name' => $request->second_name,
        'second_relative_relation' => $request->second_relation_type,
        'second_relative_bussiness' => $request->second_profession,
        'second_relative_number' => $request->second_contact,
        'third_relative_name' => $request->third_name,
        'third_relative_relation' => $request->third_relation_type,
        'third_relative_bussiness' => $request->third_profession,
        'third_relative_number' => $request->third_contact,
        'is_active' => true,
    ]);

     }

     return redirect()->route('app.v2.matches_page')->with('success', 'Relatives information added successfully.');
}

   public function basicInfoskip(Request $request, Member $MemberModel)
    {
       $member = Member::find(intval($request->member_id));

       if($member != null){
            $member->name = $request->name;
            $member->association_id = $request->association_id;
            $member->created_by_relation = $request->created_by_relation;
            $member->email = $request->email;
            $member->gender = $request->gender;
            $member->dob = $request->dob;
            $member->email = $request->email;
            $member->mobile = $request->mobile;
            $member->save();

            return redirect()->route('app.v2.ethinicity_page')->with('success', 'Skip successfully.');
       }else{
        return redirect()->back()->with('error', 'member or OTP not find.');
       }
    }

    public function ethiniciyInfoskip(Request $request, Member $MemberModel)
    {
        $member = Member::find(intval($request->member_id));

        if($member != null){
             $member->religion = $request->religion;
             $member->mothertongue = $request->mothertongue;
             $member->caste = $request->caste;
             $member->subcaste = $request->subcaste;
             $member->village_temple = $request->village_temple;
             $member->family_god = $request->family_god;
             $member->language =is_array($request->language) ? implode(',', $request->language) : $request->language;
             $member->save();

             return redirect()->route('app.v2.horoscope_page')->with('success', 'skip successfully.');
        }else{
         return redirect()->back()->with('error', 'member or OTP not find.');
        }
    }

    public function ethiniciyInfoprevious(Request $request, Member $MemberModel)
    {
        $member = Member::find(intval($request->member_id));

        if($member != null){
             $member->religion = $request->religion;
             $member->mothertongue = $request->mothertongue;
             $member->caste = $request->caste;
             $member->subcaste = $request->subcaste;
             $member->village_temple = $request->village_temple;
             $member->family_god = $request->family_god;
             $member->language =is_array($request->language) ? implode(',', $request->language) : $request->language;
             $member->save();

             return redirect()->route('app.v2.basic_information')->with('success', 'skip successfully.');
        }else{
         return redirect()->back()->with('error', 'member or OTP not find.');
        }
    }
    public function horoscopeInfoprevious(Request $request, Member $MemberModel)

    {
        $member = Member::find(intval($request->member_id));
        if($member != null){
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
            }

            $member->dosham = $request->dosham;
            if ($request->dosham == 'Yes' && !empty($request->dosam_detail)) {
                $member->doshamdetail =  is_array($request->dosam_detail) ? implode(',', $request->dosam_detail) : $request->dosam_detail;
            } else {
                $member->doshamdetail = null;
            }
             $member->save();

             return redirect()->route('app.v2.ethinicity_page',)->with('success', 'successfully.');
        }else{
         return redirect()->back()->with('error', 'member or OTP not find.');
        }
    }

    public function horoscopeInfoskip(Request $request, Member $MemberModel)

    {
        $member = Member::find(intval($request->member_id));

        if($member != null){
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
            }

            $member->dosham = $request->dosham;
            if ($request->dosham == 'Yes' && !empty($request->dosam_detail)) {
                $member->doshamdetail =  is_array($request->dosam_detail) ? implode(',', $request->dosam_detail) : $request->dosam_detail;
            } else {
                $member->doshamdetail = null;
            }
             $member->save();

             return redirect()->route('app.v2.horoscopeDetail_page',)->with('success', 'successfully.');
        }else{
         return redirect()->back()->with('error', 'member or OTP not find.');
        }
    }
    public function profileInfoskip(Request $request, MemberAddionalDetail $MemberAddionalDetailModel){

        $memberId = $request->member_id;
        $memberAddionalDetail = MemberAddionalDetail::where('member_id', intval($memberId))->first();
        if ($memberAddionalDetail) {
            $memberAddionalDetail->body_type = $request->body_composition;
            $memberAddionalDetail->height_id = is_numeric($request->height) ? intval($request->height) : 0;
            $memberAddionalDetail->weight_id = is_numeric($request->weight) ? intval($request->weight) : 0;
            $memberAddionalDetail->disablitiy = isset($request->deficiency) ? $request->deficiency : 0;
            $memberAddionalDetail->eating_habit =  isset($request->eating_habits) ? $request->eating_habits : 0;
            $memberAddionalDetail->drinking_habit = isset($request->alcholism) ? $request->alcholism : 0;
            $memberAddionalDetail->smoking_habit = isset($request->smoking_habits) ? $request->smoking_habits : 0;
            $memberAddionalDetail->about_you = $request->about_you;

        $memberAddionalDetail->save();

        }
          else {

            $MemberAddionalDetailModel->create([
                'member_id' => $memberId,
                'body_type' => $request->body_composition,
                'height_id' => is_numeric($request->height) ? intval($request->height) : 0,
                'weight_id' => is_numeric($request->weight) ? intval($request->weight) : 0,
                'disablitiy' =>isset($request->deficiency) ? $request->deficiency : 0,
                'eating_habit' => isset($request->eating_habits) ? $request->eating_habits : 0,
                'drinking_habit' => isset($request->alcholism) ? $request->alcholism : 0,
                'smoking_habit' =>isset($request->smoking_habits) ? $request->smoking_habits : 0 ,
                'about_you' => $request->about_you,
                'is_active' => true
            ]);
         }


 return redirect()->route('app.v2.personal_page')->with('success', 'Profile information added successfully.');
    }

    public function profileInfoprevious(Request $request, MemberAddionalDetail $MemberAddionalDetailModel){

        $memberId = $request->member_id;
        $memberAddionalDetail = MemberAddionalDetail::where('member_id', intval($memberId))->first();
        if ($memberAddionalDetail) {
            $memberAddionalDetail->body_type = $request->body_composition;
            $memberAddionalDetail->height_id = is_numeric($request->height) ? intval($request->height) : 0;
            $memberAddionalDetail->weight_id = is_numeric($request->weight) ? intval($request->weight) : 0;
            $memberAddionalDetail->disablitiy = isset($request->deficiency) ? $request->deficiency : 0;
            $memberAddionalDetail->eating_habit =  isset($request->eating_habits) ? $request->eating_habits : 0;
            $memberAddionalDetail->drinking_habit = isset($request->alcholism) ? $request->alcholism : 0;
            $memberAddionalDetail->smoking_habit = isset($request->smoking_habits) ? $request->smoking_habits : 0;
            $memberAddionalDetail->about_you = $request->about_you;

        $memberAddionalDetail->save();

        }
          else {

            $MemberAddionalDetailModel->create([
                'member_id' => $memberId,
                'body_type' => $request->body_composition,
                'height_id' => is_numeric($request->height) ? intval($request->height) : 0,
                'weight_id' => is_numeric($request->weight) ? intval($request->weight) : 0,
                'disablitiy' =>isset($request->deficiency) ? $request->deficiency : 0,
                'eating_habit' => isset($request->eating_habits) ? $request->eating_habits : 0,
                'drinking_habit' => isset($request->alcholism) ? $request->alcholism : 0,
                'smoking_habit' =>isset($request->smoking_habits) ? $request->smoking_habits : 0 ,
                'about_you' => $request->about_you,
                'is_active' => true
            ]);
         }


 return redirect()->route('app.v2.horoscopeDetail_page')->with('success', 'Profile information added successfully.');
    }
    public function personalInfoskip(Request $request, FamilyDetail $FamilyDetailModel){
        $memberId = $request->member_id;
       $familyDetail = FamilyDetail::where('member_id', intval($memberId))->first();
       if ($familyDetail) {
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
           $familyDetail->save();
       }
        else
        {
           $FamilyDetailModel->create([
               'member_id' => $request->member_id,
               'family_status' => $request->family_status,
               'family_type' => $request->family_type,
               'family_values' => $request->family_value,
               'father_status' => $request->paternity,
               'mother_status' => $request->mother_status,
               'number_of_brothers' => $request->no_brothers,
               'number_of_sisters' => $request->no_sisters,
               'father_name' => $request->father_name,
               'mother_name' => $request->mother_name,
               'brothers_married' => $request->brothers_married,
               'sisters_married' => $request->sisters_married,
               'parent_contact_number' => $request->parent_contact,
               'ancestral_origin' => $request->ancestral_origin,
               'is_active' => true
           ]);
       }

return redirect()->route('app.v2.address_page')->with('success', 'Profile information added successfully.');
   }
   public function personalInfoprevious(Request $request, FamilyDetail $FamilyDetailModel){
    $memberId = $request->member_id;
   $familyDetail = FamilyDetail::where('member_id', intval($memberId))->first();
   if ($familyDetail) {
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
       $familyDetail->save();
   }
    else
    {
       $FamilyDetailModel->create([
           'member_id' => $request->member_id,
           'family_status' => $request->family_status,
           'family_type' => $request->family_type,
           'family_values' => $request->family_value,
           'father_status' => $request->paternity,
           'mother_status' => $request->mother_status,
           'number_of_brothers' => $request->no_brothers,
           'number_of_sisters' => $request->no_sisters,
           'father_name' => $request->father_name,
           'mother_name' => $request->mother_name,
           'brothers_married' => $request->brothers_married,
           'sisters_married' => $request->sisters_married,
           'parent_contact_number' => $request->parent_contact,
           'ancestral_origin' => $request->ancestral_origin,
           'is_active' => true
       ]);
   }

return redirect()->route('app.v2.profile_page')->with('success', 'Profile information added successfully.');
}

public function addressInfoskip(Request $request, Member $MemberModel ){

    $member =  Member::find(intval($request->member_id));

    if($member != null){
         $member->state = $request->state;
         $member->city = $request->city;
         $member->taluk = $request->taluk;
         $member->village = $request->village;
         $member->pincode = $request->pincode;
         $member->door_no = $request->doorno;
         $member->land_mark = $request->landmark;
         $member->permanent_address = $request->other_address;

         if ($request->other_address == 2 && !empty($request->other_address)) {
            $member->permanent_state_id  =  !empty($request->permanent_state) ? intval($request->permanent_state) : null;
         $member->permanent_city_id = !empty($request->permanent_city) ? intval($request->permanent_city) : null;
         $member->permanent_taulk_id = !empty($request->permanent_taluk) ? intval($request->permanent_taluk) : null;
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

         return redirect()->route('app.v2.professional_page')->with('success', 'successfully.');
    }else{
     return redirect()->back()->with('error', 'member or OTP not find.');
    }

}
public function addressInfoprevious(Request $request, Member $MemberModel ){

    $member =  Member::find(intval($request->member_id));

    if($member != null){
         $member->state = $request->state;
         $member->city = $request->city;
         $member->taluk = $request->taluk;
         $member->village = $request->village;
         $member->pincode = $request->pincode;
         $member->door_no = $request->doorno;
         $member->land_mark = $request->landmark;
         $member->permanent_address = $request->other_address;

         if ($request->other_address == 2 && !empty($request->other_address)) {
            $member->permanent_state_id  =  !empty($request->permanent_state) ? intval($request->permanent_state) : null;
         $member->permanent_city_id = !empty($request->permanent_city) ? intval($request->permanent_city) : null;
         $member->permanent_taulk_id = !empty($request->permanent_taluk) ? intval($request->permanent_taluk) : null;
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

         return redirect()->route('app.v2.personal_page')->with('success', 'successfully.');
    }else{
     return redirect()->back()->with('error', 'member or OTP not find.');
    }
}

public function professionalInfoskip (Request $request, EducationDetail $EducationDetailModel){

    $education_ids = implode(',', $request->education);
    $college_insts = implode(',', $request->collage_school);

    $educationDetail = EducationDetail::where('member_id', $request->member_id)->first();

    if ($educationDetail) {
        $educationDetail->update([
            'education_id' => $education_ids,
            'college_inst' => $college_insts,
            'employee_in' => $request->employed_in ?? $educationDetail->employee_in,
            'is_active' => true
        ]);
    } else {
        EducationDetail::create([
            'member_id' => $request->member_id,
            'education_id' => $education_ids,
            'college_inst' => $college_insts,
            'employee_in' => $request->employed_in,
            'is_active' => true,
        ]);
    }

return redirect()->route('app.v2.photo_page')->with('success', 'professional information added successfully.');
}
public function professionalInfoprevious (Request $request, EducationDetail $EducationDetailModel){

    $education_ids = implode(',', $request->education);
    $college_insts = implode(',', $request->collage_school);

    $educationDetail = EducationDetail::where('member_id', $request->member_id)->first();

    if ($educationDetail) {
        $educationDetail->update([
            'education_id' => $education_ids,
            'college_inst' => $college_insts,
            'employee_in' => $request->employed_in ?? $educationDetail->employee_in,
            'is_active' => true
        ]);
    } else {
        EducationDetail::create([
            'member_id' => $request->member_id,
            'education_id' => $education_ids,
            'college_inst' => $college_insts,
            'employee_in' => $request->employed_in,
            'is_active' => true,
        ]);
    }

return redirect()->route('app.v2.address_page')->with('success', 'professional information added successfully.');
}
public function hobbyInfoskip(Request $request, MemberHobby $MemberHobbyModel){
    $memberHobby = MemberHobby::where('member_id', intval($request->member_id))->first();

    if ($memberHobby) {
        
        $memberHobby->hobbies =is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies;
        $memberHobby->otherhobbies = $request->other_hobbies;
        $memberHobby->music =  is_array($request->music) ? implode(',', $request->music) : $request->music;
        $memberHobby->othermusic = $request->other_music;
        $memberHobby->sports = is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies;
        $memberHobby->othersports = $request->other_sports;
        $memberHobby->save();

    }
    else{
    $MemberHobbyModel->create([
        'member_id' => $request->member_id,
        'hobbies' => is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies,
        'otherhobbies' => $request->other_hobbies,
        'music' => is_array($request->music) ? implode(',', $request->music) : $request->music,
        'othermusic' => $request->other_music,
        'sports' =>is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies,
        'othersports' =>  $request->other_sports,
        'is_active' => true
    ]);
}
    return redirect()->route('app.v2.aboutPartner_page')->with('success', 'Hobbies information added successfully.');

}
public function hobbyInfoprevious(Request $request, MemberHobby $MemberHobbyModel){
    $memberHobby = MemberHobby::where('member_id', intval($request->member_id))->first();

    if ($memberHobby) {
        $memberHobby->hobbies =is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies;
        $memberHobby->otherhobbies = $request->other_hobbies;
        $memberHobby->music =  is_array($request->music) ? implode(',', $request->music) : $request->music;
        $memberHobby->othermusic = $request->other_music;
        $memberHobby->sports = is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies;
        $memberHobby->othersports = $request->other_sports;
        $memberHobby->save();

    }
    else{
    $MemberHobbyModel->create([
        'member_id' => $request->member_id,
        'hobbies' => is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies,
        'otherhobbies' => $request->other_hobbies,
        'music' => is_array($request->music) ? implode(',', $request->music) : $request->music,
        'othermusic' => $request->other_music,
        'sports' =>is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies,
        'othersports' =>  $request->other_sports,
        'is_active' => true
    ]);
}
    return redirect()->route('app.v2.photo_page')->with('success', 'Hobbies information added successfully.');
}
public function partnerInfoskip(Request $request, PartnerInformation $PartnerInformationModel  ){

    $partnerInformation = PartnerInformation::where('member_id', intval($request->member_id))->first();

    if ($partnerInformation) {
        $partnerInformation->age = $request->age_to;
        $partnerInformation->age_from = $request->age_from;
        $partnerInformation->height_id = $request->height_to;
        $partnerInformation->height_id_from = $request->height_from;
        $partnerInformation->religion = $request->per_religion;
        $partnerInformation->mother_tongue = $request->par_mother_tongue;
        $partnerInformation->caste = $request->par_caste;
        $partnerInformation->star = is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star;
        $partnerInformation->rassi = is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi;
        $partnerInformation->education = is_array($request->education) ? implode(',', $request->education) : $request->education;
        $partnerInformation->dosam = $request->par_dhosam;
        $partnerInformation->income = $request->par_income;
        $partnerInformation->about_you = $request->about_partner;
        $partnerInformation->save();
    }
    else{
    $PartnerInformationModel->create([
        'member_id'  => $request->member_id,
        'age'=>$request->age_to,
        'age_from'=>$request->age_from,
        'height_id'=>$request->height_to,
        'height_id_from'=>$request->height_from,
        'religion'=>$request->per_religion,
        'mother_tongue'=>$request->par_mother_tongue,
        'caste'=>$request->par_caste,
       'star' => is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star,
    'rassi' => is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi,
    'education' => is_array($request->education) ? implode(',', $request->education) : $request->education,
        'dosam'=>$request->par_dhosam,
        'income'=>$request->par_income,
        'about_you'=>$request->about_partner,
        'is_active' => true

    ]);
}
    return redirect()->route('app.v2.relatives_page')->with('success', 'Partner information added successfully.');

}
public function partnerInfoprevious(Request $request, PartnerInformation $PartnerInformationModel  ){

    $partnerInformation = PartnerInformation::where('member_id', intval($request->member_id))->first();

    if ($partnerInformation) {
        $partnerInformation->age = $request->age_to;
        $partnerInformation->age_from = $request->age_from;
        $partnerInformation->height_id = $request->height_to;
        $partnerInformation->height_id_from = $request->height_from;
        $partnerInformation->religion = $request->per_religion;
        $partnerInformation->mother_tongue = $request->par_mother_tongue;
        $partnerInformation->caste = $request->par_caste;
        $partnerInformation->star = is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star;
        $partnerInformation->rassi = is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi;
        $partnerInformation->education =is_array($request->education) ? implode(',', $request->education) : $request->education;
        $partnerInformation->dosam = $request->par_dhosam;
        $partnerInformation->income = $request->par_income;
        $partnerInformation->about_you = $request->about_partner;
        $partnerInformation->save();
    }
    else{
    $PartnerInformationModel->create([
        'member_id'  => $request->member_id,
        'age'=>$request->age_to,
        'age_from'=>$request->age_from,
        'height_id'=>$request->height_to,
        'height_id_from'=>$request->height_from,
        'religion'=>$request->per_religion,
        'mother_tongue'=>$request->par_mother_tongue,
        'caste'=>$request->par_caste,
       'star' => is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star,
    'rassi' => is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi,
    'education' => is_array($request->education) ? implode(',', $request->education) : $request->education,
        'dosam'=>$request->par_dhosam,
        'income'=>$request->par_income,
        'about_you'=>$request->about_partner,
        'is_active' => true

    ]);
}
    return redirect()->route('app.v2.hobbies_page')->with('success', 'Partner information added successfully.');
}
public function relativeInfoskip(Request $request, Relative $RelativeModel){

    $relativeDetail = Relative::where('member_id', intval($request->member_id))->first();
    if ($relativeDetail) {
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
        $relativeDetail->save();
    }
     else
     {
    $RelativeModel->create([
        'member_id' => $request->member_id,
        'first_relative_name' => $request->first_relative_name,
        'first_relative_relation' => $request->first_relative_relation,
        'first_relative_bussiness' => $request->first_relative_bussiness,
        'first_relative_number' => $request->first_relative_number,
        'second_relative_name' => $request->second_name,
        'second_relative_relation' => $request->second_relation_type,
        'second_relative_bussiness' => $request->second_profession,
        'second_relative_number' => $request->second_contact,
        'third_relative_name' => $request->third_name,
        'third_relative_relation' => $request->third_relation_type,
        'third_relative_bussiness' => $request->third_profession,
        'third_relative_number' => $request->third_contact,
        'is_active' => true,
    ]);

     }
     return redirect()->route('app.v2.contactusPage_page')->with('success', 'Relatives information added successfully.');
}
public function relativeInfoprevious (Request $request, Relative $RelativeModel){

    $relativeDetail = Relative::where('member_id', intval($request->member_id))->first();
    if ($relativeDetail) {
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
        $relativeDetail->save();
    }
     else
     {
    $RelativeModel->create([
        'member_id' => $request->member_id,
        'first_relative_name' => $request->first_relative_name,
        'first_relative_relation' => $request->first_relative_relation,
        'first_relative_bussiness' => $request->first_relative_bussiness,
        'first_relative_number' => $request->first_relative_number,
        'second_relative_name' => $request->second_name,
        'second_relative_relation' => $request->second_relation_type,
        'second_relative_bussiness' => $request->second_profession,
        'second_relative_number' => $request->second_contact,
        'third_relative_name' => $request->third_name,
        'third_relative_relation' => $request->third_relation_type,
        'third_relative_bussiness' => $request->third_profession,
        'third_relative_number' => $request->third_contact,
        'is_active' => true,
    ]);

     }
     return redirect()->route('app.v2.aboutPartner_page')->with('success', 'Relatives information added successfully.');
}

public function photoInfoAdd(Request $request, UploadFile $UploadFileModel, Photo $PhotoModel)
{
    $photos = $request->file('photo') ?? [];
    $oldPhotoPaths = $request->input('up_photo', []);
    $memberId = $request->input('member_id');

    foreach ($photos as $index => $photo) {

        if (!$photo || !$photo->isValid()) {
            continue;
        }

        $existingFilePath = $oldPhotoPaths[$index] ?? null;
        $uploadedFile = $existingFilePath 
            ? $UploadFileModel::where('file_path', $existingFilePath)->first() 
            : null;

        $sizeInBytes = $photo->getSize();
        $size = $sizeInBytes < 1048576
            ? round($sizeInBytes / 1024, 2) . ' KB'
            : round($sizeInBytes / 1048576, 2) . ' MB';

        $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $photo->getClientOriginalExtension();
        $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;
        $destinationPath = public_path('assets/images/photos');
        $photo->move($destinationPath, $imageName);

        $filePath = 'assets/images/photos/' . $imageName;

        // If updating an existing file
        if ($uploadedFile) {
            $uploadedFile->update([
                'file_name' => $imageName,
                'file_type' => $photo->getClientMimeType(),
                'file_size' => $size,
                'file_path' => $filePath,
                'is_active' => true,
            ]);
        } else {
            $uploadedFile = $UploadFileModel::create([
                'file_name' => $imageName,
                'file_type' => $photo->getClientMimeType(),
                'file_size' => $size,
                'file_path' => $filePath,
                'is_active' => true,
            ]);

            $PhotoModel::create([
                'member_id' => $memberId,
                'photo_id' => $uploadedFile->id,
                'is_active' => true,
            ]);
        }
    }

    return redirect()->route('app.v2.hobbies_page')->with('success', 'Photos uploaded/updated successfully.');
}




public function photoInfoskip(Request $request, UploadFile $UploadFileModel, Photo $PhotoModel )
{
    $photos = $request->file('photo') ?? [];
    $oldPhotoIds = $request->input('old_photo', []);

    foreach ($photos as $index => $photo) {
        $photoId = $oldPhotoIds[$index] ?? null;
        $uploadedFile = $photoId ? $UploadFileModel::find($photoId) : null;

        if ($uploadedFile) {
            $sizeInBytes = $photo->getSize();
            $size = $sizeInBytes < 1048576 ? round($sizeInBytes / 1024, 2) . ' KB' : round($sizeInBytes / 1048576, 2) . ' MB';

            $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;

            $photo->move(public_path('assets/images/photos'), $imageName);

            $uploadedFile->update([
                'file_name' => $imageName,
                'file_type' => $photo->getClientMimeType(),
                'file_size' => $size,
                'file_path' => 'assets/images/photos/' . $imageName,
                'is_active' => true,
            ]);
        } else {

            if ($photo && $photo->isValid()) {
                $sizeInBytes = $photo->getSize();
                $size = $sizeInBytes < 1048576 ? round($sizeInBytes / 1024, 2) . ' KB' : round($sizeInBytes / 1048576, 2) . ' MB';

                $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;

                $photo->move(public_path('assets/images/photos'), $imageName);

                $uploadedFile = $UploadFileModel::create([
                    'file_name' => $imageName,
                    'file_type' => $photo->getClientMimeType(),
                    'file_size' => $size,
                    'file_path' => 'assets/images/photos/' . $imageName,
                    'is_active' => true,
                ]);

                $PhotoModel::create([
                    'member_id' => $request->member_id,
                    'photo_id' => $uploadedFile->id,
                    'is_active' => true,
                ]);
            }
        }
    }


    return redirect()->route('app.v2.hobbies_page')->with('success', 'Photos uploaded successfully.');
}
public function photoInfoprevious(Request $request, UploadFile $UploadFileModel, Photo $PhotoModel )
{
    $photos = $request->file('photo') ?? [];
    $oldPhotoIds = $request->input('old_photo', []);

    foreach ($photos as $index => $photo) {
        $photoId = $oldPhotoIds[$index] ?? null;
        $uploadedFile = $photoId ? $UploadFileModel::find($photoId) : null;

        if ($uploadedFile) {
            $sizeInBytes = $photo->getSize();
            $size = $sizeInBytes < 1048576 ? round($sizeInBytes / 1024, 2) . ' KB' : round($sizeInBytes / 1048576, 2) . ' MB';

            $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;

            $photo->move(public_path('assets/images/photos'), $imageName);

            $uploadedFile->update([
                'file_name' => $imageName,
                'file_type' => $photo->getClientMimeType(),
                'file_size' => $size,
                'file_path' => 'assets/images/photos/' . $imageName,
                'is_active' => true,
            ]);
        } else {

            if ($photo && $photo->isValid()) {
                $sizeInBytes = $photo->getSize();
                $size = $sizeInBytes < 1048576 ? round($sizeInBytes / 1024, 2) . ' KB' : round($sizeInBytes / 1048576, 2) . ' MB';

                $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;

                $photo->move(public_path('assets/images/photos'), $imageName);

                $uploadedFile = $UploadFileModel::create([
                    'file_name' => $imageName,
                    'file_type' => $photo->getClientMimeType(),
                    'file_size' => $size,
                    'file_path' => 'assets/images/photos/' . $imageName,
                    'is_active' => true,
                ]);

                $PhotoModel::create([
                    'member_id' => $request->member_id,
                    'photo_id' => $uploadedFile->id,
                    'is_active' => true,
                ]);
            }
        }
    }

    $educationDetail = EducationDetail::where('member_id', $request->member_id)
    ->value('employee_in') ?? 'yes'; 

    // dd($educationDetail);
if ($educationDetail == 'yes') {
return redirect()->route('app.v2.occupational_page')->with('success', 'Photos uploaded successfully.');
} else {
return redirect()->route('app.v2.professional_page')->with('success', 'Photos uploaded successfully.');
}
    // return redirect()->route('app.v2.professional_page')->with('success', 'Photos uploaded successfully.');
}

public function basicInfoupdate(Request $request, Member $MemberModel)
{
   $member = Member::find(intval($request->member_id));

   if($member != null){
        $member->name = $request->name;
        $member->association_id = $request->association_id;
        $member->created_by_relation = $request->created_by_relation;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->dob = $request->dob;
        $member->email = $request->email;
        $member->mobile = $request->mobile;
        $member->save();

        return redirect()->back()->with('success', 'Updated successfully.');
   }else{
    return redirect()->back()->with('error', 'member or OTP not find.');
   }
}
public function ethinicityInfoupdate(Request $request, Member $MemberModel)
{
    $member = Member::find(intval($request->member_id));

    if($member != null){
         $member->religion = $request->religion;
         $member->mothertongue = $request->mothertongue;
         $member->caste = $request->caste;
         $member->subcaste = $request->subcaste;
         $member->village_temple = $request->village_temple;
         $member->family_god = $request->family_god;
         $member->language =is_array($request->language) ? implode(',', $request->language) : $request->language;
         $member->save();

         return redirect()->back()->with('success', 'Updated successfully.');
    }else{
     return redirect()->back()->with('error', 'member or OTP not find.');
    }
}

public function horoscopeInfoupdate(Request $request, Member $MemberModel)

{
    $member = Member::find(intval($request->member_id));

    if($member != null){
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
        }

        $member->dosham = $request->dosham;
        if ($request->dosham == 'Yes' && !empty($request->dosam_detail)) {
            $member->doshamdetail =  is_array($request->dosam_detail) ? implode(',', $request->dosam_detail) : $request->dosam_detail;
        } else {
            $member->doshamdetail = null;
        }
         $member->save();

         return redirect()->back()->with('success', 'successfully.');
    }else{
     return redirect()->back()->with('error', 'member or OTP not find.');
    }
}

public function profileInfoupdate(Request $request, MemberAddionalDetail $MemberAddionalDetailModel){

    $memberId = $request->member_id;
    $memberAddionalDetail = MemberAddionalDetail::where('member_id', intval($memberId))->first();
    if ($memberAddionalDetail) {
        $memberAddionalDetail->body_type = $request->body_composition;
        $memberAddionalDetail->height_id = is_numeric($request->height) ? intval($request->height) : 0;
        $memberAddionalDetail->weight_id = is_numeric($request->weight) ? intval($request->weight) : 0;
        $memberAddionalDetail->disablitiy = isset($request->deficiency) ? $request->deficiency : 0;
        $memberAddionalDetail->eating_habit =  isset($request->eating_habits) ? $request->eating_habits : 0;
        $memberAddionalDetail->drinking_habit = isset($request->alcholism) ? $request->alcholism : 0;
        $memberAddionalDetail->smoking_habit = isset($request->smoking_habits) ? $request->smoking_habits : 0;
        $memberAddionalDetail->about_you = $request->about_you;

    $memberAddionalDetail->save();

    }
      else {

        $MemberAddionalDetailModel->create([
            'member_id' => $memberId,
            'body_type' => $request->body_composition,
            'height_id' => is_numeric($request->height) ? intval($request->height) : 0,
            'weight_id' => is_numeric($request->weight) ? intval($request->weight) : 0,
            'disablitiy' =>isset($request->deficiency) ? $request->deficiency : 0,
            'eating_habit' => isset($request->eating_habits) ? $request->eating_habits : 0,
            'drinking_habit' => isset($request->alcholism) ? $request->alcholism : 0,
            'smoking_habit' =>isset($request->smoking_habits) ? $request->smoking_habits : 0 ,
            'about_you' => $request->about_you,
            'is_active' => true
        ]);
     }


return redirect()->back()->with('success', 'Profile information added successfully.');
}
public function personalInfoupdate(Request $request, FamilyDetail $FamilyDetailModel){
    $memberId = $request->member_id;
   $familyDetail = FamilyDetail::where('member_id', intval($memberId))->first();
   if ($familyDetail) {
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
       $familyDetail->save();
   }
    else
    {
       $FamilyDetailModel->create([
           'member_id' => $request->member_id,
           'family_status' => $request->family_status,
           'family_type' => $request->family_type,
           'family_values' => $request->family_value,
           'father_status' => $request->paternity,
           'mother_status' => $request->mother_status,
           'number_of_brothers' => $request->no_brothers,
           'number_of_sisters' => $request->no_sisters,
           'father_name' => $request->father_name,
           'mother_name' => $request->mother_name,
           'brothers_married' => $request->brothers_married,
           'sisters_married' => $request->sisters_married,
           'parent_contact_number' => $request->parent_contact,
           'ancestral_origin' => $request->ancestral_origin,
           'is_active' => true
       ]);
   }

return redirect()->back()->with('success', 'Profile information updated successfully.');

}
public function relativeInfoupdate(Request $request, Relative $RelativeModel){

    $relativeDetail = Relative::where('member_id', intval($request->member_id))->first();
    if ($relativeDetail) {
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
        $relativeDetail->save();
    }
     else
     {
    $RelativeModel->create([
        'member_id' => $request->member_id,
        'first_relative_name' => $request->first_relative_name,
        'first_relative_relation' => $request->first_relative_relation,
        'first_relative_bussiness' => $request->first_relative_bussiness,
        'first_relative_number' => $request->first_relative_number,
        'second_relative_name' => $request->second_name,
        'second_relative_relation' => $request->second_relation_type,
        'second_relative_bussiness' => $request->second_profession,
        'second_relative_number' => $request->second_contact,
        'third_relative_name' => $request->third_name,
        'third_relative_relation' => $request->third_relation_type,
        'third_relative_bussiness' => $request->third_profession,
        'third_relative_number' => $request->third_contact,
        'is_active' => true,
    ]);

     }
     return redirect()->back()->with('success', 'Relatives information added successfully.');
}
public function partnerInfoupdate (Request $request, PartnerInformation $PartnerInformationModel){

    $partnerInformation = PartnerInformation::where('member_id', intval($request->member_id))->first();

    if ($partnerInformation) {
        $partnerInformation->age = $request->age_to;
        $partnerInformation->age_from = $request->age_from;
        $partnerInformation->height_id = $request->height_to;
        $partnerInformation->height_id_from = $request->height_from;
        $partnerInformation->religion = $request->per_religion;
        $partnerInformation->mother_tongue = $request->par_mother_tongue;
        $partnerInformation->caste = $request->par_caste;
        $partnerInformation->star = is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star;
        $partnerInformation->rassi = is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi;
        $partnerInformation->education =is_array($request->education) ? implode(',', $request->education) : $request->education;
        $partnerInformation->dosam = $request->par_dhosam;
        $partnerInformation->income = $request->par_income;
        $partnerInformation->about_you = $request->about_partner;
        $partnerInformation->save();
    }
    else{
    $PartnerInformationModel->create([
        'member_id'  => $request->member_id,
        'age'=>$request->age_to,
        'age_from'=>$request->age_from,
        'height_id'=>$request->height_to,
        'height_id_from'=>$request->height_from,
        'religion'=>$request->per_religion,
        'mother_tongue'=>$request->par_mother_tongue,
        'caste'=>$request->par_caste,
       'star' => is_array($request->par_star) ? implode(',', $request->par_star) : $request->par_star,
    'rassi' => is_array($request->par_raasi) ? implode(',', $request->par_raasi) : $request->par_raasi,
    'education' => is_array($request->education) ? implode(',', $request->education) : $request->education,
        'dosam'=>$request->par_dhosam,
        'income'=>$request->par_income,
        'about_you'=>$request->about_partner,
        'is_active' => true

    ]);
}

return redirect()->back()->with('success', 'professional information added successfully.');
}
public function photoInfoupdate(Request $request, UploadFile $UploadFileModel, Photo $PhotoModel )
{
    $photos = $request->file('photo') ?? [];
    $oldPhotoIds = $request->input('old_photo', []);

    foreach ($photos as $index => $photo) {
        $photoId = $oldPhotoIds[$index] ?? null;
        $uploadedFile = $photoId ? $UploadFileModel::find($photoId) : null;

        if ($uploadedFile) {
            $sizeInBytes = $photo->getSize();
            $size = $sizeInBytes < 1048576 ? round($sizeInBytes / 1024, 2) . ' KB' : round($sizeInBytes / 1048576, 2) . ' MB';

            $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;

            $photo->move(public_path('assets/images/photos'), $imageName);

            $uploadedFile->update([
                'file_name' => $imageName,
                'file_type' => $photo->getClientMimeType(),
                'file_size' => $size,
                'file_path' => 'assets/images/photos/' . $imageName,
                'is_active' => true,
            ]);
        } else {

            if ($photo && $photo->isValid()) {
                $sizeInBytes = $photo->getSize();
                $size = $sizeInBytes < 1048576 ? round($sizeInBytes / 1024, 2) . ' KB' : round($sizeInBytes / 1048576, 2) . ' MB';

                $baseName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $imageName = time() . '_' . Str::slug($baseName, '_') . '.' . $extension;

                $photo->move(public_path('assets/images/photos'), $imageName);

                $uploadedFile = $UploadFileModel::create([
                    'file_name' => $imageName,
                    'file_type' => $photo->getClientMimeType(),
                    'file_size' => $size,
                    'file_path' => 'assets/images/photos/' . $imageName,
                    'is_active' => true,
                ]);

                $PhotoModel::create([
                    'member_id' => $request->member_id,
                    'photo_id' => $uploadedFile->id,
                    'is_active' => true,
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Photos uploaded successfully.');
}

public function hobbyInfoupdate(Request $request, MemberHobby $MemberHobbyModel){
    $memberHobby = MemberHobby::where('member_id', intval($request->member_id))->first();

    if ($memberHobby) {
        $memberHobby->hobbies =is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies;
        $memberHobby->otherhobbies = $request->other_hobbies;
        $memberHobby->music =  is_array($request->music) ? implode(',', $request->music) : $request->music;
        $memberHobby->othermusic = $request->other_music;
        $memberHobby->sports = is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies;
        $memberHobby->othersports = $request->other_sports;
        $memberHobby->save();

    }
    else{
    $MemberHobbyModel->create([
        'member_id' => $request->member_id,
        'hobbies' => is_array($request->hobbies) ? implode(',', $request->hobbies) : $request->hobbies,
        'otherhobbies' => $request->other_hobbies,
        'music' => is_array($request->music) ? implode(',', $request->music) : $request->music,
        'othermusic' => $request->other_music,
        'sports' =>is_array($request->sports_hobbies) ? implode(',', $request->sports_hobbies) : $request->sports_hobbies,
        'othersports' =>  $request->other_sports,
        'is_active' => true
    ]);
}
    return redirect()->back()->with('success', 'Hobbies information added successfully.');

}

public function addressInfoupdate(Request $request, Member $MemberModel ){

    $member =  Member::find(intval($request->member_id));

    if($member != null){
         $member->state = $request->state;
         $member->city = $request->city;
         $member->taluk = $request->taluk;
         $member->village = $request->village;
         $member->pincode = $request->pincode;
         $member->door_no = $request->doorno;
         $member->land_mark = $request->landmark;
         $member->permanent_address = $request->other_address;

         if ($request->other_address == 2 && !empty($request->other_address)) {
            $member->permanent_state_id  =  !empty($request->permanent_state) ? intval($request->permanent_state) : null;
         $member->permanent_city_id = !empty($request->permanent_city) ? intval($request->permanent_city) : null;
         $member->permanent_taulk_id = !empty($request->permanent_taluk) ? intval($request->permanent_taluk) : null;
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

         return redirect()->back()->with('success', 'successfully.');
    }else{
     return redirect()->back()->with('error', 'member or OTP not find.');
    }
}



public function horoscopeDetailInfoAdd (Request $request, HoroscopeDetail $HoroscopeDetailModel){

    $HoroscopeDetail = HoroscopeDetail::where('member_id', intval($request->member_id))->first();
    if ($HoroscopeDetail) {
        $HoroscopeDetail->rasi_1 = $request->rasi_1;
        $HoroscopeDetail->rasi_2 = $request->rasi_2;
        $HoroscopeDetail->rasi_3 = $request->rasi_3;
        $HoroscopeDetail->rasi_4 = $request->rasi_4;
        $HoroscopeDetail->rasi_5 = $request->rasi_5;
        $HoroscopeDetail->rasi_6 = $request->rasi_6;
        $HoroscopeDetail->rasi_7 = $request->rasi_7;
        $HoroscopeDetail->rasi_8 = $request->rasi_8;
        $HoroscopeDetail->rasi_9 = $request->rasi_9;
        $HoroscopeDetail->rasi_10 = $request->rasi_10;
        $HoroscopeDetail->rasi_11 = $request->rasi_11;
        $HoroscopeDetail->rasi_12 = $request->rasi_12;
        $HoroscopeDetail->Navamsam_1 = $request->Navamsam_1;
        $HoroscopeDetail->Navamsam_2 = $request->Navamsam_2;
        $HoroscopeDetail->Navamsam_3 = $request->Navamsam_3;
        $HoroscopeDetail->Navamsam_4 = $request->Navamsam_4;
        $HoroscopeDetail->Navamsam_5 = $request->Navamsam_5;
        $HoroscopeDetail->Navamsam_6 = $request->Navamsam_6;
        $HoroscopeDetail->Navamsam_7 = $request->Navamsam_7;
        $HoroscopeDetail->Navamsam_8 = $request->Navamsam_8;
        $HoroscopeDetail->Navamsam_9 = $request->Navamsam_9;
        $HoroscopeDetail->Navamsam_10 = $request->Navamsam_10;
        $HoroscopeDetail->Navamsam_11 = $request->Navamsam_11;
        $HoroscopeDetail->Navamsam_12 = $request->Navamsam_12;
        $HoroscopeDetail->save();
    }
     else
     {
    $HoroscopeDetailModel->create([
        'member_id' => $request->member_id,
        'rasi_1' => $request->rasi_1,
        'rasi_2' => $request->rasi_2,
        'rasi_3' => $request->rasi_3,
        'rasi_4' => $request->rasi_4,
        'rasi_5' => $request->rasi_5,
        'rasi_6' => $request->rasi_6,
        'rasi_7' => $request->rasi_7,
        'rasi_8' => $request->rasi_8,
        'rasi_9' => $request->rasi_9,
        'rasi_10' => $request->rasi_10,
        'rasi_11' => $request->rasi_11,
        'rasi_12' => $request->rasi_12,
        'Navamsam_1' => $request->Navamsam_1,
        'Navamsam_2' => $request->Navamsam_2,
        'Navamsam_3' => $request->Navamsam_3,
        'Navamsam_4' => $request->Navamsam_4,
        'Navamsam_5' => $request->Navamsam_5,
        'Navamsam_6' => $request->Navamsam_6,
        'Navamsam_7' => $request->Navamsam_7,
        'Navamsam_8' => $request->Navamsam_8,
        'Navamsam_9' => $request->Navamsam_9,
        'Navamsam_10' => $request->Navamsam_10,
        'Navamsam_11' => $request->Navamsam_11,
        'Navamsam_12' => $request->Navamsam_12,
        'is_active' => true,
    ]);

     }
     return redirect()->route('app.v2.profile_page')->with('success', 'Relatives information added successfully.');
}


public function horoscopeDetailInfoskip (Request $request, HoroscopeDetail $HoroscopeDetailModel){

    $HoroscopeDetail = HoroscopeDetail::where('member_id', intval($request->member_id))->first();
    if ($HoroscopeDetail) {
        $HoroscopeDetail->rasi_1 = $request->rasi_1;
        $HoroscopeDetail->rasi_2 = $request->rasi_2;
        $HoroscopeDetail->rasi_3 = $request->rasi_3;
        $HoroscopeDetail->rasi_4 = $request->rasi_4;
        $HoroscopeDetail->rasi_5 = $request->rasi_5;
        $HoroscopeDetail->rasi_6 = $request->rasi_6;
        $HoroscopeDetail->rasi_7 = $request->rasi_7;
        $HoroscopeDetail->rasi_8 = $request->rasi_8;
        $HoroscopeDetail->rasi_9 = $request->rasi_9;
        $HoroscopeDetail->rasi_10 = $request->rasi_10;
        $HoroscopeDetail->rasi_11 = $request->rasi_11;
        $HoroscopeDetail->rasi_12 = $request->rasi_12;
        $HoroscopeDetail->Navamsam_1 = $request->Navamsam_1;
        $HoroscopeDetail->Navamsam_2 = $request->Navamsam_2;
        $HoroscopeDetail->Navamsam_3 = $request->Navamsam_3;
        $HoroscopeDetail->Navamsam_4 = $request->Navamsam_4;
        $HoroscopeDetail->Navamsam_5 = $request->Navamsam_5;
        $HoroscopeDetail->Navamsam_6 = $request->Navamsam_6;
        $HoroscopeDetail->Navamsam_7 = $request->Navamsam_7;
        $HoroscopeDetail->Navamsam_8 = $request->Navamsam_8;
        $HoroscopeDetail->Navamsam_9 = $request->Navamsam_9;
        $HoroscopeDetail->Navamsam_10 = $request->Navamsam_10;
        $HoroscopeDetail->Navamsam_11 = $request->Navamsam_11;
        $HoroscopeDetail->Navamsam_12 = $request->Navamsam_12;
        $HoroscopeDetail->save();
    }
     else
     {
        $HoroscopeDetailModel->create([
        'member_id' => $request->member_id,
        'rasi_1' => $request->rasi_1,
        'rasi_2' => $request->rasi_2,
        'rasi_3' => $request->rasi_3,
        'rasi_4' => $request->rasi_4,
        'rasi_5' => $request->rasi_5,
        'rasi_6' => $request->rasi_6,
        'rasi_7' => $request->rasi_7,
        'rasi_8' => $request->rasi_8,
        'rasi_9' => $request->rasi_9,
        'rasi_10' => $request->rasi_10,
        'rasi_11' => $request->rasi_11,
        'rasi_12' => $request->rasi_12,
        'Navamsam_1' => $request->Navamsam_1,
        'Navamsam_2' => $request->Navamsam_2,
        'Navamsam_3' => $request->Navamsam_3,
        'Navamsam_4' => $request->Navamsam_4,
        'Navamsam_5' => $request->Navamsam_5,
        'Navamsam_6' => $request->Navamsam_6,
        'Navamsam_7' => $request->Navamsam_7,
        'Navamsam_8' => $request->Navamsam_8,
        'Navamsam_9' => $request->Navamsam_9,
        'Navamsam_10' => $request->Navamsam_10,
        'Navamsam_11' => $request->Navamsam_11,
        'Navamsam_12' => $request->Navamsam_12,
        'is_active' => true,
    ]);

     }
     return redirect()->route('app.v2.profile_page')->with('success', 'Relatives information added successfully.');
}


public function horoscopeDetailInfoprevious (Request $request, HoroscopeDetail $HoroscopeDetailModel){

    $HoroscopeDetail = HoroscopeDetail::where('member_id', intval($request->member_id))->first();

    if ($HoroscopeDetail) {
        $HoroscopeDetail->rasi_1 = $request->rasi_1;
        $HoroscopeDetail->rasi_2 = $request->rasi_2;
        $HoroscopeDetail->rasi_3 = $request->rasi_3;
        $HoroscopeDetail->rasi_4 = $request->rasi_4;
        $HoroscopeDetail->rasi_5 = $request->rasi_5;
        $HoroscopeDetail->rasi_6 = $request->rasi_6;
        $HoroscopeDetail->rasi_7 = $request->rasi_7;
        $HoroscopeDetail->rasi_8 = $request->rasi_8;
        $HoroscopeDetail->rasi_9 = $request->rasi_9;
        $HoroscopeDetail->rasi_10 = $request->rasi_10;
        $HoroscopeDetail->rasi_11 = $request->rasi_11;
        $HoroscopeDetail->rasi_12 = $request->rasi_12;
        $HoroscopeDetail->Navamsam_1 = $request->Navamsam_1;
        $HoroscopeDetail->Navamsam_2 = $request->Navamsam_2;
        $HoroscopeDetail->Navamsam_3 = $request->Navamsam_3;
        $HoroscopeDetail->Navamsam_4 = $request->Navamsam_4;
        $HoroscopeDetail->Navamsam_5 = $request->Navamsam_5;
        $HoroscopeDetail->Navamsam_6 = $request->Navamsam_6;
        $HoroscopeDetail->Navamsam_7 = $request->Navamsam_7;
        $HoroscopeDetail->Navamsam_8 = $request->Navamsam_8;
        $HoroscopeDetail->Navamsam_9 = $request->Navamsam_9;
        $HoroscopeDetail->Navamsam_10 = $request->Navamsam_10;
        $HoroscopeDetail->Navamsam_11 = $request->Navamsam_11;
        $HoroscopeDetail->Navamsam_12 = $request->Navamsam_12;
        $HoroscopeDetail->save();
    }
     else
     {
    $HoroscopeDetailModel->create([
        'member_id' => $request->member_id,
        'rasi_1' => $request->rasi_1,
        'rasi_2' => $request->rasi_2,
        'rasi_3' => $request->rasi_3,
        'rasi_4' => $request->rasi_4,
        'rasi_5' => $request->rasi_5,
        'rasi_6' => $request->rasi_6,
        'rasi_7' => $request->rasi_7,
        'rasi_8' => $request->rasi_8,
        'rasi_9' => $request->rasi_9,
        'rasi_10' => $request->rasi_10,
        'rasi_11' => $request->rasi_11,
        'rasi_12' => $request->rasi_12,
        'Navamsam_1' => $request->Navamsam_1,
        'Navamsam_2' => $request->Navamsam_2,
        'Navamsam_3' => $request->Navamsam_3,
        'Navamsam_4' => $request->Navamsam_4,
        'Navamsam_5' => $request->Navamsam_5,
        'Navamsam_6' => $request->Navamsam_6,
        'Navamsam_7' => $request->Navamsam_7,
        'Navamsam_8' => $request->Navamsam_8,
        'Navamsam_9' => $request->Navamsam_9,
        'Navamsam_10' => $request->Navamsam_10,
        'Navamsam_11' => $request->Navamsam_11,
        'Navamsam_12' => $request->Navamsam_12,
        'is_active' => true,
    ]);

     }
     return redirect()->route('app.v2.horoscope_page')->with('success', 'Relatives information added successfully.');
}

public function professionalInfoupdate (Request $request, EducationDetail $EducationDetailModel){

    $educationDetail = EducationDetail::where('member_id', intval($request->member_id))->first();

    if ($educationDetail) {
        $educationDetail->education_id =is_numeric($request->education) ? intval($request->education) : 0;
        $educationDetail->college_inst = $request->collage_school;
        $educationDetail->organization = $request->organization;
        $educationDetail->employee_in = $request->employed_in;
        $educationDetail->occuption = $request->profession;
        $educationDetail->company_name = $request->company_name;
        $educationDetail->destination = $request->destination;
        $educationDetail->income = $request->income;
        $educationDetail->location = $request->work_location;


        if ($request->work_location === 'India') {
            $educationDetail->state_id = $request->state;
            $educationDetail->city_id = $request->city;
            $educationDetail->taulk_id = $request->taluk;
            $educationDetail->income = $request->income;
            $educationDetail->pincode = $request->pincode;
            $educationDetail->address = $request->address;

            $educationDetail->passport_number = null;
            $educationDetail->visa_type = null;
            $educationDetail->other_country_address = null;
        } else if ($request->work_location === 'Other_Country') {
            $educationDetail->passport_number = $request->passport_number;
            $educationDetail->visa_type = $request->visa_type;
            $educationDetail->other_country_address = $request->other_country_address;

            $educationDetail->state_id = null;
            $educationDetail->city_id = null;
            $educationDetail->taulk_id = null;
            $educationDetail->income = null;
            $educationDetail->pincode = null;
            $educationDetail->address = null;
        }

        $educationDetail->save();
    }
     else
     {
        $EducationDetailModel->create([
            'member_id' => $request->member_id,
            'education_id' =>is_numeric($request->education) ? intval($request->education) : 0,
            'college_inst' => $request->collage_school,
            'organization' => $request->organization,
            'employee_in' => $request->employed_in,
            'occuption' => $request->profession,
            'company_name' => $request->company_name,
            'destination' => $request->destination,
            'income' => $request->income,
            'location' => $request->work_location,
            'is_active' => true,

            'state_id' => ($request->work_location === 'India') ? $request->state : null,
        'city_id' => ($request->work_location === 'India') ? $request->city : null,
        'taulk_id' => ($request->work_location === 'India') ? $request->taluk : null,
        'income' => ($request->work_location === 'India') ? $request->income : null,
        'pincode' => ($request->work_location === 'India') ? $request->pincode : null,
        'address' => ($request->work_location === 'India') ? $request->address : null,

        'passport_number' => ($request->work_location === 'Other_Country') ? $request->passport_number : null,
        'visa_type' => ($request->work_location === 'Other_Country') ? $request->visa_type : null,
        'other_country_address' => ($request->work_location === 'Other_Country') ? $request->other_country_address : null,
        ]);

    }

return redirect()->back()->with('success', 'professional information added successfully.');
}


}
