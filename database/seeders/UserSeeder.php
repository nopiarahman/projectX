<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Nopi',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('rahasia'),
            // 'role'=>'admin'
        ]);
        $superAdmin->assignRole('Super-Admin');
        $keuangan = User::create([
            'name' => 'Fulan',
            'email' => 'keuangan@gmail.com',
            'password' => Hash::make('rahasia'),
            // 'role'=>'admin'
        ]);
        $keuangan->assignRole('keuangan');
        $logistik = User::create([
            'name' => 'Fulan',
            'email' => 'logistik@gmail.com',
            'password' => Hash::make('rahasia'),
            // 'role'=>'admin'
        ]);
        $logistik->assignRole('logistik');
    }
}
