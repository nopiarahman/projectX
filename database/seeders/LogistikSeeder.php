<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logistik')->insert([
            'nama' => 'Mario',
            'noHp' => '0812 4567 1234',
            'status'=>'bertugas'
        ]);
    }
}
