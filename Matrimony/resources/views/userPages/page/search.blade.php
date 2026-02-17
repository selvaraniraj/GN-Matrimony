@extends('layout2.user-form')

@section('title')
Search
@endsection

@section('content')

<main class="main">

<div class="container text-center">

    <div class="row mt-2 justify-content-center">
        <!-- <div class="col-md-1">
            <a href="" onclick="history.back()">
                <i class="bi bi-arrow-left " style="font-size: 1.5rem;color:black;"></i>
            </a>
        </div> -->
        <div class="col-md-8">
    <!-- <h3 style="color: #ce1212; font-size: 24px; font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">
        Search Here
    </h3> -->

    <div class="heart-divider">
                            <span class="grey-line"></span>
                            <span class="matches-header"> Search Here</span>
                            <i class="bi bi-heart-fill pink-heart"></i>
                            <i class="bi bi-heart grey-heart"></i>
                            <span class="grey-line"></span>
                        </div>

    <div class="card shadow-lg rounded border-0" style="background-color: #f9f9f9;">
        <!-- Card Header with Shadow -->
        <div class="card-header text-white text-center shadow" 
            style="
                padding: 15px 0; 
                border-radius: 8px 8px 0 0;
                background-color:#8C0000;">
            <ul class="nav nav-tabs card-header-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item px-4">
                    <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab"
                        aria-controls="tab1" aria-selected="true">
                        Regular Search
                    </a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab"
                        aria-controls="tab2" aria-selected="false">
                        Keyword Search
                    </a>
                </li>
            </ul>
        </div>

        <!-- Card Body with Shadow -->
        <div class="card-body shadow" 
            style="
                padding: 20px; 
                border-radius: 0 0 8px 8px;">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                          <p>
                            {!! Form::open([ 'url' => route('app.v2.searchInfopage'), 'method' => 'post', 'files' =>
                            true,
                            'autocomplete' => 'off', 'id' => '']) !!}
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Age</label>
                                </div>
                                <div class="col-md-4 ">
                                    <select id="age" name="age" class="form-control">
                                        <option value="">Select</option>
                                        <option value="4">Age 21 to Age 22</option>
                                        <option value="5">Age 22 to Age 23</option>
                                        <option value="6">Age 23 to Age 25 </option>
                                        <option value="7">Age 25 to Age 27</option>
                                        <option value="8">Age 27 to Age 30</option>
                                        <option value="9">Above Age 30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Height</label>
                                </div>
                                <div class="col-md-4 pt-3" style="float:right">
                                    <select id="height" name="height" class="form-control">
                                        <option value="">Select</option>
                                        <option value="4">Upto 4.5ft</option>
                                        <option value="5">4.5ft to 5ft</option>
                                        <option value="6">5ft to 5.5ft</option>
                                        <option value="7">5.5ft to 6ft</option>
                                        <option value="8">Above 6ft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Religion</label>
                                </div>
                                <div class="col-md-4 pt-3" style="position: relative; left: -30px;">
                                    <label class="px-2"> <input type="radio" name="religion" value="Hindu">Hindu</label>
                                    <label class="px-2"><input type="radio" name="religion"
                                            value="Christian">Christian</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Mother Tongue</label>
                                </div>
                                <div class="col-md-4 pt-3" style="position: relative; left: -25px;">
                                    <label class="px-2"> <input type="radio" name="mother_tongue" id="mother_tongue1"
                                            value="Tamil">Tamil</label>
                                    <label class="px-2"><input type="radio" name="mother_tongue" id="mother_tongue2"
                                            value="Malayalam">Malayalam</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Subcaste</label>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <select name="subcaste" id="subcaste" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Kiramani</option>
                                        <option value="2">Sanar</option>
                                        <option value="3">Sathriyar</option>
                                        <option value="4">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Star</label>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <select multiple id="multiselect2" name="par_star[]" placeholder="Select Star"
                                        data-search="true" data-silent-initial-value-set="true">
                                        <option value="">Select</option>
                                        @foreach($star as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Educational Qualification</label>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <select multiple id="multiselect3" name="education[]" placeholder="Select Education"
                                        data-search="true" data-silent-initial-value-set="true">
                                        @foreach($education as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Monthly Income</label>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <select class="form-control" name="par_income">
                                        <option value="">Select</option>
                                        <option value="10,000-20,000">10,000-20,000</option>
                                        <option value="20,000-30,000">20,000-30,000</option>
                                        <option value="30,000-60,000">30,000-60,000</option>
                                        <option value="60,000-80,000">60,000-80,000</option>
                                        <option value="80,000-1lakh">80,000-1 lakh</option>
                                        <option value="1lakh-1.5lakh">1 lakh-1.5lakh </option>
                                        <option value="1.5lakh-2lakh">1.5 lakh-2 lakh </option>
                                    </select>
                                </div>
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn">Search</a>
                            </div>
                            {!! Form::close() !!}
                        </p>
                    </div>




                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        {!! Form::open([ 'url' => route('app.v2.keywordsearchInfopage'), 'method' => 'post', 'files' =>
                        true,
                        'autocomplete' => 'off', 'id'=> 'keywordsearchInfo']) !!}
                        {{csrf_field()}}
                        <p>


                            <div class="error-container mt-2"></div>
                            <div class="row pt-4">
                                <div class="col-md-6">
                                    <label>Age</label>
                                </div>
                                <div class="col-md-4">
                                    <select id="key_age" name="key_age" class="form-control">
                                        <option value="">Select</option>
                                        <option value="4">Age 21 to Age 22</option>
                                        <option value="5">Age 22 to Age 23</option>
                                        <option value="6">Age 23 to Age 25 </option>
                                        <option value="7">Age 25 to Age 27</option>
                                        <option value="8">Age 27 to Age 30</option>
                                        <option value="9">Above Age 30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Height</label>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <select id="key_height" name="key_height" class="form-control">
                                        <option value="">Select</option>
                                        <option value="4">Upto 4.5ft</option>
                                        <option value="5">4.5ft to 5ft</option>
                                        <option value="6">5ft to 5.5ft</option>
                                        <option value="7">5.5ft to 6ft</option>
                                        <option value="8">Above 6ft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Keyword</label>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <input type="text" class="form-control" type="text" name="keyword" id="keyword">
                                    <p>Eg: TamilNadu, Chennai, Egmore, Sumathi, Developer.</p>
                                </div>
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn">Search</button>
                            </div>
                        </p>
                        {!! Form::close() !!}
                    </div>


                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                        {!! Form::open([ 'url' => route('app.v2.idsearchInfopage'), 'method' => 'post', 'files' => true,
                        'autocomplete' => 'off' , 'id' => 'searchmemerId']) !!}
                        {{csrf_field()}}
                        <p>

                            <div class="error-containersearch mt-2"></div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <label>Matrimony ID</label>
                                </div>
                                <div class="col-md-4 pt-3">
                                    <input type="text" class="form-control" type="text" name="search_id" id="search_id">
                                </div>
                            </div>
                            <div class="button-container pt-3">
                                <button type="submit" class="btn" onclick="navigate(-1)">Submit</button>
                            </div>
                        </p>
                        {!! Form::close() !!}
                    </div>
                </div>
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
                font-weight: 700;
                color:#8C0000;
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


<!-- best Matches -->

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-11 mt-4">
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

                                        @if (in_array($profileId, $upprovePhoto))

                                            @if(!empty($user->file_path))
                                                <img src="{{ asset($user->file_path) }}" style="vertical-align:middle;" class="rounded-circle" width="100px" height="100px">
                                            @else
                                                <img src="{{ asset('/images/user_image.png') }}" style="vertical-align:middle;" class="rounded-circle" width="100px">
                                            @endif

                                        @else
                                            <img src="{{ asset('/images/user_image.png') }}" style="vertical-align:middle;" class="rounded-circle" width="100px">

                                            <div class="position-absolute bottom-0 rounded-circle" style="top:70px;left:95px;">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#iconModal{{ $i }}">
                                                    <i class="bi bi-person-fill-lock fs-4 text-dark"></i>
                                                </a>
                                            </div>
                                        @endif

                                        @if (in_array($profileId, $viewProfile))
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
                                                <img src="{{ asset('/images/user_image.png') }}" alt="Secure Profile" class="img-fluid rounded-circle mb-3" width="100">
                                                <p class="fs-5">This profile is private. You need to request permission to view it.</p>
                                            </div>
                                            <input type="hidden" name="profile_ids" id="profile_ids{{ $i }}" value="{{ $user->id }}">
                                            <input type="hidden" name="names" id="names{{ $i }}" value="{{ $user->name }}">
                                            <input type="hidden" name="user_ids" id="user_ids{{ $i }}" value="{{ $user->user_id }}">

                                            <div class="modal-footer justify-content-center" style="border-top: none;">
                                                @if (in_array($profileId, $logConditionsRequest))
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
                                    <div class="col-md-12 text-center" style="padding-left:20px;" onclick="view_person(event, this)"
                                      data-profile-id="{{ $user->id }}" 
     data-name="{{ $user->name }}" 
     data-user-id="{{ $user->user_id }}">
                                        <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($user->id)]) }}"  target="_blank">{{ $user->profile_id ?? 'Not Available' }}  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                        <input type="hidden" name="members_id" value="{{ $user->id }}" id="members_id{{ $i }}">
                                        <h6 class="card-title text-center" style="color:#8C0000;font-weight:700;">{{ $user->name }}</h6>
                                    </div>
                                </div>

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

<style>
    .nav-link {
        color: white;
    }

    .nav-link:hover {
        color: white;
    }

    .nav-link.active {
        color: white;
    }
</style>
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


    document.addEventListener('DOMContentLoaded', function () {

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
            options.forEach(function (option) {
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


            selectedValues.forEach(function (value) {
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

    document.addEventListener('DOMContentLoaded', function () {

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
            options.forEach(function (option) {
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


            selectedValues.forEach(function (value) {
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

    document.addEventListener('DOMContentLoaded', function () {

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
            options.forEach(function (option) {
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


            selectedValues.forEach(function (value) {
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

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
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

<script>
    $(document).ready(function () {
        $('#searchmemerId').on('submit', function (e) {
            var matrimonyId = $('#search_id').val().trim();
            if (!matrimonyId) {
                e.preventDefault();
                $('.error-container').html('');
                $('.error-containersearch').html(`
                    <div class="alert alert-danger" alert-dismissible fade show" role="alert">
                        Please enter a Matrimony ID.
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                `);

                return false;
            }
        });
    });
</script>
<script>
function profilerequest(index) {
        let profileId = document.getElementById(`profile_ids${index}`).value;
        let userId = document.getElementById(`user_ids${index}`).value;
        let name = document.getElementById(`names${index}`).value;

        console.log('profileId:', profileId);
        console.log('userId:', userId);
        console.log('name:', name);

        $.ajax({
            url: "{{ route('app.v2.request_profileView') }}", // Ensure the route is correct
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}", // Laravel CSRF token
                profile_ids: profileId, // Ensure these keys match server-side input names
                user_ids: userId,
                names: name
            },
            success: function (results) {
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        VirtualSelect.init({
            ele: '#age',
            multiple: false,
            search: true,
            placeholder: 'Select'
        });
        VirtualSelect.init({
            ele: '#height',
            multiple: false,
            search: true,
            placeholder: 'Select'
        });
        VirtualSelect.init({
            ele: '#subcaste',
            multiple: false,
            search: true,
            placeholder: 'Select'
        });
        VirtualSelect.init({
            ele: '#key_age',
            multiple: false,
            search: true,
            placeholder: 'Select'
        });
        VirtualSelect.init({
            ele: '#key_height',
            multiple: false,
            search: true,
            placeholder: 'Select'
        });
    });
</script>
</main>
@endsection