<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;

class MuzakkiController extends Controller
{
    public function index() 
    {
        return view('muzakki.dashboard');
    }

    public function berita()
    {
        if(request('keyword')) {
            return view('muzakki.berita', [
                'berita'  => Article::where('title', 'like', '%' . request('keyword') . '%')->get()
            ]);
        } else {
            return view('muzakki.berita', [
                'berita'  => Article::all()
            ]);
        }
    }

    public function bacaberita($id)
    {
        return view('muzakki.bacaberita', [
            'data'  => Article::find($id)
        ]);
    }
}
