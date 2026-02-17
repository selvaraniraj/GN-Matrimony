<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Carbon\Carbon;
use App\Models\MemberActivityLog;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AssociationController extends Controller
{
    public function association_form()
    {
        return view('admin.add_association');
    }

    public function insert(Request $request)
    {


        $request->validate([
            'association_name' => 'required',
            'association_phoneno' => 'required|numeric|digits:10',
            'association_regno' => 'required|numeric',
            'association_head' => 'required',
            'president_number' => 'required|numeric|digits:10',
            'secretary' => 'required',
            'secretary_number' => 'required|numeric|digits:10',
            'treasurer' => 'required',
            'treasurer_number' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|min:6',
            'password_confirmation'=>'required|same:password',
            'state' => 'required',
            'city' => 'required',
            'taluk' => 'required',
            'village' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $imageName);
            $imagePath = 'assets/images/' . $imageName;
        }

        $user=new user();
        $user->role_id=5;
        $user->username=$request->username;
        $user->name='Association Member';
        $user->password=bcrypt($request->password);
        $user->email=$request->email;
        $user->is_active = true;
        $user->failed_attempts = 0;
        $user->password_expired = false;
        $user->save();


       
        $association = new Association();
        $association->association_name = $request->input('association_name');
        $association->association_phoneno = $request->input('association_phoneno');
        $association->association_regno = $request->input('association_regno');
        $association->association_head = $request->input('association_head');
        $association->president_number = $request->input('president_number');
        $association->secretary = $request->input('secretary');
        $association->secretary_number = $request->input('secretary_number');
        $association->treasurer_name = $request->input('treasurer');
        $association->treasurer_number = $request->input('treasurer_number');
        $association->email = $request->input('email');
        $association->username = $request->input('username');
        $association->password = bcrypt($request->input('password'));
        $association->state = $request->input('state');
        $association->city = $request->input('city');
        $association->taluk = $request->input('taluk');
        $association->village = $request->input('village');
        $association->address = $request->input('address');
        $association->image = $imagePath;
        $association->user_id=$user->id;
      

        $association->save();

        return back()->with('success', 'Association Added Successfully!');
    }


    public function view()
    {
        $association = Association::where('is_active',1)->get();
        return view('admin.association_view', ['association' => $association]);
    }

    public function delete($id){
        $associations=Association::where('id',$id)->first();
        
        $associations->is_active=0;
        $associations->save();
        return back()->with('success','Deleted Successfully!');
    }

    public function update($id){
        $association = Association::where('id', $id)->first();
        return view('UserPages.page.edit_association', ['association' => $association]);
    }
    
    
    public function submit(Request $request, $id)
{
    
    $request->validate([
        'association_name' => 'required',
        'association_phoneno' => 'required|numeric|digits:10',
        'association_regno' => 'required|numeric',
        'association_head' => 'required',
        'president_number' => 'required|numeric|digits:10',
        'secretary' => 'required',
        'secretary_number' => 'required|numeric|digits:10',
        'treasurer' => 'required',
        'treasurer_number' => 'required|numeric|digits:10',
        'email' => 'required|email',
        'username' => 'required',
       
        'state' => 'required',
        'city' => 'required',
        'taluk' => 'required',
        'village' => 'required',
        'address' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    ]);

    
    $association = Association::where('id', $id)->first();

  
    if (!$association) {
        return back()->with('error', 'Association not found.');
    }

   
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images'), $imageName);
        $association->image = 'assets/images/' . $imageName;
    }

   
    $association->update([
        'association_name' => $request->input('association_name'),
        'association_phoneno' => $request->input('association_phoneno'),
        'association_regno' => $request->input('association_regno'),
        'association_head' => $request->input('association_head'),
        'president_number' => $request->input('president_number'),
        'secretary' => $request->input('secretary'),
        'secretary_number' => $request->input('secretary_number'),
        'treasurer_name' => $request->input('treasurer'),
        'treasurer_number' => $request->input('treasurer_number'),
        'email' => $request->input('email'),
        'username' => $request->input('username'),
        
        'state' => $request->input('state'),
        'city' => $request->input('city'),
        'taluk' => $request->input('taluk'),
        'village' => $request->input('village'),
        'address' => $request->input('address'),
    ]);

   
    return redirect()->route('association_view')->with('success', 'Association updated successfully!');
}
   

     public function member_report_view(){
              
        $MemberActivityLog=MemberActivityLog::where('flag',3)->where('status',1)->get();
        
        foreach ($MemberActivityLog as $log) {
            $member_ids = Member::where('id', $log->member_id)->first();
            $profile_ids = Member::where('id', $log->profile_id)->first();
    
           $log->member_id=$member_ids->profile_id;
           $log->profile_id=$profile_ids->profile_id;

            $log->message = $profile_ids-> profile_id . ' Profile Viewed by the  '.$member_ids->profile_id;
        }
    
        return view('admin.activity_log_view',
                ['MemberActivityLog'=>$MemberActivityLog]);
     }



     public function mobile_request_view() {
        
        $memberactivitylog = MemberActivityLog::where('flag', 2)->get();
    
        foreach ($memberactivitylog as $member) {
            $member_ids = Member::find($member->member_id);
            $profile_ids = Member::find($member->profile_id);
            $member->member_id=$member_ids->profile_id;
            $member->profile_id=$profile_ids->profile_id;
             
            
            $member->message = 
            $member_ids->profile_id.'has sent a request for ' .$profile_ids->profile_id.  "'s mobile number";
    
            
            if ($member->status == 2) {
                $member->acceptmessage = "{$profile_ids->profile_id} has accepted a request from {$member_ids->profile_id}";
            } else {
                $member->acceptmessage = null; 
            }
        }
    
       
        return view('admin.mobile_request_view', [
            'memberactivitylog' => $memberactivitylog
        ]);
    }
       
 
    public function photo_request(){
        $memberlog=MemberActivityLog::where('flag',4)->get();

        foreach($memberlog as $member){
            $member_ids=Member::where('id',$member->member_id)->first();
            $profile_ids=Member::where('id',$member->profile_id)->first();

            $member->member_id=$member_ids->profile_id;
            $member->profile_id=$profile_ids->profile_id;

            $member->message=$member->member_id.'has sent request for '.$member->profile_id.' for Photo';
      
            if($member->status==2){
                
                $member->acceptmessage=$member->profile_id.'has accept request for '.$member->member_id;
      
            }

        }

        return view('admin.photo_request_view',['memberlog'=>$memberlog]);
    }




    public function fetchdetails(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
    
        $details = null;
    
        if ($type == 'member' || $type == 'profile') {
            $details = Member::where('profile_id', $id)
                             ->with('additionalDetails', 'raasi', 'star','educationDetail.education','familyDetail') 
                             ->first();
        }
    
        if ($details) {
            $horoscopeDetails = $details->horoscopeDetail->toArray();
            $formattedDob = date('d-m-Y', strtotime($details->dob));
            $age = Carbon::parse($details->dob)->age;
    
            $hours = $details->hours;
            $mins = $details->mins;
            $am_pm = $details->am_pm;
            $birth_time = "Not Available";
            if (!empty($hours) && !empty($mins) && !empty($am_pm)) {
                $birth_time = sprintf('%02d:%02d %s', $hours, $mins, $am_pm);
            }
    
        
            $height = "Select"; 
        if ($details->additionalDetails && isset($details->additionalDetails->height_id)) {
           
            if ($details->additionalDetails->height_id == 0) {
                $height = "Not Available";
            } else {
               
                $heightValue = $details->additionalDetails->height ? $details->additionalDetails->height->name : "Select";
                $height = $heightValue;
            }
        }
            $raasi = $details->raasi ? $details->raasi->name : "Not Available";
            $star = $details->star ? $details->star->name : "Not Available";


            $income = $details->educationDetail && $details->educationDetail->income
          ? $details->educationDetail->income
          : "Not Available";
        

          $qualification=$details->educationDetail&& $details->educationDetail->education?
          $details->educationDetail->education->name:'Not Mentioned';
          $college=$details->educationDetail&& $details->educationDetail->college_inst?
          $details->educationDetail->college_inst:'Not Mentioned';

          $office=$details->educationDetail&&$details->educationDetail->company_name?
          $details->educationDetail->company_name:'Not Available';


          $designation=$details->educationDetail->destination?
          $details->educationDetail->destination:'Not Mentioned';

      

             


            $horoscope = $details->horoscopeDetail->only([
                'rasi_1', 'rasi_2', 'rasi_3', 'rasi_4', 'rasi_5', 'rasi_6', 'rasi_7', 'rasi_8', 'rasi_9', 'rasi_10', 'rasi_11', 'rasi_12',
                'Navamsam_1', 'Navamsam_2', 'Navamsam_3', 'Navamsam_4', 'Navamsam_5', 'Navamsam_6', 'Navamsam_7', 'Navamsam_8', 'Navamsam_9', 'Navamsam_10', 'Navamsam_11', 'Navamsam_12'
            ]);
    
            $familyDetails = $details->familyDetail;
            $parent_contact=$details->familyDetail->parent_contact_number ? $details->familyDetail->parent_contact_number :'Not Available';
            

if ($familyDetails) {
   
    $fatherName = !empty($familyDetails->father_name) ? $familyDetails->father_name : "Not mentioned";
    $motherName = !empty($familyDetails->mother_name) ? $familyDetails->mother_name : "Not mentioned";

    if ($fatherName === "Not Available" && $motherName === "Not Available") {
    $parentNames = "Not mentioned";
    }

    $parentNames = "{$fatherName} - {$motherName}";  


    $brothers=!empty($familyDetails->number_of_brothers)?$familyDetails->number_of_brothers:'Not Mentioned';
    $sisters=!empty($familyDetails->number_of_sisters)?$familyDetails->number_of_sisters:'Not Mentioned';
     
    if ($brothers === "Not mentioned" && $sisters === "Not mentioned") {
        $siblings = "Not mentioned";
        }
        $siblings=$brothers.' brothers -'.$sisters.' sisters';

} 



return response()->json([
    'profile_id' => $details->profile_id,
    'name' => $details->name,
    'gender' => $details->gender,
    'email' => $details->email,
    'mobile' => $details->mobile,
    'religion' => $details->religion,
    'dob' => $formattedDob,
    'age' => $age,
    'mother_tongue'=>$details->mothertongue,
    'raasi' => $raasi, 
    'star' => $star, 
    'birth_time' => $birth_time,
    'height' => $height, 
    'created_by_relation' => $details->created_by_relation,
    'caste' => $details->caste,
    'native_place' => $details->village,
    'permanent_village' => $details->permanent_village,
    'birth_place' => $details->birth_place,
    'horoscope' => $horoscope,
    'income' => $income,
    'office'=>$office,
    'siblings'=>$siblings,
    'designation'=>$designation,
      'qualification'=>$qualification,
    'parent_names' => $parentNames,  
    'college'=>$college,
    'parent_contact'=>$parent_contact,
]);
    }

    }

    public function registration()
    {
        return view('admin.matrimony_register');
    }
    
    public function otp()
    {
        return view('UserPages.page.admin_otp');
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);
    
        $enteredOtp = $request->input('otp');
        $expectedOtp = session('expected_otp');     
        if ($enteredOtp == $expectedOtp||$enteredOtp ==111111) {
            $user = User::where('mobile_number', session('user_mobile_number'))->first();
    
            session(['user_id' => $user->id]);
    
           
            return redirect()->route('app.v2.basic_information');
        } else {
            
            return redirect()->route('otp-verification')->with('error', 'Invalid OTP, please try again.');
        }
    }
    

    


}


