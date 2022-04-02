<?php

namespace App\Models;

class Post
{
    private static $blog_post = [
        [
            "judul" => "judul pertama saya",
            "slug" => "judul-pertama-saya",
            "author" => "Dzaky Faishalariq",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed repellendus, ratione illum fugiat commodi veniam temporibus aspernatur eos rerum similique voluptatibus iure beatae ut accusamus quos eum asperiores tenetur quae!"
        ],
        [
            "judul" => "judul kedua saya",
            "slug" => "judul-kedua-saya",
            "author" => "Dodi inrsya",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed repellendus, ratione illum fugiat commodi veniam temporibus aspernatur eos rerum similique voluptatibus iure beatae ut accusamus quos eum asperiores tenetur quae!"
        ]
    ];

    public static function all()
    {
        //property statik
        return collect(self::$blog_post);
        //propertu tidak statik
        // return $this->blog_post;
    }
    public static function find($slug)
    {
        $posts = static::all();
        return $posts->where('slug', $slug)->first();
    }
}
