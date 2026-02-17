@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
 <main class="main">
     <div class="container">
         <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
             <div class="col-lg-4 reservation-img b1"></div>
             <div class="col-lg-8 px-4 pt-4  reservation-form-bg" style=' border: 1px solid rgba(116, 15, 23, 0.55);box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);background-color:#FFF5F5'  data-aos="fade-up" data-aos-delay="200">
             <div id="form_container">
                 {!! Form::open(['method' => 'post',
                    'autocomplete' => 'off', 'id' => 'personalInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <h3 class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">  
                    Personal Details</h3>
                         <div class="row gy-4">
                        
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-3 ms-4  text-start">
                                         <label>Family Status</label>
                                     </div>
                                     <div class="col-md-8">
                                         <label class="px-2"> <input type="radio" name="family_status"
                                                 value="Rich_Comfortable" {{ isset($familyDetail) && $familyDetail->family_status == 'Rich_Comfortable' ? 'checked' : '' }}>Rich &
                                             Comfortable</label>
                                         <label class="px-2"><input type="radio" name="family_status" value="High_Income" {{ isset($familyDetail) && $familyDetail->family_status == 'High_Income' ? 'checked' : '' }}>High
                                             Income</label>
                                         <label class="px-2"> <input type="radio" name="family_status"
                                                 value="Middle Income">Middle Income</label>
                                         <label class="px-2"><input type="radio" name="family_status" value="Low_Income" {{ isset($familyDetail) && $familyDetail->family_status == 'Low_Income' ? 'checked' : '' }}>Low
                                             Income</label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-3 ms-4  text-start">
                                         <label>Family Type</label>
                                     </div>
                                     <div class="col-md-5">
                                         <label class="px-2"> <input type="radio" name="family_type" value="Joint_Family"  {{ isset($familyDetail) && $familyDetail->family_type == 'Joint_Family' ? 'checked' : '' }}>Joint
                                             Family</label>
                                         <label class="px-2"><input type="radio" name="family_type"
                                                 value="Nuclear"  {{ isset($familyDetail) && $familyDetail->family_type == 'Nuclear' ? 'checked' : '' }}>Nuclear</label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-3 ms-4  text-start">
                                         <label>Family Values</label>
                                     </div>
                                     <div class="col-md-8">
                                         <label class="px-2"> <input type="radio" name="family_value"
                                                 value="Orthodox"  {{ isset($familyDetail) && $familyDetail->family_values == 'Orthodox' ? 'checked' : '' }}>Orthodox</label>
                                         <label class="px-2"><input type="radio" name="family_value"
                                                 value="Traditional"  {{ isset($familyDetail) && $familyDetail->family_values == 'Traditional' ? 'checked' : '' }}>Traditional</label>
                                         <label class="px-2"> <input type="radio" name="family_value"
                                                 value="Moderate"  {{ isset($familyDetail) && $familyDetail->family_values == 'Moderate' ? 'checked' : '' }}>Moderate</label>
                                         <label class="px-2"><input type="radio" name="family_value"
                                                 value="Liberal"  {{ isset($familyDetail) && $familyDetail->family_values == 'Liberal' ? 'checked' : '' }}>Liberal</label>
                                         <label class="px-2"><input type="radio" name="family_value"
                                                 value="Modern"  {{ isset($familyDetail) && $familyDetail->family_values == 'Modern' ? 'checked' : '' }}>Modern</label>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Father Name</label>
                             </div>
                             <div class="col-md-5">
                                 <input type="text" class="form-control" id="" name="father_name"
                                     placeholder="Father Name" value="{{ isset($familyDetail) && $familyDetail->father_name ? $familyDetail->father_name : '' }}">
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Father Status</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-5">
                                 <select class="form-control" name="paternity" id="paternity">
                                     <option value="">Select</option>
                                     <option value="Business" {{ isset($familyDetail) && $familyDetail->father_status == 'Business' ? 'selected' : '' }}>Business</option>
                                     <option value="Government" {{ isset($familyDetail) && $familyDetail->father_status == 'Government' ? 'selected' : '' }}>Government</option>
                                     <option value="Private" {{ isset($familyDetail) && $familyDetail->father_status == 'Private' ? 'selected' : '' }}>Private</option>
                                     <option value="SelfEmployed" {{ isset($familyDetail) && $familyDetail->father_status == 'SelfEmployed' ? 'selected' : '' }}>Self Employed</option>
                                     <option value="Others" {{ isset($familyDetail) && $familyDetail->father_status == 'Business' ? 'Others' : '' }}>Others</option>
                                 </select>

                                 <span id="paternity_error" class="error">Please select a Paternity!</span>
                                 @error('paternity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Mother Name</label>
                             </div>
                             <div class="col-md-5">
                                 <input type="text" class="form-control" id="" name="mother_name"
                                     placeholder="Mother Name" value="{{ isset($familyDetail) && $familyDetail->mother_name ? $familyDetail->mother_name : '' }}">
                             </div>
                         </div>

                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Mother Status</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-5">
                                 <select class="form-control" name="mother_status" id="mother_status">
                                     <option value="">Select</option>
                                     <option value="Business" {{ isset($familyDetail) && $familyDetail->mother_status == 'Business' ? 'selected' : '' }}>Business</option>
                                     <option value="Government" {{ isset($familyDetail) && $familyDetail->mother_status == 'Government' ? 'selected' : '' }}>Government</option>
                                     <option value="Private" {{ isset($familyDetail) && $familyDetail->mother_status == 'Private' ? 'selected' : '' }}>Private</option>
                                     <option value="Self Employed" {{ isset($familyDetail) && $familyDetail->mother_status == 'Self Employed' ? 'selected' : '' }}>Self Employed</option>
                                     <option value="Others" {{ isset($familyDetail) && $familyDetail->mother_status == 'Others' ? 'selected' : '' }}>Others</option>
                                 </select>
                                 <span id="motherstatus_error" class="error">Please select a Mother_status!</span>
                                 @error('mother_status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>No. of Brothers</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-5">
                                 <input type="text" class="form-control" id="no_brothers" name="no_brothers"
                                     placeholder="Enter the Number" value="{{ isset($familyDetail) && $familyDetail->number_of_brothers ? $familyDetail->number_of_brothers : '' }}">
                                     
                                     <span id="nobrothers_error" class="error">Please Enter no_of_brothers!</span>
                                     @error('no_brothers')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>No. of Sisters</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-5">
                                 <input type="text" class="form-control" id="no_sisters" name="no_sisters"
                                     placeholder="Enter the Number" value="{{ isset($familyDetail) && $familyDetail->number_of_sisters ? $familyDetail->number_of_sisters : '' }}">
                                     <span class="error" id="nosisters_error">Please Enter no_of_sisters!</span>
                                     @error('no_sisters')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>

                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Brothers Married</label>
                             </div>
                             <div class="col-md-5">
                                 <input type="text" class="form-control" id="brothers_married" name="brothers_married"
                                     placeholder="" value="{{ isset($familyDetail) && $familyDetail->brothers_married ? $familyDetail->brothers_married : '' }}">
                                     <span id="brothers_married_error" class="error">Brothers married cannot be more than total brothers.!</span>
                                    </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Sisters Married</label>
                             </div>
                             <div class="col-md-5">
                                 <input type="text" class="form-control" id="sisters_married" name="sisters_married"
                                     placeholder="" value="{{ isset($familyDetail) && $familyDetail->sisters_married ? $familyDetail->sisters_married : '' }}">
                                     <span id="sisters_married_error" class="error">Sisters married cannot be more than total sisters.!</span>
                                    </div>
                         </div>

                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Parent's Contact No</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-5">
                                 <input type="text" class="form-control" id="parent_contact" name="parent_contact"
                                     placeholder="Enter the Number" value="{{ isset($familyDetail) && $familyDetail->parent_contact_number ? $familyDetail->parent_contact_number : '' }}">
                                     <span class="error" id="contact_error">Please Enter valid mobile_number!</span>
                                     @error('parent_contact')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Ancestral Origin</label>
                             </div>
                             <div class="col-md-5">
                                 <input type="text" class="form-control" id="" name="ancestral_origin"
                                     placeholder="Enter Ancestral Origin" value="{{ isset($familyDetail) && $familyDetail->ancestral_origin ? $familyDetail->ancestral_origin : '' }}">
                             </div>
                         </div>
                         
                         
                         <div class="row gy-4 p-3 mb-4 justify-content-center">
    <!-- Previous Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="previousBtn">Previous</button>
        </div>
    </div>

    <!-- Next Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="nextBtn">Next</button>
        </div>
    </div>

    <!-- Skip Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="skipBtn">Skip</button>
        </div>
    </div>
</div>


                         {!! Form::close() !!}
                 </div>
             </div>
         </div>
     </div>
     <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
             class="bi bi-arrow-up-short"></i></a>
 </main>

 <script>
 $('#nextBtn').on('click', function (e) {

e.preventDefault();

if (personalvalidate()) {
    $('#personalInfoAddForm').attr('action', "{{ route('app.personal_add.member') }}").submit();
}
});

    $('#previousBtn').on('click', function() {
        $('#personalInfoAddForm').attr('action', "{{ route('app.personal_info_previous.member') }}").submit();
    });

    $('#skipBtn').on('click', function() {
        $('#personalInfoAddForm').attr('action', "{{ route('app.personal_info_skip.member') }}").submit();
    });
</script>

 @endsection