<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Create Recipe</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create_page_styles.css') }}">
</head>
<body class="create-page-body">

    <header class="create-navbar">
        <div class="logo">Dapur Rasa</div>
        <button class="create-btn" type="submit">Create +</button>
    </header>

    <main class="create-container">
        <div class="back-link">
            <button onclick='window.location.href="{{ url("/mainpage") }}"'>
                &larr; Back
            </button>
        </div>

        <form class="recipe-form" action="{{ url('/submit_recipe') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="upload-column">
                <label for="recipe-file" class="file-upload-box">
                    <span class="plus-icon">+</span>
                    <span class="choose-text">Choose a file</span>
                </label>
                <input type="file" id="recipe-file" name="recipeImage" accept="image/*" required>
            </div>

            <div class="input-column">
                <label for="recipe-title">Add a title</label>
                <input type="text" id="recipe-title" name="title" required>
                
                <label for="recipe-description">Description</label>
                <textarea id="recipe-description" name="description" rows="3" required></textarea>
                
                <label for="recipe-resep">Resep</label>
                <textarea id="recipe-resep" name="ingredients" rows="5" required></textarea>
                
                <label for="recipe-langkah">Langkah-langkah</label>
                <textarea id="recipe-langkah" name="steps" rows="6" required></textarea>
            </div>
        </form>
    </main>

</body>
</html>
