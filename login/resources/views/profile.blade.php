@php use Illuminate\Support\Str; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="profile-body">

  <header class="profile-header">
    <button class="back-btn" onclick='window.location.href="{{ route("mainpage") }}"'>
        <img src="{{ asset('foto/arrow1.png') }}" alt="back">
    </button>
    <button class="edit-btn" onclick='window.location.href="{{ url("/editprofile") }}"'>Edit Profile</button>
    <button class="create-btn" onclick='window.location.href="{{ route("recipes.create") }}"'>Create +</button>
  </header>

  <div class="banner">
    <img src="{{ asset('foto/banner4.jpeg') }}" alt="Banner">
  </div>

  <div class="profile-pic">
    <img src="{{ asset('foto/curry.png') }}" alt="Foto Profile">
  </div>

  <div class="profile-info">
    <h1>{{ $user->name }}</h1>
    <h3>{{ '@' . Str::slug($user->name, '') }}</h3>
    <p class="bio">
      {{ $user->email }}
    </p>
  </div>

  <div class="food-grid">
    @forelse($recipes as $recipe)
      <div class="food-card">
        <img src="{{ $recipe->image_path ? asset('storage/' . $recipe->image_path) : asset('foto/makanan1.png') }}" alt="{{ $recipe->title }}">
        <div class="card-actions">
          <a class="edit-btn-card" href="{{ route('recipes.show', $recipe) }}">View</a>
        </div>
        <h3>{{ $recipe->title }}</h3>
        <p>{{ Str::limit($recipe->description, 120) }}</p>
        <small style="color:#777;">Uploaded on {{ $recipe->created_at->format('M d, Y') }}</small>
      </div>
    @empty
      <p style="grid-column: 1 / -1; text-align:center; color:#555;">You haven't uploaded any recipes yet. <a href="{{ route('recipes.create') }}">Create one now.</a></p>
    @endforelse
  </div>
</body>
</html>
