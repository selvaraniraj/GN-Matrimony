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
            <i class="bi bi-arrow-left " style="font-size: 1.5rem;color:black;"></i>
         </button> </h5>

         <div class="heart-divider">
                            <span class="grey-line"></span>
                            <span class="matches-header">Perfect Matches</span> 
                            <i class="bi bi-heart-fill pink-heart"></i>
                            <i class="bi bi-heart grey-heart"></i>
                            <span class="grey-line"></span>
                        </div>

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

                    <div class="col-md-12 mb-4 profile-card">
                        <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                            <div class="card">
                                <div class="row">
                                    
                                <div class="col-md-7 pt-3 ms-2" onclick="view_person(event, this)">
                                <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($profile->id)]) }}" target="_blank">{{ $profile->profile_id }} ||
                                  <span>Profile created for {{ $profile->created_by_relation ?? 'Not Mentioned' }}</span></a> 
                              </div>


                              <div class="col-md-4 pad_space ">
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
                                            echo 'Not Mentioned';
                                        }
                                    @endphp
                                </p>
                                            <p class="card-text">Location: {{ $profile->cityName ?? 'Not Mentioned' }}</p>
                                            <p class="card-text">Profession: {{ $profile->destination ?? 'Not Mentioned' }}</p>
                                            <p class="card-text">Company: {{ $profile->company_name ?? 'Not Mentioned' }}</p>
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
                {{ $memberData->links(('pagination::bootstrap-5')) }}
                </div>

            </div>
        </div>


        <style>
            .matches-header {
                text-align: center;
                font-family: 'Oswald', sans-serif;
                font-size: 1.6em;
                color: #000;
                margin-bottom: 0;
                font-weight: 500;
                font-family: -apple-system,
                    BlinkMacSystemFont, "Segoe UI",
                    Roboto, Oxygen-Sans,
                    Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            }

            .grey-line {
                width: 30px;
                height: 8px;
                display: inline-block;
                border-top: solid 2px #e1dddd;
            }

            .heart-divider {
                /* height: 100%; */
                width: 100%;
                margin: 1em auto;
                text-align: center;
            }

            .pink-heart {
                color: #c32143;
                font-size: 18px;
                position: relative;
                z-index: 3;
            }

            .grey-heart {
                color: #e1dddd;
                font-size: 18px;
                margin-left: -15px;
                position: relative;
                z-index: 2;
            }
            
        </style>

<!-- Meet Matches -->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-9">
        <!-- <h5>Meet Your Perfect Matches</h5> -->
        <div class="heart-divider">
                            <span class="grey-line"></span>
                            <span class="matches-header">Featured Profiles</span>
                            <i class="bi bi-heart-fill pink-heart"></i>
                            <i class="bi bi-heart grey-heart"></i>
                            <span class="grey-line"></span>
                        </div>

        <!-- Carousel Wrapper -->
    <div class="d-flex align-items-center">
        <!-- Previous Arrow -->
        <button id="prevArrow" class="btn me-2" style="font-size:2rem;">
    <i class="bi bi-chevron-left"></i>
</button>

        <!-- Scrollable Profiles Container -->
        <div id="profileCarousel" class="d-flex overflow-hidden" style="width: 100%; scroll-behavior: smooth;">
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
                            <div class="card">hgfhgfhgfh
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

                                <!-- <div class="container mt-2">
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
                                </div> -->

                                <div class="d-flex flex-column mb-3">
    <div class="d-flex justify-content-center mb-2">
        <span class='ms-2' style="color: black;">
        <p class="mb-0">
                                                @php
                                                    $dob = $user->dob;
                                                    $age = \Carbon\Carbon::parse($dob)->age;
                                                @endphp
                                                {{ $age }}
                                            </p>
        </span>
    </div>
    <div class="d-flex justify-content-center mb-2">
        <span class='ms-2' style="color: black;">{{ $user->star_name }}</span>
    </div>
    <div class="d-flex justify-content-center mb-2">
        <span class='ms-2' style="color: black;">{{ $user->address }}</span>
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

        <button id="nextArrow" class="btn ms-2" style="font-size: 2rem;">
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const carousel = document.getElementById("profileCarousel");
        const prevArrow = document.getElementById("prevArrow");
        const nextArrow = document.getElementById("nextArrow");

        prevArrow.addEventListener("click", function () {
            carousel.scrollBy({
                left: -220, // Adjust based on card width
                behavior: "smooth"
            });
        });

        nextArrow.addEventListener("click", function () {
            carousel.scrollBy({
                left: 220,
                behavior: "smooth"
            });
        });
    });
</script>

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