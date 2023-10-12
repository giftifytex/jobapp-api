<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $faker = Faker::create();

    foreach (range(1, 20) as $index) {
        DB::table('jobs')->insert([
            'title' => $faker->jobTitle,
            'description' => $faker->paragraph,
            'pay' => $faker->numberBetween(30000, 100000),
            'location' => $faker->city,
            'is_popular' => $faker->boolean,
            'job_type_id' => $faker->numberBetween(1, 3), // Assuming you have job types with IDs 1, 2, and 3
            'category_id' => $faker->numberBetween(1, 5), // Assuming you have job categories with IDs 1 to 5
            'experience_id' => $faker->numberBetween(1, 3), // Assuming you have experience levels with IDs 1 to 4
            'user_id' => $faker->numberBetween(1, 2), // Assuming you have users with IDs 1 to 10
            'logo' => $faker->imageUrl(200, 200, 'business'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
