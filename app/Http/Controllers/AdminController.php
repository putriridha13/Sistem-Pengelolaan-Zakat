<?php

namespace App\Http\Controllers;

use App\Models\Reception;
use App\Models\Distribution;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_reception = Reception::sum('jumlah_zakat');
        $total_distribution = Distribution::sum('jumlah_zakat');
        return view('admin.admin', [
            'total_reception'       => $total_reception,
            'total_distribution'    => $total_distribution,
            'total_cash'            => $total_reception - $total_distribution
        ]);
    }
}
