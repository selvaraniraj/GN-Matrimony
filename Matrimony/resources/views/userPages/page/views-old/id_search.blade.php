@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
<main class="main">
    <div class="container mt-4">
        <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-9">
            <h5><button class="btn" onclick="history.back()">
            <i class="fas fa-arrow-left"></i>
         </button>PROFILES YET TO BE VIEWED </h5>
                <div class="d-flex justify-content-between align-items-center">
                </div>

                @if($memberData)

                <input type="hidden" name="profile_id" id="profile_id" value="{{ $memberData->id }}">
<input type="hidden" name="name" id="name" value="{{ $memberData->name }}">
<input type="hidden" name="user_id" id="user_id" value="{{ $memberData->user_id }}">

                <input type="hidden" name="members_id" value="{{ $memberData->id }}" id="members_id1">

                <div id="profileContainer" class="row">
                    <div class="col-md-12 mb-4 profile-card" data-gender="bride">
                        <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                            <div class="card">
                                <div class="row">
                                
                                <div class="col-md-4 pt-3 ms-2" onclick="view_person(event, this)">
                                <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($memberData->id)]) }}" target="_blank">{{ $memberData->profile_id ?? 'Profile ID not available' }} ||
                                  <span>Profile created for {{ $memberData->created_by_relation ?? 'Not Mentioned' }}</span></a> </div>
                                  <div class="col-md-5 pad_space ">
                                                            </div>

                                                            <div class="col-md-4 pt-3 ms-2 position-relative">

@php
    $profileId = $memberData->id;
@endphp

@if ($profileId && $upprovePhoto)
    @if ($memberData->photos->isNotEmpty())
        <img src="{{ asset($memberData->photos->first()->uploadFile->file_path ?? '/images/user_image.png') }}" 
             alt="User Photo" style="vertical-align:middle;" width="220" height="220">
    @else
        <img src="{{ asset('/images/user_image.png') }}" 
             alt="Default User Photo" style="vertical-align:middle;" width="220">
    @endif
@else
    <img src="{{ asset('/images/user_image.png') }}" style="vertical-align:middle;" width="220">
    <div class="position-absolute bottom-0 end-0 bg-white rounded-circle p-2">
        <a href="#" data-bs-toggle="modal" data-bs-target="#iconModal">
            <i class="bi bi-person-fill-lock fs-4 text-dark"></i>
        </a>
    </div>
@endif

</div>

<div class="modal fade" id="iconModal" tabindex="-1" aria-labelledby="iconModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-white justify-content-center" style="border-bottom: none;">
                <h5 class="modal-title d-flex align-items-center" id="iconModalLabel">
                    <i class="bi bi-shield-lock-fill me-2"></i> Request to View Profile
                </h5>
                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <img src="{{ asset('/images/secure_profile.png') }}" 
                     alt="Secure Profile" class="img-fluid rounded-circle mb-3" width="100">
                <p class="fs-5">This profile is private. You need to request permission to view it.</p>
            </div>

            <div class="modal-footer justify-content-center" style="border-top: none;">
                @if ($logConditionsRequest)
                    <span id="requestedsend" class="text-success px-4">Request Sent successfully!</span>
                @else
                    <button type="button" class="btn btn-success px-4" id="profile_view" onclick="profilerequest()">
                        <i class="bi bi-send"></i> Send Request
                    </button>
                    <span id="sends" class="text-success px-4" style="display: none;">Request Sent successfully!</span>
                @endif
            </div>
        </div>
    </div>
</div>


                              
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $memberData->name }}</h5>
                                            <p class="card-text">Age: 
                                    @php
                                        try {
                                            $dob = new DateTime($memberData->dob);
                                            $today = new DateTime();
                                            $age = $today->diff($dob)->y;
                                            echo $age;
                                        } catch (Exception $e) {
                                            echo 'Not Mentioned';
                                        }
                                    @endphp
                                </p>
                                            <p class="card-text">Location: {{ $cityName ?? 'Not Mentioned' }}</p>
                                            <p class="card-text">Profession: {{ $memberData->destination ?? 'Not Mentioned' }}</p>
                                            <p class="card-text">Company: {{ $memberData->company_name ?? 'Not Mentioned' }}</p>
                                            <div class="row gy-4 pt-3" id="add_interest"
                                                @if(in_array($memberData->id, $profiles) || in_array($memberData->id, $unlike_profile)) 
                                                    style="display:none" 
                                                @else 
                                                    style="display:block" 
                                                @endif>
                                                <div class="col-md-3 text-md-end text-start">
                                                    <label>Interest</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-danger" onclick="add_interest_status(1,1);">
                                                        <i class="fas fa-comments"></i>Yes
                                                    </button>
                                                    <button class="btn btn-danger" onclick="add_interest_status(2,1);">
                                                        <i class="fas fa-comments"></i>No
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Interested Section -->
                                            <div class="row" id="interest1"
                                                @if(in_array($memberData->id, $profiles)) 
                                                    style="display:block" 
                                                @else 
                                                    style="display:none" 
                                                @endif>
                                                <div class="col-md-6">
                                                    <button class="btn btn-success">
                                                        <i class="fas fa-comments"></i>Interested
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Not Interested Section -->
                                            <div class="row" id="not_interest1"
                                                @if(in_array($memberData->id, $unlike_profile)) 
                                                    style="display:block" 
                                                @else 
                                                    style="display:none" 
                                                @endif>
                                                <div class="col-md-9">
                                                    <button class="btn btn-danger">
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
                </div>

                @else
                <div class="wrapper-max" style="border:3px solid #e5e5e5; display: flex; justify-content: center; align-items: center;">
    <div class="text-center">
        <img src="{{ asset('/images/no-data.png') }}" style="height:250px;width:290px;">
    </div>
</div>
                @endif
            </div>
        </div>

<!-- Meet Matches -->
<div class="row">
    <div class="col-md-2"></div>
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
                                    <div class="col-md-12 text-center" style="padding-left:20px;" onclick="view_person(event, this)">
                                        <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($user->id)]) }}"  target="_blank">{{ $user->profile_id }}  &nbsp;&nbsp;&nbsp;&nbsp;</a>
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
                                            <p class="mb-0">{{ $user->star_name }}</p>
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
                                            <p class="mb-0">{{ $user->address }}</p>
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
                $('#add_interest').hide();
                $('#interest1').show();
            }
            if (data == 2) {
                $('#add_interest').hide();
                $('#not_interest1').show();
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", status, error);
        }
    });
}


</script>

<script>
function view_person(event, element) {
    event.preventDefault(); 

    var profile_id = document.getElementById("profile_id").value;
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


function profilerequest() {
    let profileId = document.getElementById(`profile_id`).value;
    let userId = document.getElementById(`user_id`).value;
    let name = document.getElementById(`name`).value;

    $.ajax({
        url: "{{ route('app.v2.request_profileView') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            profile_id: profileId,
            user_id: userId,
            name: name
        },
        success: function (results) {
            if (results.success) {
                document.getElementById(`profile_view`).style.display = 'none';
                document.getElementById(`sends`).style.display = 'block';
            } else {
                alert(results.error || "An error occurred. Please try again.");
            }
        },
        error: function (xhr) {
            console.error(xhr);
            alert("An error occurred. Please check the console for details.");
        }
    });
}

</script>

@endsection