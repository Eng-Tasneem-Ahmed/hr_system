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
        User::create([
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
    }
}
