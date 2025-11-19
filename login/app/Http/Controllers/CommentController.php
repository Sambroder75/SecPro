<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// --- FIX: ADD THESE IMPORTS ---
use App\Http\Requests\StoreCommentRequest; // <--- Fixes "Class does not exist" error
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
// ------------------------------

class CommentController extends Controller
{
    // --- FIX: ADD INDEX METHOD ---
    // This is required to SHOW the comments page. Without it, you can't see the form.
    public function index(Recipe $recipe)
    {
        $comments = $recipe->comments()->latest()->get();
        return view('comment', compact('recipe', 'comments'));
    }

    /**
     * Store a newly created comment for a recipe.
     */
    public function store(StoreCommentRequest $request, Recipe $recipe): RedirectResponse
    {
        $data = $request->validated();

        // --- DEV MODE: Hardcode User ID 1 for testing ---
        // Since you likely aren't logged in as a real user yet, use ID 1.
        // When your login system is ready, change this back to: $data['user_id'] = auth()->id();
        $data['user_id'] = 1;
        //nanti ganti ke yg ini ya, yg atas ngecek klo at least codenya bisa ato ga
        //$data['user_id'] = auth()->id()

        // Optional: If your form sends a username (for guests), use it.
        if (!isset($data['username'])) {
            $data['username'] = 'Test User';
        }

        $recipe->comments()->create($data);

        return back()->with('success', 'Comment posted.');
    }

    /**
     * Remove the specified comment.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        // Security check disabled for testing
        // $userId = auth()->id();
        // if ($userId !== $comment->user_id) { abort(403); }

        $comment->delete();

        return back()->with('success', 'Comment deleted.');
    }
}
