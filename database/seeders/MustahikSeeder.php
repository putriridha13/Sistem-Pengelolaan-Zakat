<?php

namespace Database\Seeders;

use App\Models\Mustahik;
use Illuminate\Database\Seeder;

class MustahikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mustahik::factory(20)->create();
    }
}
