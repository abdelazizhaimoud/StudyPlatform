<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Container\Attributes\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        $users = User::factory()->count(20)->create();
        $groups = Group::factory()->count(5)->create();
        $users->each(function ($user) use ($groups) {
            $user->groups()->attach(
                $groups->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
