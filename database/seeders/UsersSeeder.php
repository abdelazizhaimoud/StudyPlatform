<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

// ...

class UsersSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker::create();
            DB::table('users')->insert([
                [
                    'username' => $faker->userName,
                    'email' => $faker->unique()->safeEmail,
                    'password' => Hash::make('password'),
                    'name' => $faker->name,
                    'age' => $faker->numberBetween(18, 65),
                    'sexe' => $faker->randomElement(['Male', 'Female']),
                    'address' => $faker->address,
                    'phone_number' => $faker->phoneNumber,
                    'bio' => $faker->text,
                    'profile_picture' => 'default_profile.jpg', // Or use a placeholder image
                    'role_id' => 1,
                ],
                // ... Add 9 more user entries using a loop or similar
            ]);
        }
    }
}