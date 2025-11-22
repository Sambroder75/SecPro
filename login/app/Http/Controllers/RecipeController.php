<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Recipe::query()->with('user');

        if (request('search')) {
            $searchTerm = request('search');
            $query->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }

        $recipes = $query->latest()->get(); 

        return view('recipes.index', [
            'recipes' => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(auth()->check(), 403, 'Unauthorized');
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_unless(auth()->check(), 403, 'Unauthorized');

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'recipeImage' => 'required|image|mimes:png|max:2048',
        ]);

        $path = $request->file('recipeImage')->store('recipe-images', 'public');

        $recipe = Recipe::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'ingredients' => $validatedData['ingredients'],
            'steps' => $validatedData['steps'],
            'image_path' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('recipes.show', $recipe->id)
            ->with('success', 'Recipe created successfully!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $user = auth()->user();

        if (!$user || ($user->id !== $recipe->user_id && $user->id !== 1 && strtolower($user->usertype) !== 'admin')) {
            abort(403, 'Unauthorized');
        }

        return view('recipes.edit', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $user = auth()->user();

        if (!$user || ($user->id !== $recipe->user_id && $user->id !== 1 && strtolower($user->usertype) !== 'admin')) {
            abort(403, 'Unauthorized');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'recipeImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dataToUpdate = [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'ingredients' => $validatedData['ingredients'],
            'steps' => $validatedData['steps'],
        ];

        if ($request->hasFile('recipeImage')) {
            if ($recipe->image_path) {
                Storage::disk('public')->delete($recipe->image_path);
            }
            $path = $request->file('recipeImage')->store('recipe-images', 'public');
            $dataToUpdate['image_path'] = $path;
        }

        $recipe->update($dataToUpdate);

        return redirect()->route('recipes.show', $recipe->id)
            ->with('success', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $user = auth()->user();

        if (!$user || ($user->id !== $recipe->user_id && $user->id !== 1 && strtolower($user->usertype) !== 'admin')) {
            abort(403, 'Unauthorized');
        }

        if ($recipe->image_path) {
            Storage::disk('public')->delete($recipe->image_path);
        }
        
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted successfully');
    }
}
