@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
<main class="main">
    <div class="container">
        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 reservation-img b1"></div>
            <div class="col-lg-8 px-4 reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
         
            @if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                <div id="form_container">
                    <!-- Hidden input to track the existence of horoscope image -->
                    <input type="hidden" id="existing_image" value="{{ empty($member->horoscope_image) ? '0' : '1' }}">

                    {!! Form::open(['method' => 'post', 'files' => true, 'autocomplete' => 'off', 'id' => 'horoscopeInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <div class="row gy-4">
                        <h2>Horoscope Details</h2>
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 ms-4  text-start">
                                    <label>Zodiac Sign</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <select name="raasi" id="raasi_horoscope" class="form-control">
                                        <option value="">Select Raasi</option>
                                        @foreach ($raasi as $id => $name)
                                        <option value="{{ $id }}" {{ $member->raasi_id  == $id ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error" id="raasierror">Please select a Raasi!</span>
                                    @error('raasi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 ms-4  text-start">
                                    <label>Star</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="star" id="star_horoscope">
                                        <option value="">Select Star</option>
                                        @if (!empty($stararray))
            @foreach($stararray as $star)
                <option value="{{ $star['id'] }}" 
                    {{ isset($member) && $member['star_id'] == $star['id'] ? 'selected' : '' }}>
                    {{ $star['name'] }}
                </option>
            @endforeach
        @endif
                                   </select>
                                    <span id="star_dependend_error" class="error">Please select Raasi first!</span>
                                    <span id="starerror" class="error">Please select a Star!</span>
                                    @error('star')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 pt-4">
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 ms-4  text-start">
                                    <label>Birth Time</label>
                                </div>

                                <div class="col-md-2 ">
                                    <select class="form-control" id="hrs" name="hrs">
                                        <option value="Select">Hrs</option>
                                        @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}"
                                            {{ $member->hours == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-md-2 px-2">
                                    <select class="form-control" id="mins" name="mins">
                                        <option value="Select">Min</option>
                                        @for ($i = 0; $i < 60; $i++) <option value="{{ $i }}"
                                            {{ $member->mins == $i ? 'selected' : '' }}>{{ sprintf('%02d', $i) }}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" id="am" name="am">
                                        <option value="Select">AM/PM</option>
                                        <option value="AM" {{$member->am_pm	 == 'AM' ? 'selected' : '' }}>AM</option>
                                        <option value="PM" {{$member->am_pm	 == 'PM' ? 'selected' : '' }}>PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 pt-4">
                        <div class="col-md-3 ms-4  text-start">
                            <label>Birth Place</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="birth_place" name="birth_place"
                                value="{{ $member->birth_place }}" placeholder="Enter Your Birth Place">
                            <span class="error" id="birthplace_error">Please Enter Your birth_place!</span>
                            @error('birth_place')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gy-4 pt-3">
                        <div class="col-md-3 ms-4  text-start">
                            <label>Horoscope Photo</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-6">
                            <input id="horoscope_photo" type="file" name="horoscope_image" accept=".pdf,.png,.jpg,.jpeg"
                                class="form-control">
                                <span class="error" id="img_error" style="display:none;">Please Upload Your Horoscope_image or Pdf!</span>
                            <input type="hidden" name="old_horoscope_image" value="{{ $member->horoscope_image }}">
                            <p class="pt-2">
                          @if($member->horoscope_image)
                                <img src="{{ asset('assets/images/custom/' . $member->horoscope_image) }}"
                                    alt="Horoscope Image" style="width: 100px; height: auto;">
                                @endif
                            </p>
                            @error('horoscope_image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                           </div>

                    <div class="row gy-4 p-3">
                        <div class="col-md-3 ms-4  text-start">
                            <div class="button-container">
                                <button class="btn" id="previousBtn"> Previous</button>
                            </div>
                        </div>
                        <div class="col-md-3 ms-4  text-start">
                            <div class="button-container">
                                <button class="btn" id="nextBtn">Next</button>
                            </div>
                        </div>
                        <div class="col-md-3 ms-4  text-start">
                            <div class="button-container">
                                <button class="btn" id="skipBtn"> Skip</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
</main>

<script>
  $('#nextBtn').on('click', function (e) {
            e.preventDefault();
            if (horoscopevalidation()) {
                $('#horoscopeInfoAddForm').attr('action', "{{ route('app.horoscope_add.member') }}").submit();
            }
        });

    $('#previousBtn').on('click', function () {
        $('#horoscopeInfoAddForm').attr('action', "{{ route('app.horoscope_info_previous.member') }}").submit();
    });

    $('#skipBtn').on('click', function () {
        $('#horoscopeInfoAddForm').attr('action', "{{ route('app.horoscope_info_skip.member') }}").submit();
    });

    // rasi select box validations
    $(document).ready(function () {
    $('select[name="raasi"]').on('change', function () {
        var id = $('#raasi_horoscope').val();

        $.ajax({
            url: "{{ route('get_star_value') }}",
            type: "POST",
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function (data) {
                var html = '<option value="">Select Star</option>';
                var selectedStar_id = "{{ isset($member) ? $member->star_id : '' }}";

                $.each(data, function (key, star) {
                    var selected = (selectedStar_id == star.id) ? 'selected' : '';
                    html += '<option value="' + star.id + '" ' + selected + '>' + star.name + '</option>';
                });

                $('#star_horoscope').html(html);
            },
            error: function () {
                alert('Failed to fetch star values. Please try again.');
            }
        });
        return false;
    });
});

</script>

@endsection
