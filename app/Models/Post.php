<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    // laravel scope itu untuk mempermudah kita agar tidak menulis query yang sama berulang-ulang..
    // harus ada scopenya
    // $query pada contoller tidak dikirimkan namun otomatis dikirimkan jika menggunakan method filter() chaining method
    // array filters untuk menampung jika yang diterima terdapat beberapa pencarian
    public function scopeFilter($query, $filters = []){
        // if(isset($filters['search']) ? $filters['search'] : false){
        //      return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // sama aja dengan yang diatas namun sekarang menggunakan when
        // ini sama dengan if tanpa else karena when pada argumen pertama bernilai true
        // artinya jika ada $filters['search'] maka lakukan
        // $filters['search'] ?? false ini merupak syntax null coalising operator pada php 7 keatas yang sama ajaa dengan menggunakan operator ternari bisa digunakan isset juga
        // kembali ke when jika ada maka kembalikan closure atau function anonymous yang ada pada paramter edua when
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                $query->where('title', 'like', '%' . $search . '%')
                       ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        // untuk menambah multi
        $query->when($filters['category'] ?? false, function($query, $category){
            // ini untuk mengetahu relationship menggunakan where has dan paramter pertama adaalah nama relationshipnya
            // use digunaakan karena variabel category tidak bisa digunakan makanya menggunakan use
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // jika mau mengubah ke author maka tambahin paramter
    // karena jika user dia akan otomatis cari user id, jika beda maka harus menambahkan parameter, pada belongsTo
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ini agar controller post otomatis mencari slug buka id lagi
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

