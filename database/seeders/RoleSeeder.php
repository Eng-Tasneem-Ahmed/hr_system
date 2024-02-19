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
       $role = Role::create(['name' => 'super_admin']);
       $permissions = Permission::all();
       $role->syncPermissions($permissions);
    }
}
