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
                {!! Form::open([ 'method' => 'post',
               'autocomplete' => 'off', 'id' => 'relativeInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <h3 class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">  
    Reference Details
</h3>
                        <div class="row gy-4">
                        
<div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <h4>Reference 1</h4>
                                    <div class="col-md-2  text-start">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="first_name" name="first_relative_name"
                                            placeholder="Enter Your Name" value="{{ isset($relative) && $relative->first_relative_name ? $relative->first_relative_name : '' }}">
                                            <span id="first_rel_name_err" class="error">Please Enter Relative name!</span>
                                            @error('first_relative_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Type of Relation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="first_relative_relation" id="first_relation_type">
                                            <option value="">Select </option>
                                            <option value="Father" {{ isset($relative) && $relative->first_relative_relation == 'Father' ? 'selected' : '' }}>Father</option>
                                            <option value="Mother" {{ isset($relative) && $relative->first_relative_relation == 'Mother' ? 'selected' : '' }}>Mother</option>
                                            <option value="Grandfather" {{ isset($relative) && $relative->first_relative_relation == 'Grandfather' ? 'selected' : '' }}>Grandfather</option>
                                            <option value="Grandmother" {{ isset($relative) && $relative->first_relative_relation == 'Grandmother' ? 'selected' : '' }}>Grandmother</option>
                                            <option value="Uncle" {{ isset($relative) && $relative->first_relative_relation == 'Uncle' ? 'selected' : '' }}>Uncle</option>
                                            <option value="Aunt" {{ isset($relative) && $relative->first_relative_relation == 'Aunt' ? 'selected' : '' }}>Aunt</option>
                                            <option value="Distance_Relation" {{ isset($relative) && $relative->first_relative_relation == 'Distance_Relation' ? 'selected' : '' }}>Distance Relation</option>
                                            <option value="Others" {{ isset($relative) && $relative->first_relative_relation == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                        <span class="error" id="first_rel_type_err">Please Select Relation Type!</span>
                                        @error('first_relative_relation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-2 text-start">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="first_relative_business" name="first_relative_bussiness"
                                            placeholder="Enter Your Profession" value="{{ isset($relative) && $relative->first_relative_bussiness ? $relative->first_relative_bussiness : '' }}">
                                            <span class="error" id="first_rel_business_err">Please Enter Your Relative's
                                            Profession!</span>
                                            @error('first_relative_bussiness')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Contact No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="first_relative_contact" name="first_relative_number"
                                            placeholder="Enter Contact Number" value="{{ isset($relative) && $relative->first_relative_number ? $relative->first_relative_number : '' }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" maxlength="10">
                                            <span class="error" id="first_rel_contact_err">Please Enter Valid Contact
                                            number!</span>
                                            @error('first_relative_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <h4>Reference 2</h4>
                                    <div class="col-md-2  text-start">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="second_name" name="second_name"
                                            placeholder="Enter Your Name" value="{{ isset($relative) && $relative->second_relative_name ? $relative->second_relative_name : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Type of Relation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="second_relation_type" id="second_relation_type">
                                            <option value="">Select </option>
                                            <option value="Father" {{ isset($relative) && $relative->second_relative_relation	 == 'Father' ? 'selected' : '' }}>Father</option>
                                            <option value="Mother" {{ isset($relative) && $relative->second_relative_relation	 == 'Mother' ? 'selected' : '' }}>Mother</option>
                                            <option value="Grandfather" {{ isset($relative) && $relative->second_relative_relation	 == 'Grandfather' ? 'selected' : '' }}>Grandfather</option>
                                            <option value="Grandmother" {{ isset($relative) && $relative->second_relative_relation	 == 'Grandmother' ? 'selected' : '' }}>Grandmother</option>
                                            <option value="Uncle" {{ isset($relative) && $relative->second_relative_relation	 == 'Uncle' ? 'selected' : '' }}>Uncle</option>
                                            <option value="Aunt" {{ isset($relative) && $relative->second_relative_relation	 == 'Aunt' ? 'selected' : '' }}>Aunt</option>
                                            <option value="Distance_Relation" {{ isset($relative) && $relative->second_relative_relation	 == 'Distance_Relation' ? 'selected' : '' }}>Distance Relation</option>
                                            <option value="Others" {{ isset($relative) && $relative->second_relative_relation	 == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-2  text-start">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="second_profession" name="second_profession"
                                            placeholder="Enter Your Profession" value="{{ isset($relative) && $relative->second_relative_bussiness ? $relative->second_relative_bussiness : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Contact No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="second_contact" name="second_contact"
                                            placeholder="Enter Contact Number" value="{{ isset($relative) && $relative->second_relative_number ? $relative->second_relative_number : '' }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" maxlength="10">
                                            @error('second_contact')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <h4>Reference 3</h4>
                                    <div class="col-md-2 text-start">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="third_name" name="third_name"
                                            placeholder="Enter Your Name" value="{{ isset($relative) && $relative->third_relative_name ? $relative->third_relative_name : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Type of Relation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="third_relation_type" id="third_relation_type">
                                            <option value="">Select </option>
                                            <option value="Father" {{ isset($relative) &&  $relative->third_relative_relation == 'Father' ? 'selected' : '' }}>Father</option>
                                            <option value="Mother" {{ isset($relative) && $relative->third_relative_relation == 'Mother' ? 'selected' : '' }}>Mother</option>
                                            <option value="Grandfather" {{ isset($relative) &&  $relative->third_relative_relation == 'Grandfather' ? 'selected' : '' }}>Grandfather</option>
                                            <option value="Grandmother" {{ isset($relative) && $relative->third_relative_relation == 'Grandmother' ? 'selected' : '' }}>Grandmother</option>
                                            <option value="Uncle" {{ isset($relative) &&  $relative->third_relative_relation == 'Uncle' ? 'selected' : '' }}>Uncle</option>
                                            <option value="Aunt" {{ isset($relative) && $relative->third_relative_relation == 'Aunt' ? 'selected' : '' }}>Aunt</option>
                                            <option value="Distance_Relation" {{ isset($relative) && $relative->third_relative_relation == 'Distance_Relation' ? 'selected' : '' }}>Distance Relation</option>
                                            <option value="Others" {{ isset($relative) && $relative->third_relative_relation == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-2  text-start">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="third_profession" name="third_profession"
                                            placeholder="Enter Your Profession" value="{{ isset($relative) && $relative->third_relative_bussiness ? $relative->third_relative_bussiness : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Contact No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="third_contact" name="third_contact"
                                            placeholder="Enter Contact Number" value="{{ isset($relative) && $relative->third_relative_number ? $relative->third_relative_number : '' }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" maxlength="10">
                                            @error('third_contact')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
      

                        <div class="row gy-4 mb-5 justify-content-center">
    <!-- Previous Button -->
    <div class="col-md-3 text-center">
        <div class="button-container">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="previousBtnRelative">Previous</button>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="col-md-3 text-center ms-3">
        <div class="button-container">
            <button type="submit" class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="nextBtnRelative">Submit</button>
        </div>
    </div>
</div>


                        {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i  class="bi bi-arrow-up-short"></i>
    </a>
</main>

<script>
 $('#nextBtnRelative').on('click', function () {
      
        $('#relativeInfoAddForm').attr('action', "{{ route('app.relativeInfo_add.member') }}").submit();
    });

$('#previousBtnRelative').on('click', function() {
    $('#relativeInfoAddForm').attr('action', "{{ route('app.relative_info_previous.member') }}").submit();
});


</script>

@endsection