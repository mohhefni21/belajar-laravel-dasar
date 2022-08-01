<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // cara manual autentikasi dan authorization
        // cek midleware disini
        // cek apakah sudah login apa belum, guest dis ini belum login
        // cek juga misalnya akum hefni adalah admin jadi ini cek apakah admin atau bukan
        // bisa menggunakan guest() atau check(), guest jika belum login kalau check() sudah login
        // kekurangan kita meletakkan pengecekan ini disini yaitu kita harus mengcopy baris dibawah tersebut ke semua method yang akan di cek
        // solusinya yaitu kita jadikan middleware sendiri aja yang nanti akan dipanggil di routes
        // if(auth()->guest() ||auth()->user()->username !== 'mohhefni'){
        //     abort(403);
        // }
        // menggunakan gates untuk authorization
        // $this->authorize('isadmin');
        // namun akan menggunakan midleware lagi pada routesnya karena gates ini digunakan untuk sidebarnya karena miidleware tidak bisa digunakan pada sidebar
        return view('dashboard.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
