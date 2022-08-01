<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\User;

class PostsController extends Controller
{
    public function index()
    {
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = "Post In : $category->name";
        }elseif(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = "Post By : $author->name";
        }else{
            $title = 'All Post';
        }
        return view('posts', [
            "title" => $title,
            "active" => "posts",
            // "posts" => Post::all(),
            // filter() merupakan query local scope yang didefinisikan di model
            // withQueryString agar pagination tidak riset
            // dengan filter kita bisa juga bisa multi kriteria yang ingin dicari
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
        
    }

    // routes model binding dengan 2 paramter
    // yang dimana paramter pertama adalah Model dan paramter kedua $post yang namanya harus sama dengan yng dikirmkan routes
    public function show(Post $post)
    {
        return view('post', [
            "title" => "single post",
            "post" => $post,
            "active" => "posts",
            // "category" => DB::table('categories')->where('id', $post->category_id)->get()
        ]);
    }
}
