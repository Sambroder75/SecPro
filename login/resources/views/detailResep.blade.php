<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Fried Chicken</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail_resep_styles.css') }}">
</head>
<body class="detail-page-body">

    <header class="navbar">
        <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">

        <div class="right-side">
            <form action="{{ url('/search') }}" method="get" class="search-form">
                <input type="text" name="q" placeholder="Cari Resep...">
                <button type="submit">
                    <img src="{{ asset('foto/search.png') }}" alt="Search Icon">
                </button>
            </form>

            <button class="profile-btn" onclick='window.location.href="{{ url("/profile") }}"'>
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
            </button>
        </div>
    </header>

    <main class="recipe-detail-container">
        <div class="image-column">
            <img src="{{ asset('foto/soy_fried_chicken.jpg') }}" alt="Fried Chicken" class="recipe-image">
            
            <div class="gradient-area">
                <button class="back-btn" onclick="history.back()">
                    &larr; Back
                </button>
            </div>
        </div>

        <div class="content-column">
            <h1 class="recipe-title">Fried Chicken</h1>
            
            <p class="recipe-description">
                Deskripsi adalah pemaparan atau penggambaran rinci suatu objek, peristiwa, atau keadaan menggunakan kata-kata agar pembaca seolah dapat melihat, mendengar, merasakan, atau memahami hal tersebut seolah-olah mereka berada di sana.
            </p>
            
            <section class="ingredients-section">
                <h2>Resep:</h2>
                <ul class="ingredients-list">
                    <li>Bahan 1 - Jumlah bahan</li>
                    <li>Bahan 2 - Jumlah bahan</li>
                    <li>Bahan 3 - Jumlah bahan</li>
                    <li>Bahan 4 - Jumlah bahan</li>
                    <li>Bahan 5 - Jumlah bahan</li>
                    <li>Bahan 6 - Jumlah bahan</li>
                    <li>Bahan 7 - Jumlah bahan</li>
                    <li>Bahan 8 - Jumlah bahan</li>
                    <li>Bahan 9 - Jumlah bahan</li>
                    <li>Bahan 10 - Jumlah bahan</li>
                </ul>
            </section>
            
            <section class="steps-section">
                <h2>Langkah-langkah:</h2>
                <div class="steps-content">
                    <p>
                        Resep makanan adalah sebuah panduan tertulis atau seperangkat instruksi yang berisi daftar bahan-bahan beserta jumlah dan cara pengolahannya untuk menyiapkan hidangan atau masakan tertentu.
                    </p>
                    <p>
                        Resep digunakan untuk membantu siapa saja dalam membuat ulang makanan yang sama persis, mulai dari bahan-bahan, takaran, hingga teknik memasak, sehingga rasa dan hasil masakan konsisten.
                    </p>
                </div>
            </section>
        </div>
    </main>

</body>
</html>
