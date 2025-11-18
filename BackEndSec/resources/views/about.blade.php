<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - About Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about_styles.css') }}">
</head>
<body class="about-page-body">
    
    <header class="navbar">
        <img src="{{ asset('foto/logobesar.png') }}" alt="Logo Dapur Rasa" class="logo">

        <nav class="top-nav">
            <button onclick='window.location.href="{{ url("/mainpage") }}"'>Home</button>
            <button onclick='window.location.href="{{ url("/contact") }}"'>Contact</button>

        </nav>
    </header>

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
            <img src="{{ asset('foto/makanan3.png') }}" alt="Chicken salad bowl" class="food-bowl food-bowl-3">
        </div>
    </main>

</body>
</html>
