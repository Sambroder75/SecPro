<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
    {{-- Pastikan ini mengarah ke file CSS yang benar --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-body">
    
    <div class="login-page">

        <button class="tutup-btn" onclick='window.location.href="{{ url("/") }}"'>✕</button>

        <h1>Registration</h1>
        
        {{-- Penanganan Error dan Session Message --}}
        <div class="mt-5">
            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        {{-- Gunakan styling Anda sendiri, atau biarkan alert-danger --}}
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
        
        {{-- PENTING: Action, Method, dan @csrf disamakan dengan form Anda yang berhasil --}}
        <form action="{{ route('registration.post') }}" method="POST" class="login-form">
            @csrf 
            {{-- PENTING: Tambahkan atribut name yang sesuai --}}
            <input type="text" placeholder="Name" name="name" required> 
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            
            <label style="font-size: 14px; display: block; text-align: left; margin: 10px 0;">
                <input type="checkbox" required>
                I agree to the terms and conditions
            </label>

            {{-- Ubah button type="submit" agar form terkirim ke Laravel, hilangkan onclick --}}
            <button type="submit">Register</button>
        </form>

        <div class="register">
            Already have an account? <a href="{{ url('/login') }}">Login</a>
        </div>
    </div>

</body>
</html>