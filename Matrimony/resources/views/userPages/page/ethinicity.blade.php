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
                {!! Form::open([ 'method' => 'post', 'autocomplete' => 'off', 'id' => 'ethinicityInfoAddForm']) !!}
                   {{csrf_field()}}

                   {!! Form::hidden('member_id', $member->id) !!}
                   <h3 class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
                   Ethinicity Information</h3>
                        <div class="row gy-4">
                       
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-3 ms-4  text-start">
                                        <label>Religion</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-5">
                    <label class="px-2">
                        <input type="radio" name="religion" value="Hindu" {{ old( 'religion', $member->religion) == 'Hindu' ? 'checked' : '' }}> Hindu
                    </label>
                          <label class="px-2">
                        <input type="radio" name="religion" value="Christian" {{ old('religion', $member->religion) == 'Christian' ? 'checked' : '' }}> Christian
                          </label>
                         <div><span class="error" id="religion_error">Please select Religion!</span>
                         </br>

                                        @error('religion')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror</div>
                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
    <div class="col-lg-12 col-md-12 ">
        <div class="row gy-4 style="margin-top: 10px;"">
            <div class="col-md-3 ms-4  text-start">
                <label>Mother Tongue</label><span class="spl"> *</span>
            </div>
            <div class="col-md-6">
                <div > 
                    <label class="px-2">
                        <input type="radio" name="mothertongue" value="Tamil" {{ old('mothertongue', $member->mothertongue) == 'Tamil' ? 'checked' : '' }}> Tamil
                    </label>
                    <label class="px-2">
                        <input type="radio" name="mothertongue" value="Malayalam" {{ old('mothertongue', $member->mothertongue) == 'Malayalam' ? 'checked' : '' }}> Malayalam
                    </label>
                    <label class="px-2">
                        <input type="radio" name="mothertongue" value="Telugu" {{ old('mothertongue', $member->mothertongue) == 'Telugu' ? 'checked' : '' }}> Telugu
                    </label>
                    <div>
                        @error('mothertongue')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror    
                        <span class="error" id="mothertongue_error">Please select Mother Tongue!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="row gy-4 pt-3">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-3 ms-4  text-start">
                                        <label>Caste</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-5">
                        <label class="px-2">
                            <input type="radio" name="caste" value="Nadar" {{ old('caste', $member ->caste) == 'Nadar' ? 'checked' : '' }}> Nadar
                        </label>
                        <div>
                        @error('caste')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                                        <span class="error" id="caste_error">Please select Caste!</span></div>
                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-md-3 ms-4  text-start">
                                <label>Subcaste</label>
                            </div>
                            <div class="col-md-5">
                            <select class="form-control" name="subcaste">
                    <option value="select">Select</option>
                    <option value="1" {{ old('subcaste', $member->subcaste) == '1' ? 'selected' : '' }}>Kiramani</option>
                    <option value="2" {{ old('subcaste', $member->subcaste) == '2' ? 'selected' : '' }}>Sanar</option>
                    <option value="3" {{ old('subcaste', $member->subcaste) == '3' ? 'selected' : '' }}>Sathriyar</option>
                    <option value="4" {{ old('subcaste', $member->subcaste) == '4' ? 'selected' : '' }}>Others</option>
                </select>
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-md-3 ms-4  text-start">
                                <label>Village Temple</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="village_temple" name="village_temple"
                                    value="{{ old('village_temple', $member->village_temple) }}" placeholder="Enter Your Village Temple">
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-md-3 ms-4  text-start">
                                <label>Family God</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="family_god" name="family_god"
                                value="{{ old('name', $member->family_god) }}" placeholder="Enter Your Family God">
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
    <div class="col-md-3 ms-4 text-start">
        <label>Known Language</label><span class="spl"> *</span>
    </div>
    <div class="col-md-8">
        @php
            $languages = explode(',', $member->language);
        @endphp

        <div class="row">
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="tamil" {{ in_array('tamil', $languages) ? 'checked' : '' }}> Tamil
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="english" {{ in_array('english', $languages) ? 'checked' : '' }}> English
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="malayalam" {{ in_array('malayalam', $languages) ? 'checked' : '' }}> Malayalam
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="telugu" {{ in_array('telugu', $languages) ? 'checked' : '' }}> Telugu
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="hindi" {{ in_array('hindi', $languages) ? 'checked' : '' }}> Hindi
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="kannada" {{ in_array('kannada', $languages) ? 'checked' : '' }}> Kannada
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="Gujarti" {{ in_array('Gujarti', $languages) ? 'checked' : '' }}> Gujarti
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="marathi" {{ in_array('marathi', $languages) ? 'checked' : '' }}> Marathi
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="urdu" {{ in_array('urdu', $languages) ? 'checked' : '' }}> Urdu
                </label>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="language[]" value="others" {{ in_array('others', $languages) ? 'checked' : '' }}> Others
                </label>
            </div>
        </div>

        <!-- Add error message for Known Language -->
        @error('language')
            <span class="text-danger" >{{ $message }}</span>
        @enderror
       
          <span class="error" id='languageerror' style="margin-top:5px;">Please Select Your Known Language!</span>
    </div>
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
            <button class="btn w-90" style='box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;' id="nextBtn">Next</button>
        </div>
    </div>

    <!-- Skip Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style='box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;' id="skipBtn">Skip</button>
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


        if (ethinicityvalidate()) {
            $('#ethinicityInfoAddForm').attr('action', "{{ route('app.ethinicity_add.member') }}").submit();
        }
    });

    $('#previousBtn').on('click', function() {
        $('#ethinicityInfoAddForm').attr('action', "{{ route('app.ethinicity_info_previous.member') }}").submit();
    });

    $('#skipBtn').on('click', function() {
        $('#ethinicityInfoAddForm').attr('action', "{{ route('app.ethinicity_info_skip.member') }}").submit();
    });

</script>

@endsection