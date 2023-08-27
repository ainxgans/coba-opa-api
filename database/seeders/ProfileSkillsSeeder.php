<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            \App\Models\Ecc_profile_skills::create([
                'publish' => 1,
                'user_id' => $faker->numberBetween(1, 100),
                'skill_type' => $faker->randomElement(['hard', 'soft']),
                'skill_id' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
