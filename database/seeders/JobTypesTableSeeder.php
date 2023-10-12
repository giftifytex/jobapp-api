<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTypes = ['Full Time', 'Part Time', 'Internship', 'Freelance', 'Temporary'];

        foreach ($jobTypes as $jobType) {
            DB::table('job_types')->insert([
                'name' => $jobType,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
