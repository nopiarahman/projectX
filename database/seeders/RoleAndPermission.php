<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::updateOrCreate(['name' => 'lihat saldo']);
        Permission::updateOrCreate(['name' => 'lihat transaksiKeluar']);
        Permission::updateOrCreate(['name' => 'lihat transaksiMasuk']);
        Permission::updateOrCreate(['name' => 'lihat kas']);
        Permission::updateOrCreate(['name' => 'lihat logistik']);
        Permission::updateOrCreate(['name' => 'lihat user']);
        // updateOrCreate roles and assign existing permissions
        $superAdmin = Role::updateOrCreate(['name' => 'Super-Admin']);
        $keuangan = Role::updateOrCreate(['name' => 'keuangan']);
        $logistik = Role::updateOrCreate(['name' => 'logistik']);
        $developer = Role::updateOrCreate(['name' => 'developer']);

        /* Assign Permission */
        $superAdmin->syncPermissions(Permission::all());
        $keuangan->syncPermissions([
            'lihat transaksiKeluar',
            'lihat transaksiMasuk',
            'lihat kas',
            'lihat saldo',
        ]);
        $logistik->syncPermissions([
            'lihat logistik'
        ]);
    }
}
