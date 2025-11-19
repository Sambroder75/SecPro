<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - {{ $recipe->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <!-- Using your specific comment layout CSS -->
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
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
        <!-- LEFT COLUMN: RECIPE -->
        <section class="recipe-section">
            <a href="javascript:history.back()" class="back-btn">
                &larr; Back to Recipes
            </a>

            <!-- Recipe Image -->
            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="recipe-img">

            <!-- Recipe Content -->
            <h1 style="font-family: 'Georgia', serif; font-size: 2rem; margin-bottom: 10px;">{{ $recipe->title }}</h1>
            
            <div class="author">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Author">
                <span>By <strong>Admin</strong></span> <!-- Replace with dynamic author if available -->
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

        <!-- RIGHT COLUMN: COMMENTS -->
        <section class="comments-section">
            <h2>Comments</h2>

            <!-- List of Comments -->
            <div class="comments-list-container">
                @forelse($recipe->comments()->latest()->get() as $comment)
                    <div class="comment">
                        <!-- Avatar -->
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->username ?? 'Guest') }}&background=random" alt="User">
                        
                        <div class="comment-content">
                            <h4>
                                {{ $comment->username ?? $comment->user?->name ?? 'Guest' }}
                                <span class="comment-date">{{ $comment->created_at->diffForHumans(null, true) }}</span>
                            </h4>
                            <p>{{ $comment->comment_text }}</p>
                            
                            <!-- Delete Button (Subtle) -->
                            @if(auth()->check() && auth()->id() === $comment->user_id)
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

            <!-- Comment Form (Bottom) -->
            <div class="comment-input">
                <!-- User Avatar (Current User) -->
                <img src="{{ asset('foto/logoprofile.png') }}" alt="You">
                
                <form action="{{ route('comments.store', $recipe) }}" method="POST" class="comment-form-wrapper">
                    @csrf
                    
                    <!-- Guest Name Input (Only show if guest) -->
                    @if(!auth()->check())
                    <input type="text" name="username" class="guest-name-input" placeholder="Name" required>
                    @endif

                    <!-- Comment Text -->
                    <input type="text" name="comment_text" placeholder="Add a comment..." required autocomplete="off">
                    
                    <button type="submit">Post</button>
                </form>
            </div>

        </section>
    </main>

</body>
</html>