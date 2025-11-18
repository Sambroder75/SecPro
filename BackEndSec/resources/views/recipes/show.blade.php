<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - {{ $recipe->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/detail_resep_styles.css') }}"> 
</head>
<body class="detail-page-body">

    <header class="navbar">
    <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">

    <div class="right-side">
        
        @include('partials.search-bar')

        <button class="profile-btn" onclick="window.location.href='#'">
            <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
        </button>
    </div>
</header>

    <main class="recipe-detail-container">
        
        <div class="image-column">
            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="recipe-image">
            
            <div class="gradient-area">
                <button class="back-btn" onclick="history.back()">
                    &larr; Back
                </button>
            </div>
        </div>

        <div class="content-column">
            
            <h1 class="recipe-title">{{ $recipe->title }}</h1>
            
            <p class="recipe-description">
                {{ $recipe->description }}
            </p>
            
            <section class="ingredients-section">
                <h2>Resep:</h2>
                <div class="ingredients-list">
                    {!! nl2br(e($recipe->ingredients)) !!}
                </div>
            </section>
            
            <section class="steps-section">
                <h2>Langkah-langkah:</h2>
                <div class="steps-content">
                    {!! nl2br(e($recipe->steps)) !!}
                </div>
            </section>

        </div>
    </main>

    <section class="comments-section">
        <div class="comments-container">
            <h2>Comments</h2>

            @auth
            <form action="{{ route('comments.store', $recipe) }}" method="POST" class="comment-form">
                @csrf
                <textarea name="comment_text" rows="3" placeholder="Write your comment..." required></textarea>
                <button type="submit">Post Comment</button>
            </form>
            @else
            <p>Please <a href="{{ route('login') }}">login</a> to post a comment.</p>
            @endauth

            <div class="comments-list">
                @foreach($recipe->comments()->latest()->get() as $comment)
                    <div class="comment-item">
                        <div class="comment-meta">
                            <strong>{{ $comment->username ?? $comment->user?->name ?? 'Guest' }}</strong>
                            <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="comment-body">{{ $comment->comment_text }}</div>

                        <!-- Delete button: Only for logged in users who own the comment -->
                        @if(auth()->check() && auth()->id() === $comment->user_id)
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Delete this comment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-comment">Delete</button>
                        </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</body>
</html>