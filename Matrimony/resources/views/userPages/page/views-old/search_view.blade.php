@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
<main class="main">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
            <h5><button class="btn" onclick="history.back()">
            <i class="bi bi-arrow-left " style="font-size: 1.5rem;color:black;"></i>
         </button>Regular Search</h5>
         <nav class="sidebar card py-2 mb-4">
         {!! Form::open([  'url' => route('app.v2.searchInfopage'), 'method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => '']) !!}
                    {{csrf_field()}}
            <ul class="nav flex-column" id="nav_accordion">
            <label class="nav-link" >Age</label>
            <select class="form-control" name="age">
               <option value ="" >Select</option>
               <option value ="4" {{ old('age', $search->age) == '4' ? 'selected' : '' }}>Age 21 to Age 22</option>
               <option value ="5" {{ old('age', $search->age) == '5' ? 'selected' : '' }}>Age 22 to Age 23</option>
               <option value ="6" {{ old('age', $search->age) == '6' ? 'selected' : '' }}>Age 23 to Age 25</option>
               <option value ="7" {{ old('age', $search->age) == '7' ? 'selected' : '' }}>Age 25 to Age 27</option>
               <option value ="8" {{ old('age', $search->age) == '8' ? 'selected' : '' }}>Age 27 to Age 30</option>
               <option value ="9" {{ old('age', $search->age) == '9' ? 'selected' : '' }}>Above Age 30</option>
            </select>
            <label class="nav-link" >Height</label>
            <select class="form-control" name="height">
               <option value="">Select</option>
               <option value="4" {{ old('height', $search->height) == '4' ? 'selected' : '' }}>Upto 4.5ft</option>
               <option value="5" {{ old('height', $search->height) == '5' ? 'selected' : '' }}>4.5ft to 5ft</option>
               <option value="6" {{ old('height', $search->height) == '6' ? 'selected' : '' }}>5ft to 5.5ft</option>
               <option value="7" {{ old('height', $search->height) == '7' ? 'selected' : '' }}>5.5ft to 6ft</option>
               <option value="8" {{ old('height', $search->height) == '8' ? 'selected' : '' }}>Above 6ft</option>
            </select>
            <label class="nav-link" >Religion</label>
            <div>
            <label class="px-2"> <input type="radio" name="religion" value="Hindu" {{ old( 're_religion', $search->re_religion) == 'Hindu' ? 'checked' : '' }}>Hindu</label>
                        <label class="px-2"><input type="radio" name="religion" value="Christian" {{ old('re_religion', $search->re_religion) == 'Christian' ? 'checked' : '' }}>Christian</label>
                        </div>

                        <label class="nav-link" >Mother Tongue</label>
            <div>
            <label class="px-2"> <input type="radio" name="mother_tongue" value="Tamil" {{ old('mother_tongue', $search->mother_tongue) == 'Tamil' ? 'checked' : '' }}>Tamil</label>
                        <label class="px-2"><input type="radio" name="mother_tongue" value="Malayalam" {{ old('mother_tongue', $search->mothertongue) == 'Malayalam' ? 'checked' : '' }}>Malayalam</label>
                        </div>

                        <label class="nav-link">Subcaste</label>  
                        <select name="subcaste" id="subcaste"  class="form-control">
                           <option value ="" >Select</option>
                           <option value="1" {{ old('subcaste', $member->subcaste) == '1' ? 'selected' : '' }}>Kiramani</option>
                    <option value="2" {{ old('subcaste', $search->subcaste) == '2' ? 'selected' : '' }}>Sanar</option>
                    <option value="3" {{ old('subcaste', $search->subcaste) == '3' ? 'selected' : '' }}>Sathriyar</option>
                    <option value="4" {{ old('subcaste', $search->subcaste) == '4' ? 'selected' : '' }}>Others</option>
                        </select>
                        
                        <label class="nav-link">Star</label>   
                        <select multiple id="multiselect2" name="par_star[]" placeholder="Select Star"
        data-search="true" data-silent-initial-value-set="true">
    <option value="">Select</option>
    @foreach($star as $id => $name)
                                               <option value="{{ $id }}" >{{ $name }}</option>
                                            @endforeach
</select>
                        
                        <label class="nav-link">Educational Qualification</label>   
                        <select multiple id="multiselect3" name="education[]"
                                            placeholder="Select Education" data-search="true"
                                            data-silent-initial-value-set="true">
                                            @foreach($education as $id => $name)
                                               <option value="{{ $id }}" >{{ $name }}</option>
                                            @endforeach
                                        </select>

                                        <label class="nav-link">Monthly Income</label>   
                        <select  class="form-control" name="par_income">
                                            <option value="">Select</option>
                                        <option value="10,000-20,000" {{ isset($search) && $search->income == '10,000-20,000' ? 'selected' : '' }}>10,000-20,000</option>
                                        <option value="20,000-30,000" {{ isset($search) && $search->income == '20,000-30,000' ? 'selected' : '' }}>20,000-30,000</option>
                                        <option value="30,000-60,000" {{ isset($search) && $search->income == '30,000-60,000' ? 'selected' : '' }}>30,000-60,000</option>
                                        <option value="60,000-80,000" {{ isset($search) && $search->income == '60,000-80,000' ? 'selected' : '' }}>60,000-80,000</option>
                                        <option value="80,000-1lakh" {{ isset($search) && $search->income == '80,000-1lakh' ? 'selected' : '' }}>80,000-1 lakh</option>
                                        <option value="1lakh-1.5lakh" {{ isset($search) && $search->income == '1lakh-1.5lakh' ? 'selected' : '' }}>
                                            1 lakh-1.5lakh
                                        </option>
                                        <option value="1.5lakh-2lakh" {{ isset($partnerDetail) && $partnerDetail->income == '1.5lakh-2lakh' ? 'selected' : '' }}>1.5 lakh-2 lakh
                                        </option>
                                        </select>

                                        <div class="button-container pt-3">
            <button id="filterButton" type="submit" class="btn btn-primary">Search</button>
        </div>
        {!! Form::close() !!}
         </nav>
            </div>
            <div class="col-md-9">
                <h5>PROFILES YET TO BE VIEWED </h5>
                <div class="d-flex justify-content-between align-items-center">
                </div>
                <div id="profileContainer" class="row">

                @php
                          $i=1;
                          @endphp

                @foreach ($memberData as $profile)

                <input type="hidden" name="profile_id" id="profile_id" value="{{ $profile->id }}">
<input type="hidden" name="name" id="name" value="{{ $profile->name }}">
<input type="hidden" name="user_id" id="user_id" value="{{ $profile->user_id }}">

                <input type="hidden" name="members_id" value="{{ $profile->id }}" id="members_id{{ $i }}">

                    <div class="col-md-12 mb-4 profile-card" data-gender="{{ $profile->gender }}">
                        <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                            <div class="card">
                                <div class="row">
                                    

                                <div class="col-md-7" style="padding-left:20px;" 
     onclick="view_person(event, this)" 
     data-profile-id="{{ $profile->id }}" 
     data-name="{{ $profile->name }}" 
     data-user-id="{{ $profile->user_id }}">
                          <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($profile->id)]) }}" target="_blank">{{ $profile->profile_id }}
                           
                             || <span>Profile created for {{$profile->created_by_relation}}</span>&nbsp;&nbsp;&nbsp;&nbsp;</div></a>
                             <div class="col-md-5 pad_space ">
                          </div>
                          <div class="col-md-4 pt-3 ms-2 position-relative text-center">
    @php
        $profileId = $profile->id;
    @endphp
  
    @if (in_array($profileId, $upprovePhoto))
        @if(!empty($profile->file_path))
            <div class="profile-container d-inline-block position-relative">
                <img src="{{ asset($profile->file_path) }}" class="rounded-circle" width="150" height="150" alt="Profile Image">
            </div>
        @else
            <div class="profile-container d-inline-block position-relative">
                <img src="{{ asset('/images/user_image.png') }}" class="rounded-circle" width="150" height="150" alt="Default Image">
            </div>
        @endif
    @else
        <div class="profile-container d-inline-block position-relative">
            <img src="{{ asset('/images/user_image.png') }}" class="rounded-circle" width="150" height="150" alt="Default Image">
            <a href="#" data-bs-toggle="modal" data-bs-target="#iconModal{{ $i }}" class="lock-icon position-absolute bottom-0 end-0 bg-white rounded-circle p-2">
                <i class="bi bi-person-fill-lock fs-4 text-dark"></i>
            </a>
        </div>
    @endif

    <h5 class="card-title mt-2" style="font-weight: bold;">{{ $profile->name ?? 'Unknown' }}</h5>
</div>



<div class="modal fade" id="iconModal{{ $i }}" tabindex="-1" aria-labelledby="iconModalLabel{{ $i }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-white justify-content-center" style="border-bottom: none;">
    <h5 class="modal-title d-flex align-items-center" id="iconModalLabel{{ $i }}">
        <i class="bi bi-shield-lock-fill me-2"></i> Request to View Profile
    </h5>
    <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

            <div class="modal-body text-center">
                <img src="{{ asset('/images/secure_profile.png') }}" alt="Secure Profile" class="img-fluid rounded-circle mb-3" width="100">
                <p class="fs-5">This profile is private. You need to request permission to view it.</p>
            </div>
            <input type="hidden" name="profile_ids" id="profile_ids{{ $i }}" value="{{ $profile->id }}">
            <input type="hidden" name="names" id="names{{ $i }}" value="{{ $profile->name }}">
            <input type="hidden" name="user_ids" id="user_ids{{ $i }}" value="{{ $profile->user_id }}">

            <div class="modal-footer justify-content-center" style="border-top: none;">
            @php
        $profileId = $profile->id;
    @endphp
  
                                                        @if (in_array($profileId, $logConditionsRequest))
                                                        <span id="requestedsend{{ $i }}"
                                                            class="text-success px-4">Request Sent successfully!</span>
                                                        @else
                                                        <button type="button" class="btn btn-success px-4"
                                                            id="profile_view{{ $i }}"
                                                            onclick="profilerequest({{ $i }})">
                                                            <i class="bi bi-send"></i> Send Request
                                                        </button>

                                                        <span id="sends{{ $i }}" class="text-success px-4"
                                                            style="display: none;">Request Sent successfully!</span>

                                                        @endif
    

            </div>

        </div>
    </div>
</div>


                                    <div class="col-md-7">
                                        <div class="card-body">
                                          
                                            <p class="card-text">Age: 
                                    @php
                                        try {
                                            $dob = new DateTime($profile->dob);
                                            $today = new DateTime();
                                            $age = $today->diff($dob)->y;
                                            echo $age;
                                        } catch (Exception $e) {
                                            echo 'N/A';
                                        }
                                    @endphp
                                </p>
                                            <p class="card-text">Location: {{ $profile->cityName ?? 'N/A' }}</p>
                                            <p class="card-text">Profession: {{ $profile->destination ?? 'N/A' }}</p>
                                            <p class="card-text">Company: {{ $profile->company_name ?? 'N/A' }}</p>
                                            <div @if(in_array($profile->id, $profiles) || in_array($profile->id, $unlike_profile)) style="display:none" @else style="display:block" @endif>
                      <div class="row gy-4 pt-3" id="add_interest{{$i}}">
                          <div class="col-md-3 text-md-end text-start">
                          <label >Interest</label>
                        </div>
                        
                        <div class="col-md-6">
                          <button class="btn btn-danger" onclick="add_interest_status(1,{{$i}});">
                          <i class="fas fa-comments"></i>Yes
                          </button>
                          <button class="btn btn-danger" onclick="add_interest_status(2,{{$i}});">
                          <i class="fas fa-comments "></i>No
                          </button>
                        </div>
                      </div>
</div>
                      <div class="row" id="interest{{$i}}" @if(in_array($profile->id, $profiles)) style="display:block" @else style="display:none" @endif>
                        <div class="col-md-6">
                          <button class="btn btn btn-success">
                          <i class="fas fa-comments"></i>Interested
                          </button>
                        </div>
                      </div>
                      <div class="row" id="not_interest{{$i}}" @if(in_array($profile->id, $unlike_profile)) style="display:block" @else style="display:none" @endif>
                        <div class="col-md-9">
                          <button class="btn btn btn-danger">
                          <i class="fas fa-comments"></i>Not Interested
                          </button>
                        </div>
                      </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                          $i++;
                          @endphp
                    @endforeach
                    
                </div>

                <div class="mt-3">
        {{ $paginate->links('pagination::bootstrap-5') }}
    </div>
               
            </div>
        </div>

<!-- Meet Matches -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9">
        <h5>Meet Your Perfect Matches</h5>
        <div class="d-flex justify-content-between align-items-center"></div>
        <div id="match_div">

            @php
            $i=1;
            @endphp
            @foreach($details as $user)
                <input type="hidden" name="profile_id" id="profile_id" value="{{ $user->id }}">
                <input type="hidden" name="name" id="name" value="{{ $user->name }}">
                <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">

                {{csrf_field()}}
                <div id="" class="row">
                    <div class="col-md-12 mb-4 profile-card match-card" data-gender="bride">
                        <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                            <div class="card">
                                <div class="row justify-content-center">

                                    <div class="col-md-8 justify-content-center pt-3 ms-2 position-relative">
                                        @php
                                            $profileId = $user->id;
                                        @endphp

                                        @if (in_array($profileId, $upprovePhotomatch))

                                            @if(!empty($user->file_path))
                                                <img src="{{ asset($user->file_path) }}" style="vertical-align:middle;" class="rounded-circle" width="100px" height="100px">
                                            @else
                                                <img src="{{ asset('/images/user_image.png') }}" style="vertical-align:middle;" class="rounded-circle" width="100px">
                                            @endif

                                        @else
                                            <img src="{{ asset('/images/user_image.png') }}" style="vertical-align:middle;" class="rounded-circle" width="100px">

                                            <div class="position-absolute bottom-0 end-0 bg-white rounded-circle p-2">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#iconModal{{ $i }}">
                                                    <i class="bi bi-person-fill-lock fs-4 text-dark"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <div class="modal fade" id="iconModal{{ $i }}" tabindex="-1" aria-labelledby="iconModalLabel{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-white justify-content-center" style="border-bottom: none;">
                                                <h5 class="modal-title d-flex align-items-center" id="iconModalLabel{{ $i }}">
                                                    <i class="bi bi-shield-lock-fill me-2"></i> Request to View Profile
                                                </h5>
                                                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body text-center">
                                                <img src="{{ asset('/images/secure_profile.png') }}" alt="Secure Profile" class="img-fluid rounded-circle mb-3" width="100">
                                                <p class="fs-5">This profile is private. You need to request permission to view it.</p>
                                            </div>
                                            <input type="hidden" name="profile_ids" id="profile_ids{{ $i }}" value="{{ $user->id }}">
                                            <input type="hidden" name="names" id="names{{ $i }}" value="{{ $user->name }}">
                                            <input type="hidden" name="user_ids" id="user_ids{{ $i }}" value="{{ $user->user_id }}">

                                            <div class="modal-footer justify-content-center" style="border-top: none;">
                                                @if (in_array($profileId, $logConditionsRequestmatch))
                                                    <span id="requestedsend{{ $i }}" class="text-success px-4">Request Sent successfully!</span>
                                                @else
                                                    <button type="button" class="btn btn-success px-4" id="profile_view{{ $i }}" onclick="profilerequest({{ $i }})">
                                                        <i class="bi bi-send"></i> Send Request
                                                    </button>
                                                    <span id="sends{{ $i }}" class="text-success px-4" style="display: none;">Request Sent successfully!</span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                <div class="col-md-12 text-center" style="padding-left:20px;"
     onclick="view_person(event, this)" 
     data-profile-id="{{ $user->id }}" 
     data-name="{{ $user->name }}" 
     data-user-id="{{ $user->user_id }}">
                                    
                                        <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($user->id)]) }}"  target="_blank">{{ $user->id }}  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                        <input type="hidden" name="members_id" value="{{ $user->id }}" id="members_id{{ $i }}">
                                        <h6 class="card-title text-center">{{ $user->name }}</h6>
                                    </div>
                                </div>

                                <div class="container mt-2">
                                    <div class="row mb-1">
                                        <div class="col-md-5 text-start">
                                            <p class="fw-bold mb-1">Age</p>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <p class="fw-bold mb-1">:</p>
                                        </div>
                                        <div class="col-md-5 text-start">
                                            <p class="mb-0">
                                                @php
                                                    $dob = $user->dob;
                                                    $age = \Carbon\Carbon::parse($dob)->age;
                                                @endphp
                                                {{ $age }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-md-5 text-start">
                                            <p class="fw-bold mb-1">Star</p>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <p class="fw-bold mb-1">:</p>
                                        </div>
                                        <div class="col-md-5 text-start">
                                            <p class="mb-0" style="word-wrap: break-word; white-space: normal;">{{ $user->star_name }}</p>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-5 text-start">
                                            <p class="fw-bold mb-1">Location</p>
                                        </div>
                                        <div class="col-1">
                                            <p class="fw-bold mb-1">:</p>
                                        </div>
                                        <div class="col-md-5 text-start">
                                            <p class="mb-0" style="word-wrap: break-word; white-space: normal;">{{ $user->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                $i++;
                @endphp
            @endforeach
        </div>
    </div>
</div>

<style>
    #match_div {
        max-height: 500px;
        overflow-x: auto;
        overflow-y: hidden;
        display: flex;
        flex-wrap: nowrap;
        gap: 15px;
        padding: 10px;
        white-space: nowrap;
    }
    .match-card {
        flex: 0 0 auto;
        width: 220px; /* Adjust the width of each card */
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
</style>



    </div>
</main>

<script>
function add_interest_status(x, y) {
    var members_id = $('#members_id' + y).val();
    console.log('members_id:', members_id);
 //exit();
 console.log("AJAX URL:", "{{ route('add_interest_status') }}");
    $.ajax({
        url: "{{ route('add_interest_status') }}",
        method: "POST",
        data: {
            members_id: members_id,
            x: x,
            _token: "{{ csrf_token() }}"
        },
        //async: true,
        success: function(data) {
            if (data == 1) {
                $('#add_interest' + y).hide();
                $('#interest' + y).show();
            }
            if (data == 2) {
                $('#add_interest' + y).hide();
                $('#not_interest' + y).show();
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", status, error);
        }
    });
}


function profilerequest(index) {
    let profileId = document.getElementById(`profile_ids${index}`).value;
    let userId = document.getElementById(`user_ids${index}`).value;
    let name = document.getElementById(`names${index}`).value;

    console.log('profileId:', profileId);
    console.log('userId:', userId);
    console.log('name:', name);

    $.ajax({
        url: "{{ route('app.v2.request_profileView') }}", 
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}", 
            profile_ids: profileId,  
            user_ids: userId,
            names: name
        },
        success: function(results) {
            if (results.success) {
                document.getElementById(`profile_view${index}`).style.display = 'none';
                document.getElementById(`sends${index}`).style.display = 'block';
            } else {
                alert(results.success || "An error occurred. Please try again.");
            }
        },
        error: function (xhr) {
            console.error(xhr);
            alert("An error occurred. Please check the console for details.");
        }
    });
}


</script>


<script>
   VirtualSelect.init({ 
  ele: '#multiselect1' 
});


  VirtualSelect.init({ 
  ele: '#multiselect2' 
});


  VirtualSelect.init({ 
  ele: '#multiselect3' 
});


document.addEventListener('DOMContentLoaded', function() {
  
  var rassi = document.querySelectorAll("#multiselect1");
  
  var rasiMap = {};
  if (rassi.length > 0 && rassi[0].hasAttribute('data-rassi-map')) { 
    var rasiMapString = rassi[0].getAttribute('data-rassi-map');
    rasiMap = JSON.parse(rasiMapString); 
  }

 
  function updateRaasiOptions() {
    
    var selectElement = document.querySelector('#multiselect1');
    var selectedValues = [];

    
    var options = selectElement.querySelectorAll('.vscomp-option');
    options.forEach(function(option) {
      if (option.getAttribute('aria-selected') === 'true') {
        selectedValues.push(option.getAttribute('data-value'));
      }
    });

    console.log("Selected values: ", selectedValues);
    
    var rassi1 = document.getElementById('raasi');
    rassi1.innerHTML = ''; 

    
    var placeholderOption = document.createElement('option');
    placeholderOption.value = '';
    placeholderOption.text = 'Selected Rassi';
    rassi1.appendChild(placeholderOption); 

    
    selectedValues.forEach(function(value) {
      var label = rasiMap[value] || value; 
      var option = document.createElement('option');
      option.value = value;
      option.text = label;
      rassi1.appendChild(option);
    });
  }
  
  var selectElement = document.querySelector('#multiselect1');
  selectElement.addEventListener('change', updateRaasiOptions);

  updateRaasiOptions();
});

  document.addEventListener('DOMContentLoaded', function() {
 
  var star = document.querySelectorAll("#multiselect2");
  
  var starMap = {};
  if (star.length > 0 && star[0].hasAttribute('data-star-map')) { 
    var starMapString = star[0].getAttribute('data-star-map');
    starMap = JSON.parse(starMapString); 
  }
 
  function updateStarOptions() {
    
    var selectElement = document.querySelector('#multiselect2');
    var selectedValues = [];

    
    var options = selectElement.querySelectorAll('.vscomp-option');
    options.forEach(function(option) {
      if (option.getAttribute('aria-selected') === 'true') {
        selectedValues.push(option.getAttribute('data-value'));
      }
    });

    console.log("Selected values: ", selectedValues);

   
    var star1 = document.getElementById('star');
    star1.innerHTML = ''; 

    
    var placeholderOption = document.createElement('option');
    placeholderOption.value = '';
    placeholderOption.text = 'Selected Star';
    star1.appendChild(placeholderOption);

   
    selectedValues.forEach(function(value) {
      var label = starMap[value] || value; 
      var option = document.createElement('option');
      option.value = value;
      option.text = label;
      star1.appendChild(option);
    });
  }

 
  var selectElement = document.querySelector('#multiselect2');
  selectElement.addEventListener('change', updateStarOptions);

  
  updateStarOptions();
});

  document.addEventListener('DOMContentLoaded', function() {
  
  var education = document.querySelectorAll("#multiselect3");

  
  var educationMap = {};
  if (education.length > 0 && education[0].hasAttribute('data-education-map')) { 
    var educationMapString = education[0].getAttribute('data-education-map');
    educationMap = JSON.parse(educationMapString); 
  }
 
  function updateEducationOptions() {
   
    var selectElement = document.querySelector('#multiselect3');
    var selectedValues = [];
    
    var options = selectElement.querySelectorAll('.vscomp-option');
    options.forEach(function(option) {
      if (option.getAttribute('aria-selected') === 'true') {
        selectedValues.push(option.getAttribute('data-value'));
      }
    });

    console.log("Selected values: ", selectedValues);
    
    var education1 = document.getElementById('education');
    education1.innerHTML = ''; 
    
    var placeholderOption = document.createElement('option');
    placeholderOption.value = '';
    placeholderOption.text = 'Selected Education';
    education1.appendChild(placeholderOption);

    
    selectedValues.forEach(function(value) {
      var label = educationMap[value] || value; 
      var option = document.createElement('option');
      option.value = value;
      option.text = label;
      education1.appendChild(option);
    });
  }
  
  var selectElement = document.querySelector('#multiselect3');
  selectElement.addEventListener('change', updateEducationOptions);

  
  updateEducationOptions();
});
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.sidebar .nav-link').forEach(function (element) {

            element.addEventListener('click', function (e) {

                let nextEl = element.nextElementSibling;
                let parentEl = element.parentElement;

                if (nextEl) {
                    e.preventDefault();
                    let mycollapse = new bootstrap.Collapse(nextEl);

                    if (nextEl.classList.contains('show')) {
                        mycollapse.hide();
                    } else {
                        mycollapse.show();
                        var opened_submenu = parentEl.parentElement.querySelector(
                            '.submenu.show');
                        if (opened_submenu) {
                            new bootstrap.Collapse(opened_submenu);
                        }
                    }
                }
            });
        })
    });
</script>

<script>
function view_person(event, element) {
    event.preventDefault();

    // Retrieve data from the clicked element
    var profile_id = $(element).data('profile-id');
    var name = $(element).data('name');
    var user_id = $(element).data('user-id');

    $.ajax({
        url: "{{ route('app.v2.request_profile') }}",
        type: "POST",
        data: {
            profile_id: profile_id,
            name: name,
            user_id: user_id,
            _token: "{{ csrf_token() }}"
        },
        success: function (results) {
            if (results.success) {
                window.open($(element).find('a').attr('href'), '_blank');
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

</script>
@endsection