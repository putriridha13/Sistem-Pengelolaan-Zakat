<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use App\Models\Mustahik;
use App\Models\Reception;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('keyword')) {
            return view('distribution.distribution', [
                'title' => 'Tabel Data Penyaluran',
                'distribution'  => Distribution::where('no_penyaluran', 'like', '%' . request('keyword') . '%')->orWhere('nama_mustahik', 'like', '%' . request('keyword') . '%')->paginate(5)->withQueryString()
            ]);
        } else {
            return view('distribution.distribution', [
                'title' => 'Tabel Data Penyaluran',
                'distribution'  => Distribution::latest()->paginate(5)
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
        return view('distribution.create', [
            'no_penyaluran' => $faker->numberBetween(1, 9999999999),
            'mustahik'      => Mustahik::all(),
            'title'         => 'Tambah Data Penyaluran'
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
        $validasi = $request->validate([
            'jumlah_zakat'  => 'required|numeric'
        ]);
        Distribution::create([
            'no_penyaluran' => $request->no_penyaluran,
            'nama_mustahik'  => $request->nama_mustahik,
            'jumlah_zakat'  => $request->jumlah_zakat,
            'nama_amil'     => $request->nama_amil
        ]);
        return redirect('/distribution')->with('pesan', 'Data Penyaluran berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Distribution $distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribution $distribution)
    {
        return view('distribution.edit', [
            'data'          => $distribution,
            'title'         => 'Edit Data Penyaluran'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribution $distribution)
    {
        $validasi = $request->validate([
            'jumlah_zakat'  => 'required|numeric'
        ]);

        $distribution->update($validasi);
        return redirect('/distribution')->with('pesan', 'Data Penyaluran berhasil diperbaharui.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribution $distribution)
    {
        Distribution::where('id', $distribution->id)->delete();
        return redirect('/distribution')->with('pesan', 'Data Penyaluran berhasil dihapus.');
    }

    public function totaldana()
    {
        $total_reception = Reception::sum('jumlah_zakat');
        $total_distribution = Distribution::sum('jumlah_zakat');
        return view('distribution.totaldana', [
            'total_reception'       => $total_reception,
            'total_distribution'    => $total_distribution,
            'total_cash'            => $total_reception - $total_distribution,
        ]);
    }
}
