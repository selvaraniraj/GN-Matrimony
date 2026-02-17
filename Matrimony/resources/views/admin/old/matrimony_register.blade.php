@include('admin.admin_header')
@include('admin.admin_left_menu')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="font-weight-bold text-danger">சென்னைவாழ் சாம்பவர்வடகரை நாடார் சங்கம்</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card card-danger shadow">
            <div class="card-header">
              <h3 class="card-title">Create a Matrimony Profile</h3>
            </div>

            {!! Form::open(['url' => route('otp-verification'), 'method' => 'get', 'id' => 'homePageForm', 'autocomplete' => 'off']) !!}

            {{-- CSRF not needed for GET, remove if method=GET --}}
            
            <div class="card-body">

              <!-- Profile Created By -->
              <div class="form-group">
                <label for="profilecreatedby">Profile Created By</label>
                <select class="form-control select2" id="profilecreatedby" name="created_by_relation" style="width: 100%;">
                  <option value="">Select Relation</option>
                  <option value="Son">Son</option>
                  <option value="Daughter">Daughter</option>
                  <option value="Grandson">Grandson</option>
                  <option value="Granddaughter">Granddaughter</option>
                  <option value="Brother">Brother</option>
                  <option value="Sister">Sister</option>
                  <option value="Brother-in-law">Brother-in-law</option>
                  <option value="Sister-in-law">Sister-in-law</option>
                  <option value="Myself">Myself</option>
                </select>
                <small id="profilecreatedby_error" class="text-danger d-none">Please select a relation!</small>
              </div>

              <!-- Name Field -->
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name">
                <small id="Name_error" class="text-danger d-none">Please enter your name!</small>
              </div>

              <!-- Mobile Number Field -->
              <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input type="text" class="form-control" maxlength="10" id="mobile_number" name="mobile_number" placeholder="Enter Phone Number" oninput="validateMobileNumber(this)">
                <small id="mobile_error" class="text-danger d-none">Please enter a valid 10-digit number!</small>
              </div>

              <!-- Email Field -->
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address">
                <small id="emailerror" class="text-danger d-none">Enter a valid email address!</small>
              </div>

            </div>

            <div class="card-footer text-center">
              <button type="submit" onclick="return home_validation()" class="btn btn-danger btn-lg w-100">
                <i class="fas fa-user-plus mr-2"></i> Register Free
              </button>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('admin.admin_footer')

<script>
// ✅ Global mobile validation
function validateMobileNumber(input) {
  const value = input.value;
  const pattern = /^[6-9]\d{0,9}$/;
  if (!pattern.test(value) || value.length > 10) {
    input.value = value.slice(0, -1);
  }
}

// ✅ Form validation function
function home_validation() {
  let isValid = true;

  // Reset all errors
  $('.text-danger').addClass('d-none');
  $('.form-control').removeClass('is-invalid');

  // Profile Created By
  if ($('#profilecreatedby').val().trim() === '') {
    $('#profilecreatedby_error').removeClass('d-none');
    $('#profilecreatedby').addClass('is-invalid');
    isValid = false;
  }

  // Name
  if ($('#name').val().trim() === '') {
    $('#Name_error').removeClass('d-none');
    $('#name').addClass('is-invalid');
    isValid = false;
  }

  // Mobile Number
  const mobile = $('#mobile_number').val().trim();
  if (mobile === '' || mobile.length !== 10) {
    $('#mobile_error').removeClass('d-none');
    $('#mobile_number').addClass('is-invalid');
    isValid = false;
  }

  // Email
  const email = $('#email').val().trim();
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (email === '' || !emailRegex.test(email)) {
    $('#emailerror').removeClass('d-none');
    $('#email').addClass('is-invalid');
    isValid = false;
  }

  return isValid;
}
</script>
