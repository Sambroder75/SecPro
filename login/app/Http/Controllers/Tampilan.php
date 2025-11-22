<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class Tampilan extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $recipes = Recipe::where('user_id', $user->id)->get();

        return view('profile', compact('user', 'recipes'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
