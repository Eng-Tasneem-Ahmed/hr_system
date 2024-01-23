<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ["name" => "master", "location" => "cairo"],
            ["name" => "secondaty", "location" => "asswan"]
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
