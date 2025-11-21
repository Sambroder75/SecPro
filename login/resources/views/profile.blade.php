@php use Illuminate\Support\Str; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <style>
      .floating-logout {
          position: fixed;
          right: 24px;
          bottom: 24px;
          background: #a7d06e;
          color: #fff;
          border: none;
          padding: 12px 18px;
          border-radius: 24px;
          font-weight: 700;
          letter-spacing: 0.5px;
          box-shadow: 0 10px 20px rgba(0,0,0,0.12);
          cursor: pointer;
          text-decoration: none;
      }

      .floating-logout:hover {
          filter: brightness(0.95);
      }
  </style>
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
        <div class="image-wrapper">
          <img src="{{ $recipe->image_path ? asset('storage/' . $recipe->image_path) : asset('foto/makanan1.png') }}" alt="{{ $recipe->title }}">
          @if(auth()->check() && auth()->id() === $recipe->user_id)
          <div class="post-actions">
            <a class="edit-btn-card" href="{{ route('recipes.edit', $recipe) }}" title="Edit">✏️</a>
            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Delete this recipe?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="delete-btn-card" title="Delete">🗑️</button>
            </form>
          </div>
          @endif
        </div>
        <h3>{{ $recipe->title }}</h3>
        <p>{{ Str::limit($recipe->description, 120) }}</p>
        <small style="color:#777;">Uploaded on {{ $recipe->created_at->format('M d, Y') }}</small>
      </div>
    @empty
      <p style="grid-column: 1 / -1; text-align:center; color:#555;">You haven't uploaded any recipes yet. <a href="{{ route('recipes.create') }}">Create one now.</a></p>
    @endforelse
  </div>

  @auth
  {{-- Tombol logout mengapung --}}
  <a href="{{ route('logout') }}"
     class="floating-logout"
     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Logout
  </a>

  {{-- Form POST untuk logout (wajib di Laravel) --}}
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
      @csrf
  </form>
  @endauth

</body>
</html>
