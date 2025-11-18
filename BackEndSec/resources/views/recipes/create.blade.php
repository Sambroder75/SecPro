<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Create Recipe</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/create_page_styles.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
</head>
<body class="create-page-body">

    <header class="create-navbar">
        <div class="logo">Dapur Rasa</div>
        
        <button class="create-btn" type="button" onclick="document.getElementById('recipe-form-id').submit();">
            Create +
        </button>
    </header>

    <main class="create-container">
        
        <div class="back-link">
            <button type="button" onclick="window.location.href='{{ url()->previous() }}'">
                &larr; Back
            </button>
        </div>

        <form class="recipe-form" id="recipe-form-id" action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="upload-column">
                <label for="recipe-file" class="file-upload-box">
                    <span class="plus-icon">+</span>
                    <span class="choose-text">Choose a file</span>
                </label>
                <input type="file" id="recipe-file" name="recipeImage" accept="image/*" required>
                @error('recipeImage')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-column">
                
                <label for="recipe-title">Add a title</label>
                <input type="text" id="recipe-title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror
                
                <label for="recipe-description">Description</label>
                <textarea id="recipe-description" name="description" rows="3" required>{{ old('description') }}</textarea>
                @error('description')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror
                
                <label for="recipe-resep">Resep</label>
                <textarea id="recipe-resep" name="ingredients" rows="5" required>{{ old('ingredients') }}</textarea>
                @error('ingredients')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror
                
                <label for="recipe-langkah">Langkah-langkah</label>
                <textarea id="recipe-langkah" name="steps" rows="6" required>{{ old('steps') }}</textarea>
                @error('steps')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror
                
            </div>
            
        </form>
    </main>

    <script src="{{ asset('js/image-preview.js') }}"></script>
</body>
</html>