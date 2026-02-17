<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GN matrimony - Login</title>

  <!-- Meta -->
  <meta name="description" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="Website">
  <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.svg') }}">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('admin_assets/css/remixicon.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_assets/css/main.min.css') }}">
</head>

<body class="login-bg">

  <div class="container">
  <div class="auth-wrapper mt-3">

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  </div>
    <div class="auth-wrapper">

   


     <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf

    <div class="d-flex justify-content-center align-items-center min-vh-80">
        <div class="auth-box text-center">

            <!-- Logo -->
            <a href="#" class="auth-logo mb-2 d-block">
                <img src="{{ asset('admin_assets/images/logo2.svg') }}" alt="Logo" style="max-width: 120px;">
            </a>

            <!-- Text below logo -->
            <h5 class="mb-4 fw-bold" style="color:#940202;">
                GLOBAL NADARS
            </h5>

            <h4 class="mb-4">Login</h4>

            <div class="mb-3 text-start">
                <label class="form-label" for="email">
                    Your email <span class="text-danger">*</span>
                </label>
                <input type="email"
                       id="email"
                       name="email"
                       class="form-control"
                       placeholder="Enter your email"
                       value="{{ old('email') }}"
                       required>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label" for="password">
                    Your password <span class="text-danger">*</span>
                </label>
                <div class="input-group">
    <input type="password"
           id="password"
           name="password"
           class="form-control"
           placeholder="Enter password"
           required>

    <button class="btn btn-outline-secondary"
            type="button"
            id="togglePassword">
        <i class="ri-eye-line" id="eyeIcon" style="color:#940202;"></i>
    </button>
</div>

            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                     <a href="{{ route('admin.register') }}" class="btn btn-secondary">Not registered? Signup</a>
            </div>

        </div>
    </div>
</form>


    </div>
  </div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password'
            ? 'text'
            : 'password';

        passwordInput.setAttribute('type', type);

        // Toggle eye icon
        eyeIcon.classList.toggle('ri-eye-line');
        eyeIcon.classList.toggle('ri-eye-off-line');
    });
</script>



</body>

</html>
