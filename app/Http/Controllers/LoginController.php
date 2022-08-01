<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            "active" => "login",
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required','min:5','max:255'],
            ], 
            [
                'username.required' => 'The :attribute field must filled.',
                'password.min' => 'Password minimum 5'
            ]);

        if (Auth::attempt($credentials)) {
            // session regenereate untuk menghindari kejahatan lewat session
            $request->session()->regenerate();
            
            // setelah itu rideret ke menggunakan intended, yang fungsinya sebelum melewati midleware
            return redirect()->intended('/dashboard');
        }
 
        // jika gagal loginnya
        // ini kenapa kita tidak membertahukan apa yang membuat error karena sistem tidak mudah di bobol
        return back()->with('loginError', 'Login failed !')->onlyInput('username');

    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
