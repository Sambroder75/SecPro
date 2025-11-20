<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-body">

    <div class="login-page">
        <button class="tutup-btn" onclick='window.location.href="{{ url("/") }}"'>✕</button>
        
        <h1>Login</h1>

        {{-- Error Validation --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        {{-- Session Error --}}
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Session Success --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        {{-- LOGIN FORM --}}
        <form action="{{ route('login.post') }}" method="POST" class="login-form">
            @csrf

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

            <input type="password" name="password" placeholder="Password" required>

            <div class="login-options">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember me
                </label>
                <a href="{{ url('/forgetpass') }}">Forgot Password?</a>
            </div>

            <button type="submit">Log in</button>
        </form>


        <div class="registration">
            <p>Don't have an account? <a href="{{ url('/registration') }}">Register</a></p>
        </div>
    </div>

</body>
</html>
