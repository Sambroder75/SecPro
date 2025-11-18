<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    /**
     * Store a newly created comment for a recipe.
     */
    public function store(StoreCommentRequest $request, Recipe $recipe): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $recipe->comments()->create($data);

        return back()->with('success', 'Comment posted.');
    }
    /**
     * Remove the specified comment.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $userId = auth()->id();
        if ($userId !== $comment->user_id) {
            abort(403);
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted.');
    }
}
