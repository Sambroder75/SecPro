<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Contact</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_page.css') }}">
    
    <style>
        .contact-hero {
            background-color: var(--color-primary-orange);
            color: white;
            padding: 40px var(--content-padding);
            text-align: center;
            margin-bottom: 40px;
        }

        .contact-hero h1 {
            margin: 0;
            font-family: 'Georgia', serif;
            font-size: 2.5rem;
        }

        .contact-hero p {
            margin-top: 10px;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .team-section {
            padding: 0 var(--content-padding);
            max-width: 1200px;
            margin: 0 auto 60px auto;
        }

        .team-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        /* Card styling matching your Recipe Card aesthetics */
        .member-card {
            background: white;
            width: 280px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-align: center;
            border: 1px solid #eee;
        }

        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }

        .member-img-wrapper {
            background-color: #fcf9f5;
            padding: 30px 0;
            border-bottom: 1px solid var(--color-separator-tan);
        }

        .member-img-wrapper img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .member-info {
            padding: 20px;
        }

        .member-info h3 {
            margin: 0 0 5px 0;
            color: var(--color-text-dark);
            font-size: 1.1rem;
            font-family: 'Georgia', serif;
        }

        .member-info p {
            margin: 0;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

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

    <div class="secondary-nav-bar">
        <nav class="main-nav">
            <ul>
                <li><a href="{{ url('/mainpage') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}" class="active">Contact</a></li>
            </ul>
        </nav>
    </div>

    <main>
        <section class="contact-hero">
            <h1>Kelompok 5</h1>
            <p>Meet the team behind Dapur Rasa</p>
        </section>

        <section class="team-section">
            <div class="team-grid">

                <div class="member-card">
                    <div class="member-img-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Samuel+Christian&background=e8a05e&color=fff&size=128" alt="Samuel Christian">
                    </div>
                    <div class="member-info">
                        <h3>Samuel Christian</h3>
                        <p>Team Member</p>
                    </div>
                </div>

                <div class="member-card">
                    <div class="member-img-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Sean+Richard&background=558b2f&color=fff&size=128" alt="Sean Richard">
                    </div>
                    <div class="member-info">
                        <h3>Sean Richard</h3>
                        <p>Team Member</p>
                    </div>
                </div>

                <div class="member-card">
                    <div class="member-img-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Aurelio+Suhartono&background=e8a05e&color=fff&size=128" alt="Aurelio Suhartono">
                    </div>
                    <div class="member-info">
                        <h3>Aurelio Suhartono</h3>
                        <p>Team Member</p>
                    </div>
                </div>

                <div class="member-card">
                    <div class="member-img-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Andrew+Emmanuel&background=558b2f&color=fff&size=128" alt="Andrew Emmanuel">
                    </div>
                    <div class="member-info">
                        <h3>Andrew Emmanuel William Pakpahan</h3>
                        <p>Team Member</p>
                    </div>
                </div>

                <div class="member-card">
                    <div class="member-img-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Paul+Abednego&background=e8a05e&color=fff&size=128" alt="Paul Abednego">
                    </div>
                    <div class="member-info">
                        <h3>Paul Abednego Hasphine</h3>
                        <p>Team Member</p>
                    </div>
                </div>

                <div class="member-card">
                    <div class="member-img-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Justin+Raphael&background=558b2f&color=fff&size=128" alt="Justin Raphael">
                    </div>
                    <div class="member-info">
                        <h3>Justin Raphael Joli Putra</h3>
                        <p>Team Member</p>
                    </div>
                </div>

            </div>
        </section>
    </main>

</body>
</html>