<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $create_buku = Permission::create(['name' => 'create_buku']);
        $edit_buku = Permission::create(['name' => 'edit_buku']);
        $delete_buku = Permission::create(['name' => 'delete_buku']);
        $read_buku = Permission::create(['name' => 'read_buku']);

        // role user
        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo($read_buku);

        // role admin
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo($create_buku, $edit_buku, $delete_buku, $read_buku);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
        ]);

        $user->assignRole('admin');
    }
}
