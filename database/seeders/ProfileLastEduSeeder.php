<?php

namespace Database\Seeders;

use App\Models\Ecc_profile_last_edu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileLastEduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            Ecc_profile_last_edu::create([
                'publish' => 1,
                'user_id' => $faker->numberBetween(1, 100),
                'university_id' => $faker->numberBetween(1, 100),
                'education_type_id' => $faker->numberBetween(1, 100),
                'major_id' => $faker->numberBetween(1, 100),
                'submajor' => $faker->word(),
                'started_date' => $faker->date(),
                'finished_date' => $faker->date(),
            ]);
        }
    }
}
