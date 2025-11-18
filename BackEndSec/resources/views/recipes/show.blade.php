<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - {{ $recipe->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/detail_resep_styles.css') }}"> 
</head>
<body class="detail-page-body">

    <header class="navbar">
    <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">

    <div class="right-side">
        
        @include('partials.search-bar')

        <button class="profile-btn" onclick="window.location.href='#'">
            <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
        </button>
    </div>
</header>

    <main class="recipe-detail-container">
        
        <div class="image-column">
            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="recipe-image">
            
            <div class="gradient-area">
                <button class="back-btn" onclick="history.back()">
                    &larr; Back
                </button>
            </div>
        </div>

        <div class="content-column">
            
            <h1 class="recipe-title">{{ $recipe->title }}</h1>
            
            <p class="recipe-description">
                {{ $recipe->description }}
            </p>
            
            <section class="ingredients-section">
                <h2>Resep:</h2>
                <div class="ingredients-list">
                    {!! nl2br(e($recipe->ingredients)) !!}
                </div>
            </section>
            
            <section class="steps-section">
                <h2>Langkah-langkah:</h2>
                <div class="steps-content">
                    {!! nl2br(e($recipe->steps)) !!}
                </div>
            </section>

        </div>
    </main>

</body>
</html>