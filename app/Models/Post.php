<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    //=> id is not fillable atau tidak boleh diisi
    //property baru 
    protected $with = ['category', 'user'];
    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['cari']) ? $filters['cari'] : false) {
        //     return $query->where('title', 'LIKE', '%' . $filters['cari'] . '%')
        //         ->orWhere('body', 'LIKE', '%' . $filters['cari'] . '%');
        // }
        // cara ke dua
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->where('title', 'LIKE', '%' . $cari . '%')
                ->orWhere('body', 'LIKE', '%' . $cari . '%');
        });
        //mencari di dalam kategorinya
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        // mencari author
        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
