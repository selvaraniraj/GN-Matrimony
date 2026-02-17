@extends('layout2.user-form')

@section('title')
My profile
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-1"> </div>
        <div class="col-md-9">
            <a href="{{  route('app.v2.requestpage') }}"><button class="btn btn-danger"><i class="fas fa-comments"></i>Mobile number request</button><a>
                    <a href="{{ route('app.v2.favoritespage') }}"><button class="btn btn-danger ms-4"><i class="fas fa-comments"></i>Interested
                        </button><a>
                            <div class="d-flex justify-content-between align-items-center pt-3"> </div>
                            <div id="profileContainer" class="row">
                                <div class="col-md-12 profile-card" data-gender="bride">
                                    <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                                        <div class="card">
                                            <button class="btn btn-danger" style="font-size:20px;"> <i
                                                    class="fas fa-comments"></i>My favourite matches </button>
                                            <div class="row">
                                                <div class="col-md-5 " style="padding-left:20px;"
                                                    onclick="view_person()"><span
                                                        style="padding-left:2px;">NA00-M-01</span> | <span>Profile
                                                        created for Grand Daughter</span>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                <div class="col-md-5 pad_space ">
                                                </div>
                                                <div class="col-md-4 pt-3 ms-2">
                                                    <img src="{{asset('assets/images/custom/testimonials-2.jpg')}}"
                                                        style="vertical-align:middle;" width=220>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <h5 class="card-title">Sana</h5>
                                                            <div class="col-md-4">
                                                                <label class="card-text">Age & Height</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>25 & 4.5ft</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="card-text">Religion</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>Hindu</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="card-text">Education</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>UG</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="card-text">Occupation</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>Business</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="card-text">About me</label>
                                                            </div>
                                                            <div class="col-md-8 px-4">
                                                                <span>biuhijol</span>
                                                            </div>
                                                            <div style="padding-top:5px;padding-bottom:5px;"></div>
                                                        </div>
                                                        <h5 class="mobile">Interested</h5>
                                                        <div class="row gy-4">
                                                            <div class="col-md-4">
                                                                <label class="card-text">Communication Status</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control">Communication Status
                                                                    <option value="Select">Select </option>
                                                                    <option value="not yet contacted">Not yet Contacted
                                                                    </option>
                                                                    <option
                                                                        value="We contacted, but there was no response">
                                                                        We contacted, but no response</option>
                                                                    <option value="discussion going on">discussion going
                                                                        on</option>
                                                                    <option value="Waiting for their approval">Waiting
                                                                        for their approval</option>
                                                                    <option value="married this person">Married this
                                                                        person</option>
                                                                    <option value="not interested">Not Interested
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
    </div>
</div>
@endsection