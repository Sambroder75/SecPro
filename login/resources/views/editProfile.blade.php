<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="edit-page">
  <div class="edit-container">
    <div class="card">
    
      @if(session('success'))
        <div style="color: green; text-align: center; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('profile.update') }}" method="POST">
        @csrf           @method('PUT')  <div class="profile-pic">
            <img src="{{ asset('foto/curry.png') }}" alt="Foto Profile">
            <button type="button" class="change-btn">Change</button>
        </div>

        <label for="name" style="display:block; text-align:left; margin-left: 10%; font-weight:bold;">Nama</label>
        <input type="text" 
               name="name" 
               class="input-text" 
               placeholder="Nama" 
               value="{{ old('name', $user->name) }}" 
               required>

        <label for="email" style="display:block; text-align:left; margin-left: 10%; margin-top:10px; font-weight:bold;">Email</label>
        <input type="email" 
               name="email" 
               class="input-text" 
               placeholder="Email" 
               value="{{ old('email', $user->email) }}" 
               required>

        <div class="action-buttons">
            <button type="button" class="back-btn" onclick='window.location.href="{{ url("/profile") }}"'>Back</button>
            
            <button type="submit" class="save-btn">Save</button>
        </div>

      </form>
      </div>
  </div>
</body>
</html>