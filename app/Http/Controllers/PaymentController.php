<?php

namespace App\Http\Controllers;

use App\Models\Reception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        if(request('keyword')) {
            return view('payment.payment', [
                'payment'  => Reception::where('no_pembayaran', 'like', '%' . request('keyword') . '%')->get()
            ]);
        } else {
            return view('payment.payment');
        }
    }
}
