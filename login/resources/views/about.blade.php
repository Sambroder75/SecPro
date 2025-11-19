<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Contact</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact_page.css') }}">
</head>

<body class="contact-page-body">

    <!-- HEADER (sama seperti home & about) -->
    <header class="navbar">
        <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">

        <div class="right-side">
            <form action="#" method="get" class="search-form">
                <input type="text" name="q" placeholder="Cari Resep...">
                <button type="submit">
                    <img src="{{ asset('foto/search.png') }}" alt="Search Icon">
                </button>
            </form>

            <button class="profile-btn" onclick="window.location.href='{{ url("/profile") }}'">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
            </button>
        </div>
    </header>

    <!-- Secondary menu -->
    <div class="secondary-nav-bar">
        <nav class="main-nav">
            <ul>
                <li><a href="{{ route('mainpage') }}">Home</a></li>
                <li><a href="{{ url('/about') }}"class="active">About</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </nav>
    </div>

    <main class="hero about-hero">
        <div class="hero-text about-text">
            <h1 class="about-title">About Us</h1>
            <p class="about-description">
                Dapur Rasa is your trusted culinary partner, dedicated to sparking joy in every kitchen, regardless of your skill level. 
                We believe that food is more than just sustenance—it’s a connection to culture, family, and simple pleasures. 
                <br><br>
                Our mission is to share a diverse and ever-growing collection of recipes, ranging from simple, comforting homemade classics to exciting, internationally-inspired dishes. Every recipe is curated for clarity, flavor, and authenticity, ensuring you can recreate delicious, restaurant-quality meals right in your home. Join our community to share your own creations and find your next favorite dish!
            </p>
        </div>

        <div class="hero-images about-images">
            <img src="{{ asset('foto/makanan1.png') }}" alt="Steak and salad bowl" class="food-bowl food-bowl-1">
            <img src="{{ asset('foto/makanan2.png') }}" alt="Pasta bowl" class="food-bowl food-bowl-2">
         
        </div>
    </main>
</body>
</html>


