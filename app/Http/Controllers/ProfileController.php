<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile.profile');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'phone_number'  => 'required|numeric',
            'address'       => 'required',
            'picture'       => 'required|image|mimes:png,jpg,jpeg',
            'username'      => 'required',
            'oldpass'       => ['required', new MatchOldPassword],
            'newpass'       => 'required',
            'repeatpass'    => 'required|same:newpass'
        ],[
            'name.required'     => 'Nama tidak boleh kosong!',
            'email.required'    => 'Email tidak boleh kosong!',
            'address.required'    => 'Alamat tidak boleh kosong!',
            'email.email'       => 'Sialhkan gunakan email yang valid!',
            'phone_number.required'       => 'Nomor telepon tidak boleh kosong!',
            'username.required'       => 'Usernamae tidak boleh kosong!',
            'oldpass.required'       => 'Password lama tidak boleh kosong!',
            'newpass.required'       => 'Password lama tidak boleh kosong!',
            'repeatpass.required'       => 'Konfirmasi Password tidak boleh kosong!',
            'repeatpass.same'       => 'Konfirmasi password tidak sama!',
        ]);

        $oldPicture = User::find($id);
        if($oldPicture->picture == "user.png") {
            $picture = $request->file('picture');
            $pictureName = time() . '_' . Str::lower($picture->getClientOriginalName());
            $request->picture = $pictureName;
            $picture->move(public_path('img'), $pictureName);
    
            User::find($id)->update([
                'name'  => $request->name,
                'username' => $request->username,
                'address'   => $request->address,
                'picture'   => $request->picture,
                'phone_number'   => $request->phone_number,
                'email'         => $request->email,
                'password'      => Hash::make($request->newpass)
            ]);
        } else {
            unlink("img/" . $oldPicture->picture);
            $picture = $request->file('picture');
            $pictureName = time() . '_' . Str::lower($picture->getClientOriginalName());
            $request->picture = $pictureName;
            $picture->move(public_path('img'), $pictureName);
    
            User::find($id)->update([
                'name'  => $request->name,
                'username' => $request->username,
                'address'   => $request->address,
                'picture'   => $request->picture,
                'phone_number'   => $request->phone_number,
                'email'         => $request->email,
                'password'      => Hash::make($request->newpass)
            ]);
        }
        return redirect('/profile')->with('pesan', 'Data Profile berhasil diperbaharui.');
    }
}
