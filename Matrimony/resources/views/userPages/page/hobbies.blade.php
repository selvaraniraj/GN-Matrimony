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
                {!! Form::open(['url' => route('app.hobbies_add.member'), 'method' => 'post',
               'autocomplete' => 'off', 'id' => 'hobbyInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <h3 class='mb-4 text-center' style="color:#740F17; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">  
               
    Hobbies & interests
</h3>
                        <div class="row gy-4 px-4">
                       
                            <div class="row gy-2">
                                <div class="col-md-">
                                    <h4>
                                        What are your hobbies and interests?
                                    </h4>
                                </div>
                            </div>
                            <div class="row gy-2">
    <div class="col-md-11">
        <div class="row">
            @foreach($hobby as $id => $name)
                <div class="col-md-6 mb-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input custom-checkbox" id="hobby_{{ $id }}" name="hobbies[]" value="{{ $id }}" 
                            {{ isset($hobbyDetail) && in_array($id, $hobbyDetail->hobbies) ? 'checked' : '' }}
                            onclick="show_otherhobby(this, {{ $id }});">
                        <label class="form-check-label" for="hobby_{{ $id }}">
                            {{ $name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="hobbies_test" class="py-2" style="{{ isset($hobbyDetail) && in_array(15, $hobbyDetail->hobbies) ? 'display:block;' : 'display:none;' }}">
            <input type="text" class="form-control" name="other_hobbies"
                placeholder="Others..." value="{{ isset($hobbyDetail) && $hobbyDetail->otherhobbies ? $hobbyDetail->otherhobbies : '' }}">
        </div>
    </div>
</div>

                            <div class="row gy-2 pt-3">
                                <div class="col-md-">
                                    <h4>
                                        Your Favourite Music?
                                    </h4>
                                </div>
                            </div>
                            <div class="row gy-2">
    <div class="col-md-11">
        @php
            $music = isset($hobbyDetail) && $hobbyDetail->music ? explode(',', $hobbyDetail->music) : [];
        @endphp

        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="music[]" value="Indian/Classical_music"
                    {{ in_array('Indian/Classical_music', $music) ? 'checked' : '' }}>
                    <label class="form-check-label" for="option1">Indian / Classical music</label>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="music[]" value="Melody_songs"
                    {{ in_array('Melody_songs', $music) ? 'checked' : '' }}>
                    <label class="form-check-label" for="option1">Melody songs</label>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="music[]" value="Western_music"
                    {{ in_array('Western_music', $music) ? 'checked' : '' }}>
                    <label class="form-check-label" for="option1">Western music</label>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" id="other_music" name="music[]" value="Others"
                    {{ in_array('Others', $music) ? 'checked' : '' }} onclick="show_othermusic(this);">
                    <label class="form-check-label" for="other_music">Others</label>
                </div>
            </div>
        </div>

        <div id="music_text" class="py-2" style="{{ in_array('Others', $music) ? 'display:block;' : 'display:none;' }}">
            <input type="text" class="form-control" name="other_music" placeholder="Others..."
                value="{{ isset($hobbyDetail) && $hobbyDetail->othermusic ? $hobbyDetail->othermusic : '' }}">
        </div>
    </div>
</div>

                            <div class="row gy-2 pt-3">
                                <div class="col-md-">
                                    <h4>
                                        Sports/Fitness you love?
                                    </h4>
                                </div>
                            </div>
                            <div class="row gy-2">
    <div class="col-md-11">
        @php
            $sports = isset($hobbyDetail) && $hobbyDetail->sports ? explode(',', $hobbyDetail->sports) : [];
        @endphp

        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="Cricket"
                    {{ in_array('Cricket', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="">Cricket</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="Carrom"
                    {{ in_array('Carrom', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="">Carrom</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="Chess"
                    {{ in_array('Chess', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="">Chess</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="Jogging"
                    {{ in_array('Jogging', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="">Jogging</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="Badminton"
                    {{ in_array('Badminton', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="">Badminton</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="Swimming"
                    {{ in_array('Swimming', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="">Swimming</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="Tennis"
                    {{ in_array('Tennis', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="">Tennis</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="FootBall"
                    {{ in_array('FootBall', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="">FootBall</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input custom-checkbox" name="sports_hobbies[]" value="Others" id="other_sports"
                    onclick="show_othersports(this);" {{ in_array('Others', $sports) ? 'checked' : '' }}>
                    <label class="form-check-label" for="other_sports">Others</label>
                </div>
            </div>
        </div>

        <div class="py-2" style="{{ in_array('Others', $sports) ? 'display:block;' : 'display:none;' }}" id="sports_text">
            <input type="text" class="form-control" name="other_sports" placeholder="Others..."
                value="{{ isset($hobbyDetail) && $hobbyDetail->othersports ? $hobbyDetail->othersports : '' }}">
        </div>
    </div>
</div>

                        </div>
                      

                        <div class="row gy-4 p-3 mb-4 justify-content-center">
    <!-- Previous Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="previousBtnHobby">Previous</button>
        </div>
    </div>

    <!-- Next Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="nextBtnHobby">Next</button>
        </div>
    </div>

    <!-- Skip Button -->
    <div class="col-sm-4 col-md-3 d-flex justify-content-center">
        <div class="button-container d-flex justify-content-center align-items-center w-100">
            <button class="btn w-90" style="box-shadow:4px 4px 10px  rgba(0, 0, 0, 0.4);background-color:#8C0000;width:150px;height:50px;" id="skipBtnHobby">Skip</button>
        </div>
    </div>
</div>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</main>
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script>
    $('#nextBtnHobby').on('click', function() {
    $('#hobbyInfoAddForm').attr('action', "{{ route('app.hobbies_add.member') }}").submit();
});

$('#previousBtnHobby').on('click', function() {
    $('#hobbyInfoAddForm').attr('action', "{{ route('app.hobby_info_previous.member') }}").submit();
});

$('#skipBtnHobby').on('click', function() {
    $('#hobbyInfoAddForm').attr('action', "{{ route('app.hobby_info_skip.member') }}").submit();
});
</script>

@endsection