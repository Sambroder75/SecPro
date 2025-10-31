<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="index-body">
    
    <header class="navbar">
        <img src="{{ asset('foto/logobesar.png') }}" alt="Logo Dapur Rasa" class="logo">

        <nav>
            <button>Contact</button>
            <button>About</button>
            <button onclick='window.location.href="{{ url("/login") }}"'>Log In</button>
        </nav>
    </header>

    <main class="hero">
        <div class="hero-text">
            <h1>Your delicious recipe needs</h1>
            <h3>only at</h3>
            
            <img src="{{ asset('foto/logokecil.png') }}" alt="Logo kecil Dapur Rasa" class="hero-logo">
            
            <p>
              Dapur Rasa hadir sebagai teman dapurmu, dari resep rumahan sederhana sampai hidangan istimewa, 
              kami membagikan inspirasi masakan yang mudah diikuti, penuh cita rasa, 
              dan bikin momen makan jadi lebih bermakna.
            </p>
        </div>

        <div class="hero-images">
            <img src="{{ asset('foto/makanan1.png') }}" alt="Makanan 1" class="food1">
            <img src="{{ asset('foto/makanan2.png') }}" alt="Makanan 3" class="food2">
            <img src="{{ asset('foto/makanan3.png') }}" alt="Makanan 2" class="food3">
        </div>
    </main>

</body>
</html>
