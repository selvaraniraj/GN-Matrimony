@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
<main class="main">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <a href="#" onclick="history.back()">
                    <i class="bi bi-arrow-left  " style="font-size: 1.5rem;color:black"></i>
                </a>

                <h4>MATCHES</h4>
                <nav class="sidebar card py-2 mb-4">
                    <ul class="nav flex-column" id="nav_accordion">
                        <li class="nav-item has-submenu">
                            <a class="nav-link" href="#">Profile yet to be viewed</a>
                            <ul class="submenu collapse">
                                <li>
                                    <input type="hidden" name="duration" id="duration" value="">
                                    <a class="nav-link" id="1" href="javascript:void(0);"
                                        onclick="durationcalc(this.id)">Within a week</a></li>
                                <li><a class="nav-link" id="2" href="javascript:void(0);"
                                        onclick="durationcalc(this.id)">Within a month </a></li>
                                <li><a class="nav-link" id="3" href="javascript:void(0);"
                                        onclick="durationcalc(this.id)">Within a year</a> </li>
                            </ul>
                        </li>
                        <li class="nav-item has-submenu">
                            <a class="nav-link" href="#">Age</a>
                            <ul class="submenu collapse">
                                <input type="hidden" name="age_val" value="" id="age_val">
                                <input type="hidden" name="age_val1" value="" id="age_val1">
                                <li><a class="nav-link" href="javascript:void(0);" id="4"
                                        onClick="age_select(21,22)">Age 21 to Age 22</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="5"
                                        onClick="age_select(22,23)">Age 22 to Age 23</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="6"
                                        onClick="age_select(23,25)">Age 23 to Age 25</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="7"
                                        onClick="age_select(25,27)">Age 25 to Age 27</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="8"
                                        onClick="age_select(27,30)">Age 27 to Age 30</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="9"
                                        onClick="age_select(30,100)">Above Age 30</a></li>
                            </ul>
                        </li>
                        <li class="nav-item has-submenu">
                            <a class="nav-link" href="#">Height</a>
                            <ul class="submenu collapse">
                                <input type="hidden" name="height" value="" id="height">
                                <input type="hidden" name="height1" value="" id="height1">

                                <li><a class="nav-link" href="javascript:void(0);" id="11"
                                        onClick="height_select(16,1)">Upto 4.5ft</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="12"
                                        onClick="height_select(21,16)">4.5ft to 5ft</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="13"
                                        onClick="height_select(26,21)">5ft to 5.5ft</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="14"
                                        onClick="height_select(31,26)">5.5ft to 6ft</a></li>
                                <li><a class="nav-link" href="javascript:void(0);" id="15"
                                        onClick="height_select(31,100)">Above 6ft</a></li>
                            </ul>
                        <li class="nav-item has-submenu">
                            <a class="nav-link" href="#">Self Information</a>
                            <ul class="submenu collapse">
                                <input type="hidden" name="photoval" id="photoval" value="">
                                <li><a class="nav-link" href="javascript:void(0);" id="1"
                                        onClick="photo_select(this.id)">With photos</a></li>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                <h5>PROFILES YET TO BE VIEWED </h5>
                <div class="d-flex justify-content-between align-items-center">
                </div>
                <div id="result_div">

                    @php
                    $i=1;
                    @endphp
                    @foreach($details as $user)

                    <input type="hidden" name="profile_id" id="profile_id" value="{{ $user->id }}">
                    <input type="hidden" name="name" id="name" value="{{ $user->name }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">

                    {{csrf_field()}}
                    <div id="" class="row">
                        <div class="col-md-12 mb-4   profile-card" data-gender="bride">
                            <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-7" style="padding-left:20px;"
                                            onclick="view_person(event, this)" data-profile-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}" data-user-id="{{ $user->user_id }}">
                                            <a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($user->id)]) }}"
                                                target="_blank">
                                                {{ $user->profile_id }} || <span>Profile created for
                                                    {{ $user->created_by_relation }}</span>
                                            </a>
                                        </div>

                                        <div class="col-md-4 pad_space ">
                                        </div>

                                        <div class="col-md-4 pt-3 ms-2 position-relative text-center">
                                            @php
                                            $profileId = $user->id;
                                            @endphp

                                            @if (in_array($profileId, $upprovePhoto))
                                            @if(!empty($user->file_path))
                                            <div class="profile-container d-inline-block position-relative">
                                                <img src="{{ asset($user->file_path) }}" class="rounded-circle"
                                                    width="150" height="150" alt="Profile Image">
                                            </div>
                                            @else
                                            <div class="profile-container d-inline-block position-relative">
                                                <img src="{{ asset('/images/user_image.png') }}" class="rounded-circle"
                                                    width="150" height="150" alt="Default Image">
                                            </div>
                                            @endif
                                            @else
                                            <div class="profile-container d-inline-block position-relative">
                                                <img src="{{ asset('/images/user_image.png') }}" class="rounded-circle"
                                                    width="150" height="150" alt="Default Image">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#iconModal{{ $i }}"
                                                    class="lock-icon position-absolute bottom-0 end-0 bg-white rounded-circle p-2">
                                                    <i class="bi bi-person-fill-lock fs-4 text-dark"></i>
                                                </a>
                                            </div>
                                            @endif

                                            <h5 class="card-title mt-2" style="font-weight: bold;">
                                                {{ $user->name ?? 'Unknown' }}</h5>
                                        </div>


                                        <div class="modal fade" id="iconModal{{ $i }}" tabindex="-1"
                                            aria-labelledby="iconModalLabel{{ $i }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-white justify-content-center"
                                                        style="border-bottom: none;">
                                                        <h5 class="modal-title d-flex align-items-center"
                                                            id="iconModalLabel{{ $i }}">
                                                            <i class="bi bi-shield-lock-fill me-2"></i> Request to View
                                                            Profile
                                                        </h5>
                                                        <button type="button"
                                                            class="btn-close position-absolute end-0 me-3"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('/images/secure_profile.png') }}"
                                                            alt="Secure Profile" class="img-fluid rounded-circle mb-3"
                                                            width="100">
                                                        <p class="fs-5">This profile is private. You need to request
                                                            permission to view it.</p>
                                                    </div>
                                                    <input type="hidden" name="profile_ids" id="profile_ids{{ $i }}"
                                                        value="{{ $user->id }}">
                                                    <input type="hidden" name="names" id="names{{ $i }}"
                                                        value="{{ $user->name }}">
                                                    <input type="hidden" name="user_ids" id="user_ids{{ $i }}"
                                                        value="{{ $user->user_id }}">

                                                    <div class="modal-footer justify-content-center"
                                                        style="border-top: none;">
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

                                        <div class="col-md-7">
                                            <div class="card-body">
                                                <input type="hidden" name="members_id" value="{{ $user->id }}"
                                                    id="members_id{{ $i }}">

                                                @php
                                                $dob = $user->dob;
                                                $age = \Carbon\Carbon::parse($dob)->age;
                                                @endphp
                                                <div class="d-flex flex-column">
                                                    <span class="card-text mb-2">Age & Height: {{ $age }} &
                                                        {{ $user->height_name }}</span>
                                                    <span class="card-text mb-2">Location: {{$user->address}}</span>
                                                    <span class="card-text mb-2">Profession: {{$user->occuption}}</span>
                                                    <span class="card-text mb-2">Company: {{$user->company_name}}</span>
                                                </div>


                                                <div @if(in_array($user->id, $profile) || in_array($user->id,
                                                    $unlike_profile)) style="display:none" @else style="display:block"
                                                    @endif>
                                                    <div class="row gy-4 pt-3" id="add_interest{{$i}}">
                                                        <div class="col-md-3 text-md-end text-start">
                                                            <label>Interest</label>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <button class="btn btn-danger"
                                                                onclick="add_interest_status(1,{{$i}});">
                                                                <i class="fas fa-comments"></i>Yes
                                                            </button>
                                                            <button class="btn btn-danger"
                                                                onclick="add_interest_status(2,{{$i}});">
                                                                <i class="fas fa-comments "></i>No
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="interest{{$i}}" @if(in_array($user->id, $profile))
                                                    style="display:block" @else style="display:none" @endif>
                                                    <div class="col-md-6">
                                                        <button class="btn btn btn-success">
                                                            <i class="fas fa-comments"></i>Interested
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row" id="not_interest{{$i}}" @if(in_array($user->id,
                                                    $unlike_profile)) style="display:block" @else style="display:none"
                                                    @endif>
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
                    </div>
                    @php
                    $i++;
                    @endphp
                    @endforeach

                </div>

                <div class="mt-4">
                    {{ $details->links('pagination::bootstrap-5') }}
                </div>
            </div>



        </div>
        <!-- best Matches -->

        <style>
            .matches-header {
                text-align: center;
                font-family: 'Oswald', sans-serif;
                font-size: 2em;
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
                margin: 2em auto;
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

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">

                <div class="grid_1">
                    <div class="container">
                        <h1>Featured Profiles</h1>
                        <div class="heart-divider">
                            <span class="grey-line"></span>
                            <i class="bi bi-heart-fill pink-heart"></i>
                            <i class="bi bi-heart grey-heart"></i>
                            <span class="grey-line"></span>
                        </div>
                        <div class="carousel-container position-relative">
                            <div id="prevArrow"
                                class="nbs-flexisel-nav-left">
                                <i class="bi bi-chevron-left"></i>
        </div>

                            <!-- <button id="prevArrow" class="nbs-flexisel-nav-left">
           
        </button> -->

                            <ul id="profileCarousel" class="d-flex list-unstyled">
                                @foreach($detailsmatch as $profile)
                                <li class="mx-2">
                                    <div class="col_1">
                                        <a href="">
                                        
                                            <img src="{{ asset('/images/user_image.png') }}"  width="150" height="150" alt="Profile Image"
                                                class="hover-animation image-zoom-in img-responsive" />
                                            <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                                                <div class="center-middle">About
                                                    {{ $profile->gender == 'male' ? 'Him' : 'Her' }}</div>
                                            </div>
                                            <h3>
                                                <span class="m_3">Profile ID: {{ $profile->profile_id }}</span><br>
                                                {{ $profile->age }}, {{ $profile->religion }},
                                                {{ $profile->country }}<br>
                                                {{ $profile->occupation }}
                                            </h3>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            <!-- <button id="nextArrow" class="nbs-flexisel-nav-right">
            
        </button> -->
                            <div id="nextArrow"
                                class="nbs-flexisel-nav-right">
                                <i class="bi bi-chevron-right"></i>
        </div>
                        </div>
                    </div>

                    <style>
                        #profileCarousel {
                            overflow-x: hidden;
                            display: flex;
                            gap: 20px;
                            scroll-behavior: smooth;
                            padding: 10px 0;
                            margin: 0;
                        }

                        #profileCarousel li {
                            flex: 0 0 auto;
                            width: 200px;
                        }

                        .carousel-container {
                            position: relative;
                            width: 100%;
                        }
                        .nbs-flexisel-container {
        position: relative;
        max-width: 100%;
    }

    .nbs-flexisel-ul {
        position: relative;
        width: 9999px;
        margin: 0;
        padding: 0;
        list-style-type: none;
        text-align: center;
    }

    .nbs-flexisel-inner {
        overflow: hidden;
        margin: 0 auto;
        width: 90%;
    }

    .nbs-flexisel-item {
        float: left;
        padding: 0px;
        position: relative;
        line-height: 0px;
        margin-left: 5px;
        min-height: 220px;
        min-width: 171px;
    }

    .nbs-flexisel-item:first-child {
        margin-left: 0;
    }

    .nbs-flexisel-item > img {
        cursor: pointer;
        position: relative;
    }

    /* Navigation */
    .nbs-flexisel-nav-left,
    .nbs-flexisel-nav-right {
        position: absolute;
        cursor: pointer;
        z-index: 100;
        margin-top: 0px;
    }

    .nbs-flexisel-nav-left {
        left: 0px;
    }

    .nbs-flexisel-nav-left:after {
        text-shadow: none;
        -webkit-font-smoothing: antialiased;
        font-family: 'fontawesome';
        speak: none;
        font-weight: normal;
        font-variant: normal;
        line-height: 1;
        text-transform: none;
        -moz-transition: 0.4s;
        -o-transition: 0.4s;
        -webkit-transition: 0.4s;
        transition: 0.4s;
        color: #c32143;
        content: "\f104";
        display: inline-block;
        font-size: 50px;
        position: relative;
        top: -40px;
    }

    .nbs-flexisel-nav-right {
        right: 0px;
    }

    .nbs-flexisel-nav-right:after {
        text-shadow: none;
        -webkit-font-smoothing: antialiased;
        font-family: 'fontawesome';
        speak: none;
        font-weight: normal;
        font-variant: normal;
        line-height: 1;
        text-transform: none;
        -moz-transition: 0.4s;
        -o-transition: 0.4s;
        -webkit-transition: 0.4s;
        transition: 0.4s;
        color: #c32143;
        content: "\f105";
        display: inline-block;
        font-size: 50px;
        position: relative;
        top: -40px;
    }
    .nbs-flexisel-nav-right:after, .nbs-flexisel-nav-left:after  {
    top:20px;
}
                    </style>

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
                </div>



            </div>
        </div>
    </div>

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
            success: function (data) {
                if (data == 1) {
                    $('#add_interest' + y).hide();
                    $('#interest' + y).show();
                }
                if (data == 2) {
                    $('#add_interest' + y).hide();
                    $('#not_interest' + y).show();
                }
            },
            error: function (xhr, status, error) {
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
    function durationcalc(clicked) {
        $("#duration").val(clicked);
        search_profiles();
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
    function age_select(a, b) {
        $("#age_val").val(a);
        $("#age_val1").val(b);
        search_profiles();
    }
</script>
<script>
    function height_select(b, c) {

        $("#height").val(b);
        $("#height1").val(c);

        search_profiles();
    }

    function photo_select(x) {

        $("#photoval").val(x);
        search_profiles();
    }
</script>
<script>
    function search_profiles() {
        var duration = $("#duration").val();
        var height = $("#height").val();
        var height1 = $("#height1").val();
        var photo = $("#photoval").val();
        var age_val = $("#age_val").val();
        var age_val1 = $("#age_val1").val();

        if (duration != "" || (height1 != "" && height != "") || photo != "" || (age_val != "" && age_val1 != "")) {
            $.ajax({
                url: "{{ route('show_matches_filter') }}",
                method: "POST",
                data: ({
                    duration: duration,
                    height1: height1,
                    height: height,
                    age_val: age_val,
                    photo: photo,
                    age_val1: age_val1,
                    _token: "{{ csrf_token() }}"
                }),
                success: function (results) {
                    $("#result_div").html(results);
                }
            });
        }
    }
</script>

@endsection