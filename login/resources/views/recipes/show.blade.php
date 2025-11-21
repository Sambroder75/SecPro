<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - {{ $recipe->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <style>
        .recipe-image-wrapper {
            position: relative;
        }

        .recipe-action-buttons {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 8px;
        }

        .recipe-action-buttons a,
        .recipe-action-buttons button {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #e0e0e0;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .recipe-action-buttons a:hover,
        .recipe-action-buttons button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 16px rgba(0, 0, 0, 0.12);
        }
    </style>
</head>
<body>

    <header class="navbar">
        <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">
        <div class="right-side">
            @include('partials.search-bar')
            <button class="profile-btn">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
            </button>
        </div>
    </header>

    <main>
        <section class="recipe-section">
            <a href="javascript:history.back()" class="back-btn">
                &larr; Back to Recipes
            </a>

            <div class="recipe-image-wrapper">
                <img src="{{ $recipe->image_path ? asset('storage/' . $recipe->image_path) : asset('foto/makanan1.png') }}" alt="{{ $recipe->title }}" class="recipe-img">

                @if(auth()->check() && (auth()->id() === $recipe->user_id || strtolower(auth()->user()->usertype) === 'admin'))
                <div class="recipe-action-buttons">
                    <a href="{{ route('recipes.edit', $recipe) }}" title="Edit Recipe">✏️</a>
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Delete this recipe?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete Recipe">🗑️</button>
                    </form>
                </div>
                @endif
            </div>

            <h1 style="font-family: 'Georgia', serif; font-size: 2rem; margin-bottom: 10px;">{{ $recipe->title }}</h1>
            
            <div class="author">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Author">
                <span>By <strong>{{ $recipe->user?->name ?? 'Community Chef' }}</strong></span>
            </div>

            <p style="line-height: 1.6; color: #555; margin-bottom: 30px;">
                {{ $recipe->description }}
            </p>

            <div style="background: white; padding: 20px; border-radius: 12px; border: 1px solid #eee; margin-bottom: 20px;">
                <h3 style="margin-top: 0;">Ingredients</h3>
                <div style="line-height: 1.8;">
                    {!! nl2br(e($recipe->ingredients)) !!}
                </div>
            </div>

            <div style="background: white; padding: 20px; border-radius: 12px; border: 1px solid #eee;">
                <h3 style="margin-top: 0;">Instructions</h3>
                <div style="line-height: 1.8;">
                    {!! nl2br(e($recipe->steps)) !!}
                </div>
            </div>
        </section>

        <section class="comments-section" id="comments">
            <h2>Comments</h2>

            <div class="comments-list-container">
                @forelse($recipe->comments()->with('user')->latest()->get() as $comment)
                    <div class="comment">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user?->name ?? 'Guest') }}&background=random" alt="User">

                        <div class="comment-content">
                            <h4>
                                {{ $comment->user?->name ?? 'Guest' }}
                                <span class="comment-date">{{ $comment->created_at->diffForHumans(null, true) }}</span>
                            </h4>
                            <p>{{ $comment->comment_text }}</p>

                            @if(auth()->check() && (auth()->id() === $comment->user_id || strtolower(auth()->user()->usertype) === 'admin' || auth()->id() === 1))
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="margin-top: 5px;">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" style="background:none; border:none; color: #e74c3c; font-size: 11px; cursor: pointer; padding: 0;">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @empty
                    <p style="text-align: center; color: #999; padding: 20px;">No comments yet. Be the first!</p>
                @endforelse
            </div>

            <div class="comment-input">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="You">

                <form action="{{ route('comments.store', $recipe) }}" method="POST" class="comment-form-wrapper">
                    @csrf

                    <input type="text" name="comment_text" placeholder="Add a comment..." required autocomplete="off">

                    <button type="submit">Post</button>
                </form>
            </div>

        </section>
    </main>
</body>
</html>