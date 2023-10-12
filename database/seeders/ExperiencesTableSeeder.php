<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experienceLevels = ['Beginner', 'Intermediate', 'Advanced'];

        foreach ($experienceLevels as $level) {
            DB::table('experiences')->insert([
                'name' => $level,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
