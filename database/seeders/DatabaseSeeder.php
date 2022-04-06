<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //sudah di ubah ke indonesia
        //seeding manual
        // User::create([
        //     'name' => 'Dzaky Faishalariq',
        //     'email' => 'dzakyfaishalariq@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        // User::create([
        //     'name' => 'Fahri haikal',
        //     'email' => 'fahri@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        User::factory(3)->create();
        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);
        Category::create([
            'name' => 'Isu',
            'slug' => 'isu'
        ]);
        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga'
        ]);
        //panggil factory 
        Post::factory(20)->create();
        // Post::create([
        //     'title' => 'Judul Pertama saya',
        //     'slug' => 'judul-pertama-saya',
        //     'excerpt' => 'Ini adalah excerpt dari judul pertama saya',
        //     'body' => 'Ini adalah body dari judul pertama saya lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quaerat!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua saya',
        //     'slug' => 'judul-kedua-saya',
        //     'excerpt' => 'Ini adalah excerpt dari judul pertama saya',
        //     'body' => 'Ini adalah body dari judul pertama saya lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quaerat!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga saya',
        //     'slug' => 'judul-ketiga-saya',
        //     'excerpt' => 'Ini adalah excerpt dari judul pertama saya',
        //     'body' => 'Ini adalah body dari judul pertama saya lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quaerat!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Keempat saya',
        //     'slug' => 'judul-keempat-saya',
        //     'excerpt' => 'Ini adalah excerpt dari judul pertama saya',
        //     'body' => 'Ini adalah body dari judul pertama saya lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quaerat!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
