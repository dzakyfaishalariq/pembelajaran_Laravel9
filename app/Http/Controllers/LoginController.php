<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }
    public function autenticate(Request $request)
    {
        $requestdata = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        // mencoba login
        //mengecek apakah email dan password benar
        if (Auth::attempt($requestdata)) {
            // jika berhasil
            //membuat regenerate untuk melindungi dari session hijacking / heker
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            // jika gagal
            return redirect('/login')->with('loginSalah', 'Username atau password salah');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
