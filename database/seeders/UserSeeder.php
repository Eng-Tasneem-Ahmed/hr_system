<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $super_admin= User::create([
            "name" => "super_admin",
            "username" => "super_admin##",
            "password" => Hash::make("123456"),
            "department_id"=>Department::first()->id,
            "branch_id"=>Branch::first()->id,
            "salary"=>2000,
            "phone"=>"0111111111",
            "back_id_card_photo"=>"1.png",
            "front_id_card_photo"=>"2.png",
        ]);
        $admin= User::create([
            "name" => "admin",
            "username" => "admin##",
            "password" => Hash::make("123456"),
            "department_id"=>Department::first()->id,
            "branch_id"=>Branch::first()->id,
            "salary"=>2000,
            "phone"=>"01111111111",
            "back_id_card_photo"=>"1.png",
            "front_id_card_photo"=>"2.png",
        ]);
      $admin->assignRole("admin");
      $super_admin->assignRole("super_admin");


    }
}
