<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ["name" => "backend by php"],
            ["name" => "frontend react"],
            ["name" => "frontend angular"],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
