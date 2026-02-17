@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
<main class="main">
    <div class="container">
        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 reservation-img b1"></div>
            <div class="col-lg-6 px-4 py-4 reservation-form-bg" style=' border: 1px solid rgba(116, 15, 23, 0.55);box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);background-color:#FFF5F5'  data-aos="fade-up" data-aos-delay="200">    <div id="form_container">
                    {!! Form::open(['method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => 'horoscopeDetailInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}            
                    <h3 class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
                    Horoscope Details</h3>
                    <div class="row gy-4 pt-3">
                   
                    @php
    function getMappedValues($value, $mapping) {
        if (!isset($value) || empty($value)) return ''; // Return empty if value is null

        $values = explode(',', $value); // Split values by comma
        $translated = [];

        foreach ($values as $v) {
            $translated[] = $mapping[$v] ?? $v; // Map values or keep original
        }

        return implode(', ', $translated); // Join values with comma
    }
@endphp

<div class="col-md-12 text-start">
    <fieldset>
        <table class="table table-bordered table-hover align-middle card shadow">
            <colgroup>
                <col style="width: 25%;">
                <col style="width: 25%;">
                <col style="width: 25%;">
                <col style="width: 25%;">
            </colgroup>
            <tbody>
                <tr>
                    <td><textarea name="rasi_1" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_1) ? getMappedValues($horoscopeDetail->rasi_1, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="rasi_2" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_2) ? getMappedValues($horoscopeDetail->rasi_2, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="rasi_3" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_3) ? getMappedValues($horoscopeDetail->rasi_3, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="rasi_4" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_4) ? getMappedValues($horoscopeDetail->rasi_4, $horoscopeMapping) : '' }}</textarea></td>
                </tr>
                <tr>
                    <td><textarea name="rasi_5" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_5) ? getMappedValues($horoscopeDetail->rasi_5, $horoscopeMapping) : '' }}</textarea></td>
                    <td colspan="2" rowspan="2" class="text-center align-middle">ராசி</td>
                    <td><textarea name="rasi_6" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_6) ? getMappedValues($horoscopeDetail->rasi_6, $horoscopeMapping) : '' }}</textarea></td>
                </tr>
                <tr>
                    <td><textarea name="rasi_7" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_7) ? getMappedValues($horoscopeDetail->rasi_7, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="rasi_8" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_8) ? getMappedValues($horoscopeDetail->rasi_8, $horoscopeMapping) : '' }}</textarea></td>
                </tr>
                <tr>
                    <td><textarea name="rasi_9" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_9) ? getMappedValues($horoscopeDetail->rasi_9, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="rasi_10" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_10) ? getMappedValues($horoscopeDetail->rasi_10, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="rasi_11" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_11) ? getMappedValues($horoscopeDetail->rasi_11, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="rasi_12" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->rasi_12) ? getMappedValues($horoscopeDetail->rasi_12, $horoscopeMapping) : '' }}</textarea></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</div>
                   
</div>


                    <div class="row gy-4 pt-3">
                
<div class="col-md-12">
    <fieldset>
        <table class="table table-bordered table-hover align-middle card shadow">
            <colgroup>
                <col style="width: 25%;">
                <col style="width: 25%;">
                <col style="width: 25%;">
                <col style="width: 25%;">
            </colgroup>
            <tbody>
                <tr>
                    <td><textarea name="Navamsam_1" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_1) ? getMappedValues($horoscopeDetail->Navamsam_1, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="Navamsam_2" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_2) ? getMappedValues($horoscopeDetail->Navamsam_2, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="Navamsam_3" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_3) ? getMappedValues($horoscopeDetail->Navamsam_3, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="Navamsam_4" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_4) ? getMappedValues($horoscopeDetail->Navamsam_4, $horoscopeMapping) : '' }}</textarea></td>
                </tr>
                <tr>
                    <td><textarea name="Navamsam_5" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_5) ? getMappedValues($horoscopeDetail->Navamsam_5, $horoscopeMapping) : '' }}</textarea></td>
                    <td colspan="2" rowspan="2" class="text-center align-middle">அம்சம்</td>
                    <td><textarea name="Navamsam_6" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_6) ? getMappedValues($horoscopeDetail->Navamsam_6, $horoscopeMapping) : '' }}</textarea></td>
                </tr>
                <tr>
                    <td><textarea name="Navamsam_7" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_7) ? getMappedValues($horoscopeDetail->Navamsam_7, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="Navamsam_8" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_8) ? getMappedValues($horoscopeDetail->Navamsam_8, $horoscopeMapping) : '' }}</textarea></td>
                </tr>
                <tr>
                    <td><textarea name="Navamsam_9" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_9) ? getMappedValues($horoscopeDetail->Navamsam_9, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="Navamsam_10" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_10) ? getMappedValues($horoscopeDetail->Navamsam_10, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="Navamsam_11" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_11) ? getMappedValues($horoscopeDetail->Navamsam_11, $horoscopeMapping) : '' }}</textarea></td>
                    <td><textarea name="Navamsam_12" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail->Navamsam_12) ? getMappedValues($horoscopeDetail->Navamsam_12, $horoscopeMapping) : '' }}</textarea></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</div>


                    </div>

                    <div id="error-message" style="color: red;"></div> <!-- Error message display -->



<!-- <div class="row gy-4 pt-3">
    <div class="col-md-12 text-center">
        <h6>Note</h6>
        <img src="{{ asset('assets/images/custom/horosocope.png') }}" class="img-fluid" alt="Horoscope Image">
    </div>
</div> -->


<div class="row gy-4 p-3 mb-4 justify-content-center">
    <!-- Previous Button -->
    <div class="col-sm-4 col-md-4 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="previousBtn">Previous</button>
        </div>
    </div>

    <!-- Next Button -->
    <div class="col-sm-4 col-md-4 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="nextBtn">Next</button>
        </div>
    </div>

    <!-- Skip Button -->
    <div class="col-sm-4 col-md-4 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="skipBtn">Skip</button>
        </div>
    </div>
</div>

                    {!! Form::close() !!}
                </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-12 card shadow" style='border-left: none !important; border: 1px solid rgba(116, 15, 23, 0.55);background-color:#FFF5F5'>   <!-- <h3 style="margin-top:40px;color: #ce1212; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
            Astrological Elements</h3> -->
            <div class="card-header text-white text-center" style='background-color:#8C0000'>
                    <h5  class="mt-1 text-white">Astrological Elements</h5>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><strong>சனி</strong> <i class="bi bi-arrow-right"></i> San</li>
                    <li class="list-group-item"><strong>சூரியன்</strong> <i class="bi bi-arrow-right"></i> Sur</li>
                    <li class="list-group-item"><strong>லக்</strong> <i class="bi bi-arrow-right"></i> Lag</li>
                    <li class="list-group-item"><strong>சந்திரன்</strong> <i class="bi bi-arrow-right"></i> Cha</li>
                    <li class="list-group-item"><strong>மந்தினி</strong> <i class="bi bi-arrow-right"></i> Man</li>
                    <li class="list-group-item"><strong>செவ்வாய்</strong> <i class="bi bi-arrow-right"></i> Sev</li>
                    <li class="list-group-item"><strong>குரு</strong> <i class="bi bi-arrow-right"></i> Kur</li>
                    <li class="list-group-item"><strong>கேது</strong> <i class="bi bi-arrow-right"></i> Ket</li>
                    <li class="list-group-item"><strong>ராகு</strong> <i class="bi bi-arrow-right"></i> Rag</li>
                    <li class="list-group-item"><strong>வியாழன்</strong> <i class="bi bi-arrow-right"></i> Vya</li>
                    <li class="list-group-item"><strong>புதன்</strong> <i class="bi bi-arrow-right"></i> Pud</li>
                    <li class="list-group-item"><strong>சுக்கிரன்</strong> <i class="bi bi-arrow-right"></i> Chu</li>
                </ul>
            </div>
        </div>



            </div>
        </div>
   
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
</main>

<style>
      .list-group{
         background-color:#FFF5F5  !important;
    }

        .list-group-item {
            /* background-color:#FFF5F5  !important; */
            border: none; /* Restore border */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
    <script>
     $(document).ready(function () {
    $("textarea").on("input", function () {
        let value = $(this).val();
        let sanitizedValue = value.replace(/[^a-z\u0B80-\u0BFF,]/g, ""); 
        $(this).val(sanitizedValue.toLowerCase()); 

        if (sanitizedValue !== "" && !/^([a-z\u0B80-\u0BFF]{3},)*[a-z\u0B80-\u0BFF]{3}$/.test(sanitizedValue)) {
            $('#error-message').text("Please enter the text in groups of three characters followed by a comma.");
            $("#horoscopeDetailInfoAddForm").submit(function(event) {
                event.preventDefault(); 
            });
        } else {
            $('#error-message').text(""); 
            $("#horoscopeDetailInfoAddForm").off('submit'); 
        }
    });

    // $("#horoscopeDetailInfoAddForm").on("submit", function(event) {
    //     let value = $("textarea").val().trim();
        
    //     if (value !== "" && !/^([a-z\u0B80-\u0BFF]{3},)*[a-z\u0B80-\u0BFF]{3}$/.test(value)) {
    //         event.preventDefault();
    //         $('#error-message').text("Please enter the text in groups of three characters followed by a comma.");
    //     }
    // });
    
});

    </script>


<script>
$('#nextBtn').on('click', function() {
        $('#horoscopeDetailInfoAddForm').attr('action', "{{ route('app.horoscopeDetail_add.member') }}").submit();
    });

    $('#previousBtn').on('click', function() {
        $('#horoscopeDetailInfoAddForm').attr('action', "{{ route('app.horoscopeDetail_info_previous.member') }}").submit();
    });

    $('#skipBtn').on('click', function() {
        $('#horoscopeDetailInfoAddForm').attr('action', "{{ route('app.horoscopeDetail_info_skip.member') }}").submit();
    });
</script>



@endsection