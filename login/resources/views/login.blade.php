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

        {{-- Penanganan Error dan Session Message disisipkan di sini --}}
        <div>
            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- Tampilkan error dari session --}}
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- Tampilkan success dari session --}}
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>

        {{-- PENTING: Mengubah div menjadi form dengan action, method, dan @csrf --}}
        <form action="{{ route('login.post') }}" method="POST" class="login-form">
            @csrf
            
            {{-- PENTING: Tambahkan name="email" --}}
            <input type="email" placeholder="Email" name="email" required>
            
            {{-- PENTING: Tambahkan name="password" --}}
            <input type="password" placeholder="Password" name="password" required>

            <div class="login-options">
                {{-- Jika Anda menangani "Remember Me" di Controller, Anda perlu menambahkan name="remember" --}}
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="{{ url('/forgetpass') }}">Forgot Password?</a>
            </div>

            {{-- Mengganti onclick dengan type="submit" untuk mengirim form ke Controller --}}
            <button type="submit">Log in</button>
        </form>

        <div class="registration">
            <p>Don't have an account? <a href="{{ url('/registration') }}">Register</a></p>
        </div>
    </div>
</body>
</html>