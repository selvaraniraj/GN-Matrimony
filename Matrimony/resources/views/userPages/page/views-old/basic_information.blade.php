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
            <div class="col-lg-8 px-4 reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
                <div id="form_container">
                    {!! Form::open([ 'method'=> 'post', 'class' => '', 'autocomplete' => 'off', 'id' => 'basicInfoAddForm']) !!}
                    {{ csrf_field() }}

                    {!! Form::hidden('member_id', $member->id) !!}

                    <div class="row gy-4 ">
                        <h3>Basic Information</h3>
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 ms-4 text-start">
                                    <label>Name</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Your Name" value="{{ old('name', $member->name) }}">
                                        <span class="error" id="name_error">Name is required!</span>
                                        </br>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 ms-4 text-start">
                                    <label>Association</label>
                                </div>
                                <div class="col-md-5">
                                    {!! Form::select('association_id', $association, old('association_id', $member->association_id), ['class' => 'form-control custom_form_select_2 js_select']) !!}
                                    @error('association_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 ms-4 text-start">
                                    <label>Profile Created by</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-5">
                                    <select class="form-control" id="profilecreatedby" name="created_by_relation">
                                        @if($member->created_by_relation != null)
                                        <option value="{{ $member->created_by_relation }}">{{ $member->created_by_relation }}</option>
                                        @else
                                        <option value="">Select</option>
                                        @endif
                                        <option value="Son" {{ old('created_by_relation', $member->created_by_relation) == 'Son' ? 'selected' : '' }}>Son</option>
                                        <option value="Daughter" {{ old('created_by_relation', $member->created_by_relation) == 'Daughter' ? 'selected' : '' }}>Daughter</option>
                                        <option value="Grandson" {{ old('created_by_relation', $member->created_by_relation) == 'Grandson' ? 'selected' : '' }}>Grandson</option>
                                        <option value="Granddaughter" {{ old('created_by_relation', $member->created_by_relation) == 'Granddaughter' ? 'selected' : '' }}>Granddaughter</option>
                                        <option value="Brother" {{ old('created_by_relation', $member->created_by_relation) == 'Brother' ? 'selected' : '' }}>Brother</option>
                                        <option value="Sister" {{ old('created_by_relation', $member->created_by_relation) == 'Sister' ? 'selected' : '' }}>Sister</option>
                                        <option value="Myself" {{ old('created_by_relation', $member->created_by_relation) == 'Myself' ? 'selected' : '' }}>Myself</option>
                                    </select>

                                    <span class="error" id="created_by_relation_error">Please select a
                                            relation!</span>
                                        </br>
                                    @error('created_by_relation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-md-3 ms-4 text-start">
                            <label>Gender</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-6">
                            <label> <input type="radio" name="gender" value="male" {{ old('gender', $member->gender) == 'male' ? 'checked' : '' }}> Male </label>
                            <label><input type="radio" name="gender" value="female" {{ old('gender', $member->gender) == 'female' ? 'checked' : '' }}> Female</label>
                            <br><span class="error" id="gender_error">Please select gender!</span>
                                </br>
                            @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-md-3 ms-4 text-start">
                        <label class="color">Date Of Birth</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-5">
                        <input type="date" name="dob" class="form-control" id="dob"
                        value="{{ old('dob', $member->dob) }}">

                        <span class="error" id="dob_error">Select Your Valid Date_of_Birth!</span> <br>
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-md-3 ms-4 text-start">
                            <label for="date" class="form-label">Mobile Number</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="{{ old('mobile', $member->mobile) }}"  maxlength="10"
                            onkeypress="return isNumberKey(event);">
                          
                            <span class="error" id="mobile_error">Enter your valid mobile number!</span>
                                </br>
                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 ms-4 text-start">
                                    <label for="date" class="form-label">Email</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-5">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="{{ old('email', $member->email) }}">
                                   
                                    <span class="error" id="email_error">Enter your valid Email_address!</span>
                                    </br>

                                    @error('email')
                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-md-3 ms-4 text-start">
                            <div class="button-container">
                               <!--<button type="" onclick="return basic_validation()" class="btn" id="nextBtn">Next</button>-->
                               <button type="" id="nextBtn"  class="btn">Next</button>
                            </div>
                        </div>
                        <div class="col-md-3 ms-4 text-start">
                            <div class="button-container">
                                <button class="btn" id="skipBtn"> Skip</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</main>
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<script>

$('#nextBtn').on('click', function (e) {
        e.preventDefault();

        if (basicvalidate()) {
            $('#basicInfoAddForm').attr('action', "{{ route('app.basic_info_add.member') }}").submit();
        }
    });

    $('#skipBtn').on('click', function() {
        $('#basicInfoAddForm').attr('action', "{{ route('app.basic_info_skip.member') }}").submit();
    });

    let currentyear = new Date().getFullYear();
         let maxYear = currentyear - 18;

         let dob = new Date();
         dob.setFullYear(maxYear); // Set the year to 18 years ago

         let formattedDate = dob.toISOString().split('T')[0]; // Get date in YYYY-MM-DD format

         document.getElementById("dob").max = formattedDate;

</script>

@endsection
