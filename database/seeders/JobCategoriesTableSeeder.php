<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Accounting / Finance', 'description' => 'Description for Accounting / Finance'],
            ['name' => 'Automotive Jobs', 'description' => 'Description for Automotive Jobs'],
            ['name' => 'Customer', 'description' => 'Description for Customer'],
            ['name' => 'Design', 'description' => 'Description for Design'],
            ['name' => 'Development', 'description' => 'Description for Development'],
            ['name' => 'Health and Care', 'description' => 'Description for Health and Care'],
            ['name' => 'Marketing', 'description' => 'Description for Marketing'],
            ['name' => 'Project', 'description' => 'Description for Project'],
        ];

        foreach ($categories as $category) {
            DB::table('job_categories')->insert([
                'name' => $category['name'],
                'description' => $category['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
