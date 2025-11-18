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

    <form class="login-form">
      <input type="email" placeholder="Enter your email" required>
      <button type="button" onclick='window.location.href="{{ url("/forgetpass2") }}"'>Next</button>
    </form>

    <div class="register">
      <p>Remember your password? <a href="{{ url('/login') }}">Log In</a></p>
    </div>

  </div>

</body>
</html>
