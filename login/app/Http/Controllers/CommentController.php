<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function index(Recipe $recipe)
    {
        $comments = $recipe->comments()->latest()->get();
        return view('comment', compact('recipe', 'comments'));
    }

    public function store(StoreCommentRequest $request, Recipe $recipe): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $recipe->comments()->create($data);

        return back()->with('success', 'Comment posted.');
    }

    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        if ($user->id !== $comment->user_id && $user->usertype !== 'admin' && $user->id !== 1) {
            abort(403, 'Unauthorized.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }

}
