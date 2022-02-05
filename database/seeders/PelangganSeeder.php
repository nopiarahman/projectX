<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            'nama' => 'Agus',
            'email' => 'agus@gmail.com',
            'noHp' => '0823 5673 2376',
            'jenis'=>'reguler',
        ]);
    }
}
