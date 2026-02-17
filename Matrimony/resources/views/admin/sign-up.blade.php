<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GN matrimony - Signup</title>

  <!-- Meta -->
  <meta name="description" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="Website">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">

  <link rel="stylesheet" href="{{ asset('admin_assets/css/remixicon.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_assets/css/main.min.css') }}">
</head>

<body class="login-bg">

  <div class="container">
    <div class="auth-wrapper">

    @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


      <form method="POST" action="{{ route('admin.register.submit') }}">
        @csrf

        <div class="auth-box">

        <div class="">
           <!-- Logo -->
            <a href="#" class="auth-logo mb-2 d-block text-center">
                <img src="{{ asset('admin_assets/images/logo2.svg') }}" alt="Logo" style="max-width: 120px;">
            </a>

            <!-- Text below logo -->
            <h5 class="mb-4 fw-bold text-center" style="color:#940202;">
                GLOBAL NADARS
            </h5>

</div>


          <h4 class="mb-4">Signup</h4>

        <div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Your name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Your email <span class="text-danger">*</span></label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
    <small class="error-text" id="emailError"></small>
  </div>
</div>


      <div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Password <span class="text-danger">*</span></label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
    <small class="error-text" id="passwordError"></small>
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
    <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" placeholder="Confirm password" required>
    <small class="error-text" id="confirmPasswordError"></small>
  </div>
</div>


    <div class="mb-3">
  <label class="form-label">
    Select Role <span class="text-danger">*</span>
  </label>

  <select name="role_id" class="form-select" required>
    <option value="">-- Select Role --</option>
    @foreach($roles as $role)
      <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
    @endforeach
  </select>
</div>



          <div class="mb-3 d-grid gap-2">
            <button type="submit" class="btn btn-primary">Signup</button>
            <a href="{{ route('admin.login') }}" class="btn btn-secondary">Already have an account? Login</a>
          </div>
        </div>
      </form>

    </div>
  </div>

<style>
  .error-text {
    color: red;
    font-size: 13px;
    margin-top: 5px;
    display: none;
  }
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
$(document).ready(function () {

  $('form').on('submit', function (e) {
    let valid = true;
    $('.error-text').hide();

    let email = $('#email').val().trim();
    let password = $('#password').val();
    let confirmPassword = $('#confirmPassword').val();

    // Email format
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      $('#emailError').text('Enter a valid email address').show();
      valid = false;
    }

    // 🚫 EMAIL EXISTS CHECK (CRITICAL)
    if (emailExists) {
      $('#emailError').text('Email already exists').show();
      valid = false;
    }

    // Password length
    if (password.length < 6) {
      $('#passwordError').text('Password must be at least 6 characters').show();
      valid = false;
    }

    // Password match
    if (password !== confirmPassword) {
      $('#confirmPasswordError').text('Passwords do not match').show();
      valid = false;
    }

    if (!valid) {
      e.preventDefault(); // 🚫 STOP SUBMIT
    }
  });

});
</script>


<script>
let emailExists = false;

$('#email').on('blur', function () {
  let email = $(this).val().trim();

  if (email !== '') {
    $.ajax({
      url: "{{ route('check.email') }}",
      type: "POST",
      data: {
        email: email,
        _token: "{{ csrf_token() }}"
      },
      success: function (res) {
        if (res.exists) {
          emailExists = true;
          $('#emailError').text('Email already exists').show();
        } else {
          emailExists = false;
          $('#emailError').hide();
        }
      }
    });
  }
});
</script>



</body>

</html>
