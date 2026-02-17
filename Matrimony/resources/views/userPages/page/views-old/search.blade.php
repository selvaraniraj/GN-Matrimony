@extends('layout2.user-form')

@section('title')
Search
@endsection

@section('content')



<div class="container text-center">

    <div class="row mt-2 justify-content-center">
        <div class="col-md-1">
            <a href="#" onclick="history.back()">
                <i class="bi bi-arrow-left " style="font-size: 1.5rem;color:black;"></i>
            </a>
        </div>
        <div class="col-md-7">
            <!-- <div class="container">
    <a href="#" onclick="history.back()" class="btn btn-success float-right">
        <i class="bi bi-arrow-left" style="font-size: 1.5rem;"></i>
    </a>
</div> -->

            <div class="card">
                <div class="card-header bg-success">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
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
                        <!-- <li class="nav-item px-4">
                            <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab"
                                aria-controls="tab3" aria-selected="false">
                                Matrimony Id Search
                            </a>
                        </li> -->
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent text-start">
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

<!-- best Matches -->

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-11">
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

                                        @if (in_array($profileId, $upprovePhoto))

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


@endsection