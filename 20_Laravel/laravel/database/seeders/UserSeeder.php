<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=1; $i <= 100; $i++) {
            DB::table('users')->insert([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => bcrypt('123'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
