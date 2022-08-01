<?php

namespace App\Models;

class Posts_Model
{
    private static $blogs_posts = [
        [
            "title" => "Judul pertama",
            "slug" => "Judul-pertama",
            "author" => " Moh Hefni", 
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, placeat animi vel aliquid dolorum debitis culpa fugit maxime. Non delectus soluta reprehenderit esse, eligendi aliquid, commodi vitae, eveniet eos nisi laboriosam maxime ratione. Fugiat modi laudantium soluta iure perferendis quibusdam id nemo, at mollitia corrupti expedita ratione maiores doloremque tempora magni qui rerum architecto libero, quis dolorem quos. Totam optio voluptatem facilis eligendi ipsum maxime laborum, ullam ducimus aut, nulla architecto labore blanditiis saepe similique in earum commodi obcaecati a."
        ],
        [
            "title" => "Judul kedua", 
            "slug" => "Judul-kedua", 
            "author" => "rafa, esi, ifur", 
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero rem at temporibus voluptatum sint. Labore eligendi ducimus quibusdam doloribus nam excepturi dolorem, molestiae perspiciatis, molestias dignissimos incidunt aspernatur pariatur nihil!"
        ],
    ];

    public static function all(){
        // collection adalah pembungkus pada sebuah array, menjadi lebih sakti, sama dengan reusability/high order function pada js
        // keywordnya adalah collect, agar bisa menggunakan banyak fungsi, dan jika dijalanin sama aja hanya tambah keren
        return collect(self::$blogs_posts);
    }

    public static function find($slug){
        // self : untuk property static
        // dan static : untuk method static
        // ini ambil data yang sudah menggunakan collection
        $posts = static::all();
        // $newPost = [];
        // foreach($posts as $post){
        //     if($post["slug"] === $slug){
        //         $newPost = $post;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }

    
};
