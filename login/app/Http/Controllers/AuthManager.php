<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthManager extends Controller
{
    function login() {
        if (Auth::check()) {
            return redirect(route('mainpage'));
        }
        return view('login');
    }

    function registration() {
        return view('registration');
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if (method_exists($user, 'hasRole') && $user->hasRole('admin')) {
                return redirect()->route('mainpage');
            }

            return redirect()->intended(route('mainpage'));
        }

        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    function registrationPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:users',
                'regex:/^[A-Za-z0-9._%+-]+@gmail\.com$/i'
            ],
            'password' => 'required|min:8'
        ],[
            'email.regex' => 'Email harus menggunakan domain @gmail.com.',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed, please try again.");
        }

        return redirect(route('login'))->with("success", "Registration success, please login to enter the app.");
    }

    function logout(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        if ($user) {
            $user->setRememberToken(null);
            $user->save();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
