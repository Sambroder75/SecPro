<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DapurRasa | Comments</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}" />
</head>

<body>

<header class="navbar">
    <div class="logo">Dapur<span>Rasa</span></div>
    <div class="right-side">
        <form class="search-form" role="search">
            <input type="text" placeholder="Search" />
            <button type="submit">
                <img src="https://cdn-icons-png.flaticon.com/128/149/149852.png" alt="search" />
            </button>
        </form>
        <button class="profile-btn" aria-label="profile">
            <img src="https://cdn-icons-png.flaticon.com/128/1144/1144760.png" alt="user" />
        </button>
    </div>
</header>

<main>

    {{-- === RECIPE HEADER === --}}
    @if(isset($recipe))
    {{-- === RECIPE HEADER === --}}
    <section class="recipe-section">
        <a href="{{ url('/detailresep/' . $recipe->id) }}" class="back-btn">&#8592; Back</a>

        <div class="recipe-info">
            <div class="author">
                <img src="https://cdn-icons-png.flaticon.com/128/1144/1144760.png" alt="author" />
                <div>
                    <h4>{{ $recipe->author ?? 'Unknown Author' }}</h4>
                    <p>{{ $recipe->created_at->format('M d, Y') }}</p>
                </div>
            </div>

            <img src="{{ asset('foto/' . $recipe->image) }}" 
                 alt="{{ $recipe->title }}" 
                 class="recipe-img" />
        </div>
    </section>

    {{-- === COMMENTS SECTION === --}}
    <section class="comments-section">
        <h2>Comments</h2>

        {{-- LIST EXISTING COMMENTS --}}
        @forelse ($comments as $comment)
            <div class="comment">
                <img src="https://cdn-icons-png.flaticon.com/128/1144/1144760.png" alt="user" />

                <div>
                    <h4>{{ $comment->username ?? 'Guest' }}</h4>
                    <p>{{ $comment->comment_text }}</p>
                </div>
            </div>
        @empty
            <p>No comments yet. Be the first!</p>
        @endforelse


        {{-- NEW COMMENT FORM --}}
        <form action="{{ route('comments.store', $recipe->id) }}" method="POST">
            @csrf

            <div class="comment-input">
                <input type="text" 
                       name="username" 
                       placeholder="Your name..."
                       required>

                <input type="text" 
                       name="comment_text" 
                       placeholder="Write a comment..."
                       required>

                <button type="submit">
                    <img src="https://cdn-icons-png.flaticon.com/128/724/724954.png" alt="send" />
                </button>
            </div>
        </form>

    </section>
    @else
    <section class="comments-section">
        <h2>Comments</h2>
        <p>No recipe selected — create a recipe first to enable comments.</p>
    </section>
    @endif

</main>

</body>
</html>