<?php

namespace App\Http\Controllers;

use App\Models\Mustahik;
use Illuminate\Http\Request;

class MustahikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('keyword')) {
            return view('mustahik.mustahik', [
                'title' => 'Tabel Data Mustahik',
                'mustahik'  => Mustahik::where('name', 'like', '%' . request('keyword') . '%')->paginate(5)->withQueryString()
            ]);
        } else {
            return view('mustahik.mustahik', [
                'title' => 'Tabel Data Mustahik',
                'mustahik'  => Mustahik::latest()->paginate(5)
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
        return view('mustahik.create', ['title' => 'Tambah Data Mustahik']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:mustahiks,email',
            'address' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        Mustahik::create($validasi);
        return redirect('/mustahik')->with('pesan', 'Data Mustahik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function show(Mustahik $mustahik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function edit(Mustahik $mustahik)
    {
        return view('mustahik.edit', [
            'data'  => $mustahik,
            'title' => 'Edit Data Mustahik'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mustahik $mustahik)
    {
        $validasi = $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        $mustahik->update($validasi);
        return redirect('/mustahik')->with('pesan', 'Data Mustahik berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mustahik  $mustahik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mustahik $mustahik)
    {
        Mustahik::where('id', $mustahik->id)->delete();
        return redirect('/mustahik')->with('pesan', 'Data Mustahik berhasil dihapus.');
    }
}
