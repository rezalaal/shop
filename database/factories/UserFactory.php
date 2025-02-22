<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(), 
            'name' => $this->faker->name(),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->boolean() ? $this->faker->dateTime() : null,
            'password' => bcrypt('password'),
            'seller' => $this->faker->boolean(),
            'buy' => $this->faker->numberBetween(1000, 10000),
            'activity' => $this->faker->word(),
            'seen' => $this->faker->boolean(),
            'is_admin' => $this->faker->boolean(),
            'iban' => $this->faker->iban(),
            'landlinePhone' => $this->faker->phoneNumber(),
            'current_team_id' => $this->faker->numberBetween(1, 10),
            'profile' => $this->faker->paragraph(),
            'profile_photo_path' => $this->faker->imageUrl(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
