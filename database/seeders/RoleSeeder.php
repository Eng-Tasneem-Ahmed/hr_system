<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a role with all permissions
        $superRole = Role::create(['name' => 'super_admin']);
        $permissions = Permission::get();
        $superRole->syncPermissions($permissions);
        $adminRole = Role::create(['name' => 'admin']);
        $adminPermissions = $permissions->reject(function ($permission) {
            return strpos($permission->name, '-delete') !== false;
        });
        $adminRole->syncPermissions($adminPermissions);
    }
}
