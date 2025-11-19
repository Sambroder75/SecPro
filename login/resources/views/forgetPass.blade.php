<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">

  <div class="login-page">

    <button class="tutup-btn" onclick='window.location.href="{{ url("/") }}"'>✕</button>

    <h1>Forgot Password</h1>

    <!-- SUCCESS MESSAGE -->
    @if (session('status'))
      <div class="alert-success">
          {{ session('status') }}
      </div>
    @endif

    <!-- VALIDATION ERROR MESSAGE -->
    @if ($errors->any())
      <div class="alert-error">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form class="login-form" method="POST" action="{{ route('password.email') }}">
      @csrf
      <input type="email" name="email" placeholder="Enter your email" required>
      <button type="submit">Send Reset Link</button>
    </form>

    <div class="register">
      <p>Remember your password? <a href="{{ url('/login') }}">Log In</a></p>
    </div>

  </div>

</body>
</html>
