<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medpass - Forgot Password</title>

  <!-- Meta -->
  <meta name="description" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="Website">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
</head>

<body class="login-bg">
  <div class="container">
    <div class="auth-wrapper">
      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="auth-box">
          <a href="#" class="auth-logo mb-4">
            <img src="{{ asset('assets/images/medpass-logo.png') }}" alt="Medpass Logo">
          </a>

          <h6 class="fw-light mb-4">
            In order to access your dashboard, please enter the email ID you provided during the registration process.
          </h6>

          @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif

          <div class="mb-3">
            <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>

          <div class="mb-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</body>

</html>
