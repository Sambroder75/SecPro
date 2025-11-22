<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dapur Rasa - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            margin: 0; 
            padding: 0;
            background: linear-gradient(180deg, #fff8f0 0%, #ffe3d0 100%);
            min-height: 100vh;
        }

        header {
            background-color: #fffdf9;
            box-shadow: 0 1px 5px rgba(0,0,0,0.05);
            padding: 15px 40px;
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .logo img {
            height: 50px;
            object-fit: contain;
            display: block;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 1rem;
            position: relative;
            padding: 5px 0;
        }

        .nav-links a:hover, 
        .nav-links a.active {
            color: #6b8e23;
            font-weight: 600;
        }
        
        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #6b8e23;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-form { 
            display: flex; 
            align-items: center;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 50px;
            padding: 5px 20px;
            width: 250px;
            height: 35px;
        }

        .search-form input { 
            border: none;
            background: transparent;
            font-size: 0.9rem; 
            font-family: 'Poppins', sans-serif;
            outline: none;
            flex-grow: 1;
            color: #555;
        }

        .search-form button { 
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .search-form button img {
            width: 18px;
            height: 18px;
            opacity: 0.7;
        }

        .profile-icon img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .recipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 30px;
            padding: 0 40px 40px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .recipe-card { 
            background-color: #faebd7;
            background: linear-gradient(to right, #fffbf5, #faebd7);
            padding: 20px; 
            border-radius: 25px;
            display: flex; 
            align-items: center; 
            gap: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            
            /* IMPORTANT: This allows us to position the buttons absolutely inside the card */
            position: relative; 
        }

        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .card-link::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 25px;
            z-index: 1; 
        }

        .recipe-card img.recipe-img { 
            width: 130px; 
            height: 130px; 
            object-fit: cover; 
            border-radius: 50%;
            border: 4px solid white;
            flex-shrink: 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card-content h2 {
            margin: 0 0 5px 0;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-content h2 a { 
            text-decoration: none; 
            color: #333; 
            font-weight: 700;
        }

        .card-content p {
            font-size: 0.85rem;
            color: #555;
            line-height: 1.5;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            /* Make sure text doesn't overlap with buttons on the right */
            padding-right: 40px; 
        }

        /* --- NEW ACTION BUTTONS STYLING --- */
        .action-buttons {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 8px;
            z-index: 10; /* Ensure it sits on top of the card link */
        }

        .btn-circle {
            width: 32px;
            height: 32px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.15s ease;
            font-size: 14px;
        }

        .btn-circle:hover {
            transform: scale(1.1);
            background: #fffdf9;
        }

        .btn-edit { color: #f39c12; }   /* Orange Pencil */
        .btn-trash { color: #e74c3c; }  /* Red Trash */
        /* --------------------------------- */

        @media (max-width: 900px) {
            header { flex-direction: column; gap: 20px; }
            .header-left { flex-direction: column; gap: 15px; }
            .recipe-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-left">
            <div class="logo">
                <a href="{{ route('recipes.index') }}">
                    <img src="{{ asset('foto/logokecil.png') }}" alt="Dapur Rasa Logo">
                </a>
            </div>
            <nav class="nav-links">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </nav>
        </div>

        <div class="header-right">
            <form action="{{ route('recipes.index') }}" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Cari Resep..." value="{{ request('search') }}">
                <button type="submit">
                    <img src="{{ asset('foto/search.png') }}" alt="Search">
                </button>
            </form>
            <div class="profile-icon">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile">
            </div>
        </div>
    </header>

    <div class="recipe-grid">
        @if ($recipes->isEmpty())
            <p style="grid-column: 1/-1; text-align: center; color: #666;">No recipes found matching your search.</p>
        @else
            @foreach ($recipes as $recipe)
                <div class="recipe-card">
                    @if($recipe->image_path)
                        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="recipe-img">
                    @else
                        <img src="https://via.placeholder.com/150" alt="No Image" class="recipe-img">
                    @endif
                    
                    <div class="card-content">
                        <h2>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="card-link">
                                {{ $recipe->title }}
                            </a>
                        </h2>
                        <p>{{ Str::limit($recipe->description, 120) }}</p>
                    </div>

                    @if(auth()->check() && (auth()->id() === $recipe->user_id || auth()->id() === 1 || strtolower(auth()->user()->usertype) === 'admin'))
                        <div class="action-buttons">
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn-circle btn-edit" title="Edit Recipe">
                                ✏️
                            </a>

                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Delete this recipe?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-circle btn-trash" title="Delete Recipe">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    @endif
                    </div>
            @endforeach
        @endif
    </div>

</body>
</html>