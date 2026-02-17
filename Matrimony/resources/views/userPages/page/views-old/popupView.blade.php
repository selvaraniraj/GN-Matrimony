@extends('layout2.user-form')

@section('title')
Single page
@endsection

@section('content')
<main>
    <div class="container" style="background-color: #F8F8F8; min-height: 100vh;">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9 card p-4">
                <!-- First Row with Centered Image -->
                <div class="row g-0 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100" style="min-height: 200px;">
    <div class="col-auto text-center position-relative" style="min-height: 220px;">

        @php
            $profileId = $user->id;
        @endphp

        @if ($profileId && $upprovePhoto)
            @if ($user->photos->isNotEmpty())
                <img src="{{ asset($user->photos->first()->uploadFile->file_path ?? '/images/user_image.png') }}" 
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
</div>



                <input type="hidden" name="profile_id" id="profile_id" value="{{ $user->id }}">
<input type="hidden" name="name" id="name" value="{{ $user->name }}">
<input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">


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

            <div class="modal-footer" style="border-top: none;">
                @if ($logConditionsRequest)
                    <span id="requestedsend" class="text-success justify-content-center px-4">Request Sent successfully!</span>
                @else
                    <button type="button" class="btn btn-success  justify-content-center px-4" id="profile_view" onclick="profilerequest()">
                        <i class="bi bi-send"></i> Send Request
                    </button>
                    <span id="sends" class="text-success  justify-content-center px-4" style="display: none;">Request Sent successfully!</span>
                @endif
            </div>
        </div>
    </div>
</div>

                <!-- Second Row with Heading -->
                <div class="row mt-4">
                    <div class="col-auto">
                        <h4 class="icon-heading border-bottom border-danger pb-1 " style="display: flex;align-items: center;  gap: 10px; "> Basic
                        Information for {{$user->name}} 
                        <span style="color: green;">
    {{ $user->profile_id ? '(' . $user->profile_id . ')' : '(Profile ID not available)' }}
</span></h4>
                    </div>
                </div>

                <div class="row">
        <!-- Left Column -->
        <div class="col-md-6 border-end">
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Age</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        @php
            $dob = $user->dob; 
            $age = \Carbon\Carbon::parse($dob)->age; 
        @endphp
        <span>{{ $age }}</span>
    </div>
</div>  
            </div>
            <div class="mb-3">


            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Height</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
    @if (!empty($user->additionalDetails) && !empty($user->additionalDetails->height_id))
            <span>{{ $user->additionalDetails->height->name }}</span>
        @else
            <span>Not specified</span>
        @endif
    </div>
</div> 
            
            </div>
            <div class="mb-3">
            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">DOB</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ date('d F Y', strtotime($user->dob)) }}</span>
    </div>
</div> 
 
            </div>
            <div class="mb-3">


            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Star</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
    <span>{{ $user->star ? $user->star->name : 'Not specified' }}</span>
    </div>
</div> 
                
            </div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Address</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->door_no }}</span>
    </div>
</div>
               
            </div>
        </div>

        <!-- Right Column -->
      
      
        <div class="col-md-6 ps-4">
   
        <div class="row align-items-center">
            <div class="col-md-4 mb-4">
                <span class="text-muted">Mobile Number</span>
            </div>
            <div class="col-md-1 text-center mb-4">
                <span>:</span>
            </div>
            <div class="col-md-6 mt-2">
                
                @if($logConditionsMet)
                    <!-- Display full mobile number -->
                    <span>{{ $user['mobile'] }}</span>
                @elseif($logConditionsrequest)
                    <!-- Display masked mobile number -->
                    <span>
                        <?php  
                            $a = substr($user['mobile'], 0, 2); 
                            $b = substr($user['mobile'], -2);   
                            $c = "********";                  
                            echo $a . $c . $b;                
                        ?>
                    </span>

                    <div id="requested">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <span class="btn btn-success text-white btn-sm fs-7">Request Sent!</span>
                            </div>
                        </div> 
                    </div>

                @else
                    <span>
                        <?php  
                            $a = substr($user['mobile'], 0, 2); 
                            $b = substr($user['mobile'], -2);   
                            $c = "********";                  
                            echo $a . $c . $b;                
                        ?>
                    </span>

                    <div class="row mt-1">
                        <div class="col-md-12 mx-auto text-center" id="request" >
                            <button class="btn btn-primary text-white btn-sm fs-7" type="button" onclick="mobilenumberrequest()">Request</button>
                        </div>
                        </div>
                        <div id="requestedsend" style="display: none;">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <span class="btn btn-success text-white btn-sm fs-7">Request Sent!</span>
                                </div>
                            </div> 
                        </div>
                   
                @endif

            </div>
        </div>
    



<div class="row align-items-center mt-4 mb-3">
    <div class="col-md-4">
        <span class="text-muted">Education</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
    <span>{{ $user->educationDetails->education->name ?? 'Not specified' }}</span>
    </div>
</div> 

          



            <div class="mb-3 mt-2">
            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Occupation</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->educationDetails->occuption ?? 'Not specified' }}</span>
    </div>
</div> 
   
            </div>
            <div class="mb-3 mt-2">
            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Occupation Brief</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->educationDetails->destination ?? 'Not specified'}}</span>
    </div>
</div> 
               
            </div>
            <div class="mt-2">
            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Monthly Income</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->educationDetails->income ?? 'Not specified' }}</span>
    </div>
</div> 
            </div>
          
        </div>
        
    </div>

<!-- Horoscope Details -->

   <div class="row mt-4">
                    <div class="col-auto">
                    <h4 class="icon-heading border-bottom border-danger pb-1 " style="display: flex;align-items: center;  gap: 10px; ">
                    Horoscope Information for {{$user->name}}</h4>
                        
                    </div>
                </div>

                <div class="row">
        <!-- Left Column -->
        <div class="col-md-6">
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Raasi/Moon Sign</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->raasi->name ?? 'Not specified' }}</span>
    </div>
</div>
               
            </div>
           
        </div>
    </div>

    <div class="row gy-4" >
                        <p> So-Sooriyan, Ch-Chandran, Se-Sevvai, Bu-Budhan, Su-Sukran, Sa-Sani, Gu-Guru, Ra-Rahu, Ke-Kethu, Lu-Lagnam</p>
    <div class="col-md-6">
        <fieldset>
            <table class="table table-bordered table-hover align-middle">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                </colgroup>
                <tbody>
                    <tr>
                        <td><textarea name="rasi_1" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_1 ?? '' }} </textarea></td>
                        <td><textarea name="rasi_2" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_2 ?? ''}}</textarea></td>
                        <td><textarea name="rasi_3" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_3 ?? ''}}</textarea></td>
                        <td><textarea name="rasi_4" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_4 ?? ''}}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_5" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_5 ?? '' }}</textarea></td>
                        <td colspan="2" rowspan="2" class="text-center align-middle">Rasi</td>
                        <td><textarea name="rasi_6" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_6 ?? ''}}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_7" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_7 ?? ''}}</textarea></td>
                        <td><textarea name="rasi_8" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_8 ?? ''}}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_9" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_9 ?? ''}}</textarea></td>
                        <td><textarea name="rasi_10" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_10 ?? ''}}</textarea></td>
                        <td><textarea name="rasi_11" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_11 ?? ''}}</textarea></td>
                        <td><textarea name="rasi_12" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->rasi_12 ?? ''}}</textarea></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <table class="table table-bordered table-hover align-middle">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                </colgroup>
                <tbody>
                    <tr>
                        <td><textarea name="Navamsam_1" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_1 ?? ''}}</textarea></td>
                        <td><textarea name="Navamsam_2" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_2 ?? ''}}</textarea></td>
                        <td><textarea name="Navamsam_3" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_3 ?? ''}}</textarea></td>
                        <td><textarea name="Navamsam_4" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_4 ?? ''}}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_5" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_5 ?? ''}}</textarea></td>
                        <td colspan="2" rowspan="2" class="text-center align-middle">Navamsam</td>
                        <td><textarea name="Navamsam_6" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_6 ?? ''}}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_7" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_7 ?? ''}}</textarea></td>
                        <td><textarea name="Navamsam_8" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_8 ?? ''}}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_9" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_9 ?? ''}}</textarea></td>
                        <td><textarea name="Navamsam_10" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_10 ?? ''}}</textarea></td>
                        <td><textarea name="Navamsam_11" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_11 ?? ''}}</textarea></td>
                        <td><textarea name="Navamsam_12" class="form-control" rows="1" style="resize: none;" disabled>{{$user->horoscopeDetail->Navamsam_12 ?? ''}}</textarea></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
</div>

<!-- Family Details -->
             <div class="row mt-4">
                    <div class="col-auto">
                    <h4 class="icon-heading border-bottom border-danger pb-1 " style="display: flex;align-items: center;  gap: 10px; ">
                    Family Information For {{$user->name}}</h4>
                       
                    </div>
                </div>

                <div class="row">
        <!-- Left Column -->
        <div class="col-md-6 border-end">
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Father Name</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->familyDetails->father_name ?? 'Not specified'}}</span>
    </div>
</div>
           
            </div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Father Occupation</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->familyDetails->father_status ?? 'Not specified' }}</span>
    </div>
</div>
              
            </div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Mother Name</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->familyDetails->mother_name ?? 'Not specified' }}</span>
    </div>
</div>
 
            </div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Mother Occupation</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->familyDetails->mother_status ?? 'Not specified' }}</span>
    </div>
</div>
            </div>
          
        </div>

        <!-- Right Column -->
        <div class="col-md-6 ps-4">
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">No Of Sister</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->familyDetails->number_of_sisters ?? 'Not specified' }}</span>
    </div>
</div>
               
            </div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">No Of Brother</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->familyDetails->number_of_brothers ?? 'Not specified' }}</span>
    </div>
</div>
            </div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Sister Married</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->familyDetails->sisters_married ?? 'Not specified' }}</span>
    </div>
</div>
            </div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted"> Brother Married</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->familyDetails->brothers_married ?? 'Not specified' }}</span>
    </div>
</div>
            </div>
        </div>
           
        
    </div>
         
    
     <!-- Partner Details -->
     <div class="row mt-4">
                    <div class="col-auto">
                    <h4 class="icon-heading border-bottom border-danger pb-1 " style="display: flex;align-items: center;  gap: 10px; ">
                    Partner Preference For {{$user->name}} </h4>
                    </div>
                </div>

                <div class="row">
        <!-- Left Column -->
        <div class="col-md-12">
        <div class="mb-3">

        <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Age</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
    <span>
    @if(optional($user->partner_Information)->age && optional($user->partner_Information)->age != '0')
        {{ $user->partner_Information->age }} - 
    @else
        Not specified - 
    @endif

    @if(optional($user->partner_Information)->age_from && optional($user->partner_Information)->age_from != '0')
        {{ $user->partner_Information->age_from }}
    @else
        Not specified
    @endif
</span>

    </div>
</div>

</div>

<div class="mb-3">


<div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Height</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
    <span>
    @if(optional($user->partner_Information)->heightTo?->name && $user->partner_Information->heightTo->name !== '0')
        {{ $user->partner_Information->heightTo->name }} -
    @else
        Not specified -
    @endif

    @if(optional($user->partner_Information)->heightFrom?->name && $user->partner_Information->heightFrom->name !== 'Select')
        {{ $user->partner_Information->heightFrom->name }}
    @else
        Not specified
    @endif
</span>



    </div>
</div>
   
    
</div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">Educational Qualification</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->partner_Information->education ?? 'Not specified' }}</span>
    </div>
</div>
               
            </div>
            <div class="mb-3">

            <div class="row align-items-center">
    <div class="col-md-4">
        <span class="text-muted">About Partner</span>
    </div>
    <div class="col-md-1 text-center">
        <span>:</span>
    </div>
    <div class="col-md-6">
        <span>{{ $user->partner_Information->about_you ?? 'Not specified' }}</span>
    </div>
</div>
                
            </div>
          
        </div>

    </div>
                  

            </div>
        </div>
    </div>
</main>

<style>

@media (min-width: 768px) {
  #request, #requestedsend ,#requested{
    position: relative;
    right: 5px;  
     top:12px;}

}

@media (min-width: 1000px) {
  #request, #requestedsend,#requested {
    position:relative;
    right: 90px;
    top:10px;
    
  }
}
  @media (min-width: 1200px) {
  #request, #requestedsend,#requested {
    position:relative;
    right: 130px;
    top:10px;
    
  }
}
</style>

<script>

function mobilenumberrequest() {
    var profile_id = document.getElementById("profile_id").value;
    var name = document.getElementById("name").value;
    var user_id = document.getElementById("user_id").value;

    $.ajax({
        url: "{{ route('app.v2.request_mobilepage') }}", 
        type: "POST",
        data: {
            profile_id: profile_id,
            name: name,
            user_id: user_id,
            _token: "{{ csrf_token() }}" 
        },
        success: function(results) {
           
            if (results.success) {
                // Check if the log conditions request is true
                if (results.logConditionsRequest) {
                    const requestElement = document.getElementById("request");
                    const requestedElement = document.getElementById("requestedsend");

                    if (requestElement) {
                        requestElement.style.display = "none"; 
                    }

                    if (requestedElement) {
                        requestedElement.style.display = "block";
                    }
                }
            } else {
              
                alert(results.message);
            }
                  
        },
        error: function(xhr) {
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
