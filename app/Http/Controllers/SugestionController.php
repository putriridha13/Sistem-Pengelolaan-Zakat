<?php

namespace App\Http\Controllers;

use App\Models\Sugestion;
use Illuminate\Http\Request;

class SugestionController extends Controller
{
    public function index()
    {
        return view('muzakki.sugestion');
    }

    public function post(Request $request)
    {
        $validasi = $request->validate([
            'sugestion' => 'required|max:250'
        ]);
        Sugestion::create($validasi);
        return redirect('/sugestion')->with('pesan', 'Kritik & saran anda telah terkirim');
    }
}
