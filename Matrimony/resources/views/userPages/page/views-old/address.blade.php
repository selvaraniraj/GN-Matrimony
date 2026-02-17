@extends('layout2.user-form')

 @section('title')
  Address 
  @endsection 

  @section('content')
  <main class="main">
   <div class="container">
      <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
         <div class="col-lg-4 reservation-img b1"></div>
         <div class="col-lg-8 px-4 reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
            <div id="form_container">
            {!! Form::open([ 'method' => 'post',
               'autocomplete' => 'off', 'id' => 'addressInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                  <div class="row gy-4">
                     <h2>Address</h2>
                     <div class="col-lg-12 col-md-12">
                        <div class="row gy-4">
                           <div class="col-md-3 ms-4 text-start">
                              <label>State</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <select class="form-control" name="state" id="state">
                                 <option value="">Select </option>
                                 @foreach($state as $id => $name)
                                               <option value="{{ $id }}" {{ isset($member) && $member->state == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                              </select>

                              <span class="error" id="state_error">Please select a State!</span>
                              @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row gy-4 pt-4">
                     <div class="col-lg-12 col-md-12">
                        <div class="row gy-4">
                           <div class="col-md-3 ms-4 text-start">
                              <label>City</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <select class="form-control" name="city" id="city">
                                 <option value="">Select </option>
                                 @if (isset($cityarray) && !empty($cityarray))
                       @foreach($cityarray as $city)
                    <option value="{{ $city['id'] }}" {{ isset($member) && $member['city'] == $city['id'] ? 'selected' : '' }}>
                        {{ $city['name'] }}
                      </option>
                     @endforeach
                    @endif
                              </select>

                              <span class="error" id="city_error">Please select a city!</span>
                              <span class="error" id="dependendcity_error">Please select a State first!</span>
                              @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row gy-4 pt-4">
                     <div class="col-lg-12 col-md-12">
                        <div class="row gy-4">
                           <div class="col-md-3 ms-4 text-start">
                              <label>Taluk</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <select class="form-control" name="taluk" id="taluk">
                                 <option value="">Select </option>
                                 @if (isset($taulkarray) && !empty($taulkarray))
                       @foreach($taulkarray as $taluk)
                    <option value="{{ $taluk['id'] }}" {{ isset($member) && $member['taluk'] == $taluk['id'] ? 'selected' : '' }}>
                        {{ $taluk['name'] }}
                      </option>
                     @endforeach
                    @endif
                              </select>
                              <span class="error" id="taluk_error">Please select a Taluk!</span>
                              <span class="error" id="dependendtaluk_error">Please select a City first!</span>

                              @error('taluk')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-3 ms-4 text-start"><label>Village</label><span class="spl">*</span></div>
                     <div class="col-md-5"><input type="text" class="form-control" id="village" name="village"
                        placeholder="Enter Your Village" value="{{ isset($member) && $member->village ? $member->village : '' }}">
                        <span class="error" id="village_error">Please select a village!</span>
                        @error('village')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                     </div>

                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-3 ms-4 text-start"><label>Pincode</label><span class="spl">*</span></div>
                     <div class="col-md-5">
                        <input type="text" class="form-control" id="pincode" name="pincode"
                           placeholder="Enter Pincode"  value="{{ isset($member) && $member->pincode ? $member->pincode : '' }}"
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                           <span class="error" id="pincode_error">Please Enter a valid Pincode!</span>
                           @error('pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                     </div>
                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-3 ms-4 text-start">
                        <label>Door No</label><span class="spl">*</span>
                     </div>
                     <div class="col-md-5">
                        <input type="text" class="form-control" id="doorno" name="doorno"
                           placeholder="Enter Door No"  value="{{ isset($member) && $member->door_no ? $member->door_no : '' }}">
                           <span class="error" id="doorno_error">Please select a Door_no!</span>
                        
                           @error('doorno')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                     </div>
                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-3 ms-4 text-start"><label>Land Mark</label><span class="spl">*</span>
                     </div>
                     <div class="col-md-5">
                        <textarea class="form-control" name="landmark" id="landmark" rows="3"
                           placeholder="">{{ isset($member) ? $member->land_mark : '' }}</textarea>
                           <span class="error" id="landmark_error">Please Enter a Landmark!</span>
                           @error('landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                     </div>
                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-3 ms-4 text-start"><label>Permanent Address</label></div>
                     <div class="col-md-8">
                        <label class="px-2">
                        <input type="radio" name="other_address" value="1" {{isset($member) && $member->permanent_address == '1' ? 'checked' : '' }}>
                        Same as current address</label>
                        <label class="px-2">
                        <input type="radio" name="other_address" value="2" {{isset($member) && $member->permanent_address == '2' ? 'checked' : '' }}>Other Address
                        </label>
                     </div>
                  </div>
                  <div id="permanentAddressSection" class="row gy-4" style="{{ !empty($member) && $member['permanent_address'] == '2' ? 'display:block;' : 'display:none;' }}">
                     <div class="col-lg-12 col-md-12">
                        <div class="row gy-4">
                           <div class="col-md-3 ms-4 text-start"><label>State</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <select class="form-control" name="permanent_state" id="permanent_state">
                                 <option value="Select">Select </option>
                                
                                 @foreach($state as $id => $name)
                                    <option value="{{ $id }}" {{ isset($member) && $member->permanent_state_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                              </select>
                              <span class="error" id="permanentstate_error">Please select a State!</span>
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-3 ms-4 text-start"><label>City</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <select class="form-control" name="permanent_city" id="permanent_city">
                                 <option value="Select">Select </option>
                                 @if (isset($permanentcityarray) && !empty($permanentcityarray))
                       @foreach($permanentcityarray as $city)
                      <option value="{{ $city['id'] }}" {{ isset($member) && $member['permanent_city_id'] == $city['id'] ? 'selected' : '' }}>
                        {{ $city['name'] }}
                      </option>
                     @endforeach
                    @endif
                              </select>
                              <span class="error" id="permanentcity_error">Please select a City!</span>
                              <span class="error" id="dependencycity_error">Please select a State first!</span>
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-3 ms-4 text-start"><label>Taluk</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <select class="form-control" name="permanent_taluk" id="permanent_taluk">
                                 <option value="Select">Select </option>
                                 @if (isset($permanenttaulkarray) && !empty($permanenttaulkarray))
                       @foreach($permanenttaulkarray as $taluk)
                    <option value="{{ $taluk['id'] }}" {{ isset($member) && $member['permanent_taulk_id'] == $taluk['id'] ? 'selected' : '' }}>
                        {{ $taluk['name'] }}
                      </option>
                     @endforeach
                    @endif
                              </select>
                              <span class="error" id="permanenttaluk_error">Please select a Taluk!</span>
                              <span class="error" id="dependencytaluk_error">Please select a City first!</span>
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-3 ms-4 text-start"><label>Village</label><span
                              class="spl">*</span></div>
                           <div class="col-md-5">
                              <input type="text" class="form-control" id="permanent_village" name="permanent_village"
                                 placeholder="Enter Your Village" value="{{ isset($member) && $member->permanent_village ? $member->permanent_village : '' }}">
                                 <span class="error" id="permanentvillage_error">Please select a Village!</span>
                              </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-3 ms-4 text-start">
                              <label>Pincode</label>
                              <span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <input type="text" class="form-control" id="permanent_pincode" name="permanent_pincode"
                                 placeholder="Enter Pincode" value="{{ isset($member) && $member->permanent_pincode ? $member->permanent_pincode : '' }}"
                                 oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                 <span class="error" id="permanentpincode_error">Please Enter a valid pincode!</span>
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-3 ms-4 text-start">
                              <label>Door No</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <input type="text" class="form-control" id="permanent_doorno" name="permanent_doorno"
                                 placeholder="Enter Door No" value="{{ isset($member) && $member->permanent_door_no ? $member->permanent_door_no : '' }}">
                                 <span class="error" id="permanentdoorno_error">Please Enter a door_no!</span>
                              </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-3 ms-4 text-start">
                              <label>Land Mark</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-5">
                              <textarea class="form-control" name="permanent_landmark" id="permanent_landmark" rows="3"
                                 placeholder="Message">{{ isset($member) ? $member->permanent_land_mark : '' }}
                              </textarea>
                              <span class="error" id="permanentlandmark_error">Please Enter a Landmark!</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row gy-4 p-3">
                     <div class="col-md-3 ms-4  text-start">
                        <div class="button-container"><button  class="btn" id="previousBtn">Previous</button></div>
                     </div>
                     <div class="col-md-3 ms-4 text-start">
                        <div class="button-container"><button class="btn" id="nextBtn">Next</button></div>
                     </div>
                     <div class="col-md-3 ms-4  text-start">
                        <div class="button-container"><button class="btn" id="skipBtn">Skip</button></div>
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
   
   $('#nextBtn').on('click', function(e) {
      e.preventDefault();

      if (addressvalidate()) {
            $('#addressInfoAddForm').attr('action', "{{ route('app.address_add.member') }}").submit();
        }
      });

    $('#previousBtn').on('click', function() {
        $('#addressInfoAddForm').attr('action', "{{ route('app.address_info_previous.member') }}").submit();
    });

    $('#skipBtn').on('click', function() {
        $('#addressInfoAddForm').attr('action', "{{ route('app.address_info_skip.member') }}").submit();
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
            var selectedCityId = "{{ isset($member) ? $member->city : '' }}"; 
            for (var i = 0; i < data.length; i++) {
               var selected = (selectedCityId == data[i].id) ? 'selected' : '';
               html += '<option value="' + data[i].id + '" ' + selected + '>' + data[i].name + '</option>';
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

$('select[name="permanent_state"]').on('change', function() {
    var id = $('#permanent_state').val();  
    
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
            
            $('#permanent_city').html(html);  
        }
    });
    
    return false;  
});

$('select[name="permanent_city"]').on('change', function() {
    var state_id = $('#permanent_state').val(); 
    var city_id = $('#permanent_city').val();   
    
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
            
            $('#permanent_taluk').html(html);  
        }
    });
    
    return false;  
});

});
</script>


@endsection