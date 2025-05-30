<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // clear cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'list-articles']);
        Permission::create(['name' => 'create-articles']);

        // create roles and assign created permissions

        // 'user' can only list articles
        $userRole = Role::create(['name' => 'user'])
            ->givePermissionTo('list-articles');

        // 'writer' can list and create articles
        $writerRole = Role::create(['name' => 'writer'])
            ->givePermissionTo(['list-articles', 'create-articles']);

        // 'admin' can do anything
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
    }
}
