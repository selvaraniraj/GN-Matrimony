@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
 <main class="main">
     <div class="container">
         <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
             <div class="col-lg-4 reservation-img b1">
             </div>
             <div class="col-lg-8 px-4 pt-4  reservation-form-bg" style=' border: 1px solid rgba(116, 15, 23, 0.55);box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);background-color:#FFF5F5'  data-aos="fade-up" data-aos-delay="200">
           
                 <div id="form_container">
                 {!! Form::open(['method' => 'post',
                    'autocomplete' => 'off', 'id' => 'profileInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <h3 class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">                  Profile</h3>

                         <div class="row gy-4">
                         
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-3 ms-4  text-start">
                                         <label>Body Composition</label>
                                     </div>
                                     <div class="col-md-5">
                                         <label class="px-2"> <input type="radio" name="body_composition"
                                                 value="Slim" {{ isset($memberAddionalDetail) && $memberAddionalDetail->body_type == 'Slim' ? 'checked' : '' }} >Slim</label>
                                         <label class="px-2"><input type="radio" name="body_composition"
                                                 value="Average" {{ isset($memberAddionalDetail) && $memberAddionalDetail->body_type == 'Average' ? 'checked' : '' }}>Average</label>
                                         <label class="px-2"><input type="radio" name="body_composition"
                                                 value="Heavy" {{ isset($memberAddionalDetail) && $memberAddionalDetail->body_type == 'Heavy' ? 'checked' : '' }} >Heavy</label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-3 ms-4  text-start">
                                         <label>Height</label><span class="spl"> *</span>
                                     </div>
                                     <div class="col-md-5">
                                         <select class="form-control" name="height" id="height">
                                             @foreach ($height as $id => $name)
                                           <option value="{{ $id }}" {{ isset($memberAddionalDetail) && $memberAddionalDetail->height_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                         </select>
                                         <span id="height_error" class="error">Please select a Height!</span>
                                         @error('height')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-3 ms-4  text-start">
                                         <label>Weight</label><span class="spl"> *</span>
                                     </div>
                                     <div class="col-md-5">
                                         <select class="form-control" name="weight" id="weight">
                                            @foreach($weight as $id => $name)
                                               <option value="{{ $id }}" {{ isset($memberAddionalDetail) && $memberAddionalDetail->weight_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                         </select>
                                         <span id="weight_error" class="error">Please Select a weight!</span>
                                         @error('weight')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Deficiency</label>
                             </div>
                             <div class="col-md-5">
                                 <label class="px-2"> <input type="radio" name="deficiency" value="1" {{isset($memberAddionalDetail) && $memberAddionalDetail->disablitiy == '1' ? 'checked' : '' }}>Normal</label>
                                 <label class="px-2"><input type="radio" name="deficiency"
                                         value="2" {{isset($memberAddionalDetail) && $memberAddionalDetail->disablitiy == '2' ? 'checked' : '' }}>Challenged</label>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Eating Habits</label>
                             </div>
                             <div class="col-md-5">
                                 <label class="px-2"> <input type="radio" name="eating_habits"
                                         value="1" {{isset($memberAddionalDetail) && $memberAddionalDetail->eating_habit == '1' ? 'checked' : '' }}>Vegetarian</label>
                                 <label class="px-2"><input type="radio" name="eating_habits"
                                         value="2" {{isset($memberAddionalDetail) && $memberAddionalDetail->eating_habit == '2' ? 'checked' : '' }}>Non-Vegetarian</label>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Alcholism</label>
                             </div>
                             <div class="col-md-5">
                                 <label class="px-2"> <input type="radio" name="alcholism" value="1" {{isset($memberAddionalDetail) &&  $memberAddionalDetail->drinking_habit == '1' ? 'checked' : '' }}>No</label>
                                 <label class="px-2"><input type="radio" name="alcholism" value="2" {{isset($memberAddionalDetail) &&  $memberAddionalDetail->drinking_habit == '2' ? 'checked' : '' }}>Occasionally</label>
                                        
                                 <label class="px-2"><input type="radio" name="alcholism" value="3" {{ isset($memberAddionalDetail) &&$memberAddionalDetail->drinking_habit == '3' ? 'checked' : '' }}>Yes</label>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>Smoking Habits</label>
                             </div>
                             <div class="col-md-5">
                                 <label class="px-2"> <input type="radio" name="smoking_habits" value="1" {{isset($memberAddionalDetail) && $memberAddionalDetail->smoking_habit == '1' ? 'checked' : '' }}>No</label>
                                 <label class="px-2"><input type="radio" name="smoking_habits" value="2" {{ isset($memberAddionalDetail) && $memberAddionalDetail->smoking_habit == '2' ? 'checked' : '' }}>Occasionally</label>
                                         
                                 <label class="px-2"><input type="radio" name="smoking_habits" value="3" {{isset($memberAddionalDetail) && $memberAddionalDetail->smoking_habit == '3' ? 'checked' : '' }}>Yes</label>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-3 ms-4  text-start">
                                 <label>About You</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-5">
                                 <textarea class="form-control" name="about_you"  rows="5"
                                     placeholder="Message">{{ isset($memberAddionalDetail) ? $memberAddionalDetail->about_you : old('about_you') }}</textarea>
                                     <span id="aboutyou_error" class="error">Please provide a description about Yourself!</span>
                                     @error('about_you')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

        if (profile_validate()) {
            $('#profileInfoAddForm').attr('action', "{{ route('app.profile_add.member') }}").submit();
         //   $('#profileInfoAddForm').attr('action', "{{ route('app.profile_add.member') }}").submit();
    }
        });

    $('#previousBtn').on('click', function() {
        $('#profileInfoAddForm').attr('action', "{{ route('app.profile_info_previous.member') }}").submit();
    });

    $('#skipBtn').on('click', function() {
        $('#profileInfoAddForm').attr('action', "{{ route('app.profile_info_skip.member') }}").submit();
    });
</script>

 @endsection