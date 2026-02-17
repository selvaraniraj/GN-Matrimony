@extends('layout2.home')
@section('title')
Home
@endsection

@section('content')
<main class="main">
    <section id="hero" class="hero section light-background pt-1">
        <div class="full-screen-container">
            <div class="row gy-4 justify-content-center justify-content-lg-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center pt-3">
                <h2 class="text-white">சென்னைவாழ் சாம்பவர்வடகரை நாடார் சங்கம்</h2>
                <!-- <h2 class="animated-text">நாடார் சங்கம்</h2> -->
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="text-center mb-4 form-heading">Create a Matrimony profile</h4>
                            {!! Form::open(['url' => route('app.home_member.save'), 'method' => 'post', 'class' => '',
                            'autocomplete' => 'off', 'id' => 'homePageForm']) !!}
                            {{csrf_field()}}
                            <div class="pt-2">
                                <select class="form-control mb-1" id="profilecreatedby" name="created_by_relation">
                                    <option value="">Select</option>
                                    <option value="son" id="01">Son</option>
                                    <option value="Daughter" id="02">Daughter</option>
                                    <option value="Grandson" id="03">Grandson</option>
                                    <option value="Granddaughter" id="04">Granddaughter</option>
                                    <option value="Brother" id="05">Brother</option>
                                    <option value="Sister" id="06">Sister</option>
                                    <option value="Brother-in-law" id="07">Brother-in-law</option>
                                    <option value="Sister-in-law" id="08">Sister-in-law</option>
                                    <option value="Myself" id="08">Myself</option>
                                </select>
                                <span class="error" id="profilecreatedby_error">Please select a relation!</span>
                                </br>

                            </div>
                            <div class="mb-1 pt-1">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"  oninput="this.value = this.value.toUpperCase();">
                                <span class="error" id="Name_error">Please Enter Your Name!</span>
                                </br>

                            </div>
                            <div class="mb-3 pt-2">
                                <input type="text" class="form-control" maxlength="10" id="mobile_number"
                                    name="mobile_number" placeholder="Enter phone Number"
                                    oninput="validateMobileNumber(this)">
                                <span class="error" id="mobile_error">Please Enter Your Valid Mobile Number!</span>
                            </div>
                            <div class="mb-3 pt-2">
                                <input type="text" class="form-control" id="email" name="email"
                                 placeholder="Enter your email address">
                                <span class="error" id="emailerror"
                                    style="color:#ff0000;display:none;font-size:13px;">Please Enter Your Correct Email
                                    Address!</span>
                            </div>
                            <button type="button" onclick="submitHomeForm()" class="btn w-100 pt-2 bg-col">
                                Register Free</button>

                                 <div class="text-center mt-3">
                                    <span class="text-muted">Already have an account? <a href="{{ route('app.v2.loginPage_page') }}">Login Here</a></span>
                                </div> 
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

<script>
    
 async function home_validation() {
        let isValid = true;
    
        // Profile created by validation
        if ($('#profilecreatedby').val().trim() === '') {
            $('#profilecreatedby_error').show();
            $('#profilecreatedby').css('border', '1px solid red');
            isValid = false;
        } else {
            $('#profilecreatedby_error').hide();
            $('#profilecreatedby').css('border', '1px solid grey');
        }
    
        // Name validation
        const name = $('input[name="name"]').val().trim();
        if (name === '') {
            $('#Name_error').show();
            $('#name').css('border', '1px solid red');
            isValid = false;
        } else {
            $('#Name_error').hide();
            $('#name').css('border', '1px solid grey');
        }
    
        // Mobile number validation
        const contact = $('input[name="mobile_number"]').val().trim();
        if (contact === '' || contact.length !== 10) {
            $('#mobile_error').show();
            $('#mobile_number').css('border', '1px solid red');
            isValid = false;
        } else {
            $('#mobile_error').hide();
            $('#mobile_number').css('border', '1px solid grey');
        }
    
        // Email validation
        const email = $('#email').val().trim();
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        const emailError = $('#emailerror');
        const emailInput = $('#email');
    
        if (email === '' || !emailRegex.test(email)) {
            emailError.text('Please Enter Your Correct Email Address!').show();
            emailInput.css('border', '1px solid red');
            isValid = false;
        } else {
            const response = await fetch("{{ route('check.email.exists') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ email: email })
            });
    
            const data = await response.json();
            if (data.exists) {
                emailError.text('Email already exists!').show();
                emailInput.css('border', '1px solid red');
                isValid = false;
            } else {
                emailError.hide();
                emailInput.css('border', '1px solid grey');
            }
        }
    
        return isValid;
    }


    async function submitHomeForm() {
        const isValid = await home_validation();
        if (isValid) {
            document.getElementById('homePageForm').submit();
        }
    }
</script>

<script>
    function validateMobileNumber(input) {
        const value = input.value;
        const mobileNumberPattern = /^[6-9]\d{0,9}$/;

        if (!mobileNumberPattern.test(value) || value.length > 10) {
            input.value = value.slice(0, -1);
        }
    }

</script>


</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        VirtualSelect.init({
            ele: '#profilecreatedby',
            multiple: false,
            search: true,
            placeholder: 'Select an Relation'
        });
    });
</script>

<style>
    
    </style>
