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

        // items
        Permission::create(['name' => 'view voting']);
        Permission::create(['name' => 'create voting']);
        Permission::create(['name' => 'edit voting']);
        Permission::create(['name' => 'delete voting']);


        Role::create(['name' => 'committee'])
            ->givePermissionTo(Permission::all());
    }
}
