<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Recipes</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .search-form { display: flex; }
        .search-form input { padding: 8px; font-size: 1rem; border: 1px solid #ccc; border-radius: 4px 0 0 4px; }
        .search-form button { padding: 8px 12px; border: 1px solid #007bff; background-color: #007bff; color: white; cursor: pointer; border-radius: 0 4px 4px 0; }
        .recipe-card { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; display: flex; align-items: center; border-radius: 4px; }
        .recipe-card img { width: 100px; height: 100px; object-fit: cover; margin-right: 15px; border-radius: 4px; }
        .recipe-card a { text-decoration: none; color: #333; font-size: 1.2rem; }
    </style>
</head>
<body>

    <div class="header">
        <h1>All Recipes</h1>

        <form action="{{ route('recipes.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Cari resep..." value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>

    </div>

    <a href="{{ route('recipes.create') }}" style="display: block; margin-bottom: 20px;">+ Create New Recipe</a>

    @if ($recipes->isEmpty())
        <p>No recipes found matching your search.</p>
    @else
        @foreach ($recipes as $recipe)
            <div class="recipe-card">
                @if($recipe->image_path)
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}">
                @endif
                <div>
                    <h2><a href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->title }}</a></h2>
                    <p>{{ Str::limit($recipe->description, 100) }}</p>
                </div>
            </div>
        @endforeach
    @endif
</body>
</html>