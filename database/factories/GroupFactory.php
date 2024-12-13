<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Group;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Group::class;

    
    public function definition(): array
    {
        return [
            //
            'name' => fake()->unique()->streetName(),
            'size' => fake()->numberBetween(1,10),
            'description' => fake()->text(),
        ];
    }
}
