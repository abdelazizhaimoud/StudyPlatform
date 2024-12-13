<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = '123123123';
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;



    public function definition(): array
    {

        // Simulate fetching a random image
        $imageUrl = 'https://randomuser.me/api/portraits/men/' . rand(1, 99) . '.jpg';
        $tempFilePath = tempnam(sys_get_temp_dir(), 'profile'); // Temporary file for download

        // Download the image
        file_put_contents($tempFilePath, file_get_contents($imageUrl));

        // Mimic uploading and storing the image
        $file = new \Illuminate\Http\UploadedFile(
            $tempFilePath,
            'profile_picture.jpg', // Simulated filename
            'image/jpeg', // MIME type
            null,
            true // Test mode enabled
        );

        // Use the `store()` method to save the file in the storage
        $storedPath = $file->store('profile', 'public');



        return [
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified' => false,
            'password' => static::$password ??= Hash::make('password'),
            'first_name' => fake()->firstNameFemale(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18,60),
            'sexe' => fake()->randomElement(['male','female']),
            'address' => fake()->text(),
            'phone_number' => fake()->unique()->numerify('06########'),
            'bio' => fake()->text(),
            'school' => fake()->name(),
            'sector' => fake()->name(),
            'profile_picture' => $storedPath,
            'remember_token' => Str::random(10),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
