@extends('layouts.dash-layout')

@section('content')
<div class="app-container">

    <!-- Header -->
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
                <a href="{{ route('admin.doctor_list') }}">Home</a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                Edit Doctor
            </li>
        </ol>
    </div>

    <!-- Body -->
    <div class="app-body">
        <div class="row gx-3">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin.store_doctor', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="custom-tabs-container">

                                <ul class="nav nav-tabs" id="customTab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1">Personal Details</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab2">Profile & Bio</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab3">FAQ</a>
                                    </li>

                                      <li class="nav-item" role="presentation">
                          <a class="nav-link" id="tab-fiveA" data-bs-toggle="tab" href="#fiveA" role="tab"
                            aria-controls="fiveA" aria-selected="false"><i class="ri-lock-password-line"></i>
                            Specility</a>
                        </li>
                                </ul>

                                <div class="tab-content h-350">

                                    <!-- TAB 1 : Personal Details -->
                                    <div class="tab-pane fade show active pt-3" id="tab1">

                                        <div class="row gx-3">

                                            <div class="col-md-4">
                                                <label class="form-label">Doctor Name</label>
                                                <input type="text" class="form-control"
                                                       name="doctor_name"
                                                       value="{{ $doctor->doctor_name }}" required>
                                            </div>

                                             <div class="col-md-4">
                                                <label class="form-label">Doctor last Name</label>
                                                <input type="text" class="form-control"
                                                       name="doctor_last_name"
                                                       value="{{ $doctor->doctor_last_name }}" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Gender</label>
                                                <div>
                                                    <input type="radio" name="gender" value="male"
                                                           {{ $doctor->gender == 'male' ? 'checked' : '' }}> Male

                                                    <input type="radio" name="gender" value="female"
                                                           class="ms-3"
                                                           {{ $doctor->gender == 'female' ? 'checked' : '' }}> Female
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control"
                                                       name="mobile_number"
                                                       value="{{ $doctor->mobile_number }}" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control"
                                                       name="email"
                                                       value="{{ $doctor->email }}" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Professional</label>
                                                <input type="text" class="form-control"
                                                       name="professional"
                                                       value="{{ $doctor->professional }}" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Qualification</label>
                                                <input type="text" class="form-control"
                                                       name="qualification"
                                                       value="{{ $doctor->qualification }}" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Experience</label>
                                                <input type="text" class="form-control"
                                                       name="experience"
                                                       value="{{ $doctor->experience }}" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Treatments</label>
                                                <input type="text" class="form-control"
                                                       name="treatments"
                                                       value="{{ $doctor->treatments }}" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Location</label>
                                                <input type="text" class="form-control"
                                                       name="location"
                                                       value="{{ $doctor->location }}" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Pincode</label>
                                                <input type="text" class="form-control"
                                                       name="pincode"
                                                       value="{{ $doctor->pincode }}" required>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- TAB 2 : Profile & Bio -->
                                    <div class="tab-pane fade pt-3" id="tab2">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <label class="form-label">Upload Profile</label>
                                                <input type="file" class="form-control" name="doctor_profile">
@if($doctor->doctor_profile)
    <img src="{{ asset('doctor_profiles/'.$doctor->doctor_profile) }}"
         class="img-thumbnail mt-2"
         width="120">
@endif

                                            </div>

                                            <div class="col-md-12 mt-3">
                                                <label class="form-label">Doctor Bio</label>
                                                <textarea class="form-control" name="doctor_bio" rows="4">{{ $doctor->doctor_bio }}</textarea>
                                            </div>

                                            <div class="col-md-12 mt-3">
                                                <label class="form-label">Other Info</label>
                                                <textarea class="form-control" name="other_info" rows="4">{{ $doctor->other_info }}</textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- TAB 3 : FAQ -->
                              <!-- TAB 3 : FAQ -->
<div class="tab-pane fade pt-3" id="tab3">

    <div id="faq-container">

        {{-- Load existing FAQs from database --}}
        @if(!empty($faqs) && count($faqs) > 0)
            @foreach($faqs as $faq)
                <div class="faq-group row mt-3">

                    <div class="col-lg-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger remove">-</button>
                    </div>

                    <div class="col-md-4">
                        <label>Question</label>
                        <input type="text" class="form-control"
                               name="questions[]"
                               value="{{ $faq->question }}"
                               placeholder="Enter Question">
                    </div>

                    <div class="col-md-8">
                        <label>Answer</label>
                        <textarea class="form-control"
                                  name="answer[]" rows="2"
                                  placeholder="Enter Answer">{{ $faq->answer }}</textarea>
                    </div>

                </div>
            @endforeach
        @endif

        {{-- Empty row for adding new FAQ --}}
       
    </div>

</div>


<div class="tab-pane fade" id="fiveA" role="tabpanel">
    <div id="speciality-container">
        <div class="speciality-group row">

            @foreach($allSpecialties as $specialty)
                <div class="form-check col-md-4">
                    <input class="form-check-input"
                           type="checkbox"
                           name="specialties[]"
                           value="{{ $specialty->id }}"
                           id="specialty_{{ $specialty->id }}"
                           {{ in_array($specialty->id, $doctorSpecialtyIds) ? 'checked' : '' }}>

                    <label class="form-check-label" for="specialty_{{ $specialty->id }}">
                        {{ $specialty->name }}
                    </label>
                </div>
            @endforeach

        </div>
    </div>
</div>



                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <a href="{{ route('admin.doctor_list') }}" class="btn btn-outline-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Doctor</button>
                            </div>

                        </form>

                        <script>
                           $(document).on("click", ".add-more", function () {
    let html = `
    <div class="faq-group row mt-3">

        <div class="col-lg-12 d-flex justify-content-end">
            <button type="button" class="btn btn-danger remove">-</button>
        </div>

        <div class="col-md-4">
            <label>Question</label>
            <input type="text" class="form-control" name="questions[]" placeholder="Enter Question">
        </div>

        <div class="col-md-8">
            <label>Answer</label>
            <textarea class="form-control" name="answer[]" rows="2" placeholder="Enter Answer"></textarea>
        </div>

    </div>`;

    $("#faq-container").append(html);
});

$(document).on("click", ".remove", function () {
    $(this).closest(".faq-group").remove();
});

                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
