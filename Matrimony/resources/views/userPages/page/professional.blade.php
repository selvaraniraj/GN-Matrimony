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
            <div class="col-lg-8 px-4 pt-4 reservation-form-bg" style=' border: 1px solid rgba(116, 15, 23, 0.55);box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);background-color:#FFF5F5'  data-aos="fade-up" data-aos-delay="200">
                <div id="form_container">
                {!! Form::open([ 'method' => 'post', 'autocomplete' => 'off', 'id' => 'professionalInfoAddForm']) !!}
               
                    {!! Form::hidden('member_id', $member->id) !!}

                    {{csrf_field()}}
                    <h3 class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">  
                      Education Details
                       </h3>

                        <div class="row gy-4">
                        
@php
    // Exploding values to handle multiple selections
    $educationIdsArray = isset($educationDetail->education_id) ? explode(',', $educationDetail->education_id) : [];
    $collegeSchoolsArray = isset($educationDetail->college_inst) ? explode(',', $educationDetail->college_inst) : [];
@endphp

@php
    $educationIdsArray = isset($educationDetail->education_id) ? explode(',', $educationDetail->education_id) : [''];
    $collegeSchoolsArray = isset($educationDetail->college_inst) ? explode(',', $educationDetail->college_inst) : [''];
@endphp

@foreach($educationIdsArray as $key => $educationId)    


    <div class="col-lg-12 col-md-12 education-entry">
        <div class="row gy-4">
            <div class="col-md-4 ms-4 text-start">
                <label>Higher Educational</label><span class="spl"> *</span>
            </div>
            <div class="col-md-5">
                <select name="education[]" id="education" data-search="true" data-silent-initial-value-set="true">
                @foreach($education as $edu)
                        <option value="{{ $edu['id'] }}" {{ $educationId == $edu['id'] ? 'selected' : '' }}>
                            {{ $edu['name'] . ' - ' . $edu['department'] }}
                        </option>
                    @endforeach
                </select>
                <span class="error" id="education_error">Please Enter your Highest Education Level!</span>
                @error('education')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success add-education"><i class="bi bi-plus-lg"></i></button>
            </div>
            <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-education"><i class="bi bi-dash-lg"></i></button>
                </div>
        </div>


    <div class="row gy-4">
        <div class="col-lg-12 col-md-12">
            <div class="row gy-4">
                <div class="col-md-4 ms-4 text-start">
                    <label>School/University</label><span class="spl"> *</span>
                </div>
                <div class="col-md-5">
                <input type="text" class="form-control mb-2" id="college_school_{{ $key }}"
                        name="collage_school[]" placeholder="Enter your College/School" 
                        value="{{ isset($collegeSchoolsArray[$key]) ? trim($collegeSchoolsArray[$key]) : '' }}">
                    <span class="error" id="college_error">Please Enter your College/School Name!</span>
                    @error('collage_school')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endforeach

</div>

                        <div class="mt-4" id="education-container"></div>
                       
                        <div class="row gy-4">
                            <div class="col-md-4 ms-4 text-start">
                                <label>Job</label>
                            </div>
                            <div class="col-md-5">
                                <label class="px-2"> <input type="radio" name="employed_in" value="Yes" id="employed_yes" checked
                                {{isset($educationDetail) && $educationDetail->employee_in == 'Yes' ? 'checked' : '' }}
                                >Yes</label>
                                <label class="px-2"><input type="radio" name="employed_in" value="No" id="employed_no"
                                {{isset($educationDetail) && $educationDetail->employee_in == 'No' ? 'checked' : '' }}>No</label>    
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
        class="bi bi-arrow-up-short"></i>
    </a>
</main>
<script>
    $(document).ready(function () {
    $(".add-education").click(function () {
        let newField = `
            <div class="row gy-4 education-entry">
                <div class="col-md-4 ms-4 text-start">
                    <label>Higher Education</label><span class="spl"> *</span>
                </div>
                <div class="col-md-5">
                    <select name="education[]" class="form-control">
                        @foreach($education as $edu)
                        <option value="{{ $edu['id'] }}">{{ $edu['name'] . ' - ' . $edu['department'] }}</option>
                        @endforeach
                    </select>
                    <span class="error education_error">Please Enter your Highest Education Level!</span>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-education"><i class="bi bi-dash-lg"></i></button>
                </div>

                <div class="col-md-4 ms-4 text-start">
                    <label>School/University</label><span class="spl"> *</span>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="collage_school[]" placeholder="Enter your College/School">
                    <span class="error college_error">Please Enter your College/School Name!</span>
                </div>
            </div>
        `;
        $("#education-container").append(newField);
    });

    $(document).on("click", ".remove-education", function () {
        $(this).closest(".education-entry").remove();
    });
});

</script>
<script>
// $('#nextBtn').on('click', function (e) {
//     e.preventDefault();

//     if (professionalvalidate()) {
//         let employed = $('input[name="employed_in"]:checked').val();

//         if (employed === 'Yes') {
//             $('#professionalInfoAddForm').attr('action', "{{ route('app.professional_add.member') }}").submit();
//         } else {
//             $('#professionalInfoAddForm').attr('action', "{{ route('app.v2.photo_page') }}").submit(); // Redirect to Photo Page
//         }
//     }
// });

$('#nextBtn').on('click', function(e) {
    e.preventDefault(); // Prevent default button behavior
    console.log('Next Button Clicked'); 
    if (professionalvalidate()) {
        let employed = $('input[name="employed_in"]:checked').val();

        if (employed === 'Yes') {
            $('#professionalInfoAddForm').attr('action', "{{ route('app.professional_add') }}").submit();
        } else {
            $('#professionalInfoAddForm').attr('action', "{{ route('app.professional_info_skip.member') }}").submit(); // Redirect to Photo Page
        }
    }
   
});



$('#previousBtn').on('click', function() {
    $('#professionalInfoAddForm').attr('action', "{{ route('app.professional_info_previous.member') }}").submit();
});

$('#skipBtn').on('click', function() {

    let employed = $('input[name="employed_in"]:checked').val();
                          
if (employed === 'Yes') {
    $('#professionalInfoAddForm').attr('action', "{{ route('app.professional_add') }}").submit();
} else {
    $('#professionalInfoAddForm').attr('action', "{{ route('app.professional_info_skip.member') }}").submit(); // Redirect to Photo Page
}
    

});

$(document).ready(function(){

$('select[name="state"]').on('change', function() {
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
        success: function(data){
            var html = '';
            html += '<option value="0">Select</option>';  

            for (var i = 0; i < data.length; i++) {
               html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            
            $('#city').html(html);  
        }
    });
    
    return false;  
});

$('select[name="city"]').on('change', function() {
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
        success: function(data){
            var html = '';
            html += '<option value="0">Select</option>';  
            for (var i = 0; i < data.length; i++) {
               html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
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

</script>


@endsection