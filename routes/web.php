<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControler;
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

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blog', [
        'title' => "Category :  $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'user'),
        //'category' => $category->name
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('blog', [
        'title' => "Author :  $author->name",
        //load digunakan untuk mengoptimalkan pengambilan databes
        //boleh pake load atau tidak recomenden load
        'posts' => $author->posts->load('category', 'user'),
    ]);
});
