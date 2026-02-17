@extends('layout2.user-form')

@section('title')
Favorites
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">

        <a href="#" onclick="history.back()" >
        <i class="bi bi-arrow-left  " style="font-size: 1.5rem;color:black;margin-right:10px;"></i>
    </a>  
            <a href="{{  route('app.v2.requestpage') }}"><button class="btn btn-danger">
                    <i class="fas fa-comments"></i>Mobile Number Request
                </button></a>
                <a href="{{  route('app.v2.request_photo') }}"><button class="btn btn-danger">
                    <i class="fas fa-comments"></i>Photo Request
                </button></a>
                    
                            <div class="d-flex justify-content-between align-items-center pt-3">
                            </div>
                            <div id="profileContainer" class="row">
                                <div class="col-md-12   profile-card" data-gender="bride">

                                    <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                                        <div class="card">
                                            <button class="btn btn-danger" style="font-size:20px;">
                                                <i class="fas fa-comments"></i>Favorited My Profile
                                            </button>
                                            <?php $i = 1; ?>

                                            @foreach($details as $user)

 <input type="hidden" name="profile_id" id="profile_id" value="{{ $user->id }}">
<input type="hidden" name="name" id="name" value="{{ $user->name }}">
<input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">

                                            <div class="row">
                                                <div class="col-md-5 " style="padding-left:20px;"
                                                onclick="view_person(event, this)"> <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($user->id)]) }}" target="_blank">{{ $user->profile_id ?? 'Profile ID not available' }} || <span>Profile
                                                        created for {{$user->created_by_relation}}</span> </a> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                <div class="col-md-5 pad_space ">
                                                </div>

                                                <div class="col-md-4 pt-3 ms-2 position-relative text-center">
    @php
        $profileId = $user->id;
    @endphp
  
    @if (in_array($profileId, $upprovePhoto))
        @if(!empty($user->file_path))
            <div class="profile-container d-inline-block position-relative">
                <img src="{{ asset($user->file_path) }}" class="rounded-circle" width="150" height="150" alt="Profile Image">
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

    <h5 class="card-title mt-2" style="font-weight: bold;">{{ $user->name ?? 'Unknown' }}</h5>
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
            @php
        $profileId = $user->id;
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



                                                <!-- <div class="col-md-5 pt-3 ms-2">
                                                    <img src="{{ asset('/images/user_image.png') }}"
                                                        style="vertical-align:middle;" width=220>
                                                </div> -->
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <h5 class="card-title">{{ $user->name }}</h5>
                                                            <div class="col-md-4">
                                                            @php
                          $dob = $user->dob; 
                          $age = \Carbon\Carbon::parse($dob)->age; 
                          @endphp
                                                                <label class="card-text">Age</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>{{ $age }}</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="card-text">Height</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>{{ $user->height_name }}</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="card-text">Location</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>{{$user->address}}</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="card-text">Profession</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>{{$user->occuption}}</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="card-text">Company</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>{{$user->company_name}}</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row gy-4">
                                                            
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php $i++; ?>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                            @endsection