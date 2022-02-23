<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // committee
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        // voting
        Permission::create(['name' => 'view voting']);
        Permission::create(['name' => 'create voting']);
        Permission::create(['name' => 'edit voting']);
        Permission::create(['name' => 'delete voting']);


        Role::create(['name' => 'committee head'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'committee'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'advisor'])
            ->givePermissionTo(Permission::all());
    }
}
