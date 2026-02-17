@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
<main class="main">
    <div class="container mt-4">
        <div class="row">
        <div class="col-md-3">
            <h5 style="color: #8C0000; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
   <button class="btn" onclick="history.back()">
            <i class="bi bi-arrow-left " style="font-size: 1.5rem;color:black;"></i>
         </button>Keyword Search</h5>
         <nav class="sidebar card py-2 mb-4">
    {!! Form::open([
        'url' => route('app.v2.keywordsearchInfopage'),
        'method' => 'post',
        'files' => true,
        'autocomplete' => 'off',
        'id'=> 'keywordsearchInfo'
    ]) !!}
    {{ csrf_field() }}
    
    <ul class="nav flex-column" id="nav_accordion">
        <div class="error-container mt-2"></div>

       
           
                <label class="nav-link">Age</label>
            
          
                <select id="key_age" name="key_age" class="form-control">
                    <option value="">Select</option>
                    <option value="4">Age 21 to Age 22</option>
                    <option value="5">Age 22 to Age 23</option>
                    <option value="6">Age 23 to Age 25 </option>
                    <option value="7">Age 25 to Age 27</option>
                    <option value="8">Age 27 to Age 30</option>
                    <option value="9">Above Age 30</option>
                </select>

                <label class="nav-link">Height</label>
           
                <select id="key_height" name="key_height" class="form-control">
                    <option value="">Select</option>
                    <option value="4">Upto 4.5ft</option>
                    <option value="5">4.5ft to 5ft</option>
                    <option value="6">5ft to 5.5ft</option>
                    <option value="7">5.5ft to 6ft</option>
                    <option value="8">Above 6ft</option>
                </select>
           

       
                <label class="nav-link">Keyword</label>
           
                <input type="text" class="form-control" name="keyword" id="keyword">
                <p>Eg: TamilNadu, Chennai, Egmore, Sumathi, Developer.</p>
           

        <div class="button-container">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </ul>
    
    {!! Form::close() !!}
</nav>

            </div>
            <div class="col-md-9">
            <!-- <h5><button class="btn" onclick="history.back()">
            <i class="bi bi-arrow-left " style="font-size: 1.5rem;color:black;"></i>
         </button></h5> -->
         
         <div class="heart-divider">
         <!-- <i class="bi bi-arrow-left text-start" style="font-size: 1.5rem;color:black;"></i> -->
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

                          @if(!empty($memberData)) 
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
            <a href="#" data-bs-toggle="modal" data-bs-target="#iconModal{{ $i }}" class="lock-icon position-absolute bottom-0 rounded-circle" style="top:90px;left:113px;">
                <i class="bi bi-person-fill-lock fs-4 text-dark"></i>
            </a>
        </div>
    @endif

    <h5 class="card-title mt-2" style="font-weight: bold;color:#8C0000;">{{ $profile->name ?? 'Unknown' }}</h5>
    @if (in_array($profileId, $viewProfile))
                                                    <span class="text-success px-4">view</span>
                                                
                                                @endif
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
                                           
                                        <div class="col-md-5 text-start mb-2">
                                            <span  class="fw-bold mb-1">Age:</span>
                                       
                                       
                                            <span class="mb-0" style="color:black">
                                        
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
                                    </div>
                                    <div class="col-md-5 text-start mb-2">
                                            <span  class="fw-bold "> Location:</span>
                                       
                                       
                                            <span class="mb-0" style="color:black">
                                        {{ $profile->cityName ?? 'Not Mentioned' }}</div>
                                        <div class="col-md-5 text-start mb-2">
                                            <span  class="fw-bold ">   Profession:</span>
                                       
                                       
                                            <span class="mb-0" style="color:black">
                                  {{ $profile->destination ?? 'Not Mentioned' }}</div>
                                  <div class="col-md-5 text-start mb-2">
                                            <span  class="fw-bold ">  Company:</span>
                                       
                                       
                                            <span class="mb-0" style="color:black"> 
                                                {{ $profile->company_name ?? 'Not Mentioned' }}</div>
                                            <div @if(in_array($profile->id, $profiles) || in_array($profile->id, $unlike_profile)) style="display:none" @else style="display:block" @endif>
                      <div class="row gy-4 pt-3" id="add_interest{{$i}}">
                          <div class="col-md-3 text-md-end text-start">
                          <label >Interest</label>
                        </div>
                        
                        <div class="col-md-6">
                          <button class="btn btn-success" onclick="add_interest_status(1,{{$i}});">
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

                    @else
    <div class="col-md-12 text-center">
        
        <div class="text-center">
        <img src="{{ asset('/images/no-data-1.png') }}" style="height:250px;width:290px;">
    </div>
    <h5 class="text-danger mt-4">The requested details are unavailable!</h5>
    </div>
@endif
                </div>

                <div class="mt-3">
                {{ $memberData->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>

        <style>
            .matches-header {
                text-align: center;
                /* font-family: 'Oswald', sans-serif; */
                font-size: 1.6em;
                color: #000;
                margin-bottom: 0;
                color:#8C0000;
                font-weight: 700;
                /* font-family: -apple-system,
                    BlinkMacSystemFont, "Segoe UI",
                    Roboto, Oxygen-Sans,
                    Ubuntu, Cantarell, "Helvetica Neue", sans-serif; */
            }

            .grey-line {
               
                width: 30px;
                height: 8px;
                display: inline-block;
                border-top: solid 2px #8C0000;
            }

            .heart-divider {
                /* height: 100%; */
                width: 100%;
                margin: 1em auto;
                text-align: center;
            }

            .pink-heart {
                color: #8C0000;
                font-size: 18px;
                position: relative;
                z-index: 3;
            }

            .grey-heart {
                color: #8C0000;
                font-size: 18px;
                margin-left: -15px;
                position: relative;
                z-index: 2;
            }
            
        </style>

<!-- Meet Matches -->
<div class="row">
    <div class="col-md-1"></div>
 

    <div class="col-md-10">
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

                                            <div class="position-absolute bottom-0 rounded-circle" style="top:68px;left:85px;">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#iconModal{{ $i }}">
                                                    <i class="bi bi-person-fill-lock fs-4 text-dark"></i>
                                                </a>
                                            </div>
                                        @endif
                                        @if (in_array($profileId, $viewProfileMatch))
                                                    <span class="text-success px-4">view</span>
                                                
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
                                        <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($user->id)]) }}"  target="_blank">{{ isset($user->profile_id) ? $user->profile_id : 'Not Available' }}
                                        &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                        <input type="hidden" name="members_id" value="{{ $user->id }}" id="members_id{{ $i }}">
                                        <h6 class="card-title text-center" style="color:#8C0000;">{{ $user->name }}</h6>
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
   

.btn-success {
    background-color: #28a745;
    border: none;
    color: white;
    transition: background-color 0.3s ease;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-danger {
    background-color: #ce1212; /* Using the preferred main color */
    border: none;
    color: white;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #a80e0e;
}


 
 
 .profile-card {
    border-radius: 10px; /* Rounded corners */
    transition: transform 0.3s ease; /* Smooth transition for hover effect */
}


.profile-container img {
    border-radius: 15px; /* Rounded corners */
    /* border: 1px solid grey; Slightly thicker border for boldness */
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.18); /* Bold shadow effect */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for zoom and shadow */
}

.profile-container img:hover {
    transform: scale(1.1); /* Stronger zoom effect */
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3); /* Stronger shadow when hovered */
}


.modal-content {
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow for modal */
}

/* .modal-header {
    background-color: #ce1212;
    color: white;
    text-align: center;
    padding: 15px;
} */

.modal-body {
    padding: 20px;
    text-align: center;
}

.modal-footer {
    background-color: #f8f9fa;
    padding: 20px;
}

/* .card-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
} */

.card-body {
    font-size: 0.9rem;
    color: #555;
    line-height: 1.8;
    padding: 20px;
}


.profile-info {
    background-color: #f9f9f9; /* Light grey background */
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.profile-info span {
    font-weight: bold;
}

.profile-info .value {
    color: #333;
}

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

/* Sidebar styling */
.sidebar {
    border:3px solid #DFDFDF;
    /* background-color: #f8f9fa; Light gray background for a neutral tone */
    color: #333; /* Dark gray text for readability */
    border-radius: 10px; /* Smooth corners */
    padding: 20px;
    width: 100%;
    max-width: 300px;
    /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); Soft shadow */
    margin: 0 auto;
}
.button-container {
    margin-top:0px !important;
}

/* Headings and labels */
.sidebar label.nav-link {
    font-weight: bold;
    font-size: 14px;
    color: #555; /* Subtle dark gray */
    margin-bottom: 10px;
    display: block;
}

/* Dropdowns and inputs */
.sidebar select,
.sidebar input[type="radio"] {
    background-color: #ffffff; /* White background for inputs */
    color: #333; /* Text color */
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 5px; /* Rounded corners */
    padding: 8px;
    width: 100%;
    margin-bottom: 15px;
    font-size: 14px;
}

/* Multi-select dropdowns */
#multiselect2,
#multiselect3 {
    background-color: #ffffff;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 8px;
    font-size: 14px;
    width: 100%;
    height: auto;
}

/* Radio buttons */
.sidebar div label.px-2 {
    font-size: 14px;
    margin-right: 15px;
    color: #555; /* Subtle dark gray for text */
    cursor: pointer;
}

.sidebar input[type="radio"] {
    margin-right: 5px;
}

/* Button styling */
.button-container button#filterButton {
    background-color: #8C0000; /* Accent color for the main button */
    color: #ffffff; /* White text */
    font-weight: bold;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    transition: all 0.3s ease;
    width: 100%;
}

.button-container button#filterButton:hover {
    background-color: #b10e0e; /* Slightly darker red on hover */
    color: #ffffff; /* Text remains white */
}

/* Spacing for list items */
.sidebar ul.nav {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar ul.nav li {
    margin-bottom: 15px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .sidebar {
        padding: 15px;
        max-width: 100%;
        margin: 0;
    }

    .button-container button#filterButton {
        font-size: 16px;
    }
}

/* Hover effect for labels */
.sidebar label.nav-link:hover {
    color: #ce1212; /* Subtle red highlight on hover */
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

<script>
    $(document).ready(function () {
        $('#keywordsearchInfo').on('submit', function (e) {
            var age = $('#key_age').val();
            var height = $('#key_height').val();
            var keyword = $('#keyword').val().trim();

            $('.error-container').html('');
            if (!age && !height && !keyword) {
                e.preventDefault();

                $('.error-container').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Please fill in at least one field: Age, Height, or Keyword.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);

                return false;
            }
        });
    });
</script>


@endsection