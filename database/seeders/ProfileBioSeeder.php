<?php

namespace Database\Seeders;

use App\Models\Ecc_profile_bio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileBioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            Ecc_profile_bio::create([
                'publish' => 1,
                'user_id' => $faker->numberBetween(1, 100),
                'photo' => $faker->imageUrl(400, 400),
                'gender' => $faker->randomElement(['male', 'female'], true),
                'birth_place' => $faker->numberBetween(1, 100),
                'birth_date' => $faker->date(),
                'bio_country_id' => $faker->numberBetween(1, 100),
                'bio_province_id' => $faker->numberBetween(1, 100),
                'bio_city_id' => $faker->numberBetween(1, 100),
                'short_biography' => $faker->text(),
                'positive' => $faker->words(10, true),
                'negative' => $faker->words(10, true),
                'job_title' => $faker->jobTitle(),
            ]);
        }
    }
}
