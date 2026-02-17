@extends('layout2.partials.association-header')

@section('main')

@if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif

<main class="main">
    <div class="container pt-5">
        <div class="col-md-9 col-lg-8 col-xl-8 mx-auto my-4">
            <div class="bg-light border rounded p-4 py-sm-5 px-sm-5">
                <h5 class="text-center">Verify Your Mobile Number</h5>
                <p class="text-muted text-center mb-4">
                    A 6-digit confirmation code has been sent to your registered mobile number.
                </p>
                <form action="{{ route('verify-otp') }}" method="POST">
    @csrf
    <div class="row justify-content-center gy-4 pt-3">
        <div class="col-md-4">
            <input 
                type="text" 
                class="form-control" 
                id="otp" 
                name="otp" 
                placeholder="Enter 6-digit code" 
                maxlength="6"
                required
            >
        </div>
        <div class="col-md-1 d-flex justify-content-center">
            <button type="submit" class="btn btn-danger">Verify</button>
        </div>
    </div>
    <h6 class="text-center pt-3">
        Didn't get the code? <a href=""><u>Resend it</u></a>
    </h6>
</form>


            </div>
        </div>
    </div>
</main>

@include('layout2.partials.association-footer')

@endsection
