<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class Tampilan extends Controller
{
    public function show()
    {
        $user = Auth::user(); // get logged in user
        $recipes = Recipe::where('user_id', $user->id)->get(); // if you show recipes

        return view('profile', compact('user', 'recipes'));
    }
}
