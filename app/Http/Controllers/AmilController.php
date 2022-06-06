<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use App\Models\Mustahik;
use App\Models\Reception;
use App\Models\Sugestion;
use Illuminate\Http\Request;
use App\Models\User;

class AmilController extends Controller
{
    public function index() 
    {
        $total_reception = Reception::sum('jumlah_zakat');
        $total_distribution = Distribution::sum('jumlah_zakat');
        return view('amil.dashboard', [
            'total_reception'       => $total_reception,
            'total_distribution'    => $total_distribution,
            'total_cash'            => $total_reception - $total_distribution,
            'total_muzakki'         => User::where('roles', 'muzakki')->count(),
            'total_amil'            => User::where('roles', 'amil')->count(),
            'total_mustahik'        => Mustahik::count()
        ]);
    }

    public function dataamil()
    {
        if(request('keyword')) {
            return view('amil.amil', [
                'title' => 'Tabel Data Amil',
                'amil'  => User::where('name', 'like', '%' . request('keyword') . '%')->where(function ($query) {
                    $query->where('roles', '=', 'amil');
                })->paginate(15)->withQueryString()
            ]);
        } else {
            return view('amil.amil', [
                'title' => 'Tabel Data Amil',
                'amil'  => User::where('roles', 'amil')->paginate(15)
            ]);
        }
    }

    public function datamuzakki()
    {
        if(request('keyword')) {
            return view('amil.muzakki', [
                'title' => 'Tabel Data Muzakki',
                'muzakki'  => User::where('name', 'like', '%' . request('keyword') . '%')->where(function ($query) {
                    $query->where('roles', '=', 'muzakki');
                })->paginate(15)->withQueryString()
            ]);
        } else {
            return view('amil.muzakki', [
                'title' => 'Tabel Data Muzakki',
                'muzakki'  => User::where('roles', 'muzakki')->paginate(15)
            ]);
        }
    }

    public function datamuzakkiedit($id)
    {
        return view('amil.editmuzakki', [
            'data'  => User::find($id),
            'title' => 'Edit Data Muzakki'
        ]);
    }

    public function datamuzakkiupdate(Request $request, $id)
    {
        $validasi = $request->validate([
            'address' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        User::find($id)->update($validasi);
        return redirect('/datamuzakki')->with('pesan', 'Data Mustahik berhasil diperbaharui.');
    }

    public function datamuzakkidestroy($id) {
        User::find($id)->delete();
        return redirect('/datamuzakki')->with('pesan', 'Data Muzakki berhasil dihapus');
    }

    public function dataamiledit($id)
    {
        return view('amil.editamil', [
            'data'  => User::find($id),
            'title' => 'Edit Data Amil'
        ]);
    }

    public function dataamilupdate(Request $request, $id)
    {
        $validasi = $request->validate([
            'address' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        User::find($id)->update($validasi);
        return redirect('/dataamil')->with('pesan', 'Data Amil berhasil diperbaharui.');
    }

    public function dataamildestroy($id) {
        User::find($id)->delete();
        return redirect('/dataamil')->with('pesan', 'Data Amil berhasil dihapus');
    }

    public function datasugestion()
    {
        return view('sugestion.sugestion', [
            'sugestion' => Sugestion::all(),
            'title'     => 'Tabel Data kritik & saran'
        ]);
    }
}
