<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Admin',
            'username'  => 'admin',
            'roles'     => 'admin',
            'password'  => Hash::make('admin'),
            'email'     => 'admin@gmail.com',
            'picture'   => 'user.png'
        ]);
        User::create([
            'name'      => 'Amil',
            'username'  => 'amil',
            'roles'     => 'amil',
            'password'  => Hash::make('amil'),
            'email'     => 'amil@gmail.com',
            'picture'   => 'user.png'
        ]);
        User::create([
            'name'      => 'Muzakki',
            'username'  => 'muzakki',
            'roles'     => 'muzakki',
            'password'  => Hash::make('muzakki'),
            'email'     => 'muzakki@gmail.com',
            'picture'   => 'user.png'
        ]);
        User::factory(50)->create();
    }
}
