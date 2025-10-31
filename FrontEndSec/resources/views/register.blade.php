<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">
  
  <div class="login-page">

    <button class="tutup-btn" onclick='window.location.href="{{ url("/") }}"'>✕</button>

    <h1>Registration</h1>

    <form class="login-form">
      <input type="text" placeholder="Name" required>
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Password" required>
      
      <label style="font-size: 14px; display: block; text-align: left; margin: 10px 0;">
        <input type="checkbox" required>
        I agree to the terms and conditions
      </label>

      <button type="submit" onclick='window.location.href="{{ url("/mainpage") }}"'>Register</button>
    </form>

    <div class="register">
      Already have an account? <a href="{{ url('/login') }}">Login</a>
    </div>
  </div>

</body>
</html>
