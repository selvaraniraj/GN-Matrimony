@extends('layout2.user-form')

@section('title')
Single page
@endsection

@section('content')
<main>
    <div class="container" style="background-color: #F8F8F8;">
        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
            <form id="form2" role="form" class="php-email-form">
            <div class="row ms-5 mb-4 text-start">
            <!-- <button class="btn text-start" onclick="history.back()">
            <i class="bi bi-arrow-left" style="font-size: 1.5rem;color:black;"></i>
         </button> -->
         <h5 class="card-title mt-2" style="font-weight: bold;color:#8C0000;">My Profile</h5>
</div>
                <div class="row ms-5 card p-3">
                    <div class="col-lg-12 col-md-12">

                        <div class="row gy-4 mb-2">
                            <div class="col-md-4">
                                <h4 class="icon-heading"
                                 style="display: flex;align-items: center;  gap: 10px; "> Basic
                                    Information</h4>
                            </div>

                            <div class="col-md-8">
                            <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editBasic">
    <i class="bi bi-pencil pe-2"></i>Edit
</button>
                            </div>

                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Name</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified" type="text" id="age"
                                            name="age" value="{{ old('name', $member->name) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Profilecreatedby</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified" type="text"
                                                id="age" name="age"
                                                value="{{  old('created_by_relation', $member->created_by_relation) }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Date of birth</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="without-border icon-heading not-specified" type="text" id="age"
                                            name="age" value="{{ old('dob', $member->dob) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Gender</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border specified" type="text" id="age" name="age"
                                                value="{{ old('gender', $member->gender) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Email</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="without-border specified" type="text" id="age" name="age"
                                            value="{{ old('email', $member->email) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Mobile Number</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border specified" type="text" id="age" name="age"
                                                value="{{ old('mobile', $member->mobile) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <hr class="m-2">
                    </hr> -->
                    <div class="col-lg-12 col-md-12">
                        
                        <div class="row gy-4 my-3">
                            <div class="col-md-4">
                                <h4 class="icon-heading" style="display: flex;  align-items: center; gap: 10px; ">Ethinicity Information </h4>
                            </div>
                            <div class="col-md-8">
                            <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editEthinicity">
    <i class="bi bi-pencil pe-2"></i>Edit
</button>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Religion</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified"
                                            style="display: flex;align-items: center;gap: 10px; " type="text" id="age"
                                            name="age" value="{{old( 'religion', $member->religion) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Mother Tongue</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age"
                                                value="{{ old('mothertongue', $member->mothertongue) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>SubCaste</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified"
                                            style="display: flex;align-items: center;gap: 10px; " type="text" id="age"
                                            name="age" value="{{  old('caste', $member ->caste) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Village Temple</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age"
                                                value="{{old('village_temple', $member->village_temple ?? 'Not specified')}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Family God</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified"
                                            style="display: flex;align-items: center;gap: 10px; " type="text" id="age"
                                            name="age" value="{{ old('name', $member->family_god ?? 'Not specified') }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr>
                        </hr> -->
                        <div class="col-lg-12 col-md-12">
                           
                            <div class="row gy-4 my-3">
                                <div class="col-md-4">
                                    <h4 class="icon-heading" style="display: flex;align-items: center; gap: 10px; ">
                                    Horoscope Details </h4>
                                    
                                </div>


                            <div class="col-md-8">
                            <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editHoroscope">
    <i class="bi bi-pencil pe-2"></i>Edit
</button>
                            </div>


                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Zodiac Sign</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{ $raasiName ?? 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Star</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{ $starName ?? 'Not specified' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Birth Time</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age"
                                                value="{{ $member->hours . '.' . $member->mins . '  ' . $member->am_pm ?? 'Not specified'}}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Birth Place</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{$member->birth_place ?? 'Not specified' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Horoscope Photos</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            
                                            @if(!empty($member->horoscope_image))
                                            <div class="mt-2">
                                                <img src="{{ asset('assets/images/custom/' . $member->horoscope_image) }}"
                                                    alt="Horoscope Image" style="max-width: 100%; height: auto;">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Dosham</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{$member->dosham ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row gy-4 pt-3">
                        <h6>Horoscope Details</h6>
                        <p> So-Sooriyan, Ch-Chandran, Se-Sevvai, Bu-Budhan, Su-Sukran, Sa-Sani, Gu-Guru, Ra-Rahu, Ke-Kethu, Lu-Lagnam</p>
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
                       <td>
                     <textarea name="rasi_1" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail->rasi_1 : '' }}</textarea>
                   </td>
                        <td><textarea name="rasi_2" class="form-control" rows="1" style="resize: none;" disabled> {{ $horoscopeDetail ? $horoscopeDetail -> rasi_2 : '' }}</textarea></td>
                        <td><textarea name="rasi_3" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_3 : '' }}</textarea></td>
                        <td><textarea name="rasi_4" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_4 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_5" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_5: '' }}</textarea></td>
                        <td colspan="2" rowspan="2" class="text-center align-middle">Rasi</td>
                        <td><textarea name="rasi_6" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_6 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_7" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_7 : '' }}</textarea></td>
                        <td><textarea name="rasi_8" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_8 : '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="rasi_9" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_9 : '' }}</textarea></td>
                        <td><textarea name="rasi_10" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_10 : '' }}</textarea></td>
                        <td><textarea name="rasi_11" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> rasi_11: '' }}</textarea></td>
                        <td><textarea name="rasi_12" class="form-control" rows="1" style="resize: none;" disabled>{{$horoscopeDetail ? $horoscopeDetail -> rasi_12 : ''}}</textarea></td>
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
                        <td><textarea name="Navamsam_1" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_1: '' }}</textarea></td>
                        <td><textarea name="Navamsam_2" class="form-control" rows="1" style="resize: none;" disabled>{{$horoscopeDetail ? $horoscopeDetail -> Navamsam_2: '' }}</textarea></td>
                        <td><textarea name="Navamsam_3" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_3: '' }}</textarea></td>
                        <td><textarea name="Navamsam_4" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_4: '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_5" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_5: '' }}</textarea></td>
                        <td colspan="2" rowspan="2" class="text-center align-middle">Navamsam</td>
                        <td><textarea name="Navamsam_6" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_6: '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_7" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_7: '' }}</textarea></td>
                        <td><textarea name="Navamsam_8" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_8: '' }}</textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="Navamsam_9" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_9: '' }}</textarea></td>
                        <td><textarea name="Navamsam_10" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_10: '' }}</textarea></td>
                        <td><textarea name="Navamsam_11" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_11: '' }}</textarea></td>
                        <td><textarea name="Navamsam_12" class="form-control" rows="1" style="resize: none;" disabled>{{ $horoscopeDetail ? $horoscopeDetail -> Navamsam_12: '' }}</textarea></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
</div>


                        </div>
                        <!-- <hr>
                        </hr> -->
                        <div class="col-lg-12 col-md-12">
                            
                            <div class="row gy-4 my-3">
                                <div class="col-md-4">
                                    <h4 class="icon-heading" style="display: flex; align-items: center;   gap: 10px; ">
                                    Profile</h4>
                                   
                                </div>
                                <div class="col-md-8">
                                <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editProfile">
    <i class="bi bi-pencil pe-2"></i>Edit
</button>
                                </div>
                                
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Body Composition</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                 name="age" value="{{ $memberAddionalDetail->body_type ?? 'Not specified' }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Height</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">

                                            @php
    $addionalheight = (optional($memberAddionalDetail)->height_name && optional($memberAddionalDetail)->height_name !== 'Select') 
        ? optional($memberAddionalDetail)->height_name 
        : 'Not specified';
@endphp


<input class="without-border" type="text" id="height" name="height"
       value="{{ $addionalheight }}" disabled>
                                                <!-- <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age"
                                                    value="{{ $memberAddionalDetail->height_name ?? 'Not specified'  }}"
                                                    disabled> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between"
                                            disabled>
                                            <label>Weight</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-8">

                                       

@php
    $addionalweight = (isset($memberAddionalDetail) && $memberAddionalDetail->weight_name && $memberAddionalDetail->weight_name !== 'Select')
        ? $memberAddionalDetail->weight_name
        : 'Not specified';
@endphp


<input class="without-border" type="text" id="height" name="height"
       value="{{ $addionalweight }}" disabled>
                                            <!-- <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age"
                                                value="{{ $memberAddionalDetail->weight_name ?? 'Not specified' }}"
                                                disabled> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Deficiency</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                            @php
    $disabilityStatus = 'Not specified';
    if (isset($memberAddionalDetail)) {
        if ($memberAddionalDetail->disablitiy == 1) {
            $disabilityStatus = 'Normal';
        } elseif ($memberAddionalDetail->disablitiy == 2) {
            $disabilityStatus = 'Challenged';
        }
    }
@endphp

<input class="without-border icon-heading not-specified"
    style="display: flex; align-items: center; gap: 10px;" 
    type="text"
    id="age" name="age"
    value="{{ $disabilityStatus }}"
    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Eating Habits</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-8">
                                        @php
    $eatingHabitValue = optional($memberAddionalDetail)->eating_habit;
    $eatingHabit = $eatingHabitValue == 1 ? 'Vegetarian' : ($eatingHabitValue == 2 ? 'Non-Vegetarian' : 'Not specified');
@endphp

<input class="without-border icon-heading not-specified"
    style="display: flex; align-items: center; gap: 10px;" 
    type="text"
    id="age" name="age"
    value="{{ $eatingHabit }}"
    disabled>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Alcholism</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">

                                            @php
    $drinkingHabit = 'Not specified';
    $smokingHabit = 'Not specified';
    $aboutYou = 'Not specified';

    if (isset($memberAddionalDetail)) {
        // Drinking
        if ($memberAddionalDetail->drinking_habit == 1) {
            $drinkingHabit = 'No';
        } elseif ($memberAddionalDetail->drinking_habit == 2) {
            $drinkingHabit = 'Occasionally';
        } elseif ($memberAddionalDetail->drinking_habit == 3) {
            $drinkingHabit = 'Yes';
        }

        // Smoking
        if ($memberAddionalDetail->smoking_habit == 1) {
            $smokingHabit = 'No';
        } elseif ($memberAddionalDetail->smoking_habit == 2) {
            $smokingHabit = 'Occasionally';
        } elseif ($memberAddionalDetail->smoking_habit == 3) {
            $smokingHabit = 'Yes';
        }

        // About You
        $aboutYou = $memberAddionalDetail->about_you ?? 'Not specified';
    }
@endphp
<input class="without-border icon-heading not-specified"
    style="display: flex; align-items: center; gap: 10px;" 
    type="text" id="age" name="age"
    value="{{ $drinkingHabit }}"
    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Smoking Habit</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-8">
                                        <input class="without-border icon-heading not-specified"
    style="display: flex; align-items: center; gap: 10px;" 
    type="text" id="age" name="age"
    value="{{ $smokingHabit }}"
    disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>About You</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
    style="display: flex; align-items: center; gap: 10px;" 
    type="text" id="age" name="age"
    value="{{ $aboutYou }}"
    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr>
                        </hr> -->
                        <div class="col-lg-12 col-md-12">
                            
                            <div class="row gy-4 my-3">
                                <div class="col-md-4">
                                    <h4 class="icon-heading" style="display: flex;  align-items: center; gap: 10px; ">
                                    Address</h4>
                                   
                                </div>

                                <div class="col-md-8">
                                <button type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editAddress">
    <i class="bi bi-pencil pe-2"></i>Edit
</button>
                                </div>

                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>State</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$stateName ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>City</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{$cityName ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Taluk</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{  $talukName ?? 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Village</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{ $member->village ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Land Mark</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{ $member->land_mark ?? 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Door No</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{ $member->door_no ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Land Mark</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{ $member->land_mark ?? 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Permanent Address</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age"  value="{{ $member->permanent_address == 1 ? 'Current Address' : ($member->permanent_address == 2 ? 'Other Address' : $member->permanent_address ?? 'Not specified') }}"  disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <h4 class="icon-heading"
                                        style="display: flex;   align-items: center;   gap: 10px; "> </h4>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>State</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$permanentstateName ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>City</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{$permanentcityName ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Taluk</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$permanenttalukName ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between"
                                                disabled>
                                                <label>Village</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{$member->permanent_village ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between"
                                            disabled>
                                            <label>Pincode</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$member->permanent_pincode ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Door No</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{$member->permanent_door_no ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Land Mark</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$member->permanent_land_mark ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <hr>
                    </hr> -->
                    <div class="col-lg-12 col-md-12">
                       
                        <div class="row gy-4 my-3">
                            <div class="col-md-4">
                                <h4 class="icon-heading" style="display: flex;align-items: center; gap: 10px; "> Personal</h4>
                            </div>
                            <div class="col-md-8">
                            <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editPersonal">
    <i class="bi bi-pencil pe-2"></i>Edit
</button>
</div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Family Status</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified"
                                            style="display: flex;align-items: center;gap: 10px; " type="text" id="age"
                                            name="age" value="{{$familyDetail->family_status ?? 'Not specified'}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Family Type</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$familyDetail->family_type ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Family Value</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified"
                                            style="display: flex;align-items: center;gap: 10px; " type="text" id="age"
                                            name="age" value="{{$familyDetail->family_values ?? 'Not specified'}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Paternity</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$familyDetail->father_status ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Mother Status</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified"
                                            style="display: flex;align-items: center;gap: 10px; " type="text" id="age"
                                            name="age" value="{{$familyDetail->mother_status ?? 'Not specified'}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Brother</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$familyDetail->number_of_brothers ?? 'Not specified'}}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Sister</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified"
                                            style="display: flex;align-items: center;gap: 10px; " type="text" id="age"
                                            name="age" value="{{$familyDetail->number_of_sisters ?? 'Not specified'}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Parent's Contact No</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $familyDetail->parent_contact_number ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Ancestral Origin</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border icon-heading not-specified"
                                            style="display: flex;align-items: center;gap: 10px; " type="text" id="age"
                                            name="age" value="{{$familyDetail->ancestral_origin ?? 'Not specified'}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr>
                        </hr> -->
                        <div class="col-lg-12 col-md-12">
                           
                            <div class="row gy-4 my-3">
                                <div class="col-md-4">
                                    <h4 class="icon-heading" style="display: flex; align-items: center; gap: 10px; ">
                                    Professional </h4>
                                </div>
                                <div class="col-md-8">
                            <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editProfessional">
    <i class="bi bi-pencil pe-2"></i>Edit
</button></div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Higher Education</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$eduction_id}}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>College/School</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{$educationDetail->college_inst ?? 'Not specified'}}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Organization</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border icon-heading not-specified"
                                                style="display: flex;align-items: center;gap: 10px; " type="text"
                                                id="age" name="age" value="{{$educationDetail->organization ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4 mb-2">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Job</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border icon-heading not-specified"
                                                    style="display: flex;align-items: center;gap: 10px; " type="text"
                                                    id="age" name="age" value="{{$educationDetail->employee_in ?? 'Not specified'}}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Profession</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $educationDetail->occuption ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Company Name</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $educationDetail->company_name ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Destination</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $educationDetail->destination ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Income</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $educationDetail->income ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Country</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $educationDetail->location ?? 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>State</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $stateNameProfessional ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>City</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $cityNameProfessional ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Taluk</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $talukNameProfessional ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Pincode</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{  $educationDetail->pincode  ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Address</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $educationDetail->address ?? 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr>
                        </hr> -->
                        <div class="col-lg-12 col-md-12">
                           
                        <div class="row gy-4 my-3">
    <div class="col-md-4">
        <h4 class="icon-heading" style="display: flex; align-items: center; gap: 10px;">
            Photos
        </h4>
    </div>
    <div class="col-md-8">
        <button type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editPhotos">
            <i class="bi bi-pencil pe-2"></i>Edit
        </button>
    </div>
</div>
                            <!-- Photo 1 -->
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="row gy-4 mb-2">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Photo 1</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            @if(isset($photoDetails[0]) &&
                                            !empty($photoDetails[0]->uploadFile->file_path))
                                            <div class="mb-2">
                                                <img src="{{ asset($photoDetails[0]->uploadFile->file_path) }}"
                                                    alt="Photo 1" class="img-thumbnail"
                                                    style="width: 100px; height: 100px;">
                                            </div>

                                            @else
                                            <input type="file" name="photo[]" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Photo 2 -->
                                <div class="col-md-6">
                                    <div class="row gy-4 mb-2">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Photo 2</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            @if(isset($photoDetails[1]) &&
                                            !empty($photoDetails[1]->uploadFile->file_path))
                                            <div class="mb-2">
                                                <img src="{{ asset($photoDetails[1]->uploadFile->file_path) }}"
                                                    alt="Photo 2" class="img-thumbnail"
                                                    style="width: 100px; height: 100px;">
                                            </div>

                                            @else

                                            <input type="file" name="photo[]" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo 3 -->
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="row gy-4 mb-2">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Photo 3</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            @if(isset($photoDetails[2]) &&
                                            !empty($photoDetails[2]->uploadFile->file_path))
                                            <div class="mb-2">
                                                <img src="{{ asset($photoDetails[2]->uploadFile->file_path) }}"
                                                    alt="Photo 3" class="img-thumbnail"
                                                    style="width: 100px; height: 100px;">
                                            </div>

                                            @else

                                            <input type="file" name="photo[]" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Photo 4 -->
                                <div class="col-md-6">
                                    <div class="row gy-4 mb-2">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Photo 4</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            @if(isset($photoDetails[3]) &&
                                            !empty($photoDetails[3]->uploadFile->file_path))
                                            <div class="mb-2">
                                                <img src="{{ asset($photoDetails[3]->uploadFile->file_path) }}"
                                                    alt="Photo 4" class="img-thumbnail"
                                                    style="width: 100px; height: 100px;">
                                            </div>

                                            @else

                                            <input type="file" name="photo[]" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo 5 -->
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="row gy-4 mb-2">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Photo 5</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            @if(isset($photoDetails[4]) &&
                                            !empty($photoDetails[4]->uploadFile->file_path))
                                            <div class="mb-2">
                                                <img src="{{ asset($photoDetails[4]->uploadFile->file_path) }}"
                                                    alt="Photo 5" class="img-thumbnail"
                                                    style="width: 100px; height: 100px;">
                                            </div>
                                            @else
                                            <input type="file" name="photo[]" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- <hr>
                            </hr> -->
                            <div class="col-lg-12 col-md-12">
                                
                                <div class="row gy-4 my-3">
                                    <div class="col-md-4">
                                        <h4 class="icon-heading"
                                            style="display: flex; align-items: center; gap: 10px; "> Hobbies & Interest</h4>
                                    </div>
                                    <div class="col-md-8">
                            <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editHobbies">
    <i class="bi bi-pencil pe-2"></i>Edit
</button>
</div>
                                </div>

                               
                                <div class="row gy-4 mb-2">
                                    <div class="col-md-6">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Waht are your Hobbies & Interest?</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
    value="{{ $displayHobbies }}"
    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="row gy-4">
                                                <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                    <label>Your Favourite Music?</label>
                                                    <span class="text-md-end">:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ (isset($hobbyDetail->music) ? $hobbyDetail->music : '') . (isset($hobbyDetail->othermusic) ? $hobbyDetail->othermusic : '') }}"

                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-4 mb-2">
                                    <div class="col-md-6">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Sports/Fitness you love?</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ (isset($hobbyDetail->sports) ? $hobbyDetail->sports : '') . (isset($hobbyDetail->othersports) ? $hobbyDetail->othersports : '') }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr>
                            </hr> -->
                            <div class="col-lg-12 col-md-12">
                               
                                <div class="row gy-4 my-3">
                                    <div class="col-md-4">
                                        <h4 class="icon-heading" style="display: flex;align-items: center; gap: 10px; ">
                                        About Partner </h4>
                                    </div>
                            <div class="col-md-8">
                            <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editPartner">
                            <i class="bi bi-pencil pe-2"></i>Edit
                            </button>
                            </div>
                                                        </div>
                                <div class="row gy-4 mb-2">
                                    <div class="col-md-6">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Age</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                            value="{{ (isset($partnerDetail->age) && isset($partnerDetail->age_from) && $partnerDetail->age > 0 && $partnerDetail->age_from > 0) 
                    ? $partnerDetail->age . ' to ' . $partnerDetail->age_from 
                    : 'Not specified' }}"
       disabled>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="row gy-4">
                                                <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                    <label>Height</label>
                                                    <span class="text-md-end">:</span>
                                                </div>
                                                <div class="col-md-4">
                                                @php
    $partnerheight = ($partnerDetail->height_min_name && $partnerDetail->height_min_name !== 'Select') 
                ? $partnerDetail->height_min_name 
                : 'Not specified';
    $partnerheight .= ' - ';
    $partnerheight .= ($partnerDetail->height_max_name && $partnerDetail->height_max_name !== 'Select') 
                ? $partnerDetail->height_max_name 
                : 'Not specified';
@endphp

<input class="without-border" type="text" id="height" name="height"
       value="{{ $partnerheight }}" disabled>

                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Religion</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $partnerDetail->religion ?? 'Not specified'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Mother Tongue</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $partnerDetail->mother_tongue ?? 'Not specified' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Caste</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border" type="text" id="age" name="age"
                                            value="{{ $partnerDetail->caste ?? 'Not specified' }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Dosham</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $partnerDetail->dosam ?? 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Raasi</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border" type="text" id="age" name="age"
                                            value="{{ $partnerDetail->partner_raasi ?? 'Not specified' }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Star</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $partnerDetail->partner_star ?? 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>Educational Qualification</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border" type="text" id="age" name="age"
                                            value="{{ $partnerDetail->education?? 'Not specified' }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Monthly Income</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $partnerDetail->income ?? 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-md-6">
                                <div class="row gy-4">
                                    <div class="col-md-4 d-flex align-items-center justify-content-between">
                                        <label>About Partner</label>
                                        <span class="text-md-end">:</span>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="without-border" type="text" id="age" name="age"
                                            value="{{ $partnerDetail->about_you ?? 'Not specified' }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- <hr>
                        </hr> -->
                        <div class="col-lg-12 col-md-12">
                            
                            <div class="row gy-4 my-3">
                                <div class="col-md-4">
                                    <h4 class="icon-heading" style="display: flex;  align-items: center;  gap: 10px; ">
                                    Reference </h4>
                                </div>
                                <div class="col-md-8">
                                    <button  type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#editRelative">
    <i class="bi bi-pencil pe-2"></i>Edit
</button>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Name</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{  $relative ? $relative->first_relative_name : '' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Type of relation</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{  $relative ? $relative->first_relative_relation : '' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Profession</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{  $relative ? $relative->first_relative_bussiness : '' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Contact No.</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $relative ? $relative->first_relative_number : 'Not specified'}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Name</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $relative ? $relative->second_relative_name : 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Type of relation</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $relative ? $relative->second_relative_relation : 'Not specified' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Profession</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $relative ? $relative-> second_relative_bussiness : 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Contact No.</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $relative ? $relative->second_relative_number : 'Not specified' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Name</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $relative ? $relative->third_relative_name : 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Type of relation</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $relative ? $relative->third_relative_relation : 'Not specified' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-2">
                                <div class="col-md-6">
                                    <div class="row gy-4">
                                        <div class="col-md-4 d-flex align-items-center justify-content-between">
                                            <label>Profession</label>
                                            <span class="text-md-end">:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="without-border" type="text" id="age" name="age"
                                                value="{{ $relative ? $relative->third_relative_bussiness : 'Not specified' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row gy-4">
                                            <div class="col-md-4 d-flex align-items-center justify-content-between">
                                                <label>Contact No.</label>
                                                <span class="text-md-end">:</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="without-border" type="text" id="age" name="age"
                                                    value="{{ $relative ? $relative->third_relative_number : '' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
            </form>
        </div>
    </div>
</main>


<!-- Address edit popup -->
<div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Address Information Update</h5>
                <button type="button" class="btn-close close-btn text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text">
                <div id="form_container">
                    {!! Form::open([ 'url' => route('app.address_update.member'), 'method'=> 'post', 'class' => '', 'autocomplete' => 'off', 'id' => 'basicInfoAddForm']) !!}
                    {{ csrf_field() }}

                  
                    {!! Form::hidden('member_id', $member->id) !!}
                  <div class="row gy-4">
                     <div class="col-lg-12 col-md-12">
                        <div class="row gy-4">
                           <div class="col-md-4 ms-4 text-start">
                              <label>State</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <select class="form-control" name="state" id="state">
                                 <option value="">Select </option>
                                 @foreach($state as $id => $name)
                                               <option value="{{ $id }}" {{ isset($member) && $member->state == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                              </select>
                              @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row gy-4 pt-4">
                     <div class="col-lg-12 col-md-12">
                        <div class="row gy-4">
                           <div class="col-md-4 ms-4 text-start">
                              <label>City</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <select class="form-control" name="city" id="city">
                                 <option value="">Select </option>
                                 @if (isset($cityarray) && !empty($cityarray))
                       @foreach($cityarray as $city)
                    <option value="{{ $city['id'] }}" {{ isset($member) && $member['city'] == $city['id'] ? 'selected' : '' }}>
                        {{ $city['name'] }}
                      </option>
                     @endforeach
                    @endif
                              </select>
                              @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row gy-4 pt-4">
                     <div class="col-lg-12 col-md-12">
                        <div class="row gy-4">
                           <div class="col-md-4 ms-4 text-start">
                              <label>Taluk</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <select class="form-control" name="taluk" id="taluk">
                                 <option value="">Select </option>
                                 @if (isset($taulkarray) && !empty($taulkarray))
                       @foreach($taulkarray as $taluk)
                    <option value="{{ $taluk['id'] }}" {{ isset($member) && $member['taluk'] == $taluk['id'] ? 'selected' : '' }}>
                        {{ $taluk['name'] }}
                      </option>
                     @endforeach
                    @endif
                              </select>
                              @error('taluk')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-4 ms-4 text-start"><label>Village</label><span class="spl">*</span></div>
                     <div class="col-md-7"><input type="text" class="form-control" id="village" name="village"
                        placeholder="Enter Your Village" value="{{ isset($member) && $member->village ? $member->village : '' }}">
                        @error('village')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                     </div>

                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-4 ms-4 text-start"><label>Pincode</label><span class="spl">*</span></div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="pincode" name="pincode"
                           placeholder="Enter Pincode"  value="{{ isset($member) && $member->pincode ? $member->pincode : '' }}"
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                           @error('pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                     </div>
                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-4 ms-4 text-start">
                        <label>Door No</label><span class="spl">*</span>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="doorno" name="doorno"
                           placeholder="Enter Door No"  value="{{ isset($member) && $member->door_no ? $member->door_no : '' }}">
                           @error('doorno')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                     </div>
                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-4 ms-4 text-start"><label>Land Mark</label><span class="spl">*</span>
                     </div>
                     <div class="col-md-7">
                        <textarea class="form-control" name="landmark" id="landmark" rows="3"
                           placeholder="">
                           {{ isset($member) ? $member->land_mark : '' }}
                        </textarea>
                        @error('landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                     </div>
                  </div>
                  <div class="row gy-4 pt-3">
                     <div class="col-md-4 ms-4 text-start"><label>Permanent Address</label></div>
                     <div class="col-md-7">
                        <label class="px-2">
                        <input type="radio" name="other_address" value="1" {{isset($member) && $member->permanent_address == '1' ? 'checked' : '' }}>
                        Same as current address</label>
                        <label class="px-2">
                        <input type="radio" name="other_address" value="2" {{isset($member) && $member->permanent_address == '2' ? 'checked' : '' }}>Other Address
                        </label>
                     </div>
                  </div>
                  <div id="permanentAddressSection" class="row gy-4" style="{{ !empty($member) && $member['permanent_address'] == '2' ? 'display:block;' : 'display:none;' }}">
                     <div class="col-lg-12 col-md-12">
                        <div class="row gy-4">
                           <div class="col-md-4 ms-4 text-start"><label>State</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <select class="form-control" name="permanent_state" id="permanent_state">
                                 <option value="Select">Select </option>
                                 @foreach($state as $id => $name)
                                    <option value="{{ $id }}" {{ isset($member) && $member->permanent_state_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-4 ms-4 text-start"><label>City</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <select class="form-control" name="permanent_city" id="permanent_city">
                                 <option value="Select">Select </option>
                                 @if (isset($permanentcityarray) && !empty($permanentcityarray))
                       @foreach($permanentcityarray as $city)
                      <option value="{{ $city['id'] }}" {{ isset($member) && $member['permanent_city_id'] == $city['id'] ? 'selected' : '' }}>
                        {{ $city['name'] }}
                      </option>
                     @endforeach
                    @endif
                              </select>
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-4 ms-4 text-start"><label>Taluk</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <select class="form-control" name="permanent_taluk" id="permanent_taluk">
                                 <option value="Select">Select </option>
                                 @if (isset($permanenttaulkarray) && !empty($permanenttaulkarray))
                       @foreach($permanenttaulkarray as $taluk)
                    <option value="{{ $taluk['id'] }}" {{ isset($member) && $member['permanent_taulk_id'] == $taluk['id'] ? 'selected' : '' }}>
                        {{ $taluk['name'] }}
                      </option>
                     @endforeach
                    @endif
                              </select>
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-4 ms-4 text-start"><label>Village</label><span
                              class="spl">*</span></div>
                           <div class="col-md-7">
                              <input type="text" class="form-control" id="permanent_village" name="permanent_village"
                                 placeholder="Enter Your Village" value="{{ isset($member) && $member->permanent_village ? $member->permanent_village : '' }}">
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-4 ms-4 text-start">
                              <label>Pincode</label>
                              <spanclass="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <input type="text" class="form-control" id="permanent_pincode" name="permanent_pincode"
                                 placeholder="Enter Pincode" value="{{ isset($member) && $member->permanent_pincode ? $member->permanent_pincode : '' }}"
                                 oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-4 ms-4 text-start">
                              <label>Door No</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <input type="text" class="form-control" id="permanent_doorno" name="permanent_doorno"
                                 placeholder="Enter Door No" value="{{ isset($member) && $member->permanent_door_no ? $member->permanent_door_no : '' }}">
                           </div>
                        </div>
                        <div class="row gy-4 pt-3">
                           <div class="col-md-4 ms-4 text-start">
                              <label>Land Mark</label><span class="spl">*</span>
                           </div>
                           <div class="col-md-7">
                              <textarea class="form-control" name="permanent_landmark" id="permanent_landmark" rows="3"
                                 placeholder="Message">
                                 {{ isset($member) ? $member->permanent_land_mark : '' }}
                              </textarea>
                           </div>
                        </div>
                     </div>
                  </div>

                    <div class="row gy-4 pt-3">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="button-container">
            <button type="submit" class="btn">Save</button>
        </div>
    </div>
</div>

                    {!! Form::close() !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


<!-- Basic edit popup -->
<div class="modal fade" id="editBasic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Basic Information Update</h5>
                <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text p-4">
                <div id="form_container">
                    {!! Form::open([ 'url' => route('app.basic_info_update.member'), 'method'=> 'post', 'class' => '', 'autocomplete' => 'off', 'id' => 'basicInfoAddForm']) !!}
                    {{ csrf_field() }}

                    {!! Form::hidden('member_id', $member->id) !!}

                    <div class="row gy-4 ">
                       
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-6 text-start">
                                    <label>Name</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Your Name" value="{{ old('name', $member->name) }}" oninput="this.value = this.value.toUpperCase();">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-6  text-start">
                                    <label>Association</label>
                                </div>
                                <div class="col-md-6">
                                {!! Form::select('association_id', $association, old('association_id', $member->association_id), ['class' => 'form-control custom_form_select_2 js_select']) !!}
                                    @error('association_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-6 text-start">
                                    <label>Profile Created by</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="profilecreatedby" name="created_by_relation">
                                        @if($member->created_by_relation != null)
                                        <option value="{{ $member->created_by_relation }}">{{ $member->created_by_relation }}</option>
                                        @else
                                        <option value="">Select</option>
                                        @endif
                                        <option value="Son" {{ old('created_by_relation', $member->created_by_relation) == 'Son' ? 'selected' : '' }}>Son</option>
                                        <option value="Daughter" {{ old('created_by_relation', $member->created_by_relation) == 'Daughter' ? 'selected' : '' }}>Daughter</option>
                                        <option value="Grandson" {{ old('created_by_relation', $member->created_by_relation) == 'Grandson' ? 'selected' : '' }}>Grandson</option>
                                        <option value="Granddaughter" {{ old('created_by_relation', $member->created_by_relation) == 'Granddaughter' ? 'selected' : '' }}>Granddaughter</option>
                                        <option value="Brother" {{ old('created_by_relation', $member->created_by_relation) == 'Brother' ? 'selected' : '' }}>Brother</option>
                                        <option value="Sister" {{ old('created_by_relation', $member->created_by_relation) == 'Sister' ? 'selected' : '' }}>Sister</option>
                                        <option value="Myself" {{ old('created_by_relation', $member->created_by_relation) == 'Myself' ? 'selected' : '' }}>Myself</option>
                                    </select>
                                    @error('created_by_relation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-md-6 text-start">
                            <label>Gender</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-6">
                            <label> <input type="radio" name="gender" value="male" {{ old('gender', $member->gender) == 'male' ? 'checked' : '' }}> Male </label>
                            <label><input type="radio" name="gender" value="female" {{ old('gender', $member->gender) == 'female' ? 'checked' : '' }}> Female</label>
                            <span class="error" id="gender_error">Please select gender.</span>
                             </br>
                            @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-md-6 text-start">
                            <label>Date of Birth</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-6">
                            <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob', $member->dob) }}">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-md-6 text-start">
                            <label for="date" class="form-label">Mobile Number</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="{{ old('mobile', $member->mobile) }}">
                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-6 text-start">
                                    <label for="date" class="form-label">Email</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="{{ old('email', $member->email) }}">
                                    @error('email')
                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 pt-3">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="button-container">
            <button type="submit" class="btn">Save</button>
        </div>
    </div>
</div>

                    {!! Form::close() !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Ethinicity Edit popup -->

    <div class="modal fade" id="editEthinicity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Ethinicity Information Update</h5>
                <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text">
                <div id="form_container">
                {!! Form::open([ 'url' => route('app.ethinicity_update.member'), 'method' => 'post', 'autocomplete' => 'off', 'id' => 'ethinicityInfoAddForm']) !!}
                   {{csrf_field()}}
                   {!! Form::hidden('member_id', $member->id) !!}
                        <div class="row gy-4">

                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-4 ms-4  text-start">
                                        <label>Religion</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                    <label class="px-2">
                        <input type="radio" name="religion" value="Hindu" {{ old( 'religion', $member->religion) == 'Hindu' ? 'checked' : '' }}> Hindu
                    </label>
                          <label class="px-2">
                        <input type="radio" name="religion" value="Christian" {{ old('religion', $member->religion) == 'Christian' ? 'checked' : '' }}> Christian
                          </label>
                         <div><span class="error" id="religion_error">Please select Religion.</span>
                         </br>
                                        @error('religion')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror</div>
                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-4 ms-4  text-start">
                                        <label>Mother Tongue</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                        <label class="px-2">
                            <input type="radio" name="mothertongue" value="Tamil" {{ old('mothertongue', $member->mothertongue) == 'Tamil' ? 'checked' : '' }}> Tamil
                        </label>
                        <label class="px-2">
                            <input type="radio" name="mothertongue" value="Malayalam" {{ old('mothertongue', $member->mothertongue) == 'Malayalam' ? 'checked' : '' }}> Malayalam
                        </label>
                        <label class="px-2">
                            <input type="radio" name="mothertongue" value="Telugu" {{ old('mothertongue', $member->mothertongue) == 'Telugu' ? 'checked' : '' }}> Telugu
                        </label>

                        <div>
                        @error('mothertongue')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                        <span class="error" id="mothertongue_error">Please select Mother Tongue.</span></div>
                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-4 ms-4  text-start">
                                        <label>Caste</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                        <label class="px-2">
                            <input type="radio" name="caste" value="Nadar" {{ old('caste', $member ->caste) == 'Nadar' ? 'checked' : '' }}> Nadar
                        </label>
                        <div>
                        @error('caste')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                        <span class="error" id="caste_error">Please select Caste.</span></div>
                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-md-4 ms-4  text-start">
                                <label>Subcaste</label>
                            </div>
                            <div class="col-md-6">
                            <select class="form-control" name="subcaste">
                    <option value="select">Select</option>
                    <option value="1" {{ old('subcaste', $member->subcaste) == '1' ? 'selected' : '' }}>Kiramani</option>
                    <option value="2" {{ old('subcaste', $member->subcaste) == '2' ? 'selected' : '' }}>Sanar</option>
                    <option value="3" {{ old('subcaste', $member->subcaste) == '3' ? 'selected' : '' }}>Sathriyar</option>
                    <option value="4" {{ old('subcaste', $member->subcaste) == '4' ? 'selected' : '' }}>Others</option>
                </select>
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-md-4 ms-4  text-start">
                                <label>Village Temple</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="village_temple" name="village_temple"
                                    value="{{ old('village_temple', $member->village_temple) }}" placeholder="Enter Your Village Temple">
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-md-4 ms-4  text-start">
                                <label>Family God</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="family_god" name="family_god"
                                value="{{ old('name', $member->family_god) }}" placeholder="Enter Your Family God">
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-md-4 ms-4  text-start">
                                <label>Known Language</label><span class="spl"> *</span>
                            </div>
                            <div class="col-md-6">
                             
                            @php
                    $languages = explode(',', $member->language);
                @endphp
                <label class="px-2">
                    <input type="checkbox" name="language[]" value="tamil" {{ in_array('tamil', $languages) ? 'checked' : '' }}> Tamil
                </label>
                <label class="px-2">
                    <input type="checkbox" name="language[]" value="english" {{ in_array('english', $languages) ? 'checked' : '' }}> English
                </label>
                <label class="px-2">
                    <input type="checkbox" name="language[]" value="malayalam" {{ in_array('malayalam', $languages) ? 'checked' : '' }}> Malayalam
                </label>
                <label class="px-2">
                    <input type="checkbox" name="language[]" value="telugu" {{ in_array('telugu', $languages) ? 'checked' : '' }}> Telugu
                </label>
<label class="px-2"> <input type="checkbox" name="language[]" value="hindi" {{ in_array('hindi', $languages) ? 'checked' : '' }}>Hindi</label>
<label class="px-2"><input type="checkbox" name="language[]" value="kannada" {{ in_array('kannada', $languages) ? 'checked' : '' }}>Kannada</label>
<label class="px-2"><input type="checkbox" name="language[]" value="Gujarti" {{ in_array('Gujarti', $languages) ? 'checked' : '' }}>Gujarti</label>
<label class="px-2"><input type="checkbox" name="language[]" value="marathi" {{ in_array('marathi', $languages) ? 'checked' : '' }}>Marathi</label>
<label class="px-2"><input type="checkbox" name="language[]" value="urdu" {{ in_array('urdu', $languages) ? 'checked' : '' }}>Urdu</label>
<label class="px-2"><input type="checkbox" name="language[]" value="others" {{ in_array('others', $languages) ? 'checked' : '' }}>Others</label>
                                
                                <br>
                                @error('language')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                <span id="languageerror" class="error">Select Known Language</span>
                            </div>
                        </div>
                </div>
                <div class="row gy-4">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="button-container">
            <button type="submit" class="btn">Save</button>
        </div>
    </div>
</div>
                 {!! Form::close() !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Horoscope Edit Popup -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
          <div class=" ">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Profile Information Update</h5>
                <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text">
                <div id="form_container">
                {!! Form::open(['url' => route('app.profile_update.member'), 'method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => 'profileInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <div class="row gy-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-6 text-start">
                                         <label>Body Composition</label>
                                     </div>
                                     <div class="col-md-6">
                                         <label class="px-2"> <input type="radio" name="body_composition"
                                                 value="Slim" {{ isset($memberAddionalDetail) && $memberAddionalDetail->body_type == 'Slim' ? 'checked' : '' }} >Slim</label>
                                         <label class="px-2"><input type="radio" name="body_composition"
                                                 value="Average" {{ isset($memberAddionalDetail) && $memberAddionalDetail->body_type == 'Average' ? 'checked' : '' }}>Average</label>
                                         <label class="px-2"><input type="radio" name="body_composition"
                                                 value="Heavy" {{ isset($memberAddionalDetail) && $memberAddionalDetail->body_type == 'Heavy' ? 'checked' : '' }} >Heavy</label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-6 text-start">
                                         <label>Height</label><span class="spl"> *</span>
                                     </div>
                                     <div class="col-md-6">
                                         <select class="form-control" name="height" id="height">
                                         <option value="">Select</option>
                                             @foreach ($height as $id => $name)
                                           <option value="{{ $id }}" {{ isset($memberAddionalDetail) && $memberAddionalDetail->height_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                         </select>
                                         @error('height')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-6 text-start">
                                         <label>Weight</label><span class="spl"> *</span>
                                     </div>
                                     <div class="col-md-6">
                                         <select class="form-control" name="weight" id="weight">
                                            <option value="">Select</option>
                                            @foreach($weight as $id => $name)
                                               <option value="{{ $id }}" {{ isset($memberAddionalDetail) && $memberAddionalDetail->weight_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                         </select>
                                         @error('weight')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-6  text-start">
                                 <label>Deficiency</label>
                             </div>
                             <div class="col-md-6">
                                 <label class="px-2"> <input type="radio" name="deficiency" value="1" {{isset($memberAddionalDetail) && $memberAddionalDetail->disablitiy == '1' ? 'checked' : '' }}>Normal</label>
                                 <label class="px-2"><input type="radio" name="deficiency"
                                         value="2" {{isset($memberAddionalDetail) && $memberAddionalDetail->disablitiy == '2' ? 'checked' : '' }}>Challenged</label>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-6  text-start">
                                 <label>Eating Habits</label>
                             </div>
                             <div class="col-md-6">
                                 <label class="px-2"> <input type="radio" name="eating_habits"
                                         value="1" {{isset($memberAddionalDetail) && $memberAddionalDetail->eating_habit == '1' ? 'checked' : '' }}>Vegetarian</label>
                                 <label class="px-2"><input type="radio" name="eating_habits"
                                         value="2" {{isset($memberAddionalDetail) && $memberAddionalDetail->eating_habit == '2' ? 'checked' : '' }}>Non-Vegetarian</label>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-6  text-start">
                                 <label>Alcholism</label>
                             </div>
                             <div class="col-md-6">
                                 <label class="px-2"> <input type="radio" name="alcholism" value="1" {{isset($memberAddionalDetail) &&  $memberAddionalDetail->drinking_habit == '1' ? 'checked' : '' }}>No</label>
                                 <label class="px-2"><input type="radio" name="alcholism" value="2" {{isset($memberAddionalDetail) &&  $memberAddionalDetail->drinking_habit == '2' ? 'checked' : '' }}>Occasionally</label>
                                        
                                 <label class="px-2"><input type="radio" name="alcholism" value="3" {{ isset($memberAddionalDetail) &&$memberAddionalDetail->drinking_habit == '3' ? 'checked' : '' }}>Yes</label>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-6  text-start">
                                 <label>Smoking Habits</label>
                             </div>
                             <div class="col-md-6">
                                 <label class="px-2"> <input type="radio" name="smoking_habits" value="1" {{isset($memberAddionalDetail) && $memberAddionalDetail->smoking_habit == '1' ? 'checked' : '' }}>No</label>
                                 <label class="px-2"><input type="radio" name="smoking_habits" value="2" {{ isset($memberAddionalDetail) && $memberAddionalDetail->smoking_habit == '2' ? 'checked' : '' }}>Occasionally</label>
                                         
                                 <label class="px-2"><input type="radio" name="smoking_habits" value="3" {{isset($memberAddionalDetail) && $memberAddionalDetail->smoking_habit == '3' ? 'checked' : '' }}>Yes</label>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-6  text-start">
                                 <label>About You</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-6">
                                 <textarea class="form-control" name="about_you"  rows="5"
                                     placeholder="Message">{{ isset($memberAddionalDetail) ? $memberAddionalDetail->about_you : old('about_you') }}</textarea>
                                     @error('about_you')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                    <div class="row gy-4 pt-3">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="button-container mb-2">
            <button type="submit" class="btn">Save</button>
        </div>
    </div>
</div>
                    {!! Form::close() !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

<!-- Profile Edit popup -->
<div class="modal fade" id="editHoroscope" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Horoscope Information Update</h5>
                <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text">
                <div id="form_container">
                {!! Form::open(['url' => route('app.horoscope_update.member'), 'method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => 'horoscopeInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                    <div class="row gy-4">
                        <h2>Horoscope Details</h2>
                        <div class="col-lg-12 col-md-12">
                            <div class="row gy-4">
                                <div class="col-md-4 ms-4  text-start">
                                    <label>Zodiac Sign</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <select name="raasi" id="raasi_horoscope" class="form-control">
                                        <option value="">Select a Raasi</option>
                                        @foreach ($raasi as $id => $name)
                                        <option value="{{ $id }}" {{ $member->raasi_id  == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
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
                                <div class="col-md-4 ms-4  text-start">
                                    <label>Star</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="star" id="star_horoscope">
                                        <option value="">Select a Star</option>
                                        @foreach($stars as $id => $name)
                                        <option value="{{$id}}" {{ $member->star_id  == $id ? 'selected' : '' }}>{{$name}}</option>
                                        @endforeach
                                    </select>
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
                                <div class="col-md-4 ms-4  text-start">
                                    <label>Birth Time</label>
                                </div>
                               
                                <div class="col-md-2">
                                    <select class="form-control" id="hrs" name="hrs">
                                        <option value="Select">Hrs</option>
                                        @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}" {{ $member->hours == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-md-2 px-2">
                                    <select class="form-control" id="mins" name="mins">
                                        <option value="Select">Min</option>
                                        @for ($i = 0; $i < 60; $i++) <option value="{{ $i }}" {{ $member->mins == $i ? 'selected' : '' }}>{{ sprintf('%02d', $i) }}
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
                        <div class="col-md-4 ms-4  text-start">
                            <label>Birth Place</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="birth_place" name="birth_place"
                            value="{{ $member->birth_place }}" placeholder="Enter Your Birth Place">
                            @error('birth_place')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                        </div>
                    </div>
                    <div class="row gy-4 pt-3">
                        <div class="col-md-4 ms-4  text-start">
                            <label>Horoscope Photo</label><span class="spl"> *</span>
                        </div>
                        <div class="col-md-6">
                            <input id="horoscope_photo" type="file" name="horoscope_photo" accept=".png,.jpg,.jpeg" value=" {{  $member->horoscope_image }}">
                            <p>{{ $member->horoscope_image }}</p>
                        </button>
                        @error('horoscope_photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                        </div>
                    </div>
                    <div class="row gy-4 pt-3">
                        <div class="col-md-4 ms-4 text-start">
                            <label>Dosham</label>
                        </div>
                        <div class="col-md-6">
                            <label class="px-2"> <input type="radio" name="dosham" value="No" {{ $member->dosham == 'No' ? 'checked' : '' }}>No</label>
                            <label class="px-2"> <input type="radio" name="dosham" value="Yes" {{ $member->dosham == 'Yes' ? 'checked' : '' }}>Yes</label>
                            <label class="px-2"> <input type="radio" name="dosham" value="Don't Know" {{ $member->dosham == "Don't Know" ? 'checked' : '' }}>Don't Know</label>
                        </div>
                    </div>
                    <div id="checkbox-list" style="display: {{ $member->dosham == 'Yes' ? 'block' : 'none' }};" class="mt-3 ">
                        <div class="row gy-4 pt-3">
                            <div class="col-md-4 ms-4  text-start">
                                <label>dhosam Details</label><span class="spl"> *</span>
                            </div>
                            <div class="col-md-6">
                                @foreach ($dosam_details as $id => $name)
                                <label class="px-2">
                                    <input type="checkbox" name="dosam_detail[]" value="{{ $id }}" id="dosam_detail" {{ in_array($id, explode(',', $member->doshamdetail)) ? 'checked' : '' }}>
                                    {{ $name }}</label>
                                @endforeach
                                <br>
                                <span id="dhosam_details_error" class="error">Select Known Language</span>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 pt-3">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="button-container mb-2">
            <button type="submit" class="btn">Save</button>
        </div>
    </div>
</div>
                    {!! Form::close() !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
 
<!-- Personal Edit Popup -->
<div class="modal fade" id="editPersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
          <div class="">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Personal Information Update</h5>
                <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text">
                <div id="form_container">
                {!! Form::open(['url' => route('app.personal_update.member'), 'method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => 'horoscopeInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                         <div class="row gy-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-5 ms-4  text-start">
                                         <label>Family Status</label>
                                     </div>
                                     <div class="col-md-6 d-flex flex-wrap gap-3"> <!-- Added flex-wrap and gap for spacing -->
    <label class="form-check-label px-2">
        <input type="radio" name="family_status" value="Rich_Comfortable" 
            {{ isset($familyDetail) && $familyDetail->family_status == 'Rich_Comfortable' ? 'checked' : '' }}>
        Rich & Comfortable
    </label>
    <label class="form-check-label px-2">
        <input type="radio" name="family_status" value="High_Income" 
            {{ isset($familyDetail) && $familyDetail->family_status == 'High_Income' ? 'checked' : '' }}>
        High Income
    </label>
    <label class="form-check-label px-2">
        <input type="radio" name="family_status" value="Middle Income">
        Middle Income
    </label>
    <label class="form-check-label px-2">
        <input type="radio" name="family_status" value="Low_Income" 
            {{ isset($familyDetail) && $familyDetail->family_status == 'Low_Income' ? 'checked' : '' }}>
        Low Income
    </label>
</div>

                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-5 ms-4  text-start">
                                         <label>Family Type</label>
                                     </div>
                                     <div class="col-md-6 d-flex flex-wrap">
                                         <label class="form-check-label me-3"> <input type="radio" name="family_type" value="Joint_Family"  {{ isset($familyDetail) && $familyDetail->family_type == 'Joint_Family' ? 'checked' : '' }}>Joint
                                             Family</label>
                                         <label class="form-check-label me-3"><input type="radio" name="family_type"
                                                 value="Nuclear"  {{ isset($familyDetail) && $familyDetail->family_type == 'Nuclear' ? 'checked' : '' }}>Nuclear</label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-4">
                             <div class="col-lg-12 col-md-12">
                                 <div class="row gy-4">
                                     <div class="col-md-5 ms-4  text-start">
                                         <label>Family Values</label>
                                     </div>
                                     <div class="col-md-6">
                                         <label class="px-2"> <input type="radio" name="family_value"
                                                 value="Orthodox"  {{ isset($familyDetail) && $familyDetail->family_values == 'Orthodox' ? 'checked' : '' }}>Orthodox</label>
                                         <label class="px-2"><input type="radio" name="family_value"
                                                 value="Traditional"  {{ isset($familyDetail) && $familyDetail->family_values == 'Traditional' ? 'checked' : '' }}>Traditional</label>
                                         <label class="px-2"> <input type="radio" name="family_value"
                                                 value="Moderate"  {{ isset($familyDetail) && $familyDetail->family_values == 'Moderate' ? 'checked' : '' }}>Moderate</label>
                                         <label class="px-2"><input type="radio" name="family_value"
                                                 value="Liberal"  {{ isset($familyDetail) && $familyDetail->family_values == 'Liberal' ? 'checked' : '' }}>Liberal</label>
                                         <label class="px-2"><input type="radio" name="family_value"
                                                 value="Modern"  {{ isset($familyDetail) && $familyDetail->family_values == 'Modern' ? 'checked' : '' }}>Modern</label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-5 ms-4  text-start">
                                 <label>Paternity</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-6">
                                 <select class="form-control" name="paternity">
                                     <option value="">Select</option>
                                     <option value="Business" {{ isset($familyDetail) && $familyDetail->father_status == 'Business' ? 'selected' : '' }}>Business</option>
                                     <option value="Government" {{ isset($familyDetail) && $familyDetail->father_status == 'Government' ? 'selected' : '' }}>Government</option>
                                     <option value="Private" {{ isset($familyDetail) && $familyDetail->father_status == 'Private' ? 'selected' : '' }}>Private</option>
                                     <option value="SelfEmployed" {{ isset($familyDetail) && $familyDetail->father_status == 'SelfEmployed' ? 'selected' : '' }}>Self Employed</option>
                                     <option value="Others" {{ isset($familyDetail) && $familyDetail->father_status == 'Business' ? 'Others' : '' }}>Others</option>
                                 </select>
                                 @error('paternity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-5 ms-4  text-start">
                                 <label>Mother Status</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-6">
                                 <select class="form-control" name="mother_status">
                                     <option value="">Select</option>
                                     <option value="Business" {{ isset($familyDetail) && $familyDetail->mother_status == 'Business' ? 'selected' : '' }}>Business</option>
                                     <option value="Government" {{ isset($familyDetail) && $familyDetail->mother_status == 'Government' ? 'selected' : '' }}>Government</option>
                                     <option value="Private" {{ isset($familyDetail) && $familyDetail->mother_status == 'Private' ? 'selected' : '' }}>Private</option>
                                     <option value="Self Employed" {{ isset($familyDetail) && $familyDetail->mother_status == 'Self Employed' ? 'selected' : '' }}>Self Employed</option>
                                     <option value="Others" {{ isset($familyDetail) && $familyDetail->mother_status == 'Others' ? 'selected' : '' }}>Others</option>
                                 </select>
                                 @error('mother_status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-5 ms-4  text-start">
                                 <label>No. of Brothers</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-6">
                                 <input type="text" class="form-control" id="" name="no_brothers"
                                     placeholder="Enter the Number" value="{{ isset($familyDetail) && $familyDetail->number_of_brothers ? $familyDetail->number_of_brothers : '' }}">
                                     @error('no_brothers')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-5 ms-4  text-start">
                                 <label>No. of Sisters</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-6">
                                 <input type="text" class="form-control" id="" name="no_sisters"
                                     placeholder="Enter the Number" value="{{ isset($familyDetail) && $familyDetail->number_of_sisters ? $familyDetail->number_of_sisters : '' }}">
                                     @error('no_sisters')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-5 ms-4  text-start">
                                 <label>Parent's Contact No</label><span class="spl"> *</span>
                             </div>
                             <div class="col-md-6">
                                 <input type="text" class="form-control" id="" name="parent_contact"
                                     placeholder="Enter the Number" value="{{ isset($familyDetail) && $familyDetail->parent_contact_number ? $familyDetail->parent_contact_number : '' }}">
                                     @error('parent_contact')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                             </div>
                         </div>
                         <div class="row gy-4 pt-3">
                             <div class="col-md-5 ms-4  text-start">
                                 <label>Ancestral Origin</label>
                             </div>
                             <div class="col-md-6">
                                 <input type="text" class="form-control" id="" name="ancestral_origin"
                                     placeholder="Enter Ancestral Origin" value="{{ isset($familyDetail) && $familyDetail->ancestral_origin ? $familyDetail->ancestral_origin : '' }}">
                             </div>
                         </div>
                    <div class="row gy-4 pt-3">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="button-container mb-2">
            <button type="submit" class="btn">Save</button>
        </div>
    </div>
</div>
                    {!! Form::close() !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
 
<!-- relatives edit Popup -->
<div class="modal fade" id="editRelative" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Reference Information Update</h5>
                <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text">
                <div id="form_container">
                {!! Form::open(['url' => route('app.relative_update.member'), 'method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => 'relativeInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                        <div class="row gy-4">
                            <h2>Reference Details</h2>
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <h4>Reference 1</h4>
                                    <div class="col-md-3  text-start">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="first_name" name="first_relative_name"
                                            placeholder="Enter Your Name" value="{{ isset($relative) && $relative->first_relative_name ? $relative->first_relative_name : '' }}">
                                            @error('first_relative_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Type of Relation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="first_relative_relation" id="first_relation_type">
                                            <option value="">Select </option>
                                            <option value="Father" {{ isset($relative) && $relative->first_relative_relation == 'Father' ? 'selected' : '' }}>Father</option>
                                            <option value="Mother" {{ isset($relative) && $relative->first_relative_relation == 'Mother' ? 'selected' : '' }}>Mother</option>
                                            <option value="Grandfather" {{ isset($relative) && $relative->first_relative_relation == 'Grandfather' ? 'selected' : '' }}>Grandfather</option>
                                            <option value="Grandmother" {{ isset($relative) && $relative->first_relative_relation == 'Grandmother' ? 'selected' : '' }}>Grandmother</option>
                                            <option value="Uncle" {{ isset($relative) && $relative->first_relative_relation == 'Uncle' ? 'selected' : '' }}>Uncle</option>
                                            <option value="Aunt" {{ isset($relative) && $relative->first_relative_relation == 'Aunt' ? 'selected' : '' }}>Aunt</option>
                                            <option value="Distance_Relation" {{ isset($relative) && $relative->first_relative_relation == 'Distance_Relation' ? 'selected' : '' }}>Distance Relation</option>
                                            <option value="Others" {{ isset($relative) && $relative->first_relative_relation == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                        @error('first_relative_relation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-3 text-start">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="first_profession" name="first_relative_bussiness"
                                            placeholder="Enter Your Profession" value="{{ isset($relative) && $relative->first_relative_bussiness ? $relative->first_relative_bussiness : '' }}">
                                        @error('first_relative_bussiness')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Contact No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="first_contact" name="first_relative_number"
                                            placeholder="Enter Contact Number" value="{{ isset($relative) && $relative->first_relative_number ? $relative->first_relative_number : '' }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('first_relative_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <h4>Reference 2</h4>
                                    <div class="col-md-3  text-start">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="second_name" name="second_name"
                                            placeholder="Enter Your Name" value="{{ isset($relative) && $relative->second_relative_name ? $relative->second_relative_name : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Type of Relation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="second_relation_type" id="second_relation_type">
                                            <option value="">Select </option>
                                            <option value="Father" {{ isset($relative) && $relative->second_relative_relation	 == 'Father' ? 'selected' : '' }}>Father</option>
                                            <option value="Mother" {{ isset($relative) && $relative->second_relative_relation	 == 'Mother' ? 'selected' : '' }}>Mother</option>
                                            <option value="Grandfather" {{ isset($relative) && $relative->second_relative_relation	 == 'Grandfather' ? 'selected' : '' }}>Grandfather</option>
                                            <option value="Grandmother" {{ isset($relative) && $relative->second_relative_relation	 == 'Grandmother' ? 'selected' : '' }}>Grandmother</option>
                                            <option value="Uncle" {{ isset($relative) && $relative->second_relative_relation	 == 'Uncle' ? 'selected' : '' }}>Uncle</option>
                                            <option value="Aunt" {{ isset($relative) && $relative->second_relative_relation	 == 'Aunt' ? 'selected' : '' }}>Aunt</option>
                                            <option value="Distance_Relation" {{ isset($relative) && $relative->second_relative_relation	 == 'Distance_Relation' ? 'selected' : '' }}>Distance Relation</option>
                                            <option value="Others" {{ isset($relative) && $relative->second_relative_relation	 == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-3  text-start">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="second_profession" name="second_profession"
                                            placeholder="Enter Your Profession" value="{{ isset($relative) && $relative->second_relative_bussiness ? $relative->second_relative_bussiness : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Contact No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="second_contact" name="second_contact"
                                            placeholder="Enter Contact Number" value="{{ isset($relative) && $relative->second_relative_number ? $relative->second_relative_number : '' }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-3">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <h4>Reference 3</h4>
                                    <div class="col-md-3 text-start">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="third_name" name="third_name"
                                            placeholder="Enter Your Name" value="{{ isset($relative) && $relative->third_relative_name ? $relative->third_relative_name : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Type of Relation</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="third_relation_type" id="third_relation_type">
                                            <option value="">Select </option>
                                            <option value="Father" {{ isset($relative) &&  $relative->third_relative_relation == 'Father' ? 'selected' : '' }}>Father</option>
                                            <option value="Mother" {{ isset($relative) && $relative->third_relative_relation == 'Mother' ? 'selected' : '' }}>Mother</option>
                                            <option value="Grandfather" {{ isset($relative) &&  $relative->third_relative_relation == 'Grandfather' ? 'selected' : '' }}>Grandfather</option>
                                            <option value="Grandmother" {{ isset($relative) && $relative->third_relative_relation == 'Grandmother' ? 'selected' : '' }}>Grandmother</option>
                                            <option value="Uncle" {{ isset($relative) &&  $relative->third_relative_relation == 'Uncle' ? 'selected' : '' }}>Uncle</option>
                                            <option value="Aunt" {{ isset($relative) && $relative->third_relative_relation == 'Aunt' ? 'selected' : '' }}>Aunt</option>
                                            <option value="Distance_Relation" {{ isset($relative) && $relative->third_relative_relation == 'Distance_Relation' ? 'selected' : '' }}>Distance Relation</option>
                                            <option value="Others" {{ isset($relative) && $relative->third_relative_relation == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-3  text-start">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="third_profession" name="third_profession"
                                            placeholder="Enter Your Profession" value="{{ isset($relative) && $relative->third_relative_bussiness ? $relative->third_relative_bussiness : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Contact No.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="third_contact" name="third_contact"
                                            placeholder="Enter Contact Number" value="{{ isset($relative) && $relative->third_relative_number ? $relative->third_relative_number : '' }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row gy-4 pt-3">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="button-container mb-2">
            <button type="submit" class="btn">Save</button>
        </div>
    </div>
</div>
                    {!! Form::close() !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    
<!-- Hobbies edit Popup -->
<div class="modal fade" id="editHobbies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="hobbiesModalLabel">Hobbies & Interests</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="content-text">
          <div id="form_container">
            {!! Form::open(['url' => route('app.hobby_update.member'), 'method' => 'post', 'files' => true, 'autocomplete' => 'off', 'id' => 'hobbiesInfoAddForm']) !!}
            {{ csrf_field() }}
            {!! Form::hidden('member_id', $member->id) !!}

            <div class="row gy-3">
              <h5 class="mb-3 fw-bold" style="color:#8C0000;">Hobbies & Interests</h5>

              <!-- <div class="col-md-12">
                @foreach($hobby as $id => $name)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="hobby_{{ $id }}" name="hobbies[]" value="{{ $id }}"
                    {{ isset($hobbyDetail) && in_array($id, $hobbyDetail->hobbies) ? 'checked' : '' }}
                    onclick="show_otherhobby(this, {{ $id }});">
                  <label class="form-check-label" for="hobby_{{ $id }}">{{ $name }}</label>
                </div>
                @endforeach

                <div id="hobbies_test" class="mt-2" style="{{ isset($hobbyDetail) && in_array(15, $hobbyDetail->hobbies) ? 'display:block;' : 'display:none;' }}">
                  <input type="text" class="form-control" name="other_hobbies" placeholder="Others..." value="{{ isset($hobbyDetail) && $hobbyDetail->otherhobbies ? $hobbyDetail->otherhobbies : '' }}">
                </div>
              </div> -->

              <div class="col-md-12 d-flex flex-wrap gap-2">
    @foreach($hobby as $id => $name)
    <div>
        <input class="btn-check" type="checkbox" id="hobby_{{ $id }}" name="hobbies[]" value="{{ $id }}"
            {{ isset($hobbyDetail) && in_array($id, $hobbyDetail->hobbies) ? 'checked' : '' }}
            onclick="show_otherhobby(this, {{ $id }});">
        <label class="btn btn-outline-secondary hobby-btn shadow-sm" for="hobby_{{ $id }}">{{ $name }}+</label>
    </div>
    @endforeach

    <div id="hobbies_test" class="mt-2" style="{{ isset($hobbyDetail) && in_array(15, $hobbyDetail->hobbies) ? 'display:block;' : 'display:none;' }}">
        <input type="text" class="form-control hobby-input" name="other_hobbies" placeholder="Others..."
            value="{{ isset($hobbyDetail) && $hobbyDetail->otherhobbies ? $hobbyDetail->otherhobbies : '' }}">
    </div>
</div>


              <div class="col-md-12 mt-4">
                <h5 class="fw-bold" style="color:#8C0000;">Your Favourite Music?</h5>
              </div>

              <div class="col-md-12 d-flex flex-wrap gap-2">
  

    @php 
    $music = (isset($hobbyDetail) && property_exists($hobbyDetail, 'music') && $hobbyDetail->music) 
        ? explode(',', $hobbyDetail->music) 
        : []; 
@endphp



    <div>
        <input class="btn-check" type="checkbox" id="music_indian" name="music[]" value="Indian/Classical_music" 
            {{ in_array('Indian/Classical_music', $music) ? 'checked' : '' }}>
        <label class="btn btn-outline-secondary hobby-btn shadow-sm" for="music_indian">Indian / Classical music+</label>
    </div>

    <div>
        <input class="btn-check" type="checkbox" id="music_melody" name="music[]" value="Melody_songs" 
            {{ in_array('Melody_songs', $music) ? 'checked' : '' }}>
        <label class="btn btn-outline-secondary hobby-btn shadow-sm" for="music_melody">Melody songs+</label>
    </div>

    <div>
        <input class="btn-check" type="checkbox" id="music_western" name="music[]" value="Western_music" 
            {{ in_array('Western_music', $music) ? 'checked' : '' }}>
        <label class="btn btn-outline-secondary hobby-btn shadow-sm" for="music_western">Western music+</label>
    </div>

    <div>
        <input class="btn-check" type="checkbox" id="music_others" name="music[]" value="Others" 
            {{ in_array('Others', $music) ? 'checked' : '' }} onclick="show_othermusic(this);">
        <label class="btn btn-outline-secondary hobby-btn shadow-sm" for="music_others">Others</label>
    </div>

    <div id="music_text" class="mt-2" style="{{ in_array('Others', $music) ? 'display:block;' : 'display:none;' }}">
    <input type="text" class="form-control hobby-input" name="other_music" placeholder="Others..." 
        value="{{ isset($hobbyDetail) && property_exists($hobbyDetail, 'othermusic') ? $hobbyDetail->othermusic : '' }}">
</div>

</div>


              <div class="col-md-12 mt-4">
                <h5 class="fw-bold" style="color:#8C0000;">Sports/Fitness you love?</h5>
              </div>

              <div class="col-md-12 d-flex flex-wrap gap-2">
              @php 
    $sports = (isset($hobbyDetail) && property_exists($hobbyDetail, 'sports') && $hobbyDetail->sports) 
        ? explode(',', $hobbyDetail->sports) 
        : []; 
@endphp


    <div>
        <input class="btn-check" type="checkbox" id="sports_cricket" name="sports_hobbies[]" value="Cricket" 
            {{ in_array('Cricket', $sports) ? 'checked' : '' }}>
        <label class="btn btn-outline-secondary hobby-btn shadow-sm" for="sports_cricket">Cricket+</label>
    </div>

    <div>
        <input class="btn-check" type="checkbox" id="sports_carrom" name="sports_hobbies[]" value="Carrom" 
            {{ in_array('Carrom', $sports) ? 'checked' : '' }}>
        <label class="btn btn-outline-secondary hobby-btn shadow-sm" for="sports_carrom">Carrom+</label>
    </div>

    <!-- Add more sports options as needed -->
    <div>
        <input class="btn-check" type="checkbox" id="sports_others" name="sports_hobbies[]" value="Others" 
            {{ in_array('Others', $sports) ? 'checked' : '' }} onclick="show_othersports(this);">
        <label class="btn btn-outline-secondary hobby-btn shadow-sm" for="sports_others">Others</label>
    </div>

    <div id="sports_text" class="mt-2" style="{{ in_array('Others', $sports) ? 'display:block;' : 'display:none;' }}">
    <input type="text" class="form-control hobby-input" name="other_sports" placeholder="Others..." 
        value="{{ isset($hobbyDetail) && property_exists($hobbyDetail, 'othersports') ? $hobbyDetail->othersports : '' }}">
</div>

</div>


              <div class="col-12 d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-danger">Save</button>
              </div>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>

<!-- Photos edit Popup -->
<div class="modal fade" id="editPhotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Photos Information Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4"> <!-- Added padding for better spacing -->
                <div class="d-flex main-content">
                    <div class="content-text p-4">
                        <div id="form_container">
                            {!! Form::open(['url' => route('app.photo_update.member'), 'method' => 'post', 'files' => true, 'autocomplete' => 'off', 'id' => 'relativeInfoAddForm']) !!}
                            {{ csrf_field() }}

                            {!! Form::hidden('member_id', $member->id) !!}
                            <div class="row gy-4">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="row gy-4">
                                        <div class="col-md-3 text-md-end text-start">
                                            <label>Photos {{ $i }}</label>
                                            @if ($i == 1) <span class="text-danger"> *</span> @endif
                                        </div>
                                        <div class="col-md-6">
                                            @if(isset($photoDetails[$i-1]))
                                                <div class="mb-2">
                                                    <img src="{{ asset($photoDetails[$i-1]->uploadFile->file_path) }}" alt="Photo {{ $i }}" width="100" class="img-thumbnail">
                                                </div>
                                                <input type="hidden" name="old_photo[]" value="{{ $photoDetails[$i - 1]->photo_id }}">
                                                <input type="hidden" name="up_photo[]" value="{{ $photoDetails[$i-1]->uploadFile->file_path }}">
                                            @else
                                                <input type="hidden" name="up_photo[]" value="">
                                                <input type="hidden" name="old_photo[]" value="">
                                            @endif
                                            <input type="file" name="photo[]" accept=".png,.jpg,.jpeg" class="form-control"> <!-- Added form-control class -->
                                        </div>
                                    </div>
                                @endfor

                                <div class="row gy-4 pt-3">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <div class="button-container mb-2">
                                            <button type="submit" class="btn btn-primary">Save</button> <!-- Added btn-primary class -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Professional edit Popup -->
<div class="modal fade" id="editProfessional" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Professional Information Update</h5>
                <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text p-4">
                <div id="form_container">
                            {!! Form::open(['url' => route('app.professional_udate.member'), 'method' => 'post', 'files' => true, 'autocomplete' => 'off', 'id' => 'relativeInfoAddForm']) !!}
                            {{ csrf_field() }}

                           
                    {!! Form::hidden('member_id', $member->id) !!}
                        <div class="row gy-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>Higher Educational</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="education" id="education_professional">
                                            @foreach($education as $id => $name)
                                               <option value="{{ $id }}" {{ isset($educationDetail) && $educationDetail -> education_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('education')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-2">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>College/School</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="collage_school"
                                        name="collage_school" placeholder="Enter your College/School" value="{{ isset($educationDetail) && $educationDetail->college_inst ? $educationDetail->college_inst : '' }}">
                                        @error('collage_school')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-2">
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>organization</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="organization" name="organization"
                                            placeholder="Enter your Organization"  value="{{ isset($educationDetail) && $educationDetail->organization ? $educationDetail->organization : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 pt-2">
                            <div class="col-md-5 ms-4 text-start">
                                <label>Job</label>
                            </div>
                            <div class="col-md-6">
                                <label class="px-2"> <input type="radio" name="employed_in" value="Yes" id="employed_yes"
                                        checked>Yes</label>
                                <label class="px-2"><input type="radio" name="employed_in" value="No" id="employed_no"
                                {{isset($educationDetail) && $educationDetail->employee_in == 'No' ? 'checked' : '' }}>No</label>
                            </div>
                        </div>
                        <div id="nofields" style="display:block;" class="{{ !empty($educationDetail) && $educationDetail['employee_in'] == 'Yes' ? 'employee_yes' : 'employee_no' }}" >
                            <div class="row gy-4 pt-3">
                                <div class="col-md-5 ms-4 text-start">
                                    <label>Profession</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="profession" id="profession">
                                        <option value="">Select</option>
                                        <option value="Government" {{ isset($educationDetail) && $educationDetail->occuption == 'Government' ? 'selected' : '' }}>Government</option>
                                        <option value="Private" {{ isset($educationDetail) &&  $educationDetail->occuption == 'Private' ? 'selected' : '' }}>Private</option>
                                        <option value="Business" {{ isset($educationDetail) && $educationDetail->occuption == 'Business' ? 'selected' : '' }}>Business </option>
                                        <option value="Self_Employed" {{ isset($educationDetail) &&  $educationDetail->occuption == 'Self_Employed' ? 'selected' : '' }}>Self Employed</option>
                                    </select>
                                    @error('profession')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row gy-4 pt-3">
                                <div class="col-md-5 ms-4 text-start">
                                    <label>Company Name</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                        placeholder="Enter your Company Name" value="{{ isset($educationDetail) && $educationDetail->company_name ? $educationDetail->company_name : '' }}">
                                        @error('company_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row gy-4 pt-3">
                                <div class="col-md-5 ms-4 text-start">
                                    <label>Destination</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="destination" name="destination"
                                        placeholder="" value="{{ isset($educationDetail) && $educationDetail->destination ? $educationDetail->destination : '' }}">
                                        @error('destination')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row gy-4 pt-3">
                                <div class="col-md-5 ms-4 text-start">
                                    <label>Income</label><span class="spl"> *</span>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="income" id="income">
                                        <option value="">Select</option>
                                        <option value="10,000-20,000" {{ isset($educationDetail) && $educationDetail->income == '10,000-20,000' ? 'selected' : '' }}>10,000-20,000</option>
                                        <option value="20,000-30,000" {{ isset($educationDetail) && $educationDetail->income == '20,000-30,000' ? 'selected' : '' }}>20,000-30,000</option>
                                        <option value="30,000-60,000" {{ isset($educationDetail) && $educationDetail->income == '30,000-60,000' ? 'selected' : '' }}>30,000-60,000</option>
                                        <option value="60,000-80,000" {{ isset($educationDetail) && $educationDetail->income == '60,000-80,000' ? 'selected' : '' }}>60,000-80,000</option>
                                        <option value="80,000-1lakh" {{ isset($educationDetail) && $educationDetail->income == '80,000-1lakh' ? 'selected' : '' }}>80,000-1 lakh</option>
                                        <option value="1lakh-1.5lakh" {{ isset($educationDetail) && $educationDetail->income == '1lakh-1.5lakh' ? 'selected' : '' }}>
                                            1 lakh-1.5lakh
                                        </option>
                                        <option value="1.5lakh-2lakh" {{ isset($educationDetail) && $educationDetail->income == '1.5lakh-2lakh' ? 'selected' : '' }}>1.5 lakh-2 lakh
                                        </option>
                                    </select>
                                    @error('income')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row gy-4 pt-3">
                                <div class="col-md-5 ms-4 text-start">
                                    <label>Country</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="px-2"><input type="radio" name="work_location" value="India"
                                    id="india" {{isset($educationDetail) && $educationDetail->location == 'India' ? 'checked' : '' }}>India</label>
                                    <label class="px-2"><input type="radio" name="work_location" value="Other_Country"
                                    id="otherCountry" {{isset($educationDetail) && $educationDetail->location == 'Other_Country' ? 'checked' : '' }}>Other Country</label>
                                </div>
                            </div>
                            <div id="indiaFields"  class="{{ !empty($educationDetail) && $educationDetail['location'] == 'India' ? 'india' : 'indiaHidden' }}">
                                <div class="row gy-4 pt-2">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>State</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="state" id="state_professional">
                                            <option value="">Select </option>
                                            @foreach($state as $id => $name)
                                               <option value="{{ $id }}" {{ isset($educationDetail) && $educationDetail->state_id  == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row gy-4 pt-2">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>City</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="city" id="city_professional">
                                            <option value="">Select </option>
                                            @if (isset($cityarray) && !empty($cityarray))
                                             @foreach($cityarray as $city)
                                            <option value="{{ $city['id'] }}" {{ isset($educationDetail) && $educationDetail['city_id'] == $city['id'] ? 'selected' : '' }}>
                                            {{ $city['name'] }}
                                             </option>
                                          @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row gy-4 pt-2">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>Taluk</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="taluk" id="taluk_professional">
                                           
                                            @if (isset($taulkarray) && !empty($taulkarray))
                       @foreach($taulkarray as $taluk)
                    <option value="{{ $taluk['id'] }}" {{ isset($educationDetail) && $educationDetail['taulk_id'] == $taluk['id'] ? 'selected' : '' }}>
                        {{ $taluk['name'] }}
                      </option>
                     @endforeach
                    @endif
                                        </select> </div>
                                </div>
                                <div class="row gy-4 pt-2">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>Pincode</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="pincode" name="pincode"
                                            placeholder="Enter Pincode" value="{{ isset($educationDetail) && $educationDetail->pincode ? $educationDetail->pincode : '' }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                </div>
                                <div class="row gy-4 pt-3">

                                    <div class="col-md-5 ms-4 text-start">
                                        <label>Address</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="address" id="address" rows="5"
                                            placeholder="Message" >{{ isset($educationDetail) ? $educationDetail->address : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="otherCountryFields" class="{{ !empty($educationDetail) && $educationDetail['location'] == 'Other_Country' ? 'otherCountry' : 'otherCountryHidden' }}">
                                <div class="row gy-4 pt-2">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>Passport Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="passportNumber"
                                            name="passport_number" placeholder="Enter Passport Number"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            value="{{ isset($educationDetail) && $educationDetail->passport_number ? $educationDetail->passport_number : '' }}">
                                    </div>
                                </div>
                                <div class="row gy-4 pt-2">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>Visa Type</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="visa_type" id="visa_type">
                                            <option value="Select">Select</option>
                                            <option value="Employed_Visa" {{ isset($educationDetail) && $educationDetail->visa_type == 'Employed_Visa' ? 'selected' : '' }}>Employed Visa</option>
                                            <option value="Business/Tourist_Visa" {{ isset($educationDetail) &&  $educationDetail->visa_type == 'Business/Tourist_Visa' ? 'selected' : '' }}>Business/Tourist Visa</option>
                                            <option value="Work_Visa" {{ isset($educationDetail) && $educationDetail->visa_type == 'Work_Visa' ? 'selected' : '' }}>Work Visa</option>
                                            <option value="Student_Visa" {{ isset($educationDetail) && $educationDetail->visa_type == 'Student_Visa' ? 'selected' : '' }}>Student Visa</option>
                                            <option value="Exchange_Visitor_Visa" {{ isset($educationDetail) &&  $educationDetail->visa_type == 'Exchange_Visitor_Visa' ? 'selected' : '' }}>Exchange Visitor Visa</option>
                                            <option value="Religion_Worker_Visa" {{ isset($educationDetail) && $educationDetail->visa_type == 'Religion_Worker_Visa' ? 'selected' : '' }}>Religion Worker Visa</option>
                                            <option value="Transit/Ship_Crew_Visa" {{ isset($educationDetail) && $educationDetail->visa_type == 'Transit/Ship_Crew_Visa' ? 'selected' : '' }}>Transit/Ship Crew Visa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row gy-4 pt-3">
                                    <div class="col-md-5 ms-4 text-start">
                                        <label>Address</label><span class="spl"> *</span>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="other_country_address"
                                            id="other_country_address" rows="5" placeholder="Message">{{ isset($educationDetail) ? $educationDetail->other_country_address : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                                <div class="row gy-4 pt-3">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <div class="button-container mb-2">
                                            <button type="submit" class="btn">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
<script>

$(document).ready(function(){

$('select[name="state"]').on('change', function() {
    var id = $('#state_professional').val();  
    
    $.ajax({
        url: "{{ route('get_sub_city') }}",  
        method: "POST",
        data: {
            id: id,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data){
            var html = '';
            html += '<option value="0">Select</option>';  

            for (var i = 0; i < data.length; i++) {
               html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            
            $('#city_professional').html(html);  

        }
    });
    
    return false;  
});

$('select[name="city"]').on('change', function() {
    var state_id = $('#state_professional').val(); 
    var city_id = $('#city_professional').val();   
    
    $.ajax({
        url: "{{ route('get_taluk_category') }}",
        method: "POST",
        data: {
            city: city_id,
            id: state_id,
            _token: "{{ csrf_token() }}" 
        },
        async: true,
        dataType: 'json',
        success: function(data){
            var html = '';
            html += '<option value="0">Select</option>';  
            for (var i = 0; i < data.length; i++) {
               html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            
            $('#taluk_professional').html(html);  
        }
    });
    
    return false;  
});

});
</script>



</div> 

<!-- partner edit Popup -->
<div class="modal fade" id="editPartner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="">

          <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Partner Information Update</h5>
                <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="content-text">
                <div id="form_container">
                {!! Form::open(['url' => route('app.partner_update.member'), 'method' => 'post', 'files' => true,
                    'autocomplete' => 'off', 'id' => 'partnerInfoAddForm']) !!}
                    {{csrf_field()}}

                    {!! Form::hidden('member_id', $member->id) !!}
                        <div class="row gy-4">
                         
                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-4 text-start">
                                        <label>Age</label>
                                    </div>
                                    <div class="col-md-2">
                                    <select class="form-control" name="age_to" id="age_to">
    <option value="0">Select</option>
    @for ($i = 21; $i <= 35; $i++)
        <option value="{{ $i }}"
            {{ isset($partnerDetail) && property_exists($partnerDetail, 'age') && $partnerDetail->age == $i ? 'selected' : '' }}>
            {{ $i }}
        </option>
    @endfor
</select>

                                        @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1">
                                        <p>To</p>
                                    </div>
                                    <div class="col-md-2">
                                    <select class="form-control" name="age_from" id="age_from">
    <option value="0">Select</option>
    @for ($i = 21; $i <= 35; $i++)
        <option value="{{ $i }}"
            {{ isset($partnerDetail) && property_exists($partnerDetail, 'age_from') && $partnerDetail->age_from == $i ? 'selected' : '' }}>
            {{ $i }}
        </option>
    @endfor
</select>

                                        @error('age_from')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <p>Years upto</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
    <div class="row gy-4">
        <div class="col-md-4 text-start">
            <label>Height</label>
        </div>
        <div class="col-md-2">
            <select class="form-control" name="height_to" id="height_to">
                @foreach($height as $id => $name)
                    <option value="{{ $id }}"
                        {{ isset($partnerDetail) && property_exists($partnerDetail, 'height_id') && $partnerDetail->height_id == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('height_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-1">
            <p>To</p>
        </div>

        <div class="col-md-2">
            <select class="form-control" name="height_from" id="height_from">
                @foreach($height as $id => $name)
                    <option value="{{ $id }}"
                        {{ isset($partnerDetail) && property_exists($partnerDetail, 'height_id_from') && $partnerDetail->height_id_from == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('height_id_from')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-2">
            <p>upto</p>
        </div>
    </div>
</div>

                            <div class="col-lg-12 col-md-12">
                                <div class="row gy-4">
                                    <div class="col-md-4  text-start">
                                        <label>Religion</label>
                                    </div>
                                    <div class="col-md-7">
                                    @php
    $religion = isset($partnerDetail) && property_exists($partnerDetail, 'religion') ? $partnerDetail->religion : '';
@endphp

<label class="px-2">
    <input type="radio" name="per_religion" value="Hindu"
        {{ $religion == 'Hindu' ? 'checked' : '' }}> Hindu
</label>

<label class="px-2">
    <input type="radio" name="per_religion" value="Christian"
        {{ $religion == 'Christian' ? 'checked' : '' }}> Christian
</label>

                                        <br>
                                        <span class="error" id="religion_error">Please select Religion.</span>
                                    </div>
                                </div>
                                <div class="row gy-4 pt-3">
    <div class="col-md-4 text-start">
        <label>Mother Tongue</label>
    </div>
    <div class="col-md-6">
        <label class="px-2">
            <input type="radio" name="par_mother_tongue" value="Tamil"
            {{ isset($partnerDetail->mother_tongue) && $partnerDetail->mother_tongue == 'Tamil' ? 'checked' : '' }}>
            Tamil
        </label>
        <label class="px-2">
            <input type="radio" name="par_mother_tongue" value="Malayalam"
            {{ isset($partnerDetail->mother_tongue) && $partnerDetail->mother_tongue == 'Malayalam' ? 'checked' : '' }}>
            Malayalam
        </label>
        <label class="px-2">
            <input type="radio" name="par_mother_tongue" value="Telugu"
            {{ isset($partnerDetail->mother_tongue) && $partnerDetail->mother_tongue == 'Telugu' ? 'checked' : '' }}>
            Telugu
        </label>
        <br>
        @error('mother_tongue')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <span class="error" id="mother_tongue_error">Please select Mother Tongue.</span>
    </div>
</div>

<div class="row gy-4 pt-3">
    <div class="col-md-4 text-start">
        <label>Caste</label>
    </div>
    <div class="col-md-6">
        <label class="px-2">
            <input type="radio" name="par_caste" value="Nadar"
            {{ isset($partnerDetail->caste) && $partnerDetail->caste == 'Nadar' ? 'checked' : '' }}>
            Nadar
        </label>
        <br>
        <span class="error" id="par_caste_error">Please select Caste.</span>
    </div>
</div>

<div class="row gy-4 pt-3">
    <div class="col-md-4 text-start">
        <label>Dosham</label>
    </div>
    <div class="col-md-6">
        <label class="px-2">
            <input type="radio" name="par_dhosam" value="No"
            {{ isset($partnerDetail->dosam) && $partnerDetail->dosam == 'No' ? 'checked' : '' }}>
            No
        </label>
        <label class="px-2">
            <input type="radio" name="par_dhosam" value="Yes"
            {{ isset($partnerDetail->dosam) && $partnerDetail->dosam == 'Yes' ? 'checked' : '' }}>
            Yes
        </label>
        <label class="px-2">
            <input type="radio" name="par_dhosam" value="Dont_Know"
            {{ isset($partnerDetail->dosam) && $partnerDetail->dosam == 'Dont_Know' ? 'checked' : '' }}>
            Don't Know
        </label>
    </div>
</div>

<div class="row gy-4 pt-3">
    <div class="col-md-4 text-start">
        <label>Raasi</label>
    </div>
    <div class="col-md-4">
        <select multiple id="multiselect1" name="par_raasi[]" placeholder="Select Raasi"
            data-search="true" data-silent-initial-value-set="true">
            @foreach($raasi as $id => $name)
                <option value="{{ $id }}"
                {{ isset($partnerDetail->rassi) && in_array($name, explode(',', $partnerDetail->rassi)) ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('raasi_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row gy-4">
        <div class="col-md-4 text-start">
            <label>Star</label>
        </div>
        <div class="col-md-4">
            <select multiple id="multiselect2" name="par_star[]" placeholder="Select Star"
                data-search="true" data-silent-initial-value-set="true">
                @foreach($stars as $id => $name)
                    <option value="{{ $id }}"
                    {{ isset($partnerDetail->star) && in_array($name, explode(',', $partnerDetail->star)) ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('star_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row gy-4">
        <div class="col-md-4 text-start">
            <label>Educational Qualification</label>
        </div>

        @php
            $education = isset($partnerDetail->education) ? explode(',', $partnerDetail->education) : [];
        @endphp

        <div class="col-md-4">
            <select multiple id="multiselect3" name="education[]" placeholder="Select Education"
                data-search="true" data-silent-initial-value-set="true">
                <option value="BE" {{ in_array('BE', $education) ? 'selected' : '' }}>BE</option>
                <option value="MBBS" {{ in_array('MBBS', $education) ? 'selected' : '' }}>MBBS</option>
                <option value="MBA" {{ in_array('MBA', $education) ? 'selected' : '' }}>MBA</option>
                <option value="MCA" {{ in_array('MCA', $education) ? 'selected' : '' }}>MCA</option>
                <option value="B.Tech" {{ in_array('B.Tech', $education) ? 'selected' : '' }}>B.Tech</option>
                <option value="BA" {{ in_array('BA', $education) ? 'selected' : '' }}>BA</option>
                <option value="MA" {{ in_array('MA', $education) ? 'selected' : '' }}>MA</option>
                <option value="ME" {{ in_array('ME', $education) ? 'selected' : '' }}>ME</option>
                <option value="Mcs" {{ in_array('Mcs', $education) ? 'selected' : '' }}>Mcs</option>
                <option value="B.plan" {{ in_array('B.plan', $education) ? 'selected' : '' }}>B.plan</option>
            </select>
            @error('education_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row gy-4">
    <div class="col-md-4 text-start">
        <label>Monthly Income</label>
    </div>
    <div class="col-md-6">
        <select class="form-control" name="par_income">
            <option value="">Select</option>
            <option value="10,000-20,000" {{ isset($partnerDetail) && property_exists($partnerDetail, 'income') && $partnerDetail->income == '10,000-20,000' ? 'selected' : '' }}>10,000-20,000</option>
            <option value="20,000-30,000" {{ isset($partnerDetail) && property_exists($partnerDetail, 'income') && $partnerDetail->income == '20,000-30,000' ? 'selected' : '' }}>20,000-30,000</option>
            <option value="30,000-60,000" {{ isset($partnerDetail) && property_exists($partnerDetail, 'income') && $partnerDetail->income == '30,000-60,000' ? 'selected' : '' }}>30,000-60,000</option>
            <option value="60,000-80,000" {{ isset($partnerDetail) && property_exists($partnerDetail, 'income') && $partnerDetail->income == '60,000-80,000' ? 'selected' : '' }}>60,000-80,000</option>
            <option value="80,000-1lakh" {{ isset($partnerDetail) && property_exists($partnerDetail, 'income') && $partnerDetail->income == '80,000-1lakh' ? 'selected' : '' }}>80,000-1 lakh</option>
            <option value="1lakh-1.5lakh" {{ isset($partnerDetail) && property_exists($partnerDetail, 'income') && $partnerDetail->income == '1lakh-1.5lakh' ? 'selected' : '' }}>1 lakh-1.5 lakh</option>
            <option value="1.5lakh-2lakh" {{ isset($partnerDetail) && property_exists($partnerDetail, 'income') && $partnerDetail->income == '1.5lakh-2lakh' ? 'selected' : '' }}>1.5 lakh-2 lakh</option>
        </select>
    </div>
</div>
                            <div class="row gy-2">
                                <div class="col-md-4 text-start">
                                    <label>About Partner</label>
                                </div>
                                <div class="col-md-6">
                                <textarea class="form-control" name="about_partner" id="about_partner" rows="5"
    placeholder="Message">{{ isset($partnerDetail) && property_exists($partnerDetail, 'about_you') ? $partnerDetail->about_you : '' }}</textarea>

                                        @error('about_you')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                    <div class="row gy-4 pt-3">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="button-container mb-2">
            <button type="submit" class="btn">Save</button>
        </div>
    </div>
</div>
                    {!! Form::close() !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>



    <script>
 

$(document).ready(function(){

$('select[name="state"]').on('change', function() {
    var id = $('#state').val();  
    
    $.ajax({
        url: "{{ route('get_sub_city') }}",  
        method: "POST",
        data: {
            id: id,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data){
            var html = '';
            html += '<option value="0">Select</option>';  
            var selectedCityId = "{{ isset($member) ? $member->city : '' }}"; 
            for (var i = 0; i < data.length; i++) {
               var selected = (selectedCityId == data[i].id) ? 'selected' : '';
               html += '<option value="' + data[i].id + '" ' + selected + '>' + data[i].name + '</option>';
            }
            
            $('#city').html(html);  
        }
    });
    
    return false;  
});

$('select[name="city"]').on('change', function() {
    var state_id = $('#state').val(); 
    var city_id = $('#city').val();   
    
    $.ajax({
        url: "{{ route('get_taluk_category') }}",
        method: "POST",
        data: {
            city: city_id,
            id: state_id,
            _token: "{{ csrf_token() }}" 
        },
        async: true,
        dataType: 'json',
        success: function(data){
            var html = '';
            html += '<option value="0">Select</option>';  
            for (var i = 0; i < data.length; i++) {
               html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            
            $('#taluk').html(html);  
        }
    });
    
    return false;  
});

$('select[name="permanent_state"]').on('change', function() {
    var id = $('#permanent_state').val();  
    
    $.ajax({
        url: "{{ route('get_sub_city') }}",  
        method: "POST",
        data: {
            id: id,
            _token: "{{ csrf_token() }}"
        },
        async: true,
        dataType: 'json',
        success: function(data){
            var html = '';
            html += '<option value="0">Select</option>';  

            for (var i = 0; i < data.length; i++) {
               html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            
            $('#permanent_city').html(html);  
        }
    });
    
    return false;  
});

$('select[name="permanent_city"]').on('change', function() {
    var state_id = $('#permanent_state').val(); 
    var city_id = $('#permanent_city').val();   
    
    $.ajax({
        url: "{{ route('get_taluk_category') }}",
        method: "POST",
        data: {
            city: city_id,
            id: state_id,
            _token: "{{ csrf_token() }}" 
        },
        async: true,
        dataType: 'json',
        success: function(data){
            var html = '';
            html += '<option value="0">Select</option>';  
            for (var i = 0; i < data.length; i++) {
               html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            
            $('#permanent_taluk').html(html);  
        }
    });
    
    return false;  
});

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
                        var selectedStarIds = @json(!empty($partnerDetail->star_id) ? explode(',', $partnerDetail->star_id) : []);
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

    document.addEventListener("DOMContentLoaded", function () {
        // VirtualSelect.init({
        //     ele: '#height',
        //     multiple: false,
        //     search: true,
        //     placeholder: 'Select'
        // });
        // VirtualSelect.init({
        //     ele: '#weight',
        //     multiple: false,
        //     search: true,
        //     placeholder: 'Select'
        // });
        VirtualSelect.init({
            ele: '#subcaste',
            multiple: false,
            search: true,
            placeholder: 'Select'
        });
        VirtualSelect.init({
            ele: '#key_age',
            multiple: false,
            search: true,
            placeholder: 'Select'
        });
        VirtualSelect.init({
            ele: '#key_height',
            multiple: false,
            search: true,
            placeholder: 'Select'
        });
    });

</script>

@endsection