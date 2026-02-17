@extends('layout2.home')

@section('title')
    Home
@endsection

@section('content')
<main class="main">
    <div class="container  pt-5">
        <div class="col-md-9 col-lg-8 col-xl-8 mx-auto my-4">
            <div class="bg-light border rounded p-4 py-sm-5 px-sm-5">
                <h5 class="text-center">You have successfully registered with matrimony</h5>
                <h6 class="text-center">Created By Relation: {{ $created_by_relation }}</h6>
                <h3 class="text-center pt-3"><strong>Verify Your Mobile Number</h3>
                <p class="text-muted text-center mb-4">You will receive a 6-digit confirmation code via SMS to
                    {{ $user->mobile_number }}</p>
                {!! Form::open(['url' => route('app.otp_verify.member'), 'method' => 'post', 'class' => '', 'autocomplete' => 'off', 'id' => 'homePageForm']) !!}
                    {{csrf_field()}}
                    <div class="row justify-content-center gy-4 pt-3 ">
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter code" oninput="validateOtpNumber(this)">
                        </div>
                        {!! Form::hidden('user_id', $user->id) !!}

                        {!! Form::hidden('created_by_relation', $created_by_relation) !!}

                      
                        <div class="col-md-1 d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger" onclick="">Verify
                            </button>
                        </div>
                        <h6 class="text-center pt-3">Didn't get the code? <a href="#"><u>Resend it</u></a></p>
                    </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">OTP sent successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

<script>
    function validateOtpNumber(input) {
        const value = input.value;

        if ( value.length > 6) {
            input.value = value.slice(0, -1);
        }
    }
</script>
