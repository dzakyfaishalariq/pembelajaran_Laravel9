<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
        ]);
    }
    public function store(Request $request)
    {
        $requestdata = $request->validate([
            'name' => 'required|min:3',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255',
            //'password_confirmation' => 'required|same:password'
        ]);
        // memasukan ke databes
        //cara pertama:
        //$requestdata['password'] = bcrypt($requestdata['password']);
        //cara ke dua:
        $requestdata['password'] = Hash::make($requestdata['password']);
        User::create($requestdata);
        // memberi peringatan di laravel 9 walaupun ada tanda garis merah hiraukan aja
        //$request->session()->flash('status', 'Akun berhasil dibuat');
        //pindah halaman ke halaman login dengan cara kedua menampilkan flash
        return redirect('/login')->with('status', 'Akun berhasil dibuat silahkan login');
    }
}
