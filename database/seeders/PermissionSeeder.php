<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Models\Vacation;
use App\Models\Attendance;
use App\Models\Department;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    
    public function run(): void
    {


        $permissions = [
          ...User::$permissions,
          ...Department::$permissions,
          ...Branch::$permissions,
          ...Attendance::$permissions,
          ...Vacation::$permissions,
          
          
      ];
      foreach ($permissions as $permission) {
          Permission::create([
              'name'       => $permission,
              'guard_name' => 'web'
          ]);
      }


    }
}
