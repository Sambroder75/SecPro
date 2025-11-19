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
                <li><a href="{{ url('/mainpage') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}" class="active">Contact</a></li>
            </ul>
        </nav>
    </div>

    <!-- MAIN CONTENT -->
    <main class="contact-container">

        <h1 class="contact-title">Kelompok 5</h1>

        <ul class="contact-list">
            <li>Samuel Christian</li>
            <li>Sean Richard</li>
            <li>Aurelio Suhartono</li>
            <li>Andrew Emmanuel William Pakpahan</li>
            <li>Paul Abednego Hasphine</li>
            <li>Justin Raphael Joli Putra</li>
        </ul>

    </main>






    <!-- POPUP MODAL -->
<div id="searchModal" class="search-modal">
    <div class="search-modal-content">
        <span class="modal-close">&times;</span>

        <h3 class="modal-title">Find your recipe!</h3>

        <div class="modal-grid">

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/soy_fried_chicken.jpg" alt="">
        <div class="modal-card-info">
            <h4>Soy Fried Chicken</h4>
            <p>Resep Soy Fried Chicken khas Indonesia dengan bumbu autentik, yang enaklah pokoknya.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/sateayam.jpg" alt="">
        <div class="modal-card-info">
            <h4>Sate Ayam</h4>
            <p>Sate ayam dengan bumbu kacang gurih manis.</p>
        </div>
    </div>

   <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/pastacarbonara.jpg" alt="">
        <div class="modal-card-info">
            <h4>Pasta Carbonara</h4>
            <p>Pasta creamy dengan keju dan smoked beef.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/chickenkatsu.jpg" alt="">
        <div class="modal-card-info">
            <h4>Chicken Katsu</h4>
            <p>Daging ayam goreng tepung renyah khas Jepang.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/rendang.jpg" alt="">
        <div class="modal-card-info">
            <h4>Rendang</h4>
            <p>Daging rendang khas Padang, wangi rempah.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/icecream.jpg" alt="">
        <div class="modal-card-info">
            <h4>Ice Cream</h4>
            <p>Dessert manis dan creamy, cocok untuk semua.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/salad.jpg" alt="">
        <div class="modal-card-info">
            <h4>Salad Sayur</h4>
            <p>Sayuran segar dan dressing sehat.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/ramen.jpg" alt="">
        <div class="modal-card-info">
            <h4>Ramen</h4>
            <p>Mie kuah kaldu Jepang yang gurih.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/burger.jpg" alt="">
        <div class="modal-card-info">
            <h4>Burger</h4>
            <p>Roti isi daging juicy dan sayuran segar.</p>
        </div>
    </div>

</div>

    </div>
</div>


<script>
    const modal = document.getElementById("searchModal");
    const searchInput = document.querySelector(".search-form input");
    const closeBtn = document.querySelector(".modal-close");

    // buka modal saat input ditekan
    searchInput.addEventListener("focus", () => {
        modal.style.display = "flex";
    });

    // tombol close
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // klik area luar modal
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
</script>






</body>
</html>
