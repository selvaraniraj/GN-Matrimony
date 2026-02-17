@extends('layout2.partials.association-header')
@section('main')
<main class="main">
    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Heading Section -->
                <div class="col-lg-12 text-center mb-5">
                    <h2 data-aos="fade-up" style="color:#D32F2F;">சென்னைவாழ் சாம்பவர்வடகரை நாடார் சங்கம்</h2>
                    
                </div>

                <!-- Form Section -->
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="card shadow-lg rounded-lg border-0">
                        <div class="card-body p-5">
                            <h4 class="text-center mb-4 text-dark">Create a Matrimony Profile</h4>

                            {!! Form::open(['url' => route('otp-verification'), 'method' => 'get', 'class' => 'needs-validation', 'autocomplete' => 'off', 'id' => 'homePageForm']) !!}

                            {{ csrf_field() }}

                            <!-- Profile Created By -->
                            <div class="form-group">
                                <select class="form-control" style='height:42px' id="profilecreatedby" name="created_by_relation">
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
                                <span class="error text-danger" id="profilecreatedby_error">Please select a relation!</span>
                            </div>

                            <!-- Name Field -->
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                <span class="error text-danger" id="Name_error">Please Enter Your Name!</span>
                            </div>

                            <!-- Mobile Number Field -->
                            <div class="form-group">
                                <input type="text" class="form-control" maxlength="10" id="mobile_number" name="mobile_number" placeholder="Enter Phone Number" oninput="validateMobileNumber(this)">
                                <span class="error text-danger" id="mobile_error">Please Enter Your Valid Mobile Number!</span>
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" onblur="email_validate(document.register.email)">
                                <span class="error text-danger" id="emailerror" style="display:none;">Enter Your Correct Email Address!</span>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group text-center">
                                <button type="submit" 
                                onclick="return home_validation()" 
                                class="btn btn-danger btn-lg w-100">Register Free</button>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layout2.partials.association-footer')

</body>
</html>
@endsection

