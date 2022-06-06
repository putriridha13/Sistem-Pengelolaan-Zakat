<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('keyword')) {
            return view('article.article', [
                'title' => 'Tabel Data Artikel',
                'article'  => Article::where('title', 'like', '%' . request('keyword') . '%')->paginate(15)->withQueryString()
            ]);
        } else {
            return view('article.article', [
                'title' => 'Tabel Data Artikel',
                'article'  => Article::paginate(15)
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create', [
            'title' => 'Tambah Data Artikel'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'author'    => 'required',
            'picture'   => 'required|image|mimes:png,jpg,jpeg',
            'description'   => 'required'
        ]);
        $picture = $request->file('picture');
        $pictureName = time() . '_' . Str::lower($picture->getClientOriginalName());
        $request->picture = $pictureName;
        $picture->move(public_path('img/article/'), $pictureName);
        Article::create([
            'title' => $request->title,
            'author'    => $request->author,
            'picture'   => $request->picture,
            'description' => $request->description
        ]);
        return redirect('/article')->with('pesan', 'Data Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'data'  => $article,
            'title' => 'Edit Data Artikel'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if($request->picture) {
            $request->validate([
                'title'     => 'required',
                'author'    => 'required',
                'picture'   => 'required|image|mimes:png,jpg,jpeg',
                'description'   => 'required'
            ]);
            File::delete(public_path("img/article/" . $article->picture));
            $picture = $request->file('picture');
            $pictureName = time() . '_' . Str::lower($picture->getClientOriginalName());
            $request->picture = $pictureName;
            $picture->move(public_path('img/article/'), $pictureName);
            $article->update([
                'title' => $request->title,
                'author'    => $request->author,
                'picture'   => $request->picture,
                'description' => $request->description
            ]);
            return redirect('/article')->with('pesan', 'Data Artikel dan Gambar berhasil diperbaharui');
        } else {
            $request->validate([
                'title'     => 'required',
                'author'    => 'required',
                'description'   => 'required'
            ]);
            $article->update([
                'title' => $request->title,
                'author'    => $request->author,
                'description' => $request->description
            ]);
            return redirect('/article')->with('pesan', 'Data Artikel berhasil diperbaharui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        unlink(public_path('img/article/') . $article->picture);
        $article->delete();
        return redirect('/article')->with('pesan', 'Data Artikel berhasil dihapus');
    }
}
