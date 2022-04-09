<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControler;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        "name" => "Dzaky Faishalariq pirdaus",
        "email" => "dzakyfaisalariq@gmail.com",
        "gambar" => "img/gambar1.png"
    ]);
});

//membuat array untuk menampilkan data


Route::get('/blog', [PostControler::class, 'index']);

//halaman singel post
Route::get('/blog/{post:slug}', [PostControler::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categori/{category:slug}', function (Category $category) {
    return view('cate', [
        'title' => "Category :  $category->name",
        'posts' => $category->posts->load('category', 'user'),
        //'category' => $category->name
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('blog', [
        'title' => "Author :  $author->name",
        'active' => "Blog",
        //load digunakan untuk mengoptimalkan pengambilan databes
        //boleh pake load atau tidak recomenden load
        'posts' => $author->posts->load('category', 'user'),
    ]);
});

//login user
//middleware guest digunakan untuk tamu
// lihat di autenticate di folder milderwer yang nama('login') 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autenticate']); //bebas boleh nama nya
// kembali ke mode tamu
Route::post('/logout', [LoginController::class, 'logout']);
//register user
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// mengakses halam ini untuk user saja yang sudah terverifikasi
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
