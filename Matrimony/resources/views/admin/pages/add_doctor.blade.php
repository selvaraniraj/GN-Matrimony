@push('styles')
<link href="{{ asset('/js/custom/cropper/cropper.css') }}" rel="stylesheet">
@endpush

@extends('layouts.dash-layout')

@section('content')
 <!-- App container starts -->
 <div class="app-container">

 <div class="app-container">

          <!-- App hero header starts -->
          <div class="app-hero-header d-flex align-items-center">

            <!-- Breadcrumb starts -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Add Doctor
              </li>
            </ol>
           

          </div>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body">
                 <form id="" action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <!-- Custom tabs starts -->
                    <div class="custom-tabs-container">

                      <!-- Nav tabs starts -->
                      <ul class="nav nav-tabs" id="customTab2" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA" role="tab"
                            aria-controls="oneA" aria-selected="true"><i class="ri-briefcase-4-line"></i> Personal
                            Details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="tab-twoA" data-bs-toggle="tab" href="#twoA" role="tab"
                            aria-controls="twoA" aria-selected="false"><i class="ri-account-pin-circle-line"></i>
                            Profile and Bio</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="tab-fourA" data-bs-toggle="tab" href="#fourA" role="tab"
                            aria-controls="fourA" aria-selected="false"><i class="ri-lock-password-line"></i>
                            FAQ</a>
                        </li>

                         <li class="nav-item" role="presentation">
                          <a class="nav-link" id="tab-fiveA" data-bs-toggle="tab" href="#fiveA" role="tab"
                            aria-controls="fiveA" aria-selected="false"><i class="ri-lock-password-line"></i>
                            Specility</a>
                        </li>
                        
                      </ul>
                      <!-- Nav tabs ends -->

                      <!-- Tab content starts -->
                      <div class="tab-content h-350">
                        <div class="tab-pane fade show active" id="oneA" role="tabpanel">

                          <!-- Row starts -->
                          <div class="row gx-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-account-circle-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="doctor_name" name="doctor_name" placeholder="Enter First Name" >
                                </div>
                              </div>
                            </div>

                             <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a1">Last Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-account-circle-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="doctor_last_name" name="doctor_last_name" placeholder="Enter First Name" >
                                </div>
                              </div>
                            </div>
                           
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="selectGender1">Gender<span
                                    class="text-danger">*</span></label>
                                  <div class="m-0">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" id="genderMale" type="radio" value="male" name="gender">
                                      <label class="form-check-label" for="genderMale">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" id="genderFemale" type="radio" value="female" name="gender" >
                                      <label class="form-check-label" for="genderFemale">Female</label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="mobile_number">Mobile Number <span
                                    class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-phone-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" >
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a5">Email ID <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-mail-open-line"></i>
                                  </span>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID">
                                </div>
                              </div>
                            </div>
                           
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a9">Professional <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-nft-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="professional" name="professional" placeholder="Enter Professional">
                                </div>
                              </div>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a8">Qualification <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-copper-diamond-line"></i>
                                  </span>
                                   <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter Qualification">
                                </div>
                              </div>
                            </div>
                            
                           
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="a6">Experience<span
                                    class="text-danger">*</span></label>
                                <div class="input-group">
                                  
                                  <input type="text" class="form-control" id="experience" name="experience" placeholder="Enter Experience">
                                </div>
                              </div>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="a6">Treatments<span
                                    class="text-danger">*</span></label>
                                <div class="input-group">
                                  
                                  <input type="text" class="form-control" id="treatments" name="treatments" placeholder="Enter Treatments" >
                                </div>
                              </div>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="a6">Location<span
                                    class="text-danger">*</span></label>
                               <div class="input-group">
                                
                                 <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" >
                                </div>
                              </div>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="a6">Pincode<span
                                    class="text-danger">*</span></label>
                                <div class="input-group">
                                  
                                  <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" >
                                </div>
                              </div>
                            </div>

                          </div>
                          <!-- Row ends -->

                        </div>
                        <div class="tab-pane fade" id="twoA" role="tabpanel">

               <!-- Row starts -->
<div class="row gx-3">
    <div class="col-sm-6 col-12">
        <div class="card mb-3">
            <div class="card-body">
                <label class="form-label">Upload Profile</label>
                <input class="form-control"type="file"id="doctor_profile"name="doctor_profile"accept=".png,.jpg,.jpeg"  onchange="previewProfile()">
           
           <input type="hidden" name="cropped_profile" id="cropped_profile">
              </div>
        </div>
    </div>

    <!-- Preview & Controls -->
    <div class="col-sm-6 col-12 text-center">
        <img id="profilePreview"
             class="img-thumbnail mb-2"
             style="display:none; width:200px; height:150px;">

        <div>
            <button class="btn btn-light btn-sm"   id="zoom_in"    type="button"   onclick="zoominImage()"style="display:none">
                <!-- <i class="bi bi-zoom-in"></i> --> +
            </button>

            <button class="btn btn-light btn-sm"  id="zoom_out"  type="button"  onclick="zoomoutImage()"  style="display:none">
                <!-- <i class="bi bi-zoom-out"></i> --> -
            </button>

            <button class="btn btn-light btn-sm"  id="btn-crop"  type="button"  style="display:none">
                Crop
            </button>

            <button class="btn btn-light btn-sm"   id="btn-reset"  type="button"  style="display:none">
                Reset
            </button>
        </div>
    </div>

    <div class="col-sm-12">
        <label class="form-label">Write Bio</label>
        <textarea class="form-control" id="doctor_bio" name="doctor_bio"></textarea>
    </div>

    <div class="col-sm-12">
        <label class="form-label">Other Info</label>
        <textarea class="form-control" id="other_info" name="other_info"></textarea>
    </div>
</div>
<!-- Row ends -->


                          <!-- Crop Modal -->
                          <div class="modal fade" id="cropModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                              <div class="modal-content">
                                <div class="modal-body text-center">
                                  <img id="cropImage" style="max-width:100%;">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" id="cropBtn">Crop Image</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>


<div class="tab-pane fade" id="fourA" role="tabpanel">
    <div id="speciality-container">

        <div class="speciality-group row">

            <div class="col-lg-12 d-flex justify-content-end">
                <div class="mb-3">
                    <button type="button" class="btn btn-success add-more">+</button>
                </div>
            </div>

            <div class="col-xxl-3 col-lg-6 col-sm-12 col-12">
                <div class="mb-3">
                    <label class="form-label">Question <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="questions[]" placeholder="Enter Question" >
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 col-12">
                <div class="mb-3">
                    <label class="form-label">Answer <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="answer[]" placeholder="Enter Answer" rows="2" ></textarea>
                </div>
            </div>

        </div>

    </div>
</div>


<div class="tab-pane fade" id="fiveA" role="tabpanel">
    <div id="speciality-container">

        <div class="speciality-group row">

            @foreach($specialities as $specialty)
    <div class="form-check">
        <input class="form-check-input"
               type="checkbox"
               name="specialties[]"
               value="{{ $specialty->id }}"
               id="specialty_{{ $specialty->id }}">
        <label class="form-check-label" for="specialty_{{ $specialty->id }}">
            {{ $specialty->name }}
        </label>
    </div>
@endforeach


        </div>

    </div>
</div>

                       
                        
                      </div>
                      <!-- Tab content ends -->

                    </div>
                    <!-- Custom tabs ends -->

                    <!-- Card acrions starts -->
                    <div class="d-flex gap-2 justify-content-end mt-4">
                      <a href="doctors-list.html" class="btn btn-outline-secondary">
                        Cancel
                      </a>
                      <button type="submit" class="btn btn-primary"> Create Doctor Profile</button>
                    </div>
                    <!-- Card acrions ends -->

                  </form>

                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

          </div>
          <!-- App body ends -->

        

        </div>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css">
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js"></script>


<script>
$(document).ready(function () {

    // Add More
    $(document).on('click', '.add-more', function () {

        let html = `
        <div class="speciality-group row mt-3">

            <div class="col-lg-12 d-flex justify-content-end">
                <div class="mb-3">
                    <button type="button" class="btn btn-danger remove">-</button>
                </div>
            </div>

            <div class="col-xxl-3 col-lg-6 col-sm-12 col-12">
                <div class="mb-3">
                    <label class="form-label">Question <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="questions[]" placeholder="Enter Question">
                    <span class="text-danger error-message" style="display: none;">Please enter a Question!</span>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 col-12">
                <div class="mb-3">
                    <label class="form-label">Answer <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="answer[]" placeholder="Enter Answer" rows="2"></textarea>
                    <span class="text-danger error-message" style="display: none;">Please enter an Answer!</span>
                </div>
            </div>

        </div>
        `;

        $("#speciality-container").append(html);
    });

    // Remove block
    $(document).on('click', '.remove', function () {
        $(this).closest('.speciality-group').remove();
    });

});
</script>


       
<style>
  
  .is-valid {
    border-color: #198754 !important;
  }

  .error-message {
    font-size: 0.75rem;
    margin-top: 4px;
  }
</style>



<script>
let originalImage = null;
let croppedImage = null;
let cropper = null;
let croppingState = 'cropping';

function previewProfile() {
    const input = document.getElementById("doctor_profile");
    const preview = document.getElementById("profilePreview");
    const cropBtn = document.getElementById("btn-crop");
    const resetBtn = document.getElementById("btn-reset");
    const zoomIn = document.getElementById("zoom_in");
    const zoomOut = document.getElementById("zoom_out");

    const file = input.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }

        preview.src = e.target.result;
        preview.style.display = "block";
        cropBtn.style.display = "inline-block";
        resetBtn.style.display = "inline-block";
        zoomIn.style.display = "inline-block";
        zoomOut.style.display = "inline-block";

        originalImage = e.target.result;
        croppedImage = null;
        croppingState = 'cropping';
        cropBtn.textContent = "Crop";

        cropper = new Cropper(preview, {
            aspectRatio: 500 / 550,
            viewMode: 1,
            autoCropArea: 1,
            background: false,
            movable: false,
            cropBoxResizable: true,
        });
    };

    reader.readAsDataURL(file);
}

// Crop / Re-crop
document.getElementById("btn-crop").onclick = function () {
    if (!cropper) return;

    if (croppingState === 'cropping') {


    const canvas = cropper.getCroppedCanvas({
    width: 500,
    height: 550
});

croppedImage = canvas.toDataURL("image/png");

// 🔥 SEND TO FORM
document.getElementById("cropped_profile").value = croppedImage;

document.getElementById("profilePreview").src = croppedImage;
      //  const canvas = cropper.getCroppedCanvas();
      //  croppedImage = canvas.toDataURL("image/png");
      //  document.getElementById("profilePreview").src = croppedImage;

        cropper.destroy();
        cropper = null;

        croppingState = 'stored';
        this.textContent = "Re-crop";
    } else {
        document.getElementById("profilePreview").src = croppedImage;
        croppingState = 'cropping';
        this.textContent = "Save";

        cropper = new Cropper(profilePreview, {
            aspectRatio: 500 / 550,
            viewMode: 1,
            autoCropArea: 1,
            background: false,
        });
    }
};

// Reset
document.getElementById("btn-reset").onclick = function () {
    const preview = document.getElementById("profilePreview");

    preview.src = originalImage;
    croppingState = 'cropping';
    document.getElementById("btn-crop").textContent = "Crop";

    if (cropper) cropper.destroy();

    cropper = new Cropper(preview, {
        aspectRatio: 500 / 550,
        viewMode: 1,
        autoCropArea: 1,
        background: false,
    });
};

// Zoom
function zoominImage() {
    if (cropper) cropper.zoom(0.1);
}

function zoomoutImage() {
    if (cropper) cropper.zoom(-0.1);
}
</script>
@endsection


