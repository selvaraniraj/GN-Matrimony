@extends('layout2.user-form')

@section('title')
Request
@endsection

@section('content')
<div class="container mt-4">
      <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9">

            <a href="#" onclick="history.back()" >
        <i class="bi bi-arrow-left  " style="font-size: 1.5rem;color:black"></i>
    </a>  
                 
                  <a href="{{ route('app.v2.favoritespage') }}"> <button class="btn btn-danger ms-4"> <i
                                    class="fas fa-comments"></i>Interested</button></a>

                                    <a href="{{ route('app.v2.requestpage') }}"><button class="btn btn-danger">
                    <i class="fas fa-comments"></i>Mobile Number Request
                </button></a>

                              <div class="d-flex justify-content-between align-items-center pt-3"></div>
                              <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                              <div class="card">
                              <button class="btn btn-danger" style="font-size:20px;"><i
                                                                  class="fas fa-comments"></i>Request for Photo View</button>
                                                            </div>
                              </div>
                                                            @if ($memberLogs->isNotEmpty())
                                                            <?php $i = 1; ?>
                                                            @foreach ($userDetails  as $index => $log)
                                                            <input type="hidden" name="profile_id" id="view_id" value="{{ $log->id }}">
<input type="hidden" name="name" id="name" value="{{ $log->name }}">
<input type="hidden" name="user_id" id="user_id" value="{{ $log->user_id }}">


                                                            <input type="hidden" name="mid" id="memberId{{ $index }}" value="{{ $log->id }}">
<input type="hidden" name="id" id="profile_id{{ $index }}" value="{{ $member->id }}">


                                                        

                              <div id="profileContainer" class="row">
                                    <div class="col-md-12   profile-card" data-gender="bride">
                                          <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                                                <div class="card">
                                                   
                                                      <div class="row">
                                                            <div class="col-md-8" style="padding-left:20px;"
                                                            onclick="view_person(event, this)"> 
                                                            <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode( $log->id)]) }}" target="_blank">{{ $log->profile_id ?? 'Profile ID not available' }} || <span>Profile
                                                        created for {{$log->created_by_relation ?? ''}}</span> </a>          
                                                      &nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                            <div class="col-md-3 pad_space ">
                                                            </div>
                                                            <div class="col-md-4 pt-3 ms-2 position-relative text-center">
    @php
        $profileId = $log->id;
    @endphp
  
    @if (in_array($profileId, $upprovePhoto))
        @if(!empty($log->file_path))
            <div class="profile-container d-inline-block position-relative">
                <img src="{{ asset($log->file_path) }}" class="rounded-circle" width="150" height="150" alt="Profile Image">
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

    <h5 class="card-title mt-2" style="font-weight: bold;">{{ $log->name ?? 'Unknown' }}</h5>
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
            <input type="hidden" name="profile_ids" id="profile_ids{{ $i }}" value="{{ $log->id }}">
            <input type="hidden" name="names" id="names{{ $i }}" value="{{ $log->name }}">
            <input type="hidden" name="user_ids" id="user_ids{{ $i }}" value="{{ $log->user_id }}">

            <div class="modal-footer justify-content-center" style="border-top: none;">
            @php
        $profileId = $log->id;
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
                                                                        <div class="row">
                                                                       
                                                                              <div class="col-md-4">
                                                                                    <label class="card-text">Age &
                                                                                          Height</label>
                                                                              </div>
                                                                              <div class="col-md-8 px-4">
                                                                              @php
            $dob = $log->dob; 
            $age = \Carbon\Carbon::parse($dob)->age; 
        @endphp
        <span>{{ $age }} & {{ $log->additionalDetails->height->name ?? 'Not Mentioned' }}</span>
                                                                              </div>
                                                                              <div
                                                                                    style="padding-top:5px;padding-bottom:5px;">
                                                                              </div>
                                                                        </div>
                                                                        <div class="row">
                                                                              <div class="col-md-4">
                                                                                    <label
                                                                                          class="card-text">Religion</label>
                                                                              </div>
                                                                              <div class="col-md-8 px-4">
                                                                              <span>{{ $log->religion ?? 'Not Mentioned' }}</span>
                                                                              </div>
                                                                              <div
                                                                                    style="padding-top:5px;padding-bottom:5px;">
                                                                              </div>
                                                                        </div>
                                                                        <div class="row">
                                                                              <div class="col-md-4">
                                                                                    <label
                                                                                          class="card-text">Education</label>
                                                                              </div>
                                                                              <div class="col-md-8 px-4">
                                                                              <span>{{ $log->educationDetails->education->name ?? 'Not Mentioned'}}</span>
                                                                              </div>
                                                                              <div
                                                                                    style="padding-top:5px;padding-bottom:5px;">
                                                                              </div>
                                                                        </div>
                                                                        <div class="row">
                                                                              <div class="col-md-4">
                                                                                    <label
                                                                                          class="card-text">Occupation</label>
                                                                              </div>
                                                                              <div class="col-md-8 px-4">
                                                                              <span>{{ $log->educationDetails->occuption ?? 'Not Mentioned' }}</span>
                                                                              </div>
                                                                              <div
                                                                                    style="padding-top:5px;padding-bottom:5px;">
                                                                              </div>
                                                                        </div>
                                                                        <div class="row">
                                                                              <div class="col-md-4">
                                                                                    <label class="card-text">About
                                                                                          me</label>
                                                                              </div>
                                                                              <div class="col-md-8 px-4">
                                                                              <span>{{ $log->additionalDetails->about_you ?? 'Not Mentioned' }}</span>
                                                                              </div>
                                                                              <div
                                                                                    style="padding-top:5px;padding-bottom:5px;">
                                                                              </div>
                                                                        </div>
                                                                        <div class="row">
                                                                        <div class="col-md-12">
    @if($logConditions[$index] ?? false)
        <label class="mobile" style="color:green;" id="{{ $index }}flag1">Access the Photo</label>
    @else
        <div class="row">
            <div class="col-md-12" id="{{ $index }}flag" style="display:none;">
                <label style="color:green;">Access the Photo</label>
            </div>
            <div class="col-md-4 pad_space" style="padding-bottom: 15px;" id="{{ $index }}id2">
                <button type="button" class="btn btn-success" onclick="upprove({{ $index }})">Accept</button>
            </div>
        </div>
    @endif
</div>

</div>


                                                                  </div>
                                                                  
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <?php $i++; ?>
                              @endforeach
    @else
    <div class="wrapper-max" style="border:3px solid #e5e5e5; display: flex; justify-content: center; align-items: center;">
    <div class="text-center">
        <img src="{{ asset('/images/no-data.png') }}" style="height:250px;width:290px;">
    </div>
</div>
  
      
    @endif
            </div>
      </div>
</div>
</div>
</div>
</div>

<script>
function upprove(index) {
    let profileId = $("#profile_id" + index).val();
    let memberId = $("#memberId" + index).val();

    $.ajax({
        url: "{{ route('app.v2.upprove_photo') }}",
        method: "POST",
        data: {
            id: profileId,
            mid: memberId,
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            if (response.success) {

 if (response.logConditions) { 
      //  $("#flag1" + index).text('Send Mobile Number').css("color", "green");
    document.getElementById(index + "flag").style.display = "block"; 
    $("#" + index + "id2").hide();
        }
                 
            } else {
                alert(response.message); 
            }
        },
        error: function(xhr) {
            console.error("Error:", xhr.responseText); // Log error in case of failure
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
function view_person(event, element) {
    event.preventDefault(); 

    var profile_id = document.getElementById("view_id").value;
    var name = document.getElementById("name").value;
    var user_id = document.getElementById("user_id").value;

    $.ajax({
        url: "{{ route('app.v2.request_profile') }}",
        type: "POST",
        data: {
            profile_id: profile_id,
            name: name,
            user_id: user_id,
            _token: "{{ csrf_token() }}"
        },
        success: function(results) {
            if (results.success) {
                window.open($(element).find('a').attr('href'), '_blank');
            } else {
                alert(results.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            alert('An error occurred: ' + xhr.responseText);
        }
    });
}

</script> 


@endsection