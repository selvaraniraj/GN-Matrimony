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
                    {!! Form::open([ 'method' => 'post',
                    'autocomplete' => 'off', 'id' => 'occupationalInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <h3
                        class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">  
                            Occupation Details
                        </h3>
                    <div class="row gy-4">
                     
                       
                        <div class="col-lg-12 col-md-12">
                           
                            <!-- <div id="nofields" class="{{ !empty($educationDetail) && $educationDetail['employee_in'] == 'Yes' ? 'employee_yes' : 'employee_no' }}"> -->
                            <!-- <div id="" class=""> -->
                            <div class="row gy-4 pt-3">
                                   

                                    <div class="col-md-3 ms-4 text-start">
                                        <label>Profession</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="profession" id="profession">
                                            <option value="">Select</option>
                                            <option value="Government"
                                                {{ isset($educationDetail) && $educationDetail->occuption == 'Government' ? 'selected' : '' }}>
                                                Government</option>
                                            <option value="Private"
                                                {{ isset($educationDetail) &&  $educationDetail->occuption == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                            <option value="Business"
                                                {{ isset($educationDetail) && $educationDetail->occuption == 'Business' ? 'selected' : '' }}>
                                                Business </option>
                                            <option value="Self_Employed"
                                                {{ isset($educationDetail) &&  $educationDetail->occuption == 'Self_Employed' ? 'selected' : '' }}>
                                                Self Employed</option>
                                        </select>
                                        <span class="error" id="profession_error">Please Select your Profession!</span>
                                        @error('profession')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gy-4 pt-3">
                                    <div class="col-md-3 ms-4 text-start">
                                        <label>Company Name</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                            placeholder="Enter your Company Name"
                                            value="{{ isset($educationDetail) && $educationDetail->company_name ? $educationDetail->company_name : '' }}">
                                        <span class="error" id="company_error">Please Enter your Company Name!</span>
                                        @error('company_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gy-4 pt-3">
                                    <div class="col-md-3 ms-4 text-start">
                                        <label>Designation</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="designation" name="destination"
                                            placeholder=""
                                            value="{{ isset($educationDetail) && $educationDetail->destination ? $educationDetail->destination : '' }}">
                                        <span class="error" id="designation_error">Please Enter your Designation!</span>
                                        @error('destination')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gy-4 pt-3">
                                    <div class="col-md-3 ms-4 text-start">
                                        <label>Income</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="income" id="income">
                                            <option value="">Select</option>
                                            <option value="10,000-20,000"
                                                {{ isset($educationDetail) && $educationDetail->income == '10,000-20,000' ? 'selected' : '' }}>
                                                10,000-20,000</option>
                                            <option value="20,000-30,000"
                                                {{ isset($educationDetail) && $educationDetail->income == '20,000-30,000' ? 'selected' : '' }}>
                                                20,000-30,000</option>
                                            <option value="30,000-60,000"
                                                {{ isset($educationDetail) && $educationDetail->income == '30,000-60,000' ? 'selected' : '' }}>
                                                30,000-60,000</option>
                                            <option value="60,000-80,000"
                                                {{ isset($educationDetail) && $educationDetail->income == '60,000-80,000' ? 'selected' : '' }}>
                                                60,000-80,000</option>
                                            <option value="80,000-1lakh"
                                                {{ isset($educationDetail) && $educationDetail->income == '80,000-1lakh' ? 'selected' : '' }}>
                                                80,000-1 lakh</option>
                                            <option value="1lakh-1.5lakh"
                                                {{ isset($educationDetail) && $educationDetail->income == '1lakh-1.5lakh' ? 'selected' : '' }}>
                                                1 lakh-1.5lakh
                                            </option>
                                            <option value="1.5lakh-2lakh"
                                                {{ isset($educationDetail) && $educationDetail->income == '1.5lakh-2lakh' ? 'selected' : '' }}>
                                                1.5 lakh-2 lakh
                                            </option>
                                        </select>

                                        <span class="error" id="income_error">Please Select your income!</span>
                                        @error('income')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gy-4 pt-3">
                                    <div class="col-md-3 ms-4 text-start">
                                        <label>Country</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="px-2"><input type="radio" name="work_location" value="India"
                                                id="india"
                                                {{isset($educationDetail) && $educationDetail->location == 'India' ? 'checked' : '' }}>India</label>
                                        <label class="px-2"><input type="radio" name="work_location"
                                                value="Other_Country" id="otherCountry"
                                                {{isset($educationDetail) && $educationDetail->location == 'Other_Country' ? 'checked' : '' }}>Other
                                            Country</label>
                                    </div>
                                </div>
                                <div id="indiaFields"
                                    class="{{ !empty($educationDetail) && $educationDetail['location'] == 'India' ? 'india' : 'indiaHidden' }}">


                                    <div class="row gy-4 pt-3">
                                        <div class="col-md-3 ms-4 text-start">
                                            <label>State</label><span class="spl"> *</span>
                                        </div>
                                        <div class="col-md-5">
                                            <select class="form-control" name="state" id="state">
                                                <option value="">Select </option>
                                                @foreach($state as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ isset($educationDetail) && $educationDetail->state_id  == $id ? 'selected' : '' }}>
                                                    {{ $name }}</option>
                                                @endforeach
                                            </select>
                                            <span id="state_error" class="error">Please Select Your State!</span>
                                        </div>

                                    </div>
                                    <div class="row gy-4 pt-3">
                                        <div class="col-md-3 ms-4 text-start">
                                            <label>City</label><span class="spl"> *</span>
                                        </div>
                                        <div class="col-md-5">
                                            <select class="form-control" name="city" id="city">
                                                <option value="">Select </option>
                                                @if (isset($cityarray) && !empty($cityarray))
                                                @foreach($cityarray as $city)
                                                <option value="{{ $city['id'] }}"
                                                    {{ isset($educationDetail) && $educationDetail['city_id'] == $city['id'] ? 'selected' : '' }}>
                                                    {{ $city['name'] }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>

                                            <span id="citydependent_error" class="error">Please Select Your State
                                                First!</span>
                                            <span id="city_error" class="error">Please Select Your City!</span>
                                        </div>
                                    </div>
                                    <div class="row gy-4 pt-3">
                                        <div class="col-md-3 ms-4 text-start">
                                            <label>Taluk</label><span class="spl"> *</span>
                                        </div>
                                        <div class="col-md-5">
                                            <select class="form-control" name="taluk" id="taluk">

                                                @if (isset($taulkarray) && !empty($taulkarray))
                                                @foreach($taulkarray as $taluk)
                                                <option value="{{ $taluk['id'] }}"
                                                    {{ isset($educationDetail) && $educationDetail['taulk_id'] == $taluk['id'] ? 'selected' : '' }}>
                                                    {{ $taluk['name'] }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <span id="talukdependent_error" class="error">Please Select Your City
                                                First!</span>
                                            <span id="taluk_error" class="error">Please Select Your Taluk!</span>
                                        </div>
                                    </div>
                                    <div class="row gy-4 pt-3">
                                        <div class="col-md-3 ms-4 text-start">
                                            <label>Pincode</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" id="pincode" name="pincode"
                                                placeholder="Enter Pincode"
                                                value="{{ isset($educationDetail) && $educationDetail->pincode ? $educationDetail->pincode : '' }}"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            <span id="pincode_error" class="error">Please Enter Your Valid
                                                Pincode!</span>
                                        </div>
                                    </div>
                                    <div class="row gy-4 pt-3">

                                        <div class="col-md-3 ms-4 text-start">
                                            <label>Address</label>
                                        </div>

                                        <div class="col-md-5">
                                            <textarea class="form-control" name="address" id="address" rows="5"
                                                placeholder="Message">{{ isset($educationDetail) ? $educationDetail->address : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="otherCountryFields"
                                    class="{{ !empty($educationDetail) && $educationDetail['location'] == 'Other_Country' ? 'otherCountry' : 'otherCountryHidden' }}">


                                    <div class="row gy-4 pt-3">
                                        <div class="col-md-3 ms-4 text-start">
                                            <label>Passport Number</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" id="passportNumber"
                                                name="passport_number" placeholder="Enter Passport Number"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                                value="{{ isset($educationDetail) && $educationDetail->passport_number ? $educationDetail->passport_number : '' }}">
                                        </div>
                                    </div>
                                    <div class="row gy-4 pt-3">
                                        <div class="col-md-3 ms-4 text-start">
                                            <label>Visa Type</label><span class="spl"> *</span>
                                        </div>
                                        <div class="col-md-5">
                                            <select class="form-control" name="visa_type" id="visa_type">
                                                <option value="Select">Select</option>
                                                <option value="Employed_Visa"
                                                    {{ isset($educationDetail) && $educationDetail->visa_type == 'Employed_Visa' ? 'selected' : '' }}>
                                                    Employed Visa</option>
                                                <option value="Business/Tourist_Visa"
                                                    {{ isset($educationDetail) &&  $educationDetail->visa_type == 'Business/Tourist_Visa' ? 'selected' : '' }}>
                                                    Business/Tourist Visa</option>
                                                <option value="Work_Visa"
                                                    {{ isset($educationDetail) && $educationDetail->visa_type == 'Work_Visa' ? 'selected' : '' }}>
                                                    Work Visa</option>
                                                <option value="Student_Visa"
                                                    {{ isset($educationDetail) && $educationDetail->visa_type == 'Student_Visa' ? 'selected' : '' }}>
                                                    Student Visa</option>
                                                <option value="Exchange_Visitor_Visa"
                                                    {{ isset($educationDetail) &&  $educationDetail->visa_type == 'Exchange_Visitor_Visa' ? 'selected' : '' }}>
                                                    Exchange Visitor Visa</option>
                                                <option value="Religion_Worker_Visa"
                                                    {{ isset($educationDetail) && $educationDetail->visa_type == 'Religion_Worker_Visa' ? 'selected' : '' }}>
                                                    Religion Worker Visa</option>
                                                <option value="Transit/Ship_Crew_Visa"
                                                    {{ isset($educationDetail) && $educationDetail->visa_type == 'Transit/Ship_Crew_Visa' ? 'selected' : '' }}>
                                                    Transit/Ship Crew Visa</option>
                                            </select>
                                            <span id="visa_error" class="error"> Please Select Your Visa_type!</span>
                                        </div>
                                    </div>
                                    <div class="row gy-4 pt-3">
                                        <div class="col-md-3 ms-4 text-start">
                                            <label>Address</label><span class="spl"> *</span>
                                        </div>
                                        <div class="col-md-5">
                                            <textarea class="form-control" name="other_country_address"
                                                id="other_country_address" rows="5"
                                                placeholder="Message">{{ isset($educationDetail) ? $educationDetail->other_country_address : '' }}</textarea>
                                            <span id="other_country_address_error" class="error">Please Enter Your Valid
                                                Address!</span>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->


                            <div class="row gy-4 p-3 mb-4 justify-content-center">
                                <!-- Previous Button -->
                                <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center w-100">
                                        <button  class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="previousBtn">Previous</button>
                                    </div>
                                </div>

                                <!-- Next Button -->
                                <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center w-100">
                                        <button  class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="nextBtn">Next</button>
                                    </div>
                                </div>

                                <!-- Skip Button -->
                                <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                    <div
                                        class="button-container d-flex justify-content-center align-items-center w-100">
                                        <button  class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="skipBtn">Skip</button>
                                    </div>
                                </div>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i>
            </a>
</main>

<script>
    const indiaRadio = document.getElementById('india');
    const otherCountryRadio = document.getElementById('otherCountry');
    const indiaFields = document.getElementById('indiaFields');
    const otherCountryFields = document.getElementById('otherCountryFields');

    indiaRadio.addEventListener('change', () => {
        indiaFields.style.display = 'block';
        otherCountryFields.style.display = 'none';
    });

    otherCountryRadio.addEventListener('change', () => {
        indiaFields.style.display = 'none';
        otherCountryFields.style.display = 'block';
    });
</script>


<script>
    $('#nextBtn').on('click', function (e) {
        e.preventDefault();

        if (occupationvalidate()) {
            $('#occupationalInfoAddForm').attr('action', "{{ route('app.occupational_add.member') }}").submit();
        }
    });

    $('#previousBtn').on('click', function () {
        $('#occupationalInfoAddForm').attr('action', "{{ route('app.occupational_provious.member') }}")
    .submit();
    });

    $('#skipBtn').on('click', function () {
        $('#occupationalInfoAddForm').attr('action', "{{ route('app.occupational_skip.member') }}").submit();
    });


    $(document).ready(function () {

        $('select[name="state"]').on('change', function () {
            var id = $('#state').val();

            $.ajax({
                url: "{{ route('get_sub_city') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    html += '<option value="0">Select</option>';

                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].name +
                            '</option>';
                    }

                    $('#city').html(html);
                }
            });

            return false;
        });

        $('select[name="city"]').on('change', function () {
            var state_id = $('#state').val();
            var city_id = $('#city').val();

            $.ajax({
                url: "{{ route('get_taluk_category') }}",
                method: "POST",
                data: {
                    city: city_id,
                    id: state_id,
                    _token: "{{ csrf_token() }}"
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    html += '<option value="0">Select</option>';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].name +
                            '</option>';
                    }

                    $('#taluk').html(html);
                }
            });

            return false;
        });

    });

    VirtualSelect.init({
        ele: '#education'
    });


    document.addEventListener('DOMContentLoaded', function () {

        var education = document.querySelectorAll("#education");


        var educationMap = {};
        if (education.length > 0 && education[0].hasAttribute('data-education-map')) {
            var educationMapString = education[0].getAttribute('data-education-map');
            educationMap = JSON.parse(educationMapString);
        }

        function updateEducationOptions() {

            var selectElement = document.querySelector('#education');
            var selectedValues = [];

            var options = selectElement.querySelectorAll('.vscomp-option');
            options.forEach(function (option) {
                if (option.getAttribute('aria-selected') === 'true') {
                    selectedValues.push(option.getAttribute('data-value'));
                }
            });

            console.log("Selected values: ", selectedValues);

            var education1 = document.getElementById('education1');
            education1.innerHTML = '';

            var placeholderOption = document.createElement('option');
            placeholderOption.value = '';
            placeholderOption.text = 'Selected Education';
            education1.appendChild(placeholderOption);


            selectedValues.forEach(function (value) {
                var label = educationMap[value] || value;
                var option = document.createElement('option');
                option.value = value;
                option.text = label;
                education1.appendChild(option);
            });
        }

        var selectElement = document.querySelector('#education');
        selectElement.addEventListener('change', updateEducationOptions);


        updateEducationOptions();
    });

    function occupationvalidate(){
    isValid = true;
    if ($('#company_name').val() =='') {
        $('#company_error').show();
        isValid = false;
    } else {
        $('#company_error').hide();
    }

    if ($("#designation").val() =='') {
        $("#designation_error").show();
        isValid = false;
    } else {
        $("#designation_error").hide();
    }
    if ($("#income").val() === "") {
        $("#income_error").show();
        isValid = false;
    } else {
        $("#income_error").hide();
    }

if ($("input[name='work_location']:checked").val() === "India") {
    if ($("#state").val() === "") {

        $('#state_error').show();
        isValid = false;
    } else {
        $('#state_error').hide();
    }

    // City Validation
    if ($("#state").val() === '') {
        $("#citydependent_error").show();
        isValid = false;
        $("#city_error").hide();
    } else if (($('#state').val() !== '') && ($('#city').val() === '0')) {
        $("#city_error").show();
        isValid = false;
        $("#citydependent_error").hide();
    } else {
        $('#city_error').hide();
        $("#citydependent_error").hide();
    }


    //Taluk validation

    if (($("#taluk").val() === '0') && ($('#city').val() !== '0')) {
        $("#taluk_error").show();
        isValid = false;
        $("#talukdependent_error").hide();
    } else if (
        ($('#city').val() === '0' || $("#state").val() === '')) {
        $("#talukdependent_error").show();
        isValid = false;
        $("#taluk_error").hide();
    } else {
        $("#talukdependent_error").hide();
        $("#taluk_error").hide();

    }

    // Pincode validation

    let pincode = $("#pincode").val().trim()
    if ( pincode.length != 6) {
        $("#pincode_error").show();
        isValid = false;
    } else {
        $("#pincode_error").hide();
    }
    
}

if ($("input[name='work_location']:checked").val() === 'Other_Country') {
    if ($("#visa_type").val() === "Select") {
        $("#visa_error").show();
        isValid = false;
    } else {
        $("#visa_error").hide();
    }
    if ($("#other_country_address").val() === '') {
        $("#other_country_address_error").show();
        isValid = false;
    } else {
        $("#other_country_address_error").hide();
    }
}
return isValid;
}



</script>


@endsection