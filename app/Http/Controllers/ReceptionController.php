<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reception;
use Faker\Factory as Faker;
use App\Models\Distribution;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('keyword')) {
            return view('reception.reception', [
                'title' => 'Tabel Data Penerimaan',
                'reception'  => Reception::where('no_pembayaran', 'like', '%' . request('keyword') . '%')->orWhere('nama_muzakki', 'like', '%' . request('keyword') . '%')->paginate(5)->withQueryString()
            ]);
        } else {
            return view('reception.reception', [
                'title' => 'Tabel Data Penerimaan',
                'reception'  => Reception::latest()->paginate(5)
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
        $faker = Faker::create();
        return view('reception.create', [
            'no_pembayaran' => $faker->numberBetween(1, 9999999999),
            'muzakki'       => User::where('roles', 'muzakki')->get(),
            'title'         => 'Tambah Data Penerimaan'
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
            'jumlah_zakat'  => 'required|numeric'
        ]);
        Reception::create([
            'no_pembayaran' => $request->no_pembayaran,
            'nama_muzakki'  => $request->nama_muzakki,
            'jumlah_zakat'  => $request->jumlah_zakat,
            'nama_amil'     => $request->nama_amil
        ]);
        return redirect('/reception')->with('pesan', 'Data Penerimaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function show(Reception $reception)
    {
// 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $reception)
    {
        return view('reception.edit', [
            'data'          => $reception,
            'title'         => 'Edit Data Penerimaan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reception $reception)
    {
        $validasi = $request->validate([
            'jumlah_zakat'  => 'required|numeric'
        ]); 
        $reception->update($validasi);
        return redirect('/reception')->with('pesan', 'Data Penerimaan berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $reception)
    {
        Reception::where('id', $reception->id)->delete();
        return redirect('/reception')->with('pesan', 'Data Penerimaan berhasil dihapus.');
    }

    public function totaldana()
    {
        $total_reception = Reception::sum('jumlah_zakat');
        $total_distribution = Distribution::sum('jumlah_zakat');
        return view('reception.totaldana', [
            'total_reception'       => $total_reception,
            'total_distribution'    => $total_distribution,
            'total_cash'            => $total_reception - $total_distribution,
        ]);
    }
}
