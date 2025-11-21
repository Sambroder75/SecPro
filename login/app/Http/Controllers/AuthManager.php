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

    // ⭐ FUNGSI INI YANG DIPERBAIKI: Menambahkan penanganan 'Remember Me' dan menyederhanakan redirect
    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        // 💡 1. Mendapatkan nilai boolean dari checkbox 'remember'
        // $request->boolean('remember') akan mengembalikan true jika checkbox dicentang, false jika tidak.
        $remember = $request->boolean('remember'); 

        // 🔑 2. Meneruskan variabel $remember ke Auth::attempt()
        // Ini menentukan apakah session yang dibuat adalah session biasa (false) atau session persisten/cookie (true).
        if (Auth::attempt($credentials, $remember)) {
            
            // 🚀 3. Penyederhanaan Logika Redirect: 
            // Cukup panggil intended() atau route('mainpage') karena role sudah diperiksa di langkah selanjutnya
            // dan user akan selalu diarahkan ke mainpage terlepas dari role (sesuai logika kode asli Anda).
            // Jika ada logika redirect yang berbeda per role, gunakan cara di bawah:

            $user = Auth::user();
            
            // Jika Anda ingin admin ke dashboard admin dan user ke mainpage:
            if ($user->hasRole('admin')) {
                // Asumsi: Jika ada route khusus admin
                // return redirect()->route('admin.dashboard'); 
                return redirect()->route('mainpage'); // Sesuai kode asli, diarahkan ke mainpage
            } 
            
            // Untuk semua user lain (termasuk 'user')
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
    
    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}