<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengepulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengepul')->insert([
            'nama' => 'Pak Rizal',
            'noHp' => '0823 4567 8901',
            
        ]);
    }
}
