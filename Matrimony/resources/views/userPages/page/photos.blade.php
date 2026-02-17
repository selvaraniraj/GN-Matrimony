@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
<main class="main">
    <div class="container">
        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 reservation-img b1">
            </div>
            <div class="col-lg-8 px-4 pt-4  reservation-form-bg" style=' border: 1px solid rgba(116, 15, 23, 0.55);box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);background-color:#FFF5F5'  data-aos="fade-up" data-aos-delay="200">
           
                <div id="form_container">
                    {!! Form::open(['method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => 'photoInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <h3  class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">  
                    photos
</h3>
                    <div class="row gy-4">
                   

                        <div class="col-lg-12 col-md-12">


                            @for ($i = 1; $i <= 5; $i++) <div class="row gy-4 pt-3">
                                <div class="col-md-3 text-md-end text-start">
                                    <label>Photos {{ $i }}</label>
                                    @if ($i == 1) <span class="spl"> *</span> @endif
                                </div>

                                <div class="col-md-5">
                                    @if(isset($photoDetails[$i-1]) && $photoDetails[$i-1]->uploadFile &&
                                    !empty($photoDetails[$i-1]->uploadFile->file_path))
                                    <div class="mb-2">
                                        <div class="mb-2">


                                            <img src="{{ asset($photoDetails[$i-1]->uploadFile->file_path) }}"
                                                alt="Photo {{ $i }}" width="100" class="img-thumbnail">
                                        </div>
                                        <input type="hidden" name="up_photo[]" id="photo{{$i}}"
                                            value="{{ $photoDetails[$i-1]->uploadFile->file_path }}">

                                        @else
                                        <input type="hidden" name="up_photo[]" id="photo{{$i}}" value="">


                                        <input type="hidden" name="old_photo[]" id="photo{{$i}}" value="">

                                        @endif
                                        <input type="file" name="photo[]" id="photoInput{{ $i }}"
                                            accept=".png,.jpg,.jpeg" class="form-control" onchange="preview({{ $i }})">

                                                          
                                        <span id="photo_error" class="error">Please Upload a Photo!</span>
                                    </div>

                                    <div class="col-md-3">
                                        <img id="preview{{ $i }}" class="img-thumbnail" src="#" alt="preview{{ $i }}"
                                            height="150px" width="150px" style="display:none">
                                            <button class="btn btn-light btn-sm mt-2" id="zoom_in{{$i}}" type="button" 
                                            onclick="zoominImage({{ $i }})" style="display:none"><i class="bi bi-zoom-in"></i></button>
                                            <button class="btn btn-light btn-sm mt-2" id="zoom_out{{$i}}" type="button" 
                                            onclick="zoomoutImage({{ $i }})" style="display:none;"><i class="bi bi-zoom-out"></i></button>
                                        <button class=" btn btn-light btn-sm  mt-2" id="btn-crop{{$i}}" type="button"
                                            style="display:none">Crop</button>
                                        <button class="btn btn-light btn-sm  mt-2" id="btn-reset{{$i}}" type="button"
                                            style="display:none">Reset</button>

                                    </div>


                                </div>
                                @endfor

                                <div class="row gy-4 p-3 mb-4 justify-content-center">
    <!-- Previous Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="previousBtn">Previous</button>
        </div>
    </div>

    <!-- Next Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="nextBtn">Next</button>
        </div>
    </div>

    <!-- Skip Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="skipBtn">Skip</button>
        </div>
    </div>
</div>


                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
</main>
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<script>
let originalImages = {};  
let croppedImages = {};   
let cropperInstances = {}; 
let croppingState = {};  

function preview(index) {
    const input = document.getElementById("photoInput" + index);
    const preview = document.getElementById("preview" + index);
    let crop_btn = document.getElementById("btn-crop" + index);
    let reset_btn = document.getElementById("btn-reset" + index);
    const zoom_in = document.getElementById("zoom_in" + index);
    const zoom_out = document.getElementById("zoom_out" + index);

    

    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            // Destroy any existing Cropper instance
            if (cropperInstances[index]) {
                cropperInstances[index].destroy();
                cropperInstances[index] = null;
            }

            preview.src = e.target.result;
            preview.style.display = "block";
            preview.style.height = "150px";
            preview.style.width = "200px";

            crop_btn.style.display = "inline-block";
            reset_btn.style.display = "inline-block";
            zoom_in.style.display = "inline-block";
            zoom_out.style.display = "inline-block";

            originalImages[index] = e.target.result;
            croppedImages[index] = null;
            croppingState[index] = 'cropping'; // Default state

            // Initialize a new Cropper instance
            cropperInstances[index] = new Cropper(preview, {
                aspectRatio: 500 / 550,
                viewMode: 1,
                background: false,
                cropBoxResizable: true,
                movable: false,
                strict: true,
                autoCropArea: 1,
            });

            // Remove existing event listeners and add new ones
            crop_btn.onclick = function () {
                if (croppingState[index] === 'cropping') {
                    // Save the cropped image and update the state
                    const croppedCanvas = cropperInstances[index].getCroppedCanvas();
                    croppedImages[index] = croppedCanvas.toDataURL("image/png");
                    preview.src = croppedImages[index];
                    cropperInstances[index].destroy();
                    cropperInstances[index] = null;
                    croppingState[index] = 'stored';
                    crop_btn.textContent = 'Re-crop';
                } else if (croppingState[index] === 'stored') {
                    // Re-enable cropping with the stored image
                    preview.src = croppedImages[index];
                    croppingState[index] = 'cropping';
                    cropperInstances[index] = new Cropper(preview, {
                        aspectRatio: 500 / 550,
                        viewMode: 1,
                        background: false,
                        cropBoxResizable: true,
                        movable: false,
                        strict: true,
                        autoCropArea: 1,
                    });
                    crop_btn.textContent = 'Save';
                }
            };
             
            
            reset_btn.onclick = function () {
    preview.src = originalImages[index]; // Reset to original image

    // Destroy the existing Cropper instance if it exists
    if (cropperInstances[index]) {
        cropperInstances[index].destroy();
    }

    // Reset the state and reinitialize the cropper
    croppingState[index] = 'cropping'; // Set the state back to 'cropping'
    crop_btn.textContent = 'Crop'; // Reset the button text to 'Crop'

    // Re-initialize the Cropper instance
    cropperInstances[index] = new Cropper(preview, {
        aspectRatio: 500 / 550,
        viewMode: 1,
        background: false,
        cropBoxResizable: true,
        movable: false,
        strict: true,
        autoCropArea: 1,
    });
};
        };

        reader.readAsDataURL(file);
    } else {
        preview.style.display = "none";
        crop_btn.style.display = "none";
        reset_btn.style.display = "none";
        zoom_in.style.display = "none";
        zoom_out.style.display = "none";
    }
}
   
     // Zoom in and zoom out functionality 
function zoominImage(previewId) {
    if (cropperInstances[previewId]) {
        cropperInstances[previewId].zoom(0.1);
    }
}

function zoomoutImage(previewId) {
    if (cropperInstances[previewId]) {
        cropperInstances[previewId].zoom(-0.1);
    }
}

  $(document).ready(function () {
    $('#nextBtn').on('click', function (e) {
       
       if (!checkIfAnyPhotoUploaded()) {
           e.preventDefault(); 
           $('#photo_error').show(); 
          
       } else {
           $('#photo_error').hide(); 
           $('#photoInfoAddForm').attr('action', "{{ route('app.photo_info_add.member') }}").submit(); // Submit the form
       }
   });

    $('#previousBtn').on('click', function () {
        $('#photoInfoAddForm').attr('action', "{{ route('app.photo_info_previous.member') }}").submit();
    });

    $('#skipBtn').on('click', function () {
        $('#photoInfoAddForm').attr('action', "{{ route('app.photo_info_skip.member') }}").submit();
    });

});
</script>

@endsection