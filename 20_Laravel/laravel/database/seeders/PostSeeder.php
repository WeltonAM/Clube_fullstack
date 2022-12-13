<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $users = User::all()->pluck('id')->toArray();

        for ($i=1; $i <= 100; $i++) { 
            DB::table('posts')->insert([
                'user_id' => $faker->randomElement($users),
                'title' => $faker->sentence(),
                'slug' => $faker->slug,
                'content' => $faker->paragraph,
            ]);
        }
    }
}
