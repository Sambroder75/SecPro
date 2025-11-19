<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">

  <div class="login-page">

    <button class="tutup-btn" onclick="window.location.href='{{ url('/') }}'">✕</button>

    <h1>Reset Password</h1>

    <!-- Pesan error -->
    @if ($errors->any())
      <div class="alert-error">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form class="login-form" method="POST" action="{{ route('password.store') }}">
      @csrf

      <!-- Token dari URL -->
      <input type="hidden" name="token" value="{{ $token }}">

      <!-- Email dari URL -->
      <input type="email" name="email" value="{{ $email }}" required>

      <!-- Password baru -->
      <input type="password" name="password" placeholder="New Password" required>

      <!-- Konfirmasi password -->
      <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

      <button type="submit">Accept</button>
    </form>

    <div class="register">
      <p>Back to <a href="{{ url('/login') }}">Log In</a></p>
    </div>

  </div>

</body>
</html>
