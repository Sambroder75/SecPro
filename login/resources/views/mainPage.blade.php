<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_page.css') }}">
</head>
<body class="index-body">

    <header class="navbar">
        <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">
        <div class="right-side">

            @include('partials.search-bar')

            <button class="profile-btn" onclick="window.location.href='{{ route('profile') }}'">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
            </button>
        </div>
    </header>

    <div class="secondary-nav-bar">
        <nav class="main-nav">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="about">About</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
        </nav>
    </div>
    
    <main class="main-content-area">
        
        <h2 class="section-banner trending-banner">Trending Now:</h2>
        <section class="trending-now-section">
            <div class="trending-cards-container">
                @forelse($latestRecipes as $recipe)
                <div class="recipe-card-wrap">
                <a href="{{ route('recipes.show', $recipe) }}" class="recipe-card">
                    <img src="{{ $recipe->image_path ? asset('storage/' . $recipe->image_path) : asset('foto/makanan2.png') }}" alt="{{ $recipe->title }}" class="card-image">
                    <div class="card-details">
                        <div class="recipe-duration">🕒 {{ $recipe->created_at->diffForHumans() }}</div>
                        <h3>{{ $recipe->title }}</h3>
                        <p class="recipe-snippet">{{ Str::limit($recipe->description, 120) }}</p>
                        <div class="card-meta">
                            <div class="author-info">
                                <span class="author-avatar">👤</span>
                                <span>{{ optional($recipe->user)->name ?? 'Community Chef' }}</span>
                                <span class="date">{{ $recipe->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="stats">
                                <span class="views"></span>
                                <span class="likes"></span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('recipes.show', $recipe) }}#comments" class="card-comment" aria-label="Comments">💬</a>
                <div class="save-button" aria-label="Save Recipe">bookmark</div>
                </div>
                @empty
                    <p style="color:#555;">No recipes yet. Be the first to <a href="{{ route('recipes.create') }}">share your creation</a>.</p>
                @endforelse

                <a href="{{ route('recipes.create') }}" class="add-recipe-card">
                    <div class="plus-icon">➕</div>
                    <p>Add your own recipe</p>
                </a>

            </div>
        </section>

        <div class="recipe-of-the-week-separator">
            <h2 class="separator-title">Recipe of the Week</h2>
            <span class="date-indicator">{{ now()->format('d/m') }}</span>
        </div>

        <section class="recipe-of-the-week">
            <div class="recipe-row">
                @forelse($featuredRecipes as $recipe)
                <div class="recipe-highlight">
                    <img src="{{ $recipe->image_path ? asset('storage/' . $recipe->image_path) : asset('foto/makanan3.png') }}" alt="{{ $recipe->title }}" class="highlight-image">
                    <div class="highlight-info">
                        <h3>{{ $recipe->title }}</h3>
                        <p class="recipe-snippet">{{ Str::limit($recipe->description, 160) }}</p>
                        <a href="{{ route('recipes.show', $recipe) }}" class="read-more-button">Read More</a>
                    </div>
                </div>
                @empty
                    <p style="color:#555;">Upload a recipe to have it featured here.</p>
                @endforelse
            </div>
        </section>

    </main>

</body>
</html>