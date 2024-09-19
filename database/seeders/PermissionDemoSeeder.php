<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view penugasan']);
        Permission::create(['name' => 'create penugasan']);
        Permission::create(['name' => 'edit penugasan']);
        Permission::create(['name' => 'delete penugasan']);

        Permission::create(['name' => 'view pengumpulan penugasan']);
        Permission::create(['name' => 'create pengumpulan penugasan']);
        Permission::create(['name' => 'edit pengumpulan penugasan']);

        $superVisorRole = Role::create(['name' => 'superVisor']);
        $superVisorRole->givePermissionTo('view penugasan');
        $superVisorRole->givePermissionTo('create penugasan');
        $superVisorRole->givePermissionTo('edit penugasan');
        $superVisorRole->givePermissionTo('delete penugasan');
        $superVisorRole->givePermissionTo('view pengumpulan penugasan');
        $superVisorRole->givePermissionTo('edit pengumpulan penugasan');

        $karyawanRole = Role::create(['name' => 'karyawan']);
        $karyawanRole->givePermissionTo('view pengumpulan penugasan');
        $karyawanRole->givePermissionTo('create pengumpulan penugasan');
        $karyawanRole->givePermissionTo('edit pengumpulan penugasan');

        $user = User::factory()->create([
            'name' => 'irfandi',
            'email' => 'irfandi@gmail.com',
            'password' => bcrypt('irfandi123')
        ]);
        $user->assignRole($superVisorRole);

        $user = User::factory()->create([
            'name' => 'hamri',
            'email' => 'hamri@gmail.com',
            'password' => bcrypt('hamri123')
        ]);
        $user->assignRole($karyawanRole);
    }
}
