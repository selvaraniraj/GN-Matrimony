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
                <div id="form_container">
                    {!! Form::open(['method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => 'horoscopeDetailInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}            
                   
                    <div class="row gy-4 pt-3">
                        <h2>Horoscope Details</h2>
    <div class="col-md-6 text-start">
        <fieldset>
            <table class="table table-bordered table-hover align-middle">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                </colgroup>
                <tbody>
                    <tr>
                        <td><textarea name="rasi_1" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_1 : '' }}</textarea></td>
                        <td><textarea name="rasi_2" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_2 : '' }}</textarea></td>
                        <td><textarea name="rasi_3" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_3 : '' }}</textarea></td>
                        <td><textarea name="rasi_4" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_4 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_5" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_5 : '' }}</textarea></td>
                        <td colspan="2" rowspan="2" class="text-center align-middle">Rasi</td>
                        <td><textarea name="rasi_6" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_6 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_7" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_7 : '' }}</textarea></td>
                        <td><textarea name="rasi_8" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_8 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_9" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_9 : '' }}</textarea></td>
                        <td><textarea name="rasi_10" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_10 : '' }}</textarea></td>
                        <td><textarea name="rasi_11" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_11: '' }}</textarea></td>
                        <td><textarea name="rasi_12" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->rasi_12 : '' }}</textarea></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <table class="table table-bordered table-hover align-middle">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                </colgroup>
                <tbody>
                    <tr>
                        <td><textarea name="Navamsam_1" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_1 : '' }}</textarea></td>
                        <td><textarea name="Navamsam_2" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_2 : '' }}</textarea></td>
                        <td><textarea name="Navamsam_3" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_3 : '' }}</textarea></td>
                        <td><textarea name="Navamsam_4" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_4 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_5" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_5 : '' }}</textarea></td>
                        <td colspan="2" rowspan="2" class="text-center align-middle">Navamsam</td>
                        <td><textarea name="Navamsam_6" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_6 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_7" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_7 : '' }}</textarea></td>
                        <td><textarea name="Navamsam_8" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_8 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_9" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_9 : '' }}</textarea></td>
                        <td><textarea name="Navamsam_10" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_10 : '' }}</textarea></td>
                        <td><textarea name="Navamsam_11" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_11 : '' }}</textarea></td>
                        <td><textarea name="Navamsam_12" class="form-control" rows="1" style="resize: none;">{{ isset($horoscopeDetail) ? $horoscopeDetail->Navamsam_12 : '' }}</textarea></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
</div>

<div class="row gy-4 pt-3">
    <div class="col-md-12 text-center">
        <h6>Note</h6>
        <img src="{{ asset('assets/images/custom/horosocope.png') }}" class="img-fluid" alt="Horoscope Image">
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
    </div>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
</main>

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