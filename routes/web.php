<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;


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
// routes ke home
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home",
    ]);
});
// routes ke about
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Moh Hefni",
        "email" => "mohhefni2105@gmail.com",
        "image" => "images/20180411_154948.jpg",
        "active" => "about",
    ]);
});
// routes ke posts
Route::get('/posts', [PostsController::class, 'index']);
// routes ke single post / detail
// route model binding
///posts/{post:slug} dan pastikan paramter $post harus sama, jika  ditambahin : slug maka slug yang akan dikrimkan jika tidak makaa ototmatos id
Route::get('/posts/{post:slug}', [PostsController::class, 'show']);
    // $newPost = [];
    // foreach($blogs as $post){
    //     if($post["slug"] === $slug){
    //         $newPost = $post;
    //     }
    // }

    // return view('post', [
    //     "title" => "single post",
    //     "post" => PostsModel::find($slug),
    // ]);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
        "active" => "categories",
    ]);
});

// tentang midlwere yaitu ketika login tidak bisa mengakses login dan registrasi
// dan jika tidak login tidak bisa akses dahsboard
// dan ketika login tulisan login ketika sudah login berubah tulisan ke akun yang login
// midleware bisa dipasang di routes, midleware berjalan ditengah misalnya : Route::get('/login', BERJALAN DISINI SEBELUM MASUK KE  CONTEROLLER[LoginController::class, 'index']);
// secara default pada laravel ada yang berjala yg terletak di app/Http/Middleware
// paling bawah terdapat $routeMidleware  yang akan digunakan yaitu auth : yng rtinya sudah login, guest yg artinya belum login
// untuk midlewarenya bisa di chaining di routesnya
// untuk ubah default rediret ketika di paksa masuk app/providers/RouteServiceProviders
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashbord/post/cekSlug', [DashboardPostController::class, 'cekSlug'])->middleware('auth');
// untuk mengirim slug kita bisa membuat route lagi istilahnya menipa
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// except('show') menghapus url ini agar tidak bisa diakses
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('isadmin');
// ini materi gates pada authorization
// karena jika kita menggunakan midleware saja bisa namun pada menu sidebar tidak hilang ini bisa menggunakan gates
// untuk membuat gates App\Providers\AppServiceProvider
// kelebihan dari midleware gampang dalam memberikan authorization banyak method sekaligus
// kekurangannya yaitu tidak fleksibel
// namun akan menggunakan midleware lagi pada routesnya karena gates ini digunakan untuk sidebarnya karena miidleware tidak bisa digunakan pada sidebar
// disini agar adminnya bisa lebih dari satu kita sisipkan saja satu field tanpa merubah user migrasi maka membuat migrasi lain saja untuk menyisipkan