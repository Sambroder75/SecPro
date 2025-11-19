<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class MainPageController extends Controller
{
    public function index()
    {
        $latestRecipes = Recipe::with('user')->latest()->take(4)->get();
        $featuredRecipes = Recipe::with('user')->latest()->take(2)->get();

        return view('mainPage', [
            'latestRecipes' => $latestRecipes,
            'featuredRecipes' => $featuredRecipes,
        ]);
    }
}
