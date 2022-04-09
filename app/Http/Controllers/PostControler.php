<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostControler extends Controller
{
    public function index()
    {
        //uji coba ambil nilai dari From untuk pencarian
        //dd(request('cari'));
        //$databaseBuatan = Post::latest();
        // if (request('cari')) {
        //     $databaseBuatan->where('title', 'LIKE', '%' . request('cari') . '%')
        //         ->orWhere('body', 'LIKE', '%' . request('cari') . '%');
        // }
        return view('blog', [
            'title' => 'Blog',
            //'posts' => Post::all()
            'active' => 'posts',
            'posts' => Post::latest()->filter(request(['cari', 'category']))->paginate(7)->withQueryString() //menampilkan post terbaru
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Blog",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
