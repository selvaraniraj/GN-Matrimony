<?php
namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Models\Association;
use App\Models\User;
use App\Models\Star;
use App\Models\DosamDetail;
use App\Models\Raasi;
use App\Models\Height;
use App\Models\Weight;
use App\Models\State;
use App\Models\City;
use App\Models\Taluka;
use App\Models\Education;
use App\Models\Hobby;
use App\Models\Member;
use App\Models\MemberAddionalDetail;
use App\Models\FamilyDetail;
use App\Models\EducationDetail;
use App\Models\HoroscopeDetail;
use App\Models\Search_log;
use App\Models\LikedProfile;
use App\Models\UploadFile;
use App\Models\MemberActivityLog;
use App\Models\MemberHobby;
use App\Models\Photo;
use App\Models\PartnerInformation;
use App\Models\Relative;
use App\Utils\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    use GeneralTrait;

    private function getMemberVal(){
        $userId = Auth::user()->id;
        $memberVal = Member::where('user_id', $userId)->first();
        $memberId = $memberVal->id;
        $member = Member::find($memberId);
        return $member;

    }


    public function aboutPage(){
        return view('userPages.page.about');
    }

    public function contactPage(){
        return view('userPages.page.contact');
    }

    public function homePage(){

        return view('userPages.page.home');
    }

    public function basicformPage(){

        $member = $this->getMemberVal();

        $association  = Association::where('is_active', 1)->pluck('association_name', 'id');
        if($member != null){
            return view('userPages.page.basic_information', ['member'=> $member, 'association' => $association]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }

    }

    public function verificationPage(Request $request,$id){

         $created_by_relation = session('created_by_relation');

        $memberId = $this->custom_decrypt($id);
       // print_r($memberId);
       // exit();
        $user = User::find($memberId);
        if($user != null){
            return view('userPages.page.verification', [ 
        'user'=>$user,
        'created_by_relation' => $created_by_relation]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function ethinicityPage(){
        $member = $this->getMemberVal();
        if($member != null){
            return view('userPages.page.ethinicity', ['member'=> $member]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function get_star(Request $request)
    {
        $raasi_id = $request->input('id');
        $stars = Star::where(['raasi_id' => $raasi_id, 'is_active' => 1])->get(['id', 'name']); 
    
        return response()->json($stars);
    }
    
    public function horoscopePage()
{
    $raasi = Raasi::where('is_active', 1)->pluck('name', 'id');
    $dosam_details = DosamDetail::where('is_active', 1)->pluck('name', 'id');
    $member = $this->getMemberVal();

    // Initialize an empty star array
    $stararray = [];
    if ($member && $member->raasi_id) { 
        $stararray = Star::where([
            'raasi_id' => $member->raasi_id,
            'is_active' => 1
        ])
        ->get(['id', 'name'])
        ->toArray();
    }

    if ($member) {
        return view('userPages.page.horoscope', [
            'member' => $member,
            'raasi' => $raasi,
            'stararray' => $stararray,
            'dosam_details' => $dosam_details,
        ]);
    } else {
        return redirect()->back()->with('error', 'Member not found.');
    }
}


    public function profilePage(){

        $height  = Height::where('is_active', 1)->pluck('name', 'id');
        $weight = Weight::where('is_active', 1)->pluck('name', 'id');
        $member = $this->getMemberVal();

        if($member != null){
            $memberAddionalDetail = MemberAddionalDetail::where('member_id', $member->id)->first();
            return view('userPages.page.profile', ['member'=> $member, 'height' =>$height ,'weight' => $weight, 'memberAddionalDetail' => $memberAddionalDetail]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function addressPage(){
        $state = State::where('is_active' ,1)->pluck('name','id');
        $member = $this->getMemberVal();
        $cityarray = [];
        $taulkarray=[];
        $permanentcityarray = [];
        $permanenttaulkarray=[];
        if ($member && $member->state) {
            $cityarray = City::where(['state_id'=> $member->state, 'is_active'=> 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }
        if ($member && $member->state && $member->city) {
            $taulkarray = Taluka::where(['state_id' => $member->state,'city_id' => $member->city, 'is_active' => 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }

        if ($member && $member->permanent_state_id ) {
            $permanentcityarray = City::where(['state_id'=> $member->permanent_state_id, 'is_active'=> 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }
        if ($member && $member->permanent_city_id  && $member->permanent_city_id ) {
            $permanenttaulkarray = Taluka::where(['state_id' => $member->permanent_state_id, 'city_id' => $member->permanent_city_id, 'is_active' => 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }


        if($member != null){
            return view('userPages.page.address',
             [
                'member'=> $member,
                 'state' =>$state,
                 'cityarray' => $cityarray,
                 'taulkarray' => $taulkarray ,
                 'permanentcityarray' => $permanentcityarray,
                 'permanenttaulkarray' => $permanenttaulkarray
            ]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }

    }

    public function get_city(Request $request){
        $state_id = $request->input('id');
        $cities = City::where(['state_id' => $state_id,'is_active' => 1])->get();

        return response()->json($cities);
    }

    public function get_taulk(Request $request ) {

        $city_id = $request->input('city');
    $taluks = Taluka::where(['city_id'=> $city_id, 'is_active' => 1])->get();

    return response()->json($taluks);
    }


    public function personalPage(){

        $member = $this->getMemberVal();
        if($member != null){
            $familyDetail = FamilyDetail::where('member_id', $member->id)->first();
            return view('userPages.page.personal', ['member'=> $member , 'familyDetail' =>  $familyDetail]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function professionalPage(){
        $state = State::where('is_active' ,1)->pluck('name','id');
        $education = Education::where('is_active', 1)
        ->select('id', 'name', 'department')
        ->get()
        ->toArray();

        $member = $this->getMemberVal();

        if($member != null){

            $educationDetails = EducationDetail::where('member_id', $member->id)->get(); // Use get() to fetch multiple records

            $educationIds = [];
            if ($educationDetails->isNotEmpty()) {
                foreach ($educationDetails as $educationDetail) {
                    $educationIds = array_merge($educationIds, explode(',', $educationDetail->education_id));
                }
            }
            
            $educationArray = Education::whereIn('id', $educationIds)
                ->where('is_active', 1)
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
            

            $educationDetail = EducationDetail::where('member_id', $member->id)->first();
            $cityarray = [];
            $taulkarray=[];
            if ($educationDetail && $educationDetail->state_id) {
                $cityarray = City::where(['state_id' => $educationDetail->state_id, 'is_active' => 1])
                    ->where('is_active', 1)
                    ->orderBy('name', 'asc')
                    ->get()
                    ->toArray();
            }
            if ($educationDetail && $educationDetail->state_id  && $educationDetail->city_id ) {
                $taulkarray = Taluka::where(['state_id' => $educationDetail->state_id, 'city_id' => $educationDetail->city_id, 'is_active' => 1])
                    ->orderBy('name', 'asc')
                    ->get()
                    ->toArray();
            }

            return view('userPages.page.professional',
            [
                'member'=> $member ,
                 'education' =>$education,
                  'state' =>$state,
                  'educationDetail' =>  $educationDetail,
                  'cityarray' => $cityarray,
                  'taulkarray' => $taulkarray,
                  'educationDetails'=>$educationDetails,
                  'educationArray' => $educationArray,
                  'educationIds' => $educationIds
            ]);

        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function photoPage(){
        $member = $this->getMemberVal();
        if($member != null){
            $photoDetails = Photo::where('member_id', $member->id)->with('uploadFile')->get();
            return view('userPages.page.photos',
             [
                'member'=> $member,
                'photoDetails' =>  $photoDetails,
            ]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function hobbiesPage(){
        $hobby = Hobby::where('is_active',1)->pluck('name','id');
        $member = $this->getMemberVal();
        if($member != null){
            $hobbyDetail = MemberHobby::where('member_id', $member->id)->first();

            if ($hobbyDetail) {
                $hobbyDetail->hobbies = $hobbyDetail->hobbies ? explode(',', $hobbyDetail->hobbies) : [];
            }
            return view('userPages.page.hobbies',
             [
                'member'=> $member,
                 'hobby' => $hobby,
                 'hobbyDetail' => $hobbyDetail
            ]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function  relativesPage(){

        $member = $this->getMemberVal();
        if($member != null){
            $relative = Relative::where('member_id', $member->id)->first();
            return view('userPages.page.relatives',
            [
                'member'=> $member,
                'relative'=> $relative
            ]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function getStarValue(Request $request)
    {
        $raasiIds = $request->input('raasi_ids');
    
        // Fetch active stars based on raasi IDs
        $stars = Star::whereIn('raasi_id', $raasiIds)
            ->where('is_active', 1)
            ->orderBy('name')
            ->get(['id', 'name']);
    
        return response()->json($stars);
    }
    

    public function  aboutPartnerPage(){
        $height  = Height::where('is_active', 1)->pluck('name', 'id');
        $raasi  = Raasi::where('is_active', 1)->pluck('name', 'id');
        $member = $this->getMemberVal();

        if($member != null){
            $partnerDetail = PartnerInformation::where('member_id', $member->id)->first();
           
            $stararray = [];
            if ($partnerDetail && $partnerDetail->rassi) {
                $stararray = Star::whereIn('raasi_id', explode(',', $partnerDetail->rassi))
                    ->where('is_active', 1)
                    ->orderBy('name')
                    ->get()
                    ->toArray();
            }
            
            return view('userPages.page.about_partner',
            [
                'member'=> $member,
                'height'=>$height,
                'raasi'=>$raasi,
                'stararray'=>$stararray,
                'partnerDetail'=> $partnerDetail
        ]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function  aboutUsPage(){
        return view('userPages.page.about_us');
    }

    public function  galleryPage(){
        return view('userPages.page.gallery');
    }

    public function  contactusPage(){
        return view('userPages.page.contact_us');
    }

    public function  loginPage(){
        return view('userPages.page.login');
    }
    
    public function  forget_passwordpage(){
        return view('userPages.page.forget_password');
    }

    public function  password_otppage(){
        return view('userPages.page.password_otp');
    }

    public function  change_passwordpage(){
        return view('userPages.page.change_password');
    }
    public function  memberPage(){
        return view('userPages.page.members');
    }
  

    public function getUserDetails($id)
    {
        $member = $this->getMemberVal();
        $member_id =  $member-> id;
       
        $decodedId = base64_decode($id);
    
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
        ->where('id', $decodedId)
        ->first();

        
       
        if (!$userDetails) {
            return response()->json(['error' => 'Member not found'], 404);
        }
        $memberId = $userDetails->id; 
      

        $logConditionsMet = MemberActivityLog::where('profile_id', $memberId)
            ->where('flag', 2)
            ->where('status', 2)
            ->where('member_id', $member_id) 
            ->exists();

            $logConditionsrequest = MemberActivityLog::where('profile_id', $memberId)
            ->where('flag', 2)
            ->where('status', 1)
            ->where('member_id', $member_id) 
            ->exists();

        //    dd($logConditionsMet);
        // Prepare photo data
        $photoIds = [];
        if ($userDetails->photos->isNotEmpty()) {
            foreach ($userDetails->photos as $photo) {
                $photoIds[] = [
                    'photo_id' => $photo->photo_id,
                    'file_path' => $photo->uploadFile->file_path ?? asset('/images/user_image.png'),
                    'member_id' => $photo->member_id,
                ];
            }
        } else {
            $photoIds[] = [
                'photo_id' => null,
                'file_path' => asset('/images/user_image.png'),
                'member_id' => $userDetails->id,
            ];
        }

        $userId = $member->id;

        $upprovePhoto = MemberActivityLog::where('member_id', $userId)
        ->where('flag', 4)
        ->where('status', 2)
        ->where('profile_id', $memberId) 
        ->exists();

        $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
->where('flag', 4)
->where('status', 1)
->where('profile_id', $memberId) 
->exists();   
    
$likedProfiles = LikedProfile::where('member_id', $userId)->get();
        
$profiles = $likedProfiles->pluck('liked_profile')->toArray();
$unlike_profiles = $likedProfiles->pluck('unliked_profile')->toArray();

        return view('userPages.page.popupView', [
            'user' => $userDetails,
            'photoIds' => $photoIds,
            'logConditionsMet' => $logConditionsMet,
            'logConditionsrequest' => $logConditionsrequest,
            'logConditionsRequest'=>$logConditionsRequest,
            'upprovePhoto'=>$upprovePhoto,
            'profiles' => $profiles,
            'unlike_profile' => $unlike_profiles,
        ]);
    }



    public function user_profile()
    {
        $member = $this->getMemberVal();
        $member_id =  $member-> id;
       
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
        ->where('id',$member_id)
        ->first();

        
       
        if (!$userDetails) {
            return response()->json(['error' => 'Member not found'], 404);
        }
        $memberId = $userDetails->id; 
      

        //    dd($logConditionsMet);
        // Prepare photo data
        $photoIds = [];
        if ($userDetails->photos->isNotEmpty()) {
            foreach ($userDetails->photos as $photo) {
                $photoIds[] = [
                    'photo_id' => $photo->photo_id,
                    'file_path' => $photo->uploadFile->file_path ?? asset('/images/user_image.png'),
                    'member_id' => $photo->member_id,
                ];
            }
        } else {
            $photoIds[] = [
                'photo_id' => null,
                'file_path' => asset('/images/user_image.png'),
                'member_id' => $userDetails->id,
            ];
        }

        $userId = $member->id;

        $upprovePhoto = MemberActivityLog::where('member_id', $userId)
        ->where('flag', 4)
        ->where('status', 2)
        ->where('profile_id', $memberId) 
        ->exists();


        return view('userPages.page.user_profile', [
            'user' => $userDetails,
            'photoIds' => $photoIds,
            'upprovePhoto'=>$upprovePhoto,
        ]);
    }





    public function  single_pagepage(){
        $member = $this->getMemberVal();

        $association  = Association::where('is_active', 1)->pluck('association_name', 'id');
        $raasi  = Raasi::where('is_active', 1)->pluck('name', 'id');
        $stars = Star::where('is_active', 1)->pluck('name', 'id');
        $dosam_details  = DosamDetail::where('is_active', 1)->pluck('name', 'id');
        $height  = Height::where('is_active', 1)->pluck('name', 'id');
        $weight = Weight::where('is_active', 1)->pluck('name', 'id');
        $state = State::where('is_active' ,1)->pluck('name','id');
        $education  = Education::where('is_active', 1)->pluck('name', 'id');
        $hobby = Hobby::where('is_active',1)->pluck('name','id');

        $raasiName = Raasi::where('id', $member->raasi_id)->value('name');
        $starName = Star::where('id', $member->star_id)->value('name');
        $stateName = State::where('id', $member->state)->value('name');
        $cityName = City::where('id', $member->city)->value('name');
        $taulkaName = Taluka::where('id', $member->taluk)->value('name');
        $permanentstateName = State::where('id', $member->permanent_state_id)->value('name');
        $permanentcityName = City::where('id', $member->permanent_city_id)->value('name');
        $permanenttaulkaName = Taluka::where('id', $member->permanent_taulk_id)->value('name');

        $familyDetail = FamilyDetail::where('member_id', $member->id)->first();
        $educationDetail = EducationDetail::where('member_id', $member->id)->first();

        if ($educationDetail) {
            $eduction_id = Education::where('id', $educationDetail->education_id)->value('name');
            $stateNameProfessional = State::where('id', $educationDetail->state_id)->value('name');
            $cityNameProfessional = City::where('id', $educationDetail->city_id)->value('name');
            $taulkaNameProfessional = Taluka::where('id', $educationDetail->taulk_id)->value('name');
        } else {
            $eduction_id = null;
            $stateNameProfessional = null;
            $cityNameProfessional = null;
            $taulkaNameProfessional = null;
        }

        $photoDetails = Photo::where('member_id', $member->id)->with('uploadFile')->get();
        $hobbyDetail = MemberHobby::where('member_id', $member->id)->first();
        $relative = Relative::where('member_id', $member->id)->first();
        $memberAddionalDetail = MemberAddionalDetail::where('member_id', $member->id)
        ->join('heights', 'member_addional_details.height_id', '=', 'heights.id')
        ->join('weights', 'member_addional_details.weight_id', '=', 'weights.id')
        ->select('member_addional_details.*', 'heights.name as height_name', 'weights.name as weight_name')
        ->first();
        $partnerDetail = PartnerInformation::where('member_id', $member->id)
        ->join('heights as height_min', 'partner_information.height_id', '=', 'height_min.id')
        ->join('heights as height_max', 'partner_information.height_id_from', '=', 'height_max.id')
        ->select(
            'partner_information.*',
            'height_min.name as height_min_name',
            'height_max.name as height_max_name',
        )
        ->first();

        if ($partnerDetail) {
            // Process Raasi
            $partnerraasi = [];
            if (!empty($partnerDetail->rassi)) {
                $raasiIds = explode(',', $partnerDetail->rassi);
                $partnerraasi = Raasi::whereIn('id', $raasiIds)
                    ->where('is_active', 1)
                    ->pluck('name')
                    ->toArray();
            }
            $partnerDetail->partner_raasi = implode(', ', $partnerraasi);
        
            // Process Star
            $partnerstar = [];
            if (!empty($partnerDetail->star)) {
                $starIds = explode(',', $partnerDetail->star);
                $partnerstar = Star::whereIn('id', $starIds)
                    ->where('is_active', 1)
                    ->pluck('name')
                    ->toArray();
            }
            $partnerDetail->partner_star = implode(', ', $partnerstar);
        } else {
            // Handle null case
            $partnerDetail = (object) [
                'partner_raasi' => 'Not available',
                'partner_star' => 'Not available',
                'height_min_name' => 'Not available',
                'height_max_name' => 'Not available',
            ];
        }

        $hobbyDetail = MemberHobby::where('member_id', $member->id)->first();

        if ($hobbyDetail) {
            $hobbyDetail->hobbies = $hobbyDetail->hobbies ? explode(',', $hobbyDetail->hobbies) : [];
            $hobbyNames = Hobby::whereIn('id', $hobbyDetail->hobbies)->pluck('name')->toArray();
            $displayHobbies = implode(', ', $hobbyNames) . ($hobbyDetail->otherhobbies ? ', ' . $hobbyDetail->otherhobbies : '');
        } else {
            // Handle null case
            $hobbyDetail = (object) [
                'hobbies' => [],
                'otherhobbies' => null,
            ];
            $displayHobbies = 'No hobbies found';
        }
        $horoscopeDetail = HoroscopeDetail::where('member_id', $member->id)->first();
        
        $cityarray = [];
        $taulkarray=[];
        $permanentcityarray = [];
        $permanenttaulkarray=[];
        if ($member && $member->state) {
            $cityarray = City::where(['state_id'=> $member->state, 'is_active'=> 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }
        if ($member && $member->state && $member->city) {
            $taulkarray = Taluka::where(['state_id' => $member->state,'city_id' => $member->city, 'is_active' => 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }
    
        if ($member && $member->permanent_state_id ) {
            $permanentcityarray = City::where(['state_id'=> $member->permanent_state_id, 'is_active'=> 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }
        if ($member && $member->permanent_city_id  && $member->permanent_city_id ) {
            $permanenttaulkarray = Taluka::where(['state_id' => $member->permanent_state_id, 'city_id' => $member->permanent_city_id, 'is_active' => 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }

        return view('userPages.page.single_page',
    [
         'member'=> $member,
         'association' => $association,
         'raasi' => $raasi,
         'stars' => $stars,
         'dosam_details' => $dosam_details,
         'raasiName' => $raasiName,
         'starName' =>  $starName,
         'memberAddionalDetail' => $memberAddionalDetail,
         'familyDetail' =>  $familyDetail,
         'educationDetail' =>  $educationDetail,
         'photoDetails' =>  $photoDetails,
         'hobbyDetail' => $hobbyDetail,
         'partnerDetail'=> $partnerDetail,
         'relative'=> $relative,
         'height'=>$height,
         'weight'=>$weight,
         'hobby'=>$hobby,
         'state' =>$state,
         'cityarray' => $cityarray,
         'taulkarray' => $taulkarray ,
         'permanentcityarray' => $permanentcityarray,
         'permanenttaulkarray' => $permanenttaulkarray,
         'stateName' => $stateName,      
         'cityName' => $cityName,       
         'talukName' => $taulkaName,
         'education' => $education,
         'permanentstateName' => $permanentstateName,      
         'permanentcityName' => $permanentcityName,       
         'permanenttalukName' => $permanenttaulkaName, 
         'stateNameProfessional' => $stateNameProfessional,      
         'cityNameProfessional' => $cityNameProfessional,       
         'talukNameProfessional' => $taulkaNameProfessional, 
         'eduction_id' => $eduction_id,
         'displayHobbies' => $displayHobbies,
         'horoscopeDetail' => $horoscopeDetail
    ]);
    }

    public function  my_profilepage(){
        return view('userPages.page.my_profile');
    }

public function favoritespage()
{
    $member = $this->getMemberVal();

    // Get total member logs for checking if empty
    $memberLogs = LikedProfile::where('liked_profile', $member->id)
        ->where('liked_flag', 1)
        ->join('members', 'liked_profiles.member_id', '=', 'members.id')
        ->select('liked_profiles.*', 'members.name as member_name')
        ->get();

    // Paginate the details query
    $details = LikedProfile::where('liked_profile', $member->id)
        ->where('liked_flag', 1)
        ->join('members', 'liked_profiles.member_id', '=', 'members.id')
        ->join('education_details', 'members.id', '=', 'education_details.member_id')
        ->join('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
        ->join('heights', 'heights.id', '=', 'member_addional_details.height_id')
        ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
        ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
        ->select(
            'members.dob',
            'heights.name as height_name',
            'members.id',
            'members.user_id',
            'members.profile_id',
            'education_details.member_id',
            'education_details.occuption',
            'education_details.company_name',
            'education_details.education_id',
            'education_details.address',
            'members.name',
            'member_addional_details.height_id',
            'member_addional_details.weight_id',
            'member_addional_details.about_you',
            'members.created_by_relation',
            'members.age',
            'members.religion',
            'photos.photo_id',
            'upload_files.file_path',
             'liked_profiles.flag as interest_flag' 
        )
        ->paginate(2); // CHANGE: Add pagination here

    // Get paginated profile IDs
    $paginatedProfileIds = $details->pluck('id');

    // Process photo IDs for paginated results
    $photoIds = [];
    $uniqueResults = [];
    $processedMembers = [];

    foreach ($details as $result) {
        if (!in_array($result->id, $processedMembers)) {
            $photoIds[] = [
                'photo_id' => $result->photo_id,
                'member_id' => $result->id,
            ];
            $uniqueResults[] = $result;
            $processedMembers[] = $result->id;
        }
    }

    $memberId = $member->id;
    
    // Use paginated profile IDs for these queries
    $upprovePhoto = MemberActivityLog::where('member_id', $memberId)
        ->where('flag', 4)
        ->where('status', 2)
        ->whereIn('profile_id', $paginatedProfileIds)
        ->pluck('profile_id');

    $logConditionsRequest = MemberActivityLog::where('member_id', $memberId)
        ->where('flag', 4)
        ->where('status', 1)
        ->whereIn('profile_id', $paginatedProfileIds)
        ->pluck('profile_id');

    $viewProfile = MemberActivityLog::where('member_id', $memberId)
        ->where('flag', 3)
        ->where('status', 1)
        ->whereIn('profile_id', $paginatedProfileIds)
        ->pluck('profile_id');

    return view('userPages.page.favorites', [
        'details' => $details, // This is now paginated
        'photoIds' => $photoIds,
        'upprovePhoto' => $upprovePhoto->toArray(),
        'logConditionsRequest' => $logConditionsRequest->toArray(),
        'memberLogs' => $memberLogs,
        'viewProfile' => $viewProfile->toArray(),
        
    ]);
}

public function requestPage(Request $request)
{
    $member = $this->getMemberVal();

    if (!$member) {
        return redirect()->back()->with('error', 'Member not found.');
    }

    /* -------------------------------------------------
       1. Get request logs (flag = 2)
    --------------------------------------------------*/
    $memberLogs = MemberActivityLog::where('member_activity_logs.profile_id', $member->id)
        ->where('flag', 2)
        ->join('members', 'member_activity_logs.member_id', '=', 'members.id')
        ->select('member_activity_logs.*', 'members.name as member_name')
        ->get();

    /* -------------------------------------------------
       2. Get requested member IDs
    --------------------------------------------------*/
    $memberIds = $memberLogs->pluck('member_id')->unique()->toArray();

    /* -------------------------------------------------
       3. Get member details with pagination
    --------------------------------------------------*/
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
        ->whereIn('id', $memberIds)
        ->paginate(2); // pagination here

    /* -------------------------------------------------
       4. Profile IDs from paginated result
    --------------------------------------------------*/
    $profileIds = $userDetails->pluck('id')->toArray();
    $userId = $member->id;

    /* -------------------------------------------------
       5. Photo handling
    --------------------------------------------------*/
    $photoIds = [];

    foreach ($userDetails as $userDetail) {
        if ($userDetail->photos->isNotEmpty()) {
            foreach ($userDetail->photos as $photo) {
                $photoIds[] = [
                    'photo_id'  => $photo->photo_id,
                    'file_path' => $photo->uploadFile->file_path ?? asset('/images/user_image.png'),
                    'member_id' => $photo->member_id,
                ];
            }
        } else {
            $photoIds[] = [
                'photo_id'  => null,
                'file_path' => asset('/images/user_image.png'),
                'member_id' => $userDetail->id,
            ];
        }
    }

    /* -------------------------------------------------
       6. Activity Logs (bulk queries)
    --------------------------------------------------*/
    $upprovePhoto = MemberActivityLog::where('member_id', $userId)
        ->where('flag', 4)
        ->where('status', 2)
        ->whereIn('profile_id', $profileIds)
        ->pluck('profile_id')
        ->toArray();

    $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
        ->where('flag', 4)
        ->where('status', 1)
        ->whereIn('profile_id', $profileIds)
        ->pluck('profile_id')
        ->toArray();

    $viewProfile = MemberActivityLog::where('member_id', $userId)
        ->where('flag', 3)
        ->where('status', 1)
        ->whereIn('profile_id', $profileIds)
        ->pluck('profile_id')
        ->toArray();

    /* -------------------------------------------------
       7. Check accepted requests (NO int error)
    --------------------------------------------------*/
    $logConditions = [];

    foreach ($profileIds as $profileId) {
        $logConditions[$profileId] = MemberActivityLog::where('member_id', $profileId)
            ->where('profile_id', $userId)
            ->where('flag', 2)
            ->where('status', 2)
            ->exists();
    }

    /* -------------------------------------------------
       8. Return view
    --------------------------------------------------*/
    return view('userPages.page.request', [
        'member'                => $member,
        'memberLogs'            => $memberLogs,
        'userDetails'           => $userDetails,
        'photoIds'              => $photoIds,
        'upprovePhoto'          => $upprovePhoto,
        'logConditionsRequest'  => $logConditionsRequest,
        'viewProfile'           => $viewProfile,
        'logConditions'         => $logConditions,
    ]);
}

    

    public function searchpage()
    {
        $stars = Star::where('is_active', 1)->pluck('name', 'id');
        $education = Education::where('is_active', 1)->pluck('name', 'id');
    
        $member = $this->getMemberVal();
  $gender = $member->gender;
  $mem = $member->id;

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
  ])
  ->where('id', $mem)
  ->first();

  $dob = $memberId->dob;
  $heightId = $memberId->height_id;
  $age = \Carbon\Carbon::parse($dob)->age;

  $ageRange = $this->getAgeRange($gender, $age);
  $heightRange = $this->getHeightRange($gender, $heightId);

  $currentDate = Carbon::now(); 
      $minDob = $currentDate->copy()->subYears($ageRange['max'])->format('Y-m-d');
      $maxDob = $currentDate->copy()->subYears($ageRange['min'])->format('Y-m-d');
               
     
  $userLocation = $memberId->taluk; 

  $talukName = Taluka::where('id', $userLocation)
  ->where('is_active', 1)
  ->value('name');

  $nearbyTaluks = Taluka::where('is_active', 1)
  ->where('id', '!=', $userLocation) // Exclude the current taluk
  ->pluck('id')
  ->toArray();

$talukIds = array_merge([$userLocation], $nearbyTaluks);

$detailsQuery = Member::where('gender', '!=', $gender) 
->leftJoin('stars', 'members.star_id', '=', 'stars.id')
->leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
->leftJoin('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
->leftJoin('heights', 'heights.id', '=', 'member_addional_details.height_id')
->leftJoin('photos', 'members.id', '=', 'photos.member_id')
->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
->where(function ($query) use ($memberId) {
    
    if (!$memberId->partner_Information || 
    $memberId->partner_Information->age_from == 0 || 
    $memberId->partner_Information->age_from === null || 
    $memberId->partner_Information->age == 0 || 
    $memberId->partner_Information->age === null) {

      $dob = $memberId->dob;
      $age = \Carbon\Carbon::parse($dob)->age;
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

->orWhere(function ($query) use ($memberId) {
    $member = $this->getMemberVal();
    $gender = $member->gender;

    // Check if partner_Information exists and has the rassi property
    $rassiValues = null;
    if ($memberId->partner_Information && isset($memberId->partner_Information->rassi)) {
        $rassiValues = is_array($memberId->partner_Information->rassi)
            ? $memberId->partner_Information->rassi
            : explode(',', $memberId->partner_Information->rassi);
    }

    if ($rassiValues) {
        $query->where('gender', '!=', $gender)
            ->whereIn('members.raasi_id', $rassiValues); // Use whereIn for multiple values
    }
})

->orWhere(function ($query) use ($memberId) {
    $member = $this->getMemberVal();
    $gender = $member->gender;

    // Check if partner_Information exists and has the star property
    $starValues = null;
    if ($memberId->partner_Information && isset($memberId->partner_Information->star)) {
        $starValues = is_array($memberId->partner_Information->star)
            ? $memberId->partner_Information->star
            : explode(',', $memberId->partner_Information->star);
    }

    if (!empty($starValues)) {
        $query->where('gender', '!=', $gender)
              ->whereIn('members.star_id', $starValues); // Use whereIn for multiple values
    }
})

->select(
  'members.dob',
  'members.profile_id',
  'members.star_id',
  'members.raasi_id',
  'members.taluk',
  'members.user_id',
  'heights.name as height_name',
  'members.id',
  'stars.name as star_name',
  'education_details.education_id',
  'education_details.address',
  'members.name',
  'member_addional_details.height_id',
  'members.created_by_relation',
  'photos.photo_id',
  'upload_files.file_path'
)
->orderBy('members.dob','desc');
$details = $detailsQuery->get();


if ($details->isEmpty()) {
    $detailsQuery = Member::where('gender', '!=', $gender)
        ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
        ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
        ->select('members.*', 'photos.photo_id', 'upload_files.file_path');
    $details = $detailsQuery->get();
}

//dd($memberId->partner_Information->height_id);


               $userLocation = $memberId->taluk;
               $talukName = Taluka::where('id', $userLocation)->where('is_active', 1)->value('name');
               $nearbyTaluks = Taluka::where('is_active', 1)
                   ->where('id', '!=', $userLocation)
                   ->pluck('id')
                   ->toArray();

        if ($details->isEmpty()) {
            $detailsQuery = Member::where('gender', '!=', $gender)
                ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
                ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
                ->select('members.*', 'photos.photo_id', 'upload_files.file_path');
            $details = $detailsQuery->get();
        }
  

        $photoIds = [];
        $uniqueResults = [];
        $processedMembers = [];
    
        foreach ($details as $result) {
            if (!in_array($result->id, $processedMembers)) {
                $photoIds[] = [
                    'photo_id' => $result->photo_id,
                    'member_id' => $result->id,
                ];
                $uniqueResults[] = $result;
                $processedMembers[] = $result->id;
            }
        }

        $userId = $member->id;
        $profileIds = $details->pluck('id');
    
        $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
            ->where('flag', 4)
            ->where('status', 1)
            ->whereIn('profile_id', $profileIds)
            ->pluck('profile_id');
    
        $upprovePhoto = MemberActivityLog::where('member_id', $userId)
            ->where('flag', 4)
            ->where('status', 2)
            ->whereIn('profile_id', $profileIds)
            ->pluck('profile_id');

            $viewProfile = MemberActivityLog::where('member_id', $userId)
->where('flag', 3)
->where('status', 1)
->whereIn('profile_id', $profileIds) 
->pluck('profile_id');
    
        return view('userPages.page.search', [
            'details' => $uniqueResults,
            'logConditionsRequest' => $logConditionsRequest->toArray(),
            'upprovePhoto' => $upprovePhoto->toArray(),
            'star' => $stars,
            'education' => $education,
            'viewProfile'=>$viewProfile->toArray(),
        ]);
    }
    
   private function getAgeRange($gender, $age)
   {
       if ($gender == 'male') {
           return ['min' => $age - 5, 'max' => $age];
       } else {
           return ['min' => $age, 'max' => $age + 5];
       }
   }

   private function getHeightRange($gender, $heightId)
   {
       if (!$heightId) {
           return null; // No height data available
       }

       if ($gender === 'male') {
           return ['min' => $heightId - 5, 'max' => $heightId];
       } else {
           return ['min' => $heightId, 'max' => $heightId + 5];
       }
   }

       

    public function searchViewPage(){

        $stars = Star::where('is_active', 1)->pluck('name', 'id');
        $education =Education::where('is_active', 1)->pluck('name', 'id');
        return view('userPages.page.search_view',
        [
            'star'=>$stars,
            'education' => $education
    ]);
    }

    public function  regular_searchpage()
    {
        return view('userPages.page.regular_search');
    }


    public function horoscopeDetailPage(){

        $member = $this->getMemberVal();
        $horoscopeDetail = HoroscopeDetail::where('member_id', $member->id)->first();
        $horoscopeMapping = [
            'san' => 'சனி', 'சனி' => 'சனி',
            'sur' => 'சூரியன்', 'சூரியன்' => 'சூரியன்',
            'lag' => 'லக்', 'லக்' => 'லக்',
            'cha' => 'சந்திரன்', 'சந்திரன்' => 'சந்திரன்',
            'man' => 'மந்தினி', 'மந்தினி' => 'மந்தினி',
            'sev' => 'செவ்வாய்', 'செவ்வாய்' => 'செவ்வாய்',
            'kur' => 'குரு', 'குரு' => 'குரு',
            'ket' => 'கேது', 'கேது' => 'கேது',
            'rag' => 'ராகு', 'ராகு' => 'ராகு',
            'vya' => 'வியாழன்', 'வியாழன்' => 'வியாழன்',
            'pud' => 'புதன்', 'புதன்' => 'புதன்',
            'chu' => 'சுக்கிரன்', 'சுக்கிரன்' => 'சுக்கிரன்'
        ];
    
        if($member != null){
            return view('userPages.page.horoscope_detail',
            [
                'member'=> $member,
                'horoscopeDetail' => $horoscopeDetail,
                'horoscopeMapping' => $horoscopeMapping
            ]);
        }else{
            return redirect()->back()->with('error', 'member not fined.');
        }
    }

    public function searchInfo(Request $request, Search_log $Search_logModel) {
        $member = $this->getMemberVal();
  $gender = $member->gender;
  $mem = $member->id;

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
  ])
  ->where('id', $mem)
  ->first();

  $dob = $memberId->dob;
  $heightId = $memberId->height_id;
  $age = \Carbon\Carbon::parse($dob)->age;

  $ageRange = $this->getAgeRange($gender, $age);
  $heightRange = $this->getHeightRange($gender, $heightId);

  $currentDate = Carbon::now(); 
      $minDob = $currentDate->copy()->subYears($ageRange['max'])->format('Y-m-d');
      $maxDob = $currentDate->copy()->subYears($ageRange['min'])->format('Y-m-d');
               
     
  $userLocation = $memberId->taluk; 

  $talukName = Taluka::where('id', $userLocation)
  ->where('is_active', 1)
  ->value('name');

  $nearbyTaluks = Taluka::where('is_active', 1)
  ->where('id', '!=', $userLocation) // Exclude the current taluk
  ->pluck('id')
  ->toArray();

$talukIds = array_merge([$userLocation], $nearbyTaluks);

$detailsQuery = Member::where('gender', '!=', $gender) 
->leftJoin('stars', 'members.star_id', '=', 'stars.id')
->leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
->leftJoin('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
->leftJoin('heights', 'heights.id', '=', 'member_addional_details.height_id')
->leftJoin('photos', 'members.id', '=', 'photos.member_id')
->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
->where(function ($query) use ($memberId) {
  if ($memberId->partner_Information->age_from == 0 || $memberId->partner_Information->age_from === null || 
      $memberId->partner_Information->age == 0 || $memberId->partner_Information->age === null) {

      $dob = $memberId->dob;
      $age = \Carbon\Carbon::parse($dob)->age;
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

->orWhere(function ($query) use ($memberId) {
  $member = $this->getMemberVal();
  $gender = $member->gender;
  $rassiValues = is_array($memberId->partner_Information->rassi) 
      ? $memberId->partner_Information->rassi 
      : explode(',', $memberId->partner_Information->rassi);
  $query->where('gender', '!=', $gender)
  ->where('members.raasi_id', $rassiValues);
})
->orWhere(function ($query) use ($memberId) {

  $member = $this->getMemberVal();
  $gender = $member->gender;
  $starValues = is_array($memberId->partner_Information->star) 
      ? $memberId->partner_Information->star 
      : explode(',', $memberId->partner_Information->star);
  $query->where('gender', '!=', $gender)
  ->whereIn('members.star_id', $starValues);
})
->select(
  'members.dob',
  'members.profile_id',
  'members.star_id',
  'members.raasi_id',
  'members.taluk',
  'members.user_id',
  'heights.name as height_name',
  'members.id',
  'stars.name as star_name',
  'education_details.education_id',
  'education_details.address',
  'members.name',
  'member_addional_details.height_id',
  'members.created_by_relation',
  'photos.photo_id',
  'upload_files.file_path'
)
->orderBy('members.dob','desc');
$details = $detailsQuery->get();


if ($details->isEmpty()) {
    $detailsQuery = Member::where('gender', '!=', $gender)
        ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
        ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
        ->select('members.*', 'photos.photo_id', 'upload_files.file_path');
    $details = $detailsQuery->get();
}


$photoIds = [];
$matchResult = [];
$processedMembers = [];

foreach ($details as $result) {
    if (!in_array($result->id, $processedMembers)) {
        $photoIds[] = [
            'photo_id' => $result->photo_id,
            'member_id' => $result->id,
        ];
        $matchResult[] = $result;
        $processedMembers[] = $result->id;
    }
}
$userId = $member->id;
$profiles = $details->pluck('id');


$logConditionsRequestmatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 1)
    ->whereIn('profile_id', $profiles)
    ->pluck('profile_id');

$upprovePhotomatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 2)
    ->whereIn('profile_id', $profiles)
    ->pluck('profile_id');
     
    $viewProfileMatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 3)
    ->where('status', 1)
    ->whereIn('profile_id', $profiles) 
    ->pluck('profile_id');

        if ($member != null) {
            
            $memberData = [];
            
            $regular = [
                'age' => $request->input('age'),
                'member_id' => $member->id, 
                'height' => $request->input('height'),
                're_religion' => $request->input('religion'),
                'subcaste' => $request->input('subcaste'),
                'mother_tongue' => $request->input('mother_tongue'),
                'income' => $request->input('par_income'),
                'star' => $request->input('par_star'),
                'education' => $request->input('education'),
            ];

         // print_r($regular);
      //   exit();

       if ($request->has('par_star')) {
        $starInput = $request->input('par_star');
        $regular['star'] = implode(',', array_unique(array_filter(array_merge(...array_map(
            fn($item) => explode(',', $item), 
            is_array($starInput) ? $starInput : [$starInput]
        )))));
    }
    
    if ($request->has('education')) {
        $educationInput = $request->input('education');
        $regular['education'] = implode(',', array_unique(array_filter(array_merge(...array_map(
            fn($item) => explode(',', $item), 
            is_array($educationInput) ? $educationInput : [$educationInput]
        )))));
    }

            if (array_filter($regular)) {
                
                $existingLog = Search_log::where('member_id', $member->id)->first();
                if ($existingLog) {
                    $existingLog->update($regular);
                } else {
                    $Search_logModel->fill($regular);
                    $Search_logModel->save();
                }
    
                // Start query
                $gender = $member->gender;
                $query = Member::from('members as a')
                ->select(
                    'a.*',
                    'education_details.company_name',
                    'education_details.destination',
                    'cities.name as cityName',
                    'photos.photo_id',
                    'upload_files.file_path' 
                )
                ->where('a.id', '!=', $member->id)
                ->leftJoin('member_addional_details as additional', 'a.id', '=', 'additional.member_id')
                ->leftJoin('education_details', 'a.id', '=', 'education_details.member_id')
                ->leftJoin('stars', 'a.star_id', '=', 'stars.id')
                ->leftJoin('cities', 'a.city', '=', 'cities.id')
                ->leftJoin('photos', 'a.id', '=', 'photos.member_id')
                ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id') 
                ->where('a.gender', '!=', $gender);
            
                
                $ageVal = $regular['age'];
                if (!empty($ageVal)) {
                    $ageRanges = [
                        4 => [21, 22],
                        5 => [22, 23],
                        6 => [23, 25],
                        7 => [25, 27],
                        8 => [27, 30],
                        9 => [30, 50], 
                    ];
    
                    if (isset($ageRanges[$ageVal])) {
                        // Get current date timestamp
                        $currentTimestamp = time();

                        $maxDobTimestamp = strtotime("-{$ageRanges[$ageVal][0]} years", $currentTimestamp);
                        $minDobTimestamp = strtotime("-{$ageRanges[$ageVal][1]} years", $currentTimestamp);

                        $maxDob = date('Y-m-d', $maxDobTimestamp);
                        $minDob = date('Y-m-d', $minDobTimestamp);
                        $maxDob = date('Y-m-d 23:59:59', $maxDobTimestamp);
    
                        $query->whereBetween('a.dob', [$minDob, $maxDob]);
                    }
                }

                if (!empty($regular['re_religion'])) {
                    $query->where('a.religion', $regular['re_religion']);
                }
 
                if (!empty($regular['mother_tongue'])) {
                    $query->where('a.mothertongue', $regular['mother_tongue']);
                }

                if (!empty($regular['subcaste']) && $regular['subcaste'] != 5) {
                    $query->where('a.subcaste', $regular['subcaste']);
                }

                if (!empty($regular['star'])) {
                    if (is_string($regular['star'])) {
                        $regular['star'] = explode(',', $regular['star']);
                    }

                    $query->whereIn('a.star_id', $regular['star']);
                }

                if (!empty($regular['education'])) {
                    if (is_string($regular['education'])) {
                        $regular['education'] = explode(',', $regular['education']);
                    }
                    $query->whereIn('education_details.education_id', $regular['education']);
                }
     
                if (!empty($regular['income'])) {
                    $query->where('education_details.income', $regular['income']);
                }

                $height = $request->input('height');
                if ($height) {
                    switch ($height) {
                        case 4:
                            $query->whereBetween('additional.height_id', [1, 16]);
                            break;
                        case 5:
                            $query->whereBetween('additional.height_id', [16, 21]);
                            break;
                        case 6:
                            $query->whereBetween('additional.height_id', [21, 26]);
                            break;
                        case 7:
                            $query->whereBetween('additional.height_id', [26, 31]);
                            break;
                        case 8:
                            $query->where('additional.height_id', '>', 31);
                            break;
                    }
                }
  
                $paginatedResults = $query->orderBy('a.created_at', 'DESC')
                             ->distinct()
                              ->paginate(3)
                              ->appends($request->all());

                $results = $query->orderBy('a.created_at', 'DESC')->get();
                $photoIds = [];
                $uniqueResults = [];
                $processedMembers = [];
                
                foreach ($results as $result) {
                    if (!in_array($result->id, $processedMembers)) {
                        $photoIds[] = [
                            'photo_id' => $result->photo_id,
                            'member_id' => $result->id,
                        ];
                        $uniqueResults[] = $result;
                        $processedMembers[] = $result->id;
                    }
                }

                $stars = Star::where('is_active', 1)->pluck('name', 'id');
                $education =Education::where('is_active', 1)->pluck('name', 'id');
                $search_log= Search_log::where('member_id', $member->id)->first();

                $stararray = [];
if ($search_log && !empty($search_log->star)) {
    $stararray = Star::whereIn('id', explode(',', $search_log->star))
        ->where('is_active', 1)
        ->orderBy('name', 'asc')
        ->get()
        ->toArray();
}

$profile=[];
$unlike_profile=[];
$like_profile= LikedProfile::where('member_id', $member->id)->get();
foreach($like_profile as $like)
{
array_push($profile,$like->liked_profile);
array_push($unlike_profile,$like->unliked_profile );
}

$userId = $member->id;
$profileIds = $results->pluck('id');

$logConditionsRequest = MemberActivityLog::where('member_id', $userId)
->where('flag', 4)
->where('status', 1)
->whereIn('profile_id', $profileIds) // Match only relevant profile IDs
->pluck('profile_id');

$upprovePhoto = MemberActivityLog::where('member_id', $userId)
->where('flag', 4)
->where('status', 2)
->whereIn('profile_id', $profileIds) 
->pluck('profile_id');


$viewProfile = MemberActivityLog::where('member_id', $userId)
->where('flag', 3)
->where('status', 1)
->whereIn('profile_id', $profileIds) 
->pluck('profile_id');


                return view('userPages.page.search_view', [
                    'member' => $member,
                    'paginate' => $paginatedResults,
                    'memberData' => $uniqueResults,
                    'star' => $stars,
                    'education' => $education,
                    'search' => $search_log,
                    'stararray' => $stararray,
                    'profiles'=>$profile,
                    'unlike_profile'=>$unlike_profile,
                    'logConditionsRequest'=>$logConditionsRequest->toArray(),
                    'upprovePhoto'=>$upprovePhoto->toArray(),
                    'details' => $matchResult,
                    'logConditionsRequestmatch'=>$logConditionsRequestmatch->toArray(),
                    'upprovePhotomatch'=>$upprovePhotomatch->toArray(),
                    'viewProfile'=>$viewProfile->toArray(),
                    'viewProfileMatch'=>$viewProfileMatch->toArray(),
                ]);

                
            } else {
                return redirect()->back()->with('Exist', 'Please select at least one field.');
            }
        } else {
            return redirect()->back()->with('error', 'Member not found.');
        }
    }
    
    public function idSearchInfo(Request $request, Search_log $Search_logModel)
    {
        $member = $this->getMemberVal();
        $gender = $member->gender;
        $mem = $member->id;
      
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
        ])
        ->where('id', $mem)
         ->select('members.*')
        ->first();
      
        $dob = $memberId->dob;
        $heightId = $memberId->height_id;
        $age = \Carbon\Carbon::parse($dob)->age;
      
        $ageRange = $this->getAgeRange($gender, $age);
        $heightRange = $this->getHeightRange($gender, $heightId);
      
        $currentDate = Carbon::now(); 
            $minDob = $currentDate->copy()->subYears($ageRange['max'])->format('Y-m-d');
            $maxDob = $currentDate->copy()->subYears($ageRange['min'])->format('Y-m-d');
                     
           
        $userLocation = $memberId->taluk; 
      
        $talukName = Taluka::where('id', $userLocation)
        ->where('is_active', 1)
        ->value('name');
      
        $nearbyTaluks = Taluka::where('is_active', 1)
        ->where('id', '!=', $userLocation) // Exclude the current taluk
        ->pluck('id')
        ->toArray();
      
      $talukIds = array_merge([$userLocation], $nearbyTaluks);
      
      $detailsQuery = Member::where('gender', '!=', $gender) 
      ->leftJoin('stars', 'members.star_id', '=', 'stars.id')
      ->leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
      ->leftJoin('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
      ->leftJoin('heights', 'heights.id', '=', 'member_addional_details.height_id')
      ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
      ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
      ->where(function ($query) use ($memberId) {
        if ($memberId->partner_Information->age_from == 0 || $memberId->partner_Information->age_from === null || 
            $memberId->partner_Information->age == 0 || $memberId->partner_Information->age === null) {
      
            $dob = $memberId->dob;
            $age = \Carbon\Carbon::parse($dob)->age;
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
      
      ->orWhere(function ($query) use ($memberId) {
        $member = $this->getMemberVal();
        $gender = $member->gender;
        $rassiValues = is_array($memberId->partner_Information->rassi) 
            ? $memberId->partner_Information->rassi 
            : explode(',', $memberId->partner_Information->rassi);
        $query->where('gender', '!=', $gender)
        ->where('members.raasi_id', $rassiValues);
      })
      ->orWhere(function ($query) use ($memberId) {
      
        $member = $this->getMemberVal();
        $gender = $member->gender;
        $starValues = is_array($memberId->partner_Information->star) 
            ? $memberId->partner_Information->star 
            : explode(',', $memberId->partner_Information->star);
        $query->where('gender', '!=', $gender)
        ->whereIn('members.star_id', $starValues);
      })
      ->select(
        'members.dob',
        'members.profile_id',
        'members.star_id',
        'members.raasi_id',
        'members.taluk',
        'members.user_id',
        'heights.name as height_name',
        'members.id',
        'stars.name as star_name',
        'education_details.education_id',
        'education_details.address',
        'members.name',
        'member_addional_details.height_id',
        'members.created_by_relation',
        'photos.photo_id',
        'upload_files.file_path'
      )
      ->orderBy('members.dob','desc');
      $details = $detailsQuery->get();
      
      
      if ($details->isEmpty()) {
          $detailsQuery = Member::where('gender', '!=', $gender)
              ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
              ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
              ->select('members.*', 'photos.photo_id', 'upload_files.file_path');
          $details = $detailsQuery->get();
      }
      
      
      $photoIds = [];
      $matchResult = [];
      $processedMembers = [];
      
      foreach ($details as $result) {
          if (!in_array($result->id, $processedMembers)) {
              $photoIds[] = [
                  'photo_id' => $result->photo_id,
                  'member_id' => $result->id,
              ];
              $matchResult[] = $result;
              $processedMembers[] = $result->id;
          }
      }
    
        if ($member != null) {
            // Save search log
            $regular = [
                'matrimony_id' => $request->input('search_id'),
                'member_id' => $member->id,
            ];
    
            $existingLog = Search_log::where('member_id', $member->id)->first();
    
            if ($existingLog) {
                $existingLog->update($regular);
            } else {
                $Search_logModel->fill($regular);
                $Search_logModel->save();
            }
    
            // Search for member by ID
            $gender = $member->gender;
            $results = Member::from('members as m')
                ->leftJoin('education_details as e', 'e.member_id', '=', 'm.id')
                ->leftJoin('member_addional_details as ma', 'ma.member_id', '=', 'm.id')
                ->leftJoin('photos', 'm.id', '=', 'photos.member_id')
                ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
                ->where('m.gender', '!=', $gender)
                ->where('m.id', $request->input('search_id'))
                ->select(
                    'm.id',
                    'm.user_id',
                    'm.name',
                    'm.created_by_relation',
                    'm.age',
                    'm.dob',
                    'm.religion',
                    'm.city',
                    'e.occuption',
                    'e.company_name',
                    'e.education_id',
                    'e.address',
                    'ma.height_id',
                    'ma.weight_id',
                    'ma.about_you',
                    'photos.photo_id',
                    'upload_files.file_path'
                )
                ->first();
$memberId = $results->id;
                $userId = $member->id;

                $upprovePhoto = MemberActivityLog::where('member_id', $userId)
                ->where('flag', 4)
                ->where('status', 2)
                ->where('profile_id', $memberId) 
                ->exists();
        
                $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
        ->where('flag', 4)
        ->where('status', 1)
        ->where('profile_id', $memberId) 
        ->exists();  
        
        

        $userId = $member->id;
$profiles = $details->pluck('id');

$logConditionsRequestmatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 1)
    ->whereIn('profile_id', $profiles)
    ->pluck('profile_id');

$upprovePhotomatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 2)
    ->whereIn('profile_id', $profiles)
    ->pluck('profile_id');

                if ($results) {
                    $cityName = City::where('id', $results->city)->value('name');
                    $likedProfiles = LikedProfile::where('member_id', $member->id)->get();
        
                    $profiles = $likedProfiles->pluck('liked_profile')->toArray();
                    $unlike_profiles = $likedProfiles->pluck('unliked_profile')->toArray();
        
                    return view('userPages.page.id_search', [
                        'member' => $member,
                        'memberData' => $results,
                        'cityName' => $cityName,
                        'profiles' => $profiles,
                        'unlike_profile' => $unlike_profiles,
                        'logConditionsRequest'=>$logConditionsRequest,
                        'upprovePhoto'=>$upprovePhoto,
                        'details' => $matchResult,
                    'logConditionsRequestmatch'=>$logConditionsRequestmatch->toArray(),
                    'upprovePhotomatch'=>$upprovePhotomatch->toArray(),
                    ]);
                }
        
                return redirect()->route('app.v2.searchpage')->with('success', 'Profile not found.');
            }
    
        return redirect()->route('app.v2.searchpage')->with('success', 'Invalid search. Please try again.');
    }
    


public function keywordSearchInfo(Request $request, Search_log $Search_logModel)
{
    $member = $this->getMemberVal();
    $gender = $member->gender;
    $mem = $member->id;
  
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
    ])
    ->where('id', $mem)
    ->first();
  
    $dob = $memberId->dob;
    $heightId = $memberId->height_id;
    $age = \Carbon\Carbon::parse($dob)->age;
  
    $ageRange = $this->getAgeRange($gender, $age);
    $heightRange = $this->getHeightRange($gender, $heightId);
  
    $currentDate = Carbon::now(); 
    $minDob = $currentDate->copy()->subYears($ageRange['max'])->format('Y-m-d');
    $maxDob = $currentDate->copy()->subYears($ageRange['min'])->format('Y-m-d');
                        
    $userLocation = $memberId->taluk; 
  
    $talukName = Taluka::where('id', $userLocation)
    ->where('is_active', 1)
    ->value('name');
  
    $nearbyTaluks = Taluka::where('is_active', 1)
    ->where('id', '!=', $userLocation) // Exclude the current taluk
    ->pluck('id')
    ->toArray();
  
   $talukIds = array_merge([$userLocation], $nearbyTaluks);
  
   $detailsQuery = Member::where('gender', '!=', $gender) 
  ->leftJoin('stars', 'members.star_id', '=', 'stars.id')
  ->leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
  ->leftJoin('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
  ->leftJoin('heights', 'heights.id', '=', 'member_addional_details.height_id')
  ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
  ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
  ->where(function ($query) use ($memberId) {
    if ($memberId->partner_Information->age_from == 0 || $memberId->partner_Information->age_from === null || 
        $memberId->partner_Information->age == 0 || $memberId->partner_Information->age === null) {
  
        $dob = $memberId->dob;
        $age = \Carbon\Carbon::parse($dob)->age;
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
  
  ->orWhere(function ($query) use ($memberId) {
    $member = $this->getMemberVal();
    $gender = $member->gender;
    $rassiValues = is_array($memberId->partner_Information->rassi) 
        ? $memberId->partner_Information->rassi 
        : explode(',', $memberId->partner_Information->rassi);
    $query->where('gender', '!=', $gender)
    ->where('members.raasi_id', $rassiValues);
  })
  ->orWhere(function ($query) use ($memberId) {
  
    $member = $this->getMemberVal();
    $gender = $member->gender;
    $starValues = is_array($memberId->partner_Information->star) 
        ? $memberId->partner_Information->star 
        : explode(',', $memberId->partner_Information->star);
    $query->where('gender', '!=', $gender)
    ->whereIn('members.star_id', $starValues);
  })
  ->select(
    'members.dob',
    'members.profile_id',
    'members.star_id',
    'members.raasi_id',
    'members.taluk',
    'members.user_id',
    'heights.name as height_name',
    'members.id',
    'stars.name as star_name',
    'education_details.education_id',
    'education_details.address',
    'members.name',
    'member_addional_details.height_id',
    'members.created_by_relation',
    'photos.photo_id',
    'upload_files.file_path'
  )
  ->orderBy('members.dob','desc');
  $details = $detailsQuery->get();
    
  if ($details->isEmpty()) {
      $detailsQuery = Member::where('gender', '!=', $gender)
          ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
          ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
          ->select('members.*', 'photos.photo_id', 'upload_files.file_path');
      $details = $detailsQuery->get();
  }
  
  
  $photoIds = [];
  $matchResult = [];
  $processedMembers = [];
  
  foreach ($details as $result) {
      if (!in_array($result->id, $processedMembers)) {
          $photoIds[] = [
              'photo_id' => $result->photo_id,
              'member_id' => $result->id,
          ];
          $matchResult[] = $result;
          $processedMembers[] = $result->id;
      }
  }

    if ($member != null) {
        // Prepare search data for logging
        $searchData  = [
            'member_id' => $member->id, 
          'key_age'=> $request->input('key_age'),
            'key_height' => $request->input('key_height'),
            'key_word' => $request->input('keyword'),
        ];

        if(!empty($searchData['key_age']) || !empty($searchData['key_height']) ||  (!empty($searchData['key_word'])))
{
    Search_log::updateOrCreate(['member_id' => $member->id], $searchData);
        // Save or update search log
        $existingLog = Search_log::where('member_id', $member->id)->first();
        if ($existingLog) {                                         
            $existingLog->update($searchData);
        } else {
            $Search_logModel->fill($searchData);
            $Search_logModel->save();
        }


        
        // Start building the member query
        $gender = $member->gender;
        $query = Member::leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
                       ->leftJoin('member_addional_details as additional', 'members.id', '=', 'additional.member_id')
                       ->leftJoin('states', 'members.state', '=', 'states.id')
                       ->leftJoin('cities', 'members.city', '=', 'cities.id')
                       ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
                       ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id') 
                       ->where('members.gender', '!=', $member->gender);

                       $ageVal = $searchData['key_age'];

                       if (!empty($ageVal)) {
                           $ageRanges = [
                               4 => [21, 22],
                               5 => [22, 23],
                               6 => [23, 25],
                               7 => [25, 27],
                               8 => [27, 30],
                               9 => [30, 50], 
                           ];
           
                           if (isset($ageRanges[$ageVal])) {
                               // Get current date timestamp
                               $currentTimestamp = time();
       
                               $maxDobTimestamp = strtotime("-{$ageRanges[$ageVal][0]} years", $currentTimestamp);
                               $minDobTimestamp = strtotime("-{$ageRanges[$ageVal][1]} years", $currentTimestamp);
       
                             //  $maxDob = date('Y-m-d', $maxDobTimestamp);
                               $minDob = date('Y-m-d', $minDobTimestamp);
                               $maxDob = date('Y-m-d 23:59:59', $maxDobTimestamp);

                             //  echo "Min DOB: " . $minDob . "<br>";
                             //  echo "Max DOB: " . $maxDob . "<br>";
           
                               $query->whereBetween('members.dob', [$minDob, $maxDob]);
                           }
                       }


        // Filter by height if provided
        $height = $request->input('key_height');
        if ($height) {
            switch ($height) {
                case 4:
                    $query->whereBetween('additional.height_id', [1, 16]);
                    break;
                    case 5:
                        $query->whereBetween('additional.height_id', [17, 21]);
                        break;
                case 6:
                    $query->whereBetween('additional.height_id', [21, 26]);
                    break;
                    
                case 7:
                    $query->whereBetween('additional.height_id', [26, 31]);
                    break;
                case 8:
                    $query->where('additional.height_id', '>', 31);
                    break;
            }
        }

        // Apply keyword search across multiple fields
        $keyword = $request->input('keyword');
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('members.name', 'like', "%$keyword%")
                  ->orWhere('cities.name', 'like', "%$keyword%")
                  ->orWhere('states.name', 'like', "%$keyword%")
                  ->orWhere('members.mobile', 'like', "%$keyword%")
                  ->orWhere('education_details.occuption', 'like', "%$keyword%")
                  ->orWhere('education_details.company_name', 'like', "%$keyword%")
                  ->orWhere('education_details.destination', 'like', "%$keyword%");
            });
        }

        $memberData = $query->orderBy('members.created_at', 'DESC')
                            ->select('members.*',
                                     'education_details.company_name',
                                     'education_details.destination',
                                     'additional.height_id',
                                     'cities.name as cityName',
                                     'states.name as stateName',
                                     'photos.photo_id',
                                     'upload_files.file_path');
                            
                            $paginatedResults = $query->orderBy('members.created_at', 'DESC')
                            ->select(
                                'members.*',
                                'education_details.company_name',
                                'education_details.destination',
                                'additional.height_id',
                                'cities.name as cityName',
                                'states.name as stateName',
                                'photos.photo_id',
                                'upload_files.file_path'
                            )
                            ->distinct()
                            ->paginate(2)
                            ->appends($request->all());
                        
                        // Append the current search parameters to the pagination links
                        $paginatedResults->appends([
                            'key_height' => $height,
                            'keyword' => $keyword
                        ]);
 
                       

                            $photoIds = [];
                $uniqueResults = [];
                $processedMembers = [];
                
                foreach ($memberData as $result) {
                    if (!in_array($result->id, $processedMembers)) {
                        $photoIds[] = [
                            'photo_id' => $result->photo_id,
                            'member_id' => $result->id,
                        ];
                        $uniqueResults[] = $result;
                        $processedMembers[] = $result->id;
                    }
                }

                $profile=[];
                $unlike_profile=[];
                $like_profile= LikedProfile::where('member_id', $member->id)->get();
                foreach($like_profile as $like)
                {
                array_push($profile,$like->liked_profile);
                array_push($unlike_profile,$like->unliked_profile );
                }

                $userId = $member->id;
                $profileIds = $memberData->pluck('id');
                
                $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
                ->where('flag', 4)
                ->where('status', 1)
                ->whereIn('profile_id', $profileIds) // Match only relevant profile IDs
                ->pluck('profile_id');
                
                $upprovePhoto = MemberActivityLog::where('member_id', $userId)
                ->where('flag', 4)
                ->where('status', 2)
                ->whereIn('profile_id', $profileIds) 
                ->pluck('profile_id');

                $viewProfile = MemberActivityLog::where('member_id', $userId)
                ->where('flag', 3)
                ->where('status', 1)
                ->whereIn('profile_id', $profileIds) 
                ->pluck('profile_id');
                


                $userId = $member->id;
$profiles = $details->pluck('id');

$logConditionsRequestmatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 1)
    ->whereIn('profile_id', $profiles)
    ->pluck('profile_id');

$upprovePhotomatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 2)
    ->whereIn('profile_id', $profiles)
    ->pluck('profile_id');

    $viewProfileMatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 3)
    ->where('status', 1)
    ->whereIn('profile_id', $profiles) 
    ->pluck('profile_id');
    

        return view('userPages.page.keywordSearch', [
            'member' => $member,
            'memberData' => $paginatedResults,
            'profiles'=>$profile,'unlike_profile'=>$unlike_profile,
            'logConditionsRequest'=>$logConditionsRequest->toArray(),
            'upprovePhoto'=>$upprovePhoto->toArray(),
            'details' => $matchResult,
            'logConditionsRequestmatch'=>$logConditionsRequestmatch->toArray(),
            'upprovePhotomatch'=>$upprovePhotomatch->toArray(),
            'paginate' => $paginatedResults,
            'viewProfile'=>$viewProfile->toArray(),
            'viewProfileMatch'=>$viewProfileMatch->toArray(),
        ]);
    }
    else{
        return redirect()->route('app.v2.searchpage')->with('success', 'Please Fill Height or Keyword.');
    }
}
}

public function popupViewPage(Request $request)
{
    $member = $this->getMemberVal();
    if($member != null){

        $userId = $request->input('mem_id');
        $user = Member::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Ensure the view exists and is correctly named.
        return view('userPages.page.popupView', ['member' => $member, 'user' => $user]);
    }else{
        return redirect()->back()->with('error', 'member not fined.');
    }
}


public function  matchespage(Request $request)
    {
        $member = $this->getMemberVal();
        $gender=$member->gender;
        $details=Member::where('gender', '!=', $gender)
        ->join('education_details', 'members.id', '=', 'education_details.member_id')
        ->join('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
        ->join('heights','heights.id','=','member_addional_details.height_id')
        ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
        ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
        ->select(
        'members.dob',
        'members.profile_id',
        'members.user_id',
        'heights.name as height_name',
        'members.id',
        'education_details.member_id',
        'education_details.occuption',
        'education_details.company_name',
        'education_details.education_id',
        'education_details.address', 
        'members.name',
        'member_addional_details.height_id',
        'member_addional_details.weight_id',
        'member_addional_details.about_you',
        'members.created_by_relation',
        'members.age',
        'members.religion',
        'photos.photo_id',
        'upload_files.file_path')
        ->distinct()
        ->paginate(3);

      $photoIds = [];
        $uniqueResults = [];
        $processedMembers = [];
        
        foreach ($details as $result) {
            if (!in_array($result->id, $processedMembers)) {
                $photoIds[] = [
                    'photo_id' => $result->photo_id,
                    'member_id' => $result->id,
                ];
                $uniqueResults[] = $result;
                $processedMembers[] = $result->id;
            }
        }

        $profile=[];
        $unlike_profile=[];
        $like_profile= LikedProfile::where('member_id', $member->id)->get();
        foreach($like_profile as $like)
        {
        array_push($profile,$like->liked_profile);
        array_push($unlike_profile,$like->unliked_profile );
        }



        $userId = $member->id;
    // $profileId = $details->input('profile_id');
    $profileIds = $details->pluck('id');

    $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 1)
    ->whereIn('profile_id', $profileIds) // Match only relevant profile IDs
    ->pluck('profile_id');

    $upprovePhoto = MemberActivityLog::where('member_id', $userId)
->where('flag', 4)
->where('status', 2)
->whereIn('profile_id', $profileIds) 
->pluck('profile_id');

$viewProfile = MemberActivityLog::where('member_id', $userId)
->where('flag', 3)
->where('status', 1)
->whereIn('profile_id', $profileIds) 
->pluck('profile_id');


$member = $this->getMemberVal();
$gender = $member->gender;
$mem = $member->id;

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
])
->where('id', $mem)
->first();

$dob = $memberId->dob;
$heightId = $memberId->height_id;
$age = \Carbon\Carbon::parse($dob)->age;

$ageRange = $this->getAgeRange($gender, $age);
$heightRange = $this->getHeightRange($gender, $heightId);

$currentDate = Carbon::now(); 
    $minDob = $currentDate->copy()->subYears($ageRange['max'])->format('Y-m-d');
    $maxDob = $currentDate->copy()->subYears($ageRange['min'])->format('Y-m-d');
             
   
$userLocation = $memberId->taluk; 

$talukName = Taluka::where('id', $userLocation)
->where('is_active', 1)
->value('name');

$nearbyTaluks = Taluka::where('is_active', 1)
->where('id', '!=', $userLocation) // Exclude the current taluk
->pluck('id')
->toArray();

$talukIds = array_merge([$userLocation], $nearbyTaluks);

$detailsQuery = Member::where('gender', '!=', $gender) 
->leftJoin('stars', 'members.star_id', '=', 'stars.id')
->leftJoin('education_details', 'members.id', '=', 'education_details.member_id')
->leftJoin('member_addional_details', 'members.id', '=', 'member_addional_details.member_id')
->leftJoin('heights', 'heights.id', '=', 'member_addional_details.height_id')
->leftJoin('photos', 'members.id', '=', 'photos.member_id')
->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
->where(function ($query) use ($memberId) {
    if (!$memberId->partner_Information || // Check if partner_Information is null
    $memberId->partner_Information->age_from == 0 || 
    $memberId->partner_Information->age_from === null || 
    $memberId->partner_Information->age == 0 || 
    $memberId->partner_Information->age === null) {

    $dob = $memberId->dob;
    $age = \Carbon\Carbon::parse($dob)->age;
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

->orWhere(function ($query) use ($memberId) {
    $member = $this->getMemberVal();
    $gender = $member->gender;

    // Check if partner_Information exists and has the rassi property
    $rassiValues = null;
    if ($memberId->partner_Information && isset($memberId->partner_Information->rassi)) {
        $rassiValues = is_array($memberId->partner_Information->rassi)
            ? $memberId->partner_Information->rassi
            : explode(',', $memberId->partner_Information->rassi);
    }

    if ($rassiValues) {
        $query->where('gender', '!=', $gender)
            ->whereIn('members.raasi_id', $rassiValues); // Use whereIn for multiple values
    }
})

->orWhere(function ($query) use ($memberId) {
    $member = $this->getMemberVal();
    $gender = $member->gender;

    // Check if partner_Information exists and has the star property
    $starValues = null;
    if ($memberId->partner_Information && isset($memberId->partner_Information->star)) {
        $starValues = is_array($memberId->partner_Information->star)
            ? $memberId->partner_Information->star
            : explode(',', $memberId->partner_Information->star);
    }

    if (!empty($starValues)) {
        $query->where('gender', '!=', $gender)
              ->whereIn('members.star_id', $starValues); // Use whereIn for multiple values
    }
})

->select(
'members.dob',
'members.profile_id',
'members.star_id',
'members.raasi_id',
'members.taluk',
'members.user_id',
'heights.name as height_name',
'members.id',
'stars.name as star_name',
'education_details.education_id',
'education_details.address',
'members.name',
'member_addional_details.height_id',
'members.created_by_relation',
'photos.photo_id',
'upload_files.file_path'
)
->orderBy('members.dob','desc');
$detailsmatch = $detailsQuery->get();


if ($detailsmatch->isEmpty()) {
  $detailsQuery = Member::where('gender', '!=', $gender)
      ->leftJoin('photos', 'members.id', '=', 'photos.member_id')
      ->leftJoin('upload_files', 'photos.photo_id', '=', 'upload_files.id')
      ->select('members.*', 'photos.photo_id', 'upload_files.file_path');
  $detailsmatch = $detailsQuery->get();
}


$photoIds = [];
$matchResult = [];
$processedMembers = [];

foreach ($detailsmatch as $result) {
  if (!in_array($result->id, $processedMembers)) {
      $photoIds[] = [
          'photo_id' => $result->photo_id,
          'member_id' => $result->id,
      ];
      $matchResult[] = $result;
      $processedMembers[] = $result->id;
  }
}




$userId = $member->id;
$profiles = $detailsmatch->pluck('id');

$logConditionsRequestmatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 1)
    ->whereIn('profile_id', $profiles)
    ->pluck('profile_id');

$upprovePhotomatch = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 2)
    ->whereIn('profile_id', $profiles)
    ->pluck('profile_id');

    $viewProfilematch= MemberActivityLog::where('member_id', $userId)
->where('flag', 3)
->where('status', 1)
->whereIn('profile_id', $profiles) 
->pluck('profile_id');

        return view('userPages.page.matches',
        ['details'=>$details,
        'uniqueResults' => $uniqueResults,
        'profile'=>$profile,
        'unlike_profile'=>$unlike_profile,
        'logConditionsRequest' => $logConditionsRequest->toArray(),
        'upprovePhoto'=>$upprovePhoto->toArray(),
        'detailsmatch' => $matchResult,
        'logConditionsRequestmatch'=>$logConditionsRequestmatch->toArray(),
        'upprovePhotomatch'=>$upprovePhotomatch->toArray(),
        'viewProfile'=>$viewProfile->toArray(),
        'viewProfilematch'=>$viewProfilematch->toArray(),
    ]);

    }




    public function add_interest(Request $request, LikedProfile $LikedProfileModel)
    {
        $member = $this->getMemberVal();
        $user_id = $member->id;
        $members_id = $request->input('members_id');
        $x = $request->input('x');
    
        if ($x == 2 && !Member::find($user_id)) {
            return response()->json(['error' => 'Unliked profile does not exist'], 400);
        }
    
        if ($x == 1) {
            $LikedProfileModel->create([
                'member_id' => $user_id,
                'liked_profile' => $members_id,
                'liked_flag' => 1,
                'unliked_profile' => null,
                'unliked_flag' => 0,
                'is_active' => true,
            ]);
            echo 1;
        }
        if ($x == 2) {
            $LikedProfileModel->create([
               'member_id' => $user_id,
                'liked_profile' => null,
                'liked_flag' => 0,
                'unliked_profile' => $members_id,
                'unliked_flag' => 1,
                'is_active' => true,
            ]);
            echo 2;
        }
    }
	 public static function getHeight($id)
    {
        $height_name = MemberAddionalDetail::where('member_id',$id)->first();
        if(!empty($height_name->height_id))
        {
        $height= Height::where('id',$height_name->height_id)->first();
        return $height->name;
        }
        else 
        {
        return "-";
        }
    }
    public function getEducation_details($id)
    {
        $education_details = EducationDetail::where('id',$id)->first();
        return $education_details;
    }
    public function getPhoto_details($id)
    {
        $member = $this->getMemberVal();

        $userId = $member->id;
        
        $photo=Photo::where('member_id',$id)->first();
        $photo_details=UploadFile::where('id',$photo->photo_id)->first();

        $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
        ->where('flag', 4)
        ->where('status', 1)
        ->whereIn('profile_id', $id) // Match only relevant profile IDs
        ->pluck('profile_id');
    
        $upprovePhoto = MemberActivityLog::where('member_id', $userId)
    ->where('flag', 4)
    ->where('status', 2)
    ->whereIn('profile_id', $id) 
    ->pluck('profile_id');
    
       
        if(!empty($photo_details))
        {
            return $photo_details->file_name;
        }
        else
        {
            return '';
        }
        
    }
    public function show_matches(Request $request)
    {
        //DB::enableQueryLog();
        $member = $this->getMemberVal();
        $gender=$member->gender;
        $duration=$request->input('duration');
        $height=$request->input('height');
        $height1=$request->input('height1');
        $photo=$request->input('photo');
        $age_val=$request->input('age_val');
        $age_val1=$request->input('age_val1');
        $date=date('Y-m-d');
		$datec=''; 
		if($duration==1)
		{
			$datec = date('Y-m-d', strtotime('-7 days', strtotime($date))); 

		}
		if($duration==2)
		{
			$datec = date('Y-m-d', strtotime('-1 month', strtotime($date))); 
			
		}
		if($duration==3)
		{
			$datec = date('Y-m-d', strtotime('-1 year', strtotime($date)));
		}
        $query=Member::where('gender', '!=', $gender);
        if(!empty($photo))
        {
        $query->join('photos','members.id', '=', 'photos.member_id');
        }
        if(!empty($datec))
        {
        $query->where('members.created_at','>=', $datec);
        }
        if(!empty($height) && !empty($height1))
		{
        $query->join('member_addional_details','members.id', '=', 'member_addional_details.member_id');
		$query->where('member_addional_details.height_id', '<=',$height);
		$query->where('member_addional_details.height_id', '>=',$height1);
		}
        if(!empty($age_val) && !empty($age_val1))
        {
            $maxDob = Carbon::now()->subYears($age_val)->toDateString();
            $minDob = Carbon::now()->subYears($age_val1)->toDateString();
            $query->whereBetween('members.dob', [$minDob, $maxDob]);
        }
        $query->select('members.*');
        $details = $query->paginate(2);
        // $details=$query->get();
       
        $htmlContent = '';
        $i=1;
        if($details->isEmpty())
        {
            $htmlContent.="<div class='text-center mt-5'><h3>The requested details are unavailable.</h3></div>
            ";
        }
     else
        {
        foreach($details as $user)
        {
        $height = $this->getHeight($user->id);
        $location = $this->getEducation_details($user->id);
       
        $like_profile= LikedProfile::where('liked_profile', $user->id)->first();
        if(!empty($like_profile))
        {
            $like_flag=$like_profile->liked_flag;
        }
        else
        {
            $like_flag=''; 
        }
        $unlike_profile= LikedProfile::where('unliked_profile', $user->id)->first();
        if(!empty($unlike_profile))
        {
            $unlike_flag=$unlike_profile->unliked_flag;
        }
        else
        {
            $unlike_flag=''; 
        }
        if(!empty($photo))
        {
            $photo=$this->getPhoto_details($user->id);
         $file_name=asset('images/photos/'.$photo);
        }
        else
        { 
        $file_name=asset('/images/user_image.png');
        }
        if(!empty($location))
        {
           $address=$location->address ?? 'Not Available'; 
           $occuption=$location->occuption ?? 'Not Available';
           $company_name=$location->company_name ?? 'Not Available';
        }
        else
        {
          $address='';
          $occuption='';
          $company_name='';  
        }
        if($like_flag==1)
        {
            $like_style="display:block";
        }
        else
        {
            $like_style="display:none";
        }
        if($unlike_flag==2)
        {
            $unlike_style="display:block";
        }
        else
        {
            $unlike_style="display:none";
        }
        if($like_flag==1 || $unlike_flag==2)
        {
            $style="display:none";
        }
        else
        {
            $style="display:block";   
        }
    
    $age = Carbon::parse($user->dob)->age; 

    $like_profile= LikedProfile::where('liked_profile', $user->id)->first();
    if(!empty($like_profile))
    {
        $like_flag=$like_profile->liked_flag;
    }
    else
    {
        $like_flag=''; 
    }

    $profileId = $user->id;

    $logConditionsRequest = MemberActivityLog::where('member_id', $member->id)
        ->where('flag', 4)
        ->where('status', 1)
        ->where('profile_id', $profileId)
        ->first();
    
    $upprovePhoto = MemberActivityLog::where('member_id', $member->id)
        ->where('flag', 4)
        ->where('status', 2)
        ->where('profile_id', $profileId)
        ->first();

        
$viewProfile = MemberActivityLog::where('member_id', $member->id)
->where('flag', 3)
->where('status', 1)
->where('profile_id', $profileId)
->first();

    $requestphoto = 'display:none';
    $sendphoto = 'display:none';
    $upprovePhotoStyle = 'display:none';
    $photomodelrequest = 'display:none';
    $photomodelapprove = 'display:none';
    $viewprofiles = 'display:none';
    $photomodel ='';
    
    if (!empty($viewProfile)) {
        $viewProfile =1;
    } else {
        $viewProfile = '';
    }

    if ($viewProfile == 1) {
        $viewprofiles = 'display:block'; 
    } else {
        $viewprofiles = 'display:none';
    }

    if (!empty($logConditionsRequest)) {
        $logConditionsRequest =1;
    } else {
        $logConditionsRequest = '';
    }
    
    if (!empty($upprovePhoto)) {
        $upprovePhoto = 1;
    } else {
        $upprovePhoto = '';
    }

    if ($upprovePhoto == 1) {
        $upprovePhotoStyle = 'display:block'; 
    } elseif ($logConditionsRequest == 1) {
        $sendphoto = 'display:block'; 
    } else {
        $requestphoto = 'display:block'; 
    }
    
    if ($logConditionsRequest == 1) {
        $photomodelrequest = 'display:block';
        $photomodelapprove = 'display:none';
        $photomodel = 'display:none'; 
    } else {
        $photomodelapprove = 'display:block';
        $photomodel = 'display:block';
    }
    $profileUrl = route('app.v2.popupView_page', ['id' => base64_encode($user->id)]);
    $htmlContent .="<div class='row'>
                          <div class='col-md-12 mb-4   profile-card' data-gender='bride'>
                          <div class='wrapper-max' style='border:3px solid #e5e5e5;'>
                          <div class='card'>
                          <div class='row'>
                          <div class='col-md-7' style='padding-left:20px;'>
                          <a href='{$profileUrl}' 
                           target='_blank' 
                           onclick='event.stopPropagation(); view_person(event, this)'
                           data-profile-id='$user->id' 
                           data-name='$user->name '
                            data-user-id='$user->user_id' 
                           >
                            {$user->profile_id } || <span>Profile created for {$user->created_by_relation}</span>
                        </a>
&nbsp;&nbsp;&nbsp;&nbsp;</div>
                          <div class='col-md-5 pad_space'>
                          </div>
                       
                               <div class='col-md-4 pt-3 ms-2 position-relative text-center'>
                                                   
                                                       
                                                            <div class='profile-container position-relative'  style=$upprovePhotoStyle>
                                                                <img src='" . asset($user->file_path) . "' class='rounded-circle' width='150' height='150' alt='Profile Image'>
                                                            </div>
                                                       
                                                            <div class='profile-container position-relative' style=$sendphoto>
                                                                <img src='" . asset('/images/user_image.png') . "' class='rounded-circle' width='150' height='150' alt='Default Image'>
                                                                <a href='#' data-bs-toggle='modal' data-bs-target='#iconModalFilter{$i}' class='lock-icon position-absolute rounded-circle' style='top:90px;left:165px'>
                                                                <i class='bi bi-person-fill-lock fs-4 text-dark'></i>
                                                            </a>
                                                            </div>
                                                      
                                                   
                                                        <div class='profile-container position-relative' style=$requestphoto>
                                                            <img src='" . asset('/images/user_image.png') . "' class='rounded-circle' width='150' height='150' alt='Default Image'>
                                                            <a href='#' data-bs-toggle='modal' data-bs-target='#iconModalFilter{$i}' class='lock-icon position-absolute rounded-circle' style='top:90px;left:165px'>
                                                                <i class='bi bi-person-fill-lock fs-4 text-dark'></i>
                                                            </a>
                                                        </div>
                                                   <span class='text-success px-4' style=$viewprofiles>view</span>
                                                    <h5 class='card-title mt-2' style='font-weight: bold;'>{$user->name}</h5>
                                                </div>


                          <div class='col-md-6'>
                          <div class='card-body'>
                          <input type='hidden' name='members_id' value='$user->id' id='members_id$i'>
                          
                          <p class='card-text'>Age $ Height: $age & $height</p>
                         
                          <p class='card-text'>Location: $address</p>
                          <p class='card-text'>Profession: $occuption</p>
                          <p class='card-text'>Company: $company_name</p>
                      <div class='row gy-4 pt-3' id='add_interest$i' style=$style>
                          
                        <div class='col-md-12'>
                        
                          <label class='text-start me-3'>Interest:</label>
                        
                          <button class='btn btn-success me-2' onclick='add_interest_status(1,$i);'>
                          <i class='fas fa-comments'></i>Yes
                          </button>
                          <button class='btn btn-danger' onclick='add_interest_status(2,$i);'>
                          <i class='fas fa-comments'></i>No
                          </button>
                        </div>
                      </div>
                      <div class='row' id='interest$i' style=$like_style>
                        <div class='col-md-6'>
                          <button class='btn btn btn-success'>
                          <i class='fas fa-comments'></i>Interested 
                          </button>
                        </div>
                      </div>
                      <div class='row' id='not_interest$i' style=$unlike_style>
                        <div class='col-md-9'>
                          <button class='btn btn btn-danger'>
                          <i class='fas fa-comments'></i>Not Interested 
                          </button>
                        </div>
                      </div>

<div class='modal fade' id='iconModalFilter{$i}' tabindex='-1' aria-labelledby='iconModalFilter{$i}' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered' role='document'>
                              <div class='modal-content'>
                                <div class='modal-header text-white justify-content-center' style='border-bottom: none;'>
                                  <h5 class='modal-title d-flex align-items-center' id='iconModalLabel{$i}'>
                                    <i class='bi bi-shield-lock-fill me-2'></i> Request to View Profile
                                  </h5>
                                  <button type='button' class='btn-close position-absolute end-0 me-3' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                          
                                <div class='modal-body text-center'>
                                  <img src='" . asset('/images/user_image.png') . "' alt='Secure Profile' class='img-fluid rounded-circle mb-3' width='100'>
            

                                <h5 class='card-title mt-2' style='font-weight: bold;'>{$user->name}</h5>
                                <p class='fs-5'>This profile is private. You need to request permission to view it.</p>
                          <input type='hidden' name='user_ids' value='$user->user_id' id='user_ids$i'>
  <input type='hidden' name='profile_ids' value='$user->id' id='profile_ids$i'>
    <input type='hidden' name='names' value='$user->name' id='names$i'>


                                <div class='modal-footer justify-content-center' style='border-top: none;'>
                                
                                  <span id='requestedsend{$i}' class='text-success px-4' style=$photomodelrequest>Request Sent successfully!</span>
                                 
                                  <button type='button' class='btn btn-success px-4' id='profile_view{$i}' onclick='profilerequest({$i})' style=$photomodel>
                                    <i class='bi bi-send'></i> Send Request
                                  </button>
                                  <span id='sends{$i}' class='text-success px-4' style='display: none;' style=$photomodelapprove>Request Sent successfully!</span>
                                 
                                </div>
                              </div>
                            </div>
                          </div>
            
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          
                          ";

                          $i++;
                         
    }
    $htmlContent .= "<div class='pagination-container'>{$details->links()}</div>";

    $htmlContent .= "<script>
    function view_person(event, element) {
        event.preventDefault();
        var profile_id = $(element).data('profile-id');
        var name = $(element).data('name');
        var user_id = $(element).data('user-id');
        var url = $(element).attr('href');

        $.ajax({
            url: '" . route('app.v2.request_profile') . "',
            type: 'POST',
            data: {
                profile_id: profile_id,
                name: name,
                user_id: user_id,
                _token: '" . csrf_token() . "'
            },
            success: function (results) {
                if (results.success) {
                    window.open(url, '_blank');
                } else {
                    alert(results.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    }
</script>";

        }
 
        return response($htmlContent);
        
    }

    public function mobileRequest(Request $request, MemberActivityLog $memberActivityLogModel)
    {
        $member = $this->getMemberVal();
        $userId = $member->id;
        $name = $request->input('name');
    
        $logName = $member->name;
        $message = "{$logName} requested {$name} MobileNumber";


        $today = date('Y-m-d');

        $requestToday = $memberActivityLogModel
            ->where('member_id', $userId)
            ->where('flag', 2)
            ->whereDate('created_at', $today)
            ->count();

        if ($requestToday >= 5) {
            return response()->json([
                'success' => false,
                'message' => 'You have reached your daily limit of Request Mobile Number.',
            ]);
        }
    
        $data = [
            'member_id' => $userId,
            'profile_id' => $request->input('profile_id'),
            'flag' => 2,
            'message' => $message,
            'user_id' => $request->input('user_id'),
            'status' => 1
        ];
    
        $profileId = $request->input('profile_id');

        $memberActivityLogModel->create($data);
    
        $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
        ->where('flag', 2)
        ->where('status', 1)
        ->where('profile_id', $profileId) 
        ->exists();

        return response()->json([
            'success' => true,
            'message' => 'Log entry created successfully.',
            'logConditionsRequest' => $logConditionsRequest
        ]);
    }

    public function viewRequest(Request $request, MemberActivityLog $memberActivityLogModel)
{
    $member = $this->getMemberVal();
    $userId = $member->id;
    $profileId = $request->input('profile_id');

    $existingLog = $memberActivityLogModel->where('member_id', $userId)
        ->where('profile_id', $profileId)
        ->where('flag', 3)
        ->first();

    $today = date('Y-m-d');
    $profileViewsToday = $memberActivityLogModel
        ->where('member_id', $userId)
        ->where('flag', 3)
        ->whereDate('created_at', $today)
        ->count();

    if ($profileViewsToday >= 10) {
        return response()->json([
            'success' => false,
            'message' => 'You have reached your daily limit of viewing profiles.',
        ]);
    }

    // Insert new log entry
    $data = [
        'member_id' => $userId,
        'profile_id' => $profileId,
        'flag' => 3,
        'message' => "{$member->name} requested {$request->input('name')} Viewprofile",
        'user_id' => $request->input('user_id'),
        'status' => 1,
    ];

    $inserted = $memberActivityLogModel->create($data);

    if ($inserted) {
        return response()->json([
            'success' => true,
            'message' => 'Log entry created successfully.',
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Failed to create log entry.',
        ]);
    }
}

 
    public function profileRequest(Request $request, MemberActivityLog $memberActivityLogModel)
    {
        $member = $this->getMemberVal();
        $userId = $member->id;
        $name = $request->input('names'); 
    
        $logName = $member->name;
        $message = "{$logName} requested {$name} photo";
    
        $data = [
            'member_id' => $userId,
            'profile_id' => $request->input('profile_ids'), 
            'flag' => 4,
            'message' => $message,
            'user_id' => $request->input('user_ids'),       
            'status' => 1
        ];
    
      
        $memberActivityLogModel->create($data);
    
        $logConditionsRequest = MemberActivityLog::where('member_id', $userId)
            ->where('flag', 4)
            ->where('status', 1)
            ->where('profile_id', $request->input('profile_ids')) 
            ->exists();
    
        return response()->json([
            'success' => true,
            'message' => 'Log entry created successfully.',
            'logConditionsRequest' => $logConditionsRequest
        ]);
    }
    
    


public function upprovepage(Request $request, MemberActivityLog $memberActivityLogModel)
{
    $profile_id = $request->input('id');
    $member_id = $request->input('mid');

    $user = [
        'status' => 2,  
        'upprove_date' => now(), 
        'upproved_by' => 1 
    ];

    $updated = MemberActivityLog::where('member_id', $member_id)
    ->where('profile_id', $profile_id)
    ->where('flag', 2)
    ->update($user);

// Check if the update was successful
if ($updated) {
    $logConditions = MemberActivityLog::where('flag', 2)
        ->pluck('profile_id', 'member_id')
        ->toArray();

    return response()->json([
        'success' => true,
        'message' => 'Approval Successful',
        'logConditions' => $logConditions,
    ]);
} else {
    return response()->json([
        'success' => false,
        'message' => 'No record updated. Please check the provided data.',
    ]);
}
   
}


public function request_sent()
{
    $member = $this->getMemberVal();

    if (!$member) {
        return redirect()->back()->with('error', 'Member not found.');
    }

    $memberId = $member->id;

    // Get all sent requests (flags 2 and 4)
    $memberLogs = MemberActivityLog::where('member_id', $memberId)
        ->whereIn('flag', [2, 4])
        ->orderBy('id', 'DESC')
        ->get();

    // Get all liked profiles
    // $allLikedProfiles = LikedProfile::where('member_id', $memberId)
    //     ->pluck('liked_profile')
    //     ->toArray();

    $likedProfiles = LikedProfile::where('member_id', $memberId)
    ->select('liked_profile', 'flag')
    ->get()
    ->keyBy('liked_profile');

    $allProfileIds = array_unique(array_merge(
    $memberLogs->pluck('profile_id')->toArray(),
    $likedProfiles->keys()->toArray()
));

    // Combine all profile IDs from activity logs and liked profiles
    $profileIdsFromLogs = $memberLogs->pluck('profile_id')->toArray();
    //    $allProfileIds = array_unique(array_merge($profileIdsFromLogs));
    // $allProfileIds = array_unique(array_merge($profileIdsFromLogs, $allLikedProfiles));

    // Get user details with pagination
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
    ->paginate(2);

    $paginatedProfileIds = $userDetails->pluck('id')->toArray();

    // Prepare data for each tab
    
    // 1. All Requests (combine all types)
    $allRequests = [];
    foreach ($userDetails as $user) {
        $requestTypes = [];

        $status = 'pending';
        
        // Check for liked profile
        // if (in_array($user->id, $allLikedProfiles)) {
        //     $requestTypes[] = 'interest';
        // }

          /* ================= INTEREST (LIKED PROFILE) ================= */
    if (isset($likedProfiles[$user->id])) {

        $requestTypes[] = 'interest';

        if ($likedProfiles[$user->id]->flag == 2) {
            $status = 'accepted';
        } elseif ($likedProfiles[$user->id]->flag == 3) {
            $status = 'rejected';
        }
    }
        
        // Check for mobile request
        $mobileReq = MemberActivityLog::where('member_id', $memberId)
            ->where('profile_id', $user->id)
            ->where('flag', 2)
            ->first();
            
        if ($mobileReq) {
            $requestTypes[] = 'mobile';
            $mobileStatus = $mobileReq->status;
        }
        
        // Check for photo request
        $photoReq = MemberActivityLog::where('member_id', $memberId)
            ->where('profile_id', $user->id)
            ->where('flag', 4)
            ->first();
            
        if ($photoReq) {
            $requestTypes[] = 'photo';
            $photoStatus = $photoReq->status;
        }
        
        // Determine overall status
        $status = 'pending';
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
            'mobile_request' => $mobileReq ?? null,
            'photo_request' => $photoReq ?? null,
              'interest_flag' => $likedProfiles[$user->id]->flag ?? null,
        ];
    }

    // 2. Accepted Requests
    $acceptedRequests = array_filter($allRequests, function($request) {
        return $request['status'] === 'accepted';
    });

    // 3. Rejected Requests
    $rejectedRequests = array_filter($allRequests, function($request) {
        return $request['status'] === 'rejected';
    });

    // Existing arrays for backward compatibility
    $approvePhoto = MemberActivityLog::where('member_id', $memberId)
        ->where('flag', 4)
        ->where('status', 2)
        ->whereIn('profile_id', $paginatedProfileIds)
        ->pluck('profile_id')
        ->toArray();

    $logConditionsRequest = MemberActivityLog::where('member_id', $memberId)
        ->where('flag', 4)
        ->where('status', 1)
        ->whereIn('profile_id', $paginatedProfileIds)
        ->pluck('profile_id')
        ->toArray();

    $viewProfile = MemberActivityLog::where('member_id', $memberId)
        ->where('flag', 3)
        ->where('status', 1)
        ->whereIn('profile_id', $paginatedProfileIds)
        ->pluck('profile_id')
        ->toArray();

    $mobileRequest = MemberActivityLog::where('member_id', $memberId)
        ->where('flag', 2)
        ->whereIn('profile_id', $paginatedProfileIds)
        ->pluck('profile_id')
        ->toArray();

    $photoIds = [];
    foreach ($userDetails as $userDetail) {
        if ($userDetail->photos->isNotEmpty()) {
            foreach ($userDetail->photos as $photo) {
                $photoIds[] = [
                    'photo_id' => $photo->photo_id,
                    'file_path' => $photo->uploadFile->file_path ?? asset('/images/user_image.png'),
                    'member_id' => $photo->member_id,
                ];
            }
        } else {
            $photoIds[] = [
                'photo_id' => null,
                'file_path' => asset('/images/user_image.png'),
                'member_id' => $userDetail->id,
            ];
        }
    }

    return view('userPages.page.request_sent', [
        'member' => $member,
        'userDetails' => $userDetails,
        'allRequests' => $allRequests,
        'acceptedRequests' => $acceptedRequests,
        'rejectedRequests' => $rejectedRequests,
        'memberLogs' => $memberLogs,
        'photoIds' => $photoIds,
        'likedProfiles' => $likedProfiles,
        'upprovePhoto' => $approvePhoto,
        'logConditionsRequest' => $logConditionsRequest,
        'viewProfile' => $viewProfile,
        'mobileRequest' => $mobileRequest,
    ]);
}



public function updateInterest(Request $request)
{
    // dd($request->all());

    LikedProfile::where('member_id', $request->liked_profile)
        ->where('liked_profile', auth()->user()->member_id ?? auth()->id())
        ->update([
            'flag' => $request->flag,
            'updated_at' => now()
        ]);

    return response()->json([
        'success' => true
    ]);

    
}

// public function request_sent()
// {
//     $member = $this->getMemberVal();

//     if (!$member) {
//         return redirect()->back()->with('error', 'Member not found.');
//     }

//     $memberId = $member->id;

//     // 1. Fetch logs for flag 4 OR flag 2
//     $memberLogs = MemberActivityLog::where('member_id', $memberId)
//         ->whereIn('flag', [2, 4])
//         ->orderBy('id', 'DESC')
//         ->get();

//     // 2. Collect profile ids
//     $profileIds = $memberLogs->pluck('profile_id')->toArray();

//     // 3. Fetch full details for these profile ids WITH PAGINATION
//     $userDetails = Member::with([
//         'star',
//         'raasi',
//         'educationDetails.education',
//         'familyDetails',
//         'horoscopeDetail',
//         'additionalDetails.height',
//         'partner_Information.heightTo',
//         'partner_Information.heightFrom',
//         'photos.uploadFile',
//     ])
//     ->whereIn('id', $profileIds)
//     ->paginate(2); // CHANGE: Paginate with 2 per page

//     // Get the paginated profile IDs
//     $paginatedProfileIds = $userDetails->pluck('id')->toArray();

//     // 4. APPROVED PHOTOS → flag 4, status 2 (only for paginated profiles)
//     $approvePhoto = MemberActivityLog::where('member_id', $memberId)
//         ->where('flag', 4)
//         ->where('status', 2)
//         ->whereIn('profile_id', $paginatedProfileIds) // Use paginated IDs
//         ->pluck('profile_id')
//         ->toArray();

//     // 5. PENDING REQUESTS → flag 4, status 1 (only for paginated profiles)
//     $logConditionsRequest = MemberActivityLog::where('member_id', $memberId)
//         ->where('flag', 4)
//         ->where('status', 1)
//         ->whereIn('profile_id', $paginatedProfileIds) // Use paginated IDs
//         ->pluck('profile_id')
//         ->toArray();

//     // 6. VIEW PROFILE → flag 3, status 1 (only for paginated profiles)
//     $viewProfile = MemberActivityLog::where('member_id', $memberId)
//         ->where('flag', 3)
//         ->where('status', 1)
//         ->whereIn('profile_id', $paginatedProfileIds) // Use paginated IDs
//         ->pluck('profile_id')
//         ->toArray();

//     // 7. Fetch liked profiles (only for paginated profiles)
//     $likedProfiles = LikedProfile::where('member_id', $memberId)
//         ->whereIn('liked_profile', $paginatedProfileIds) // Use paginated IDs
//         ->pluck('liked_profile')
//         ->toArray();

//     // 8. Prepare photos array for paginated results
//     $photoIds = [];

//     foreach ($userDetails as $userDetail) {
//         if ($userDetail->photos->isNotEmpty()) {
//             foreach ($userDetail->photos as $photo) {
//                 $photoIds[] = [
//                     'photo_id' => $photo->photo_id,
//                     'file_path' => $photo->uploadFile->file_path ?? asset('/images/user_image.png'),
//                     'member_id' => $photo->member_id,
//                 ];
//             }
//         } else {
//             $photoIds[] = [
//                 'photo_id' => null,
//                 'file_path' => asset('/images/user_image.png'),
//                 'member_id' => $userDetail->id,
//             ];
//         }
//     }

//     // 9. Mobile Request (only for paginated profiles)
//     $mobileRequest = MemberActivityLog::where('member_id', $memberId)
//         ->where('flag', 2)
//              ->whereIn('profile_id', $paginatedProfileIds) // Use paginated IDs
//         ->pluck('profile_id')
//         ->toArray();

//     return view('userPages.page.request_sent', [
//         'member' => $member,
//         'memberLogs' => $memberLogs,
//         'userDetails' => $userDetails, // Now a paginated collection
//         'photoIds' => $photoIds,
//         'likedProfiles' => $likedProfiles,

//         // NEW ARRAYS (only for paginated profiles)
//         'upprovePhoto' => $approvePhoto,
//         'logConditionsRequest' => $logConditionsRequest,
//         'viewProfile' => $viewProfile,
//         'mobileRequest' => $mobileRequest,
//     ]);
// }



public function photoRequest(){
    {
        $member = $this->getMemberVal();
    
        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }
    
        // Fetch logs with member details using a join
        $memberLogs = MemberActivityLog::where('member_activity_logs.profile_id', $member->id)
            ->where('flag', 4)
            ->join('members', 'member_activity_logs.member_id', '=', 'members.id')
            ->select('member_activity_logs.*', 'members.name as member_name', 'members.age as member_age')
            ->get();
    
        // Retrieve user details for the related member IDs
        $memberIds = $memberLogs->pluck('member_id')->toArray();
    
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
        ])->whereIn('id', $memberIds)->get();
    
        $photoIds = [];
        foreach ($userDetails as $userDetail) {
            if ($userDetail->photos->isNotEmpty()) {
                foreach ($userDetail->photos as $photo) {
                    $photoIds[] = [
                        'photo_id' => $photo->photo_id,
                        'file_path' => $photo->uploadFile->file_path ?? asset('/images/user_image.png'),
                        'member_id' => $photo->member_id,
                    ];
                }
            } else {
                $photoIds[] = [
                    'photo_id' => null,
                    'file_path' => asset('/images/user_image.png'),
                    'member_id' => $userDetail->id,
                   
                ];
            }
        }
    
        $memberId = $member->id; 
        $logConditions = collect($userDetails)->map(function ($log) use ($memberId) {

            
            return MemberActivityLog::where('member_activity_logs.profile_id', $memberId)
                ->where('flag', 4)
                ->where('status', 2)
                ->where('member_id', $log->id)
                ->where('profile_id', $memberId)
                ->exists();
        });
        $profileIds = $userDetails->pluck('id');
        $upprovePhoto = MemberActivityLog::where('member_id', $memberId)
->where('flag', 4)
->where('status', 2)
->whereIn('profile_id', $profileIds) 
->pluck('profile_id');

$logConditionsRequest = MemberActivityLog::where('member_id', $memberId)
->where('flag', 4)
->where('status', 1)
->whereIn('profile_id', $profileIds) 
->pluck('profile_id'); 

$viewProfile = MemberActivityLog::where('member_id', $memberId)
->where('flag', 3)
->where('status', 1)
->whereIn('profile_id', $profileIds) 
->pluck('profile_id');

        return view('userPages.page.photo_request', [
            'memberLogs' => $memberLogs,
            'userDetails' => $userDetails,
            'photoIds' => $photoIds,
            'memberLogs' => $memberLogs,
            'member'=> $member,
            'logConditions' => $logConditions,
            'upprovePhoto'=>$upprovePhoto->toArray(),
            'logConditionsRequest'=>$logConditionsRequest->toArray(),
            'viewProfile'=>$viewProfile->toArray(),
        ]);
 
}
}



public function upprovephoto(Request $request, MemberActivityLog $memberActivityLogModel)
{
    $profile_id = $request->input('id');
    $member_id = $request->input('mid');

    $user = [  
        'status' => 2,
        'upprove_date' => now(), 
        'upproved_by' => 1 
    ];


    $updated = MemberActivityLog::where('member_id', $member_id)
    ->where('profile_id', $profile_id)
    ->where('flag', 4)
    ->update($user);

  //  dd($updated);


// Check if the update was successful
if ($updated) {
    $logConditions = MemberActivityLog::where('flag', 4)
    ->where('status', 2)
        ->pluck('profile_id', 'member_id')
        ->toArray();

    return response()->json([
        'success' => true,
        'message' => 'Approval Successful',
        'logConditions' => $logConditions,
    ]);
} else {
    return response()->json([
        'success' => false,
        'message' => 'No record updated. Please check the provided data.',
    ]);
}
   
}

public function header()
{
    $member = $this->getMemberVal();
    $userId = $member->id; // Get logged-in user ID
    $notificationCount = MemberActivityLog::where('profile_id', $userId)
       ->whereIn('flag', [2, 4])
        ->where('status', 1)
        ->count(); // Get count instead of pluck

        $photo_id = Photo::where('member_id', $userId)
        ->where('is_active', 1)
        ->orderBy('id', 'ASC')
        ->value('photo_id');

         $upload_image = UploadFile::where('id', $photo_id)
         ->value('file_path');

    return view('layout2.user-form',
    [
        'notificationCount' => $notificationCount,
        'upload_image' => $upload_image,
        'memberName' => $member->name,
        
    ]);
}



public function occupationalPage(){
    $state = State::where('is_active' ,1)->pluck('name','id');
    $education = Education::where('is_active', 1)
    ->select('id', 'name', 'department')
    ->get()
    ->toArray();

    $member = $this->getMemberVal();

    if($member != null){

        $educationDetails = EducationDetail::where('member_id', $member->id)->get(); // Use get() to fetch multiple records

        $educationIds = [];
        if ($educationDetails->isNotEmpty()) {
            foreach ($educationDetails as $educationDetail) {
                $educationIds = array_merge($educationIds, explode(',', $educationDetail->education_id));
            }
        }
        
        $educationArray = Education::whereIn('id', $educationIds)
            ->where('is_active', 1)
            ->orderBy('name', 'asc')
            ->get()
            ->toArray();
        

        $educationDetail = EducationDetail::where('member_id', $member->id)->first();
        $cityarray = [];
        $taulkarray=[];
        if ($educationDetail && $educationDetail->state_id) {
            $cityarray = City::where(['state_id' => $educationDetail->state_id, 'is_active' => 1])
                ->where('is_active', 1)
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }
        if ($educationDetail && $educationDetail->state_id  && $educationDetail->city_id ) {
            $taulkarray = Taluka::where(['state_id' => $educationDetail->state_id, 'city_id' => $educationDetail->city_id, 'is_active' => 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }

        return view('userPages.page.occupational',
        [
            'member'=> $member ,              
             'education' =>$education,
              'state' =>$state,
              'educationDetail' =>  $educationDetail,
              'cityarray' => $cityarray,
              'taulkarray' => $taulkarray,
              'educationDetails'=>$educationDetails,
              'educationArray' => $educationArray,
              'educationIds' => $educationIds
        ]);

    }else{
        return redirect()->back()->with('error', 'member not fined.');
    }
}

public function occupational(){
    $state = State::where('is_active' ,1)->pluck('name','id');
    $education = Education::where('is_active', 1)
    ->select('id', 'name', 'department')
    ->get()
    ->toArray();
    $member = $this->getMemberVal();

    if($member != null){
        $educationDetail = EducationDetail::where('member_id', $member->id)->first();
        $cityarray = [];
        $taulkarray=[];
        if ($educationDetail && $educationDetail->state_id) {
            $cityarray = City::where(['state_id' => $educationDetail->state_id, 'is_active' => 1])
                ->where('is_active', 1)
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }
        if ($educationDetail && $educationDetail->state_id  && $educationDetail->city_id ) {
            $taulkarray = Taluka::where(['state_id' => $educationDetail->state_id, 'city_id' => $educationDetail->city_id, 'is_active' => 1])
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }

        return view('userPages.page.occupational',
        [
            'member'=> $member,
             'education' =>$education,
              'state' =>$state,
              'educationDetail' =>  $educationDetail,
              'cityarray' => $cityarray,
              'taulkarray' => $taulkarray
        ]);
    }else{
        return redirect()->back()->with('error', 'member not fined.');
    }
}


}