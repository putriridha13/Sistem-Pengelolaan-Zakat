<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function loginmuzakki()
    {
        return view('auth.muzakki.login');
    }

    public function loginmuzakkipost(Request $request) 
    {
        $request->validate([
            'username'  => 'required|min:3',
            'password'  => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong!',
            'username.min'      => 'Username terlalu pendek!'
        ]);

        if(Auth::attempt($request->only('username', 'password'))) {
            return redirect('/muzakki');
        }
        return redirect('/')->with('pesan', 'Username atau Password yang anda masukkan salah');
    }

    public function registermuzakki()
    {
        return view('auth.muzakki.register');
    }

    public function loginamil()
    {
        return view('auth.amil.login');
    }

    public function loginamilpost(Request $request) 
    {
        $request->validate([
            'username'  => 'required|min:3',
            'password'  => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong!',
            'username.min'      => 'Username terlalu pendek!'
        ]);

        if(Auth::attempt($request->only('username', 'password'))) {
            return redirect('/amil');
        }
        return redirect('/')->with('pesan', 'Username atau Password yang anda masukkan salah');
    }

    public function loginadmin()
    {
        return view('auth.admin.admin');
    }

    public function loginadminpost(Request $request) 
    {
        $request->validate([
            'username'  => 'required|min:3',
            'password'  => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong!',
            'username.min'      => 'Username terlalu pendek!'
        ]);

        if(Auth::attempt($request->only('username', 'password'))) {
            return redirect('/amil');
        }
        return redirect('/')->with('pesan', 'Username atau Password yang anda masukkan salah');
    }

    public function registeramil()
    {
        return view('auth.amil.register');
    }

    public function registermuzakkipost(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'username'  => 'required|min:3|unique:users,username',
            'password'  => 'required',
            'repeatpassword' => 'same:password'
        ]);

        User::create([
            'name'  => $request->name,
            'username'  => $request->username,
            'address'   => '',
            'picture'   => 'user.png',
            'roles'     => 'muzakki',
            'phone_number' => '',
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);
        return redirect('/registermuzakki')->with('pesan', 'Berhasil registrasi, Silahkan login.');
    }

    public function registeramilpost(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'username'  => 'required|min:3|unique:users,username',
            'password'  => 'required',
            'repeatpassword' => 'same:password'
        ]);

        User::create([
            'name'  => $request->name,
            'username'  => $request->username,
            'address'   => '',
            'picture'   => 'user.png',
            'roles'     => 'amil',
            'phone_number' => '',
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        return redirect('/registeramil')->with('pesan', 'Berhasil registrasi, Silahkan login.');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
