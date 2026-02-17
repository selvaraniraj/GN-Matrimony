@extends('layout2.user-form')

@section('title')
Home
@endsection

@section('content')
<main class="main">
    <div class="container">
        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 reservation-img b1"></div>
            <div class="col-lg-8 px-4  pt-4  reservation-form-bg" style=' border: 1px solid rgba(116, 15, 23, 0.55);box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);background-color:#FFF5F5'  data-aos="fade-up" data-aos-delay="200">
                <div id="form_container">
                    {!! Form::open([ 'method' => 'post',
                    'autocomplete' => 'off', 'id' => 'partnerInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <div class="row gy-4">
                    <h3 class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">  
                    about partner
</h3>
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 text-start">
                                    <label>Age</label>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="age_to" id="age_from">
                                        <option value="0">Select</option>
                                        @for ($i = 21; $i <= 35; $i++) <option value="{{ $i }}"
                                            {{ isset($partnerDetail) &&  $partnerDetail->age == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                            @endfor

                                    </select>

                                </div>
                                <div class="col-md-1">
                                    <p>To</p>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="age_from" id="age_to">
                                        <option value="0">Select</option>
                                        @for ($i = 21; $i <= 35; $i++) <option value="{{ $i }}"
                                            {{isset($partnerDetail) && $partnerDetail->age_from == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                            @endfor

                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <p>Years upto</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 text-start">
                                    <label>Height</label>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="height_to" id="height_from">
                                        @foreach($height as $id => $name)
                                        <option value="{{ $id }}"
                                            {{isset($partnerDetail) && $partnerDetail->height_id  == $id ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-1">
                                    <p>To</p>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="height_from" id="height_to">
                                        @foreach($height as $id => $name)
                                        <option value="{{ $id }}"
                                            {{isset($partnerDetail) && $partnerDetail->height_id_from   == $id ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <p>upto</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3  text-start">
                                    <label>Religion</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="px-2"> <input type="radio" name="per_religion" value="Hindu"
                                            {{isset($partnerDetail) && $partnerDetail->religion == 'Hindu' ? 'checked' : '' }}>Hindu</label>
                                    <label class="px-2"><input type="radio" name="per_religion" value="Christian"
                                            {{  isset($partnerDetail) && $partnerDetail->religion == 'Christian' ? 'checked' : '' }}>Christian</label>
                                    <br>

                                </div>
                            </div>
                            <div class="row gy-4 pt-3">
                                <div class="col-md-3  text-start">
                                    <label>Mother Tongue</label>
                                </div>
                                <div class="col-md-5">
                                    <label class="px-2"> <input type="radio" name="par_mother_tongue" value="Tamil"
                                            {{isset($partnerDetail) && $partnerDetail->mother_tongue == 'Tamil' ? 'checked' : '' }}>Tamil</label>
                                    <label class="px-2"><input type="radio" name="par_mother_tongue" value="Malayalam"
                                            {{isset($partnerDetail) && $partnerDetail->mother_tongue == 'Malayalam' ? 'checked' : '' }}>Malayalam</label>
                                    <label class="px-2"><input type="radio" name="par_mother_tongue" value="Telugu"
                                            {{isset($partnerDetail) && $partnerDetail->mother_tongue == 'Telugu' ? 'checked' : '' }}>Telugu</label>
                                    <br>
                                </div>
                            </div>
                            <div class="row gy-4 pt-3">
                                <div class="col-md-3  text-start">
                                    <label>Caste</label>
                                </div>
                                <div class="col-md-5">
                                    <label class="px-2"> <input type="radio" name="par_caste" value="Nadar"
                                            {{isset($partnerDetail) && $partnerDetail->caste == 'Nadar' ? 'checked' : '' }}>Nadar</label>
                                    <br>
                                </div>
                            </div>
                            <div class="row gy-4 pt-3">
                                <div class="col-md-3  text-start">
                                    <label>Dosham</label>
                                </div>
                                <div class="col-md-5">
                                    <label class="px-2"> <input type="radio" name="par_dhosam" value="No"
                                            {{isset($partnerDetail) && $partnerDetail->dosam == 'No' ? 'checked' : '' }}>No</label>
                                    <label class="px-2"> <input type="radio" name="par_dhosam" value="Yes"
                                            {{isset($partnerDetail) && $partnerDetail->dosam == 'Yes' ? 'checked' : '' }}>Yes</label>
                                    <label class="px-2"> <input type="radio" name="par_dhosam" value="Dont_Know"
                                            {{isset($partnerDetail) && $partnerDetail->dosam == 'Dont_Know' ? 'checked' : '' }}>Don't
                                        Know</label>
                                </div>
                            </div>
                            <div class="row gy-4 pt-3">
                                <div class="col-md-3  text-start">
                                    <label>Raasi</label>
                                </div>
                                <div class="col-md-4">
                                    <select multiple id="multiselect1" name="par_raasi[]" placeholder="Select Raasi"
                                        data-search="true" data-silent-initial-value-set="true">
                                        @foreach($raasi as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ isset($partnerDetail) && in_array($id, explode(',', $partnerDetail->rassi)) ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 text-start">
                                    <label>Star</label>
                                </div>
                                <div class="col-md-4">
                                    <select multiple id="multiselect2" name="par_star[]" placeholder="Select Star"
                                        data-search="true" data-silent-initial-value-set="true">
                                        @if(isset($stararray) && !empty($stararray))
                                        @foreach($stararray as $star)
                                        <option value="{{ $star['id'] }}"
                                            {{ isset($partnerDetail) && in_array($star['id'], explode(',', $partnerDetail->star)) ? 'selected' : '' }}>
                                            {{ $star['name'] }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-3 text-start">
                                    <label>Educational Qualification</label>
                                </div>

                                @php
                                $education = $partnerDetail ? explode(',', $partnerDetail->education) : [];
                                @endphp

                                <div class="col-md-4">
                                    <select multiple id="multiselect3" name="education[]" placeholder="Select Education"
                                        data-search="true" data-silent-initial-value-set="true">
                                        <option value="BE" {{ in_array('BE', $education) ? 'selected' : '' }}>BE
                                        </option>
                                        <option value="MBBS" {{ in_array('MBBS', $education) ? 'selected' : '' }}>MBBS
                                        </option>
                                        <option value="MBA" {{ in_array('MBA', $education) ? 'selected' : '' }}>MBA
                                        </option>
                                        <option value="MCA" {{ in_array('MCA', $education) ? 'selected' : '' }}>MCA
                                        </option>
                                        <option value="B.Tech" {{ in_array('B.Tech', $education) ? 'selected' : '' }}>
                                            B.Tech</option>
                                        <option value="BA" {{ in_array('BA', $education) ? 'selected' : '' }}>BA
                                        </option>
                                        <option value="MA" {{ in_array('MA', $education) ? 'selected' : '' }}>MA
                                        </option>
                                        <option value="ME" {{ in_array('ME', $education) ? 'selected' : '' }}>ME
                                        </option>
                                        <option value="Mcs" {{ in_array('Mcs', $education) ? 'selected' : '' }}>Mcs
                                        </option>
                                        <option value="B.plan" {{ in_array('B.plan', $education) ? 'selected' : '' }}>
                                            B.plan</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                        <div class="row gy-2">
                            <div class="col-md-3 text-start">
                                <label>Monthly Income</label>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" name="par_income">
                                    <option value="">Select</option>
                                    <option value="10,000-20,000"
                                        {{ isset($partnerDetail) && $partnerDetail->income == '10,000-20,000' ? 'selected' : '' }}>
                                        10,000-20,000</option>
                                    <option value="20,000-30,000"
                                        {{ isset($partnerDetail) && $partnerDetail->income == '20,000-30,000' ? 'selected' : '' }}>
                                        20,000-30,000</option>
                                    <option value="30,000-60,000"
                                        {{ isset($partnerDetail) && $partnerDetail->income == '30,000-60,000' ? 'selected' : '' }}>
                                        30,000-60,000</option>
                                    <option value="60,000-80,000"
                                        {{ isset($partnerDetail) && $partnerDetail->income == '60,000-80,000' ? 'selected' : '' }}>
                                        60,000-80,000</option>
                                    <option value="80,000-1lakh"
                                        {{ isset($partnerDetail) && $partnerDetail->income == '80,000-1lakh' ? 'selected' : '' }}>
                                        80,000-1 lakh</option>
                                    <option value="1lakh-1.5lakh"
                                        {{ isset($partnerDetail) && $partnerDetail->income == '1lakh-1.5lakh' ? 'selected' : '' }}>
                                        1 lakh-1.5lakh
                                    </option>
                                    <option value="1.5lakh-2lakh"
                                        {{ isset($partnerDetail) && $partnerDetail->income == '1.5lakh-2lakh' ? 'selected' : '' }}>
                                        1.5 lakh-2 lakh
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row gy-2">
                            <div class="col-md-3 text-start">
                                <label>About Partner</label>
                            </div>
                            <div class="col-md-5">
                                <textarea class="form-control" name="about_partner" id="about_partner" rows="5"
                                    placeholder="Message">{{ isset($partnerDetail) ? $partnerDetail->about_you : '' }}</textarea>

                            </div>
                        </div>
                        <div class="row gy-4 p-3 mb-4 justify-content-center">
    <!-- Previous Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="previousBtnPartner">Previous</button>
        </div>
    </div>

    <!-- Next Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="nextBtnPartner">Next</button>
        </div>
    </div>

    <!-- Skip Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="skipBtnPartner">Skip</button>
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
<script src="{{ asset('/js/custom/virtual-select.min.js') }}"></script>
<script>
    $('#nextBtnPartner').on('click', function () {

        $('#partnerInfoAddForm').attr('action', "{{ route('app.partnerInfo_add.member') }}").submit();
    });

    $('#previousBtnPartner').on('click', function () {
        $('#partnerInfoAddForm').attr('action', "{{ route('app.partner_info_previous.member') }}").submit();
    });

    $('#skipBtnPartner').on('click', function () {
        $('#partnerInfoAddForm').attr('action', "{{ route('app.partner_info_skip.member') }}").submit();
    });

    $(document).ready(function () {
        $('#multiselect1').on('change', function () {
            var raasiIds = $(this).val();

            if (raasiIds && raasiIds.length > 0) {
                $.ajax({
                    url: "{{ route('get_starsValue') }}",
                    type: "POST",
                    data: {
                        raasi_ids: raasiIds,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (data) {
                        var options = [];
                        var selectedStarIds = @json(isset($partnerDetail) ? explode(',',$partnerDetail -> star_id) : []);

                        $.each(data, function (index, star) {
                            options.push({
                                label: star.name,
                                value: star.id,
                                selected: selectedStarIds.includes(star.id
                                    .toString())
                            });
                        });

                        const multiselect2Element = document.querySelector('#multiselect2');
                        if (multiselect2Element && multiselect2Element.virtualSelect) {
                            multiselect2Element.virtualSelect.destroy();
                        }

                        VirtualSelect.init({
                            ele: '#multiselect2',
                            options: options,
                            multiple: true,
                            search: true,
                            placeholder: "Select Star",
                            silentInitialValueSet: true,
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("An error occurred:", error);
                        alert("Failed to load stars. Please try again.");
                    }
                });
            } else {

                const multiselect2Element = document.querySelector('#multiselect2');
                if (multiselect2Element && multiselect2Element.virtualSelect) {
                    multiselect2Element.virtualSelect.destroy(); // Destroy the existing instance
                }

                VirtualSelect.init({
                    ele: '#multiselect2',
                    options: [],
                    placeholder: "No stars available",
                });
            }
        });
    });


    VirtualSelect.init({
        ele: '#multiselect1'
    });


    VirtualSelect.init({
        ele: '#multiselect2'
    });


    VirtualSelect.init({
        ele: '#multiselect3'
    });
</script>


@endsection